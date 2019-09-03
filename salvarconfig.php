<?php
    include './connection.php';
    include './functions.php';
	$ano        = 2022;
	$action     = $_POST["action"];
    $data_ini   = $_POST["dataIni"];
    $hora_ini   = $_POST["horaIni"];
    $data_fim   = $_POST["dataFim"];
    $hora_fim   = $_POST["horaFim"];
    $cabecalho  = $_POST["cabecalho"];
    $descricao  = $_POST["descricao"];
	$observacao = $_POST["observacao"];
	
	
	
	if (isset($_POST) && !empty($_POST)){
		echo '<pre>';
		print_r($_POST);
		echo '</pre>';
		unset($_POST);
	}
	
	echo $action;
	

	
		if($action == "inserir")
		{
			$conn = getConnection();
			$sql = "INSERT INTO casamatriculaconfig  (ano, data_ini, hora_ini, data_fim, hora_fim, cabecalho, descricao, observacao)
			VALUES (:ano, :data_ini, :hora_ini, :data_fim, :hora_fim, :cabecalho, :descricao, :observacao)";
			$stmt = $conn->prepare($sql);
			$stmt->bindParam(':ano'       , $ano);
			$stmt->bindParam(':data_ini'  , $data_ini);
			$stmt->bindParam(':hora_ini'  , $hora_ini);
			$stmt->bindParam(':data_fim'  , $data_fim);
			$stmt->bindParam(':hora_fim'  , $hora_fim);
			$stmt->bindParam(':cabecalho' , $cabecalho);
			$stmt->bindParam(':descricao' , $descricao);
			$stmt->bindParam(':observacao', $observacao);

			if($stmt->execute()){
					echo "Salvo com Sucesso!";
					unset($ano);
					unset($data_ini);
					unset($hora_ini);
					unset($data_fim);
					unset($hora_fim);
					unset($cabecalho);
					unset($descricao);
					unset($observacao);
								//Limpar Variavel Action

					$action = "";
					//header('Location: index.php');
			} else {
					echo "Erro ao Salvar!";
			}
		}
		if($_POST["action"] == "buscarConfiguracao")
		{
			$conn = getConnection();
			$query = "
			SELECT * FROM casamatriculaconfig WHERE ano = '.$ano.";
			$stmt = $conn->prepare($query);
			$stmt->execute();
			$result = $stmt->fetchAll();
			foreach($result as $row)
			{
				$output['ano']        = $row['ano'];
				$output['data_ini']   = $row['data_ini'];
				$output['hora_ini']   = $row['hora_ini'];
				$output['data_fim']   = $row['data_fim'];
				$output['hora_fim']   = $row['hora_fim'];
				$output['cabecalho']  = $row['cabecalho'];
				$output['descricao']  = $row['descricao'];
				$output['observacao'] = $row['observacao'];

			}
						//Limpar Variavel Action

			$action = "";
			echo json_encode($output);
		}
		if($_POST["action"] == "atualizar")
		{
			$conn = getConnection();
			$sql = "UPDATE casamatriculaconfig  (ano, data_ini, hora_ini, data_fim, hora_fim, cabecalho, descricao, observacao)
			VALUES (:ano, :data_ini, :hora_ini, :data_fim, :hora_fim, :cabecalho, :descricao, :observacao)";
			$stmt = $conn->prepare($sql);
			$stmt->bindParam(':ano'       , $ano);
			$stmt->bindParam(':data_ini'  , $data_ini);
			$stmt->bindParam(':hora_ini'  , $hora_ini);
			$stmt->bindParam(':data_fim'  , $data_fim);
			$stmt->bindParam(':hora_fim'  , $hora_fim);
			$stmt->bindParam(':cabecalho' , $cabecalho);
			$stmt->bindParam(':descricao' , $descricao);
			$stmt->bindParam(':observacao', $observacao);

			if($stmt->execute()){
					echo "Salvo com Sucesso!";
					unset($ano);
					unset($data_ini);
					unset($hora_ini);
					unset($data_fim);
					unset($hora_fim);
					unset($cabecalho);
					unset($descricao);
					unset($observacao);
					$action = "";
			} else {
					echo "Erro ao Atualizar!";
			}

		}
		if($_POST["action"] == "deletar")
		{
			$conn = getConnection();
			$query = "FROM casamatriculaconfig WHERE ano = '.$ano.'";
			$stmt = $conn->prepare($query);
			$stmt->execute();
			echo "Deletado";
			//Limpar Variavel Action
			$action = "";
		}
	


?>