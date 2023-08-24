<?php

if ($_SERVER["REQUEST_METHOD"] !== 'POST') {
    header('Location: ../login.php');
    exit();
}

include("conexao.php");

session_start();

try {
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    if ((trim($email) == "") || (trim($senha) == "")) {
        $_SESSION["mensagem-de-login"] = "Senha ou e-mail incorretos!";
        header('Location: ../login.php');
        exit();
    } else {
        $stmt = $pdo->prepare("select * from usuario where email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $result = $stmt->fetch();

        if (!$result) {
            $_SESSION["mensagem-de-login"] = "Senha ou e-mail incorretos!";
            header('Location: ../login.php');
            exit();
        }

        if (!password_verify($senha, $result["senha"])) {
            $_SESSION["mensagem-de-login"] = "Senha ou e-mail incorretos!";
            header('Location: ../login.php');
            exit();
        }

        $_SESSION["id_usuario_logado"] = $result["id"];
        $_SESSION["nome_usuario_logado"] = $result["nome"];
    }

    if (isset($_SESSION["redirecionar_para"])) {
        $redirecionarParaAPagina = $_SESSION["redirecionar_para"];
        unset($_SESSION["redirecionar_para"]);
        header('Location: ../' . $redirecionarParaAPagina);
    } else {
        header('Location: ../login.php');
    }

} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
    die();
}
