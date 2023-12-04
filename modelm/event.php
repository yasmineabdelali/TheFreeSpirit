<?php
class event
{
    public ?int $id_event = null;
    public string $nom_event;
    public string $lieu_event;
    public string $date_event;
    public int $duree_event;
    public int $prix_event;
    
    public function __construct($id_ev, $nom_ev,$lieu_ev, $Date_ev,  $duree_ev,$prix_ev){
        $this->id_event = $id_ev;
        $this->nom_event = $nom_ev;
        $this->lieu_event = $lieu_ev;
        $this->date_event = $Date_ev;
        $this->duree_event = $duree_ev;
        $this->prix_event = $prix_ev;
    }


    public function getIdEvenement(){
        return $this->id_event;
    }


    public function return_nom(){
        return $this->nom_event;
    }


    public function setnomevent($new_name){
        $this->nom_event = $new_name;
        return $this;
    }


    public function setDateEvenement($new_date_evenement) {
         $this->date_event =$new_date_evenement;
         return $this;
    }


    public function return_date(){
        return $this->date_event;
    }


    public function set_lieu($new_lieu){
        $this->lieu_event=$new_lieu;

        return $this;
    }


    public function return_lieu(){
        return $this->lieu_event;
    }


    public function set_duree($duree_ev){
        $this->duree_event=$duree_ev;
    
        return $this;
    }


    public function return_duree(){
        return $this->duree_event;
    }
   
    public function set_prix($prix_ev){
        $this->prix_event=$prix_ev;
    
        return $this;
    }


    public function return_prix(){
        return $this->prix_event;
    }
}

class codepostal{
    public ?int $id_postal = null;
    public int $id;
    public int $codepostal;
   
    
    public function __construct($id_postal ,$id,$codepostal){
        $this->id_postal = $id_postal;
        $this->id = $id;
        $this->codepostal = $codepostal;
        
    }


    public function getidpostal(){
        return $this->id_postal;
    }



    
    public function setid($new_id){
        $this->id = $new_id;
        return $this;
    }

    public function return_id(){
        return $this->id;
    }



    public function setcodepostal($new_codepostal) {
         $this->codepostal =$new_codepostal;
         return $this;
    }


    public function return_codepostal(){
        return $this->codepostal;
    }

}

?>