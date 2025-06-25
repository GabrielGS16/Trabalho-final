<?php
$host = 'localhost';
$db = 'floricultura';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
} catch (PDOException $e) {
    echo "Erro na conexão: " . $e->getMessage();
}

?>