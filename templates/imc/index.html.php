<div> Le résultat de votre IMC est de : </div>

<div>

    <?php foreach ($imc as $element) { ?>


        <hr>
        <div>
        <h2><?= $element->getDisplayName() ?></h2>
        <h2><?= $element->getResultat() ?></h2>

        </div>
        <hr>

        
   <?php } ?>

</div>