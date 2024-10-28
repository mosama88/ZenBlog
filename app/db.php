<?php

define("hostname","localhost");
define("username","root");
define("password","");
define("database","osama_news_db");
$conn = mysqli_connect(hostname,username,password);

if(!$conn){
    echo "خطأ في الاتصال بقاعدة البيانات: " . mysqli_connect_error();
}



//##############################################
//Drop DataBase
//$sql = "DROP DATABASE osama_news_db";

//Create DataBase
$sql = "CREATE DATABASE IF NOT EXISTS osama_news_db";

//Implement query
 $result_connection = mysqli_query($conn,$sql);


 mysqli_close($conn);

//##############################################
// create DataBase

$conn = mysqli_connect(hostname,username,password,database);

if(!$conn){
    echo "خطأ في الاتصال بقاعدة البيانات: " . mysqli_connect_error();
}

$sql = "CREATE TABLE IF NOT EXISTS categories (
   `id` INT PRIMARY KEY AUTO_INCREMENT,
   `name` VARCHAR(250) NOT NULL
)";




//Implement query
$result_connection = mysqli_query($conn,$sql);
mysqli_close($conn);
