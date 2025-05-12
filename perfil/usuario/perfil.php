<?php
session_start();

// Verifica se o usuário está logado e se a sessão contém o tipo de usuário
if (!isset($_SESSION['tipo_usuario'])) {
  // Se não estiver logado, redireciona para a página de login
  header("Location: login.php");
  exit();
}

// Verifica se o tipo de usuário é 'usuario' ou 'clube' e inclui o perfil correspondente
if ($_SESSION['tipo_usuario'] === 'usuario') {
  // Redireciona para o perfil de usuário (atleta)
  header("Location: perfil_usuario.html");
  exit();
} elseif ($_SESSION['tipo_usuario'] === 'clube') {
  // Redireciona para o perfil do clube
  header("Location: perfil_clubes.html");
  exit();
} else {
  // Se o tipo de usuário for inválido, exibe uma mensagem de erro
  echo "Tipo de usuário inválido.";
}
?>
