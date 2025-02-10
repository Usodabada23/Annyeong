<?php

class RegisterController{

    public function registerView(){
        $this->register();
        require "View/registerView.php";
    }

    public function register(){

        if(isset($_POST["lastname"]) && isset($_POST["firstname"]) && isset($_POST["birthDate"]) && 
        isset($_POST["email"]) && isset($_POST["username"]) && isset($_POST["password"]) && $_POST["role"]){
            $lname = $_POST["lastname"];
            $fname = $_POST["firstname"];
            $birthDate = $_POST["birthDate"];
            $email = $_POST["email"];
            $username = $_POST["username"];
            $password = $_POST["password"];
            $role =  $_POST["role"];
    
    
            $newUser = new User($lname,$fname,$password,$birthDate,$role);
            $newUser->setUsername($username);
            $newUser->setEmail($email);

            $pwd_regex = '/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{9,}$/';
    
            if (!preg_match($pwd_regex, $password)) {
                echo "Invalid password (8 characters, 1 lowercase, 1 uppercase, a number, and a special character)";
                exit;
            }

            $newUser->addUser();
            sleep(2);
            header("Location: View/loginView.php");
            exit(); 
        }
    }
}