<?php

class Functions{
    public function signIn($db,
      $name,
      $firstname,
      $email,
      $password,
      $verifPassword,
      $idCard,
      $fidCard,
      $birthDate,
      $postalCode,
      $town,
      $street,
      $numberstreet,
      $cgv)
        {
        $lastName = Security::testName($name);
        $firstName = Security::testName($firstname);
        $email = Security::testEmail($email);
        $password = Security::testPass($password,$verifPassword);
        $pi = Security::testFile($idCard, $fidCard);
        $birthday = Security::testBirthday($birthDate);
        $adress = Security::testAdress($postalCode,$town,$street,$numberstreet,);
        $cgu = Security::testCheckObligate($cgv);

        if ($lastName 
            && $firstName 
            && $email 
            && $password 
            && $pi 
            && $birthday 
            && $adress 
            && $cgu)
        {
            if(DB::signIn($db, $lastName, $firstName, $email, $password, $pi, $birthday, $adress, $cgu)){
                return true ;
            }
            else return false;
        }
        else return false ;
    }

    public function logIn($db, $email, $password){
        $email = Security::testEmail($email);
        $password = Security::testPass($password);

        if ($email && $password){
            if(DB::logIn($db, $email, $password)){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    public function loginBanker($db, $email, $password){
        $email = Security::testEmail($email);
        $email = Security::testPass($password);

        if($db && $email && $password){
            if(DB::loginBanker($db,$email,$password)){
                return true;
            }else{
                return false;
            }
        }
    }

    public function addBeneficiaire($db, $idclient, $iban){
        $iban = Security::testIban($iban);
        if($db && $idclient && $iban){
            if(DB::addBeneficiaire($db,$idclient,$iban)){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    public function virement($db, $idclient, $amount){
        $amount = Security::testAmount($amount);

        if($db && $idclient && $amount){
            if(DB::virement($db, $idclient, $amount)){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    public function validClient($db, $idclient, $idbanker){
        if($db && $idclient && $idbanker){
            if(DB::validClient($db, $idclient, $idbanker)){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    public function validBeneficiaire($db,$idclient,$idbanker){
        if($db && $idclient && $idbanker){
            if(DB::validBeneficiaire($db,$idclient,$idbanker)){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    public function deleteClientRequest($db, $idclient, $titulaire){
        $titulaire = DB::getTestTitulaire($titulaire);
        $lettreResiliation = Security::testLettreResiliation($titulaire);

        if($db && $idclient && $titulaire){
            if(DB::deleteClientRequest($db, $idclient, $titulaire, $lettreResiliation)){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    public function validDeleteClient($db, $idclient, $idbanker){
        if($db && $idclient && $idbanker){
            if(DB::validDeleteClient($db, $idclient, $idbanker)){
                return true;
            }else{
                false;
            }
        }else{
            return true;
        }
    }

};

?>