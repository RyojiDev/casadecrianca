<?php
    include './connection.php';
    include './functions.php';
    $ano = 2019;
    $nascimento = strtr($_GET["nascimento"], '/', '-');
    $nascimento = date('Y-m-d', strtotime($nascimento));
    $optionTurno = "'<option value=''></option>'";

    if ($nascimento != "")  {
      $conn = getConnection();
      $sql_turno = "SELECT DISTINCT turno FROM casaserie where ano = ".$ano. " and '".$nascimento."' between data_referencia_ini and data_referencia_fim order by data_referencia_ini";
      $sql_turno = $conn->query( $sql_turno );
      $result_turno = $sql_turno->fetchAll();
      foreach ($result_turno as $campo)
      {
          $optionTurno .= '<option value='.$campo['turno'].'>'.turno($campo['turno']).'</option>';
      }
      echo $optionTurno;
      return $optionTurno;
    }else{

      echo "não foi possivel consultar";
    }
?>
