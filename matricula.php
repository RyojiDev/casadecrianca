<!DOCTYPE html>
<html lang="pt-br">
<?php
    include './connection.php';
    include './functions.php';



    $ano = 2019;
    $cpf = filter_input(INPUT_POST,'cpf',FILTER_SANITIZE_STRING);
    $senha = md5(filter_input(INPUT_POST,'senha',FILTER_SANITIZE_STRING));
    $nome = filter_input(INPUT_POST,'nome',FILTER_SANITIZE_STRING);
    $telefone = filter_input(INPUT_POST,'tel',FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL);



    // Removendo caracteres ao salvar no banco.
    $cpf = str_replace(".", "", $cpf);
    $cpf = str_replace("-", "", $cpf);
    $telefone = str_replace("(", "", $telefone);
    $telefone = str_replace(")", "", $telefone);
    $telefone = str_replace("-", "", $telefone);

    $conn = getConnection();
    $sql = "SELECT * FROM casamatriculaconfig where ano = $ano";
    $result = $conn->query( $sql );
    $casamatriculaconfig = $result->fetchAll();
    $cabecalho = $casamatriculaconfig[0]['cabecalho'];

        //echo "CPF:".$cpf;
        //echo " Ano:".$ano;
        //echo $senha;
        //echo "   NOME:".$nome;
       // echo $telefone;
       // echo $email;


        if (!empty($cpf) && !empty($senha) && empty($nome) ){

            $conn = getConnection();
            $sql = "SELECT * FROM casaresponsavel where cpf = '" .$cpf."' and senha = '".$senha."';";
        // echo $sql;
            $result = $conn->query( $sql );
            //echo $count = $result->rowCount();
            $casaresponsavel = $result->fetchAll();
            $nome =  $casaresponsavel[0]['nome'];
           // echo $nome;
            if (empty($casaresponsavel)) {
                //echo "<script>alert('There are no fields to generate a report');</script>"
                header('Location: index.php');
            } else{
              //  print_r( $casaresponsavel );
            }
        }

        if (!empty($cpf) && !empty($senha) && !empty($nome) && !empty($telefone) && !empty($email) ){
            include './connection.php';

            $conn = getConnection();
            $sql = "INSERT INTO casaresponsavel (ano, cpf, nome, senha, telefone, email)
            VALUES (:ano, :cpf, :nome, :senha, :telefone, :email)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':ano', $ano);
            $stmt->bindParam(':cpf', $cpf);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':senha', $senha);
            $stmt->bindParam(':telefone', $telefone);
            $stmt->bindParam(':email', $email);
            if($stmt->execute()){
                echo "Salvo com Sucesso!";
                unset($nome);
                unset($telefone);
                unset($email);
                header('Location: index.php');
            } else {
                echo "Erro ao Salvar!";
            }

        }

        //Olhar e apagar...
        function SeriesMenor($ano, $dataNascimento, $turno) {
            $conn = getConnection();
            $sql = "SELECT serie, serie_longa, vagas FROM casaserie where ano = ".$ano. " and turno='".$turno. "' and '".$dataNascimento."' between data_referencia_ini and data_referencia_fim order by data_referencia";
            $result = $conn->query( $sql );
            $casaserie = $result->fetchAll();
            return $casaserie;
          }

        ?>

	<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Colégio Casa de Criança</title>

        <?php include("import_css.phtml"); ?>
		<link rel="icon" href="favicon.ico" type="image/x-icon">
		<link rel="stylesheet" type="text/css" href="css/reset.css">
        <link rel="stylesheet" type="text/css" href="css/index.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">


	</head>
	<body>
        <div  id="carregando">
    <div id="content">
        <div id="inner-content">
        <?php include ('menu_bar.php') ?>

    <header>
            <div class="container">
			</div>
		</header>

        <?php



        $ano = $casaresponsavel[0]['ano'];
        $cpf = $casaresponsavel[0]['cpf'];

        $sql = "SELECT serie, turno, serie_longa, data_referencia_ini, data_referencia_fim FROM casaserie where ano = ".$ano." order by data_referencia_ini";
        $result = $conn->query( $sql );
        $casaserie = $result->fetchAll();

        //print_r( $casaserie );

        $sql = "SELECT casamatricula.*, casaserie.* FROM casamatricula  INNER JOIN casaserie on casamatricula.serie = casaserie.serie where casamatricula.ano = ".$ano." and casamatricula.cpfresponsavel = '".$cpf."' and casamatricula.turno = casaserie.turno order by casamatricula.nascimento" ;
        // echo $sql;
        $result = $conn->query( $sql );
        $casamatricula = $result->fetchAll();
        //print_r( $casamatricula );



        ?>

