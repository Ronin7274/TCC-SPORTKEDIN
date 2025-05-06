<?php
require_once '../conexao.php';

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

    // Inserir no banco
    $sql = "INSERT INTO Usuario (Nome, CPF, Telefone, Endereco, RG, email, senha) VALUES (?, ?, ?, ?, ?, ?, ?)";

    // Verifica se houve erro na preparação
    if (!$stmt) {
        die("Erro ao preparar o statement: " . $conn->error);
    }

    // Associa os parâmetros ao statement
    $stmt->bind_param("sssssss", $nome, $cpf, $telefone, $endereco, $rg, $email, $senhaHash);

    // Executa o comando
    if ($stmt->execute()) {

        $idUsuario = $stmt->insert_id;

        // Se der certo, redireciona para página de login ou mostra mensagem
        echo "<script>alert('Usuário cadastrado com sucesso!'); window.location.href = '../index.php';</script>";
    } else {
        // Se der erro, exibe mensagem
        echo "Erro ao cadastrar: " . $stmt->error;
    }

    // Fecha o statement e conexão
    $stmt->close();
    $conn->close();
}
