<?php
require_once "Model.class.php";
require_once "Conseil.class.php";

class ConseilManager extends Model{
    private $conseils; //tableau de conseils

    public function ajoutConseil($conseil){
        $this->conseils[] = $conseil;
    }

    public function getConseils(){
        return $this->conseils;
    }

    public function chargementConseils(){
        $req = $this->getBdd()->prepare("SELECT * FROM conseils");
        $req->execute();
        $mesConseils = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();

        foreach($mesConseils as $conseil){
            $c = new Conseil($conseil['id'],$conseil['titre'],$conseil['nbPages'],$conseil['image']);
            $this->ajoutConseil($c);
        }
    }

    public function getConseilById($id){
        for($i=0; $i < count($this->conseils);$i++){
            if($this->conseils[$i]->getId() === $id){
                return $this->conseils[$i];
            }

        }

    }
    public function ajoutConseilBd($titre,$nbPages,$image){
        $req = "
        INSERT INTO conseils(titre, nbPages, image)
        value(:titre, :nbPages, :image)";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":titre",$titre,PDO::PARAM_STR);
        $stmt->bindValue(":nbPages",$nbPages,PDO::PARAM_INT);
        $stmt->bindValue(":image",$image,PDO::PARAM_STR);
        $resultat = $stmt->execute();
        $stmt->closeCursor();

        if($resultat > 0){
            $conseil = new Conseil($this->getBdd()->lastInsertId(),$titre,$nbPages,$image);
            $this->ajoutConseil($conseil);
        }
        

    }
    public function suppressionConseilBD($id){
        $req = "
        Delete from conseils where id = :idConseil
        ";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":idConseil",$id,PDO::PARAM_INT);
        $resultat = $stmt->execute();
        $stmt->closeCursor();
        if($resultat > 0){
            $conseil = $this->getConseilById($id);
            unset($conseil);

        }



    
    }
    public function modificationConseilBD($id,$titre,$nbPages,$image){
        $req = "
        update conseils 
        set titre = :titre, nbPages = :nbPages, image = :image
        where id = :id";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":id",$id,PDO::PARAM_INT);
        $stmt->bindValue(":titre",$titre,PDO::PARAM_STR);
        $stmt->bindValue(":nbPages",$nbPages,PDO::PARAM_INT);
        $stmt->bindValue(":image",$image,PDO::PARAM_STR);
        $resultat = $stmt->execute();
        $stmt->closeCursor();

        if($resultat > 0){
            $this->getConseilById($id)->setTitre($titre);
            $this->getConseilById($id)->setTitre($nbPages);
            $this->getConseilById($id)->setTitre($image);

        }


    }
}