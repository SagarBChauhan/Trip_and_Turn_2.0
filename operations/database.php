<?php
define("HOST", "localhost");
define("USER", "root");
define("PASSWORD", "root");
define("DATABASE", "tt2");

$con=mysqli_connect(HOST,USER,PASSWORD,DATABASE);
session_start();
#Login
if(isset($_POST['btn_Login']))
{
    $usename=trim($_POST['User_Name']);
    $pass= trim($_POST['Password']);
    $password=  md5($pass);
    $sql_select="SELECT * FROM `tbl_login` WHERE `User_Name`='$usename';";
    $result=  mysqli_query($con, $sql_select);
    while ($row=$result -> fetch_assoc())
    {
        $login_id=$row['Login_id'];
        $User_Name=$row['User_Name'];
        $Password=$row['Password'];
        $Type=$row['Type'];
        $Status=$row['Status'];
    }
    if($con->affected_rows>0)
    {
        $sql_select="SELECT * FROM `tbl_user` WHERE `Login_id`='$login_id';";
        $result=  mysqli_query($con, $sql_select);
        while ($row=$result -> fetch_assoc())
        {
            $Profile_Picture=$row['Profile_Picture'];
            $email=$row['Email'];
            $uid=$row['User_Id'];
        }
        if($Password==$password && $User_Name=$usename)
        {
            if($Status==1)
            {
                echo 'ok';
                $_SESSION['lid']=$login_id;
                $_SESSION['uid']=$uid;
                $_SESSION['user']=$User_Name;
                $_SESSION['ac_ty']=$Type;
                if(isset($Profile_Picture))
                {
                    $_SESSION['dp']=$Profile_Picture; 
                }
                if(isset($email))
                {
                    $_SESSION['email']=$email;
                }
                if($Type=="Admin")
                {
                    echo 'admin';
                }
            }
            else if($Status==2) 
            {
                echo "deactivated";
            }
            else 
            {
                echo 'found';
            }
        }
        else 
        {
            echo "Invalid username or password";
        } 
    }
    else 
    {
        echo "Invalid username or password";
    } 
} 

#Send Enquiry
if(isset($_POST['btn_Send_Msg']))
{
    $EC_Id=$_POST['subject'];
    $Name=$_POST['name'];
    $Contact_No=$_POST['contatct'];
    $Email=$_POST['email'];
    $Massage=$_POST['message'];
    $query_Insert_Massage="INSERT INTO `tbl_enquiry`(`EC_Id`, `Name`, `Contact_No`, `Email`, `Message`,Status, `Last_Update_Time`) VALUES ($EC_Id,'$Name','$Contact_No','$Email','$Massage',2,NOW());";
    $Insert_msg=  mysqli_query($con, $query_Insert_Massage);
    if($Insert_msg)
    {
        echo 'ok';
    }
    else 
    {
        echo 'no';
    }
}

