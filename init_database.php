<?php
function connToDb(){
    try{
        $db = new PDO('mysql:host=localhost:3307;dbname=Annyeong;charset=utf8', 'root', '');
        return $db;
    }catch(Exception $e){
        echo $e->getMessage();
    }
}
?>