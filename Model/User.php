<?php
require_once 'Database.php';
use Egulias\EmailValidator\EmailValidator;
use Egulias\EmailValidator\Validation\RFCValidation;

class User{
    private $db;
    private string $lastname;
    private string $firstname;
    private string $username; 
    private string $email;
    private string $password;
    private string $birthDate;
    private string $role;
    

    public function __construct(string $lname,string $fname,string $pwd,string $birth,string $role)
    {
        $this->db = new Database();
        $this->lastname = $lname;
        $this->firstname = $fname;
        $this->password = $pwd;
        $this->birthDate = $birth;
        $this->role = $role;
    }
    public function setEmail(string $email){
        $validator = new EmailValidator();
        $validator->isValid($email, new RFCValidation()); //true or false
        if($validator){
            try {
                $db = new Database();
                $stmt = $db->getDb()->prepare("SELECT * FROM users WHERE email=?");
                $stmt->execute([$email]); 
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                if($user){
                    exit();
                    return false;
                }else{
                    $this->email = $email;
                    return true;
                }
            }catch(Exception $e){
                echo  $e->getMessage();
    
            }
        }else{
            echo "email isn't valid !";
            return false;
        }

    }
    public function setUsername(string $username){
        try {
            $db = new Database();
            $stmt = $db->getDb()->prepare("SELECT * FROM users WHERE username=?");
            $stmt->execute([$username]); 
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if($user){
                return false;
                exit();
            }else{
                $this->username = $username;
                return true;
            }
        }catch(Exception $e){
            echo  $e->getMessage();

        }
    }

    public function addUser(){
        $usernameExist = $this->setUsername($this->username);
        $emailExist = $this->setEmail($this->email);
        if($usernameExist && $emailExist){
            $hashed_password = password_hash($this->password,PASSWORD_BCRYPT);
            try{
                $sql = "INSERT INTO users (username,lastname,firstname,email,password,birthDate,role,created_at) VALUES (?,?,?,?,?,?,?,NOW())";
                $stmt= $this->db->getDb()->prepare($sql);
                $stmt->execute([$this->username,$this->lastname,$this->firstname, $this->email,$hashed_password,$this->birthDate,$this->role]);  
            }catch(Exception $e){
                echo $e->getMessage();
            }
            
        }else{
            return "username or email already exist !";
        }
    }


    public static function getDetailsByUsername(string $user){
        try {
            $db = new Database();
            $stmt = $db->getDb()->prepare("SELECT * FROM users WHERE username=?");
            $stmt->execute([$user]); 
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if($user){
                return $user;
            }else{
                return "username doesn't exist !";
            }
        }catch(Exception $e){
            echo  $e->getMessage();

        }
    }

    public static function getUserByRole(string $role){
        try {
            $db = new Database();
            $stmt = $db->getDb()->prepare("SELECT * FROM users WHERE role=?");
            $stmt->execute([$role]); 
            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if($user){
                return $user;
            }else{
                return [];
            }
        }catch(Exception $e){
            echo  $e->getMessage();

        }
    }
    public static function getInfosById(int $id){
        try {
            $db = new Database();
            $stmt = $db->getDb()->prepare("SELECT * FROM users WHERE id=?");
            $stmt->execute([$id]); 
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if($user){
                return $user;
            }else{
                return "username doesn't exist !";
            }
        }catch(Exception $e){
            echo  $e->getMessage();

        }
    }


    
}

?>