<?php
require_once "db.php";
require_once "rate/functions.php";
// Here the user id is harcoded.
// You can integrate your authentication code here to get the logged in user id
if(isset($_SESSION['user_id']))
{
$userId = $_SESSION['user_id'];
$futsalid=$_SESSION['futsid'];
$query = "SELECT * FROM futsals where futsal_id= $futsalid";
$result = mysqli_query($con, $query);

$outputString = '';

foreach ($result as $row) {
    $userRating = userRating($userId, $futsalid, $con);
    $totalRating = totalRating($row['futsal_id'], $con);
    $outputString .= '
        <div class="row-item"><ul class="list-inline"  onMouseLeave="mouseOutRating('. $futsalid . ',' . $userRating . ');"> ';
    
    for ($count = 1; $count <= 5; $count ++) {
        $starRatingId = $futsalid . '_' . $count;
        
        if ($count <= $userRating) {
            
            $outputString .= '<li value="' . $count . '" id="' . $starRatingId . '" class="star selected">&#9733;</li>';
        } else {
            $outputString .= '<li value="' . $count . '"  id="' . $starRatingId . '" class="star" onclick="addRating(' . $futsalid. ',' . $count . ');" onMouseOver="mouseOverRating(' . $futsalid. ',' . $count . ');">&#9733;</li>';
        }
    }
    $outputString .= '</ul><p class="review-note">Total Reviews: ' . $totalRating . '</p></div>';
}
echo $outputString;
}
else
{
$futsalid=$_SESSION['futsid'];
$query = "SELECT * FROM futsals where futsal_id= $futsalid";
$result = mysqli_query($con, $query);

$outputString = '';

foreach ($result as $row) {
    $totalRating = totalRating($futsalid, $con);
    echo'<br>';
    for ($count = 1; $count <= 5; $count ++) {
        $starRatingId = $futsalid . '_' . $count;
        
        if ($count <= $totalRating) {
            
            $outputString .= '<li style="display:inline-block;" value="' . $count . '" id="' . $starRatingId . '" class="star selected">&#9733;</li>';
        } else {
            $outputString .= '<li style="display:inline-block;" value="' . $count . '"  id="' . $starRatingId . '" class="star" onMouseOver="mouseOverRating(' . $futsalid. ',' . $count . ');">&#9733;</li>';
        }
    } // endFor
    
    $outputString .= '</ul><p class="review-note">Total Reviews: ' . $totalRating . '</p></div>';
}
echo $outputString ;
    
}
?>