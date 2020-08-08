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
    Passport assistance - Trip and Turn 
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
    <div class="container p-5">
        <h2 class="title" data-toggle="collapse" data-target=".steps" aria-expanded="false" style="cursor: pointer;">Easy 3 Step Passport Assistance <i class="material-icons">info</i></h2>
        <div class="row">
            <div class="col">
              <div class="collapse steps">
                <div class="card card-body">
                    <h4>Step 1</h4>
                    Register basic details..
                </div>
              </div>
            </div>
            <div class="col">
              <div class="collapse steps">
                <div class="card card-body">
                    <h4>Step 2</h4>
                    Upload documents..
                </div>
              </div>
            </div>
            <div class="col">
              <div class="collapse steps">
                <div class="card card-body">
                    <h4>Step 3</h4>
                    Choose mode,<br>
                    <span class="badge badge-pill badge-secondary">normal</span> <center>Or</center> <span class="badge badge-pill badge-success">fast <i class="fas fa-bolt faa-tada animated"></i></span>& Complete payment..
                </div>
              </div>
            </div>
            <div class="col">
              <div class="collapse steps">
                <div class="card card-body">
                    Appear for appointment,<br> Police verification,<br> your passport will be shipped in 7 working days by post  <a href="">Learn more..</a>
                </div>
              </div>
            </div>
        </div>
<ul class="nav nav-pills nav-pills-info" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#link1" id="alink1" role="tablist" aria-expanded="true">
           #1 Details
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#link2" id="alink2" role="tablist" aria-expanded="false">
            #2 Upload Document
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#link3" id="alink3" role="tablist" aria-expanded="false">
            #3 Payment
        </a>
    </li>
