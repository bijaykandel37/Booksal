<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass ="";
$db="booksalfinal";

$con = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $con -> error);
   
?>