<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Produtos</title>
    
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
    <section class="container">
        <section class="top edit">
            <a href="?action=index" role="button" class="btn voltar">Voltar</a>
            <h1 class="title">Editar Produto</h1>
        </section>

        <form method="POST" action="?action=update">
            <input type="hidden" name="id" value="<?= $produto['id'] ?>">
            <div class="campo">
                <p>Nome:</p>
                <input type="text" name="nome" value="<?= $produto['nome'] ?>"><br>
            </div>
            <div class="campo">
                <p>Descrição:</p>
                <textarea name="descricao"><?= $produto['descricao'] ?></textarea><br>
            </div>

            <div class="campo">
                <p>Preço:</p>
                <input type="text" name="preco" value="<?= $produto['preco'] ?>"><br>
            </div>

            <div class="campo">
                <p>Quantidade:</p>
                <input type="number" name="quantidade" value="<?= $produto['quantidade'] ?>"><br>
            </div>

            <button type="submit">Atualizar</button>
        </form>
    </section>
</body>
</html>