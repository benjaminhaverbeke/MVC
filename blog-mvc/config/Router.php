<?php

class Router {
    
    public function __construct(){
        
        
        
        
    }
    
    public function handleRequest(array $get) : void
            {
                $categoryController = new CategoryController();
                
                $postController = new PostController();
                
                $base = new PageController();
                
                $user = new UserController();
                
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
                elseif($_GET["route"] === "deleteUser" && isset($_GET["user"]))
                {
                    $user->deleteUser();
                    
                    $admin = new PageController();
            
                    $admin->espacePerso();
                    
                }
                elseif($_GET["route"] === "checkUser" && isset($_GET["user"]))
                {
                    $user->checkUser();
                    
                }
                elseif($_GET["route"] === "modifyUser" &&isset($_GET["user"]))
                {
                    $user->modifyUser();
                    
                    
                    
                    
                }
                elseif($_GET["route"] ==="create-user")
                {
                    
                    $user->createUser();
                    
                    
                }
                elseif($_GET["route"] ==="deletepost")
                {
                    $postController->deletePost();
                    
                }
                elseif($_GET["route"] === "checkpost" && isset($_GET["post"]))
                {
                    $postController->checkPost();
                    
                }
                elseif($_GET["route"] === "modifypost" && isset($_GET["post"]))
                {
                    
                    $postController->modifyPost();
                    
                }
                elseif($_GET["route"] === "create-post")
                {
                    
                    $postController->createPost();
                    
                    
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