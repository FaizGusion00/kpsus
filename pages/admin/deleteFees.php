<?php
	require("../../db_connect.php");
	// sql to delete a record

	$deleteID = $_GET['fees_delete_id']; // get id through query string
	$sql = "DELETE FROM fees WHERE feesID='$deleteID'";
	$query = mysqli_query($conn,$sql);
	if ($query) {
		echo "<script>alert('Record deleted successfully')</script>";
		header("Location: ../../pages/admin/manageFees.php");
	} else {
		echo "<script>alert($conn->error)</script>";
		header("Location: ../../pages/admin/manageFees.php");
	}
	$conn->close();
?>