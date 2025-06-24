<?php
include("conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $estoque = $_POST["estoque"];

    $stmt = $pdo->prepare("UPDATE produtos SET nome = :nm, estoque = :est WHERE id = :id");
    $stmt->bindParam(":nm", $nome);
    $stmt->bindParam(":est", $estoque);
    $stmt->bindParam(":id", $id);
    $stmt->execute();

    echo "Produto atualizado com sucesso!";
}
