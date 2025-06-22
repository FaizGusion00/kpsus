<?php
	require("../../db_connect.php");
	// sql to delete a record

	$deleteID = $_GET['member_delete_id']; // get id through query string
	$sql = "DELETE FROM member WHERE memberMatricID='$deleteID'";
	$query = mysqli_query($conn,$sql);
	if ($query) {
		echo "<script>alert('Record deleted successfully')</script>";
		header("Location: ../../pages/ex_member/manageMember.php");
	} else {
		echo "<script>alert($conn->error)</script>";
		header("Location: ../../pages/ex_member/manageMember.php");
	}
	$conn->close();
?>