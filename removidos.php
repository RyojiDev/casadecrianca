//matricula.php, linha antes da tabela

<?php  echo '<br> Faixa de Datas:<br>';
        foreach ($casaserie as $campo)
        {
            echo '<br>'.$campo['serie'].' - '.$campo['turno'].' - '.$campo['serie_longa'].' - '.$campo['data_referencia_ini'].' - '.$campo['data_referencia_fim'];
            //echo $campo['ano'].' - '.$campo['serie'].' - '.$campo['serie_longa'].' - '.$campo['vagas'].' - '.$campo[5].'<br>';
        }?>


// Tabela Antiga

<?php

$tabela = "<table class=' table table-striped table thead-light' id='tabela_matricula'>
      <thead class='thead-light'>
          <tr>
              <th>CPF</th>
              <th>Nome</th>
              <th>Sexo</th>
              <th>Nascimento</th>
              <th>Turno</th>
              <th>Série</th>
              <th>Status</th>
              <th></th>
          </tr>
      </thead>
      <tbody>
      <tr>";
$return = "$tabela";
foreach ($casamatricula as $campo)
{
$return.= "<td>" . formatCnpjCpf(utf8_encode($campo["cpf"])) . "</td>";
$return.= "<td>" . utf8_encode($campo["nome"]) . "</td>";
$return.= "<td>" . utf8_encode($campo["sexo"]) . "</td>";
$return.= "<td>" . formataData(utf8_encode($campo["nascimento"])) . "</td>";
$return.= "<td>" . turno(utf8_encode($campo["turno"])) . "</td>";
$return.= "<td>" . utf8_encode($campo["serie"]) ."-".utf8_encode($campo["serie_longa"]). "</td>";
$return.= "<td>" . status($campo["vagas"],$campo["vaga"])."</td>";
$return.= "<td>" . statusArquivo($campo["vagas"],$campo["vaga"],$campo["caminho_pdf"])."</td>";
$return.= "</tr>";
}

echo $return.="</tbody></table>";
?>





<div class="modal fade" tabindex="-1" role="dialog" id="modal_cadastro">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<form method="POST" name="form_cadastro" class="form-horizontal" id="form_cadastro">
					<div class="modal-header">
						<h5>Cadastro do Responsável</h5>
					</div>
					<div class="modal-body">
					<div class="row">
						<div class="form-group col-sm-12">
							<label for="cpf" class="control-label">CPF</label>
							<input required type="text" class="form-control cpf valida" id="cpf" name="cpf"
								placeholder="000.000.000-00">
						</div>
					</div><!--- div row cpf-->
					<div class="row">	
						<div class="form-group col-sm-6">
						<label for="senha" class="control-label ">Senha</label>
						
							<input required type="password" class="form-control valida " id="senha"  class="senha"	name="senha"  placeholder="Digite sua Senha">
						</div>
						<div class="form-group col-sm-5">	
						<label for="senhaC" class="control-label ">Confirmar Senha</label>

							<input required type="password" class="form-control valida " id="senhaC" class="senhaC" name="senhaC" placeholder="Confirme sua Senha" ><span class="glyphicon glyphicon glyphicon-eye-open form-control-feedback"><img class="olho" id="olho" src="img/olho.png" /></span>
							<span class="error text-left" id="errortxt" style="color:#FF0000; font-size:10px float: right;"></span>
						</div>
					</div><!-- div row - senha-->	
						
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
