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

// Retrieve all users' data from the database
$sql = "SELECT id, username, email, perfil_id FROM users";
$result = $conn->query($sql);

$user_data = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Remove the password from the user data
        unset($row['password']);
        $user_data[] = $row;
    }
}
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #0072ff; /* Blue text color */
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .logout-btn {
            background-color: #0072ff; /* Blue background color */
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .logout-btn:hover {
            background-color: #0056b3; /* Darker blue on hover */
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Lista de Usuários</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Nome de Usuário</th>
            <th>Email</th>
            <th>Perfil ID</th>
        </tr>
        <?php foreach ($user_data as $user): ?>
            <tr>
                <td><?= $user['id'] ?></td>
                <td><?= $user['username'] ?></td>
                <td><?= $user['email'] ?></td>
                <td><?= $user['perfil_id'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <button class="logout-btn" onclick="confirmLogout()">Sair</button>
</div>

<script>
    function confirmLogout() {
        if (confirm('Tem certeza que quer sair?')) {
            window.location.href = '../sair/sair.php';
        }
    }
</script>

</body>
</html>
