<?php
session_start();
error_reporting(E_ALL);


require_once '../../conexao.php';

$login = $_POST['tipoLogin'] ?? null;

if ($login === 'Usuario') {

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = $_POST['email'] ?? '';
        $senhaDigitada = $_POST['password'] ?? '';

        // Tenta login como USUÁRIO
        $sqlUsuario = "SELECT * FROM Usuario WHERE Email = ?";
        $stmt = $pdo->prepare($sqlUsuario);
        $stmt->execute([$email]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario && password_verify($senhaDigitada, $usuario['Senha'])) {
            $_SESSION['idUsuario'] = $usuario['idUsuario'];
            $_SESSION['nome'] = $usuario['Nome'];
            $_SESSION['tipo'] = 'usuario';

            header("location: /TCC-SPORTKEDIN/peneira/criação_peneira.php");
            exit;
        }
    }
} elseif ($login === 'Clube') {

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = $_POST['email'] ?? '';
        $senhaDigitada = $_POST['password'] ?? '';
        // Tenta login como CLUBE
        $sqlClube = "SELECT * FROM Clube WHERE Email = ?";
        $stmt = $pdo->prepare($sqlClube);
        $stmt->execute([$email]);
        $clube = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($clube && password_verify($senhaDigitada, $clube['Senha'])) {
            $_SESSION['idClube'] = $clube['idClube'];
            $_SESSION['nome'] = $clube['Nome'];
            $_SESSION['tipo'] = 'clube';

            header("location: /TCC-SPORTKEDIN/peneira/criação_peneira.php");
            exit;
        }

        // Se nenhum login funcionar
        echo "<script>alert('E-mail ou senha inválidos'); window.history.back();</script>";
    }
}
