<?php
$host = "localhost";
$user = "root";
$password = "123456789";
$db = "proj_php";
$link = mysqli_connect($host,$user,$password,$db);
mysqli_set_charset($link,"utf8");

if(!$link){
    //die('Could not connect: '. mysql_error());
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>