<!DOCTYPE html>
<html lang="en">
<?php
include("../../db_connect.php");
session_start();
$editID = $_SESSION['user_id'];

//get data

// get id through query string
$sql = "SELECT * FROM member where memberMatricID='$editID'";
$query = mysqli_query($conn, $sql);

if ($query) {
	foreach ($query as $row) {
		if ($editID == $row['memberMatricID']) {
			$tempMemberID = $row['memberMatricID'];
			$tempMemberName = $row['memberName'];
			$tempMemberIC = $row['memberIC'];
			$tempMemberPhone = $row['memberPhone'];
			$tempMemberProgram = $row['memberProgram'];
			$tempMemberFaculty = $row['memberFaculty'];
			$tempMemberAddress = $row['memberAddress'];
			$tempMemberPosition = $row['memberPosition'];
			$tempMemberUsername = $row['memberUsername'];
			$tempMemberPassword = $row['memberPassword'];
			$tempMemberDate = $row['dateJoined'];
			$tempPic = $row['memberPicture'];
			$tempPicM = "../../images/uploads/" . $tempPic;
		}
	}
} else {
	echo "<script type='text/javascript'>alert('$conn->error')</script>";
}

if (isset($_POST['submitEdit'])) {

	$memName = $_POST['inMemberName'];
	$memIC = $_POST['inMemberIC'];
	$memPhone = $_POST['inMemberPhone'];
	$memProgram = $_POST['inMemberProgram'];
	$memFaculty = $_POST['inMemberFaculty'];
	$memAddr = $_POST['inMemberAddr'];
	$memPosition = $_POST['inMemberPosition'];
	$memUsername = $_POST['inMemberUsername'];
	$memPassword = $_POST['inMemberPassword'];
	$memDate = $_POST['inDateJoined'];

	if ($_FILES["inPicture"]["name"] == null) {
		$sql2 = "UPDATE member SET memberName='$memName',memberIC='$memIC',memberPhone='$memPhone',memberProgram='$memProgram',memberFaculty='$memFaculty',memberAddress='$memAddr',memberPosition='$memPosition',memberUsername='$memUsername',memberPassword='$memPassword',dateJoined='$memDate' WHERE memberMatricID='$editID'";


		$query2 = mysqli_query($conn, $sql2);

		if (!$query2) {
			echo '<script type="text/javascript">alert("' . $conn->error . '")</script>';
		} else {
			echo "<script>alert('Update Member Information Succesfully'); window.open('../../pages/ex_member/dashboardExMember.php','_self'); </script>";
			exit;
		}
	} else if ($_FILES["inPicture"]["error"] === 4) {
		echo "<script> alert('Image does not exist'); </script>";
	} else {
		$fileName = $_FILES["inPicture"]["name"];
		$fileSize = $_FILES["inPicture"]["size"];
		$tmpName = $_FILES["inPicture"]["tmp_name"];

		$validImageExtension = ['jpg', 'jpeg', 'png', 'JPG', 'PNG'];
		$imageExtension = explode('.', $fileName);
		$imageExtension = strtolower(end($imageExtension));

		if (!in_array($imageExtension, $validImageExtension)) {
			echo
			"<script> alert('Invalid image extension'); </script>";
		} else if ($fileSize > 10000000) {
			echo
			"<script> alert('Image size is too large'); </script>";
		} else {
			$newImageName = uniqid();
			$newImageName .= '.' . $imageExtension;

			move_uploaded_file($tmpName, '../../images/uploads/' . $newImageName);

			$sql2 = "UPDATE member SET memberName='$memName',memberIC='$memIC',memberPhone='$memPhone',memberProgram='$memProgram',memberFaculty='$memFaculty',memberAddress='$memAddr',memberPosition='$memPosition',memberUsername='$memUsername',memberPassword='$memPassword',dateJoined='$memDate',memberPicture='$newImageName' WHERE memberMatricID='$editID'";


			$query2 = mysqli_query($conn, $sql2);

			if (!$query2) {
				echo '<script type="text/javascript">alert("' . $conn->error . '")</script>';
			} else {
				echo "<script>alert('Update Member Information Succesfully'); window.open('../../pages/ex_member/dashboardExMember.php','_self'); </script>";
			}
		}
	}
	//remove post data on refresh
	echo "<script> if (window.history.replaceState) { window.history.replaceState(null, null, window.location.href); } </script>";
}

