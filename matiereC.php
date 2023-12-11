<?php

require_once  $_SERVER['DOCUMENT_ROOT'] . "/bahe/config.php";
include_once  $_SERVER['DOCUMENT_ROOT'] . "/bahe//Model/matiere.php";

class matiereC
{
    function affichermatiere()
    {
        $sql = "SELECT * FROM matiere";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            $results = $liste->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }

    function ajoutermatiere($matiere)
{
    $sql = "INSERT INTO matiere (nom)
            VALUES (:nom)";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute([
            'nom' => $matiere->getNom(),
            
        ]);
    } catch (Exception $e) {
        echo 'Erreur: ' . $e->getMessage();
    }
}
   
function modifiermatiere($matiere)
{
    $sql = "UPDATE matieres SET nom = :nom, description = :description, niveau = :niveau, salle = :salle, datedeb = :datedeb, datefin = :datefin WHERE id = :id";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute([
            'nom' => $matiere->getNom(),
            'description' => $matiere->getDescription(),
            'niveau' => $matiere->getNiveau(),
            'salle' => $matiere->getSalle(),
            'datedeb' => $matiere->getDateDeb(),
            'datefin' => $matiere->getDateFin(),
            'id' => $matiere->getId(),
        ]);
        return true; 
    } catch (Exception $e) {
        echo 'Erreur: ' . $e->getMessage();
        return false; 
    }
}
    public function getmatiereById($id) {
        try {
            $query = "SELECT * FROM matieres WHERE id = :id";
            $db = config::getConnexion();
            $stmt = $db->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($result) {
                return $result; 
            } else {
                return null;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return null; 
        }
    }

            function deletematiere($id)
            {
                $sql = "DELETE FROM matieres WHERE id=:id";
                $db = config::getConnexion();
                $req = $db->prepare($sql);
                $req->bindValue(':id', $id);
                try {
                    $req->execute();
                } catch (Exception $e) {
                    echo 'Erreur: ' . $e->getMessage();
                }
            }
          

}
