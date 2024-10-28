<?php
session_start();
$errors = [];
$success = [];
define("hostname","localhost");
define("username","root");
define("password","");
define("database","osama_news_db");

if(isset($_GET['id'])){
  $conn = mysqli_connect(hostname,username,password,database);
  $id = $_GET['id'];
  $sql = "DELETE FROM `categories` WHERE `id` = '$id'";

        $result = mysqli_query($conn,$sql);

        
 header("location: ../views/dashboard/categories/index.php");
    die();
    
        $_SESSION['success'] = $success;
}else{
    echo $errors = "لا يمكن الحذف";
}