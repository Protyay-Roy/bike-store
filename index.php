<!doctype html>
<html lang="zxx">

<!-- LINK AREA START -->
<?php
include("includes/link.php");

?>
<!-- LINK AREA END -->

<body>

	<!-- HEADER AREA START -->
	<?php
	$active = "home";
	include("includes/header.php");
	?>
	<!-- HEADER-TOP START -->

	<!-- MAIN-CONTENT-SECTION START -->
	<section class="main-content-section">
		<div class="slider-area">
			<div id="wrapper">
				<div class="slider-wrapper">
					<div id="mainSlider" class="nivoSlider">
						<img src="assets/images/slider/edit-pexels-giorgio-de-angelis-1413412.jpg" alt="main slider" title="#htmlcaption" />
						<img src="assets/images/slider/edit-pexels-mã-chí-tài-9177145.jpg" alt="main slider" title="#htmlcaption2" />
					</div>
					<div id="htmlcaption" class="nivo-html-caption slider-caption">
						<div class="slider-progress"></div>
						<div class="slider-cap-text slider-text1">
							<div class="d-table-cell">
								<h2 class="animated bounceInDown">BIKE STORE</h2>
								<p class="animated bounceInUp">Lorem ipsum dolor sit amet, consectetuer
									adipiscing elit, sed diam nonummy nibh euismod ut laoreet dolore magna
									aliquam erat volutpat.</p>
								<a class="wow zoomInDown" data-wow-duration="1s" data-wow-delay="1s" href="about-us.php">Read More <i class="fa fa-caret-right"></i></a>
							</div>
						</div>
					</div>
					<div id="htmlcaption2" class="nivo-html-caption slider-caption">
						<div class="slider-progress"></div>
						<div class="slider-cap-text slider-text2">
							<div class="d-table-cell">
								<h2 class="animated bounceInDown">BIKE STORE</h2>
								<p class="animated bounceInUp">Lorem ipsum dolor sit amet, consectetuer
									adipiscing elit, sed diam nonummy nibh euismod ut laoreet dolore magna
									aliquam erat volutpat.</p>
								<a class="wow zoomInDown" data-wow-duration="1s" data-wow-delay="1s" href="#">Read More <i class="fa fa-caret-right"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- <div class="overlay"></div> -->

		<div class="container">
			<!-- MAIN-SLIDER-AREA START -->
			<div class="row main-slider-area">
				<!-- SLIDER-AREA START -->
				<div class="col-md-12">

				</div>
				<!-- SLIDER-AREA END -->


			</div>
			<!-- MAIN-SLIDER-AREA END -->

			<!-- FEATURED-PRODUCTS-AREA START -->
			<div class="featured-products-area mb-5">
				<div class="center-title-area">
					<h2 class="center-title">Featured Products</h2>
				</div>

				<div class="carousel-wrap">
					<!-- FEARTURED-CAROUSEL START -->
					<div class="feartured-carousel owl-carousel">

						<!-- SINGLE-PRODUCT-ITEM START -->

						<?php 
						$s = "SELECT * FROM `product` WHERE p_type= 'NEW' ORDER BY RAND()";

						$q = mysqli_query($con, $s) or die("Query Failed");
					
						while ($row_products = mysqli_fetch_array($q)) {
					
							$pro_id = $row_products['p_id'];
							$pro_title = $row_products['p_title'];
							$pro_price = $row_products['p_price'];
							$pro_price = $pro_price;
							$pro_img1 = $row_products['p_img1'];
							$p_type = $row_products['p_type'];
					
							echo
							'<div class="single-product-item">
								<div class="product-image index_page">
									<a href="single-product.php?proID=' . $pro_id . '"><img src="admin_area/product_images/' . $pro_img1 . '" alt="' . $pro_img1 . '" style="min-height:209px;max-height:209px;" /></a>
									<a href="#" class="new-mark-box">' . $p_type . '</a>
									<div class="overlay-content">
										<ul>
											<li>
												<a href="single-product.php?proID=' . $pro_id . '" title="Quick view"><i class="fa fa-search"></i></a>
											</li>
											<li>
												<a href="single-product.php?proID=' . $pro_id . '" title="' . $pro_title . '"><i class="fa fa-shopping-cart"></i></a></li>
											<li><a href="#" title="Quick view"><i class="fa fa-retweet"></i></a>
											</li>
											<li><a href="#" title="Quick view"><i class="fa fa-heart-o"></i></a>
											</li>
										</ul>
									</div>
								</div>
								<div class="product-info mt-2">
									<a href="single-product.php?proID=' . $pro_id . '">' . ucwords($pro_title) . '</a>
									<div class="price-box">
										<span class="price">৳' . $pro_price . '</span>
									</div>
								</div>
							</div>';
						} 
						
						?>

						<!-- SINGLE-PRODUCT-ITEM END -->

					</div>
					<!-- FEARTURED-CAROUSEL END -->
				</div>
			</div>
			<!-- FEATURED-PRODUCTS-AREA END -->
		</div>
	</section>
	<!-- MAIN-CONTENT-SECTION END -->

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