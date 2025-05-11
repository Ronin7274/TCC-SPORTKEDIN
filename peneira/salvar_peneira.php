<?php
require_once '../conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome_peneira'];
    $horario = $_POST['data_peneira'];
    $fechamento = $_POST['fechamento_peneira'];
    $descricao = $_POST['texto-peneira'];
    $vagas = intval($_POST['vagas_peneira']);
    $local = 'A definir'; // ou adicione input no formulário se quiser deixar dinâmico

    // Inserir a peneira
    $sql = "INSERT INTO Peneira (Nome, Horario, Horario_fechamento, Descricao, Vagas, Local) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nome, $horario, $fechamento, $descricao, $vagas, $local]);

    // Pega o id da peneira inserida
    $idPeneira = $pdo->lastInsertId();

    // Redireciona para a página de exibição da peneira
    header("Location: peneira.php?id=$idPeneira");
    exit;
}
?>
