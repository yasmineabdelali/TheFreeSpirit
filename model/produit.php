<?php




class produit
{
    public ?int $idproduit = null;
    public string $nom;
    public int $prix;


    public function __construct($idproduit, $n, $p)
    {
        $this->idproduit = $idproduit;
        $this->nom = $n;
        $this->prix = $p;

    }


    public function getIdproduit()
    {
        return $this->idproduit;
    }


    public function getNom()
    {
        return $this->nom;
    }


    public function setNom($new_nom)
    {
        $this->nom = $new_nom;

        return $this;
    }


    public function getPrix()
    {
        return $this->prix;
    }


    public function setprix($new_prix)
    {
        $this->prix = $new_prix;

        return $this;
    }


 
}
?>