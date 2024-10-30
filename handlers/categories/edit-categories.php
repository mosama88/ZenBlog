<?php
    
    
    require_once '../../app/config.php';
    $conn = mysqli_connect(hostname, username, password, database);
    
    if (!$conn) {
        echo "connect error " . mysqli_connect_error($conn);
    }
    
    
    if (checkMethodRequest("POST") == "POST" && isset($_POST['name'])) {
        
    $name = sanitizeInpt($_POST['name']);
        $id = $_GET['id'];
        
        if (strlen($name) < 3) {
            $_SESSION['errors'] = "Name of task must be greater than 3 chars ";
        }
        
        if (empty($_SESSION['errors'])) {
            $sql = "UPDATE `categories` SET `name`='$name' WHERE `id` = $id ";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $_SESSION['success'] = "data updated succefully";
            }
        } else {
        redirect("../../views/dashboard/categories/index.php");
            die;
            
        }
        
        
        // redirection
        redirect("../../views/dashboard/categories/index.php");
        
    }