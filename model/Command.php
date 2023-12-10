<?php
class Command
{
    public ?int $id_pannier=null ;
    public ?int $id_command ;
    public string $nom_command ;
    public string $adresse_command ;
    public string $produit_command ;
    public int $tel_command ;
    public string $email_command ;

         public function   construct($id_pan,$id_com, $nom_com,$adresse_com, $produit_com,  $tel_com, $email_com,){
        $this->id_pannier = $id_pan;
        $this->id_command = $id_com;
        $this->nom_command = $nom_com;
        $this->adresse_command = $adresse_com;
        $this->produit_command = $produit_com;
        $this->tel_command = $tel_com;
        $this->email_command = $email_com;
    }
    public function getid_pan()
    {
        return $this->id_pannier;
    }


    public function setid_com($id_com)
    {
        $this->id_command = $id_com;
        return $this;
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

    public function setEmail($email)
    {
        $this->email_command = $email;
        return $this;
    }
    public function getEmail()
    {
        return $this->email_command;
    }
}


