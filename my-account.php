<!doctype html>
<html lang="zxx">

<!-- LINK AREA START -->
<?php include("includes/link.php"); ?>
<!-- LINK AREA END -->

<style>
	.img {
		border: 3px solid #d7d7d7;
		padding: 5px;
		margin-bottom: 20px;
		box-shadow: 1px 1px 10px #999,
			-1px -1px 10px #999;
	}

	.name {
		margin-bottom: 20px;
	}

	.style {
		border: 3px solid #d7d7d7;
		box-shadow: 1px 1px 10px #999;

	}

	.nav-link {
		border: 1px solid #d7d7d7 !important;
		padding: 12px;
	}
</style>

<body>

	<!-- HEADER AREA START -->
	<?php

	include("includes/header.php");

	if (!isset($_SESSION["c_email"])) {
		echo "<script>window.open('registration.php','_self')</script>";
	} else {

	?>
		<!-- HEADER-TOP START -->

		<!-- MAIN-CONTENT-SECTION START -->
		<section class="main-content-section">
			<div class="container">
				<!-- BSTORE-BREADCRUMB START -->
				<div class="bstore-breadcrumb">
					<a href="index.php">HOMe</a>
					<span><i class="fa fa-caret-right	"></i></span>
					<span>My account</span>
				</div>
				<!-- BSTORE-BREADCRUMB END -->

				<h2 class="page-title">My account</h2>

				<div class="row">
					<!-- ACCOUNT-INFO-TEXT START -->
					<?php
					$imgQ = "SELECT * FROM customer WHERE c_email = '{$_SESSION["c_email"]}'";
					$imgQ = $con->query($imgQ);
					$imgR = mysqli_fetch_assoc($imgQ);
					$img = $imgR["c_img"];
					$name = $imgR["c_name"];

					?>

					<div class="d-flex align-items-start">
						<div class="nav flex-column nav-pills me-3 col-3 style" id="v-pills-tab" role="tablist" aria-orientation="vertical">
							<div class="img">
								<img style="max-height: 200px;" src="customer/images/<?= $img; ?>" alt="<?= $img; ?>" class="img-fluid" style="width: 100%; ">
							</div>
							<div class="name">
								<h4 class="text-center">
									<?= $name; ?>
								</h4>
							</div>
							<button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">My Orders</button>
							<button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Edit Profile</button>
							<button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Change Password</button>
							<button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Delete Account</button>
						</div>
						<div class="tab-content col-9" id="v-pills-tabContent">
							<div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab" tabindex="0">

								<?php include("customer/my_orders.php"); ?>

							</div>
							<div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab" tabindex="0">

								<?php include("customer/edit_account.php"); ?>

							</div>
							<div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab" tabindex="0">

								<?php include("customer/change_pass.php"); ?>

							</div>
							<div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab" tabindex="0">

								<?php include("customer/delete_account.php"); ?>

							</div>
						</div>
					</div>

					<!-- ACCOUNT-INFO-TEXT END -->
				</div>

				<!-- BACK TO HOME START -->
				<div class="home-link-menu">
					<ul>
						<li><a href="index.php"><i class="fa fa-chevron-left"></i> Home</a></li>
					</ul>
				</div>
				<!-- BACK TO HOME END -->
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

<?php } ?>