<?php

    include './connection.php';
	include './functions.php';
	
	$ano     = 2019;
    $action  = $_POST["action"];
    
		if ($action == "listar")
		{
			$conn = getConnection();
			$sql = "SELECT * FROM casamatriculaconfig WHERE ano = ".$ano." ;" ;

			$result = $conn->query( $sql );

			$casamatriculaconfig = $result->fetchAll();
			foreach ($casamatriculaconfig as $campo)
			{ $tabela = "<tr>".
			//"<td>" . ($campo["ano"]) . "</td>".
			"<td>" . formataData($campo["data_ini"]) . "</td>".
			"<td>" . formatHora($campo["hora_ini"]) . "</td>".
			"<td>" . formataData($campo["data_fim"]) . "</td>".
		    "<td>" . formatHora($campo["hora_fim"]) . "</td>".
			"<td>" . utf8_encode($campo["cabecalho"]) . "</td>".
			"<td>" . utf8_encode($campo["descricao"]) . "</td>".
			"<td>" . utf8_encode($campo["observacao"]) ."</td> </tr>";

			 echo $tabela;

			}
		}
?>
