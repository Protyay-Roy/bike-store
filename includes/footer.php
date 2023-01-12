<!-- FOOTER-TOP-AREA START -->
<section class="footer-top-area">
	<div class="container">
		<div class="footer-top-container">
			<div class="row">
				<div class="col-lg-3 col-md-4 col-12">
					<!-- FOOTER-TOP-LEFT START -->
					<div class="footer-top-left">
						<!-- NEWSLETTER-AREA START -->
						<div class="newsletter-area">
							<!-- STORE-INFORMATION START -->
							<div class="Store-Information">
								<h2>Store Information</h2>
								<ul>
									<li>
										<div class="info-lefticon">
											<i class="fa fa-map-marker"></i>
										</div>
										<div class="info-text">
											<p>Shukrabad, Dhanmondi, Dhaka-1215</p>
										</div>
									</li>
									<li>
										<div class="info-lefticon">
											<i class="fa fa-phone"></i>
										</div>
										<div class="info-text call-lh">
											<p>Call us now : +880-01778449714</p>
										</div>
									</li>
									<li>
										<div class="info-lefticon">
											<i class="fa fa-envelope-o"></i>
										</div>
										<div class="info-text">
											<p>Email : <a href="mailto:demo@example.com"><i class="fa fa-angle-double-right"></i>
													Bike_store@gmail.com</a></p>
										</div>
									</li>
								</ul>
							</div>
							<!-- STORE-INFORMATION END -->
						</div>
						<!-- NEWSLETTER-AREA END -->
						<!-- ABOUT-US-AREA START -->
						<div class="about-us-area">
							<h2>About Us</h2>
							<p>In Bikestore we make sure the quality services and products For our clients.</p>
						</div>
						<!-- ABOUT-US-AREA END -->
						<!-- FLLOW-US-AREA START -->
						<div class="fllow-us-area">
							<h2>Follow us</h2>
							<ul class="flow-us-link">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-rss"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
						<!-- FLLOW-US-AREA END -->
					</div>
					<!-- FOOTER-TOP-LEFT END -->
				</div>
				<div class="col-lg-9 col-md-8 col-12">
					<!-- FOOTER-TOP-RIGHT-1 START -->
					<div class="footer-top-right-1">
						<div class="row">
							<div class="col-12">
								<!-- GOOGLE-MAP-AREA START -->
								<div class="google-map-area">
									<div class="google-map">
										<div id="googleMap" style="width:100%;height:270px;"></div>
									</div>
								</div>
								<!-- GOOGLE-MAP-AREA END -->
							</div>
						</div>
					</div>
					<!-- FOOTER-TOP-RIGHT-1 END -->
					<div class="footer-top-right-2">
						<div class="row">
							<div class="col-md-4">
								<!-- FOTTER-MENU-WIDGET START -->
								<div class="fotter-menu-widget">
									<div class="single-f-widget">
										<h2>Categories</h2>
										<ul>
											<?php

											$get_cat = "select * from categories";
											$run_cat = mysqli_query($con, $get_cat);

											while ($row_cat = mysqli_fetch_array($run_cat)) {

												$cat_id = $row_cat['cat_id'];
												$cat_title = $row_cat['cat_title'];

												// $proS = "SELECT * FROM product WHERE cat_id = '$cat_id'";
												// $proQ = $con->query($proS);
												// $proCount = mysqli_num_rows($proQ);

												echo
												'<li>
												<a href="shop-gird.php">
													<i class="fa fa-angle-double-right"></i>
													' . $cat_title . '
												</a>
												</li>';
											}

											?>
										</ul>
									</div>
								</div>
								<!-- FOTTER-MENU-WIDGET END -->
							</div>
							<div class="col-md-4">
								<!-- FOTTER-MENU-WIDGET START -->
								<div class="fotter-menu-widget">
									<div class="single-f-widget">
										<h2>Information</h2>
										<ul>
						
											<li><a href="#"><i class="fa fa-angle-double-right"></i>New products</a>
											</li>
											<li><a href="about-us.php"><i class="fa fa-angle-double-right"></i>About Us</a>
											</li>
											<li><a href="contact-us.php"><i class="fa fa-angle-double-right"></i>Contact Us</a></li>
										</ul>
									</div>
								</div>
								<!-- FOTTER-MENU-WIDGET END -->
							</div>
							<div class="col-md-4">
								<!-- FOTTER-MENU-WIDGET START -->
								<div class="fotter-menu-widget">
									<div class="single-f-widget">
										<h2>My account</h2>
										<ul>
											<li><a href="my-account.php"><i class="fa fa-angle-double-right"></i>My orders</a>
											</li>
											<li><a href="my-account.php"><i class="fa fa-angle-double-right"></i>My addresses</a>
											</li>
											<li>
												<a href="my-account.php">
													<i class="fa fa-angle-double-right"></i>
													My personal info
												</a>
											</li>
											<li>
												<?php
												if (isset($_SESSION["c_email"])) {
													echo "<a href='logout.php'>Log Out</a>";
												} else {
													echo "<a href='registration.php'>Sign in</a>";
												}

												?>
											</li>
										</ul>
									</div>
								</div>
								<!-- FOTTER-MENU-WIDGET END -->
							</div>
							<div class="col-12">
								<!-- PAYMENT-METHOD START -->
								<div class="payment-method">
									<img class="img-responsive pull-right" src="assets/images/payment.webp" alt="payment-method" />
								</div>
								<!-- PAYMENT-METHOD END -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- FOOTER-TOP-AREA END -->

<!-- COPYRIGHT-AREA START -->
<footer class="copyright-area">
	<div class="container">
		<div class="copy-right">
			<address>&copy; 2022 <span>All Right Reserved by</span> Bike Store </address>
		</div>
		<div class="scroll-to-top">
			<a href="#" class="bstore-scrollertop"><i class="fa fa-angle-double-up"></i></a>
		</div>
	</div>
</footer>
<!-- COPYRIGHT-AREA END -->