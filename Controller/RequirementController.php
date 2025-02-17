<?php

class RequirementController{

    public function addRequirement(){
        $providers = $this->getProviders();
        $services = $this-> getServices();
        $this->submitARequirement();
        require "View/addRequirementView.php";
    }

    public function getProviders(){
        return User::getUserByRole("provider");
    }
    public function getServices(){
        return Service::getServices();
    }

    public function submitARequirement(){
        session_start();
        if(isset($_POST["chooseProvider"]) && isset($_POST["chooseService"]) && 
        isset($_POST["location"]) && isset($_POST["dateRequirement"]) && isset($_POST["preference"]) && isset($_SESSION["user_id"])){
            $provider_id = $_POST["chooseProvider"];
            $client_id = $_SESSION["user_id"];
            $service_id = $_POST["chooseService"];
            $location = $_POST["location"];
            $date = $_POST["dateRequirement"];
            $preference = $_POST["preference"];

            $newRequirement = new Requirement($provider_id,$client_id,$service_id,$location,$date,$preference);
            if(!$newRequirement){
                return "data is not valid, enter right data for a new requirement";
            }

            $newRequirement->addNewRequirement();

        }
    }
}