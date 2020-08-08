<?php
$host="localhost";
$user="root";
$password="root";
$database="tt2";
$con=mysqli_connect($host, $user, $password, $database);
if ($con)
{
    $connction_satus="<p style='color:green;'><i class='fab fa-connectdevelop'></i> Server Online <i class='far fa-check-circle'></i></p>";
}
else
{
    $connction_satus="<p style='color:red;'><i class='fab fa-connectdevelop'></i> Server Offline<i class='far fa-times-circle'></i></p>";
}
