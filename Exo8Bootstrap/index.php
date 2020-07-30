
<?php
    require_once("classes/formatage.utile.php");
    include("common/header.php");
    include("common/menu.php");
?>

    <div class="container"> 
   

    <?php echo utile::gererTitreNiveau1('Bienvenue sur le 2e site d`exercices en PHP et POO') ?>
        <div class="row">
            <div class="col">
                <h2 class="text-center">Gestion paniers </h2>
                <div class="mx-auto" style="width:150px"><a class="btn btn-outline-primary" href="afficherPaniers.php" role="button">Gestion des paniers</a>
                </div>
            </div>
            <div class="col">
                <h2 class="text-center">Gestion  des fruits</h2>
                <div class="mx-auto" style="width:150px"><a class="btn btn-outline-primary" href="afficherFruits.php" role="button">Gestion des fruits</a>
                </div>
            </div>
            
        </div>
    </div>

<?php 
    include("common/footer.php");
?>