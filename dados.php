<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title> Procurando via Ajax </title>
  <script src='js/jquery-3.3.1.min.js'></script>
  <script src='js/principal.js'></script>
</head>
<body>
  <form>
    Buscar por: <input type='text' name='campo' id='campo'>
  </form>

  <div id='resultado'>
    <?php
    include './connection.php';

    $conn = getConnection();
    $sql = "SELECT * FROM casaresponsavel";
    $result = $conn->query( $sql );
    $rows = $result->fetchAll();
    //print_r( $rows );
    ?>
  </div>

</body>
</html>
