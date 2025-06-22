<!DOCTYPE html>
<html lang="en">
<?php
include("../../db_connect.php");
$editID = $_GET['event_update_id'];
//get data

// get id through query string
$sql = "SELECT * FROM event where eventID='$editID'";
$query = mysqli_query($conn, $sql);

if ($query) {
	foreach ($query as $row) {
		if ($editID == $row['eventID']) {
			$tempEventID = $row['eventID'];
			$tempEventName = $row['eventName'];
			$tempEventDesc = $row['eventDesc'];
		}
	}
} else {
	echo "<script>alert('Data Query Error')</script>";
}

if (isset($_POST['submitEdit'])) {

	$ev_name = $_POST['edEvName'];
	$ev_desc = $_POST['edEvDesc'];

	$sql2 = "UPDATE event SET eventName='$ev_name',eventDesc='$ev_desc' WHERE eventID='$editID'";


	$query2 = mysqli_query($conn, $sql2);

	if (!$query2) {
		echo "<script type='text/javascript'>alert('Event Not Updateddd!!" . $conn->error . "')</script>";
	} else {
		echo "<script>alert('Update Event Succesfully'); window.open('../../pages/member/manageEvent.php','_self'); </script>";
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
				<a class="navbar-brand brand-logo mr-5" href="../../pages/member/dashboardMember.php"><img src="../../images/logo.png" class="mr-2" alt="KPSUS" /></a>
				<a class="navbar-brand brand-logo-mini" href="../../pages/member/dashboardMember.php"><img src="../../images/logo-minix.png" alt="KPSUS" /></a>
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
							<a class="dropdown-item" href="../../pages/member/editProfileMember.php">
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
						<a class="nav-link" href="../../pages/member/dashboardMember.php">
							<i class="icon-grid menu-icon"></i>
							<span class="menu-title">Dashboard</span>
						</a>
					</li><br>
					<li class="nav-item">
						<a class="nav-link" href="../../pages/member/manageEvent.php">
							<i class="ti-calendar menu-icon"></i>
							<span class="menu-title"> Event</span>
						</a>
					</li><br>
					<li class="nav-item">
						<a class="nav-link" href="../../pages/member/manageMember.php">
							<i class="ti-user menu-icon"></i>
							<span class="menu-title"> Member</span>
						</a>
					</li><br>
					<li class="nav-item">
						<a class="nav-link" href="../../pages/member/manageFees.php">
							<i class="ti-money menu-icon"></i>
							<span class="menu-title"> Fees</span>
						</a>
					</li><br>
					<li class="nav-item">
						<a class="nav-link" href="../../pages/member/manageReport.php">
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
									<a href='../../pages/member/manageEvent.php' class='btn btn-info btn-icon-text'><i class='ti-arrow-left btn-icon-prepend'></i> Back</a>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 grid-margin stretch-card">
							<div class="card">
								<div class="card-body">
									<h4 class="card-title">Details Event Information</h4>
									<form class="forms-sample" method="POST" action="">
										<div class="form-group">
											<label for="edEvID">Event ID</label>
											<input type="text" class="form-control" id="edEvID" name="edEvID" value="<?php echo $tempEventID ?>" readonly>
										</div>
										<div class="form-group">
											<label for="edEvName">Event Name</label>
											<input type="text" class="form-control" id="edEvName" name="edEvName" value="<?php echo $tempEventName ?>" readonly>
										</div>
										<div class="form-group">
											<label for="edEvDesc">Event Description</label>
											<textarea class="form-control" id="edEvDesc" name="edEvDesc" rows="3" readonly><?php echo $tempEventDesc ?></textarea>
										</div>
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