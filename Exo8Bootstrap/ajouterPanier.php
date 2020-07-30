<?php 
    require_once("classes/fruits.class.php");
    require_once("classes/panier.class.php");
    require_once("classes/formatage.utile.php");
    include("common/header.php");
    include("common/menu.php");
?>
<div class="container"> 
<?php echo utile::gererTitreNiveau2( "ajout d un panier :"); ?>

<?php   
    echo '<form action="#" method ="POST" >';
        echo '<fieldset><legend>Panier à créer :</legend>';
        echo '<label for="client">Nom du client : </label>';
        echo '<input type="text" name="client" id="client" required/>';
        echo '<label for="nb_pommes">Nombres de pommes : </label>';
        echo '<input type="number" name="nb_pommes" id="nb_pommes" required/>';
        echo '<label for="nb_cerise">Nombres de cerises : </label>';
        echo '<input type="number" name="nb_cerise" id="nb_cerise" required/>';
        echo '<input type="submit" value="Créer le panier" />';
    echo "</fieldset></form>";

   
    if(isset($_POST['client']) && !empty($_POST['client'])){

        $p = new Panier(Panier::generateUniqueId(),$_POST['client']);
        $res = $p->saveInDB();
        if($res){
            
             $nbPomme = (int)$_POST['nb_pommes'];
             $nbCerise = (int)$_POST['nb_cerise'];
             $cpt = 1;
             $nbFruitInDB =Fruit::genererUniqueID();

                for($i = 0 ; $i < $nbPomme;$i++){
                    $fruit =new Fruit("pomme".($nbFruitInDB+$cpt),rand(120,160),20);
                    $fruit->saveInDB($p->getIdentifiant());
                    $p->addFruit($fruit);
                    $cpt++;
                }
                for($i = 0 ; $i < $nbCerise;$i++){
                    $fruit =new Fruit("cerise".($nbFruitInDB+ $cpt),rand(120,160),20);
                    $fruit->saveInDB($p->getIdentifiant());
                    $p->addFruit($fruit);
                    $cpt++;
                } 
            
            echo $p;
            echo "ok";

        }else {

            echo " l ajout n a pas fonctionné";
        }
        
        
    }

    

?>
</div>
<?php 
    include("common/footer.php");
?>