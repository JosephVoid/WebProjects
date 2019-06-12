<!DOCTYPE HTML>
<?php session_start(); ?>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>ATERERA®</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Themify Icons-->
	<link rel="stylesheet" href="css/themify-icons.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<link href="bootstrap-3.3.7-dist/css/bootstrap.css" rel="stylesheet" type="text/css">
	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/magnific-popup.css">

	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">
	
	<!-- Additional  -->
	<link rel="stylesheet" href="css/additional.css">
	

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body style="background-image:url(images/thumb-1920-26102.jpg)">
		
	<div class="gtco-loader"></div>
	
	<div id="page">

	
	<div class="page-inner">
	<nav class="gtco-nav" role="navigation">
		<div class="gtco-container">
			
			<div class="row">
				<div class="col-sm-4 col-xs-12">
					<div id="gtco-logo"><a href="index.html">ATERERA<em>.</em></a></div>
				</div>
				<div class="col-xs-8 text-right menu-1">
					<ul>
						<li>Home</li>
						<li><a href="lit.php">Literature</a></li>
						<li class="has-dropdown">
							<a href="notes.php">Notes</a>
							<ul class="dropdown">
								<li><a href="notes.php?type=tch">Teacher's Notes</a></li>
								<li><a href="notes.php?type=std">Student Uploads</a></li>
								
							
							</ul>
						</li>
						
						<li><a href="projects.php">Projects</a></li>
						<li><a href="contact.php">Contact</a></li>
						

						<?php

						if (isset($_SESSION['u_id'])) {
							echo '<a href="includes/logout.inc.php" class="btn-cta"><span>Log Out</span></a>';
							//echo '<form action="includes/logout.inc.php" method="POST">
							//	<input type="submit" class="btn-cta" value="Log Out"'
						}

						?>

					</ul>
				</div>
			</div>
			
		</div>
	</nav>
	
	<header id="gtco-header" class="gtco-cover" role="banner" style="background-image: url(images/back_im.jpg)">
		<div class="overlay"></div>
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-12 col-md-offset-0 text-left">
					

					<div id="mtshit" class="row row-mt-15em">
						<div class="col-md-7 mt-text animate-box" data-animate-effect="fadeInUp">
							<span class="intro-text-small">Welcome to ATERERA</span>
							<h1>The Home for all your notes.</h1>	
						</div>
						<div class="col-md-4 col-md-push-1 animate-box" data-animate-effect="fadeInRight">
						<?php
							$check = false;
							if (!isset($_SESSION['u_id'])) {
									echo '	
									<div class="form-wrap">
										<div class="tab">
											<ul class="tab-menu">
												<li class="active gtco-first"><a href="#" data-tab="signup">Sign up</a></li>
												<li class="gtco-second"><a href="#" data-tab="login">Login</a></li>
											</ul>
											<div class="tab-content">
												<div class="tab-content-inner active" data-content="signup">
													<form action="includes/signup.inc.php" method="POST">
														<div class="row form-group">
															<div class="col-md-12">
																<label for="fname">First Name</label>
																<input type="text" class="form-control" id="fname" name="first" required>
															</div>
															<div class="col-md-12">
																<label for="lname">Last Name</label>
																<input type="text" class="form-control" id="lname" name="last" required>
															</div>
															<div class="col-md-12">
																<label for="username">Username</label>
																<input type="text" class="form-control" id="username" name="uid" required>
															</div>
															<div class="col-md-12">
																<label for="email">Email</label>
																<input type="text" class="form-control" id="email" name="email" required>
															</div>
															<div class="col-md-12">
																<label for="password">Password</label>
																<input type="password" class="form-control" id="password" name="pwd" required><br>
															</div>
															<div class="col-md-12">
																<label for="Sch">School/College</label>
																<input type="text" class="form-control" id="Sch" name="sch" required><br>
															</div>
															<div class="col-md-12">
																<label data-toggle="collapse" data-target="#teachcode" class="container" style="float:left;width:100px;">Teacher
																  <input type="radio" name="stat" value="0">
																  <span class="checkmark"></span>
																</label>
																<label class="container" style="float:right;width:100px;">Student
																  <input type="radio" checked="checked" name="stat" value="1">
																  <span class="checkmark"></span>
																</label>
															</div>
															<div class="collapse" id="teachcode" class="col-md-12">
																<label for="TC">Teacher Code</label><span onclick="toggle()" id="ques" class="glyphicon glyphicon-question-sign"></span><div id="talkbubble"><t style="position: absolute;left: 9px;top: 5px;font-weight: bold;color: white;font-size: 17px;">The code that was </t>
																<t style="position: absolute;top: 35px;left: 47px;font-weight: bold;color: white;">given to you.</t></div>
																<input type="text" class="form-control" id="TC" name="teachcode"><br>
															</div>
															<div class="col-md-12">
																<input type="submit" class="btn btn-primary" value="Sign up" name="submit"><br>
															</div>
														</div>
													</form>	
												</div>

												<div class="tab-content-inner" data-content="login">
													<form action="includes/login.inc.php" method="POST">
														<div class="row form-group">
															<div class="col-md-12">
																<label for="username">Username or Email</label>
																<input type="text" class="form-control" id="username" name="uid">
															</div>
														</div>
														<div class="row form-group">
															<div class="col-md-12">
																<label for="password">Password</label>
																<input type="password" class="form-control" id="password" name="pwd">
															</div>
														</div>
														
														
														<div class="row form-group">
															<div class="col-md-12">
																<input type="submit" class="btn btn-primary" value="Login" name="submit">
															</div>
														</div>
													</form>	
												</div>

											</div>
										</div>
									</div>';
								}
								?>
						</div>
					</div>
							
					
				</div>
			</div>
		</div>
	</header>

	<div id="gtco-subscribe">
		<div class="gtco-container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center gtco-heading">
					<h2>Subscribe</h2>
					<p>Be the first to know about the new uploaded notes.</p>
				</div>
			</div>
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2">
					<form class="form-inline" action="includes/subscribe.inc.php" method="POST">
						<div class="col-md-6 col-sm-6">
							<div class="form-group">
								<label for="email" class="sr-only">Email</label>
								<input type="email" class="form-control" id="email" name="email"placeholder="Your Email">
							</div>
						</div>
						<div class="col-md-6 col-sm-6">
							<button type="submit" class="btn btn-default btn-block" name="submit">Subscribe</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<footer id="gtco-footer" role="contentinfo">
		<div class="gtco-container">
			<div class="row row-p	b-md">

				<div class="col-md-4">
					<div class="gtco-widget">
						<h3>About <span class="footer-logo">ATERERA<span>.<span></span></h3>
						<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore eos molestias quod sint ipsum possimus temporibus officia iste perspiciatis consectetur in fugiat repudiandae cum. Totam cupiditate nostrum ut neque ab?</p>
					</div>
				</div>

				<div class="col-md-4 col-md-push-1">
					<div class="gtco-widget">
						<h3>Links</h3>
						<ul class="gtco-footer-links">
							<li><a href="#">Knowledge Base</a></li>
							<li><a href="#">Career</a></li>
							<li><a href="#">Press</a></li>
							<li><a href="#">Terms of services</a></li>
							<li><a href="#">Privacy Policy</a></li>
						</ul>
					</div>
				</div>

				<div class="col-md-4">
					<div class="gtco-widget">
						<h3>Get In Touch</h3>
						<ul class="gtco-quick-contact">
							<li><a href="#"><i class="icon-phone"></i> +1 234 567 890</a></li>
							<li><a href="#"><i class="icon-mail2"></i> info@FreeHTML5.co</a></li>
							<li><a href="#"><i class="icon-chat"></i> Live Chat</a></li>
						</ul>
					</div>
				</div>

			</div>

			<div class="row copyright">
				<div class="col-md-12">
					<p class="pull-left">
						<small class="block">&copy; 2018 ATERERA. All Rights Reserved.</small> 
						<small class="block">Designed by <a href="http://hireyab.cf/" target="_blank">Yeabsera G. Bune & Yoseph Tenaw</a>
					</p>
					<p class="pull-right">
						<ul class="gtco-social-icons pull-right">
							<li><a href="#"><i class="icon-twitter"></i></a></li>
							<li><a href="#"><i class="icon-facebook"></i></a></li>
							<li><a href="#"><i class="icon-linkedin"></i></a></li>
							<li><a href="#"><i class="icon-dribbble"></i></a></li>
						</ul>
					</p>
				</div>
			</div>

		</div>
	</footer>
	</div>

	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>
	
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Carousel -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- countTo -->
	<script src="js/jquery.countTo.js"></script>
	<!-- Magnific Popup -->
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/magnific-popup-options.js"></script>
	<!-- Main -->
	<script src="js/main.js"></script>
	<script>
		function toggle(){
			$('#talkbubble').toggleClass('clicked');
			}
	</script>
	</body>
</html>

