<?php
class HomeClientController{

    public function homeClient(){
        $services = $this->services();
        require "View/homeClient.php";
    }

    public function services(){
        return Service::getServices();
    }

}

