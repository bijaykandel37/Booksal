<?php include_once('main.php'); 
if(!isset($_SESSION['logged_in'])){
    echo 'not logged in';
    header('location: ../index.php');
}
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8">

<noscript><meta http-equiv="refresh" content="0; url=error.php?error_code=2"></noscript>
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/jquery-cookies.js" type="text/javascript"></script>
<script src="js/jquery-base64.js" type="text/javascript"></script>
<?php include('js/header-js.php'); ?>
<script src="js/main.js" type="text/javascript"></script>
<link href="css/style.css" rel="stylesheet" type="text/css">
<link rel="shortcut icon" href="img/favicon.ico">

<title>BOOKSAL</title>
</head>

<body>
<div id="notification_div"><div id="notification_inner_div"><div id="notification_inner_cell_div"></div></div></div>
    
  <?php  include('miniheader.php'); ?>    
<div id="content_div"></div>

<div id="preload_div">
<img src="img/loading.gif" alt="Loading">
</div>

</body>

</html>
