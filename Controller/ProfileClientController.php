<?php
class ProfileClientController{

    public function profileView(){
        $user = $this->getInfos();

        require "View/profileClientView.php";
    }

    public function getInfos(){
        session_start();
        if(isset($_SESSION["username"])){
            $username = $_SESSION["username"];
        $user = User::getDetailsByUsername($username);
        return $user; 
        }
        echo "User not found"; 
    }

}