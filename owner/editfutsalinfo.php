<?php
session_start();
if(!isset($_SESSION['oid'])){
    header('location: ownerlogin.php');
}
include("../db.php");
$futsal_id=$_SESSION["futid"];

$result=mysqli_query($con,"select futsal_id,futsal_name,futsal_rate, futsal_desc, futsal_keywords from futsals where futsal_id='$futsal_id'")or die ("query 1 incorrect.......");

list($futsal_id,$futsal_name,$futsal_rate, $description, $keywords)=mysqli_fetch_array($result);

if(isset($_POST['btn_save'])) {

$futsal_name=$_POST['futsal_name'];
$futsal_rate=$_POST['futsal_rate'];
$desc=$_POST['desc'];
$keywords=$_POST['keyword'];

mysqli_query($con,"update futsals set futsal_name='$futsal_name', futsal_rate='$futsal_rate' ,futsal_desc='$desc',futsal_keywords='$keywords' where futsal_id='$futsal_id'")or die("Query 2 is inncorrect..........");

header("location: editfutsalinfo.php");
mysqli_close($con);
}
include "sidenav.php";
include "topheader.php";
?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
        <div class="col-md-5 mx-auto">
            <div class="card">
              <div class="card-header card-header-primary">
                <h5 class="title">Edit Profile</h5>
              </div>
              <form action="editfutsalinfo.php" name="form" method="post" enctype="multipart/form-data">
              <div class="card-body">
                
                  <input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id;?>" />
                    <div class="col-md-12 ">
                      <div class="form-group">
                        <label>First name</label>
                        <input type="text" id="first_name" name="futsal_name"  class="form-control" value="<?php echo $futsal_name; ?>" >
                      </div>
                    </div>
                    <div class="col-md-12 ">
                      <div class="form-group">
                        <label>Pricing</label>
                        <input type="number" id="last_name" name="futsal_rate" class="form-control" value="<?php echo $futsal_rate; ?>" >
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Description</label>
                        <input  id="details" required name="desc" class="form-control" value="<?php echo $description; ?>">
                      </div>
                    </div>
                   <div class="col-md-12">
                      <div class="form-group">
                        <label>Futsal Keywords</label>
                        <input type="text" id="tags" name="keyword" required class="form-control" value="<?php echo $keywords; ?>">
                      </div>
                    </div>    
              </div>
              <div class="card-footer">
                <button type="submit" id="btn_save" name="btn_save" class="btn btn-fill btn-primary">Update</button>
              </div>
              </form>    
            </div>
          </div>
         
          
        </div>
      </div>
      <?php
include "footer.php";
?>