<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<title>Colégio Casa de Criança</title>
		<link rel="icon" href="favicon.ico" type="image/x-icon">
		<link rel="stylesheet" type="text/css" href="css/reset.css">
		<link rel="stylesheet" type="text/css" href="css/index.css">

	</head>
	<body>

		<header>
			<div class="container">
				<h2 class="titulo">Pré-Matrícula de Novatos para 2020</h2>
			</div>
		</header>
		<main>
			<section class="container">
				<h2>Cadastro</h2>
			</section>
		</main>
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
		<script src="js/principal.js" ></script>

	</body>
</html>
