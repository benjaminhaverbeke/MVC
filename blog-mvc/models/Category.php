<?php



class Category {
    
    private ? int $id = null;
    
    
    private array $posts = [];
    
    public function __construct(private string $title, private string $description)
    {
        
    }
    
    public function getId() : int
    {
        return $this->id;
        
    }
    public function setId(int $id) : void
    {
        $this->id = $id;
        
    }
    
     public function getTitle() : string
    {
        return $this->title;
        
    }
    public function setTitle(string $title) : void
    {
        $this->title = $title;
        
    }
    
     public function getDescription() : string
    {
        return $this->description;
        
    }
    public function setDescription(string $email) : void
    {
        $this->description = $description;
        
    }
    
    public function getPosts() : array
    {
        
        return $this->posts;
        
    }
    
    public function setPosts(array $posts) : void
    {
        $this->posts = $posts;
        
    }
    
    public function addPost(Post $post)
    {
        
        if(array_search($post ,$this->posts) === false){
                
              array_push($this->posts, $post);
                
                
                
            }
        
    }
    
    public function removePost(Post $post)
    {
        
        
               foreach($this->posts as $key => $value)
               {
                
                if($value === $post)
                {
                    
                    unset($this->posts[$key]);
                    
                }
                
               }
                
    } 
    
    
}


?>