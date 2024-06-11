<?php


class PostController {
    
    public function __construct(){
        
        
        
        
        
    }
    
    public function post() : void
        {
            $route = "post";
            
            $post = $_GET["post"];
            
            $onePost = new PostManager();
            
            $postDisplay = $onePost->findOne($post);
            
            require 'templates/layout.phtml';
        }
        
        
   
    
    
    
    
    
}


?>