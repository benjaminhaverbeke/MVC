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
            
            
            
            $user = new UserManager();
            $userList = $user->findAll();
            
            require 'templates/layout.phtml';
            
        }
        
    public function home() :void
        {
            $route = "home";
            
            $categories = new CategoryManager();
            $allCategories = $categories->findAll();
            $tableCategories = [];
            
            
            foreach($allCategories as $category){
                
                $categoryId = $category->getId();
                $categoryTitle = $category->getTitle();
               
                
                $post = new PostManager();
                
                $categoryPosts = $post->findByCategory($categoryId);
                
                   $posts = [
                       "categoryTitle" => $categoryTitle,
                      
                [
                    'title' => $categoryPosts[0]->getTitle(),
                'excerpt' => $categoryPosts[0]->getExcerpt(),
                    ],
                 
               [
                    'title' => $categoryPosts[1]->getTitle(),
                'excerpt' => $categoryPosts[1]->getExcerpt(),
                    ]
                    ];
                    
                    
                
               array_push($tableCategories, $posts);
               
               
               
               
            }
           
            
            
            require 'templates/layout.phtml';
            
        }
    
    
}



?>