<!DOCTYPE html>
<html>
<head>
	<title>complaints under process</title>
	<script src="jquery.js"></script>
		<script src="jquery-1.10.2.min.js"></script>
        <script src="underscore-1.5.2.min.js"></script>
        <script src="jquery.scrollTableBody-1.0.0.js"></script>
</head>
<body>
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
											$sql = "SELECT user_id, surname, firstname, lastname, join_date,complain_id FROM user AS a, complain AS b WHERE a.user_id = b.u_id AND a.hall = '$residence' AND b.status = '2'";
											$result = mysql_query($sql) or die(mysql_error());
											$j = 0;
											while ($row = mysql_fetch_array($result)){
												$j++;
												$uid = $row['user_id'];
												echo "<tr>";
												echo "<td  class = 'text-right'>$j</td>";
												 ?>
													
														
														<td><?php echo htmlentities($row['surname'] . "" .$row['firstname'] . " ".$row['lastname']);?> </td>
														<td> <?php echo htmlentities($row['join_date']);?></td>
														<td>under process</td>
														<td><a href="javascript:void(0);" onClick="popUpWindow('http://localhost/project/abass/admin/toggle_status.php?cid=<?php echo htmlentities($row['complain_id']);?>&com_made_by=<?php echo htmlentities($row['user_id']);?> ');" title="attend to status">view details</a></td>

													</tr>
												<?php } ?>
										?>
										</tbody>
										 <tfoot>
                    						<tr>
                       						 <td style="font-size: 30px;" colspan="4" class="text-center"><strong> COMPLAINTS UNDER PROCESS IN YOUR HALL IS
                       						 <?php 
                       						 $sql = "SELECT COUNT(*) as total FROM complain WHERE status = '2' AND hall_id = $residence";
                       						 $result = mysql_query($sql);
                       						 if ($row = mysql_fetch_array($result))
                       						 	echo $row['total'];
                       						 	?>
                       						 	
                       						 </strong></td>
                    						</tr>
                						</tfoot>
									</table>
								</center>

</body>
 <script type="text/javascript">
            $(function() {
                $('#mytable').scrollTableBody();
            });
        </script>
</html>
