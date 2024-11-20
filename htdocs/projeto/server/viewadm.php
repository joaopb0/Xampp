<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>view</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../stylesheet/stylesheets.css">
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid menuindex">

            <a id="mostrarPesquisa" class="navbar-brand indexpesquisar" href="#">Pesquisar</a>

            <form id="pesquisaForm" class="search-form" method="GET">
                <div class="mb-3">
                    <label for="termoPesquisa" class="form-label">Digite o termo de pesquisa:</label>
                    <input type="text" class="form-control" id="termoPesquisa" name="termo">
                </div>
                <button type="submit" class="btn btn-primary">Buscar</button>
            </form>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/projeto">Página Inicial</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contato</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Acesso Administrativo
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="client\adminpage.php">Acesso Administrativo</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

    <section>
        <div class="formview">
            <h5 class="textoview">

                <?php
                include '../dbconfig/bancoprodutos.php';

                $registrosPorPagina = 5;

                $paginaAtual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

                $offset = ($paginaAtual - 1) * $registrosPorPagina;

$sql = "SELECT * FROM produtos LIMIT ? OFFSET ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $registrosPorPagina, $offset);

$totalRegistros = $conn->query("SELECT COUNT(*) FROM produtos")->fetch_row()[0];

$totalPaginas = ceil($totalRegistros / $registrosPorPagina);

if ($stmt->execute()) {
    $result = $stmt->get_result();

    if ($result) {
        echo '<table class="table">';
        echo '<thead><tr><th scope="col">Nome do Produto</th><th scope="col">Descrição</th><th scope="col">Imagem</th></tr></thead><tbody>';

        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row['nome_produto'] . '</td>';
            echo '<td>' . $row['descricao_produto'] . '</td>';
            echo '<td><img src="/projeto/img/' . $row['imagem'] . '" alt="Imagem do Produto" style="max-width: 100px; max-height: 100px;"></td>';
            echo '<td><a href="editar.php?id=' . $row['id'] . '" class="btn btn-primary">Editar</a></td>';
            echo '<td><a href="excluir.php?id=' . $row['id'] . '" class="btn btn-danger">Excluir</a></td>';
            echo '</tr>';
        }

        echo '</tbody></table>';

        echo '<nav aria-label="Page navigation example">';
        echo '<ul class="pagination">';

        for ($i = 1; $i <= $totalPaginas; $i++) {
            echo '<li class="page-item"><a class="page-link" href="?pagina=' . $i . '">' . $i . '</a></li>';
        }

        echo '</ul></nav>';
    } else {
        echo "Erro ao obter resultados.";
    }
} else {
    echo "Erro ao executar a consulta.";
}

$stmt->close();
$conn->close();
?>

            </h5>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha384-oP6HI/tZ1aX+LbLO5yPZL1nMqDEJwqO8/MD85TOeH6HOjPZZ6Z7sL/Z9MW9vI1Ea" crossorigin="anonymous"></script>
    <script src="../script/pesquisaview.js"></script>
</body>
</html>
