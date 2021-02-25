<?php


    $servername = "localhost";
    $dbname = "login";
    $username = "root";
    $password = "holamundo";
    try {  
        $bd = new PDO(
                        "mysql:host=$servername; dbname=$dbname",
                        $username, $password
        ); 
    }

    catch(PDOException $e) {
        echo "Conexion Fallida, verificar: " . $e->getMessage();
    }
 
?>
