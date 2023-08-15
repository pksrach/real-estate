<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpwd = '';
$dbname = 'ss5_realestate_db';

$conn = mysqli_connect($dbhost, $dbuser, $dbpwd);
if(!$conn){
    die("Connection failed".mysqli_connect_error());
    exit();
}

mysqli_select_db($conn, $dbname) or die("Connection failed".mysqli_connect_error());
// printf("Connection successful");
echo "<script>console.log(`Connection Db Successful`)</script>";
