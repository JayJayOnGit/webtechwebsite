<?php
$servername = "localhost";
$username = "student";
$password= "website";
$dbasename = "madhatter";

// Create connection
$mysqli = new mysqli($servername, $username, $password, $dbasename);
$version = "0.1.1";

// Check connection
if ($mysqli->connect_errno)
{
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