#change password
if (isset($_POST['btn_Change_password']))
{
    $sql_select="SELECT `Password` FROM `tbl_login` WHERE Login_id=".$_SESSION['lid']." AND Password=MD5('".$_POST['password']."');";
    $result=  mysqli_query($con, $sql_select);
    while ($row=$result->fetch_assoc())
    {
        $pass=$row['Password'];
    }
    if(isset($pass))
    {
        if ($_POST['password']!=$_POST['new_password'])
        {
            $sql_update_pass="UPDATE `tbl_login` SET `Password`=MD5(".$_POST['new_password'].") WHERE Login_id=".$_SESSION['lid'].";";
            $query_update_pass=  mysqli_query($con, $sql_update_pass);
            if($query_update_pass)
            {
                include './Email.php';
                $sendMail=new Email();
                $from="tripandturntoursandtravels@gmail.com";
                $subject="Password has been changed";
                $message="<center>
                <div  style='border: solid 2px #1d69ab;    max-width: 22rem;    margin-top: 5%;    background-color: #f1f3f4a6;    border-radius: 5px;    margin-bottom: 1rem!important;    width: 400px;'>
                    <div style='border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 0;padding: .75rem 1.25rem;    margin-bottom: 0;    background-color: rgba(0,0,0,.03);    border-bottom: 1px solid rgba(0,0,0,.125);'>
                        Password changed
                    </div>
                    <img  src='https://lh3.googleusercontent.com/gzGvhRXTms2ihHoGK_sZLUnrNzeWUZ7IzGWuifR-cyjBGQavPKrLhMvQSQobtN3uMf0FoEV2JDq5DDVIATeTpw23WcdA2CldhGDJlX4d8aOprThOp5Ynn4D7Az0r_2ziWenYhRsc7e6yH538Ty-TZmJIATzRKhgll9exaoNle7kGDuBx8ntR24kPTdTYIlr4Hlpf7ncowDSuZENN_hGsMuBzYnPPQM-ViZ3vSDbsp1MALeXWvS7hE9sChcuJsR6RRjjThP67RnZf_uXWj5vXAh0d6P_r7JNnfZJuer1qIKJU1maow3euEItADED6VZbdXN5oqBCfvsCJK_xpElUuSK0htAUXuaWTrp9iea7cKK-7w9eS8FawZrrgYLvWmdnbpGKFTCATOd_zEY4-85doOn4NtcsRXE1hGbZrqUkX4d9eCwtiBgL91nDGabadNLoz4X7ZdCgWghn3WSJ8V7voMFqhwEL31OQD9IxZsCD-XW_hMsEjpAUGnkVQ5ssXFdgUgh6i5QxlFlfGq2CqQX7GKlPNmt3-zQroCJnSwWMo5ZkrfMnq33RAQGrxH9g2XQBUvkCqb1IHRPda9d0DqYwKARWM3N7q2RgxWErCVuo=w250-h238-p-k-nu' style='object-fit:cover; margin:auto;     margin-top: 10%; margin-bottom: 7%; vertical-align: middle;    border-style: none;   width:170px; height:60px;' width='75' height='24'>
                    <div  style='flex: 1 1 auto;    padding: 1.25rem;    flex: 1 1 auto;    padding: 1.25rem;'>
                        <h5 style='margin-bottom: .75rem;'>
                          Hello ".$_SESSION['user'].",
                        </h5>
                        <p  style='margin-bottom: 0;    margin-top: 0;    display: block;    margin-block-start: 1em;    margin-block-end: 1em;    margin-inline-start: 0px;    margin-inline-end: 0px;'>
                          We have recently noticed that
                          <br>
                          password for your account
                          <br>
                          <b  style='color: #fff!important;    padding-left: 0.5rem!important;    padding-right: 0.5rem!important;    padding-top: 2px;    padding-bottom: 2px;    background-color: #dc3545!important;    font-weight: bolder;    border-radius: 1.25rem!important;'>
                              &nbsp;".$_SESSION['user']." 
                          </b>
                          <br>
                          has been chaged on ".  date("d/m/Y h:m:s").".
                          <br>
                          Thank you.
                          <hr>
                          <h5>Keep Traveling, Keep Exploring.</h5>
                        </p>
                    </div>
                    <div style='border-color: #1d69ab!important; border-radius: 0 0 calc(.25rem - 1px) calc(.25rem - 1px);    background-color: transparent!important;padding: .75rem 1.25rem;    background-color: rgba(0,0,0,.03);    border-top: 1px solid rgba(0,0,0,.125);'> 
                        <a href='Login.php' style='text-decoration:none;  display: inline-block; cursor: pointer;   font-weight: 400;    color: #212529;    text-align: center;    vertical-align: middle;    -webkit-user-select: none;    -moz-user-select: none;    -ms-user-select: none;    user-select: none;    background-color: transparent;    border: 1px solid transparent;    padding: .375rem .75rem;    font-size: 1rem;    line-height: 1.5;    border-radius: .25rem;    transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;   box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;    color: #212529;    background-color: #ffc107;    border-color: #ffc107;'>
                            Login now
                        </a>
                    </div>
                </div>
                <ul  style='padding-left: 0;    margin-bottom: 0;    list-style: none; justify-content: center;'>
                    <li>
                        <a href='index.php' style='display: block; padding: .5rem 1rem;    color: #007bff; text-decoration: none;  background-color: transparent;'>Visit our website</a> 
                    </li>
                    <li>
                        <a href='index.php'  style='display: block; padding: .5rem 1rem;    color: #007bff; text-decoration: none;  background-color: transparent;'>Contact us</a> 
                    </li>
                    <li>
                        <a href='idex.php'  style='display: block; padding: .5rem 1rem;    color: #007bff; text-decoration: none;  background-color: transparent;'>About us</a> 
                    </li>
                </ul>
                </center>";
                $to=$_SESSION['email'];
                $sm=$sendMail->send($from, $subject, $message, $to);
                if(isset($sm)==1)
                {
                    echo 'sent';
                }
                else 
                {
                    echo 'ok';
                }
            }
            else
            {
                echo "no";
            }
        }    
        else 
        {
            echo "same";
        }
    }
    else
    {
        echo "incorrect";
    }
}


