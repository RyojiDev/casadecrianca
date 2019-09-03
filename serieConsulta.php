<?php
    include './connection.php';
    include './functions.php';
    $ano = 2019;
    //$turno = filter_input($_POST,'turno',FILTER_SANITIZE_STRING);
    //$nascimento = strtr($_POST["nascimento"], '/', '-');

    // if( isset($_GET) && !empty($_GET)){
    //   echo "<pre>";
    //   print_r($_GET);
    //   echo "</pre>";
    // }
    $turno      = $_GET["turno"];
    $nascimento = strtr($_GET["nascimento"], '/', '-');
    $nascimento = date('Y-m-d', strtotime($nascimento));

    // echo "<pre>";
    // echo $nascimento;
    // echo $turno;
    // echo "</pre>";
    

    if (($turno != "") || ($nascimento != ""))  {
      $conn = getConnection();
      $sql = "SELECT serie, serie_longa FROM casaserie where ano = ".$ano. " and turno='".$turno. "' and '".$nascimento."' between data_referencia_ini and data_referencia_fim order by data_referencia_ini";
      // echo $sql;
      $result = $conn->query( $sql );
      $casaserie = $result->fetchAll();

      foreach ($casaserie as $campo)
        {
            echo $campo['serie'].'-'.$campo['serie_longa'];
           
            
            
        }
      return $casaserie;
    }else{
     
      echo "não foi possivel consultar";
    }
?>
