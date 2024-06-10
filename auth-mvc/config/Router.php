<?php

class Router {
    
    public function __construct(){
        
        
        
        
    }
    
    public function handleRequest(array $get) : void
            {
                
                
                
                if(isset($_GET["route"]) && $_GET["route"] === "connexion")
                {
                   $connexion = new PageController();
                   
                   $connexion->connexion();
                    
                }
                elseif(empty($_GET["route"]) || $_GET["route"] === "home")
                {
                   $home = new PageController();
                   
                   $home->home();
                    
                }
                
                elseif(isset($_GET["route"]) && $_GET["route"] === "check-connexion")
                {
                   $checkConnexion = new AuthController();
                   
                   $checkConnexion->checkConnexion();
                    
                }
                
                elseif(isset($_GET["route"]) && $_GET["route"] === "inscription")
                {
                   $inscription = new PageController();
                   
                   $inscription->inscription();
                    
                }
                elseif(isset($_GET["route"]) && $_GET["route"] === "check-inscription")
                {
                   $checkInscription = new AuthController();
                   
                   $checkInscription->checkInscription();
                    
                }
                elseif(isset($_GET["route"]) && $_GET["route"] === "espace-perso")
                {
                   $espacePerso = new PageController();
                   
                   $espacePerso->espacePerso();
                    
                }
                
                
                else{
                    
                    $nexistePas = new PageController();
                    
                    
                    $nexistePas->nexistePas();
                    
                    
                }
    
            }    
    
    
}



?>