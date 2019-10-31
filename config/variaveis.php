<?php
session_start();
    $nomeSistema = "Loja da Chai";
    $nomeArquivo = __DIR__."/../cadastro.json";
    $produtos = json_decode(file_get_contents($nomeArquivo), true);

?>
