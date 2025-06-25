<?php
include('conexao.php');
session_start();

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $pdo->prepare("DELETE FROM usuarios WHERE id = :id");
    $stmt->bindValue(':id', $id);

    if ($stmt->execute()) {
        echo "Usuário deletado com sucesso!";
    } else {
        echo "Erro ao deletar usuário.";
    }
} else {
    echo "ID do usuário não especificado.";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="deletarusuario.css">
</head>
<body>
    <button id="voltar"><a href="painel.php">Voltar</a></button>
</body>
</html>