<?php
include("conexao.php");

// Deletar produto
if (isset($_GET["deletar"])) {
    $id = $_GET["deletar"];
    $stmt = $pdo->prepare("DELETE FROM produtos WHERE id = :id");
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    header("Location: gerenciar_produtos.php"); // Atualiza a página após deletar
    exit();
}

// Atualizar produto
if (isset($_POST["atualizar"])) {
    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $estoque = $_POST["estoque"];

    $stmt = $pdo->prepare("UPDATE produtos SET nome = :nm, estoque = :est WHERE id = :id");
    $stmt->bindParam(":nm", $nome);
    $stmt->bindParam(":est", $estoque);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    header("Location: gerenciar_produtos.php"); // Atualiza a página após atualizar
    exit();
}


$stmt = $pdo->query("SELECT * FROM produtos ORDER BY id ASC");
$produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Gerenciar Produtos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            background-color: #f4f4f4;
        }
        table {
            border-collapse: collapse;
            width: 80%;
            margin: auto;
            background-color: white;
            box-shadow: 0 0 10px #ccc;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px 15px;
            text-align: center;
        }
        th {
            background-color: #008080;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        form {
            display: inline;
        }
        .btn {
            padding: 6px 12px;
            margin: 2px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .editar {
            background-color: #4CAF50;
            color: white;
        }
        .deletar {
            background-color: #f44336;
            color: white;
        }
        .salvar {
            background-color: #2196F3;
            color: white;
        }
        input[type="text"], input[type="number"] {
            width: 100px;
        }
    </style>
</head>
<body>
    <h2 style="text-align:center;">Gerenciar Produtos</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Estoque</th>
            <th>Ações</th>
        </tr>

        <?php foreach ($produtos as $produto): ?>
            <tr>
                <form method="POST">
                    <input type="hidden" name="id" value="<?= $produto['id'] ?>">
                    <td><?= $produto['id'] ?></td>
                    <td><input type="text" name="nome" value="<?= htmlspecialchars($produto['nome']) ?>"></td>
                    <td><input type="number" name="estoque" value="<?= $produto['estoque'] ?>"></td>
                    <td>
                        <button type="submit" name="atualizar" class="btn salvar">Salvar</button>
                        <a href="?deletar=<?= $produto['id'] ?>" onclick="return confirm('Deseja deletar este produto?')" class="btn deletar">Deletar</a>
                    </td>
                </form>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>