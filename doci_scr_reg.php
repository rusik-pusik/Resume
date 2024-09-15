<?php

// echo "Script - doci_scr.php";
// print_r($_POST);
//die();
                $server="127.0.0.1";
                $user  ="root";
                $pass  ="1";
                $dbname ="bd_infocell_docs";
                $dbtable ="document";
                $conn  = mysqli_connect($server, $user,$pass, $dbname);
               //Типа запрос делаем все равно, вначале для всей таблицы
       
                    //   foreach ($_POST as $value) {
                    //     echo $value . "<br>";
                    // }
                    
                    
           
                    //  echo "DEBUG - Есть POST";
                    // // также точка с запятой отсутствовала
                    // foreach ($_POST as $value) {
                    //     echo $value . "<br>";
                    // }
                    function linkify($text) 
                    {
                        // Regular expression to detect URLs
                        $pattern = '/\b((?:https?:\/\/|www\.)[^\s<]+[^\s<\.)])\b/';
                        // Replace URLs with clickable links
                        $text = preg_replace($pattern, '<a href="$1" target="_blank">$1</a>', $text);
                        return $text;
                    }
                    // file_put_contents('request_log.txt', print_r($_POST, true));

                    // Your existing code for processing the request
                    // ...
                    
                    // Respond to the request
                    // echo "Request received successfully!";
                    // Sanitize and validate the input data
                    $name_doc = isset($_POST['name_doc']) ? $_POST['name_doc'] : "";
                    $about_doc = isset($_POST['name_new']) ? $_POST['name_new'] : "";
                    $teg1 = isset($_POST['teg1']) ? $_POST['teg1'] : "";
                    $teg2 = isset($_POST['teg2']) ? $_POST['teg2'] : "";
                    $teg3 = isset($_POST['teg3']) ? $_POST['teg3'] : "";
                    $teg4 = isset($_POST['teg4']) ? $_POST['teg4'] : "";
                    $teg5 = isset($_POST['teg5']) ? $_POST['teg5'] : "";
                    $Fael_voc = isset($_POST['Fael_voc']) ? $_POST['Fael_voc'] : "";
                    $doc_data = isset($_POST['doc_data']) ? $_POST['doc_data'] : '';
                    // echo "Значения переменных about_doc $about_doc teg1 $teg1 teg2 $teg2 doc_data $doc_data";
              
                    // $about_doc = isset($formData['name_new']) ? htmlspecialchars(trim($formData['name_new'])) : "";
                    // $name_doc = isset($formData['name_doc']) ? htmlspecialchars(trim($formData['name_doc'])) : "";
                    // $teg1 = isset($formData['teg1']) ? htmlspecialchars(trim($formData['teg1'])) : "";
                    // $teg2 = isset($formData['teg2']) ? htmlspecialchars(trim($formData['teg2'])) : "";
                    // $teg3 = isset($formData['teg3']) ? htmlspecialchars(trim($formData['teg3'])) : "";
                    // $teg4 = isset($formData['teg4']) ? htmlspecialchars(trim($formData['teg4'])) : "";
                    // $teg5 = isset($formData['teg5']) ? htmlspecialchars(trim($formData['teg5'])) : "";
                    // echo "Teg1: " . $name_doc . "<br>";

                        $mass3 = array();
                        if (is_array($doc_data) || is_object($doc_data)) {
                           
                        foreach ($doc_data as $date_range) 
                        {
                            $dates = explode(" - ", $date_range);

                            if (count($dates) === 2) { // Проверка, что есть начальная и конечная дата
                                $start_date = $dates[0];
                                $end_date = $dates[1];

                                $start_timestamp = strtotime($start_date);
                                $end_timestamp = strtotime($end_date);

                                $start_datetime = new DateTime(date("Y-m-d", $start_timestamp));
                                $end_datetime = new DateTime(date("Y-m-d", $end_timestamp));

                                $interval = new DateInterval('P1D');

                                $period = new DatePeriod($start_datetime, $interval, $end_datetime);

                                foreach ($period as $date123) {
                                    $formatted_date = $date123->format('Y-m-d');
                                    // echo $formatted_date . "<br>";

                                    // Добавляем дату в массив $mass3
                                    $mass3[] = $formatted_date;
                                }
                            } else {
                                // Преобразование одиночной даты в формат 'Y-m-d' и добавление ее в массив $mass3
                                if (!empty($date_range)) {
                                    $formatted_date = date_format(date_create($date_range), 'Y-m-d');
                                } else {
                                    // Обработка случая, когда $date_range пустая
                                    $formatted_date = ''; // Или любое другое значение, которое вам нужно
                                }
                                $mass3[] = $formatted_date;
                            
                                
                            }
                        }
                    }
                        //    echo "Name: " . $teg1 . "<br>";
                        //     echo "About: " . $about_doc . "<br>";
                        //     echo "Teg1: " . $teg1 . "<br>";
                        // В массиве $mass3 теперь хранятся все даты в формате 'Y-m-d'
                        // Вывод содержимого массива $mass3
                        // print_r($massdoc_data);
                                            
                    // error_log(print_r($_POST, true));
     

                //создаем условие для выборки
                if ($name_doc !="" ||!empty($mass3) && !in_array('', $mass3, true)|| $teg1 !="" || $teg2 !="" || $teg3 !="" || $teg4 !="" || $about_doc !="" || $teg5 !="" || $Fael_voc !="")
                {
                
                    $mass = array(
              
                        "0" => "$teg1",
                        "1" => "$teg2",
                        "2" => "$teg3",
                        "3" => "$teg4",
                        "4" => "$teg5",
                    );
                    $mass1 = array(
                    
                      
                        "0" => "document.teg1",
                        "1" => "document.teg2",
                        "2" => "document.teg3",
                        "3" => "document.teg4",
                        "4" => "document.teg5",
                    );
                    // echo " DEBUG - Прошли условие ";
                    $a="";
                    $b ="";
                    $SQLCond="";
                    $SQLCond1="";
                    $SQLCond2="";
                    $SQLCond3="";
                    $SQLCond4="";
                    $SQLCond5="";
                    $SQLCond6="";
                    $SQLCond7="";
                    for($i=0; $i<5; $i++)
                    {
                        if(!($mass[$i]==""))
                        {
                            $SQLCond0="";
                            $SQLCond0="($mass1[$i]= '$mass[$i]')".$SQLCond0;
                            // echo $SQLCond0;

                            if(($SQLCond0!="" and $a!=""))
                            {
                                $a = $a . ' AND ' . $SQLCond0;
                            }
                            else 
                            {
                                $a = $a . $SQLCond0;
                                
                            }
                            
                        }
                    }
                    // Поиск по тексту новости
                    if(!($about_doc=="")) {
                        // Нет необходимости добавлять "$text_news" здесь
                        // echo "\n\rSQLCond = $SQLCond";
                    
                        $SQLCond2 = $about_doc . $SQLCond2;
                        if(($SQLCond2!=""))
                            {
                                $b = $b . $SQLCond2;
                                
                            }
                            $b = "  MATCH (doc_name) AGAINST('*$b*' IN BOOLEAN MODE)";
                            if(($b!="" and $a!=""))
                            {
                                $a = $a . ' AND      ' . $b;
                            }
                            else 
                            {
                                $a = $a . $b;
                            }
                    
            
                    }
                
                    if (!in_array('', $mass3, true)) {
                        $str = "";
                        $first5 = true;
                        foreach ($mass3 as $formatted_date1) {
                        
                            if ($first5) {
                                $first5 = false;
                            
                                $str = "(document.doc_data = '$formatted_date1')" ;
                            } else {
                            
                                $str =  "(".$str . " OR (document.doc_data = '$formatted_date1'))";
                            }
                            
                        }
                    
                        $SQLCond5 = $str . $SQLCond5;
                        
                        // Выводим содержимое SQLCond5
                        
                        if (($SQLCond5 != "" and $a != "")) {
                            $a = $a . ' AND ' . $SQLCond5;
                        } else {
                            $a = $a . $SQLCond5;
                        }
                    }
                    if (!($Fael_voc == "")) {
                        $str = "";
                        $first = true;
                        foreach ($Fael_voc as $Fael_vocNum => $value) {
                            if ($first) {
                                $first = false;
                                $str = "(document.Fael_voc = '$value')" ;
                            } else {
                                $str =  "(".$str . " OR (document.Fael_voc = '$value'))";
                            }
                        }
                        $SQLCond3 = $str . $SQLCond3;
                        if (($SQLCond3 != "" and $a != "")) {
                            $a = $a . ' AND ' . $SQLCond3;
                        } else {
                            $a = $a . $SQLCond3;
                        }
                    }
                    // if (!($teg2 == "")) {
                    //     $str = "";
                    //     $first = true;
                    //     foreach ($teg2 as $teg2Num => $value) {
                    //         if ($first) {
                    //             $first = false;
                    //             $str = "(document.teg2 = '$value')" ;
                    //         } else {
                    //             $str =  "(".$str . " OR (document.teg2 = '$value'))";
                    //         }
                    //     }
                    //     $SQLCond4 = $str . $SQLCond4;
                    //     if (($SQLCond4 != "" and $a != "")) {
                    //         $a = $a . ' AND ' . $SQLCond4;
                    //     } else {
                    //         $a = $a . $SQLCond4;
                    //     }
                    // }
                    // if (!($teg3 == "")) {
                    //     $str = "";
                    //     $first = true;
                    //     foreach ($teg3 as $teg3Num => $value) {
                    //         if ($first) {
                    //             $first = false;
                    //             $str = "(document.teg3 = '$value')" ;
                    //         } else {
                    //             $str =  "(".$str . " OR (document.teg3 = '$value'))";
                    //         }
                    //     }
                    //     $SQLCond6 = $str . $SQLCond6;
                    //     if (($SQLCond6 != "" and $a != "")) {
                    //         $a = $a . ' AND ' . $SQLCond6;
                    //     } else {
                    //         $a = $a . $SQLCond6;
                    //     }
                    // }
                    // if (!($teg4 == "")) {
                    //     $str = "";
                    //     $first = true;
                    //     foreach ($teg4 as $teg4Num => $value) {
                    //         if ($first) {
                    //             $first = false;
                    //             $str = "(document.teg4 = '$value')" ;
                    //         } else {
                    //             $str =  "(".$str . " OR (document.teg4 = '$value'))";
                    //         }
                    //     }
                    //     $SQLCond7 = $str . $SQLCond7;
                    //     if (($SQLCond7 != "" and $a != "")) {
                    //         $a = $a . ' AND ' . $SQLCond7;
                    //     } else {
                    //         $a = $a . $SQLCond7;
                    //     }
                    // }
                    // if (!($teg5 == "")) {
                    //     $str = "";
                    //     $first = true;
                    //     foreach ($teg5 as $teg5Num => $value) {
                    //         if ($first) {
                    //             $first = false;
                    //             $str = "(document.teg5 = '$value')" ;
                    //         } else {
                    //             $str =  "(".$str . " OR (document.teg5 = '$value'))";
                    //         }
                    //     }
                    //     $SQLCond8 = $str . $SQLCond8;
                    //     if (($SQLCond8 != "" and $a != "")) {
                    //         $a = $a . ' AND ' . $SQLCond8;
                    //     } else {
                    //         $a = $a . $SQLCond8;
                    //     }
                    // }
            
                    $query = 'SELECT 
                    document.name_doc,
                    document.doc_data,
                    document.doc_name,
                    document.doc_link,
                    document.img_link,
                    document.teg1,
                    document.teg2,
                    document.teg3,
                    document.teg4,
                    document.teg5, 
                    document.Fael_voc
                    FROM document  WHERE (document.name_doc="Регламенты") AND'. ($a); // Переписали $query если есть дополнит. условия
                }
        //   echo  "Сформировали запрос $query";
        ?> 
