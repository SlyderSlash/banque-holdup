<?php
require './component/db/db.php';
class clientDB{
  use DB;

  public function putToken( $idclient, $token, $create, $expire) {
      $date = new DateTime();
      $date->setTimestamp($create);
    if (!is_null($this->pdo))
    {
      try { 
        $requete = $this->pdo->prepare('INSERT INTO token (token, type, clientid, date_added, expirationTime) 
        VALUES (:token, "client", :clientid, :date_added, :expire)');
        $requete->bindParam(':token', $token, PDO::PARAM_STR, 300);
        $requete->bindParam(':clientid', $clientid, PDO::PARAM_INT, 50);
        $requete->bindParam(':date_added', $date);
        $requete->bindParam(':expire', $expire);
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
  
}