<?php 
session_start();
include './operations/Connection.php';
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
    Package - Trip and Turn 
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
.hover-controls {
    display: none;
}  
.hover-body:hover .hover-controls {
    display: block;
}  
.hover-body:hover .hover-controls {
background-color: rgba(0,0,0,0.2);
}  
.rounded {
    text-shadow:none;
}  
</style>
    <style>
    #div1 {
      font-size:22px;
    }
    .error
    {
        color: #f44336 !important;
    }
    </style>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="assets/font-awesome-animation/font-awesome-animation.min.css" rel="stylesheet" type="text/css"/>
    
    <script src="./assets/js/core/jquery.min.js" type="text/javascript"></script>
    <script src="assets/js/plugins/bootstrap-notify.js" type="text/javascript"></script>
    <script src="assets/js/notify.min.js" type="text/javascript"></script>
        <script>
    function showUser(str) {
      if (str=="") {
        document.getElementById("result").innerHTML="<b>Search</b>  Package using name <br><i class='material-icons faa-tada animated'>search</i> ";
        return;
      } 
      if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
      } else { // code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
      }
      xmlhttp.onreadystatechange=function() {
        if (this.readyState==4 && this.status==200) {
          document.getElementById("result").innerHTML=this.responseText;
        }
      }
      xmlhttp.open("GET","operations/packageCustomer?vp=1&<?php if (isset($_GET['t'])){ echo 't=1'; } ?>&q="+str,true);
      xmlhttp.send();
    }
    </script>
</head>

