<?php
    $serverName = "localhost";
    $userName = "root";
    $password = "";
    $dbName = "sistema_criptografia";

    $connection = new mysqli($serverName, $userName, $password, $dbName);

    if($connection->connect_error){
        die("Falha de conexão: ". $connection->connect_error);
    }
    
    echo "". nl2br(PHP_EOL);

?>