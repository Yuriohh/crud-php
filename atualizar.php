<?php require_once "banco/conexao.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Item</title>
    <link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
</head>
<body>
    <h1>Atualizando Item</h1>

		<div>
			<?php $crud = new Conexao();
			$id = $_GET["id"];
			foreach($crud->updateScreen($id) as $data): ?>
														<?php if(isset($_GET['delete'])) {
															$crud->delete($data['Id']);
														} ?>
				<form action="<?php $crud->update($id); ?>" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?=$data['Id']; ?>">

            <label for="">Nome</label>
            <input type="text" name="nome" value="<?=$data['Nome']; ?>">

            <br>

            <label for="">Descrição</label>
            <input type="text" name="descricao" value="<?=$data['Descricao']; ?>">

            <br>

            <label for="">Preço</label>
            <input type="text" name="preco" value="<?=$data['Preco']; ?>">

            <br>

						<input type="submit" value="Salvar">
        </form>
			<?php endforeach; ?>
    </div>
</body>
</html>
