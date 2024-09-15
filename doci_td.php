<script> // Этот скрипт при запуске формы сохраняет имя активной формы в LocalStorage
  
      const LS= localStorage;
      form = {name:"doci_td"}
      LS.setItem('form',JSON.stringify(form));
    //   ClearFormData1();
    //   updateCheckboxState(radio);
</script>
<main class="container">

    <div class="col-md-12">
    <div class="row ">
   
    
        <div class="position-sticky" style="top: 2rem;">
        </div>
      
    
    
        <div class="col-md-3">
       
        <div class="position-sticky" style="top: -100rem;">
        <nav id="sidebar">
            
        <div class="text_hide_wrap">

        <form  method="POST" id="myForm" action="doci.php?page=doci_td">
            <div class=" p-3 mb-4 chess "style="border-top-right-radius: 5px;"> 
            <h5 class=" overtext otstupmen">Поиск по названию документа</h5>
            <ol class="list-unstyled mb-0 overtext">
                <input type="text"  id="input" class="form-control mb-3 "name="name_new" placeholder="Что искать?"	v-model="name_new">
            </ol>
            </div>
   
        <div class="mb-4 p-3 bg-light chess">
 
            <h5 class=" overtext otstupmen">
                    Выберите отдел компании
              
            </h5>
            <div class="item_text">
            <ul class=" list-unstyled" id="categories">
                <li>
                    <a href="doci.php?page=doci_ok">
                        <button type="button" style="height: 50%; flex-wrap: nowrap;" class="btn btn-outline-dark posicke overflow-hidden">
                            Отдел кадров
                        </button>
                    </a>
                </li>
                <li>
                    <a href="doci.php?page=doci_reg">
                        <button type="button" style="height: 50%; flex-wrap: nowrap;" class="btn btn-outline-dark posicke overflow-hidden">
                            Регламент
                        </button>
                    </a>
                </li>
                <li>
                    <a href="doci.php?page=doci_td">
                        <button type="button" style="height: 50%; flex-wrap: nowrap;" class="btn btn-dark posicke overflow-hidden">
                            Технический Департамент
                        </button>
                    </a>
                </li>
               
            </ul>
            </div>
        </div>
            <div class="">
            
      
            <div class="p-3 chess mb-4">
            <h5 class="overtext otstupmen">Выберите папку с документами</h5>
               <?php
            $server = "127.0.0.1";
            $user = "root";
            $pass = "1";
            $dbname = "bd_infocell_docs";
            $dbtable = "document";
            $conn = mysqli_connect($server, $user, $pass, $dbname);
            
            // Проверка подключения
            if (!$conn) {
                die("Ошибка подключения: " . mysqli_connect_error());
            }
            
            // Первый запрос
                 ?>    
<?php
echo '<div class="row dropdown-border" style="padding: 0px 0px;">';
    echo '<div class="p-0 col-md-10">';
        echo '<ul class="list-unstyled components overtext">';
            echo '<li>';
                echo '<div class="nav-link text-black " name="teg1">';
                    echo '<label class="tag-checkbox tag-checkbox-label" for="checkbox1_">';
                        echo '<input class="radio" type="radio" name="teg1" value="" id="checkbox1_" >';
                        echo '<label for="checkbox1_">';
                            echo "Все представленные документы";
                        echo '</label>';
                    echo '</label>';
                echo '</div>';
            echo '</li>';
        echo '</ul>';
    echo '</div>';
echo '</div>';
function teg1Query($conn, $query) {
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_execute($stmt);
    return mysqli_stmt_get_result($stmt);
}

