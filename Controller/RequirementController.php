<?php

class RequirementController{

    public function addRequirement(){
        $providers = $this->getProviders();
        $services = $this-> getServices();
        require "View/addRequirementView.php";
    }

    public function getProviders(){
        return User::getUserByRole("provider");
    }
    public function getServices(){
        return Service::getServices();
    }

    public function submitARequirement(){
        if(isset($_POST["chooseProvider"]) && isset($_POST["chooseService"]) && 
        isset($_POST["location"]) && isset($_POST["dateRequirement"]) && isset($_POST["preference"])){
            

        }
    }
}