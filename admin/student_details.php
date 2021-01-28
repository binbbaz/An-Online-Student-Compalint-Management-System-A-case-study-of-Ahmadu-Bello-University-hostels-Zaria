<style type="text/css">
	table{
		font-size: 30px;
		width: 100%;

	}
</style>

<center><table>	
	<?php

		$conn = mysql_connect("localhost", "root", "");
		$db = mysql_select_db("project", $conn) or die (mysql_error());
		require_once("startsession.php");
		$user_id = $_SESSION['user_id'];
		$sql = "SELECT username, password, matric_no, surname, firstname, lastname, block, room_num, faculty, department, hall,fac_name, department_name FROM user u,faculty f, department d where u.user_id = '$user_id' and f.fac_id = u.faculty and d.department_id = u.department";
		$result = mysql_query($sql) or die (mysql_error());

		while ($row = mysql_fetch_array($result)){
				//echo "<td style = 'color: green; font-family: Verdana; size: 50px; font-weight: bold'>" . $row['username']. "</td>" ;
				$_SESSION['password'] =  $row['password'];
				$_SESSION['matric_no'] = $row['matric_no'];
				$_SESSION['surname'] = $row['surname'];
				$_SESSION['firstname'] = $row['firstname'];
				$_SESSION['lastname'] =$row['lastname'];
				$_SESSION['block'] = $row['block'];
				$_SESSION['room_num'] =$row['room_num'];
				$_SESSION['faculty'] =$row['fac_name'];	
				$_SESSION['department'] = $row['department_name'];
				//$_SESSION['hall'] = $row['hall'];

		}
			echo "<tr>";
				echo "<td> Name </td>";
				echo "<td>". $_SESSION['surname']. "  ".$_SESSION['firstname']. "  ". $_SESSION['lastname']. "</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td> Registration number </td>";
				echo "<td>".$_SESSION['matric_no'] . "</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td> Password </td>";
				echo "<td>".$_SESSION['password'] . "</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td> Block </td>";
				echo "<td>".$_SESSION['block'] . "</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td> Room number </td>";
				echo "<td>".$_SESSION['room_num'] . "</td>";
			echo "</tr>";	
			echo "<tr>";
				echo "<td> Faculty </td>";
				echo "<td>".$_SESSION['faculty'] . "</td>";	
			echo "</tr>";
			echo "<tr>";
				echo "<td> Department </td>";
				echo "<td>".$_SESSION['department'] . "</td>";	
			echo "</tr>";
	?>
</table></center>

