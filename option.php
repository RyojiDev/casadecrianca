<?php
	include './connection.php';
	include './functions.php';

    $action = $_POST['action'];

if($action == "option"){
    $conn = getConnection();
$sql_serie = "SELECT * FROM casaserie";
$sql_serie = $conn->query( $sql_serie );
$result_turno = $sql_serie->fetchAll();
foreach ($result_turno as $campo)
{
    echo '<option value='.$campo['serie']."-".$campo['turno'].'>'.$campo['serie']."-".$campo['serie_longa']."-".turno($campo['turno']).'</option>';
}

}


?>