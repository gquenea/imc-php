<h1>Page des vélos</h1>
<a href="?type=velo&action=new" class="btn btn-success">Créer un velo</a>


<?php foreach ($velos as $velo) { ?>
    <hr>
    <h2><?= $velo->getName() ?></h2>
    <h3><?= $velo->getDescription() ?></h3>
    <h3><strong>Prix : <?= $velo->getPrice() ?>€</strong></h3>
    <img src="images/<?= $velo->getImage() ?>" alt="">

    <a href="?type=velo&action=show&id=<?= $velo->getId() ?>" class="btn btn-primary">Voir ce vélo</a>


    <hr>
<?php } ?>