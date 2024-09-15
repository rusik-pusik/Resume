<?php

class AdLdap {
    var $_base_dn = "cn=username,cn=Users,dc=domain,dc=ru"; // Базовый DN
    var $_domain_controllers = array("ldap://127.0.0.1:389"); // Массив контроллеров домена

    var $_ad_username = "cn=username,cn=Users,dc=domain,dc=ru";
    var $_ad_password = "Пароль";
    var $_real_primarygroup = true; // Настройка для получения основной группы
    var $_use_ssl = false;
    
    var $_cn_identifier = "samaccountname";
    var $_group_cn_identifier = "samaccountname";
    var $_group_attribute = "memberof";
    var $_recursive_groups = true;

    var $_conn; // Соединение с LDAP
    var $_conn_paged; // Соединение с LDAP для постраничного поиска
    var $_bind; // Результат биндинга
    var $_bind_paged; // Результат биндинга для постраничного поиска
    var $_cache_group_dn = array();
    var $_cache_recursive_groups = array();
    var $_cache_support = true;
    var $_entry_identifier = array();
    var $_error = true;
    var $_error_message = '';
    var $_ldap_server_type = 1;
    var $_ldap_filter = '';
    var $_oui_paged_sr = NULL;
    var $_paging_cookie = '';
    var $_paging_legacy = false;
    var $_paging_ldap_control = false;
    var $_paging_size = 1000;
    var $_debug_message = '';
    var $_warning_message = '';
    var $_server_reachable = false;
    var $_cache_folder = "";
    var $_expired_password_valid = false;
    var $_users_dn;

    // Таймаут кеша в секундах
    var $_cache_timeout = 3600;
    var $_linux_file_mode = '0666';

    // Конструктор
    function __construct($options = array()) {
        // Инициализация параметров по умолчанию
        $this->_initDefaults($options);

        // Установка порта в зависимости от использования SSL
        $ldap_port = $this->_use_ssl ? 636 : 999; // Использование порта, предоставленного начальником

        // Установка дополнительных параметров из массива $options
        $this->_setOptions($options, $ldap_port);

        // Попытка подключения и биндинга к контроллерам домена
        $connected = $this->_connectToControllers($ldap_port);

        // Возврат результата подключения
        return $connected;
    }

    // Инициализация параметров по умолчанию
    private function _initDefaults($options) {
        $this->_base_dn = 'cn=username,cn=Users,dc=domain,dc=ru'; // Обновленный DN
        $this->_cache_group_dn = array();
        $this->_cache_recursive_groups = array();
        $this->_cache_support = true;
        $this->_entry_identifier = array();
        $this->_error = true;
        $this->_error_message = '';
        $this->_ldap_server_type = 1;
        $this->_ldap_filter = '';
        $this->_oui_paged_sr = NULL;
        $this->_paging_cookie = '';
        $this->_paging_legacy = false;
        $this->_paging_ldap_control = false;
        $this->_paging_size = 1000;
        $this->_debug_message = '';
        $this->_warning_message = '';
        $this->_server_reachable = false;
        $this->_cache_folder = "";
        $this->_expired_password_valid = false;
    }

    // Установка параметров из массива $options
    private function _setOptions($options, &$ldap_port) {
        if (count($options) > 0) {
            foreach ($options as $key => $value) {
                $property = "_{$key}";
                if (property_exists($this, $property)) {
                    $this->$property = $value;
                }
            }
        }

        if ($this->_use_ssl) {
            $ldap_port = 636;
        }

        if (isset($options['port'])) {
            $ldap_port = intval($options['port']);
        }
    }

    // Подключение и биндинг к контроллерам домена
    private function _connectToControllers($ldap_port) {
        $connected = false;
        if ($this->_ad_username && $this->_ad_password) {
            foreach ($this->_domain_controllers as $dc) {
                $controller = $this->_prepareController($dc, $ldap_port);
                if ($this->_conn = ldap_connect($controller)) {
                    $this->_conn_paged = ldap_connect($controller);

                    // Установка опций для LDAP соединения
                    $this->_setLdapOptions($this->_conn);
                    $this->_setLdapOptions($this->_conn_paged);

                    $this->_bind = @ldap_bind($this->_conn, $this->_ad_username, $this->_ad_password);
                    $this->_bind_paged = @ldap_bind($this->_conn_paged, $this->_ad_username, $this->_ad_password);

                    if ($this->_bind && $this->_checkBaseDnAccess()) {
                        $connected = true;
                        break;
                    } else {
                        $this->_handleLdapError();
                    }
                }
            }
        }

        if (!$connected) {
            $this->_error_message = $this->_error_message ?: 'FATAL: AD connection failed. Check the LDAP/AD controllers.';
        }

        return $connected;
    }

    // Подготовка контроллера домена
    private function _prepareController($dc, &$ldap_port) {
        $protocol = $this->_use_ssl ? "ldaps://" : "ldap://";
        if (strpos($dc, "://") !== false) {
            $protocol = substr($dc, 0, strpos($dc, "://") + 3);
            $dc = substr($dc, strpos($dc, "://") + 3);
        }
        if (strpos($dc, ":") !== false) {
            $ldap_port = substr($dc, strpos($dc, ":") + 1);
            $dc = substr($dc, 0, strpos($dc, ":"));
        }
        return $protocol . $dc . ":" . $ldap_port;
    }

    // Установка опций для LDAP соединения
    private function _setLdapOptions($conn) {
        ldap_set_option($conn, LDAP_OPT_PROTOCOL_VERSION, 3);
        ldap_set_option($conn, LDAP_OPT_REFERRALS, 0);
        ldap_set_option($conn, LDAP_OPT_RESTART, 1);
    }

    // Проверка доступа к BaseDN
    private function _checkBaseDnAccess() {
        return ldap_search($this->_conn, $this->_base_dn, "(objectClass=user)") !== false;
    }

    // Обработка ошибок LDAP
    private function _handleLdapError() {
        $this->_error = true;
        $this->_server_reachable = ldap_errno($this->_conn) != -1;
        $this->_error_message = 'FATAL: AD bind failed. Check the login credentials (' . ldap_errno($this->_conn) . ": " . ldap_error($this->_conn) . ').';
    }

    // Поиск пользователя в LDAP
    public function searchUser($filter) {
        if (!$this->_bind) {
            $this->_error_message = 'LDAP bind error.';
            return false;
        }

        $result = ldap_search($this->_conn, $this->_base_dn, $filter);
        if (!$result) {
            $this->_error_message = 'LDAP search failed: ' . ldap_error($this->_conn);
            return false;
        }

        return ldap_get_entries($this->_conn, $result);
    }

    public function getErrorMessage() {
        return $this->_error_message;
    }

    public function close() {
        if ($this->_conn) {
            ldap_unbind($this->_conn);
        }
    }
}
?>
