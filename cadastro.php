<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="icon" href="favicon.ico" type="image/x-icon">
	<?php include("import_css.phtml"); ?>
		<link rel="stylesheet" type="text/css" href="css/reset.css">
		<link rel="stylesheet" type="text/css" href="css/index.css">
		<link rel="stylesheet" href="css/configuracao.css">


	<title>Colégio Casa de Criança</title>
</head>

	<body>
	<div id="carregando">
    <div id="content">
        <div id="inner-content">
        <?php include('menu-lateral.php'); ?>
		
		<header>
			<div class="container">
				<h2 class="titulo">Pré-Matrícula de Novatos para 2020</h2>
			</div>
		</header>
		
	<form method="post" action="matricula.php">
		<div class="container">
			CPF: <input type="number" name="cpf" required="required" maxlength="11" size="number" > <br><br>
		</div>
		<div class="container">
			Senha: <input type="password" name="senha" required="required"> <br><br>
		</div>
			<div class="container">
			Nome: <input type="text" name="nome" required="required"> <br><br>
		</div>
		<div class="container">
			Telefone: <input type="tel" name="tel" required="required" > <br><br>
		</div>
		<div class="container">
			E-Mail: <input type="email" name="email" required="required"> <br><br>
		</div>
		<div class="container">
			<input type="submit" value="Próxima"/>
		</div>
	</form>
		

</div><!---- div inner content -->
</div> <!----- div content--->


<script src="js/principal.js" ></script>
<?php include("import.phtml"); ?>
</body>
</html>