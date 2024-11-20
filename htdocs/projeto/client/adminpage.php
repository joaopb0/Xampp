<?php
    session_start();

    if (isset($_SESSION["usuario"])) {
        header("Location: ../server/indexadm.php");
        exit();
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $usuario = $_POST["usuario"];
        $senha = $_POST["senha"];

        if ($result->num_rows > 0) {

            $_SESSION["usuario"] = $usuario;
            $_SESSION["login_time"] = time();

            header("Location: ../server/indexadm.php");
            exit();
        } else {
            echo "Credenciais inválidas. Por favor, tente novamente.";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../stylesheet/stylesheets.css">
</head>
<body>
    <div>
    <form class="container min-vh-100 d-flex flex-column justify-content-center align-items-center" action="../server/loginadm.php" method="post">
        <h1>Login</h1>
        <div class="inputbox">
            <input type="text" name="usuario" placeholder="Usuário">
        </div>
        <div class="inputbox">
            <input type="password" name="senha" placeholder="Senha">
        </div>
        <button type="submit" class="btn btn-primary">Entrar</button>
    </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>