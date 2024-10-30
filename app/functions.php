<?php



function checkMethodRequest($method){

    if ($_SERVER["REQUEST_METHOD"] == $method) {
        return true;
    }else{
        false;
    }
}


function sanitizeInpt($input){
    return trim(htmlspecialchars(htmlentities($input)));
}


function redirect($location){

    return header("location: $location");

}

