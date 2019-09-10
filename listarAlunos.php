<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title> Listar Alunos </title>
  <script src='js/jquery-3.3.1.min.js'></script>
  <script src='js/principal.js'></script>
</head>
<body>
<?php

  include './connection.php';
	include './functions.php';

	$ano     = 2019;
	$action = "listar";
	$serie  =  1;
 	$turno  = "M";
  //$action  = $_POST["action"];
  //$serie   = $_POST["serie"];
  //$turno   = $_POST["turno"];
	if ($action == "listar")
	{
		$conn = getConnection();
		//$sql = "SELECT casamatricula.*, casaserie.serie_longa FROM casamatricula  INNER JOIN casaserie on casamatricula.serie = casaserie.serie where casaserie.ano = ".$ano." and casaserie.serie = " .$serie. " and casaserie.turno = '" . $turno. "' order by casamatricula.vaga" ;
		$sql = "SELECT m.* FROM casamatricula as m  where m.ano = ".$ano." and m.serie = " .$serie. " and m.turno = '" . $turno. "' order by m.vaga" ;
		echo $sql;
		$result = $conn->query( $sql );
		$casamatricula = $result->fetchAll();
		foreach ($casamatricula as $campo)

		{ $tabela = "<tr>".
			"<td>" . formatCnpjCpf(utf8_encode($campo["cpf"])) . "</td>".
			"<td>" . utf8_encode($campo["nome"]) . "</td>".
			"<td>" . utf8_encode($campo["sexo"]) . "</td>".
			"<td>" . formataData(utf8_encode($campo["nascimento"])) . "</td>".
			"<td>" . turno(utf8_encode($campo["turno"])) . "</td>".
			"<td>" . utf8_encode($campo["vaga"]). "</td></tr>";
			echo $tabela;

	}

	}
		if ($action == "listarCompleto")
		{
			$conn = getConnection();
			//$sql = "SELECT casamatricula.*, casaserie.serie_longa FROM casamatricula  INNER JOIN casaserie on casamatricula.serie = casaserie.serie where casaserie.ano = ".$ano." and casaserie.serie = " .$serie. " and casaserie.turno = '" . $turno. "' order by casamatricula.vaga" ;
			$sql = "SELECT m.*, r.nome as r_nome, r.telefone  FROM casamatricula as m  INNER JOIN casaresponsavel as r on m.cpfresponsavel = r.cpf where m.ano = ".$ano." and m.serie = " .$serie. " and m.turno = '" . $turno. "' order by m.vaga" ;
			echo $sql;
			$result = $conn->query( $sql );
			$casamatricula = $result->fetchAll();
			foreach ($casamatricula as $campo)

			{ $tabela = "<tr> id=".$campo["serie"].$campo["turno"]." ".
				"<td>" . formatCnpjCpf(utf8_encode($campo["cpf"])) . "</td>".
				"<td>" . utf8_encode($campo["nome"]) . "</td>".
				"<td>" . utf8_encode($campo["sexo"]) . "</td>".
				"<td>" . formataData(utf8_encode($campo["nascimento"])) . "</td>".
				"<td>" . turno(utf8_encode($campo["turno"])) . "</td>".
				"<td>" . utf8_encode($campo["vaga"]). "</td>".
				"<td>" . utf8_encode($campo["r_nome"]). "</td>".
				"<td>" . utf8_encode($campo["telefone"]). "</td></tr>";

				echo $tabela;

		}

		}

?>

</body>
</html>

