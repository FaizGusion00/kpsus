<?php
	require("../../db_connect.php");
	// sql to delete a record

	$deleteID = $_GET['event_delete_id']; // get id through query string
	$sql = "DELETE FROM event WHERE eventID='$deleteID'";
	$query = mysqli_query($conn,$sql);
	if ($query) {
		echo "<script>alert('Record deleted successfully')</script>";
		header("Location: ../../pages/ex_member/manageEvent.php");
	} else {
		echo "<script>alert($conn->error)</script>";
		header("Location: ../../pages/ex_member/manageEvent.php");
	}
	$conn->close();
?>