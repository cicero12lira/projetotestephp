<?php
include("config.php");

$id = $_GET['id'] ?? 0;

$stmt = $conn->prepare("DELETE FROM clientes WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();

header("Location: index.php");
exit;
?>
