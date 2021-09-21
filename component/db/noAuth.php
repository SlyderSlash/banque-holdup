<?php
require_once './component/db/db.php';
class NoAuthDB{
  use DB;
  public function getBankerId($mail,$pass){
    if (is_null($this->pdo)){return false;}
    try 
    {
      $requete = $this->pdo->prepare('SELECT id FROM banquier WHERE Mail= :mail AND pass= :pass');
      $requete->bindValue(':mail',$mail);
      $requete->bindValue(':pass',$pass);
      $requete->execute();
      $banker = $requete->fetch(PDO::FETCH_ASSOC);
      error_log('mail = '.$mail);
      error_log('pass = '.$pass);
      error_log('SELECT id FROM banquier WHERE Mail= '.$mail.' AND pass= '.$pass);
      error_log('banker = '.$banker['id']);
      return $banker['id'];
    }
    catch (PDOException $e)
    {
      error_log($e->getMessage());
      return false;
    }
  }

  public function getFreeBankerId(){
    if (is_null($this->pdo)){return false;}
    $pdo = $this->pdo;
    try {
      $hello = $pdo->query('SELECT banquierid, COUNT(banquierid) AS total FROM client WHERE banquierid IS NOT NULL GROUP BY banquierid ORDER BY total ASC LIMIT 1')->fetch();
      if ($hello === false){
        return 1;
      }
      else
      {
        return $hello['banquierid'];
      }
    } 
    catch (PDOException $e) 
    {
      return $e->getMessage();
    };
  }

  public function getClientId($mail,$pass) {
    if (is_null($this->pdo)){return false;}
    try 
    {
      $requete = $this->pdo->prepare('SELECT id FROM client WHERE mail= :mail AND pass= :pass');
      $requete->bindValue(':mail',$mail);
      $requete->bindValue(':pass',$pass);
      $requete->execute();
      $client = $requete->fetch(PDO::FETCH_ASSOC);
      return $client['id'];
    }
    catch (PDOException $e)
    {
      error_log($e->getMessage());
      return false;
    }
  }

  public function putClient( $genre, $nom, $prenom, $adresse, $codepostal, $ville, $naissance, $pi, $mail, $pass) {
    if (!is_null($this->pdo))
    {
      error_log('PDO is connected');
      try { 
        $requete = $this->pdo->prepare('INSERT INTO client (genre, nom, prenom, banquierid, adresse, codepostal, ville, naissance, pin, mail, pass) 
        VALUES(:genre, :nom, :prenom, :banquierid, :adresse, :codepostal, :ville, :naissance, :pin, :mail, :pass)');
        $requete->bindParam(':genre', $genre, PDO::PARAM_BOOL);
        $requete->bindParam(':nom', $nom, PDO::PARAM_STR, 50);
        $requete->bindParam(':prenom', $prenom, PDO::PARAM_STR, 50);
        $requete->bindParam(':adresse', $adresse, PDO::PARAM_STR, 100);
        $requete->bindParam(':codepostal', $codepostal, PDO::PARAM_INT, 5);
        $requete->bindParam(':ville',$ville, PDO::PARAM_STR, 50);
        $requete->bindParam(':naissance',$naissance);
        $requete->bindParam(':pin',$pi);
        $requete->bindParam(':mail',$mail, PDO::PARAM_STR, 50);
        $requete->bindParam(':pass',$pass, PDO::PARAM_STR, 50);
        $requete->bindParam(':banquierid',$this->getFreeBankerId(), PDO::PARAM_INT, 2);
        error_log('Ready to send');
        $requete->execute();
        error_log('Executer');
        return true;
      }
      catch (PDOException $e)
      {
        error_log($e->getMessage());
        return false;
      }
  }
  }
  
}