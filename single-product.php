<!doctype html>
<html lang="zxx">

<!-- LINK AREA START -->
<?php include("includes/link.php"); ?>
<!-- LINK AREA END -->

<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

<style>
	.progress-label-left {
		float: left;
		margin-right: 0.5em;
		line-height: 1em;
	}

	.progress-label-right {
		float: right;
		margin-left: 0.3em;
		line-height: 1em;
	}

	.star-light {
		color: #e9ecef;
	}

	.table>:not(caption)>*>* {
		padding: 3px;
		background-color: var(--bs-table-bg);
		border-bottom-width: 1px;
		box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);
	}
</style>

<body>

	<!-- HEADER AREA START -->
	<?php include("includes/header.php"); ?>
	<!-- HEADER-TOP END -->

	<style>
	</style>

	<?php
	if (isset($_GET["proID"])) {

		$p_id = $_GET["proID"];
		$imgSql = "SELECT * FROM product WHERE p_id = '$p_id'";
		$imgQuery = $con->query($imgSql);
		$imgRow = $imgQuery->fetch_assoc();
		$pro_img1 = $imgRow["p_img1"];
		$pro_img2 = $imgRow["p_img2"];
		$pro_img3 = $imgRow["p_img3"];
		$pro_price = $imgRow["p_price"];
		$pro_title = $imgRow["p_title"];
		$pro_gen_name = $imgRow["p_generic_name"];
		$pro_catId = $imgRow["cat_id"];
		$p_type = $imgRow["p_type"];

		$attrSql = "SELECT * FROM bike_attr WHERE id = '$p_id'";
		$attrQuery = $con->query($attrSql);
		$attrRow = $attrQuery->fetch_assoc();

		$catSql = "SELECT * FROM categories WHERE cat_id = '$pro_catId '";
		$catQuery = $con->query($catSql) or die('Categories Query Failed');
		$catRow = $catQuery->fetch_assoc();
		$cat_title = $catRow["cat_title"];
	}
	?>

	<!-- MAIN-CONTENT-SECTION START -->
	<section class="main-content-section">
		<div class="container">
			<!-- BSTORE-BREADCRUMB START -->
			<div class="bstore-breadcrumb">
				<a href="index.php">HOMe<span><i class="fa fa-caret-right"></i> </span> </a>
				<span> <i class="fa fa-caret-right"> </i> </span>
				<a href="shop-gird.html"> <?= $cat_title; ?> </a>
			</div>
			<!-- BSTORE-BREADCRUMB END -->

			<div class="row">
				<div class="col-lg-12 pb-5 mb-5">
					<!-- SINGLE-PRODUCT-DESCRIPTION START -->
					<div class="row">
						<div class="col-lg-5 col-md-4">
							<div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
								<div class="carousel-indicators">
									<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
									<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
									<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
								</div>
								<div class="carousel-inner">
									<div class="carousel-item active">
										<img src="admin_area/product_images/<?= $pro_img1; ?>" class="d-block w-100" alt="...">
									</div>
									<div class="carousel-item">
										<img src="admin_area/product_images/<?= $pro_img2; ?>" class="d-block w-100" alt="...">
									</div>
									<div class="carousel-item">
										<img src="admin_area/product_images/<?= $pro_img3; ?>" class="d-block w-100" alt="...">
									</div>
								</div>
								<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
									<span class="carousel-control-prev-icon" aria-hidden="true"></span>
									<span class="visually-hidden">Previous</span>
								</button>
								<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
									<span class="carousel-control-next-icon" aria-hidden="true"></span>
									<span class="visually-hidden">Next</span>
								</button>
							</div>

							<!-- thumbnail row Begin -->
							<div class="row mt-4">
								<div class="col-md-4">
									<a href="#carouselExampleFade" class="thumbnail" data-target="#carouselExampleFade" data-bs-slide-to="0">
										<img src="admin_area/product_images/<?= $pro_img1 ?>" alt="<?= $pro_img1 ?>" class="img-responsive">
									</a>
								</div>
								<div class="col-md-4">
									<a href="#carouselExampleFade" class="thumbnail" data-target="#carouselExampleFade" data-bs-slide-to="1">
										<img src="admin_area/product_images/<?= $pro_img2 ?>" alt="<?= $pro_img1 ?>" class="img-responsive">
									</a>
								</div>
								<div class="col-md-4">
									<a href="#carouselExampleFade" class="thumbnail" data-target="#carouselExampleFade" data-bs-slide-to="2">
										<img src="admin_area/product_images/<?= $pro_img3 ?>" alt="<?= $pro_img1 ?>" class="img-responsive">
									</a>
								</div>
							</div>
							<!-- thumb row Finish -->
						</div>


						<div class="col-lg-7 col-md-8">
							<?php addCart(); ?>

							<div class="row">
								<div class="col-md-8">
									<form action="single-product.php?addCart=<?= $p_id; ?>" method="POST">
										<div class="single-product-descirption">
											<h2 style="margin-bottom: 0;padding-bottom: 0;"><?= $pro_title; ?></h2>
											<small><?= "(" . $pro_gen_name . ")" ?></small>
											<div class="single-product-social-share">
												<ul>
													<li><a href="#" class="twi-link"><i class="fa fa-twitter"></i>Tweet</a></li>
													<li><a href="#" class="fb-link"><i class="fa fa-facebook"></i>Share</a></li>
													<li><a href="#" class="g-plus-link"><i class="fa fa-google-plus"></i>Google+</a>
													</li>
													<li><a href="#" class="pin-link"><i class="fa fa-pinterest"></i>Pinterest</a>
													</li>
												</ul>
											</div>
											<div class="single-product-condition">
												<p>Condition: <span><?= $p_type; ?> product</span></p>
											</div>
											<div class="single-product-price">
												<h2>৳<?= $pro_price; ?></h2>
											</div>
											<div class="single-product-quantity">
												<p class="small-title">Quantity</p><br>
												<div class="cart-quantity">
													<div class="cart-plus-minus-button single-qty-btn">
														<input class="cart-plus-minus sing-pro-qty" type="text" name="qtybutton" value="1" required>
													</div>
												</div>
											</div>
											<div class="single-product-add-cart">
												<button class="add-cart-text">Add to cart</button>
											</div>
										</div>
									</form>
								</div>
								<div class="col-md-4">
								<?php addPescription(); ?>
								<h5>Add Pescription</h5>
								<hr>
									<form method="post" enctype="multipart/form-data"> 
										<input type="file" name="pescription" class="form-control">
										<input type="hidden" name="product_id" class="form-control" value="<?= $p_id; ?>">
										<button class="btn btn-success mt-2" name="prescription_submit" style="margin-left: 130px;">submit</button>
									</form>
								</div>
							</div>
						</div>
					</div>
					<!-- SINGLE-PRODUCT-DESCRIPTION END -->
					<!-- <h1 class="mt-5 mb-5">Review & Rating System in PHP & Mysql using Ajax</h1> -->
					<div class="card">
						<div class="card-header">Review Product</div>
						<div class="card-body">
							<div class="row">
								<div class="col-sm-4 text-center">
									<h1 class="text-warning mt-4 mb-4">
										<b><span id="average_rating">0.0</span> / 5</b>
									</h1>
									<div class="mb-3">
										<i class="fas fa-star star-light mr-1 main_star"></i>
										<i class="fas fa-star star-light mr-1 main_star"></i>
										<i class="fas fa-star star-light mr-1 main_star"></i>
										<i class="fas fa-star star-light mr-1 main_star"></i>
										<i class="fas fa-star star-light mr-1 main_star"></i>
									</div>
									<h3><span id="total_review">0</span> Review</h3>
								</div>
								<div class="col-sm-4">
									<p>
									<div class="progress-label-left"><b>5</b> <i class="fas fa-star text-warning"></i></div>

									<div class="progress-label-right">(<span id="total_five_star_review">0</span>)</div>
									<div class="progress">
										<div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="five_star_progress"></div>
									</div>
									</p>
									<p>
									<div class="progress-label-left"><b>4</b> <i class="fas fa-star text-warning"></i></div>

									<div class="progress-label-right">(<span id="total_four_star_review">0</span>)</div>
									<div class="progress">
										<div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="four_star_progress"></div>
									</div>
									</p>
									<p>
									<div class="progress-label-left"><b>3</b> <i class="fas fa-star text-warning"></i></div>

									<div class="progress-label-right">(<span id="total_three_star_review">0</span>)</div>
									<div class="progress">
										<div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="three_star_progress"></div>
									</div>
									</p>
									<p>
									<div class="progress-label-left"><b>2</b> <i class="fas fa-star text-warning"></i></div>

									<div class="progress-label-right">(<span id="total_two_star_review">0</span>)</div>
									<div class="progress">
										<div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="two_star_progress"></div>
									</div>
									</p>
									<p>
									<div class="progress-label-left"><b>1</b> <i class="fas fa-star text-warning"></i></div>

									<div class="progress-label-right">(<span id="total_one_star_review">0</span>)</div>
									<div class="progress">
										<div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="one_star_progress"></div>
									</div>
									</p>
								</div>
								<div class="col-sm-4 text-center">
									<h3 class="mt-4 mb-3">Write Review Here</h3>
									<button type="button" name="add_review" id="add_review" class="btn btn-primary">Review</button>
								</div>
							</div>
						</div>
					</div>
					<div class="mt-5" id="review_content"></div>

					<div id="review_modal" class="modal" tabindex="-1" role="dialog">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title">Submit Review</h5>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
								<?php
								if (!isset($_SESSION["c_email"])) {


									echo "<center><h5 class='m-3 p-2'> Please Login first. <a href='registration.php'><small class='text-primary'> Click Here </small></a></h5> </center>";
								} else {
									$imgQ = "SELECT * FROM customer WHERE c_email = '{$_SESSION["c_email"]}'";
									$imgQ = $con->query($imgQ);
									$imgR = mysqli_fetch_assoc($imgQ);
									$img = $imgR["c_img"];
									$name = $imgR["c_name"];
								?>
									<div class="modal-body">
										<h4 class="text-center mt-2 mb-4">
											<i class="fas fa-star star-light submit_star mr-1" id="submit_star_1" data-rating="1"></i>
											<i class="fas fa-star star-light submit_star mr-1" id="submit_star_2" data-rating="2"></i>
											<i class="fas fa-star star-light submit_star mr-1" id="submit_star_3" data-rating="3"></i>
											<i class="fas fa-star star-light submit_star mr-1" id="submit_star_4" data-rating="4"></i>
											<i class="fas fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
										</h4>
										<div class="form-group">
											<input type="text" name="user_name" id="user_name" class="form-control" value="<?= $name; ?>" readonly />
										</div>
										<div class="form-group mt-3">
											<textarea name="user_review" id="user_review" class="form-control" placeholder="Type Review Here"></textarea>
										</div>
										<div class="form-group text-center mt-4">
											<button type="button" class="btn btn-primary" id="save_review">Submit</button>
										</div>
									</div>
								<?php } ?>
							</div>
						</div>
					</div>

					<!-- RELATED-PRODUCTS-AREA START -->

					<div class="left-title-area">
						<h2 class="left-title">related products</h2>
					</div>

					<div class="related-product-area featured-products-area">
						<div class="carousel-wrap">

							<!-- RELATED-CAROUSEL START -->
							<div class="related-product owl-carousel" style="max-height:209px ;">

								<?php get_pro() ?>

								<!-- SINGLE-PRODUCT-ITEM END -->
							</div>
							<!-- RELATED-CAROUSEL END -->
						</div>
					</div>
					<!-- RELATED-PRODUCTS-AREA END -->
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


	<script>
		$(document).ready(function() {

			var rating_data = 0;

			$('#add_review').click(function() {

				$('#review_modal').modal('show');

			});

			$(document).on('mouseenter', '.submit_star', function() {

				var rating = $(this).data('rating');

				reset_background();

				for (var count = 1; count <= rating; count++) {

					$('#submit_star_' + count).addClass('text-warning');

				}

			});

			function reset_background() {
				for (var count = 1; count <= 5; count++) {

					$('#submit_star_' + count).addClass('star-light');

					$('#submit_star_' + count).removeClass('text-warning');

				}
			}

			$(document).on('mouseleave', '.submit_star', function() {

				reset_background();

				for (var count = 1; count <= rating_data; count++) {

					$('#submit_star_' + count).removeClass('star-light');

					$('#submit_star_' + count).addClass('text-warning');
				}

			});

			$(document).on('click', '.submit_star', function() {

				rating_data = $(this).data('rating');

			});

			$('#save_review').click(function() {

				var user_name = $('#user_name').val();

				var user_review = $('#user_review').val();

				if (user_name == '' || user_review == '') {
					alert("Please Fill Both Field");
					return false;
				} else {
					$.ajax({
						url: "submit_rating.php",
						method: "POST",
						data: {
							rating_data: rating_data,
							user_name: user_name,
							user_review: user_review
						},
						success: function(data) {
							$('#review_modal').modal('hide');

							load_rating_data();

							alert(data);
						}
					})
				}

			});

			load_rating_data();

			function load_rating_data() {
				$.ajax({
					url: "submit_rating.php",
					method: "POST",
					data: {
						action: 'load_data'
					},
					dataType: "JSON",
					success: function(data) {
						$('#average_rating').text(data.average_rating);
						$('#total_review').text(data.total_review);

						var count_star = 0;

						$('.main_star').each(function() {
							count_star++;
							if (Math.ceil(data.average_rating) >= count_star) {
								$(this).addClass('text-warning');
								$(this).addClass('star-light');
							}
						});

						$('#total_five_star_review').text(data.five_star_review);

						$('#total_four_star_review').text(data.four_star_review);

						$('#total_three_star_review').text(data.three_star_review);

						$('#total_two_star_review').text(data.two_star_review);

						$('#total_one_star_review').text(data.one_star_review);

						$('#five_star_progress').css('width', (data.five_star_review / data.total_review) * 100 + '%');

						$('#four_star_progress').css('width', (data.four_star_review / data.total_review) * 100 + '%');

						$('#three_star_progress').css('width', (data.three_star_review / data.total_review) * 100 + '%');

						$('#two_star_progress').css('width', (data.two_star_review / data.total_review) * 100 + '%');

						$('#one_star_progress').css('width', (data.one_star_review / data.total_review) * 100 + '%');

						if (data.review_data.length > 0) {
							var html = '';

							for (var count = 0; count < data.review_data.length; count++) {
								html += '<div class="row mb-3">';

								html += '<div class="col-sm-1"><div class="rounded-circle bg-danger text-white pt-2 pb-2"><h3 class="text-center">' + data.review_data[count].user_name.charAt(0) + '</h3></div></div>';

								html += '<div class="col-sm-11">';

								html += '<div class="card">';

								html += '<div class="card-header"><b>' + data.review_data[count].user_name + '</b></div>';

								html += '<div class="card-body">';

								for (var star = 1; star <= 5; star++) {
									var class_name = '';

									if (data.review_data[count].rating >= star) {
										class_name = 'text-warning';
									} else {
										class_name = 'star-light';
									}

									html += '<i class="fas fa-star ' + class_name + ' mr-1"></i>';
								}

								html += '<br />';

								html += data.review_data[count].user_review;

								html += '</div>';

								html += '<div class="card-footer text-right">On ' + data.review_data[count].datetime + '</div>';

								html += '</div>';

								html += '</div>';

								html += '</div>';
							}

							$('#review_content').html(html);
						}
					}
				})
			}

		});
	</script>

</body>

</html>