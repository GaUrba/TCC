<?php

session_start();

/*
if (!isset($_SESSION["id_usuario_logado"])) {
  $_SESSION["redirecionar_para"] = "compra-mouse1.php";
  header('Location: login.php');
}*/

include("backend/conexao.php");

$produto = array();
$erro = false;

try {
    $id_produto = $_GET["id"];

    $stmt = $pdo->prepare("SELECT * FROM produto WHERE id = :id");
    $stmt->bindParam(":id", $id_produto);
    $stmt->execute();

    $result = $stmt->fetch();

    if (!$result) {
        $erro = true;
    } else {
        $produto = $result;
    }
} catch (Exception $e) {
    echo "Houve um erro ao tentar carregar a página";
    die();
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DeLuxe Store</title>
    <link rel="icon" href="imagens/icon.jpeg">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <script src="https://kit.fontawesome.com/b5b2fc9c06.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="styleCOMPRA.css">

</head>

<body>

    <!-- INICIO NAVBAR -->
    <nav class="navbar navbar-expand-lg bg-dark">
        <div class="container-fluid">

            ||

            <a class="navbar-brand" href="#"><img src="imagens/gat22.png" width="55" height="50"></a>
            <!--<a class="navbar-brand" href="#">DeLuxe</a>-->

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    <li class="nav-item">
                        <a class="nav-link active" style="color: white;" aria-current="page" href="index.php"><strong>HOME</strong></a>
                    </li>

                    <li class="nav-item">
                        |
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" style="color: white;" href="sac.html">SAC</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="store.html" style="color: white;">STORE</a>
                    </li>

                </ul>

                <div>
                </div>

                <ul class="mb-2 mb-lg-0">

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: white;">
                            Usuário
                        </a>
                        <?php if (isset($_SESSION["id_usuario_logado"])) : ?>
                            <ul class="dropdown-menu text-center" aria-labelledby="navbarDropdown">
                                <span class="my-4" style="font-weight: bolder;"><?php echo $_SESSION["nome_usuario_logado"]; ?></span>
                                <li>
                                    <form id="formLogou" method="POST" action="backend/logout.php">
                                        <input type="hidden" id="pagina_atual_logout" name="pagina_atual_logout" value="index.php" />
                                        <button class="btn btn-danger w-75">Sair</button>
                                    </form>
                                </li>
                            </ul>
                        <?php else : ?>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="cadastro.php">Cadastrar</a></li>
                                <li><a class="dropdown-item" href="login.php">Entrar</a></li>
                            </ul>
                        <?php endif; ?>
                    </li>

                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Busque aqui" aria-label="Search">
                    <button class="btn btn-outline-warning" type="submit">Buscar</button>
                </form>
            </div>
        </div>
    </nav>
    <!-- FIM NAVABAR -->

    <div class="container-prod-desc">

        <?php if (isset($_SESSION["mensagem-de-erro"])) { ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $_SESSION["mensagem-de-erro"]; ?>
                <?php unset($_SESSION["mensagem-de-erro"]); ?>
            </div>
        <?php } else if (isset($_SESSION["mensagem-de-sucesso"])) { ?>
            <div class="alert alert-success" role="success">
                <?php echo $_SESSION["mensagem-de-sucesso"]; ?>
                <?php unset($_SESSION["mensagem-de-sucesso"]); ?>
            </div>
        <?php } ?>

        <div class="desc">DESCRIÇÃO: </div>

        <div class="w-100">
            <h3>
                <?php echo $produto["nome"]; ?>
            </h3>

            <p>
                <?php echo $produto["descricao"]; ?>
            </p>
        </div>
    </div>

    <div class="container-prod-inf">
        <div class="row align-items-center">
            <div class="col">
                ITEM
            </div>
            <div class="col">
                PREÇO
            </div>
        </div>
    </div>

    <div class="container-prod-det">
        <div class="row align-items-center">
            <div class="col">
                <img src="data:image/png;base64,<?php echo base64_encode($produto["imagem"]); ?>" style="width: 200px;">
            </div>
            <div class="col">
                R$ <?php echo str_replace(".", ",", $produto["preco"]); ?>
            </div>
        </div>
    </div>

    <div class="container-prod-button">
        <form id="formGerarPagamento" method="post" action="backend/gerarCompra.php">
            <input type="hidden" id="id_produto" name="id_produto" value="<?php echo $id_produto; ?>" />
            <input type="hidden" id="pagina_atual" name="pagina_atual" value="compra-produto.php?id=<?php echo $id_produto; ?>" />
            <button type="submit" class="btn btn-warning" style="height: 45px; width: 200px; font-size: 16px;">GERAR PAGAMENTO</button>
        </form>
    </div>


    <div class="container-prod-baixo"><a href="index.php">Voltar</a></div>

    <br>
    <p></p>
    <div class="rodape">
        <div class="row rowMOD">
            <div class="col">
                <div class="rdp-ds">DeLuxe Store</div>
                <div class="rdp-frase">A melhor para o seu bolso</div>
            </div>

            <div class="col">
                <div class="rdp-frase">Contate nossa equipe pelo email:</div>
                <div class="rdp-email">deluxetcc@gmail.com</div>
            </div>

        </div>
    </div>

    <script src="scriptCOMPRA.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>

</body>

</html>