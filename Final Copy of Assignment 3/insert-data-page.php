<?php
    require 'header.php';
    require 'dbConnection.php';

    $errors = array("UID" => '', "bkt" => '', "Author" => '', 'genre' => '', 'dateBorrow' => '', 'dueDate' => '');
    //Displays error if one of the values in the form are empty
    if(isset($_POST['submit'])) {
        //check User ID 
        if(empty($_POST["UID"])) {
            $errors["UID"] = 'You have not entered anything for User ID yet <br>';
        } else {
            $UID = $_POST['UID'];
            if (!preg_match("/^[0-9]*$/", $UID)) {
                $errors['UID'] = "User ID must be in numbers only";
            }
        }

        //check Book Title
        if(empty($_POST['bkt'])) {
            $errors['bkt'] = 'You have not been entered anything for Book Title <br>';
        } else {
            $title = $_POST['bkt'];
            if(!preg_match('/^[a-zA-Z\s]+$/', $title)){
                $errors['bkt'] = 'Book Title must be letters and spaces only';
            }
        }

        //Check Author
        if(empty($_POST['Author'])) {
            $errors['Author'] = 'You have not entered anything for Author <br>';
        } 

        //Check genre
        if(empty($_POST['genre'])) {
            $errors['genre'] = 'You have not entered a genre yet <br>';
        } 

        //Check Date borrowed
        if(empty($_POST['dateBorrow'])) {
            $errors['dateBorrow'] = 'You have not entered anything here yet <br>';
        } 

        //Check Due date
        if(empty($_POST['dueDate'])) {
            $errors['dueDate'] = 'You have not entered anything here yet <br>';
        } 
        
        if(array_filter($errors)) {
            //there are errors in the form. Would prevent form from submitting data into the database
        } else {
            //this is the part where it starts inserting values to the table within the database
            $UID = mysqli_real_escape_string($conn, $_POST['UID']);
            $bkt = mysqli_real_escape_string($conn, $_POST['bkt']);
            $Author = mysqli_real_escape_string($conn, $_POST['Author']);
            $genre = mysqli_real_escape_string($conn, $_POST['genre']);
            $dateBorrow = mysqli_real_escape_string($conn, $_POST['dateBorrow']);
            $dueDate = mysqli_real_escape_string($conn, $_POST['dueDate']);
    
            $sql = "INSERT INTO `books`(`User ID`, `Book Title`, `Author`, `Genre`, `Date Borrowed`, `Due Date`) 
            VALUES ('$UID', '$bkt', '$Author', '$genre', '$dateBorrow', '$dueDate')";
    
            //save to database. Without this it would not save to database. mysqli_query($conn, $sql);
            if(mysqli_query($conn, $sql)){
                header("Location: view-data-page.php");
            } else {
                //error
                echo "query error: " . mysqli_error($conn);
            }
        }
    } //end of POST Check
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Library System</title>
        <link rel="stylesheet" href="CSS files/insert-data-page.css" type="text/css">
    </head>

    <body>
        <h3>ABC Library System</h3>
        <form method="POST" action="insert-data-page.php" autocomplete="off"> 
            <!--User ID-->
            <?php
                if (isset($_SESSION["log_in_user"])) {
            ?>
            <label>User ID</label><input type="text" name="UID" value="<?php echo $_SESSION["log_in_user"]; ?>">
            <div class="red-text"><?php echo $errors['UID']; ?></div><br>
            <?php
                } else {
            ?>
                <label>User ID</label><input type="text" name="UID">
                <div class="red-text"><?php echo $errors['UID']; ?></div><br>
            <?php    
                }
            ?>
            <!--Book ID--> 
            <?php
                if(isset($GET['id'])) {
            ?>
            <label>Book ID <? $_GET['id']; ?></label>
            <input type="hidden" name="bk_id" value="<? $_GET['id']; ?>">
            <?php
                }
            ?>
            <!--Book Title-->
            <label> Book Title </label><input name="bkt" type="text">
            <div class = "red-text"><?php echo $errors['bkt']; ?></div> <br>
            <!--Author-->
            <label> Author </label><input name="Author" type="text"> 
            <div class = "red-text"><?php echo $errors['Author']; ?></div> <br>
            <!--Genre-->
            <label> Genre </label> <input name="genre" type="text">
            <div class = "red-text"><?php echo $errors['genre']; ?></div> <br>
            <!--Date Borrowed-->
            <label> Date Borrowed</label> <input name="dateBorrow" type="date">
            <div class = "red-text"><?php echo $errors['dateBorrow']; ?></div> <br>
            <!--Due Date-->
            <label> Due Date </label><input name="dueDate" type="date">
            <div class = "red-text"><?php echo $errors['dueDate']; ?></div> <br>
            <!--Buttons-->
            <button class="btnSubmit" type="submit" name="submit">Register Book
            <button type="reset" class="btnReset"><span>Reset</span></button> 
        </form>
    </body>

</html>