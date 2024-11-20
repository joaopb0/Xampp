<?php
include '../dbconfig/bancoprodutos.php';

$nome_produto = $_POST['nome_produto'] ?? '';
$descricao_produto = $_POST['descricao_produto'] ?? '';
$quant_1 = $_POST['quant_1'] ?? '';
$valor_1 = $_POST['valor_1'] ?? '';
$quant_2 = $_POST['quant_2'] ?? '';
$valor_2 = $_POST['valor_2'] ?? '';
$quant_3 = $_POST['quant_3'] ?? '';
$valor_3 = $_POST['valor_3'] ?? '';
$quant_4 = $_POST['quant_4'] ?? '';
$valor_4 = $_POST['valor_4'] ?? '';
$quant_5 = $_POST['quant_5'] ?? '';
$valor_5 = $_POST['valor_5'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_FILES['imagem']['error'] === 0) {
        $fileName = $_FILES['imagem']['name'];
        $tmpName = $_FILES['imagem']['tmp_name'];
        $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/projeto/img/';
        $uploadPath = $uploadDir . $fileName;

        if (move_uploaded_file($tmpName, $uploadPath)) {
            $sql = $conn->prepare("INSERT INTO produtos (nome_produto, descricao_produto, imagem, quant_1, valor_1, quant_2, valor_2, quant_3, valor_3, quant_4, valor_4, quant_5, valor_5) 
                                  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

            if ($sql) {
                $sql->bind_param("sssssssssssss", $nome_produto, $descricao_produto, $fileName, $quant_1, $valor_1, $quant_2, $valor_2, $quant_3, $valor_3, $quant_4, $valor_4, $quant_5, $valor_5);

                if ($sql->execute()) {
                    echo "Registro inserido com sucesso";
                } else {
                    echo "Erro ao inserir registro: " . $sql->error;
                }

                $sql->close();
            } else {
                echo "Erro ao preparar a query: " . $conn->error;
            }
        } else {
            echo "Erro ao fazer o upload da imagem.";
        }
    } else {
        echo 'Imagem não foi selecionada ou ocorreu um erro no upload.';
    }
}

$conn->close();
?>



