<?php
include './connection.php';

$conn = getConnection();
$sql = "SELECT * FROM casaresponsavel"; 
$result = $conn->query( $sql ); 
$rows = $result->fetchAll(); 
print_r( $rows );

?>