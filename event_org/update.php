<?php 

include "config.php";

// if the form's update button is clicked, we need to process the form
	if (isset($_POST['update'])) {
		$user_id = $_POST['user_id'];
		$event_name = $_POST['event_name'];
		$date = $_POST['date'];
		$description = $_POST['description'];

		// write the update query
		$sql = "UPDATE `event` SET `event_name`='$event_name',`date`='$date',`description`='$description' WHERE `id`='$user_id'";
		$result = $conn->query($sql);

		if ($result == TRUE) {
			header('location:index.php');
		}else{
			echo "Error:" . $sql . "<br>" . $conn->error;
		}
	}


// if the 'id' variable is set in the URL, we know that we need to edit a record
if (isset($_GET['id'])) {
	$user_id = $_GET['id'];

	// write SQL to get user data
	$sql = "SELECT * FROM `event` WHERE `id`='$user_id'";

	//Execute the sql
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		
		while ($row = $result->fetch_assoc()) {
			$event_name = $row['event_name'];
			$date = $row['date'];
			$description = $row['description'];
			$id = $row['id'];
		}
include 'header.php';
	?>
		<div class="container">
			<div class="row justify-content-md-center">
			<div class="col-lg-6">
				
			
		<h2>Update Event</h2>
		<form action="" method="post">
			<table class="table">
        <tr>
            <th>Event Name</th><td>   <input type="text" class="form-control" name="event_name" placeholder="Event" value="<?php echo $event_name; ?>"></td>
        </tr>
        <input type="hidden" name="user_id" value="<?php echo $id; ?>">
        <tr>
            <th>Date</th><td><input type="date" class="form-control" name="date" value="<?php echo $date; ?>"></td>
        </tr>
        <tr>
            <th>Discription</th><td><textarea rows="4" class="form-control" name="description" placeholder="Discription"><?php echo $description; ?></textarea></td>
        </tr>
        <tr>
            <td colspan="3">
                <input type="submit" class="btn btn-primary w-100" name="update" value="Update" style="width: 100%;">
            </td>
        </tr>
    </table>
		</form>
</div>
		</div>
		</div>

		</body>
		</html>




	<?php
	} 
	else{
		// If the 'id' value is not valid, redirect the user back to view.php page
		header('Location: index.php');
	}

}
?>