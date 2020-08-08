<?php
session_start();
include './Connection.php';
if(isset($_POST['btn_PA_Done']))
{
    $date=$_POST['date'];
    $pc=$_POST['pc'];
    $uid=$_POST['uid'];
    $pid=$_POST['pid'];
    $date=$_POST['date'];
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
        $sql_update="INSERT INTO `tbl_booking`( `Customer_Id`, `Package_Id`,  `Total_Amount`, `Payment_Id`, `Last_Update_Time`) VALUES ($uid,$pid,'$amt',$pid,NOW())";
        $query_update=  mysqli_query($con, $sql_update);
        if($query_update)
        {
             $tid=$con->insert_id;
            include './Email.php';
            $sendMail=new Email();
            $from="tripandturntoursandtravels@gmail.com";
            $subject="Your package of $pc booked successfully";
            $message="<center>
            <div  style='border: solid 2px #1d69ab;    max-width: 22rem;    margin-top: 5%;    background-color: #f1f3f4a6;    border-radius: 5px;    margin-bottom: 1rem!important;    width: 400px;'>
                <div style='border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 0;padding: .75rem 1.25rem;    margin-bottom: 0;    background-color: rgba(0,0,0,.03);    border-bottom: 1px solid rgba(0,0,0,.125);'>
                    Successfully boooked
                </div>
                <img  src='https://lh3.googleusercontent.com/gzGvhRXTms2ihHoGK_sZLUnrNzeWUZ7IzGWuifR-cyjBGQavPKrLhMvQSQobtN3uMf0FoEV2JDq5DDVIATeTpw23WcdA2CldhGDJlX4d8aOprThOp5Ynn4D7Az0r_2ziWenYhRsc7e6yH538Ty-TZmJIATzRKhgll9exaoNle7kGDuBx8ntR24kPTdTYIlr4Hlpf7ncowDSuZENN_hGsMuBzYnPPQM-ViZ3vSDbsp1MALeXWvS7hE9sChcuJsR6RRjjThP67RnZf_uXWj5vXAh0d6P_r7JNnfZJuer1qIKJU1maow3euEItADED6VZbdXN5oqBCfvsCJK_xpElUuSK0htAUXuaWTrp9iea7cKK-7w9eS8FawZrrgYLvWmdnbpGKFTCATOd_zEY4-85doOn4NtcsRXE1hGbZrqUkX4d9eCwtiBgL91nDGabadNLoz4X7ZdCgWghn3WSJ8V7voMFqhwEL31OQD9IxZsCD-XW_hMsEjpAUGnkVQ5ssXFdgUgh6i5QxlFlfGq2CqQX7GKlPNmt3-zQroCJnSwWMo5ZkrfMnq33RAQGrxH9g2XQBUvkCqb1IHRPda9d0DqYwKARWM3N7q2RgxWErCVuo=w250-h238-p-k-nu' style='object-fit:cover; margin:auto;     margin-top: 10%; margin-bottom: 7%; vertical-align: middle;    border-style: none;   width:170px; height:60px;' width='75' height='24'>
                <div  style='flex: 1 1 auto;    padding: 1.25rem;    flex: 1 1 auto;    padding: 1.25rem;'>
                    <h5 style='margin-bottom: .75rem;'>
                      Hello ".$_SESSION['user'].",
                    </h5>
                    <p  style='margin-bottom: 0;    margin-top: 0;    display: block;    margin-block-start: 1em;    margin-block-end: 1em;    margin-inline-start: 0px;    margin-inline-end: 0px;'>
                        please keep remember
                        <br>
                      Your Transaction Id is 
                      <br>
                      <b  style='color: #fff!important;    padding-left: 0.5rem!important;    padding-right: 0.5rem!important;    padding-top: 2px;    padding-bottom: 2px;    background-color: #dc3545!important;    font-weight: bolder;    border-radius: 1.25rem!important;'>
                          &nbsp;".$tid." 
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