<?php
    require_once '../app/config.php';
    
    
    if (isset($_GET['id'])) {
        $conn = mysqli_connect(hostname, username, password, database);
        if (!$conn) {
            echo "خطأ بالاتصال" . mysqli_connect_error($conn);
        }
        
        $id = $_GET['id'];
        $sql = "SELECT * FROM `categories` WHERE `id` = '$id'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_row($result);
        if (!$row) {
            $errors = "عفوآ البيانات غير موجوده";
            header("location: ../views/dashboard/categories/index.php");
            die();
        }
        
        
        $sql = "DELETE FROM `categories` WHERE `id` = '$id'";
        $result = mysqli_query($conn, $sql);
        $success = "تم الحذف بنجاح";
        
        if (mysqli_affected_rows($conn) > 0) {
            $_SESSION['success'] = "تم الحذف بنجاح";
        } else {
            $_SESSION['errors'] = "بياناتك غير موجودة";
        }
        header("location: ../views/dashboard/categories/index.php");
        die();
        
    } else {
        echo $errors = "لا يمكن الحذف";
        header("location: ../views/dashboard/categories/index.php");
        die();
        
    }