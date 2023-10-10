<?php

require_once './src/Connection.php';
require_once './src/Modelo/Produto.php';
require_once './src/Repositorio/ProdutoRepositorio.php';

$produtoRepositorio = new ProdutoRepositorio($pdo);

$produtoRepositorio->excluir($_POST['id']);

header('Location: admin.php');

?>