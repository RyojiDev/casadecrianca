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
			{ $tabela = "<tr id=".$campo["ano"].">".
			//"<td>" . ($campo["ano"]) . "</td>".
			"<td>" . formataData($campo["data_ini"]) . "</td>".
			"<td>" . formatHora($campo["hora_ini"]) . "</td>".
			"<td>" . formataData($campo["data_fim"]) . "</td>".
		  "<td>" . formatHora($campo["hora_fim"]) . "</td>".
			"<td>" . $campo["cabecalho"] . "</td>".
			"<td>" . $campo["descricao"] . "</td>".
			"<td>" . $campo["observacao"] ."</td>".
			"<td><button class='btn btn-info atualizar_config' id=".$campo["ano"]."><i class='fas fa-edit' aria-hidden='true'></i></button></td></tr>";

			 echo $tabela;

			}
		}
?>
