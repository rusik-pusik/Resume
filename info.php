<?php
if (function_exists('ldap_connect')) {
    echo "LDAP is enabled.";
} else {
    echo "LDAP is not enabled.";
}
?>