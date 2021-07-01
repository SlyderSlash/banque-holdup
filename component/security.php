<?php
session_start();
function testName ($value){
    $value = htmlspecialchars($value);
    //Si ton client te met en valeur <h1>BOUH</h1>
    //Le PHP destruira la balise
    //Afin d'éviter une injection de code HTML
    if (strlen($value) >= 150 || 
        strlen($value) <= 1 || 
        preg_match('/[0-9]/',$value)){
            return false;
        }
    else return true;
}
// Tu va devoir verifier l'adresse email via une fonction
// Si elle n'es pas bonne t'as fonction renverra false
// Dans le cas contraire elle renverra l'adresse email après le passage en htmlspecialschars
// ATTENTION : Dans le cas des adresses e-mail et de PHP tu n'as pas besoin de REGEX
// Fait des recherches , Test des choses, prends des risques et on verra si tu a raison ou tort
// Mais dans tous les cas tu apprendra :D
// P.S N'oublie pas de tester t'es valeur avec une variable et des var_dump
// Bon courage et si tu a besoin, ton fidèle serviteur reste dispo :D
?>