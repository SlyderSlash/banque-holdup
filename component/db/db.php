<?php
// config part
$dbhost = "15.188.57.143";
$dbport ="3306";
$dbuser = "team";
$dbpass = "F:g8#Hc94";
$dbname = "DBHoldUp";

// BDD connexion
class DB {
  function connect (){
    try {
      $conn = new PDO('mysql:host='.$dbhost.';dbport='. $dbport.';dbname='.$dbname.';charset=utf8',$dbuser,$dbpass);
    } catch (Exception $e) 
    {
      die('Erreur : ' .$e -> getMessage());
      return false;
    };
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;
  }
}
 

?>