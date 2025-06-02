<?php
if (!isset($_SESSION)) {
    session_start();
}

// Verifica se o usuário está logado
if (!isset($_SESSION['id']) || !isset($_SESSION['nome'])) {
    // Redireciona para a página de login se não estiver logado
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel</title>
</head>
<body>
    <h2>Bem-vindo ao floricultura GG, <?php echo htmlspecialchars($_SESSION['nome']); ?>!</h2>
</body>
</html>