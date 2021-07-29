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
        $requete = $this->conn->prepare('SELECT * FROM DBHoldUp.client WHERE id= :id');
        $requete->bindValue(':id', (int)$id, PDO::PARAM_INT);
        $requete->execute();
        //Fonction native qui permet de spécifier le mode de récupération du resultat de la requete
            //FETCH_CLASS dit que c'est une instance de notre classe -> Clients
            //FETCH_PROPS_LATE = Constructeur appellé AVANT pour prévenir un écrasement
        $requete->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Clients');
        $client = $requete->fetch(PDO::FETCH_ASSOC);

        return $client;
    }

    public function clientIban () {
        //Extrait le numéro d'iban du client
        $requete = $this->conn->prepare('SELECT iban FROM DBHoldUp.client WHERE id= ?');
        $requete->execute();
        //Fonction native qui permet de spécifier le mode de récupération du resultat de la requete
            //FETCH_CLASS dit que c'est une instance de notre classe -> Clients
            //FETCH_PROPS_LATE = Constructeur appellé AVANT pour prévenir un écrasement
        $requete->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Clients');
        //FETCH_ASSOC pour une sortie en tableau associatif id=>iban
        $iban = $requete->fetch(PDO::FETCH_ASSOC);

        return $iban;        
    }

// Est-ce une alternative valide ???
    
    public function client_Iban () {
        //Extrait le numéro d'iban du client
        $requete = $this->conn->query('SELECT iban FROM DBHoldUp.client WHERE id= ?');
        $iban = $requete->fetch(PDO::FETCH_ASSOC);

        return new Clients($iban);        
    }

}