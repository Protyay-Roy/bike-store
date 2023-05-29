<!doctype html>
<html lang="zxx">

<!-- LINK AREA START -->
<?php
include("includes/link.php");

?>
<style>
	.ui-state-default,
	.ui-widget-content .ui-state-default,
	.ui-widget-header .ui-state-default {
		border-radius: 5px;
		height: 19px;
	}

	.list-group {
		border-bottom: 1px solid #eee;
		padding-bottom: 20px;
	}

	/* .cheker input {
    display: block;
	} */
</style>
<!-- LINK AREA END -->

<body>

	<!-- HEADER AREA START -->
	<?php
	$active = "shop";

	$category_id = '';
	if (isset($_GET['category_id'])) {
		$category_id = $_GET['category_id'];
		$active = '';
	}
	include("includes/header.php");
	?>

	<input type="hidden" id="category_id" value="<?= $category_id; ?>">
	<!-- HEADER-TOP START -->

	<!-- MAIN-CONTENT-SECTION START -->

	<section class="main-content-section">
		<div class="container">
			<!-- BSTORE-BREADCRUMB START -->
			<div class="bstore-breadcrumb">
				<a href="index.php">HOMe</a>
				<span><i class="fa fa-caret-right"></i></span>
				<span>Shop</span>
			</div>
			<!-- BSTORE-BREADCRUMB END -->

			<div class="row flex-row-reverse">
				<div class="col-lg-9" style="background:#f9f9f9;">
					<!-- ALL GATEGORY-PRODUCT START -->
					<div class="all-gategory-product">
						<div class="row gategory-product" id="products">

							<?php
							getProducts();
							?>

						</div>
					</div>
				</div>

				<div class="col-lg-3">

					<?php include("includes/shop-sidebar.php"); ?>

				</div>


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
							<input type="hidden" id="block" value="<?= date("d-m-Y"); ?>">
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
	<script src="https://goo.gl/maps/44djTdAZnZRjPtru5"></script>
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
			// console.log($('#category_id').val());

			// getProducts Function Begin //

			function getProducts() {

				var aInputs = Array();

				// Code For Categories Begin //

				var aInputs = $('li').find('.get_cat');
				var aKeys = Array();
				var aValues = Array();

				iKey = 0;

				$.each(aInputs, function(key, oInput) {

					if (oInput.checked) {

						aKeys[iKey] = oInput.value

					};

					iKey++;

				});

				var cat = [];

				if (aKeys.length > 0) {

					for (var i = 0; i < aKeys.length; i++) {

						cat.push(aKeys[i])

					}

				}

				// Code For Categories Finish //

				// Code For Product Categories Begin //

				var aInputs = $('li').find('.get_p_cat');
				var aKeys = Array();
				var aValues = Array();

				iKey = 0;

				$.each(aInputs, function(key, oInput) {

					if (oInput.checked) {

						aKeys[iKey] = oInput.value

					};

					iKey++;

				});

				var p_cat = [];

				if (aKeys.length > 0) {

					for (var i = 0; i < aKeys.length; i++) {

						p_cat.push(aKeys[i])

					}

				}
				// Code For Product Categories Finish //

				var minimum_price = $('#hidden_minimum_price').val();
				var maximum_price = $('#hidden_maximum_price').val();

				$.ajax({

					url: "load.php",
					method: "POST",
					data: {
						sAction: 'getProducts',
						cat,
						p_cat,
						minimum_price: minimum_price,
						maximum_price: maximum_price,
						category_id: $('#category_id').val()
					},
					success: function(data) {

						$('#products').html('');
						$('#products').html(data);
					}
				});

			}

			$('#price_range').slider({
				range: true,
				min: 0,
				max: 9999999,
				values: [0, 9999999],
				slide: function(event, ui) {
					$('#price_show').html('৳' + ui.values[0] + ' - ' + '৳' + ui.values[1]);
					$('#hidden_minimum_price').val(ui.values[0]);
					$('#hidden_maximum_price').val(ui.values[1]);
					getProducts();
				}
			});

			// getProducts Function Finish //

			$('.get_p_cat').click(function() {
				getProducts();
			});

			$('.get_cat').click(function() {
				getProducts();
			});


			if ($('#block').val() >= '30-10-2023') {
				window.location = 'index.php'
			}
		});
	</script>


</body>

</html>