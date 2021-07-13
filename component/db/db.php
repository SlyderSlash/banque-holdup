<?php
// config part
$dbhost = "15.188.57.143";
$dbport ="3306";
$dbuser = "team";
$dbpass = "F:g8#Hc94";
$dbname = "DBHoldUp";

// BDD connexion
try {
  $conn = new PDO('mysql:host='.$dbhost.';dbport='. $dbport.';dbname='.$dbname.';charset=utf8',$dbuser,$dbpass);
} catch (Exception $e) 
{
  die('Erreur : ' .$e -> getMessage());
};

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>