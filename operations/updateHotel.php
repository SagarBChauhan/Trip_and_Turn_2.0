<?php
include './Connection.php';
if(!empty($_POST["HId"])&&!empty($_POST["Hotel_Name"])&&!empty($_POST["Type"])&&!empty($_POST["address"])&&!empty($_POST["Description"])&&!empty($_POST["contact"])&&!empty($_POST["Hotel_Name"])&&!empty($_POST["Website"])&&!empty($_POST["email"])&&!empty($_POST["city"]))
{
    $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp' ); 
    $path = '../upload/Image/hotel/'.$_POST['Hotel_Name'].'/'; 
    if(!is_dir($path))
    {
        mkdir($path,0777,true);
    }
    if(!empty($_FILES['InputFile']))
    {
        $img = $_FILES['InputFile']['name'];
        $tmp = $_FILES['InputFile']['tmp_name'];
        
        $hotelname=$_POST['Hotel_Name'];
        $hoteltype=$_POST['Type'];
        $hoteladress=$_POST['address'];
        $hoteldesc=$_POST['Description'];
        $contectno=$_POST['contact'];
        $hotelwebsite=$_POST['Website'];
        $hotelemail=$_POST['email'];
        $hcity=$_POST['city'];
        $hid=$_POST["HId"];
        $DefultPic=$_POST["DefultPic"];

        
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
                $query="UPDATE `tbl_hotel` SET `Name`='$hotelname',`Type`='$hoteltype',`Address`='$hoteladress',`City_Id`='$hcity',`Contact_No`='$contectno',`Email`='$hotelemail',`Website`='$hotelwebsite',`Description`='$hoteldesc',Picture='$path',`Last_Update_Time`=NOW() WHERE `Hotel_Id`=$hid;";
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
        } 
        else 
        {
            echo 'invalid';
        }
    }
    else 
    {
        $query="UPDATE `tbl_hotel` SET `Name`='$hotelname',`Type`='$hoteltype',`Address`='$hoteladress',`City_Id`='$hcity',`Contact_No`='$contectno',`Email`='$hotelemail',`Website`='$hotelwebsite',`Description`='$hoteldesc',Picture='$DefultPic',`Last_Update_Time`=NOW() WHERE `Hotel_Id`=$hid;";
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
}
else {
    echo 'empty';    
}