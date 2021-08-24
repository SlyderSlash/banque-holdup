<?php
require './db.php';
class NoAuthDB{
  //Passer bien la connexion DB via la class
  private $conn;
  public function getBankerId($mail,$pass){
    try {
      $data=$conn->prepare('SELECT banquierid FROM banquier WHERE mail=:Mail AND pass=:"Password"');
      $data->bindParam(':Mail',$mail);
      $data->bindParam(':Password',$pass);
      $data->execute();
      $banker=$data->fetch(PDO::FETCH_ASSOC); 
      if(is_int($bankerid))
      {
        //return $banker.banquierid;
        return $banker['banquierid'];
      }
        else return false;
    } 
    catch (PDOException $e) 
    {
      error_log($e->getMessage());
      return false;
    };
  }

  public function getClientId($mail,$pass) {
    try 
    {
      $requete = $conn->prepare('SELECT clientId FROM client WHERE mail= :mail AND pass= :pass');
      $requete->bindValue(':mail',$mail);
      $requete->bindValue(':pass',$pass);
      $requete->execute();
      $requete->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'noAuth');
      $client = $requete->fetch(PDO::FETCH_ASSOC);
      if (is_int($clientid)) {
        return $client['clientId'];
      } else return false;
    }
    catch (PDOException $e)
    {
      error_log($e->getMessage());
      return false;
    }
  }

  public function putClient( $genre, $nom, $prenom, $adresse, $codepostal, $ville, $naissance, $pi, $mail, $pass) {
    try { 
      $requete = $conn->prepare('INSERT INTO client (genre, nom, prenom, adresse, codepostal, ville, naissance, "pi", mail, pass) 
      VALUES(:genre, :nom, :prenom, :adresse, :codepostal, :ville, :naissance, ":pi", :mail, :pass)');
      $requete->bindParam(':genre', $genre, PDO::PARAM_BOOL);
      $requete->bindParam(':nom', $nom, PDO::PARAM_STR, 50);
      $requete->bindParam(':prenom', $prenom, PDO::PARAM_STR, 50);
      $requete->bindParam(':adresse', $adresse, PDO::PARAM_STR, 100);
      $requete->bindParam(':codepostal', $codepostal, PDO::PARAM_INT, 5);
      $requete->bindParam(':ville',$ville, PDO::PARAM_STR, 50);
      $requete->bindParam(':naissance',$naissance);
      $requete->bindParam(':"pi"',$pi);
      $requete->bindParam(':mail',$mail, PDO::PARAM_STR, 50);
      $requete->bindParam(':pass',$pass, PDO::PARAM_STR, 50);
      $requete->execute();
      return true;
    }
    catch (PDOException $e)
    {
      error_log($e->getMessage());
      return false;
    }
  }
  
}
?>