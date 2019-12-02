<?php 
include 'header.php';
include 'config.php';

if(isset($_POST['submit'])){

$email = $_POST['email'];

$pass = $_POST['password'];


$sql = " select * from signin  where email = '$email' && pass = '$pass' ";

$result = $conn->query($sql);


if($result->num_rows== 1){
  
  $row = $result->fetch_assoc();
  $array = array(
    'userid'=>$row['id'],
    'username'=>$row['name'].' '.$row['lname']
  );

  $_SESSION['user'] = $array;
   
   header('location:index.php');

}

else
{

 header('location:login.php?msg=something is wrong');
}

}



 ?>



<div class="container mt-5">
  <div class="row justify-content-md-center">
    <div class="col-lg-6"> 
      
<form method="post" action="<?=$_SERVER['PHP_SELF'];?>">

  <div class="form-group row">
    <label for="inputemail" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" name="email" id="inputemail" placeholder="Email">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputpassword" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" name="password" id="inputpassword" placeholder="Password">
    </div>
    <button type="submit" name="submit" class="btn btn-primary w-100 mt-3">Log In</button>
    <a href="registration.php" class="btn btn-info w-100 mt-3">SignUp</a>
  </div>
  <?php if(isset($_GET['msg'])){ ?>
  <div class="alert alert-danger"><?php echo $_GET['msg'] ?></div>
<?php } ?>
</form>
</div>
</div>
</div>