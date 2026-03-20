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
            require __DIR__ . '/../Views/produtos/index.php';
        }

        public function create()
        {
            // mostrar formulário
            //1° pedir informações para o Model

            require __DIR__ . '/../Views/produtos/create.php';
            
        }

        public function store()
        {
            // salvar produto
            if ($_SERVER('REQUEST_METHOD') == 'POST')
            {
                $nomeProd = $_POST('nome'); 
                $descricaoProd = $_POST('descricao'); 
                $precoProd = $_POST('preco'); 
                $quantidadeProd = $_POST('quantidade'); 

                $dados = [$nomeProd, $descricaoProd, $precoProd, $quantidadeProd];

                $this->produtoModel($dados);
            }
        }

        public function edit()
        {
        // editar produto
        }
        public function update()
        {
        // atualizar produto
        }
        public function delete()
        {
        // excluir produto
        }
    }