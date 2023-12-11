<?php
require '../config.php';

class produitC
{

    public function tab_produit()
    {
        $sql = "SELECT * FROM produit";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteproduit($ide)
    {
        $sql = "DELETE FROM produit WHERE id = :ide";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':ide', $ide);
        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    function addproduit($produit){
        $sql = "INSERT INTO produit (id,nom,prix) VALUES (NULL, :nom,:prix)";
        $db = config::getConnexion();
        try {

            $query = $db->prepare($sql);
            $query->execute([
                'nom' => $produit->getNom(),
                'prix' => $produit->getPrix(),      
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    function listproduits($id)
{
    $sql = "SELECT * FROM produit WHERE id = :id";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->bindValue(":id", $id);
        $query->execute();
        $produit = $query->fetch();
        return $produit;
    } catch (Exception $e) {
        die('Error: ' . $e->getMessage());
    }
}


    function updateproduit($produit, $id)
    {   
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE produit SET 
                    nom = :nom, 
                    prix = :prix
                WHERE id = :id'
            );
             
            $query->execute([
                'id' => $id,
                'nom' => $produit->getNom(),
                'prix' => $produit->getPrix(),
            ]);
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    

    
}
?>