<?php
require_once '../conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome_peneira'];
    $cpf = $_POST['data_peneira'];
    $telefone = $_POST['fechamento_peneira'];
    $endereco = $_POST['texto_peneira'];
    $rg = intval($_POST['vagas_peneira']);
    $email;
    $senha;

    // Inserir a peneira
    $sql = "INSERT INTO Usuario (Nome, CPF, Telefone, Endereco, RG, email, senha) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nome, $cpf, $telefone, $endereco, $rg, $email, $senha]);

    // Pega o id da peneira inserida
    $idUsuario = $pdo->lastInsertId();

}
?>