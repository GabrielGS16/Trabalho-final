<?php
$usuario = "root";
$senha = "aluno";
$dbname = "floricultura";
$host = "localhost";
$port = 3307;



try {
   $pdo = new PDO("mysql:host=$host;rt;dbname=$dbname;port:$port;", $usuario, $senha);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
        echo "Erro na conexão: " . $e->getMessage();
}
?>