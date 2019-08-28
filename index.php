<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Colégio Casa de Criança</title>
		<link rel="icon" href="favicon.ico" type="image/x-icon">
		<link rel="stylesheet" type="text/css" href="css/reset.css">
		<link rel="stylesheet" type="text/css" href="css/index.css">
	<?php	include ('import.php'); ?>

	</head>
	<body>

		<header>
			<div class="container">
				<h2 class="titulo">Pré-Matrícula de Novatos para 2020</h2>
			</div>
		</header>


		<div class="wrapper">
			<div class="container" id="login">
				<form class="form-login " method="post" action="matricula.php">
					

					<img src="img/casa_de_crianca_logo.png" id="icon_login">
					<h2 class="form-form-login-header text-center">Login</h2>

					<div class="container login-input">
						CPF: <input class="form-control" type="number" name="cpf" required="required" maxlength="11"
							size="number"> <br><br>
					</div><!-- div cpf -->
					<div class="container login-input">
						Senha: <input class="form-control" type="password" name="senha" required="required"> <br><br>
					</div>
					<div class="container">
						<button class="btn btn-success btn-block" type="submit" value="Próxima">Próxima</button>
						<button class="btn btn-success  btn-block" href='cadastro.php'>Criar</button>
					</div>


			</div>


			


			</form>
		</div>

		<script src="js/principal.js"></script>

	</body>
</html>
