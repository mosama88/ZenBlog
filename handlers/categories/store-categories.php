<?php
    
    
    require_once '../../app/config.php';
    
    $errors = [];
    $success = [];
    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['name'])) {
        $name = trim(htmlspecialchars(htmlentities($_POST['name'])));
        
        if (empty($name)) {
            echo $errors[] = 'حقل أسم الفئة مطلوب';
        } elseif (strlen($name) < 3) {
            echo $errors[] = ' الأسم لا يقبل أقل من او يساوى 3 أحرف';
        } elseif (maxValidInput($name, 100)) {
            echo $errors[] = ' الأسم لا يقبل أكثر من او يساوى 100 حرف';
        } else {
            echo $success = "تم أضافة الفئة بنجاح";
        }
    }
    if (empty($errors)) {
        $conn = mysqli_connect(hostname, username, password, database);
        if (!$conn) {
            echo "هناك خطأ فى الاتصال بقاعدة البيانات: " . mysqli_connect_error($conn);
        }
        $sql = "INSERT INTO `categories` (`name`)VALUES('$name')";
        $result = mysqli_query($conn, $sql);
        $_SESSION['success'] = $success;
        redirect("../../views/dashboard/categories/index.php");
        die();
    } else {
        $_SESSION['errors'] = $errors;
        redirect("../../views/dashboard/categories/index.php");
        die();
    }