<?php 

class PageController {
    
    public function __construct(){
        
        
        
        
        
    }
    
    
    
    public function nexistePas() : void
        {
            $route = "existepas";
            
            require 'templates/layout.phtml';
            
            
        }
    
    
        
    public function connexion() :void
        {
            $route = "connexion";
            
            require 'templates/layout.phtml';
            
        }
        
    
    
    public function inscription() :void
        {
            $route = "inscription";
            
            require 'templates/layout.phtml';
            
        }
        
    
        
    public function espacePerso() :void
        {
            $route = "espace-perso";
            
            require 'templates/layout.phtml';
            
        }
        
    public function home() :void
        {
            $route = "home";
            
            $posts = new PostManager();
            
            $latest = $posts->findLatest();
            
            var_dump($latest);
            
            
            require 'templates/layout.phtml';
            
        }
    
    
}



?>