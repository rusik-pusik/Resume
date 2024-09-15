  // Функция для установления высоты изображения
  function setNewsImageHeight() {
    var newsImage = document.getElementById('newsImage');
    var latestNews = document.getElementById('latest-news');
  
    // Получаем высоту блока с новостями
    var newsHeight = latestNews.offsetHeight;
    // Устанавливаем максимальную высоту изображения на 200 пикселей больше
    var maxHeight = newsHeight + 200;
  
    // Присваиваем высоту изображению
    newsImage.style.maxHeight = maxHeight + 'px';
  }

  // Вызываем функцию при загрузке страницы
  window.onload = setNewsImageHeight;
  
  // Вызываем функцию при каждом изменении размера окна
  window.onresize = setNewsImageHeight;