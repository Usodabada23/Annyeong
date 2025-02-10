<?php

class LoginController{

    public function loginView(){
        $this->login();
        require "View/loginView.php";
    }

    public function login(){

        if(isset($_POST["username"]) && isset($_POST["password"])){
            $username = $_POST["username"];
            $pwd = $_POST["password"];
            
            $user = User::getDetailsByUsername($username);
            $hashedpwd = $user["password"];
            if($user && password_verify($pwd,$hashedpwd)){
                sleep(2);
                session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user["role"];
                if($user["role"]=== "client"){
                    header("Location: /Annyeong/View/homeClient.php");
                    exit;
                }else{
                    header("Location: /Annyeong/View/homeProvider.php");
                    exit; 
                }     
            }else{
                echo "invalid password or username";
                header("Location: /Annyeong/View/loginView.php?error=invalid_credentials");
                exit();
            }
        }
    }

    public function logout(){
        session_start ();
        // On détruit les variables de notre session
        session_unset ();

        // On détruit notre session
        session_destroy ();

        // On redirige le visiteur vers la page d'accueil
        header ('Location: /Annyeong/login.php');
    }
}