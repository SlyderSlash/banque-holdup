<?php 
require_once './component/db/db.php';
class banquierDB{
  use DB;

  public function putToken ($banquierid, $token, $create, $expire) {
    if (!is_null($this->pdo)) {
      try {
        $date = new DateTime();
        $date->setTimestamp($create);
        $date = $date->format('Y-m-d H-i-s'); 
        $tokrequest = $this->pdo->prepare('INSERT INTO token (token, type, banquierid, date_added, expirationTime) 
        VALUES (:token, "banquier", :banquierid, :date_added, :expire)');
        $tokrequest->bindParam(':token', $token, PDO::PARAM_STR, 300);
        $tokrequest->bindParam(':banquierid', $banquierid, PDO::PARAM_INT, 50);
        $tokrequest->bindParam(':date_added', $date);
        $tokrequest->bindParam(':expire', $expire);
        $tokrequest->execute();
        return true;
      }
      catch (PDOException $e)
      {
        error_log($banquierid);
        error_log($e->getMessage());
        return false;
      }
    }
    else {return false;}
  }
  
}
  ?>
