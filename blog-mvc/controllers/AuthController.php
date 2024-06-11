<?php
class AuthController{
    
    
    public function __construct(){
        
        
        
    }
    
    public function checkConnexion() :void
        {
           
           
           
          $connexion = new UserManager();
           
            $userCheck = null;
    
            if(isset($_POST["email"])
            && isset($_POST["password"]))
                {
            

            $user= $connexion->findByEmail($_POST["email"]);
            
            
                $email = $user->getEmail();
                
               
                
                if( $email === $_POST["email"])
                {
                    $userCheck = $user;
                    
                }
                
                }
            
            
  

                if(!empty($userCheck))
                    { 
        
                        if(password_verify($_POST["password"], $userCheck->getPassword()))
                            {
            
            
                            $_SESSION["user"] = [];
                            $_SESSION["user"]["username"] = $userCheck->getUsername();
                            $_SESSION["user"]["email"] = $userCheck->getEmail();
                            $_SESSION["user"]["id"] = $userCheck->getId();
            
                             header('Location: index.php?route=espace-perso');
            
                    }
                        else
                        {
                            echo "<h1>Mot de passe incorrect</h1>";
            
                        }
                    }
            else
            {
                echo "<h1>Email incorrect</h1>";
        
            }

   
                


           
            
        }
    
    public function checkInscription() :void
        {
            
           
           $connexionBDD = new UserManager();
            
            $newUser = new User($_POST["username"], $_POST["email"], password_hash($_POST['password'], PASSWORD_DEFAULT));
            
            $connexionBDD->create($newUser);
            
            header('Location: index.php?route=home');
            
        }
    
    
    
    
}



?>