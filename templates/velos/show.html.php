<hr>
<h2><?= $velo->getName() ?></h2>
<h3><?= $velo->getDescription() ?></h3>
<h3><strong>Prix : <?= $velo->getPrice() ?>€</strong></h3>
<img src="images/<?= $velo->getImage() ?>" alt="">

<form action="?type=velo&action=delete" method="post">
    <button type="submit" name="id" value="<?= $velo->getId() ?>" class="btn btn-primary">Supprimer ce vélo</button>
</form>
<a href="?type=velo&action=change&id=<?= $velo->getId() ?>" class="btn btn-warning">Modifier</a>

<a href="?type=velo&action=index" class="btn btn-secondary">Retour aux velos</a>
<hr>

<hr>
<form action="?type=avis&action=new" method="post">
    <div class="form-group">
        <input type="text" placeholder="votre nom" name="author" id="">
    </div>
    <div class="form-group">
        <input type="text" placeholder="votre avis" name="content" id="">
    </div>
    <div class="form-group">
        <input type="hidden" name="veloId" value="<?= $velo->getId() ?>">
    </div>
    <div class="form-group">

        <button class="btn btn-success" type="submit">Poster</button>
    </div>
</form>

<hr>

<?php foreach ($velo->getAvis() as $avis) { ?>

    <hr>
    <p>Author : <?= $avis->getAuthor() ?></p>

    <p><?= $avis->getContent() ?></p>
    <form action="?type=avis&action=delete" method="post">
        <button name="id" value="<?= $avis->getId() ?>" class="btn btn-danger" type="submit">Supprimer</button>
    </form>

    <a href="?type=avis&action=change&id=<?= $avis->getId() ?>" class="btn bt-warning">Modifier</a>
    <hr>


<?php } ?>