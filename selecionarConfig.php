<?php

  $ano = 2019;
  include './connection.php';
  include './functions.php';

  date_default_timezone_set('America/Fortaleza');
  $data = new DateTime();
  //echo "On-Line:". $data->format('Y-m-d H:i:s');
  $data_hoje = $data->format('Y-m-d');
  $hora_hoje = date('H:i:s');
  $hora_hoje = str_replace(":", "", $hora_hoje);
  //echo "Data Hj:".$data_hoje."<br>";
  
  $conn = getConnection();
  $sql = "SELECT * FROM casamatriculaconfig where ano = ". $ano ." and '".$data_hoje."' between data_ini and data_fim" ;
  $result = $conn->query( $sql );
  $ano = 0;
  foreach($result as $row)
			{
				$ano      = $row['ano'];
				$data_ini = $row['data_ini'];
				$hora_ini = $row['hora_ini'];
				$data_fim = $row['data_fim'];
				$hora_fim = $row['hora_fim'];
			}
  If ($ano > 0) {

	  $hora_ini = (preg_replace("/(\d{2})(\d{2})/", "\$1:\$2:", $hora_ini));
	  $hora_fim = (preg_replace("/(\d{2})(\d{2})/", "\$1:\$2:", $hora_fim));
	  $horaatual = strtotime("now");
	  $hora_ini  = strtotime($hora_ini);
	  $hora_fim  = strtotime($hora_fim);

//echo "Ano:".$ano." Hora Ini:".$hora_ini." Hora Fim:".$hora_fim ." Hoje:".$data_hoje ." Data Ini:". $data_ini ." Data Fim:". $data_fim."<br>";

	  $retorno = 0;
	  
	  if ($data_hoje == $data_ini){if ($horaatual >= $hora_ini){ $retorno = 1;}}
	  
	  if ($data_hoje == $data_fim){ if ($horaatual <= $hora_fim){ $retorno = 1;}}
	  
	  if ($data_hoje > $data_ini && $data_hoje < $data_fim) {$retorno = 1;}
	  
      if ($retorno == 1) {
		echo "true";
		return true;
		  
	  } else {
		echo "false";
		return false;
	  }
  } else {
		echo "false";
		return false; 
  }

?>
