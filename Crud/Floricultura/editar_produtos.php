<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="editarproduto.css">
</head>
<body>
<?php
include('conexao.php');
include('protect.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $valor = $_POST['valor'];
    $descricao = $_POST['descricao'];

    $stmt = $pdo->prepare("UPDATE produtos SET nome = :nome, valor = :valor, descricao = :descricao WHERE id = :id");
    $stmt->bindValue(':id', $id);
    $stmt->bindValue(':nome', $nome);
    $stmt->bindValue(':valor', $valor);
    $stmt->bindValue(':descricao', $descricao);

    if ($stmt->execute()) {
        echo "Produto atualizado com sucesso!";
    } else {
        echo "Erro ao atualizar produto.";
    }
} else {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM produtos WHERE id = :id LIMIT 1");
    $stmt->bindValue(':id', $id);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $produto = $stmt->fetch(PDO::FETCH_ASSOC);
        ?>
        <form method="POST" action="">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($produto['id']); ?>">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" value="<?php echo htmlspecialchars($produto['nome']); ?>" required>

            <label for="valor">Valor:</label>
            <input type="text" name="valor" value="<?php echo htmlspecialchars($produto['valor']); ?>" required>

            <label for="descricao">Descrição:</label>
            <textarea name="descricao" required><?php echo htmlspecialchars($produto['descricao']); ?></textarea>

            <button type="submit">Atualizar</button>
        </form>
        <?php
    } else {
        echo "<p>Produto não encontrado.</p>";
    }
}
?>
    <h1>Editar Produto</h1>
    <form method="POST" action="">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" required>

        <label for="valor">Valor:</label>
        <input type="text" name="valor" required>

        <label for="descricao">Descrição:</label>
        <textarea name="descricao" required></textarea>

        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>