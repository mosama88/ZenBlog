<?php
    require_once "../../app/config.php";
    $conn = mysqli_connect(hostname, username, password, database);
    
    
    if (checkMethodRequest("POST") && isset($_POST['to'])) {
        $errors = [];
        
        $name = sanitizeInpt($_POST['name']);
        $from = sanitizeInpt($_POST['from']);
        $to = sanitizeInpt($_POST['to']);
        $num_of_days = sanitizeInpt($_POST['num_of_days']);
        
        //Validation Name
        if (emptyValidInput($name)) {
            echo $errors[] = "الحقل الأسم مطلوب";
        } elseif (minValidInput($name, 5)) {
            echo $errors[] = "يجب أن يكون الحقل اكثر من 5 أحرف";
        } elseif (maxValidInput($name, 30)) {
            echo $errors[] = "يجب أن يكون الحقل أقل من 30 أحرف";
        }
        
        //Validation From
        if (emptyValidInput($from)) {
            echo $errors[] = "الحقل بداية الأجازه مطلوب";
        }
        
        //Validation To
        if (emptyValidInput($to)) {
            echo $errors[] = "الحقل نهاية الأجازه مطلوب";
        }
        
        if ($from > $to) {
            echo $errors[] = "يجب أن يكون حقل بداية الاجازه قبل نهايتها";
        }
        
        //Validation Num_Of_Days
        if (emptyValidInput($num_of_days)) {
            echo $errors[] = "حقل عدد أيام الأجازه مطلوب";
        }
        
        $_SESSION['errors'] = $errors;
        
        if (empty($errors)) {
            
            $sql = "INSERT INTO `holidays` (`name`,`from`,`to`,`num_of_days`)VALUES('$name','$from','$to','$num_of_days')";
            $result = mysqli_query($conn, $sql);
            $_SESSION['success'] = "تم أضافة الأجازه بنجاح";
            redirect(URL . "views/dashboard/holidays/index.php");
            die();
        } else {
            $_SESSION['errors'][] = "عفوآ لقد حدث خطأ ما";
            redirect(URL . "views/dashboard/holidays/index.php");
            die();
            
        }
        
        
    }