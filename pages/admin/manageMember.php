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

										<p class="card-title">Manage Member KPSU</p>
										<!-- Button trigger modal -->

										<button class="btn btn-primary" data-target="#exampleModalLong" data-toggle="modal"><i class="mdi mdi-plus"></i> Add Member</button>

									</div><br><br><br>
									<!-- Modal -->
									<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
										<div class="modal-dialog modal-dialog" role="document">
											<div class="modal-content">
												<form method="POST" action="" class="pt-3" name="memberForm" autocomplete="off" enctype="multipart/form-data">
													<div class="modal-header">
														<h5 class="modal-title" id="exampleModalLongTitle">Member of KPSU</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>
													<div class="modal-body">
														<div class="form-group">
															<label for="inMemberMatric">Member Matric</label>
															<input type="text" name="inMemberMatric" class="form-control" id="inMemberMatric" placeholder="ex : 2017241034" required>
														</div>
														<div class="form-group">
															<label for="inMemberName">Member Full Name</label>
															<input type="text" name="inMemberName" class="form-control" id="inMemberName" placeholder="ex : Ali bin Samad" required>
														</div>
														<div class="form-group">
															<label for="inMemberIC">Member IC</label>
															<input type="text" name="inMemberIC" class="form-control" id="inMemberIC" placeholder="ex : 010301070112" required>
														</div>
														<div class="form-group">
															<label for="inMemberPhone">Member Phone</label>
															<input type="text" name="inMemberPhone" class="form-control" id="inMemberPhone" placeholder="ex : 01123897xxx" required>
														</div>
														<div class="form-group">
															<label for="inMemberProgram">Member Program</label>
															<input type="text" name="inMemberProgram" class="form-control" id="inMemberProgram" placeholder="ex : CS110" required>
														</div>
														<div class="form-group">
															<label for="inMemberFaculty">Member Faculty</label>
															<input type="text" name="inMemberFaculty" class="form-control" id="inMemberFaculty" placeholder="ex : FSKM" required>
														</div>
														<div class="form-group">
															<label for="inMemberAddr">Member Address</label>
															<textarea class="form-control" id="inMemberAddr" name="inMemberAddr" placeholder="ex : Lot 2956,  jalan IKM, Alor Lintang" rows="3" required></textarea>
														</div>
														<div class="form-group">
															<select class="form-control form-control-lg" id="inMemberPosition" name="inMemberPosition" required>
																<option>MEMBER</option>
																<option>EX-MEMBER</option>
															</select>
														</div>
														<div class="form-group">
															<label for="inMemberUsername">Member Username</label>
															<input type="text" name="inMemberUsername" class="form-control" id="inMemberUsername" placeholder="ex : Ali34" required>
														</div>
														<div class="form-group">
															<label for="inMemberPassword">Member Password</label>
															<input type="password" name="inMemberPassword" class="form-control" id="inMemberPasssword" placeholder="*****" required>
														</div>
														<div class="form-group">
															<label for="inDateJoined">Date Join</label>
															<input type="date" name="inDateJoined" class="form-control" id="inDateJoined" placeholder="dd/mm/yyyy" required>
														</div>
														<div class="form-group">
															<label for="inPicture">Profile Picture</label>
															<input type="file" name="inPicture" id="inPicture" class="file-upload-default" >
															<div class="input-group col-xs-12">
																<input type="text" class="form-control file-upload-info" disabled placeholder="Upload Profile Picture" accept=".jpg, .jpeg, .png" required>
																<span class="input-group-append">
																	<button class="file-upload-browse btn btn-primary" type="button">Upload</button>
																</span>
															</div>
														</div>

													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
														<input type="submit" name="submitMember" id="submitMember" class="btn btn-primary" value="Add">
													</div>
												</form>
											</div>
											<?php
											if (isset($_POST['submitMember'])) {
												$memberMatric = $_POST['inMemberMatric'];
												$memberName = $_POST['inMemberName'];
												$memberIC = $_POST['inMemberIC'];
												$memberPhone = $_POST['inMemberPhone'];
												$memberProgram = $_POST['inMemberProgram'];
												$memberFaculty = $_POST['inMemberFaculty'];
												$memberAddr = $_POST['inMemberAddr'];
												$memberPosition = $_POST['inMemberPosition'];
												$memberUsername = $_POST['inMemberUsername'];
												$memberPassword = $_POST['inMemberPassword'];
												$memberDate = $_POST['inDateJoined'];

												if ($_FILES["inPicture"]["error"] === 4) {
													echo
													"<script> alert('Image does not exist'); </script>";
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


														$sql = "INSERT INTO member (memberName,memberMatricID,memberIC,memberPhone,memberProgram,memberFaculty,memberAddress,memberPosition,memberUsername,memberPassword,dateJoined,memberPicture) VALUES ('$memberName','$memberMatric','$memberIC','$memberPhone','$memberProgram','$memberFaculty','$memberAddr','$memberPosition','$memberUsername','$memberPassword','$memberDate','$newImageName')";

														$query = mysqli_query($conn, $sql);

														if ($query) {
															echo "<script>alert('Member Add Success')</script>";
														} else {
															$msg = $conn->error;
															echo '<script type="text/javascript">alert("' . $msg . '")</script>';
														}
													}
												}
												//remove post data on refresh
												echo "<script>
												if (window.history.replaceState) {
												window.history.replaceState(null, null, window.location.	href);
												}
											</script>";
											}
											?>
										</div>
									</div>
									<form method="POST" action="">
										<div class="form-group">
											<div class="input-group">
												<input type="text" class="form-control" placeholder="Member ID" aria-label="Member ID" name="valueSearch">
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
															<th>Picture</th>
															<th>No Matric</th>
															<th>Name</th>
															<th>IC</th>
															<th>Phone Number</th>
															<th>Position</th>
															<th>Date Join</th>
															<th>Action</th>
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

																$sql = "SELECT * FROM member WHERE memberMatricID LIKE '%$valueToSearch%' OR memberName LIKE  '%$valueToSearch%' OR memberIC LIKE  '%$valueToSearch%' OR memberPhone LIKE  '%$valueToSearch%' OR memberPosition LIKE  '%$valueToSearch%'";
																$query = mysqli_query($conn, $sql);
															} else {
																$sql = "SELECT * FROM member";
																$query = mysqli_query($conn, $sql);
															}
															$i = 0;
															foreach ($query as $row) {
																$i++;
																echo
																"<tr>
																	<td>$i</td>
																	<td><img width='40' height='40' src='../../images/uploads/{$row['memberPicture']}'></td>
																	<td>{$row['memberMatricID']}</td>
																	<td>{$row['memberName']}</td>
																	<td>{$row['memberIC']}</td>
																	<td>{$row['memberPhone']}</td>
																	<td>{$row['memberPosition']}</td>
																	<td>{$row['dateJoined']}</td>
																				
																	<td>
																		<a href='detailsMember.php?member_view_id={$row['memberMatricID']}' class='btn btn-info'><i class='ti-clipboard btn-icon-prepend'></i>  Details
																		</a>	
																					
																		<a href='editMember.php?member_update_id={$row['memberMatricID']}' class='btn btn-warning'><i class='ti-file btn-icon-prepend'></i>  Edit
																		</a>
																		
																		<a onclick='return confirmDelete(this);' href='deleteMember.php?member_delete_id={$row['memberMatricID']}' class='btn btn-danger'><i class='ti-trash btn-icon-prepend'></i>  Delete
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
														if (window.history.replaceState) { window.history.replaceState(null, null, window.location.	href); } </script>";
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
	<script src="../../js/file-upload.js"></script>
	<script src="../../js/modal.js"></script>
	<!-- endinject -->
	<!-- Custom js for this page-->
	<script src="../../js/dashboard.js"></script>
	<script src="../../js/Chart.roundedBarCharts.js"></script>
	<!-- End custom js for this page-->
	<script>
    function confirmDelete(link) {
        if (confirm("Are you sure?")) {
            doAjax(link.href, "POST"); // doAjax needs to send the "confirm" field
        }
        return false;
    }
</script>
</body>

</html>