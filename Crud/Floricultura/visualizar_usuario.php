<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="visualizarusuario.css">
</head>
<body>
    <h1>Visualizar Usuário</h1>
    <?php
    include('conexao.php');
    session_start();
    $stmt = $pdo->prepare("SELECT * FROM usuarios");
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        while ($user = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<p>ID: " . htmlspecialchars($user['id']) . "</p>";
            echo "<p>Email: " . htmlspecialchars($user['email']) . "</p>";
            echo "<p>Senha: " . htmlspecialchars($user['senha']) . "</p>";
            echo "<a href='editar_usuario.php?id=" . htmlspecialchars($user['id']) . "'>Editar</a>";
            echo " | <a href='excluir_usuario.php?id=" . htmlspecialchars($user['id']) . "' onclick='return confirm(\"Tem certeza que deseja excluir este usuário?\");'>Excluir</a>";
        }
    } else {
        echo "<p>Nenhum usuário encontrado.</p>";
    }
    ?>
    <a href="cadastro_usuario.php">Cadastrar Novo Usuário</a>
    <a href="painel.php">Voltar ao Painel</a>
