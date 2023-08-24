<?php

session_start();
session_destroy();

$paginaAtual = $_POST["pagina_atual_logout"];
header('Location: ../'.$paginaAtual);