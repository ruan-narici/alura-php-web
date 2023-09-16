<?php

$caminhoArquivoBanco = __DIR__ . '/BancoDeDados.sqlite';

$conexao = new PDO('sqlite:' . $caminhoArquivoBanco);

echo "Conectei" . PHP_EOL;

?>