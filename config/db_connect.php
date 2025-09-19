<?php
    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "clinica";

    $conn = new mysqli($host, $user, $password, $db);

    if ($conn->connect_error) {
        die("Erro de conexão: " . $conn->connect_error);
    }

    return $conn;
?>
