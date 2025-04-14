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
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $nome_peneira = $_POST["nome_peneira"];
            $data_peneira = $_POST["data_peneira"];
            $fechamento_peneira = $_POST["fechamento_peneira"];
            $texto_peneira = $_POST["texto_peneira"];
            //garante que o numero recebido seja inteiro
            $vagas_peneira = intval($_POST["vagas_peneira"]); 
            $vagas = [];
            //cria o array de 1 até o número digitado
            for ($i = 1; $i <= $vagas_peneira; $i++){
                $vagas[] = $i;
            }
            echo "nome: $nome_peneira, data: $data_peneira, fechamento: $fechamento_peneira, vagas: $vagas_peneira";
        }

    ?>
</body>
</html>