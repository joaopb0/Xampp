<?php
include '../dbconfig/bancoprodutos.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $conn->prepare("DELETE FROM produtos WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {

        header("Location: ../server/viewadm.php");
        exit();
    } else {
        echo "Erro ao excluir o registro: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "ID inválido.";
}

$conn->close();
?>
