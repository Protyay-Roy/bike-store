<!doctype html>
<html lang="zxx">

<!-- LINK AREA START -->
<?php include("includes/link.php"); ?>
<!-- LINK AREA END -->

<style>
	button.procedtocheckout {
		background: #ff4f4f none repeat scroll 0 0;
		border-radius: 4px;
		color: #fff;
		display: block;
		float: right;
		font-size: 20px;
		line-height: 50px;
		padding: 0 16px;
		transition: all 500ms ease 0s;
		border: 0;
	}

	button.procedtocheckout:hover {
		background: #3a3d42 none repeat scroll 0 0;
		border-color: #3a3d42;
	}

	@media only screen and (min-width: 480px) and (max-width: 767px) {
		button.procedtocheckout {
			display: inline-block;
			float: none;
			border: 0;
		}
	}

	@media (max-width: 767px) {
		button.procedtocheckout {
			display: inline-block;
			float: none;
			border: 0;
		}
	}
</style>

<body>

	<!-- HEADER AREA START -->
	<?php

	include("includes/header.php");

	if (!isset($_SESSION["c_email"])) {
		echo "<script>window.open('registration.php', '_self')</script>";
	} else {
		$cIp = getRealUserIp();

		$Sql = "SELECT * FROM cart WHERE c_ip = '$cIp'";
		$Query = $con->query($Sql);
		if (mysqli_num_rows($Query) == 0) {
			echo "<script>window.open('index.php','_self')</script>";
		} else {


	?>
			<!-- HEADER-TOP START -->

			<section class="main-content-section">
				<div class="container">
					<!-- BSTORE-BREADCRUMB START -->
					<div class="bstore-breadcrumb">
						<a href="index.php">HOME</a>
						<span><i class="fa fa-caret-right	"></i></span>
						<span>Shipping:</span>
					</div>
					<!-- BSTORE-BREADCRUMB END -->

					<h2 class="page-title">Shipping:</h2>

					<!-- SHOPING-CART-MENU START -->
					<div class="shoping-cart-menu">
						<ul class="step">
							<li class="step-todo first step-done">
								<span><a href="cart.php">01. Summary</a></span>
							</li>
							<li class="step-todo second step-done">
								<span><a href="checkout-signin.php">02. Sign in</a></span>
							</li>
							<li class="step-todo third step-done">
								<span><a href="checkout-address.php">03. Address</a></span>
							</li>
							<li class="step-current four">
								<span>04. Shipping</span>
							</li>
							<li class="step-todo last" id="step_end">
								<span>05. Payment</span>
							</li>
						</ul>
					</div>
					<!-- SHOPING-CART-MENU END -->

					<!-- PRODUCT-DELIVERY-OPTION START -->
					<div class="product-delivery-option">
						<div class="product-delivery-address">
							<p>Choose a shipping option for this address: My address</p>
						</div>
						<!-- PRODUCT-DELIVERY-ITEM START -->
						<div class="product-delivery-item">
							<div class="product-delivery-single-item">
								<div class="table-responsive">
									<!-- PRODUCT-DELIVERY SINGLE OPTION START -->
									<table class="table table-bordered delivery-table">
										<tbody>
											<tr>
												<td class="delivery-option-radio">
													<div class="dalivery-radio">
														<span class="radio-box">
															<input type="radio" value="0" name="tax" checked>
														</span>
													</div>
												</td>
												<td class="delivery-method-icon">
													<img src="assets/images/bank.webp" alt="">
												</td>
												<td class="carrey-info">
													<strong>BIKE STORE</strong><br>
													Delivery time: Pick up in-store <br>
													The best price and speed
												</td>
												<td class="carrey-cost">Free</td>
											</tr>
										</tbody>
									</table>
									<!-- PRODUCT-DELIVERY SINGLE OPTION END -->
								</div>
								<div class="table-responsive">
									<!-- PRODUCT-DELIVERY SINGLE OPTION START -->
									<table class="table table-bordered delivery-table">
										<tbody>
											<tr>
												<td class="delivery-option-radio">
													<div class="dalivery-radio">
														<span class="radio-box">
															<input type="radio" value="5" name="tax">
														</span>
													</div>
												</td>
												<td class="delivery-method-icon">
													<img src="assets/images/delivery-method.webp" alt="">
												</td>
												<td class="carrey-info">
													<strong>Cash on delivery</strong><br>
													<p class="mt-2">
														Collect your product from your address<br>
														<span class="small">(include shipping cost <b>Tk.5</b>)</span>
													</p>
												</td>
												<td class="carrey-cost">
													৳500.00 (tax.)
												</td>
											</tr>
										</tbody>
									</table>
									<!-- PRODUCT-DELIVERY SINGLE OPTION END -->
								</div>
							</div>
						</div>
						<!-- PRODUCT-DELIVERY-ITEM START -->
						<!-- TERMS-OF-SERVICE START -->
					</div>
					<!-- PRODUCT-DELIVERY-OPTION END -->

					<!-- RETURNE-CONTINUE-SHOP START -->
					<div class="returne-continue-shop">
						<a href="index.php" class="continueshoping"><i class="fa fa-chevron-left"></i>Continue
							shopping</a>
						<a href="checkout.php" class="procedtocheckout">Proceed to checkout<i class="fa fa-chevron-right"></i></a>
					</div>
					<!-- RETURNE-CONTINUE-SHOP END -->
				</div>
			</section>

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

<?php }
	} ?>