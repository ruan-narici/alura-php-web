<?php

namespace ruannarici\BuscadorDeCursos;

use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

class Buscador {

    private $cliente;
    private $crawler;

    public function __construct(Client $cliente, Crawler $crawler) {
        $this->cliente = $cliente;
        $this->crawler = $crawler;
    }

    public function buscar(): array {
        $resposta = $this->cliente->request('GET', 'https://www.alura.com.br/cursos-online-programacao/php');
        $html = $resposta->getBody();

        $this->crawler->addHtmlContent($html);
        $elementosCursos = $this->crawler->filter('span.card-curso__nome');
        $cursos = [];

        foreach($elementosCursos as $elemento) {
            array_push($cursos, $elemento->textContent);
        }

        return $cursos;
    }


}

?>