<?php
    
    
    require_once '../../app/config.php';
    $conn = mysqli_connect(hostname, username, password, database);
    
    if (!$conn) {
        echo "connect error " . mysqli_connect_error($conn);
    }
    
    
    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['name'])) {
        
        $name = trim(htmlspecialchars(htmlentities($_POST['name'])));
        $id = $_GET['id'];
        
        // echo $title;
        
        if (strlen($name) < 3) {
            $_SESSION['errors'] = "title of task must be greater than 3 chars ";
        }
        
        
        if (empty($_SESSION['errors'])) {
            $sql = "UPDATE `categories` SET `name`='$name' WHERE `id` = $id ";
            $result = mysqli_query($conn, $sql);
            // echo mysqli_affected_rows($conn);
            if ($result) {
                $_SESSION['success'] = "data updated succefully";
            }
        } else {
            header("location: ../../views/dashboard/categories/index.php");
            die;
            
        }
        
        
        // redirection
        header("location: ../../views/dashboard/categories/index.php");
        
    }