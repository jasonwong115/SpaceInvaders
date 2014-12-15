<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<table border="1" style="width:50%">
	  <tr>
	  	<th>Rank</th>
	    <th>Username</th>
	    <th>Score</th>
	  </tr>
	   <?php 
	   	require("processing.php");
	   	$db = new DB();
		$result = $db->selectAllScores();
		//$numrows = $result->num_rows;
		if($result){
		//	echo $result;
			$count = 1;
			while($row = mysqli_fetch_array($result)) {
				echo "<tr>";
				echo "<td>". $count ."</td>";
				echo "<td>". $row['username'] ."</td>";
				echo "<td>". $row['score'] ."</td>";
				echo "</tr>";
				$count++;
				if($count == 11) {
					break;
				}
			} 
		}
		?>
	</table>

	<?php 
		if(isset($_SESSION['role']) && $_SESSION['role'] == "ADMIN") {
			echo "<div id=\"AdminDeleteButton\"> 
					<button>DeleteUserScore</button>
					<input placeholder=\"UserID\"></input>
				</div>";
		}	
	?> 
</html>