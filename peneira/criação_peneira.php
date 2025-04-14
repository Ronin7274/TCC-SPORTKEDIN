<!--aba reservada para o clube que irá criar a peneira colocando suas informações que serão passadas para a pagina da peneira-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>criação da peneira</title>
</head>
<body>
    <form method="POST" action="peneira.php">
        <!--campo onde será definido o nome da peneira-->
        <div class="div-nome-peneira">
            <label for="nome-peneira" class="label-nome-peneira">Nome Peneira</label>
            <input type="text" class="input-nome-peneira" name="nome_peneira" id="nome-peneira" placeholder="Nome da Peneira">
        </div>
        <!--campo onde será definida data de acontecimento da peneira-->
        <div calss="div-data-peneira">
            <label for="data-peneira" class="label-data-peneira">data do evento</label>
            <input type="datetime-local" class="input-data-peneira" name="data_peneira" id="nome-peneira">
        </div>
        <!--campo onde será definida a data de fechamento da peneira-->
        <div class="div-data-fechamento-peneira">
            <label for="data-fechamento-peneira" class="label-data-peneira">Data de fechamento da peneira</label>
            <input type="datetime-local" class="input-data-fechamento-peneira" name="fechamento_peneira" id="data-fechamento-peneira">
        </div>
        <!--campo onde será definida a quantidade de vagas da peneira-->
        <div class="div-vagas-peneira">
            <label for="vagas-peneira" class="label-vagas-peneira">Numero de vagas da peneira</label>
            <input type="number" class="input-vagas-peneira" name="vagas_peneira" id="vagas-peneira">
        </div>
        <!--campo onde será definido o texto de descrição da peneira-->
        <div class="div-texto-peneira">
            <label for="texto-peneira" class="label-texo-peneira"></label>
            <input type="text" class="input-texto-peneira" name="texto_peneira" id="texto-peneira" placeholder="Descrição da peneira">
        </div>
        <button type="submit" name="criar-peneira" class="criar-peneira">Criar peneira</button>
    </form>
</body>
</html>