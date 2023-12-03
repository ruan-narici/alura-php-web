<?php require_once __DIR__ . "/header.php"; ?>
            <ul class="videos__container" alt="videos alura">
                <?php foreach ($videoList as $video): ?>
                    <?php if(!str_starts_with($video->url, "http"))
                        // $video["url"] = "https://www.youtube.com/embed/kryIBKPVZ7A?si=OWWrPJ55jLZBa3JV";
                    ?>
                        <li class="videos__item">
                            <iframe width="100%" height="72%" src="<?= $video->url; ?>"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                            <div class="descricao-video">
                                <img src="./img/logo.png" alt="logo canal alura">
                                <h3><?= $video->title; ?></h3>
                                <div class="acoes-video">
                                    <a href="/editar-video?id=<?= $video->id; ?>">Editar</a>
                                    <a href="/remover-video?id=<?= $video->id; ?>">Excluir</a>
                                </div>
                            </div>
                        </li>
                <?php endforeach; ?>
            </ul>
<?php require_once __DIR__ . "/footer.php"; ?>