function renderteg1Dropdown($conn) {
    $query = 'SELECT DISTINCT document.teg1 FROM document WHERE (document.name_doc="Технический Департамент") ORDER BY BINARY teg1';
    $result = teg1Query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $counter = 1; // Initialize a counter for unique IDs

        while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
            foreach ($row as $cellValue) {
                if (!empty($cellValue) && $cellValue !== '-') {
                    $uniqueId = 'dropdown_' . $counter; // Generate a unique ID using the counter
                    
                    echo '<div class="row dropdown-border" style="padding: 0px 0px;">';
                        echo '<div class="p-0 col-md-10">';
                        echo '<ul class="list-unstyled components overtext">';
                            echo '<li>';
                            echo '<div class="nav-link text-black " name="teg1">';
                                echo '<label class="tag-checkbox tag-checkbox-label" for="checkbox1_' . ($cellValue) . '">';
                                    echo '<input class="radio" type="radio" name="teg1" value="' . ($cellValue) . '" id="checkbox1_' . ($cellValue) . '">';
                                    echo '<label for="checkbox1_' . ($cellValue) . '">';
                                        echo ($cellValue);
                                    echo '</label>';
                                echo '</label>';
                            echo '</div>';
                            echo '</li>';
                        echo '</ul>';
                    echo '</div>';
                    echo '<div class="col-md-2 p-0" ;">';
                    echo '<a href="#" class="dropdown-toggle d-flex justify-content-center align-items-center" data-toggle="collapse" data-target="#' . $uniqueId . '"></a>';
                    echo '</div>';
                    
                    
                    echo '</div>';

                    // Increment the counter for the next iteration
                   
                    echo '<ul class="collapse list-unstyled pageSubmenu1" id="' . $uniqueId . '" style="margin-bottom: 0px;">';
                        renderteg2Dropdown($conn, $cellValue); // Pass $cellValue to the next function
                    echo '</ul>';
                    $counter++;
                }
            }
        }
    }
}
// $first = true;
//                             echo '<div class="nav-link text-black " name="teg1">';
//                                 echo '<label class="tag-checkbox" for="checkbox1_' . ($cellValue) . '">';
//                                     echo '<input class="radio" type="radio" name="teg1" value="' . ($cellValue) . '" id="checkbox1_' . ($cellValue) . '"' . ($first ? ' checked' : '') . '>';
//                                     echo '<label for="checkbox1_' . ($cellValue) . '">';
//                                         echo ($cellValue);
//                                     echo '</label>';
//                                 echo '</label>';
//                             echo '</div>';
//                             $first = false;
function teg2Query($conn, $query1) {
    $stmt1 = mysqli_prepare($conn, $query1);
    mysqli_stmt_execute($stmt1);
    return mysqli_stmt_get_result($stmt1);
}

function renderteg2Dropdown($conn, $cellValue) {
    $query1 = 'SELECT DISTINCT document.teg2 FROM document WHERE (document.name_doc="Технический Департамент" AND document.teg1 = "' . $cellValue . '") ORDER BY BINARY teg2';
    $result1 = teg2Query($conn, $query1);
    
    if (mysqli_num_rows($result1) > 0) {
        $counter1 = 1; // Initialize a counter for unique IDs

        while ($row1 = mysqli_fetch_array($result1, MYSQLI_NUM)) {
            foreach ($row1 as $cellValue1) {
                if (!empty($cellValue1) && $cellValue1 !== '-') {
                    $checkboxId = 'checkbox_' . $counter1; // Generate a unique ID for checkbox
                    echo '<div class="row dropdown-border" style="padding: 1px 1px;">';
                        echo '<div class="p-0 col-md-10">';
                            echo '<ul class="list-unstyled components overtext">';
                                echo '<li>';
                                    echo '<div class="nav-link text-black " name="teg2">';
                                        echo '<label class="tag-checkbox tag-checkbox-label" for="checkbox2_' . htmlspecialchars($cellValue1, ENT_QUOTES) . '">';
                                            echo '<input class="radio" type="radio" name="teg2" value="' . htmlspecialchars($cellValue1, ENT_QUOTES) . '" id="checkbox2_' . htmlspecialchars($cellValue1, ENT_QUOTES) . '">';
                                            echo '<label for="checkbox2_' . htmlspecialchars($cellValue1, ENT_QUOTES) . '">';
                                                echo htmlspecialchars($cellValue1, ENT_QUOTES);
                                            echo '</label>';
                                        echo '</label>';
                                    echo '</div>';
                                echo '</li>';
                            echo '</ul>';
                        echo '</div>';
                        echo '<div class="col-md-2 p-0">';
                            echo '<a href="#' . $checkboxId . '" data-toggle="collapse" aria-expanded="false"class="dropdown-toggle d-flex justify-content-center align-items-center" ></a>';
                        echo '</div>';
                    echo '</div>';
                    
                    echo '<ul class="collapse list-unstyled pageSubmenu2" id="' . $checkboxId . '" style="margin-bottom: 0px;">';
                    renderteg3Dropdown($conn, $cellValue1); // Pass $cellValue to the next function
                    echo '</ul>';
                    $counter1++;
                }
            }
        }
    }
}
function teg3Query($conn, $query2) {
    $stmt1 = mysqli_prepare($conn, $query2);
    mysqli_stmt_execute($stmt1);
    return mysqli_stmt_get_result($stmt1);
}

