<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Comment Box</title>
<style>

input[type=text], select {
    width: 100%;
	border-radius: 5px;
	margin: 7px 0;
	border: 1px solid #ccc;
    padding: 14px 18px; 
    display: inline-block;
    box-sizing: border-box;
}

button:hover {
    background-color: #00a7d1;
}

textarea, select {
   width: 100%;
	border-radius: 5px;
	margin: 7px 0;
	border: 1px solid #ccc;
    padding: 14px 18px; 
    display: inline-block;
    box-sizing: border-box;
}

input[type=submit], button {
    width: 100%;
	border: none;
	color: white;
	padding: 14px 20px;
    background-color: #01c9fb;
    margin: 8px 0;
	cursor: pointer;
    border-radius: 4px;
    
}

</style>
<script> 

</script>
</head>
<body><br/><br/><br/>

<form action="insert_comment.php" method="POST" id="myForm">
	<table bgcolor="#f2f2f2" style="padding:50px" align="center">
	<tr>
		<td> </td><td><textarea name="complain" id="complain" maxlength="200" rows="6" cols="50" placeholder="your complain goes here"></textarea></td>
	</tr>

	<tr>
		<td></td>
		<td><button id="submit" name="submit">lodge complain</button></td>
	</tr>
	<tr>
		<td><input type="hidden" name="complain_on" size=40 readonly="readonly" value="<?php print md5(
		$_SERVER['PHP_SELF']); ?>" /></td>
	</tr>
	<center><span id="result"></span></center>
</table>
	
</form>
	
<?php
 session_start();
$pagename = md5($_SERVER['PHP_SELF']);
$_SESSION['pname'] = $pagename;
?>

</body>
<script src="jquery.js"></script>
<!--<script>
	$(document).ready(function(){
		$('#submit').click(function(){
			var comment = $('#complain').val();
			if(comment == ""){
				alert("this can not be left empty");
				event.preventDefault();
			}
			
			
		});
	});
</script>-->
<script>
	$("#submit").click( function() {
 $.post( $("#myForm").attr("action"),
         $("#myForm :input").serializeArray(),
         function(info){ 
         	$("#result").html(info);
   });
clearInput();
});
 
$("#myForm").submit( function() {
  return false;
});
function clearInput() {
    $("#complain").each( function() {
       $(this).val('');
    });
}

	
</script>
</html>