<?php




class PostManager extends AbstractManager {
    
    public function __construct(){
        
        parent::__construct();
        
        
        
        
    }
    
    
    
    
    public function findLatest() : array {
        
        
        $userManager = new UserManager();
        $categoryManager = new CategoryManager();
        
        
        $query = $this->db->prepare('SELECT * FROM posts ORDER BY created_at LIMIT 8');
        
        $query->execute();
        
        $postsList = $query->fetchAll(PDO::FETCH_ASSOC);
        
        $postsTable = [];
        
        foreach($postsList as $post){
            
            
            $categories = $categoryManager->findByPost($post["id"]);
            $user = $userManager->findOne($post["author"]);
            
            $newPost = new Post($post["title"], $post["excerpt"], $post["content"], $user, DateTime::createFromFormat('Y-m-d H:i:s', $post["created_at"]));
            $newPost->setId($post['id']);
            $newPost->setCategories($categories);
            $postsTable[] = $newPost;
            
            
        }
        
        
        return $postsTable;
        
    }
    
    public function findAll() : array {
        
        
        $userManager = new UserManager();
        $categoryManager = new CategoryManager();
        
        
        $query = $this->db->prepare('SELECT * FROM posts');
        
        $query->execute();
        
        $postsList = $query->fetchAll(PDO::FETCH_ASSOC);
        
        $postsTable = [];
        
        foreach($postsList as $post){
            
            
            $categories = $categoryManager->findByPost($post["id"]);
            $user = $userManager->findOne($post["author"]);
            
            $newPost = new Post($post["title"], $post["excerpt"], $post["content"], $user, DateTime::createFromFormat('Y-m-d H:i:s', $post["created_at"]));
            $newPost->setId($post['id']);
            $newPost->setCategories($categories);
            $postsTable[] = $newPost;
            
            
        }
        
        
        return $postsTable;
        
    }
    
    public function findOne(int $id) : ? Post
    {
        $um = new UserManager();
        $cm = new CategoryManager();

        $query = $this->db->prepare('SELECT * FROM posts WHERE id=:id');

        $parameters = [
            "id" => $id
        ];

        $query->execute($parameters);
        $result = $query->fetch(PDO::FETCH_ASSOC);

        if($result)
        {
            $categories = $cm->findByPost($result["id"]);
            $user = $um->findOne($result["author"]);
            $post = new Post($result["title"], $result["excerpt"], $result["content"], $user, DateTime::createFromFormat('Y-m-d H:i:s', $result["created_at"]));
            $post->setId($result["id"]);
            $post->setCategories($categories);

            return $post;
        }

        return null;
    }
    
    
    public function findByCategory(int $categoryId) : array
    {
        $um = new UserManager();
        $cm = new CategoryManager();

        $query = $this->db->prepare('SELECT posts.* FROM posts JOIN posts_categories ON posts_categories.post_id=posts.id WHERE posts_categories.category_id=:category_id');
        $parameters = [
            "category_id" => $categoryId
        ];
        $query->execute($parameters);
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        $posts = [];

        foreach($result as $item)
        {
            $categories = $cm->findByPost($item["id"]);
            $user = $um->findOne($item["author"]);
            $post = new Post($item["title"], $item["excerpt"], $item["content"], $user, DateTime::createFromFormat('Y-m-d H:i:s', $item["created_at"]));
            $post->setId($item["id"]);
            $post->setCategories($categories);
            $posts[] = $post;
        }

        return $posts;
    }
    
    
    public function deletePost(int $post) : void
        {
        
        $parameters = [
            'id' => $post
                    ];
                    
        $query = $this->db->prepare("DELETE FROM posts WHERE id=:id");
 
        $query->execute($parameters);
        
        $query = $this->db->prepare("DELETE FROM posts_categories WHERE post_id=:id");
        
        $query->execute($parameters);
        
        
        }
        
        public function modifyPost(Post $post)
    {
        
        $parameters = [
            'id' => $post->getId(),
            'title' => $post->getTitle(),
            'excerpt' => $post->getExcerpt(),
            'content' => $post->getContent(),
            'author'=> $post->getAuthor()->getId(),
            
            
            ];
            
            
        
        $query = $this->db->prepare("UPDATE posts
        SET title=:title, excerpt=:excerpt, content=:content, author=:author
        WHERE id =:id");
        
        $query->execute($parameters);
        
        
        foreach($post->getCategories() as $array){
            
            foreach($array as $category){
            $cm = new CategoryManager();
            $result= $cm->findOneTitle($category->getTitle());
            
            
            $parameters = [
                'category_id' => $result->getId(),
                'post_id' => $post->getId()
                
                ];
            
            $query = $this->db->prepare("UPDATE posts_categories
                SET category_id=:category_id
                WHERE post_id =:id");
            
            $query->execute($parameters);
            
            }
            
            
            
        }
            
            
            
        
        
        
        
        
        
        
    }
    
    public function createPost(Post $post) : void
        {
            

        $query = $this->db->prepare('INSERT INTO posts (title, excerpt, content, author) VALUES (:title, :excerpt, :content, :author)');
        
        $parameters = [
            "title" => $post->getTitle(),
            "excerpt" => $post->getExcerpt(),
            "content" => $post->getContent(),
            "author" => $post->getAuthor()->getId(),
            
        ];
            
            $query->execute($parameters);
            
           foreach($post->getCategories() as $array){
            
            foreach($array as $category){
            $cm = new CategoryManager();
            $result= $cm->findOneTitle($category->getTitle());
            
            
            $parameters = [
                'category_id' => $result->getId(),
                'post_id' => $post->getId()
                
                ];
            
            $query = $this->db->prepare('INSERT INTO posts_categories (category_id, post_id) VALUES (:category_id, :post_id)');
            
            $query->execute($parameters);
            
            }
        }
    
    
        }
    
}




?>