<?php
include "db.php";

session_start();
#Login script is begin here
#If user given credential matches successfully with the data available in database then we will echo string login_success
#login_success string will go back to called Anonymous funtion $("#login").click() 

if(isset($_POST["email"]) && isset($_POST["password"])){
	$email = mysqli_real_escape_string($con,$_POST["email"]);
	$password = $_POST["password"];
	$sql = "SELECT * FROM user_info WHERE email = '$email' AND password = '$password'";
	$run_query = mysqli_query($con,$sql);
	$count = mysqli_num_rows($run_query);
    $row = mysqli_fetch_array($run_query);
    
    $_SESSION["user_id"] = $row["user_id"];
    $_SESSION["user_name"] = $row["first_name"];
   
    $ip_add = getenv("REMOTE_ADDR");
	if($count == 1){
	   echo "login_success";
        $_SESSION['user_email']=$email;
        $_SESSION['user_is_admin']='0';
        $_SESSION['logged_in'] = '1';
        header('Location: index.php');		
            exit;
		}
    else{
                $email = mysqli_real_escape_string($con,$_POST["email"]);
                $password =md5($_POST["password"]) ;
                $sql = "SELECT * FROM admin_info WHERE admin_email = '$email' AND admin_password = '$password'";
                $run_query = mysqli_query($con,$sql);
                $count = mysqli_num_rows($run_query);
        
            if($count == 1){
                $row = mysqli_fetch_array($run_query);
                $_SESSION["aid"] = $row["admin_id"];
                $_SESSION["name"] = $row["admin_name"];
                $_SESSION['user_is_admin']='1';
                $_SESSION['logged_in'] = '1';
                $ip_add = getenv("REMOTE_ADDR");
                    echo "login_success";

                    echo "<script> location.href='admin/addfutsal.php'; </script>";
                    exit;

                }else{
                    echo "<span style='color:red;'>Please register before login..!</span>";
                    exit();
                }	
}	
}
?>