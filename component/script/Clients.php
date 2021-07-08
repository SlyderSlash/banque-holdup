<?php

class Clients {

private $erreurs = [],
        $id,
        $iban,
        $banquierId,
        $genre,
        $nom,
        $prenom,
        $adresse,
        $codepostal,
        $ville,
        $naissance,
        $mail,
        $pass,
        $pi,
        $suppress;

//Erreurs []
const   Nom_invalide = 1,
        Prenom_invalide = 2,
        Email_invalide = 3;

// Appel la fonction hydrate sur l'objet
public function __construct($donnees = [])
{
    if(!empty($donnees)){
        $this->hydrate($donnees);
    }
}


//Permet d'assigner les valeurs aux attributs de l'objet en appellant le setter
public function hydrate($donnees)
{
    foreach ($donnees as $attribut => $valeur) {
        $methodeSetters = 'set'.ucfirst($attribut);
        $this->$methodeSetters($valeur);
    }
}

// Setters

public function setId($id) {
    if(!empty($id))
        {
            $this->id = (int) $id;
        }        
}

public function setIban($iban) {
    $this->iban = $iban;
}

public function setBanquierId($banquierId) {
    $this->banquierId = (int) $banquierId;
}

public function setGenre($genre) {
    $this->genre = $genre;
}
public function setNom($nom) {
    $nom = htmlspecialchars($nom);
    if  (strlen($nom) >= 150 || 
        strlen($nom) <= 1 || 
        preg_match('/[0-9]/',$nom))
    {
        $this->erreurs[] = self::Nom_invalide;
    }
    else
    { 
        $this->nom = $nom;
    }
}

public function setPrenom($prenom) {
    $prenom = htmlspecialchars($prenom);
    if  (strlen($prenom) >= 150 || 
        strlen($prenom) <= 1 || 
        preg_match('/[0-9]/',$prenom))
    {
        $this->erreurs[] = self::Prenom_invalide;
    }
    else
    { 
        $this->prenom = $prenom;
    }
}

public function setAdresse($adresse) {
    $this->adresse = $adresse;
    
}
public function setCodepostal($codepostal) {
    $this->codepostal = (int) $codepostal;
}
public function setVille($ville) {
    $this->ville = $ville;
}
public function setNaissance($naissance) {
    $this->naissance = $naissance;
}

public function setMail($mail) {
    if(filter_var($mail, FILTER_VALIDATE_EMAIL))
    {
        $this->mail = htmlspecialchars($mail);
    } 
    else 
    {
        $this->erreurs[] = self::Email_invalide;
    }
}

public function setPass($pass) {
    $this->pass = $pass;
}
public function setPi($pi) {
    $this->pi = $pi;
}
public function setSuppress($suppress) {
    $this->suppress = $suppress;
}


// Getters

    public function getId() {
        return $this->id;
    }
    public function getIban() {
        return $this->iban;
    }
    public function getBanquierId() {
        return $this->banquierId;
    }
    public function getGenre() {
        return $this->genre;
    }
    public function getNom() {
        return $this->nom;
    }
    public function getPrenom() {
        return $this->prenom;
    }
    public function getAdresse() {
        return $this->adresse;
    }
    public function getCodepostal() {
        return $this->codepostal;
    }
    public function getVille() {
        return $this->ville;
    }
    public function getNaissance() {
        return $this->naissance;
    }
    public function getMail() {
        return $this->mail;
    }
    public function getPass() {
        return $this->pass;
    }
    public function getPi() {
        return $this->pi;
    }
    public function getSuppress() {
        return $this->suppress;
    }
    public function getErreurs() {
        return $this->erreurs;
    }
}