<?php 
ob_start(); 
?>

<div class="row">
    
    <div class="col-6">
        <img id="imgaffich" src="<?= URL ?>public/images/<?= $conseil->getImage();?>">
    </div>

    <div class="col-6">
        <p class="textaffich">Titre : <?= $conseil->getTitre();?></p>
        <p class="textaffich">Nombre de pages : <?= $conseil->getNbPages();?></p>
    </div>
   
</div>

<?php
$content = ob_get_clean();
$titre = $conseil->getTitre();
require "template.php";
?>