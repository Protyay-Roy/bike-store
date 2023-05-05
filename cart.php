<!doctype html>
<html lang="zxx">

<!-- LINK AREA START -->
<?php include("includes/link.php"); ?>
<!-- LINK AREA END -->
<style>
	button.cart_quantity_update i:hover {
		opacity: .5;
	}

	button.cart_quantity_update i {
		font-size: 22px;
		color: #222;
		background: #fff;
	}

	button.cart_quantity_update {
		border: 0;
		color: transparent;
		outline: none;
	}

	button.cart_quantity_delete i:hover {
		opacity: .5;
	}

	button.cart_quantity_delete i {
		font-size: 22px;
		color: #222;
		background: #fff;
	}

	button.cart_quantity_delete {
		border: 0;
		color: transparent;
		outline: none;
	}
</style>

<body>
	<!-- HEADER-TOP START -->
	<?php include("includes/header.php"); ?>
	<!-- HEADER-TOP END -->

	<!-- MAIN-CONTENT-SECTION START -->
	<section class="main-content-section">
		<div class="container">
			<!-- BSTORE-BREADCRUMB START -->
			<div class="bstore-breadcrumb">
				<a href="index.php">HOME</a>
				<span><i class="fa fa-caret-right	"></i></span>
				<span>Your shopping cart</span>
			</div>
			<!-- BSTORE-BREADCRUMB END -->

			<!-- SHOPPING-CART SUMMARY START -->
			<h2 class="page-title">Shopping-cart summary <span class="shop-pro-item">Your shopping cart
					contains: <?= cartItem(); ?> products</span></h2>
			<!-- SHOPPING-CART SUMMARY END -->

			<!-- SHOPING-CART-MENU START -->
			<div class="shoping-cart-menu">
				<ul class="step">
					<li class="step-current first">
						<span>01. Summary</span>
					</li>
					<li class="step-todo second">
						<span>02. Sign in</span>
					</li>
					<li class="step-todo third">
						<span>03. Address</span>
					</li>
					<li class="step-todo four">
						<span>04. Shipping</span>
					</li>
					<li class="step-todo last" id="step_end">
						<span>05. Payment</span>
					</li>
				</ul>
			</div>
			<!-- SHOPING-CART-MENU END -->

			<!-- CART TABLE_BLOCK START -->
			<div class="table-content table-responsive">
				<!-- TABLE START -->
				<table class="table table-bordered" id="cart-summary">
					<?php


					$ip = getRealUserIp();

					$total = 0;

					$sql = "SELECT * FROM `cart` WHERE `c_ip` = '$ip'";
					$que = mysqli_query($con, $sql) or die('Query Failed First_cart php');

					if (mysqli_num_rows($que) == 0) {

						echo "<h3 class='text-center '>&#128549; Oops! No item in your cart</h3>";
					} else {
					?>
						<!-- TABLE HEADER START -->
						<thead>
							<tr>
								<th class="cart-product">Product</th>
								<th class="cart-description">Description</th>
								<th class="cart-avail text-center">Availability</th>
								<th class="cart-unit text-right">Unit price</th>
								<th class="cart_quantity text-center">Qty</th>
								<th class="cart_quantity text-center">Update</th>
								<th class="cart-delete">&nbsp;Delete</th>
								<th class="cart-total text-right">Total</th>
							</tr>
						</thead>
						<!-- TABLE HEADER END -->
						<!-- TABLE BODY START -->
						<tbody>
							<!-- SINGLE CART_ITEM START -->

							<?php

							while ($row = mysqli_fetch_array($que)) {

								$p_id = $row["p_id"];
								$p_qty = $row["qty"];
								$cartId = $row["cart_id"];

								$s = "SELECT * FROM `product` WHERE `p_id` = '$p_id'";
								$q = mysqli_query($con, $s) or die('Query Failed 2');

								while ($r = mysqli_fetch_array($q)) {

									$p_img1 = $r["p_img1"];
									$p_title = $r["p_title"];
									$p_price = $r["p_price"];
									$p_invNo = $r["invoice_no"];

									$sub_total = $r["p_price"] * $p_qty;
									$total += $sub_total;

									$p_cat_id = $r["p_cat_id"];
									$p_catSql = "SELECT * FROM pro_categories WHERE p_cat_id = '$p_cat_id'";
									$p_catQuery = $con->query($p_catSql);
									$p_catRow = $p_catQuery->fetch_assoc();

									$p_cat = $p_catRow["p_cat_title"]


							?>
									<tr>
										<td class="cart-product">
											<a href="single-product.php?proID=<?= $p_id; ?>"><img src="admin_area/product_images/<?= $p_img1; ?>" alt="<?= $p_img1; ?>"></a>
										</td>
										<td class="cart-description">
											<p class="product-name"><a href="#"><?= $p_title; ?></a></p>
											<small>Invoice No : <?= $p_invNo; ?></small>
										</td>
										<td class="cart-avail"><span class="label label-success">In stock</span></td>
										<td class="cart-unit">
											<ul class="price text-right">
												<li class="price">৳<?= $p_price; ?></li>
											</ul>
										</td>

										<form action="" method="POST">

											<input type="hidden" name="cart_id" value="<?= $cartId; ?>">
											<td class="cart_quantity text-center">
												<div class="cart-plus-minus-button">
													<input class="cart-plus-minus" type="text" name="qtybutton" value="<?= $p_qty; ?>">
												</div>
											</td>
											<td class="cart-delete text-center">
												<span>
													<button class="cart_quantity_update" title="Update" name="update">
														<i class="fa fa-refresh"></i>
													</button>
												</span>
											</td>
											<td class="cart-delete text-center">
												<span>
													<button class="cart_quantity_delete" title="Delete" name="delete">
														<i class="fa fa-trash-o"></i>
													</button>
												</span>
											</td>
										</form>

										<?php
										if (isset($_POST["update"])) {
											$cartId = $_POST["cart_id"];
											$cartQty = $_POST["qtybutton"];
											$updateSql = "UPDATE `cart` SET `qty`='$cartQty' WHERE `cart_id`='$cartId'";
											if ($con->query($updateSql)) {
												echo "<script>alert('Your cart updated')</script>";
												echo "<script>window.open('cart.php', '_self')</script>";
											}
										}
										?>
										<td class="cart-total">
											<span class="price">৳<?= $sub_total; ?></span>
										</td>
									</tr>
									<!-- SINGLE CART_ITEM END -->

							<?php	}
							} ?>
						</tbody>
						<!-- TABLE BODY END -->
						<!-- TABLE FOOTER START -->
						<tfoot>
							<tr class="cart-total-price">
								<td class="cart_voucher" colspan="3" rowspan="4"></td>
								<td class="text-right" colspan="4">Total products (tax excl.)</td>
								<td id="total_product" class="price" colspan="1">৳ <?= $total; ?></td>
							</tr>
							<tr>
								<td class="text-right" colspan="4">Total shipping</td>
								<td id="total_shipping" class="price" colspan="1">৳ 0</td>
							</tr>
							<tr>
								<td class="text-right" colspan="4">Total vouchers (tax excl.)</td>
								<td class="price" colspan="1">৳ 0.00</td>
							</tr>
							<tr>
								<td class="total-price-container text-right" colspan="4">
									<span>Total</span>
								</td>
								<td id="total-price-container" class="price" colspan="1">
									<span id="total-price">৳ <?= $total; ?></span>
								</td>
							</tr>
						</tfoot>
						<!-- TABLE FOOTER END -->

					<?php } ?>

				</table>
				<!-- TABLE END -->
			</div>
			<!-- CART TABLE_BLOCK END -->

			<?php if (mysqli_num_rows($que) == 0) {	?>

				<!-- RETURNE-CONTINUE-SHOP START -->
				<div class="returne-continue-shop">
					<a href="index.php" class="continueshoping btn btn-success">
						<i class="fa fa-chevron-left"></i>Continue shopping
					</a>
				</div>
				<!-- RETURNE-CONTINUE-SHOP END -->
			<?php	} else {	?>

				<!-- RETURNE-CONTINUE-SHOP START -->
				<div class="returne-continue-shop">
					<a href="index.php" class="continueshoping btn btn-success">
						<i class="fa fa-chevron-left"></i>Continue shopping
					</a>

					<?php if (!isset($_SESSION["c_email"])) { ?>

						<a href="checkout-signin.php" class="procedtocheckout">
							Proceed to checkout <i class="fa fa-chevron-right"></i>
						</a>

					<?php	} else { ?>

						<a href="checkout-address.php" class="procedtocheckout">
							Proceed to checkout <i class="fa fa-chevron-right"></i>
						</a>

					<?php	}	?>

				</div>
				<!-- RETURNE-CONTINUE-SHOP END -->
		</div>

	<?php	}	?>

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