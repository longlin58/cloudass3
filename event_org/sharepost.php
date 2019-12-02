<?php
include 'config.php';

session_start();

$id = $_SESSION['user']['userid'];

$event_id = $_POST['postid'];
$touser = $_POST['touser'];

$sql = "INSERT INTO `share_event`(`share_mamber`, `event_id`, `to_share`) VALUES ('$id','$event_id','$touser')";

$result = $conn->query($sql);

	if ($result == TRUE) {
		echo "Event has been shared to ";
	}else{
		echo "Error:" . $sql . "<br>" . $conn->error;
	}





?>