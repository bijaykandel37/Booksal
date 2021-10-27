<?php
if(isset($_SESSION['user_id'])) $userId=$_SESSION['user_id'];
function userRating($userId, $futsalId, $con)
{
    $average = 0;
    $avgQuery = "SELECT rating FROM tbl_rating WHERE user_id = '" . $userId . "' and futsal_id = '" . $futsalId . "'";
    $total_row = 0;
    
    if ($result = mysqli_query($con, $avgQuery)) {
        // Return the number of rows in result set
        $total_row = mysqli_num_rows($result);
    } // endIf
    
    if ($total_row > 0) {
        foreach ($result as $row) {
            $average = round($row["rating"]);
        } // endForeach
    } // endIf
    return $average;
}
 // endFunction
function totalRating($futsalId, $con)
{
    $totalVotesQuery = "SELECT * FROM tbl_rating WHERE futsal_id = '" . $futsalId . "'";
    
    if ($result = mysqli_query($con, $totalVotesQuery)) {
        // Return the number of rows in result set
        $rowCount = mysqli_num_rows($result);
        // Free result set
        mysqli_free_result($result);
    } // endIf
    
    return $rowCount;
}//endFunction
?>
<script type="text/javascript">

    function showfutsalData(url)
    {
        var xhttp = new XMLHttpRequest();
        /*xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200)
            {
                document.getElementById("futsal_list").innerHTML = this.responseText;
            }
        };*/
        xhttp.open("GET", url, true);
        xhttp.send();

    } 

    function mouseOverRating(futsalId, rating) {

        resetRatingStars(futsalId)

        for (var i = 1; i <= rating; i++)
        {
            var ratingId = futsalId + "_" + i;
            document.getElementById(ratingId).style.color = "#ff6e00";

        }
    }

    function resetRatingStars(futsalId)
    {
        for (var i = 1; i <= 5; i++)
        {
            var ratingId = futsalId + "_" + i;
            document.getElementById(ratingId).style.color = "#9E9E9E";
        }
    }

   function mouseOutRating(futsalId, userRating) {
	   var ratingId;
       if(userRating !=0) {
    	       for (var i = 1; i <= userRating; i++) {
    	    	      ratingId = futsalId + "_" + i;
    	          document.getElementById(ratingId).style.color = "#ff6e00";
    	       }
       }
       if(userRating <= 5) {
    	       for (var i = (userRating+1); i <= 5; i++) {
	    	      ratingId = futsalId + "_" + i;
	          document.getElementById(ratingId).style.color = "#9E9E9E";
	       }
       }
    }

    function addRating (futsalId, ratingValue) {
            var xhttp = new XMLHttpRequest();

            xhttp.onreadystatechange = function ()
            {
                if (this.readyState == 4 && this.status == 200) {

                    showfutsalData('futsal.php');
                    
                    if(this.responseText != "success") {
                    	   alert(this.responseText);
                    }
                }
            };

            xhttp.open("POST", "insertRating.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            var parameters = "index=" + ratingValue + "&futsal_id=" + futsalId;
            xhttp.send(parameters);
    }
</script>
