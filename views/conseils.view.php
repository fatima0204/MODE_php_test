<?php 
ob_start(); 
?>

<table id="tablelis" class="table text-center">
    <tr class="table-dark">
        <th>Image</th>
        <th>Titre</th>
        <th>Article</th>
        <th colspan="2">Actions</th>
    </tr>
    <?php 
    for($i=0; $i < count($conseils);$i++) : 
    ?>
    <tr>
        <td class="align-middle"><img src="public/images/<?= $conseils[$i]->getImage(); ?>" width="60px;"></td>
        <td class="align-middle"><a href="index.php?page=conseils/l/<?= $conseils[$i]->getId();?>"><?= $conseils[$i]->getTitre(); ?></a></td>
        <td class="align-middle"><?= $conseils[$i]->getArticle(); ?></td>
        <td class="align-middle"><a href="index.php?page=conseils/m/<?= $conseils[$i]->getId();?>" class="btn" id="buttmod">Modifier</a></td>
        <td class="align-middle">
            <form method="POST" action="index.php?page=conseils/s/<?= $conseils[$i]->getId();?>" onSubmit="return confirm('Voulez-vous vraiment supprimer cet article?');">
            <button class="btn btn-danger" type="submit">Supprimer</button>
        </form>
        </td>
    </tr>
    <?php endfor; ?>
</table>
<a href="index.php?page=conseils/a" id="buttli" class="btn btn-success d-block">Ajouter</a>

<?php
$content = ob_get_clean();
$titre = "Les conseils de mode";
require "template.php";
?>