<?php
session_start();
class FunctionsBanquier{


    public function logIn($email, $password){
        $type = "banquier";
        $email = Security::testEmail($email);
        $password = Security::testPass($password, null, 'login');
        $authdb = new NoAuthDB;
        $banquierdb = new banquierDB;
        $idbanquier = $authdb->getBankerId($email, $password);
        $_SESSION['idbanquier'] = $idbanquier;
        switch(false){
            case $email:
                $_SESSION['error']= "L'adresse n'est pas au bon format";
                error_log("L'adresse n'est pas au bon format");
                header('Location: ../bankeraccess.php');
                break;
            case $password:
                $_SESSION['error']= "Le mot de passe n'est pas au bon format";
                error_log("Le mot de passe n'est pas au bon format");
                header('Location: ../bankeraccess.php');
                break;
            default:
                if (!$idbanquier) {
                    error_log($password);
                    $_SESSION['error']= "Problême d'identifiant";
                    error_log("Problême d'identifiant");
                    header('Location: ../bankeraccess.php');
                    break;
                }
                else {
                    $dbinfotoken = Security::generateToken($idbanquier, $type);
                    $token = $banquierdb->PUTToken($idbanquier, $dbinfotoken[2], $dbinfotoken[0], $dbinfotoken[1]);
                    if (!$token){
                        $_SESSION['error']= "Problème technique";
                        error_log("Problème technique");
                        header('Location: ../bankeraccess.php');
                    }
                    else {
                        $_SESSION['token'] = $token;
                        $_SESSION['success']="Bienvenue !";
                        error_log("Bienvenue !");
                        header('Location: ../index.php');
                    }
                    break;
                }
        }
    }

    public function validClient($idclient, $idbanker){
        
        switch(false){
            case ClientDB::PUTClient($idclient): // Ici on est pas surs des fonctions qu'ils ont a dev. ni leur noms
                $_SESSION['error']= "Problème technique lors de la validation du client";
                header('Location: ../bankeraccess.php'); 
                break; 
                
            case BanquierDB::PUTBanquier($idbanquier): // Ici on pas surs non plus, est ce que cette fonction est sencée existée ? ^^
                $_SESSION['error'] = "Problème technique lors de la validation du client";
                header('Location: ../bankeraccess.php'); 
                
                default:
                $_SESSION['success']= "La validation du client à bien été prise en compte";
                header('Location: ../bankeraccess.php'); 
            break;
        }
    }

    
    public function validBeneficiaire($db,$idclient,$idbanker){
        
        switch(false){
            case ClientDB::PUTClient($idclient): // Ici on est pas surs des fonctions qu'ils ont a dev. ni leur noms
                $_SESSION['error']= "Problème technique lors de la validation du bénéficiaire";
                header('Location: ../bankeraccess.php'); 
                break; 

            case BanquierDB::PUTBanquier($idbanquier): // Ici on pas surs non plus, est ce que cette fonction est sencée existée ? ^^
                $_SESSION['error'] = "Problème technique lors de la validation du bénéficiaire";
                header('Location: ../bankeraccess.php'); 
                    
                default:
                $_SESSION['success']= "La validation du bénéficiaire à bien été prise en compte";
                header('Location: ../bankeraccess.php'); 
            break;
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
