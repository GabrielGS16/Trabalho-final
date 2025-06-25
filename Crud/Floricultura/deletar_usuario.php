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