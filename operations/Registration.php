<?php
session_start();
include './Connection.php';
date_default_timezone_set('Asia/Calcutta'); 

#Registration Step1: OTP Sending in Mail
if(isset($_POST['btn_send']))
{
    $string = '1234567890';
    $string_shuffled = str_shuffle($string);
    $otp = substr($string_shuffled, 1, 6);
    $fname=$_POST['firstname'];
    $mname=$_POST['middlename'];
    $lname=$_POST['lastname'];
    $email=$_POST['email'];
    
    $sql_check_email="SELECT * FROM `tbl_user` WHERE `Email`='$email';";
    $query_check =  mysqli_query($con, $sql_check_email);
    if($query_check->num_rows>0)
    {
        echo 'registered';
    }
    else 
    {
        include './Email.php';
        $sendMail=new Email();
        $from="tripandturntoursandtravels@gmail.com";
        $subject="cofirm OTP to register on Trip and Turn Tours and Travels";
        if (isset($_POST['btn_Resend'])){$subject="cofirm OTP to register on Trip and Turn Tours and Travels (Resent)";}
        else{$subject="cofirm OTP to register on Trip and Turn Tours and Travels";}
        $message="<center>
                    <div  style='border: solid 2px #1d69ab;    max-width: 22rem;    margin-top: 5%;    background-color: #f1f3f4a6;    border-radius: 5px;    margin-bottom: 1rem!important;    width: 400px;'>
                        <div style='border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 0;padding: .75rem 1.25rem;    margin-bottom: 0;    background-color: rgba(0,0,0,.03);    border-bottom: 1px solid rgba(0,0,0,.125);'>
                            OTP for Registration
                        </div>
                        <img  src='https://lh3.googleusercontent.com/gzGvhRXTms2ihHoGK_sZLUnrNzeWUZ7IzGWuifR-cyjBGQavPKrLhMvQSQobtN3uMf0FoEV2JDq5DDVIATeTpw23WcdA2CldhGDJlX4d8aOprThOp5Ynn4D7Az0r_2ziWenYhRsc7e6yH538Ty-TZmJIATzRKhgll9exaoNle7kGDuBx8ntR24kPTdTYIlr4Hlpf7ncowDSuZENN_hGsMuBzYnPPQM-ViZ3vSDbsp1MALeXWvS7hE9sChcuJsR6RRjjThP67RnZf_uXWj5vXAh0d6P_r7JNnfZJuer1qIKJU1maow3euEItADED6VZbdXN5oqBCfvsCJK_xpElUuSK0htAUXuaWTrp9iea7cKK-7w9eS8FawZrrgYLvWmdnbpGKFTCATOd_zEY4-85doOn4NtcsRXE1hGbZrqUkX4d9eCwtiBgL91nDGabadNLoz4X7ZdCgWghn3WSJ8V7voMFqhwEL31OQD9IxZsCD-XW_hMsEjpAUGnkVQ5ssXFdgUgh6i5QxlFlfGq2CqQX7GKlPNmt3-zQroCJnSwWMo5ZkrfMnq33RAQGrxH9g2XQBUvkCqb1IHRPda9d0DqYwKARWM3N7q2RgxWErCVuo=w250-h238-p-k-nu' style='object-fit:cover; margin:auto;     margin-top: 10%; margin-bottom: 10%; vertical-align: middle;    border-style: none;    width:75px; height:24px;    margin-left: 30%;    margin-right: 30%;' width='75' height='24'>
                        <input  type='text' style='    background-color: #4d90fe85;    color: white;padding:30px; width:65%;  margin:auto; margin-top:-2rem;text-align:center; font-size: 40px; border: solid 1px #ccc;border-radius: .25rem!important;    border-color: #ffc107!important;    overflow: visible;    font-family: inherit;box-sizing: border-box;' value='$otp' disabled></input> 
                        <div  style='flex: 1 1 auto;    padding: 1.25rem;    flex: 1 1 auto;    padding: 1.25rem;'>
                            <h5 style='margin-bottom: .75rem;'>
                              Hello $fname &nbsp; $lname,
                            </h5>
                            <p  style='margin-bottom: 0;    margin-top: 0;    display: block;    margin-block-start: 1em;    margin-block-end: 1em;    margin-inline-start: 0px;    margin-inline-end: 0px;'>
                              Your OTP for Registration on Trip and Turn Tours and Travels is provided above. Please Hurry up it is valid only for 
                              <b  style='color: #fff!important;    padding-left: 0.5rem!important;    padding-right: 0.5rem!important;    padding-top: 2px;    padding-bottom: 2px;    background-color: #dc3545!important;    font-weight: bolder;    border-radius: 1.25rem!important;'>
                                  &nbsp; 2 minutes 
                                  <i style='    font-weight: 900;    font-family: 'Font Awesome 5 Free';animation: fa-spin 1s infinite steps(8);    -webkit-font-smoothing: antialiased;    display: inline-block;    font-style: normal;    font-variant: normal;    text-rendering: auto;    line-height: 1;    color: #fff!important;'></i>
                              </b>   
                              after generation.
                            </p>
                        </div>
                        <div style='border-color: #1d69ab!important; border-radius: 0 0 calc(.25rem - 1px) calc(.25rem - 1px);    background-color: transparent!important;padding: .75rem 1.25rem;    background-color: rgba(0,0,0,.03);    border-top: 1px solid rgba(0,0,0,.125);'> 
                              <button style=' display: inline-block;    font-weight: 400;    color: #212529;    text-align: center;    vertical-align: middle;    -webkit-user-select: none;    -moz-user-select: none;    -ms-user-select: none;    user-select: none;    background-color: transparent;    border: 1px solid transparent;    padding: .375rem .75rem;    font-size: 1rem;    line-height: 1.5;    border-radius: .25rem;    transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;   box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;    color: #212529;    background-color: #ffc107;    border-color: #ffc107;'>
                                  Click here to confirm
                              </button>
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
        $to=$email;
        $sm=$sendMail->send($from, $subject, $message, $to);
        if(isset($sm)==1)
        {
            if(isset($_POST['contact']))
            {
                $_SESSION["contactNo"]=$_POST['contact'];
            }
            $_SESSION['email']=$email;
            $_SESSION['fname']=$fname;
            $_SESSION['mname']=$mname;
            $_SESSION['lname']=$lname;
            $_SESSION['OTP']=$otp;
            $_SESSION['expire']=  time()+(2*60);
            
            $_SESSION['OP']='OTP';
            echo 'ok';
        }
        else{
            echo 'no';
        }
        //header("location:Register_OTP_Check.php");    
    }
}

