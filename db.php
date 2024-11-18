<?php
    $user = "root";
    $password = "root";
    $database = "pratica_joao";
    $servername = "localhost";
    
    $conn = new mysqli($servername, $user, $password, $database);
    
    if ($conn->connect_error) {
        die("Conexão falhou: ". $conn->connect_error);
    }
    
?>