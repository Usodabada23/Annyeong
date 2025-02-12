<?php
    require_once __DIR__ . '/../vendor/autoload.php';

    use Dotenv\Dotenv;
    $dotenv = Dotenv::createImmutable(__DIR__ . '/../');
    $dotenv->load();
    
    class Database{
        private $db;
        public function __construct(){
            $hostname = $_ENV["HOST_NAME"];
            $db_name = $_ENV["DB_NAME"];
            $user = $_ENV["USER"];
            //$pwd = $_ENV["PWD_DB"];
            try{
                $this->db = new PDO('mysql:host='.$hostname.';dbname='.$db_name.';charset=utf8',$user,'');
                $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }catch(Exception $e){
                echo $e->getMessage();
                exit();
            }
        }
        public function getDb() {
            return $this->db;
        }
    }
?>