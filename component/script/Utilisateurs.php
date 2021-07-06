<?php

class Utilisateurs {

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

// Setters

public function setId($id) {
    $this->id = (int) $id;
}
public function setIban($iban) {
    $this->iban = $iban;
}
public function setBanquierId($banquierId) {
    $this->banquierId = (int) $banquierId;
}
public function setGenre($genre) {
    $this->genre = (bool) $genre;
}
public function setNom($nom) {
    $this->nom = $nom;
}
public function setPrenom($prenom) {
    $this->prenom = $prenom;
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
    $this->mail = $mail;
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

    public function getId($id) {

    }
    public function getIban($iban) {
        
    }
    public function getBanquierId($banquierId) {
        
    }
    public function getGenre($genre) {
        
    }
    public function getNom($nom) {
        
    }
    public function getPrenom($prenom) {
        
    }
    public function getAdresse($adresse) {
        
    }
    public function getCodepostal($codepostal) {
        
    }
    public function getVille($ville) {
        
    }
    public function getNaissance($naissance) {
        
    }
    public function getMail($mail) {
        
    }
    public function getPass($pass) {
        
    }
    public function getPi($pi) {
        
    }
    public function getSuppress($suppres) {
        
    }

}