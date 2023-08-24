<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DeLuxe Store</title>
  <link rel="icon" href="imagens/icon.jpeg">

  <link rel="stylesheet" href="styleCADASTRO.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/b5b2fc9c06.js" crossorigin="anonymous"></script>


</head>

<body style="background: white;">

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

        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Busque aqui" aria-label="Search">
          <button class="btn btn-outline-warning" type="submit">Buscar</button>
        </form>
      </div>
    </div>
  </nav>
  <!-- FIM NAVABAR -->

  <div class="bodyDISC">
    <div class="d-flex justify-content-center">
      <div class="containerDISC">
        <div class="headerDISC">
          CADASTRE-SE:
        </div>
        <form class="formDISC" id="form" method="post" action="backend/cadastrarUsuario.php">

          <?php if (isset($_SESSION["mensagem-de-erro"])){ ?>
            <div class="alert alert-danger" role="alert">
              <?php echo $_SESSION["mensagem-de-erro"]; ?>
              <?php unset($_SESSION["mensagem-de-erro"]); ?>
            </div>
          <?php } else if (isset($_SESSION["mensagem-de-sucesso"])){ ?>
            <div class="alert alert-success" role="success">
              <?php echo $_SESSION["mensagem-de-sucesso"]; ?>
              <?php unset($_SESSION["mensagem-de-sucesso"]); ?>
            </div>
          <?php } ?>

          <div class="form-controlDISC">

            <label for="username">Nome</label>
            <input type="text" id="username" name="nome">
            <i class="img-success"><img src="./imagens/success-icon.svg" alt=""></i>
            <i class="img-error"><img src="./imagens/error-icon.svg" alt=""></i>

            <small>Error Message</small>

          </div>

          <div class="form-controlDISC">

            <label>Email</label>
            <input type="email" id="email" name="email">
            <i class="img-success"><img src="./imagens/success-icon.svg" alt=""></i>
            <i class="img-error"><img src="./imagens/error-icon.svg" alt=""></i>

            <small>Error Message</small>

          </div>

          <div class="form-controlDISC">

            <label>Senha</label>
            <input type="password" id="password" name="senha">
            <i class="img-success"><img src="./imagens/success-icon.svg" alt=""></i>
            <i class="img-error"><img src="./imagens/error-icon.svg" alt=""></i>

            <small>Error Message</small>

          </div>

          <div class="form-controlDISC">

            <label>Confirme sua senha</label>
            <input type="password" id="password-two" name="confirmar_senha">
            <i class="img-success"><img src="./imagens/success-icon.svg" alt=""></i>
            <i class="img-error"><img src="./imagens/error-icon.svg" alt=""></i>

            <small>Error Message</small>

          </div>

          <div class="form-controlDISC">

            <label>CPF</label>
            <input type="text" id="cpf" name="cpf">
            <i class="img-success"><img src="./imagens/success-icon.svg" alt=""></i>
            <i class="img-error"><img src="./imagens/error-icon.svg" alt=""></i>

            <small>Error Message</small>

          </div>

          <button type="submit">ENVIAR</button>

        </form>
      </div>
    </div>
  </div>

  <div class="rodape">
    <div class="row">
      <div class="col colDesign">
        <div class="rdp-ds">DeLuxe Store</div>
        <div class="rdp-frase">A melhor para o seu bolso</div>
      </div>

      <div class="col colDesign">
        <div class="rdp-frase">Contate nossa equipe pelo email:</div>
        <div class="rdp-email">deluxetcc@gmail.com</div>
      </div>

    </div>
  </div>

  <script src="scriptCADASTRO.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>


</body>

</html>