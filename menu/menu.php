<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Menu com Bootstrap</title>
  <!-- Link para o CSS do Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- CSS customizado -->
  <style>
    /* Deixa todo o texto do body branco */
    body {
      color: white;
    }

    /* Estiliza os textos da navbar */
    .navbar .navbar-brand,
    .navbar .nav-link,
    .navbar .nav-link svg {
      color: white !important;
      fill: white !important; /* para o ícone SVG */
    }

    /* Efeito ao passar o mouse */
    .navbar .nav-link:hover,
    .navbar .navbar-brand:hover {
      color:rgb(0, 0, 0) !important;
    }
  </style>
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar" style="background-color:rgb(0, 0, 0);" data-bs-theme="light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Sportalent</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" href="#">Peneiras</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Perfil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center" href="#">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                   class="bi bi-gear-wide me-1" viewBox="0 0 16 16">
                <path d="M8.932.727c-.243-.97-1.62-.97-1.864 0l-.071.286a.96.96 0 0 1-1.622.434l-.205-.211c-.695-.719-1.888-.03-1.613.931l.08.284a.96.96 0 0 1-1.186 1.187l-.284-.081c-.96-.275-1.65.918-.931 1.613l.211.205a.96.96 0 0 1-.434 1.622l-.286.071c-.97.243-.97 1.62 0 1.864l.286.071a.96.96 0 0 1 .434 1.622l-.211.205c-.719.695-.03 1.888.931 1.613l.284-.08a.96.96 0 0 1 1.187 1.187l-.081.283c-.275.96.918 1.65 1.613.931l.205-.211a.96.96 0 0 1 1.622.434l.071.286c.243.97 1.62.97 1.864 0l.071-.286a.96.96 0 0 1 1.622-.434l.205.211c.695.719 1.888.03 1.613-.931l-.08-.284a.96.96 0 0 1 1.187-1.187l.283.081c.96.275 1.65-.918.931-1.613l-.211-.205a.96.96 0 0 1 .434-1.622l.286-.071c.97-.243.97-1.62 0-1.864l-.286-.071a.96.96 0 0 1-.434-1.622l.211-.205c.719-.695.03-1.888-.931-1.613l-.284.08a.96.96 0 0 1-1.187-1.186l.081-.284c.275-.96-.918-1.65-1.613-.931l-.205.211a.96.96 0 0 1-1.622-.434zM8 12.997a4.998 4.998 0 1 1 0-9.995 4.998 4.998 0 0 1 0 9.996z"/>
              </svg>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Script do Bootstrap (JS e Popper) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
