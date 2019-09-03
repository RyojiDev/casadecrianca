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
				<form class="form-login bg-primary" method="post" action="indexconfig.php">

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
						Senha: <input class="form-control ano" type="password" name="senha" required="required">
					</div><!-- div cpf -->
					<div class="container">
						<button class="btn btn-success btn-block" type="submit" value="Próxima">Próxima</button>
						<button class="btn btn-success  btn-block" data-toggle="modal" data-target="#modal_config">Criar</button>
						<button class="btn btn-success  btn-block" data-toggle="modal" data-target="#modal_Series" href='salvarserie.php'>Série</button>
						</div>
					</div>
					</div>
					</div>

			<!---------------------------- Modal Config --------------------------------------------->
			</form>


		</div><!--- div Carregando -->

		<div class="modal fade" tabindex="-1" role="dialog" id="modal_config">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<form  method="POST" name="form_config" class="form-horizontal" id="form_config">
							<div class="modal-header">
								<h5>Definições de Matrícula</h5>
							</div>
							<div class="modal-body">
							<input type="hidden" action="inserir" name="action" value="inserir">
								<div class="form-group">
									<label for="dataIni" class="control-label">Data Inicial</label>
									<div class="input-group">
  									<input required type="date" class="form-control dataIni" id="dataIni" name="dataIni"
											placeholder="00/00/000">
											<label for=" horaIni" class="control-label">Hora Inicial</label>
										<input required type="text" class="form-control horaIni" id="horaIni" name="horaIni"
											placeholder="00:00:00">
									</div>
									<br>
									<label for="dataFim" class="control-label">Data Final</label>
									<div class="input-group">
										<input required type="date" class="form-control dataFim" id="dataFim" name="dataFim"
											placeholder="00/00/000">
											<label for=" horaFim" class="control-label">Hora Final</label>
											<input required type="text" class="form-control horaFim" id="horaFim" name="horaFim"
											placeholder="00:00:00">
									</div>
									<br>
									<div class="form-group">
									<label for="cabecalho" class="control-label">Cabeçalho</label>
									<div class="input-group">
										<input required type="text" class="form-control" id="cabecalho" name="cabecalho"
											placeholder="Informe o Cabeçalho">
									</div>
									<br>
 								<div class="form-group">
									<label for="descricao" class="control-label">Descrição</label>
									<div class="input-group">
										<textarea class="form-control" id="descricao" name="descricao" rows="2"></textarea>
									</div>
									<br>
								<div class="form-group">
								<label for="observacao" class="control-label">Observação</label>
									<div class="input-group">
										<textarea class="form-control" id="observacao" name="observacao" rows="2"></textarea>
									</div>

									<br>
									<div class="form-group">
									</label>
									<div class="modal-footer">
										<button id="salvar_config_confirm" type="submit" class="btn btn-success">Salvar</button>
										<button type="cancel" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
									</div>
									<div class="modal fade" tabindex="-1" role="dialog" id="modal_config">

	<?php include("import.phtml"); ?>

	</div>

	</body>
</html>
