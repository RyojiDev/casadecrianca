<?php

  include './connection.php';
    include './functions.php';


    $action  = $_POST["action"];

    // echo "<pre>";
	// 	print_r($_POST);
	// 	echo "</pre>";

if($_POST["action"] == "buscarano")
		{
            if(isset($_POST['id_config'])){
                $ano = $_POST['id_config'];
                // echo "<pre>";
                // print_r($_POST);
                // echo "</pre>";
            }else{
                $ano = 2019;
            }


            $conn = getConnection();


            $query = "SELECT * FROM casamatriculaconfig WHERE ano = ".$ano.";";
            // echo $query;
            //echo $query;
			$stmt = $conn->prepare($query);
			if($stmt->execute()){
				$result = $stmt->fetchAll();
				foreach($result as $row)
				{


          $output['ano']                    = $row['ano'];
          $output['data_ini']               = $row['data_ini'];
					$output['hora_ini']               = $row['hora_ini'];
					$output['data_fim']               = $row['data_fim'];
					$output['hora_fim']               = $row['hora_fim'];
					$output['cabecalho']              = $row['cabecalho'];
					$output['descricao']              = $row['descricao'];
					$output['observacao']             = $row['observacao'];


				}
				echo json_encode($output);
			} else {
				echo "Erro ao Buscar!";
				return false;
			}
			$conn = null;
		}

		if($_POST["action"] == "atualizar")
		{
            if(isset($_POST['id_ano'])){
                $ano = $_POST['id_ano'];

                echo "<pre>";
                print_r($_POST);
                echo "</pre>";
            }else{
                $ano                  = 2019;
            }


            $action     = $_POST["action"];
            $ano;
			$action     = $_POST["action"];
            $data_ini   = $_POST["dataIni"];
            $hora_ini   = $_POST["horaIni"];
            $data_fim   = $_POST["dataFim"];
            $hora_fim   = $_POST["horaFim"];
            $cabecalho  = $_POST["cabecalho"];
            $descricao  = $_POST["descricao"];
            $observacao = $_POST["observacao"];

			$conn = getConnection();
			$sql = "UPDATE casamatriculaconfig SET ano= :ano, data_ini= :data_ini, hora_ini= :hora_ini, data_fim= :data_fim, hora_fim= :hora_fim, cabecalho= :cabecalho, descricao= :descricao, observacao= :observacao WHERE ano = ".$ano.";";

			$stmt = $conn->prepare($sql);
			$stmt->bindParam(':ano', $ano);
			$stmt->bindParam(':data_ini', $data_ini);
			$stmt->bindParam(':hora_ini', $hora_ini);
			$stmt->bindParam(':data_fim', $data_fim);
			$stmt->bindParam(':hora_fim', $hora_fim);
			$stmt->bindParam(':cabecalho', $cabecalho);
			$stmt->bindParam(':descricao', $descricao);
			$stmt->bindParam(':observacao', $observacao);
			echo "<br>";
//print_r($stmt);
			if($stmt->execute()){
					echo "Atualizado com Sucesso!";
					unset($ano);
					unset($data_ini);
					unset($hora_ini);
					unset($data_fim);
					unset($hora_fim);
					unset($cabecalho);
					unset($descricao);
					unset($observacao);
					//header('Location: index.php');
					return true;
			} else {
					echo "Erro ao Atualizar!";
					return false;
			}
			$conn = null;
        }

        ?>