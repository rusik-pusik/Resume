function updateClassBasedOnScreenSize() {
    var myBARElements = document.querySelectorAll(".myBAR");
    if (myBARElements.length > 0) {
        myBARElements.forEach(function(myBAR) {
        if (window.innerWidth >= 1660) {
            myBAR.classList.remove("col-md-4");
            myBAR.classList.add("col-md-2");
        } else {
            myBAR.classList.remove("col-md-2");
            myBAR.classList.add("col-md-4");
        }
      });
    }
  }
  
  // Вызываем функцию при загрузке страницы и при изменении размера окна
  document.addEventListener("DOMContentLoaded", updateClassBasedOnScreenSize);
  window.addEventListener("resize", updateClassBasedOnScreenSize);
  
  // Функция для обновления классов в зависимости от размера экрана для 4K
  function updateClassBasedOnScreenSize4K() {
    var myBARElements = document.querySelectorAll(".myBAR");
    if (myBARElements.length > 0) {
        myBARElements.forEach(function(myBAR) {
        if (window.innerWidth >= 3840) {
            myBAR.classList.remove("col-md-2");
            myBAR.classList.add("col-md-1");
        } else {
            myBAR.classList.remove("col-md-1");
            myBAR.classList.add("col-md-2");
        }
      });
    }
  }
  
  // Вызываем функцию при загрузке страницы и при изменении размера окна для 4K
  document.addEventListener("DOMContentLoaded", updateClassBasedOnScreenSize4K);
  window.addEventListener("resize", updateClassBasedOnScreenSize4K);

  function updateClassBasedOnScreenSize1() {
    var mynewsElements = document.querySelectorAll(".mynews");
    if (mynewsElements.length > 0) {
        mynewsElements.forEach(function(mynews) {
            if (window.innerWidth >= 1660) {
                mynews.classList.replace("col-md-8", "col-md-10");
            } else {
                mynews.classList.replace("col-md-10", "col-md-8");
            }
        });
    }
}




  // Вызываем функцию при загрузке страницы и при изменении размера окна
  document.addEventListener("DOMContentLoaded", updateClassBasedOnScreenSize1);
  window.addEventListener("resize", updateClassBasedOnScreenSize1);
  
  // Функция для обновления классов в зависимости от размера экрана для 4K

  function updateClassBasedOnScreenSize4K1() {
    var mynewsElements = document.querySelectorAll(".mynews");
    if (mynewsElements.length > 0) {
        mynewsElements.forEach(function(mynews) {
            if (window.innerWidth >= 3840) {
                mynews.classList.replace("col-md-10", "col-md-11");
            } else {
                mynews.classList.replace("col-md-11", "col-md-10");
            }
        });
    }
}
  // Вызываем функцию при загрузке страницы и при изменении размера окна для 4K
  document.addEventListener("DOMContentLoaded", updateClassBasedOnScreenSize4K1);
  window.addEventListener("resize", updateClassBasedOnScreenSize4K1);
  