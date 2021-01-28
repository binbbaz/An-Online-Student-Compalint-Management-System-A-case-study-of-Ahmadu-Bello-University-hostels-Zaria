<?php

// Start the session
  require_once('startsession.php');
  include_once("connectvars.php") ;

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Dashboard - Students Complaint Management System</title>

		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="../assets/css/bootstrap.css" />
		<link rel="stylesheet" href="../assets/css/font-awesome.css" />

		<!-- page specific plugin styles -->

		<!-- text fonts -->
		<link rel="stylesheet" href="../assets/css/ace-fonts.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="../assets/css/ace.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="../assets/css/ace-part2.css" class="ace-main-stylesheet" />
		<![endif]-->

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="../assets/css/ace-ie.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="../assets/js/ace-extra.js"></script>
		<script src="jquery.js"></script>
		<script>
		$(document).ready(function(){
			$('#complainq').click(function(){
			$('#theRealContainer').load('comment.php');
			});
		});

		$(document).ready(function(){
			$('#prof').click(function(){
			$('#theRealContainer').load('student_details.php');
			});
		});

	</script>
	</head>

	<body class="no-skin">
		<!-- #section:basics/navbar.layout -->
		<div id="navbar" class="navbar navbar-default">
			<script type="text/javascript">
				try{ace.settings.check('navbar' , 'fixed')}catch(e){}
			</script>

			<div class="navbar-container" id="navbar-container">
				<!-- #section:basics/sidebar.mobile.toggle -->
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<!-- /section:basics/sidebar.mobile.toggle -->
				<div class="navbar-header pull-left">
					<!-- #section:basics/navbar.layout.brand -->
					<a href="#" class="navbar-brand">
						<small>
							<!-- <i class="fa fa-leaf"></i> -->
							Students Complaint Management System
						</small>
					</a>

					<!-- /sehyction:basics/navbar.layout.brand -->

					<!-- #section:basics/navbar.toggle -->

					<!-- /section:basics/navbar.toggle -->
				</div>

				<!-- #section:basics/navbar.dropdown -->
				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
											
						<!-- #section:basics/navbar.user_menu -->
						<li class="light-blue">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<!--<img class="nav-user-photo" src="../assets/avatars/user.jpg" alt="Jason's Photo" />-->
								<span class="user-info">
									<small>Welcome,</small>
									<?php echo $_SESSION['username']; ?>
								</span>

							
				</div>

				<!-- /section:basics/navbar.dropdown -->
			</div><!-- /.navbar-container -->
		</div>

		<!-- /section:basics/navbar.layout -->
		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>

			<!-- #section:basics/sidebar -->
			<div id="sidebar" class="sidebar                 responsive">
				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
				</script>

				<div class="sidebar-shortcuts" id="sidebar-shortcuts">
					<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
						<button class="btn btn-success">
							<i class="ace-icon fa fa-signal"></i>
						</button>

						<button class="btn btn-info">
							<i class="ace-icon fa fa-pencil"></i>
						</button>

						<!-- #section:basics/sidebar.layout.shortcuts -->
						<button class="btn btn-warning">
							<i class="ace-icon fa fa-users"></i>
						</button>

						<button class="btn btn-danger">
							<i class="ace-icon fa fa-cogs"></i>
						</button>

						<!-- /section:basics/sidebar.layout.shortcuts -->
					</div>

					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
						<span class="btn btn-success"></span>

						<span class="btn btn-info"></span>

						<span class="btn btn-warning"></span>

						<span class="btn btn-danger"></span>
					</div>
				</div><!-- /.sidebar-shortcuts -->
				<ul class="nav nav-list">
					<li class="active">
						<a href="#" id="hclick">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text">Home </span>
						</a>
					</li>

					
					<li class="">
						<a href="JAVASCRIPT:profileAjax()" class="dropdown-toggle" id="prof">
							<i class="menu-icon fa fa-list"></i>
							<span class="menu-text"> Profile </span>
							</a>

					</li>
					<li class="">
						<a href="JAVASCRIPT:theAjax()" class="dropdown-toggle" id="complainq">
							<i class="menu-icon fa fa-file-o"></i>

							<span class="menu-text">
								Complain
					</span> </a></li>
					<li class="">
								<a href="logout.php">
									<i class="menu-icon fa fa-picture-o"></i>
									<span class="menu-text"> Log Out </span>
								</a>

						<b class="arrow"></b>
					</li>
				</ul><!-- /.nav-list -->
				<!-- #section:basics/sidebar.layout.minimize -->
				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>

			<?php
						 $u_id = $_SESSION['user_id'];
						 $no_of_comments="1";
						 $sql="SELECT * FROM complain WHERE u_id = '$u_id' ORDER BY complain_id DESC LIMIT 0, $no_of_comments";
						 $result = mysql_query($sql) or die(mysql_error());
						echo "<hr />";

						echo "<h3>Last Complaint</h3>";
						while($row = mysql_fetch_array($result)) {
						echo "<p style = 'color: green; font-family: tahoma;'>".$row['complain']."<br/><sub><b> Time: </b>". $row['join_date']. "</sub><hr /></p> ";
							if($row['status'] == 0){
								echo "<b> status:</b> pending";
							}else if ($row['status'] == 1){
								echo "<b> status:</b> approved";
							}else{
								echo "<b> status:</b> under process";
							}
						}
						 /*
				
						
						if(isset($_SESSION['pname'])){

							$pagename = $_SESSION['pname'];
						//$comp_id = $_SESSION['com_id'];
						 $sql="SELECT * FROM complain WHERE complain_on= '$pagename' ORDER BY complain_id DESC LIMIT 0, $no_of_comments";
						 $result = mysql_query($sql) or die(mysql_error());
						echo "<hr />";
						 
						echo "<h3>Last Complaint</h3>";
						while($row = mysql_fetch_array($result)) {
						echo "<p style = 'color: green; font-family: tahoma;'>".$row['complain']."<br/><sub><b> Time: </b>". $row['join_date']. "</sub><hr /></p>";
						}
						mysql_close();
						}*/
						
