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
            <h1 class="title">Novo Produto</h1>
        </section>
        
        <form method="POST" action="?action=store">

            <div class="campos">
                <p>Nome:</p>
                    <input type="text" name="nome"><br>

            </div>
            <div class="campos">
                <p>Descrição:</p>
                <textarea name="descricao"></textarea><br>

            </div>
            <div class="campos">
                <p>Preço:</p>
                <input type="text" name="preco"><br>

            </div>
            <div class="campos">
                <p>Quantidade:</p>
                <input type="number" name="quantidade"><br>

            </div>
            <button type="submit">Salvar</button>
        </form>
    </section>
</body>
</html>