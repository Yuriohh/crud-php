<?php require_once "banco/conexao.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD PHP</title>
    <link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
</head>
<body>
    <h1>Crud PHP</h1>

    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Preço</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php $crud = new Conexao();
            foreach($crud->read() as $data): ?>
                    <tr>
                        <td><?= $data['Id'];?></td>
                        <td><?= $data['Nome'];?></td>
                        <td><?= $data['Descricao'];?></td>
                        <td><?= $data['Preco'];?></td>
                        <td>
                            <a href="atualizar.php?method=edit&id=<?= $data['Id']; ?>">Atualizar</a>
                        </td>
                        <td>
														<a href="atualizar.php?delete&id=<?= $data['Id']; ?>">Apagar</a>
                        </td>
                    </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <button>
        <a href="adicionar.php">Adicionar</a>
    </button>
</body>
</html>
