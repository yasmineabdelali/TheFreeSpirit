<?php




class produit
{
    public ?int $idproduit = null;
    public string $nom;
    public int $prix;


    public function __construct($idproduit, $n, $p)
    {
        $this->idproduit = $id;
        $this->nom = $n;
        $this->prix = $p;

    }


    public function getIdproduit()
    {
        return $this->idproduit;
    }


    public function getNom()
    {
        return $this->nom_produit;
    }


    public function setNom($new_nom)
    {
        $this->nom_produit = $new_nom;

        return $this;
    }


    public function getPrix()
    {
        return $this->prix_produit;
    }


    public function setprix($new_prix)
    {
        $this->prix_produit = $new_prix;

        return $this;
    }


 
}
?>