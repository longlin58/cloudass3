<?php 

include 'header.php';

if(isset($_SESSION['user'])){

include "config.php";

// if the form's submit button is clicked, we need to process the form
	if (isset($_POST['submit'])) {
		// get variables from the form
		$event_name = $_POST['event_name'];
		$date = $_POST['date'];
		$description = $_POST['description'];
        $id = $_SESSION['user']['userid'];
		//write sql query

		$sql = "INSERT INTO `event`(`event_name`, `date`, `description`, `archive`, `creator_id`) VALUES ('$event_name','$date','$description', '0', '$id')";

		$result = $conn->query($sql);

		if ($result == TRUE) {
			echo "New event created successfully.";
		}else{
			echo "Error:". $sql . "<br>". $conn->error;
		}

		$conn->close();

	}


?>


<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-lg-6">
<h2>ADD EVENT</h2>
<form action="" method="POST">
    <table class="table">
        <tr>
            <th>Event Name</th><td>   <input type="text" class="form-control" name="event_name" placeholder="Event"></td>
        </tr>
        <tr>
            <th>Date</th><td><input type="date" class="form-control" name="date"></td>
        </tr>
        <tr>
            <th>Discription</th><td><textarea rows="4" class="form-control" name="description" placeholder="Discription"></textarea></td>
        </tr>
        <tr>
            <td colspan="3">
                <input type="submit" class="btn btn-primary w-100" name="submit" value="submit" style="width: 100%;">
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
header('location:login.php');
    exit();
}