<?php 
ob_start(); 
?>

<form method="POST" action="index.php?page=conseils/av" enctype="multipart/form-data">
    <div class="form-group">
        <label for="titre">Titre : </label>
        <input type="text" class="form-control" id="titre" name="titre">
    </div>
<br>
    <div class="form-group">
        <label for="article">Article : </label>
        <input type="text" class="form-control" id="article" name="article">
    </div>
<br>
   <div class="form-group">
        <label for="image">Image : </label>
        <input type="file" class="form-control-file" id="image" name="image">
   </div>
    <br>
    <button type="submit" class="btn btn-primary">Valider</button>
    <br>
</form>

<?php
$content = ob_get_clean();
$titre = "Ajouter un article";
require "template.php";
?>