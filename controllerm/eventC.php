<?php
require "../config.php";
class eventC{
    public function tab_event(){
        $req = "SELECT * FROM evenement";
        $db = config::getConnexion();
        try{
            $tab = $db->query($req);
            return $tab;
        } catch (Exception $e){
            die('Error:' . $e->getMessage());
        }
    }
    
    public function tab_codepostal(){
        $req = "SELECT * FROM codepostal";
        $db = config::getConnexion();
        try{
            $tab = $db->query($req);
            return $tab;
        } catch (Exception $e){
            die('Error:' . $e->getMessage());
        }
    }


    function jointure($codepostal){
        $sql = "SELECT * FROM evenement JOIN codepostal ON evenement.id = codepostal.id where codepostal.codepostal LIKE :codepostal";

        $db = config::getConnexion();
        try {
            $req = $db->prepare($sql);
            $req->bindParam(':codepostal', $codepostal);
            $req->execute();
            $list = $req->fetchAll(PDO::FETCH_ASSOC);
            return $list;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function ajouterevenement($nouv_evenement){
        $sql = "INSERT INTO evenement
        VALUES (null, :nom, :lieu, :datee, :duree, :prix)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nom'  => $nouv_evenement->return_nom(),
                'lieu' => $nouv_evenement->return_lieu(),
                'datee' => $nouv_evenement->return_date(),
                'duree' => $nouv_evenement->return_duree(),
                'prix' => $nouv_evenement->return_prix(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function derniereidajouté(){
        $req = "SELECT id FROM evenement ORDER BY id DESC LIMIT 1";
        $db = config::getConnexion();
        try{
            $list = $db->query($req);
            $lastId = $list->fetch(PDO::FETCH_ASSOC); 
            return $lastId['id']; 
        } catch (Exception $e){
            die('Error:' . $e->getMessage());
        }
    }


    function majevenement($evenement, $id){
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE evenement SET 
                    nom  = :nom_ev,
                    lieu = :lieu_ev,
                    datee = :datee_ev,
                    duree=:duree_ev,
                    prix=:prix_ev
                WHERE id = :id_ev'
            );
            $query->execute([
                'id_ev' => $id,
                'nom_ev' => $evenement->return_nom(),
                'lieu_ev' => $evenement->return_lieu(),
                'datee_ev' => $evenement->return_date(),
                'duree_ev' => $evenement->return_duree(),
                'prix_ev' => $evenement->return_prix(),
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    function afficher_evenement($id_ev){
        $sql = "SELECT * from evenement where id = :id_ev";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':id_ev', $id_ev);
            $query->execute();
            $Event = $query->fetch();
            return $Event;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    function supp_evenement($id_ev){
        $sql = "DELETE FROM evenement WHERE id = :id_ev";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id_ev', $id_ev);
        try{
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    function filtreevenement_nom_a_z(){
    $req = "SELECT * FROM evenement ORDER BY nom ASC";
    $db = configurer::getConnexion();
    try{
        $list = $db->query($req);
        return $list;
    } catch (Exception $e){
        die('Error:' . $e->getMessage());
    }
}

    function filtreevenement_nom_z_a(){
    $req = "SELECT * FROM evenement ORDER BY nom DESC";
    $db = configurer::getConnexion();
    try{
        $list = $db->query($req);
        return $list;
    } catch (Exception $e){
        die('Error:' . $e->getMessage());
    }
}

    function filtreevenement_lieu_a_z(){
    $req = "SELECT * FROM evenement ORDER BY lieu ASC";
    $db = configurer::getConnexion();
    try{
        $list = $db->query($req);
        return $list;
    } catch (Exception $e){
        die('Error:' . $e->getMessage());
    }
}

    function filtreevenement_lieu_z_a(){
    $req = "SELECT * FROM evenement ORDER BY lieu DESC";
    $db = configurer::getConnexion();
    try{
        $list = $db->query($req);
        return $list;
    } catch (Exception $e){
        die('Error:' . $e->getMessage());
    }
}

    function filtreevenement_datecrois(){
    $req = "SELECT * FROM evenement ORDER BY datee ASC";
    $db = configurer::getConnexion();
    try{
        $list = $db->query($req);
        return $list;
    } catch (Exception $e){
        die('Error:' . $e->getMessage());
    }
}

    function filtreevenement_datedecrois(){
    $req = "SELECT * FROM evenement ORDER BY datee DESC";
    $db = configurer::getConnexion();
    try{
        $list = $db->query($req);
        return $list;
    } catch (Exception $e){
        die('Error:' . $e->getMessage());
    }
}

    function filtreevenement_tempsdebcrois(){
    $req = "SELECT * FROM evenement ORDER BY duree ASC";
    $db = configurer::getConnexion();
    try{
        $list = $db->query($req);
        return $list;
    } catch (Exception $e){
        die('Error:' . $e->getMessage());
    }
}

    function filtreevenement_tempsdebdecrois(){
    $req = "SELECT * FROM evenement ORDER BY duree DESC";
    $db = configurer::getConnexion();
    try{
        $list = $db->query($req);
        return $list;
    } catch (Exception $e){
        die('Error:' . $e->getMessage());
    }
}

    function filtreevenement_prixcrois(){
    $req = "SELECT * FROM evenement ORDER BY prix ASC";
    $db = configurer::getConnexion();
    try{
        $list = $db->query($req);
        return $list;
    } catch (Exception $e){
        die('Error:' . $e->getMessage());
    }
}

    function filtreevenement_prixdecrois(){
    $req = "SELECT * FROM evenement ORDER BY prix DESC";
    $db = configurer::getConnexion();
    try{
        $list = $db->query($req);
        return $list;
    } catch (Exception $e){
        die('Error:' . $e->getMessage());
    }
}

}

class codepostalC{

    function ajouterpostal($nouv_postal){
        $sql = "INSERT INTO evenement
        VALUES (null, :id, :codepostal)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'id'  => $nouv_postal->return_id(),
                'codepostal' => $nouv_postal->return_codepostal(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

  
    function updatelink($id_postal, $id, $new_codepostal){
        try {
            $db = configurer::getConnexion();
            $query = $db->prepare(
                'UPDATE codepostal SET
                    id = :id,
                    codepostal  = :codepostal
                WHERE id_postal = :id_postal'
            );
    
            $query->execute([
                'id' => $id,
                'codepostal' => $new_codepostal,
                'id_postal' => $id_postal,
            ]);
    
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            // Output the error message
            echo 'Error: ' . $e->getMessage();
        }
    }

}