<?php

class RequirementController{

    public function addRequirement(){
        $providers = $this->getProviders();
        $services = $this-> getServices();
        $this->submitARequirement();
        require "View/addRequirementView.php";
    }

    public function seeRequirements(){
        $requirements = $this->seeAllRequirements();

        require "View/seeAllRequirementsView.php";
    }

    public function seeInfoByRequirements() {
        if (!isset($_GET["number"])) {
            echo "Invalid request!";
            return;
        }
    
        $details = $this->getDetailsOfRequirement();
    
        if ($details) {
            require "View/seeDetailsOfRequirementView.php";
        }
    }
    

    public function getProviders(){
        return User::getUserByRole("provider");
    }
    public function getServices(){
        return Service::getServices();
    }

    public function getDetailsOfRequirement() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    
        if (!isset($_SESSION["user_id"]) || !isset($_GET["number"])) {
            echo "Requirement details not found!";
            return null;
        }
    
        $client_id = $_SESSION["user_id"];
        $i = intval($_GET["number"])-1;
    
        // Fetch requirements
        $requirements = Requirement::seeRequirementsByClient($client_id);
    
        // Validate index exists
        if (!isset($requirements[$i])) {
            echo "Requirement not found!";
            return null;
        }
    
        $firstReq = $requirements[$i];
    
        // Ensure required keys exist
        if (!isset($firstReq["service_id"]) || !isset($firstReq["provider_id"])) {
            echo "Requirement details are incomplete!";
            return null;
        }
        $service = Service::getInfosById($firstReq["service_id"]);
        $provider = User::getInfosById($firstReq["provider_id"]);
    
        $details = [
            "serviceDetail" => $service["name"]." will cost you ".$service["price"]."$",
            "providerDetail" => $provider["email"],
            "location" => $firstReq["location"],
            "date" => $firstReq["date"],
            "preference" => $firstReq["preference"],
            "updated_at" => $firstReq["updated_at"],
            "created_at" => $firstReq["created_at"]
        ];
    
        return $details;
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

    public function seeAllRequirements(){
        session_start();
        if(isset($_SESSION["user_id"])){
            $id = $_SESSION["user_id"];
            return Requirement::seeRequirementsByClient($id);   
        }else{
            header("Location: http://localhost/Annyeong/index.php?page=login");
        }
        
    }
}