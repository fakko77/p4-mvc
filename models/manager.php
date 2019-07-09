<?php 
class Manager{

    function getDataBaseConnexion(){

        try  
        {  $host = "localhost";  
            $username = "root";  
            $password = "";  
            $database = "p4";  
            $message = "";  
             $pdo = new PDO("mysql:host=$host; dbname=$database", $username, $password);  
             $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
             return $pdo;
        } catch (PDOException $e) {
        echo 'Connexion échouée : ' . $e->getMessage();
        die();
        }
        
        }


}


?>