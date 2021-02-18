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
	<h1>Adicionar Item</h1>

	<div>
		<?php $crud = new Conexao(); ?>
		<form action="<?php $crud->create(); ?>" method="POST" enctype="multipart/form-data">
		<label for="">Nome</label>
		<input type="text" name="nome">

		<br>

		<label for="">Descrição</label>
		<input type="text" name="descricao">

		<br>

		<label for="">Preço</label>
		<input type="text" name="preco">

		<br>

		<input type="submit" value="Salvar">
		</form>
	 </div>
</body>
</html>
