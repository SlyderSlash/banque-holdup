<?php
session_start();
function testName ($value){
    $value = htmlspecialchars($value);
    if (strlen($value) >= 150 || 
        strlen($value) <= 1 || 
        preg_match('/[0-9]/',$value)){
            return false;
        }
    else return true;
}

function testEmail($value){
    if(filter_var($value, FILTER_VALIDATE_EMAIL)){
       return htmlspecialchars($value) ;
    } else {
        return false;
    }
}

?>