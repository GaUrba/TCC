<?php

session_start();

include("backend/conexao.php");

$produtos = array();

try {
  $stmt = $pdo->prepare("SELECT * FROM produto");
  $stmt->execute();

  $result = $stmt->fetchAll();

  if ($result) {
    $produtos = $result;
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

  <link rel="stylesheet" type="text/css" href="styleINDEX.css">
  <script src="scriptINDEX.js" defer></script>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/b5b2fc9c06.js" crossorigin="anonymous"></script>

  <script type="text/javascript">

  </script>

  <style type="text/css">
    .btnCor {
      background-color: #efefef;
      margin: 0;
      padding: 0;
      width: 100%;
      /*margin-left: 20px;
      margin-right: 20px;*/
    }

    .btnComprar {
      float: right;
      background-color: #fc5501;
      margin: 20px;
      color: white;
      font-size: large;
      font-weight: 500;
      width: 200px;
    }

    .btnFim {
      padding: 5px;
      font-size: large;
      font-weight: 500;
    }
  </style>

</head>

<body onload="configPagina();">

  <!-- INICIO NAVBAR -->
  <nav class="navbar fixed-top navbar-expand-lg bg-dark">
    <div class="container-fluid">

      ||

      <a class="navbar-brand" href="Deluxe-in-Space/index.html"><img src="imagens/gat22.png" width="55" height="50"></a>
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


  <!-- INICIO CARROUSEL-->

  <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">

    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>


    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="imagens/back/backful.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5 style="color: white; text-shadow:  #0190ce 0.2em 0.2em 0.2em; font-size: xx-large;">MONTE SEU SETUP GAMER
          </h5>
          <p style="text-shadow: 0.1em 0.1em 0.2em black; font-size: large;">Um combo de ofertas imperdiveis está no ar!
          </p>
        </div>
      </div>


      <div class="carousel-item">
        <img src="imagens/back/LINDO.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5 style="color: white; text-shadow:  #0190ce 0.2em 0.2em 0.2em; font-size: xx-large;">MONTE SEU SETUP GAMER
          </h5>
          <p style="text-shadow: 0.1em 0.1em 0.2em black; font-size: large;">Um combo de ofertas imperdiveis está no ar!
          </p>
        </div>
      </div>

      <div class="carousel-item">
        <img src="imagens/back/alinha.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5 style="color: white; text-shadow:  #0190ce 0.2em 0.2em 0.2em; font-size: xx-large;">MONTE SEU SETUP GAMER
          </h5>
          <p style="text-shadow: 0.1em 0.1em 0.2em black; font-size: large;">Um combo de ofertas imperdiveis está no ar!
          </p>
        </div>
      </div>


    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  </div>

  <!-- FIM CARROUSEL -->


  <!-- INICIO CONTAINER -->

  <div class="acima-produtos">
    <p>
    <div class="promo">A PROMOÇÃO TERMINA EM:⠀</div>

    <div class="timer">
      <p id="demo"></p>
    </div>
    </p>
    <script>
      // Set the date we're counting down to
      var countDownDate = new Date("September 2, 2022 00:00:00").getTime();

      // atualizar a contagem a cada 1 segundo
      var x = setInterval(function() {

        // pegar data e hora de hoje
        var now = new Date().getTime();

        // Achar a distância entre agora e a data de contagem
        var distance = countDownDate - now;

        // cálculo de tempo pra dias, horas, minutos e segundos
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Output the result in an element with id="demo"
        document.getElementById("demo").innerHTML = days + "d " + hours + "h " +
          minutes + "m " + seconds + "s ";

        // If the count down is over, write some text 
        if (distance < 0) {
          clearInterval(x);
          document.getElementById("demo").innerHTML = "EXPIRED";
        }
      }, 1000);
    </script>

    <p>
    <div class="destaque">Destaques: </div> <span></span>
    <div class="frase-destaque"> Os produtos mais pesquisados por vocês com descontos incríveis para você não ficar de
      fora e poder explorar o seu potencial ao máximo! </div>
    </p>

  </div>

  <!--INICIO BOX-->
  <div id="det-mouse">
    <div class="box-produto">

      <div class="meu-container">
        <div class="row">
          <div class="col colDesign">
            <p>
            <div class="carroselMOUSE">
              <div class="containerquadrado" id="imgCarro">
                <img src="imagens/produtos/mouse1.png">
                <img src="imagens/produtos/mouse2.jpg">
                <img src="imagens/produtos/mouse3.jpg">
                <img src="imagens/produtos/mouse4.jpg">
                <img src="imagens/produtos/mouse5.jpg">
              </div>
            </div>
            </p>
          </div>

          <div class="col colDesign">
            <p>
            <div class="titulo">Características: </div>
            <div class="descricao">
              <div>- Marca: Redragon</div>
              <div>- Modelo: M711 V2</div>
            </div>
            <p></p>
            <div class="titulo">Especificações:</div>
            <div class="descricao">
              <div>- Sensor PIXART 3327 para Alta Performance (12400DPI/20G/100ips) (óptico)</div>
              <div>- Iluminação RGB Ajustável: Sistema de Iluminação Chroma RGB! (7 Diferentes Modos de Iluminação)
              </div>
              <div>- Polling Rate de 1000hz (Tempo de Resposta Ajustável via Software de 1/2/4/8ms)</div>
              <div>- Comprimento: 1.8 metros</div>
              <div>- 2 Botões Laterais para funções / atalhos, macros e etc</div>
              <div>- Compatível com Software para Configuração de Macro / Ajuste Iluminação RGB / Configurações de
                Performance</div>
              <div>- Memória Interna para Salvamento de Configurações</div>
              <div>- 5 Perfis de Configurações para Troca Rápida de Configurações de um Game para Outro</div>
              <div>- Cabo Trançado para maior Resistência</div>
            </div>
            <a href="compra-mouse1.html" class="ex2 btnNet third">COMPRAR</a>
          </div>
        </div>
        </p>
      </div>


    </div>
  </div>


  <div class="meu-container">

    <div id="det-gabinete">
      <div class="box-produto">

        <div class="row">
          <div class="col colDesign">
            <p>
            <div class="carroselGAB">
              <div class="containerquadrado" id="imgGAB">
                <img src="imagens/produtos/gabinete1.png">
                <img src="imagens/produtos/gabinete2.jpg">
                <img src="imagens/produtos/gabinete3.jpg">
                <img src="imagens/produtos/gabinete4.jpg">
                <img src="imagens/produtos/gabinete5.jpg">
                <img src="imagens/produtos/gabinete6.jpg">
              </div>
            </div>
            </p>
          </div>

          <div class="col colDesign">
            <p>
            <div class="titulo">Características: </div>
            <div class="descricao">
              <div>- Marca: Rise</div>
              <div>- Modelo: RM-CA-06-FB</div>
            </div>
            <p></p>
            <div class="titulo">Especificações:</div>
            <div class="descricao">
              <div>- Cor: Preto</div>
              <div>- Fans: Suporte para 6 fans (fans não inclusos)</div>
              <div>- HD Áudio Entrada e Saída</div>
              <div>- Fontes de Alimentação: ATX (não inclusa)</div>
            </div>
            <p></p>
            <div class="titulo">Baias:</div>
            <div class="descricao">
              <div>- 1x 3.5” HDD</div>
              <div>- 2x 2.5” SSD</div>
              <div>- Slots de Expansão:</div>
            </div>
            <p></p>
            <div class="titulo">Placa-Mãe:</div>
            <div class="descricao">
              <div>- ATX</div>
              <div>- M-ATX</div>
              <div>- ITX</div>
            </div>
            <a href="#" class="ex2 btnNet third">COMPRAR</a>
          </div>
        </div>
        </p>
      </div>


    </div>
  </div>

  </div>


  <div class="meu-container">

    <div id="det-processador">
      <div class="box-produto">
        <div class="row">
          <div class="col colDesign">
            <p>
            <div class="carroselPROC">
              <div class="containerquadrado" id="imgPROC">
                <img src="imagens/produtos/processador1.png">
                <img src="imagens/produtos/processador2.jpg">
                <img src="imagens/produtos/processador3.jpg">
                <img src="imagens/produtos/processador4.jpg">
              </div>
            </div>
            </p>
          </div>

          <div class="col colDesign">
            <p>
            <div class="titulo">Características: </div>
            <div class="descricao">
              <div>- Marca: AMD</div>
              <div>- Modelo: 100-100000065BOX</div>
            </div>
            <p></p>
            <div class="titulo">Especificações:</div>
            <div class="descricao">
              <div>Threads: 12</div>
              <div>Clock básico: 3.7GHz</div>
              <div>Clock de Max Boost: Até 4.6GHz</div>
              <div>Cachê L2 total: 3MB</div>
              <div>Cachê L3 total: 32MB</div>
              <div>Desbloqueado</div>
              <div>CMOS: TSMC 7nm FinFET</div>
              <div>Soquete: AM4</div>
              <div>Versão do PCI Express PCIe 4.0</div>
              <div>Solução térmica (PIB): Wraith Stealth</div>
              <div>TDP / TDP Padrão: 65W</div>
              <p></p>



              <a href="#" class="ex2 btnNet third">COMPRAR</a>
            </div>
          </div>
          </p>
        </div>


      </div>
    </div>

  </div>


  <div class="meu-container">

    <div id="det-nintendo">
      <div class="box-produto">
        <div class="row">
          <div class="col colDesign">
            <p>
            <div class="carroselNINT">
              <div class="containerquadrado" id="imgNINT">
                <img src="imagens/produtos/nintendo1.png">
                <img src="imagens/produtos/nintendo2.jpg">
                <img src="imagens/produtos/nintendo3.jpg">
                <img src="imagens/produtos/nintendo4.jpg">
              </div>
            </div>
            </p>
          </div>

          <div class="col colDesign">
            <p>
            <div class="titulo">Características: </div>
            <div class="descricao">
              <div>- Marca: Nintendo</div>
              <div>- Modelo: HBDSKABA1</div>
            </div>
            <p></p>
            <div class="titulo">Especificações:</div>
            <div class="descricao">
              <div>Altura: 10,16 cm</div>
              <div>Largura: 23,88 cm</div>
              <div>Espessura: 1,4 cm (com os Joy-Con encaixados)</div>
              <div>Tela tátil com capacidade multitoque</div>
              <div>Tipo: LCD de 15,75 cm (6,2 pol.) / 1280 x 720</div>
              <div>Processador NVIDIA Tegra customizado</div>
              <div>32 GB de armazenamento interno, sendo uma parte reservada para ser usada pelo console.</div>
              <div>Bateria de íon de lítio</div>
              <div>Capacidade: 4310mAh</div>
              <div>Tempo de recarga: Aproximadamente 3 horas</div>
            </div>
            <p></p>
            <a href="#" class="ex2 btnNet third">COMPRAR</a>
          </div>
        </div>
        </p>
      </div>

    </div>
  </div>

  </div>

  <div class="meu-container">

    <div id="det-monitor">
      <div class="box-produto">
        <div class="row">
          <div class="col colDesign">
            <p>
            <div class="carroselMONI">
              <div class="containerquadrado" id="imgMONI">
                <img src="imagens/produtos/monitor1.png">
                <img src="imagens/produtos/monitor2.jpg">
                <img src="imagens/produtos/monitor3.jpg">
                <img src="imagens/produtos/monitor4.jpg">
                <img src="imagens/produtos/monitor5.jpg">
              </div>
            </div>
            </p>
          </div>

          <div class="col colDesign">
            <p>
            <div class="titulo">Características: </div>
            <div class="descricao">
              <div>- Marca: Ozone</div>
              <div>- Modelo: OZDSP24FHD240</div>
            </div>
            <p></p>
            <div class="titulo">Especificações:</div>
            <div class="descricao">
              <div>Cor: Cinza chumbo</div>
              <div>Placa mãe: Samsung</div>
              <div>Sistema Operacional: Linux Console (sem GUI)</div>
              <div>Memória Ram: 4 GB DDR4 (4 GB x1) 2666MHz
                Máx. Memória Suportada 32 GB</div>
            </div>
            <p></p>
            <div class="titulo">Processador:</div>
            <div class="descricao">
              <div>Intel Celeron 6305 (1.80 GHz, 4 MB L3 Cache)</div>
              <div>Chipset Integrado (Intel)</div>

              <div class="titulo">Tela:</div>
              <div class="descricao">
                <div>15.6'' Full HD LED antirreflexiva</div>
                <div>Resolução da Tela Full HD</div>
              </div>
            </div>
            <p></p>

            <a href="#" class="ex2 btnNet third">COMPRAR</a>
          </div>
        </div>
        </p>
      </div>

    </div>
  </div>

  </div>

  <div class="meu-container">

    <div id="det-notebook">
      <div class="box-produto">
        <div class="row">
          <div class="col colDesign">
            <p>
            <div class="carroselNOTE">
              <div class="containerquadrado" id="imgNOTE">
                <img src="imagens/produtos/notebook1.png">
                <img src="imagens/produtos/notebook2.jpg">
                <img src="imagens/produtos/notebook3.jpg">
                <img src="imagens/produtos/notebook4.jpg">
              </div>
            </div>
            </p>
          </div>

          <div class="col colDesign">
            <p>
            <div class="titulo">Especificações:</div>
            <div class="descricao">
              <div>Cor: Cinza chumbo</div>
              <div>Placa mãe: Samsung</div>
              <div>Sistema Operacional: Linux Console (sem GUI)</div>
              <div>Memória Ram: 4 GB DDR4 (4 GB x1) 2666MHz
                Máx. Memória Suportada 32 GB</div>
            </div>
            <p></p>
            <div class="titulo">Processador:</div>
            <div class="descricao">
              <div>Intel Celeron 6305 (1.80 GHz, 4 MB L3 Cache)</div>
              <div>Chipset Integrado (Intel)</div>
              <p></p>
              <div class="titulo">Tela:</div>
              <div class="descricao">
                <div>15.6'' Full HD LED antirreflexiva</div>
                <div>Resolução da Tela Full HD</div>
              </div>
            </div>
            <p></p>
            <a href="#" class="ex2 btnNet third">COMPRAR</a>
          </div>
        </div>
        </p>
      </div>

    </div>
  </div>

  </div>

  <!--FIM BOX-->


  <p>















    <!-- Aqui é listado os produtos cadastrados no sistema -->
  <div class="abaixo-produtos">
    <!-- 1a linha do grid system -->
    <div class="row">

      <?php
      for ($i = 0; $i < count($produtos); $i++) :
      ?>
        <!-- 1a coluna da linha -->
        <div class="col-md-2 col-sm-12 marginCards">

          <div class="card">
            <input type="radio" name="tipo" id="mouse" value="mouse" onclick="verificaTipo(this.value);" class="blue" checked>
            <img src="data:image/png;base64,<?php echo base64_encode($produtos[$i]["imagem"]); ?>" class="card-img-top">
            <div class="card-body">
              <h5 class="card-title txtCard"><?php echo $produtos[$i]["nome"]; ?></h5>
              <p class="card-text txtCard-precoPromo">R$ <?php echo str_replace(".", ",", $produtos[$i]["preco"]); ?></p>
              <a href="compra-produto.php?id=<?php echo $produtos[$i]["id"]; ?>" class="btn btnCor">Ver detalhes</a>
            </div>
          </div>

        </div>
      <?php
      endfor;
      ?>

    </div>

    <!-- 2a linha do grid system -->
    <div class="row">

      <!-- coluna unica -->
      <div class="col-md-12 col-sm-12 marginCards">

        <p>
          <a href="store.html" class="ex1 btn btnFim" style="float: right;">Confira todas as ofertas exclusivas</a>
        </p>

      </div>
    </div>

  </div>





























  <br><br>

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

  <script type="text/javascript">
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
      'use strict'

      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.querySelectorAll('.needs-validation')

      // Loop over them and prevent submission
      Array.prototype.slice.call(forms)
        .forEach(function(form) {
          form.addEventListener('submit', function(event) {
            if (!form.checkValidity()) {
              event.preventDefault()
              event.stopPropagation()
            }

            form.classList.add('was-validated')
          }, false)
        })
    })()
  </script>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>

</body>

</html>