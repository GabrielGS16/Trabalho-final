<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="editarusuario.css">
</head>
<body>
    <h1>Editar Usuário</h1>
    <?php
    include('conexao.php');
    session_start();

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE id = :id");
        $stmt->bindValue(':id', $id);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            echo "<p>Usuário não encontrado.</p>";
            exit;
        }
    } else {
        echo "<p>ID do usuário não especificado.</p>";
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $stmt = $pdo->prepare("UPDATE usuarios SET email = :email, senha = :senha WHERE id = :id");
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':senha', $senha);
        $stmt->bindValue(':id', $id);

        if ($stmt->execute()) {
            echo "<p>Usuário atualizado com sucesso!</p>";
            header("Location: visualizar_usuario.php");
            exit;
        } else {
            echo "<p>Erro ao atualizar usuário.</p>";
        }
    }
    ?>

    <form method="POST" action="">
    
        
        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
        
        <label for="senha">Senha:</label>
        <input type="password" name="senha" value="<?php echo htmlspecialchars($user['senha']); ?>" required>
        
        <button type="submit">Atualizar</button>
    </form>

    <a href="visualizar_usuario.php">Voltar</a>
</body>
</html>