#Registration Step2.2:Resending OTP in Mail
if(isset($_POST['email'])&&!isset($_POST['btn_send']))
{
    if(!isset($_SESSION['OTP']))
    {
        echo 'Please Restart.';
    }
    else{
        $otp=$_SESSION['OTP'];
    }
    $fname=$_POST['firstname'];
    $mname=$_POST['middlename'];
    $lname=$_POST['lastname'];
    $email=$_POST['email'];
    
    
    $sql_check_email="SELECT * FROM `tbl_user` WHERE `Email`='$email';";
    $query_check =  mysqli_query($con, $sql_check_email);
    if($query_check->num_rows>0)
    {
        echo 'registered';
    }
    else 
    {
        include './Email.php';
        $sendMail=new Email();
        $from="tripandturntoursandtravels@gmail.com";
        $subject="cofirm OTP to register on Trip and Turn Tours and Travels (Resent)";
        $message="Hello ".$fname." ".$lname.",<br> cofirm your OTP: <input type='text' style='box-shadow: 2px 2px 2px gray;' value='$otp'></input> to register on Trip and Turn Tours and Travels.";
        $to=$email;
        $sm=$sendMail->send($from, $subject, $message, $to);
        if(isset($sm)==1)
        {
            if(isset($_POST['contact']))
            {
                $_SESSION["contactNo"]=$_POST['contact'];
            }
            $_SESSION['email']=$email;
            $_SESSION['fname']=$fname;
            $_SESSION['mname']=$mname;
            $_SESSION['lname']=$lname;
            $_SESSION['OTP']=$otp;
            $_SESSION['expire']=  time()+(2*60);
            echo 'ok';
        }
        else{
            echo 'no';
        }
        //header("location:Register_OTP_Check.php");    
    }
}

