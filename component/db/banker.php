<?php require './db.php';
class banquierDB{
  
  private $conn;
  
  public function GETClientWait($idbanquier){
    try {
    
      
    } 
    catch (PDOException $e) 
    {
      
    };
  }


  public function GETBankerId($token){
    try {
     $data=$conn->prepare("SELECT id FROM banquier INNER JOIN token ON banquier.id = token.banquierId WHERE bankerid=:id");
    $data->bindParam(':id',$bankerid);
    $data->execute();
    $catchbanker=$data->fetch(PDO::FETCH_ASSOC);
    return true;
    } catch (PDOException $e) {
      error_log($e->getMessage());
      return false;
    }
  }
  public function PATCHClientValid($idbanquier, $idclient){
    try {
      //code...
    } catch (PDOException $e) {
          return false;
    }
  }
  public function PUTToken($idbanquier, $idclient){
    try {
      //code...
    } catch (PDOException $e) {
          return false;
    }
  }
  
}
  ?>