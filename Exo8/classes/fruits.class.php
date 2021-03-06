<?php

require_once("classes/fruits.manager.php");

class Fruit{

    private $nom;
    private $poids;
    private $prix;

    public static $fruits =[];

   

    public function __construct($nom,$poids,$prix){

        $this->nom =$nom;
        $this->poids =$poids;
        $this->prix =$prix;

    }

    public function getNom(){

        return $this->nom;

    }
    public function getPoids(){

        return $this->poids;

    }
    public function getPrix(){

        return $this->prix;

    }



    
    public function __toString(){

                $affichage  = $this->getAffichageIMG();
                $affichage .= 'Nom : ' . $this->nom . '<be />';
                $affichage .= 'Poids : ' . $this->poids . '<br />';
                $affichage .= "Prix : " . $this->prix . "</p>";

                return $affichage;
    }

    public function afficherListeFruit(){

        $affichage = '<div class="card"  text-center">';
            $affichage .= $this->getAffichageIMG();
            $affichage .= '<div class="card-body">';
        
                $affichage .= '<h5 class="card-title"> Nom : ' . $this->nom . '</h5>';
                $affichage .='<p class="card-text">Poids : ' . $this->poids . "<br />";
            $affichage .="Prix : " . $this->prix . "</p>";
            $affichage .= "</div>";
        $affichage .= "</div>";
        

        return $affichage;

    }

    public function saveINDB($idPanier){

        return fruitManager::insertIntoDB($this->nom,$this->poids,$this->prix,$idPanier);
    }

    private function getAffichageIMG(){


        if(preg_match("/cerise/",$this->nom)){

            return "<img class=\"card-img-top\ mx-auto\" style='width:200px' src='sources/images/cherry.png' alt='image cerise ' /><br/>";
        }

        if(preg_match("/pomme/",$this->nom)){

            return "<img class=\"card-img-top\mx-auto\" style='width:200px' src='sources/images/apple.png' alt='image pomme ' /><br/>";
        }

        
    }
    public function getImageSmall(){


        if(preg_match("/cerise/",$this->nom)){

            return "<img class=\"card-img-top\ mx-auto\" style='width:50px' src='sources/images/cherry.png' alt='image cerise ' /><br/>";
        }

        if(preg_match("/pomme/",$this->nom)){

            return "<img class=\"card-img-top\mx-auto\" style='width:50px' src='sources/images/apple.png' alt='image pomme ' /><br/>";
        }

        
    }
    public static function genererUniqueID(){

        return fruitManager::getNbFruitsInDB() + 1;
         
    }

}

?>

