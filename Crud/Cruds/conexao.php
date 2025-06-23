<?php
$usuario = "root";
$senha = "";
$dbname = "cruds_cadastros";
$host = "localhost";


try {
   $pdo = new PDO("mysql:host=$host;rt;dbname=crud_cadastro", $usuario, $senha);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);} catch (PDOException $e) {
    echo "Erro na conexão: " . $e->getMessage();
}
?>