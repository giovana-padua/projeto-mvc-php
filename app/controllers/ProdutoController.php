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
            $this->produtoModel = new Produto(db: $db);
        }

        public function index()
        {
            $produtos = $this->produtoModel->all();
            // Chama a view com os dados recebidos do model

            require __DIR__ . '/../views/produtos/index.php'; // require: pega o código do arquivo de lá e traz para cá
        }

        public function create()
        {
            // mostrar formulário
            require __DIR__ . '/../views/produtos/create.php';
        }

        public function store()
        {
            // salvar produto
            /*
            -> Modo 1° termo:
            if ($_SERVER['REQUEST_METHOD'] == 'POST')
            {
                $nome       = $_POST['nome']      ; 
                $descricao  = $_POST['descricao'] ;
                $preco      = $_POST['preco']     ;
                $quantidade = $_POST['quantidade'];
            }
                mas não é necessário criar variáveis
            */

            if ($_SERVER['REQUEST_METHOD'] === 'POST')
            {
                $this->produtoModel->create(nome: $_POST['nome'], 
                                            descr: $_POST['descricao'], 
                                            preco: $_POST['preco'], 
                                            qtd: $_POST['quantidade']);
            }

            header('Location: index.php?action=index');
            exit;
        }

        public function edit()
        {
            // editar produto

            // 1° carregar o produto
            $id = $_GET['id'] ?? null;
            if ($id === null)
            {
                header('location: index.php');
                exit;
            }

            $produto = $this->produtoModel->find($id);

            // Depois chamar a view
            require __DIR__ . '/../views/produtos/edit.php';
        }

        public function update()
        {
            // atualizar produto
            /* $dados = [
                'nome'       => $_POST['nome']       ?? '',
                'descricao'  => $_POST['descricao']  ?? '',
                'preco'      => $_POST['preco']      ?? 0,
                'quantidade' => $_POST['quantidade'] ?? 0,
                ]; */
            
            if ($_SERVER('REQUEST_METHOD') === 'POST')
                $this->produtoModel->update(id: $_POST['id'], 
                                            nome: $_POST['nome'], 
                                            descr: $_POST['descricao'], 
                                            preco: $_POST['preco'], 
                                            qtd: $_POST['quantidade']);
    
            header('Location: index.php');
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