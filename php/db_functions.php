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


// Function to save token and email in the database
// Function to save token and email in the database
function saveTokenInDatabase($conn, $token, $email) {
    // Prepare the SQL statement with named placeholders
    $stmt = $conn->prepare("INSERT INTO token (tkn, mail) VALUES (:token, :email)");

    // Bind values to named placeholders
    $stmt->bindParam(':token', $token, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);

    // Execute the statement
    if ($stmt->execute()) {
        // Token saved successfully
        return true;
    } else {
        // Error occurred while saving token
        return false;
    }
}



?>