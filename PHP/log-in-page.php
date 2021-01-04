<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Log In Form</title>
        <link rel="stylesheet" href="CSS files/log-in-page.css" type="text/css">
    </head>

    <body>
        <div class="logo"></div>
        <div class="log-in-form">
            <h1>ABC Library System</h1>
            <h2>Log In</h2>
            <form action="log-in.php" method="POST" name="form">
                <label for="userID" class="labels">User ID</label><br>
                <input type="text" id="userID" name="userID" value="" placeholder="Enter user id" autocomplete="off">
                <label for="password" class="labels">Password</label><br>
                <input type="password" id="password" name="password" value="" placeholder="Enter password" autocomplete="off">
                <input type="submit" name="submit" value="Sign In">
                <p>Not a member? <a class="sign-up" href="sign-up-page.php">Sign up now!</a></p>
            </form>
        </div>
        <?php 
            if (isset($_GET["error"])) {
                if ($_GET["error"] == "emptyInput") {
                    echo "<script type='text/javascript'>";
                    echo "alert('Input fields must not be empty.');";
                    echo "</script>";
                } else if ($_GET["error"] == "wrongLogin") {
                    echo "<script type='text/javascript'>";
                    echo "alert('Incorrect log in information.');";
                    echo "</script>";
                } 
            }
        ?>
    </body>

</html>