?>

				<!-- /section:basics/sidebar.layout.minimize -->
				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
				</script>
			</div>

			<!-- /section:basics/sidebar -->
			<div class="main-content">
				<div class="main-content-inner">
					<!-- #section:basics/content.breadcrumbs -->
					<div class="breadcrumbs" id="breadcrumbs">
						<script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
						</script>

		<?php 
         
          	$name = $_SESSION['username'];
        	$conn = mysql_connect("localhost", "root", "") or die (mysql_error());
  			$db = mysql_select_db("project") or die (mysql_error());

          $sql = "SELECT surname, firstname, lastname FROM user WHERE username = '$name' ";
          $result = mysql_query($sql) or die(mysql_error());

          while($row = mysql_fetch_array($result)) {
          	$_SESSION['surname'] = $row['surname'];
          	$_SESSION['firstname'] = $row['firstname'];
          	$_SESSION['lastname'] = $row['lastname'];
        	}	
          echo "<h2 style = 'color: green'>". $_SESSION['surname']. " " . $_SESSION['firstname'] . " ". $_SESSION['lastname'] . "</h2>";  
          
       ?>

					</div>
							<div id="theRealContainer"> <center>
							<?php
								$hall_name = "";
								$check_hall = $_SESSION['hall'];
								//$username = $_SESSION['user_id'];
							
									if ($check_hall == 1)
										$hall_name = "Umar Suleiman Hall";

									if ($check_hall == 2)
										$hall_name = "Uthman Danfodio Hall";

									if ($check_hall == 3)
										$hall_name = "Iksa Ramat Hall";
									
									if ($check_hall == 4)
										$hall_name = "Queen Amina Hall";
									
									if ($check_hall == 5)
										$hall_name = "Ribadu Hall";
									
									if ($check_hall == 6)
										$hall_name = "Alexandar Hall";
									

									echo "<h1 style='font-family: Tahoma; color: green; font-weight: bolder; box-shadow: rgba(123, 21, 34);'>". $hall_name. ", Ahmadu Bello University, Zaria". "</h1>";

							 ?>
							<br/> <br/>
							<img src="abulogo.jpg" width="250px" height="250px"> <br/> <p style="color: red"> Hall Administrator's note<br/> your are welcome to complain Management portal, a platform created for you to lodge your complaint in an efficient manner and at your own pace. please be brief and concise when lodging your complain. do not include your room nor your block number, it will be gotten automatically. necessary artisan will be sent to your room or your block for repair or change of items  as the case may be.</p>
							</center> </div>
<div class="footer">
				<div class="footer-inner">
					<!-- #section:basics/footer -->
					<div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder">Designed & Developed By</span>
							Abdulsalam Abass - Matric No: U13CS1134
						</span>

						&nbsp; &nbsp;
						<span class="action-buttons">
							<a href="#">
								<i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
							</a>

							<a href="#">
								<i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
							</a>
						</span>
					</div>

					<!-- /section:basics/footer -->
				</div>
			</div>

		</div><!-- /.main-container -->

	<script src="jquery.js"></script>
    <script>
 
    $( document ).ready(function() {
        $(#prof).click(function(){
        	$(#theRealContainer).fadeIn(5000);

        });
    });
 
    </script>
	</body>

</html>