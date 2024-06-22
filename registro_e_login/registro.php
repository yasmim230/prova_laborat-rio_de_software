<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar</title>
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
            background: rgba(255, 255, 255, 0.8);
            /* Semi-transparent white background */
            padding: 20px;
            border-radius: 10px;
            width: 300px;
            margin: 20px auto;
        }

        h1 {
            margin-bottom: 20px;
            color: #0072ff; /* Blue color */
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
            background-color: rgba(255, 255, 255, 0.5); /* Lighter white background */
            color: #000;
        }

        .error {
            color: red;
            margin-bottom: 10px;
        }

        .success {
            color: green;
            margin-bottom: 10px;
        }

        button {
            padding: 10px;
            background-color: #0072ff; /* Blue button background */
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #0056b3; /* Darker blue on hover */
        }

        a {
            color: #0072ff; /* Blue link color */
            text-decoration: none;
            margin-top: 10px;
            display: inline-block;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <nav>
        <a href="../index.php">Voltar para a Página Inicial</a>
    </nav>
    <div class="container">
        <h1>Registrar</h1>
        <?php
        if (isset($_SESSION['error'])) {
            echo '<div class="error">' . htmlspecialchars($_SESSION['error']) . '</div>';
            unset($_SESSION['error']);
        }
        if (isset($_SESSION['success'])) {
            echo '<div class="success">' . htmlspecialchars($_SESSION['success']) . '</div>';
            unset($_SESSION['success']);
        }
        ?>
        <form method="post" action="../login_registro_backend/registro_back.php">
            <input type="text" name="username" placeholder="Nome de Usuário" required>
            <input type="email" name="email" placeholder="E-mail" required>
            <input type="password" name="password" placeholder="Senha" required>
            <input type="password" name="confirm_password" placeholder="Confirmar Senha" required>
            <button type="submit">Registrar</button>
        </form>
        <a href="../registro_e_login/login.php">Já tem uma conta? Faça login aqui</a>
    </div>
</body>

</html>
