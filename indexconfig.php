<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Colégio Casa de Criança</title>
		<link rel="icon" href="favicon.ico" type="image/x-icon">
		<link rel="stylesheet" type="text/css" href="css/reset.css">
		<link rel="stylesheet" type="text/css" href="css/index.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.min.css">
	<?php	include ('import_css.phtml'); include './connection.php'; include './functions.php';?>

	</head>

	<body>
<div id="carregando">
		<header>
			<div class="container block">
				<h2 class="text-center text-color-white">Configuração de Matriculas</h2>
			</div>
		</header>


		<p><button class="btn btn-warning btn-sm" id="export-txt" data-toggle="modal" data-target="#confirm-export" style="margin-left: 5px;"><i class="fas fa-file-export"></i>Exportar TXT</button></p>
<div class="container my-5 ">
		<div class="row">
  <div class="col-sm-6 ">
    <div class="card config w-70 h-100 bg-light text-black">
      <div class="card-body">
        <p class="text-center"><button class="btn btn-success  " data-toggle="modal" data-target="#modal_config">Definições</button></p>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card config w-70 h-100 bg-primary text-white">
      <div class="card-body">
		  <div class="btn-group">
		<p class="text-center"><button class="btn btn-success " id="chamar_modal_series" data-toggle="modal" data-target="#modal_series">Cadastro de Série</button></p>
		
		
		</div>
      </div>
    </div>
  </div>
</div>
</div>



<div class="container">
<table class=' table table-striped table thead-light' id='tabela_config'>
      <thead class='thead-light'>
          <tr class="text-left">
              <!-- <th>Ano</th> -->
              <th>Data Inicial</th>
              <th>Hora Inicial</th>
              <th>Data Final</th>
              <th>Hora Final</th>
              <th>Cabeçalho</th>
              <th>Descrição</th>
              <th>Informação</th>
          </tr>
      </thead>
      <tbody id="tabela_config_body">
      <tr>




</div>

    <div class="container">

      <table class=' table table-striped table thead-light' id='tabela_serie'>
      <thead class='thead-light'>
          <tr class="text-left">
             <!-- <th>Ano</th> -->
              <th>Série</th>
              <th>Descrição</th>
			  <th>Turno</th>
              <th>Faixa Inicial</th>
              <th>Faixa Final</th>
              <th>Vagas</th>
              <th>Matriculados</th>
              <th>Anexo</th>
              <th>Observação</th>
          </tr>
      </thead>
     < <tbody id="tabela_serie_body">

  
      <tr>

	 


