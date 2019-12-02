<?php 


 session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</head>
<body>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">LOGO</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <?php if(isset($_SESSION['user'])){
      ?>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
       <li class="nav-item active">
        <a class="nav-link" href="index.php">Home</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="newfeeds.php">New Feeds</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="create.php">Add Event</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="archive.php">Archive</a>
      </li>
    </ul>

    <span class="navbar-text">
      <b><?php echo ucfirst($_SESSION['user']['username']); ?></b>
      <a href="signout.php" class="btn btn-light">Sign Out</a>
    </span>
    <?php } ?>
  </div>
</nav>

