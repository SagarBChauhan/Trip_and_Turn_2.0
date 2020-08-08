<?php
session_start();
include 'Connection.php';
if (!empty($_POST['package_Name'])&&!empty($_POST['Type'])&&!empty($_POST['description'])&&!empty($_POST['place'])&&!empty($_POST['cost']) &&!empty($_POST['persons'])&&!empty($_POST['days'])&&!empty($_POST['nights']) && !empty($_FILES['InputFile']['name']))
{
    $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp' ); 
    $path = '../upload/Image/package/'.$_POST['package_Name'].'/'; 
    if(!is_dir($path))
    {
        mkdir($path,0777,true);
    }
    if(!empty($_FILES['InputFile']))
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
                $sql="SELECT COUNT(*) as COUNT FROM `tbl_package` WHERE `Name`='$package_Name';";
                $result=  mysqli_query($con, $sql);
                while ($row = $result->fetch_assoc())
                {
                    $COUNT=$row['COUNT'];
                }
                if($COUNT==0)
                {
                    $sql_upload="INSERT INTO `tbl_package`(`Name`, `Type`, `Cost`, `Place_Id`, `Description`, `Picture`, `Number_Person`, `Days`, `Nights`, `Last_Update_Time`) VALUES ('$package_Name','$Type',$cost,$place,'$description','$path',$persons,$days,$nights,NOW())";
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
                else {
                    echo 'exist';
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
    echo 'empty';
}
