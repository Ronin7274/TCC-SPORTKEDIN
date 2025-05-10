<?php
require_once '../conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tipo = $_POST['nome_peneira'];
    $horario = $_POST['data_peneira'];
    $fechamento = $_POST['fechamento_peneira'];
    $descricao = $_POST['texto-peneira'];
    $vagas = intval($_POST['vagas_peneira']);
    //$local = 'A definir'; // ou pode adicionar um campo no formulário

    // Inserir a peneira
    $sql = "INSERT INTO Peneira (Tipo, Horario, descricao, horario_fechamento, vagas) VALUES (?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$tipo, $horario, $descricao, $fechamento, $vagas]);

    // Pega o id da peneira inserida
    $idPeneira = $pdo->lastInsertId();

    // Redireciona para a página de exibição da peneira
    header("Location: peneira.php?id=$idPeneira");
    exit;
}
?>