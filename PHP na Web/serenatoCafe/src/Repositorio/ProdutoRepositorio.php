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
            $produto["preco"],
            $produto["imagem"]
        );

        return $objetoProduto;
    }

    public function excluir(int $id): void {
        $sql = "DELETE FROM produtos WHERE id = :id";
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam("id", $id, PDO::PARAM_INT);
        $statement->execute();
    }

    public function salvar(Produto $produto): void {
        $sql = "INSERT INTO produtos (`tipo`, `nome`, `descricao`, `imagem`, `preco`) VALUES (:tipo, :nome, :descricao, :imagem, :preco)";
        $statment = $this->pdo->prepare($sql);
        $statment->bindValue("tipo", $produto->getTipo(), PDO::PARAM_STR);
        $statment->bindValue("nome", $produto->getNome(), PDO::PARAM_STR);
        $statment->bindValue("descricao", $produto->getDescricao(), PDO::PARAM_STR);
        $statment->bindValue("imagem", $produto->getImagem(), PDO::PARAM_STR);
        $statment->bindValue("preco", $produto->getPreco(), PDO::PARAM_STR);
        $statment->execute();
    }

    public function buscarPorId(int $id): Produto {
        $sql = "SELECT * FROM produtos WHERE id = :id";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue("id", $id, PDO::PARAM_INT);
        $statement->execute();
        $dados = $statement->fetch();

        return $this->criaObjeto($dados);
    }

    public function atualizar(Produto $produto): void {
        $sql="UPDATE produtos SET tipo=:tipo, nome=:nome, descricao=:descricao, imagem=:imagem, preco=:preco WHERE id=:id";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue("id", $produto->getId(), PDO::PARAM_INT);
        $statement->bindValue("tipo", $produto->getTipo(), PDO::PARAM_STR);
        $statement->bindValue("nome", $produto->getNome(), PDO::PARAM_STR);
        $statement->bindValue("descricao", $produto->getDescricao(), PDO::PARAM_STR);
        $statement->bindValue("imagem", $produto->getImagem(), PDO::PARAM_STR);
        $statement->bindValue("preco", $produto->getPreco(), PDO::PARAM_STR);
        $statement->execute();
    }
}

?>