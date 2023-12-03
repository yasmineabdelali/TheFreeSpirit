<?php

require '../config.php';

class CommandC
{
    public function listCommands()
    {
        $sql = "SELECT * FROM command";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function deleteCommand($id)
    {
        $sql = "DELETE FROM command WHERE id_com = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function addCommand($command)
    {
        $sql = "INSERT INTO command  VALUES (null ,:nom, :adresse, :produit, :tel)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nom' => $command->getNom(),
                'adresse' => $command->getAdresse(),
                'produit' => $command->getProduit(),
                'tel' => $command->getTel(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function showCommand($id)
    {
        $sql = "SELECT * FROM command WHERE id_com = :id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':id', $id);
            $query->execute();
            $command = $query->fetch(PDO::FETCH_ASSOC);
            return $command;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updateCommand($command, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE command SET 
                    nom = :nom_com, 
                    adresse = :adresse_com, 
                    produit = :produit_com, 
                    tel = :tel_com
                WHERE id_com = :id_com'
            );

            $query->execute([
                'id_com' => $id,
                'nom_com' => $command->getNom(),
                'adresse_com' => $command->getAdresse(),
                'produit_com' => $command->getProduit(),
                'tel_com' => $command->getTel(),
            ]);

            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    
}
