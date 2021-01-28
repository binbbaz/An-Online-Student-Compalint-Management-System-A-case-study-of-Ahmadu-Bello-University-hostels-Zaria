<?php
	include "connectvars.php";
	if(isset($_POST['sub'])){
		if(isset($_POST['com_id']))
			$c_id = $_POST['com_id'];
			$sql = "UPDATE complain SET status = '3' WHERE complain_id = '$c_id'";
			$result = mysql_query($sql);
	}
	
	
	

?>