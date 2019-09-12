<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista de alunos</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.min.css">
    <?php	include ('import_css.phtml');?>
    
</head>
<body>
    <div id="carregando" class="carregando">
<header>
			<div class="container block">
				<h2 class="text-center  text-white">Lista de Alunos</h2>
            </div>
            <div>
                <a href="indexconfig.php" style="    color: white;
    margin-left: 20px;
    font-size: 20px;
    font-weight: bold;" ><i class="fas fa-arrow-circle-left" style="color: white"></i> Voltar</a>
            </div>
		</header>

        <div class="container" style="display: block;
    margin-top: 40px;
">
<form method="POST" id = "lista_alunos">
    <div class="row">

        <div class="form-group col-sm-3">
            <select class="form-control" name="turno" id="turno_aluno" >
                                        <option value=""></option>
                                        <option value="M">Manhã</option>
                                        <option value="T">Tarde</option>
            </select>
        </div>
        <div class="form-group" col-3>
        <select class="form-control" name="action_lista" id="action_lista" >
                                        <option value=""></option>
                                        <option value="L">Lista</option>
                                        <option value="C">Lista Completa</option>
            </select>
        
        </div>
        <div class="form-group col-3">
        <button id="botaoteste" type="submit" class="btn btn-primary">Buscar</button>
        </div>
    </div>
    
</form>

</div>
    <div class="container" style="margin-top: 25px;">
   





<table class=' table table-striped table thead-light' id='tabela_alunos_l'>
                            <thead class='thead-light'>
                                <tr class="text-center">    
                                    <th>CPF</th>
                                    <th>Nome</th>
                                    <th>Sexo</th>
                                    <th>Nascimento</th>
                                    <th>Turno</th>
                                    <th>vaga</th>
                                </tr>
                            </thead>
                            <tbody id="tabela_alunos_body">
                                <tr>
                        </table>

                        <table class=' table table-striped table thead-light' id='tabela_alunos_c'>
                            <thead class='thead-light'>
                                <tr class="text-center">
                                    
                                   
                                    <th>CPF</th>
                                    <th>Aluno(a)</th>
                                    <th>Sexo</th>
                                    <th>Nascimento</th>
                                    <th>Turno</th>
                                    <th>Vaga</th>
                                    <th>Responsável</th>
                                    <th>Telefone</th>
                                </tr>
                            </thead>
                            <tbody id="tabela_alunos_body_c">
                                <tr>
                        </table>




</div>
</div>
<script src="js/jquery-3.4.1.js"></script>
<script src = "js/jquery-ui.min.js"></script>
<script src="js/jquery.blockUI.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap-datepicker.min.js"></script>
<script src = "js/jquery.growl.js"></script>
<script src="js/locales/bootstrap-datepicker.pt-BR.min.js"></script>
<script src = "js/principal.js"></script>
<script src = "js/recuperar_senha.js"></script>
<script src = "js/series_config.js"></script>
<script src = "js/form_config.js"></script>
<script src="js/configuracoes.js"></script>
<script src="js/jquery.mask.min.js"></script>

</body>
</html>