<?php 
session_start();
$au=0;
if(isset($_SESSION['user']))
{
    header("location:index.php?Login_status=Y&uname=".$_SESSION['user']."");
}
if(isset($_SESSION['user']))
{
    $au=1;
    $lid=$_SESSION['lid'];
    $un=$_SESSION['user'];
    $uty=$_SESSION['ac_ty'];
}
if(isset($_GET['logout'])=='yes')
{
    session_destroy();
    header("location:index.php");
}
if(isset($_GET['logout'])=='yes')
{
    session_destroy();
    header("location:index.php");
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
      Login - Trip and Turn 
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
    <style>
    #div1 {
      font-size:22px;
    }
    </style>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="assets/font-awesome-animation/font-awesome-animation.min.css" rel="stylesheet" type="text/css"/>
</head>

<body onload="myFunction()" class="login-page sidebar-collapse">
<div id="loader"></div>

  <nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
    <div class="container">
      <div class="navbar-translate">
            <a class="navbar-brand font-family-Aclonica" href="index.php" rel="tooltip" title="Home" data-placement="left"  aria-haspopup="true" aria-expanded="true">
                <img src="assets/img/Logos/Tt-paper-plane.png" style="height: 30px;" />
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
            <?php if($au==0){ ?>
            <li class="nav-item">
                <a href="Register.php" class="btn btn-rose btn-raised btn-round d-none d-md-none d-lg-block">
                <i class="material-icons">person_add</i> Register
              </a>
            </li>
            <li class="nav-item">
                <a href="Register.php" class="btn btn-rose btn-raised nav-link text-white d-md-block d-lg-none" rel="Tooltip" title="Register" >
                <i class="material-icons">person_add</i> Register
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
                <h6 class="dropdown-header"> <?php if($au==0){ ?>Hello, visitor<?php } ?></h6>
                <div class="dropdown-divider"></div>
                <a href="#pablo" class="dropdown-item"><i class="material-icons">settings</i>  Settings</a>
                <div class="dropdown-divider"></div>
              </div>
            </li>
        </ul>
      </div>
    </div>
  </nav> 
  <div class="page-header header-filter" style="background-image: url('assets/img/bg7.jpg'); background-size: cover; background-position: top center;">
    <div class="container">
    <div style="display:none;" id="myDiv" class="animate-bottom">
      <div id="info"></div>
      <div class="row">
        <div class="col-lg-4 col-md-6 ml-auto mr-auto">
          <div class="card card-login">
            <form id="LoginForm" class="form" method="Post">
              <div class="card-header card-header-info text-center">
                <h4 class="card-title">Login</h4>
                <div class="social-line">
                  <a href="#pablo" class="btn btn-just-icon btn-link">
                    <i class="fab fa-facebook-square"></i>
                  </a>
                  <a href="#pablo" class="btn btn-just-icon btn-link">
                    <i class="fab fa-twitter"></i>
                  </a>
                  <a href="#pablo" class="btn btn-just-icon btn-link">
                    <i class="fab fa-google-plus"></i>
                  </a>
                </div>
              </div>
              <p class="description text-center">Or Be Classical</p>
              <div class="card-body">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">face</i>
                    </span>
                  </div>
                    <input type="text" name="User_Name" id="User_Name"  class="form-control" placeholder="Username..." required>
                </div>
<!--                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">mail</i>
                    </span>
                  </div>
                  <input type="email" class="form-control" placeholder="Email...">
                </div>-->
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">lock_outline</i>
                    </span>
                  </div>
                    <input type="password"  name="Password" id="Password" class="form-control" placeholder="Password..." required>
                </div>  
              </div>
              <div class="footer text-center">
                  <button type="submit" name="btn_Login" id="btn_Login" class="btn btn-info btn-lg faa-parent  animated-hover"><span class="faa-flash">Login</span></button>>
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
  <script src="assets/js/core/jquery.min.js" type="text/javascript"></script>
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
  <script src="assets/js/loader.js" type="text/javascript"></script>
  <!--for translate and globe animation-->
    <script>
    function hourglass() {
      var a;
      a = document.getElementById("div1");
      a.innerHTML = "";
      setTimeout(function () {
          a.innerHTML = "";
        }, 100);
      setTimeout(function () {
          a.innerHTML = "";
        }, 200);
      setTimeout(function () {
          a.innerHTML = "";
        }, 300);
      setTimeout(function () {
          a.innerHTML = "";
        }, 400);    
        }
    hourglass();
    setInterval(hourglass, 500);
    </script>
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
    <script type="text/javascript">
    $( document ).ready( function () {
            $( "#LoginForm" ).validate( {
                    rules: {
                            User_Name: {
                                    required: true,
                                    minlength: 3
                            },
                            Password: {
                                    required: true,
                                    minlength: 5
                            }
                    },
                    messages: {
                            User_Name: {
                                    required: "<p class='text-danger mr-2 mt-3'>&larr; &#9888;<p><span class='notification-error'>&#9888; Please enter a username</span>",
                                    minlength: "<p class='text-danger mr-2 mt-3'>&larr; &#9888;<p><span class='notification-error'>&#9888; Your username must consist of at least 3 characters </span>"
                            },
                            Password: {
                                    required: "<p class='text-danger mr-2 mt-3'>&larr; &#9888;<p><span class='notification-error'>&#9888; Please provide a password</span>",
                                    minlength: "<p class='text-danger mr-2 mt-3'>&larr; &#9888;<p><span class='notification-error'>&#9888; Your password must be at least 5 characters long</span>"
                            }
                    },
                    errorPlacement: function(error, element) {
                        error.insertAfter(element)
                    },
                    submitHandler:subform

            } );
    } );
    </script>
    <!--Jquery validation ends-->
    
    <!--Ajax Login-->
    <script>
        function subform(){
            var data =$("#LoginForm").serialize();
            $.ajax({
                type: 'POST',
                url: "operations/database.php",
                data: data,
                beforeSend: function () {
                    $("#info").fadeOut();
                    $("#btn_Login").html("Hang on");
                },
                success: function (resp) {
                    if(resp=="ok")
                    {
                        $("#btn_Login").html(" Loading &nbsp;<i class='fas fa-spinner fa-spin'></i>");
                        setTimeout('window.location.href="preloader/index.html";',4000);
                    }
                    else if(resp=="okadmin")
                    {
                        $("#btn_Login").html(" Loading &nbsp;<i class='fas fa-spinner fa-spin'></i>");
                        setTimeout('window.location.href="Admin.php";',4000);
                    }
                    else if(resp=="found")
                    {
                        $("#btn_Login").html("Login  &nbsp;<i class='fas fa-redo faa-spin'></i>");
                        $("#info").fadeIn(1000,function (){
                            $("#info").html("<div class='alert alert-warning col-lg-4 col-md-6 ml-auto mr-auto '><div class='container'><div class='alert-icon'><i class='material-icons'>error_outline</i></div><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'><i class='material-icons'>clear</i></span></button>Your account is not active. contact admin</div></div></div>");
                            $("#login").html('login');
                        })
                    }
                    else if(resp=="found")
                    {
                        $("#btn_Login").html("Login  &nbsp;<i class='fas fa-redo faa-spin'></i>");
                        $("#info").fadeIn(1000,function (){
                            $("#info").html("<div class='alert alert-warning col-lg-4 col-md-6 ml-auto mr-auto '><div class='container'><div class='alert-icon'><i class='material-icons'>error_outline</i></div><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'><i class='material-icons'>clear</i></span></button>Your account is not active. contact admin</div></div></div>");
                            $("#login").html('login');
                        })
                    }
                    else if(resp=="deactivated")
                    {
                        $("#btn_Login").html("Login  &nbsp;<i class='fas fa-redo faa-spin'></i>");
                        $("#info").fadeIn(1000,function (){
                            $("#info").html("<div class='alert alert-warning col-lg-4 col-md-6 ml-auto mr-auto '><div class='container'><div class='alert-icon'><i class='material-icons'>error_outline</i></div><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'><i class='material-icons'>clear</i></span></button>It's look like your account has been deactived, Please conntact to admin to learn more.</div></div></div>");
                            $("#login").html('login');
                        })
                    }
                    else
                    {
                        $("#btn_Login").html("Login  &nbsp;<i class='fas fa-redo faa-spin'></i>");
                        $("#info").fadeIn(1000,function (){
                            $("#info").html("<div class='alert alert-danger col-lg-4 col-md-6 ml-auto mr-auto '><div class='container'><div class='alert-icon'><i class='material-icons'>error_outline</i></div><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'><i class='material-icons'>clear</i></span></button>"+resp+"<br><a href='forgot.php'><i class='far fa-lightbulb faa-burst animated'></i> &nbsp; <b>Forgot password</b></a>  </div></div></div>");
                            $("#login").html('login');
                        })
                    }
                }
            })
        }
    </script>
    <!--Ajax Login ends-->
</body>
</html>
