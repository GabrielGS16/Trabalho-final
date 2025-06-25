<?php
    include('conexao.php');
    session_start();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email AND senha = :senha LIMIT 1");
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':senha', $senha);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        echo "Usuário já cadastrado!";
    } else {
        $stmt = $pdo->prepare("INSERT INTO usuarios (email, senha) VALUES (:email, :senha)");
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':senha', $senha);

        if ($stmt->execute()) {
            echo "Usuário cadastrado com sucesso!";
            header("Location: visualizar_usuario.php");
            exit;
        } else {
            echo "Erro ao cadastrar usuário.";
        }
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <form method="POST" action="">
            <h1>Cadastrar usuário</h1>
            <p>
                <label for="">Email:</label>
                <input type="text" name="email">
            </p>
            <p>
                <label for="">Senha:</label>
                <input type="password" name="senha">
            </p>
            <p>
                <button type="submit">Cadastrar</button>
                <a href="visualizar_usuario.php">Cancelar</a>
            </p>
        </form>
    </div>
</body>
</html>