<?php

class Router {
    
    public function __construct(){
        
        
        
        
    }
    
    public function handleRequest(array $get) : void
            {
                $categoryController = new CategoryController();
                
                $postController = new PostController();
                
                
                
                if(empty($_GET["route"]))
                {
                    
                    $base = new PageController();
                    $base->home();
                }
                elseif($_GET["route"] === "categories")
                {
                    
                    
                    $categoryController->categories();
                    
                }
                elseif($_GET["route"] === "category=id_category")
                {
                    
                    
                    $categoryController->categorie();
                    
                }
                elseif($_GET["route"] === "post&post=post_id")
                {
                    $postController->post();
                    
                }
                
                
                
    
            }    
    
    
}



?>