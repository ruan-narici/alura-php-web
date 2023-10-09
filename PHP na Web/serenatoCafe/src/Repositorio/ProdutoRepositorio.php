<?php

class ProdutoRepositorio {

    private PDO $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function opcoesCafe(): array {
        $sql1 = "SELECT * FROM produtos WHERE tipo = 'Café'";
        $statement = $this->pdo->query($sql1);
        $arrayCafes = $statement->fetchAll();
        
        $dadosCafe = array_map(function ($cafe) {
            return new Produto(
                $cafe['id'], 
                $cafe['tipo'], 
                $cafe['nome'], 
                $cafe['descricao'], 
                $cafe['imagem'], 
                $cafe['preco']
        );
        }, $arrayCafes);

        return $dadosCafe;
    }

    public function opcoesAlmoco(): array  {
        $sql2 = "SELECT * FROM produtos WHERE tipo = 'Almoço'";
        $statement = $this->pdo->query($sql2);
        $arrayAlmoco = $statement->fetchAll();
    
        $dadosAlmoco = array_map(function ($almoco) {
            return new Produto(
                $almoco["id"],
                $almoco["tipo"],
                $almoco["nome"],
                $almoco["descricao"],
                $almoco["imagem"],
                $almoco["preco"]
            );
        }, $arrayAlmoco);

        return $dadosAlmoco;
    }
}

?>