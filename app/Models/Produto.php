 <?php
    class Produto
    {
        private $conn;
        //private $table = 'produtos';
        private $table;
        
        public function __construct($db)
        {
            /*
            Funcionaria fazer assim:
            $db = new Database();
            $this->conn = $db->connect();
            mas cada vez que um produto fosse criado geraria um objeto database 
            */
            $this->conn = $db;
            $this->table = 'produtos';
        }
        
        public function all()
        {
            // retornar todos os produtos (Model acessa o BD, faz um SELECT e retorna para o controller)
            // buscar produto pelo id
            $comandoSQL = "SELECT * FROM {$this->table} ORDER BY id";
            $acesso = $this->conn->prepare($comandoSQL);
            $acesso->execute(); // execute: faz o comando sql e os dados ficam em $acesso

            return $acesso->fetchAll(); // fetch: transforma e formata os dados em uma array

            /*
            prepare: faz uma camada de segurança, evita erro de sql em ?get?


            $stmt = $this->conn->query("SELECT * FROM {$this->table}");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
            */
        }
        
        public function find($id)
        {
            $comandoSQL = "SELECT * FROM {$this->table} WHERE id = :id"; // :id indica parametro, poderia ser direto {$id} 
                // mas isso gera uma falha de segurança (sql inject, se a pessoa digita ; Delete... deleta seu banco de dados)
            
            $acesso = $this->conn->prepare($comandoSQL);
            $acesso->bindValue(':id', $id, PDO::PARAM_INT); // bindValue(parametroSQL, substituiPor): passa o parâmetro para o comando SQL
                // pega apenas o valor inteiro e o restante descarta
                // PDO:PARAM_INT indica que é um inteiro
            
            $acesso->execute();

            return $acesso->fetch(); // tem apenas um então usa só o fetch()

            /*
            $stmt = $this->conn->prepare("SELECT * FROM {$this->table} WHERE id = :id");
            $stmt->execute([':id' => $id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
            */
        }

        /*
        public function create($dados)
        {
            // inserir produto

            
            /*
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
        */

        public function create($nome, $descr, $preco, $qtd) // pode receber cada parametro separado ou um array
        {
            $comandoSQL = "INSERT INTO {$this->table} (nome, descricao, preco, quantidade) VALUES (:nm, :dsc, :prc, :qtde)";
            $acesso = $this->conn->prepare($comandoSQL);

            /* Pode ser feito assim: 
            $acesso->bindValue(':nm', $nome, PDO::PARAM_STR);
            $acesso->bindValue(':dsc', $descr, PDO::PARAM_STR);
            $acesso->bindValue(':prc', $preco);
            $acesso->bindValue(':qtde', $qtd, PDO::PARAM_INT);

            Ou
            */

            $acesso->execute([
                ':nm' => $nome,
                ':dsc' => $descr,
                ':prc' => $preco,
                ':qtde' => $qtd,
            ]);
        }

        /*
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
        */

        public function update($id, $nome, $descr, $preco, $qtd)
        {
            $comandoSQL = "UPDATE {$this->table}
                            SET nome = :nome,
                            descricao = :descr,
                            preco = :preco,
                            quantidade = :qtd
                            WHERE id = :id";
            
            $acesso = $this->conn->prepare($comandoSQL);
            return $acesso->execute([ //só por curiosidade pode ter o return
                ':nome' => $nome,
                ':descr' => $descr,
                ':preco' => $preco,
                ':qtd' => $qtd,
                ':id' => $id
            ]);

            // retorna a quantidade de registros alterados

        }

        /*
        public function delete($id)
        {
            // excluir produto
            $stmt = $this->conn->prepare(
            "DELETE FROM {$this->table} WHERE id = :id"
            );

            return $stmt->execute([':id'=> $id]);
        }
        */

        public function delete ($id)
        {
            $comandoSQL = "DELETE FROM {$this->table} WHERE id = :id";
            $acesso = $this->conn->prepare($comandoSQL);

            // retorna a quantidade de registros deletados

            return $acesso->execute([ // execute só recebe array
                ':id' => $id
            ]);
        }
    }