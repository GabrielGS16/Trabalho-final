<?php
//variaveis
$usuario = 'root';
$senha = '';
$database = 'login';
$host = 'localhost';


try {
    $pdo = new PDO("mysql:host=$host;dbname=$database;charset=utf8", $usuario, $senha);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
} catch (PDOException $e) {
    die("Falha ao conectar no banco de dados: " . $e->getMessage());
}