<?php

use Microblog\ControleDeAcesso;
require "../vendor/autoload.php";



$sessao = new ControleDeAcesso;
$sessao->verificaAcessoAdmin();
$sessao -> verificaAcesso();