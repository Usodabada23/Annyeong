<?php
class Requirement{

    private int $provider_id;
    private int $client_id;
    private int $service_id;
    private string $location;
    private string $date;
    private string $preference;
    private $db;

    public function __construct(int $provider_id,int $client_id,int $service_id,string $location,string $date,string $preference) {
        $this->db = new Database();
        $this->provider_id = $provider_id;
        $this->client_id = $client_id;
        $this->service_id = $service_id;
        $this->location = $location;
        $this->date = $date;
        $this->preference = $preference;

    }

    public function addNewRequirement(){
        try{
            $sql = "INSERT INTO requirements (provider_id,client_id,service_id,location,date,preference,created_at,updated_at) VALUES (?,?,?,?,?,?,NOW(),NOW())";
            $stmt= $this->db->getDb()->prepare($sql);
            $stmt->execute([$this->provider_id,$this->client_id,$this->service_id, $this->location,$this->date,$this->preference]);  
            echo "new requirement added";
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }

    public static function seeRequirementsByClient(int $client_id){
        try {
            $db = new Database();
            $stmt = $db->getDb()->prepare("SELECT * FROM requirements WHERE client_id=?");
            $stmt->execute([$client_id]); 
            $requirement = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if($requirement){
                return $requirement;
            }else{
                return "Requirements doesn't exist !";
            }
        }catch(Exception $e){
            echo  $e->getMessage();

        }
    }

    public static function seeRequestsByProvider(int $provider_id){
        try {
            $db = new Database();
            $stmt = $db->getDb()->prepare("SELECT * FROM requirements WHERE provider_id=?");
            $stmt->execute([$provider_id]); 
            $requirement = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if($requirement){
                return $requirement;
            }else{
                return "Requirements doesn't exist !";
            }
        }catch(Exception $e){
            echo  $e->getMessage();

        }
    }
}