function renderteg3Dropdown($conn, $cellValue1) {
    $query2 = 'SELECT DISTINCT document.teg3 FROM document WHERE (document.name_doc="Технический Департамент" AND document.teg2 = "' . $cellValue1 . '") ORDER BY BINARY teg3';
    $result2 = teg3Query($conn, $query2);
    
    if (mysqli_num_rows($result2) > 0) {
        $counter2 = 1; // Initialize a counter for unique IDs

        while ($row2 = mysqli_fetch_array($result2, MYSQLI_NUM)) {
            foreach ($row2 as $cellValue2) {
                if (!empty($cellValue2) && $cellValue2 !== '-') {
                    $checkboxId1 = 'checkbox1_' . $counter2; // Generate a unique ID for checkbox
                    
                        echo '<div class="row dropdown-border" style="padding: 1px 1px;">';
                            echo '<div class="p-0 col-md-10">';
                                echo '<ul class="list-unstyled components overtext">';
                                    echo '<li>';
                                        echo '<div class=" nav-link text-black "  name="teg3">';
                                            echo '<label class="tag-checkbox" for="checkbox3_' . htmlspecialchars($cellValue2, ENT_QUOTES) . '">';
                                                echo '<input class="radio" type="radio" name="teg3" value="' . htmlspecialchars($cellValue2, ENT_QUOTES) . '" id="checkbox3_' . htmlspecialchars($cellValue2, ENT_QUOTES) . '">';
                                                echo '<label for="checkbox3_' . htmlspecialchars($cellValue2, ENT_QUOTES) . '">';
                                                echo htmlspecialchars($cellValue2, ENT_QUOTES);
                                                echo '</label>';
                                            echo '</label>';
                                        echo '</div>';
                                    echo '</li>';
                                echo '</ul>';
                            echo '</div>';
                            echo '<div class="col-md-2 p-0">';
                                echo '<a href="#' . $checkboxId1 . '" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle d-flex justify-content-center align-items-center" ></a>';
                            echo '</div>';
                        echo '</div>';
                        $counter2++;
                        echo '<ul class="collapse list-unstyled pageSubmenu2" id="' . $checkboxId1 . '" style="margin-bottom: 0px;">';
                        renderteg4Dropdown($conn, $cellValue2); // Pass $cellValue to the next function
                        echo '</ul>';
               
                }
            }
        }
    }
}
function teg4Query($conn, $query3) {
    $stmt3 = mysqli_prepare($conn, $query3);
    mysqli_stmt_execute($stmt3);
    return mysqli_stmt_get_result($stmt3);
}

