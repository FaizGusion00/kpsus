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
									<div class="d-flex justify-content-between">
										<p class="card-title">Report KPSU</p>
									</div>
									<!-- start and end date -->
									<div class="col-md-6 grid-margin stretch-card">
										<div class="card">
											<div class="card-body">
												<form class="forms-sample" method="POST" action="">
													<div class="form-group row">
														<label class="col-sm-3 col-form-label" for="month">Month</label>
														<div class="col-sm-9">
															<select class="form-control form-control-sm" id="monthFees" name="monthFees" requried>
																<option>January</option>
																<option>February</option>
																<option>March</option>
																<option>April</option>
																<option>May</option>
																<option>June</option>
																<option>July</option>
																<option>August</option>
																<option>September</option>
																<option>October</option>
																<option>November</option>
																<option>December</option>
															</select>
														</div>
														<label for="endDate" class="col-sm-3 col-form-label">Year</label>
														<div class="col-sm-9">
															<input type="text" class="form-control" id="yearFees" name="yearFees" placeholder="ex : 2010" required>
														</div>
														<label class="col-sm-3 col-form-label" for="month">Fees Type</label>
														<div class="col-sm-9">
															<select class="form-control form-control-sm" id="feesType" name="feesType" requried>
																<option>Yearly</option>
																<option>Membership</option>
															</select>
														</div>
													</div>
													<button type="submit" name="submitSearch" class="btn btn-success btn-icon-text"><i class="ti-search btn-icon-prepend"></i>Search</button>
													<button type="button" onClick="window.location.reload();" class="btn btn-warning btn-icon-text">
														<i class="ti-reload btn-icon-prepend"></i>Reset
													</button>
													<button type="submit" name="downloadBtn" class="btn btn-info btn-icon-text" ><i class="ti-printer btn-icon-prepend"></i>Print</button>
												</form>
											</div>
											<?php 
											if(isset($_POST['downloadBtn'])){
												$monthFees = $_POST['monthFees'];
												$yearFees = $_POST['yearFees'];
												$feesType = $_POST['feesType'];
												$month_number = date("n", strtotime($monthFees));

												echo "<script> window.open('../../pages/ex_member/printReport.php?month=$month_number&year=$yearFees&fees=$feesType','_self') </script>";
											}
											?>

										</div>
									</div>
									<div class="row">
										<div class="col-12">
											<div class="table-responsive">
												<table id="" class="table table-striped" width=100%>
													<thead>
														<tr>
															<th>No</th>
															<th>Images</th>
															<th>Name</th>
															<th>Matric No</th>
															<th>Date of Joined</th>
															<th>Fees Type</th>
															<th>Amount</th>
															<th>Paid Fees</th>
															<th>Action</th>
															
														</tr>
													</thead>
													<tbody>
														<?php
														function showData($conn)
														{
															if (isset($_POST['submitSearch'])) {

																$monthFees = $_POST['monthFees'];
																$yearFees = $_POST['yearFees'];
																$feesType = $_POST['feesType'];
																$month_number = date("n", strtotime($monthFees));
																// search in all table columns
																// using concat mysql function
																$sql = "SELECT fees.feesID,fees.feesEvidence,fees.feesType,fees.feesAmount,fees.feesDate,member.memberName,member.memberMatricID,member.dateJoined FROM fees INNER JOIN member ON fees.memberMatricID=member.memberMatricID";

																$query = mysqli_query($conn, $sql);

																$i = 0;
																foreach ($query as $row) {
																	
																	$dateComps = date_parse($row['feesDate']);
																	$year = $dateComps['year'];
																	$month = $dateComps['month'];
																	// echo $date->format("M");
																	if ($month == $month_number && $year == $yearFees && $feesType == $row['feesType']) {
																		$i++;
																		echo
																		"<tr>
																				<td>$i</td>
																				<td><img width='40' height='40' src='../../images/uploads/{$row['feesEvidence']}'></td>
																				<td>{$row['memberName']}</td>
																				<td>{$row['memberMatricID']}</td>
																				<td>{$row['dateJoined']}</td>
																				<td>{$row['feesType']}</td>
																				<td>{$row['feesAmount']}</td>
																				<td>{$row['feesDate']}</td>
																				<td>
																				
																				<a href='viewReport.php?fees_view_id={$row['feesID']}' class='btn btn-warning btn-icon-text'><i class='ti-file btn-icon-prepend'></i> View
																				</a>
																				
																				</td> 
																			</tr>\n";
																		
																	}
																}
																if($i==0){
																	echo "<tr><td style='text-align:center; vertical-align:middle' colspan='9'><h4>No Data<h4></td></tr>";
																}
															} else {
																$sql = "SELECT fees.feesID,fees.feesEvidence,fees.feesType,fees.feesAmount,fees.feesDate,member.memberName,member.memberMatricID,member.dateJoined FROM fees INNER JOIN member ON fees.memberMatricID=member.memberMatricID";
																$query = mysqli_query($conn, $sql);

																$j = 0;
																foreach ($query as $row) {
																	$j++;
																	echo
																	"<tr>
																				<td>$j</td>
																				<td><img width='40' height='40' src='../../images/uploads/{$row['feesEvidence']}'></td>
																				<td>{$row['memberName']}</td>
																				<td>{$row['memberMatricID']}</td>
																				<td>{$row['dateJoined']}</td>
																				<td>{$row['feesType']}</td>
																				<td>{$row['feesAmount']}</td>
																				<td>{$row['feesDate']}</td>
																				<td>
																				
																				<a href='viewReport.php?fees_view_id={$row['feesID']}' class='btn btn-warning btn-icon-text'><i class='ti-file btn-icon-prepend'></i> View
																				</a>
																				
																				</td> 
																			</tr>\n";
																}
																if($j==0){
																	echo "<tr><td style='text-align:center; vertical-align:middle' colspan='9'><h4>No Data<h4></td></tr>";
																}
															}
														}
														showData($conn);
														echo "<script>
												if (window.history.replaceState) {
												window.history.replaceState(null, null, window.location.	href);
												}
											</script>";
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