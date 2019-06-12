<!DOCTYPE HTML>
<?php session_start();
	  include "includes/dbn.inc.php";include "includes/Buttonfunction.php";$per_page = 16;
?>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>ATERERA</title>
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
	
	<link href="bootstrap-3.3.7-dist/css/bootstrap.css" rel="stylesheet" type="text/css">
	
		
		<script src="bootstrap-3.3.7-dist/js/jquery-3.3.1.js"></script>
		<script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Themify Icons-->
	<link rel="stylesheet" href="css/themify-icons.css">
	<!-- Bootstrap  -->
	
	
	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/magnific-popup.css">

	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Additional.css -->
	<link rel="stylesheet" href="css/additional.css">
	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->
	<script>
		
	</script>
	</head>
	<body style="background-image:url(images/thumb-1920-26102.jpg)">
		<?php
			if(isset($_GET['search_param'])){
				$parameters = $_GET['search_param'];
				?>
	<div class="gtco-loader"></div>
	
	<div id="page">

	
	<div class="page-inner">
	<nav class="gtco-nav" role="navigation">
		<div class="gtco-container">
			
			<?php if(isset($_SESSION['u_id'])){?>
			
			<div class="row">
				<div class="col-sm-4 col-xs-12">
					<div id="gtco-logo"><a href="index.html">ATERERA<em>.</em></a></div>
				</div>
				<div class="col-xs-8 text-right menu-1">
					<ul>
						<li><a  href="dashboard.php">Dashboard</a></li>
						<li><a href="lit.php">Literature</a></li>
						<li class="has-dropdown">
							<a  href="notes.php">Notes</a>
							<ul class="dropdown">
								<li><a href="notes.php?type=tch">Teacher's Notes</a></li>
								<li><a href="notes.php?type=std">Student Uploads</a></li>
								
							
							</ul>
						</li>
						
						<li>
						<form style="margin-top:-6px;" class="navbar-form navbar-right" role="search">
							<div class="form-group">
								<input style="height: 30px;width: 115px;background:white;" type="text" name="search_param" class="form-control" placeholder="Search Note">
							</div>
							<button type="link" id="search-but" href="notes.php?param=search_param" class="btn btn-primary"><span id="gly-ser"class="glyphicon glyphicon-search"></span></button>
						</form>
						<li><a href="projects.php">Projects</a></li>
						<li><a href="upload.php">Upload</a></li>
						

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
			<?php }
				else
				{
			?>
			<!--Not Logged in-->
			<div class="row">
				<div class="col-sm-4 col-xs-12">
					<div id="gtco-logo"><a href="index.html">ATERERA<em>.</em></a></div>
				</div>
				<div class="col-xs-8 text-right menu-1">
					<ul>
						<li><a  href="index.php">Home</a></li>
						<li><a href="lit.php">Literature</a></li>
						<li class="has-dropdown">
							<a  href="notes.php">Notes</a>
							<ul class="dropdown">
								<li><a href="notes.php?type=tch">Teacher's Notes</a></li>
								<li><a href="notes.php?type=std">Student Uploads</a></li>
								
							
							</ul>
						</li>
						
						<li>
						<form style="margin-top:-6px;" class="navbar-form navbar-right" role="search">
							<div class="form-group">
								<input style="height: 30px;width: 115px;background:white;" type="text" name="search_param" class="form-control" placeholder="Search Note">
							</div>
							<button type="link" id="search-but" href="notes.php?param=search_param" class="btn btn-primary"><span id="gly-ser"class="glyphicon glyphicon-search"></span></button>
						</form>
						<li><a href="projects.php">Projects</a></li>
						
						

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
			
			<?php }?>
			
		</div>
	</nav>
	
	<header id="gtco-header" class="gtco-cover" role="banner" style="background-image: url(images/back_im.jpg)" >
		
		<?php if(isset($_SESSION['u_id'])){
			
				$r = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM users WHERE user_id =".$_SESSION['u_id'].""));?>
		<div id="profile" class="jumbotronpers">
			<table id="prof_table" width="100%" height="60px">
				<tr style="text-align:center">
					<td id="td1">
						<div id="img_cont"><a data-toggle="modal" data-target="#modalpic" href=""><img id="pro_z" style="height:50px;width:50px;" class="img-responsive img-circle" src="<?php echo $r['pro_pic'];?>"/></a></div>
						
						<div class="modal fade" id="modalpic">
							<div class="modal-dialog">
								<div id="profmodal" class="modal-content">
									<div style="height:100%;width:100%" class="modal-body">
											<img style="height:100%;width:100%" class="img-thumbnail" src="<?php echo $r['pro_pic']; ?>"/>
									</div>
								</div>
							</div>
						</div>
												
					
					</td>
					<td  id="td2">
						<strong><htwo id="uzname" style="color:black" ><?php echo $r['user_uid'];?></htwo></strong>
					</td>
					
					<td  id="td3">
						<span id="Tlike" class="glyphicon glyphicon-thumbs-up"></span><?php						
							$query = "SELECT likes FROM notes WHERE author = ".$_SESSION['u_id']."";
							$query_dick_suck = "SELECT COUNT(*) FROM notes RIGHT JOIN note_likes ON note_likes.notes = notes.n_id WHERE user = author AND author = ".$_SESSION['u_id']."";
							$dick_suck_res = mysqli_query($conn,$query_dick_suck);
							$row_dick_s = mysqli_fetch_row($dick_suck_res);
							$query_res = mysqli_query($conn,$query);
							$sum = 0;
							for($i = 0 ; $row = mysqli_fetch_array($query_res) ; $i++){
								
								$sum = $sum + $row['likes'];
								}
							$pure_likes = $sum - $row_dick_s[0];
							
							$query = "UPDATE users SET t_likes = '".$pure_likes."' WHERE user_id = ".$_SESSION['u_id']."";
							if(mysqli_query($conn,$query))
								echo $pure_likes;
							else
								echo "ERROR";	
						?>
					</td>
					<td  id="td4">
						<button style="" id="Edit_button" class="btn btn-primary" data-toggle="modal" data-target="#mymodal"><span id="pencil" class="glyphicon glyphicon-pencil"></span> Edit</button>
						
						<div class="modal fade" id="mymodal">
							<div class="modal-dialog">
								<div  class="modal-content">
									<div class="modal-body">
										<h1 style="color:black" >Profile Edit</h1><br>
										<form enctype="multipart/form-data" id="edit_form" method="POST">
										
										<div class="ProEdit">Name:<t id="ed_name"><?php echo $r['user_first'];?></t>
											<button style="height:30px;width:60px" class="btn btn-primary" data-toggle="collapse" data-target="#contents" type="button"><div style="margin-left:-10px;margin-top:-5px;">Edit</div></button>
												<div class="collapse" id="contents">
													<div class="well responsive">New name:<input type="text" name="Ename"></div>
												</div>
										</div>
										<div class="ProEdit">Username:<t id="ed_username"><?php echo $r['user_uid']?></t>
											<button style="height:30px;width:60px" class="btn btn-primary" data-toggle="collapse" data-target="#contentsus" type="button"><div style="margin-left:-10px;margin-top:-5px;">Edit</div></button>
												<div class="collapse" id="contentsus">
													<div class="well responsive">New username:<input type="text" name="Eusname"></div>
												</div>
										</div>
										<div class="ProEdit">Password
											<button style="height:30px;width:60px" class="btn btn-primary" data-toggle="collapse" data-target="#contentsps" type="button"><div style="margin-left:-10px;margin-top:-5px;">Edit</div></button>
												<div class="collapse" id="contentsps">
													<div class="well responsive">
														Old password: <input type="password" name="Eprpass"/>
													</div>
													<div class="well responsive">
														New password: <input type="text" name="Enwpass"/>
													</div>
												</div>
										</div>
										<div class="ProEdit">Email: <t id="ed_email"><?php echo $r['user_email'];?></t>
											<button style="height:30px;width:60px" class="btn btn-primary" data-toggle="collapse" data-target="#contentsem" type="button"><div style="margin-left:-10px;margin-top:-5px;">Edit</div></button>
												<div class="collapse" id="contentsem">
													<div class="well responsive">New Email:<input type="text" name="Eem"></div>
												</div>
										</div>
										<div class="ProEdit">Profile Picture: <img id="ed_pic" class="img-rounded"style="height:40px;width:40px;" src="<?php echo $r['pro_pic']?>"/>
											<button style="height:30px;width:60px" class="btn btn-primary" data-toggle="collapse" data-target="#contentspp" type="button"><div style="margin-left:-10px;margin-top:-5px;">Edit</div></button>
												<div class="collapse" id="contentspp">
													<div class="well responsive"><input type="file" name="Epp"></div>
												</div>
										</div>
										
									</div>
									<div class="modal-footer">
										<input class="btn btn-primary" type="button" value="Close" data-dismiss="modal"/>
										<input class="btn btn-primary" type="submit" value="Apply"/>
										</form>
									</div>
								
							</div>
		
					</div>
					
					</td>
				</tr>
			</table>
			
		</div>
					
					</td>
				</tr>
			</table>
			
		
		<?php } else {?>
		
		<?php } ?>
				<div class="gtco-container" style="margin-left:0px" >
			<div class="row">
				<div class="col-md-12 col-md-offset-0 text-left">
					<?php if(isset($_SESSION['u_id']))
						$e = '1em';
					else
						$e = '13em';	
				?>
					<div style="margin-top:<?php echo $e;?>" class="row row-mt-15em">
						<div class="col-md-4 animate-box" data-animate-effect="fadeInRight">
								<?php
								if(!empty($parameters)){
									if(isset($_GET['page'])){
										$page = $_GET['page'];
														}
									else
										$page = 1;
									
										$start = ($page - 1) * $per_page;
									$query="SELECT `n_id`,`author`,`n_name`,`course`,`stat`,`likes`,`date`,`file_loc`,`type` FROM `notes` WHERE `n_name` LIKE '%".$parameters."%' AND `type`= '0' AND `invalid` = '0' OR `course` LIKE '%".$parameters."%' AND `type`= '0' AND `invalid` = '0' LIMIT $start,$per_page";
									$query_for_count="SELECT `n_id`,`author`,`n_name`,`course`,`stat`,`likes`,`date`,`file_loc`,`type` FROM `notes` WHERE `n_name` LIKE '%".$parameters."%' AND `type`= '0' AND `invalid` = '0' OR `course` LIKE '%".$parameters."%' AND `type`= '0' AND `invalid` = '0'";
									$query_run=mysqli_query($conn,$query);//Running the query.
									$num_of_res=mysqli_num_rows($query_run);//Number of results.
									$no_of_rows = mysqli_num_rows(mysqli_query($conn,$query_for_count));
									$pages = ceil($no_of_rows/$per_page);
									if($num_of_res!=0){?>
										<h2><?php echo $num_of_res." Result(s) found.".'<br><br>';
										
										if($num_of_res>0){
												
												?></h2>
												
												
		<div style="height:892px;" class="tabovflow">
		<div style="height:850px;" class="mintabflow">										
		<div id="tabcont" style="border-radius:0px;margin-left:0px;"class="jumbotronpers">
			<table><thead>
				<tr id="headerTab">
					<td>Note name</td>
					<td>Course name</td>
					<td>Author</td>
					<td>Likes</td>
					<td>Type</td>
					<td>Date</td>
					<td>Download</td>
				</tr></thead>
		<?php 
		
			while($query_row=mysqli_fetch_assoc($query_run))
				{
					$note_id = $query_row['n_id'];	
					$loc = $query_row['file_loc'];	
					$note_name = $query_row['n_name'];
					$stat = $query_row['stat'];
					if($stat == 'std'){
						$stat = 'Student';}
					if($stat == 'tch'){
						$stat = 'Teacher';}
					$date = $query_row['date'];
					$course = $query_row['course'];
					$likes = $query_row['likes'];
					$auth_id = $query_row['author'];
					
						$row = mysqli_fetch_array(mysqli_query($conn,"SELECT user_uid,pro_pic FROM users WHERE user_id=$auth_id"));
		?>
				
		
				<tr>
					<td><?php echo $note_name;if(isset($_SESSION['u_id'])){ReportButton($note_id,$_SESSION['u_id']);}?></td>
					<td><?php echo $course;?></td>
					<td><img onclick = "mdldsp(<?php echo $auth_id; ?>)" data-toggle="modal" data-target="#profview" style="height:25px;width:25px;" class="img-circle" src="<?php echo $row['pro_pic']?>"/> <?php echo $row['user_uid'];?></td>
					<td style="width:16%">
					<?php 
					if(isset($_SESSION['u_id'])){ ?><?php LikeButton($note_id);}
					
					else {
						echo "<button class='btn btn-primary'>Not logged in</button>";
						}?>
					</td>
					
					<td><?php echo $stat;?></td>
					<td><?php echo $date;?></td>
					<td><?php 
					if(isset($_SESSION['u_id'])){ ?>
					<?php  DownloadButton($loc,$_SESSION['u_uid'],$note_name);?>
					<?php } else {echo "<button class='btn btn-primary'>Not logged in</button>";}?></td>
				</tr>
			<?php
										}}?>
				</table>
			</div>
			</div>
			<!--Page scroll-->
						<div class="pages">
								<?php
				
								for((int)$i = 1;$i <= $pages;$i++){
									?>
								<a href="notes.php?page=<?php echo $i;?>&search_param=<?php echo $parameters?>"><button style="border-radius:0px;height:38px;fon" class="btn btn-primary"><?php echo $i;?></button></a>
								<?php
										}
									?>
						</div>		
			<!--Page scroll end-->
			</div>
					<?php
				}
				else
					echo "<h2 style='text-align:center'>No results found</h2>";
			}
			else
					echo "<h2 style='text-align:center'>No results found</h2>";	
					?>
			
			
							</div>
						</div>
					</div>
							
					
				</div>
			</div>
		
	</header>	
</div></div>
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

	<footer style="background-color:white;" id="gtco-footer" role="contentinfo">
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
	
	<div class="modal fade" id="profview">
		<div class="modal-dialog">
			<div style="height:600px;width:600px;background-color: #ececec;" class="modal-content">
				<div style="height:100%;width:100%" class="modal-body">
					<!--Name & School-->
					<div style="height:50px;width:100%;float:top;margin-top:-5px;margin-bottom:4px;">
						<!--Name-->
						<div style="height:100%;width:50%;float:left;border-right:medium solid;text-align:left;">
							<h3 style="float:left;font-family: Agency FB;margin-top: 5px;">Name - </h3><h3 id="md_nm" style="margin-left: 50px;margin-top: 5px;"></h3>
						</div>
						<!--School-->
						<div style="height:100%;width:50%;float:right;text-align:left;">
							<h3 style="float:left;font-family: Agency FB;margin-top: 5px;margin-left:5px;"> Institute - </h3><h3 id="md_sch" style="margin-left: 50px;margin-top: 5px;"></h3>
						</div>
					</div>
					<!---->
					
					<div style="height:480px;width:100%">
						<img id="md_pic" style="height:100%;width:105.2%;margin-top:-5px;margin-left:-15px;" class="img" src="<?php echo $row['pro_pic']; ?>"/>
					</div>
					
					<!--Email & Likes-->
					<div style="height:50px;width:100%;float:bottom;">
						<!--Email-->
						<div style="height:100%;width:50%;float:left;border-right:medium solid;text-align:left;">
							<h3 style="float:left;font-family: Agency FB;margin-top: 5px;">Contact - </h3><h4 id="md_cont" style="margin: 10px;"></h4>
						</div>
						<!--Likes-->
						<div style="height:100%;width:50%;float:right;text-align:center;">
							<span style="font-size: 30px;font-weight:bold;color:black;" class="glyphicon glyphicon-thumbs-up"></span><h3 id="md_likes"></h3>
						</div>
					</div>
					<!---->
				</div>
				<span data-dismiss="modal" id="close" class="glyphicon glyphicon-remove-circle"></span>
			</div>
		</div>
	</div>
	
	<?php	}
		else{
			?>
			<div class="gtco-loader"></div>
	
	<div id="page">

	
	<div class="page-inner">
	<nav class="gtco-nav" role="navigation">
		<div class="gtco-container">
			<?php if(isset($_SESSION['u_id'])){?>
			<!------NOTES------->
			<div class="row">
				<div class="col-sm-4 col-xs-12">
					<div id="gtco-logo"><a href="index.html">ATERERA<em>.</em></a></div>
				</div>
				<div class="col-xs-8 text-right menu-1">
					<ul>
						<li><a  href="dashboard.php">Dashboard</a></li>
						<li><a href="lit.php">Literature</a></li>
						<li class="has-dropdown">
							<a  href="notes.php">Notes</a>
							<ul class="dropdown">
								<li><a href="notes.php?type=tch">Teacher's Notes</a></li>
								<li><a href="notes.php?type=std">Student Uploads</a></li>
								
							
							</ul>
						</li>
						
						<li>
						<form style="margin-top:-6px;" class="navbar-form navbar-right" role="search">
							<div class="form-group">
								<input style="height: 30px;width: 115px;background:white;" type="text" name="search_param" class="form-control" placeholder="Search Notes">
							</div>
							<button type="link" id="search-but" href="notes.php?param=search_param" class="btn btn-primary"><span id="gly-ser"class="glyphicon glyphicon-search"></span></button>
						</form>
						</li>
						<li><a href="projects.php">Projects</a></li>
						<li><a href="upload.php">Upload</a></li>
						

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
			<?php }
				else
				{
			?>
			
			<!--Not Logged in-->
			<div class="row">
				<div class="col-sm-4 col-xs-12">
					<div id="gtco-logo"><a href="index.html">ATERERA<em>.</em></a></div>
				</div>
				<div class="col-xs-8 text-right menu-1">
					<ul>
						<li><a  href="index.php">Home</a></li>
						<li><a href="lit.php">Literature</a></li>
						<li class="has-dropdown">
							<a  href="notes.php">Notes</a>
							<ul class="dropdown">
								<li><a href="notes.php?type=tch">Teacher's Notes</a></li>
								<li><a href="notes.php?type=std">Student Uploads</a></li>
								
							
							</ul>
						</li>
						
						<li>
						<form style="margin-top:-6px;" class="navbar-form navbar-right" role="search">
							<div class="form-group">
								<input style="height: 30px;width: 115px;background:white;" type="text" name="search_param" class="form-control" placeholder="Search Notes">
							</div>
							<button type="link" id="search-but" href="notes.php?param=search_param" class="btn btn-primary"><span id="gly-ser"class="glyphicon glyphicon-search"></span></button>
						</form>
						</li>
						<li><a href="projects.php">Projects</a></li>
										

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
			
			<?php }?>
		</div>
	</nav>
	
	<header id="gtco-header" class="gtco-cover" role="banner" style="background-image: url(images/back_im.jpg)" >
		<!--Logged in Profile-->
		<?php if(isset($_SESSION['u_id'])){
			
				$r = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM users WHERE user_id =".$_SESSION['u_id'].""));?>
		<div id="profile" class="jumbotronpers">
			<table id="prof_table" width="100%" height="60px">
				<tr style="text-align:center">
					<td id="td1">
						<div id="img_cont"><a data-toggle="modal" data-target="#modalpic" href=""><img id="pro_z" style="height:50px;width:50px;" class="img-responsive img-circle" src="<?php echo $r['pro_pic'];?>"/></a></div>
						
						<div class="modal fade" id="modalpic">
							<div class="modal-dialog">
								<div id="profmodal" class="modal-content">
									<div style="height:100%;width:100%" class="modal-body">
											<img style="height:100%;width:100%" class="img-thumbnail" src="<?php echo $r['pro_pic']; ?>"/>
									</div>
								</div>
							</div>
						</div>
												
					
					</td>
					<td  id="td2">
						<strong><htwo id="uzname" style="color:black" ><?php echo $r['user_uid'];?></htwo></strong>
					</td>
					
					<td  id="td3">
						<span id="Tlike" class="glyphicon glyphicon-thumbs-up"></span><?php						
							$query = "SELECT likes FROM notes WHERE author = ".$_SESSION['u_id']."";
							$query_dick_suck = "SELECT COUNT(*) FROM notes RIGHT JOIN note_likes ON note_likes.notes = notes.n_id WHERE user = author AND author = ".$_SESSION['u_id']."";
							$dick_suck_res = mysqli_query($conn,$query_dick_suck);
							$row_dick_s = mysqli_fetch_row($dick_suck_res);
							$query_res = mysqli_query($conn,$query);
							$sum = 0;
							for($i = 0 ; $row = mysqli_fetch_array($query_res) ; $i++){
								
								$sum = $sum + $row['likes'];
								}
							$pure_likes = $sum - $row_dick_s[0];
							
							$query = "UPDATE users SET t_likes = '".$pure_likes."' WHERE user_id = ".$_SESSION['u_id']."";
							if(mysqli_query($conn,$query))
								echo $pure_likes;
							else
								echo "ERROR";	
						?>
					</td>
					<td  id="td4">
						<button style="" id="Edit_button" class="btn btn-primary" data-toggle="modal" data-target="#mymodal"><span id="pencil" class="glyphicon glyphicon-pencil"></span> Edit</button>
						
						<div class="modal fade" id="mymodal">
							<div class="modal-dialog">
								<div  class="modal-content">
									<div class="modal-body">
										<h1 style="color:black" >Profile Edit</h1><br>
										<form enctype="multipart/form-data" id="edit_form" method="POST">
										
										<div class="ProEdit">Name:<t id="ed_name"><?php echo $r['user_first'];?></t>
											<button style="height:30px;width:60px" class="btn btn-primary" data-toggle="collapse" data-target="#contents" type="button"><div style="margin-left:-10px;margin-top:-5px;">Edit</div></button>
												<div class="collapse" id="contents">
													<div class="well responsive">New name:<input type="text" name="Ename"></div>
												</div>
										</div>
										<div class="ProEdit">Username:<t id="ed_username"><?php echo $r['user_uid']?></t>
											<button style="height:30px;width:60px" class="btn btn-primary" data-toggle="collapse" data-target="#contentsus" type="button"><div style="margin-left:-10px;margin-top:-5px;">Edit</div></button>
												<div class="collapse" id="contentsus">
													<div class="well responsive">New username:<input type="text" name="Eusname"></div>
												</div>
										</div>
										<div class="ProEdit">Password
											<button style="height:30px;width:60px" class="btn btn-primary" data-toggle="collapse" data-target="#contentsps" type="button"><div style="margin-left:-10px;margin-top:-5px;">Edit</div></button>
												<div class="collapse" id="contentsps">
													<div class="well responsive">
														Old password: <input type="password" name="Eprpass"/>
													</div>
													<div class="well responsive">
														New password: <input type="text" name="Enwpass"/>
													</div>
												</div>
										</div>
										<div class="ProEdit">Email: <t id="ed_email"><?php echo $r['user_email'];?></t>
											<button style="height:30px;width:60px" class="btn btn-primary" data-toggle="collapse" data-target="#contentsem" type="button"><div style="margin-left:-10px;margin-top:-5px;">Edit</div></button>
												<div class="collapse" id="contentsem">
													<div class="well responsive">New Email:<input type="text" name="Eem"></div>
												</div>
										</div>
										<div class="ProEdit">Profile Picture: <img id="ed_pic" class="img-rounded"style="height:40px;width:40px;" src="<?php echo $r['pro_pic']?>"/>
											<button style="height:30px;width:60px" class="btn btn-primary" data-toggle="collapse" data-target="#contentspp" type="button"><div style="margin-left:-10px;margin-top:-5px;">Edit</div></button>
												<div class="collapse" id="contentspp">
													<div class="well responsive"><input type="file" name="Epp"></div>
												</div>
										</div>
										
									</div>
									<div class="modal-footer">
										<input class="btn btn-primary" type="button" value="Close" data-dismiss="modal"/>
										<input class="btn btn-primary" type="submit" value="Apply"/>
										</form>
									</div>
								
							</div>
		
					</div>
					
					</td>
				</tr>
			</table>
			
		</div>
		<?php} else {?>
		
		
		<?php } ?>
		<div class="gtco-container" style="margin-left:0px" >
			<div class="row">
				<div class="col-md-12 col-md-offset-0 text-left">
					<?php
						if(isset($_SESSION['u_id']))
							$em = '1em';
						else
							$em = '13em';
					?>

					<div style="margin-top:<?php echo $em; ?>;" class="row row-mt-15em">
						<div  class="col-md-7 mt-text animate-box" data-animate-effect="fadeInUp">
							
							<div><h2>Ordered By</h2>
							
								<select name="order_type" onchange = "location = this.value;">
									<option> </option>
									<option value="notes.php?order_type=l">Likes</option>
									<option value="notes.php?order_type=r">Recent</option>
								</select>
							</div>	
							
							<?php if(@$_GET['order_type'] == 'l')
									$order = 'likes';
								else if(@$_GET['order_type'] == 'r')
									$order = 'date';
								else
									$order = 'likes';	
								?>
							<div style="height:880px;" class="tabovflow">
							<div style="height:840px;" class="mintabflow">
							<div id="tabcont" style="border-radius:0px;margin-left:0px;"class="jumbotronpers">
				<table><thead>
					<tr id="headerTab">
							<td>Note name</td>
							<td>Course name</td>
							<td>Author</td>
							<td>Likes</td>
							<td>Type</td>
							<td>Date</td>
							<td>Download</td>
						</tr></thead>
				<?php 
					if(isset($_GET['type'])){
						$type = $_GET['type'];
						if($type == 'tch'){
					if(isset($_GET['page'])){
							$page = $_GET['page'];
								}
						else
							$page = 1;
										
										$start = ($page - 1) * $per_page;
										
						$queryml="SELECT `n_id`,`author`,`n_name`,`course`,`stat`,`likes`,`date`,`file_loc` FROM `notes` WHERE `stat` = 'tch' AND `type` = '0' AND `invalid` = '0' ORDER BY ".$order." DESC LIMIT $start,$per_page";
						$query_for_count="SELECT `n_id`,`author`,`n_name`,`course`,`stat`,`likes`,`date`,`file_loc` FROM `notes` WHERE `stat` = 'tch' AND `type` = '0' AND `invalid` = '0' ORDER BY ".$order." DESC";
						$query_runml = mysqli_query($conn,$queryml);
						$no_of_rows = mysqli_num_rows(mysqli_query($conn,$query_for_count));
						$pages = ceil($no_of_rows/$per_page);		
						$query_runml = mysqli_query($conn,$queryml);
					while ( $query_rowsml = mysqli_fetch_assoc($query_runml)){
									
						$note_id = $query_rowsml['n_id'];	
						$loc = $query_rowsml['file_loc'];	
						$note_name = $query_rowsml['n_name'];
						$stat = $query_rowsml['stat'];
						if($stat == 'std'){
						$stat = 'Student';}
						if($stat == 'tch'){
							$stat = 'Teacher';}
						$date = $query_rowsml['date'];
						$course = $query_rowsml['course'];
						$likes = $query_rowsml['likes'];
						$auth_id = $query_rowsml['author'];
						
							$row = mysqli_fetch_array(mysqli_query($conn,"SELECT user_uid,pro_pic FROM users WHERE user_id=$auth_id"));
								?>
										
						<tr>
							<td><?php echo $note_name;if(isset($_SESSION['u_id'])){ReportButton($note_id,$_SESSION['u_id']);}?></td>
							<td><?php echo $course;?></td>
							<td><img onclick = "mdldsp(<?php echo $auth_id; ?>)" data-toggle="modal" data-target="#profview" style="height:25px;width:25px;" class="img-circle" src="<?php echo $row['pro_pic']?>"/> <?php echo $row['user_uid'];?></td>
							<td style="width:16%">
							<?php 
					if(isset($_SESSION['u_id'])){ ?><?php LikeButton($note_id);}
					
					else {
						echo "<button class='btn btn-primary'>Not logged in</button>";
						}?>
							
							</td>
							<td><?php echo $stat;?></td>
							<td><?php echo $date;?></td>
							<td><?php 
					if(isset($_SESSION['u_id'])){ ?>
					<?php  DownloadButton($loc,$_SESSION['u_uid'],$note_name);?>
					<?php } else {echo "<button class='btn btn-primary'>Not logged in</button>";}?></td>
						</tr>
										
					<?php
					}
					}			
					if($type == 'std'){
						if(isset($_GET['page'])){
							$page = $_GET['page'];
								}
						else
							$page = 1;
										
										$start = ($page - 1) * $per_page;
										
						$queryml="SELECT `n_id`,`author`,`n_name`,`course`,`stat`,`likes`,`date`,`file_loc` FROM `notes` WHERE `stat` = 'std' AND `type` = '0' AND `invalid` = '0' ORDER BY ".$order." DESC LIMIT $start,$per_page";
						$query_for_count="SELECT `n_id`,`author`,`n_name`,`course`,`stat`,`likes`,`date`,`file_loc` FROM `notes` WHERE `stat` = 'std' AND `type` = '0' AND `invalid` = '0' ORDER BY ".$order." DESC";
						$query_runml = mysqli_query($conn,$queryml);
						$no_of_rows = mysqli_num_rows(mysqli_query($conn,$query_for_count));
						$pages = ceil($no_of_rows/$per_page);
						$i=0;
						while ( $query_rowsml = mysqli_fetch_assoc($query_runml)){
										
							$note_id = $query_rowsml['n_id'];	
							$loc = $query_rowsml['file_loc'];	
							$note_name = $query_rowsml['n_name'];
							$stat = $query_rowsml['stat'];
							if($stat == 'std'){
								$stat = 'Student';}
							if($stat == 'tch'){
								$stat = 'Teacher';}
							$date = $query_rowsml['date'];
							$course = $query_rowsml['course'];
							$likes = $query_rowsml['likes'];
							$auth_id = $query_rowsml['author'];
							
								$row = mysqli_fetch_array(mysqli_query($conn,"SELECT user_uid,pro_pic FROM users WHERE user_id=$auth_id"));
											?>
						<tr>
							<td><?php echo $note_name;if(isset($_SESSION['u_id'])){ReportButton($note_id,$_SESSION['u_id']);}?></td>
							<td><?php echo $course;?></td>
							<td><img onclick = "mdldsp(<?php echo $auth_id; ?>)" data-toggle="modal" data-target="#profview" style="height:25px;width:25px;" class="img-circle" src="<?php echo $row['pro_pic']?>"/> <?php echo $row['user_uid'];?></td>
							<td style="width:16%"><?php 
					if(isset($_SESSION['u_id'])){ ?><?php LikeButton($note_id);}
					
					else {
						echo "<button class='btn btn-primary'>Not logged in</button>";
						}?></td>
							<td><?php echo $stat;?></td>
							<td><?php echo $date;?></td>
							<td><?php 
								if(isset($_SESSION['u_id'])){ ?>
									<?php  DownloadButton($loc,$_SESSION['u_uid'],$note_name);?>
								<?php } else {echo "<button class='btn btn-primary'>Not logged in</button>";}?></td>
						</tr>
									<?php
										}}
									}
									else
									{	
										if(isset($_GET['page'])){
											$page = $_GET['page'];
												}
										else
											$page = 1;
										$start = ($page - 1) * $per_page;
										$queryml="SELECT * FROM `notes` WHERE `type` = '0' AND `invalid` = '0' ORDER BY ".$order." DESC LIMIT $start,$per_page";
										$query_for_count="SELECT * FROM `notes` WHERE `type` = '0' AND `invalid` = '0' ORDER BY ".$order." DESC";
										$no_of_rows = mysqli_num_rows(mysqli_query($conn,$query_for_count));
										$pages = ceil($no_of_rows/$per_page);
											$query_runml = mysqli_query($conn,$queryml);
											$i=0;
											while ( $query_rowsml = mysqli_fetch_assoc($query_runml)){
												
												$note_id = $query_rowsml['n_id'];	
												$loc = $query_rowsml['file_loc'];	
												$note_name = $query_rowsml['n_name'];
												$stat = $query_rowsml['stat'];
												if($stat == 'std'){
													$stat = 'Student';}
												if($stat == 'tch'){
													$stat = 'Teacher';}
												$date = $query_rowsml['date'];
												$course = $query_rowsml['course'];
												$likes = $query_rowsml['likes'];
												$auth_id = $query_rowsml['author'];
												
												$row = mysqli_fetch_array(mysqli_query($conn,"SELECT user_uid,pro_pic FROM users WHERE user_id=$auth_id"));
											?>
										<tr>
							<td><?php echo $note_name;if(isset($_SESSION['u_id'])){ReportButton($note_id,$_SESSION['u_id']);}?></td>
							<td><?php echo $course;?></td>
							<td><img onclick = "mdldsp(<?php echo $auth_id; ?>)" data-toggle="modal" data-target="#profview" style="height:25px;width:25px;" class="img-circle" src="<?php echo $row['pro_pic']?>"/> <?php echo $row['user_uid'];?></td>
							<td style="width:16%">
							<?php 
								if(isset($_SESSION['u_id'])){ ?><?php LikeButton($note_id);}
								
								else {
									echo "<button class='btn btn-primary'>Not logged in</button>";
									}?>
							</td>
							<td><?php echo $stat;?></td>
							<td><?php echo $date;?></td>
							<td><?php 
								if(isset($_SESSION['u_id'])){ ?>
								<?php  DownloadButton($loc,$_SESSION['u_uid'],$note_name);?>
								<?php } else {echo "<button class='btn btn-primary'>Not logged in</button>";}?></td>
						</tr>
									<?php
										}
									}
										
									?></tbody>
								</table>
								
							</div>
							</div>
							<!--Page scroll-->
						<div class="pages">
								<?php
				
								for((int)$i = 1;$i <= $pages;$i++){
									?>
								<a href="notes.php?page=<?php echo $i;?>"><button style="border-radius:0px;height:38px;fon" class="btn btn-primary"><?php echo $i;?></button></a>
								<?php
										}
									?>
						</div>		
						<!--Page scroll end-->
							</div>
						</div>
						<div class="col-md-4 col-md-push-1 animate-box" data-animate-effect="fadeInRight">
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
						<p>This website is designed to share notes</p>
						
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
							<li><a href="#"><i class="icon-mail2"></i>  email@email.com</a></li>
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
	
	<div class="modal fade" id="profview">
		<div class="modal-dialog">
			<div style="height:600px;width:600px;background-color: #ececec;" class="modal-content">
				<div style="height:100%;width:100%" class="modal-body">
					<!--Name & School-->
					<div style="height:50px;width:100%;float:top;margin-top:-5px;margin-bottom:4px;">
						<!--Name-->
						<div style="height:100%;width:50%;float:left;border-right:medium solid;text-align:left;">
							<h3 style="float:left;font-family: Agency FB;margin-top: 5px;">Name - </h3><h3 id="md_nm" style="margin-left: 50px;margin-top: 5px;"></h3>
						</div>
						<!--School-->
						<div style="height:100%;width:50%;float:right;text-align:left;">
							<h3 style="float:left;font-family: Agency FB;margin-top: 5px;margin-left:5px;"> Institute - </h3><h3 id="md_sch" style="margin-left: 50px;margin-top: 5px;"></h3>
						</div>
					</div>
					<!---->
					
					<div style="height:480px;width:100%">
						<img id="md_pic" style="height:100%;width:105.2%;margin-top:-5px;margin-left:-15px;" class="img" src="<?php echo $row['pro_pic']; ?>"/>
					</div>
					
					<!--Email & Likes-->
					<div style="height:50px;width:100%;float:bottom;">
						<!--Email-->
						<div style="height:100%;width:50%;float:left;border-right:medium solid;text-align:left;">
							<h3 style="float:left;font-family: Agency FB;margin-top: 5px;">Contact - </h3><h4 id="md_cont" style="margin: 10px;"></h4>
						</div>
						<!--Likes-->
						<div style="height:100%;width:50%;float:right;text-align:center;">
							<span style="font-size: 30px;font-weight:bold;color:black;" class="glyphicon glyphicon-thumbs-up"></span><h3 id="md_likes"></h3>
						</div>
					</div>
					<!---->
				</div>
				<span data-dismiss="modal" id="close" class="glyphicon glyphicon-remove-circle"></span>
			</div>
		</div>
	</div>
	
		<?php }?>
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.js"></script>
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
	<!--LikeButton & Other js-->
	<script type="text/javascript" src="js/like.js"></script>
	<script type="text/javascript" src="js/report.js"></script>
	<script type="text/javascript" src="js/prof_edit.js"></script>
	<script type="text/javascript" src="js/display.js"></script>
	

	</body>
</html>
	
