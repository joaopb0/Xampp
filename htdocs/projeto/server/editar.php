<?php
include '../dbconfig/bancoprodutos.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $conn->prepare("SELECT * FROM produtos WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $dados = $result->fetch_assoc();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $novosDados = [
                'nome_produto' => $_POST['nome_produto'],
                'descricao_produto' => $_POST['descricao_produto'],
                'quant_1' => $_POST['quant_1'],
                'valor_1' => $_POST['valor_1'],

            ];

            $updateStmt = $conn->prepare("UPDATE produtos SET nome_produto = ?, descricao_produto = ?, quant_1 = ?, valor_1 = ? WHERE id = ?");
            $updateStmt->bind_param("ssssi", $novosDados['nome_produto'], $novosDados['descricao_produto'], $novosDados['quant_1'], $novosDados['valor_1'], $id);

            if ($updateStmt->execute()) {

                header("Location: viewadm.php");
                exit(); 
            } else {
                echo "Erro ao atualizar o registro: " . $updateStmt->error;
            }

            $updateStmt->close();
        }
        ?>

        <!DOCTYPE html>
        <html lang="en">
        <head>

            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Editar Produto</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
            <link rel="stylesheet" href="../stylesheet/stylesheets.css">
        </head>
        <body>
            <header>

            </header>

            <section>
                <div class="formview">
                    <h5 class="textoview">
                        <h2>Editar Produto</h2>

                        <form method="post">
                            <label for="nome_produto">Nome do Produto:</label>
                            <input type="text" name="nome_produto" value="<?php echo $dados['nome_produto']; ?>" required>

                            <label for="descricao_produto">Descrição do Produto:</label>
                            <textarea name="descricao_produto" required><?php echo $dados['descricao_produto']; ?></textarea>

                            <label for="quant_1">Quantidade:</label>
                            <input type="text" name="quant_1" value="<?php echo $dados['quant_1']; ?>" required>

                            <label for="valor_1">Valor:</label>
                            <input type="text" name="valor_1" value="<?php echo $dados['valor_1']; ?>" required>

                            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                        </form>
                    </h5>
                </div>
            </section>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        </body>
        </html>

        <?php
    } else {
        echo "Registro não encontrado.";
    }

    $stmt->close();
} else {
    echo "ID inválido.";
}

$conn->close();
?>