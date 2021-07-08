<?php

class Update {
  function validClient($db, $clientid , $token)
    {
      $clientid = htmlspecialchars($clientid);
      $token = htmlspecialchars($token);
      $bankerid = DB::getBankerIDwithToken($db, $token);
      
      if (!$bankerid){
        return false;
      }
      else {
        $newiban = Functions::createIbanNumber($clientid);
        try
        {
        $upCltVld = $db->prepare("UPDATE client SET iban=:iban WHERE id=:idclient AND banquierid = :banquierid");
        $upCltVld->bind_param(':iban', $newiban );
        $upCltVld->bind_param(':idclient', $clientid );
        $upCltVld->bind_param(':banquierid', $bankerid );
        $upCltVld->execute();
          return true;
        } catch(PDOException $e) {
          return false;
        }
      }
    }
  function validBenif($db, $token, $benif)
    {
      $bankerid = DB::getBankerIDwithToken($bankerid);
      $token = htmlspecialchars($token);
      $benif = htmlspecialchars($benif);

      if (!$bankerid){
          return false;
      }
      else {

        try 
        {
          $stmt = $db->prepare("UPDATE beneficiaire SET valid=NOW() WHERE id=:benif");
          $stmt ->bind_param(':benif', $benif);
          $stmt ->execute();
          return true;

        }catch(PDOException $e) {
          return false;
        }
      }

    }
  

  function validDelete(){} // On les fera ensembles // soit tu te renseigne sur DeleteData

  function deleteBenif($db, $clientid , $token, $benif)
  {
      $bankerid = DB::getBankerIDwithToken($bankerid);
      $token = htmlspecialchars($token);
      $benif = htmlspecialchars($benif);
      $clientid = htmlspecialchars($clientid);

      if (!bankerid){
          return false;
      }
      else {

      try
      {
        $stmt = $db->prepare("UPDATE beneficiaire SET valid=NOW() WHERE id=:benif AND clientid = :clientid");
        $stmt ->bind_param(':benif', $benif);
        $stmt ->bind_param(':idclient', $idclient);
        $stmt ->execute();
        return true; 

    }catch(PDOException $e) {
        return false;
       }
     }

  }


  function askdeletclient($db, $clientid, $token)
  {
      $bankeridbankerid = DB::getBankerIDwithToken($bankerid);
      $token = htmlspecialchars($token);
      $clientid = htmlspecialchars($clientid);

      if (!bankerid){
        return false;
    }
    else {

    try
    {
      $stmt = $db->prepare("UPDATE client SET valid=NOW() WHERE id=:client");
      $stmt ->bind_param(':idclient', $idclient);
      $stmt ->execute();
      return true;

    }catch(PDOException $e) {
      return false;
    
    
    }
  }
 
}

  function virement(){}



?>