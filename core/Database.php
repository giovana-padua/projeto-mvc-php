<?php
    class Database
    {
        private $host;
        private $dbname;
        private $user;
        private $pass;
        private $conn;
        
        public function __construct()
        {
            $config = require __DIR__ . '/../config/database.php'; // __DIR__: atalho para o diretório raiz
            $this->host = $config['host']; // == $config[0]
            $this->dbname = $config['dbname'];
            $this->user = $config['user'];
            $this->pass = $config['pass'];

            // connect poderia ser feito aqui, mas como não tem return
            // precisaria de um get
        }

        public function connect()
        {
            if ($this->conn === null) {
                try {
                    // fazer conexao aqui
                    $this->conn = new PDO("mysql:host={$this->host};dbname={$this->dbname}",
                    $this->user, 
                    $this->pass);
                    // ao invés de usar valor absoluto é melhor usar os atributos

                    $this->conn->setAttribute(attribute: PDO::ATTR_ERRMODE, value: PDO::ERRMODE_EXCEPTION);
                }

                catch (PDOException $e) {
                    die('Erro de conexão com o banco de dados' . $e->getMessage());
                    // se não colocar nada aqui, ele identifica que houve um erro, mas vai executar
                    // nunca usar try catch sem tratamento
                }

                /*
                $this->conn = new PDO(
                    "mysql:host={$this->host};dbname={$this->dbname};charset=utf8", 
                    $this->user,
                    $this->pass
                    );

                    $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                */
            }
            return $this->conn;
        }
    }