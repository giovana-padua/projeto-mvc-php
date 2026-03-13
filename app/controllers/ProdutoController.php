<?php
    require_once __DIR__ . '/../../core/Database.php';
    require_once __DIR__ . '/../models/Produto.php';
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
        // listar produtos
        }
        public function create()
        {
        // mostrar formulário
        }
        public function store()
        {
        // salvar produto
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