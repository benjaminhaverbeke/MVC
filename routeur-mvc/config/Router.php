<?php

class Router {
    
    public function __construct(){
        
        
        
        
    }
    
    public function handleRequest(array $get) : void
            {
                if(isset($_GET["route"]) && $_GET["route"] === "a-propos")
                {
                    
                    $aProposControl = new PageController();
                    
                    $aProposControl->about();
                    
                    
                }
                elseif(isset($_GET["route"]) && $_GET["route"] === "contact")
                {
                   $contact = new PageController();
                   
                   $contact->contact();
                    
                }
                elseif(empty($_GET["route"]) ||$_GET["route"] === "home")
                {
                    $home = new PageController();
                    $home->home();
                    
                }
                else{
                    
                    $nexistePas = new PageController();
                    
                    
                    $nexistePas->nexistePas();
                    
                    
                }
    
            }    
    
    
}



?>