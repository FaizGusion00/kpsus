<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include("../../db_connect.php");
$editID = $_SESSION['user_id'];
//get data

// get id through query string
$sql = "SELECT * FROM admin WHERE adminID=$editID";
$query = mysqli_query($conn, $sql);

if ($query) {
	foreach ($query as $row) {
			$tempAdminID = $row['adminID'];
			$tempAdminUsername = $row['adminUsername'];
			$tempAdminPassword = $row['adminPassword'];
		
	}
} else {
	echo "<script>alert('$conn->error')</script>";
}

if (isset($_POST['submitEdit'])) {

	$admin_name = $_POST['adName'];
	$admin_pass = $_POST['adPass'];

	$sql2 = "UPDATE admin SET adminUsername='$admin_name',adminPassword='$admin_pass' WHERE adminID='$editID'";


	$query2 = mysqli_query($conn, $sql2);

	if (!$query2) {
		echo "<script>alert('Admin Profile Not Updateddd!!')</script>";
	} else {
		echo "<script>alert('Admin Profile Updated Succesfully'); window.open('../../pages/admin/dashboardAdmin.php','_self'); </script>";
	}
	//remove post data on refresh
	echo "<script>
	if (window.history.replaceState) {
	window.history.replaceState(null, null, window.location.	href);
	}
</script>";
}

?>

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>KPSU Admin Panel</title>
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
				<a class="navbar-brand brand-logo mr-5" href="../../pages/admin/dashboardAdmin.php"><img src="../../images/logo.png" class="mr-2" alt="KPSUS" /></a>
				<a class="navbar-brand brand-logo-mini" href="../../pages/admin/dashboardAdmin.php"><img src="../../images/logo-minix.png" alt="KPSUS" /></a>
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
							<a class="dropdown-item" href="../../pages/admin/editProfileAdmin.php">
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
		<div class="container-fluid page-body-wrapper">
			<!-- partial:partials/_sidebar.html -->
			<nav class="sidebar sidebar-offcanvas" id="sidebar">
				<ul class="nav">
					<li class="nav-item">
						<a class="nav-link" href="../../pages/admin/dashboardAdmin.php">
							<i class="icon-grid menu-icon"></i>
							<span class="menu-title">Dashboard</span>
						</a>
					</li><br>
					<li class="nav-item">
						<a class="nav-link" href="../../pages/admin/manageEvent.php">
							<i class="ti-calendar menu-icon"></i>
							<span class="menu-title"> Event</span>
						</a>
					</li><br>
					<li class="nav-item">
						<a class="nav-link" href="../../pages/admin/manageMember.php">
							<i class="ti-user menu-icon"></i>
							<span class="menu-title"> Member</span>
						</a>
					</li><br>
					<li class="nav-item">
						<a class="nav-link" href="../../pages/admin/manageFees.php">
							<i class="ti-money menu-icon"></i>
							<span class="menu-title"> Fees</span>
						</a>
					</li><br>
					<li class="nav-item">
						<a class="nav-link" href="../../pages/admin/manageReport.php">
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
									<h4 class="card-title">Edit Admin Personal Information</h4>
									<form class="forms-sample" method="POST" action="">
										<div class="form-group">
											<label for="edEvID">Admin ID</label>
											<input type="text" class="form-control" id="adID" name="adID" value="<?php echo $tempAdminID ?>" readonly>
										</div>
										<div class="form-group">
											<label for="edEvName">Admin Username</label>
											<input type="text" class="form-control" id="adName" name="adName" value="<?php echo $tempAdminUsername ?>" required>
										</div>
										<div class="form-group">
											<label for="edEvDesc">Admin Password</label>
											<input type="text" class="form-control" id="adPass" name="adPass" value="<?php echo $tempAdminPassword ?>" required>
										</div>
										<input type="submit" name="submitEdit" class="btn btn-primary mr-2" value="Update"></input>
										<a class="btn btn-light" href='../../pages/admin/dashboardAdmin.php'>Cancel</a>
									</form>


								</div>
							</div>
						</div>
					</div>
					<!-- content-wrapper ends -->
					<!-- partial:partials/_footer.html -->
					<footer class="footer">
						<div class="d-sm-flex justify-content-center justify-content-sm-between">
							<span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021. Premium <a href="https://wa.me/+60179795851" target="_blank">Bootstrap admin template</a> from Public. All rights reserved.</span>
							<span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
						</div>
						<div class="d-sm-flex justify-content-center justify-content-sm-between">
							<span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Distributed by <a href="https://wa.me/+60179795851" target="_blank">Opiey</a></span>
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
		<script src="../../js/todolist.js"></script>
		<script src="../../js/modal.js"></script>
		<!-- endinject -->
		<!-- Custom js for this page-->
		<script src="../../js/dashboard.js"></script>
		<script src="../../js/Chart.roundedBarCharts.js"></script>
		<!-- End custom js for this page-->
</body>

</html>