#Registration Step2: OTP Confirm
if(isset($_POST['btn_Confirm']))
{
    // $uotp=$_POST['n1']+$_POST['n2']+$_POST['n3']+$_POST['n4']+$_POST['n5']+$_POST['n6'];
     $uotp=$_POST['uotp'];
     if(time() > $_SESSION['expire'])
     {
         unset($_SESSION['OTP']);
     }
     if (isset($_SESSION["OTP"]))
     {
         if($_SESSION["OTP"]==$uotp)
         {
            $_SESSION['OP']="credential";
             echo 'ok';
         }
         else{
             echo 'no';
         }
     }
     else 
     {
         echo 'expiered';
     }
     //header("location:Register_OTP_Check.php");
}

#Registration Step3: Creation of Credential/Login Account
if(isset($_POST['btn_Save']))
{
    $username=$_POST["username"];
    $password=$_POST["password"];

    $sql_check_username="SELECT * FROM `tbl_login` WHERE `User_Name`='$username';";
    $query_check=  mysqli_query($con, $sql_check_username);
    if($query_check->num_rows>0)
    {
        echo 'unavailable';

    }
    else
    {
        $query_login_insert="INSERT INTO `tbl_login`( `User_Name`, `Password`, `Type`, `Status`, `Last_Update_Time`) VALUES ('$username',MD5('$password'),'Customer',1,NOW());";
        $sql_login_insert = mysqli_query($con, $query_login_insert);
        if ($sql_login_insert)
        {   
            $last=$con->insert_id;
            $_SESSION['user']=$username;
            $_SESSION['ac_ty']="Customer";
            $_SESSION['lid']=$last;
            
            $_SESSION['OP']="register";
            
            include './Email.php';
            $sendMail=new Email();
            $from="tripandturntoursandtravels@gmail.com";
            $subject="Successful account Created on Trip and Turn Tours and Travels";
            $message="<center>
                    <div  style='border: solid 2px #1d69ab;    max-width: 22rem;    margin-top: 5%;    background-color: #f1f3f4a6;    border-radius: 5px;    margin-bottom: 1rem!important;    width: 400px;'>
                        <div style='border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 0;padding: .75rem 1.25rem;    margin-bottom: 0;    background-color: rgba(0,0,0,.03);    border-bottom: 1px solid rgba(0,0,0,.125);'>
                            Account creation successful
                        </div>
                        <img  src='https://lh3.googleusercontent.com/gzGvhRXTms2ihHoGK_sZLUnrNzeWUZ7IzGWuifR-cyjBGQavPKrLhMvQSQobtN3uMf0FoEV2JDq5DDVIATeTpw23WcdA2CldhGDJlX4d8aOprThOp5Ynn4D7Az0r_2ziWenYhRsc7e6yH538Ty-TZmJIATzRKhgll9exaoNle7kGDuBx8ntR24kPTdTYIlr4Hlpf7ncowDSuZENN_hGsMuBzYnPPQM-ViZ3vSDbsp1MALeXWvS7hE9sChcuJsR6RRjjThP67RnZf_uXWj5vXAh0d6P_r7JNnfZJuer1qIKJU1maow3euEItADED6VZbdXN5oqBCfvsCJK_xpElUuSK0htAUXuaWTrp9iea7cKK-7w9eS8FawZrrgYLvWmdnbpGKFTCATOd_zEY4-85doOn4NtcsRXE1hGbZrqUkX4d9eCwtiBgL91nDGabadNLoz4X7ZdCgWghn3WSJ8V7voMFqhwEL31OQD9IxZsCD-XW_hMsEjpAUGnkVQ5ssXFdgUgh6i5QxlFlfGq2CqQX7GKlPNmt3-zQroCJnSwWMo5ZkrfMnq33RAQGrxH9g2XQBUvkCqb1IHRPda9d0DqYwKARWM3N7q2RgxWErCVuo=w250-h238-p-k-nu' style='object-fit:cover; margin:auto;     margin-top: 10%; margin-bottom: 7%; vertical-align: middle;    border-style: none;   width:170px; height:60px;' width='75' height='24'>
                        <div  style='flex: 1 1 auto;    padding: 1.25rem;    flex: 1 1 auto;    padding: 1.25rem;'>
                            <h5 style='margin-bottom: .75rem;'>
                              Hello ".$_SESSION['fname']." ".$_SESSION['lname'].",
                            </h5>
                            <p  style='margin-bottom: 0;    margin-top: 0;    display: block;    margin-block-start: 1em;    margin-block-end: 1em;    margin-inline-start: 0px;    margin-inline-end: 0px;'>
                              You have created your account successfully,
                              <br>
                              please keep remember below username:
                              <br>
                              <b  style='color: #fff!important;    padding-left: 0.5rem!important;    padding-right: 0.5rem!important;    padding-top: 2px;    padding-bottom: 2px;    background-color: #1d69ab!important;    font-weight: bolder;    border-radius: 1.25rem!important;'>
                                &nbsp;".$_SESSION['user']." 
                              </b>
                              <br>
                              when you next time visit us.
                              <br>
                              Thank you for joining us.
                              <hr>
                              <h5>Keep Traveling, Keep Exploring.</h5>
                            </p>
                        </div>
                        <div style='border-color: #1d69ab!important; border-radius: 0 0 calc(.25rem - 1px) calc(.25rem - 1px);    background-color: transparent!important;padding: .75rem 1.25rem;    background-color: rgba(0,0,0,.03);    border-top: 1px solid rgba(0,0,0,.125);'> 
                            <a href='Login.php'  style=' text-decoration:none; display: inline-block; cursor: pointer;   font-weight: 400;    color: #212529;    text-align: center;    vertical-align: middle;    -webkit-user-select: none;    -moz-user-select: none;    -ms-user-select: none;    user-select: none;    background-color: transparent;    border: 1px solid transparent;    padding: .375rem .75rem;    font-size: 1rem;    line-height: 1.5;    border-radius: .25rem;    transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;   box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;    color: #212529;    background-color: #ffc107;    border-color: #ffc107;'>
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
            else {
                echo 'ok';
            }
            echo 'ok';
        }
        else
        {
            echo 'no';
        }
    }
}

