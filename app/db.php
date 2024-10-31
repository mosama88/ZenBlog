<?php
    
    define("hostname", "localhost");
    define("username", "root");
    define("password", "");
    define("database", "osama_news_db");
    
    $conn = mysqli_connect(hostname, username, password);
    
    if (!$conn) {
        echo "خطأ في الاتصال بقاعدة البيانات: " . mysqli_connect_error();
    }


//##############################################
//Drop DataBase
//$sql = "DROP DATABASE osama_news_db";

//Create DataBase
    $sql = "CREATE DATABASE IF NOT EXISTS osama_news_db";

//Implement query
    $result_connection = mysqli_query($conn, $sql);
    
    
    mysqli_close($conn);

//##############################################
// create DataBase
    
    $conn = mysqli_connect(hostname, username, password, database);
    
    if (!$conn) {
        echo "خطأ في الاتصال بقاعدة البيانات: " . mysqli_connect_error();
    }
//##############################################
// create DataBase
    $categories_table = "CREATE TABLE IF NOT EXISTS categories (
   `id` INT PRIMARY KEY AUTO_INCREMENT,
   `name` VARCHAR(250) NOT NULL
)";


//Implement query
    $result_connection = mysqli_query($conn, $categories_table);
    mysqli_close($conn);
    
    //##############################################
//     create Table Citeis
    $conn = mysqli_connect(hostname, username, password, database);
    
    $cities_table = "CREATE TABLE IF NOT EXISTS cities(
   `id` INT PRIMARY KEY AUTO_INCREMENT,
   `name` VARCHAR(250) NOT NULL
)";
    mysqli_query($conn, $cities_table);
    mysqli_close($conn);
    //##############################################
    
    $conn = mysqli_connect(hostname, username, password, database);
    
    $holidays_table = " CREATE TABLE IF NOT EXISTS holidays(
    `id` INT PRIMARY KEY AUTO_INCREMENT,
   `name` VARCHAR(250) NOT NULL,
     `from` DATE NOT NULL,
     `to` DATE NOT NULL,
     `num_of_days` INT NOT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
    
    $result = mysqli_query($conn, $holidays_table);
    mysqli_close($conn);

    



















