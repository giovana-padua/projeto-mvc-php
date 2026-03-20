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
        }

        public function create($dados)
        {
            // inserir produto
            $stmt = $this->conn->query("INSERT INTO produtos (nome, preco, quantidade) VALUES ($dados[0], $dados[1], $dados[2], $dados[3]);");

        }
        public function update($id, $dados)
        {
            // atualizar produto
        }
        public function delete($id)
        {
            // excluir produto
        }
    }