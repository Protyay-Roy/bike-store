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
					<span><i class="fa fa-caret-right	"></i></span>
					<span>Sign in / Register</span>
				</div>
				<!-- BSTORE-BREADCRUMB END -->

				<h2 class="page-title">Sign in / Register</h2>

				<!-- SHOPING-CART-MENU START -->
				<div class="shoping-cart-menu">
					<ul class="step">
						<li class="step-todo first step-done">
							<span><a href="cart.php">01. Summary</a></span>
						</li>
						<li class="step-current second">
							<span>02. Sign in</span>
						</li>
						<li class="step-todo third">
							<span>03. Address</span>
						</li>
						<li class="step-todo four">
							<span>04. Shipping</span>
						</li>
						<li class="step-todo last" id="step_end">
							<span><em>05.</em> Payment</span>
						</li>
					</ul>
				</div>
				<!-- SHOPING-CART-MENU END -->

				<div class="row">
					<div class="col-lg-6">
						<!-- CREATE-NEW-ACCOUNT START -->
						<div class="create-new-account">
							<form class="new-account-box primari-box" id="create-new-account" method="post" action="">
								<h3 class="box-subheading">Create an account</h3>
								<div class="form-content">
									<p>Please enter your email address to create an account.</p>
									<div class="form-group primary-form-group">
										<label for="email">Email address</label>
										<input type="text" value="" name="email" id="email" class="form-control input-feild" required>
									</div>
									<div class="submit-button">
										<button id="SubmitCreate" class="btn main-btn" name="creat">
											<span><i class="fa fa-user submit-icon"></i>Create an account</span>
										</button>
									</div>
								</div>

							</form>

							<?php
							if (isset($_POST["creat"])) {
								$email = $_POST["email"];
								echo "<script>window.open('checkout-registration.php?email=$email', '_self')</script>";
							}	?>

						</div>
						<!-- CREATE-NEW-ACCOUNT END -->
					</div>
					<div class="col-lg-6">
						<!-- REGISTERED-ACCOUNT START -->
						<div class="primari-box registered-account">
							<form class="new-account-box" id="accountLogin" method="post" action="">
								<h3 class="box-subheading">Already registered?</h3>
								<div class="form-content">
									<div class="form-group primary-form-group">
										<label for="loginemail">Email address</label>
										<input type="text" value="" name="customerEmail" id="loginemail" class="form-control input-feild">
									</div>
									<div class="form-group primary-form-group">
										<label for="password">Password</label>
										<input type="password" value="" name="customerPassword" id="password" class="form-control input-feild">
									</div>
									<div class="submit-button">
										<button id="signinCreate" class="btn main-btn" name="signin">
											<span><i class="fa fa-lock submit-icon"></i>Sign in</span>
										</button>
									</div>
								</div>
							</form>

							<?php
							if (isset($_POST["signin"])) {

								$c_email = $_POST["customerEmail"];

								$c_pass = $_POST["customerPassword"];

								$s = "SELECT * FROM `customer` WHERE `c_email`='$c_email' && `c_pass`='$c_pass'";

								$q = mysqli_query($con, $s) or die("Login Query Failed");
								$check_email = mysqli_num_rows($q);

								if ($check_email == 1) {

									$email_session = mysqli_fetch_assoc($q);
									$_SESSION["c_email"] = $email_session["c_email"];
									$customerEmail = $_SESSION["c_email"];
	
									$c_ip = getRealUserIp();
	
									$ipSql = "UPDATE customer SET c_ip = '$c_ip' WHERE `c_email`='$customerEmail'";
									$updateIp =  $con->query($ipSql) or die('Update Ip Query Failed');

									$getCustomerS = "SELECT * FROM customer WHERE c_email = '{$_SESSION["c_email"]}'";
									$getCustomerQ = $con->query($getCustomerS) or die ("Get CustomerS Query Failed");
									while ($getCustomerR = mysqli_fetch_assoc($getCustomerQ)) {
									$getCustomerIp = $getCustomerR["c_ip"];}

									$getCartS = "SELECT * FROM cart WHERE c_ip = '$getCustomerIp'";
									$getCartQ = $con->query($getCartS) or die ("Cart Query Failed");
									$getCartCount = mysqli_num_rows($getCartQ);
									if ($getCartCount > 0) {
										echo "<script>alert('Log In Successful')</script>";
										echo "<script>window.open('checkout-address.php?email=$customerEmail', '_self')</script>";
									} else {
										echo "<script>window.open('index.php', '_self')</script>";
									}

								} else {
									echo "<script>alert('Your email or password is wrong')</script>";
									exit();
								}
							} 
							?>

						</div>
						<!-- REGISTERED-ACCOUNT END -->
					</div>
				</div>
			</div>
		</section>
		<!-- MAIN-CONTENT-SECTION END -->

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

		<!-- FOOTER AREA START -->
		<?php include("includes/footer.php"); ?>
		<!-- FOOTER AREA END -->


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