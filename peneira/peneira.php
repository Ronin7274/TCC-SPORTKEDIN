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
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome_peneira = $_POST["nome_peneira"];
        $data_peneira = $_POST["data_peneira"];
        $fechamento_peneira = $_POST["fechamento_peneira"];
        $texto_peneira = $_POST["texto_peneira"];
        //garante que o numero recebido seja inteiro
        $vagas_peneira = intval($_POST["vagas_peneira"]);
        $vagas = 1;//[];
        //cria o array de 1 até o número digitado
        //for ($i = 1; $i <= $vagas_peneira; $i++) {
            //$vagas[] = $i;
        //}
        //echo "nome: $nome_peneira, data: $data_peneira, fechamento: $fechamento_peneira, vagas: $vagas_peneira";
    }
    ?>

    <label class="teste_peneira"><?php echo "$nome_peneira"; ?></label>
    <div>
        <!--data de acontecimento da peneira-->
        <label class="teste_peneira">Horario da peneira</label>
        <input type="datetime-local" readonly class="teste_peneira" value="<?php echo "$data_peneira"; ?>">
        <!--data fechamento peneira-->
        <label class="teste_peneira">Horario de fechamento das inscricoes</label>
        <input type="datetime-local" readonly  class="teste_peneira" value="<?php echo "$fechamento_peneira"; ?>">
        <!--arrey que deve mostrar a quantidade total de vagas e a quantidade preenchidas-->
        <label class="teste_peneira">Quantidade de vagas</label>
        <input type="number" readonly class="teste_peneira" value="<?php echo $vagas . ' ' . $vagas_peneira; ?>">
    </div>

    <div>
        <label class="teste_peneir">Descrição</label>
        <input readonly type="text" value="<?php echo "$texto_peneira" ?>">
    </div>



<!--css basico apenas para destacar os elementos de teste-->
    <style>
        .teste_peneira {
            color: red;
        }
    </style>




</body>

</html>