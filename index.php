<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Colégio Casa de Criança</title>
		<link rel="icon" href="favicon.ico" type="image/x-icon">
		<link rel="stylesheet" type="text/css" href="css/reset.css">
		<link rel="stylesheet" type="text/css" href="css/index.css">
	<?php	include ('import_css.phtml'); ?>
<?php 
if (isset($_POST) && !empty($_POST)){
	echo '<pre>';
	print_r($_POST);
	echo '</pre>';
}


?>
	</head>

	<body>
<div id="carregando">
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
						CPF: <input class="form-control cpf" type="text" name="cpf" required="required" maxlength="11"
							size="number"> <br><br>
					</div><!-- div cpf -->
					<div class="container login-input">
						Senha: <input class="form-control" type="password" name="senha" required="required"> <br><br>
					</div>
					<div class="container">
						<button class="btn btn-success btn-block" type="submit" value="Próxima">Próxima</button>
						<button class="btn btn-success  btn-block" data-toggle="modal" data-target="#modal_cadastro_aluno" href='cadastro.php'>Criar</button>
					</div>


			</div>

			<!---------------------------- Modal Cadastro Usuario --------------------------------------------->

			
			


			</form>

			


			
		</div><!--- div Carregando --> 

		<div class="modal fade" tabindex="-1" role="dialog" id="modal_cadastro_aluno">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<form method="POST" name="form_cadastro_aluno" class="form-horizontal" id="form_cadastro_aluno">
							<div class="modal-header">
								<h5>Cadastrar Aluno</h5>
							</div>
							<div class="modal-body">
								<input type="number" ano="ano" name="ano" class="form-control">
								<div class="form-group">
									<label for="cnpjCliente" class="control-label">CPF
									</label>
									<div class="input-group">
										<input required type="text" class="form-control cpf" id="cpf_aluno" name="cpf_aluno"
											placeholder="000.000.000-00">
									</div>
									<label for="senha_aluno" class="control-label">Senha
									</label>
									<input required type="password" class="form-control" id="senha_aluno" name="senha_aluno"
										placeholder="Digite sua Senha">
								</div>


								<div class="form-group">
									<label for="nome_aluno" class="control-label">Nome
									</label>
									<div class="input-group">
										<input required type="text" class="form-control" id="nome_aluno" name="nome_aluno"
											placeholder="Digite o Nome Do Aluno">
									</div>
									<br>
									<div class="form-group">
										
									<div class="form-group">
									<label for="telefone" class="control-label">Telefone
									</label>
									<div class="input-group">
										<input required type="text" class="form-control telefone_aluno" id="telefone_aluno" name="telefone"
											placeholder="(00)0-0000-000">
									</div>
									<br>

									<div class="form-group">
									<label for="Email_aluno" class="control-label">Email
									</label>
									<div class="input-group">
										<input required type="text" class="form-control email_aluno" id="email_aluno" name="email_aluno"
											placeholder="Digite o Email">
									</div>
									<br>
									<div class="form-group">
									</label>
									<div class="modal-footer">
										<button id="salvar_aluno_confirm" type="submit" class="btn btn-success">Salvar</button>
										<button type="cancel" class="btn btn-secondary" data-dismiss="modal">
											Cancelar</button>
									</div>

								
<?php include("import.phtml"); ?>

</div>
	</body>
</html>
