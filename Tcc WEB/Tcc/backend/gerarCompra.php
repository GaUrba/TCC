<?php

session_start();

include("conexao.php");

try { 
    $id_usuario = $_SESSION["id_usuario_logado"];          
    $id_produto = $_POST["id_produto"];
    $dataDaCompra = date("Y-m-d");
    $paginaAtual = $_POST["pagina_atual"];

    if ($_SERVER["REQUEST_METHOD"] !== 'POST') {
        header('Location: ../'. $paginaAtual);
        exit();
    }
    
    if (!isset($_SESSION["id_usuario_logado"])) {
        $_SESSION["redirecionar_para"] = $paginaAtual;
        header('Location: ../login.php');
        exit();
    }

    $stmt = $pdo->prepare("insert into compra (id_produto, id_usuario, data_compra) values(:id_produto, :id_usuario, :data_compra)");
    $stmt->bindParam(':id_produto', $id_produto);
    $stmt->bindParam(':id_usuario', $id_usuario);
    $stmt->bindParam(':data_compra', $dataDaCompra);
    $stmt->execute();

    $_SESSION["mensagem-de-sucesso"] = "Compra confirmada!";
    header('Location: ../'.$paginaAtual);
    exit();

} catch(PDOException $e) {
    echo 'Error: ' . $e->getMessage();
    die();
}