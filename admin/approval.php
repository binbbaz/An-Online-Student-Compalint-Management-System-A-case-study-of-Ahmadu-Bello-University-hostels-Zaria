<?php
	
	session_start();
	include "connectvars.php";
	$approve = 1;
	//$checkApproval = $_GET['id']
	//if(isset($_POST['me']))
	$myuserid = $_GET['idn'];
	$myid = $_SESSION['uuid'];
	$sql = "UPDATE complain SET status = '$approve' WHERE complain_id = '$myuserid'";
	$result = mysql_query($sql);
	if($result){
		header("Location: view_students_complaints.php?id=$myid");
		//header("Location: $_SERVER['HTTP_REFERER']");
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

</body onload = "history.back()">
<script type="text/javascript">
	
</script>
</html>