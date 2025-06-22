<!DOCTYPE html>
<html lang="en">
<?php include('../../db_connect.php'); ?>

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>KPSU Login</title>
	<!-- plugins:css -->
	<link rel="stylesheet" href="../../vendors/feather/feather.css">
	<link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
	<link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
	<!-- endinject -->
	<!-- Plugin css for this page -->
	<!-- End plugin css for this page -->
	<!-- inject:css -->
	<link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
	<!-- endinject -->
	<link rel="shortcut icon" href="../../images/favicon.png" />
</head>

<body>
	<div class="container-scroller">
		<div class="container-fluid page-body-wrapper full-page-wrapper">
			<div class="content-wrapper d-flex align-items-center auth px-0">
				<div class="row w-100 mx-0">
					<div class="col-lg-4 mx-auto">
						<div class="auth-form-light text-left py-5 px-4 px-sm-5">
							<div class="brand-logo">
								<img src="../../images/logo.png" alt="logo">
							</div>
							<h4>Hello! let's get started</h4>
							<h6 class="font-weight-light">Sign in to continue.</h6>


							<form class="pt-3" method="post" action="" name="loginForm">
								<div class="form-group">
									<input type="text" class="form-control form-control-lg" name="inUser" id="inUser" placeholder="Username" required>
								</div>
								<div class="form-group">
									<input type="password" class="form-control form-control-lg" name="inPass" id="inPass" placeholder="Password" required>
								</div>
								<div class="mt-3">
									<input type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" name="submitLogin" value="SIGN IN">
								</div>
								<div class="my-2 d-flex justify-content-between align-items-center">
									<!-- <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      Keep me signed in
                    </label>
                  </div> -->
									<p id="msg"></p>
									<a href="../../index.html" class="auth-link text-black">Home Page</a>
								</div>
								<!-- <div class="mb-2">
                  <button type="button" class="btn btn-block btn-facebook auth-form-btn">
                    <i class="ti-facebook mr-2"></i>Connect using facebook
                  </button>
                </div> -->
								<div class="text-center mt-4 font-weight-light">
									Don't have an account? <a href="registerMember.php" class="text-primary">Create</a>
								</div>
							</form>
							<?php
							if (isset($_POST['submitLogin'])) {

								$displayMessage = 0;
								$displayMessage2 = 0;
								$displayMessage3 = 0;

								$username = $_POST['inUser'];
								$password = $_POST['inPass'];

								$sql = "SELECT * FROM admin";
								$sql2 = "SELECT * FROM member";


								$query = mysqli_query($conn, $sql);
								$query2 = mysqli_query($conn, $sql2);

								if ($query) {
									foreach ($query as $row) {
										if ($username == $row['adminUsername'] && $password == $row['adminPassword']) {
											session_start();
											$_SESSION['user_id'] = $row['adminID'];
											$_SESSION["user_name"] = $row['adminUsername'];
											$_SESSION["user_position"] = "ADMIN";

											$displayMessage = 0;
											$displayMessage2 = 0;
											$displayMessage3 = 0;

											header("Location: ../../pages/admin/dashboardAdmin.php");
											exit;
										} else {
											$displayMessage = 1;
										}
									}
								}

								if ($query2) {
									foreach ($query2 as $row) {
										if ($row['memberUsername'] == $username && $password == $row['memberPassword']) {
											session_start();
											$_SESSION['user_id'] = $row['memberMatricID'];
											$_SESSION["user_name"] = $row['memberUsername'];
											$_SESSION["user_position"] = $row['memberPosition'];

											$displayMessage = 0;
											if ($row['memberPosition'] == "EX-MEMBER") {
												header("Location: ../../pages/ex_member/dashboardExMember.php");
												exit;
											} else {
												header("Location: ../../pages/member/dashboardMember.php");
												exit;
											}
										} else {
											$displayMessage = 1;
										}
									}
								}

								if ($displayMessage == 1) {
									echo "<script>alert('Username or Password Wrong!!!')</script>";
								}

								echo "<script>
								if (window.history.replaceState) {
								window.history.replaceState(null, null, window.location.	href);
								}
							</script>";
							}
							?>
						</div>
					</div>
				</div>
			</div>
			<!-- content-wrapper ends -->
		</div>
		<!-- page-body-wrapper ends -->
	</div>
	<!-- container-scroller -->
	<!-- plugins:js -->
	<script src="../../vendors/js/vendor.bundle.base.js"></script>
	<!-- endinject -->
	<!-- Plugin js for this page -->
	<!-- End plugin js for this page -->
	<!-- inject:js -->
	<script src="../../js/off-canvas.js"></script>
	<script src="../../js/hoverable-collapse.js"></script>
	<script src="../../js/template.js"></script>
	<script src="../../js/settings.js"></script>
	<script src="../../js/todolist.js"></script>
	<!-- endinject -->
</body>



</html>