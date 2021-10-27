<?php
session_start();
$futid = $_SESSION['ownerfutsalid'];
if(!isset($_SESSION['oid'])){
    header('location: ownerlogin.php');
}

include("../db.php");

error_reporting(0);
if(isset($_GET['action']) && $_GET['action']!="" && $_GET['action']=='delete')
{
$deleteid=$_GET['reservation_id'];

/*this is delet query*/
mysqli_query($con,"delete from reservations where reservation_id ='$deleteid'")or die("delete query is incorrect...");
} 

///pagination
$page=$_GET['page'];

if($page=="" || $page=="1")
{
$page1=0;	
}
else
{
$page1=($page*10)-10;	
}
include "sidenav.php";
include "topheader.php";
?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <!-- your content here -->
          <div class="col-md-14">
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">Bookings  / Page <?php echo $page;?> </h4>
              </div>
              <div class="card-body">
                <div class="table-responsive ps">
                  <table class="table table-hover tablesorter " id="">
                    <thead class=" text-primary">
                        <tr><th>Customer Name</th><th>Booked Futsal</th><th>Contact </th><th> Email</th><th>Address</th><th>Day</th><th>Time</th><th>Action</th>
                    </tr></thead>
                    <tbody>
                      <?php 
                        $result=mysqli_query($con, "select reservation_id, futsal_name, first_name, mobile, email, city, reservation_day ,reservation_time FROM reservations, futsals, user_info WHERE reservations.futsal_id = '$futid' and futsals.futsal_id='$futid' and user_info.user_id=reservations.reservation_user_id Limit $page1,10")or die ("query 1 incorrect.....");

                        while(list($reservation_id,$p_names,$cus_name,$contact_no,$email,$address,$date,$time)=mysqli_fetch_array($result))
                        {	
                        echo "<tr><td>$cus_name</td><td>$p_names</td><td>$contact_no</td><td>$email</td><td>$address </td><td>$date</td><td>$time</td>

                        <td>
                        <a class=' btn btn-danger' href='bookings.php?reservation_id=$reservation_id&action=delete'>Delete</a>
                        </td></tr>"; 
                        }
                        ?>
                    </tbody>
                  </table>
                  
                <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
              </div>
            </div>
          </div>
          
        </div>
      </div>
      <?php
include "footer.php";
?>