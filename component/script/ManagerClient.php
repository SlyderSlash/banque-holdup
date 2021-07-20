<?php

class ManagerClient {

    private $conn;

    public function __construct(PDO $conn)
    {
        $this->conn = $conn;
    }
    
    
    //DEBUT DES FONCTIONS READ


    public function clientInfos($id) {
        //Extrait toutes les données d'un client
        $requete = $this->conn->prepare('SELECT * FROM client WHERE id= :id');
        $requete->bindValue(':id', (int)$id, PDO::PARAM_INT);
        $requete->execute();
        //Fonction native qui permet de spécifier le mode de récupération du resultat de la requete
        //FETCH_CLASS dit que c'est une instance de notre classe -> Clients
        //FETCH_PROPS_LATE = Constructeur appellé AVANT pour prévenir un écrasement
        $requete->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Clients');
        $client = $requete->fetch(PDO::FETCH_ASSOC);
        return $client;
    }
        //=> Requête client identifié ( possède token ) 
        //=> Ouverture de conn 
        //=> Requête 1 idbyToken 
        //=> Requête 2 infosClientbyID 
        //=> Fermeture Conn 
        //=> Retour au client 
        
    public function clientNumber ($type) {
        //Extrait le numéro d'iban du client
        $requete = $this->conn->prepare('SELECT iban FROM client WHERE id= ?');
        $requete->execute();
        //Fonction native qui permet de spécifier le mode de récupération du resultat de la requete
            //FETCH_CLASS dit que c'est une instance de notre classe -> Clients
            //FETCH_PROPS_LATE = Constructeur appellé AVANT pour prévenir un écrasement
        $requete->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Clients');
        //FETCH_ASSOC pour une sortie en tableau associatif id=>iban
        $iban = $requete->fetch(PDO::FETCH_ASSOC);// A voir ou se trouve le numéro de compte
        switch($type){
            case 'iban':
                return $iban;
            case 'AcNumber':
                $AcNumber = substr($iban, 8, 15); 
                return $AcNumber;
            default:
                $AcNumber = substr($iban, 8, 15); 
                return [$AcNumber,$iban];
        }        
    }   

}