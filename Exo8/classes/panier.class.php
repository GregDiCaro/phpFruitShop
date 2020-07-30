<?php
require_once("classes/formatage.utile.php");

require_once("classes/paniers.manager.php");

        class Panier{

            public static $paniers = [];

            private $identifiant;
            private $nomClient;
            private $pommes = [];
            private $cerises = [];

            public function __construct($identifiant,$nomClient){
                $this->identifiant =  $identifiant;
                $this->nomClient =  $nomClient;

            }

            public function getIdentifiant(){

                return $this->identifiant;
            }

            public function setFruitToPanierFromDB(){
                $fruits = panierManager::getFruitPanier($this->identifiant);
                // echo "<pre>";
                // print_r($fruits);

                foreach($fruits as $fruit){

                   
                    if(preg_match("/cerise/",$fruit['fruit'])){

                       $this->cerises[]= new Fruit($fruit['fruit'],$fruit['poids'],$fruit['prix']);
                    }else if(preg_match("/pomme/",$fruit['fruit'])){

                        $this->pommes[]= new Fruit($fruit['fruit'],$fruit['poids'],$fruit['prix']);;

                   

                }
            }   

        }   
                    public function __toString(){
                        $affichage = utile::gererTitreNiveau2('Contenu du panier ' . $this->identifiant." :");

                        $affichage .= '<table class="table">';
                        $affichage .= '<thead>';
                            $affichage .=  '<tr>';
                                $affichage .=  '<th scope="col">Image</th>';
                                $affichage .=  '<th scope="col">Nom</th>';
                                $affichage .=  '<th scope="col">Poids</th>';
                                $affichage .= '<th scope="col">Prix</th>';
                                $affichage .= '<th scope="col">Modifier</th>';
                                $affichage .= '<th scope="col">Supprimer</th>';
                            $affichage .=  '</tr>';
                        $affichage .= '</thead>';
                        $affichage .= '<tbody>';
                                   
                                   
                              

                        foreach($this->pommes as $pomme){
                            $affichage .= $this->afficherPersonaliseFruit($pomme);
                            
                        }
                        foreach($this->cerises as $cerise){
                            $affichage .=$this->afficherPersonaliseFruit($cerise);
                        }

                            $affichage .= '</tbody>';
                        $affichage .= '</table>';
                        return $affichage;
                    }

                    private function afficherPersonaliseFruit($fruit){

                        $affichage =  '<tr>';
                            
                        $affichage .=  '<td>'.$fruit->getImageSmall().'</td>';
                        $affichage .=  '<td>'.$fruit->getNom().'</td>';
                        $affichage .=  '<td>'.$fruit->getPoids().'</td>';
                        $affichage .=  '<td>'.$fruit->getPrix().'</td>';
                        $affichage .=  '<td>';
                            $affichage .= '<form action"# method="GET">';
                            $affichage .= '<input type="submit" value="Modifier" />';
                            $affichage .= '</form>';
                        $affichage .=  '</td>;
                        $affichage .=  '<td>'..'</td>';
                       
                        $affichage .= '</tr>';
                        return $affichage;
                    }

                    
                    public function addFruit($fruit){

                        if(preg_match("/cerise/",$fruit->getNom())){
                            $this->cerises[]= $fruit;

                        }else if(preg_match("/pomme/",$fruit->getNom())){
                            $this->cerises[]= $fruit;

                        }
                    }


                    public function saveInDB(){

                        return panierManager::insertIntoDB($this->identifiant,$this->nomClient);
                    }

                    public static function generateUniqueId(){

                        return panierManager::getNbPanierInDB() + 1;
                         
                    }
                    



    }
?>