<body class="landing-page sidebar-collapse">
  <nav class="navbar sticky-top navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
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
        <!-- /.navbar-collapse -->
    </div>
  </nav>
  <div class="main main-raised">
    <div class="container-fluid p-5">
                <?php
                if(empty($_GET['fetch']))
                {
                    ?>
        <div class="card card-nav-tabs card-plain">
            <div class="card-header card-header-info">
                <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper">
                        <ul class="nav nav-tabs" data-tabs="tabs">
                            <li class="nav-item">
                                <a class="nav-link active faa-parent animated-hover" href="#view" data-toggle="tab"><i class="material-icons faa-pulse">remove_red_eye</i> View</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link faa-parent animated-hover" href="#search" data-toggle="tab"><i class="material-icons faa-tada">search</i> Search</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card-body ">
                <div class="tab-content">

                    <div class="tab-pane active" id="view">
            <?php
            $sql="SELECT `Package_Id`, `Name`, `Type`, `Cost`, (SELECT tbl_place.Name FROM tbl_place WHERE tbl_place.Place_Id=tbl_package.Place_Id) as place, `Description`, `Picture`, `Number_Person`, `Days`, `Nights`, `Last_Update_Time` FROM `tbl_package`";
            $result = mysqli_query($con,$sql);

            echo'<div class="row">';
                while($row = mysqli_fetch_array($result)) {   
                    echo'   <div class="col-md-3 ml-auto mr-auto">
                                <div class="card card-pricing bg-info hover-body  faa-vertical animated-hover " style="width:17.6rem; height:30rem; margin-top: 10px;    margin-bottom: 10px;">
                                    <div class="card-body text-center">
                                        <div class="card-icon">
                                            <img class="img-raised rounded img-fluid" style="height: 150px;width: 150px;" src="Trip_and_Turn_2.0/'. $row['Picture'] .'" alt=""/>
                                        </div>
                                        <h2 class="card-title">'. $row['Name'] .'</h2>
                                        <h3 class="card-title">'. $row['Cost'] .' &#x20B9; </h3>
                                        <h5 class="card-title  text-capitalize""><i class="fas fa-map-marker-alt"></i>  '. $row['place'] .' <span class="font-weight-bold">('. $row['Type'] .')</span></h5>
                                        <div class="row py-2 bg-light rounded" style="text-shadow: 21px 4px 20px #3a0144;">
                                            <div class="col-md-4 p-2" >
                                                <i class="fas fa-user-astronaut fa-2x text-info"><span class=" bg-white text-info rounded px-1 ml-2">'. $row['Number_Person'] . '</span></i>
                                            </div>
                                            <div class="col-md-4 p-2" >
                                                <i class="fas fa-sun fa-2x text-info""><span class="title bg-white text-info rounded px-1 ml-2">'. $row['Days'] . '</span></i>
                                            </div>
                                            <div class="col-md-4 p-2" >
                                                <i class="fas fa-moon fa-2x text-info""><span class="title bg-white text-info rounded px-1 ml-2">'. $row['Nights'] . '</span></i>
                                            </div>
                                        </div>                            
                                        <p class="card-description">';
                    $s = substr($row['Description'], 0, 100);
                    $resul = substr($s, 0, strrpos($s, ' '));
                    if(strlen($row['Description'])>100){echo $resul.'...';}else{echo $row['Description'];} 
                                       echo' </p>
                                    </div>
                                    <div class="footer justify-content-center border-top">
                                    <i class="fas fa-history"> '. $row['Last_Update_Time'] .'</i>
                                   </div>
                            <div class="card-img-overlay hover-controls " style="padding-top: 200px;    padding-left: 70px;">
                              <div class="footer justify-content-center">';
                        echo '<a href="#pablo" class="btn btn-info btn-just-icon btn-fill btn-round" data-toggle="modal" data-target="#previewModel' . $row['Package_Id'] .'">
                                    <i class="material-icons">subject</i>
                                </a>
                                <a href="?fetch=' . $row['Package_Id'] .'" class="btn btn-success btn-just-icon btn-fill btn-round btn-wd">
                                    <i class="material-icons">done</i>
                                </a>
                                <a class="btn btn-rose btn-just-icon btn-fill btn-round text-white trash" id="'.$row['Package_Id'].'">
                                    <i class="material-icons">favorite</i>
                                </a>';
                        echo '</div>
                            </div>
                                </div>
                            </div>';   
                    echo '<div class="modal fade" id="previewModel' . $row['Package_Id'] .'" tabindex="-1" role="dialog"  aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="card card-plain">
                                      <div class="modal-header">
                                        <h5 class="modal-title card-title">Package preview</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <i class="material-icons">clear</i>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                          <div class="card card-blog">
                                              <center>
                                              <div class="card-header card-header-image" style="width:266px;height:266px;">
                                                  <a href="#pablo">

                                                      <img class="img" src="Trip_and_Turn_2.0/'. $row['Picture'] .'">
                                                      <div class="card-title">
                                                          <i class="fas fa-map-marker-alt"></i> ' . $row['Name'] .' ('. $row['Type'] .')
                                                      </div>
                                                  </a>                                
                                              </div>
                                              </center>      
                                              <div class="card-body text-center">
                                                  <h6 class="card-category text-info"><i class="fas fa-location-arrow"></i> '. $row['place'] .'</h6>
                                                    <div class="row">
                                                        <div class="col-md-4 p-2" >
                                                            <i class="fas fa-user-astronaut fa-2x text-primary"><span class=" bg-white text-primary rounded px-1 ml-2">2</span></i>
                                                        </div>
                                                        <div class="col-md-4 p-2" >
                                                            <i class="fas fa-sun fa-2x text-primary""><span class="title bg-white text-primary rounded px-1 ml-2">2</span></i>
                                                        </div>
                                                        <div class="col-md-4 p-2" >
                                                            <i class="fas fa-moon fa-2x text-primary""><span class="title bg-white text-primary rounded px-1 ml-2">2</span></i>
                                                        </div>
                                                    </div>   
                                                  <p class="card-description">
                                                  '. $row['Description'].'
                                                  </p>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                </div>
                            </div>
                        </div>';
                }?>
                    </div>
                    </div>
                    <div class="tab-pane" id="search">
                        <div class="row">
                          <div class="col-md-12">
                              <div class="card">
                                  <div class="card-header bg-white p-3">
                                        <div class="input-group">
                                              <input type="text" class="form-control" onkeyup="showUser(this.value)" placeholder="Search...">
                                              <button type="submit" class="btn btn-info btn-round btn-just-icon">
                                                <i class="material-icons pl-1 pt-1 faa-float animated">search</i>
                                                <div class="ripple-container"></div>
                                              </button>
                                                <a href="?<?php if (!isset($_GET['t'])){ echo 't'; } ?> " class="btn <?php if (isset($_GET['t'])){ echo 'btn-info'; } ?> btn-just-icon btn-fill btn-round ml-5" rel="tooltip" title="<?php if (isset($_GET['t'])){ echo 'Table view'; }else{ echo 'Card view'; } ?>">
                                                    <?php if (!isset($_GET['t'])){ echo '<i class="material-icons">account_box</i>'; }  else { echo '<i class="material-icons">format_align_justify</i>'; } ?> 
                                                </a>
                                        </div>
                                  </div>
                                  <div class="card-body text-center">
                                        <div id="result"><b>Search</b>  Package using name <br><i class="material-icons faa-tada animated">search</i> </div>
                                  </div>
                              </div>
                          </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>                    
  </div> <?php              
  }
                else{
            $sql="SELECT `Package_Id`, `Name`, `Type`, `Cost`, (SELECT tbl_place.Name FROM tbl_place WHERE tbl_place.Place_Id=tbl_package.Place_Id) as place, `Description`, `Picture`, `Number_Person`, `Days`, `Nights`, `Last_Update_Time` FROM `tbl_package` where Package_Id=".$_GET['fetch'].";";
            $result = mysqli_query($con,$sql);
            while($row = mysqli_fetch_array($result)) 
        {   
                    
            ?>
    
        <div id="info3"></div>
        <form id="paymentForm" method="post">
            <div class="form-row">
                <div class="form-group col-md-7">
                    <div class="form-row">
                        <h3 class="title pl-3"><?php echo $row['Name'].'('.$row['Type'].')';?></h3>
                    </div>
                <div class="form-group bdm-form-group col-md-4">   
                    <label for="Date" class="label-control">DOB</label>
                    <input type="text" id='date' name="date"  class="form-control datetimepicker" value="01/01/2001"/>
                </div> 
                    <div class="bg-light p-3 border">
                     
                    <div class="form-row">
                        <div class="form-group col-md-7">
                            <label for="pymode">Payment Mode</label>
                            <select name="pymode"  class="form-control" required>
                                <option disabled>Select payment mode..</option>
                                <option value="Bank">Bank</option>
                                <option value="Credit-Card" disabled>Credit Card</option>
                                <option value="Debit-Card" disabled>Debit Card</option>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <input type="hidden" name="uid" id="uid" value="<?php echo $_SESSION['uid'];?>"  class="form-control text-center" required>
                            <input type="hidden" name="pid" id="pid" value="<?php echo $row['Package_Id'];?>"  class="form-control text-center" required>
                            <input type="hidden" name="amt" id="amt" value="<?php echo $row['Cost'];?>"  class="form-control text-center" required>
                            <input type="hidden" name="pc" id="pc" value="<?php  $row['Name'];?>"  class="form-control text-center" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-7">
                            <label for="Bank">Bank</label>
                            <select name="Bank"  class="form-control" required>
                                <option disabled selected>Select bank..</option>
                                <option value="AXIS">Axis Bank</option>
                                <option value="BOB">Bank Of Baroda</option>
                                <option value="BOI">Bank Of India</option>
                                <option value="Dena">Dena Bank</option>
                                <option value="CB">Central Bank</option>
                                <option value="SBI">State Bank of India</option>
                            </select>
                        </div> 
                        <div class="form-group col-md-4"style="margin-top: 6px;">
                            <label for="IFSC"  class="bmd-label-static" >IFSC Code</label>
                            <input type="text" id='IFSC' name="IFSC" class="form-control" placeholder="IFSC CODE"/>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group bdm-form-group col-md-8">
                            <label for="ACNO"  class="bmd-label-floating">A/C No</label>
                            <input type="number" maxlength="12" minlength="12" id='ACNO' name="ACNO"  class="form-control"/>
                        </div> 
                    </div>
                    </div>
                </div> 
                <div class="form-group col-md-5 table-responsive-md pt-5">
                    <table id="normal-mode" class="table">
                      <thead>
                        <tr>
                          <th scope="col">Item</th>
                          <th class="text-right" scope="col">Price</th>
                        </tr>
                      </thead>
                      <tbody>
                          <tr >
                          <th scope="row"><?php echo $row['Name'].'('.$row['Type'].')';?> </th>
                          <td class="text-right"><?php echo $row['Cost'];?> &#8377;</td>
                        </tr>
                        <tr class="bg-light">
                          <th scope="row">Total: </th>
                          <td class="text-right"><?php echo $row['Cost'];?> &#8377;</td>
                        </tr>
                      </tbody>
                    </table>
                </div> 
            </div>

          <div class="form-group">
            <div class="form-check">
              <label class="form-check-label">
                  <input class="form-check-input" type="checkbox" value="">
                 Accept Terms and Conditions
                  <span class="form-check-sign">
                    <span class="check"></span>
                  </span>
              </label>
            </div>
          </div>
            <button type="submit" class="btn btn-info" name="btn_PA_Done" id="btn_PA_Done">Complete Payment</button>
        </form>
    <?php
            }
                }
                    ?>

    </div>
  </div>
  <footer class="footer footer-default mb-2 ">  
    <div class="container-fluid">
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
  <script src="assets/js/plugins/bootstrap-notify.js" type="text/javascript"></script>
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
    <script src="assets/animation/globe_anim.js" type="text/javascript"></script>
    <script type="text/javascript">
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

    <script type="text/javascript">
    $( document ).ready( function () {
            $( "#paymentForm" ).validate( {
                    rules: {
                        pymode: {
                                required: true
                        },
                        amt: {
                                required: true
                        },
                        Bank: {
                                required: true
                        },
                        IFSC: {
                                required: true,
                                minlength: 3
                        },
                        ACNO: {
                                required: true,
                                number:true,
                                minlength: 12,
                                maxlength:12
                        }
                    },
                    messages: {
                        pymode: {
                                required: "<small class='text-danger'>Please enter a middlename<small>",
                                minlength: "<small class='text-danger'>Your middlename must consist of at least 3 characters <small>"
                        },
                        amt: {
                                required: "<small class='text-danger'>Please enter a lastname<small>",
                                minlength: "<small class='text-danger'>Your lastname must consist of at least 3 characters <small>"
                        },
                        Bank: {
                                required: "<small class='text-danger'>*birth proof is required<small>"
                        },
                        IFSC: {
                                required: "<small class='text-danger'>Please enter a email<small>",
                                email: "<small class='text-danger'>Your email must be vaild<small>"
                        },
                        ACNO: {
                                required: "<small class='text-danger'>Please enter a Ac no<small>",
                                minlength:"<small class='text-danger'>Your Ac no must be only 12 numbers long<small>",
                                maxlength:"<small class='text-danger'>Your Ac no must be only 12 numbers long<small>",
                                number:"<small class='text-danger'>Please enter numbers only<small>"
                        }                                     
                    },
                    errorPlacement: function(error, element) {
                        error.insertAfter(element)
                    },
                    submitHandler:subform3
            } );
    } )
        function subform3(){
            var data =$("#paymentForm").serialize();
            $.ajax({
                type: 'POST',
                url: "operations/bookPackage.php",
                data: data,
                beforeSend: function () {
                    $("#info3").fadeOut();
                    $("#btn_PA_Done").html("Please wait &nbsp; <span class='fab fa-telegram-plane faa-passing animated'></span>");
                },
                success: function (resp) {
                    if(resp=="done"){                            
                        $("#info3").html("<div class='alert alert-success ml-auto mr-auto '><div class='container'><div class='alert-icon'><i class='material-icons faa-burst faa-fast animated'>check</i></div><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'><i class='material-icons'>clear</i></span></button>All Done</div></div></div>");
                        $("#btn_PA_Done").html("Done &nbsp; <i class='material-icons faa-burst faa-fast animated'>check</i>");
                    }
                    else if(resp=="paidno"){                            
                        $("#info3").html("<div class='alert alert-success ml-auto mr-auto '><div class='container'><div class='alert-icon'><i class='material-icons faa-burst faa-fast animated'>check</i></div><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'><i class='material-icons'>clear</i></span></button>Payment Done data sving failed</div></div></div>");
                        $("#btn_PA_Done").html("Done &nbsp; <i class='material-icons faa-burst faa-fast animated'>check</i>");
                        alert("bye");
                    }
                    else if(resp=="paid"){                            
                        $("#info3").html("<div class='alert alert-success ml-auto mr-auto '><div class='container'><div class='alert-icon'><i class='material-icons faa-burst faa-fast animated'>check</i></div><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'><i class='material-icons'>clear</i></span></button>paid</div></div></div>");
                        $("#btn_PA_Done").html("Done &nbsp; <i class='material-icons faa-burst faa-fast animated'>check</i>");
                    }
                    else if(resp=="notpaid"){                            
                        $("#info3").html("<div class='alert alert-success ml-auto mr-auto '><div class='container'><div class='alert-icon'><i class='material-icons faa-burst faa-fast animated'>check</i></div><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'><i class='material-icons'>clear</i></span></button>not paid</div></div></div>");
                        $("#btn_PA_Done").html("Done &nbsp; <i class='material-icons faa-burst faa-fast animated'>check</i>");
                    }
                    else
                    {
                        $("#btn_PA_Done").html("Retry  &nbsp;<i class='fas fa-redo faa-spin'></i>");
                        $("#info3").fadeIn(1000,function (){
                            $("#info3").html("<div class='alert alert-danger ml-auto mr-auto '><div class='container'><div class='alert-icon'><i class='material-icons faa-burst faa-fast animated'>error_outline</i></div><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'><i class='material-icons'>clear</i></span></button>unknown error,"+resp+"</div></div></div>");
                            $("#btn_PA_Done").html('Complete payment');
                        });
                    }
                }
            });
        }

    </script>
    <!--Ajax enquiry ends-->
  
    <script> 

    function success(){
        $.notify('Upload successful <i class="fas fa-check faa-burst animated faa-fast></i>', {
        allow_dismiss: false,
        type:'success',
        placement: {
                from: 'top',
                align: 'center'
        }
        });
    }
    function warning(msg){
        $.notify(msg+' <i class="fas fa-exclamation-triangle faa-burst animated faa-fast"></i>', {
        allow_dismiss: false,
        type:'warning',
        placement: {
                from: 'top',
                align: 'center'
        }
        });
    }
    function fail(){
        $.notify('Upload Failed <i class="fas fa-exclamation-triangle faa-burst animated faa-fast"></i>', {
        allow_dismiss: false,
        type:'danger',
        placement: {
                from: 'top',
                align: 'center'
        }
        });
    }
    </script>
    
    <script type="text/javascript">
    function googleTranslateElementInit() {
      new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
    }
    </script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    <a href="operations/Address.php"></a>