function renderteg4Dropdown($conn, $cellValue2) {
    $query3 = 'SELECT DISTINCT document.teg4 FROM document WHERE (document.name_doc="Технический Департамент" AND document.teg3 = "' . $cellValue2 . '") ORDER BY BINARY teg4';
    $result3 = teg4Query($conn, $query3);
    
    if (mysqli_num_rows($result3) > 0) {
        $counter3 = 1; // Initialize a counter for unique IDs

        while ($row3 = mysqli_fetch_array($result3, MYSQLI_NUM)) {
            foreach ($row3 as $cellValue3) {
                if (!empty($cellValue3) && $cellValue3 !== '-') {
                    $checkboxId2 = 'checkbox2_' . $counter3; // Generate a unique ID for checkbox
                    
                        echo '<div class="row dropdown-border" style="padding: 1px 1px;">';
                            echo '<div class="p-0 col-md-10">';
                                echo '<ul class="list-unstyled components">';
                                    echo '<li>';
                                        echo '<div class="nav-link text-black " style="padding: 5px 10px;" name="teg4">';
                                            echo '<label class="tag-checkbox " for="checkbox4_' . htmlspecialchars($cellValue3, ENT_QUOTES) . '">';
                                                echo '<input class="radio" type="radio" name="teg4" value="' . htmlspecialchars($cellValue3, ENT_QUOTES) . '" id="checkbox4_' . htmlspecialchars($cellValue3, ENT_QUOTES) . '">';
                                                echo '<label for="checkbox4_' . htmlspecialchars($cellValue3, ENT_QUOTES) . '">';
                                                    echo htmlspecialchars($cellValue3, ENT_QUOTES);
                                                echo '</label>';
                                            echo '</label>';
                                        echo '</div>';
                                    echo '</li>';
                                echo '</ul>';
                            echo '</div>';
                            echo '<div class="col-md-2 p-0">';
                                echo '<a href="#' . $checkboxId2 . '" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle d-flex justify-content-center align-items-center" ></a>';
                            echo '</div>';
                        echo '</div>';
                        $counter3++;
                        echo '<ul class="collapse list-unstyled pageSubmenu2" id="' . $checkboxId2 . '" style="margin-bottom: 0px;">';
                        renderteg5Dropdown($conn, $cellValue3); // Pass $cellValue to the next function
                        echo '</ul>';
                }
            }
        }
    }
}
function teg5Query($conn, $query4) 
{
    $stmt4 = mysqli_prepare($conn, $query4);
    mysqli_stmt_execute($stmt4);
    return mysqli_stmt_get_result($stmt4);
}
function renderteg5Dropdown($conn,$cellValue3) 
{
    $query4 = 'SELECT DISTINCT document.teg5 FROM document  WHERE (document.name_doc="Технический Департамент"  AND document.teg4 = "' . $cellValue3 . '")) ORDER BY BINARY teg5';
    $result4 = teg5Query($conn, $query4);
    if (mysqli_num_rows($result4) > 0) 
    {
        echo '<div class="mb-4 mamba w-100" name="Tip_obor">';
        echo '<a href="#" class="mb-1 nav-link text-black pl-4" id="navbarDropdown" name="teg5" role="button" data-toggle="dropdown" aria-expanded="false">';
        echo 'Тэг 5</a>';
        echo'<input type="hidden" name="teg5" value="" />';
        while ($row = mysqli_fetch_array($result4, MYSQLI_NUM)) 
        {
            foreach ($row as $cellValue4) 
            {
                if (!empty($cellValue4) && $cellValue4 !== '-') 
                {
                    echo '<label class="tag-checkbox mb-2" for="checkbox5_' . htmlspecialchars($cellValue4, ENT_QUOTES) . '">';
                    echo '<input class="checkbox" type="checkbox" name="teg5" value="' . htmlspecialchars($cellValue4, ENT_QUOTES) . '" id="checkbox5_' . htmlspecialchars($cellValue4, ENT_QUOTES) . '">';
                    echo '<label for="checkbox5_' . htmlspecialchars($cellValue4, ENT_QUOTES) . '">';
                    echo htmlspecialchars($cellValue4, ENT_QUOTES);
                    echo '</label>';
                    echo '</label>';
                }
            }
        }
        echo '</div>';
    } 
}
// Call the initial dropdown rendering function

renderteg1Dropdown($conn);

