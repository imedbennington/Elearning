<?php
function db_connect() {
    $server_name = "localhost";
    $user_name ="root";
    $password = "";
    $database = "elearning";


    try {
        $conn = new PDO("mysql:host=$server_name;dbname=$database", $user_name, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "Connected successfully";
      return $conn;
    } catch (PDOException $e) {
        echo "". $e->getMessage();
    }
}
?>