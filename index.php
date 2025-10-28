<?php
include("config.php");

$sql = "SELECT 'Conexão bem-sucedida com o MySQL!' AS mensagem";
$result = $conn->query($sql);

$row = $result->fetch_assoc();
echo "<h1>" . $row['mensagem'] . "</h1>";

$conn->close();
?>
