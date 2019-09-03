<!DOCTYPE html>
<html lang="pt-br">
<?php
    include './connection.php';
    include './functions.php';
    $ano = 2019;
    $cpf = filter_input(INPUT_POST,'cpf',FILTER_SANITIZE_STRING);
    $senha = filter_input(INPUT_POST,'senha',FILTER_SANITIZE_STRING);
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
            $sql = "SELECT * FROM casaresponsavel where cpf = " .$cpf." and senha = '".$senha."';";
        // echo $sql;
            $result = $conn->query( $sql );
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
        <div id="carregando">
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
        $sql = "SELECT casamatricula.*, casaserie.* FROM casamatricula  INNER JOIN casaserie on casamatricula.serie = casaserie.serie where casamatricula.ano = ".$ano." and casamatricula.cpfresponsavel = ".$cpf." and casamatricula.turno = casaserie.turno order by casamatricula.nascimento" ;
        $result = $conn->query( $sql );
        $casamatricula = $result->fetchAll();
        //print_r( $casamatricula );

        $size = count($casaserie);
        /*
        echo  "Size:".$size. "<br/>";
        for ($i = 0; $i < $size; $i++) {
             $value = $casaserie[$i]['serie']. "<br/>";
            echo $value;
        }
        */

        ?>



     <div class="container">
    <form class="form-horizontal" name="matricula_form" id="matricula_form" method="get">
        <input type="hidden" value="<?php echo formatCnpjCpf($cpf) ?>" id="cpf_responsavel">
            
    <div class="row">
            <div class="form-group col-6">
                <label for="cpf">CPF</label>
                <input type="text" class="form-control mr-2 cpf" name="cpf" id="cpf" required="required" maxlength="11" size="8">
            </div>
            <!-- div cpf -->


            <div class="form-group col-6">
                <label for="Nome">Nome</label>
                <input class="form-control mr-2 " type="text" name="nome" id="nome" required="required">
            </div>
            <!-- div nome -->
    </div>
   

        

        

    <div class="row">
            <div class="form-group col-4">
                <label for="nascimento">Nascimento</label>
                <input class="form-control" type="text" id="nascimento" name="nascimento" required="required" onkeyup="MascaraData(this.id)">
            </div>
            <!-- div nascimento -->
           

            <div class="form-group col-3">
                <label for="Sexo">Sexo</label>
                <select class="form-control" name="sexo" id="sexo">
                    <option value=""></option>
                    <option value="M">Masculino</option>
                    <option value="F">Feminino</option>
                </select>
            </div>
            <!--div select Sexo-->
    
            

            <div class="form-group col-3">
                <label for="turno">Turno</label>
                <!-- <select class="form-control" name="turno" id="turno" onchange="atualizarSeries()"> -->
                <select class="form-control" name="turno" id="turno" onchange="serieConsulta()">
                    <option value=""></option>
                    <?php
                        $sql_turno = "SELECT DISTINCT turno FROM casaserie";
                        $sql_turno = $conn->query( $sql_turno );
                        $result_turno = $sql_turno->fetchAll();
                        foreach ($result_turno as $campo)
                        {
                            echo '<option value='.$campo['turno'].'>'.turno($campo['turno']).'</option>';
                        }
                    ?>
                </select>
            </div>
            <!--- div turno -->

            <div class="form-group col-2">
                <label for="serie">Serie</label>
                <input type="hidden" value="" id="serie_number">
                <input type="text" name="serie" id="serie" class="form-control" required="required"  disabled>
            </div>

        
            </div>
        
            <div class="form-group">
                <input type="button" class="btn btn-primary" id="adicionar_aluno" onclick="Enviar();" value="Adicionar" />
            </div>
              

    </form>   <!-- matricula_form -->

<div class="container border">
    <?php  echo '<br> Faixa de Datas:<br>';
        foreach ($casaserie as $campo)
        {
            echo '<br>'.$campo['serie'].' - '.$campo['turno'].' - '.$campo['serie_longa'].' - '.$campo['data_referencia_ini'].' - '.$campo['data_referencia_fim'];
            //echo $campo['ano'].' - '.$campo['serie'].' - '.$campo['serie_longa'].' - '.$campo['vagas'].' - '.$campo[5].'<br>';
        }?>
                        </div><!-- div inner Content -->
            </div><!----- div content -->



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
</div>

</div> <!-- container -->


<!--- importa todas as classes js, para serem carregados em todas as paginas, é só digitar esse comando -->
<?php include("import.phtml"); ?>
</div>
	</body>
</html>