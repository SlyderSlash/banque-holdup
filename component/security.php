<?php
session_start();
class Security{
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

    function testPass($password,$verifPassword){
        $pass = htmlspecialchars($password);
        if ($pass !== htmlspecialchars($verifPassword) ||
            strlen($pass) <= 7 || 
            strlen($pass) >= 20 || 
            preg_match_all('/[a-zA-Z0-9]/', $pass) !== strlen($pass)) 
        { 
            return false; 
        }
        else return $pass;
    }
    
    function testIban($iban){
        $iban = htmlspecialchars($iban);
        if (!is_string($iban) || 
            strlen($iban) !== preg_match_all('/[a-zA-Z0-9]/', $iban) || 
            strlen($iban) !== 27)  
        {
            return false;
        }
        else return $iban;
    }

    function testAdress($postalCode,$town,$street,$numberstreet){
        $postalCode = htmlspecialchars($postalCode);
        $town = htmlspecialchars($town);
        $street = htmlspecialchars($street);
        $numberstreet = htmlspecialchars($numberstreet);
        if (preg_match('~[0-9]{5}~', $value)) //strlen($postalCode) !== 5 || !is_int($postalCode)
        {
            return false;
        }
        else if (
            !is_string($street) || 
            strlen($street) !== preg_match_all('/[a-zA-Z]/', $street) || 
            strlen($street) < 2 || 
            strlen($street) > 50) 
        {
            return false;
        }
        else if (
            !is_string($town) || 
            strlen($town) !== preg_match_all('/[a-zA-Z]/', $town) || 
            strlen($town) < 2 || 
            strlen($town) > 50) 
        {
            return false;
        }
        else return [$postalCode,$town,$street,$numberstreet];
    }

    function testCheckObligate($value){
        if (htmlspecialchars($value) === "on"){
            return true;
        }
        else return false;
    }

    function testBirthday($birthDate){
        $birthDate = htmlspecialchars($birthDate); // OKAY
        $array = explode("-",$birthDate);
        if (
            is_string($birthDate) && 
            strlen($array[0]) === 4 && 
            strlen($array[1]) === 2 && 
            strlen($array[2]) === 2
        )
        {
            // Test date
            $date = new DateTime(); // Créer une date avec la date d'aujourd'hui
            $date = $date->sub(new DateInterval('P18Y')); // On remplace la date en retirant 18 ans
            $date_naissance = new DateTime($birthDate); // Créer une date avec la date de naissance
            if($date_naissance >= $date) // On compare les deux dates pour verifier la majorité de 18 ans
            {
                return $birthDate;
            }
            else return false;
        }
        else return false;
    }
    function testAmount($amount){
        $amount = htmlspecialchars($amount);
       if(!is_Number($amount))
       {
           return false;
       }
       else return $amount;
    }

    function testGender($value){
        if($value === 'man' || $value === 'woman'){
            return htmlspecialchars($value);
        } else {
            return false;
        }
    }

    function testUploadedFile($file){
        if
        (
            ($file['type'] === 'image/png' || 'image/jpeg' || 'application/pdf') && 
            ($file['size'] <= 1000000) && 
            ($file['error'] === UPLOAD_ERR_OK)
        )
        {
            return $file;
        } 
        else 
        {
            return false;
        }
    }

    function testID($value){
        if(preg_match_all('/[0-9]/', $value) !== strlen($value)){
            return false;
        }
        else return htmlspecialchars($value);
    }
}