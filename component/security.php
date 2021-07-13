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

function testDate($value){
    list ($year, $month, $day) = explode('-', $value);
    if(checkdate($month, $day, $year)){
        return htmlspecialchars($value);
    } else {
        return false;
    }
};

function testGender($value){
    if($value === 'man' || $value === 'woman'){
        return htmlspecialchars($value);
    } else {
        return false;
    }
}


function testUploadedFile($file){
    if(($file['type'] === 'image/png' || 'image/jpeg' || 'application/pdf') && ($file['size'] <= 1000000) && ($file['error'] === UPLOAD_ERR_OK)){
        return $file;
    } else {
        return false;
    }
}

function testNum($value){
    if(strlen($value) >= 10){
        return false;
    } else {
       return htmlspecialchars($value);
    }
}

function testStreet($value){
    if(strlen($value) <= 1 || strlen($value)>150 || preg_match('~[^[:alnum:]\'\s-]~u', $value)) {
        return false;
    } else {
        return htmlspecialchars($value);
    }
};

function testAdressCpt($value){
    if(strlen($value) >150  || preg_match('~[^[:alnum:]\'\s-]~u', $value)){
        return false;
    } else {
        return htmlspecialchars($value);
    }
}

function testTown($value){
    if(strlen($value)<= 1 || strlen($value)>150 || preg_match('~[^[:alpha:]\'\s-]~u', $value)){
        return false;
    } else {
        return htmlspecialchars($value);
    }
}

function testPostalCode($value){
    if(preg_match('~[0-9]{5}~', $value)){
        return htmlspecialchars($value);
    }
    return false;
}


function testPassword($value){
    $uppercase = preg_match('@[A-Z]@', $value);
    $lowercase = preg_match('@[a-z]@', $value);
    $number    = preg_match('@[0-9]@', $value);

    if(!$uppercase || !$lowercase || !$number || strlen($value) < 8) {
        return false;
    } else {
        return htmlspecialchars($value);
    }
    
}

function testPasswordCheck($value1, $value2){
    if ($value1 === $value2){
        return true;
    } 
    return false;
}

function testCgv($value){
    if(isset($value)){
        return true;
    }
    return false;
}

?>