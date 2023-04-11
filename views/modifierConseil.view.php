<?php 
ob_start(); 
?>


<form method="POST" action="index.php?page=conseils/mv" enctype="multipart/form-data">
    <div class="form-group">
        <label for="titre">Titre : </label>
        <input type="text" class="form-control" id="titre" name="titre" value="<?= $conseil->getTitre()?>">
    </div>
<br>
    <div class="form-group">
        <label for="article">Article : </label>
        <input type="text" class="form-control" id="article" name="article" value="<?= $conseil->getArticle()?>" >
    </div>
<br>
<h3>Image : </h3>
<img id="imgmod" src="<?= URL ?>public/images/<?= $conseil->getImage()?>">
   <div class="form-group">
        <label for="image">Changer l'image : </label>
        <input type="file" class="form-control-file" id="image" name="image">
   </div>
    <br>
    <input type="hidden" name="identifiant" value="<?= $conseil->getId()?>">
    <button type="submit" class="btn btn-primary">Valider</button>
    <br>
</form>


<?php
$content = ob_get_clean();
$titre = "Modification du conseil mode : ".$conseil->getId();
require "template.php";
?>