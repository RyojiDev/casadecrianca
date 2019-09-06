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
				<h2 class="text-center text-color-white">Configuração De Matriculas</h2>
			</div>
		</header>

<div class="container my-5 ">
		<div class="row">
  <div class="col-sm-6 ">
    <div class="card config w-70 h-100 bg-light text-black">
      <div class="card-body">
        <h5 class="card-title text-center">Para  para Configurar as Matriculas de novos Alunos, Clique No Botão</h5>
        <p class="text-center"><button class="btn btn-success  " data-toggle="modal" data-target="#modal_config">Criar</button></p>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card config w-70 h-100 bg-primary text-white">
      <div class="card-body">
        <h5 class="card-title text-center">Para Adicionar as series para Matricula, Clique No Botão</h5>
        <p class="text-center"><button class="btn btn-success " data-toggle="modal" data-target="#modal_series"> Série</button></p>
      </div>
    </div>
  </div>
</div>
</div>






		
			

			<!---------------------------- Modal Config --------------------------------------------->
			

		</div><!--- div Carregando -->

		<div class="modal fade" tabindex="-1" role="dialog" id="modal_config">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<form method="POST" name="form_config" class="form-horizontal" id="form_config">
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
							</div>
							<br>
							<div class="form-group">
								<label for="descricao" class="control-label">Descrição</label>
								<div class="input-group">
									<textarea class="form-control" id="descricao" name="descricao" rows="2"></textarea>
								</div>
							</div>
							<br>
							<div class="form-group">
								<label for="observacao" class="control-label">Observação</label>
								<div class="input-group">
									<textarea class="form-control" id="observacao" name="observacao" rows="2"></textarea>
								</div>
							</div>
							<br>
							<div class="form-group">
								</label>
								<div class="modal-footer">
									<button id="salvar_config_confirm" type="submit" class="btn btn-success">Salvar</button>
									<button type="cancel" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
								</div>
							</div>
						</div>
				</div>
			</div>
		</div>
		</div>







			<div class="modal fade" tabindex="-1" role="dialog" id="modal_series">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<form  method="POST" name="form_series" class="form-horizontal" id="form_series">
							<div class="modal-header">
								<h5>Definições de Series</h5>
							</div>
						<div class="modal-body">
						
							<input type="hidden" action="inserir" name="action" value="inserir">
							<div class="form-group">
							<label for="ano" class="control-label">Ano</label>
								<input type="number" name="ano" class="form-control" id="ano" placeholder="Informe o Ano" >
							</div>	

							<div class="form-group">
							<label for="serie_number" class="control-label">Serie</label>
								<input type="number" name="serie_number" class="form-control" id="serie_number" placeholder="Informe á serie" >
							</div>	
									
								<div class="form-group">
									<label for="serielonga" class="control-label">Serie Longa</label>
									<div class="input-group">
										<input required type="text" class="form-control" id="serie_longa" name="serie_longa"
											placeholder="Informe o nome da serie">
									</div>
								</div>
								<div class="form-group">
									<label for="dataIni" class="control-label">Data Inicial</label>
									<div class="input-group">
  									<input required type="date" class="form-control data_Ini" id="data_Ini" name="data_Ini"
											placeholder="00/00/000">
									
											<label for="dataFim" class="control-label">Data Final</label>
										<input required type="date" class="form-control data_Fim" id="data_Fim" name="data_Fim"
											placeholder="00/00/000">
									
											
									</div>
								</div>	
									
									
									
 								<div class="form-group">
									<label for="vagas" class="control-label">Vagas</label>
									<div class="input-group">
										<input required type="number" placeholder="vagas" id="vagas" class="form-control" >
									</div>
								</div>	
									<div class="form-group">
									<label for="vagas" class="control-label">Matriculados</label>
									
								<input type="number" name="ano" class="form-control" id="ano" placeholder="Informe o Ano" >
									<br>
									
									</div>

									<div class="form-group">
									<label for="caminho_pdf" class="control-label">caminho</label>
									<input type="text" class="form-control" name="caminho_pdf" id="caminho_pdf">
									
									
									</div>	
									<br>
								<div class="form-group">
								<label for="observacao" class="control-label">Observação</label>
									<div class="input-group">
										<textarea class="form-control" id="observacao_serie" name="observacao_serie" rows="2"></textarea>
									</div>
								</div>	
											<br>
								<div class="form-group">
									</label>
									<div class="modal-footer">
										<button id="salvar_series_confirm" type="submit" class="btn btn-success">Salvar</button>
										<button type="cancel" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
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