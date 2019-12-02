<?php

include 'config.php';

session_start();

$id = $_SESSION['user']['userid'];

$sql = "SELECT * FROM signin where id != '$id'";
$result = $conn->query($sql);
$output = '<div class="container"><div class="row">';
if ($result->num_rows > 0) {
				//output data of each row
				while ($row = $result->fetch_assoc()) {
					$output .="<div class='col-lg-4'><button id='".$row['id']."' class='btn btn-primary touser' style='width:100%'>".ucfirst($row['name'].' '.$row['lname'])."</button></div>";
					}

					$output .= '</div></div>';

				}


				echo $output;





?>