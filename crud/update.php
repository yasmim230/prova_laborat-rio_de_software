<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../registro_e_login/login.php");
    exit();
}

include '../banco/conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['user_id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $perfil_id = $_POST['perfil_id']; // Assuming you have a dropdown or input for perfil_id

    $sql = "UPDATE users SET username='$username', email='$email', password='$password', perfil_id='$perfil_id' WHERE id='$user_id'";
    
    if ($conn->query($sql) === TRUE) {
        $_SESSION['success'] = "Usuário atualizado com sucesso.";
        header("Location: ../paginas_perfil/admin.php");
        exit();
    } else {
        $_SESSION['error'] = "Erro ao atualizar usuário: " . $conn->error;
    }
} elseif (isset($_GET['id'])) {
    $user_id = $_GET['id'];
    $sql = "SELECT * FROM users WHERE id='$user_id'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 400px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #0072ff;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 5px;
        }

        input, select {
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 100%;
        }

        button {
            background-color: #0072ff;
            color: #fff;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Editar Usuário</h2>

    <form method="post" action="">
        <input type="hidden" name="user_id" value="<?= $row['id'] ?>">
        <label for="username">Nome de Usuário:</label>
        <input type="text" id="username" name="username" value="<?= $row['username'] ?>" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?= $row['email'] ?>" required>

        <label for="password">Senha:</label>
        <input type="password" id="password" name="password" value="<?= $row['password'] ?>" required>

        <label for="perfil_id">Perfil:</label>
        <select id="perfil_id" name="perfil_id" required>
            <option value="1" <?= $row['perfil_id'] == 1 ? 'selected' : '' ?>>Admin</option>
            <option value="2" <?= $row['perfil_id'] == 2 ? 'selected' : '' ?>>User</option>
        </select>

        <button type="submit">Salvar Alterações</button>
    </form>
</div>

</body>
</html>
