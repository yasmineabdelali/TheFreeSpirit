<?php

require '../config.php';

class userF
{

    public function listuserF()
    {
        $sql = "SELECT * FROM connexion";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteuserF($ide)
    {
        $sql = "DELETE FROM connexion WHERE iduserF = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $ide);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    function adduserF($user)
    {
        $sql = "INSERT INTO connexion 
        VALUES (NULL, :nom,:prenom, :email,:tel,:role)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nom' => $user->getNom(),
                'prenom' => $user->getPrenom(),
                'email' => $user->getEmail(),
                'tel' => $user->getTel(),
                'role' => $user->getrole(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    function showuserF($id)
    {
        $sql = "SELECT * from connexion where iduserF = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $connexion = $query->fetch();
            return $connexion;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updateuserF($connexion, $id)
    {   
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE connexion SET 
                    nom = :nom, 
                    prenom = :prenom, 
                    email = :email, 
                    tel = :tel,
                    role = :role
                WHERE iduserF= :iduserF'
            );
            
            $query->execute([
                'iduserF' => $id,
                'nom' => $connexion->getNom(),
                'prenom' => $connexion->getPrenom(),
                'email' => $connexion->getEmail(),
                'tel' => $connexion->getTel(),
                'role'=>$connexion->getrole(),
            ]);
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}
