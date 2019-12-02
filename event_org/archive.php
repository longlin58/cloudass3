<?php 
include "config.php";

include 'header.php';

if(isset($_SESSION['user'])){


// if the 'id' variable is set in the URL, we know that we need to edit a record
if (isset($_GET['id'])) {
	$user_id = $_GET['id'];

	

	// write update query
	$sql = "UPDATE `event` SET `archive`='1' WHERE `id`=$user_id";

	// Execute the query

	$result = $conn->query($sql);

	if ($result == TRUE) {
		header('location:index.php');
	}else{
		echo "Error:" . $sql . "<br>" . $conn->error;
	}
}
//write the query to get data from users table
$id = $_SESSION['user']['userid'];
$sql = "SELECT * FROM event where archive = '1' AND creator_id = '$id'";


$result = $conn->query($sql);

?>

	<div class="container">
		<h2>Archive Events</h2>
		<div class="table-responsive">
<table class="table responsive">
	<thead>
		<tr>
		<th>ID</th>
		<th>Event</th>
		<th>Date</th>
		<th>Description</th>
		<th>Action</th>
	</tr>
	</thead>
	<tbody>	
		<?php
			if ($result->num_rows > 0) {
				//output data of each row
				while ($row = $result->fetch_assoc()) {
		?>

					<tr>
					<td><?php echo $row['id']; ?></td>
					<td><?php echo $row['event_name']; ?></td>
					<td><?php echo $row['date']; ?></td>
					<td style="max-width: 200px;"><?php echo $row['description']; ?></td>
					<td><a class="btn btn-info" href="update.php?id=<?php echo $row['id']; ?>">Edit</a>&nbsp;<a class="btn btn-danger" href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>&nbsp;<a class="btn btn-danger" href="index.php?id=<?php echo $row['id']; ?>">Undo</a></td>
					</tr>	
					
		<?php		}
			}
		?>
	        	
	</tbody>
</table>
	</div>
</div>

</body>
</html>


<?php


}
else{
header('location:login.php');
    exit();
}