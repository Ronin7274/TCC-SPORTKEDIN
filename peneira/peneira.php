<!--pagina que recebera as informações da criação da peneira e será de livre acesso para os jogadores-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["nome_jogador"])) {
            $_SESSION["inscritos"][] = $_POST["nome_jogador"];
            header("Location: " . $_SERVER["PHP_SELF"]); //header("Location: ...") redireciona o navegador para a mesma página (PHP_SELF), mas com método GET.
            // redireciona para limpar o POST para evitar varios reenvios e resubmissões da inscrição
            exit;
        }
        // Salva os dados da peneira na sessão para que eles não sejam perdidos ao reenviar o formulario
        else {
            $_SESSION["nome_peneira"] = $_POST["nome_peneira"];
            $_SESSION["data_peneira"] = $_POST["data_peneira"];
            $_SESSION["fechamento_peneira"] = $_POST["fechamento_peneira"];
            $_SESSION["texto_peneira"] = $_POST["texto_peneira"];
            $_SESSION["vagas_peneira"] = intval($_POST["vagas_peneira"]);
            $_SESSION["inscritos"] = [];
        }
    }

    // Dados da peneira carregados da sessão
    $nome_peneira = $_SESSION["nome_peneira"];
    $data_peneira = $_SESSION["data_peneira"];
    $fechamento_peneira = $_SESSION["fechamento_peneira"];
    $texto_peneira = $_SESSION["texto_peneira"];
    $vagas_peneira = $_SESSION["vagas_peneira"];
    $vagas = isset($_SESSION["inscritos"]) ? count($_SESSION["inscritos"]) : 0;

    /* 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome_peneira = $_POST["nome_peneira"];
        $data_peneira = $_POST["data_peneira"];
        $fechamento_peneira = $_POST["fechamento_peneira"];
        $texto_peneira = $_POST["texto_peneira"];
        //garante que o numero recebido seja inteiro
        $vagas_peneira = intval($_POST["vagas_peneira"]);
        $vagas = [];
        //cria o array de 1 até o número digitado
        for ($i = 1; $i <= $vagas_peneira; $i++) {
            $vagas[] = $i;
        }
        //echo "nome: $nome_peneira, data: $data_peneira, fechamento: $fechamento_peneira, vagas: $vagas_peneira";
    }*/
    ?>

    <h2 class="teste_peneira"><?php echo "$nome_peneira"; ?></h2>
    <div>
        <!--data de acontecimento da peneira-->
        <label class="teste_peneira">Horario da peneira</label>
        <input type="datetime-local" readonly class="teste_peneira" value="<?php echo "$data_peneira"; ?>">
        <!--data fechamento peneira-->
        <label class="teste_peneira">Horario de fechamento das inscricoes</label>
        <input type="datetime-local" readonly class="teste_peneira" value="<?php echo "$fechamento_peneira"; ?>">
        <!--arrey que deve mostrar a quantidade total de vagas e a quantidade preenchidas-->
        <label class="teste_peneira">Quantidade de vagas</label>
        <input type="text" readonly class="teste_peneira" value="<?php echo "$vagas" . "/" . "$vagas_peneira"; ?>">
    </div>

    <div>
        <label class="teste_peneira">Descrição</label>
        <input readonly type="text" class="teste_peneira" value="<?php echo "$texto_peneira" ?>">
    </div>

    <?php if ($vagas < $vagas_peneira): ?>
        <form method="POST">
            <input type="text" name="nome_jogador" placeholder="Seu nome" required>
            <button type="submit">Cadastrar-se</button>
        </form>
    <?php else: ?>
        <p><strong>Vagas esgotadas!</strong></p>
    <?php endif; ?>

    <h4>Inscritos:</h4>
    <ul>
        <?php
        if (!empty($_SESSION["inscritos"])) {
            foreach ($_SESSION["inscritos"] as $nome) {
                echo "<li>$nome</li>";
            }
        }
        ?>

        <!--
    <div>
        <button class="teste_peneira" type="submit">cadastras-se</button>
    </div>
-->


        <!--css basico apenas para destacar os elementos de teste-->
        <style>
            .teste_peneira {
                color: red;
            }
        </style>




</body>

</html>