<?php 
session_start();
include ('../db.php');

if(!isset($_SESSION['aid'])){
    header ('adminlogin.php');
}

if(isset($_POST['submit']))
{
                $email = mysqli_real_escape_string($con,$_POST["email"]);
                $password = $_POST["password"];
                $sql = "SELECT * FROM admin_info WHERE admin_email = '$email' AND admin_password = '$password'";
                $run_query = mysqli_query($con,$sql);
                $count = mysqli_num_rows($run_query);

            //if user record is available in database then $count will be equal to 1
            if($count >0){
                $row = mysqli_fetch_array($run_query);
                $_SESSION["aid"] = $row["admin_id"];
                $_SESSION["name"] = $row["admin_name"];
                $_SESSION["logged_in"]='1';
                $_SESSION["user_is_admin"]='1';
                $ip_add = getenv("REMOTE_ADDR");
                    echo "login_success";

                    echo "<script> location.href='addfutsal.php'; </script>";
                    exit();

                }else{
                    echo "<span style='color:red;'>Login details incorrect..!</span>";
                    exit();
            } 
}
?>

<link href="../css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="../js/bootstrap.min.js"></script>
<script src="../js/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<style>
body {
  margin: 0;
  padding: 0;
  background-color: #17a2b8;
  height: 100vh;
}
#login .container #login-row #login-column #login-box {
  margin-top: 10%;
    margin-left: 270px;
  max-width: 600px;
  height: 360px;
  border: 1px solid #9C9C9C;
  background-color: #EAEAEA;
}
#login .container #login-row #login-column #login-box #login-form {
  padding: 20px;
}
#login .container #login-row #login-column #login-box #login-form #register-link {
  margin-top: -85px;
}

</style>
<body>
    <div id="login">
        <h3 class="text-center text-white pt-5">Admin Login form</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="adminlogin.php" method="post">
                            <h3 class="text-center text-info">Login</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">Email:</label><br>
                                <input type="text" name="email" id="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="remember-me" class="text-info"><span>Remember me</span> <span><input id="remember-me" name="remember-me" type="checkbox"></span></label><br>
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="submit">
                            </div>
                            <div id="register-link" class="text-right">
                                <a href="#" class="text-info">Register here</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
