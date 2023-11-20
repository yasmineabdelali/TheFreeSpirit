<?php

class user
{
    private ?int $iduserF = null;
    private ?string $nom = null;
    private ?string $prenom = null;
    private ?string $email = null;
    private ?string $tel = null;
    private ?string $role = null;
   

    public function __construct($id = null, $n, $p, $a, $d,$r=null)
    {
        $this->iduserF = $id;
        $this->nom = $n;
        $this->prenom = $p;
        $this->email = $a;
        $this->tel = $d;
        $this->role = $r;
    }


    public function getIduserF()
    {
        return $this->iduserF;
    }


    public function getNom()
    {
        return $this->nom;
    }


    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }


    public function getPrenom()
    {
        return $this->prenom;
    }


    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }


    public function getEmail()
    {
        return $this->email;
    }


    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }


    public function getTel()
    {
        return $this->tel;
    }


    public function setTel($tel)
    {
        $this->tel = $tel;

        return $this;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function setRole($role)
    {
        $this->role = $role;
        return $this;
    }
}
?>