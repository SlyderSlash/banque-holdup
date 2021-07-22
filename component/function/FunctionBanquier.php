<?php
session_start();
class FunctionsBanquier{


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

}
?>