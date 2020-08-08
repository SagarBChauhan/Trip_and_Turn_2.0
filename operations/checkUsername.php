<?php
$host="localhost";
$user="root";
$password="root";
$database="tt2";
$mysqli = new mysqli($host, $user,$password, $database);
if($mysqli->connect_error) {
  exit('Could not connect');
}

$sql = "SELECT COUNT(*) as count FROM `tbl_login` WHERE `User_Name`= ? ";

$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", $_GET['q']);
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