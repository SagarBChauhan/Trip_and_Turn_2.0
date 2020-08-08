<?php
$host="localhost";
$user="root";
$password="root";
$database="tt2";
$con=mysqli_connect($host, $user, $password, $database);

#Hard Delete
if (isset($_POST['del_id']))
{
    $flag=1;
    $sql="SELECT `Login_id` FROM tbl_user WHERE `User_Id`=".$_POST['del_id'].";";
    $result=  mysqli_query($con, $sql);
    while ($row = $result -> fetch_assoc())
    {
        $Login_id= $row['Login_id'];
    }
    
    $sql="DELETE FROM `tbl_user` WHERE `User_Id`=".$_POST['del_id'].";";
    $query=  mysqli_query($con, $sql);
    if ($query)
    {
        $flag=1;
    }
    else 
    {
        $flag=0;
    }
    
    if($flag==1)
    {
        $sql="DELETE FROM `tbl_login` WHERE `Login_id`=$Login_id;";
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
}

#Soft Delete
if (isset($_POST['status_id']))
{
    $sql="SELECT `Status` FROM `tbl_login` WHERE `Login_id`=".$_POST['status_id'].";";
    $result=  mysqli_query($con, $sql);
    while ($row = $result -> fetch_assoc())
    {
        $status= $row['Status'];
    }
    if ($status==1)
    {
        $sql="UPDATE `tbl_login` SET`Status`=0,`Last_Update_Time`=NOW() WHERE `Login_id`=".$_POST['status_id'].";";
        $query=  mysqli_query($con, $sql);
        if ($query)
        {
            echo 'Deactivated';
        }
        else 
        {
            echo 'NO';
        }
    }
    else if ($status==0)
    {
        $sql="UPDATE `tbl_login` SET`Status`=1,`Last_Update_Time`=NOW() WHERE `Login_id`=".$_POST['status_id'].";";
        $query=  mysqli_query($con, $sql);
        if ($query)
        {
            echo 'Activated';
        }
        else 
        {
            echo 'NO';
        }
    }
}