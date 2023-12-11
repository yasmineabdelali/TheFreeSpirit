<?php
class Cour {
    private $id;
    private $nom;
    private $description;
    private $niveau;
    private $enseignat;
    private $salle;
    private $datedeb;
    private $datefin;
    private $matiere;

    public function __construct($id, $nom, $description, $niveau, $enseignat, $salle, $datedeb, $datefin, $matiere)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->description = $description;
        $this->niveau = $niveau;
        $this->enseignat = $enseignat;
        $this->salle = $salle;
        $this->datedeb = $datedeb;
        $this->datefin = $datefin;
        $this->matiere = $matiere;
    }

    // Getters and Setters for each property

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getNiveau()
    {
        return $this->niveau;
    }

    public function setNiveau($niveau)
    {
        $this->niveau = $niveau;
    }

    public function getEnseignat()
    {
        return $this->enseignat;
    }

    public function setEnseignat($enseignat)
    {
        $this->enseignat = $enseignat;
    }

    public function getSalle()
    {
        return $this->salle;
    }

    public function setSalle($salle)
    {
        $this->salle = $salle;
    }

    public function getDateDeb()
    {
        return $this->datedeb;
    }

    public function setDateDeb($datedeb)
    {
        $this->datedeb = $datedeb;
    }

    public function getDateFin()
    {
        return $this->datefin;
    }

    public function setDateFin($datefin)
    {
        $this->datefin = $datefin;
    }
    public function getmatiere()
    {
        return $this->matiere;
    }

    public function setmatiere($matiere)
    {
        $this->matiere = $matiere;
    }
}
?>