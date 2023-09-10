<?php

require_once 'vendor/autoload.php';
require_once 'src/Buscador.php';

use GuzzleHttp\Client;
use ruannarici\BuscadorDeCursos\Buscador;
use Symfony\Component\DomCrawler\Crawler;

$cliente = new Client(['verify' => false]);
$crawler = new Crawler();

$buscador = new Buscador($cliente, $crawler);
$cursos = $buscador->buscar();

foreach($cursos as $curso) {
    echo $curso . PHP_EOL;
}


?>