<?php
    require_once __DIR__ . '/../../core/Database.php';
    require_once __DIR__ . '/../models/Produto.php';
    // Controlador é o intermediário entre View e Model
    class ProdutoController
    {
        private $produtoModel;
        public function __construct()
        {
            $database = new Database();
            $db = $database->connect();
            $this->produtoModel = new Produto($db);
        }

        public function index()
        {
            $produtos = $this->produtoModel->all();
            // Chama a view com os dados recebidos do model
            require __DIR__ . '/../views/produtos/index.php';
        }

        public function create()
        {
            // mostrar formulário
            require __DIR__ . '/../views/produtos/create.php';
        }

        public function store()
        {
            // salvar produto
            $dados = [
                'nome'       => $_POST['nome']       ?? '',
                'descricao'  => $_POST['descricao']  ?? '',
                'preco'      => $_POST['preco']      ?? 0,
                'quantidade' => $_POST['quantidade'] ?? 0,
            ];

            $this->produtoModel->create($dados);
            header('Location: index.php?action=index');
            exit;
        }

        public function edit()
        {
            // editar produto
            $id = $_GET['id'] ?? null;
            $produto = $this->produtoModel->find($id);
            require __DIR__ . '/../views/produtos/edit.php';
        }

        public function update()
        {
            // atualizar produto
            $id = $_POST['id'] ?? null;
            $dados = [
                'nome'       => $_POST['nome']       ?? '',
                'descricao'  => $_POST['descricao']  ?? '',
                'preco'      => $_POST['preco']      ?? 0,
                'quantidade' => $_POST['quantidade'] ?? 0,
            ];
    
            $this->produtoModel->update($id, $dados);
            header('Location: index.php?action=index');
            exit;
        }
        
        public function delete()
        {
            // excluir produto
            $id = $_GET['id'] ?? null;
            $this->produtoModel->delete($id);
            header('Location: index.php?action=index');
            exit;
        }
    }