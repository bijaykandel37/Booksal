<?php
    include('header.php');
include 'db.php';
$userid=$_SESSION['user_id'];
            $sql = " SELECT * FROM user_info WHERE user_id = $userid";
            if (!$con) {
                die("Connection failed: " . mysqli_connect_error());
            }
            $result = mysqli_query($con, $sql);
            if (mysqli_num_rows($result) > 0)
            {
                $row = mysqli_fetch_assoc($result);   
            }
?>

 <div class="container" style="background: url(admin/assets/img/sidebar-3.jpg) no-repeat center center fixed;">    
                  <div class="row" >
                      <div class="panel panel-default">
                      <div class="panel-heading">  <h4 >User Profile</h4></div>
                       <div class="panel-body">
                      <div class="col-md-4 col-xs-12 col-sm-6 col-lg-4">
                       <img alt="User Pic" src="img/nobody.jpg" id="profile-image1" class="img-circle img-responsive"> 
                     </div>
                      <div class="col-md-8 col-xs-12 col-sm-6 col-lg-8" >
                          <div class="container" style="width:500px;" >
                            <h2><?php echo $row['first_name']; echo "&emsp;";
                                echo $row['last_name']; ?></h2>
                            <p>a<b> Futsal lover</b></p>
                          
                           
                          </div>
                           <hr>
                          <ul class="container details" style="width:500px;">
                            <li><p><span class="glyphicon glyphicon-user one" style="width:50px;"></span><?php echo $row['mobile'];?></p></li>
                            <li><p><span class="glyphicon glyphicon-envelope one" style="width:50px;"></span><?php echo $row['email'];?></p></li>
                          </ul>
                          <hr>
                          <div class="col-sm-5 col-xs-6 tital " >ADDRESS: <?php echo $row['city'];?> ,<?php echo $row['town'];?> </div>
                      <br><br><hr></div>
                           <div class="col-lg-8">
                              <h5>Total Bookings::</h5>
                               <?php
                               include 'db.php';
                               $sql = " SELECT * FROM reservations WHERE reservation_user_id = $userid";
                        if (!$con) {
                            die("Connection failed: " . mysqli_connect_error());
                                }
                            $result = mysqli_query($con, $sql);
                            $count= mysqli_num_rows($result);
                               echo'<a href="#top"> '.$count.' </a>';
                               
                               ?></div> </div>
                     
                          <?php
if(!isset($_SESSION['user_id'])){
    header('location: index.php');
}
include("db.php");
error_reporting(0);
if(isset($_GET['action']) && $_GET['action']!="" && $_GET['action']=='delete')
{
$deleteid=$_GET['reservation_id'];
mysqli_query($con,"delete from reservations where reservation_id ='$deleteid'")or die("delete query is incorrect...");
} 
?>
                          
                 <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">Bookings  / Page </h4>
              </div>
              <div class="card-body">
                <div class="table-responsive ps">
                  <table class="table table-hover tablesorter " id="">
                    <thead class=" text-primary"><a name="top"></a>
                        <tr><th>Customer Name</th><th>Booked Futsal</th><th>Day</th><th>Time</th><th>Action</th>
                    </tr></thead>
                    <tbody>
                      <?php 
                        $result=mysqli_query($con,"select reservation_id, futsal_name, first_name, mobile, email, city,reservation_day ,reservation_time from reservations,futsals,user_info where reservations.futsal_id=futsals.futsal_id and user_info.user_id=reservations.reservation_user_id and reservation_user_id='$userid'")or die ("query 1 incorrect.....");

                        while(list($reservation_id,$p_names,$cus_name,$contact_no,$email,$address,$date,$time)=mysqli_fetch_array($result))
                        {	
                        echo "<tr><td>$cus_name</td><td>$p_names</td>><td>$date</td><td>$time</td>

                        <td>
                        <a class=' btn btn-danger' href='userprofile.php?reservation_id=$reservation_id&action=delete'>Delete</a>
                        </td></tr>"; 
                        }
                        ?>
                    </tbody>
                  </table>
                  
                  </div>
              </div>
            </div>  
                          
            </div>
     </div>
</div>





<?php include('footer.php');

?>