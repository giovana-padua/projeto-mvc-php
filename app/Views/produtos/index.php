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
        <section class="top">
            <h1 class="title">Lista de Produtos</h1>
            <a href="?action=create" role="button" class="btn novo">Novo Produto</a>
        </section>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Preço</th>
                <th>Quantidade</th>
                <th>Ações</th>
            </tr>
            <?php foreach ($produtos as $p): ?>
                <tr>
                    <td><?= $p['id'] ?></td>
                    <td><?= $p['nome'] ?></td>
                    <td><?= $p['preco'] ?></td>
                    <td><?= $p['quantidade'] ?></td>
                    <td>
                    <a href="?action=edit&id=<?= $p['id'] ?>">Editar</a>
                    <a href="?action=delete&id=<?= $p['id'] ?>">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </section>
</body>
</html>