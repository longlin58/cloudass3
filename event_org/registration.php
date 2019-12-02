<?php include 'header.php';

include 'config.php';


if(isset($_POST['submit'])){

$name = $_POST['name'];
$lname = $_POST['lname'];

$email = $_POST['email'];

$pass = $_POST['password'];


$sql = " select * from signin  where email = '$email' ";


$result = $conn->query($sql);


if($result->num_rows== 1){
  header("Location:registration.php?msg=Account already exist in the database");
}
else{

  $sql= " insert  into signin(name , lname, email, pass) values ('$name' , '$lname' , '$email', '$pass') ";
  
$result = $conn->query($sql);
header("Location:login.php?msg=Account has been created! you can login");
}

} 

?>
<div class="container mt-5">
  <div class="row justify-content-md-center">
  <div class="col-lg-6"> 
<form method="post" action="<?=$_SERVER['PHP_SELF'];?>">
  <div class="form-group row">
    <label for="inputusername" class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="name" id="inputusername" placeholder="Name" required>
    </div>
  </div>
  <div class="form-group row">
    <label for="inputusername" class="col-sm-2 col-form-label">Last Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="lname" id="inputusername" placeholder="Last Name" required>
    </div>
  </div>
  <div class="form-group row">
    <label for="inputemail" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" name="email" id="inputemail" placeholder="Email" required>
    </div>
  </div>

  <div class="form-group row">
    <label for="inputpassword" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" name="password" id="inputpassword" placeholder="Password" required>
    </div>

    <button class="btn btn-primary w-100 mt-3" type="submit" name="submit">Submit</button>
    <a href="login.php" class="btn btn-info w-100 mt-3">Already created</a>
  </div>
  <?php if(isset($_GET['msg'])){ ?>
  <div class="alert alert-danger"><?php echo $_GET['msg'] ?></div>
<?php } ?>
</form>
</div></div></div>
