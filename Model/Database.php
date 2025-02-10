<?php
class Database{


    private $db;
    public function __construct() {
        $this->db = $db;
    }

    function connToDb(){
        try{
            $this->db = new PDO('mysql:host=localhost:3307;dbname=Annyeong;charset=utf8', 'root', '');
            return $this->db;
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
}
?>