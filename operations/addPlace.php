<?php
session_start();
include 'Connection.php';
if (!empty($_POST['place_Name'])&&!empty($_POST['Type'])&&!empty($_POST['Description'])&&!empty($_POST['city']) && !empty($_FILES['InputFile']['name']))
{
    $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp' ); 
    $path = '../upload/Image/place/'.$_POST['place_Name'].'/'; 
    if(!is_dir($path))
    {
        mkdir($path,0777,true);
    }
    if(!empty($_FILES['InputFile']))
    {
        $img = $_FILES['InputFile']['name'];
        $tmp = $_FILES['InputFile']['tmp_name'];
        $place_Name=$_POST['place_Name'];
        $Type=$_POST['Type'];
        $Description=$_POST['Description'];
        $city=$_POST['city'];

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
                $sql="SELECT COUNT(*) as COUNT FROM `tbl_place` WHERE `Name`='$place_Name';";
                $result=  mysqli_query($con, $sql);
                while ($row = $result->fetch_assoc())
                {
                    $COUNT=$row['COUNT'];
                }
                if($COUNT==0)
                {
                    $sql_upload="INSERT INTO `tbl_place`(`Name`, `Type`, `Description`, `Pictures`, `City_Id`) VALUES ('$place_Name','$Type','$Description','$path',$city)";
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
