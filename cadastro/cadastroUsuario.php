<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="cadastro.css?v=1">

</head>
<body class="d-flex justify-content-center align-items-center vh-100" style="background-color: #f4f4f4;">

    <!-- Função para ver se as senhas são iguais -->
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
        <form id="formCadastro" onsubmit="senhaOK()" action="salvarUsuario.php">
            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input type="text" id="nome" class="form-control" required>
           
           
                <label for="CPF" class="form-label">CPF</label>
                <input type="text" id="cpf" class="form-control" required>

                <label for="rg" class="form-label">RG</label>
                <input type="text" id="rg" class="form-control" required>
            
            
                <label for="telefone" class="form-label">Telefone</label>
                <input type="text" id="telefone" class="form-control" required>
            

            
                <label for="endereco" class="form-label">Endereço</label>
                <input type="text" id="endereco" class="form-control" required>

            
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
            Já tem uma conta? <a href="../index.php">Faça login</a>
            <!--direciona o usuario para o caminho indicado no href. O "../" serve para mandar o usuario para a pasta anterior-->
        </p>
    </div>
</body>
</html>
