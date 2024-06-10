<?php


class CategoryController {
    
    public function __construct(){
        
        
        
        
        
    }
    
    public function categories() : void
        {
            $route = "categories";
            
            require 'templates/layout.phtml';
        }
        
        
    public function category() : void
        {
            $route = "category=id_category";
            
            
            require 'templates/layout.phtml';
        }
    
    
    
    
    
}


?>