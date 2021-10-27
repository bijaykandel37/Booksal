<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>BOOKSAL</title>

		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="../../css/bootstrap.min.css"/>
        <link type="text/css" rel="stylesheet" href="../../css/slick.css"/>
		<link type="text/css" rel="stylesheet" href="../../css/slick-theme.css"/>
        <link type="text/css" rel="stylesheet" href="../../css/nouislider.min.css"/>
        <link rel="stylesheet" href="../../css/font-awesome.min.css">
		<link type="text/css" rel="stylesheet" href="../../css/style.css"/>
		<link type="text/css" rel="stylesheet" href="../../css/accountbtn.css"/>
		
    <style>
        #header {
  
            background: #780206;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #061161, #780206);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #061161, #780206); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

  
        }
        #top-header {
              
  
            background: #870000;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #190A05, #870000);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #190A05, #870000); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */


        }

.main-navi{
    
  list-style: none;
    float: center;
    margin-top: 3px;
    position: inherit;
    width: 1000px;
    font-size: 15px;
    
}
.main-navi li
{   
    display: inline-block;
    margin-left: 20px;
    position: inherit;
    padding: 2px 30px;
}
.main-navi li a
{ padding: 15px;
    color:forestgreen;
    text-decoration: none;
    font-size: 140%;
}
.main-navi li a:hover
{
    color:brown;
    border-bottom: 2px solid blue;
}
        
        #footer {
            background: #7474BF;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #348AC7, #7474BF);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #348AC7, #7474BF); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */


          color: #1E1F29;
        }
        #bottom-footer {
            background: #7474BF;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #348AC7, #7474BF);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #348AC7, #7474BF); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
          

        }
        .footer-links li a {
          color: #1E1F29;
        }
        .mainn-raised {
            
            margin: -7px 0px 0px;
            border-radius: 6px;
            box-shadow: 0 16px 24px 2px rgba(0, 0, 0, 0.14), 0 6px 30px 5px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2);

        }
       
        .glyphicon{
    display: inline-block;
    font: normal normal normal 14px/1 FontAwesome;
    font-size: inherit;
    text-rendering: auto;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    }
    .glyphicon-chevron-left:before{
        content:"\f053"
    }
    .glyphicon-chevron-right:before{
        content:"\f054"
    }
        </style>

</head>
	<body>
		<!-- HEADER -->
		<header>
			<!-- TOP HEADER -->
			<div id="top-header" style="max-height:40px;">
				<div class="container">
					<ul class="header-links pull-right">
						<li><?php
                             include "db.php";
                            if(isset($_SESSION["user_id"])){
                                unset($_SESSION["user_id"]);
                            }
                            elseif(isset($_SESSION["oid"])){
                                $userid= $_SESSION["oid"];
                                $sql = "SELECT fname FROM owner_info WHERE owner_id='$userid'";
                                $query = mysqli_query($con,$sql);
                                $row=mysqli_fetch_array($query);
                                
                                echo '<div class="dropdownn">
                                  <a href="#" class="dropdownn" data-toggle="modal" data-target="#myModal" ><i class="fa fa-user-o"></i> HI '.$row["fname"].' Owner</a>
                                  <div class="dropdownn-content">
                                    <a href="../bookings.php"><i class="fa fa-user-circle" aria-hidden="true" ></i>Back to home</a>
                                    <a href="../../logout.php"  ><i class="fa fa-sign-in" aria-hidden="true"></i>Log out</a>
                                    </div>
                                </div>';
                            }
                            else{ 
                                echo '
                                <div class="dropdownn">
                                  <a href="#" class="dropdownn" data-toggle="modal" data-target="#myModal" ><i class="fa fa-user-o"></i> My Account</a>
                                  <div class="dropdownn-content">
                                    <a href="" data-toggle="modal" data-target="#Modal_login"><i class="fa fa-sign-in" aria-hidden="true" ></i>Login</a>
                                    <a href="" data-toggle="modal" data-target="#Modal_register"><i class="fa fa-user-plus" aria-hidden="true"></i>Register</a>
                                    
                                  </div>
                                </div>';
                                
                            }
                                             ?>
                               
                                </li>				
					</ul>
					
				</div>
			</div>
			<!-- /TOP HEADER -->
			
			<!-- MAIN HEADER -->
			<div id="header" style="max-height:130px;  padding-top: 0px;">
				<!-- container -->
				<div class="container" style="max-height:90px;">
					<!-- row -->
					<div class="row">
						<!-- LOGO -->
						<div class="col-md-3">
							<div class="header-logo">
								<a href="#" class="logo">
								<font style="font-style:normal; font-size: 30px;color: aliceblue;font-family: serif">
                                        BOOKSAL
                                    </font>
									
								</a>
							</div>
						</div>
						<!-- /LOGO -->

						<!-- SEARCH BAR -->
						<div class="col-md-6" style="margin-top:0px">
							<div class="header-search">
								<form method="post" action="../../homeaction.php">
									<input class="input" id="search" type="text" placeholder="Search here" name="keyword">
									<button type="submit" id="search_btn" class="search-btn" name="search">Search</button>
								</form>
							</div>
						</div>
						<!-- /SEARCH BAR -->

					</div>
					<!-- row -->
                    <div class="row" style="max-height:20px;">
                        <div class="col-md-12">
                    <ul class="main-navi" style="height:50px;">
                        <li><a href="../../index.php">Home</a></li>
                        <li><a href="../../futsals.php">Futsals</a></li>
                        <li><a href="">Gallery</a></li> 
                        <li><a href="../../contactus.php">Contact Us</a></li>
                        <li><a href="../../aboutus.php">About Us</a></li>
                    </ul>
                        </div>
                    </div>
				</div>
            </div>
		</header>
	
        <div class="modal fade" id="Modal_login" role="dialog">
                        <div class="modal-dialog">
													
                          <!-- Modal content-->
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              
                            </div>
                            <div class="modal-body">
                            <?php
                                include "../../login_form.php";
                            ?>
                            </div>
                            
                          </div>
													
                        </div>
        </div>
                <div class="modal fade" id="Modal_register" role="dialog">
                        <div class="modal-dialog" style="">

                          <!-- Modal content-->
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              
                            </div>
                            <div class="modal-body">
                            <?php
                                include "../../register_form.php";
                                header('../../futsals.php'); ?>
            
                            </div>
                            
                          </div>

                        </div>
                      </div>	

<?php include_once('main.php'); ?>
<h2><?php 
    $futsalid=$_SESSION['ownerfutsalid'];
    include 'db.php';
	$sql = " SELECT * FROM futsals WHERE futsal_id = $futsalid";
    if (!$con) { die("Connection failed: " . mysqli_connect_error()); }
		$result = mysqli_query($con, $sql);
		if (mysqli_num_rows($result) > 0) 
		{
		  while($row = mysqli_fetch_assoc($result)) 
          {
              echo $row['futsal_name'];
          }
        } ?> </h2><br>
<div id="header_inner_div">
    <div id="header_inner_center_div">
<?php

if(isset($_SESSION['logged_in']))
{
	echo '<b>Week ' . global_week_number . ' - ' . global_day_name . ' ' . date('jS F Y') . '</b>';
}
?><br><br>

</div>
</div>