<form action="?type=avis&action=change" method="post">
    <div class="form-group">
        <input type="text" placeholder="votre nom" name="author" value="<?=$avis->getAuthor() ?>" id="">
    </div>
    <div class="form-group">
        <input type="text" placeholder="votre avis" name="content" value="<?=$avis->getContent() ?>" id="">
    </div>
    <div class="form-group">
        <input type="hidden" name="id" value="<?=$avis->getId() ?>">
    </div>
    <div class="form-group">
        
    <button class="btn btn-success" type="submit">Poster</button>
    </div>
</form>