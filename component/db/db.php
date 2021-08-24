<?php

// BDD connexion
trait DB {
  private $pdo = null;
  public function __construct() {
    try {
      $dbhost = "15.188.57.143:3306";
      $dbuser = "team";
      $dbpass = "F:g8#Hc94";
      $dbname = "DBHoldUp";
      $this->pdo = new PDO("mysql:host=$dbhost; dbname=$dbname", $dbuser, $dbpass);
      $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $err) {
      exit("Erreur : " . $err->getMessage());
    }
  }
}
 

?>