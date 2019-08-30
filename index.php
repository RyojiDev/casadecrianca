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
			<div class="container block">
				<h2 class="text-center text-color-white">Pré-Matrícula de Novatos para 2020</h2>
			</div>
		</header>


		<div class="row">
			<div class="container col-xs-4 col-sm-3 col-offset-9 col-md-3 col-md-offset-2" id="login">
				<form class="form-login bg-primary" method="post" action="matricula.php">

					<div class="rowr">
					<div class="container">
						<div class="container">
						
						<div class="row">
						<div class="col-md-3">
						
						</div>
					<img src="img/casa_de_crianca_logo.png" id="icon_login" class=" col-md-6 img-responsive">
</div>
					
					</div>
					
					</div>
					
					<div class="container form-group">
						CPF: <input class="form-control cpf" type="text" name="cpf" required="required" maxlength="11"
							size="number"> 
					</div><!-- div cpf -->
					<div class="container form-group">
						Senha: <input class="form-control" type="password" name="senha" required="required">
					</div>
					<div class="container">
						<button class="btn btn-success btn-block" type="submit" value="Próxima">Próxima</button>
						<button class="btn btn-success  btn-block" data-toggle="modal" data-target="#modal_cadastro" href='cadastro.php'>Criar</button>
						</div>
					</div>
					</div>
					</div>


		
			<!---------------------------- Modal Cadastro Usuario --------------------------------------------->


			</form>


		</div><!--- div Carregando -->

		<div class="modal fade" tabindex="-1" role="dialog" id="modal_cadastro">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<form method="POST" name="form_cadastro" class="form-horizontal" id="form_cadastro">
							<div class="modal-header">
								<h5>Cadastro do Responsável</h5>
							</div>
							<div class="modal-body">
								<div class="form-group">
									<label for="cnpjCliente" class="control-label">CPF</label>
									<div class="input-group">
										<input required type="text" class="form-control cpf" id="cpf" name="cpf"
											placeholder="000.000.000-00">
									</div>
									<label for="senha" class="control-label">Senha</label>
									<input required type="password" class="form-control" id="senha" name="senha"
										placeholder="Digite sua Senha">
								</div>

								<div class="form-group">
									<label for="nome" class="control-label">Nome</label>
									<div class="input-group">
										<input required type="text" class="form-control" id="nome" name="nome"
											placeholder="Digite o Nome do Responsável">
									</div>
									<br>
									<div class="form-group">

									<div class="form-group">
									<label for="telefone" class="control-label">Telefone</label>
									<div class="input-group">
										<input required type="text" class="form-control telefone" id="telefone" name="telefone"
											placeholder="(00)0-0000-000">
									</div>
									<br>

									<div class="form-group">
									<label for="Email" class="control-label">Email</label>
									<div class="input-group">
										<input required type="text" class="form-control email" id="email" name="email"
											placeholder="Digite o Email">
									</div>
									<br>
									<div class="form-group">
									</label>
									<div class="modal-footer">
										<button id="salvar_confirm" type="submit" class="btn btn-success">Salvar</button>
										<button type="cancel" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
									</div>


<?php include("import.phtml"); ?>

</div>
	</body>
</html>
