<?php
include('conexao.php');
include('protect.php');
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Painel</title>
    <link rel="stylesheet" href="painel.css">
</head>
<body>
    <header class="topo">
        <div class="logo">Floricultura</div>
        <nav class="menu">
            <a href="visualizar_produtos.php">Produtos</a>
            <a href="visualizar_usuario.php">Usuário</a>
            <a href="logout.php">Sair</a>
        </nav>
    </header>

    <main class="conteudo">
        <h1>Bem-vindo, <?php echo htmlspecialchars($_SESSION['email']); ?>!</h1>
        <p>Escolha uma das opções acima para continuar.</p>
    </main>
</body>
</html>
