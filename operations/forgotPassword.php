<?php
include './Connection.php';
session_start();
if (isset($_POST['btn_Check']))
{
    if (isset($_POST['User_Name']))
    {
        $sql="SELECT tbl_user.Email,tbl_login.User_Name,tbl_login.Login_id FROM `tbl_login` INNER JOIN tbl_user on tbl_user.Login_id=tbl_login.Login_id WHERE `User_Name`='".$_POST['User_Name']."';";
        $result=  mysqli_query($con, $sql);
        while ($row = $result->fetch_assoc())
        {
            $email=$row['Email'];
            $User_Name=$row['User_Name'];
            $Login_id_=$row['Login_id'];
        }
    }
    if (isset($_POST['Email']))
    {
        $sql="SELECT tbl_user.Email,tbl_login.User_Name,tbl_login.Login_id FROM `tbl_login` INNER JOIN tbl_user on tbl_user.Login_id=tbl_login.Login_id WHERE `Email`='".$_POST['Email']."';";
        $result=  mysqli_query($con, $sql);
        while ($row = $result->fetch_assoc())
        {
            $email=$row['Email'];
            $User_Name=$row['User_Name'];
            $Login_id_=$row['Login_id'];
        }
    }
    if (isset($email)&&isset($User_Name))
    {
        $_SESSION['fp_username']=$User_Name;
        $_SESSION['fp_email']=$email;
        $_SESSION['fp_Login_id_']=$Login_id_;
        echo '<div class="input-group mt-2">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="material-icons">face</i>
                    </span>
                </div>
                <div class="badge badge-success text-center" style="padding-top: 7px;">'.$User_Name.'
                </div>
              </div>
              <div class="input-group mt-2">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="material-icons">email</i>
                    </span>
                </div>
                <div class="badge badge-success text-center" style="padding-top: 7px;">'.$email.'
                </div>
              </div>';
    }
    else {
        echo "no";
    }
}
if (isset($_POST['email']))
{
    $string = '1234567890';
    $string_shuffled = str_shuffle($string);
    $otp = substr($string_shuffled, 1, 6);
    include './Email.php';
    $sendMail=new Email();
    $from="tripandturntoursandtravels@gmail.com";
    $subject="OTP for forgot password on Trip and Turn Tours and Travels account";
    if (isset($_POST['btn_Resend'])){$subject="cofirm OTP to register on Trip and Turn Tours and Travels (Resent)";}
    else{$subject="OTP for forgot password on Trip and Turn Tours and Travels account";}
    $message="<center>
                <div  style='border: solid 2px #1d69ab;    max-width: 22rem;    margin-top: 5%;    background-color: #f1f3f4a6;    border-radius: 5px;    margin-bottom: 1rem!important;    width: 400px;'>
                    <div style='border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 0;padding: .75rem 1.25rem;    margin-bottom: 0;    background-color: rgba(0,0,0,.03);    border-bottom: 1px solid rgba(0,0,0,.125);'>
                        OTP for forgot password
                    </div>
                    <img  src='https://lh3.googleusercontent.com/gzGvhRXTms2ihHoGK_sZLUnrNzeWUZ7IzGWuifR-cyjBGQavPKrLhMvQSQobtN3uMf0FoEV2JDq5DDVIATeTpw23WcdA2CldhGDJlX4d8aOprThOp5Ynn4D7Az0r_2ziWenYhRsc7e6yH538Ty-TZmJIATzRKhgll9exaoNle7kGDuBx8ntR24kPTdTYIlr4Hlpf7ncowDSuZENN_hGsMuBzYnPPQM-ViZ3vSDbsp1MALeXWvS7hE9sChcuJsR6RRjjThP67RnZf_uXWj5vXAh0d6P_r7JNnfZJuer1qIKJU1maow3euEItADED6VZbdXN5oqBCfvsCJK_xpElUuSK0htAUXuaWTrp9iea7cKK-7w9eS8FawZrrgYLvWmdnbpGKFTCATOd_zEY4-85doOn4NtcsRXE1hGbZrqUkX4d9eCwtiBgL91nDGabadNLoz4X7ZdCgWghn3WSJ8V7voMFqhwEL31OQD9IxZsCD-XW_hMsEjpAUGnkVQ5ssXFdgUgh6i5QxlFlfGq2CqQX7GKlPNmt3-zQroCJnSwWMo5ZkrfMnq33RAQGrxH9g2XQBUvkCqb1IHRPda9d0DqYwKARWM3N7q2RgxWErCVuo=w250-h238-p-k-nu' style='object-fit:cover; margin:auto;     margin-top: 10%; margin-bottom: 10%; vertical-align: middle;    border-style: none;    width:75px; height:24px;    margin-left: 30%;    margin-right: 30%;' width='75' height='24'>
                    <input  type='text' style='    background-color: #4d90fe85;    color: white;padding:30px; width:65%;  margin:auto; margin-top:-2rem;text-align:center; font-size: 40px; border: solid 1px #ccc;border-radius: .25rem!important;    border-color: #ffc107!important;    overflow: visible;    font-family: inherit;box-sizing: border-box;' value='$otp' disabled></input> 
                    <div  style='flex: 1 1 auto;    padding: 1.25rem;    flex: 1 1 auto;    padding: 1.25rem;'>
                        <h5 style='margin-bottom: .75rem;'>
                          Hello ".$_SESSION['fp_username'].",
                        </h5>
                        <p  style='margin-bottom: 0;    margin-top: 0;    display: block;    margin-block-start: 1em;    margin-block-end: 1em;    margin-inline-start: 0px;    margin-inline-end: 0px;'>
                          Your OTP for forgot password on Trip and Turn Tours and Travels is provided above. Please Hurry up it is valid only for 
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
    $to=$_SESSION['fp_email'];
    $sm=$sendMail->send($from, $subject, $message, $to);
    if(isset($sm)==1)
    {
        $_SESSION['OTP']=$otp;
        $_SESSION['expire']=  time()+(2*60);

        echo 'sent';
    }
    else{
        echo 'no';
    }
}
if (isset($_POST['otp']))
{
     $uotp=$_POST['otp'];
     if(time() > $_SESSION['expire'])
     {
         unset($_SESSION['OTP']);
     }
     if (isset($_SESSION["OTP"]))
     {
         if($_SESSION["OTP"]==$uotp)
         {
             echo 'correct';
         }
         else
         {
             echo 'no';
         }
     }
     else 
     {
         echo 'expiered';
     }
}
if (isset($_POST['btn_Change_password']))
{
    $sql_update_pass="UPDATE `tbl_login` SET `Password`=MD5('".$_POST['new_password']."') WHERE Login_id=".$_SESSION['fp_Login_id_'].";";
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
                  Hello ".$_SESSION['fp_username'].",
                </h5>
                <p  style='margin-bottom: 0;    margin-top: 0;    display: block;    margin-block-start: 1em;    margin-block-end: 1em;    margin-inline-start: 0px;    margin-inline-end: 0px;'>
                  We have recently noticed that
                  <br>
                  password for your account
                  <br>
                  <b  style='color: #fff!important;    padding-left: 0.5rem!important;    padding-right: 0.5rem!important;    padding-top: 2px;    padding-bottom: 2px;    background-color: #dc3545!important;    font-weight: bolder;    border-radius: 1.25rem!important;'>
                      &nbsp;".$_SESSION['fp_username']." 
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
        $to=$_SESSION['fp_email'];
        $sm=$sendMail->send($from, $subject, $message, $to);
        if(isset($sm)==1)
        {
            echo 'done';
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