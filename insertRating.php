<?php
session_start();
if(!isset($_SESSION['user_id'])){
    echo'<span>Not logged in</span>';
    header('location: index.php');
}
require_once ('db.php');
// Here the user id is harcoded.
// You can integrate your authentication code here to get the logged in user id

if (isset($_SESSION['user_id'], $_POST["index"], $_POST["futsal_id"])) {
    $userId = $_SESSION['user_id'];
    $futsalId = $_POST["futsal_id"];
    $rating = $_POST["index"];
    
    $checkIfExistQuery = "select * from tbl_rating where user_id = '" . $userId . "' and futsal_id = '" . $futsalId . "'";
    if ($result = mysqli_query($con, $checkIfExistQuery)) {
        $rowcount = mysqli_num_rows($result);
    }
    
    if ($rowcount == 0) {
        $insertQuery = "INSERT INTO tbl_rating(user_id,futsal_id, rating) VALUES ('" . $userId . "','" . $futsalId . "','" . $rating . "') ";
        $result = mysqli_query($con, $insertQuery);
        echo "success";
    } else {
        echo "Already Voted!";
    }
}
 