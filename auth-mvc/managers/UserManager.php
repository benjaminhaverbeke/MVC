<?php




class UserManager extends AbstractManager {
    
    public function __construct(){
        
        parent::__construct();
        
        
        
        
    }
    
    public function findAll() : array {
        
        $query = $this->db->prepare('SELECT * FROM users');
        $query->execute();
        $usersList = $query->fetchAll(PDO::FETCH_ASSOC);
        $usersTable = [];
        
        foreach($usersList as $user){
            
            $newUser = new User($user["username"], $user["email"], $user["password"], $user["role"], $user["created_at"]);
            $newUser->setId($user['id']);
            array_push($usersTable, $newUser);
            
            
        }
        
        
        return $usersTable;
        
    }
    
    public function findOne(int $id) : User {
        
        $parameters = [
    'id' => $id
    ];
    
    
        $query = $this->db->prepare('SELECT * FROM users WHERE id = :id');
        
        $query->execute($parameters);
        
        $user = $query->fetch(PDO::FETCH_ASSOC);
        
        
        if($user !== null){
        $newUser = new User($user["username"], $user["email"], $user["password"], $user["role"], $user["created_at"]);
        $newUser->setId($user['id']);
        
        return $newUser;
        }
        else {
            
            return null;
          
        
        }
        
        
        
    }
    
    
    public function create(User $user) : void {
        
        $parameters = [
    'username' => $user->getUsername(),
    'email' =>  $user->getEmail(),
    'password' => $user->getPassword(),
    'role' => $user->getRole(),
    'created_at' => $user->getCreatedAt()
    
    ];
        
        $query = $this->db->prepare("INSERT INTO users (username, email, password, role, created_at) VALUES (:username , :email, :password, :role, :created_at)");

        $query->execute($parameters);
        
        
        
        
    }
    
    
    public function update(User $user) : void {
        
     
        
        $parameters = [
    'username' => $user->getUsername(),
    'email' =>  $user->getEmail(),
    'password' => $user->getPassword(),
    'role' => $user->getRole(),
    'created_at' => $user->getCreatedAt(),
    'id' => $user->getId()
    
    ];
    
    $query = $this->db->prepare("UPDATE users
    SET username=:username, email=:email, password=:password, role=:role, created_at=:created_at
    WHERE id = :id");
 
    $query->execute($parameters);
    
        
        
        
    }
    
    public function delete(int $id){
        
        
        $parameters = [
    'id' => $id
    ];
    
    
        $query = $this->db->prepare('DELETE FROM users WHERE id = :id');
        
        $query->execute($parameters);
        
        
        
    }
    
}




?>