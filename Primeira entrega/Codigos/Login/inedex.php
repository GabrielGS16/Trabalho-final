<div id="if">
<?php
include('conexao.php');

if (isset($_POST['email']) && isset($_POST['senha'])) {
     //informação que diz que o email não foi digitado
    if (empty($_POST['email'])) {
        echo "Preencha seu e-mail";
    // informação que fala que a senha não foi digitada
    } elseif (empty($_POST['senha'])) {
        echo "Preencha sua senha";
    } else {
        //Essas linhas pegam o valor do campo email e senha enviado por um formulário HTML usando o método POST.
        $email = $_POST['email'];
        $senha = $_POST['senha'];
         //ele prepara e seleciona tudo da tabela login (where adiciona uma condição) email e senha 
        $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email AND senha = :senha");
        //aqui o valor das variasveis muda
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senha);
        //executa
        $stmt->execute();
        
        if ($stmt->rowCount() === 1) {
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

            if (session_status() !== PHP_SESSION_ACTIVE) {
                session_start();
            }

            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];

            header("Location: painel.php");
            exit;
        } else {
            echo "Falha ao logar! E-mail ou senha incorretos";
        }
    }
} else {
    echo "Preencha todos os campos do formulário.";
}
?>
</div>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
     <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="titulo">
    <h1>Faça login</h1>
    </div>
<div id="formulario">
    <form action="" method= "POST">
    <p>
        <Label>E-mail</Label>
        <input type="text" name= "email">
    </p>

    <p>
        <Label>Senha</Label>
        <input type="password" name= "senha">
    </p>
    <p>
        <button type="submit">Entrar</button>
    </p>
    </form>
 </div>
</body>
</html>