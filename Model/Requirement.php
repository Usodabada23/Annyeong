<?php
class Requirement{

    private int $id_provider;
    private int $id_service;
    private string $location;

    public static function getServices(){
        try {
            $db = new Database();
            $stmt = $db->getDb()->prepare("SELECT * FROM services");
            $stmt->execute(); 
            $services = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if($services){
                return $services;
            }else{
                return "services doesn't exist !";
            }
        }catch(Exception $e){
            echo  $e->getMessage();

        }
    }
}