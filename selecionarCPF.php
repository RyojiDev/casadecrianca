<?php
    include './connection.php';
    include './functions.php';
    $ano = 2019;
    $cpf = $_GET["cpf"];
    $cpf = removepontocpf($cpf);
    $X = "";

    if ($cpf != "")  {
      $conn = getConnection();
      $sql = "SELECT cpf FROM casamatricula where ano = ".$ano. " and cpf='".$cpf."'";
      $result = $conn->query( $sql );
      $cpfRetorno = $result->fetchAll();
      foreach ($cpfRetorno as $campo)
      {
          $X = $campo['cpf'];
      }
      echo $X;
    }else{
      echo "não foi possivel consultar";
    }
?>
