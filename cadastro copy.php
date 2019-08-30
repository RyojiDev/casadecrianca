<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="icon" href="favicon.ico" type="image/x-icon">
	<?php include("import_css.phtml"); ?>
		<link rel="stylesheet" type="text/css" href="css/reset.css">
		<link rel="stylesheet" type="text/css" href="css/index.css">
		<link rel="stylesheet" href="css/configuracao.css">
<?php include("connection.php") ?>

	<title>Colégio Casa de Criança</title>
</head>

	<body>

	<div id="receber_dados">Recebe Os Dados</div>
<?php
$ano = 2019; // Depois ver em casamatriculaconfig, período defalt.
$cpf   = $_POST['cpf'];
$senha = md5($_POST['senha']);
$nome	 = $_POST['nome'];
$telefone    = $_POST['telefone'];
$email = $_POST['email'];

// Removendo caracteres ao salvar no banco.
$cpf = str_replace(".", "", $cpf);
$cpf = str_replace("-", "", $cpf);
$telefone = str_replace("(", "", $telefone);
$telefone = str_replace(")", "", $telefone);
$telefone = str_replace("-", "", $telefone);
echo $cpf;
echo $telefone;

if (!empty($cpf) && !empty($senha) && empty($nome) ){

	$conn = getConnection();
	$sql = "SELECT * FROM casaresponsavel where cpf = " .$cpf." and senha = '".$senha."';";
// echo $sql;
	$result = $conn->query( $sql );
	$casaresponsavel = $result->fetchAll();
	$nome =  $casaresponsavel[0]['nome'];
   // echo $nome;
	if (empty($casaresponsavel)) {
		//echo "<script>alert('There are no fields to generate a report');</script>"
		header('Location: index.php');
	} else{
	  //  print_r( $casaresponsavel );
	}
}

if (isset($_POST) && !empty($_POST)){
	echo '<pre>';
	print_r($_POST);
	echo '</pre>';

    include './functions.php';
}

if (!empty($cpf) && !empty($senha) && !empty($nome) && !empty($telefone) && !empty($email) ){
	include './connection.php';

	$conn = getConnection();
	echo "Conexão:".$conn;
	$sql = "INSERT INTO casaresponsavel (ano, cpf, nome, senha, telefone, email)
		       VALUES (:ano, :cpf, :nome, :senha, :telefone, :email)";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':ano', $ano);
	$stmt->bindParam(':cpf', $cpf);
	$stmt->bindParam(':nome', $nome);
	$stmt->bindParam(':senha', $senha);
	$stmt->bindParam(':telefone', $telefone);
	$stmt->bindParam(':email', $email);
	if($stmt->execute()){
		echo "Salvo com Sucesso!";
		unset($nome);
		unset($telefone);
		unset($email);
		header('Location: index.php');
	} else {
		echo "Erro ao Salvar!";
	}

}
?>
	<div id="carregando">
    <div id="content">
        <div id="inner-content">
        <?php include('menu-lateral.php'); ?>

		<header>
			<div class="container">
				<h2 class="titulo">Pré-Matrícula de Novatos para 2020</h2>
			</div>
		</header>

	<form method="post" action="matricula.php">
		<div class="container">
			CPF: <input type="number" name="cpf" required="required" maxlength="11" size="number" > <br><br>
		</div>
		<div class="container">
			Senha: <input type="password" name="senha" required="required"> <br><br>
		</div>
			<div class="container">
			Nome: <input type="text" name="nome" required="required"> <br><br>
		</div>
		<div class="container">
			Telefone: <input type="tel" name="tel" required="required" > <br><br>
		</div>
		<div class="container">
			E-Mail: <input type="email" name="email" required="required"> <br><br>
		</div>
		<div class="container">
			<input type="submit" value="Próxima"/>
		</div>
	</form>


</div><!---- div inner content -->
</div> <!----- div content--->


<script src="js/principal.js" ></script>
<?php include("import.phtml"); ?>
</body>
</html>