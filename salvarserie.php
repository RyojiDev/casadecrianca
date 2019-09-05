<?php
    include './connection.php';
	include './functions.php';
	
	$ano                  = 2019;
	$action               = $_POST["inserir_aluno"];
    $serie                = $_POST["serie"];
    $turno                = $_POST["turno"];
    $serie_longa          = $_POST["serie_longa"];
    $data_referencia_ini  = $_POST["data_referencia_ini"];
    $data_referencia_fim  = $_POST["data_referencia_fim"];
    $vagas                = $_POST["vagas"];
    $matriculados         = $_POST["matriculados"];
		$caminho_pdf          = $_POST["caminho_pdf"];
		$observacao           = $_POST["observacao"];

		
	
		if($action == "inserir")
		{
			$conn = getConnection();
			$sql = "INSERT INTO casaserie (ano, serie, turno, serie_longa, data_referencia_ini, data_referencia_fim, vagas, matriculados, caminho_pdf, observacao)
			VALUES (:ano, :serie, :turno, :serie_longa, :data_referencia_ini, :data_referencia_fim, :vagas, :matriculados, :caminho_pdf, :observacao)";
			$stmt = $conn->prepare($sql);
			$stmt->bindParam(':ano', $ano);
			$stmt->bindParam(':serie', $serie);
			$stmt->bindParam(':turno', $turno);
			$stmt->bindParam(':serie_longa', $serie_longa);
			$stmt->bindParam(':data_referencia_ini', $data_referencia_ini);
			$stmt->bindParam(':data_referencia_fim', $data_referencia_fim);
			$stmt->bindParam(':vagas', $vagas);
			$stmt->bindParam(':matriculados', $matriculados);
			$stmt->bindParam(':caminho_pdf', $caminho_pdf);
			$stmt->bindParam(':observacao', $observacao);

			if($stmt->execute()){
					echo "Salvo com Sucesso!";
					unset($ano);
					unset($serie);
					unset($turno);
					unset($serie_longa);
					unset($data_referencia_ini);
					unset($data_referencia_fim);
					unset($vagas);
					unset($matriculados);
					unset($caminho_pdf);
					unset($observacao);
					//header('Location: index.php');
			} else {
					echo "Erro ao Salvar!";
			}
		}
		if($_POST["action"] == "buscarAnoSerieTurno")
		{
			$conn = getConnection();
			$query = "
			SELECT * FROM casaserie WHERE ano = '.$ano. ' and serie = '.$serie.' and turno = '.$turno";
			$stmt = $conn->prepare($query);
			$stmt->execute();
			$result = $stmt->fetchAll();
			foreach($result as $row)
			{
				$output['ano']                 = $row['ano'];
				$output['serie']               = $row['serie'];
				$output['turno']               = $row['turno'];
				$output['serie_longa']         = $row['serie_longa'];
				$output['data_referencia_ini'] = $row['data_referencia_ini'];
				$output['data_referencia_fim'] = $row['data_referencia_fim'];
				$output['vagas']               = $row['vagas'];
				$output['matriculados']        = $row['matriculados'];
				$output['caminho_pdf']         = $row['caminho_pdf'];
				$output['observacao']          = $row['observacao'];

			}
			echo json_encode($output);
		}
		if($_POST["action"] == "atualizar")
		{
			$conn = getConnection();
			$sql = "UPDATE casaserie (ano, serie, turno, serie_longa, data_referencia_ini, data_referencia_fim, vagas, matriculados, caminho_pdf, observacao)
			VALUES (:ano, :serie, :turno, :serie_longa, :data_referencia_ini, :data_referencia_fim, :vagas, :matriculados, :caminho_pdf, :observacao)";
			$stmt = $conn->prepare($sql);
			$stmt->bindParam(':ano', $ano);
			$stmt->bindParam(':serie', $serie);
			$stmt->bindParam(':turno', $turno);
			$stmt->bindParam(':serie_longa', $serie_longa);
			$stmt->bindParam(':data_referencia_ini', $data_referencia_ini);
			$stmt->bindParam(':data_referencia_fim', $data_referencia_fim);
			$stmt->bindParam(':vagas', $vagas);
			$stmt->bindParam(':matriculados', $matriculados);
			$stmt->bindParam(':caminho_pdf', $caminho_pdf);
			$stmt->bindParam(':observacao', $observacao);

			if($stmt->execute()){
					echo "Atualizado com Sucesso!";
					unset($ano);
					unset($serie);
					unset($turno);
					unset($serie_longa);
					unset($data_referencia_ini);
					unset($data_referencia_fim);
					unset($vagas);
					unset($matriculados);
					unset($caminho_pdf);
					unset($observacao);
					//header('Location: index.php');
			} else {
					echo "Erro ao Atualizar!";
			}

		}
		if($_POST["action"] == "deletar")
		{
			$conn = getConnection();
			$query = "FROM casaserie WHERE ano = '.$ano. ' and serie = '.$serie.' and turno = '.$turno.";
			$stmt = $conn->prepare($query);
			$stmt->execute();
			echo "Deletado";
		}
	


?>