<?php

include 'header.php';


if(isset($_SESSION['user'])){


include 'config.php';

$id = $_SESSION['user']['userid'];

//

$sql = "select s.name , s.lname , e.event_name, e.description, e.date from event e, signin s, share_event c where e.id = c.event_id and s.id = c.share_mamber and c.to_share='$id'";

$result = $conn->query($sql);

?>

	<div class="container mt-3">
		<nav cla5ss="navbar mb-3">
  <form class="form-inline">
    <input class="form-control mr-sm-2" id="myInput" type="search" placeholder="Search" aria-label="Search" style="width: 30%;">
  </form>
</nav>
		<h2 style="text-align: center;">New Feeds</h2>
		<div class="row" id="myUL">
			
		
		<?php
			if ($result->num_rows > 0) {
				//output data of each row
				while ($row = $result->fetch_assoc()) {
					if($row['event_name'] != ''){
		?>
				
<div class="col-sm-4 mt-3" id="myLI">
<div class="card" id="mycard">
  <div class="card-body">
  	<div><h4><?php echo ucfirst($row['name'].' '.$row['lname']); ?></h4></div>
  	<span style="float: right;"><?php echo $row['date']; ?></span>
    <h3 class="card-title"><?php echo $row['event_name']; ?></h3>
    <p class="card-text"><?php echo $row['description']; ?></p>
  </div>
</div>	
</div>
					
		<?php		
		}
	}
			}
			else{
				?>
				<h2 style="text-align: center;margin-top: 50px;">Oops! New Feeds Empty Right Now.</h2>
				<?php
			}
		?>
	    </div>
	</div>


<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myUL .col-sm-4").filter(function(){
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });

});
</script>


<?php


}
else{
header('location:login.php');
    exit();
}
?>