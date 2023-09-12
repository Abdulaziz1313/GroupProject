<?php

$hostname = "localhost";
$username = "recruitment";
$password = "#b3nu98N5";

$dbname = "recruitment_";

$con = mysqli_connect($hostname, $username, $password, $dbname);

if (!$con)
{
    echo "Failed to connect to MySQL:" . mysqli_connect_error();
}


?>