<?php

class ProdutoRepositorio {

    private PDO $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function opcoesCafe(): array {
        $sql1 = "SELECT * FROM produtos WHERE tipo = 'Café' ORDER BY preco";
        $statement = $this->pdo->query($sql1);
        $arrayCafes = $statement->fetchAll();
        
        $dadosCafe = array_map(function ($cafe) {
            return $this->criaObjeto($cafe);
        }, $arrayCafes);

        return $dadosCafe;
    }

    public function opcoesAlmoco(): array  {
        $sql2 = "SELECT * FROM produtos WHERE tipo = 'Almoço' ORDER BY preco";
        $statement = $this->pdo->query($sql2);
        $arrayAlmoco = $statement->fetchAll();
    
        $dadosAlmoco = array_map(function ($almoco) {
            return $this->criaObjeto($almoco);
        }, $arrayAlmoco);

        return $dadosAlmoco;
    }

    public function buscarTodos(): array {
        $sql = "SELECT * FROM produtos ORDER BY preco";
        $statement = $this->pdo->query($sql);
        $arrayProdutos = $statement->fetchAll();
        $dadosProdutos = array_map(function ($produto) {
            return $this->criaObjeto($produto);
        }, $arrayProdutos);
        
        return $dadosProdutos;
    }

    public function criaObjeto($produto): Produto {
        $objetoProduto = new Produto(
            $produto["id"],
            $produto["tipo"],
            $produto["nome"],
            $produto["descricao"],
            $produto["imagem"],
            $produto["preco"]
        );

        return $objetoProduto;
    }
}

?>