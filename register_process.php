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
$name = $_POST['name'];
$dob = $_POST['dob'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash da senha

// Verificar se o e-mail já está em uso
$sql_check_email = "SELECT * FROM users WHERE email = '$email'";
$result = $conn->query($sql_check_email);

if ($result->num_rows > 0) {
    // E-mail já existe
    echo "<!DOCTYPE html>
    <html lang='pt-br'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>E-mail já Cadastrado - PHOTTOO</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
                background-color: #e3f2fd;
            }

            .container {
                max-width: 600px;
                margin: 30px auto;
                padding: 20px;
                background-color: white;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                border-radius: 8px;
                text-align: center;
            }

            .container h1 {
                color: #333;
            }

            .container p {
                color: #333;
                margin-bottom: 20px;
            }

            .container a {
                display: inline-block;
                padding: 10px 20px;
                background-color: #1976d2;
                color: white;
                text-decoration: none;
                border-radius: 5px;
            }

            .container a:hover {
                background-color: #1565c0;
            }
        </style>
    </head>
    <body>
        <div class='container'>
            <h1>E-mail já cadastrado!</h1>
            <p>O endereço de e-mail que você forneceu já está registrado. Por favor, use um e-mail diferente.</p>
            <a href='register.php'>Voltar para Registro</a>
        </div>
    </body>
    </html>";
} else {
    // Inserir dados na tabela
    $sql = "INSERT INTO users (name, dob, address, phone, email, password)
    VALUES ('$name', '$dob', '$address', '$phone', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        // Cadastro realizado com sucesso
        echo "<!DOCTYPE html>
        <html lang='pt-br'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Cadastro Completo - PHOTTOO</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    margin: 0;
                    padding: 0;
                    background-color: #e3f2fd;
                }

                .container {
                    max-width: 600px;
                    margin: 30px auto;
                    padding: 20px;
                    background-color: white;
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                    border-radius: 8px;
                    text-align: center;
                }

                .container h1 {
                    color: #333;
                }

                .container p {
                    color: #333;
                    margin-bottom: 20px;
                }

                .container a {
                    display: inline-block;
                    padding: 10px 20px;
                    background-color: #1976d2;
                    color: white;
                    text-decoration: none;
                    border-radius: 5px;
                }

                .container a:hover {
                    background-color: #1565c0;
                }
            </style>
        </head>
        <body>
            <div class='container'>
                <h1>Cadastro Completo!</h1>
                <p>Seu cadastro foi realizado com sucesso. Agora você pode fazer login.</p>
                <a href='login.php'>Ir para Login</a>
            </div>
        </body>
        </html>";
    } else {
        // Exibir mensagem de erro
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
