<?php

// BanquierDB::PUTToken($idbanquier)
public function putToken($idbanquier) {
    try 
    {
        $requete = $conn->prepare('INSERT INTO token VALUES token = :token WHERE banquierId= :banquierId');
        $requete->bindParam(':token', $token, PDO::PARAM_STR, 255);        
        $requete->bindParam(':banquierId', $banquierId, PDO::PARAM_INT, 255);
        $requete->execute();
        return true;
    }
    }
    catch (PDOException $e)
    {
        error_log($e->getMessage());
        return false;
    }
}

// BanquierDB::PATCHClientValid($idbanquier, $idclient)
public function patchClientValid($idbanquier, $idclient, $iban) {
    try 
    {
        $requete = $conn->prepare('UPDATE client SET iban = :iban WHERE clientId = :clientId AND banquierId = :banquierId');
        $requete->bindParam(':banquierId', $banquierId, PDO::PARAM_INT, 255);
        $requete->bindParam(':clientId', $clientId, PDO::PARAM_INT, 255);
        $requete->bindParam(':iban', $iban, PDO::PARAM_STR, 27);
        $requete->execute();
        return true;
    }
    }
    catch (PDOException $e)
    {
        error_log($e->getMessage());
        return false;
    }
}

?>