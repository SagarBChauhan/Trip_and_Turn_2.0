<?php 
session_start();
$au=0;
if(isset($_SESSION['user']))
{
    $au=1;
    $uid=$_SESSION['lid'];
    $un=$_SESSION['user'];
    $uty=$_SESSION['ac_ty'];
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
    Home - Trip and Turn 
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
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

<body class="landing-page sidebar-collapse">
  <nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
    <div class="container">
        <div class="navbar-translate">
            <a class="navbar-brand font-family-Aclonica" href="index.php" rel="tooltip" title="Home" data-placement="left"  aria-haspopup="true" aria-expanded="true">
                <img src="assets/img/Logos/Tt-paper-plane.png" style="height: 30px;" />
                Trip and Turn 
            </a>     
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
        <div class="collapse navbar-collapse justify-content-center">
          <ul class="navbar-nav ml-auto font-family-Cambay ">
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
                <a href="passport_assistance.php" class="dropdown-item">
                    <i class="material-icons">info</i> Passport Assistance
                </a>
                <a href="package.php" class="dropdown-item">
                    <i class="material-icons">layers</i> Packages
                </a>
                <a href="hotel.php" class="dropdown-item">
                  <i class="material-icons">hotel</i> Hotel booking
                </a>
                <a href="transport.php" class="dropdown-item">
                  <i class="material-icons">directions_car</i> Transport booking
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
              <a href="Login.php" class="btn btn-info bg-info btn-raised btn-round d-none d-md-none d-lg-block">
                <i class="fas fa-sign-in-alt"></i> &nbsp;
                Sign in
              </a>
            </li>
            <li class="nav-item">
                <a href="Register.php" class="btn btn-rose btn-raised nav-link text-white d-md-block d-lg-none">
                <i class="material-icons">person_add</i> Register
              </a>
            </li>
            <li class="nav-item">
              <a href="Login.php" class="btn btn-info bg-info btn-raised  nav-link text-white d-md-block d-lg-none">
                <i class="fas fa-sign-in-alt"></i> &nbsp;
                Sign in
              </a>
            </li>
            <?php }
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
              </a>
              <div class="dropdown-menu dropdown-menu-right">
                <h6 class="dropdown-header"> <?php if($au==0){ ?>Hello, visitor<?php }else{ echo $un; } ?></h6>
                <div class="dropdown-divider"></div>
                <?php if($au!=0){ ?>
                <a href="profile.php" class="dropdown-item faa-parent animated-hover"><i class="material-icons faa-float">person_pin</i> &nbsp;  Profile</a>
                <a href="change_password.php" class="dropdown-item faa-parent animated-hover"><i class="material-icons  faa-wrench">lock</i>  Change password</a>
                <?php } ?>
                <?php if(isset($uty)=="Admin"){ ?>
                <a href="Admin.php" class="dropdown-item faa-parent animated-hover"><i class="material-icons">dashboard</i> &nbsp;  dashboard</a>
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
        <!-- /.navbar-collapse -->
    </div>
  </nav>
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
  </ol>
  <div class="carousel">
    <div class="carousel-item active">
        <div class="page-header header-filter w-100" data-parallax="true" style="background-image: url('assets/img/profile_city.jpg')">
          <div class="container">
            <div class="row">
              <div class="col-md-6">
                <h1 class="title font-family-Aclonica-title">Keep Traveling, Keep Exploring.</h1>
                <h4 class=" font-family-Aclonica">Start exploring world with us.</h4>
                <br>
                <a href="preloader/index.html" target="_blank" class="btn btn-danger btn-raised btn-lg">
                  <i class="fa fa-play"></i> Watch video
                </a>
              </div>
            </div>
          </div>
        </div>
    </div>
    <div class="carousel-item">
        <div class="page-header header-filter w-100" data-parallax="true" style="background-image: url('assets/img/bg3.jpg')">
          <div class="container">
            <div class="row">
              <div class="col-md-6">
                <h1 class="title font-family-Cinzel-title">Your Story Starts With Us.</h1>
                <h4 class=" font-family-Cinzel">Join for Free.</h4>
                <br>
                <a href="preloader/index.html" target="_blank" class="btn btn-danger btn-raised btn-lg">
                  <i class="fa fa-play"></i> Watch video<span><i class="fas fa-spinner fa-pulse" style="margin-left: 12px;"></i></span>
                </a>
              </div>
            </div>
          </div>
        </div>
    </div>
    <div class="carousel-item">
        <div class="page-header header-filter w-100" data-parallax="true" style="background-image: url('assets/img/bg.jpg')">
          <div class="container">
            <div class="row">
              <div class="col-md-6">
                <h1 class="title font-family-Alex-title">The world is big and I want to have a good look at it before it gets dark </h1>
                <h4 class="font-family-Alex">- John Muir Quotes.</h4>
                <br>
                <a href="preloader/index.html" target="_blank" class="btn btn-danger btn-raised btn-lg">
                  <i class="fa fa-play"></i> Watch video
                </a>
              </div>
            </div>
          </div>
        </div>
    </div>
    <div class="carousel-item">
        <div class="page-header header-filter w-100" data-parallax="true" style="background-image: url('assets/img/bg2.jpg')">
          <div class="container">
            <div class="row">
              <div class="col-md-6">
                <h1 class="title font-family-Cambay-title">TRAVEL is the best education anyone can have.</h1>
                <h4 class="font-family-Cambay">-Explorer.</h4>
                <br>
                <a href="preloader/index.html" target="_blank" class="btn btn-danger btn-raised btn-lg">
                  <i class="fa fa-play"></i> Watch video
                </a>
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
  <div class="main main-raised">
    <div class="container">
      <div class="section text-center">
        <div class="row">
          <div class="col-md-8 ml-auto mr-auto">
              <h2 class="title" onmouseover="typeWriter()">Let&apos;s see transport Service</h2> 

            <h5 class="description font-italic">
                <span><p id="demo"> </p><i class="fas fa-spinner fa-pulse"></i></span>
            <script>
                var i = 0;
                var txt = 'We provide verity kind of transport services, with verity of options on very cheap rate which is affordable by our present customers. Customer need is our first priority..';
                var speed = 50;

                function typeWriter() {
                  if (i < txt.length) {
                    document.getElementById("demo").innerHTML += txt.charAt(i);
                    i++;
                    setTimeout(typeWriter, speed);
                  }
                }
            </script>
          </div>
        </div>
        <div class="features">
          <div class="row">
            <div class="col-md-3">
              <div class="info faa-parent animated-hover">
                <div class="icon icon-info  faa-bounce">
                  <i class="fas fa-map-marker-alt"></i>
                </div>
                <h4 class="info-title">Local</h4>
                <p>Book your car now & enjoy the ride at best affordable tariff plans for your local getaways.</p>
              </div>
            </div>
            <div class="col-md-3">
              <div class="info faa-parent animated-hover">
                <div class="icon icon-success faa-wrench">
                    <i class="fas fa-map-marked "></i>
                </div>
                <h4 class="info-title">Outstation</h4>
                <p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
              </div>
            </div>
 
            <div class="col-md-3">
              <div class="info  faa-parent animated-hover">
                <div class="icon icon-danger  faa-passing ">
                    <i class="fas fa-plane"></i>
                </div>
                <h4 class="info-title">Airport</h4>
                <p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
              </div>
            </div>
            <div class="col-md-3">
              <div class="info faa-parent animated-hover">
                <div class="icon icon-danger faa-spin">
                    <i class="fas fa-compass "></i>
                </div>
                <h4 class="info-title">Self Drive</h4>
                <p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="section text-center faa-parent animated-hover">
        <h2 class="title ">Here is our team</h2>
        <div class="team faa-float">
          <div class="row">
            <div class="col-md-4">
              <div class="team-player">
                <div class="card card-plain faa-parent animated-hover">
                  <div class="col-md-6 ml-auto mr-auto faa-tada">
                      <img src="assets/img/sagar-dp.jpg" alt="Thumbnail Image" class="img-raised rounded-circle img-fluid">
                  </div>
                  <h4 class="card-title">Sagar Chauhan
                    <br>
                    <small class="card-description text-muted">Designer</small>
                  </h4>
                  <div class="card-body">
                    <p class="card-description"> Hello you can connect using me from below 
                      <a href="#">links</a> </p>
                  </div>
                  <div class="card-footer justify-content-center">
                    <a href="#pablo" class="btn btn-link btn-just-icon"><i class="fab fa-twitter"></i></a>
                    <a href="#pablo" class="btn btn-link btn-just-icon"><i class="fab fa-instagram"></i></a>
                    <a href="#pablo" class="btn btn-link btn-just-icon"><i class="fab fa-facebook-square"></i></a>  
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="team-player">
                <div class="card card-plain faa-parent animated-hover">
                  <div class="col-md-6 ml-auto mr-auto  faa-float">
                      <img src="assets/img/sagar-rnam-square.jpg" alt="Thumbnail Image" class="img-raised rounded-circle img-fluid">
                  </div>
                  <h4 class="card-title">Rinam Panchal
                    <br>
                    <small class="card-description text-muted">Model</small>
                  </h4>
                  <div class="card-body">
                    <p class="card-description"> Hello you can connect using me from below 
                      <a href="#">links</a> </p>
                  </div>
                  <div class="card-footer justify-content-center">
                    <a href="#pablo" class="btn btn-link btn-just-icon"><i class="fab fa-twitter"></i></a>
                    <a href="#pablo" class="btn btn-link btn-just-icon"><i class="fab fa-instagram"></i></a>
                    <a href="#pablo" class="btn btn-link btn-just-icon"><i class="fab fa-facebook-square"></i></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="team-player">
                <div class="card card-plain faa-parent animated-hover">
                  <div class="col-md-6 ml-auto mr-auto   faa-float">
                      <img src="assets/img/sagar-BW.jpg" alt="Thumbnail Image" class="img-raised rounded-circle img-fluid">
                  </div>
                  <h4 class="card-title">Saggy
                    <br>
                    <small class="card-description text-muted">Model</small>
                  </h4>
                  <div class="card-body">
                    <p class="card-description"> Hello you can connect using me from below 
                      <a href="#">links</a> </p>
                  </div>
                  <div class="card-footer justify-content-center">
                    <a href="#pablo" class="btn btn-link btn-just-icon"><i class="fab fa-twitter"></i></a>
                    <a href="#pablo" class="btn btn-link btn-just-icon"><i class="fab fa-instagram"></i></a>
                    <a href="#pablo" class="btn btn-link btn-just-icon"><i class="fab fa-facebook-square"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="section section-contacts">
        <div class="row">
          <div class="col-md-8 ml-auto mr-auto">
            <h2 class="text-center title">Enquire now</h2>
            <h4 class="text-center description">Feel free to ask for enquiry, just fill form below and send it .</h4>
            <form class="contact-form" id="enqForm" action="#" method="Post">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Your Name</label>
                    <input type="text" name="name" class="form-control" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Your Email</label>
                    <input type="email" name="email" class="form-control" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Your contact</label>
                    <input type="text" name="contatct" maxlength="10" class="form-control" required >                        
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Your subject</label>
                    <select name="subject" class="form-control" required>
                        <option disabled selected>Select any subject</option>
                        <?php 
                         include './operations/Connection.php';
                        $sql_select_subject="SELECT * FROM `tbl_enquirycategory` where EC_Id!=0 ORDER BY Name ASC";
                        $Result_subject=  mysqli_query($con, $sql_select_subject);                 
                        foreach ($Result_subject as $subjects)
                        {
                            $subject_id= $subjects['EC_Id'];
                            $subject= $subjects['Name'];
                            echo"<option value='$subject_id'> $subject</option>";                               
                        }
                        ?>
                        <option value='0'>Other</option>
                    </select>                      
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="exampleMessage" class="bmd-label-floating">Your Message</label>
                <textarea type="text" name="message" class="form-control" rows="4" id="exampleMessage" required></textarea>
              </div>
              <div class="row">
                <div class="col-md-4 ml-auto mr-auto text-center">
                    <button type="submit" name="btn_Send_Msg" id="btn_Send_Msg" class="btn btn-primary btn-raised btn-lg faa-parent animated-hover" style="border-radius: 20px 20px 20px 0px;">
                      Send Message &nbsp; <span class="fab fa-telegram-plane faa-horizontal"></span>
                  </button>
                </div>
              </div>
            </form>
            <div id="info"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
<style>
    footer ul li a {
    color: inherit;
    padding: 0.1rem;}
    li{
        text-align: start;
    }
</style>
  <footer class="footer footer-default main-raised mb-2 ">  
    <div class="container-fluid">
        <div class="mt-5 collapse" id="sitemap" style="  background:linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)), url('img/slide/sea3_Ad_16x5.3.jpg') center center no-repeat;  background-size: cover;">
            <nav class="navbar navbar-transparent" style="color:#ffffff; text-shadow:0.5px 0.5px 1.3px white;">
            <div class="container font-family-Cambay">
                <ul class="navbar-nav">                
                    <h4 class="title"><i class="fab fa-product-hunt text-info"></i> PRODUCT OFFERING</h4>
                    <li>
                        <a  href="">Flights</a>
                    </li>
                    <li>
                        <a href="">International Flights</a>
                    </li>
                    <li>                    
                        <a href="">Hotels</a>
                    </li>
                    <li><a href="">International Hotels</a></li>
                    <li><a href="">Holidays In India</a></li>
                    <li><a href="">International Holidays</a></li>
                    <li><a href="">Cabs</a></li>
                    <li><a href="">Cheap Tickets to India</a></li>
                    <li><a href="">Bus Tickets</a></li>
                    <li><a href="">Rail</a></li>
                    <li><a href="">Route Planner</a></li>
                    <li><a href="">Flight Status</a></li>
                    <li><a href="">Mobile Apps</a></li>
                </ul>
                <ul class="navbar-nav ">
                    <h4 class="title"> <img src="img/T&T- Blue-Sky Blue.png" style="width: 20px;" alt=""/> TRIP AND TURN </h4>
                    <li><a  href="">About Us</a></li>
                    <li><a  href="">Investor Relations</a></li>
                    <li><a  href="">Testimonial</a></li>
                    <li><a  href="">Reviews</a></li>
                    <li><a  href="">Careers</a></li>
                    <li><a  href="">Corporate Travel</a></li>
                    <li><a  href="">Travel Guide</a></li>
                    <li><a  href="">Travel Blog</a></li>
                    <li><a  href="">Offers</a></li>
                    <li><a  href="">Gift Vouchers</a></li>
                    <li><a  href="">Coupons</a></li>
                    <li><a  href="">My Trip Essentials</a></li>
                    <li><a  href="">Deals</a></li>
                    <li><a  href="">Stories</a></li>
                    <li><a  href="">Trip Planner</a></li>
                    <li><a  href="">Foundation</a></li>
                    <li><a  href="">CSR Policy</a></li>
                    <li><a  href="">Travel Community</a></li>
                </ul>
                <ul class="navbar-nav">
                    <h4 class="title"><i class="fas fa-info-circle text-info"></i> ABOUT THE SITE</h4>
                    <li><a  href="">Contact Us</a></li>
                    <li><a  href="">Payment Security</a></li>
                    <li><a  href="">Privacy Policy</a></li>
                    <li ><a  href="">User Agreement</a></li>
                    <li ><a  href="">Visa Information</a></li>
                    <li ><a  href="">More Offices</a></li>
                    <li ><a  href="">Make A Payment</a></li>
                    <li ><a  href="">Report a defect/Bug Bounty</a></li>
                </ul>
                <ul class="navbar-nav">
                    <h4 class="title"><i class="fas fa-hands-helping text-info"></i> PARTNER PROGRAMS</h4>
                    <li ><a  href="">Our Retail Stores</a></li>
                    <li ><a  href="">Franchise Program Details</a></li>
                    <li ><a  href="">Foreign Exchange</a></li>
                    <li ><a  href="">Apollo Munich – Travel Insurance</a></li>
                    <li ><a  href="">List your hotel</a></li>
                </ul>
                <ul class="navbar-nav">
                    <h4 class="title"><i class="fab fa-battle-net text-info"></i> SOCIAL NETWORK</h4>
                    <li class="nav-item">
                     <span class="badge badge-pill badge-light text-gray p-2" style="margin-right: -20px; box-shadow: 2px 2px 5px gray inset; text-transform: unset;">Twitter ...</span>
                     <a class="btn btn-social btn-just-icon btn-round btn-twitter bg-info" rel="tooltip" title="" data-placement="right" href="https://twitter.com/" target="_blank" data-original-title="Follow us on Twitter">
                        <i class="fab fa-twitter mt-2"></i>
                     </a> 
                    </li>
                    <li class="nav-item">
                      <span class="badge badge-pill badge-light text-gray p-2" style="margin-right: -20px; box-shadow: 2px 2px 5px gray inset;text-transform: unset;">Facebook ...</span>
                      <a class="btn btn-social btn-just-icon btn-round btn-facebook bg-fb" rel="tooltip" title="" data-placement="right" href="https://www.facebook.com/" target="_blank" data-original-title="Like us on Facebook">
                        <i class="fab fa-facebook-square mt-2"></i>
                      </a>
                    </li>
                    <li class="nav-item">
                      <span class="badge badge-pill badge-light text-gray  p-2" style="margin-right: -20px; box-shadow: 2px 2px 5px gray inset; text-transform: unset;">Instagram  ...</span>
                      <a class="btn btn-social btn-just-icon btn-round btn-facebook bg-insta" rel="tooltip" title="" data-placement="right" href="https://www.instagram.com/" target="_blank" data-original-title="Follow us on Instagram">
                        <i class="fab fa-instagram mt-2"></i>
                      </a>
                    </li>
                    <li class="nav-item">
                      <span class="badge badge-pill badge-light text-gray  p-2" style="margin-right: -20px; box-shadow: 2px 2px 5px gray inset; text-transform: unset;">Instagram  ...</span>
                      <a class="btn btn-social btn-just-icon btn-round btn-success" rel="tooltip" title="" data-placement="right" href="https://wa.me/917069236002"target="_blank" data-original-title="Follow us on Instagram">
                        <i class="fab fa-whatsapp mt-2"></i>
                      </a>
                    </li>
                </ul>
            </div>
          </nav>
        </div> 
        <center class="mt-5"><a data-toggle="collapse" data-target="#sitemap"><i class="fas fa-chevron-circle-down fa-3x faa-falling animated"></i></a></center>
        <h2 class="title text-capitalize" data-container="body" data-toggle="popover" data-placement="bottom" data-content="Navigate to below map pin. ">
         How to reach us
        </h2>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3726.8272477512824!2d72.9333802145604!3d20.91926879688382!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be0f79b6799892f%3A0x29c98d62aebb828c!2sTrip+and+Turn+Tours+and+Travels(KEEP+TRAVELING%2CKEEP+EXPLORING)!5e0!3m2!1sen!2sin!4v1554812138745!5m2!1sen!2sin" width="100%" height="450" frameborder="0" class="main-raised m-auto" style="border:2px solid white;" allowfullscreen></iframe>        

<!--        
            Map in popover
            <div class="popover fade show bs-popover-bottom" role="tooltip" id="popover849506" x-placement="bottom" style="position: absolute;top: 3360px;  max-width: 100%; width: 1400px;  left: 60px;" >
            <div class="arrow" style="left: 49%;"></div>
            <h3 class="popover-header font-family-Cinzel">How to reach us</h3>
            <hr>
            <div class="popover-body">        
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3726.8272477512824!2d72.9333802145604!3d20.91926879688382!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be0f79b6799892f%3A0x29c98d62aebb828c!2sTrip+and+Turn+Tours+and+Travels(KEEP+TRAVELING%2CKEEP+EXPLORING)!5e0!3m2!1sen!2sin!4v1554812138745!5m2!1sen!2sin" width="100%" height="450" frameborder="0" class="main-raised m-auto" style="border:2px solid white;" allowfullscreen></iframe>        
            </div>
             <hr style="style="padding-top: 570px;"">
        </div>-->
        <nav class="mt-3">
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
        <hr>
          &copy; 
        <script>
          document.write(new Date().getFullYear())
        </script>
        <a href="index.php" target="_blank">Trip and Turn</a>
    </div>
  </footer>
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
    <script src="jquery-validation-1.19.0/dist/jquery.validate.js" type="text/javascript"></script>
    <script src="assets/js/loader.js" type="text/javascript"></script>
    <script type="text/javascript">
    $( document ).ready( function () {
            $( "#enqForm" ).validate( {
                    rules: {
                            name: {
                                    required: true,
                                    minlength: 4
                            },
                            email: {
                                    required: true,
                                    email: true
                            },
                            contatct: {
                                    required: true,
                                    minlength: 10,
                                    maxlength:10,
                                    number:true
                            },
                            subject: {
                                    required: true,
                            },
                            message: {
                                    required: true,
                                    minlength: 5,
                                    maxlength:999
                            }
                    },
                    messages: {
                            name: {
                                    required: "<div style='width: 100%; color: red;  font-size: small;'>*Please enter a name</div>",
                                    minlength: "<div style='width: 100%; color: red; font-size: small;'>*Your name must consist of at least 4 characters</div>"
                            },
                            email: "<div style='width: 100%; color: red; font-size: small;'>*Please enter a valid email address</div>",
                            contatct: {
                                    required: "<div style='width: 100%; color: red; font-size: small;'>*Please provide a contact number</div>",
                                    minlength: "<div style='width: 100%; color: red; font-size: small;'>*Your contact number must be only 10 number long</div>",
                                    maxlength: "<div style='width: 100%; color: red; font-size: small;'>*Your contact number must be only 10 number long</div>",
                                    number: "<div style='width: 100%; color: red; font-size: small;'>*only numbers allowd</div>"
                            },
                            subject: {
                                    required: "<div style='width: 100%; color: red; font-size: small;'>*Please select any subject</div>",
                            },                                        
                            message: {
                                    required: "<div style='width: 100%; color: red; font-size: small;'>*Please provide a message</div>",
                                    minlength: "<div style='width: 100%; color: red; font-size: small;'>*Your message must be at least 5 characters long</div>",
                                    maxlength: "<div style='width: 100%; color: red; font-size: small;'>*Your message must be less then 1000 characters long</div>"
                            }                                        
                    },
                    errorPlacement: function(error, element) {
                        error.insertAfter(element)
                    },
                    submitHandler:subform
            } );
    } );
    </script>
    <!--Ajax enquiry-->
    <script>
        function subform(){
            var data =$("#enqForm").serialize();
            $.ajax({
                type: 'POST',
                url: "operations/database.php",
                data: data,
                beforeSend: function () {
                    $("#info").fadeOut();
                    $("#btn_Send_Msg").html("Sending Message &nbsp; <span class='fab fa-telegram-plane faa-passing animated'></span>");
                },
                success: function (resp) {
                    if(resp=="ok"){                            
                        $("#info").html("<div class='alert alert-success ml-auto mr-auto '><div class='container'><div class='alert-icon'><i class='material-icons faa-burst faa-fast animated'>check</i></div><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'><i class='material-icons'>clear</i></span></button>Message sent</div></div></div>");
                        $("#btn_Send_Msg").html("Message sent &nbsp; <i class='material-icons faa-burst faa-fast animated'>check</i>");
                    }
                    else
                    {
                        $("#btn_Send_Msg").html("Retry  &nbsp;<i class='fas fa-redo faa-spin'></i>");
                        $("#info").fadeIn(1000,function (){
                            $("#info").html("<div class='alert alert-danger ml-auto mr-auto '><div class='container'><div class='alert-icon'><i class='material-icons faa-burst faa-fast animated'>error_outline</i></div><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'><i class='material-icons'>clear</i></span></button>Message not sent,"+resp+"</div></div></div>");
                            $("#btn_Send_Msg").html('login');
                        })
                    }
                }
            })
        }
    </script>
    <!--Ajax enquiry ends-->

    <script>
    function myMap() {
    var mapProp= {
      center:new google.maps.LatLng(51.508742,-0.120850),
      zoom:5
    };
    var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
    }
    </script>

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