?>

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>KPSU Executive Member Panel</title>
	<!-- plugins:css -->
	<link rel="stylesheet" href="../../vendors/feather/feather.css">
	<link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
	<link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
	<!-- endinject -->
	<!-- Plugin css for this page -->
	<link rel="stylesheet" href="../../vendors/mdi/css/materialdesignicons.min.css">
	<!-- endinject -->
	<!-- Plugin css for this page -->
	<link rel="stylesheet" href="../../vendors/datatables.net-bs4/dataTables.bootstrap4.css">
	<link rel="stylesheet" type="text/css" href="../../js/select.dataTables.min.css">
	<!-- End plugin css for this page -->
	<!-- inject:css -->
	<link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
	<!-- endinject -->
	<link rel="shortcut icon" href="../../images/kpsulogo.png" />
	<link rel="new icon" herf="../../icons/mdi.html" />
</head>


<body>
	<div class="container-scroller">
		<!-- partial:partials/_navbar.html -->
		<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
			<div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
				<a class="navbar-brand brand-logo mr-5" href="../../pages/ex_member/dashboardExMember.php"><img src="../../images/logo.png" class="mr-2" alt="logo" /></a>
				<a class="navbar-brand brand-logo-mini" href="../../pages/ex_member/dashboardExMember.php"><img src="../../images/logo-minix.png" /></a>
			</div>
			<div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
				<button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
					<span class="icon-menu"></span>
				</button>
				<ul class="navbar-nav navbar-nav-right">
					<li class="nav-item nav-profile dropdown">
						<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
							<i class="icon-head menu-icon"></i>
						</a>
						<div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
							<a class="dropdown-item" href="../../pages/ex_member/editProfileExMember.php">
								<i class="ti-settings text-primary"></i>
								Settings
							</a>
							<a class="dropdown-item" href="../../pages/authentication/logout.php">
								<i class="ti-power-off text-primary"></i>
								Logout
							</a>
						</div>
					</li>
				</ul>
				<button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
					<span class="icon-menu"></span>
				</button>
			</div>
		</nav>
		<!-- partial -->
		<div class="container-fluid page-body-wrapper">
			<!-- partial:partials/_settings-panel.html -->

			<!-- partial -->
			<!-- partial:partials/_sidebar.html -->
			<nav class="sidebar sidebar-offcanvas" id="sidebar">
				<ul class="nav">
					<li class="nav-item">
						<a class="nav-link" href="../../pages/ex_member/dashboardExMember.php">
							<i class="icon-grid menu-icon"></i>
							<span class="menu-title">Dashboard</span>
						</a>
					</li><br>
					<li class="nav-item">
						<a class="nav-link" href="../../pages/ex_member/manageEvent.php">
							<i class="ti-calendar menu-icon"></i>
							<span class="menu-title"> Event</span>
						</a>
					</li><br>
					<li class="nav-item">
						<a class="nav-link" href="../../pages/ex_member/manageMember.php">
							<i class="ti-user menu-icon"></i>
							<span class="menu-title"> Member</span>
						</a>
					</li><br>
					<li class="nav-item">
						<a class="nav-link" href="../../pages/ex_member/manageFees.php">
							<i class="ti-money menu-icon"></i>
							<span class="menu-title"> Fees</span>
						</a>
					</li><br>
					<li class="nav-item">
						<a class="nav-link" href="../../pages/ex_member/manageReport.php">
							<i class="icon-paper menu-icon"></i>
							<span class="menu-title"> Report</span>
						</a>
					</li>
				</ul>
			</nav>

			<!-- partial -->
			<div class="main-panel">
				<div class="content-wrapper">
					<div class="row">
						<div class="col-md-12 grid-margin stretch-card">
							<div class="card">
								<div class="card-body">
									<h4 class="card-title">Edit Profile Executive Member Information</h4>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 grid-margin stretch-card">


							<img width='400' height='400' src="<?php echo $tempPicM; ?>">


						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-12 grid-margin stretch-card">
							<div class="card">
								<div class="card-body">
									<form class="forms-sample" method="POST" action="" autocomplete="off" enctype="multipart/form-data">
										<div class="form-group">
											<label for="inMemberMatric">Member Matric</label>
											<input type="text" name="inMemberMatric" class="form-control" id="inMemberMatric" value="<?php echo $tempMemberID; ?>" readonly>
										</div>
										<div class="form-group">
											<label for="inMemberName">Member Full Name</label>
											<input type="text" name="inMemberName" class="form-control" id="inMemberName" value="<?php echo $tempMemberName; ?>" required>
										</div>
										<div class="form-group">
											<label for="inMemberIC">Member IC</label>
											<input type="text" name="inMemberIC" class="form-control" id="inMemberIC" value="<?php echo $tempMemberIC; ?>" required>
										</div>
										<div class="form-group">
											<label for="inMemberPhone">Member Phone</label>
											<input type="text" name="inMemberPhone" class="form-control" id="inMemberPhone" value="<?php echo $tempMemberPhone; ?>" required>
										</div>
										<div class="form-group">
											<label for="inMemberProgram">Member Program</label>
											<input type="text" name="inMemberProgram" class="form-control" id="inMemberProgram" value="<?php echo $tempMemberProgram; ?>" required>
										</div>
										<div class="form-group">
											<label for="inMemberFaculty">Member Faculty</label>
											<input type="text" name="inMemberFaculty" class="form-control" id="inMemberFaculty" value="<?php echo $tempMemberFaculty; ?>" required>
										</div>
										<div class="form-group">
											<label for="inMemberAddr">Member Address</label>
											<textarea class="form-control" id="inMemberAddr" name="inMemberAddr" rows="3" required><?php echo $tempMemberAddress; ?></textarea>
										</div>
										<div class="form-group">
											<label for="inMemberPosition">Member Position</label>
											<input type="text" class="form-control" id="inMemberPosition" name="inMemberPosition" value="<?php echo $tempMemberPosition; ?>" readonly>
										</div>
										<div class="form-group">
											<label for="inMemberUsername">Member Username</label>
											<input type="text" name="inMemberUsername" class="form-control" id="inMemberUsername" value="<?php echo $tempMemberUsername; ?>" required>
										</div>
										<div class="form-group">
											<label for="inMemberPassword">Member Password</label>
											<input type="text" name="inMemberPassword" class="form-control" id="inMemberPasssword" value="<?php echo $tempMemberPassword; ?>" required>
										</div>
										<div class="form-group">
											<label for="inDateJoined">Date Join</label>
											<input type="text" name="inDateJoined" class="form-control" id="inDateJoined" value="<?php echo $tempMemberDate; ?>" readonly>
										</div>
										<div class="form-group">
											<label for="inPicture">Picture</label>
											<input type="file" name="inPicture" id="inPicture" class="file-upload-default">
											<div class="input-group col-xs-12">
												<input type="text" name="inPicture2" id="inPicture2" class="form-control file-upload-info" value="<?php echo $tempPic; ?>" disabled placeholder="Upload Profile Picture" accept=".jpg, .jpeg, .png" required>
												<span class="input-group-append">
													<button class="file-upload-browse btn btn-primary" type="button" required>Upload</button>
												</span>
											</div>
										</div>

										<input type="submit" name="submitEdit" class="btn btn-primary mr-2" value="Update"></input>
										<a class="btn btn-light" href='dashboardExMember.php'>Cancel</a>
									</form>


								</div>
							</div>
						</div>
					</div>
					<!-- content-wrapper ends -->
					<!-- partial:partials/_footer.html -->
					<footer class="footer">
						<div class="d-sm-flex justify-content-center justify-content-sm-between">
							<span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021. Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>
							<span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
						</div>
						<div class="d-sm-flex justify-content-center justify-content-sm-between">
							<span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Distributed by <a href="https://www.themewagon.com/" target="_blank">Themewagon</a></span>
						</div>
					</footer>
					<!-- partial -->
				</div>
				<!-- main-panel ends -->
			</div>
			<!-- page-body-wrapper ends -->
		</div>
		<!-- container-scroller -->

		<!-- plugins:js -->
		<script src="../../vendors/js/vendor.bundle.base.js"></script>
		<!-- endinject -->
		<!-- Plugin js for this page -->
		<script src="../../vendors/chart.js/Chart.min.js"></script>
		<script src="../../vendors/datatables.net/jquery.dataTables.js"></script>
		<script src="../../vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
		<script src="../../js/dataTables.select.min.js"></script>

		<!-- End plugin js for this page -->
		<!-- inject:js -->
		<script src="../../js/off-canvas.js"></script>
		<script src="../../js/hoverable-collapse.js"></script>
		<script src="../../js/template.js"></script>
		<script src="../../js/settings.js"></script>
		<script src="../../js/file-upload.js"></script>
		<script src="../../js/todolist.js"></script>
		<script src="../../js/modal.js"></script>
		<!-- endinject -->
		<!-- Custom js for this page-->
		<script src="../../js/dashboard.js"></script>
		<script src="../../js/Chart.roundedBarCharts.js"></script>
		<!-- End custom js for this page-->
</body>

</html>