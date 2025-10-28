<?php
include("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    $stmt = $conn->prepare("INSERT INTO clientes (nome, email) VALUES (?, ?)");
    $stmt->bind_param("ss", $nome, $email);
    $stmt->execute();

    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>Novo Cliente</title></head>
<body>
    <h2>➕ Adicionar Cliente</h2>
    <form method="post">
        Nome: <input type="text" name="nome" required><br><br>
        Email: <input type="email" name="email"><br><br>
        <button type="submit">Salvar</button>
    </form>
    <br>
    <a href="index.php">⬅️ Voltar</a>
</body>
</html>
