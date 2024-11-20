<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial</title>
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
          <a class="nav-link" href="#">Catálogo</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contato</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Acesso Administrativo
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="adminpage.php">Acesso Administrativo</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
    </header>
    <section>
        <div class="containerindex">
        <h5 class="listalateralindex">
        <p><a href="adesivos.php">Adesivos</a></p>
        <p><a href="blocos.php">Blocos</a></p>
        <p><a href="brindes.php">Brindes</a></p>
        <p><a href="caixas.php">Caixas</a></p>
        <p><a href="calendarios.php">Calendários</a></p>
        <p><a href="canecas.php">Canecas</a></p>
        <p><a href="cards.php">Cards</a></p>
        <p><a href="cartoes.php">Cartões</a></p>
        <p><a href="comandas.php">Comandas</a></p>
        <p><a href="copias.php">Cópias e Encadernações</a></p>
        <p><a href="panfleto.php">Panfletos</a></p>
        <p><a href="papelseda.php">Papéis Seda</a></p>
        <p><a href="presentes.php">Presentes</a></p>
        <p><a href="sacolas.php">Sacolas</a></p>
        <p><a href="tags.php">Tags</a></p>
        <p><a href="valepresente.php">Vale Presentes</a></p>
        </h5>
        </div>
    </section>
    <div class="containercard">
        <?php
        include '../dbconfig/bancoprodutos.php';

        $cardsPorPagina = 9;
        $cardsPorLinha = 3;
        $contadorCards = 0;

        $sql = "SELECT nome_produto, descricao_produto, quant_1, valor_1, imagem FROM produtos";
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            $totalCards = $result->num_rows;
            $totalPaginas = ceil($totalCards / $cardsPorPagina);

            for ($pagina = 1; $pagina <= $totalPaginas; $pagina++) {
                echo '<div class="row row-cols-' . $cardsPorLinha . ' g-4">';
                
                for ($i = 0; $i < $cardsPorPagina; $i++) {
    $row = $result->fetch_assoc();

    if (!$row) {
        break;  
    }

    echo '<div class="col">';
    echo '<div class="card" style="width: 18rem;">';
    
    echo '<img src="/projeto/img/' . $row['imagem'] . '" class="card-img-top img-fluid" alt="Imagem do Produto" style="max-width: 100%;">';
    
    echo '<div class="card-body">';
    echo '<h5 class="card-title">' . $row['nome_produto'] . '</h5>';
    echo '<p class="card-text">' . $row['descricao_produto'] . '</p>';
    echo '<p class="card-text">Quantidade: ' . $row['quant_1'] . '</p>';
    echo '<p class="card-text">Valor: ' . $row['valor_1'] . '</p>';
    echo '<a href="contato.php" class="btn btn-primary">Orçamento</a>';
    echo '</div></div>';
    echo '</div>';

    $contadorCards++;
}

                echo '</div>';
            }
        } else {
            echo 'Nenhum produto encontrado.';
        }

        $conn->close();
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>