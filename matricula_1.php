<!DOCTYPE html>
<html>
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

                //echo "CPF:".$cpf;
                //echo " Ano:".$ano;
                //echo $senha;
                //echo "   NOME:".$nome;
               // echo $telefone;
               // echo $email;


                if (!empty($cpf) && !empty($senha) && empty($nome) ){

                    $conn = getConnection();
                    $sql = "SELECT * FROM casaresponsavel where cpf = '" .$cpf."'' and senha = '".$senha."';";
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
                    $sql = "SELECT serie, serie_longa, data_referencia, vagas FROM casaserie where ano = ".$ano. " and turno='".$turno. "' and '".$dataNascimento."' between data_referencia_ini and data_referencia_fim order by data_referencia";
                    $result = $conn->query( $sql );
                    $casaserie = $result->fetchAll();
                    return $casaserie;
                  }

                ?>


    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Collapsible sidebar using Bootstrap 4</title>

        <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="css/style.css">

        <!-- Font Awesome JS -->
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    </head>

    <body>
        <?php
        $ano = $casaresponsavel[0]['ano'];
        $cpf = $casaresponsavel[0]['cpf'];
        $sql = "SELECT serie, turno, serie_longa, data_referencia_ini, data_referencia_fim FROM casaserie where ano = ".$ano." order by data_referencia_ini";
        $result = $conn->query( $sql );
        $casaserie = $result->fetchAll();
        //print_r( $casaserie );
        $sql = "SELECT * FROM casamatricula where ano = ".$ano." and cpfresponsavel = ".$cpf;
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


<div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Bootstrap Sidebar</h3>
            </div>

            <ul class="list-unstyled components">
                <p>Dummy Heading</p>
                <li class="text-center">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Home</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                    <li class="nav-item item-li-cpf">
        <!-- <a href="" id="">     -->
        <h4><p><?php echo "CPF:".formatCnpjCpf($cpf) ?></p></h4>
        <h6><?php echo $nome ?></h6>
        <!-- </a> -->

    </li>
                     <li>
                    <a href="#">About</a>
                </li>


            </ul>

            <ul class="list-unstyled CTAs">
                <li>
                    <a href="https://bootstrapious.com/tutorial/files/sidebar.zip" class="download">Download source</a>
                </li>
                <li>
                    <a href="https://bootstrapious.com/p/bootstrap-sidebar" class="article">Back to article</a>
                </li>
            </ul>
        </nav>


        <div id="content">

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">

        <button type="button" id="sidebarCollapse" class="btn btn-info">
            <i class="fas fa-align-left"></i>
            <span>Toggle Sidebar</span>
        </button>
        <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-align-justify"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Page</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Page</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Page</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Page</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<form name="matricula_form" id="matricula_form" method="get">
    <div class="row">
        <div class="form-group col-4">
            <label for="cpf">CPF</label>
            <input type="text" class="form-control cpf" name="cpf" id="cpf" required="required" maxlength="11" size="8">
        </div>
        <!-- div cpf -->


        <div class="form-group col-6">
            <label for="Nome">Nome</label>
            <input class="form-control" type="text" name="nome" id="nome" required="required">
        </div>
        <!-- div nome -->

        <div class="form-group col-2">
            <label for="Sexo">Sexo</label>
            <select class="form-control" name="sexo" id="sexo">
                <option value=""></option>
                <option value="M">Masculino</option>
                <option value="F">Feminino</option>
            </select>
        </div>
        <!--div select Sexo-->

    </div>
    <!--- div row -->

    <div class="row">
        <div class="form-group col-2">
            <label for="nascimento">Nascimento</label>
            <input class="form-control" type="text" id="nascimento" name="nascimento" required="required" onkeyup="MascaraData(this.id)">
        </div>
        <!-- div nascimento -->

        <div class="form-group col-2">
            <label for="turno">Turno</label>
            <select class="form-control" name="turno" id="turno" onchange="atualizarSeries()">
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
            <input type="text" name="serie" id="serie" class="form-control" required="required" disabled>
        </div>

    </div>
    <!---- div row nascimento -->

    <div class="row">
        <div class="form-group col-2">
            <input type="button" class="btn btn-primary" value="Adicionar" />
        </div>
    </div>

</form>
</div>
</div>

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
                                <th>NOME</th>
                                <th>SEXO</th>
                                <th>NASCIMENTO</th>
                                <th>TURNO</th>
                                <th>SERIE</th>
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
                $return.= "<td>" . utf8_encode($campo["nascimento"]) . "</td>";
                $return.= "<td>" . utf8_encode($campo["serie"]) . "</td>";
                $return.= "<td>" . utf8_encode($campo["vaga"]) . "</td>";
                $return.= "</tr>";
            }

            echo $return.="</tbody></table>";
    ?>

    <!--- importa todas as classes js, para serem carregados em todas as paginas, é só digitar esse comando -->
    <?php include("import.phtml"); ?>


            <script type="text/javascript">
                $(document).ready(function() {
                    $('#sidebarCollapse').on('click', function() {
                        $('#sidebar').toggleClass('active');
                    });
                });
            </script>
    </body>

</html>