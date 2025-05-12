<?php

    require_once '../conexao.php';

    $id = $_GET['id'] ?? null;

    if (!$id) {
        die("ID da peneira não informado.");
    }
    
    // Buscar peneira
    $sql = "SELECT * FROM Peneira WHERE idPeneira = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    $peneira = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if (!$peneira) {
        die("Peneira não encontrada.");
    }
    
    // Buscar inscritos
    $sql = "SELECT u.Nome FROM Usuario u
            INNER JOIN Peneira_has_Pessoa pp ON u.idUsuario = pp.Pessoa_idPessoa
            WHERE pp.Peneira_idPeneira = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    $inscritos = $stmt->fetchAll(PDO::FETCH_COLUMN);

    ?>


<!--pagina que recebera as informações da criação da peneira e será de livre acesso para os jogadores-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peneira</title>
</head>

<body>

<h1><?php echo htmlspecialchars($peneira['Nome']); ?></h1>
    <p><strong>Data e Horário:</strong> <?php echo htmlspecialchars($peneira['Horario']); ?></p>
    <p><strong>Fechamento das inscrições</strong> <?php echo htmlspecialchars($peneira['Horario_fechamento']) ?></p>
    <p><strong>Local:</strong> <?php echo htmlspecialchars($peneira['Local']); ?></p>
    <p><strong>Descrição:</strong> <?php echo nl2br(htmlspecialchars($peneira['Descricao'])); ?></p>

    <h2>Inscritos</h2>
    <?php if (count($inscritos) < $peneira['Vagas']): ?>
    <form action="inscrever.php" method="POST">
        <input type="hidden" name="idPeneira" value="<?php echo $id; ?>">
        <button type="submit">Inscrever-se</button>
    </form>
<?php else: ?>
    <p><strong>Limite de vagas atingido.</strong></p>
<?php endif; ?>

</body>

</html>