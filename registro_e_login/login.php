<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #00c6ff, #0072ff);
            /* Gradient background */
            color: #fff;
            text-align: center;
        }

        nav {
            background-color: #0056b3; /* Darker blue */
            padding: 10px 0;
            text-align: center;
        }

        nav a {
            color: #fff;
            text-decoration: none;
            margin: 0 10px;
            padding: 8px 16px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        nav a:hover {
            background-color: #004080; /* Darker blue on hover */
        }

        .container {
            background: rgba(255, 255, 255, 0.8); /* Semi-transparent white background */
            padding: 20px;
            border-radius: 10px;
            width: 300px;
            margin: 20px auto;
        }

        h1 {
            margin-bottom: 20px;
            color: #0056b3; /* Slightly darker blue */
        }

        .error {
            color: red;
            margin-bottom: 10px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        input {
            margin-bottom: 10px;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: rgba(255, 255, 255, 0.8);
            color: #000;
        }

        button {
            padding: 10px 20px;
            background-color: #0072ff; /* Blue */
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #0056b3; /* Slightly darker blue on hover */
        }

        .register-link {
            color: #0056b3; /* Slightly darker blue for register link */
            text-decoration: none;
            margin-top: 10px;
            display: inline-block;
        }

        .register-link:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <nav>
        <a href="../index.php">Voltar para a página Inicial</a>
    </nav>
    <div class="container">
        <h1>Login</h1>
        <?php
        if (isset($_SESSION['error'])) {
            echo '<div class="error">' . htmlspecialchars($_SESSION['error']) . '</div>';
            unset($_SESSION['error']);
        }
        ?>
        <form method="post" action="../login_registro_backend/login_back.php">
            <input type="email" name="email" placeholder="E-mail" required>
            <input type="password" name="password" placeholder="Senha" required>
            <button type="submit">Login</button>
        </form>
        <a class="register-link" href="./registro.php">Não tenho uma conta? Registre-se aqui</a>
    </div>
</body>

</html>
