<?php
$host="localhost";
$user="root";
$password="root";
$database="tt2";
$mysqli = new mysqli($host, $user,$password, $database);
if($mysqli->connect_error) {
  exit('Could not connect');
}

$sql = "SELECT COUNT(*) FROM `tbl_user` WHERE `Email`=?";

$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", $_GET['email']);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($count);
$stmt->fetch();
$stmt->close();
if($count==0)
{
    echo 'ok';
}
else 
{
    echo 'no';
}
?>