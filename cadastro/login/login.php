<?php
session_start();
require_once '../conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senhaDigitada = $_POST['password'];

    // Tenta login como USUÁRIO
    $sqlUsuario = "SELECT * FROM Usuario WHERE email = ?";
    $stmtUsuario = $conn->prepare($sqlUsuario);
    $stmtUsuario->bind_param("s", $email);
    $stmtUsuario->execute();
    $resUsuario = $stmtUsuario->get_result();

    if ($resUsuario->num_rows === 1) {
        $usuario = $resUsuario->fetch_assoc();

        if (password_verify($senhaDigitada, $usuario['senha'])) {
            $_SESSION['idUsuario'] = $usuario['idUsuario'];
            $_SESSION['nome'] = $usuario['Nome'];
            $_SESSION['tipo'] = 'usuario';

            header("Location: areaUsuario.php");
            exit();
        }
    }

    // Tenta login como CLUBE
    $sqlClube = "SELECT * FROM Clube WHERE email = ?";
    $stmtClube = $conn->prepare($sqlClube);
    $stmtClube->bind_param("s", $email);
    $stmtClube->execute();
    $resClube = $stmtClube->get_result();

    if ($resClube->num_rows === 1) {
        $clube = $resClube->fetch_assoc();

        if (password_verify($senhaDigitada, $clube['senha'])) {
            $_SESSION['idClube'] = $clube['idClube'];
            $_SESSION['nome'] = $clube['Nome'];
            $_SESSION['tipo'] = 'clube';

            header("Location: areaClube.php");
            exit();
        }
    }

    // Se nenhum login funcionar
    echo "<script>alert('E-mail ou senha inválidos'); window.history.back();</script>";
}
?>
