<?php
    require_once "../../app/config.php";
    
    
    $conn = mysqli_connect(hostname, username, password, database);
    
    
    if (!isset($_GET['id']) or !is_numeric($_GET['id'])) {
        redirect(URL . "views/dashboard/holidays/index.php");
    }
    
    $id = $_GET['id'];
    $sql = "SELECT * FROM `holidays` WHERE `id` = $id";
    $result = mysqli_query($conn, $sql);
    $check = mysqli_num_rows($result);
    
    if (!$check) {
        $_SESSION['errors'][] = "حدث خطأ . لا يوجد فى قاعدة البيانات";
        redirect(URL . "views/dashboard/holidays/index.php");
    } else {
        $sql = "DELETE FROM `holidays` WHERE `id` = $id";
        $result = mysqli_query($conn, $sql);
        $_SESSION['success'] = "تم الحذف بنجاح";
        redirect(URL . "views/dashboard/holidays/index.php");
        die();
    }