#Passport Assistance Step1
if(isset($_POST['sub_Step1_Details']))
{
    $firstname=$_POST['firstname'];
    $middlename=$_POST['middlename'];
    $lastname=$_POST['lastname'];
    $gender=$_POST['gender'];
    if($gender=='Male')
    {
        $gender=1;
    }
    else {
        $gender=0;
    }
    $DOB=$_POST['DOB'];
    $date = substr($DOB, 0,10);
    $DOB = substr($date, 6,10)."-".substr($date, 0,2)."-".substr($date, 3,2);
    $addharno=$_POST['addharno'];
    $address=$_POST['address'];
    $pincode=$_POST['pincode'];
    $state=$_POST['state'];
    $city=$_POST['city'];
    $email=$_POST['email'];
    $contact=$_POST['contact'];

    $query_Insert="INSERT INTO `tbl_passport`(`First_Name`, `Middel_Name`, `Last_Name`, `Gender`, `Date_Of_Birth`, `Address`, `State_Id`, `City_Id`, `Pin_Code`, `Contact_No`, `Email`, `Addhar_Card_No`, `Status`, `Last_Update_Time`) "
            . "VALUES ('$firstname','$middlename','$lastname',$gender,'$DOB','$address',$state,$city,$pincode,'$contact','$email','$addharno',0,NOW())";
    $Insert=  mysqli_query($con, $query_Insert);
    if($Insert)
    {
        $last=$con->insert_id;
        $_SESSION['PAStep']=1;
        $_SESSION['paid']=$last;
        $_SESSION['fname']=$firstname;
        $_SESSION['email']=$email;
        echo 'ok';
    }
    else 
    {
        echo 'no';
    }
    
}

#Passport Assistance Step2
if(isset($_FILES['birthproof'])&&isset($_FILES['addressproof'])&&isset($_FILES['addharproof']))
{
    $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp','pdf' ); 
    $path = '../upload/doc/PA/'; 
    if(!is_dir($path))
    {
        mkdir($path,0777,true);
    }
    if(!empty($_FILES['birthproof']['name']))
    {
        $file1 = $_FILES['birthproof']['name'];
        $tmp = $_FILES['birthproof']['tmp_name'];

        // get uploaded file's extension
        $ext = strtolower(pathinfo($file1, PATHINFO_EXTENSION));

        // can upload same image using rand function
        $final = rand(1000,1000000).$file1;

        // check's valid format
        if(in_array($ext, $valid_extensions)) 
        { 
            $path = $path.strtolower($final); 

            if(move_uploaded_file($tmp,$path)) 
            {
                $sql_upload="UPDATE `tbl_passport` SET `Birth_proof`='$path',`Last_Update_Time`=NOW() WHERE `Id`=".$_SESSION['paid'];
                $query_upload=  mysqli_query($con, $sql_upload);
                if($query_upload)
                {
                    $_SESSION['bip']=$path;
                    echo 'ok1';
                }
                else 
                {
                    echo 'can not upload Birth proof file';
                }
            }
        } 
        else 
        {
            echo 'invalid Birth proof file..';
        }
    }
    else
    {
        echo '#1. Please select Birth proof file';
    }
    
    if(!empty($_FILES['addressproof']['name']))
    {
        $file2 = $_FILES['addressproof']['name'];
        $tmp = $_FILES['addressproof']['tmp_name'];

        // get uploaded file's extension
        $ext = strtolower(pathinfo($file2, PATHINFO_EXTENSION));

        // can upload same image using rand function
        $final2 = rand(1000,1000000).$file2;

        // check's valid format
        if(in_array($ext, $valid_extensions)) 
        { 
            $path = $path.strtolower($final2); 

            if(move_uploaded_file($tmp,$path)) 
            {
                $sql_upload="UPDATE `tbl_passport` SET `Address_proof`='$path',`Last_Update_Time`=NOW() WHERE `Id`=".$_SESSION['paid'];
                $query_upload=  mysqli_query($con, $sql_upload);
                if($query_upload)
                {
                    $_SESSION['addp']=$path;
                    echo 'ok2';
                }
                else 
                {
                    echo 'can not upload address proff file..';
                }
            }
        } 
        else 
        {
            echo 'invalid Address proff file..';
        }
    }
    else
    {
        echo '#2. Please select Address proof file';
    }
    
    if(!empty($_FILES['addharproof']['name']))
    {
        $file1 = $_FILES['addharproof']['name'];
        $tmp = $_FILES['addharproof']['tmp_name'];

        // get uploaded file's extension
        $ext = strtolower(pathinfo($file1, PATHINFO_EXTENSION));

        // can upload same image using rand function
        $final = rand(1000,1000000).$file1;

        // check's valid format
        if(in_array($ext, $valid_extensions)) 
        { 
            $path = $path.strtolower($final); 

            if(move_uploaded_file($tmp,$path)) 
            {
                $sql_upload="UPDATE `tbl_passport` SET `Addhar_Card`='$path',`Last_Update_Time`=NOW() WHERE `Id`=".$_SESSION['paid'];
                $query_upload=  mysqli_query($con, $sql_upload);
                if($query_upload)
                {
                    $_SESSION['aadhp']=$path;
                    echo 'ok3';
                }
                else 
                {
                    echo 'can not upload Addhar card..';
                }
            }
        } 
        else 
        {
            echo 'invalid Addhar card file';
        }
    }
    else
    {
        echo '#3. Please select Aadhar proof file';
    }
    if (isset($_SESSION['bip'])&&isset($_SESSION['addp'])&&isset($_SESSION['aadhp']))
    {
        $_SESSION['PAStep']=2;
    }
}

