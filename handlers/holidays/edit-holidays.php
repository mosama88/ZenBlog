<?php
    
    require_once "../../app/config.php";
    $conn = mysqli_connect(hostname, username, password, database);
    
    if (!$conn) {
        echo "عفوًا، حدث خطأ في الاتصال بقاعدة البيانات: " . mysqli_connect_error();
        die();
    }
    
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $errors = [];
        
        $id = $_GET['id'];
        $name = sanitizeInpt($_POST['name']);
        $from = sanitizeInpt($_POST['from']);
        $to = sanitizeInpt($_POST['to']);
        $num_of_days = sanitizeInpt($_POST['num_of_days']);
        
        //Validation Name
        if (emptyValidInput($name)) {
            echo $errors[] = "الحقل الأسم مطلوب";
        } elseif (minValidInput($name, 5)) {
            echo $errors[] = "يجب أن يكون الحقل اكثر من 5 أحرف";
        } elseif (maxValidInput($name, 100)) {
            echo $errors[] = "يجب أن يكون الحقل أقل من 100 أحرف";
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
            $sql = "UPDATE `holidays` SET `name` = '$name',`from` = '$from',`to` = '$to',`num_of_days` = '$num_of_days'
WHERE `id` = $id";
            $result = mysqli_query($conn, $sql);
            redirect(URL . "views/dashboard/holidays/index.php");
            $_SESSION['success'] = "تم تعديل البيانات بنجاح";
            die();
        } else {
            redirect(URL . "views/dashboard/holidays/index.php");
            $_SESSION['errors'][] = "عفوآ لقد حدث خطأ";
        }
        
    }


