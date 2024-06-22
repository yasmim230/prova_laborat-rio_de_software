<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include '../banco/conn.php';

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $perfil_id = 2; // Default perfil_id for new users

    if ($password !== $confirm_password) {
        $_SESSION['error'] = "As senhas não coincidem.";
        header("Location: ../registro_e_login/registro.php");
        exit();
    } else {
        // Check if email already exists
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $_SESSION['error'] = "O e-mail já está registrado.";
            header("Location: ../registro_e_login/registro.php");
            exit();
        } else {
            // Insert new user
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("INSERT INTO users (username, email, password, perfil_id) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("sssi", $username, $email, $hashed_password, $perfil_id);

            if ($stmt->execute()) {
                $_SESSION['success'] = "Registro bem-sucedido. Você pode fazer login agora.";
                header("Location: ../registro_e_login/registro.php");
                exit();
            } else {
                $_SESSION['error'] = "Erro ao registrar o usuário.";
                header("Location: ../registro_e_login/registro.php");
                exit();
            }
        }
        $stmt->close();
    }
    $conn->close();
}
?>
