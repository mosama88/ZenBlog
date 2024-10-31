<?php
    require_once '../../app/config.php';
    $conn = mysqli_connect(hostname, username, password, database);
    
    if (!$conn) {
        echo "connect error " . mysqli_connect_error($conn);
    }
// تعريف مصفوفة الأخطاء ومُتغير النجاح
    $errors = [];
    $success = "";
    if (checkMethodRequest("POST") == "POST" && isset($_POST['name'])) {
        
        $name = sanitizeInpt($_POST['name']);
        $id = $_GET['id'];
        
        if (emptyValidInput($name)) {
            $errors[] = "حقل أسم المدينة مطلوب";
        } elseif (minValidInput($name, 5)) {
            $errors[] = "برجاء إدخال أكثر من 5 أحرف";
        } elseif (maxValidInput($name, 30)) {
            $errors[] = "برجاء إدخال أقل من 30 حرف";
        }
        
        
        // تخزين الأخطاء في الجلسة إذا وجدت
        $_SESSION['errors'] = $errors;
        
        if (empty($errors)) {
            $sql = "UPDATE  `cities` SET `name` = '$name' WHERE `id` = '$id'";
            $result = mysqli_query($conn, $sql);
            
            if ($result) {
                echo $_SESSION['success'] = "تم تعديل البيانات بنجاح";
            } else {
                $_SESSION['errors'][] = "حدث خطأ أثناء تحديث البيانات";
            }
            
        }
        redirect(URL . "views/dashboard/cities/index.php");
        die();
    }

