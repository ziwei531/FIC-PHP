<?php
	if(isset($_GET['id'])) {
		require "dbConnection.php";

		$sql = 'SELECT * FROM books WHERE id = ' . $_GET['id'] . ";";

		$result = $conn->query($sql);

		if($result) {
			if($result->num_rows > 0) {
				$row = $result->fetch_assoc();
			} else echo "No record found for ID: " . $_GET['id'];
		} else echo "Error retrieving record: " . $conn->error;
	}

	require "header.php";
	require "dbConnection.php";

	$errors = array("UID" => '', "bk_id" => '', "bkt" => '', "Author" => '', 'genre' => '', 'dateBorrow' => '', 'dueDate' => '');
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
			if(!preg_match('/^[a-zA-Z\s]+$/', $title)) {
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

		} else {	
			if($_SERVER['REQUEST_METHOD'] == "POST") {
				require "dbConnection.php";

				$sql = "UPDATE `books` SET `User ID` = ?, `Book Title` = ?, `Author` = ?, `Genre` = ?, `Date Borrowed` = ?, `Due Date` = ? WHERE `id` = ?;";
				
				$stmt = $conn->prepare($sql);

				if($stmt) {
					$id = intval($_POST['bk_id']);
					$UID = intval($_POST['UID']);

					$stmt->bind_param("isssssi", $UID, $_POST['bkt'], $_POST['Author'], $_POST['genre'], $_POST['dateBorrow'], $_POST['dueDate'], $id);
			
					if($stmt->execute()) {
						echo "Updated record with ID: " . $_POST['bk_id'];
					} else echo "Error updating record #" . $_POST['bk_id'] . "to table: " . $stmt->error;
				} else echo "Unable to prepare statement: " . $conn->error;
		
				$conn->close();
			}
			header("Location: update-data-page-1.php");
		}
	} //end of POST Check
?>
<!DOCTYPE html>
<html lang="en">

    <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Library System</title>
            <link rel="stylesheet" href="CSS files/update-data-page-2.css" type="text/css">
    </head>

    <body>
		<h3>Update Record</h3>
		<form method="POST" action="update-data-page-2.php" autocomplete="off">
			<!--Book ID-->
			<?php
		        if(isset($_GET['id'])) {
	        ?>
	        <p>Book ID: <?= $_GET['id']; ?></p>
			<input type="hidden" name="bk_id" value="<?= $_GET['id']; ?>">
	        <?php
                }
			?>

			<!--User ID-->
			<label>User ID</label><input type="text" name="UID" 
			<?php 
			if(isset($_GET['id'])) {
				?> value="<?= $row['User ID']; ?>" <?php
			} 
			?>>
            <div class="red-text"><?php echo $errors['UID']; ?></div><br>
			
			<!--Book Title-->
			<label> Book Title </label><input name="bkt" type="text"
			<?php 
			if(isset($_GET['id'])) {
				?> value="<?= $row['Book Title']; ?>" <?php
			} 
			?>>
			<div class = "red-text"><?php echo $errors['bkt']; ?></div> <br>
			
			<!--Author-->
			<label> Author </label><input name="Author" type="text" 
			<?php 
			if(isset($_GET['id'])) {
				?> value="<?= $row['Author']; ?>" <?php
			} 
			?>>
			<div class = "red-text"><?php echo $errors['Author']; ?></div> <br>
			
			<!--Genre-->
			<label> Genre </label> <input name="genre" type="text" 
			<?php 
			if(isset($_GET['id'])) {
				?> value="<?= $row['Genre']; ?>" <?php
			} 
			?>>
			<div class = "red-text"><?php echo $errors['genre']; ?></div> <br>
			
			<!--Date Borrowed-->
			<label> Date Borrowed</label> <input name="dateBorrow" type="date" 
			<?php 
			if(isset($_GET['id'])) {
				?> value="<?= $row['Date Borrowed']; ?>" <?php
			} 
			?>>
			<div class = "red-text"><?php echo $errors['dateBorrow']; ?></div> <br>
			
			<!--Due Date-->
			<label> Due Date </label><input name="dueDate" type="date" 
			<?php 
			if(isset($_GET['id'])) {
				?> value="<?= $row['Due Date']; ?>" <?php
			} 
			?>>
			<div class = "red-text"><?php echo $errors['dueDate']; ?></div> <br>
			
			<!--Buttons-->
			<button class="btnSubmit" type="submit" name="submit">Update
			<button type="reset" class="btnReset"><span>Reset</span></button>
		</form>
    </body>

</html>
