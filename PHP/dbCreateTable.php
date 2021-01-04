<?php 
    require "dbConnection.php";

    $sql = "CREATE TABLE Users (
        id          INT(255)         NOT NULL AUTO_INCREMENT,
        full_name   VARCHAR(255)     NOT NULL,
        `user_id`    VARCHAR(255)     NOT NULL,
        email       VARCHAR(255)    NOT NULL,
        pwd         VARCHAR(255)     NOT NULL,
        PRIMARY KEY(id)
    );";

    if ($conn->query($sql) === TRUE) {
        echo "Table Users created successfully";
    } else {
        echo "Error creating database: " . $conn->error;
    }

    $sql = "CREATE TABLE `books` 
    ( `User ID` INT NOT NULL, `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, `Book Title` VARCHAR(255) NOT NULL , 
    `Author` VARCHAR(255) NOT NULL , `Genre` VARCHAR(255) NOT NULL , `Date Borrowed` DATE NOT NULL , 
    `Due Date` DATE NOT NULL ) ENGINE = InnoDB;";

    if ($conn->query($sql) === TRUE) {
        echo "Table Staff created successfully";
    } else {
        echo "Error creating database: " . $conn->error;
    }

    $conn->close();
?>