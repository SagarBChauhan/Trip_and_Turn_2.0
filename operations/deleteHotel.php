<?php
$host="localhost";
$user="root";
$password="root";
$database="tt2";
$con=mysqli_connect($host, $user, $password, $database);

#Hard Delete
if (isset($_POST['del_id']))
{
    $sql="DELETE FROM `tbl_hotel` WHERE `Hotel_Id`=".$_POST['del_id'].";";
    $query=  mysqli_query($con, $sql);
    if ($query)
    {
        echo 'Deleted';
    }
    else 
    {
        echo 'NO';
    }
}