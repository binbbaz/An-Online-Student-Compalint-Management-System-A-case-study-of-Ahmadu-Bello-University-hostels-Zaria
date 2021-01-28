<?php  
  include "connectvars.php";

  if(isset($_POST['update'])){
    if(isset($_POST['status']))
      $state = $_POST['status'];
    if(isset($_POST['remark']))
      $remark = $_POST['remark'];
    if (isset($_GET['cid']))
      $cid = $_GET['cid'];


      $sql1 = "UPDATE complain SET status = '$state' WHERE complain_id = '$cid'";
      $result1 = mysql_query($sql1);
      $sql2 = "INSERT INTO remark VALUES (null, '$remark', '$cid')";
      $result12 = mysql_query($sql2);

      echo "<script>alert('Complaint details updated successfully');</script>";
  }
?>
<script language="javascript" type="text/javascript">
function closing(){
window.close();
}

function f3(){
window.print(); 
}
</script>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>User Profile</title>

</head>
<body>

<div style="margin-left:50px;">
 <form name="updateticket" id="updatecomplaint" method="post"> 
<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td  >&nbsp;</td>
      <td >&nbsp;</td>
    </tr>
    <tr height="50">
      <td><b>Complaint Number</b></td>
      <td><?php if (isset($_GET['cid'])) echo htmlentities($_GET['cid']); ?> </td>
    </tr>
    <tr height="50">
      <td><b>Complaint By</b></td>
      <td><?php 
           
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
      <td><b>Block</b></td>
      <td><?php 
            echo $row['block'];
          ?> </td>
    </tr>
        <tr height="50">
      <td><b>Room Number</b></td>
      <td><?php 
            echo $row['room_num'];
          ?> </td>
    </tr>
  
       <tr height="30">
      <td><b>Complain</b></td>
      <td><textarea name="remark" cols="50" rows="7"  readonly="readonly"> <?php
      $cid = $_GET['cid'];
      $sql = "SELECT complain FROM complain WHERE complain_id = '$cid'";
      $result = mysql_query($sql);
      if($row = mysql_fetch_array($result))
        echo $row['complain'];

      ?></textarea></td>
    </tr>

      <tr height="20">
      <td><b>Remark</b></td>
      <td><textarea name="remark" cols="50" rows="7"></textarea></td>
    </tr>
    <tr height="50">
      <td><b>Status</b></td>
      <td><select name="status" required="required">
      <option value="">Select Status</option>
      <option value="0">Pending</option>
    <option value="1">approve</option>
    <option value="2">under process</option>
        
      </select></td>
    </tr>

    


        <tr height="50">
      <td>&nbsp;</td>
      <td><input type="submit" name="update" value="Submit"> &nbsp; <input type="submit" name="sub" value="close me" onClick="return closing();"></td>
    </tr>



       <tr><td colspan="2">&nbsp;</td></tr>
    
    <tr>
  <td></td>
      <td >   </td>
    </tr>
</table>
 </form>
 
</div>
</body>
</html>