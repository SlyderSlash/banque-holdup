<?php 
require './db.php';

// first banker
$mailFrstBankr ='thierry@banque_holdUp.fr';
$passFrstBankr='Mmdpeusbgd25a!';
$cryptPassFrst = md5($passFrstBankr);

// second banker
$mailSndBankr ='amanda@banque_holdUp.fr';
$passSndBankr='Lrséàns.NC-B,1920.';
$cryptPassSnd = md5($passSndBankr);

// third banker
$mailTrdBankr ='alexandre@banque_holdUp.fr';
$passTrdBankr="Lcdl'heéàlsdcd2ac.!";
$cryptPassTrd = md5($passTrdBankr);

// fourth banker
$mailFthBankr ='stephanie@banque_holdUp.fr';
$passFthBankr='1Aplgt,uAplt.';
$cryptPassFth = md5($passFthBankr);

// fifth banker
$mailFiftBankr ='paul@banque_holdUp.fr';
$passFiftBankr='1Aplatedltll.';        
$cryptPassFift = md5($passFiftBankr);


$sql = "INSERT INTO banquier (Mail,'Password' ) VALUES (:bankerMail,:bankerPassword)" ;
$res = $conn -> prepare($sql);
$exec = 
$res -> execute(
array(
  ":bankerMail" => $mailFrstBankr,
  ":bankerPassword" => $cryptPassFrst,
));
if ($res ->execute()) {
  echo "Nouveau enregistrement créé avec succès";
} else{
  echo "Impossible de créer l'enregistrement";
}
$exec = 
$res -> execute(
array(
  ":bankerMail" => $mailSndBankr,
  ":bankerPassword" => $cryptPassSnd,
));
if ($res ->execute()) {
  echo "Nouveau enregistrement créé avec succès";
} else{
  echo "Impossible de créer l'enregistrement";
}