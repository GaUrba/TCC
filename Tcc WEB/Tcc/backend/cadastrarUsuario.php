<?php

if ($_SERVER["REQUEST_METHOD"] !== 'POST') {
    header('Location: ../cadastro.php');
    exit();
}

include("conexao.php");

session_start();

try { 
    $nome = $_POST["nome"];           
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $confirmar_senha = $_POST["confirmar_senha"];
    $cpf = $_POST["cpf"];  

    if (
        (trim($nome) == "") || 
        (trim($email) == "") ||
        (trim($senha) == "") ||
        (trim($confirmar_senha) == "") ||
        (trim($cpf == ""))
    ) {
        $_SESSION["mensagem-de-erro"] = "Preencha todos os campos!";
        header('Location: ../cadastro.php');
        exit();
    } else if ($senha != $confirmar_senha){
        $_SESSION["mensagem-de-erro"] = "Senhas estão diferentes.";
        header('Location: ../cadastro.php');
        exit();
    } else {
        $stmt = $pdo->prepare("select * from usuario where email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $result = $stmt->fetch();

        if ($result) {
            $_SESSION["mensagem-de-erro"] = "E-mail já está em uso!";
            header('Location: ../cadastro.php');
            exit();
        }

        $stmt = $pdo->prepare("select * from usuario where cpf = :cpf");
        $stmt->bindParam(':cpf', $cpf);
        $stmt->execute();

        $result = $stmt->fetch();

        if ($result) {
            $_SESSION["mensagem-de-erro"] = "CPF já está em uso!";
            header('Location: ../cadastro.php');
            exit();
        }

        $hashSenha = password_hash($senha, PASSWORD_DEFAULT);

        $stmt = $pdo->prepare("insert into usuario (nome, email, senha, cpf) values(:nome, :email, :senha, :cpf)");
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $hashSenha);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->execute();

        $_SESSION["mensagem-de-sucesso"] = "Cadastrado com sucesso!";
        header('Location: ../cadastro.php');
        exit();
    }

} catch(PDOException $e) {
    echo 'Error: ' . $e->getMessage();
    die();
}