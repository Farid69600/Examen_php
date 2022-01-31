<?php foreach($velos as $velo){ ?>

<div class="row mt-3 mb-3 bg-warning">

    <h2><?= $velo->getName() ?></h2>
    <img src="images/<?= $velo->getImage() ?>" style="max-width:200px" alt="">
    <h3><?= $velo->getDescription() ?></h3>
    <p><?= $velo->getPrice() ?> euros</p> 
    
    <!-- crée un lien "bouton" qui permet d'afficher un seul vélo -->
    <a href="?type=velo&action=show&id=<?=$velo->getId() ?>" class="btn btn-success">Afficher un Vélo</a>

</div>

<?php } ?>