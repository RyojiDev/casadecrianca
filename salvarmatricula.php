<?php
include './connection.php';
include './functions.php';
$ano = 2019;
$action = $_POST["action"];
$serie = $_POST["serie"];
$turno = $_POST["turno"];
$cpfresponsavel = $_POST["cpfresponsavel"];
$cpf = $_POST["cpf"];
$nome = $_POST["nome"];
$sexo = $_POST["sexo"];
$vaga = $_POST["vaga"];

$cpf = removepontocpf($cpf);
$cpfresponsavel = removepontocpf($cpfresponsavel);

echo "<pre>";
print_r($_POST);
echo $action;
echo $cpf;
echo $cpfresponsavel;

echo "</pre>";
if ($action == "inserir_aluno") {
    $conn = getConnection();

    $queryMatriculados = "SELECT matriculados FROM casaserie WHERE ano = '.$ano. ' and serie = '.$serie.' and turno =
	'.$turno";
		echo $queryMatriculados;

    $result = $conn->query($queryMatriculados);
	$queryMatriculados = $result->fetchAll();
    $vagas = $queryMatriculados[0]['matriculados'];
    $vagas = $vagas + 1;
    //Atualizando casaserie
    $sqlUpdate = "UPDATE casaserie (matriculados) VALUES (:matriculado) WHERE ano = '.$ano. ' and serie = '.$serie.' and
    turno = '.$turno";
    $stmtUpdate = $conn->prepare($sqlUpdate);
    $stmtUpdate->bindParam(':matriculado', $vagas);
    if ($stmtUpdate->execute()) {
    echo "Atualizado (casaserie) com Sucesso!";
    } else {
    echo "Erro ao Salvar (casaserie)!";
    }

    $sql = "INSERT INTO casamatricula (ano, serie, turno, cpfresponsavel, cpf, nome, sexo, vaga)
			VALUES (:ano, :serie, :turno, :cpfresponsavel, :cpf, :nome, :sexo, :vaga)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':ano', $ano);
    $stmt->bindParam(':serie', $serie);
    $stmt->bindParam(':turno', $turno);
    $stmt->bindParam(':cpfresponsavel', $cpfresponsavel);
    $stmt->bindParam(':cpf', $cpf);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':sexo', $sexo);
    $stmt->bindParam(':vaga', $vaga);

    if ($stmt->execute()) {
        echo "Salvo com Sucesso!";
        unset($ano);
        unset($serie);
        unset($turno);
        unset($cpfresponsavel);
        unset($cpf);
        unset($nome);
        unset($sexo);
        unset($vaga);
        //header('Location: index.php');
    } else {
        echo "Erro ao Salvar!";
    }
}
if ($_POST["action"] == "buscarCpfresponsavel") {
    $conn = getConnection();
    $query = "
			SELECT * FROM casamatricula WHERE ano = '.$ano. ' and  cpfresponsavel = '.$cpfresponsavel";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $result = $stmt->fetchAll();
    foreach ($result as $row) {
        $output['ano'] = $row['ano'];
        $output['serie'] = $row['serie'];
        $output['turno'] = $row['turno'];
        $output['cpfresponsavel'] = $row['cpfresponsavel'];
        $output['cpf'] = $row['cpf'];
        $output['nome'] = $row['nome'];
        $output['sexo'] = $row['sexo'];
        $output['vaga'] = $row['vaga'];

    }
    echo json_encode($output);
}
if ($_POST["action"] == "atualizar") {
    $conn = getConnection();
    $sql = "UPDATE casamatricula (ano, serie, turno, cpfresponsavel, cpf, nome, sexo, vaga)
			VALUES (:ano, :serie, :turno, :cpfresponsavel, :cpf, :nome, :sexo, :vaga)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':ano', $ano);
    $stmt->bindParam(':serie', $serie);
    $stmt->bindParam(':turno', $turno);
    $stmt->bindParam(':cpfresponsavel', $cpfresponsavel);
    $stmt->bindParam(':cpf', $cpf);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':sexo', $sexo);
    $stmt->bindParam(':vaga', $vaga);

    if ($stmt->execute()) {
        echo "Salvo com Sucesso!";
        unset($ano);
        unset($serie);
        unset($turno);
        unset($cpfresponsavel);
        unset($cpf);
        unset($nome);
        unset($sexo);
        unset($vaga); //header('Location: index.php');
    } else {
        echo "Erro ao Atualizar!";
    }

}
if ($_POST["action"] == "deletar") {
    $conn = getConnection();
    $query = "FROM casamatricula WHERE ano = '.$ano. ' and cpfresponsavel = '.$cpfresponsavel.' and cpf = '.$cpf.";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    echo "Deletado";
}
