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
  $sql = "SELECT m.*, r.nome as r_nome, r.telefone, r.email  FROM casamatricula as m  INNER JOIN casaresponsavel as r on m.cpfresponsavel = r.cpf where m.ano = ".$ano." order by m.cpfresponsavel" ;

  $result = $conn->query( $sql );

  $numRegistros =  $result->rowCount();
  //echo $numRegistros;
  $casamatricula = $result->fetchAll();


  if ($numRegistros!=0) {
      $file = fopen("exportar.txt","w");

      foreach ($casamatricula as $campo) {
         $dataFull = $campo["data"];
         $data = substr($dataFull,0,10) ;
         $hora = substr($dataFull,-8) ;
         $hora = str_replace(":","",$hora);

          $tabela =  $campo["ano"] ."1". ";"
           . $campo["cpfresponsavel"] . ";"
           . $campo["r_nome"] . ";"
           . $campo["telefone"] . ";"
           . $campo["email"] . ";"
           . $campo["cpf"] . ";"
           . $campo["nome"] . ";"
           . formataData($campo["nascimento"]) . ";"
           . $campo["sexo"] . ";"
           . turno($campo["turno"]) . ";"
           . $campo["serie"].";"
           . formataData($data) . ";"
           . $hora . ";"
           . $campo["vaga"].";"

           ."\r\n";

          echo $tabela;
          fwrite($file,$tabela);
          echo "<br>";
      }

      fclose($file);


  }


?>
 <a href="exportar.txt" download id="download" hidden></a>
 <script>
 document.getElementById('download').click();
 //var r = confirm("Deseja exportar o TXT?.");
 // if (r == true) {
 //   document.getElementById('download').click();
 // } else {
 // }

  </script>
  </body>


 </html>