#Passport Assistance Step3
if(isset($_POST['btn_PA_Done']))
{
    $prmode=$_POST['prmode'];
    $pymode=$_POST['pymode'];
    $amt=$_POST['amt'];
    $Bank=$_POST['Bank'];
    $IFSC=$_POST['IFSC'];
    $ACNO=$_POST['ACNO'];

    $query_Insert="INSERT INTO `tbl_payment`(`Amount`, `Payment_Method`, `Account_No`, `Bank_Name`, `IFSC_Code`, `Owner_AC_No`, `Owner_Bank_Name`, `Owner_IFSC_Code`, `Last_Update_Time`) "
            . "VALUES ('$amt','$pymode','$ACNO','$Bank','$IFSC','100002228291','ICICICI','UCSA22',NOW());";
    $Insert=  mysqli_query($con, $query_Insert);
    if($Insert)
    {
        $paymentid=$con->insert_id;
        $sql_update="UPDATE `tbl_passport` SET `Mode`='$prmode',`Payment_Id`=$paymentid,`Status`=1,`Last_Update_Time`=NOW() WHERE`Id`=".$_SESSION['paid'];
        $query_update=  mysqli_query($con, $sql_update);
        if($query_update)
        {
            include './Email.php';
            $sendMail=new Email();
            $from="tripandturntoursandtravels@gmail.com";
            $subject="Your Request for Passport is accepted";
            $message="<center>
            <div  style='border: solid 2px #1d69ab;    max-width: 22rem;    margin-top: 5%;    background-color: #f1f3f4a6;    border-radius: 5px;    margin-bottom: 1rem!important;    width: 400px;'>
                <div style='border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 0;padding: .75rem 1.25rem;    margin-bottom: 0;    background-color: rgba(0,0,0,.03);    border-bottom: 1px solid rgba(0,0,0,.125);'>
                    Successfully Requested
                </div>
                <img  src='https://lh3.googleusercontent.com/gzGvhRXTms2ihHoGK_sZLUnrNzeWUZ7IzGWuifR-cyjBGQavPKrLhMvQSQobtN3uMf0FoEV2JDq5DDVIATeTpw23WcdA2CldhGDJlX4d8aOprThOp5Ynn4D7Az0r_2ziWenYhRsc7e6yH538Ty-TZmJIATzRKhgll9exaoNle7kGDuBx8ntR24kPTdTYIlr4Hlpf7ncowDSuZENN_hGsMuBzYnPPQM-ViZ3vSDbsp1MALeXWvS7hE9sChcuJsR6RRjjThP67RnZf_uXWj5vXAh0d6P_r7JNnfZJuer1qIKJU1maow3euEItADED6VZbdXN5oqBCfvsCJK_xpElUuSK0htAUXuaWTrp9iea7cKK-7w9eS8FawZrrgYLvWmdnbpGKFTCATOd_zEY4-85doOn4NtcsRXE1hGbZrqUkX4d9eCwtiBgL91nDGabadNLoz4X7ZdCgWghn3WSJ8V7voMFqhwEL31OQD9IxZsCD-XW_hMsEjpAUGnkVQ5ssXFdgUgh6i5QxlFlfGq2CqQX7GKlPNmt3-zQroCJnSwWMo5ZkrfMnq33RAQGrxH9g2XQBUvkCqb1IHRPda9d0DqYwKARWM3N7q2RgxWErCVuo=w250-h238-p-k-nu' style='object-fit:cover; margin:auto;     margin-top: 10%; margin-bottom: 7%; vertical-align: middle;    border-style: none;   width:170px; height:60px;' width='75' height='24'>
                <div  style='flex: 1 1 auto;    padding: 1.25rem;    flex: 1 1 auto;    padding: 1.25rem;'>
                    <h5 style='margin-bottom: .75rem;'>
                      Hello ".$_SESSION['fname'].",
                    </h5>
                    <p  style='margin-bottom: 0;    margin-top: 0;    display: block;    margin-block-start: 1em;    margin-block-end: 1em;    margin-inline-start: 0px;    margin-inline-end: 0px;'>
                      You have applied for passport recently, it will take 7 working day to procced
                      <br>
                      Your Transaction Id is 
                      <br>
                      <b  style='color: #fff!important;    padding-left: 0.5rem!important;    padding-right: 0.5rem!important;    padding-top: 2px;    padding-bottom: 2px;    background-color: #dc3545!important;    font-weight: bolder;    border-radius: 1.25rem!important;'>
                          &nbsp;".$_SESSION['paid']." 
                      </b>
                      <br>
                      applied on  ".  date("d/m/Y h:m:s").".
                      <br>
                      Thank you.
                      <hr>
                      <h5>Keep Traveling, Keep Exploring.</h5>
                    </p>
                </div>
                <div style='border-color: #1d69ab!important; border-radius: 0 0 calc(.25rem - 1px) calc(.25rem - 1px);    background-color: transparent!important;padding: .75rem 1.25rem;    background-color: rgba(0,0,0,.03);    border-top: 1px solid rgba(0,0,0,.125);'> 
                    <a href='Login.php' style='text-decoration:none;  display: inline-block; cursor: pointer;   font-weight: 400;    color: #212529;    text-align: center;    vertical-align: middle;    -webkit-user-select: none;    -moz-user-select: none;    -ms-user-select: none;    user-select: none;    background-color: transparent;    border: 1px solid transparent;    padding: .375rem .75rem;    font-size: 1rem;    line-height: 1.5;    border-radius: .25rem;    transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;   box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;    color: #212529;    background-color: #ffc107;    border-color: #ffc107;'>
                        Login now
                    </a>
                </div>
            </div>
            <ul  style='padding-left: 0;    margin-bottom: 0;    list-style: none; justify-content: center;'>
                <li>
                    <a href='index.php' style='display: block; padding: .5rem 1rem;    color: #007bff; text-decoration: none;  background-color: transparent;'>Visit our website</a> 
                </li>
                <li>
                    <a href='index.php'  style='display: block; padding: .5rem 1rem;    color: #007bff; text-decoration: none;  background-color: transparent;'>Contact us</a> 
                </li>
                <li>
                    <a href='idex.php'  style='display: block; padding: .5rem 1rem;    color: #007bff; text-decoration: none;  background-color: transparent;'>About us</a> 
                </li>
            </ul>
            </center>";
            $to=$_SESSION['email'];
            $sm=$sendMail->send($from, $subject, $message, $to);
            echo 'done';
        }
        else 
        {
            echo 'no';
        }
    }
    else 
    {
        echo 'notpaid';
    }
    
}