<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="cadastro.css">
</head>
<body class="d-flex justify-content-center align-items-center vh-100" style="background-color: #f4f4f4;">
    <script>
        function confereSenha(){
            const senha = document.querySelector('input[name=senha]');
            const confirma = document.querySelector('input[name=confirma]');

            if (confirma.value === senha.value){
                confirma.setCustomValidity('');
            }else{
                confirma.setCustomValidity('as senhas não são iguais')
            }
        }
         function senhaOK(){
            alert("Senha iguais")
         }
    </script>

    <div class="card p-4 shadow-lg" style="width: 350px;">
        <h3 class="text-center mb-3">Cadastro</h3>
        <form id="formCadastro" onsubmit="senhaOK()" action="post">>
            <div class="mb-3">
                <label for="CNPJ" class="form-label">CNPJ</label>
                <input type="text" id="nome" class="form-control" required>
           
           
                <label for="CCF" class="form-label">Certificado de Clube Formador</label>
                <input type="text" id="nome" class="form-control" required>
            

            
                <label for="Estatuto" class="form-label">Estatuto</label>
                <input type="Estatuto" id="Estatuto" class="form-control" required>
            


            
                <label for="Nome" class="form-label">Nome</label>
                <input type="Nome" id="Nome" class="form-control" required>
            


            
                <label for="modalidade" class="form-label">Modalidade do clube</label>
                <input type="modalidade" id="modalidade" class="form-control" required>
            


            
                <h2>Consultar CEP</h2>
                <input type="text" id="cep" placeholder="Digite o CEP" maxlength="8">
                <button onclick="buscarCep()">Buscar</button>
                <div id="resultado"></div>
                <script src="script.js"></script>
                
            
            
                <label for="email" class="form-label">E-mail</label>
                <input type="email" id="email" class="form-control" required>
            

            
                <label for="senha" class="form-label">Senha</label>
                <input type="password" id="senha" class="form-control" name=senha required onchange='confereSenha();' required>

                <label for="confirmarsenha" class="form-label">Confirmar senha</label>
                <input type="password" id="conformarsenha" class="form-control" name=confirma required onchange='confereSenha();' required>


            </div>
            <button type="submit" class="btn btn-success w-100">Cadastrar</button>
        </form>
        <p class="text-center mt-3">
            Já tem uma conta? <a href="index.php">Faça login</a>
        </p>
    </div>
</body>
</html>
