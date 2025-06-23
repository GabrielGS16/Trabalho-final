<?php
include("conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["nome"]) && isset($_POST["estoque"])) {
        $nome = trim($_POST["nome"]);
        $estoque = intval($_POST["estoque"]);

        if (!empty($nome) && $estoque >= 0) {
            $stmt = $pdo->prepare("INSERT INTO produtos(nome, estoque) VALUES(:nm, :est)");
            $stmt->bindParam(':nm', $nome);
            $stmt->bindParam(':est', $estoque);
            $stmt->execute(); 
            echo "Produto cadastrado com   sucesso!";
        } else {
            echo "Preencha os campos corretamente.";
        }
    } else {
        echo "Campos não recebidos.";
    }
}
?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastre-se</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="formulario">
        <h1>Cadastrar produto</h1>
        <form method="POST">
            <p>
                <label class="label">Nome do produto:</label><br>
                <input name="nome" type="text">
            </p>
            <p>
                <label class="label">Estoque:</label><br>
                <input type="text" name="estoque">
            </p>
            <p>
                <button type="submit">Cadastrar produto</button>
            </p>
        </form>
    </div>
</body>
</html>