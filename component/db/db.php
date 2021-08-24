<?php

// BDD connexion
trait DB {
  private $pdo = null;
  public function __construct() {
    try {
      require_once './component/db/dbconfig.php';
      $this->pdo = new PDO("mysql:host=$dbhost; dbname=$dbname", $dbuser, $dbpass);
      $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $err) {
      exit("Erreur : " . $err->getMessage());
    }
  }
}
 

?>