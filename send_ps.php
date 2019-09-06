<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Gestor Escolar - Envio de senha</title>
</head>

<body>
<?
	$ps   = $_REQUEST["ps"];	
	$para = $_REQUEST["email"];
	$escola = $_REQUEST["escola"];
	$escmail = $_REQUEST["escmail"];
	$endereco = $_REQUEST["endereco"];
	
	$assunto2 = "Solicitação de senha";
	
	$mens .= "Mensagem enviada pelo Gestor Escolar Web"."\r\n";
	$mens .= "----------------------------------------"."\r\n";
	$mens .= "Senha: $ps"."\r\n";
	
	$headers2="From: ".$escola." <".$escmail.">";
	
	//Aqui envia o e-mail
	mail($para,$assunto2,$mens,$headers2);
	
	echo "<script>window.alert('Sua senha foi enviada para o e-mail informado.')</script>";
	echo "<script>window.location='".$endereco."'</script>"
		
?>

</body>
</html>