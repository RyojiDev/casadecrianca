<?php
//https://www.youtube.com/watch?v=Z082A48LQ4M
function getConnection(){
    $servername = "localhost";
    $username = "root";
    $password = "";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=prematricula", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      //  echo "Connected successfully";
        return $conn;
        }
    catch(PDOException $e)
        {
        echo "Connection failed: " . $e->getMessage();
        }

}

?>