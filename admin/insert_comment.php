
<?php
require_once('startsession.php');

require_once('connectvars.php');

$complain_on = $_POST['complain_on'];
$complain = $_POST['complain'];
$u_id =  $_SESSION['user_id'];
$hall = $_SESSION['hall'];


 //echo "$comment_by and $comment_on and $comment";
$myerrors = array();
if (empty($complain) || !preg_match("/[a-zA-Z]$/", $complain))
	$myerrors [] = "please fill the box with only alphabets";

if (count($myerrors) >0){
	foreach($myerrors as $x)
        	echo "<p style = 'color:red;'>$x </p>";
    }else{
		if(mysql_query("INSERT INTO complain (complain_id, complain_on, u_id, hall_id, complain, join_date) VALUES (null,'$complain_on','$u_id', '$hall', '$complain', now())")or die(mysql_error())) 
		         echo "<p style = 'color: green;'>complain successfully lodged</p>";
			mysql_close();
    }
?>