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
    $futsalname=$_POST['futsalname'];
    
    $run_query=mysqli_query($con,"select * from futsals where futsal_name='$futsalname' ");
    if(mysqli_num_rows($run_query) > 0)
    {   
        while($row=mysqli_fetch_assoc($run_query))
        {
            $fut_id    = $row['futsal_id'];
        }
    addowner($fut_id);
    }
    else echo 'futsal not found yoo';
    
}
function addowner($fut_id)
{
    include("../db.php");
    $f_name=$_POST['first_name'];
    $l_name=$_POST['last_name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $mobile=$_POST['phone'];
    $address1=$_POST['city'];
    
    $name = "/^[a-zA-Z ]+$/";
	$emailValidation = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
	$number = "/^[0-9]+$/";

if(empty($f_name) || empty($l_name) || empty($email) || empty($password) || empty($mobile) || empty($address1))
{
    echo "
			<div class='alert alert-warning'>
				<a href='addowner.php' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>PLease Fill all fields..!</b>
			</div>";
		exit();
	} 
    else {
		if(!preg_match($name,$f_name)){
		echo "
			<div class='alert alert-warning'>
				<a href='addowner.php' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>this $f_name is not valid..!</b>
			</div>
		";
		exit();
	}
	if(!preg_match($name,$l_name)){
		echo "
			<div class='alert alert-warning'>
				<a href='addowner.php' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>this $l_name is not valid..!</b>
			</div>
		";
		exit();
	}
	if(!preg_match($emailValidation,$email)){
		echo "
			<div class='alert alert-warning'>
				<a href='addowner.php' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>this $email is not valid..!</b>
			</div>
		";
		exit();
	}
	if(strlen($password) < 9 ){
		echo "
			<div class='alert alert-warning'>
				<a href='addowner.php' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Password is weak</b>
			</div>
		";
		exit();
	}
	if(!preg_match($number,$mobile)){
		echo "
			<div class='alert alert-warning'>
				<a href='addowner.php' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Mobile number $mobile is not valid</b>
			</div>
		";
		exit();
	}
	if(!(strlen($mobile) == 10)){
		echo "
			<div class='alert alert-warning'>
				<a href='addowner.php' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Mobile number must be 10 digit</b>
			</div>
		";
		exit();
	}
	//existing email address in our database
	$sql = "SELECT owner_id FROM owner_info WHERE email = '$email' LIMIT 1" ;
	$check_query = mysqli_query($con,$sql);
	$count_email = mysqli_num_rows($check_query);
	if($count_email > 0){
		echo "
			<div class='alert alert-danger'>
				<a href='addowner.php' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Email Address is already available Try Another email address</b>
			</div>
		";
		exit();
    }
    else
    {
    mysqli_query($con,"insert into `owner_info` (`futsal_id`,`fname`,`lname`,`email`,`password`,`contact`,`city`) values ('$fut_id','$f_name','$l_name','$email','$password','$mobile','$address1')") 
			or die ("Query 1 is inncorrect........");
        $uid= mysqli_insert_id($con);
        $sql1="INSERT INTO reservations_users (user_id, user_is_admin, user_email, user_name) VALUES('$uid','1','$email','$f_name')";
        $run_query = mysqli_query($con,$sql1);
    /*header("location: manageowner.php");*/ 
    mysqli_close($con);
    }
}}
?>
      <div class="content">
        <div class="container-fluid">
          <!-- your content here -->
          <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Add Owner</h4>
                  <p class="card-category">Complete Owner profile</p>
                </div>
                <div class="card-body">
                  <form action="addowner.php" method="post" name="form" enctype="multipart/form-data">
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
                          <label class="bmd-label-floating">phone number</label>
                          <input type="text" id="phone" name="phone" class="form-control" required>
                        </div>
                      </div>
                    </div>
                      <div class="row">
                      <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Futsal Name</label>
                          <input type="text" name="futsalname" class="form-control" required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">City</label>
                          <input type="text" name="city" id="city"  class="form-control" required>
                        </div>
                      </div>
                    </div>
                      <button type="submit" name="btn_save" id="btn_save" class="btn btn-primary pull-right">Add Owner</button>
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