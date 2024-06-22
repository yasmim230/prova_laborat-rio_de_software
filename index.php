<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem-Vindo!</title>
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
            margin: 20px auto;
            max-width: 600px;
        }

        h1 {
            margin-bottom: 20px;
            color: #0056b3; /* Slightly darker blue */
        }

        .sub-message {
            color: #0056b3; /* Slightly darker blue for sub-message */
            margin-bottom: 20px;
        }

        .buttons a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #fff;
            color: #000;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .buttons a:hover {
            background-color: #ccc;
        }
    </style>
</head>

<body>
    
    <div class="container">
        <h1>Bem-Vindo!</h1>
        <p class="sub-message">Este é o site de boas-vindas.</p>
        <p class="sub-message">Por favor, faça login ou registre-se para continuar.</p>
        <div class="buttons">
            <a href="./registro_e_login/login.php">Login</a>
            <a href="./registro_e_login/registro.php">Registrar</a>
        </div>
    </div>
</body>

</html>