</div>



		
			

			<!---------------------------- Modal Config --------------------------------------------->
			

		</div><!--- div Carregando -->

		<div class="modal fade" tabindex="-1" role="dialog" id="modal_config">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<form method="POST" name="form_config" class="form-horizontal" id="form_config">
						<div class="modal-header">
							<h5>Definições</h5>
						</div>
						<div class="modal-body">
							<input type="hidden" action="inserir" name="action" value="inserir">
						<div class="row">			
									<div class="form-group col-sm-6">
									<label for="dataIni" class="control-label">Data Inicial</label>
										
										<input required type="date" class="form-control dataIni date-format" id="dataIni" name="dataIni"
											placeholder="00/00/000">
									</div>
									<div class="form-group col-sm-6">		
										<label for=" horaIni" class="control-label">Hora Inicial</label>
										<input required type="text" class="form-control horaIni" id="horaIni" name="horaIni"
											placeholder="00:00:00">
										
									</div>
						</div><!-- row config 1-->			
									
						<div class="row">
									<div class="form-group col-sm-6">
									<label for="dataFim" class="control-label">Data Final</label>
										<input required type="date" class="form-control dataFim" id="dataFim" name="dataFim"
											placeholder="00/00/000">
									</div>
									<div class="form-group col-sm-6">		
										<label for=" horaFim" class="control-label">Hora Final</label>
										<input required type="text" class="form-control horaFim" id="horaFim" name="horaFim"
											placeholder="00:00:00">
									</div>
						</div><!-- div row config 2-->	
							<div class="form-group">
								<label for="cabecalho" class="control-label">Cabeçalho</label>
								<div class="input-group">
									<input required type="text" class="form-control" id="cabecalho" name="cabecalho"
										placeholder="Informe o Cabeçalho">
								</div>
							</div>
							
							<div class="form-group">
								<label for="descricao" class="control-label">Descrição</label>
								<div class="input-group">
									<textarea class="form-control" id="descricao" name="descricao" rows="2"></textarea>
								</div>
							</div>
							
							<div class="form-group">
								<label for="observacao" class="control-label">Observação</label>
								<div class="input-group">
									<textarea class="form-control" id="observacao" name="observacao" rows="2"></textarea>
								</div>
							</div>
							
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
								<h5>Cadastro de Séries</h5>
							</div>
						<div class="modal-body">
						
							<input type="hidden" action="inserir" name="action" value="inserir">
							<div class="form-group">
							<!--
							<label for="ano" class="control-label">Ano</label>
								<input type="number" name="ano" class="form-control" id="ano" placeholder="Informe o Ano" >
							</div>	
							-->
						<div class="row">
							<div class="form-group col-sm-3">
							<label for="serie_number" class="control-label">Serie</label>
								<input type="number" name="serie_number" class="form-control" id="serie_number" placeholder="Informe á serie" >
							</div>	
							
								<div class="form-group col-sm-4">
									<label for="serielonga" class="control-label">Descrição</label>
									<div class="input-group">
										<input required type="text" class="form-control" id="serie_longa" name="serie_longa"
											placeholder="Informe a descrição da serie">
									</div>
								</div>
						
								<div class="form-group col-sm-5">
							<label for="turno" class="control-label">Turno</label>
								<input type="text" name="turno" class="form-control" id="turno" placeholder="Informe o Turno" >
							</div>	
						</div><!---row-->	

						<div class="row ">
								<div class="form-group col-sm-5">
									<label for="dataIni" class="control-label">Faixa Inicial</label>
							
  									<input required type="date" class="form-control data_Ini" id="data_Ini" name="data_Ini"
											placeholder="00/00/000">
								</div>
									<div class="form-group col-sm-5">
											<label for="dataFim" class="control-label">Faixa Final</label>
										<input required type="date" class="form-control data_Fim" id="data_Fim" name="data_Fim"
											placeholder="00/00/000">
									</div>
											
									
																																
 								<div class="form-group col-sm-2">
									<label for="vagas" class="control-label">Vagas</label>
									<div class="input-group">
										<input required type="text" placeholder="vagas" id="vagas" class="form-control" >
									</div>
								</div>
						</div><!--- row 2--->

						<div class="row">				
									<div class="form-group col-sm-4">
										<label for="matriculados" class="control-label">Matriculados</label>							
										<input type="number" name="matriculados" class="form-control" id="matriculados" placeholder="quantidade de matriculados" >
									</div>

									<div class="form-group col-sm-8">
									<label for="caminho_pdf" class="control-label text-center">Anexo</label>
									<input type="text" class="form-control" name="caminho_pdf" id="caminho_pdf">
									
									
									</div>	
						</div><!--- row 3-->			
								<div class="form-group">
								<label for="observacao" class="control-label">Observação</label>
									<div class="input-group">
										<textarea class="form-control" id="observacao_serie" name="observacao_serie" rows="2"></textarea>
									</div>
								</div>	
											
								<div class="form-group">
									</label>
									<div class="modal-footer">
										<button id="atualizar_series_confirm" type="submit" class="btn btn-primary">Atualizar</button>
										<button id="salvar_series_confirm" type="submit" class="btn btn-success">Salvar</button>
										<button type="cancel" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
									</div>
								</div>
								</div>
					</div>	
				</div>		
			</div>
			</div>				


			<!------ confirmar Exportação de TXT ------>

			<div class="modal fade" id="confirm-export" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Exportar Para TXT</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Tem certeza que deseja Exportar os Dados ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" id="exportar" class="btn btn-success"><i class="fas fa-file-export"></i>Exportar</button>
      </div>
    </div>
  </div>

	<?php include("import.phtml"); ?>

	

	</body>
	<script> listar_config(); listar_series(); </script>

</html>