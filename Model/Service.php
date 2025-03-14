<?php
class Service{

    /*
    private string $name;
    private string $description;
    private float $price;
    */
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

    public static function getInfosById(int $id){
        try {
            $db = new Database();
            $stmt = $db->getDb()->prepare("SELECT * FROM services WHERE id=?");
            $stmt->execute([$id]); 
            $service = $stmt->fetch(PDO::FETCH_ASSOC);
            if($service){
                return $service;
            }else{
                return "service infos not found!";
            }
        }catch(Exception $e){
            echo  $e->getMessage();

        }
    }
}