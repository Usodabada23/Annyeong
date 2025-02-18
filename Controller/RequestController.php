<?php

class RequestController{

    public function providerRequests(){
        $requests = $this->getRequests();
        require "View/seeAllRequestsProviderView.php";
    }

    public function getRequests() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    
        if (!isset($_SESSION["user_id"])) {
            echo "Requests not found!";
            return null;
        }
    
        $provider_id = $_SESSION["user_id"];
        $requests = Requirement::seeRequestsByProvider($provider_id);

        if (!is_array($requests)) {
            $requests = json_decode($requests, true) ?? [];
        }

        if (!isset($requests) && !isset($_SESSION["user_id"])) {
            echo "Requests not found!";
            return null;
        }

        $arrRequest = [];
        foreach($requests as $request){
            $service = Service::getInfosById((int)$request["service_id"]);
            $client = User::getInfosById((int)$request["client_id"]);
            $arrRequest[] = [
                "serviceDetail" => $service["name"]." - minimum ".$service["price"]."$",
                "clientDetail" => $client["email"],
                "location" => $request["location"],
                "date" => $request["date"],
                "preference" => $request["preference"],
            ];
        }
    
        return $arrRequest;
    }
}