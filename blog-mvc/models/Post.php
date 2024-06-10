<?php



class Post {
    
    private ? int $id = null;
    
    private array $categories = [];
    
    private string $createdAt;
    
    public function __construct(private string $title, private string $excerpt, private string $content, private User $author)
    {
        $this->createdAt = date("Y-m-d H:i:s");
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
    
     public function getExcerpt() : string
    {
        return $this->excerpt;
        
    }
    public function setExcerpt(string $excerpt) : void
    {
        $this->excerpt = $excerpt;
        
    }
    
     public function getContent() : string
    {
        return $this->content;
    
    }
    public function setContent(string $content) : void
    {
        $this->content = $content;
        
    }
    
    public function getAuthor() : User
    {
        return $this->author;
    
    }
    public function setAuthor(User $author) : void
    {
        $this->author = $author;
        
    }
    
    public function getCreatedAt() : string
    {
        return $this->createdAt;
    
    }
    public function setCreatedAt(string $createdAt) : void
    {
        $this->role = $creadtedAt;
        
    }
    
    public function getCategories() : array
    {
        return $this->categories;
    }
    public function setCategories(array $categories) : void
    {
        $this->categories = $categories;
    }    
    
    public function addCategory(Category $category) : void 
    {
        
        
            
        if(array_search($category,$this->categories) === false){
                
              array_push($this->categories, $category);
                
                
                
            }
            
            
            
        
        
    }
    
    public function removeCategory(Category $category){
        
        
               foreach($this->categories as $key => $value){
                
                if($value === $category){
                    
                    unset($this->categories[$key]);
                    
                }
                
            } 
            
            
            
            
        
    }
    
}

?>