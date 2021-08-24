<?php
session_start();
class Security{
    public static function testName ($value){
        $value = htmlspecialchars($value);
        if (strlen($value) >= 150 || 
            strlen($value) <= 1 || 
            preg_match('/[0-9]/',$value)){
                return false;
            }
        else return true;
    }

    public static function testEmail($value){
        if(filter_var($value, FILTER_VALIDATE_EMAIL)){
        return htmlspecialchars($value) ;
        } else {
            return false;
        }
    }

    public static function testPass($password,$verifPassword){
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
    
    public static function testIban($iban){
        $iban = htmlspecialchars($iban);
        if (!is_string($iban) || 
            strlen($iban) !== preg_match_all('/[a-zA-Z0-9]/', $iban) || 
            strlen($iban) !== 27)  
        {
            return false;
        }
        else return $iban;
    }

    public static function testAdress($postalCode,$town,$street,$numberstreet){
        $postalCode = htmlspecialchars($postalCode);
        $town = htmlspecialchars($town);
        $street = htmlspecialchars($street);
        $numberstreet = htmlspecialchars($numberstreet);
        if (preg_match('~[0-9]{5}~', $postalCode)) //strlen($postalCode) !== 5 || !is_int($postalCode)
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
        else return $street . $numberstreet;
    }

    public static function testCheckObligate($value){
        if (htmlspecialchars($value) === "on"){
            return true;
        }
        else return false;
    }

    public static function testBirthday($birthDate){
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
            $format = "Y-m-d";
            $date_naissance = DateTime::createFromFormat($format, $birthDate); // Créer une date avec la date de naissance
            $date = new DateTime(); // Créer une date avec la date d'aujourd'hui
            $date = $date->sub(new DateInterval('P18Y')); // On remplace la date en retirant 18 ans
            if($date_naissance >= $date) // On compare les deux dates pour verifier la majorité de 18 ans
            {
                return $false;
            }
            else return $birthDate;
        }
        else return false;
    }
    public static function testAmount($amount){
        $amount = htmlspecialchars($amount);
       if(!is_numeric($amount))
       {
           return false;
       }
       else return $amount;
    }

    public static function testGender($value){
        if($value === 'man' || $value === 'woman'){
            return htmlspecialchars($value);
        } else {
            return false;
        }
    }

    public static function testUploadedFile($file){
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

    public static function testID($value){
        if(preg_match_all('/[0-9]/', $value) !== strlen($value)){
            return false;
        }
        else return htmlspecialchars($value);
    }
}