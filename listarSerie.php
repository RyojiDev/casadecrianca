<?php

    include './connection.php';
	include './functions.php';
	
	$ano     = 2019;
	$action  = $_POST["action"];
	
	
    
		if ($action == "listar")
		{
			$conn = getConnection();
			$sql = "SELECT * FROM casaserie WHERE ano =".$ano." order by serie;" ;

			$result = $conn->query( $sql );

			$casaserie = $result->fetchAll();
			
			foreach ($casaserie as $campo){
			
				$tabela = "<tr id=".$campo["serie"].$campo["turno"].">".
			//"<td>" . ($campo["ano"]) . "</td>".
			"<td>" . ($campo["serie"]) . "</td>".
			"<td>" . $campo["serie_longa"] . "</td>".
			"<td>" . turno($campo["turno"]) . "</td>".
			"<td>" . formataData($campo["data_referencia_ini"]) . "</td>".
			"<td>" . formataData($campo["data_referencia_fim"]) . "</td>".
			"<td>" . $campo["vagas"] . "</td>".
			"<td>" . $campo["matriculados"] . "</td>".
			"<td>" . ($campo["caminho_pdf"]) . "</td>".
			"<td>" . $campo["observacao"]."</td>".
			"<td><button class='btn btn-info atualizar_series' id=".$campo["serie"].$campo["turno"]."><i class='fas fa-edit' aria-hidden='true'></i></button></td></tr>";

			 echo $tabela;

			}
		}
?>
