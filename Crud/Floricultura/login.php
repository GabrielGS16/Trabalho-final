<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="login.css">

</head>
<body>
     
    <div>
        <form method="POST" action="">
            <h1>Faça seu login</h1>
            <p>
                <label for="">Email:</label>
                <input type="text" name="email">
            </p>
            <p>
                <label for="">Senha:</label>
                <input type="password" name="senha">
            </p>
            <p>
                <button type="submit">Faça login</button>
            </p>
        </form>
    </div>
       <?php
        include('conexao.php');
        session_start();

        if (isset($_POST['email']) && isset($_POST['senha'])) {

            if (strlen($_POST['email']) == 0) {
                echo "Preencha seu email";
            } elseif (strlen($_POST['senha']) == 0) {
                echo "Preencha sua senha";
            } else {
                $email = $_POST['email'];
                $senha = $_POST['senha'];

                $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email AND senha = :senha LIMIT 1");
                $stmt->bindValue(':email', $email);
                $stmt->bindValue(':senha', $senha);
                $stmt->execute();

                if ($stmt->rowCount() == 1) {
                    $user = $stmt->fetch(PDO::FETCH_ASSOC);
                    $_SESSION['id'] = $user['id'];
                    $_SESSION['email'] = $user['email'];
                    header("Location: painel.php");
                    exit;
                } else {
                    echo "Falha ao logar! Email ou senha incorretos";
                }
            }
        }
        ?>
</body>
</html>