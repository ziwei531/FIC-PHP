<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title></title>
        <link rel="stylesheet" href="CSS files/header.css" type="text/css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@600&display=swap">
    </head>

    <body>
        <header>
            <img class="logo" src="images/abc-library-system-logo.png" alt="ABC Library System Logo">
            <nav>
                <ul class="menu-links">
                    <li><a href="view-data-page.php">View/Select Data</a></li>
                    <li><a href="insert-data-page.php">Insert Data</a></li>
                    <li><a href="update-data-page-1.php">Update Data</a></li>
                    <li><a href="delete-data-page.php">Delete Data</a></li>
                    <?php
                        if (isset($_SESSION["log_in_user"])) {
                            echo "<li><a href='log-out.php'>Log Out</a></li>";
                        } else {
                            echo "<li><a href='sign-up-page.php'>Sign Up</a></li>";
                            echo "<li><a href='log-in-page.php'>Log In</a></li>";
                        }
                    ?>
                </ul>
            </nav>
        </header>
    </body> 

</html>