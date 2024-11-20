<?php
    session_start();
    include '../dbconfig/loginadmquery.php';

    if (isset($_SESSION["usuario"])) {

        $tempoAtual = time();
        $tempoInicioSessao = $_SESSION["login_time"];
        $tempoExpiracao = 60 * 60;

        if (($tempoAtual - $tempoInicioSessao) > $tempoExpiracao) {

            session_unset();
            session_destroy();
            header("Location: ..server/loginadm.php");
            exit();
        } else {

            header("Location: ../server/indexadm.php");
            exit();
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $usuario = $_POST["usuario"];
        $senha = $_POST["senha"];

        $sql = "SELECT * FROM loginadmpass WHERE usuario = '$usuario' AND senha = '$senha'";
        $result = $conn->query($sql);

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


