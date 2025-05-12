<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Menu com Bootstrap</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="styleMenu.css?v=1" rel="stylesheet">
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar" style="background-color:rgb(0, 0, 0);" data-bs-theme="light">
    <div class="container-fluid">
      <a class="navbar-brand text-white" href="#">SPORTALENT</a>
      <button class="navbar-toggler" type="button" id="sidebarToggle">
        <span class="navbar-toggler-icon"></span>
      </button>
      
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link text-white" href="peneira.php">Peneiras</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="perfil.php">Perfil</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Sidebar -->
  <div id="sidebar" style="position: fixed; top: 0; right: -250px; width: 250px; height: 100%; background-color: black; color: white; transition: right 0.3s; padding-top: 60px;">
    <a class="d-block text-white p-2" href="peneira.php">Peneiras</a>
    <a class="d-block text-white p-2" href="perfil.php">Perfil</a>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Sidebar Toggle Script -->
  <script>
    document.getElementById('sidebarToggle').addEventListener('click', function() {
      var sidebar = document.getElementById('sidebar');
      sidebar.style.right = sidebar.style.right === '0px' ? '-250px' : '0px';
    });
  </script>

</body>
</html>
