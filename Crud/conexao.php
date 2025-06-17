<?php
$usuario = "root";
$senha = "";
$dbname = "cadastro";
$host = "localhost";
$port = 3307;

try {
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=cadastro", $usuario, $senha);
    echo "Cadastro feita com sucesso!";
} catch (PDOException $e) {
    echo "Erro na conexão: " . $e->getMessage();
}
?>
