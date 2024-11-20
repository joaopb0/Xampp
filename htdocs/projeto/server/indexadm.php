<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>indexadm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../stylesheet/stylesheets.css">
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid menuindex">
    <a class="navbar-brand indexpesquisar" href="#">Pesquisar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Página Inicial</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contato</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Acesso Administrativo
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="../client/adminpage.php">Acesso Administrativo</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
</header>
<section>
    <div class="container min-vh-100 d-flex flex-column justify-content-center align-items-center">
      <div class="row justify-content-center">
        <div class="col-md-6 mb-3">
        <a href="indexinsert.php"><button type="button" class="btn btn-success btn-block">Inserir</button></a>
        </div>
        <div class="col-md-6">
          <a href="viewadm.php"><button type="button" class="btn btn-warning btn-block">Visualizar</button></a>
        </div>
      </div>
    </div>
  </section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>   
</body>
</html>