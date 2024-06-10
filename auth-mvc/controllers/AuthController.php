<?php
class AuthController{
    
    
    public function __construct(){
        
        
        
    }
    
    public function checkConnexion() :void
        {
           
           
           
          $connexion = new UserManager();
           
            $user = null;
    
            if(isset($_POST["email"])
            && isset($_POST["password"]))
                {
            

            $usertable= $connexion->findAll();
            
            foreach($usertable as $userdata)
            {
                $email = $userdata->getEmail();
                
               
                
                if( $email === $_POST["email"])
                {
                    $user = $userdata;
                    
                }
                
            }
            
            
  

                if(!empty($user))
                    { 
        
                        if(password_verify($_POST["password"], $user->getPassword()))
                            {
            
            
                            $_SESSION["user"] = [];
                            $_SESSION["user"]["username"] = $user->getUsername();
                            $_SESSION["user"]["email"] = $user->getEmail();
                            $_SESSION["user"]["id"] = $user->getId();
            
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