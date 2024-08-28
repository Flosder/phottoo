<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "phottoo";

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Receber dados do formulário
$email = $_POST['email'];
$password = $_POST['password'];

// Preparar a consulta SQL para verificar as credenciais
$sql = "SELECT password FROM users WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    $stmt->bind_result($hashed_password);
    $stmt->fetch();

    // Verificar a senha
    if (password_verify($password, $hashed_password)) {
        // Redirecionar para a página index.html
        header("Location: index.html");
        exit();
    } else {
        echo "Senha incorreta!";
    }
} else {
    echo "E-mail não encontrado!";
}

$stmt->close();
$conn->close();
?>
