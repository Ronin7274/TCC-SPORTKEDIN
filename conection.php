<?php
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $database = "sportkedin";


    $conn = new mysqli($hostname, $username, $password, $database);


    if ($conn->connect_error) {
        die("Conexao falhou: " . $conn->connect_error);
    }
?>