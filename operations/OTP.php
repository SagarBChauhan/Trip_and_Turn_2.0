<?php
if(isset($_POST['btn_send']))
{
    $string = '1234567890';
    $string_shuffled = str_shuffle($string);
    $otp = substr($string_shuffled, 1, 6);
    $fname=$_POST['firstname'];
    $mname=$_POST['middlename'];
    $lname=$_POST['lastname'];

        $email=$_POST['email'];
        include './Email.php';
        $sendMail=new Email();
        $from="tripandturntoursandtravels@gmail.com";
        $subject="cofirm OTP to register on Trip and Turn Tours and Travels";
        $message="Hello ".$fname." ".$lname.",<br> cofirm your OTP: <b style=' padding-left : 5px;padding-right : 5px; border-radius: 2px; background-color: gainsboro;color: gray; box-shadow: 2px 2px 2px gray;'>".$otp."</b> to register on Trip and Turn Tours and Travels.";
        $to=$email;
        $sm=$sendMail->send($from, $subject, $message, $to);
        session_start();
        $_SESSION["OTP"]=$otp;
        $_SESSION['fname']=$fname;
        $_SESSION['mname']=$mname;
        $_SESSION['lname']=$lname;
        if(isset($_POST['contact']))
        {
            $_SESSION["contactNo"]=$_POST['contact'];
        }
        $_SESSION["email"]=$email;
        if(isset($sm)==1)
        {
            echo 'ok';
        }
        else{
            echo 'no';
        }
        //header("location:Register_OTP_Check.php");
}
if(isset($_POST['btn_Confirm']))
{
       // $uotp=$_POST['n1']+$_POST['n2']+$_POST['n3']+$_POST['n4']+$_POST['n5']+$_POST['n6'];
        $uotp=$_POST['uotp'];
        echo "OTP: ".$_SESSION["OTP"]." ,UOTP :$uotp";
        if(isset($_SESSION["OTP"])==$uotp)
        {
            echo 'ok';
        }
        else{
            echo 'no'+$uotp;
        }
        //header("location:Register_OTP_Check.php");
}
?>
