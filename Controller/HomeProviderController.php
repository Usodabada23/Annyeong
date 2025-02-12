<?php

class HomeProviderController{

    public function homeProvider(){
        $services = $this->services();
        require "View/homeProvider.php";
    }

    public function services(){
        return Service::getServices();
    }
}