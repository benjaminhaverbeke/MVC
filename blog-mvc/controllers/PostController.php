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
        
      public function deletePost() : void
        {
            $route = "deletepost";
            $post = $_GET["post"];
            
            $delete = new PostManager();
            
            $delete->deletePost($post);
            
            header("Location: index.php?route=espace-perso");
            
        }
        
        
    public function checkPost() : void 
        {
            $route = "checkpost";
            $post = $_GET["post"];
            
            $check = new PostManager();
            
            $goodPost = $check->findOne($post);
            
           
            require 'templates/layout.phtml';
            
            
           
            
            
            
        }
    
    public function modifyPost() : void
        {
            $route = "modifypost";
            
            $post = $_GET["post"];
            
            $modify = new PostManager();
            $user = new UserManager();
            $cm = new CategoryManager();
            
            $categories = $cm->findByPost($post);
            
            $author = $user->findOne($_POST["auteur"]);
            $newpost = new Post($_POST["title"], $_POST["excerpt"], $_POST["content"], $author);
            $newpost->setId($post);
            $newpost->setCategories($categories);
            
            
            $modify->modifyPost($newpost);
            
           header("Location: index.php?route=espace-perso");
            
        }
        
    public function createPost() : void
        {
            $route = "create-post";
            
            $create = new PostManager();
            $user = new UserManager();
            $cm = new CategoryManager();
            
            $author = $user->findOne($_POST["auteur"]);
            $category = $cm->findOneTitle($_POST["categories"]);
            
            var_dump($category);
            
            $postCreate = new Post($_POST['title'], $_POST['excerpt'], $_POST['content'], $author);
            $postCreate->setCategories($category);
            
            $create->createPost($postCreate);
            
            
            
            
        }
    
    
    
    
}


?>