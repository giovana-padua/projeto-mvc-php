<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Produtos</title>
</head>
<body>
    <h1>Editar Produto</h1>
    <form method="POST" action="?action=update">
    <input type="hidden" name="id" value="<?= $produto['id'] ?>">
    Nome:
    <input type="text" name="nome" value="<?= $produto['nome'] ?>"><br>
    Descrição:
    <textarea name="descricao"><?= $produto['descricao'] ?></textarea><br>
    Preço:
    <input type="text" name="preco" value="<?= $produto['preco'] ?>"><br>
    Quantidade:
    <input type="number" name="quantidade" value="<?= $produto['quantidade'] ?>"><br>
    <button type="submit">Atualizar</button>
    </form>
    <a href="index.php">Voltar</a>
</body>
</html>