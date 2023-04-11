<?php
require_once "models/ConseilManager.class.php";

class ConseilsController{
    private $conseilManager;

    public function __construct(){
        $this->conseilManager = new ConseilManager;
        $this->conseilManager->chargementConseils();
    }

    public function afficherConseils(){
        $conseils = $this->conseilManager->getConseils();
        require "views/conseils.view.php";
    }

    public function afficherConseil($id){
        $conseil = $this->conseilManager->getConseilById($id);
        require "views/afficherConseil.view.php";
    }

    public function ajoutConseil(){
        require "views/ajoutConseil.view.php";
    }

    public function ajoutConseilValidation(){
        $file = $_FILES['image'];
        $repertoire = "public/images/";
        $nomImageAjoute = $this->ajoutImage($file,$repertoire);
        $this->conseilManager->ajoutConseilBd($_POST['titre'],$_POST['nbPages'],$nomImageAjoute);
        header('Location: '. URL . "index.php?page=conseils");
    }

    public function suppressionConseil($id){
        $nomImage = $this->conseilManager->getConseilById($id)->getImage();
        unlink("public/images/".$nomImage);
        $this->conseilManager->suppressionConseilBD($id);
        header('Location: '. URL . "index.php?page=conseils");

    }

    public function modificationConseil($id){
        $conseil = $this->conseilManager->getConseilById($id);
        require "views/modifierConseil.view.php";

    }

    public function modificationConseilValidation(){
        $imageActuelle = $this->conseilManager->getConseilById($_POST['identifiant'])->getImage();
        $file = $_FILES['image'];

        if($file['size'] > 0){
            unlink("public/images/".$imageActuelle);
            $repertoire = "public/images/";
            $nomImageToAd = $this->ajoutImage($file,$repertoire);

        }else {
            $nomImageToAd = $imageActuelle;
        }
        $this->conseilManager->modificationConseilBD($_POST['identifiant'],$_POST['titre'],$_POST['nbPages'],$nomImageToAd);
        header('Location: '. URL . "index.php?page=conseils");
    }

    private function ajoutImage($file, $dir){
        if(!isset($file['name']) || empty($file['name']))
            throw new Exception("Vous devez indiquer une image");
    
        if(!file_exists($dir)) mkdir($dir,0777);
    
        $extension = strtolower(pathinfo($file['name'],PATHINFO_EXTENSION));
        $random = rand(0,99999);
        $target_file = $dir.$random."_".$file['name'];
        
        if(!getimagesize($file["tmp_name"]))
            throw new Exception("Le fichier n'est pas une image");
        if($extension !== "jpg" && $extension !== "jpeg" && $extension !== "png" && $extension !== "gif")
            throw new Exception("L'extension du fichier n'est pas reconnu");
        if(file_exists($target_file))
            throw new Exception("Le fichier existe déjà");
        if($file['size'] > 500000)
            throw new Exception("Le fichier est trop gros");
        if(!move_uploaded_file($file['tmp_name'], $target_file))
            throw new Exception("l'ajout de l'image n'a pas fonctionné");
        else return ($random."_".$file['name']);
    }
}