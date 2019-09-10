<html>
  <head>
    <title>Exportar</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>

    <style type="text/css">

    </style>
  </head>
  
  <body>
  <?php

 
include './connection.php';
include './functions.php';

  $ano = 2019;
  $conn = getConnection();
  $sql = "SELECT casamatricula.*, casaserie.* FROM casamatricula  INNER JOIN casaserie on casamatricula.serie = casaserie.serie  order by casamatricula.nascimento" ;

  $result = $conn->query( $sql );

  $numRegistros =  $result->rowCount();
  echo $numRegistros;
  $casamatricula = $result->fetchAll();
       

  if ($numRegistros!=0) {
      $file = fopen("exportar.txt","w");

      foreach ($casamatricula as $campo) {
     
          $tabela = formatCnpjCpf(utf8_encode($campo["cpf"])) . ";"
           . utf8_encode($campo["nome"]) . ";"
           . utf8_encode($campo["sexo"]) . ";"
           . formataData(utf8_encode($campo["nascimento"])) . ";"
           . turno(utf8_encode($campo["turno"])) . ";"
           . utf8_encode($campo["serie"]) ."-".utf8_encode($campo["serie_longa"]). ";"
           . utf8_encode($campo["serie_longa"]). ";"
           . status($campo["vagas"],$campo["vaga"]).";"
           . statusArquivo($campo["vagas"],$campo["vaga"],$campo["caminho_pdf"]).";\r\n";
  
          echo $tabela;
          fwrite($file,$tabela);
          echo "<br>";
      }   
  
      fclose($file);        
      
  
  }
  
 
?>
 <a href="exportar.txt" download id="download" hidden></a>
 <script> 
 var r = confirm("Deseja exportar o TXT?.");
  if (r == true) {
    document.getElementById('download').click(); 
  } else {
    
  }
    
  </script>
  </body>


 </html>
