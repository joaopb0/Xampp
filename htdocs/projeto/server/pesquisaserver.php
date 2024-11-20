<?php
include '../dbconfig/bancoprodutos.php';

$termoPesquisa = isset($_GET['termo']) ? $_GET['termo'] : '';

$sql = "SELECT * FROM produtos WHERE descricao_produto LIKE ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $termoPesquisa);
$stmt->execute();
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
} else {
    echo "Erro ao obter resultados.";
}

$stmt->close();
$conn->close();
?>