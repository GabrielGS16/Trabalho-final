<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="visualizarproduto.css">
</head>
<body>
    <h1>Visualizar Produtos</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Valor</th>
                <th>Descrição</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include('conexao.php');
            $stmt = $pdo->prepare("SELECT * FROM produtos");
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                while ($produto = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($produto['id']) . "</td>";
                    echo "<td>" . htmlspecialchars($produto['nome']) . "</td>";
                    echo "<td>" . htmlspecialchars($produto['valor']) . "</td>";
                    echo "<td>" . htmlspecialchars($produto['descricao']) . "</td>";
                    echo "<td>
                            <a href='editar_produtos.php?id=" . htmlspecialchars($produto['id']) . "'>Editar</a>
                            <a href='deletar_produtos.php?id=" . htmlspecialchars($produto['id']) . "' onclick=\"return confirm('Tem certeza que deseja deletar este produto?');\">Deletar</a>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>Nenhum produto encontrado.</td></tr>";
            }
            ?>
        </tbody>
    </table>
    <a href="cadastro_produtos.php">Cadastrar Novo Produto</a>
    <a href="painel.php">Voltar ao Painel</a>
</body>
</html>