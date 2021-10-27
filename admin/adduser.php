 <?php
session_start();
if(!isset($_SESSION['aid'])){
    header('location: adminlogin.php');
}
include("../db.php");
include "sidenav.php";
include "topheader.php";
if(isset($_POST['btn_save']))
{
$first_name=$_POST['first_name'];
$last_name=$_POST['last_name'];
$email=$_POST['email'];
$user_password=$_POST['password'];
$mobile=$_POST['phone'];
$address1=$_POST['city'];
$address2=$_POST['country'];
$name = "/^[a-zA-Z ]+$/";
$emailValidation = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
$number = "/^[0-9]+$/";


if(empty($first_name) || empty($last_name) || empty($email) || empty($user_password) ||	empty($mobile) || empty($address1) || empty($address2))
{
    echo "<div class='alert alert-warning'>
				<a href='adduser.php' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>PLease Fill all fields..!</b>
			</div>";
		exit();
} 
else 
{
    if(!preg_match($name,$first_name)){
		echo "
			<div class='alert alert-warning'>
				<a href='adduser.php' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>this $f_name is not valid..!</b>
			</div>";
		exit();
	}
	if(!preg_match($name,$last_name)){
		echo "<div class='alert alert-warning'>
				<a href='adduser.php' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>this $l_name is not valid..!</b>
			</div>";
		exit();
	}
	if(!preg_match($emailValidation,$email)){
		echo "<div class='alert alert-warning'>
				<a href='adduser.php' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>this $email is not valid..!</b>
			</div>";
		exit();
	}
	if(strlen($user_password) < 9 ){
		echo "<div class='alert alert-warning'>
				<a href='adduser.php' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Password is weak</b>
			</div>";
		exit();
	}
	if(!preg_match($number,$mobile)){
		echo "<div class='alert alert-warning'>
				<a href='adduser.php' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Mobile number $mobile is not valid</b>
			</div>";
		exit();
	}
	if(!(strlen($mobile) == 10)){
		echo "<div class='alert alert-warning'>
				<a href='adduser.php' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Mobile number must be 10 digit</b>
			</div>";
		exit();
	}
	//existing email address in our database
	$sql = "SELECT user_id FROM user_info WHERE email = '$email' LIMIT 1" ;
	$check_query = mysqli_query($con,$sql);
	$count_email = mysqli_num_rows($check_query);
	if($count_email > 0)
    {
		echo "<div class='alert alert-danger'>
				<a href='adduser.php' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Email Address is already available Try Another email address</b>
			</div>";
		exit();
	} 
    else 
    {
		
		$sql = "INSERT INTO `user_info` 
		(`user_id`, `first_name`, `last_name`, `email`,`password`, `mobile`, `city`, `town`) 
		VALUES (NULL, '$first_name', '$last_name', '$email','$user_password', '$mobile', '$address1', '$address2')";
		$run_query = mysqli_query($con,$sql) or die("cannot update information");;
		if(mysqli_query($con,$sql))
        {
			echo "addition of user successful";
			echo "<script> location.href='manageuser.php'; </script>";
            exit;
		}
	}
} 
mysqli_close($con);
}
?>
      <div class="content">
        <div class="container-fluid">
          <!-- your content here -->
          <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Add Users</h4>
                  <p class="card-category">Complete User profile</p>
                </div>
                <div class="card-body">
                  <form action="" method="post" name="form" enctype="multipart/form-data">
                    <div class="row">
                      
                      <div class="col-md-3">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">First Name</label>
                          <input type="text" id="first_name" name="first_name" class="form-control" required>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Last Name</label>
                          <input type="text" name="last_name" id="last_name"  class="form-control" required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Email</label>
                          <input type="email" name="email" id="email" class="form-control" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Password</label>
                          <input type="password" id="password" name="password" class="form-control" required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Phone number</label>
                          <input type="text" id="phone" name="phone" class="form-control" required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">City</label>
                          <input type="text" name="city" id="city"  class="form-control" required>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Town</label>
                          <input type="text" name="country" id="country" class="form-control" required>
                        </div>
                      </div>
                    </div>
                      <button type="submit" name="btn_save" id="btn_save" class="btn btn-primary pull-right">Add User</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
        </div>
      </div>
      <?php
include "footer.php";
?>