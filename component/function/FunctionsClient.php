<?php
class FunctionsClient{
    public function signIn(
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
        $password = Security::testPass($password,$verifPassword,'register');
        $pi = Security::testUploadedFile($idCard, $fidCard);
        $birthday = Security::testBirthday($birthDate);
        $adress = Security::testAdress($postalCode,$town,$street,$numberstreet);
        $cgu = Security::testCheckObligate($cgv);
        $authdb = new NoAuthDB;
        switch (false)
        {
            case $lastName:
                $_SESSION['error']= "Le nom de famille n'est pas au bon format";
                header('Location: ../connexion.php');
                break;
            case $firstName:
                $_SESSION['error']= "Le prénom n'est pas au bon format";
                header('Location: ../connexion.php');
                break;
            case $email:
                $_SESSION['error']= "L'adresse email n'est pas au bon format";
                header('Location: ../connexion.php');
                break;
            case $password:
                $_SESSION['error']= "Le mot de passe n'est pas au bon format - 8 Caractère minimum ( 1 Majuscule, 1 Minuscule et 1 chiffre nécesaire)";
                header('Location: ../connexion.php');
                break;
            /* case $pi:
                $_SESSION['error']= "Problême lors du chargement et de la vérification de la pièce d'identité";
                header('Location: ../connexion.php');
                break; */
            case $birthday:
                $_SESSION['error']= "La date de naissance n'est pas au bon format ou votre age est inférieur à 18 ans";
                header('Location: ../connexion.php');
                break;
            case $adress:
                $_SESSION['error']= "L'adresse n'est pas au bon format";
                header('Location: ../connexion.php');
                break;
            case $cgu:
                $_SESSION['error']= "Les Conditions Générales de Vente doivent obligatoirement être validé";
                header('Location: ../connexion.php');
                break;
            case $authdb->putClient(1, $lastName, $firstName, $adress, $postalCode, $town, $birthday, $pi, $email, $password):
                $_SESSION['error']= "Problême technique lors de votre inscription";
                header('Location: ../connexion.php');
                break;
            default :
                $_SESSION['success']= "Bienvenu ".$lastName." ".$firstName." . Votre compte, sera validé dès que possible par l'un de nos conseillers.";
                header('Location: ../index.php');
                break;
        }
}

    public function logIn($email, $password){
        $type = "client";
        $email = Security::testEmail($email);
        $password = Security::testPass($password, null, 'login');
        $authdb = new NoAuthDB;
        $clientdb = new clientDB;
        $idclient = $authdb->GETClientId($email, $password);
        $_SESSION['idclient'] = $idclient;
        switch(false){
            case $email:
                $_SESSION['error']= "L'adresse n'est pas au bon format";
                header('Location: ../connexion.php');
                break;
            case $password:
                $_SESSION['error']= "Le mot de passe n'est pas au bon format";
                header('Location: ../connexion.php');
                break;
            default:
                if (!$idclient) {
                    $_SESSION['error']= "Problême d'identifiant";
                    header('Location: ../connexion.php');
                    break;
                }
                else {
                    $dbinfotoken = Security::generateToken($idclient, $type);
                    $token = $clientdb->PUTToken($idclient, $dbinfotoken[2], $dbinfotoken[0], $dbinfotoken[1]);
                    if (!$token){
                        $_SESSION['error']= "Problème technique";
                        header('Location: ../connexion.php');
                    }
                    else {
                        $_SESSION['token'] = $token;
                        $_SESSION['success']="Bienvenue !";
                        header('Location: ../index.php');
                    }
                    break;
                }
        }
    }


    public function addBeneficiaire( $idclient, $iban){
        $iban = Security::testIban($iban);
        switch (false) {
            case $iban:
                $_SESSION['error']= "L'IBAN n'est pas au bon format";
                header('Location: ../addbenef.php');
                break;
            case ClientDB::PUTBeneficiaire($idclient,$iban) :
                $_SESSION['error']= "Problème technique lors de l'ajout du bénéficiaire";
                header('Location: ../addbenef.php');
                break;
            default:
                $_SESSION['success']= "Votre bénéficiaire a bien été ajouté, veuillez patienter, le temps que votre conseiller le valide";
                header('Location: ../virement.php');
                break;
        }
    }

    public function deleteClientRequest($idclient, $titulaire, $letter){
        $titulaire = ClientDB::GETClientName($titulaire);
        $lettreResiliation = Security::testUploadedFile($letter);

        switch(false){
            case $lettreResiliation:
                $_SESSION['error']= "Probleme lors du chargement et de la vérification de la lettre de résiliation";
                header('Location: ../deleteAccount.php');
                break;
            case $titulaire:
                $_SESSION['error']= "Le nom indiqué lors de la demande de suppression et celui en base de donnée ne correspondent pas";
                header('Location: ../deleteAccount.php');
                break;

            case ClientDB::PATCHClientDelete($idclient, $titulaire, $lettreResiliation):
                $_SESSION['error']="Problème technique lors de la suppression du client"; 
                header('Location: ../deleteAccount.php');
                break;
            
            default:
                $_SESSION['success']= "La suppresion client à bien été prise en compte";
                header('Location: ../index.php');
                break;
                
        }
    }

    public function virement($idclient, $amount, $idbenef){
        $amount = Security::testAmount($amount);
        $idbenef = Security::testID($idbenef);
        $iban = ClientDB::GETIbanWithBenef($idbenef);
        $balance = ClientDB::GETSolde($idclient);

        switch(false){
            case $amount:
                $_SESSION['error']= "Le montant renseigné n'es pas au bon format";
                header('Location: ../connexion.php');
                break;
            case $amount:
                $_SESSION['error']= "Le bénéficiaire renseigné n'es pas au bon format";
                header('Location: ../connexion.php');
                break;
            case $iban:
                $_SESSION['error']= "Le bénéficiaire n'est pas relié à un compte client";
                header('Location: ../connexion.php');
                break;
            case ($balance >= $amount):
                $_SESSION['error']= "Votre solde de $balance € n'est pas suffisant pour effectuer le virement de $amount €";
                header('Location: ../connexion.php');
                break;
            case (ClientDB::PATCHVirement($idclient, $iban, $amount)):
                $_SESSION['error']= "Problème technique lors du virement";
                header('Location: ../connexion.php');
                break;
            default:
            $balance = $balance - $amount;
            $_SESSION['success']= "Le virement de $amount € a bien été effectué. Votre nouveau solde est de $balance €";
            header('Location: ../index.php');
            break;
        }
    }

};
