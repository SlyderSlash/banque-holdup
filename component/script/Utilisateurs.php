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
        return $this->id;
    }
    public function getIban($iban) {
        return $this->iban;
    }
    public function getBanquierId($banquierId) {
        return $this->banquierId;
    }
    public function getGenre($genre) {
        return $this->genre;
    }
    public function getNom($nom) {
        return $this->nom;
    }
    public function getPrenom($prenom) {
        return $this->prenom;
    }
    public function getAdresse($adresse) {
        return $this->adresse;
    }
    public function getCodepostal($codepostal) {
        return $this->codepostal;
    }
    public function getVille($ville) {
        return $this->ville;
    }
    public function getNaissance($naissance) {
        return $this->naissance;
    }
    public function getMail($mail) {
        return $this->mail;
    }
    public function getPass($pass) {
        return $this->pass;
    }
    public function getPi($pi) {
        return $this->pi;
    }
    public function getSuppress($suppress) {
        return $this->suppress;
    }

}