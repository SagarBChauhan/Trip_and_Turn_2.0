<?php
include './Connection.php'; 
    if(isset($_POST["btn_Sub"]))
    {
        $Transport_type=$_POST['Transport_type'];
        $Company=$_POST['Company'];
        $Name=$_POST['Name'];
        $Model=$_POST['Model'];
        $Cost=$_POST['Cost'];

        $query="INSERT INTO `tbl_vehicle`( `Company`, `Name`, `Model`, `Trans_Type_Id`, `Cost_Per_KM`, `Last_Update_Time`)"
                . " VALUES ('$Company','$Name','$Model','$Transport_type',$Cost,'".  date('Y-m-d H:i:s')."')";        
        $sql_insert = mysqli_query($con, $query);
        if($sql_insert)
        {   
            echo 'ok';            
        }
        else
        {
            echo 'no';
        }
    }
 else {
        echo 'empty';
}