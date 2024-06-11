<?php


class CategoryController {
    
    public function __construct(){
        
        
        
        
        
    }
    
    public function categories() : void
        {
            $route = "categories";
            
            $category = new CategoryManager();
            
            $categoryDisplay = $category->findAll();
            
            require 'templates/layout.phtml';
        }
        
        
    public function category() : void
        {
            $route = "category";
            $category = $_GET["category"];
            $oneCategory = new CategoryManager();
            
            
            $categoryDisplay = $oneCategory->findOne($category);
            
            
            
            require 'templates/layout.phtml';
        }
    
    
    
    
    
}


?>