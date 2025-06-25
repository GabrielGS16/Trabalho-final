<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produtos</title>
</head>
<body>
<?php
include('conexao.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $valor = $_POST['valor'];
    $descricao = $_POST['descricao'];

    $stmt = $pdo->prepare("SELECT * FROM produtos WHERE nome = :nome LIMIT 1");
    $stmt->bindValue(':nome', $nome);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        echo "Produto já cadastrado!";
    } else {
        $stmt = $pdo->prepare("INSERT INTO produtos (nome, valor, descricao) VALUES (:nome, :valor, :descricao)");
        $stmt->bindValue(':nome', $nome);
        $stmt->bindValue(':valor', $valor);
        $stmt->bindValue(':descricao', $descricao);

        if ($stmt->execute()) {
            echo "Produto cadastrado com sucesso!";
            header("Location: visualizar_produtos.php");
            exit;
        } else {
            echo "Erro ao cadastrar produto.";
        }
    }
}
?>
    <h1>Cadastro de Produtos</h1>
    <form method="POST" action="">
        <label >Nome:</label>
        <input type="text" name="nome" required>

        <label >Valor:</label>
        <input type="text" name="valor" required>

        <label >Descrição:</label>
        <textarea name="descricao" required></textarea>

        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>

</body>
</html>