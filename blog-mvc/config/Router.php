<?php

class Router {
    
    public function __construct(){
        
        
        
        
    }
    
    public function handleRequest(array $get) : void
            {
                $categoryController = new CategoryController();
                
                $postController = new PostController();
                
                $base = new PageController();
                
                if(empty($_GET["route"]) || $_GET["route"] === "home")
                {
                    
                    
                    $base->home();
                }
                elseif($_GET["route"] === "categories")
                {
                    
                    
                    $categoryController->categories();
                    
                }
                elseif($_GET["route"] === "category" && isset($_GET["category"]))
                {
                    
                    
                    $categoryController->category();
                    
                }
                elseif($_GET["route"] === "post" && isset($_GET["post"]))
                {
                    $postController->post();
                    
                }
                elseif($_GET['route'] === 'connexion')
                {
                $base->connexion();
                }
                elseif($_GET['route'] === 'inscription')
                {
                    $base->inscription();
                    
                }
                elseif(isset($_GET["route"]) && $_GET["route"] === "check-connexion")
                {
                   $checkConnexion = new AuthController();
                   
                   $checkConnexion->checkConnexion();
                    
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
                    
                    $base->nexistePas();
                    
                }
            }    
    
    
}



?>