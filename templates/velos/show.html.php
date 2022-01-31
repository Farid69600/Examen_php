
<div class="row mt-3 mb-3 bg-warning">

    <h2><?= $velo->getName() ?></h2>
    <img src="images/<?= $velo->getImage() ?>" style="max-width:200px" alt="">
    <h3><?= $velo->getDescription() ?></h3>
    <p><?= $velo->getPrice() ?></p> 
    
</div>

<!-- crée le bouton "supprimer"-->
<form action="?type=velo&action=delete" method="post">
    <button class="btn btn-danger" type="submit" name="id" value="<?= $velo->getId() ?>">Supprimer</button>
</form>

<br>

<br>

<form class="ms-5" action="?type=avis&action=new" method="post">
    <div class="form-group"><input placeholder="Votre nom"  type="text" name="author" id=""></div> <br>
    <div class="form-group"><textarea placeholder="Votre avis" type="text" name="content" id=""></textarea></div>
    <br>
    <div class="form-group">
        <button class="btn btn-success" name="avisId" value="">Poster votre avis</button>
    </div>
</form>

<br>

<?php foreach($avis as $avi) {?>
            <div class="row bg-info mt-2 mb-2 border border-primary border border-4">
                <h3>
                    <p><strong><?= $avi->getAuthor() ?></strong></p>
                </h3>
                <p class="ms-5" ><?= $avi->getContent() ?></p>

                <form action="?type=avis&action=delete" method="post"><button type="submit" class="btn btn-danger mb-3" name="id" value="<?= $avi->getId() ?>">Supprimer cet avis</button></form>

            </div>
 <?php } ?>


<?php if(!$avis){?>
   <h2> Merci de laisser votre avis sur ce velo : <?= $velo->getName() ?></h2>
<?php } ?>


