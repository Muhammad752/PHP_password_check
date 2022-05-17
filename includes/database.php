<?php

//params to create db
$dbHost="localhost";//different for web server
$dbUser="root";
$dbPass="";//different for web server
$dbName="users";

$con=mysqli_connect($dbHost,$dbUser,$dbPass,$dbName);

if($con){}
else{
    die("database connection failed");
}
?>