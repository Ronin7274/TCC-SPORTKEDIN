document.getElementById("loginForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Evita recarregar a página

    let email = document.getElementById("email").value;
    let password = document.getElementById("password").value;

    if (email === "" || password === "") {
        alert("Por favor, preencha todos os campos!");
        return;
    }

    if (!email.includes("@") || !email.includes(".")) {
        alert("Digite um e-mail válido!");
        return;
    }

    alert("Login bem-sucedido!");
    // Aqui você pode redirecionar o usuário ou fazer outra ação
});
function buscarCep() {
    let cep = document.getElementById("cep").value;

    if (cep.length !== 8 || isNaN(cep)) {
        alert("Por favor, digite um CEP válido com 8 números.");
        return;
    }

    let url = `https://viacep.com.br/ws/${cep}/json/`;

    fetch(url)
        .then(response => response.json())
        .then(data => {
            if (data.erro) {
                document.getElementById("resultado").innerHTML = "CEP não encontrado.";
            } else {
                document.getElementById("resultado").innerHTML = `
                    <p><strong>CEP:</strong> ${data.cep}</p>
                    <p><strong>Rua:</strong> ${data.logradouro}</p>
                    <p><strong>Bairro:</strong> ${data.bairro}</p>
                    <p><strong>Cidade:</strong> ${data.localidade} - ${data.uf}</p>
                `;
            }
        })
        .catch(error => {
            console.error("Erro ao buscar o CEP:", error);
            document.getElementById("resultado").innerHTML = "Erro ao buscar o CEP.";
        });
}