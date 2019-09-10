<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Colégio Casa de Criança</title>
		<link rel="icon" href="favicon.ico" type="image/x-icon">
		<link rel="stylesheet" type="text/css" href="css/reset.css">
		<link rel="stylesheet" type="text/css" href="css/index.css">
	<?php	include ('import_css.phtml');
	include './connection.php';
	include './functions.php';
	?>
<?php

$ano = 2019;

	$conn = getConnection();
	$sql = "SELECT * FROM casamatriculaconfig where ano = $ano";
	$result = $conn->query( $sql );
	$casamatriculaconfig = $result->fetchAll();
	$cabecalho = $casamatriculaconfig[0]['cabecalho'];

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
				<h2 class="text-center text-color-white"><?php echo utf8_encode($cabecalho);?></h2>
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
							<img class="olho_login bg-white olho" id="olho_login" src="img/olho.png" />
							Senha: <input class="form-control" type="password" class="senha" id="senha_login" name="senha"
								required="required">
							<a class="esqueci" href="#" data-toggle="modal" data-target="#recuperar_senha">Esqueceu a senha ?</a>
						</div>
						<div class="container">
							<button class="btn btn-success btn-block" type="submit" value="Próxima">Entrar</button>
							<button class="btn btn-success  btn-block" id="criar_responsavel" data-toggle="modal"
								data-target="#modal_cadastro">Criar Cadastro</button>
						</div>
					</div>
				</form>
			</div>
		</div>



			<!---------------------------- Modal Cadastro Usuario --------------------------------------------->





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
							<label for="cpf" class="control-label">CPF</label>
							<input required type="text" class="form-control cpf valida" id="cpf" name="cpf"
								placeholder="000.000.000-00">
						</div>
						<label for="senha" class="control-label ">Senha</label>
						<div class="form-inline">
							<input required type="password" class="form-control valida " id="senha"  class="senha"	name="senha"  placeholder="Digite sua Senha">
							<input required type="password" class="form-control valida " id="senhaC" class="senhaC" name="senhaC" placeholder="Confirme sua Senha" ><img class="olho" id="olho" src="img/olho.png" />
						</div>
						<div class="form-group">
							<label for="nome" class="control-label">Nome</label>
							<div class="input-group">
								<input required type="text" class="form-control" id="nome" name="nome"
									placeholder="Digite o Nome do Responsável" onkeyup="senhaConsulta()">
							</div>
						</div>
						<div class="form-group">
							<label for="telefone" class="control-label">Telefone</label>
							<div class="input-group">
								<input required type="text" class="form-control telefone " id="telefone" name="telefone"
									placeholder="(00)0-0000-000">
							</div>
						</div>
						<div class="form-group">
							<label for="Email" class="control-label">Email</label>
							<div class="input-group">
								<input required type="text" class="form-control email valida" id="email" name="email"
									placeholder="Digite o Email">
							</div>
						</div>
					</div>
				</form>
				<div class="modal-footer">
					<button id="salvar_confirm" type="submit" class="btn btn-success">Salvar</button>
					<button type="cancel" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
				</div>
			</div>
		</div>
	</div>



									<!-------------- modal esqueci minha senha ------------------------------->








									<div class="modal fade" tabindex="-1" role="dialog" id="recuperar_senha">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<form method="POST" name="form_series" class="form-horizontal" id="form_recuperar_senha">
													<div class="modal-header">
														<h5>Recuperação de senha</h5>
													</div>
													<div class="modal-body">
														<div class="form-group">
															<label for="para" class="control-label">Email</label>
															<div class="input-group">
																<input required type="text" class="form-control" id="email" name="email"
																	placeholder="email">
															</div>
														</div>
														<div class="form-group">
															<label for="CPF" class="control-label">CPF</label>
															<div class="input-group">
																<input required type="text" placeholder="Digite o CPF" id="cpf_senha" name="cpf"
																	class="form-control cpf">
															</div>
														</div>
														<div class="form-group">
															</label>
															<div class="modal-footer">
																<button id="btn_recuperar_senha" type="submit"
																	class="btn btn-success">Recuperar</button>
																<button type="cancel" class="btn btn-secondary"
																	data-dismiss="modal">Cancelar</button>
															</div>
														</div>
													</div>
											</div>
										</div>
									</div>
									</div>

									<?php include("import.phtml"); ?>
	</body>

</html>
