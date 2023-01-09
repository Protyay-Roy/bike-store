<!doctype html>
<html lang="zxx">

<!-- LINK AREA START -->
<?php include("includes/link.php"); ?>
<!-- LINK AREA END -->

<body>

	<!-- HEADER AREA START -->
	<?php include("includes/header.php"); ?>
	<!-- HEADER-TOP START -->

	<!-- MAIN-CONTENT-SECTION START -->
	<section class="main-content-section">
		<div class="container">
			<!-- BSTORE-BREADCRUMB START -->
			<div class="bstore-breadcrumb">
				<a href="index.php">HOMe</a>
				<span><i class="fa fa-caret-righ"></i></span>
				<span>Authentication</span>
			</div>
			<!-- BSTORE-BREADCRUMB END -->

			<h2 class="page-title">Create an account</h2>

			<!-- PERSONAL-INFOMATION START -->

			<?php
			if (isset($_GET["email"])) {
				$email = $_GET["email"];
			}	
			?>

			<div class="personal-infomation">
				<form class="primari-box personal-info-box" id="personalinfo" method="post" action="" enctype="multipart/form-data">
					<h3 class="box-subheading">Your personal information</h3>
					<div class="personal-info-content row">
						<div class="col-md-5">
							<!-- <div class="form-group primary-form-group p-info-group">
								<label>Title</label>
								<span class="radio-box">
									<input id="radio1" type="radio" name="sex" value="Mr." checked="checked">
									<label for="radio1">Mr.</label>
								</span>
								<span class="radio-box">
									<input id="radio2" type="radio" name="sex" value="Mrs.">

									<label for="radio2">Mrs.</label>
								</span>
							</div> -->
							<div class="form-group primary-form-group p-info-group">
								<label for="firstname">First Name <sup>*</sup></label>
								<input type="text" name="firstname" id="firstname" class="form-control input-feild" required>
							</div>
							<div class="form-group primary-form-group p-info-group">
								<label for="lastname">Last Name</label>
								<input type="text" name="lastname" id="lastname" class="form-control input-feild">
							</div>
							<div class="form-group primary-form-group p-info-group">
								<label for="email">Email<sup>*</sup></label>
								<input type="email" value="<?= $email; ?>" name="email" id="email" class="form-control input-feild" required>
							</div>
							<div class="form-group primary-form-group p-info-group">
								<label for="address">Address<sup>*</sup></label>
								<input type="text" name="address" id="address" class="form-control input-feild" placeholder="Town, District, Division" required>
							</div>
						</div>
						<div class="col-md-5">
							<div class="form-group primary-form-group p-info-group">
								<label for="contuct">Contuct<sup>*</sup></label>
								<input type="text" name="contuct" id="contuct" class="form-control input-feild" required>
							</div>
							<div class="form-group primary-form-group p-info-group">
								<label for="password">Password <sup>*</sup></label>
								<input type="password" name="password" id="password" class="form-control input-feild" required>
							</div>
							<div class="form-group primary-form-group p-info-group">
								<label for="password">Retype Password <sup>*</sup></label>
								<input type="password" name="re-password" id="password" class="form-control input-feild" required>
							</div>
							<div class="form-group primary-form-group p-info-group">
								<label for="img">Profile Picture</label>
								<input type="file" name="img" class="form-control input-feild">
							</div>
						</div>
						<div class="submit-button p-info-submit-button">
							<button href="checkout-address.html" id="SubmitCreate" class="btn main-btn" name="register">
								<span>
									Register
									<i class="fa fa-chevron-right"></i>
								</span>
							</button>
							<span class="required-field"><sup>*</sup>Required field</span>
						</div>
					</div>
				</form>
			</div>
			<!-- PERSONAL-INFOMATION END -->
		</div>
	</section>
	<!-- MAIN-CONTENT-SECTION END -->

	<?php
	if (isset($_POST["register"])) {

		$c_ip = getRealUserIp();
		$f_name = ucwords($_POST["firstname"]);
		$l_name = ucwords($_POST["lastname"]);
		$c_name = $f_name ." ". $l_name;
		$c_email = $_POST["email"];
		$c_pass = $_POST["password"];
		$c_re_pass = $_POST["re-password"];
		$c_ph = $_POST["contuct"];
		$c_add = ucwords($_POST["address"]);

		$c_img = $_FILES["img"]["name"];
		$c_image_tmp = $_FILES["img"]["tmp_name"];

		if (empty($c_img)) {
			$c_img = "";
		}

		$customerS = "SELECT * FROM customer";
		$customerQ = $con->query($customerS);
		$customerR = mysqli_fetch_assoc($customerQ);
		$customerEmail = $customerR["c_email"];

		if ($customerEmail !== $c_email) {
			if ($c_pass  === $c_re_pass) {
				$customerSql = "INSERT INTO `customer`(`c_ip`, `c_name`, `c_email`, `c_pass`, `c_ph`, `c_add`, `c_img`) VALUES ('$c_ip','$c_name','$c_email','$c_pass ','$c_ph','$c_add','$c_img')";
				$customerQuery = mysqli_query($con, $customerSql) or die('Customer Query Failed');

				if ($customerQuery) {

					move_uploaded_file($c_image_tmp, "customer/images/$c_img");

					$getEmail = "SELECT * FROM customer WHERE c_email = '$c_email' && c_ip = '$c_ip'";
					$getQuery = $con->query($getEmail) or die('Get Email Query Failed');
					$emailSession = mysqli_fetch_assoc($getQuery);
					$_SESSION["c_email"] = $emailSession["c_email"];

					$s = "SELECT * FROM `cart` WHERE c_ip = '$c_ip'";
					$q = $con->query($s) or die('Cart Query Failed');

					if ($q->num_rows > 0) {
						echo "<script>alert('You have been Registered Sucessfully')</script>";
						echo "<script>window.open('cart.php','_self')</script>";
					} else {
						echo "<script>alert('You have been Registered Sucessfully')</script>";
						echo "<script>window.open('index.php','_self')</script>";
					}
				}
			} else {
				echo "<script>alert('Your Password and Retype Password is wrong')</script>";
			}
		} else {
			echo "<script>alert('This email address is already added. Please give a new email address')</script>";
		}
	}
	?>

	<!-- COMPANY-FACALITY START -->
	<section class="company-facality">
		<div class="container">
			<div class="row g-4">
				<!-- SINGLE-FACALITY START -->
				<div class="col-lg-3 col-sm-6">
					<div class="single-facality">
						<div class="facality-icon">
							<i class="fa fa-rocket"></i>
						</div>
						<div class="facality-text">
							<h3 class="facality-heading-text">FREE SHIPPING</h3>
							<span>on order over ৳8000</span>
						</div>
					</div>
				</div>
				<!-- SINGLE-FACALITY END -->
				<!-- SINGLE-FACALITY START -->
				<div class="col-lg-3 col-sm-6">
					<div class="single-facality">
						<div class="facality-icon">
							<i class="fa fa-umbrella"></i>
						</div>
						<div class="facality-text">
							<h3 class="facality-heading-text">24/7 SUPPORT</h3>
							<span>online consultations</span>
						</div>
					</div>
				</div>
				<!-- SINGLE-FACALITY END -->
				<!-- SINGLE-FACALITY START -->
				<div class="col-lg-3 col-sm-6">
					<div class="single-facality">
						<div class="facality-icon">
							<i class="fa fa-calendar"></i>
						</div>
						<div class="facality-text">
							<h3 class="facality-heading-text">DAILY UPDATES</h3>
							<span>Check out store for latest</span>
						</div>
					</div>
				</div>
				<!-- SINGLE-FACALITY END -->
				<!-- SINGLE-FACALITY START -->
				<div class="col-lg-3 col-sm-6">
					<div class="single-facality">
						<div class="facality-icon">
							<i class="fa fa-refresh"></i>
						</div>
						<div class="facality-text">
							<h3 class="facality-heading-text">30-DAY RETURNS</h3>
							<span>moneyback guarantee</span>
						</div>
					</div>
				</div>
				<!-- SINGLE-FACALITY END -->
			</div>
		</div>
	</section>
	<!-- COMPANY-FACALITY END -->

	<!-- FOOTER SECTION START -->
	<?php include("includes/footer.php"); ?>
	<!-- FOOTER SECTION END -->


	<!-- JS
    ============================================ -->

	<!-- Modernizer & jQuery JS -->
	<script src="assets/js/vendor/modernizr-3.11.2.min.js"></script>
	<script src="assets/js/vendor/jquery-3.6.0.min.js"></script>

	<!-- Bootstrap JS -->
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>

	<!-- Plugins JS -->
	<script src="assets/js/jquery.fancybox.js"></script>
	<script src="assets/js/jquery.bxslider.min.js"></script>
	<script src="assets/js/jquery.meanmenu.js"></script>
	<script src="assets/js/jquery.nivo.slider.js"></script>
	<script src="assets/js/owl.carousel.min.js"></script>
	<script src="assets/js/jqueryui.js"></script>
	<script src="assets/js/wow.js"></script>

	<!-- Main JS -->
	<script src="assets/js/main.js"></script>

	<!-- Google Map js -->
	<script src="https://maps.googleapis.com/maps/api/js"></script>
	<script>
		function initialize() {
			var mapOptions = {
				zoom: 8,
				scrollwheel: false,
				center: new google.maps.LatLng(35.149868, -90.046678)
			};
			var map = new google.maps.Map(document.getElementById('googleMap'),
				mapOptions);
			var marker = new google.maps.Marker({
				position: map.getCenter(),
				map: map
			});

		}
		google.maps.event.addDomListener(window, 'load', initialize);
	</script>

</body>

</html>