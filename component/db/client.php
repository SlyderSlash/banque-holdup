<?php
require_once './component/db/db.php';
class clientDB{
  use DB;
  public function putToken ($idclient, $token, $create, $expire) {
    if (!is_null($this->pdo)) {
      try {
        $date = new DateTime();
        $date->setTimestamp($create);
        $date = $date->format('Y-m-d H-i-s'); 
        $tokrequest = $this->pdo->prepare('INSERT INTO token (token, type, clientid, date_added, expirationTime) 
        VALUES (:token, "client", :clientid, :date_added, :expire)');
        $tokrequest->bindParam(':token', $token, PDO::PARAM_STR, 300);
        $tokrequest->bindParam(':clientid', $clientid, PDO::PARAM_INT, 50);
        $tokrequest->bindParam(':date_added', $date);
        $tokrequest->bindParam(':expire', $expire);
        $tokrequest->execute();
        return true;
      }
      catch (PDOException $e)
      {
        error_log($e->getMessage());
        return false;
      }
    }
    else {return false;}
  }
  
} 