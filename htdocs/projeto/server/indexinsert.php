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
    <section class="indexadm">
        <form class="container" method="POST" action="insertadm.php" enctype="multipart/form-data">
        <div class="row mb-3">
                <div class="col-md-6">
                <label for="nome_produto" class="form-label text-primary">Tipo de produto</label>
                <select id="nome_produto" name="nome_produto" class="form-select" aria-label="Default select example">
                <option value="adesivos" >Adesivos</option>
                <option value="blocos"   >Blocos</option>
                <option value="brindes"  >Brindes</option>
                <option value="caixas"   >Caixas</option>
                <option value="calendarios" >Calendários</option>
                <option value="canecas" >Canecas</option>
                <option value="cards" >Cards</option>
                <option value="cartoes" >Cartões</option>
                <option value="comandas" >Comandas</option>
                <option value="copias" >Cópias</option>
                <option value="panfletos" >Panfletos</option>
                <option value="papelseda" >Papel Seda</option>
                <option value="presentes" >Presentes</option>
                <option value="sacolas" >Sacolas</option>
                <option value="tags" >Tags</option>
                <option value="valepresentes" >Vale-Presentes</option>
                </select>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                <label for="descricao_produto" class="form-label text-primary">Descrição do produto</label>
                <textarea id="descricao_produto" name="descricao_produto" class="form-control" rows="5"></textarea>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                <label for="quantidade_1" class="form-label text-primary">Quantidade</label>
                <input type="text" id="quant_1" name="quant_1" class="form-control">
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                <label for="valor_1" class="form-label text-primary">Valor</label>
                <input type="text" id="valor_1" name="valor_1" class="form-control">
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                <label for="quantidade_2" class="form-label text-primary">Quantidade2</label>
                <input type="text" id="quant_2" name="quant_2" class="form-control">
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                <label for="valor_2" class="form-label text-primary">Valor2</label>
                <input type="text" id="valor_2" name="valor_2" class="form-control">
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                <label for="quantidade_3" class="form-label text-primary">Quantidade3</label>
                <input type="text" id="quant_3" name="quant_3" class="form-control">
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                <label for="valor_3" class="form-label text-primary">Valor3</label>
                <input type="text" id="valor_3" name="valor_3" class="form-control">
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                <label for="quantidade_4" class="form-label text-primary">Quantidade4</label>
                <input type="text" id="quant_4" name="quant_4" class="form-control">
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                <label for="valor_4" class="form-label text-primary">Valor4</label>
                <input type="text" id="valor_4" name="valor_4" class="form-control">
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                <label for="quantidade_5" class="form-label text-primary">Quantidade5</label>
                <input type="text" id="quant_5" name="quant_5" class="form-control">
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                <label for="valor_5" class="form-label text-primary">Valor5</label>
                <input type="text" id="valor_5" name="valor_5" class="form-control">
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="imagem" class="form-label text-primary">Imagem do Produto</label>
                    <input type="file" id="imagem" name="imagem" class="form-control">
                </div>
            </div>
            <div>
            <button type="submit" class="btn btn-primary">Inserir</button>
            </div>
        </form>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>