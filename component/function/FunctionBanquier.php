<?php
session_start();
class FunctionsBanquier{


    public function loginBanker($db, $email, $password){
        $email = Security::testEmail($email);
        $email = Security::testPass($password);

        if($db && $email && $password){
            if(noauthDB::getBankerId($db,$email,$password)){
                return true;
            }else{
                return false;
            }
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

}
?>