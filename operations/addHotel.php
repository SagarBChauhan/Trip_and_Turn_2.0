<?php
include './Connection.php';
if(!empty($_POST["Hotel_Name"])&&!empty($_POST["Type"])&&!empty($_POST["address"])&&!empty($_POST["Description"])&&!empty($_POST["contact"])&&!empty($_POST["Hotel_Name"])&&!empty($_POST["Website"])&&!empty($_POST["email"])&&!empty($_POST["city"]) && !empty($_FILES['InputFile']['name']))
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
                $sql="SELECT COUNT(*) as Count FROM `tbl_hotel` WHERE `Name`='$hotelname';";
                $result=  mysqli_query($con, $sql);
                while ($row = $result->fetch_assoc())
                {
                    $COUNT=$row['Count'];
                }
                if(!empty($COUNT)==0)
                {
                    $query="INSERT INTO `tbl_hotel`(`Name`, `Type`, `Address`, `City_Id`, `Contact_No`, `Email`, `Website`, `Description`,`Picture`,`Last_Update_Time`)". "VALUES ('$hotelname','$hoteltype','$hoteladress','$hcity','$contectno','$hotelemail','$hotelwebsite','$hoteldesc','$path','".date("Y-m-d \t h-i-s")."');";
                    $sql_insert = mysqli_query($con, $query);
                    if($sql_insert)
                    {   
                        $Hotel_Id=$con->insert_id;
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