<?php

// Start the session
  require_once('startsession.php');
  include_once("connectvars.php") ;

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<script language="javascript" type="text/javascript">
			var popUpWin=0;
			function popUpWindow(URLStr, left, top, width, height){
 			if(popUpWin){
				if(!popUpWin.closed) popUpWin.close();
			}
				popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+1000+',height='+1000+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
			}
</script>
		<script src="jquery.js"></script>
		<script src="jquery-1.10.2.min.js"></script>
        <script src="underscore-1.5.2.min.js"></script>
        <script src="jquery.scrollTableBody-1.0.0.js"></script>
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
					<li class="">
						<a href="JAVASCRIPT:profileAjax()" class="dropdown-toggle" id="prof">
							<i class="menu-icon fa fa-list"></i>
							<span class="menu-text"> Profile </span>
							</a>

					</li>
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
							<div id="theRealContainer">
								<center>
<table border = "1" width="1000" class="table table-striped table-hover table-bordered table-condensed" id="mytable">
									<thead>
										<tr>
											<th>s/n</th>
											<th>Complaint made By</th>
											<th>Date made</th>
											<th>status</th>
											<th>take action</th>
										</tr>
									</thead>
									<tbody>
										<?php
											require_once('startsession.php');
											include_once("connectvars.php");
											$residence = $_SESSION['hall'];
											$sql = "SELECT user_id, surname, firstname, lastname, join_date,complain_id FROM user AS a, complain AS b WHERE a.user_id = b.u_id AND a.hall = '$residence' AND b.status = '1'";
											$result = mysql_query($sql) or die(mysql_error());
											$j = 0;
											while ($row = mysql_fetch_array($result)){
												$j++;
												$uid = $row['user_id'];
												echo "<tr>";
												echo "<td  class = 'text-right'>$j</td>";
												 ?>
													
														
														<td><?php echo htmlentities($row['surname'] . " " .$row['firstname'] . " ". $row['lastname']);?> </td>
														<td> <?php echo htmlentities($row['join_date']);?></td>
														<td>approved</td>
														<td><a href="javascript:void(0);" onClick="popUpWindow('http://localhost/project/abass/admin/artisan_printing.php?cid=<?php echo htmlentities($row['complain_id']);?>&com_made_by=<?php echo htmlentities($row['user_id']);?> ');" title="attend to status">view details</a></td>

													</tr>
												<?php } ?>
										</tbody>
										 <tfoot>
                    						<tr>
                       						 <td style="font-size: 30px;" colspan="4" class="text-center"><strong> APPROVED COMPLAINTS IN YOUR HALL IS
                       						 <?php 
                       						 $sql = "SELECT COUNT(*) as total FROM complain WHERE status = '1' AND hall_id = $residence";
                       						 $result = mysql_query($sql);
                       						 if ($row = mysql_fetch_array($result))
                       						 	echo $row['total'];
                       						 	?>
                       						 	
                       						 </strong></td>
                    						</tr>
                						</tfoot>
									</table>
								</center>

							</div>
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
	 <script type="text/javascript">
            $(function() {
                $('#mytable').scrollTableBody();
            });
        </script>
</html>