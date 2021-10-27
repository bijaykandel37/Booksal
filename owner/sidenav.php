<!doctype html>
<html lang="en">

<head>
  <title>Hello, world!</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <link rel="stylesheet" type="text/css" href="../admin/assets/css/Material+Icons.css" />
  <link rel="stylesheet" href="../admin/assets/css/font-awesome.min.css">
  <!-- Material Kit CSS -->
  <link href="../admin/assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
  <link href="../admin/assets/css/black-dashboard.css" rel="stylesheet" />
</head>

<body class="dark-edition" style="background: url(../admin/assets/img/sidebar-3.jpg) no-repeat center center fixed;">
  <div class="wrapper ">
    <div class="sidebar" data-color="blue" data-background-color="blue" data-image="../admin/assets/img/sidebar-2.jpg">
      <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
      <div class="logo">
        <a href="" class="simple-text logo-normal">
          BOOKSAL
        </a>
      </div>
      <div class="sidebar-wrapper ps-container ps-theme-default" data-ps-id="3a8db1f4-24d8-4dbf-85c9-4f5215c1b29a">
        <ul class="nav">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
             <li class="nav-item ">
            <?php
            $futsal_id=$_SESSION['ownerfutsalid'];
            echo "<a class='nav-link' href='reservation/index.php?p=$futsal_id'>
              <i class='material-icons'>edit_user</i>
              <p>Change futsal Timing</p>
            </a>";
                ?>
          </li>
            <li class="nav-item ">
            <a class="nav-link" href="editfutsalinfo.php">
              <i class="material-icons">person</i>
              <p>Edit futsal Profile</p>
            </a>
          </li>
          
          
          <li class="nav-item ">
            <a class="nav-link" href="bookings.php">
              <i class="material-icons">library_books</i>
              <p>Bookings</p>
            </a>
          </li>
        
           
          
          <li class="nav-item ">
            <a class="nav-link" href="../logout.php">
              <i class="material-icons">logout</i>
              <p>Logout</p>
            </a>
          </li>
          </ul>
      </div>
    </div>
    
    