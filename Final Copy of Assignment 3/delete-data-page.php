<?php 
    require 'header.php';
    require "dbConnection.php";
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Book Records</title>
        <link rel="stylesheet" href="CSS files/delete-data-page.css" type="text/css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
    </head>

    <body>
        <h1>Book Records</h1>
        <table>
            <tr>
                <th>User ID</th>
                <th>Book ID</th>
                <th>Book Title</th>
                <th>Author</th>
                <th>Genre</th>
                <th>Date Borrowed</th>
                <th>Due Date</th>
                <th>Action</th>
            </tr>
            <?php                 
                $sql = 'SELECT * FROM books';
                $result = $conn-> query($sql);

                if ($result-> num_rows > 0) {
                    while($row = $result-> fetch_assoc()) {
                        echo "<tr><td>" . $row["User ID"] . "</td><td>" . $row["id"] . "</td><td>" . $row['Book Title']  . "</td><td>" . $row['Author'] . "</td><td>" . $row['Genre'] . "</td><td>" . $row['Date Borrowed'] . "</td><td>" . $row['Due Date'] . "</td><td>"?>
                        <button class='delete' onclick="deleteConfirm(<?= $row['id']; ?>);">Delete</button> 
                        <?php
                        ;   
                    }
                    echo "</table>";
                } else {
                    echo "<div class='msg'>";
                    echo "There are currently no stored book records in our database";
                    echo "</div>";
                }

                mysqli_close($conn);
            ?>
        <script src="delete-data-page.js"></script>
    </body>

</html>