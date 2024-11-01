<?php
    require_once "../../app/config.php";
    $conn = mysqli_connect(hostname, username, password, database);
    $errors = [];
    $success = "";
    if ($_SERVER["REQUEST_METHOD"] == 'POST' && isset($_POST['name'])) {
        $name = trim(htmlspecialchars(htmlentities($_POST['name'])));
        
        if (empty($name)) {
            echo $errors[] = "حقل الاسم مطلوب";
        } elseif (strlen($name) < 5) {
            echo $errors[] = "يجب ان يكون الحقل أكثر من 5 أحرف";
        } elseif (maxValidInput($name, 100)) {
            echo $errors[] = "يجب ان يكون الحقل أقل من 100 أحرف";
        } else {
            echo $success = "تم أضافة المدينه بنجاح";
        }
        
        if (empty($errors)) {
            $sql = "INSERT INTO  `cities` (`name`)VALUES('$name')";
            mysqli_query($conn, $sql);
            $_SESSION['success'] = $success;
            header("Location: ../../views/dashboard/cities/index.php");
            die();
        } else {
            $_SESSION['errors'] = $errors;
            header("Location: ../../views/dashboard/cities/index.php");
            die();
        }
    }