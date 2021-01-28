<script language="javascript" type="text/javascript">
var popUpWin=0;
function popUpWindow(URLStr, left, top, width, height){
 if(popUpWin){
	if(!popUpWin.closed) popUpWin.close();
}
popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+600+',height='+600+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
}
</script>

<center><table border="7"  cellspacing="0" cellpadding="10px"  style="border-radius: 5px; border-color: green;">
	<tr>
		<th>sn</th>
		<th>complain</th>
		<th>date lodged</th>
		<th>status</th>
	</tr>
<?php
				$st = 1;				

											session_start();
											include_once("connectvars.php");
											$myuserid = $_GET['id'];
											$_SESSION['uuid'] = $myuserid;
											
												$subsql = "SELECT * FROM complain WHERE user_id = '$myuserid' AND status ='0'";
												$subsql_result = mysql_query($subsql) or die (mysql_error());
												$j = 0;
												while($myrows = mysql_fetch_array($subsql_result)){

													$compid = $myrows['complain_id'];
													$_SESSION['anotherlink'] = $compid;
													//echo $mrows['complain'];
													//echo $mrows['join_date'];
													$j++;
													?>
													<tr>
														<td> $j</td>
														<td><?php echo htmlentities($myrows['complain']);?> </td>
														<!--//echo "<td>". $uname. "</td>";-->
														<td><?php echo htmlentities($myrows['join_date']);?> </td>

														<?php if ($myrows['status'] != 0) {?>
															<td> <span> approved </span> </td>
														<?php }else {?>
														<td><a href="javascript:void(0);" onClick="popUpWindow('http://localhost/project/abass/admin/toggle_status.php?cid=<?php echo htmlentities($_SESSION['anotherlink']);?>&com_made_by=<?php echo htmlentities($myrows['user_id']);?> ');" title="attend to status">attend to</a></td>
														
														<!--<a href ='view_students_complaints.php?id=".$uid ."' >"-->
														<?php } ?>
													</tr>
									<?php } ?>				
</table></center>