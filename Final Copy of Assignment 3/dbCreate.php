<?php
    require "dbConnection.php";

    $sql = "CREATE DATABASE phpLibSys";
    if ($conn->query($sql) === TRUE) {
        echo "</br>Database created successfully";
    } else {
        echo "</br>" . "Error creating database: " . $conn->error;
    }
    $conn->close(); 
?> 