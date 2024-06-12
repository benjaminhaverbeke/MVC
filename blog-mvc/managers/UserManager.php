<?php
/**
 * @author : Gaellan
 * @link : https://github.com/Gaellan
 */


class UserManager extends AbstractManager
{
    public function __construct()
    {
        parent::__construct();
    }

    public function findByEmail(string $email) : ? User
    {
        $query = $this->db->prepare('SELECT * FROM users WHERE email=:email');

        $parameters = [
            "email" => $email
        ];

        $query->execute($parameters);
        $result = $query->fetch(PDO::FETCH_ASSOC);

        if($result)
        {
            $user = new User($result["username"], $result["email"], $result["password"], $result["role"]);
            $user->setId($result["id"]);

            return $user;
        }

        return null;
    }

    public function findOne(int $id) : ? User
    {
        $query = $this->db->prepare('SELECT * FROM users WHERE id=:id');

        $parameters = [
            "id" => $id
        ];

        $query->execute($parameters);
        $result = $query->fetch(PDO::FETCH_ASSOC);

        if($result)
        {
            $user = new User($result["username"], $result["email"], $result["password"], $result["role"]);
            $user->setId($result["id"]);

            return $user;
        }

        return null;
    }

    public function createUser(User $user) : void
    {
        $currentDateTime = date('Y-m-d H:i:s');

        $query = $this->db->prepare('INSERT INTO users (id, username, email, password, role, created_at) VALUES (NULL, :username, :email, :password, :role, :created_at)');
        $parameters = [
            "username" => $user->getUsername(),
            "password" => $user->getPassword(),
            "email" => $user->getEmail(),
            "role" => $user->getRole(),
            "created_at" => $currentDateTime,
        ];

        $query->execute($parameters);

        $user->setId($this->db->lastInsertId());

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
    
    public function deleteUser(int $user){
        
        
        
        
        $parameters = [
            'id' => $user
                    ];



        $query = $this->db->prepare("DELETE FROM users WHERE id=:id");
 

        $query->execute($parameters);
        
        
    }
    
    public function ModifyUser(User $user)
    {
        
        $parameters = [
            'id' => $user->getId(),
            'username' => $user->getUsername(),
            'password' => $user->getPassword(),
            'email' => $user->getEmail(),
            'role' => $user->getRole()
            
            
            ];
            
            var_dump($parameters);
        
        $query = $this->db->prepare("UPDATE users
        SET username=:username, password=:password, email=:email, role=:role
        WHERE id =:id");
        
        $query->execute($parameters);
        
    }
    
    
}


?>