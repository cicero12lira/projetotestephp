<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "teste";

// Criar conexão
$conn = new mysqli($host, $user, $password, $dbname);

// Verificar
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
?>
