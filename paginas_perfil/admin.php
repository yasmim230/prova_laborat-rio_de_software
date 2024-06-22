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

$sql = "SELECT id, username, email, password, perfil_id FROM users";
$result = $conn->query($sql);

$user_data = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $row['perfil'] = ($row['perfil_id'] == 1) ? 'admin' : 'user';
        $user_data[] = $row;
    }
}

// Check if success message is set in session
if (isset($_SESSION['success'])) {
    $success_message = $_SESSION['success'];
    unset($_SESSION['success']); // Remove the success message from session to display only once
}
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
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

        a {
            text-decoration: none;
            color: #0072ff;
            margin-right: 10px;
        }

        a:hover {
            text-decoration: underline;
        }

        button {
            background-color: #0072ff;
            color: #fff;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-right: 10px;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Admin Page</h2>

    <?php if (isset($success_message)): ?>
    <div style="background-color: #d4edda; color: #155724; padding: 10px; border-radius: 5px; margin-bottom: 10px;">
        <?php echo $success_message; ?>
    </div>
    <?php endif; ?>

    <table>
        <tr>
            <th>ID</th>
            <th>Nome de Usuário</th>
            <th>Email</th>
            <th>Password</th>
            <th>Perfil</th>
            <th>Action</th>
        </tr>
        <?php foreach ($user_data as $user): ?>
            <tr>
                <td><?= $user['id'] ?></td>
                <td><?= $user['username'] ?></td>
                <td><?= $user['email'] ?></td>
                <td style="max-width: 100px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;"><?= $user['password'] ?></td>
                <td><?= $user['perfil'] ?></td>
                <td>
                    <a href="../crud/update.php?id=<?= $user['id'] ?>">Editar</a>
                    <a href="../crud/delete.php?id=<?= $user['id'] ?>" onclick="return confirm('Tem certeza que deseja excluir este usuário?')">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <button onclick="location.href='../crud/create.php'">Criar Usuário</button>
    <button onclick="confirmLogout()">Logout</button>
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
