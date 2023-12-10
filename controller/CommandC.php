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
        $sql = "DELETE FROM command WHERE id_pan = :id";
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
        $sql = "INSERT INTO command  VALUES (null,:id_com ,:nom, :adresse, :produit, :tel, :email)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'id_com' =>$command->getid_com(),
                'nom' => $command->getNom(),
                'adresse' => $command->getAdresse(),
                'produit' => $command->getProduit(),
                'tel' => $command->getTel(),
                'email' => $command->getEmail(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function showCommand($id)
    {
        $sql = "SELECT * FROM command WHERE id_pan = :id";
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
                    id_com = :id_com,
                    nom = :nom_com, 
                    adresse = :adresse_com, 
                    produit = :produit_com, 
                    tel = :tel_com,
                    email = :email_com
                WHERE id_pan = :id_pan'
            );

            $query->execute([
                'id_pan' => $id,
                'id_com' => $command->getid_com(),
                'nom_com' => $command->getNom(),
                'adresse_com' => $command->getAdresse(),
                'produit_com' => $command->getProduit(),
                'tel_com' => $command->getTel(),
                'email_com' => $command->getEmail(),

            ]);

            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    
}
