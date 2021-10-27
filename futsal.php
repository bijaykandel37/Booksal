<?php
include "header.php";

$_SESSION['futsid']=$_GET['p'];
$futsalid=$_SESSION['futsid'];
if(isset($_SESSION['uid'])){ $userid=$_SESSION['uid'];}
else {$userid=0;
     }

?>
<div class="section main main-raised">
    <div class="container">
        <div class="row">
            <?php
            include 'db.php';
            $futsal_id = $_GET['p'];
            $sql = " SELECT * FROM futsals WHERE futsal_id = $futsal_id";
            $sqls = " SELECT * FROM owner_info WHERE futsal_id = $futsal_id";
            if (!$con) {
                die("Connection failed: " . mysqli_connect_error());
            }
            $result = mysqli_query($con, $sql);
            $results = mysqli_query($con, $sqls);
            if (mysqli_num_rows($result) > 0)
            {
                $rows = mysqli_fetch_assoc($results);
                while($row = mysqli_fetch_assoc($result))
                {
                    echo '<div class="col-md-5">
                    <div id="product-main-img">
                    <div class="product-preview">
                    <img src="futsal_images/'.$row['futsal_image'].'" alt="">
                    </div></div></div>';  
                   
                    echo "<div class='col-md-5'>
						<div class='product-details'>
                        <h2 class='product-name'>".$row['futsal_name']."</h2>
                        <p>".$row['futsal_desc']."</p><br><hr>
                        <h5 style='display:inline-block;'>ADDRESS</h5>&emsp;&emsp;" .$row['futsal_address'];
                    echo '<hr><h5 style="display:inline-block;">Contact</h5>&emsp;&emsp;'.$rows['contact'];
                    echo '<hr><h5 style="display:inline-block;">Futsal rate</h5>&emsp;&emsp;RS &nbsp;'.$row['futsal_rate'].'&emsp; per hour';
                    echo  "<hr><div class='add-to-cart'>
                        <div class='btn-group' style='margin-left: 25px; margin-top: 15px'>";
                    if (isset($_SESSION['user_id']) && isset($_SESSION['logged_in'])) {
                        echo"<a href='reservation/index.php?p=$futsal_id'><i class='fa fa-shopping-cart'></i>Book this futsal</a>";
                    }
                    else{ echo'<a href="" data-toggle="modal" data-target="#Modal_login"><i class="fa fa-shopping-cart"></i>Book this futsal</a>'; 
                        }
                        echo "</div></div>";
                    echo "rate this futsal"; 
                    include ('getRatingData.php');
                    echo "<br><br></div>";
                }
                if(isset($_SESSION['logged_in'])){
                echo'<form method="post">
                <div class="form-group" style="margin-left:5%; height=600px;">
                <label >Submit your review here</label>
                <textarea type="text" class="form-control col-md-6" name="comments" ></textarea><br>
                <button type="submit" name="sub" class="btn btn-primary" style="margin-left:42%;">Send</button>
                </div><br><br>';
      
                }
                
                if(isset($_POST['sub']) && !empty($_POST['comments']) && isset($_SESSION['logged_in'])){
                    $user = $_SESSION['user_name'];
                    $comments = $_POST['comments'];
                    $cql = "INSERT INTO comments (commentid,username,futsal_id,comments) VALUES('NULL','$user','$futsalid','$comments')";
                    $tql = mysqli_query($con,$cql);
                    
                    if(! $tql){
                        echo 'error in updating database';
                     } 
                }
            echo '</form></div></div>';
                
            if (isset($_SESSION['logged_in']))
    {
        $pql = "SELECT username,comments FROM comments WHERE futsal_id= $futsalid ORDER BY comments DESC";
        $klm = mysqli_query($con,$pql);
        echo'<h2>Reviews</h2>';
        while ($nes = mysqli_fetch_array($klm)) 
        {
            $comm= $nes['comments'];
            $username=$nes['username'];
            echo'<div class="jumbotron jumbotron-fluid">
  <div class="container">
    From<h2 style="display:inline-block; " class="display-4">&emsp;'.$username. '</h2>
    <p class="lead" style="font-size:14px;">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;'.$comm.'</p>
  </div>
</div>';
}}
          echo"</div></div></div>";   } ?>
        </div>
    </div>    
</div> 
<?php
include "footer.php";
?>