<?php if (isset($query) && !empty($query)):?>
<?php  $data = mysqli_query($conn, $query) or die('<br>Ошибка выполнения запроса');?>
    <?php if (mysqli_num_rows($data) > 0): ?>
        <?php while ($row = mysqli_fetch_assoc($data)): ?>
            <div class="col-md-4 tigran myDiv mb-4" id="myDiv">
                <div class=" custom-container row g-0 border rounded overflow-hidden flex-md-row  shadow-sm h-md-200 position-relative" style="height: 100%;">
                    <div class="col p-3 d-flex flex-column position-static overflow-hidden "  >
                    <div class="col-auto d-none d-lg-block text-center">
                    <?php
                        $latestlin1 = isset($row['doc_link']) ? explode(',', $row['doc_link']) : [];
                        $latestlin2 = isset($row['img_link']) ? explode(',', $row['img_link']) : [];
                        ?>
                         <?php if (!empty($latestlin1)): ?>
                            <?php foreach ($latestlin1 as $lin1): ?>
                                <?php if (!empty($lin1)): ?>
                                    <a href="<?php echo $lin1; ?>" target="_blank" class="stretched-link "></a>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    <svg class="bd-placeholder-img mx-auto" width="120" height="150" role="img" aria-label="Placeholder: Image" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <?php
                        // Получаем расширение файла
                        $extension = pathinfo($lin1, PATHINFO_EXTENSION);

                        if ($extension == 'doc' || $extension == 'docx') {
                            $image = '\images\1352947.png';
                            ?>
                            <image x="0" y="0" width="119" height="150" xlink:href="<?php echo $image; ?>" />
                            <?php
                        } elseif ($extension == 'pdf') {
                            
                            $image1 = '\images\pdf.png';
                            ?>
                            <image x="0" y="0" width="119" height="150" xlink:href="<?php echo $image1; ?>" />
                            <?php
                        } elseif ($extension == 'xlsm') {
                            $image2 = '\images\img_261109.png';
                            ?>
                            <image x="0" y="0" width="119" height="150" xlink:href="<?php echo $image2; ?>" />
                            <?php
                        } else {
                            $image3 = '\images\logo1.png';
                            ?>
                            <image x="0" y="0" width="119" height="150" xlink:href="<?php echo $image3; ?>" />
                            <?php
                        }
                        ?>
                    </svg>
                    </div>
                        <h5 class="mb-1 overtext"><strong class="d-inline-block mb-2 text-success"><?php echo htmlentities($row['doc_name']); ?></strong></h5>
                        <div class="d-flex align-items-center">
                            <div class="mb-1 text-muted"><?php echo htmlentities($row['doc_data']); ?></div>
                        </div>
                        <div class="d-flex flex-wrap">
                            <?php
                            // $name_tags1 = explode(',', $row['teg1']);
                            // foreach ($name_tags1 as $name_tag1) {
                            //     if ($name_tag1 !== "-") {
                            //         echo "<li class='badge bg-secondary custom-badge mb-1' href='" . htmlentities((string)$name_tag1) . "'>" . htmlentities((string)$name_tag1) . "</li>";
                            //     }
                            // }
                            ?>
                                <?php
                            // $name_tags2 = explode(',', $row['teg2']);
                            // foreach ($name_tags2 as $name_tag2) {
                            //     if ($name_tag2 !== "-") {
                            //         echo "<li class='badge bg-secondary custom-badge mb-1' href='" . htmlentities((string)$name_tag2) . "'>" . htmlentities((string)$name_tag2) . "</li>";
                            //     }
                            // }
                            ?>
                                <?php
                            // $name_tags3 = explode(',', $row['teg3']);
                            // foreach ($name_tags3 as $name_tag3) {
                            //     if ($name_tag3 !== "-") {
                            //         echo "<li class='badge bg-secondary custom-badge mb-1' href='" . htmlentities((string)$name_tag3) . "'>" . htmlentities((string)$name_tag3) . "</li>";
                            //     }
                            // }
                            ?>
                                <?php
                            // $name_tags4 = explode(',', $row['teg4']);
                            // foreach ($name_tags4 as $name_tag4) {
                            //     if ($name_tag4 !== "-") {
                            //         echo "<li class='badge bg-secondary custom-badge mb-1' href='" . htmlentities((string)$name_tag4) . "'>" . htmlentities((string)$name_tag4) . "</li>";
                            //     }
                            // }
                            ?>
                                <?php
                            // $name_tags5 = explode(',', $row['teg5']);
                            // foreach ($name_tags5 as $name_tag5) {
                            //     if ($name_tag5 !== "-") {
                            //         echo "<li class='badge bg-secondary custom-badge mb-1' href='" . htmlentities((string)$name_tag5) . "'>" . htmlentities((string)$name_tag5) . "</li>";
                            //     }
                            // }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
        <?php else: ?>
            <div id="content">
                <ol class="ul">
                </ol>
            </div>
        <?php endif; ?>
        <?php else: ?>
            <ol class="ul">
                <h1 style="text-align: center; border: 10px solid #ddd; padding: 10px;">Выберите фильтры</h1>
            </ol>
        <?php endif; ?>