<?php
include("config.php");

$id = $_GET['id'] ?? 0;

// Buscar cliente
$stmt = $conn->prepare("SELECT * FROM clientes WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$cliente = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    $stmt = $conn->prepare("UPDATE clientes SET nome=?, email=? WHERE id=?");
    $stmt->bind_param("ssi", $nome, $email, $id);
    $stmt->execute();

    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>Editar Cliente</title></head>
<body>
    <h2>✏️ Editar Cliente</h2>
    <form method="post">
        Nome: <input type="text" name="nome" value="<?= htmlspecialchars($cliente['nome']) ?>" required><br><br>
        Email: <input type="email" name="email" value="<?= htmlspecialchars($cliente['email']) ?>"><br><br>
        <button type="submit">Atualizar</button>
    </form>
    <br>
    <a href="index.php">⬅️ Voltar</a>
</body>
</html>