?>
</div>



                
            

            <?php
            
            // function teg2Query($conn, $query) 
            // {
            //     $stmt = mysqli_prepare($conn, $query);
            //     mysqli_stmt_execute($stmt);
            //     return mysqli_stmt_get_result($stmt);
            // }
            //     function renderteg2Dropdown($conn) {
            //     $query = 'SELECT DISTINCT document.teg2 FROM document  WHERE (document.name="Отдел кадров") ORDER BY BINARY teg2';
            //     $result = teg2Query($conn, $query);
            //     if (mysqli_num_rows($result) > 0) 
            //     {
            //         echo '<div class="mb-2 mamba w-100" name="teg2">';
            //         echo '<a href="#" class="mb-1 nav-link text-black pl-4" id="navbarDropdown" name="teg2[]" role="button" data-toggle="dropdown" aria-expanded="false">';
            //         echo 'Примеры</a>';
            //         echo'<input type="hidden" name="teg2" value="" />';
            //         while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) 
            //         {
            //             foreach ($row as $cellValue) 
            //             {
            //                 if (!empty($cellValue) && $cellValue !== '-') 
            //                 {
            //                     echo '<label class="tag-checkbox mb-2" for="checkbox2_' . htmlspecialchars($cellValue, ENT_QUOTES) . '">';
            //                     echo '<input class="checkbox" type="checkbox" name="teg2[]" value="' . htmlspecialchars($cellValue, ENT_QUOTES) . '" id="checkbox2_' . htmlspecialchars($cellValue, ENT_QUOTES) . '">';
            //                     echo '<label for="checkbox2_' . htmlspecialchars($cellValue, ENT_QUOTES) . '">';
            //                     echo htmlspecialchars($cellValue, ENT_QUOTES);
            //                     echo '</label>';
            //                     echo '</label>';
            //                 }
            //             }
            //         }
            //         echo '</div>';
            //     } 
            // }

        
            // echo '<div>';
            // renderteg2Dropdown($conn);
            // echo '</div>';
            
            // echo '<div class="item_text">';
            // renderteg5Dropdown($conn);
            // echo '</div>';
            
            ?>
            
            
                    <!-- <a href="#" class="nav-link  text-black pl-4" id="navbarDropdown" name="name" role="button" data-toggle="dropdown" aria-expanded="false">
                        К кому относится</a>
                    <ul class=" w-100" data-auto-close="false" style="padding: 10px; list-style-type: none;"  aria-labelledby="navbarDropdown">
                        <li class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="name" id="inlineRadioAll" value="" checked>
                            <label class="form-check-label" for="inlineRadioAll">Все</label>
                        </li>
                        <?php
                                // $query = 'SELECT DISTINCT document.name FROM document ORDER BY BINARY name';
                                // $data  = mysqli_query($conn, $query) or die('<br>Ошибка выполнения запроса');
                                // if(mysqli_num_rows($data) > 0)
                                // {
                                //     // $numrows=mysqli_num_rows($data);// Для отладки
                                //     while($row = mysqli_fetch_assoc($data))
                                //     {// Формируем таблицу
                                //             foreach ($row as $key => $cellValue) {
                                //                 if (!empty($cellValue)) {
                                //                 echo"<li class='form-check form-check-inline '><input class='form-check-input' type='radio' name='name' value='$cellValue' id='inlineRadio1_$cellValue' >
                                //                 <label class='form-check-label' for='inlineRadio1_$cellValue'>$cellValue</li>";}
                                //             }
                                //     }
                                // }
                                // else
                                // {
                                    // echo "<br>По запросу ничего не нашлось";
                                    ?>
                                    <tr>
                                        <td>
                                            По запросу ничего не нашлось
                                        </td>
                                    </tr>
                                    <?php
                                // }
                            ?>     
                    </ul>  -->
            
                <div class=" p-3 mb-4 chess ">
                <h5 class="overtext mb-2 mt-2 otstupmen">Расширение</h5>
                <?php
                function Fael_vocQuery($conn, $query) {
                    $stmt = mysqli_prepare($conn, $query);
                    mysqli_stmt_execute($stmt);
                    return mysqli_stmt_get_result($stmt);
                }

                function renderFael_vocDropdown($conn) {
                    $query = 'SELECT document.Fael_voc FROM document WHERE (document.name_doc="Технический Департамент") ORDER BY BINARY Fael_voc';
                    $result = Fael_vocQuery($conn, $query);
                    if (mysqli_num_rows($result) > 0) {
                        echo'<input type="hidden" name="Fael_voc" value="" />';
                        $displayedValues = array(); // Array to store displayed values
                        while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
                            foreach ($row as $cellValue) {
                                if (!empty($cellValue) && !in_array($cellValue, $displayedValues)) {
                                    echo '<label class="tag-checkbox mb-2  ms-2 me-2" for="checkbox_' . htmlspecialchars($cellValue, ENT_QUOTES) . '">';
                                    echo '<input class="checkbox" type="checkbox" name="Fael_voc[]" value="' . htmlspecialchars($cellValue, ENT_QUOTES) . '" id="checkbox_' . htmlspecialchars($cellValue, ENT_QUOTES) . '">';
                                    echo '<label for="checkbox_' . htmlspecialchars($cellValue, ENT_QUOTES) . '">';
                                    echo htmlspecialchars($cellValue, ENT_QUOTES);
                                    echo '</label>';
                                    echo '</label>';
                                    $displayedValues[] = $cellValue; // Add the displayed value to the array
                                }
                            }
                        }
                    } 
                }
                renderFael_vocDropdown($conn);
                ?>
                   </div>
                   <div class="mb-4 chess ">
                <label for="airdatepicker" class="sr-only " onchange ="requestr()">
                <h5 class="mb-2 otstupmen">Дата</h5>
                <input type="text" id="airdatepicker" style="padding: 10px 20px;"name="doc_data[]" class="form-control mb-2" placeholder="Выберите дату внесения информации" onchange ='alert("changed");'>
                </div>
                </label>
                <div class="btn-group-vertical position-sticky" style="width: 100%;height: 100%;   display: block;top: 2rem;">
                    <input class="mb-2 btn btn-primary" type="submit"  name="Сброс настроек" id="buttonClear" value="Сброс настроек"  onClick="window.location.reload();"></input>
                </div>
            </div>
        </form>
        </div>
        </nav>
        </div>
    </div>
    <div class="col-md-9">
    <div class="row ajaxout">

        <?php
        // Включаем файл script.php
        include 'doci_scr.php';
        ?>
        </div>
        <script>
           
          async function requestr() {
    try {
      
        getFormName();
            const formName = getFormName(); // Получаем имя активной формы
            radioclear(event, formName); // Переместите вызов функции сюда
        var formData = new FormData(document.getElementById("myForm"));
   
        
        // Проверка formData, если это необходимо
        for (var pair of formData.entries()) {
            console.log(pair[0] + ', ' + pair[1]);
        }
    
        let res = await fetch("doci_scr.php", {
            method: 'POST',
            body: formData,
        });

        if (res.ok) {
            let text = await res.text();
            console.log("Успешный ответ:", text);
            let block = document.querySelector(".ajaxout");
            block.innerHTML = "";

            // ClearFormData1() ;
            block.innerHTML = text;
            AddEvents(block);
            updateClassBasedOnScreenSize();
            saveFormData();
            loadFormData();
            ClearFormData1();
            } else {
            console.error("Ошибка запроса:", res.status, res.statusText);
            }   } catch (error) {
        console.error("Ошибка:", error);
    }

    // Колбек: Загрузка scripts.js

}
function AddEvents(block)
{

}
$(document).ready(function() {
    // Определение функции для отправки запроса
    requestr();
    // Привязка функции requestr к событию ввода
    $("#myForm").on("input", "input", requestr);
});



// console.log("Form Data:", formData);
</script>
<script async src="./js/scripts.js?vers=99" ></script>
        </div>
    </div>
    </div>
    
</main>