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
        if (strlen($postalCode) !== 5 || !is_int($postalCode))
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



    //JEREMY :
    //testPass($password,$verifPassword) ok
    //testIban($iban); ok
    //testAdress($postalCode,$town,$street,$numberstreet,); ok


    //DEMBA :
    //testCheckObligate($cgv); ( CHECKBOX => true or false :: check if true ) ok
    //testBirthday($birthDate); ( DATE DE NAISSANCE =>  2021-07-15) ok
    //testAmount($amount); (MONTANT VIREMENT => Verifier nombre avec 2 chiffres après la virgule)

 /*    $_POST => array(13) { 
        ["name"]=> string(12) "BanqueHoldUP" 
        ["firstname"]=> string(8) "efzfzfzf" 
        ["birthDate"]=> string(10) "2021-07-15" 
        ["gender"]=> string(3) "man" 
        ["idCard"]=> string(27) "71HHsQbab-L._AC_SL1500_.jpg" 
        ["numberstreet"]=> string(2) "12" 
        ["street"]=> string(13) "Rue du Colmpu" 
        ["postalCode"]=> string(5) "75000" 
        ["town"]=> string(5) "Paris" 
        ["email"]=> string(27) "Jesuisunelicorne@SNAGE.tech" 
        ["password"]=> string(9) "Bonjour78" 
        ["verifPassword"]=> string(9) "Bonjour78" 
        ["cgv"]=> string(2) "on" sinon false = null 
    } */
   /*  $_FILE => array(5) { 
        ["name"]=> string(47) "Capture d’écran 2021-06-18 à 17.44.30.png" 
        ["type"]=> string(9) "image/png" 
        ["tmp_name"]=> string(36) "/Applications/MAMP/tmp/php/phptkXsjG" 
        ["error"]=> int(0) 
        ["size"]=> int(3589) 
    }  */
}
?>