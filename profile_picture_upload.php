<?php
session_start();

include './operations/Connection.php';
$valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp' ); 
$path = 'upload/Image/dp/'.$_SESSION['lid'].$_SESSION['user'].'/'; 
if(!is_dir($path))
{
    mkdir($path,0777,true);
}
if(!empty($_POST['name']) || !empty($_POST['email']) || $_FILES['image'])
{
    $img = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];

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
            $sql_upload="UPDATE `tbl_user` SET `Profile_Picture`='$path',`Last_Update_Time`=NOW() WHERE `Login_id`=".$_SESSION['lid'];
            $query_upload=  mysqli_query($con, $sql_upload);
            if($query_upload)
            {
                $_SESSION['dp']=$path;
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