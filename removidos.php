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