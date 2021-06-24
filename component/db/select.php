<?php
function getbanker ($conn,$banquierid,$clientid){
  $data = $pdo->query("SELECT MIN(banquierid) FROM (SELECT id,COUNT(id)banquierid FROM client GROUP BY id")->fetchAll();
  return $data;
}
?>