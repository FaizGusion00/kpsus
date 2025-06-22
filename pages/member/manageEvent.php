<!DOCTYPE html>
<html lang="en">
<?php
include("../../db_connect.php");
session_start();

?>

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>KPSU Member Panel</title>
	<!-- plugins:css -->
	<link rel="stylesheet" href="../../vendors/feather/feather.css">
	<link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
	<link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
	<!-- endinject -->
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
				<a class="navbar-brand brand-logo mr-5" href="../../pages/ex_member/dashboardExMember.php"><img src="../../images/logo.png" class="mr-2" alt="KPSUS" /></a>
				<a class="navbar-brand brand-logo-mini" href="../../pages/ex_member/dashboardExMember.php"><img src="../../images/logo-minix.png" alt="KPSUS" /></a>
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
						<a class="nav-link" href="../../pages/member/manageFees.php">
							<i class="ti-money menu-icon"></i>
							<span class="menu-title"> Fees</span>
						</a>
					</li><br>
				</ul>
			</nav>
			<!-- partial -->
			<div class="main-panel">
				<div class="content-wrapper">
					<div class="row">
						<div class="col-md-12 grid-margin stretch-card">
							<div class="card">
								<div class="card-body">
									<div class="d-flex justify-content-between">

										<p class="card-title">Manage Event KPSU</p>
										<!-- Button trigger modal -->

									</div><br><br><br>
									<!-- Modal -->
									<div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
										<div class="modal-dialog modal-dialog-scrollable" role="document">
											<div class="modal-content">
												<form method="POST" action="" class="pt-3" name="eventForm">
													<div class="modal-header">
														<h5 class="modal-title" id="EventModal">Event of KPSU</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>
													<div class="modal-body">
														<div class="form-group">
															<label for="inEventID">Event ID</label>
															<input type="text" name="inEventID" class="form-control" id="inEventID" placeholder="ex : EV001">
														</div>
														<div class="form-group">
															<label for="inEventName">Event Name</label>
															<input type="text" class="form-control" id="inEventName" name="inEventName" placeholder="ex : Silat Training BootCamp">
														</div>
														<div class="form-group">
															<label for="inEventDesc">Event Description</label>
															<textarea class="form-control" id="inEventDesc" name="inEventDesc" placeholder="ex : This event is about" rows="3"></textarea>
														</div>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
														<input type="submit" name="submitEvent" id="submitEvent" class="btn btn-primary" value="Add">
													</div>
												</form>
											</div>
										
										</div>
									</div>
									<form method="POST" action="">
										<div class="form-group">
											<div class="input-group">
												<input type="text" class="form-control" placeholder="Event ID or Event Name" aria-label="Event ID" name="valueSearch">
												<div class="input-group-append">
													<input class="btn btn-sm btn-primary" type="submit" name="submitSearch" value="Search">
												</div>
											</div>
										</div>
									</form><br>
									<div class="row">
										<div class="col-12">
											<div class="table-responsive">
												<table id="" class="table table-striped" width=100%>
													<thead>
														<tr>
															<th>No</th>
															<th>Event ID</th>
															<th>Event Name</th>
															<th>Event Description</th>
															<th>Actions</th>
														</tr>
													</thead>
													<tbody>
														<?php
														function showData($conn)
														{
															if (isset($_POST['submitSearch'])) {

																$valueToSearch = $_POST['valueSearch'];
																// search in all table columns
																// using concat mysql function

																$sql = "SELECT * FROM event WHERE eventID like '%$valueToSearch%' OR eventName like  '%$valueToSearch%' ORDER BY eventID ASC";
																$query = mysqli_query($conn, $sql);
															} else {
																$sql = "SELECT * FROM event";
																$query = mysqli_query($conn, $sql);
															}
															$i=0;
															foreach ($query as $row) {
																$i++;
																echo
																"<tr>
																	<td>$i</td>
																	<td>{$row['eventID']}</td>
																	<td>{$row['eventName']}</td>
																	<td style=
																	'max-width:100px;
																		white-space: nowrap;
																		overflow: hidden;
																		text-overflow: ellipsis' >{$row['eventDesc']}</td> 
																	<td>
																	<a href='viewEvent.php?event_update_id={$row['eventID']}' class='btn btn-info'><i class='ti-clipboard btn-icon-prepend'></i>  Details
																		</a>	
																		</td>
																</tr>\n";
																
															}
															if($i==0){
																echo "<tr><td style='text-align:center; vertical-align:middle' colspan='5'><h4>No Data<h4></td></tr>";
															}
														}
														showData($conn);

														echo "<script>
														if (window.history.replaceState) {
														window.history.replaceState(null, null, window.location.href); } </script>";
														?>
													</tbody>
												</table>
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