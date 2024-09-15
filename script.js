document.addEventListener("DOMContentLoaded", function () {
    // Этот код выполняется, когда весь HTML-документ загружен и готов к обработке JavaScript.

    // Создаем новый объект XMLHttpRequest для выполнения AJAX-запроса к серверу.
    var xhr = new XMLHttpRequest();

    // Устанавливаем обработчик события onreadystatechange, который будет вызываться при изменении состояния запроса.
    xhr.onreadystatechange = function () {
        // Проверяем, что состояние запроса равно 4 (завершено), и код состояния равен 200 (успешный ответ от сервера).
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Если условие выполняется, это означает, что запрос был успешным.

            // Получаем текстовый ответ от сервера и сохраняем его в переменной response.
            var response = xhr.responseText;

            // Ищем элемент с идентификатором "events" на веб-странице и устанавливаем его содержимое равным полученному ответу.
            document.getElementById("events").innerHTML = response;
        }
    };

    // Открываем соединение, указывая метод (GET), URL-адрес (get_events.php), и флаг асинхронности (true).
    xhr.open("GET", "get_events.php", true);

    // Отправляем AJAX-запрос на сервер.
    xhr.send();
});
