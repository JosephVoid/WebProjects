<!DOCTYPE HTML>
<?php session_start();
	  include "includes/dbn.inc.php";include "includes/Buttonfunction.php";include "includes/DownloadCount.php";$per_page = 16;
?>
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
	<link rel="stylesheet" href="bootstrap.css">
	
	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/magnific-popup.css">

	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	<!-- Additional.css -->
	<link rel="stylesheet" href="css/additional.css">
	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

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
			
						<div class="row">
						<div class="col-sm-4 col-xs-12">
						<div id="gtco-logo"><a href="index.html">ATERERA<em>.</em></a></div>
					</div>
						<div class="col-xs-8 text-right menu-1">
					<ul>
						<li><a href="dashboard.php">Dashboard</a></li>
						<li><a href="lit.php">Literature</a></li>
						<li class="has-dropdown">
							<a href="notes.php">Notes</a>
							<ul class="dropdown">
								<li><a href="notes.php?type=tch">Teacher's Notes</a></li>
								<li><a href="notes.php?type=std">Student Uploads</a></li>
								
							
							</ul>
						</li>
						<li><a href="projects.php">Projects</a></li>
						<li><a href="upload.php">Upload</a></li>
						

						<?php

						if (isset($_SESSION['u_id'])) {
							echo '<a href="includes/logout.inc.php" class="btn-cta"><span>Log Out</span></a>';
							//echo '<form action="includes/logout.inc.php" method="POST">
							//	<input type="submit" class="btn-cta" value="Log Out"'
						}
						$r = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM users WHERE user_id =".$_SESSION['u_id'].""));
						?>
						<li>
						<form style="margin-top:-6px;" class="navbar-form navbar-right" role="search">
							<div class="form-group">
								<input style="height: 30px;width: 115px;background:white;" type="text" name="search_param" class="form-control" placeholder="Search">
							</div>
							<button type="link" id="search-but" href="dashboard.php?param=search_param" class="btn btn-primary"><span id="gly-ser"class="glyphicon glyphicon-search"></span></button>
						</form>
						</li>
						
					</ul>
				</div>
			</div>
			
		</div>
	</nav>
	
	<header id="gtco-header" class="gtco-cover" role="banner" style="background-image: url(images/back_im.jpg)" >
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
									<strong><div class="modal-body">
										<h1 style="color:black;font-family:Maiandra GD;">PROFILE EDIT</h1><br>
										<form enctype="multipart/form-data" id="edit_form" method="POST">
										<hr class="divi" width="100%"></hr>
										<div class="ProEdit"><f style="font-family:Maiandra GD;padding-right:10px;">Name:</f><t id="ed_name"><?php echo $r['user_first'];?></t>
											<button style="height:30px;width:60px" class="btn btn-primary" data-toggle="collapse" data-target="#contents" type="button"><div style="margin-left:-10px;margin-top:-5px;"><span style="margin-left:-10px;" class="glyphicon glyphicon-pencil"></span>Edit</div></button>
												<div class="collapse" id="contents">
													<div class="well responsive"><f style="font-family:Maiandra GD;padding-right:10px;">New name:</f><input maxlength="12" type="text" name="Ename"></div>
												</div>
										</div>
										<hr class="divi" width="100%"></hr>
										<div class="ProEdit"><f style="font-family:Maiandra GD;padding-right:10px;">Username:</f><t id="ed_username"><?php echo $r['user_uid']?></t>
											<button style="height:30px;width:60px" class="btn btn-primary" data-toggle="collapse" data-target="#contentsus" type="button"><div style="margin-left:-10px;margin-top:-5px;"><span style="margin-left:-10px;" class="glyphicon glyphicon-pencil"></span>Edit</div></button>
												<div class="collapse" id="contentsus">
													<div class="well responsive"><f style="font-family:Maiandra GD;padding-right:10px;">New username:</f><input maxlength="12" type="text" name="Eusname"></div>
												</div>
										</div>
										<hr class="divi" width="100%"></hr>
										<div class="ProEdit"><f style="font-family:Maiandra GD;">Password</f>
											<button style="height:30px;width:60px" class="btn btn-primary" data-toggle="collapse" data-target="#contentsps" type="button"><div style="margin-left:-10px;margin-top:-5px;"><span style="margin-left:-10px;" class="glyphicon glyphicon-pencil"></span>Edit</div></button>
												<div class="collapse" id="contentsps">
													<div class="well responsive">
														<f style="font-family:Maiandra GD;padding-right:10px;">Old password:</f> <input maxlength="20" type="password" name="Eprpass"/>
													</div>
													<div class="well responsive">
														<f style="font-family:Maiandra GD;padding-right:10px;">New password:</f> <input maxlength="20" type="text" name="Enwpass"/>
													</div>
												</div>
										</div>
										<hr class="divi" width="100%"></hr>
										<div class="ProEdit"><f style="font-family:Maiandra GD;padding-right:10px;">Email:</f> <t id="ed_email"><?php echo $r['user_email'];?></t>
											<button style="height:30px;width:60px" class="btn btn-primary" data-toggle="collapse" data-target="#contentsem" type="button"><div style="margin-left:-10px;margin-top:-5px;"><span style="margin-left:-10px;" class="glyphicon glyphicon-pencil"></span>Edit</div></button>
												<div class="collapse" id="contentsem">
													<div class="well responsive"><f style="font-family:Maiandra GD;padding-right:10px;">New Email:</f><input maxlength="30" type="text" name="Eem"></div>
												</div>
										</div>
										<hr class="divi" width="100%"></hr>
										<div class="ProEdit"><f style="font-family:Maiandra GD;padding-right:10px;">Profile Picture:</f> <img id="ed_pic" class="img-rounded"style="height:40px;width:40px;" src="<?php echo $r['pro_pic']?>"/>
											<button style="height:30px;width:60px" class="btn btn-primary" data-toggle="collapse" data-target="#contentspp" type="button"><div style="margin-left:-10px;margin-top:-5px;"><span style="margin-left:-10px;" class="glyphicon glyphicon-pencil"></span>Edit</div></button>
												<div class="collapse" id="contentspp">
													<div class="well responsive"><input type="file" name="Epp"></div>
												</div>
										</div>
										
									</div></strong>
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
		<!--For Phones-->
		<div class="phoneprofile">
			<div class="Phone-profile-container">
                <div class="child ppicture">
                        <div id="img_cont"><a data-toggle="modal" data-target="#modalpic" href="#">
							<img id="pro_z" style="height:100%;width:50%;margin-left: 25%;margin-right: 25%;" class="img-responsive img-rounded" src="<?php echo $r['pro_pic'];?>"/></a>
						</div>
						<!--Modal pic-->
						<div class="modal fade" id="modalpic">
							<div class="modal-dialog">
								<div id="profmodal" class="modal-content">
									<div style="height:100%;width:100%" class="modal-body">
											<img style="height:100%;width:100%" class="img-thumbnail" src="<?php echo $r['pro_pic']; ?>"/>
									</div>
								</div>
							</div>
						</div>		
                </div>
                <div class="child pusername">
                       <htwo id="uzname" style="color:black" > <strong><?php echo $r['user_uid'];?></strong></htwo>
                </div>
                <div class="child plikes">
                    <t class="phlike">
                    	<span class="glyphicon glyphicon-thumbs-up"></span> 
	                    	<?php						
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
					</t>
                </div>
                <div class="child pedit" data-target="#mymodal">
					<t class="editkey"><span id="pencil" class="glyphicon glyphicon-pencil"></span> Edit</t>
						<div class="modal fade" id="mymodal">
							<div class="modal-dialog">
								<div  class="modal-content">
									<strong><div class="modal-body">
										<h1 style="color:black;font-family:Maiandra GD;">PROFILE EDIT</h1><br>
										<form enctype="multipart/form-data" id="edit_form" method="POST">
										<hr class="divi" width="100%"></hr>
										<div class="ProEdit"><f style="font-family:Maiandra GD;padding-right:10px;">Name:</f><t id="ed_name"><?php echo $r['user_first'];?></t>
											<button style="height:30px;width:60px" class="btn btn-primary" data-toggle="collapse" data-target="#contents" type="button"><div style="margin-left:-10px;margin-top:-5px;"><span style="margin-left:-10px;" class="glyphicon glyphicon-pencil"></span>Edit</div></button>
												<div class="collapse" id="contents">
													<div class="well responsive"><f style="font-family:Maiandra GD;padding-right:10px;">New name:</f><input maxlength="12" type="text" name="Ename"></div>
												</div>
										</div>
										<hr class="divi" width="100%"></hr>
										<div class="ProEdit"><f style="font-family:Maiandra GD;padding-right:10px;">Username:</f><t id="ed_username"><?php echo $r['user_uid']?></t>
											<button style="height:30px;width:60px" class="btn btn-primary" data-toggle="collapse" data-target="#contentsus" type="button"><div style="margin-left:-10px;margin-top:-5px;"><span style="margin-left:-10px;" class="glyphicon glyphicon-pencil"></span>Edit</div></button>
												<div class="collapse" id="contentsus">
													<div class="well responsive"><f style="font-family:Maiandra GD;padding-right:10px;">New username:</f><input maxlength="12" type="text" name="Eusname"></div>
												</div>
										</div>
										<hr class="divi" width="100%"></hr>
										<div class="ProEdit"><f style="font-family:Maiandra GD;">Password</f>
											<button style="height:30px;width:60px" class="btn btn-primary" data-toggle="collapse" data-target="#contentsps" type="button"><div style="margin-left:-10px;margin-top:-5px;"><span style="margin-left:-10px;" class="glyphicon glyphicon-pencil"></span>Edit</div></button>
												<div class="collapse" id="contentsps">
													<div class="well responsive">
														<f style="font-family:Maiandra GD;padding-right:10px;">Old password:</f> <input maxlength="20" type="password" name="Eprpass"/>
													</div>
													<div class="well responsive">
														<f style="font-family:Maiandra GD;padding-right:10px;">New password:</f> <input maxlength="20" type="text" name="Enwpass"/>
													</div>
												</div>
										</div>
										<hr class="divi" width="100%"></hr>
										<div class="ProEdit"><f style="font-family:Maiandra GD;padding-right:10px;">Email:</f> <t id="ed_email"><?php echo $r['user_email'];?></t>
											<button style="height:30px;width:60px" class="btn btn-primary" data-toggle="collapse" data-target="#contentsem" type="button"><div style="margin-left:-10px;margin-top:-5px;"><span style="margin-left:-10px;" class="glyphicon glyphicon-pencil"></span>Edit</div></button>
												<div class="collapse" id="contentsem">
													<div class="well responsive"><f style="font-family:Maiandra GD;padding-right:10px;">New Email:</f><input maxlength="30" type="text" name="Eem"></div>
												</div>
										</div>
										<hr class="divi" width="100%"></hr>
										<div class="ProEdit"><f style="font-family:Maiandra GD;padding-right:10px;">Profile Picture:</f> <img id="ed_pic" class="img-rounded"style="height:40px;width:40px;" src="<?php echo $r['pro_pic']?>"/>
											<button style="height:30px;width:60px" class="btn btn-primary" data-toggle="collapse" data-target="#contentspp" type="button"><div style="margin-left:-10px;margin-top:-5px;"><span style="margin-left:-10px;" class="glyphicon glyphicon-pencil"></span>Edit</div></button>
												<div class="collapse" id="contentspp">
													<div class="well responsive"><input type="file" name="Epp"></div>
												</div>
										</div>
										
									</div></strong>
									<div class="modal-footer">
										<input class="btn btn-primary" type="button" value="Close" data-dismiss="modal"/>
										<input class="btn btn-primary" type="submit" value="Apply"/>
										</form>
									</div>
								
							</div>
		
						</div>					
            	</div>
       		 </div>
		</div>
		
		<div class="gtco-container" style="margin-left:0px" >
			<div class="row">
				<div class="col-md-12 col-md-offset-0 text-left">
					<div style="margin-top:1em" class="row row-mt-15em">
						<div class="col-md-4 animate-box" data-animate-effect="fadeInRight">
							
							<?php
								if(!empty($parameters)){
									if(isset($_GET['page'])){
										$page = $_GET['page'];
											}
									else
										$page = 1;
									
										$start = ($page - 1) * $per_page;
																		
									$query="SELECT users.user_uid,notes.n_id,notes.author, notes.n_name,notes.course,notes.stat,notes.file_loc,notes.likes,notes.date,notes.type,notes.description,notes.ban_req,notes.invalid FROM users JOIN notes ON users.user_id = notes.author WHERE notes.`n_name` LIKE '%".$parameters."%' AND notes.type = 0 AND notes.invalid = 0 OR notes.`course` LIKE '%".$parameters."%' AND notes.type = 0 AND notes.invalid = 0 OR users.user_uid LIKE '%".$parameters."%' AND notes.type = 0 AND notes.invalid = 0 LIMIT $start,$per_page";
									$query_run=mysqli_query($conn,$query);//Running the query.
									$num_of_res=mysqli_num_rows($query_run);//Number of results.
									$query_for_count="SELECT users.user_uid,notes.n_id,notes.author, notes.n_name,notes.course,notes.stat,notes.file_loc,notes.likes,notes.date,notes.type,notes.description,notes.ban_req,notes.invalid FROM users JOIN notes ON users.user_id = notes.author WHERE notes.`n_name` LIKE '%".$parameters."%' AND notes.type = 0 AND notes.invalid = 0 OR notes.`course` LIKE '%".$parameters."%' AND notes.type = 0 AND notes.invalid = 0 OR users.user_uid LIKE '%".$parameters."%' AND notes.type = 0 AND notes.invalid = 0";
									$no_of_rows = mysqli_num_rows(mysqli_query($conn,$query_for_count));
									$pages = ceil($no_of_rows/$per_page);
									if($num_of_res!=0){?>
										<h2><?php echo $num_of_res." Result(s) found.".'<br><br>';
										
										if($num_of_res>0){
												
												?></h2>
											
		<div style="height:892px;" class="tabovflow">
		<div style="height:850px;" class="mintabflow">
		<div id="tabcont" style="border-radius:0px;"class="jumbotronpers">
		<table>
		<thead>
		<tr id="headerTab">
					<td>Note name</td>
					<td>Course name</td>
					<td>Author</td>
					<td>Likes</td>
					<td>Type</td>
					<td>Date</td>
					<td>Download</td>
				</tr>
			</thead>	
		<?php 
		
			while($query_row=mysqli_fetch_assoc($query_run))
				{
					$note_id = $query_row['n_id'];	
					$loc = $query_row['file_loc'];	
					$note_name = $query_row['n_name'];
					$stat = $query_row['stat'];
					if($stat == 1){
						$stat = 'Student';}
					if($stat == 0){
						$stat = 'Teacher';}
					$date = $query_row['date'];
					$course = $query_row['course'];
					$likes = $query_row['likes'];
					$auth_id = $query_row['author'];
					
					$row = mysqli_fetch_array(mysqli_query($conn,"SELECT user_uid,pro_pic FROM users WHERE user_id=$auth_id"));
		?>
				
		
				<tr>
					<td><?php echo $note_name;ReportButton($note_id,$_SESSION['u_id']);?></td>
					<td><?php echo $course;?></td>
					<td><img onclick = "mdldsp(<?php echo $auth_id; ?>)" data-toggle="modal" data-target="#profview" style="height:25px;width:25px;" class="img-circle" src="<?php echo $row['pro_pic']?>"/> <?php echo $row['user_uid'];?>
					<?php if ($pure_likes>50 || $row['user_uid'] == 'Jo10'|| $stat == 'Teacher'){echo '<span class="glyphicon glyphicon-ok-circle"></span>';}?></td>
					<td style="width:16%"><?php LikeButton($note_id);?></td>
					<td><?php echo $stat;?></td>
					<td><?php echo $date;?></td>
					<td><?php DownloadButton($loc,$_SESSION['u_uid'],$note_name);?></td>
				</tr>
				
			
	
									
										<?php
										}?>
											</table>
												</div>
												</div>
												<!--Page scroll-->
													<div class="pages">
															<?php
											
															for((int)$i = 1;$i <= $pages;$i++){
																?>
															<a class="scroll-link" href="dashboard.php?page=<?php echo $i;?>&search_param=<?php echo $parameters?>"><button id="scroll-but"class="btn btn-primary"><?php echo $i;?></button></a>
															<?php
																	}
																?>
													</div>		
										<!--Page scroll end-->
												</div>
										<?php
									}
									}
									else{
										?>
									<h2 style="text-align:center"><?php echo "No results found";?></h2>
									<?php	}}
							?>
							</div>
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
						<small class="block">Designed by <a href="http://hireyab.cf/" target="_blank">Yeabsera G. Bune & Yoseph Tenaw</a></small> 
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
			
						<div class="row">
						<div class="col-sm-4 col-xs-12">
						<div id="gtco-logo"><a href="index.html">ATERERA<em>.</em></a></div>
					</div>
						<div class="col-xs-8 text-right menu-1">
					<ul>
						<li><a href="dashboard.php">Dashboard</a></li>
						<li><a href="lit.php">Literature</a></li>
						<li class="has-dropdown">
							<a href="notes.php">Notes</a>
							<ul class="dropdown">
								<li><a href="notes.php?type=tch">Teacher's Notes</a></li>
								<li><a href="notes.php?type=std">Student Uploads</a></li>
								
							
							</ul>
						</li>
												
						<li>
						<form style="margin-top:-6px;" class="navbar-form navbar-right" role="search">
							<div class="form-group">
								<input style="height: 30px;width: 115px;background:white;" type="text" name="search_param" class="form-control" placeholder="Search">
							</div>
							<button type="link" id="search-but" href="dashboard.php?param=search_param" class="btn btn-primary"><span id="gly-ser"class="glyphicon glyphicon-search"></span></button>
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
						
					$r = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM users WHERE user_id =".$_SESSION['u_id'].""));
	
	
						?>

					</ul>
				</div>
			</div>
			
		</div>
	</nav>
	
	
	
	<header id="gtco-header" class="gtco-cover" role="banner" style="background-image: url(images/back_im.jpg)" >
		<div id="profile" class="jumbotronpers">
			<table id="prof_table" width="100%" height="60px">
				<tr style="text-align:center">
					<td id="td1">
						<div id="img_cont" ><a data-toggle="modal" data-target="#modalpic" href=""><img id="pro_z" style="height:50px;width:50px;" class="img-responsive img-circle" src="<?php echo $r['pro_pic'];?>"/></a></div>
						
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
									<strong><div class="modal-body">
										<h1 style="color:black;font-family:Maiandra GD;">PROFILE EDIT</h1><br>
										<form enctype="multipart/form-data" id="edit_form" method="POST">
										<hr class="divi" width="100%"></hr>
										<div class="ProEdit"><f style="font-family:Maiandra GD;padding-right:10px;">Name:</f><t id="ed_name"><?php echo $r['user_first'];?></t>
											<button style="height:30px;width:60px" class="btn btn-primary" data-toggle="collapse" data-target="#contents" type="button"><div style="margin-left:-10px;margin-top:-5px;"><span style="margin-left:-10px;" class="glyphicon glyphicon-pencil"></span>Edit</div></button>
												<div class="collapse" id="contents">
													<div class="well responsive"><f style="font-family:Maiandra GD;padding-right:10px;">New name:</f><input maxlength="12" type="text" name="Ename"></div>
												</div>
										</div>
										<hr class="divi" width="100%"></hr>
										<div class="ProEdit"><f style="font-family:Maiandra GD;padding-right:10px;">Username:</f><t id="ed_username"><?php echo $r['user_uid']?></t>
											<button style="height:30px;width:60px" class="btn btn-primary" data-toggle="collapse" data-target="#contentsus" type="button"><div style="margin-left:-10px;margin-top:-5px;"><span style="margin-left:-10px;" class="glyphicon glyphicon-pencil"></span>Edit</div></button>
												<div class="collapse" id="contentsus">
													<div class="well responsive"><f style="font-family:Maiandra GD;padding-right:10px;">New username:</f><input maxlength="12" type="text" name="Eusname"></div>
												</div>
										</div>
										<hr class="divi" width="100%"></hr>
										<div class="ProEdit"><f style="font-family:Maiandra GD;">Password</f>
											<button style="height:30px;width:60px" class="btn btn-primary" data-toggle="collapse" data-target="#contentsps" type="button"><div style="margin-left:-10px;margin-top:-5px;"><span style="margin-left:-10px;" class="glyphicon glyphicon-pencil"></span>Edit</div></button>
												<div class="collapse" id="contentsps">
													<div class="well responsive">
														<f style="font-family:Maiandra GD;padding-right:10px;">Old password:</f> <input maxlength="20" type="password" name="Eprpass"/>
													</div>
													<div class="well responsive">
														<f style="font-family:Maiandra GD;padding-right:10px;">New password:</f> <input maxlength="20" type="text" name="Enwpass"/>
													</div>
												</div>
										</div>
										<hr class="divi" width="100%"></hr>
										<div class="ProEdit"><f style="font-family:Maiandra GD;padding-right:10px;">Email:</f> <t id="ed_email"><?php echo $r['user_email'];?></t>
											<button style="height:30px;width:60px" class="btn btn-primary" data-toggle="collapse" data-target="#contentsem" type="button"><div style="margin-left:-10px;margin-top:-5px;"><span style="margin-left:-10px;" class="glyphicon glyphicon-pencil"></span>Edit</div></button>
												<div class="collapse" id="contentsem">
													<div class="well responsive"><f style="font-family:Maiandra GD;padding-right:10px;">New Email:</f><input maxlength="30" type="text" name="Eem"></div>
												</div>
										</div>
										<hr class="divi" width="100%"></hr>
										<div class="ProEdit"><f style="font-family:Maiandra GD;padding-right:10px;">Profile Picture:</f> <img id="ed_pic" class="img-rounded"style="height:40px;width:40px;" src="<?php echo $r['pro_pic']?>"/>
											<button style="height:30px;width:60px" class="btn btn-primary" data-toggle="collapse" data-target="#contentspp" type="button"><div style="margin-left:-10px;margin-top:-5px;"><span style="margin-left:-10px;" class="glyphicon glyphicon-pencil"></span>Edit</div></button>
												<div class="collapse" id="contentspp">
													<div class="well responsive"><input type="file" name="Epp"></div>
												</div>
										</div>
										
									</div></strong>
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
		<!--For Phones-->

		<div class="phoneprofile">			
			<div class="Phone-profile-container">
                <div class="child ppicture">
                       
                        <div id="phone_img_cont"><a data-toggle="modal" data-target="#modalpicph" href="#">
							<img id="pro_z" style="height:100%;width:100%;" class="img-responsive img-rounded" src="<?php echo $r['pro_pic'];?>"/></a>
						</div>
						<!--Modal pic-->
						<div class="modal fade" id="modalpicph">
							<div class="modal-dialog">
								<div id="profmodal" class="modal-content">
									<div style="height:100%;width:100%" class="modal-body">
										<img style="height:100%;width:100%" class="img-thumbnail" src="<?php echo $r['pro_pic']; ?>"/>
									</div>
								</div>
							</div>
						</div>
					
						
                </div>
                <div class="child pusername">
                       <htwo id="uzname" style="color:black" > <strong><?php echo $r['user_uid'];?></strong></htwo>
                </div>
                <div class="child plikes">
                    <t class="phlike">
                    	<span class="glyphicon glyphicon-thumbs-up"></span> 
	                    	<?php						
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
					</t>
                </div>
                <div class="child pedit" data-toggle="modal" data-target="#mymodalph">
				<t class="editkey">Edit</t>
						<!--Edit modal-->
						<div class="modal fade" id="mymodalph" data-backdrop="false">
							<div class="modal-dialog">
								<div  class="modal-content">
									<strong><div class="modal-body">
										<h1 style="color:black;font-family:Maiandra GD;">PROFILE EDIT</h1><br>
										<form enctype="multipart/form-data" id="edit_form" method="POST">
										<hr class="divi" width="100%"></hr>
										<div class="ProEdit"><f style="font-family:Maiandra GD;padding-right:10px;">Name:</f><t id="ed_name"><?php echo $r['user_first'];?></t>
											<button style="height:30px;width:60px" class="btn btn-primary ProfEditButton" data-toggle="collapse" data-target="#contentsph" type="button"><div style="margin-left:-10px;margin-top:-5px;"><span style="margin-left:-10px;" class="glyphicon glyphicon-pencil"></span>Edit</div></button>
												<div class="collapse" id="contentsph">
													<div class="well responsive"><f style="font-family:Maiandra GD;padding-right:10px;">New name:</f><input maxlength="12" type="text" name="Ename"></div>
												</div>
										</div>
										<hr class="divi" width="100%"></hr>
										<div class="ProEdit"><f style="font-family:Maiandra GD;padding-right:10px;">Username:</f><t id="ed_username"><?php echo $r['user_uid']?></t>
											<button style="height:30px;width:60px" class="btn btn-primary ProfEditButton" data-toggle="collapse" data-target="#contentsusph" type="button"><div style="margin-left:-10px;margin-top:-5px;"><span style="margin-left:-10px;" class="glyphicon glyphicon-pencil"></span>Edit</div></button>
												<div class="collapse" id="contentsusph">
													<div class="well responsive"><f style="font-family:Maiandra GD;padding-right:10px;">New username:</f><input maxlength="12" type="text" name="Eusname"></div>
												</div>
										</div>
										<hr class="divi" width="100%"></hr>
										<div class="ProEdit"><f style="font-family:Maiandra GD;">Password</f>
											<button style="height:30px;width:60px" class="btn btn-primary ProfEditButton" data-toggle="collapse" data-target="#contentspsph" type="button"><div style="margin-left:-10px;margin-top:-5px;"><span style="margin-left:-10px;" class="glyphicon glyphicon-pencil"></span>Edit</div></button>
												<div class="collapse" id="contentspsph">
													<div class="well responsive">
														<f style="font-family:Maiandra GD;padding-right:10px;">Old password:</f> <input maxlength="20" type="password" name="Eprpass"/>
													</div>
													<div class="well responsive">
														<f style="font-family:Maiandra GD;padding-right:10px;">New password:</f> <input maxlength="20" type="text" name="Enwpass"/>
													</div>
												</div>
										</div>
										<hr class="divi" width="100%"></hr>
										<div class="ProEdit"><f style="font-family:Maiandra GD;padding-right:10px;">Email:</f> <t id="ed_email"><?php echo $r['user_email'];?></t>
											<button style="height:30px;width:60px" class="btn btn-primary ProfEditButton" data-toggle="collapse" data-target="#contentsemph" type="button"><div style="margin-left:-10px;margin-top:-5px;"><span style="margin-left:-10px;" class="glyphicon glyphicon-pencil"></span>Edit</div></button>
												<div class="collapse" id="contentsemph">
													<div class="well responsive"><f style="font-family:Maiandra GD;padding-right:10px;">New Email:</f><input maxlength="30" type="text" name="Eem"></div>
												</div>
										</div>
										<hr class="divi" width="100%"></hr>
										<div class="ProEdit"><f style="font-family:Maiandra GD;padding-right:10px;">Profile Picture:</f> <img id="ed_pic" class="img-rounded"style="height:40px;width:40px;" src="<?php echo $r['pro_pic']?>"/>
											<button style="height:30px;width:60px" class="btn btn-primary ProfEditButton" data-toggle="collapse" data-target="#contentsppph" type="button"><div style="margin-left:-10px;margin-top:-5px;"><span style="margin-left:-10px;" class="glyphicon glyphicon-pencil"></span>Edit</div></button>
												<div class="collapse" id="contentsppph">
													<div class="well responsive"><input type="file" name="Epp"></div>
												</div>
										</div>
										
									</div></strong>
									<div class="modal-footer">
										<input class="btn btn-primary cls" type="button" value="Close" data-dismiss="modal"/>
										<input class="btn btn-primary" type="submit" value="Apply"/>
										</form>
									</div>
								
							</div>
		
						</div>					
            	</div>
       		 </div>
		</div>

		</div>
		<div class="gtco-container" style="margin-left:0px" >
			<div class="row">
				<div class="col-md-12 col-md-offset-0 text-left">
					

					<div class="row row-mt-15em">
						<div  class="col-md-7 mt-text animate-box" data-animate-effect="fadeInUp">
							<span  class="intro-text-small">Hello <?php echo $_SESSION['u_first']; ?></span>
							<h2>The Most Liked</h2>
								<div id="tabcont" style="border-radius:0px;margin-left:-13px;"class="jumbotronpers">
				<table>
				<thead>
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
					$queryml="SELECT `n_id`,`author`,`n_name`,`course`,`stat`,`likes`,`date`,`file_loc` FROM `notes` WHERE type = 0 AND invalid = 0 ORDER BY `likes` DESC ";
					$query_runml = mysqli_query($conn,$queryml);
					$i=0;
					while ( $query_rowsml = mysqli_fetch_assoc($query_runml)){
										
					if($i<8){
						$note_id = $query_rowsml['n_id'];	
						$loc = $query_rowsml['file_loc'];	
						$note_name = $query_rowsml['n_name'];
						$stat = $query_rowsml['stat'];
						if($stat == 1){
							$stat = 'Student';}
						else if($stat == 0){
							$stat = 'Teacher';}
						$date = $query_rowsml['date'];
						$course = $query_rowsml['course'];
						$likes = $query_rowsml['likes'];
						$auth_id = $query_rowsml['author'];
					
						$row = mysqli_fetch_array(mysqli_query($conn,"SELECT user_uid,pro_pic FROM users WHERE user_id=$auth_id"));
								?>
										
						<tr>
							<td><?php echo $note_name;ReportButton($note_id,$_SESSION['u_id']);?></td>
							<td><?php echo $course;?></td>
							<td><img onclick = "mdldsp(<?php echo $auth_id; ?>)" data-toggle="modal" data-target="#profview" style="height:25px;width:25px;" class="img-circle" src="<?php echo $row['pro_pic']?>"/> <?php echo $row['user_uid'];?><?php if ($pure_likes>50 || $row['user_uid'] == 'Jo10'|| $stat == 'Teacher'){echo '<span class="glyphicon glyphicon-ok-circle"></span>';}?></td>
							<td style="width:16%"><strong><?php LikeButton($note_id);?></strong></td>
							<td><?php echo $stat;?></td>
							<td><?php echo $date;?></td>
							<td><?php DownloadButton($loc,$_SESSION['u_uid'],$note_name);?></td>
						</tr>
										
						<?php
					}$i++;
							}?>
													</table>
												</div>
							<h2>The Newest</h2>
							
							<div id="tabcont" style="border-radius:0px;margin-left:-13px;"class="jumbotronpers">
				<table>
				<thead>
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
					$queryml="SELECT `n_id`,`author`,`n_name`,`course`,`stat`,`likes`,`date`,`file_loc` FROM `notes` WHERE type = 0 AND invalid = 0 ORDER BY `date` DESC ";
					$query_runml = mysqli_query($conn,$queryml);
					$i=0;
					while ( $query_rowsml = mysqli_fetch_assoc($query_runml)){
										
					if($i<8){
						$note_id = $query_rowsml['n_id'];	
						$loc = $query_rowsml['file_loc'];	
						$note_name = $query_rowsml['n_name'];
						$stat = $query_rowsml['stat'];
						if($stat == 1){
							$stat = 'Student';}
						else if($stat == 0){
							$stat = 'Teacher';}
						$date = $query_rowsml['date'];
						$course = $query_rowsml['course'];
						$likes = $query_rowsml['likes'];
						$auth_id = $query_rowsml['author'];
						
						$row = mysqli_fetch_array(mysqli_query($conn,"SELECT user_uid,pro_pic FROM users WHERE user_id=$auth_id"));
								?>
										
						<tr>
							<td><?php echo $note_name;ReportButton($note_id,$_SESSION['u_id']);?></td>
							<td><?php echo $course;?></td>
							<td><img onclick = "mdldsp(<?php echo $auth_id; ?>)" data-toggle="modal" data-target="#profview" style="height:25px;width:25px;" class="img-circle" src="<?php echo $row['pro_pic']?>"/> <?php echo $row['user_uid'];?><?php if ($pure_likes>50 || $row['user_uid'] == 'Jo10' || $stat == 'Teacher'){echo '<span class="glyphicon glyphicon-ok-circle"></span>';}?>
							<!--Profile view modal-->
									
							</td>
							<td  style="width:16%;text-align:center;vertical-align:center"><strong><?php LikeButton($note_id);?></strong></td>
							<td><?php echo $stat;?></td>
							<td><?php echo $date;?></td>
							<td><?php DownloadButton($loc,$_SESSION['u_uid'],$note_name);?></td>
						</tr>
				
					<?php
					}$i++;
		}?>
										
													</table>
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
						<h3>About <span class="footer-logo">ATERERA®<span>.<span></span></h3>
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
						<small class="block">Designed by <a href="http://hireyab.cf/" target="_blank">Yeabsera G. Bune & Yoseph Tenaw</a></small>
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
		<?php }?>
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
	<!--LikeButton & Other js-->
	<script type="text/javascript" src="js/like.js"></script>
	<script type="text/javascript" src="js/report.js"></script>
	<script type="text/javascript" src="js/prof_edit.js"></script>
	<script type="text/javascript" src="js/display.js"></script>
	<script type="text/javascript">
		//$(document).on('click','.ProfEditButton', function(e){
    	 //	$(".collapse in").collapse('hide');
		//})
	</script>
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
	
	

	</body>
</html>
	
