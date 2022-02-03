<form action="?type=velo&action=change" method="post">
    <div class="form-group">

    <input type="text" placeholder="nom" name="name" value="<?=$velo->getName() ?>">
    </div>
    <div class="form-group">
    <input type="text" placeholder="description" name="description" value="<?=$velo->getDescription() ?>">
    </div>
    <div class="form-group">
    <input type="text" placeholder="image" name="image" value="<?=$velo->getImage() ?>">
    </div>
    <div class="form-group">
    <input type="text" placeholder="prix" name="price" value="<?=$velo->getPrice() ?>">
    </div>
    <div class="form-group">

    <button name="id" value="<?=$velo->getId() ?>" class="btn btn-success" type="submit">Poster</button>
    </div>
</form>