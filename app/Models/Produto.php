<?php
    class Produto
    {
        private $conn;
        private $table = 'produtos';
        public function __construct($db)
        {
            $this->conn = $db;
        }
        
        public function all()
        {
            // retornar todos os produtos
            // Model acessa o BD, faz um SELECT e retorna para o controller
            $stmt = $this->conn->query("SELECT * FROM {$this->table}");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
        public function find($id)
        {
            // buscar produto pelo id
            $stmt = $this->conn->prepare("SELECT * FROM {$this->table} WHERE id = :id");
            $stmt->execute([':id' => $id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function create($dados)
        {
            // inserir produto
            $stmt = $this->conn->prepare(
            "INSERT INTO {$this->table} (nome, descricao, preco, quantidade)
            VALUES (:nome, :descricao, :preco, :quantidade)"
            );

            return $stmt->execute([
                ':nome'=> $dados['nome'],
                ':descricao'=> $dados['descricao'],
                ':preco'=> $dados['preco'],
                ':quantidade'=> $dados['quantidade']
            ]);
        }
        public function update($id, $dados)
        {
            // atualizar produto
            $stmt = $this->conn->prepare(
            "UPDATE {$this->table}
            SET nome = :nome, descricao = :descricao, preco = :preco, quantidade = :quantidade
            WHERE id = :id"
            );

            return $stmt->execute([
                ':id' => $id,
                ':nome'=> $dados['nome'],
                ':descricao'=> $dados['descricao'],
                ':preco'=> $dados['preco'],
                ':quantidade'=> $dados['quantidade']
            ]);
        }
        public function delete($id)
        {
            // excluir produto
            $stmt = $this->conn->prepare(
            "DELETE FROM {$this->table} WHERE id = :id"
            );

            return $stmt->execute([':id'=> $id]);
        }
    }