<div class="card text-center bg-primary my-5 col-6" id="enquantocarrega">
  <div class="card-header">
    Aguarde...
  </div>
  <div class="card-body">

    <p class="card-text"><h1><?php
     echo utf8_encode($cabecalho = $casamatriculaconfig[0]['descricao']);?></p>

  </div>
  <div class="card-footer text-muted">

  </div>
</div>







<div id="aguardando">
     <div class="container">
         <form class="form-horizontal " name="matricula_form" id="matricula_form" method="get">
             <input type="hidden" value="<?php echo formatCnpjCpf($cpf) ?>" id="cpf_responsavel">

             <div class="row">
                 <div class="form-group col-sm-4 col-lg-2">
                     <label for="cpf">CPF</label>
                     <input type="text" class="form-control mr-2 cpf" name="cpf" id="cpf" required="required" maxlength="11" size="8" placeholder="Aluno(a)" onkeyup="cpfConsulta()" >
                 </div>
                 <!-- div cpf -->


                 <div class="form-group col-sm-4 col-lg-4">
                     <label for="Nome">Nome</label>
                     <input class="form-control mr-2 " type="text" name="nome" id="nome" placeholder="Aluno(a)" required="required" disabled>
                 </div>
                 <!-- div nome -->

                 <div class="form-group col-sm-2 col-lg-2">
                     <label for="Sexo">Sexo</label>
                     <select class="form-control" name="sexo" id="sexo" >
                         <option value=""></option>
                         <option value="M">Masculino</option>
                         <option value="F">Feminino</option>
                     </select>
                 </div>
                 <!--div select Sexo-->
    </div>


        <div class="row">


            <div class="form-group col-sm-2 col-lg-2">
                    <label for="nascimento">Nascimento</label>
                    <input class="form-control" type="text" id="nascimento" name="nascimento" placeholder="Aluno(a)" required="required" onkeyup="MascaraData(this.id)" onchange="serieTurno()">

            </div>
                <!-- div nascimento -->

            <div class="form-group col-sm-2 col-lg-2">
                    <label for="turno">Turno</label>
                    <!-- <select class="form-control" name="turno" id="turno" onchange="atualizarSeries()"> -->
                    <select class="form-control" name="turno" id="turno" onchange="serieConsulta()">

                    </select>
            </div>
                <!--- div turno -->

            <div class="form-group col-sm-2 col-lg-2">
                    <label for="serie">Série</label>
                    <input type="hidden" value="" id="serie_number">
                    <input type="text" name="serie" id="serie" class="form-control" required="required"  disabled>
            </div>

            <div class="form-group col-sm-2 col-lg-4">
                    <input type="button" class="btn btn-primary" id="adicionar_aluno"  value="Adicionar" />
            </div>

        </div>

    </form>   <!-- matricula_form -->

<div class="container">

                        </div><!-- div inner Content -->
            </div><!----- div content -->
<div class="container">
<table class=' table table-striped table thead-light' id='tabela_matricula'>
      <thead class='thead-light'>
          <tr class="text-center">
              <th>CPF</th>
              <th>Nome</th>
              <th>Sexo</th>
              <th>Nascimento</th>
              <th>Turno</th>
              <th>Série</th>
              <th>Status</th>
              <th>#</th>
          </tr>
      </thead>
      <tbody id="tabela_matricula_body">
      <tr>




</div>



</div>

</div> <!-- container -->


<!--- importa todas as classes js, para serem carregados em todas as paginas, é só digitar esse comando -->
<?php include("import.phtml"); ?>

</div>
</div>



</div>



<script src = "js/matricula.js"></script>



	</body>
</html>