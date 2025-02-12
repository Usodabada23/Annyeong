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
}