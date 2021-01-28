<?php  
  include "connectvars.php";

  if(isset($_POST['update'])){
    if(isset($_POST['status']))
      $state = $_POST['status'];
    if(isset($_POST['remark']))
      $remark = $_POST['remark'];
    if (isset($_GET['cid']))
      $cid = $_GET['cid'];

      //echo "<script>alert('Complaint details updated successfully');</script>";
  }
?>
<script language="javascript" type="text/javascript">
function closing(){
window.close();
}

</script>
<head>
<script src="printThis.js"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/main.js"></script>

<script src="js/printThis.js"></script>
        <script>
    function printPlease()
    {
      $("#printblock").printThis({});
    }
</script>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>complaint details</title>

</head>
<body>
<center><h1>COMPLAINT DETAILS</h1></center>

	<input type="text" name="com_id" hidden="hidden" value="<?php if (isset($_GET['cid'])) echo htmlentities($_GET['cid']); ?>"> </input>
	 
  <div style="margin-left: 300px; margin-bottom: -50px"><table width="600px"> <tr><td><button onClick="printPlease()" >print</button></td><td><input type="submit" name="sub" value="done" onClick="return closing();"> </td></tr></table></div>

<div style="margin-left:50px;" id="printblock">
 <form method="post" action="done.php"> 

<center><table width="50%" border="1" cellspacing="0" cellpadding="0" style="margin-top: 50px;">
    <tr>
      <td style="font-size: 20px; text-align: center;" colspan="2">complaint details</td>
    </tr>
    <tr height="50">
      <td style="font-size: 20px;"><b>Complaint id</b></td>
      <td style="font-size: 20px;"><?php if (isset($_GET['cid'])) echo htmlentities(md5($_GET['cid'])); ?> </td>
    </tr>
    <tr height="50">
      <td style="font-size: 20px;"><b>Complaint By</b></td>
      <td style="font-size: 20px;"><?php 
           
      if (isset($_GET['com_made_by'])) 
          $comment_made_by = $_GET['com_made_by']; 
          $sql = "SELECT  surname, firstname, lastname, block, room_num, hall_name FROM user u, hall h WHERE user_id = '$comment_made_by' AND hall=id";
          $result = mysql_query($sql) or die(mysql_error());
          if($row = mysql_fetch_array($result)){
            echo $row['surname'] . "  " . $row['firstname']. "   " . $row['lastname'] ;   
            }
          ?> </td>
    </tr>
     <tr height="50">
      <td style="font-size: 20px;"><b>Block</b></td>
      <td style="font-size: 20px;"><?php 
            echo $row['block'];
          ?> </td>
    </tr>
        <tr height="50">
      <td style="font-size: 20px;" ><b>Room Number</b></td>
      <td style="font-size: 20px;"><?php 
            echo $row['room_num'];
          ?> </td>
    </tr>

       <tr height="30">
      <td style="font-size: 20px;"><b>Complain</b></td>
      <td style="font-size: 20px;"> <?php
      $cid = $_GET['cid'];
      $sql = "SELECT complain FROM complain WHERE complain_id = '$cid'";
      $result = mysql_query($sql);
      if($row = mysql_fetch_array($result))
        echo $row['complain'];

      ?></td>
    </tr>
       <tr><td colspan="2">&nbsp;</td></tr>

       </tr>

       <tr height="30">
      <td style="font-size: 20px;"><b>Remark</b></td>
      <td style="font-size: 20px;"> <?php
      $cid = $_GET['cid'];
      $sql = "SELECT remark FROM remark WHERE complain_id = '$cid'";
      $result = mysql_query($sql) or die (mysql_error());
      if($row = mysql_fetch_array($result)){
        if($row['remark'] == "")
        echo "no remark";
    	else
    		echo $row['remark'];
    }
      ?></td>
    </tr>

</table></center>
 </form>
 
</div>

</body>
</html>