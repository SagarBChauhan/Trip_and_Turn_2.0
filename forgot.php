<?php 
session_start();
include './operations/Connection.php';
date_default_timezone_set('Asia/Calcutta'); 
if(isset($_GET['logout'])=='yes')
{
    session_destroy();
    header("location:forgot.php");
}
$au=0;
if(isset($_SESSION['user']))
{
    header("location:Login.php?Login_status=Y&tips=Already_Loggedin");
}
if(isset($_SESSION['user']))
{
    $au=1;
    $uid=$_SESSION['lid'];
    $un=$_SESSION['user'];
    $uty=$_SESSION['ac_ty'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/Logos/Tt-paper-plane.png">
  <link rel="icon" type="image/png" href="assets/img/Logos/Tt-paper-plane.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
      Forgot Password - Trip and Turn 
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <link href='https://fonts.googleapis.com/css?family=Aclonica' rel='stylesheet'>
  <link href='https://fonts.googleapis.com/css?family=Alex Brush' rel='stylesheet'>
  <link href='https://fonts.googleapis.com/css?family=Cambay' rel='stylesheet'>
  <link href='https://fonts.googleapis.com/css?family=Cinzel Decorative' rel='stylesheet'>


  <!-- CSS Files -->
  <link href="assets/css/material-kit.css?v=2.0.5" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <!--<link href="assets/demo/demo.css" rel="stylesheet" />-->
  <link href="assets/css/My.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="assets/font-awesome-animation/font-awesome-animation.min.css" rel="stylesheet" type="text/css"/>
  
<!--Just for Notification-->
  <script src="./assets/js/core/jquery.min.js" type="text/javascript"></script>
  <script src="assets/js/plugins/bootstrap-notify.js" type="text/javascript"></script>
  <script src="js/Notify.js" type="text/javascript"></script>
<!--Just for Notification ends-->
</head>

<body class="login-page sidebar-collapse">
  <nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
    <div class="container">
      <div class="navbar-translate">
            <a class="navbar-brand font-family-Aclonica" href="index.php" rel="tooltip" title="Home" data-placement="left"  aria-haspopup="true" aria-expanded="true">
                <img src="assets/img/Logos/Tt-paper-plane.png" style="height: 30px;" class=" faa-float animated"/>
                Trip and Turn 
            </a>     
            <a             
            <a class="navbar-brand font-family-Aclonica" href="#"id="navbarDropdownMenuLinkTranslate" rel="tooltip" title="Translate this page" data-placement="right"  data-toggle="dropdown"  aria-haspopup="true" aria-expanded="true">
            <span class="fa-spin">
                    <div id="div1" class="fa"></div> 
            </span>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLinkTranslate">
                <a class="dropdown-item bg-insta text-white"  href="#"><i class="material-icons">g_translate</i> Translate:  <div class="ml-2 p-2" id="google_translate_element"></div></a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
              <span class="sr-only">Toggle navigation</span>
              <span class="navbar-toggler-icon"></span>
              <span class="navbar-toggler-icon"></span>
              <span class="navbar-toggler-icon"></span>
            </button>
      </div>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item ">
              <a href="#pablo" class="nav-link">
                Discover
              </a>
            </li>
            <li class="dropdown nav-item">
              <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                <i class="material-icons">apps</i> More
              </a>
              <div class="dropdown-menu dropdown-with-icons">
                <a href="" class="dropdown-item">
                  <i class="material-icons">layers</i> Packages
                </a>
                <a href="" class="dropdown-item">
                  <i class="material-icons">history</i> History
                </a>
              </div>
            </li>
            <?php 
            if($au==0){
            ?>
            <li class="nav-item">
              <a href="Login.php" class="btn btn-info bg-info btn-raised btn-round d-none d-md-none d-lg-block">
                <i class="fas fa-sign-in-alt"></i> &nbsp;
                Sign in
              </a>
            </li>
            <li class="nav-item">
              <a href="Login.php" class="btn btn-info bg-info btn-raised  nav-link text-white d-md-block d-lg-none">
                <i class="fas fa-sign-in-alt"></i> &nbsp;
                Sign in
              </a>
            </li>
            <?php 
            }
            else {
            ?>
            <li class="nav-item">
              <a class="nav-link faa-parent animated-hover" href="#" rel="tooltip" title="Wish List" class="" >
                  <i class="material-icons  faa-pulse">favorite</i>                
              </a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link faa-parent animated-hover" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="material-icons faa-ring">notifications     <!--notifications_none--></i>                          
                <!--Notification for Device <= Tablate-->
                <span class="d-md-block d-lg-none">
                   <span class="notification" style="right:160px;">1</span>
                   Notifications
                </span>
                
                <!--Notification for Device >= Laptop-->
                <span class="d-none d-md-none d-lg-block">
                  <span class="notification">5</span>
                   <!--Desctop Notification-->
                </span>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="#">Notification1 <span class="notification">3</span></a>
                <a class="dropdown-item" href="#">Notification2 <span class="notification">2</span></a>
              </div>
            </li>
            <li class="dropdown nav-item">
              <a href="profile.php" class="profile-photo nav-link">
                <div class="profile-photo-small">
                  <img src="<?php if(isset($_SESSION['dp'])){ echo $_SESSION['dp'];}else{ echo"upload/Image/dp/default-avatar.png";} ?>" alt="Circle Image"  class="rounded-circle img-fluid">
                </div>
              </a>
            </li>
            <?php } ?>
            <li class="dropdown nav-item">
              <a href="#pablo" class=" nav-link" data-toggle="dropdown">
                  <i class="material-icons">more_vert</i> 
                   <span class="d-md-block d-lg-none">
                        <span class="notification" style="right:160px;">1</span>
                        More options
                    </span>
              </a>
              <div class="dropdown-menu dropdown-menu-right">
                  <h6 class="dropdown-header"> <?php if($au==0){ ?>Hello, visitor<?php }else{ echo $un; } ?></h6>
                <div class="dropdown-divider"></div>
                <?php if($au!=0){ ?>
                <a href="profile.php" class="dropdown-item faa-parent animated-hover"><i class="material-icons faa-float">person_pin</i> &nbsp;  Profile</a>
                <?php } ?>
                <?php if(isset($uty)=="Admin"){ ?>
                <a href="../Tours_And_Travels/Admin.php" class="dropdown-item faa-parent animated-hover"><i class="material-icons">dashboard</i> &nbsp;  dashboard</a>
                <?php } ?>
                <a href="#pablo" class="dropdown-item faa-parent animated-hover"><i class="material-icons  faa-spin ">settings</i>&nbsp;Settings</a>
                <div class="dropdown-divider"></div>
                <?php if($au!=0){ ?>
                <a href="?logout" class="dropdown-item bg-danger text-white faa-parent animated-hover"><i class="fas fa-sign-out-alt  faa-passing"></i> &nbsp; Sign out</a>
                <?php }else{ ?>
                <a href="Login.php" class="dropdown-item bg-info text-white faa-parent animated-hover"><i class="fas fa-sign-in-alt  faa-passing"></i> &nbsp; Sign in</a>
                <?php }  ?>
              </div>
            </li>
        </ul>
      </div>
    </div>
  </nav>      
  <div class="page-header header-filter" style="background-image: url('assets/img/bg7.jpg'); background-size: cover; background-position: top center;">   
    <div class="container" >
      <div id="info"></div>
      <div class="row">
          <div id="step1" class="col-lg-4 col-md-6 ml-auto mr-auto">
          <div class="card card-login">
            <form id="mailForm" class="form" method="Post">
              <div class="card-header card-header-info text-center">
                <h4 class="card-title">Forgot Password</h4>
                <div class="nav-tabs">
                  <ul class="nav nav-pills nav-pills-icons justify-content-center" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link" href="?u">
                        <i class="material-icons">face</i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?m" >
                        <i class="material-icons">mail</i>
                      </a>
                    </li>                
                  </ul>
                </div>
              </div>
                <p class="description text-center">Confirm OTP from your registered email</p>
              <div class="card-body pt-3">
              <?php if (!isset($_GET['m'])){ ?>
                <p class="description text-center">Find your account using username</p>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="material-icons">face</i>
                        </span>
                      </div>
                        <input type="text" name="User_Name" id="User_Name"  class="form-control" placeholder="Username..." required>
                    </div>
              <?php }  else { ?>
                <p class="description text-center">Find your account using email</p>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="material-icons">mail</i>
                        </span>
                      </div>
                      <input type="email" name="Email" id="Email"  class="form-control" placeholder="Email...">
                    </div>
              <?php }  ?>
               </div>
                <center>
                </center>
              <div class="footer text-center">
                  <button type="submit" name="btn_Check" id="btn_Check" class="btn btn-info btn-lg faa-parent  animated-hover"><span class="faa-flash">Submit</span></button>>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div id="step4" class="row justify-content-center mt-5 d-none" style="opacity:0;">
            <div class="card shadow col-md-6">
              <div class="card-header card-header-info text-center">
                <h4 class="card-title">Change Password</h4>
              </div>
                <article class="card-body">
                    <form method="POST" id="change_password_form">
                        <div class="form-group bdm-form-group">
                            <label for="new_password"  class="bmd-label-floating">New Password</label>
                            <input type="password" id='new_password' name="new_password"  class="form-control"/>
                        </div>
                        <div class="form-group bdm-form-group">
                            <label for="confirmpassword"  class="bmd-label-floating">Confirm password</label>
                            <input type="password" id='confirmpassword' name="confirmpassword"  class="form-control"/>
                        </div>
                        <div class="form-group">
                            <button type="submit" id='btn_Change_password' name="btn_Change_password" class="btn btn-primary">Change password</button>
                        </div>
                    </form> 
               </article>
            </div> <!-- card.// -->
        </div> <!-- row.// -->
        <div id="done" class="row justify-content-center mt-5 d-none">
            <div class="card shadow col-md-7 faa-float faa-slow animated">
                <article class="card-body">
                    <center><img src="assets/img/Logos/Tt-paper-plane Full.png" alt="Trip and turn Logo" style="height: 100px;" class="mt-4"/></center>
                    <H1 class="font-family-Alex-title">Congratulation!</H1>
                    <h4 class="">You have changed password for <span class="text-info font-family-Aclonica"> <i class="fa fa-paper-plane faa-float animated"></i> Trip and turn </span> successfully! </h4>     
                    <p>Now just Sign in to your account.</p>
                    <hr>
                    <button type="submit" name="btn_finish" id='btn_finish' class='btn btn-warning btn-wd float-right btn_finish' onclick="finish()"> Sign in <i class="fas fa-chevron-right"></i>  </button>    
                </article>
            </div> <!-- card.// -->
        </div> <!-- row.// -->
        <div class="progress progress-line-info">
            <div id="progress" class="progress-bar progress-bar-animated" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:1%;">
              <span class="sr-only">60% Complete</span>
            </div>
        </div> 
  </div> 
  <div class="modal fade bd-example-modal-sm show" tabindex="-1" style="display: none;" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
          <div class="card card-signup card-plain">
              <div id="step2" >
                <div class="modal-body">
                    <div class="card-body text-center">
                        <p class="description text-center">Get otp on below email address</p>
                        <div id="result"></div>                 
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                  <a id="get_Otp" class="btn btn-primary btn-link btn-wd btn-lg">Get OTP</a>
                </div>
              </div>
              <div id="step3" class="d-none">
                <form id="conf_Otp_form">
                    <div class="modal-body">
                        <div class="card-body text-center">
                            <p class="description text-center">Confirm sent OTP</p>
                            <span id="timer"></span>&nbsp; <i class="fas fa-hourglass-start faa-tada animated"></i>

                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text">
                                  <i class="material-icons">code</i>
                                </span>
                              </div>
                              <input type="number" name="otp" id="otp"  class="form-control" placeholder="OTP...">
                            </div>               
                        </div>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="submit" id="conf_Otp" name="conf_Otp" class="btn btn-primary btn-link btn-wd btn-lg">Confirm OTP</button>
                    </div>
                </form>
              </div>
          </div>
      </div>
    </div>
  </div>
    <footer class="footer">
      <div class="container">
        <nav class="float-left">
            <ul>
              <li>
                <a href="index.php">
                  Trip and Turn Tours and Travels
                </a>
              </li> |
              <li>
                <a href="AboutUs.php">
                  About Us
                </a>
              </li> |
              <li>
                <a href="ContactUs.php">
                  Contact Us
                </a>
              </li> |
              <li>
                <a href="TC.php">
                  Terms and Conditions
                </a>
              </li>
            </ul>
        </nav>
        <div class="copyright float-right">
            &copy; 
          <script>
            document.write(new Date().getFullYear())
          </script> 
          <a href="index.php" target="_blank">Trip and Turn</a>
        </div>
      </div>
    </footer>
  </div>
  <!--   Core JS Files   -->
  <!--<script src="assets/js/core/jquery.min.js" type="text/javascript"></script>-->
  <script src="assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
  <script src="assets/js/plugins/moment.min.js"></script>
  <!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
  <script src="assets/js/plugins/bootstrap-datetimepicker.js" type="text/javascript"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/material-kit.js?v=2.0.5" type="text/javascript"></script>
  <script src="assets/js/plugins/sweetalert2.js" type="text/javascript"></script>
  <!--for translate and globe animation-->
  <script src="assets/animation/globe_anim.js" type="text/javascript"></script>
    <script type="text/javascript">
    function googleTranslateElementInit() {
      new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
    }
    </script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    <!--translate and animation end-->
   
<!--    Content required to use jquery validation in system 
    Note: you must have to include jQuary file or CDN before this-->
    <script src="jquery-validation-1.19.0/dist/jquery.validate.js" type="text/javascript"></script>
        <!--Count Down-->
        <script> 
            function countDown(min){
            // Set the date we're counting down to
            var countDownDate = new Date().getTime()+ (min*60000);

            // Update the count down every 1 second
            var x = setInterval(function() {

              // Get todays date and time
              var now = new Date().getTime();

              // Find the distance between now and the count down date
              var distance = countDownDate - now;

              // Time calculations for days, hours, minutes and seconds
              var days = Math.floor(distance / (1000 * 60 * 60 * 24));
              var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
              var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
              var seconds = Math.floor((distance % (1000 * 60)) / 1000);

              // Output the result in an element with id="demo"
              document.getElementById("timer").innerHTML =minutes + "m " + seconds + "s ";

              // If the count down is over, write some text 
              if (distance < 0) {
                clearInterval(x);
                document.getElementById("timer").innerHTML = "EXPIRED";
              }
            }, 1000);
            }
        </script>
        <!--Count Down ends-->
        
        <script>
        function notify(msg,type,from,align){
            $.notify( msg, {
            allow_dismiss: false,
            type:type,
            placement: {
                    from: from,
                    align: align
            }
            });
        }

  
            $(document).ready(function (){
                $("#mailForm").validate({
                    rules:{
                        User_Name:{
                            required:true,
                            minlength:3
                        },
                        Email:{
                            required:true,
                            email:true
                        }
                    },
                    messages:{
                        User_Name:{
                            required:"<small class='badge badge-danger badge-pill'>required<small>",
                            minlength:"<small class='badge badge-danger badge-pill'>Invalid<small>"
                        },
                        Email:{
                            required:"<small class='badge badge-danger badge-pill'>required<small>",
                            email:"<small class='badge badge-danger badge-pill'>Invalid<small>"
                        }
                    },
                    submitHandler:subform
                    
                })
                function subform(){
                    var data =$("#mailForm").serialize();
                    $.ajax({
                        type: 'POST',
                        url: "operations/forgotPassword.php",
                        data: data,
                        beforeSend: function () {
                            $("#info").fadeOut();
                            $("#btn_Check").html("Checking &nbsp; <i class='fas fa-spinner fa-spin'>");
                            $("#progress").animate({width:"60%"});
                        },
                        success: function (resp) {
                            if(resp=="no"){
                                alert(resp)
                                $("#btn_Check").fadeIn(1000,function (){
                                    $("#info").html("<div class='alert alert-danger'>Unknown error:<br> "+resp+"</div>");
                                    $("#btn_Check").html('<span class="faa-flash">Submit</span>');
                                    $("#progress").animate({width:"1%"});
                                })  
                            }                          
                            else 
                            {
                              $("#btn_Check").html("Get OTP &nbsp; <i class='fas fa-check faa-burst faa-fast animated'></i>");
                                $("#progress").animate({width:"20%"});
                                $("#progress").parent().removeClass("progress-line-animated");
                                $("#progress").removeClass(" progress-bar-info");
                                $("#progress").parent().addClass("progress-line-success");
                                $("#progress").addClass(" progress-bar-success");
                                setTimeout(function (){
                                    $("#step1").addClass("faa-burst animated");
                                    $("#btn_Check").html("Changed  &nbsp; <i class='fas fa-check faa-burst faa-fast animated'></i>");
                                    $("#progress").css("background-color", "#4caf50");
                                },1000);
                                setTimeout(function (){
                                    $("#result").html(resp);
                                    $("#step1").css("display", "none");
                                    $("#step4").removeClass("d-none");$(".modal").fadeOut(0);
                                    $(".modal").css("display", "block");
                                    $(".modal").addClass(' faa-falling animated');
                                },1500);
                                setTimeout(function (){
                                    $(".modal").removeClass(' faa-falling animated');
                                },2500);
                                setTimeout(function (){
                                    notify('Found','success','top','center')
                                },3000);
                            }
                        }
                    });
                }
            });
            
            $(document).on('click','#get_Otp',function(){
                var email= $("#result").html();
                $.ajax({
                    type:'POST',
                    url:'operations/forgotPassword.php',
                    data:{'email':email},
                    beforeSend: function () {
                        $("#get_Otp").html("Sending &nbsp; <i class='fas fa-spinner fa-spin'>");
                        $("#progress").animate({width:"40%"});
                    },
                    success: function(data){
                         if(data=="sent"){
                            countDown(2);
                            setTimeout(function(){
                                $(".modal").addClass('faa-burst animated')
                                $("#get_Otp").html("OTP Sent");
                            },1000);
                            setTimeout(function(){
                                $("#step2").css("display", "none");
                                $(".modal").removeClass('faa-burst animated')
                                $(".modal").addClass('faa-falling animated')
                                $("#step3").removeClass("d-none");
                                $("#step3").addClass("animate-bottom");
                            },1500);
                            setTimeout(function(){
                                $(".modal").removeClass('faa-falling animated');
                            },2500);
                            setTimeout(function(){
                                notify('Otp sent on your email address','success','top','center')
                                $("#get_Otp").html("Get OTP");
                            },3000);
                         }
                         else{
                                notify('Otp not sent, slow connection..','danger','top','center')
                         }
                     }
                });
            });
            
            $(document).ready(function (){
                $("#conf_Otp_form").validate({
                    rules:{
                        otp:{
                            required:true,
                            minlength:6,
                            maxlength:6
                        }
                    },
                    messages:{
                        otp:{
                            required:"<small class='badge badge-danger badge-pill'>required<small>",
                            minlength:"<small class='badge badge-danger badge-pill'>Invalid<small>",
                            maxlength:"<small class='badge badge-danger badge-pill'>Invalid<small>"
                        }      
                    },
                    submitHandler:subform2
                });
            });
            function  subform2(){
                var otp= $("#otp").val();
                $.ajax({
                    type:'POST',
                    url:'operations/forgotPassword.php',
                    data:{'otp':otp},
                    beforeSend: function () {
                        $("#progress").animate({width:"60%"});
                    },
                    success: function(data){
                         if(data=="correct"){
                             notify('Correct OTP','success','top','center');
                             $("#conf_Otp").html("Correct OTP");
                            setTimeout(function(){
                                $(".modal").addClass('faa-burst animated');
                                $("#step4").addClass('d-none');
                                $("#step4").css("opacity", "1");
                            },1000);
                            setTimeout(function(){
                                $(".modal").css("display", "none");
                                $("#step4").removeClass('d-none')
                                $("#step4").addClass("animate-bottom");
                                $("#conf_Otp").html("Confirm OTP");
                            },1500);
                           
                         }
                         else if(data=="expiered"){
                            notify('OTP expired','warning','top','center')
                            setTimeout(function(){
                                $(".modal").addClass('faa-burst animated')
                                $("#conf_Otp").html("Correct OTP");
                            },1000);
                            setTimeout(function(){
                                $(".modal").removeClass('faa-burst animated')
                                $(".modal").addClass('faa-falling animated')
                                $("#step3").addClass("d-none");
                                $("#step2").css("display", "block");
                                $("#step2").addClass("animate-top");
                            },1500);
                            setTimeout(function(){
                                $(".modal").removeClass('faa-falling animated');
                                $("#conf_Otp").html("Confirm OTP");
                            },2500);
                         }
                         else{
                            notify('Incorrect OTP','danger','top','center')
                            $("#conf_Otp").html("Confirm OTP");
                         }
                     }
                });
            }
            
            $(document).ready(function (){
                $("#change_password_form").validate({
                    rules:{
                        new_password:{
                            required:true,
                            minlength:6,
                            maxlength:50
                        },
                        confirmpassword:{
                            required:true,
                            minlength:6,
                            maxlength:50,
                            equalTo: "#new_password"
                        }
                    },
                    messages:{
                        new_password:{
                            required:"<small class='text-danger'>new password required<small>",
                            minlength:"<small class='text-danger'>new password must be minimum 6 charector long<small>",
                            maxlength:"<small class='text-danger'>new password can be maximum 50 charector long<small>"
                        },
                        confirmpassword:{
                            required:"<small class='text-danger'>confirm password required<small>",
                            minlength:"<small class='text-danger'>confirm password must be minimum 6 charector long<small>",
                            maxlength:"<small class='text-danger'>confirm password can be maximum 50 charector long<small>",
                            equalTo: "<small class='text-danger'>confirm password must be same as new one<small>"
                        }
                    },
                    submitHandler:subform3
                });
            });
            function  subform3(){
                var data =$("#change_password_form").serialize();
                $.ajax({
                    type:'POST',
                    url:'operations/forgotPassword.php',
                    data:data,
                    beforeSend: function () {
                        $("#btn_Change_password").html("Changing &nbsp; <i class='fas fa-spinner fa-spin'>");
                        $("#progress").css("background-color", "#e91e63");
                        $("#progress").animate({width:"80%"});
                    },
                    success: function(data){
                         if(data=="done" || data=="ok"){
                            setTimeout(function (){
                                notify('Password Changed','success','top','center')
                                $("#step4").addClass("faa-burst animated");
                                $("#btn_Change_password").html("Changed  &nbsp; <i class='fas fa-check faa-burst faa-fast animated'></i>");
                                $("#progress").css("background-color", "#4caf50");
                            },2000);
                            setTimeout(function (){
                                $("#step4").addClass("faa-burst animated");
                                $("#step4").removeClass("faa-burst animated");
                                $("#step4").css("opacity", "0");
                                $("#step4").addClass("d-none");
                            },2200);
                            setTimeout(function (){                                
                                $("#done").removeClass("d-none");
                                $("#done").addClass("animate-bottom");
                                $("#progress").animate({width:"100%"});
                                $("#btn_Change_password").html("Change");
                            },2500);
                         }else{
                            alert("Can't Change"+data)
                            $("#btn_Change_password").html("Change");
                            notify('Can not change password','danger','top','center')
                         }
                     }
                });
            }
            function finish(){
                $("#progress").animate({width:"1%"});
                $(".btn_finish").fadeOut(1000,function (){                    
                    $(".btn_finish").fadeIn(100,function (){
                       $(".btn_finish").html("Opning Sign in page &nbsp; <i class='fas fa-spinner fa-spin'>");
                    });
                    setTimeout(function (){$("#progress").removeClass("progress-bar-info");$("#progress").animate({width:"30%"});$("#progress").addClass("progress-bar-primary");},1000);
                    setTimeout(function (){$("#progress").removeClass("progress-bar-primary");$("#progress").animate({width:"60%"});$("#progress").addClass("progress-bar-danger");},2000);
                    setTimeout(function (){$("#progress").removeClass("progress-bar-danger");$("#progress").animate({width:"80%"});$("#progress").addClass("progress-bar-warning");},3000);
                    setTimeout(function (){
                        $("#progress").removeClass("progress-bar-warning");
                        $("#progress").animate({width:"100%"});
                        $("#progress").addClass("progress-bar-success");
                        $("#done").addClass("faa-burst animated");
                        setTimeout('window.location.href="Login.php";',1000);
                    },4000);
                });
            }
        </script>
</body>
</html>
