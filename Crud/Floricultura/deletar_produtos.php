<?php
include('conexao.php');
session_start();

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $pdo->prepare("DELETE FROM produtos WHERE id = :id");
    $stmt->bindValue(':id', $id);

    if ($stmt->execute()) {
        echo "Produto deletado com sucesso!";
    } else {
        echo "Erro ao deletar produto.";
    }
} else {
    echo "ID do produto não especificado.";
}
?>