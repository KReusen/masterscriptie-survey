<?php

//Connect To Database
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "scriptie";
$con = mysqli_connect($hostname, $username, $password) OR DIE("Error " . mysqli_error($con));
mysqli_select_db($con, $dbname);

?>