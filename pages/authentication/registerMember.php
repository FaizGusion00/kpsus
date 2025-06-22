<!DOCTYPE html>


<html lang="en">
<?php include("../../db_connect.php"); ?>

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>KPSU Register Member</title>
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
		<div class="container-fluid page-body-wrapper full-page-wrapper">
			<div class="content-wrapper d-flex align-items-center auth px-0">
				<div class="row w-100 mx-0">
					<div class="col-lg-4 mx-auto">
						<div class="auth-form-light text-left py-5 px-4 px-sm-5">
							<div class="brand-logo">
								<img src="../../images/logo.png" alt="logo">
							</div>
							<h4>New here?</h4>
							<h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>


							<form class="pt-3" method="post" action="" name="registerForm" autocomplete="off" enctype="multipart/form-data">
								<div class="form-group">
									<input type="text" class="form-control form-control-lg" id="inUsername" name="inUsername" placeholder="Username" required>
								</div>
								<div class="form-group">
									<input type="text" class="form-control form-control-lg" id="inFN" name="inFN" placeholder="Full Name" required>
								</div>
								<div class="form-group">
									<input type="text" class="form-control form-control-lg" id="inNoIC" name="inNoIC" placeholder="No. IC" required>
								</div>
								<div class="form-group">
									<input type="text" class="form-control form-control-lg" id="inAddress" name="inAddress" placeholder="Address" required>
								</div>
								<div class="form-group">
									<input type="text" class="form-control form-control-lg" id="inNoMatric" name="inNoMatric" placeholder="No. Matric" required>
								</div>
								<div class="form-group">
									<input type="text" class="form-control form-control-lg" id="inPhone" name="inPhone" placeholder="No Phone" required>
								</div>
								<div class="form-group">
									<input type="date" class="form-control form-control-lg" id="inDate" name="inDate" placeholder=" Date Join " required>
								</div>
								<div class="form-group">
									<input type="text" class="form-control form-control-lg" id="inProgram" name="inProgram" placeholder="Program Code" required>
								</div>
								<div class="form-group">
									<input type="text" class="form-control form-control-lg" id="inFaculty" name="inFaculty" placeholder="Faculty Name" required>
								</div>
								<div class="form-group">
									<input type="password" class="form-control form-control-lg" id="inPassword" name="inPassword" placeholder="Password" required>
								</div>

								<div class="form-group">
									<input type="file" name="inPicture" id="inPicture" class="file-upload-default">
									<div class="input-group col-xs-12">
										<input type="text" class="form-control file-upload-info" disabled placeholder="Upload Profile Picture" accept=".jpg, .jpeg, .png" required>
										<span class="input-group-append">
											<button class="file-upload-browse btn btn-primary" type="button">Upload</button>
										</span>
									</div>
								</div>

								<div class="mt-3">
									<input type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" name="submitRegister" value="SIGN UP">
								</div>
								<div class="text-center mt-4 font-weight-light">
									Already have an account? <a href="login.php" class="text-primary">Login</a>
								</div>
							</form>
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
	<script src="../../js/file-upload.js"></script>
	<script src="../../js/todolist.js"></script>
	<!-- endinject -->
</body>

<?php

if (isset($_POST['submitRegister'])) {
	$username = $_POST['inUsername'];
	$fullName = $_POST['inFN'];
	$noIC = $_POST['inNoIC'];
	$address = $_POST['inAddress'];
	$noMatric = $_POST['inNoMatric'];
	$phone = $_POST['inPhone'];
	$date = $_POST['inDate'];
	$program = $_POST['inProgram'];
	$faculty = $_POST['inFaculty'];
	$password = $_POST['inPassword'];
	$position = "MEMBER";

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

			$sql = "INSERT INTO member (memberName,memberMatricID,memberIC,memberPhone,memberProgram,memberFaculty,memberAddress,memberPosition,memberUsername,memberPassword,dateJoined,memberPicture) VALUES ('$fullName','$noMatric','$noIC','$phone','$program','$faculty','$address','$position','$username','$password','$date','$newImageName')";


			$query = mysqli_query($conn, $sql);

			if ($query) {
				echo "<script>alert('Student Add Success')</script>";
				echo "<script>window.location.href='login.php';</script>";
				exit;
			} else {
				echo "<script type='text/javascript'>alert('Cannot Add Student.')</script>";
			}
		}
	}

	echo "<script>
	if (window.history.replaceState) {
	window.history.replaceState(null, null, window.location.	href);
	}
</script>";
}
?>

</html>