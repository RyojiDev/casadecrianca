<?php

include './connection.php';
    $campo="{$_POST['campo']}";
    $conn = getConnection();
    $sql = "SELECT * FROM casaresponsavel where nome like '%".$campo."%'";
    $result = $conn->query( $sql );
    $rows = $result->fetchAll();

    echo "
    <table>
      <thead>
        <tr>
          <td>NOME</td>
          <td>E-Mail</td>
          <td>Telefone</td>
        </tr>
      </thead>
      <tbody>";

    foreach ($rows as $campo){
      //echo '<br>'.$campo['nome'].'';
      echo '<tr>';
        echo '<td>'.$campo['nome'].'</td>';
        echo '<td>'.$campo['email'].'</td>';
        echo '<td>'.$campo['telefone'].'</td>';
     echo '</tr>';
    }

    echo " </tbory> </table>";

?>