<?php 
session_start();
include './operations/Connection.php';
date_default_timezone_set('Asia/Calcutta'); 
if(isset($_GET['logout'])=='yes')
{
    session_destroy();
    header("location:change_password.php");
}
$au=0;
if(!isset($_SESSION['user']))
{
    header("location:Login.php?Login_status=N&tips=login_first");
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
      Change Password - Trip and Turn 
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
  <script src="../Tours_And_Travels/assets/js/plugins/bootstrap-notify.js" type="text/javascript"></script>
  <script src="../Tours_And_Travels/js/Notify.js" type="text/javascript"></script>
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
        <div class="row justify-content-center mt-5">
            <div class="card shadow col-md-6">
              <div class="card-header card-header-info text-center">
                <h4 class="card-title">Change Password</h4>
              </div>
                <article class="card-body">
                    <div id="info3"></div>
                    <form method="POST" id="Registration_Form_Step3">
                        <div class="form-group bdm-form-group">
                            <label for="password"  class="bmd-label-floating" >Password</label>
                            <input type="password" id='password' name="password"  class="form-control"/>
                        </div>
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
        <div class="progress progress-line-info">
            <div id="progress" class="progress-bar progress-bar-animated" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:1%;">
              <span class="sr-only">60% Complete</span>
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
  <script src="../Tours_And_Travels/assets/js/plugins/sweetalert2.js" type="text/javascript"></script>
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
        <!--Registration Step 3-->
        <script>
            $(document).ready(function (){
                $("#Registration_Form_Step3").validate({
                    rules:{
                        password:{
                            required:true,
                            minlength:5
                        },
                        new_password:{
                            required:true,
                            minlength:5
                        },
                        confirmpassword:{
                            required:true,
                            minlength:5,
                            equalTo: "#new_password"
                        }
                    },
                    messages:{
                        password:{
                            required:"<small class='text-danger'>password is required<small>",
                            minlength:"<small class='text-danger'>password must be at lest 5 character long<small>"
                        },
                        new_password:{
                            required:"<small class='text-danger'>new password is required<small>",
                            minlength:"<small class='text-danger'>new password must be at lest 5 character long<small>"
                        },
                        confirmpassword:{
                            required:"<small class='text-danger'>confirm password is required<small>",
                            minlength:"<small class='text-danger'>confirm password must be at lest 5 character long<small>",
                            equalTo: "<small class='text-danger'>confirm password must same as new password<small>"

                        }
                    },
                    submitHandler:subform
                    
                })
                function subform(){
                    var data =$("#Registration_Form_Step3").serialize();
                    $.ajax({
                        type: 'POST',
                        url: "operations/database.php",
                        data: data,
                        beforeSend: function () {
                            $("#info3").fadeOut();
                            $("#btn_Change_password").html("Changing &nbsp; <i class='fas fa-spinner fa-spin'>");
                             $("#progress").animate({width:"60%"});
                        },
                        success: function (resp) {
                            if(resp=="ok"){
                                $("#btn_Change_password").html("Changed &nbsp; <i class='fas fa-check faa-burst faa-fast animated'></i>");
                                $("#progress").animate({width:"100%"});
                                $("#progress").parent().removeClass("progress-line-animated");
                                $("#progress").removeClass(" progress-bar-info");
                                $("#progress").parent().addClass("progress-line-success");
                                $("#progress").addClass(" progress-bar-success");
                                $.notify({
                                    title: '<img src="<?php if(isset($_SESSION['dp'])){ echo $_SESSION['dp'];}else{ echo"upload/Image/dp/default-avatar.png";} ?>" alt="Circle Image"  class="rounded-circle img-fluid" width="40px;"><strong> Done!</strong><hr>',
                                    message: 'Password changed successfully.'
                                },{
                                    allow_dismiss: false,
                                    placement: {
                                            from: 'top',
                                            align: 'center'
                                    },
                                    type: 'success'
                                });
                            }

                            else if(resp=="sent")
                            {
                                $("#btn_Change_password").html("Changed &nbsp; <i class='fas fa-check faa-burst faa-fast animated'></i>");
                                $("#progress").animate({width:"100%"});
                                $("#progress").parent().removeClass("progress-line-animated");
                                $("#progress").removeClass(" progress-bar-info");
                                $("#progress").parent().addClass("progress-line-success");
                                $("#progress").addClass(" progress-bar-success");
                                $.notify({
                                    title: '<img src="<?php if(isset($_SESSION['dp'])){ echo $_SESSION['dp'];}else{ echo"upload/Image/dp/default-avatar.png";} ?>" alt="Circle Image"  class="rounded-circle img-fluid" width="40px;"><strong> Done!</strong><hr>',
                                    message: 'Password changed successfully.'
                                },{
                                    allow_dismiss: false,
                                    placement: {
                                            from: 'top',
                                            align: 'center'
                                    },
                                    type: 'success'
                                });
                            }                            
                            else if(resp=="incorrect")
                            {
                                $("#info3").fadeIn(1000,function (){
                                    $("#info3").html("<div class='alert alert-danger'>Incorrect password</div>");
                                    $("#btn_Change_password").html('Change password');
                                    $("#progress").animate({width:"1%"});
                                })
                            }
                            else if(resp=="same")
                            {
                                $("#info3").fadeIn(1000,function (){
                                    $("#info3").html("<div class='alert alert-danger'>New password can not be same as new one</div>");
                                    $("#btn_Change_password").html('Change password');
                                    $("#progress").animate({width:"1%"});
                                })
                            }
                            else if(resp=="no")
                            {
                                $("#info3").fadeIn(1000,function (){
                                    $("#info3").html("<div class='alert alert-danger'>Failed to save <br>error:"+resp+", Please Try again..</div>");
                                    $("#btn_Change_password").html('Change password');
                                    $("#progress").animate({width:"1%"});
                                })
                                $.notify({
                                    title: '<img src="<?php if(isset($_SESSION['dp'])){ echo $_SESSION['dp'];}else{ echo"upload/Image/dp/default-avatar.png";} ?>" alt="Circle Image"  class="rounded-circle img-fluid" width="40px;"><strong> Failed!</strong><hr>',
                                    message: 'Password changed failed.'
                                },{
                                    allow_dismiss: false,
                                    placement: {
                                            from: 'top',
                                            align: 'center'
                                    },
                                    type: 'danger'
                                });
                            }
                            else 
                            {
                                $("#info3").fadeIn(1000,function (){
                                    $("#info3").html("<div class='alert alert-danger'>Unknown error:<br> "+resp+"</div>");
                                    $("#btn_Change_password").html('Change password');
                                    $("#progress").animate({width:"1%"});
                                })
                            }
                        }
                    })
                }
            })
        </script>
        <!--Registration Step 3 ends-->
</body>
</html>
