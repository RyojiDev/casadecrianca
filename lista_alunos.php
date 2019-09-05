<?php
  include './connection.php';
  include './functions.php';


// echo "<pre>";
// print_r($_POST);
//     echo "</pre>";
    $ano = 2019;
    $cpf = $_POST['cpfresponsavel'];
    $cpf = removepontocpf($cpf);
    $conn = getConnection();
    $sql = "SELECT casamatricula.*, casaserie.* FROM casamatricula  INNER JOIN casaserie on casamatricula.serie = casaserie.serie where casamatricula.ano = ".$ano." and casamatricula.cpfresponsavel = ".$cpf." and casamatricula.turno = casaserie.turno order by casamatricula.nascimento" ;

    $result = $conn->query( $sql );

    $casamatricula = $result->fetchAll();
    foreach ($casamatricula as $campo)
{ $tabela = "<tr>".
 "<td>" . formatCnpjCpf(utf8_encode($campo["cpf"])) . "</td>".
 "<td>" . utf8_encode($campo["nome"]) . "</td>".
 "<td>" . utf8_encode($campo["sexo"]) . "</td>".
 "<td>" . formataData(utf8_encode($campo["nascimento"])) . "</td>".
 "<td>" . turno(utf8_encode($campo["turno"])) . "</td>".
 //"<td>" . utf8_encode($campo["serie"]) ."-".utf8_encode($campo["serie_longa"]). "</td>".
 "<td>" . utf8_encode($campo["serie_longa"]). "</td>".
 "<td>" . status($campo["vagas"],$campo["vaga"])."</td>".
 "<td>" . statusArquivo($campo["vagas"],$campo["vaga"],$campo["caminho_pdf"])."</td>. </tr>";

 echo $tabela;

}


?>