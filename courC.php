<?php

require_once  $_SERVER['DOCUMENT_ROOT'] . "/bahe/config.php";
include_once  $_SERVER['DOCUMENT_ROOT'] . "/bahe//Model/cour.php";

class courC
{
    function afficherCour()
    {
        $sql = "SELECT * FROM cours ";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            $results = $liste->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }

    function ajouterCour($cour)
{
    $sql = "INSERT INTO cours (nom, description, niveau, salle, datedeb, datefin, matiere)
            VALUES (:nom, :description, :niveau, :salle, :datedeb, :datefin, :matiere)";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute([
            'nom' => $cour->getNom(),
            'description' => $cour->getDescription(),
            'niveau' => $cour->getNiveau(),
            'salle' => $cour->getSalle(),
            'datedeb' => $cour->getDateDeb(),
            'datefin' => $cour->getDateFin(),
            'matiere' => $cour->getMatiere()
        ]);
    } catch (Exception $e) {
        echo 'Erreur: ' . $e->getMessage();
    }
}
   
function modifierCour($cour)
{
    $sql = "UPDATE cours SET nom = :nom, description = :description, niveau = :niveau, salle = :salle, datedeb = :datedeb, datefin = :datefin, matiere = :matiere WHERE id = :id";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute([
            'nom' => $cour->getNom(),
            'description' => $cour->getDescription(),
            'niveau' => $cour->getNiveau(),
            'salle' => $cour->getSalle(),
            'datedeb' => $cour->getDateDeb(),
            'datefin' => $cour->getDateFin(),
            'id' => $cour->getId(),
            'matiere' => $cour->getMatiere(),
        ]);
        return true; 
    } catch (Exception $e) {
        echo 'Erreur: ' . $e->getMessage();
        return false; 
    }
}
    public function getCourById($id) {
        try {
            $query = "SELECT * FROM cours WHERE id = :id";
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

            function deleteCour($id)
            {
                $sql = "DELETE FROM cours WHERE id=:id";
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

