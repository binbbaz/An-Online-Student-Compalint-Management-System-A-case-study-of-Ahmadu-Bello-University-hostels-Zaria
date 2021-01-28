<?php
  require_once('connectvars.php');
  session_start();
  $error_msg = "";

  // If the user isn't logged in, try to log them in
  if (!isset($_SESSION['user_id']) && !isset($_SESSION['admin_id'])  && isset($_POST['submit'])){
      // Grab the user-entered log-in data
      $connection = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD) or die(mysql_error());
      $db = mysql_select_db(DB_NAME, $connection) or die (mysql_error());

      // Grab the user-entered log-in data
      $username = mysql_real_escape_string(trim($_POST['username']));
      $password = mysql_real_escape_string(trim($_POST['password'])); //mysql_real_escape_stringfunction to strip out any characters that a hacker may have inserted in order to break into or alter your database.
      //$logininfo = $_POST['logininfo'];
    if (!empty($username) && !empty($password)){
    	$sql = "SELECT user_id, username, category_id, hall FROM user WHERE username = '$username' AND password = '$password'";
      	$result = mysql_query($sql) or die(mysql_error());
        while ($row = mysql_fetch_array($result)) {
          // The log-in is OK so set the user ID and username session vars (and cookies), and redirect to the home page
        	$catid = $row['category_id'];
          $_SESSION['user_id'] = $row['user_id'];
          $_SESSION['username'] = $row['username'];
          $_SESSION['cat'] = $row['category_id'];
          $_SESSION['hall'] = $row['hall'];

          setcookie('user_id', $row['user_id'], time() + (60 * 60 * 24 * 30));    // expires in 30 days
          setcookie('username', $row['username'], time() + (60 * 60 * 24 * 30));
          setcookie('categoryid', $row['category_id'], time() + (60 * 60 * 24 * 30));

            // expires in 30 days
          //$home_url = 'http://' . $_SERVER['HTTP_HOST'] . '/adminhome.php';
          if ($catid == 1 ){
          	$home_url1 = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/studenthome.php';
          	header('Location: ' . $home_url1);
          }
          if ($catid == 2){
          	$home_url2 = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/hall_admin.php';
          	header('Location: ' . $home_url2);	
          }
          if ($catid == 3){
          	$home_url3 = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/artisans.php';
          	header('Location: ' . $home_url3);
          } 
       }  
    }else{
    	 $error_msg = 'Sorry, you must enter a valid username and password.';
          echo "$error_msg";
 // The username/password are incorrect so set an error message
	}
}
  ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Students Complaint Management System</title>

		<meta name="description" content="User login page" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="../assets/css/bootstrap.css" />
		<link rel="stylesheet" href="../assets/css/font-awesome.css" />

		<!-- text fonts -->
		<link rel="stylesheet" href="../assets/css/ace-fonts.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="../assets/css/ace.css" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="../assets/css/ace-part2.css" />
		<![endif]-->
		<link rel="stylesheet" href="../assets/css/ace-rtl.css" />

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="../assets/css/ace-ie.css" />
		<![endif]-->

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

		<!--[if lt IE 9]>
		<script src="../assets/js/html5shiv.js"></script>
		<script src="../assets/js/respond.js"></script>
		<![endif]-->
	</head>

	<body class="login-layout">
		<div class="main-container">
			<div class="main-content">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<div class="login-container">
							<div class="center">
								<h1>
									<!-- <i class="ace-icon fa fa-leaf green"></i>  
									<span class="red">Ace</span> -->
									<span class="white" id="id-text2">Students Complaint</span>
								</h1>
								<h4 class="blue" id="id-company-text"> Management System</h4>
							</div>

							<div class="space-6"></div>

							<div class="position-relative">
								<div id="login-box" class="login-box visible widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header blue lighter bigger">
												<i class="ace-icon fa fa-coffee green"></i>
												Please Enter Your Information
											</h4>

											<div style="color: red;"><?php echo $error_msg; ?></div> 

											<div class="space-6"></div>



											<form method="post" action="index.php">
												<fieldset>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" class="form-control" placeholder="Registration number" name="username" />
															<i class="ace-icon fa fa-user"></i>
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" class="form-control" placeholder="Password" name="password" />
															<i class="ace-icon fa fa-lock"></i>
														</span>
													</label>

													<div class="space"></div>

													<div class="clearfix">
														

														<button type="submit" class="width-100 pull-center btn btn-sm btn-primary" name="submit">
															<i class="ace-icon fa fa-key"></i>
															<span class="bigger-110">Login Now</span>
														</button>
													</div>

													<div class="space-4"></div>
												</fieldset>
											</form>
											<div></div>
											<div class="social-or-login center">
												<span class="bigger-110">Design & Developed By <br/>
												 Abdulsalam Abbaas</span>
											</div>

											<div class="space-6"></div>

											<!-- <div class="social-login center">
												<a class="btn btn-primary">
													<i class="ace-icon fa fa-facebook"></i>
												</a>

												<a class="btn btn-info">
													<i class="ace-icon fa fa-twitter"></i>
												</a>

												<a class="btn btn-danger">
													<i class="ace-icon fa fa-google-plus"></i>
												</a>
											</div> -->
										</div><!-- /.widget-main -->

								
							
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.main-content -->
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script type="text/javascript">
			window.jQuery || document.write("<script src='../assets/js/jquery.js'>"+"<"+"/script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='../assets/js/jquery1x.js'>"+"<"+"/script>");
</script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='../assets/js/jquery.mobile.custom.js'>"+"<"+"/script>");
		</script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
			 $(document).on('click', '.toolbar a[data-target]', function(e) {
				e.preventDefault();
				var target = $(this).data('target');
				$('.widget-box.visible').removeClass('visible');//hide others
				$(target).addClass('visible');//show target
			 });
			});
			
			
			
			//you don't need this, just used for changing background
			jQuery(function($) {
			 $('#btn-login-dark').on('click', function(e) {
				$('body').attr('class', 'login-layout');
				$('#id-text2').attr('class', 'white');
				$('#id-company-text').attr('class', 'blue');
				
				e.preventDefault();
			 });
			 $('#btn-login-light').on('click', function(e) {
				$('body').attr('class', 'login-layout light-login');
				$('#id-text2').attr('class', 'grey');
				$('#id-company-text').attr('class', 'blue');
				
				e.preventDefault();
			 });
			 $('#btn-login-blur').on('click', function(e) {
				$('body').attr('class', 'login-layout blur-login');
				$('#id-text2').attr('class', 'white');
				$('#id-company-text').attr('class', 'light-blue');
				
				e.preventDefault();
			 });
			 
			});
		</script>
	</body>
</html>