</ul>
<div class="tab-content tab-space">
    <div class="tab-pane active" id="link1" aria-expanded="true">
        <div id="info"></div>
        <form id="passportForm" method="post">
            <div class="form-row">
                <div class="form-group  bmd-form-group col-md-4 has-info">
                    <label for="firstname" class="bmd-label-floating" >firstname</label>
                    <input name="firstname" id="firstname"  type="text" class="form-control"   value="">
                </div>
                <div class="form-group  bmd-form-group col-md-4 has-info">
                    <label for="middlename" class="bmd-label-floating" >middlename</label>
                    <input name="middlename" type="text" class="form-control" value="">

                </div>
                <div class="form-group  bmd-form-group col-md-4 has-info">
                    <label for="lastname" class="bmd-label-floating" >lastname</label>
                    <input name="lastname" type="text" class="form-control"  value="">
                </div>
                <div class="form-group  bmd-form-group col-md-4 has-info">
                    <label class="label-control pr-5">Gender:</label>
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
                </div>
                <div class="form-group bdm-form-group col-md-4">   
                    <label for="DOB" class="label-control">DOB</label>
                    <input type="text" id='DOB' name="DOB"  class="form-control datetimepicker" value="01/01/2001"/>
                </div>
                <div class="form-group  bmd-form-group col-md-4 has-info">
                    <label for="addharno" class="bmd-label-floating" >addhar number</label>
                    <input name="addharno" type="text" class="form-control" value="" >                        
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
                    <label for="state">State</label>             
                    <select name="state" id="state-list"  onChange="getCity(this.value);" class="custom-select">
                        <option value disabled selected>Select State</option>
                        <?php
                        $results=  mysqli_query($con, "SELECT * FROM `tbl_state`;");
                        foreach($results as $state) {
                        ?>
                        <option value="<?php echo $state["State_Id"]; ?>"><?php echo $state["Name"]; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>                                
                <div class="form-group col-md-4">
                    <label for="city">City</label>
                    <select name="city" id="city-list" class="custom-select" required>
                    <option value="">Select City</option>
                    </select>
                </div>                
                <div class="form-group  bmd-form-group col-md-6 has-info">
                    <label for="email" class="bmd-label-floating" >email</label>
                    <input name="email" type="email" class="form-control" value="">                        
                </div>
                <div class="form-group  bmd-form-group col-md-6 has-info">
                    <label for="contact" class="bmd-label-floating" >contact</label>
                    <input name="contact" type="text" class="form-control" value="">
                </div> 
            </div>
            <button type="submit" name="sub_Step1_Details" id="btn_step1" class="btn btn-info">Save</button>
        </form>
    </div>
    <div class="tab-pane" id="link2" aria-expanded="false">
        <div id="err"></div>
        <form id="uploadForm" method="post"  enctype="multipart/form-data">
            <div class="form-row">
                <div class="input-group mb-3 col-md-6">
                  <div class="custom-file">
                      <input type="file" class="custom-file-input" name="birthproof" id="birthproof" required="">
                    <label class="custom-file-label text-info" for="birthproof">Choose Birth Proof file..</label>
                  </div>                 
                  <div class="input-group-prepend">
                      <button class="btn btn-outline-info btn-sm" type="submit" name="btn_upload_birthproof" >Upload</button>
                  </div>
                </div> 
                <span id="file1" class="mt-2 text-success d-none">
                <i class="material-icons">done</i>
                </span>
            </div>
            <div class="form-row">
                <div class="input-group mb-3 col-md-6">
                  <div class="custom-file">
                      <input type="file" class="custom-file-input" name="addressproof" id="addressproof" required="">
                    <label class="custom-file-label text-info" for="addressproof">Choose Residence proof file..</label>
                  </div>
                    <div class="input-group-prepend">
                        <button class="btn btn-outline-info btn-sm " type="submit" name="btn_upload_addressproof">Upload</button>
                  </div>
                </div>
                <span id="file2" class="mt-2 text-success d-none">
                <i class="material-icons">done</i>
                </span>
            </div>
            <div class="form-row">
                <div class="input-group mb-3 col-md-6">
                  <div class="custom-file">
                      <input type="file" class="custom-file-input" name="addharproof" id="addharproof" required="">
                    <label class="custom-file-label text-info" for="addharproof">Choose Addhar proof file..</label>
                  </div>
                  <div class="input-group-prepend">
                      <button class="btn btn-outline-info btn-sm" type="submit" name="btn_upload_addharproof">Upload</button>
                  </div>
                </div>
                <span id="file3" class="mt-2 text-success d-none">
                <i class="material-icons">done</i>
                </span>
            </div>
            <button type="submit" class="btn btn-info"  name="sub_Step2" id="btn_step2" >Upload</button>
        </form>
        <h3 class="title">Guidelines:</h3>
        <p><i class="material-icons">done</i> Uploaded must be in PDF or Image file</p>
        <p><i class="material-icons">done</i> All the fields on document should be clearly visible.</p>
        <p><i class="material-icons">done</i> All document must be legitimate.</p>
    </div>
    <div class="tab-pane" id="link3" aria-expanded="false">
        <div id="info3"></div>
        <form id="paymentForm" method="post">
            <div class="form-row">
                <div class="form-group col-md-7">
                    <div class="form-row">
                        <div class="form-group col-md-7">
                            <label for="prmode">Process Mode</label>
                            <select name="prmode" id="prmode" class="custom-select" onchange="mode(this.value);" required>
                                <option disabled>Select Mode</option>
                                <option value="0">Normal</option>
                                <option value="1">Fast</option>
                            </select>
                        </div>
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
                            <input type="hidden" name="amt" id="amt" value="1700"  class="form-control text-center" required>
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
                <div class="form-group col-md-5 table-responsive-md">
                    <table id="normal-mode" class="table">
                      <thead>
                        <tr>
                          <th scope="col">Item</th>
                          <th class="text-right" scope="col">Price</th>
                        </tr>
                      </thead>
                      <tbody>
                          <tr >
                          <th scope="row">Fees: </th>
                          <td class="text-right">200 &#8377;</td>
                        </tr>
                        <tr>
                          <th scope="row">Normal Mode:</th>
                          <td class="text-right">1500 &#8377;</td>

                        </tr>
                        <tr class="bg-light">
                          <th scope="row">Total: </th>
                          <td class="text-right">1700 &#8377;</td>
                        </tr>
                      </tbody>
                    </table>
                    <table id="fast-mode" class="table">
                      <thead>
                        <tr>
                          <th scope="col">Item</th>
                          <th class="text-right" scope="col">Price</th>
                        </tr>
                      </thead>
                      <tbody>
                          <tr >
                          <th scope="row">Fees: </th>
                          <td class="text-right">200 &#8377;</td>
                        </tr>
                        <tr>
                          <th scope="row">Fast Mode:</th>
                          <td class="text-right">3000 &#8377;</td>

                        </tr>
                        <tr class="bg-light">
                          <th scope="row">Total: </th>
                          <td class="text-right">3200 &#8377;</td>
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
    </div>
</div>

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
    
    <script>
        var Step=<?php if (isset($_SESSION['PAStep'])){echo $_SESSION['PAStep'];} ?>;
        if(Step==1)
        {
            $("#link1").removeClass("active");
            $("#alink1").removeClass("active");
            $("#link2").addClass("active");
            $("#alink2").addClass("active");    
        }
        else if(Step==2)
        {            
            $("#link1").removeClass("active");
            $("#alink1").removeClass("active");
            $("#link3").addClass("active");
            $("#alink3").addClass("active");            
        }
    </script>
    
    <script type="text/javascript">
    $( document ).ready( function () {
            $( "#passportForm" ).validate( {
                    rules: {
                        firstname: {
                                required: true,
                                minlength: 4
                        },
                        middlename: {
                                required: true,
                                minlength: 3
                        },
                        lastname: {
                                required: true,
                                minlength: 3
                        },
                        birthproof: {
                                required: true
                        },
                        address: {
                                required: true,
                                minlength: 3,
                                maxlength:255
                        },
                        pincode: {
                                required: true
                        },
                        state: {
                                required: true
                        },
                        city: {
                                required: true
                        },
                        addressproof: {
                                required: true
                        },
                        addharno: {
                                required: true,
                                maxlength:12,
                                minlength:12
                        },
                        addharproof: {
                                required: true,
                                email: true
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
                    messages: {
                        firstname: {
                                required: "<small class='text-danger'>Please enter a name</small>",
                                minlength: "<small class='text-danger'>Your name must consist of at least 4 characters</small>"
                        },
                        middlename: {
                                required: "<small class='text-danger'>Please enter a middlename<small>",
                                minlength: "<small class='text-danger'>Your middlename must consist of at least 3 characters <small>"
                        },
                        lastname: {
                                required: "<small class='text-danger'>Please enter a lastname<small>",
                                minlength: "<small class='text-danger'>Your lastname must consist of at least 3 characters <small>"
                        },
                        birthproof: {
                                required: "<small class='text-danger'>*birth proof is required<small>"
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
                    errorPlacement: function(error, element) {
                        error.insertAfter(element)
                    },
                    submitHandler:subform
            } );
    } )
        function subform(){
            var data =$("#passportForm").serialize();
            $.ajax({
                type: 'POST',
                url: "operations/database.php",
                data: data,
                beforeSend: function () {
                    $("#info").fadeOut();
                    $("#btn_step1").html("Saving Data &nbsp; <span class='fab fa-telegram-plane faa-passing animated'></span>");
                },
                success: function (resp) {
                    if(resp=="ok"){                            
                        $("#info").html("<div class='alert alert-success ml-auto mr-auto '><div class='container'><div class='alert-icon'><i class='material-icons faa-burst faa-fast animated'>check</i></div><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'><i class='material-icons'>clear</i></span></button>Data Saved</div></div></div>");
                        $("#btn_step1").html("Saved &nbsp; <i class='material-icons faa-burst faa-fast animated'>check</i>");
                        $("#link1").removeClass("active");
                        $("#link2").addClass("active");
                        $("#alink1").removeClass("active");
                        $("#alink2").addClass("active");
                    }
                    else
                    {
                        $("#btn_step1").html("Retry  &nbsp;<i class='fas fa-redo faa-spin'></i>");
                        $("#info").fadeIn(1000,function (){
                            $("#info").html("<div class='alert alert-danger ml-auto mr-auto '><div class='container'><div class='alert-icon'><i class='material-icons faa-burst faa-fast animated'>error_outline</i></div><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'><i class='material-icons'>clear</i></span></button>Data not saved,"+resp+"</div></div></div>");
                            $("#btn_step1").html('Save');
                        })
                    }
                }
            })
        }
        
    </script>
    <!--Ajax enquiry ends-->
    
    <!--Step2-->
    <script>
            $("#uploadForm").on('submit',(function(e) {
             e.preventDefault();
                $.ajax({
                    url: "operations/database.php",
                    type: "POST",
                    data:  new FormData(this),
                    contentType: false,
                    cache: false,
                    processData:false,
                    beforeSend : function()
                    {
                        $("#btn_upload").html("Uploading &nbsp; <i class='fas fa-spinner fa-spin'>");
                        $("#err").fadeOut();
                    },
                    success: function(data)
                    {
                        if(data=='ok1ok2ok3')
                        {
                            setTimeout(function() {                       
                                $("#btn_upload").html("Uploaded  <i class='fas fa-check faa-burst animated'></i>");
                            }, 2000);
                            $("#file1").removeClass("d-none");
                            $("#file1").addClass("d-block");
                            $("#file2").removeClass("d-none");
                            $("#file2").addClass("d-block");
                            $("#file3").removeClass("d-none");
                            $("#file3").addClass("d-block");
                            success();                            
                            setTimeout(function() {
                                $("#link2").removeClass("active");
                                $("#link3").addClass("active");
                                $("#alink2").removeClass("active");
                                $("#alink3").addClass("active");                       
                            }, 3000);

                            
                        }
                        else if(data=='invalid')
                        {
                            $("#err").html("Invalid File !").fadeIn();
                            $("#btn_upload").html("Upload");
                            warning("Invalid file")
                            alert(data)
                        }
                        else if(data=='no')
                        {
                            $("#btn_upload").html("Upload");
                            fail()
                            alert(data)
                        }
                        else
                        {
                            $("#btn_upload").html("Upload");
                            fail()
                            alert(data)
                        }
                    },
                    error: function(e) 
                    {
                        $("#err").html(e).fadeIn();
                    }          
                });
            }));
    </script>
    
    <script type="text/javascript">
    $( document ).ready( function () {
            $( "#paymentForm" ).validate( {
                    rules: {
                        prmode: {
                                required: true
                        },
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
                        prmode: {
                                required: "<small class='text-danger'>Please enter a name</small>",
                                minlength: "<small class='text-danger'>Your name must consist of at least 4 characters</small>"
                        },
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
                url: "operations/database.php",
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
                        })
                    }
                }
            })
        }

        
    </script>
    <!--Ajax enquiry ends-->
        
    <!--change payment-->
    <script>                        
        $("#fast-mode").hide();
        function mode(val) {
                    if(val==1)
                    {
                        $("#normal-mode").hide();
                        $("#fast-mode").show();
                        $("#amt").val("3200");
                    }
                    else if(val==0)
                    {
                        $("#normal-mode").show();
                        $("#fast-mode").hide(); 
                        $("#amt").val("1700");
                    }
                }
    </script>
    <!--change payment ends-->
    
    <!--sync Address data-->
    <script>
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
     notify('Found','success','top','center')
    </script>
    
    <script type="text/javascript">
    function googleTranslateElementInit() {
      new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
    }
    </script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    <a href="operations/Address.php"></a>