<?php

namespace Alura\Mvc\Controller;

use Alura\Mvc\Controller\Controller;
use Alura\Mvc\Repository\VideoRepository;

class VideoFormUpdate implements Controller{
    public function __construct(private VideoRepository $videoRepository) {
    }

    public function dataProcess() {
        $id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
        $video = null;

        if($id !== false) {
            $video = $this->videoRepository->findById($id);
        } else {
            header("Location: /?sucesso=0");
            exit();
        }
?>
        <!DOCTYPE html>
        <html lang="pt-br">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
            <link rel="stylesheet" href="../css/reset.css">
            <link rel="stylesheet" href="../css/estilos.css">
            <link rel="stylesheet" href="../css/estilos-form.css">
            <link rel="stylesheet" href="../css/flexbox.css">
            <title>AluraPlay</title>
            <link rel="shortcut icon" href="./img/favicon.ico" type="image/x-icon">
        </head>
        <body>
            <!-- Cabecalho -->
            <header>
                <nav class="cabecalho">
                    <a class="logo" href="../"></a>
                    <div class="cabecalho__icones">
                        <a href="./novo-video" class="cabecalho__videos"></a>
                        <a href="../pages/login.html" class="cabecalho__sair">Sair</a>
                    </div>
                </nav>
            </header>
            <main class="container">
                <form class="container__formulario" method="POST" action="/editar-video">
                    <h3 class="formulario__titulo">Edite o vídeo!</h3>
                        <div class="formulario__campo">
                            <label class="campo__etiqueta" for="url">Link embed</label>
                            <input name="url" class="campo__escrita" required
                                placeholder="Por exemplo: https://www.youtube.com/embed/FAY1K2aUg5g" id='url' 
                                value="<?= $video->url; ?>"/>
                        </div>
                        <div class="formulario__campo">
                            <label class="campo__etiqueta" for="titulo">Titulo do vídeo</label>
                            <input name="titulo" class="campo__escrita" required placeholder="Neste campo, dê o nome do vídeo"
                                id='titulo' value="<?= $video->title; ?>"/>
                        </div>
                        <input type="hidden" name="id" value="<?= $video->id; ?>"/>
                        <input class="formulario__botao" type="submit" value="Enviar" />
                </form>
            </main>
        </body>
        </html>
<?php
    }
}

?>