
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastre-se</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="cabecalho">
    <h1>Floricultura GG</h1>
    <nav>
        <a href="cadastro_produto.php">Cadastrar Produto</a>
        <a href="cadastro_categoria.php">Cadastrar Categoria</a>
        <a href="categorias_cadastradas.php">Categorias Cadastradas</a>
        <a href="produtos_cadastrados.php">Produtos Cadastrados</a>
    </nav>
</div>
<div>
<?php
include("conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["nome"], $_POST["descricao"], $_POST["preco"])) {
        $nome = trim($_POST["nome"]);
        $descricao = trim($_POST["descricao"]);
        $preco = floatval(trim($_POST["preco"]));
        
        if (!empty($nome) && !empty($descricao) && $preco > 0) {
            try {
                $stmt = $pdo->prepare("INSERT INTO produtos(nome, descricao, preco) VALUES(:nm, :dsc, :prc)");
                $stmt->bindValue(':nm', $nome);
                $stmt->bindValue(':dsc', $descricao);
                $stmt->bindValue(':prc', $preco);
                $stmt->execute();
                echo "Produto cadastrado com sucesso!";
            } catch (PDOException $e) {
                echo "Erro no cadastro: " . $e->getMessage();
            }
        } else {
            echo "Preencha os campos corretamente.";
        }
    } else {
        echo "Campos não recebidos.";
    }
}
?>


</div>
    <div id="formulario">
       
        <form method="POST">
            <p>
                <label class="label">Nome do produto:</label><br>
                <input name="nome" type="text">
            </p>
            <p>
                <label class="label">Descrição:</label><br>
                <input type="text" name="descricao">
            </p>
             <p>
                <label class="label">Preço:</label><br>
                <input type="Number" name="preco">
            </p>
            <p>
                <button type="submit">Cadastrar produto</button>
            </p>
        </form>
    </div>
</body>
</html>