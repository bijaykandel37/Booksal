<?php

session_start();
if(isset($_SESSION['user_id']))
{
    unset($_SESSION["user_id"]);
    unset($_SESSION["user_name"]);
    unset($_SESSION["user_email"]);
    unset($_SESSION["user_is_admin"]);
    unset($_SESSION["logged_in"]);
    $BackToMyPage = $_SERVER['HTTP_REFERER'];
    if(isset($BackToMyPage)) {
    header('Location: '.$BackToMyPage);
    }
    else {
    header('Location: index.php'); // default page
    }
}
elseif(isset($_SESSION['aid']))
{
    unset($_SESSION["aid"]);
    unset($_SESSION["name"]);
    unset($_SESSION['user_is_admin']);
    unset($_SESSION["logged_in"]);
    header('Location: ./index.php');
}
elseif(isset($_SESSION['oid']))
{
    unset($_SESSION["oid"]);
    unset($_SESSION["name"]);
    unset($_SESSION["futsal_id"]);
    unset($_SESSION["logged_in"]);
    header('Location: ./index.php');
    unset($_SESSION["logged_in"]);
    }
    header('location: ./index.php');  
?>
