<?php
include './Connection.php'; 
if(isset($_POST["btn_Sub"]))
{
    $Vehicle_Id=$_POST['Vehicle_Id'];
    $Transport_type=$_POST['Transport_type'];
    $Company=$_POST['Company'];
    $Name=$_POST['Name'];
    $Model=$_POST['Model'];
    $Cost=$_POST['Cost'];

    $query="UPDATE `tbl_vehicle` SET `Company`='$Company',`Name`='$Name',`Model`='$Model',`Trans_Type_Id`='$Transport_type',`Cost_Per_KM`='$Cost',`Last_Update_Time`=NOW() WHERE `Vehicle_Id`=$Vehicle_Id;";        
    $sql= mysqli_query($con, $query);
    if($sql)
    {   
        echo 'ok';            
    }
    else
    {
        echo 'no';
    }
}
else 
{
    echo 'empty';
}