<?php
define("URL", str_replace("index.php","",(isset($_SERVER['HTTPS']) ? "https" : "http").
"://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));

require_once "controllers/ConseilsController.controller.php";
$conseilController = new ConseilsController;

if(empty($_GET['page'])){
    require "views/accueil.view.php";
} else {
    $url = explode("/", filter_var($_GET['page']),FILTER_SANITIZE_URL);
    
    switch($url[0]){
        case "accueil" : require "views/accueil.view.php";
        break;
        case "conseils" : 
            if(empty($url[1])){
                $conseilController->afficherConseils();
            } else if($url[1] === "l") {
                $conseilController->afficherConseil($url[2]);
            } else if($url[1] === "a") {
               $conseilController->ajoutConseil(); 
            } else if($url[1] === "m") {
               $conseilController->modificationConseil($url[2]);
            } else if($url[1] === "s") {
               $conseilController->suppressionConseil($url[2]);
            } else if($url[1] === "av") {
                $conseilController->ajoutConseilValidation();
            } else if($url[1] === "mv") {
                $conseilController->modificationConseilValidation();
            }

        break;
    }
}