#Registration Step4: Registartion of Personal details
if(isset($_POST['btn_Register']))
{
    $firstname=$_SESSION['fname'];
    $middlename=$_SESSION['mname'];
    $lastname=$_SESSION['lname'];
    if($_POST["gender"]=="Male")
    {
        $gender=1; 
    }
    elseif($_POST["gender"]=="Female")
    {
        $gender=0;
    }
    $DOB=$_POST["DOB"];
    $date = substr($DOB, 0,10);
    $DOB = substr($date, 6,10)."-".substr($date, 0,2)."-".substr($date, 3,2);
    $address=$_POST["address"];
    $countryid=$_POST["country"];
    $stateid=$_POST["state"];
    $cityid=$_POST["city"];
    $pincode=$_POST["pincode"];
    $contact=$_SESSION['contactNo'];
    $email=$_SESSION['email'];
    $loginid=$_SESSION['lid'];
//    $profilepicture=$_SESSION['dp'];

    $query_Register="INSERT INTO `tbl_user`(`First_Name`, `Middle_Name`, `Last_Name`, `Gender`, `DOB`, `Address`, `Country_Id`, `State_Id`, `City_Id`, `PIN_Code`, `Contact_No`, `Email`, `Login_id`,  `Registration_Date`, `Last_Update_Time`) VALUES ('$firstname','$middlename','$lastname',$gender,'$DOB','$address',$countryid,$stateid,$cityid,$pincode,'$contact','$email',$loginid,NOW(),NOW());";
    $sql_Register = mysqli_query($con, $query_Register);
    if ($sql_Register)
    {
        $_SESSION['OP']="done";
        
        include './Email.php';
        $sendMail=new Email();
        $from="tripandturntoursandtravels@gmail.com";
        $subject="Successful deatils registration on Trip and Turn Tours and Travels";
        $message="<center>
        <div  style='border: solid 2px #1d69ab;    max-width: 22rem;    margin-top: 5%;    background-color: #f1f3f4a6;    border-radius: 5px;    margin-bottom: 1rem!important;    width: 400px;'>
            <div style='border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 0;padding: .75rem 1.25rem;    margin-bottom: 0;    background-color: rgba(0,0,0,.03);    border-bottom: 1px solid rgba(0,0,0,.125);'>
                Registration successful
            </div>
            <img  src='https://lh3.googleusercontent.com/gzGvhRXTms2ihHoGK_sZLUnrNzeWUZ7IzGWuifR-cyjBGQavPKrLhMvQSQobtN3uMf0FoEV2JDq5DDVIATeTpw23WcdA2CldhGDJlX4d8aOprThOp5Ynn4D7Az0r_2ziWenYhRsc7e6yH538Ty-TZmJIATzRKhgll9exaoNle7kGDuBx8ntR24kPTdTYIlr4Hlpf7ncowDSuZENN_hGsMuBzYnPPQM-ViZ3vSDbsp1MALeXWvS7hE9sChcuJsR6RRjjThP67RnZf_uXWj5vXAh0d6P_r7JNnfZJuer1qIKJU1maow3euEItADED6VZbdXN5oqBCfvsCJK_xpElUuSK0htAUXuaWTrp9iea7cKK-7w9eS8FawZrrgYLvWmdnbpGKFTCATOd_zEY4-85doOn4NtcsRXE1hGbZrqUkX4d9eCwtiBgL91nDGabadNLoz4X7ZdCgWghn3WSJ8V7voMFqhwEL31OQD9IxZsCD-XW_hMsEjpAUGnkVQ5ssXFdgUgh6i5QxlFlfGq2CqQX7GKlPNmt3-zQroCJnSwWMo5ZkrfMnq33RAQGrxH9g2XQBUvkCqb1IHRPda9d0DqYwKARWM3N7q2RgxWErCVuo=w250-h238-p-k-nu' style='object-fit:cover; margin:auto;     margin-top: 10%; margin-bottom: 7%; vertical-align: middle;    border-style: none;   width:170px; height:60px;' width='75' height='24'>
            <div  style='flex: 1 1 auto;    padding: 1.25rem;    flex: 1 1 auto;    padding: 1.25rem;'>
                <h5 style='margin-bottom: .75rem;'>
                  Hello ".$_SESSION['fname']." ".$_SESSION['lname'].",
                </h5>
                <p  style='margin-bottom: 0;    margin-top: 0;    display: block;    margin-block-start: 1em;    margin-block-end: 1em;    margin-inline-start: 0px;    margin-inline-end: 0px;'>
                  Have registered your account successfully, 
                  <br>
                  you can login with below username
                  <br>
                  <b  style='color: #fff!important;    padding-left: 0.5rem!important;    padding-right: 0.5rem!important;    padding-top: 2px;    padding-bottom: 2px;    background-color: #dc3545!important;    font-weight: bolder;    border-radius: 1.25rem!important;'>
                      &nbsp;".$_SESSION['user']." 
                  </b>
                  <br>
                  and your password anytime.
                  <br>
                  Thank you for joining us.
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
         echo 'ok';

    }
    else
    {
        echo 'no';
    }
}

