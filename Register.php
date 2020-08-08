<?php 
session_start();

include './operations/Connection.php';
date_default_timezone_set('Asia/Calcutta'); 
if (isset($_GET['restart'])=='y')
{
    session_destroy();
    header("location:Register.php");
}
if(isset($_GET['logout'])=='yes')
{
    session_destroy();
    header("location:Register.php");
}
$au=0;
if(isset($_SESSION['user']))
{
    if(!isset($_SESSION['OP']))
    {
        header("location:index.php?Login_status=Y&uname=".$_SESSION['user']."");
    }
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
      Register - Trip and Turn 
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
                    <img src="upload/Image/dp/default-avatar.png" alt="Circle Image"  class="rounded-circle img-fluid">
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
                  <h6 class="dropdown-header"> <?php if($au==0){ ?>Hello, visitor<?php }else{ echo $un; echo "<script> $.notify('Welcome  $un,');</script>";} ?></h6>
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
        <div  id="mail" class="row justify-content-center d-none">
            <div class="card shadow col-md-6">
                <div class="card-header card-header-info text-center">
                    <h4 class="card-title">Register</h4>
                    <div class="social-line">
                      <a href="#pablo" class="btn btn-just-icon btn-link text-white">
                        <i class="fab fa-facebook-square"></i>
                      </a>
                      <a href="#pablo" class="btn btn-just-icon btn-link text-white">
                        <i class="fab fa-twitter"></i>
                      </a>
                      <a href="#pablo" class="btn btn-just-icon btn-link text-white">
                        <i class="fab fa-google-plus"></i>
                      </a>
                    </div>
                </div>
                <p class="description text-center">Or Be Classical</p>
                <article class="card-body">
                    <div id="info"></div>
                    <form method="POST" id="Registration_Form_Step1">
                        <div class="row">
                            <div class="form-group  bmd-form-group col-md-4 has-info">
                                <label for="firstname" class="bmd-label-floating" >firstname</label>
                                <input name="firstname" type="text" class="form-control"   value="<?php if (isset($_SESSION['fname'])){echo $_SESSION['fname'];} ?>">
                            </div>
                            <div class="form-group  bmd-form-group col-md-4 has-info">
                                <label for="middlename" class="bmd-label-floating" >middlename</label>
                                <input name="middlename" type="text" class="form-control" value="<?php if (isset($_SESSION['mname'])){echo $_SESSION['mname'];} ?>">
                                    
                            </div>
                            <div class="form-group  bmd-form-group col-md-4 has-info">
                                <label for="lastname" class="bmd-label-floating" >lastname</label>
                                <input name="lastname" type="text" class="form-control"  value="<?php if (isset($_SESSION['lname'])){echo $_SESSION['lname'];} ?>">
                            </div>
                            <div class="form-group  bmd-form-group col-md-6 has-info">
                                <label for="email" class="bmd-label-floating" >email</label>
                                <input name="email" type="email" class="form-control" value="<?php if (isset($_SESSION['email'])){echo $_SESSION['email'];} ?>">                        
                            </div>
                            <div class="form-group  bmd-form-group col-md-6 has-info">
                                <label for="contact" class="bmd-label-floating" >contact</label>
                                <input name="contact" type="text" class="form-control" value="<?php if (isset($_SESSION['contactNo'])){echo $_SESSION['contactNo'];} ?>">
                            </div>
                            <div class="form-group">
                                <button type="submit" name="btn_send" id='btn_send' class='btn btn-success btn-wd'> Send OTP  </button>
                                <a class="btn" href="?restart=y"><i class="fas fa-redo"> Reset </i></a>
                            </div>
                        </div>
                    </form> 
                   <button type="button" name="btn_next" id='btn_next' class='btn btn-warning btn-wd float-right' onclick="next()"> I have OTP <i class="fas fa-angle-double-right"></i></button>    
                </article>
            </div> <!-- card.// -->
        </div> <!-- row.// -->  

        <div id="OTP" class="row justify-content-center mt-5 d-none">
            <div class="card shadow col-md-6">
                <div class="card-header card-header-info text-center">
                  <h4 class="card-title">Confirm OTP</h4>
                </div>
                <article class="card-body">
                    <div id="dis">
                        <p id="recipient">The OTP is sent to your Registered Email address : <?php if(isset( $_SESSION['email'])){echo $_SESSION['email'];} ?></p>
                        <p >Your OTP will be expired in 2 min(s), Please confirm OTP sooner.</p>
                        <span id="timer"></span>&nbsp; <i class="fas fa-hourglass-start faa-tada animated"></i>

                        <div id="info2"></div>
                        <form method="POST" id="Registration_Form_Step2">
                            <div class="form-group  bmd-form-group">
                                <label for="OTP" class="bmd-label-floating" >OTP</label>
                                <input type="number" id='uotp' name="uotp" class="form-control"/>
                            </div>
                            <div class="form-group">
                                <button type="submit" id='btn_Confirm' name="btn_Confirm" class="btn btn-primary">Confirm OTP</button>
                                <button type="button" id='btn_Resend' name="btn_Resend" class="btn btn-primary">Resend OTP <i class="fas fa-redo"></i></button>
                                <a class="btn" href="?restart=y"><i class="fas fa-redo"> Reset </i></a>
                            </div>
                        </form> 
                    </div>
                    <button type="submit" name="btn_prev" id='btn_prev' class='btn btn-warning btn-wd float-left' onclick="perv()"> <i class="fas fa-chevron-left"></i> Back  </button>    
                    <button type="submit" name="btn_next3" id='btn_next3' class='btn btn-warning btn-wd float-right' onclick="next3()"> Next <i class="fas fa-chevron-right"></i>  </button>    
                </article>
            </div> <!-- card.// -->
        </div> <!-- row.// -->

        <div id="credential"  class="row justify-content-center mt-5  d-none">
            <div class="card shadow col-md-6">
              <div class="card-header card-header-info text-center">
                <h4 class="card-title">Create login account</h4>
              </div>
                <article class="card-body">
                        <div id="info3"></div>
                        <form method="POST" id="Registration_Form_Step3">
                            <div class="form-group bdm-form-group">
                                <label for="username"  class="bmd-label-floating" >Username <span id="txtHint"></span></label>
                                <input type="text" id='username' name="username" onchange="checkUsername(this.value)"  class="form-control"/>
                                
                            </div>
                            <div class="form-group bdm-form-group">
                                <label for="password"  class="bmd-label-floating">Password</label>
                                <input type="password" id='password' name="password"  class="form-control"/>
                            </div>
                            <div class="form-group bdm-form-group">
                                <label for="confirmpassword"  class="bmd-label-floating">Confirm password</label>
                                <input type="password" id='confirmpassword' name="confirmpassword"  class="form-control"/>
                            </div>
                            <div class="form-group">
                                <button type="submit" id='btn_Save' name="btn_Save" class="btn btn-primary" disabled>Save</button>
                                <a class="btn" href="?restart=y"><i class="fas fa-redo"> Reset </i></a>
                            </div>
                        </form> 
                    <button type="submit" name="btn_prev2" id='btn_prev2' class='btn btn-warning btn-wd float-left' onclick="perv2()"> <i class="fas fa-chevron-left"></i> Back  </button>    
                    <button type="submit" name="btn_next4" id='btn_next4' class='btn btn-warning btn-wd float-right' onclick="next4()"> Next <i class="fas fa-chevron-right"></i>  </button>    
                </article>
            </div> <!-- card.// -->
        </div> <!-- row.// -->

        <div  id="register" class="row justify-content-center mt-5 d-none">
            <div class="card shadow col-md-8">
                <article class="card-body">
                    <div class="card-header card-header-info text-center">
                      <h4 class="card-title">Fill Basic details</h4>
                    </div>
                        <div id="info4"></div>
                        <form method="POST" id="Registration_Form_Step4">
                            <div class="form-row">
                                <div class="form-group bdm-form-group col-md-3">
                                    <label for="DOB" class="label-control">DOB</label>
                                    <input type="text" id='DOB' name="DOB"  class="form-control datetimepicker" value="01/01/2001"/>
                                </div>
                                <label class="label-control">Gender:</label>
                                <div class="form-check form-check-radio  form-check-inline">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="gender" id="gender" value="Male" checked>
                                        Male
                                        <span class="circle">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>
                                <div class="form-check form-check-radio  form-check-inline">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="gender" id="gender" value="Female" >
                                        Female
                                        <span class="circle">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>                              
                                <div class="form-group bdm-form-group col-md-8">
                                    <label for="address"  class="bmd-label-floating">Address</label>
                                    <input type="text" id='address' name="address"  class="form-control"/>
                                </div> 
                                <div class="form-group col-md-4">
                                    <label for="pincode"  class="bmd-label-floating" >Pin code</label>
                                    <input type="text" id='pincode' name="pincode" class="form-control"/>
                                </div>  
                                <div class="form-group col-md-4">
                                    <label for="country" >country</label>
                                    <select  name="country" id="country-list" onChange="getState(this.value);"  class="custom-select">
                                        <option value disabled selected>Select Country</option>
                                        <?php
                                        $results=  mysqli_query($con, "SELECT * FROM `tbl_country`;");
                                        foreach($results as $country) {
                                        ?>
                                        <option value="<?php echo $country["Country_Id"]; ?>"><?php echo $country["Name"]; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>                                
                                <div class="form-group col-md-4">
                                    <label for="state">State</label>             
                                    <select name="state" id="state-list"  onChange="getCity(this.value);" class="custom-select">
                                        <option value disabled selected>Select State</option>
                                    </select>
                                </div>                                
                                <div class="form-group col-md-4">
                                    <label for="city">City</label>
                                    <select name="city" id="city-list" class="custom-select" required>
                                    <option value="">Select City</option>
                                    </select>
                                </div>                                                              
                            </div>
                            <button type="submit" id='btn_Register' name="btn_Register" class="btn btn-primary">Register</button>
                            <a class="btn" href="?restart=y"><i class="fas fa-redo"> Reset </i></a>
                        </form> 
                        <hr>
                    <button type="submit" name="btn_prev3" id='btn_prev3' class='btn btn-warning btn-wd float-left' onclick="perv3()"> <i class="fas fa-chevron-left"></i> Back  </button>    
                    <button type="submit" name="btn_finish" id='btn_finish' class='btn btn-warning btn-wd float-right btn_finish' onclick="finish()"> finish <i class="fas fa-chevron-right"></i>  </button>    
                </article>
            </div> <!-- card.// -->
        </div> <!-- row.// -->

        <div id="done" class="row justify-content-center mt-5 d-none">
            <div class="card shadow col-md-7 faa-float faa-slow animated">
                <article class="card-body">
                    <center><img src="assets/img/Logos/Tt-paper-plane Full.png" alt="Trip and turn Logo" style="height: 100px;" class="mt-4"/></center>
                    <H1 class="font-family-Alex-title">Congratulation!</H1>
                    <h4 class="">You have registered your self with <span class="text-info font-family-Aclonica"> <i class="fa fa-paper-plane faa-float animated"></i> Trip and turn </span> successfully! </h4>     
                    <p>Now just click on <span> open profile and upload your profile picture.</p>
                    <hr>
                    <button type="submit" name="btn_finish" id='btn_finish' class='btn btn-warning btn-wd float-right btn_finish' onclick="finish()"> Open Profile <i class="fas fa-chevron-right"></i>  </button>    
                </article>
            </div> <!-- card.// -->
        </div> <!-- row.// -->
<?php
    if(!isset($_SESSION['OP']))
    {
    ?>
        <script>
            $("#mail").removeClass("d-none");
        </script>
<?php 
    }
    else if($_SESSION['OP']=='OTP')
    {
     ?>
        <script>
            $("#OTP").removeClass("d-none");
        </script> 
   <?php 
    }
    else if($_SESSION['OP']=='credential')
    {
     ?>
        <script>
            $("#credential").removeClass("d-none");
        </script>
     <?php 
    }
    else if($_SESSION['OP']=='register')
    {
     ?>
        <script>
            $("#register").removeClass("d-none");
        </script> 
    <?php 
    }
    else if($_SESSION['OP']=='done')
    {
        ?>
        <script>
            $("#done").removeClass("d-none");
        </script>
        <?php
    } 
     ?>
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
    <style>
        .notification-error {
            position: absolute;
            top: 40px;
            font-weight: normal;
            font-style: italic;
            right: -18px;
            background: linear-gradient(0deg, rgba(244,67,54,1) 0%, rgba(250,82,70,1) 40%, rgba(255,134,123,1) 80%, rgba(244,67,54,1) 100%);
            min-width: 20px;
            padding: 0px 7px;
            height: 20px;
            border-radius: 10px;
            text-align: center;
            line-height: 19px;
            vertical-align: middle;
            display: block;
            box-shadow:  0.2px 0.5px 3px black;
        }
    </style>
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
        
        

        <!--Custom Navigation-->
        <script>
            $("#btn_next").hide();
            $("#btn_prev").hide();
            $("#btn_next3").hide();
            $("#btn_prev2").hide();
            $("#btn_next4").hide();
            $("#btn_prev3").hide();
            $("#btn_finish").hide();

            function next(){
                $("#mail").hide();
                $("#OTP").show();
                $("#credential").hide();
                $("#register").hide();
                
                $("#mail").removeClass("d-flex");
                $("#mail").addClass("d-none");
                $("#OTP").removeClass("d-none");
                $("#OTP").addClass("d-flex");
                
//                $("#progress").animate({width:"20%"});
            }
            function perv(){
                $("#mail").show();
                $("#OTP").hide();
                $("#credential").hide();
                $("#register").hide();
                
                $("#mail").removeClass("d-none");
                $("#mail").addClass("d-flex");
                $("#OTP").removeClass("d-flex");
                $("#OTP").addClass("d-none");
            }
            function next3(){
                $("#mail").hide();
                $("#OTP").hide();
                $("#credential").show();
                $("#register").hide();
                
                $("#credential").removeClass("d-none");
                $("#credential").addClass("d-flex");
                $("#OTP").removeClass("d-flex");
                $("#OTP").addClass("d-none");
//                $("#progress").animate({width:"40%"});
            }
            function perv2(){
                $("#mail").hide();
                $("#OTP").show();
                $("#credential").hide();
                $("#register").hide();
                
                $("#credential").removeClass("d-flex");
                $("#credential").addClass("d-none");
                $("#OTP").removeClass("d-none");
                $("#OTP").addClass("d-flex");
            }
            function next4(){
                $("#mail").hide();
                $("#OTP").hide();
                $("#credential").hide();
                $("#register").show();
                
                $("#register").removeClass("d-none");
                $("#register").addClass("d-flex");
                $("#credential").removeClass("d-flex");
                $("#credential").addClass("d-none");
//                $("#progress").animate({width:"60%"});
            }
            function perv3(){
                $("#mail").hide();
                $("#OTP").hide();
                $("#credential").show();
                $("#register").hide();   
                
                $("#register").removeClass("d-flex");
                $("#register").addClass("d-none");
                $("#credential").removeClass("d-none");
                $("#credential").addClass("d-flex");
            }  
            function finish(){
                $("#progress").animate({width:"1%"});
                $(".btn_finish").fadeOut(1000,function (){                    
                    $(".btn_finish").fadeIn(100,function (){
                       $(".btn_finish").html("Opning Profile &nbsp; <i class='fas fa-spinner fa-spin'>");
                    });
                    setTimeout(function (){$("#progress").removeClass("progress-bar-info");$("#progress").animate({width:"30%"});$("#progress").addClass("progress-bar-primary");},1000);
                    setTimeout(function (){$("#progress").removeClass("progress-bar-primary");$("#progress").animate({width:"60%"});$("#progress").addClass("progress-bar-danger");},2000);
                    setTimeout(function (){$("#progress").removeClass("progress-bar-danger");$("#progress").animate({width:"80%"});$("#progress").addClass("progress-bar-warning");},3000);
                    setTimeout(function (){$("#progress").removeClass("progress-bar-warning");$("#progress").animate({width:"100%"});$("#progress").addClass("progress-bar-success");
                    setTimeout('window.location.href="profile.php";',2000);},4000);
                });
            }
        </script>
        <!--Custom Navigation ends-->
        
        <!--Default Opening page by progress-->
        
        <?php 
            if(!isset($_SESSION['OP']))
            {
                ?>
                <script>
                    $("#progress").animate({width:"1%"});
                </script>
                <?php
            }
            else if($_SESSION['OP']=='OTP')
            {
                ?>
                <script>
                    $("#btn_next").show();
                    $("#btn_prev").show();
                    $("#progress").animate({width:"20%"});
                </script>
                <?php
            }
            else if($_SESSION['OP']=='credential')
            {
                ?>
                <script>
//                    $("#credential").show();
                    $("#progress").animate({width:"40%"});
                </script>
                <?php
            }
            else if($_SESSION['OP']=='register')
            {
//                echo "<script> $.notify('Welcome  $un,');</script>";
                ?>
                <script>
//                    $("#register").show();
                    $("#progress").animate({width:"60%"});
                </script>
                <?php
            }
            else if($_SESSION['OP']=='done')
            {
                ?>
                <script>
                    $("#progress").animate({width:"80%"});
                    $("#progress").animate({width:"100%"});
                    $("#btn_finish").show();
//                    setTimeout('window.location.href="profile.php";',1000);
                </script>
                <?php
            } 
        ?>
              
        <!--Default Opening page by progress ends-->

        <!--Registration Step 1-->
        <script>
        $(document).ready(function (){
            $("#Registration_Form_Step1").validate({
                rules:{
                    firstname: {
                            required: true,
                            minlength: 3
                    },
                    middlename: {
                            required: true,
                            minlength: 3
                    },
                    lastname: {
                            required: true,
                            minlength: 3
                    },
                    email: {
                            required: true,
                            email: true
                    },
                    contact: {
                            required: true,
                            minlength:10,
                            maxlength:10,
                            number:true
                    }
                },
                messages:{
                    firstname: {
                            required: "<small class='text-danger'>Please enter a firstname<small>",
                            minlength: "<small class='text-danger'>Your firstname must consist of at least 3 characters <small>"
                    },
                    middlename: {
                            required: "<small class='text-danger'>Please enter a middlename<small>",
                            minlength: "<small class='text-danger'>Your middlename must consist of at least 3 characters <small>"
                    },
                    lastname: {
                            required: "<small class='text-danger'>Please enter a lastname<small>",
                            minlength: "<small class='text-danger'>Your lastname must consist of at least 3 characters <small>"
                    },
                    email: {
                            required: "<small class='text-danger'>Please enter a email<small>",
                            email: "<small class='text-danger'>Your email must be vaild<small>"
                    },
                    contact: {
                            required: "<small class='text-danger'>Please enter a contact<small>",
                            minlength:"<small class='text-danger'>Your contact must be only 10 numbers long<small>",
                            maxlength:"<small class='text-danger'>Your contact must be only 10 numbers long<small>",
                            number:"<small class='text-danger'>Please enter numbers only<small>"
                    }
                },
                submitHandler:subform

            })
            function subform(){
                var data =$("#Registration_Form_Step1").serialize();                
                $.ajax({
                    type: 'POST',
                    url: "operations/Registration.php",
                    data: data,
                    beforeSend: function () {
                        $("#info").fadeOut();
                        $("#btn_send").html("Sending &nbsp; <i class='fas fa-envelope faa-passing animated'></i>");
                    },
                    success: function (resp) {
                        if(resp=="ok"){                            
                            $("#btn_send").html("OTP sent &nbsp; <i class='fas fa-check faa-burst faa-fast animated'></i>");
//                            setTimeout('window.location.href="Ajax_confirm_OTP.php";',4000);
                            $("#btn_next").show();
                            $("#btn_prev").show();
                            $("#btn_Confirm").show();
                            $("#btn_Confirm").html('Confirm OTP');
                            $("#btn_Resend").show();
                            $("#progress").animate({width:"20%"});
//                            $("#mail").toggle();
//                            $("#OTP").toggle();
                            countDown(2);
                        }
                        else if((resp=="registered"))
                        {
                            $("#info").fadeIn(1000,function (){
                                $("#info").html("<div class='alert alert-danger'>Email address you entered,<br> is already registered.<br> Please try to <a href='../Trip_and_Turn_2.0/Login.php'>login</a> instead</div>");
                                $("#btn_send").html('Send OTP');
                            })
                        }
                        else if((resp=="no"))
                        {
                            $("#info").fadeIn(1000,function (){
                                $("#info").html("<div class='alert alert-danger'>"+resp+"</div>");
                                $("#btn_send").html('Send OTP');
                            })
                        }
                        else
                        {
                            $("#info").fadeIn(1000,function (){
                                $("#info").html("<div class='alert alert-danger'>Unknown error:<br> "+resp+"</div>");
                                $("#btn_send").html('Send OTP');
                            })
                        }
                    }
                })
            }
        })
        </script>
        <!--Registration Step 1 ends-->

        <!--OTP resend-->
        <script>
        $(document).ready(function(){
          $("#btn_Resend").click(function(){
                var data =$("#Registration_Form_Step1").serialize();
                $.ajax({
                    type: 'POST',
                    url: "operations/Registration.php",
                    data: data,
                    beforeSend: function () {
                        $("#info2").fadeOut();
                        $("#btn_Resend").html("Resending &nbsp; <i class='fas fa-envelope faa-passing animated'></i>");
                    },
                    success: function (resp) {
                        if(resp=="ok"){
                            $("#btn_Resend").html("OTP Resent &nbsp; <i class='fas fa-check faa-burst faa-fast animated'></i>");
//                            setTimeout('window.location.href="Ajax_confirm_OTP.php";',4000);
                            $("#mail").hide();
                            $("#OTP").show();
                            countDown(2);
                        }
                        else if((resp=="registered"))
                        {
                            $("#info2").fadeIn(1000,function (){
                                $("#info2").html("<div class='alert alert-danger'>Email address you entered,<br> is already registered.<br> Please try to <a href='../Trip_and_Turn_2.0/Login.php'>login</a> instead</div>");
                                $("#btn_Resend").html('Resend OTP <i class="fas fa-redo"></i>');
                            })
                        }
                        else
                        {
                            $("#info2").fadeIn(1000,function (){
                                $("#info2").html("<div class='alert alert-danger'>"+resp+"</div>");
                                $("#btn_Resend").html('Resend OTP <i class="fas fa-redo"></i>');
                            })
                        }
                    }
                })
          });
        });
        </script>
        <!--Otp Resend ends-->
        
        <!--Registration Step 2-->
        <script>
            $(document).ready(function (){
                $("#Registration_Form_Step2").validate({
                    rules:{
                        uotp:{
                            required:true,
                            minlength:6,
                            maxlength:6
                        }
                    },
                    messages:{
                        uotp:{
                            required:"<small class='text-danger'>otp is required</small>",
                            minlength:"<small class='text-danger'>otp must be 6 number long</small>",
                            maxlength:"<small class='text-danger'>otp must be 6 number long</small>"
                        }
                    },
                    submitHandler:subform
                    
                })
                function subform(){
                    var data =$("#Registration_Form_Step2").serialize();
                    $.ajax({
                        type: 'POST',
                        url: "operations/Registration.php",
                        data: data,
                        beforeSend: function () {
                            $("#info2").fadeOut();
                            $("#btn_Confirm").html("Checking &nbsp; <i class='fas fa-spinner fa-spin'>");
                        },
                        success: function (resp) {
                            if(resp=="ok"){
                                $("#btn_Confirm").html("Correct &nbsp; <i class='fas fa-check faa-burst faa-fast animated'></i>");
                                //setTimeout('window.location.href="deshbord.php";',4000);
                                $("#btn_next3").show();
                                $("#btn_prev2").show();
                                $("#btn_prev").hide();
                                $("#progress").animate({width:"40%"});
//                                $("#OTP").hide();
//                                $("#credential").show();
                            }
                            else if(resp=="no")
                            {
                                $("#info2").fadeIn(1000,function (){
                                    $("#info2").html("<div class='alert alert-danger'>Incorrect OTP, Please Try again..</div>");
                                    $("#btn_Confirm").html('Confirm OTP');
                                })
                            }
                            else if(resp=="expiered")
                            {
                                $("#info2").fadeIn(1000,function (){
                                    $("#info2").html("<div class='alert alert-warning'> Your OTP might be expired,<br>Please Restart</div>");
                                    $("#btn_Confirm").hide();
                                    $("#btn_Resend").hide();
                                })
                            }
                            else
                            {
                                $("#info2").fadeIn(1000,function (){
                                    $("#info2").html("<div class='alert alert-danger'> Unknown error "+resp+"</div>");
                                    $("#btn_Confirm").html('Confirm OTP');
                                })
                            }
                        }
                    })
                }
            })
        </script>
        <!--Registration Step 2 ends-->
        
        <!--Registration Step 3-->
        <script>
            $(document).ready(function (){
                $("#Registration_Form_Step3").validate({
                    rules:{
                        username:{
                            required:true,
                            minlength:3
                        },
                        password:{
                            required:true,
                            minlength:5
                        },
                        confirmpassword:{
                            required:true,
                            minlength:5,
                            equalTo: "#password"
                        }
                    },
                    messages:{
                        username:{
                            required:"<small class='text-danger'>username is required<small>",
                            minlength:"<small class='text-danger'>username must be at lest 3 character long<small>"
                        },
                        password:{
                            required:"<small class='text-danger'>password is required<small>",
                            minlength:"<small class='text-danger'>password must be at lest 5 character long<small>"
                        },
                        confirmpassword:{
                            required:"<small class='text-danger'>confirm password is required<small>",
                            minlength:"<small class='text-danger'>confirm password must be at lest 5 character long<small>",
                            equalTo: "<small class='text-danger'>confirm password must same as password<small>"

                        }
                    },
                    submitHandler:subform
                    
                })
                function subform(){
                    var data =$("#Registration_Form_Step3").serialize();
                    $.ajax({
                        type: 'POST',
                        url: "operations/Registration.php",
                        data: data,
                        beforeSend: function () {
                            $("#info3").fadeOut();
                            $("#btn_Save").html("Saving &nbsp; <i class='fas fa-spinner fa-spin'>");
                        },
                        success: function (resp) {
                            if(resp=="ok"){
                                $("#btn_Save").html("Saved &nbsp; <i class='fas fa-check faa-burst faa-fast animated'></i>");
                                $("#btn_prev2").hide();
                                $("#btn_next4").show();
                                $("#btn_prev3").show();
                                $("#progress").animate({width:"60%"});
//                                $("#credential").hide();
//                                $("#register").show();
                                $.notify('Mail chould not sent!<br> Your Account Just registered.');
                                $.notify('Welcome <?php if(isset($_SESSION['user'])){ echo $_SESSION['user'].","; } ?> ');
                            }
                            else if(resp=="unavailable")
                            {
                                $("#info3").fadeIn(1000,function (){
                                    $("#info3").html("<div class='alert alert-warning'> Username Unavailable, Please Try again..</div>");
                                    $("#btn_Save").html('Save');
                                })
                            }
                            else if(resp=="no")
                            {
                                $("#info3").fadeIn(1000,function (){
                                    $("#info3").html("<div class='alert alert-danger'>Failed to save "+resp+", Please Try again..</div>");
                                    $("#btn_Save").html('Save');
                                })
                            }
                            else if(resp=="sentok")
                            {
                                $("#btn_Save").html("Saved &nbsp; <i class='fas fa-check faa-burst faa-fast animated'></i>");
                                $("#btn_prev2").hide();
                                $("#btn_next4").show();
                                $("#btn_prev3").show();
                                $("#progress").animate({width:"60%"});
//                                $("#credential").hide();
//                                $("#register").show();
                                $("#info3").fadeIn(1000,function (){
                                    $("#info3").html("<div class='alert alert-success'>Successful,<br>Mail sent too..</div>");
                                })
                                $.notify('Mail sent!<br> Your Account Just registered.');
                                $.notify('Welcome <?php if(isset($_SESSION['user'])){ echo $_SESSION['user'].","; } ?> ');
                            }
                            else 
                            {
                                $("#info3").fadeIn(1000,function (){
                                    $("#info3").html("<div class='alert alert-danger'>Unknown error:<br> "+resp+"</div>");
                                    $("#btn_Save").html('Save');
                                })
                            }
                        }
                    })
                }
            })
        </script>
        <!--Registration Step 3 ends-->
        
        <!--Registration Step 4-->
        <script>
            $(document).ready(function (){
                $("#Registration_Form_Step4").validate({
                    rules:{
                        address:{
                            required:true,
                            minlength:3
                        },
                        country:{
                            required:true
                        },
                        state:{
                            required:true
                        },
                        city:{
                            required:true
                        },
                        pincode:{
                            required:true,
                            minlength:6,
                            maxlength:6,
                            number:true
                        }
                    },
                    messages:{
                        address:{
                            required:"<small class='text-danger'>address is required<small>",
                            minlength:"<small class='text-danger'>address must be at lest 3 character long<small>"
                        },
                        country:{
                            required:"<small class='text-danger'>country is required<small>"
                        },
                        state:{
                            required:"<small class='text-danger'>state is required<small>"
                        },
                        city:{
                            required:"<small class='text-danger'>city is required<small>"
                        },
                        pincode:{
                            required:"<small class='text-danger'>pincode is required<small>",
                            minlength:"<small class='text-danger'>pincode must be 6 numbers long<small>"

                        }
                    },
                    submitHandler:subform
                    
                })
                function subform(){
                    var data =$("#Registration_Form_Step4").serialize();
                    $.ajax({
                        type: 'POST',
                        url: "operations/Registration.php",
                        data: data,
                        beforeSend: function () {
                            $("#info4").fadeOut();
                            $("#btn_Register").html("Recoading &nbsp; <i class='fas fa-spinner fa-spin'>");
                        },
                        success: function (resp) {
                            if(resp=="ok"){
                                $("#btn_Register").html("Recoded &nbsp; <i class='fas fa-check faa-burst faa-fast animated'></i>");
                                $("#btn_prev3").hide();
                                $("#btn_finish").show();
                                $("#progress").animate({width:"80%"});
//                                setTimeout('window.location.href="profile.php";',4000);
                            }
                            else if(resp=="sentok")
                            {
                                $("#btn_Register").html("Recoded &nbsp; <i class='fas fa-check faa-burst faa-fast animated'></i>");
                                $("#btn_prev3").hide();
                                $("#btn_finish").show();
                                $("#progress").animate({width:"80%"});

                                $("#info4").fadeIn(1000,function (){
                                    $("#info4").html("<div class='alert alert-success'>Successful,<br>Mail sent too..</div>");
                                })
//                                setTimeout('window.location.href="profile.php";',4000);

                            }
                            else if(resp=="no")
                            {
                                $("#info4").fadeIn(1000,function (){
                                    $("#info4").html("<div class='alert alert-danger'>Failed to save "+resp+", Please Try again..</div>");
                                    $("#btn_Register").html('Register');
                                })
                            }
                            else
                            {
                                $("#info4").fadeIn(1000,function (){
                                    $("#info4").html("<div class='alert alert-danger'>unknown error: "+resp+"</div>");
                                    $("#btn_Register").html('Register');
                                })
                            }
                        }
                    })
                }
            })
        </script>
        <!--Registration Step 4 ends-->

        <!--check username-->
        <script>
            function checkUsername(str) {
              var xhttp;  
              if (str == "") {
                document.getElementById("txtHint").innerHTML = "";
                $("#btn_Save").attr('disabled',true);
                $("#btn_Save").removeClass("btn-success");
                $("#btn_Save").addClass("btn-primary");
                $("#feedback").remove();
                $("#username").parent().addClass("has-danger");
                $("#username").parent().append('<span id="feedback" class="material-icons form-control-feedback">clear</span>');
                return;
              }
              xhttp = new XMLHttpRequest();
              xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                  if(this.responseText=='ok')
                  {
                    document.getElementById("txtHint").innerHTML = "<span class='badge badge-pill badge-success'>available <i class='fas fa-check'></i></span>";
                    $("#btn_Save").attr('disabled',false);
                    $("#btn_Save").removeClass("btn-danger");
                    $("#btn_Save").addClass("btn-success");
                    $("#username").parent().removeClass("has-danger");
                    $("#feedback").remove();
                    $("#username").parent().addClass("has-success");
                    $("#username").parent().append('<span id="feedback" class="form-control-feedback"><i class="material-icons">done</i></span>');
                  }
                  else if(this.responseText=='no')
                  {
                    document.getElementById("txtHint").innerHTML = "<span  class='badge badge-pill badge-danger'>unavailable <i class='fas fa-close'></i></span>";
                    $("#btn_Save").attr('disabled',true);
                    $("#btn_Save").removeClass("btn-success");
                    $("#btn_Save").addClass("btn-danger");
                    $("#username").parent().removeClass("has-success");
                    $("#feedback").remove();
                    $("#username").parent().addClass("has-danger");
                    $("#username").parent().append('<span id="feedback" class="material-icons form-control-feedback">clear</span>');

                }
                }
              };
              xhttp.open("GET", "operations/checkUsername.php?q="+str, true);
              xhttp.send();
            }
        </script>
        <!--check username ends-->
        
        <!--sync Address data-->
        <script>
            function getState(val) {
                    $.ajax({
                    type: "POST",
                    url: "operations/Address.php",
                    data:'country_id='+val,
                    success: function(data){
                            $("#state-list").html(data);
                            getCity();
                    }
                    });
            }


            function getCity(val) {
                    $.ajax({
                    type: "POST",
                    url: "operations/Address.php",
                    data:'state_id='+val,
                    success: function(data){
                        $("#city-list").html(data);
                    }
                    });
            }
        </script>
        <!--sync Address data ends-->
        
        <!--Date time picker-->
        <script>
            $('.datetimepicker').datetimepicker({
                icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-chevron-up",
                    down: "fa fa-chevron-down",
                    previous: 'fa fa-chevron-left',
                    next: 'fa fa-chevron-right',
                    today: 'fa fa-screenshot',
                    clear: 'fa fa-trash',
                    close: 'fa fa-remove'
                }
            });
        </script>
        <!--Date time picker ends-->
            
</body>
</html>
