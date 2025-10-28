<?php
include("config.php");

// Buscar clientes
$result = $conn->query("SELECT * FROM clientes ORDER BY id DESC");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Lista de Clientes</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        table { border-collapse: collapse; width: 60%; }
        th, td { padding: 8px; border: 1px solid #ccc; text-align: left; }
        a { text-decoration: none; color: blue; }
    </style>
</head>
<body>
    <h2>📋 Lista de Clientes</h2>
    <a href="create.php">➕ Adicionar Cliente</a><br><br>

    <table>
        <tr>
            <th>ID</th><th>Nome</th><th>Email</th><th>Ações</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= htmlspecialchars($row['nome']) ?></td>
            <td><?= htmlspecialchars($row['email']) ?></td>
            <td>
                <a href="update.php?id=<?= $row['id'] ?>">✏️ Editar</a> |
                <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Excluir este cliente?')">🗑️ Excluir</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
