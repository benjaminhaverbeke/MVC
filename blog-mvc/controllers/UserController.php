<?php



class UserController {
    
    public function __construct(){
        
        
        
        
        
    }
    
    
    public function deleteUser() : void 
        {
            $route = "deleteUser";
            $user = $_GET["user"];
            
            $delete = new UserManager();
            
            
            $delete->deleteUser($user);
            
            
            header("Location: index.php?route=espace-perso");
            
            
            
            
        }
        
    public function checkUser() : void 
        {
            $route = "checkUser";
            $user = $_GET["user"];
            
            $check = new UserManager();
            
            $goodUser = $check->findOne($user);
            
           
            require 'templates/layout.phtml';
            
            
           
            
            
            
        }
        
        public function modifyUser() : void 
            {
                $route = "modifyUser";
                $user = $_GET["user"];
                $update = new UserManager();
                
                $userModify = new User($_POST['username'], $_POST['password'], $_POST['email'], $_POST['role']);
                $userModify->setId($_GET['user']);
                $update->modifyUser($userModify);
                
                
                
                header("Location: index.php?route=espace-perso");
                
            }
        
        public function createUser() : void 
            {
                $route = "createUser";
                
                $create = new UserManager();
                
                $userCreate = new User($_POST['username'], $_POST['email'], password_hash($_POST['password'], PASSWORD_DEFAULT),  $_POST['role']);
                
                $create->createUser($userCreate);
                
               
                header("Location: index.php?route=espace-perso");
                
                
            }
    
    
    
}
    
    
    
?>