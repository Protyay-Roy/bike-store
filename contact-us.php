<!doctype html>
<html lang="zxx">

<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Bike Store</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Favicon
	<link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.webp"> -->


	<!-- Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Oswald:400,700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Bitter:400,700,400italic&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>

	<!-- CSS
	============================================ -->

	<!-- Icon Font CSS -->
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">

	<!-- Plugins CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/animate.css">
	<link rel="stylesheet" href="assets/css/jquery.fancybox.css">
	<link rel="stylesheet" href="assets/css/jquery.bxslider.css">
	<link rel="stylesheet" href="assets/css/jquery-ui-slider.css">
	<link rel="stylesheet" href="assets/css/meanmenu.min.css">
	<link rel="stylesheet" href="assets/css/owl.carousel.min.css">
	<link rel="stylesheet" href="assets/css/nivo-slider.css">
	<link rel="stylesheet" href="assets/css/main.css">
	<link rel="stylesheet" href="assets/css/ie.css">

	<!-- Main Style CSS -->
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/responsive.css">
	<link rel="stylesheet" href="assets/css/edit.css">

</head>

<body>

	<!-- HEADER AREA START -->
	<?php 
		$active = "contact-us";
		include("includes/header.php"); 
	?>
	<!-- HEADER-TOP START -->

	<!-- MAIN-CONTENT-SECTION START -->
	<section class="main-content-section">
		<div class="container">
			<!-- BSTORE-BREADCRUMB START -->
			<div class="bstore-breadcrumb">
				<a href="index.php">HOMe</a>
				<span><i class="fa fa-caret-right	"></i></span>
				<span>Contact</span>
			</div>
			<!-- BSTORE-BREADCRUMB END -->

			<h2 class="page-title contant-page-title">Customer service - Contact us</h2>

			<!-- CONTACT-US-FORM START -->
			<div class="contact-us-form">
				<div class="contact-form-center">
					<h3 class="contact-subheading">send a message</h3>
					<!-- CONTACT-FORM START -->
					<form class="primari-box personal-info-box" id="personalinfo" method="post" action="">
						<div class="personal-info-content row">
							<div class="col-md-4">
								<div class="form-group primary-form-group p-info-group  mb-3">
									<label for="firstname">Name</label>
									<input type="text" name="name" id="firstname" class="form-control input-feild" required>
								</div>
								<div class="form-group primary-form-group p-info-group mb-3">
									<label for="email">Email</label>
									<input type="email" name="email" id="email" class="form-control input-feild" required>
								</div>
								<div class="form-group primary-form-group p-info-group">
									<label for="Contact">Contact Number</label>
									<input type="text" name="phone" id="Contact" class="form-control input-feild" required>
								</div>
								<div class="submit-button p-info-submit-button mt-5">
									<button href="checkout-address.html" id="SubmitCreate" class="btn main-btn" name="submit">
										<span>
											Send <i class="fa fa-chevron-right"></i>
										</span>
									</button>
								</div>
							</div>
							<div class="col-md-8">

								<div class="mb-3">
									<label for="exampleFormControlTextarea1"  style="color: #333;margin-bottom:5px; font-size:13px; font-weight:bold" >Massage</label>
									<textarea class="form-control" id="exampleFormControlTextarea1" rows="11" required name="massage"></textarea>
								</div>
							</div>
						</div>
					</form>
					<!-- CONTACT-FORM END -->

					<?php
					if (isset($_POST["submit"])) {

						if (!isset($_SESSION["c_email"])) {

							echo "<script>window.open('registration.php', '_self')</script>";
						} else {
							$name = ucwords($_POST["name"]);
							$email = $_POST["email"];
							$Contact = $_POST["phone"];
							$massage = $_POST["massage"];

							$msgS = "INSERT INTO `massage`(`c_name`, `c_email`, `c_con`, `c_msg`) VALUES ('$name','$email','$Contact','$massage')";
							$msgQ = $con->query($msgS);

							if ($msgQ) {

								echo "<script>alert('Your Massage Sent Successfully')</script>";
								echo "<script>window.open('index.php', '_self')</script>";
							}
						}
					}

					?>
				</div>
			</div>
			<!-- CONTACT-US-FORM END -->

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