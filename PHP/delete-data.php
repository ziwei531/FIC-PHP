<?php
	if(isset($_GET['id'])) { // checks if "?id=.." exists, i.ee if a GET value "id" is obtained
		require "dbConnection.php";

        $sql = "DELETE FROM `books` WHERE `id` = ?;";
        
        $stmt = $conn->prepare($sql);

        if($stmt) {
            $stmt->bind_param("i", $_GET['id']);

            if($stmt->execute()) {
                echo "<script>window.alert('Book record deleted successfully!');</script>";
            } else echo "Unable to delete book record #" . $_GET['id'] . ": " . $conn->error;

        } else echo "Unable to prepare statements: " . $conn->error;

    }

    header("refresh:1; url=delete-data-page.php");
?>