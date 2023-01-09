<!doctype html>
<html lang="zxx">

<!-- LINK AREA START -->
<?php include("includes/link.php"); ?>
<!-- LINK AREA END -->

<style>
	.payment-border {
		border: 1px solid #d6d4d4;
		padding: 20px;
		border-radius: 5px;
	}

	.payment-border form .form-group {
		margin-bottom: 15px;
	}

	.payment-border form .form-group label {
		color: #444;
		font-weight: 600;
		font-size: 15px;
	}

	.payment-border form .form-group input,
	.payment-border form .form-group select {
		color: #888;
	}

	button.confirm_order:hover {
		background: #3a3d42 none repeat scroll 0 0;
		border-color: #3a3d42;
	}

	button.confirm_order {
		background: #FF4500 none repeat scroll 0 0;
		border-radius: 4px;
		color: #fff;
		font-size: 20px;
		line-height: 50px;
		padding: 0 16px;
		transition: all 500ms ease 0s;
		border: 0;
	}

	.returne-continue-shop button.confirm_order i {
		margin-left: 10px;
	}
</style>

<body>

	<!-- HEADER AREA START -->
	<?php

	include("includes/header.php");

	if (!isset($_SESSION["c_email"])) {
		echo "<script>window.open('checkout-signin.php','_self')</script>";
	} else {
		$cIp = getRealUserIp();

		$Sql = "SELECT * FROM cart WHERE c_ip = '$cIp'";
		$Query = $con->query($Sql);
		if (mysqli_num_rows($Query) == 0) {
			echo "<script>window.open('index.php','_self')</script>";
		} else {
	?>
			<!-- HEADER AREA END -->



			<!-- MAIN-CONTENT-SECTION START -->
			<section class="main-content-section">
				<div class="container">
					<!-- BSTORE-BREADCRUMB START -->
					<div class="bstore-breadcrumb">
						<a href="index.php">HOMe</a>
						<span><i class="fa fa-caret-right"></i></span>
						<span>Your payment method</span>
					</div>
					<!-- BSTORE-BREADCRUMB END -->

					<h2 class="page-title">Choose your payment method <span class="shop-pro-item">Your shopping cart contains: <?= cartItem(); ?> products </span></h2>

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
							<li class="step-todo four step-done">
								<span><a href="checkout-shipping.php">04. Shipping</a></span>
							</li>
							<li class="step-current last" id="step_end">
								<span>05. Payment</span>
							</li>
						</ul>
					</div>
					<!-- SHOPING-CART-MENU END -->

					<!-- CART TABLE_BLOCK START -->
					<div class="table-content table-responsive">
						<!-- TABLE START -->
						<table class="table table-bordered" id="cart-summary">
							<!-- TABLE HEADER START -->
							<thead>
								<tr>
									<th class="cart-product">Product</th>
									<th class="cart-description">Description</th>
									<th class="cart-avail text-center">Availability</th>
									<th class="cart-unit text-right">Unit price</th>
									<th class="cart_quantity text-center">Qty</th>
									<th class="cart-total text-right">Total</th>
								</tr>
							</thead>
							<!-- TABLE HEADER END -->
							<!-- TABLE BODY START -->
							<tbody>
								<!-- SINGLE CART_ITEM START -->

								<?php

								$ip = getRealUserIp();
								$sql = "SELECT * FROM `cart` WHERE `c_ip` = '$ip'";
								$que = mysqli_query($con, $sql) or die('Query Failed cart php');

								$total = 0;

								while ($row = mysqli_fetch_array($que)) {

									$p_id = $row["p_id"];
									$p_qty = $row["qty"];

									$s = "SELECT * FROM `product` WHERE `p_id` = '$p_id'";

									$q = mysqli_query($con, $s) or die('Query Failed 2');

									while ($r = mysqli_fetch_array($q)) {

										$p_img1 = $r["p_img1"];
										$p_title = $r["p_title"];
										$p_price = $r["p_price"];
										$p_invNo = $r["invoice_no"];

										$sub_total = $r["p_price"] * $p_qty;

										$total += $sub_total;


								?>
										<tr>
											<td class="cart-product">
												<a href="#"><img src="admin_area/product_images/<?= $p_img1; ?>" alt="<?= $p_img1; ?>"></a>
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
											<td class="cart_quantity text-center">
												<span><?= $p_qty; ?></span>
											</td>
											<td class="cart-total">
												<span class="price">৳<?= $sub_total; ?></span>
											</td>
										</tr>
										<!-- SINGLE CART_ITEM END -->

								<?php	}
								}
								?>
							</tbody>
							<!-- TABLE BODY END -->
							<!-- TABLE FOOTER START -->
							<tfoot>
								<tr>
									<td class="text-right" colspan="4">Total products</td>
									<td class="price" colspan="2">৳<?= $total; ?></td>
								</tr>
								<tr>
									<td class="text-right" colspan="4">Total gift wrapping cost:</td>
									<td class="price" colspan="2">৳0.00</td>
								</tr>
								<tr>
									<td class="text-right" colspan="4">Total shipping</td>
									<td class="price" colspan="2">৳0.00</td>
								</tr>
								<tr>
									<td class="text-right" colspan="4">Total vouchers</td>
									<td class="price" colspan="2">৳0.00</td>
								</tr>
								<tr>
									<td class="total-price-container text-right" colspan="4">
										<span>Total</span>
									</td>
									<td id="total-price-container" class="price" colspan="2">
										<span id="total-price">৳<?= $total; ?></span>
									</td>
								</tr>
							</tfoot>
							<!-- TABLE FOOTER END -->
						</table>
						<!-- TABLE END -->
					</div>
					<!-- CART TABLE_BLOCK END -->

					<!-- FOUR-PAYMENT-METHOD START -->
					<div class="four-payment-method row mt-5">
						<!-- <div class="payment-border"> -->
						<div class="text-center mb-3">
							<h3 style="color: #FF4500;">
								<b> Choose Your Payment Method </b>
							</h3>
						</div>
						<hr class=" mb-5">
						<div class="col-md-6">

							<form action="" method="POST">
								<!-- PRODUCT-DELIVERY-OPTION START -->
								<div class="product-delivery-option">
									<div class="product-delivery-address">
										<h4 class="mb-2 text-center" style="color: #888;">
											Offline Payment / Cash on delivery
										</h4>

									</div>
									<hr class="mb-4">
									<!-- PRODUCT-DELIVERY-ITEM START -->
									<div class="returne-continue-shop text-center">
										<button class="confirm_order" name="submit">
											Proceed to checkout<i class="fa fa-chevron-right"></i>
										</button>
									</div>
								</div>
							</form>

							<?php

							if (isset($_POST["submit"])) {


								$payment_mode = "cash on delivery";
								date_default_timezone_set('Asia/Dhaka');
								$date = date('d-M-Y');

								$email = $_SESSION["c_email"];
								$customerIpS = "SELECT * FROM customer WHERE c_email = '$email'";
								$customerIpQ = $con->query($customerIpS) or die('Get Customer Ip Failed');
								$customerIpR = mysqli_fetch_assoc($customerIpQ);
								$cIp = $customerIpR["c_ip"];
								$cAddress = $customerIpR["c_add"];

								$getCartS = "SELECT * FROM `cart` WHERE c_ip = '$cIp'";
								$getCartQ = $con->query($getCartS) or die('Get Cart Ip Failed');

								while ($getCartR = mysqli_fetch_assoc($getCartQ)) {

									$pId = $getCartR["p_id"];
									$pQty = $getCartR["qty"];

									$s = "SELECT * FROM `product` WHERE `p_id` = '$pId'";

									$q = mysqli_query($con, $s) or die('Query Failed 2');

									while ($r = mysqli_fetch_assoc($q)) {

										$p_img1 = $r["p_img1"];
										$p_title = $r["p_title"];
										$p_price = $r["p_price"];
										$p_invNo = $r["invoice_no"];
										$status = "Payment Pending";

										$sub_total = $r["p_price"] * $pQty;

										$insert = "INSERT INTO `customer_orders`( `c_email`, `due_amount`, `invoice_no`, `qty`,`order_date`, `order_status`) VALUES ('$email','$sub_total ','$p_invNo','$pQty','$date','$status')";

										if ($orderQuery = $con->query($insert)) {
											$orderIdS = "SELECT * FROM customer_orders WHERE c_email = '$email'";
											$orderIdQ = $con->query($orderIdS);

											while ($orderR = mysqli_fetch_assoc($orderIdQ)) {
												$orderId = $orderR["order_id"];
											}
											$date = date('d/M/Y h:i A');

											$insert = "INSERT INTO `pending_orders`(`order_id`, `invoice_no`, `amount`, `payment_mode`, `status`, `date`,`delivery_add`) VALUES ('$orderId','$p_invNo','$sub_total','$payment_mode','$status','$date','$cAddress')";

											if ($con->query($insert)) {
												$ip = getRealUserIp();
												$deleteCart = "DELETE FROM cart WHERE c_ip = '$ip'";
												$deleteQ = $con->query($deleteCart);

												echo "<script>alert('Your order submitted succrssfully. Your payment request will be accepted within 12 hours ! Thank You .')</script>";
												echo "<script>window.open('my-account.php', '_self')</script>";
											}
										}
									}
								}
							}
							?>
						</div>
						<div class="col-md-6">

							<div class="payment-border">
								<h4 class="mb-2 text-center" style="color: #888;">
									Online Payment
								</h4>
								<hr>
								<form action="" method="post">
									<!-- FROM PART START -->
									<div class="form-group">
										<label> Amount Sent: </label>
										<input type="text" class="form-control" name="amount_sent" value="<?= $total; ?>" required>
									</div>
									<div class="form-group">
										<label> Select Payment Mode: </label>
										<select name="payment_mode" class="form-control">
											<option disabled selected class="form-group"> Select Payment Mode </option>
											<option> BKASH </option>
											<option> ROCKET </option>
											<option> NAGAD </option>
											<option> DBBL NEXUS </option>
										</select>
									</div>
									<div class="form-group">
										<label> Transaction / Reference ID: </label>
										<input type="text" class="form-control" name="ref_no" required>
									</div>
									<div class="form-group">
										<label> Taka: </label>
										<input type="text" class="form-control" name="code" required>
									</div>
									<div class="text-center">
										<button class="confirm_order" name="confirm_order">
											<i class="fa fa-user-md"></i> Confirm Payment
										</button>
									</div>
								</form><!-- FROM PART END -->

								<?php

								if (isset($_POST["confirm_order"])) {

									// $amount = $_POST["amount_sent"];
									$payment_mode = $_POST["payment_mode"];
									$ref_no = $_POST["ref_no"];
									$code = $_POST["code"];
									date_default_timezone_set('Asia/Dhaka');
									$date = date('d-M-Y');

									$email = $_SESSION["c_email"];
									$customerIpS = "SELECT * FROM customer WHERE c_email = '$email'";
									$customerIpQ = $con->query($customerIpS) or die('Get Customer Ip Failed');
									$customerIpR = mysqli_fetch_assoc($customerIpQ);
									$cIp = $customerIpR["c_ip"];
									$cAddress = $customerIpR["c_add"];

									$getCartS = "SELECT * FROM `cart` WHERE c_ip = '$cIp'";
									$getCartQ = $con->query($getCartS) or die('Get Cart Ip Failed');

									while ($getCartR = mysqli_fetch_assoc($getCartQ)) {

										$pId = $getCartR["p_id"];
										$pQty = $getCartR["qty"];
										$pSize = $getCartR["size"];

										$s = "SELECT * FROM `product` WHERE `p_id` = '$pId'";

										$q = mysqli_query($con, $s) or die('Query Failed 2');

										while ($r = mysqli_fetch_assoc($q)) {

											$p_img1 = $r["p_img1"];
											$p_title = $r["p_title"];
											$p_price = $r["p_price"];
											$p_invNo = $r["invoice_no"];
											$status = "Payment Pending";

											$sub_total = $r["p_price"] * $pQty;

											$insert = "INSERT INTO `customer_orders`( `c_email`, `due_amount`, `invoice_no`, `qty`, `size`, `order_date`, `order_status`) VALUES ('$email','$sub_total ','$p_invNo','$pQty','$pSize','$date','$status')";

											if ($orderQuery = $con->query($insert)) {
												$orderIdS = "SELECT * FROM customer_orders WHERE c_email = '$email'";
												$orderIdQ = $con->query($orderIdS);

												while ($orderR = mysqli_fetch_assoc($orderIdQ)) {
													$orderId = $orderR["order_id"];
												}
												$date = date('d/M/Y h:i A');

												$insert = "INSERT INTO `pending_orders`(`order_id`, `invoice_no`, `amount`, `payment_mode`, `ref_no`, `code`, `status`, `date`,`delivery_add`) VALUES ('$orderId','$p_invNo','$sub_total','$payment_mode','$ref_no','$code','$status','$date','$cAddress')";

												if ($con->query($insert)) {
													$ip = getRealUserIp();
													$deleteCart = "DELETE FROM cart WHERE c_ip = '$ip'";
													$deleteQ = $con->query($deleteCart);

													echo "<script>alert('Your order submitted succrssfully. Your payment request will be accepted within 12 hours ! Thank You .')</script>";
													echo "<script>window.open('my-account.php', '_self')</script>";
												}
											}
										}
									}
								}
								?>
							</div>
						</div>

					</div>
					<!-- FOUR-PAYMENT-METHOD END -->

					<!-- RETURNE-CONTINUE-SHOP START -->
					<div class="returne-continue-shop">
						<a href="index.php" class="continueshoping"><i class="fa fa-chevron-left"></i>Continue
							shopping</a>
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

<?php }
	}	?>