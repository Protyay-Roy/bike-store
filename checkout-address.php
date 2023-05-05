<!doctype html>
<html lang="zxx">

<!-- LINK AREA START -->
<?php include("includes/link.php"); ?>
<!-- LINK AREA END -->
<style>
	button.update-button {
		border-radius: 0;
		color: #fff;
		font-size: 13px;
		line-height: 17px;
		padding: 5px 10px 5px 9px;
		transition: all 500ms ease 0s;
	}

	button.update-button:hover {
		color: #fff;
	}
	form input.form-control{
		font-size: 14px;
		font-family: "arial", serif;
    	color: #6d6d6d;
	}
	form label.form-label{
		font-size: 16px;
    	color: #888;
	}
</style>

<body>

	<!-- HEADER AREA START -->
	<?php include("includes/header.php"); ?>
	<!-- HEADER-TOP END -->

	<!-- MAIN-CONTENT-SECTION START -->
	<section class="main-content-section">
		<div class="container">
			<!-- BSTORE-BREADCRUMB START -->
			<div class="bstore-breadcrumb">
				<a href="index.php">HOMe</a>
				<span><i class="fa fa-caret-right	"></i></span>
				<span>Addresses</span>
			</div>
			<!-- BSTORE-BREADCRUMB END -->

			<h2 class="page-title">Addresses</h2>

			<!-- SHOPING-CART-MENU START -->
			<div class="shoping-cart-menu">
				<ul class="step">
					<li class="step-todo first step-done">
						<span><a href="cart.php">01. Summary</a></span>
					</li>
					<li class="step-todo second step-done">
						<span><a href="checkout-signin.php">02. Sign in</a></span>
					</li>
					<li class="step-current third">
						<span>03. Address</span>
					</li>
					<li class="step-todo four">
						<span>04. Shipping</span>
					</li>
					<li class="step-todo four" id="step_end">
						<span>05. Payment</span>
					</li>
				</ul>
			</div>
			<!-- SHOPING-CART-MENU END -->

			<div class="row">
				<!-- ADDRESS AREA START -->
				<div class="col-lg-5 col-md-6">
					<div class="form-group primary-form-group p-info-group deli-address-group">
						<label>Choose a delivery address:</label>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<div class="first_item primari-box">
						<!-- DELIVERY ADDRESS START -->

						<?php
						if (isset($_SESSION["c_email"])) {
							$email = $_SESSION["c_email"];

							$getCustomerS = "SELECT * FROM customer WHERE c_email = '$email'";
							$getCustomerQ = $con->query($getCustomerS) or die("Get Customer Query Failed");
							$getCustomerR = mysqli_fetch_assoc($getCustomerQ);

							$email = $getCustomerR["c_email"];
							$name = $getCustomerR["c_name"];
							$contuct = $getCustomerR["c_ph"];
							$address = $getCustomerR["c_add"];
						}
						?>

						<form action="" method="POST">
							<div class="mb-3">
								<label for="exampleFormControlInput1" class="form-label">Email address:</label>
								<input type="email" class="form-control" id="exampleFormControlInput1" value="<?= $email; ?>" disabled  name="email">
							</div>
							<div class="mb-3">
								<label for="name" class="form-label">Name:</label>
								<input type="text" class="form-control" id="name" value="<?= $name; ?>" disabled  name="name">
							</div>
							<div class="mb-3">
								<label for="contuct" class="form-label">Contuct:</label>
								<input type="text" class="form-control" id="contuct" value="<?= $contuct; ?>" name="contuct">
							</div>
							<div class="mb-3">
								<label for="add" class="form-label">Address:</label>
								<input type="text" class="form-control" id="add" value="<?= $address; ?>" name="add">
							</div>
							<button class="update-button" name="update">
								Update<i class="fa fa-chevron-right"></i>
							</button>
						</form>
						<!-- DELIVERY ADDRESS END -->

						<?php
							if (isset($_POST["update"])) {

								$ip = getRealUserIp();
								// $email = $_POST["email"];
								$contuct = $_POST["contuct"];
								$address = $_POST["add"];

								$addressS = "UPDATE `customer` SET `c_ph`='$contuct',`c_add`='$address' WHERE `c_ip`= '$ip' && `c_email` = '$email'";
								
								if ($con->query($addressS)) {

									echo "<script>alert('Your address update successful')</script>";
									echo "<script>window.open('checkout-address.php?email=$email', '_self')</script>";
								}
							}
						?>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="second_item primari-box">
						<!-- BILLING ADDRESS START -->
						<ul class="address">
							<li>
								<h3 class="page-subheading box-subheading">
									Your product delivered from this address
								</h3>
							</li>
							<li><span class="address_name">Bstore</span></li>
							<li><span class="address_address1">Your address goes here.</span></li>
							<li><span class="address_phone">0123456789</span></li>
						</ul>
						<!-- BILLING ADDRESS END -->
					</div>
				</div>
			</div>

			<!-- RETURNE-CONTINUE-SHOP START -->
			<div class="returne-continue-shop ship-address">
				<a href="index.php" class="continueshoping"><i class="fa fa-chevron-left"></i>Continue
					shopping</a>
				<a href="checkout-shipping.php?email=<?= $_SESSION["c_email"]; ?>" class="procedtocheckout">Proceed to checkout<i class="fa fa-chevron-right"></i></a>
			</div>
			<!-- RETURNE-CONTINUE-SHOP END -->

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