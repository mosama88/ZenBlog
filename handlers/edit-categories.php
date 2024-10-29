<?php
require_once '../app/config.php';

if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['name'])){
    $errors = [];
    $success = [];
$name = trim(htmlspecialchars(htmlentities($_POST['name'])));
$id = $_GET['id'];
    if(empty($name)){
        echo $errors[] = 'حقل أسم الفئة مطلوب';
    }elseif (strlen($name)< 6){
        echo $errors[] = ' الأسم لا يقبل أقل من او يساوى 5 أحرف';
    }elseif (strlen($name)> 30){
        echo $errors[] = ' الأسم لا يقبل أكثر من او يساوى 30 حرف';
    }else{
        echo $success = "تم تعديل الفئة بنجاح";
    }

if(empty($errors)){
    $conn = mysqli_connect(hostname,username,password,database);

    $sql = "SELECT * FROM `categories` WHERE `id` = '$id'";
    $edit = mysqli_query($conn,$sql);
}
}