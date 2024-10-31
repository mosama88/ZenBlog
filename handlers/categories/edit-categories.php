<?php
    
    
    require_once '../../app/config.php';
    $conn = mysqli_connect(hostname, username, password, database);
    
    if (!$conn) {
        echo "connect error " . mysqli_connect_error($conn);
    }
    
    $errors = [];
    
    if (checkMethodRequest("POST") && isset($_GET['id'])) {
        
        $name = sanitizeInpt($_POST['name']);
        $id = $_GET['id'];
        
        if (emptyValidInput($name)) {
            $errors[] = 'حقل أسم الفئة مطلوب';
        } elseif (minValidInput($name, 5)) {
            $errors[] = ' الأسم لا يقبل أقل من او يساوى 3 أحرف';
        } elseif (maxValidInput($name, 30)) {
            $errors[] = ' الأسم لا يقبل أكثر من او يساوى 30 حرف';
        }
        
        // تخزين الأخطاء في الجلسة إذا وجدت
        $_SESSION['errors'] = $errors;
        
        if (empty($errors)) {
            $sql = "UPDATE `categories` SET `name` = '$name' WHERE `id` = $id";
            $result = mysqli_query($conn, $sql);
            
            if ($result) {
                $_SESSION['success'] = "تم أضافة الفئة بنجاح";
                
            } else {
                $_SESSION['errors'] = "عفوآ لقد حدث خطآ ما !!";
            }
        }
        redirect(URL . "views/dashboard/categories/index.php");
        die();
    }