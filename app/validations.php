<?php


function emptyValidInput($input){
if(empty($input)){
    return true;
}return false;
}


function minValidInput($input,$length){
if(strlen($input) < $length){
    return true;
}return false;
}

function maxValidInput($input,$length){
if(strlen($input) > $length){
    return true;
}return false;
}