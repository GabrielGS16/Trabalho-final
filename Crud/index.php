<?php
include("conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["nome"];
    $email = $_POST["email"];
    $senha = password_hash($_POST["senha"], PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios (Nome, Email, Senha) VALUES (:nome, :email, :senha)";
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':senha', $senha);

    if ($stmt->execute()) {
        echo "Usuário cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar.";
    }   
}
?>

<0!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Cadastre-se</title>
    <link rel="stylesheet" href="style.css">
</head>

<body >
   
    <div id="formulario">
          <h1>Cadastre-se</h1>
    <form method="POST">
        <p>
            <label class="label" for="">Name: </label><br>
            <input atribute="name" type="text">
        </p>
        <p>
            <label class="label" for="">E-mail: </label><br>
            <input type="text" name="email">
        </p>
        <p>
            <label class="label" for="">Senha: </label><br>
            <input type="passoword" name="senha">
        </p>
        <p>
            <button type="submit">Cadastre-se</button>
        </p>
    </form>
    </div>
</body>
</html>