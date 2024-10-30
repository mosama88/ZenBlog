<?php
    require_once '../../app/config.php';
    
    $errors = [];
    $success = "";
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
            $errors[] = "عفوآ البيانات غير موجودة";
        } else {
            $sql = "DELETE FROM `categories` WHERE `id` = '$id'";
            $result = mysqli_query($conn, $sql);
            $success = "تم الحذف بنجاح";
        }
        
        
        $_SESSION['errors'] = $errors;
        $_SESSION['success'] = $success;
        
        redirect("../../views/dashboard/categories/index.php");
        
    }