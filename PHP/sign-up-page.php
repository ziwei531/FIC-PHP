<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sign Up Form</title>
        <link rel="stylesheet" href="CSS files/sign-up-page.css" type="text/css">
    </head>

    <body>
        <div class="logo"></div>
        <div class="sign-up-form">
            <h1>ABC Library System</h1>
            <h2>Sign Up</h2>
            <form action="sign-up.php" method="POST" name="form">
                <label for="name" class="labels">Full Name</label><br>
                <input type="text" id="name" name="name" value="" placeholder="Enter full name" autocomplete="off">
                <label for="userID" class="labels">User ID</label><br>
                <input type="text" id="userID" name="userID" value="" placeholder="Enter user id" autocomplete="off">
                <label for="email" class="labels">E-mail</label><br>
                <input type="text" id="email" name="email" value="" placeholder="Enter e-mail" autocomplete="off">
                <label for="password" class="labels">Password</label><br>
                <input type="password" id="password" name="password" value="" placeholder="Enter password" autocomplete="off">                    
                <label for="confpassword" class="labels">Confirm Password</label><br>
                <input type="password" id="confpassword" name="confpassword" value="" placeholder="Enter confirm password" autocomplete="off">
                <input type="submit" name="submit" value="Sign Up">
                <p>Already have an account? <a class="sign-in" href="log-in-page.php">Sign in</a></p>
            </form>
        </div>
        <?php 
            if (isset($_GET["error"])) {
                if ($_GET["error"] == "emptyInput") {
                    echo "<script type='text/javascript'>";
                    echo "alert('Input fields must not be empty.');";
                    echo "</script>";
                } else if ($_GET["error"] == "invalidName") {
                    echo "<script type='text/javascript'>";
                    echo "alert('Name must be between 2 and 30 characters long. Name can only contain alphabetic characters and whitespace characters and it must start with an alphabetic character.');";
                    echo "</script>";
                } else if ($_GET["error"] == "invalidUserID") {
                    echo "<script type='text/javascript'>";
                    echo "alert('User id can only contain digits.');";
                    echo "</script>";
                } else if ($_GET["error"] == "invalidEmail") {
                    echo "<script type='text/javascript'>";
                    echo "alert('The e-mail address is invalid. Please choose a proper e-mail.');";
                    echo "</script>";
                } else if ($_GET["error"] == "invalidPassword") {
                    echo "<script type='text/javascript'>";
                    echo "alert('Password must contain at least a lowercase letter, an uppercase letter, a digit, and a special character and it must be at least 8 characters long.');";
                    echo "</script>";
               } else if ($_GET["error"] == "confirmPasswordAndPasswordDontMatch") {
                    echo "<script type='text/javascript'>";
                    echo "alert('Confirm password must be matched with password.');";
                    echo "</script>";
                } else if ($_GET["error"] == "none") {
                    echo "<script type='text/javascript'>";
                    echo "alert('You have successfully signed up!');";
                    echo "</script>";
                }
            }
        ?>
    </body>

</html>