<!DOCTYPE html>
<html lang="en">
<?php
include("../../db_connect.php");
$feessID = $_GET['fees_view_id'];
session_start();

$sql = "SELECT * FROM fees where feesID='$feessID'";
$query = mysqli_query($conn, $sql);



if ($query) {
	foreach ($query as $row) {
		$tempFeesID = $row['feesID'];
		$tempFeesAmount = $row['feesAmount'];
		$tempFeesType = $row['feesType'];
		$tempFeesEvidence = $row['feesEvidence'];
		$tempFeesEvidence = "../../images/uploads/" . $tempFeesEvidence;
		$memberIDD = $row['memberMatricID'];
		$tempFeesDate = $row['feesDate'];
	}
} else {
	echo "<script type='text/javascript'>alert('$conn->error')</script>";
}



$sql = "SELECT * FROM member where memberMatricID='$memberIDD'";
$query = mysqli_query($conn, $sql);

if ($query) {
	foreach ($query as $row) {

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
		$tempPic = "../../images/uploads/" . $tempPic;
	}
} else {
	echo "<script type='text/javascript'>alert('$conn->error')</script>";
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
	<link rel="stylesheet" href="../../vendors/select2/select2.min.css">
	<link rel="stylesheet" href="../../vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
	<!-- Plugin css for this page -->
	<link rel="stylesheet" href="../../vendors/mdi/css/materialdesignicons.min.css">
	<!-- Plugin css for this page -->
	<link rel="stylesheet" href="../../vendors/datatables.net-bs4/dataTables.bootstrap4.css">
	<link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
	<link rel="stylesheet" type="text/css" href="../../js/select.dataTables.min.css">
	<!-- End plugin css for this page -->
	<!-- inject:css -->
	<link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
	<!-- endinject -->
	<link rel="shortcut icon" href="../../images/kpsulogo.png" />
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
									<a href='../../pages/admin/manageReport.php' class='btn btn-info btn-icon-text'><i class='ti-arrow-left btn-icon-prepend'></i> Back</a>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 grid-margin stretch-card">


							<img width='400' height='400' src="<?php echo $tempFeesEvidence; ?>">


						</div>
					</div>
					<div class="row">
						<div class="col-md-12 grid-margin stretch-card">
							<div class="card">
								<div class="card-body">
									<h4 class="card-title">Fees Information</h4>
									<br>

									<div class="form-group row">
										<label for="exampleInputUsername2" class="col-sm-3 col-form-label">Fees ID</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" value="<?= $tempFeesID ?>" readonly>
										</div>

										<label for="exampleInputEmail2" class="col-sm-3 col-form-label">Fees Type</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" value="<?= $tempFeesType ?>" readonly>
										</div>

										<label for="exampleInputMobile" class="col-sm-3 col-form-label">Fees Amount</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" value="<?= $tempFeesAmount ?>" readonly>
										</div>
										<label for="exampleInputMobile" class="col-sm-3 col-form-label">Paid Date On</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" value="<?= $tempFeesDate ?>" readonly>
										</div>
										<div class="col-sm-3 col-form-label"></div>
										<div class="col-sm-9"></div>
										<label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Picture</label>
										<div class="col-sm-9">
											<img width='100' height='100' src="<?= $tempPic ?>" readonly>
										</div>
										<div class="col-sm-3 col-form-label"></div>
										<div class="col-sm-9"></div>

										<label for="exampleInputPassword2" class="col-sm-3 col-form-label">Matric ID</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" value="<?= $tempMemberID ?>" readonly>
										</div>

										<label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Full Name</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" value="<?= $tempMemberName ?>" readonly>
										</div>

										<label for="exampleInputPassword2" class="col-sm-3 col-form-label">No IC</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" value="<?= $tempMemberIC ?>" readonly>
										</div>

										<label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Phone Number</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" value="<?= $tempMemberPhone ?>" readonly>
										</div>

										<label for="exampleInputPassword2" class="col-sm-3 col-form-label">Program</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" value="<?= $tempMemberProgram ?>" readonly>
										</div>

										<label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Faculty</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" value="<?= $tempMemberFaculty ?>" readonly>
										</div>

										<label for="exampleInputPassword2" class="col-sm-3 col-form-label">Address</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" value="<?= $tempMemberAddress ?>" readonly>
										</div>

										<label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Position</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" value="<?= $tempMemberPosition ?>" readonly>
										</div>

										<label for="exampleInputPassword2" class="col-sm-3 col-form-label">Date Join</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" value="<?= $tempMemberDate ?>" readonly>
										</div>
									</div>
								</div>
							</div>
						</div>
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
	<script src="../../vendors/typeahead.js/typeahead.bundle.min.js"></script>
	<script src="../../vendors/select2/select2.min.js"></script>
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
	<script src="../../js/file-upload.js"></script>
	<script src="../../js/typeahead.js"></script>
	<script src="../../js/select2.js"></script>
	<!-- End custom js for this page-->
</body>

</html>