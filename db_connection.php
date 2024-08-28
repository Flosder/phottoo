<?php
$host = 'localhost'; // ou o endereço do seu servidor de banco de dados
$db = 'phottoo';
$user = 'root'; // ou o usuário do banco de dados
$pass = ''; // ou a senha do banco de dados

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Conexão falhou: ' . $e->getMessage();
    exit();
}
?>
