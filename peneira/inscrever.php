<?php
require_once '../conexao.php';

$idPeneira = $_POST['idPeneira'] ?? null;
$idUsuario = $_POST['idUsuario'] ?? null;

if (!$idPeneira || !$idUsuario) {
    die("Erro: Dados incompletos.");
}

// Verifica se o usuário já está inscrito
$sql = "SELECT * FROM Peneira_has_Pessoa WHERE Peneira_idPeneira = ? AND Pessoa_idPessoa = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$idPeneira, $idUsuario]);
if ($stmt->rowCount() > 0) {
    die("Você já está inscrito nesta peneira.");
}

// Verifica limite de vagas
$sql = "SELECT COUNT(*) AS total FROM Peneira_has_Pessoa WHERE Peneira_idPeneira = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$idPeneira]);
$totalInscritos = $stmt->fetchColumn();

$sql = "SELECT Vagas FROM Peneira WHERE idPeneira = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$idPeneira]);
$vagas = $stmt->fetchColumn();

if ($totalInscritos >= $vagas) {
    die("Limite de vagas atingido.");
}

// Insere inscrição
$sql = "INSERT INTO Peneira_has_Pessoa (Peneira_idPeneira, Pessoa_idPessoa) VALUES (?, ?)";
$stmt = $pdo->prepare($sql);
$stmt->execute([$idPeneira, $idUsuario]);

echo "Inscrição realizada com sucesso.";