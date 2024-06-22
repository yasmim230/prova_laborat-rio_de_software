<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

include '../banco/conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare and execute SQL statement to retrieve user data
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // Password is correct
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['perfil_id'] = $row['perfil_id'];

            // Redirect user based on perfil_id
            if ($row['perfil_id'] == 1) {
                header("Location: ../paginas_perfil/admin.php");
                exit();
            } elseif ($row['perfil_id'] == 2) {
                header("Location: ../paginas_perfil/user.php");
                exit();
            }
        } else {
            // Password is incorrect
            $_SESSION['error'] = "Senha incorreta.";
            header("Location: ../registro_e_login/login.php");
            exit();
        }
    } else {
        // User not found
        $_SESSION['error'] = "E-mail não encontrado.";
        header("Location: ../registro_e_login/login.php");
        exit();
    }
}
?>
