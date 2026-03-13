<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Produtos</title>
</head>
<body>
    <h1>Novo Produto</h1>
    <form method="POST" action="?action=store">
    Nome:
    <input type="text" name="nome"><br>
    Descrição:
    <textarea name="descricao"></textarea><br>
    Preço:
    <input type="text" name="preco"><br>
    Quantidade:
    <input type="number" name="quantidade"><br>
    <button type="submit">Salvar</button>
    </form>
    <a href="index.php">Voltar</a>
</body>
</html>