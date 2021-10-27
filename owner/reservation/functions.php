<?php

// Reservations

function highlight_day($day)
{
	$day = str_ireplace(global_day_name, '<span id="today_span">' . global_day_name . '</span>', $day);
	return $day;
}

function read_reservation($week, $day, $time, $futsal)
{
    include ('db.php');
	$query = mysqli_query($con,"SELECT * FROM " . global_mysql_reservations_table . " WHERE reservation_week='$week' AND reservation_day='$day' AND reservation_time='$time'  AND futsal_id='$futsal'")or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars(mysqli_error($con)) . '</span>');
	$reservation = mysqli_fetch_array($query);
	return($reservation['reservation_user_name']);
}

function read_reservation_details($week, $day, $time,$futsal)
{
    include ('db.php');
	$query = mysqli_query($con,"SELECT * FROM " . global_mysql_reservations_table . " WHERE reservation_week='$week' AND reservation_day='$day' AND reservation_time='$time'  AND futsal_id='$futsal'")or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars(mysqli_error($con)) . '</span>');
	$reservation = mysqli_fetch_array($query);

	if(empty($reservation))
	{
		return(0);
		
	}
	else
	{
		return('<b>Reservation made:</b> ' . $reservation['reservation_made_time'] . '<br><b>BOOKING STATUS: </b> ' . $reservation['reservation_user_email']);
	}
}

function make_reservation($week, $day, $time,$futsal)
{
    include ('db.php');
	$user_id = $_SESSION['oid'];
	$user_email = $_SESSION['email'];
	$user_name = $_SESSION['name'];

	if($week == '0' && $day == '0' && $time == '0')
	{
		mysqli_query($con,"INSERT INTO " . global_mysql_reservations_table . " (futsal_id,reservation_made_time,reservation_week,reservation_day,reservation_time,reservation_user_id,reservation_user_email,reservation_user_name) VALUES ('$futsal',now(),'$week','$day','$time','$user_id','$user_email','$user_name')")or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars(mysqli_error($con)) . '</span>');

		return(1);
	}
	elseif($week < global_week_number && $_SESSION['user_is_admin'] != '1' || $week == global_week_number && $day < global_day_number && $_SESSION['user_is_admin'] != '1')
	{
		return('You can\'t reserve back in time');
	}
	elseif($week > global_week_number + global_weeks_forward && $_SESSION['user_is_admin'] != '1')
	{
		return('You can only reserve ' . global_weeks_forward . ' weeks forward in time');
	}
	else
	{
		$query = mysqli_query($con,"SELECT * FROM " . global_mysql_reservations_table . " WHERE reservation_week='$week' AND reservation_day='$day' AND reservation_time='$time'  AND futsal_id='$futsal'")or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars(mysqli_error($con)) . '</span>');

		if(mysqli_num_rows($query) < 1)
		{
			$year = global_year;

			mysqli_query($con,"INSERT INTO " . global_mysql_reservations_table . " (futsal_id,reservation_made_time,reservation_year,reservation_week,reservation_day,reservation_time,reservation_user_id,reservation_user_email,reservation_user_name) VALUES ('$futsal',now(),'$year','$week','$day','$time','$user_id','$user_email','$user_name')")or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars(mysqli_error($con)) . '</span>');

			return(1);
		}
		else
		{
			return('Someone else just reserved this time');
		}
	}
}

function delete_reservation($week, $day, $time,$futsal)
{
    include ('db.php');
	if($week < global_week_number && $_SESSION['user_is_admin'] != '1' || $week == global_week_number && $day < global_day_number && $_SESSION['user_is_admin'] != '1')
	{
		return('You can\'t reserve back in time');
	}
	elseif($week > global_week_number + global_weeks_forward && $_SESSION['user_is_admin'] != '1')
	{
		return('You can only reserve ' . global_weeks_forward . ' weeks forward in time');
	}
	else
	{
		$query = mysqli_query($con,"SELECT * FROM " . global_mysql_reservations_table . " WHERE reservation_week='$week' AND reservation_day='$day' AND reservation_time='$time'  AND futsal_id ='$futsal'")or die('<span class="error_span"><u>MySQL error in deleting reservations:</u> ' . htmlspecialchars(mysqli_error($con)) . '</span>');
		$user = mysqli_fetch_array($query);

		if($user['reservation_user_id'] == $_SESSION['oid'] || $_SESSION['user_is_admin'] == '1')
		{
			mysqli_query($con,"DELETE FROM " . global_mysql_reservations_table . " WHERE reservation_week='$week' AND reservation_day='$day' AND reservation_time='$time'  AND futsal_id='$futsal'")or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars(mysqli_error($con)) . '</span>');

			return(1);
		}
		else
		{
			return('You can\'t remove other users\' reservations');
		}
	}
}
?>