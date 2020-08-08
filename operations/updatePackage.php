<?php
session_start();
include 'Connection.php';
if (!empty($_POST['package_Name'])&&!empty($_POST['Type'])&&!empty($_POST['description'])&&!empty($_POST['place'])&&!empty($_POST['cost']) &&!empty($_POST['persons'])&&!empty($_POST['days'])&&!empty($_POST['nights']) &&!empty($_POST['Package_Id']))
{
    if ( !empty($_FILES['InputFile']['name']))
    {
        $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp' ); 
        $path = '../upload/Image/package/'.$_POST['package_Name'].'/'; 
        if(!is_dir($path))
        {
            mkdir($path,0777,true);
        }
        if(!empty($_FILES['InputFile']['name']))
        {
            $img = $_FILES['InputFile']['name'];
            $tmp = $_FILES['InputFile']['tmp_name'];
            $package_Name=$_POST['package_Name'];
            $Type=$_POST['Type'];
            $description=$_POST['description'];
            $place=$_POST['place'];
            $cost=$_POST['cost'];
            $persons=$_POST['persons'];
            $days=$_POST['days'];
            $nights=$_POST['nights'];
            $Package_Id=$_POST['Package_Id'];
            // get uploaded file's extension
            $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));

            // can upload same image using rand function
            $final_image = rand(1000,1000000).$img;

            // check's valid format
            if(in_array($ext, $valid_extensions)) 
            { 
                $path = $path.strtolower($final_image); 

                if(move_uploaded_file($tmp,$path)) 
                {
                    $sql_upload="UPDATE `tbl_package` SET `Name`='$package_Name',`Type`='$Type',`Cost`=$cost,`Place_Id`=$place,`Description`='$description',`Picture`='$path',"
                            . "`Number_Person`=$persons,`Days`=$days,`Nights`=$nights,`Last_Update_Time`=NOW() WHERE `Package_Id`=$Package_Id";
                    $query_upload=  mysqli_query($con, $sql_upload);
                    if($query_upload)
                    {
                        echo 'ok';
                    }
                    else 
                    {
                        echo 'no';
                    }
                }
            } 
            else 
            {
                echo 'invalid';
            }
        }
    }
    else 
    {
        $package_Name=$_POST['package_Name'];
        $Type=$_POST['Type'];
        $description=$_POST['description'];
        $place=$_POST['place'];
        $cost=$_POST['cost'];
        $persons=$_POST['persons'];
        $days=$_POST['days'];
        $nights=$_POST['nights'];
        $Package_Id=$_POST['Package_Id'];
        $pic=$_POST['DefultPic'];
                    $sql_upload="UPDATE `tbl_package` SET `Name`='$package_Name',`Type`='$Type',`Cost`=$cost,`Place_Id`=$place,`Description`='$description',`Picture`='$pic',"
                            . "`Number_Person`=$persons,`Days`=$days,`Nights`=$nights,`Last_Update_Time`=NOW() WHERE `Package_Id`=$Package_Id";
        $query_upload=  mysqli_query($con, $sql_upload);
        if($query_upload)
        {
            echo 'ok';
        }
        else 
        {
            echo 'no';
        }
    }
}
else 
{
    echo 'empty';
}
