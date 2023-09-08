<?php
   // Detalles de conexión a la base de datos
   $host = "127.0.0.1";
   $username = "root";
   $password = "";
   $database = "softwaredb";
  
     // Establecer la conexión
     try{
        $conn = new PDO("mysql:host=$host;dbname=$database;",$username,$password);
     } catch (PDOException $e){
        die('Error:' . $e->getMessage());
     }
   
?>