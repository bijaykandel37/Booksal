<?php
session_start();
$id=$_SESSION['user_id'];
include 'db.php';
if(!isset($_SESSION['user_id']))
{
    echo 'please login first';
header('location:index.php');
}

if(isset($_POST['submit'])){
  $err=[];
  
  if(isset($_POST['dt'])&& !empty($_POST['dt']))
    {
      $dt=$_POST['dt'];
      $datent=strtotime($dt);
      $datenow=strtotime("-1day");
      if($datent<=$datenow)
      {
        $err['dt']='Invalid date format';
      }

    }
    else
    {
      $err['dt']='Enter the date';
    }
    if(isset($_POST['tm'])&& !empty($_POST['tm'])&& trim($_POST['tm']) !='')
    {
      $tm=$_POST['tm'];
    }
    else
    {
      $err['tm']='choose time';
    }
  if(count($err)==0)
{
      include ('db.php');
      $futsalid=$_GET['p'];
      $tm=$_POST['tm'];
      $dt=$_POST['dt'];
      
      $product_query = "SELECT * FROM booking_info where futsal_id = $futsalid and time= '$tm' and date = '$dt'";
                $run_query = mysqli_query($con,$product_query);
                if(mysqli_num_rows($run_query) > 0){

                    echo ('cannot book since booking is already done for this timeslot');}
      
      else{
  $sql="insert into booking_info (futsal_id, user_id, time, date) values('$futsalid','$id','$tm','$dt')";
      
      
      

  if(!mysqli_query($con,$sql))
  {

    $err['dt']="Time is already booked";
  }
  else if(mysqli_error($con))
  {
    echo mysqli_error($con);
  }
  else
  {
$_SESSION['dt']=$dt;
$_SESSION['tm']=$tm;
      echo 'booking success';
      header ('futsals.php');
  }
}
}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>BOOKSAL NEPAL</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/home.css">
<link rel="stylesheet" type="text/css" href="css/customerpage.css">
</head>
<body>
    <?php
    include ('header.php');
    
    ?>
    <br>
    <div class='container-fluid'>

  <div class="row">
  <div class="col-lg-10">
      <div class="col-lg-12">
        <?php
                    $futsalid=$_GET['p'];
					$product_query = "SELECT * FROM futsals where futsal_id = $futsalid";
                $run_query = mysqli_query($con,$product_query);
                if(mysqli_num_rows($run_query) > 0){

                    while($row = mysqli_fetch_array($run_query)){
                        $pro_id    = $row['futsal_id'];
                        $pro_title = $row['futsal_name'];
                        $pro_price = $row['futsal_rate'];
                        $pro_image = $row['futsal_image'];
                        $address = $row['futsal_address'];

                        echo " <div class='col-md-4 col-xs-5'>
                                <div class='product'>
									<a href='futsal.php?p=$pro_id'>
                                    <div class='product-img'>
										<img src='futsal_images/$pro_image' style='max-height: 170px;' alt=''>
										</div></a>
									<div class='product-body'>
										<h4 class='product-name header-cart-item-name'><a href='futsal.php?p=$pro_id'>$pro_title</a></h4>
										<p class='product-category'>$address</p>
										<h4 class='product-price header-cart-item-info'>$pro_price</h4><h6>per hour</h6>
									</div>
								</div>
								</div> ";		};
      } ?>
      
<div class="col-lg-4" style="float: right;">
  	<h4>Book Here</h4>
  	<form action="" method="POST" name="form" > 
  	<label>Date</label>
  	<input type="date" name="dt" valid>
    <select for='time' name='tm'>
      <OPTION value="">Select time</OPTION>
      <option value='8:00-9:00 AM'>8:00-9:00 AM</option>
      <option value="9:00-10:00 AM">9:00-10:00 AM</option>
      <option value="10:00-11:00 AM">10:00-11:00 AM</option>
      <option value="11:00-12:00 AM">11:00-12:00 AM</option>
      <option value="12:00-1:00 PM">12:00-1:00 PM</option>
      <option value="1:00-2:00 PM">1:00-2:00 PM</option>
      <option value="3:00-4:00 PM">3:00-4:00 PM</option>
      <option value="4:00-5:00 PM">4:00-5:00 PM</option>
      <option value="5:00-6:00 PM">5:00-6:00 PM</option>
      <option value="6:00-7:00 PM">6:00-7:00 PM</option>
      <option value="7:00-8:00 PM">7:00-8:00 PM</option>
      <option value="8:00-9:00 PM">8:00-9:00 PM</option>

    </select>
        <?php if(isset($err['tm']))
  {
    echo $err['tm'];
  }
  ?><br>
    <?php if(isset($err['dt']))
  {
    echo $err['dt'].'<br>';
  }
  ?>
  
  	<input type="submit" name="submit" value="submit">
  </form>
  </div>
      </div>
      
      </div>

  
</div>
</div>
     <?php
    include ('footer.php');
    
    ?>
</body>
</html>

