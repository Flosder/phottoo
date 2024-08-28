<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - PHOTTOO</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #e3f2fd;
        }

        header {
            background-color: #333;
            color: white;
            padding: 15px 20px;
            text-align: center;
            font-size: 18px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header h1 {
            margin: 0;
            font-size: 24px;
        }

        header nav a {
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            border-radius: 5px;
            background-color: #555;
        }

        header nav a:hover {
            background-color: #666;
        }

        .container {
            max-width: 600px;
            margin: 30px auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .register-container h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .register-container label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #333;
        }

        .register-container input {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .register-container button {
            width: 100%;
            padding: 10px;
            background-color: #1976d2;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 10px;
        }

        .register-container button:hover {
            background-color: #1565c0;
        }
    </style>
</head>
<body>

    <header>
        <h1>PHOTTOO</h1>
        <nav>
            <a href="index.html">Início</a>            
            <a href="contact.html">Contato</a>            
        </nav>
    </header>

    <div class="container">
        <div class="register-container">
            <h1>Registro</h1>
            <form action="register_process.php" method="post">
                <label for="name">Nome Completo</label>
                <input type="text" id="name" name="name" required>

                <label for="dob">Data de Nascimento</label>
                <input type="date" id="dob" name="dob" required>

                <label for="address">Endereço Completo</label>
                <input type="text" id="address" name="address" required>

                <label for="phone">Telefone</label>
                <input type="text" id="phone" name="phone" required>

                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" required>

                <label for="password">Senha</label>
                <input type="password" id="password" name="password" required>

                <button type="submit">Registrar</button>
            </form>
        </div>
    </div>
</body>
</html>
