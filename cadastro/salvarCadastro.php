<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ob_start();

echo "<pre>";
var_dump($_POST);
echo "</pre>";

if (empty($_POST)) {
    die("Erro: Nenhum dado foi enviado via POST.");
}

require_once '../conexao.php';

$tipo = $_POST['tipoConta'] ?? null;

if ($tipo === 'usuario') {

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nome = $_POST['nameUser'];
        $cpf = $_POST['cpfUser'];
        $telefone = $_POST['telefUser'];
        $endereco = $_POST['enderecoUser'];
        $rg = $_POST['rgUser'];
        $email = $_POST['emailUser'];
        $senha = $_POST['senha'];
        $confirma = $_POST['confirma'];


        if ($senha != $confirma) {
            die("Erro: As senhas não coincidem.");
        }

        // Cria um hash seguro da senha usando o algoritmo padrão (bcrypt atualmente)
        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

        // Verifica duplicidade de dados únicos
        $verifica = $pdo->prepare("SELECT * FROM Usuario WHERE Telefone = ? OR Email = ? OR RG = ? OR CPF = ?");
        $verifica->execute([$telefone, $email, $rg, $cpf]);
        $usuarioExistente = $verifica->fetch(PDO::FETCH_ASSOC);

        if ($usuarioExistente['Telefone'] === $telefone) {
            echo ("Erro: Já existe um usuário com o mesmo telefone");
        } elseif ($usuarioExistente['Email'] === $email) {
            echo ("Erro: Já existe um usuário com o mesmo email");
        } elseif ($usuarioExistente['RG'] === $rg) {
            echo ("Erro: Já existe um usuário com o mesmo rg");
        } elseif ($usuarioExistente['CPF'] === $cpf) {
            die("Erro: Já existe um usuário com o mesmo telefone");
        }

        // Inserir no banco
        $sql = "INSERT INTO Usuario (Nome, CPF, Telefone, Endereco, RG, Email, Senha, Tipo) VALUES (?, ?, ?, ?, ?, ?, ?, 'usuario')";

        $stmt = $pdo->prepare($sql);

        $stmt->execute([$nome, $cpf, $telefone, $endereco, $rg, $email, $senhaHash]);

        header("Location: ../index.php");
        exit;
    }
} elseif ($tipo === 'clube') {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nome = $_POST['nameClube'];
        $cnpj = $_POST['cnpj'];
        $email = $_POST['emailClube'];
        $senha = $_POST['senha'];
        $confirma = $_POST['confirma'];


        if ($senha != $confirma) {
            die("Erro: As senhas não coincidem.");
        }

        // Cria um hash seguro da senha usando o algoritmo padrão (bcrypt atualmente)
        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

        // Inserir no banco
        $sql = "INSERT INTO Clube (Nome, CNPJ, Email, Senha, Tipo) VALUES (?, ?, ?, ?, 'clube')";

        $stmt = $pdo->prepare($sql);

        $stmt->execute([$nome, $cnpj, $email, $senhaHash]);

        header("Location: ../index.php");
        exit;
    }
}

ob_end_flush();
