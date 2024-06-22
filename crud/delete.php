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

if (isset($_GET['id'])) {
    $user_id = $_GET['id'];
    $sql = "DELETE FROM users WHERE id='$user_id'";
    
    if ($conn->query($sql) === TRUE) {
        $_SESSION['success'] = "Usuário excluído com sucesso.";
        header("Location: ../paginas_perfil/admin.php?delete_success=1"); // Pass delete_success parameter
        exit();
    } else {
        $_SESSION['error'] = "Erro ao excluir usuário: " . $conn->error;
    }
}
?>
