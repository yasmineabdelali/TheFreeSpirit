<?php
class Command
{
    public ?int $id_command = null;
    public string $nom_command ;
    public string $adresse_command ;
    public string $produit_command ;
    public int $tel_command ;

    public function __construct($id_com, $nom_com,$adresse_com, $produit_com,  $tel_com){
        $this->id_command = $id_com;
        $this->nom_command = $nom_com;
        $this->adresse_command = $adresse_com;
        $this->produit_command = $produit_com;
        $this->tel_command = $tel_com;
    }

    public function getid_com()
    {
        return $this->id_command;
    }

   

    public function setNom($nom)
    {
        $this->nom_command = $nom;
        return $this;
    }
    public function getNom()
    {
        return $this->nom_command;
    }

    

    public function setAdresse($adresse)
    {
        $this->adresse_command = $adresse;
        return $this;
    }
    public function getAdresse()
    {
        return $this->adresse_command;
    }

    

    public function setProduit($produit)
    {
        $this->produit_command = $produit;
        return $this;
    }
    public function getProduit()
    {
        return $this->produit_command;
    }

   

    public function setTel($tel)
    {
        $this->tel_command = $tel;
        return $this;
    }
    public function getTel()
    {
        return $this->tel_command;
    }
}


