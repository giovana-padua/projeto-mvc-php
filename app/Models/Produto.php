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
}
public function find($id)
{
// buscar produto pelo id
}

public function create($dados)
{
// inserir produto
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