<?php 

include 'header.php';

if(isset($_SESSION['user'])){



include "config.php";

if (isset($_GET['id'])) {
	$user_id = $_GET['id'];

	// write update query
	$sql = "UPDATE `event` SET `archive`='0' WHERE `id`=$user_id";

	// Execute the query

	$result = $conn->query($sql);

	if ($result == TRUE) {
		header('location:archive.php');
	}else{
		echo "Error:" . $sql . "<br>" . $conn->error;
	}
}
$id = $_SESSION['user']['userid'];

$sql = "SELECT * FROM event where archive = '0' AND creator_id = '$id'";



$result = $conn->query($sql);

?>

	<div class="container mt-3">
		<nav cla5ss="navbar mb-3">
  <form class="form-inline">
    <input class="form-control mr-sm-2" id="myInput" type="search" placeholder="Search" aria-label="Search" style="width: 30%;">
  </form>
</nav>
		<h2 style="text-align: center;">Events</h2>
		<div class="row" id="myUL">
			
		
		<?php
			if ($result->num_rows > 0) {
				//output data of each row
				while ($row = $result->fetch_assoc()) {
		?>
				
<div class="col-sm-4 mt-3" id="myLI">
<div class="card" id="mycard">
  <div class="card-body">
  	<span style="float: right;"><?php echo $row['date']; ?></span>
    <h3 class="card-title"><?php echo $row['event_name']; ?></h3>
    <p class="card-text"><?php echo $row['description']; ?></p>
    <center> 
    <a class="btn btn-info" href="update.php?id=<?php echo $row['id']; ?>">Edit</a>
    <a class="btn btn-danger" href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
    <a class="btn btn-danger" href="archive.php?id=<?php echo $row['id']; ?>">Archive</a>
    <button type="button" class="btn btn-primary share" id="<?php echo $row['id']; ?>" data-toggle="modal" data-target="#myModal">
  Share
</button>
</center>
  </div>
</div>	
</div>
					
		<?php		}
			}
		?>
	    </div>
	</div>

<!-- Button to Open the Modal -->


<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Share To</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" id="close" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
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
$('.share').click(function(){
	var id = $(this).attr('id');
	$('.modal-body').attr('id', id);
	
});

fetchuser();

function fetchuser(){
	
  $.ajax({url: "fetchuser.php", 
  	success: function(result){
    $('.modal-body').html(result);
  }});


}

$(document).on('click', '.touser', function(){
	var touser = $(this).attr('id');
	var postid = $('.modal-body').attr('id');
	var name = $(this).text();

	var formData = {touser:touser,postid:postid};

	$.ajax({
    url : "sharepost.php",
    type: "POST",
    data : formData,
    success: function(data)
    {
        alert(data + name);
        $('#close').click();
    }
    
});


})

});
</script>
</body>
</html>



<?php


}
else{
header('location:login.php');
    exit();
}