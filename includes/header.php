<?php

include("functions/function.php");
session_start();

?>

<!-- HEADER AREA START -->
<header class="hedaer-area">

	<!-- HEADER-TOP START -->
	<div class="header-top">
		<div class="container">
			<div class="row">
				<!-- HEADER-LEFT-MENU START -->
				<div class="col-md-6">
					<div class="header-left-menu">
						<div class="welcome-info">
							Welcome <span>BIKE STORE</span>
						</div>
						<div class="currenty-converter">
							<form method="post" action="#" id="currency-set">
								<div class="current-currency">
									<span class="cur-label">Currency : </span><strong>TAKA</strong>
								</div>
								<ul class="currency-list currency-toogle">
									<li>
										<a title="Dollar (USD)" href="#">TAKA</a>
									</li>
								</ul>
							</form>
						</div>
						<div class="selected-language">
							<div class="current-lang">
								<span class="current-lang-label">Language : </span><strong>English</strong>
							</div>
							<ul class="languages-choose language-toogle">
								<li>
									<a href="#" title="English">
										<span>English</span>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- HEADER-LEFT-MENU END -->

				<!-- HEADER-RIGHT-MENU START -->
				<div class="col-md-6">
					<div class="header-right-menu">
						<nav>
							<ul class="list-inline">
								<li class="list-inline-item"><a href="checkout.php">Checkout</a></li>
								<li class="list-inline-item"><a href="my-account.php">My Account</a></li>
								<li class="list-inline-item"><a href="cart.php">My Cart</a></li>
								<li class="list-inline-item">
									<?php
									if (isset($_SESSION["c_email"])) {
										echo "<a href='logout.php'>Log Out</a>";
									} else {
										echo "<a href='registration.php'>Sign in</a>";
									}

									?>
									<!-- <a href="registration.php">Sign in</a> -->
								</li>
							</ul>
						</nav>
					</div>
				</div>
				<!-- HEADER-RIGHT-MENU END -->
			</div>
		</div>
	</div>
	<!-- HEADER-TOP END -->

	<!-- MAIN-MENU-AREA START -->
	<div class="main-menu-area d-none d-lg-block">
		<div class="container">
			<div class="row">

				<!-- MAINMENU START -->
				<div class="col-lg-9">
					<div class="mainmenu">
						<nav>
							<ul>
								<li class="<?php if ($active == 'home') echo "active"; ?> ">
									<a href="index.php">Home</a>
								</li>

								<li class="<?php if ($active == 'shop') echo "active"; ?> ">
									<a href="shop-gird.php"> Shop </a>
								</li>

								<li class="<?php if ($active == 'about_us') echo "active"; ?> ">
									<a href="about-us.php">About us</a>
								</li>

								<li class="<?php if ($active == 'contact-us') echo "active"; ?> ">
									<a href="contact-us.php">Contact Us</a>
								</li>
							</ul>
						</nav>
					</div>
				</div>
				<!-- MAINMENU END -->

				<!-- SHOPPING-CART START -->
				<div class="col-lg-3">
					<div class="shopping-cart-out d-flex justify-content-end">
						<div class="shopping-cart">
							<a class="shop-link" href="cart.php" title="View my shopping cart">
								<i class="fa fa-shopping-cart cart-icon"></i>
								<b>My Cart</b>
								<span class="ajax-cart-quantity"><?php cartItem(); ?></span>
							</a>

							<div class="shipping-cart-overly">

								<?php

								$ip = getRealUserIp();

								$ipSql = "SELECT * FROM `cart` WHERE `c_ip` = '$ip'";

								$que = mysqli_query($con, $ipSql) or die('Query Failed Id Price');

								while ($row = mysqli_fetch_array($que)) {

									$p_id = $row["p_id"];
									$p_qty = $row["qty"];
									$cartId = $row["cart_id"];

									$s = "SELECT * FROM `product` WHERE `p_id` = '$p_id'";

									$q = mysqli_query($con, $s) or die('Query Failed 2');

									while ($r = mysqli_fetch_array($q)) {

										$sub_total = $r["p_price"] * $p_qty;
										$img = $r["p_img1"];

										$p_title = $r["p_title"];

								?>

										<div class="shipping-item">
											<form action="" method="POST">
												<input type="hidden" name="cart_id" value="<?= $cartId; ?>">
												<button class="cross-icon" name="delete">
													<i class="fa fa-times-circle"></i>
												</button>
											</form>

											<?php
											if (isset($_POST["delete"])) {

												$deleteId = $_POST["cart_id"];

												$deleteSql = "DELETE FROM cart WHERE cart_id = '$deleteId'";
												$deleteQuery = $con->query($deleteSql) or die('Delete Email Query Failed');
												if ($deleteQuery) {

													echo "<script>alert('One Cart Item Is Deleted')</script>";
													echo "<script>window.open('single-product.php?proID=$p_id', '_self')</script>";
												}
											}
											?>

											<div class="shipping-item-image">
												<a href="single-product.php?proID=<?= $p_id; ?>">
													<img src="admin_area/product_images/<?= $img; ?>" alt="<?= $img; ?>" style="width: 100px;" />
												</a>
											</div>
											<div class="shipping-item-text">
												<span>
													<?= $p_qty; ?>
													<span class="pro-quan-x">x</span>
													৳<?= $r["p_price"]; ?>
												</span>
												<p>৳<?= $sub_total; ?></p>
											</div>
										</div>

								<?php	}
								}		?>

								<div class="shipping-total-bill">
									<div class="cart-prices">
										<span class="shipping-cost">৳0.00</span>
										<span>Shipping</span>
									</div>
									<div class="total-shipping-prices">
										<span class="shipping-total">

											<?= totalPrice(); ?>

										</span>
										<span>Total</span>
									</div>
								</div>

								<?php if (!isset($_SESSION["c_email"])) { ?>

									<div class="shipping-checkout-btn">
										<a href="checkout-signin.php">
											Check out <i class="fa fa-chevron-right"></i>
										</a>
									</div>

								<?php	} else { ?>

									<div class="shipping-checkout-btn">
										<?php
										$ip = getRealUserIp();
										$query = "SELECT * FROM cart WHERE c_ip = '$ip'";
										$cartCheck = mysqli_query($con, $query);
										if (mysqli_num_rows($cartCheck) > 0) {
											echo '
											<a href="checkout-address.php">
												Check out <i class="fa fa-chevron-right"></i>
											</a>';
										} else {
											echo '
											<a href="shop-gird.php">
												Check out <i class="fa fa-chevron-right"></i>
											</a>';
										}
										?>
									</div>

								<?php	}	?>


							</div>
						</div>
					</div>
				</div>
				<!-- SHOPPING-CART END -->

			</div>
		</div>
	</div>
	<!-- MAIN-MENU-AREA END -->

	<!-- Mobile Header START -->
	<div class="mobile-header d-lg-none">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-4">
					<div class="header-toggle">
						<button class="toggle" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample">
							<span></span>
							<span></span>
							<span></span>
						</button>
					</div>
				</div>
				<div class="col-4">
					<div class="logo">
						<a href="index.php"><img src="assets/images/logo.webp" alt="bstore logo" /></a>
					</div>
				</div>
				<div class="col-4">
					<div class="mobile-shopping-cart">
						<a class="shop-link" href="cart.php" title="View my shopping cart">
							<i class="fa fa-shopping-cart cart-icon"></i>
							<span class="cart-quantity"><?php cartItem(); ?></span>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Mobile Header END -->

</header>
<!-- HEADER AREA End -->

<!-- Offcanvas START -->
<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample">
	<div class="offcanvas-header">
		<div class="offcanvas-logo">
			<a href="#"><img src="assets/images/logo.webp" alt=""></a>
		</div>
		<button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
	</div>
	<div class="offcanvas-body">
		<nav class="canvas-menu">
			<ul>
				<li class="<?php if ($active == 'home') echo "active"; ?> ">
					<a href="index.php">Home</a>
				</li>

				<li class="<?php if ($active == 'shop') echo "active"; ?> ">
					<a href="shop-gird.php"> Shop </a>
				</li>

				<li class="<?php if ($active == 'about_us') echo "active"; ?> ">
					<a href="about-us.php">About us</a>
				</li>

				<li class="<?php if ($active == 'contact-us') echo "active"; ?> ">
					<a href="contact-us.php">Contact Us</a>
				</li>
			</ul>
		</nav>
	</div>
</div>
<!-- Offcanvas End -->