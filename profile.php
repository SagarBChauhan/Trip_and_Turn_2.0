<?php 
session_start();
include './operations/Connection.php';
$au=0;
if(!isset($_SESSION['user']))
{
    header("location:Login.php?Login_status=N&tips=login-first");
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
    Profile - Trip and Turn
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
  <link href="assets/demo/demo.css" rel="stylesheet" />
  <link href="assets/css/My.css" rel="stylesheet" type="text/css"/>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link href="assets/font-awesome-animation/font-awesome-animation.min.css" rel="stylesheet" type="text/css"/>
  <script src="assets/js/plugins/sweetalert2.js" type="text/javascript"></script>
  <script src="assets/js/plugins/bootstrap-notify.js" type="text/javascript"></script>
</head>

<body onload="myFunction()" class="profile-page sidebar-collapse">
<div id="loader"></div>
  <nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-translate">
            <a class="navbar-brand font-family-Aclonica" href="index.php" rel="tooltip" title="Home" data-placement="left"  aria-haspopup="true" aria-expanded="true">
                <img src="assets/img/Logos/Tt-paper-plane.png" style="height: 30px;" />
                Trip and Turn 
            </a>     
            <a             <a class="navbar-brand font-family-Aclonica" href="#"id="navbarDropdownMenuLinkTranslate" rel="tooltip" title="Translate this page" data-placement="right"  data-toggle="dropdown"  aria-haspopup="true" aria-expanded="true">
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
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse justify-content-center">
          <ul class="navbar-nav ml-auto font-family-Cambay">
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
              <a href="#pablo" class="btn btn-rose btn-raised btn-round d-none d-md-none d-lg-block">
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
              <a href="#pablo" class="btn btn-rose btn-raised nav-link text-white d-md-block d-lg-none">
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
              <a class="nav-link " href="#" rel="tooltip" title="Wish List" class="" >
                  <i class="material-icons">favorite</i>                
              </a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="material-icons faa-ring animated-hover">notifications     <!--notifications_none--></i>                          
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
                <a href="profile.php" class="dropdown-item"><i class="material-icons">person_pin</i>  Profile</a>
                <a href="change_password.php" class="dropdown-item"><i class="material-icons">	lock</i>  Change password</a>
                <?php } ?>
                <a href="#pablo" class="dropdown-item"><i class="material-icons">settings</i>  Settings</a>
                <div class="dropdown-divider"></div>
                <?php if($au!=0){ ?>
                <a href="?logout" class="dropdown-item bg-danger text-white"><i class="fas fa-sign-out-alt"></i> &nbsp; Sign out</a>
                <?php }else{ ?>
                <a href="Login.php" class="dropdown-item bg-info text-white"><i class="fas fa-sign-in-alt"></i> &nbsp; Sign in</a>
                <?php }  ?>
              </div>
            </li>
        </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
  </nav>
<div style="display:none;" id="myDiv" class="animate-bottom">
  <div class="page-header header-filter" data-parallax="true" style="background-image: url('assets/img/city-profile.jpg');"></div>
  <div class="main main-raised">
    <div class="profile-content">
      <div class="container">
        <div class="row">
        <?php
            $sql_Fetch_table="SELECT `User_Id`,`First_Name`,`Middle_Name`,`Last_Name`, `Gender`,`DOB`,`Address`, "
                    . " (SELECT tbl_country.Name FROM tbl_country WHERE tbl_country.Country_Id=tbl_user.Country_Id) as 'Country', "
                    . "(SELECT tbl_state.Name FROM tbl_state where tbl_state.State_Id=tbl_user.State_Id) as State, "
                    . "(SELECT tbl_city.Name from tbl_city where tbl_city.City_Id=tbl_user.`City_Id`) as City,`PIN_Code`,"
                    . " `Contact_No`, `Email`, (SELECT tbl_login.User_Name FROM tbl_login WHERE tbl_login.Login_id=tbl_user.Login_id) as UserName,"
                    . "`Profile_Picture`, `Social`, `Registration_Date`, `Last_Update_Time`,Login_id,"
                    . "(SELECT tbl_login.Status FROM tbl_login WHERE tbl_login.Login_id=tbl_user.Login_id) as Status,"
                    . "(SELECT tbl_login.Type FROM tbl_login WHERE tbl_login.Login_id=tbl_user.Login_id) as Type "
                    . "FROM tbl_user where Login_id=".$_SESSION['lid'].";";
            $result=  mysqli_query($con, $sql_Fetch_table);                
            while ($row=$result->fetch_assoc())
            {    
        ?>       
          <div class="col-md-6 ml-auto mr-auto">
            <div class="profile">
              <div class="avatar">
                  <img src="<?php if(isset($_SESSION['dp'])){ echo $_SESSION['dp'];}else{ echo"upload/Image/dp/default-avatar.png";} ?>" alt="Circle Image" data-toggle="modal" data-target="#profilePictureModel" rel="Tooltip" title="Update profile picture" class="img-raised rounded-circle" >
              </div>
              <div class="name">
                <h3 class="title"><?php if ($row['Gender']==1){    echo 'Mr. ';}else{echo"Mrs/Ms. ";} echo $row['First_Name']." ".$row['Middle_Name']." ".$row['Last_Name'];?> <?php if ( $row['Status']==1){echo '<i class="fas fa-certificate text-info"></i>';}  else {echo '<i class="fas fa-certificate text-danger"></i>';} ?> <b class="text-info">(<?php echo $row['UserName']; ?>)</b></h3>
                <h6><?php echo $row['Type'];?></h6>
              </div>
            </div>
          </div>
        </div>
        <div class="description text-center">
            <p class="card-description">
                  <b>Born day <i class="fas fa-birthday-cake"></i> :</b> <?php echo $row['DOB'];?>,<br>
                  <b>from <i class="fas fa-map-marker-alt"></i> :</b> <?php echo $row['Address'];?>,
                  <?php echo $row['City'];?>, <?php echo $row['State'];?> - <?php echo $row['PIN_Code'];?>,
                  <?php echo $row['Country'];?>.<br>
                  <b>Contact number <i class="fas fa-mobile-alt"></i> :</b> <?php echo $row['Contact_No']; ?> <br>
                  <b>Email Address <i class="fas fa-envelope"></i> :</b> <?php echo $row['Email']; ?> <br>
                  <b>User Name <i class="fas fa-user-check"></i> :</b> <?php echo $row['UserName']; ?>,<br>
                  <b>Social Media Account <i class="fab fa-twitter"></i> :</b> <?php echo $row['Social']; ?>,<br>
                  <b>Registration date <i class="fas fa-file-signature"></i> :</b> <?php echo $row['Registration_Date']; ?>,<br>
                  <b>Last modification <i class="fas fa-history"></i> :</b> <?php echo $row['Last_Update_Time']; ?>
            </p>
                <button class="btn btn-just-icon btn-link btn-info" rel="tooltip"  data-placement='bottom' title='Update'  data-toggle="modal" data-target="#loginModal">
                    <i class="material-icons">edit</i>
                </button>
                <button rel="tooltip" name="btn_del_user" id="<?php echo $row['User_Id'];?>" rel="tooltip"  data-toggle='tooltip' data-placement='bottom' title='Delete'  class="btn btn-just-icon btn-link btn-warning trash">
                    <i class="material-icons">close</i>
                </button>
        </div>

        <?php        
            }
        ?>
        <div class="row">
          <div class="col-md-6 ml-auto mr-auto">
            <div class="profile-tabs">
              <ul class="nav nav-pills nav-pills-icons justify-content-center" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" href="#pictures" role="tab" data-toggle="tab">
                    <i class="material-icons">camera</i> Pictures
                  </a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="#wish" role="tab" data-toggle="tab">
                    <i class="material-icons">favorite</i> Wish List
                  </a>
                </li>                
                <li class="nav-item">
                  <a class="nav-link" href="#history" role="tab" data-toggle="tab">
                    <i class="material-icons">history</i> History
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="tab-content tab-space">
          <div class="tab-pane active text-center gallery" id="pictures">
            <div class="row">
              <div class="col-md-3 ml-auto ">
                  <img src="assets/img/sagar-rnam-square.jpg" class="rounded faa-float animated-hover">
                  <img src="assets/img/sagar-siya.jpg" class="rounded   faa-vertical animated-hover">
              </div>
              <div class="col-md-3 mr-auto">
                  <img src="<?php if(isset($_SESSION['dp'])){ echo $_SESSION['dp'];}else{ echo"upload/Image/dp/default-avatar.png";} ?>" class="rounded">
                  <img src="assets/img/sagar-arc.jpg" class="rounded">
              </div>
            </div>
          </div>
          <div class="tab-pane text-center gallery" id="wish">
            <div class="row">
              <div class="col-md-3 ml-auto">
                  <img src="assets/img/city-profile.jpg" class="rounded">
                  <img src="assets/img/city.jpg" class="rounded">
                  <img src="assets/img/bg2.jpg" class="rounded">
              </div>
              <div class="col-md-3 mr-auto">
                  <img src="assets/img/bg.jpg" class="rounded">
                  <img src="assets/img/bg3.jpg" class="rounded">
              </div>
            </div>
          </div>
          <div class="tab-pane text-center gallery" id="history">
            <div class="row">
              <div class="col-md-3 ml-auto">
                <img src="assets/img/sagar-dp.jpg" class="rounded">
                <img src="assets/img/sagar-arc.jpg" class="rounded">
              </div>
              <div class="col-md-3 mr-auto">
                <img src="assets/img/sagar-BW.jpg" class="rounded">
                <img src="assets/img/sagar-hel.jpg" class="rounded">
                <img src="assets/img/jaguare.jpg" class="rounded">
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
  <!-- Profile Picture Upload Modal -->
  <div class="modal fade" id="profilePictureModel" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Upload profile picture</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <i class="material-icons">clear</i>
          </button>
        </div>
        <div class="modal-body">
            <div id="err"></div>
<!--            <form id="form" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <img src="default-avatar.png" />
                    <input id="uploadImage" type="file" accept="image/*" name="image" />
                    <input class="btn btn-success" type="submit" value="Upload">
                </div>
            </form>-->
            <form id="dpUploadForm" method="post" enctype="multipart/form-data">
            <center>
              <div class="card-deck">
                  <div class="card" >
                    <img class="card-img-top main-raised rounded-circle shadow" src="<?php if(!isset($_SESSION['dp'])) {echo 'upload/Image/dp/default-avatar';}else{echo $_SESSION['dp'];} ?>"  alt="Avatar" id="preview" style=" height: 200px; width: 200px; object-fit: cover;" >
                    <div class="card-body">
                      <h5 class="card-title">Image Preview</h5>
                      <div class="input-group mb-3">
                          <div class="input-group-prepend">
                              <button class="btn btn-outline-success" type="submit" name="btn_upload" id="btn_upload">Upload</button>
                          </div>
                          <div class="custom-file">
                            <input type="file"  name="image" id='uploadImage' accept="image/*" onchange="loadFile(event)" class="custom-file-input" required>
                            <label class="custom-file-label" for="fileToUpload">Choose file</label>
                          </div>
                      </div>                     
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Last updated <?php echo isset($Profile_Photo_Day_Ago)." days ".isset($Profile_Photo_Time_Ago)." time" ?> ago</small>
                    </div>
                  </div>  
              </div>
            </center>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger btn-link" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <!--  End Modal -->

    <div class="modal fade" id="loginModal" tabindex="-1" role="">
        <div class="modal-dialog  modal-lg" role="document">
            <div class="modal-content">
                <div class="card card-signup card-plain">
                    <div class="modal-header">
                      <div class="card-header card-header-info text-center w-100">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                          <i class="material-icons">clear</i>
                        </button>
                        <h4 class="card-title">Update Profile</h4>
                      </div>
                    </div>
                    <div class="modal-body">
                        <?php 
                                $query_select_customer="SELECT *,(SELECT tbl_login.User_Name FROM tbl_login WHERE tbl_login.Login_id=tbl_user.Login_id) as user_name,"
                                        . "(SELECT tbl_login.Status FROM tbl_login WHERE tbl_login.Login_id=tbl_user.Login_id) as Status FROM tbl_user WHERE `User_Id`=".$_SESSION['lid'].";";
                                $result_select_customer=  mysqli_query($con, $query_select_customer);

                                while ($row=$result_select_customer->fetch_assoc())
                                {
                                    $User_Id=$row['User_Id'];
                                    $fname=$row['First_Name'];
                                    $mname=$row['Middle_Name'];
                                    $lname=$row['Last_Name'];
                                    $Gender=$row['Gender'];
                                    $DOB=$row['DOB'];
                                    $Address=$row['Address'];
                                    $Country_Id=$row['Country_Id'];
                                    $State_Id=$row['State_Id'];
                                    $City_Id=$row['City_Id'];
                                    $PIN_Code=$row['PIN_Code'];
                                    $Contact_No=$row['Contact_No'];
                                    $Email=$row['Email'];
                                    $User_Id=$row['User_Id'];
                                    $Login_Id=$row['Login_id'];
                                    $user_name=$row['user_name'];
                                    $Status=$row['Status'];
                                }
                        ?> 
                    
                        <div id="info"></div>
                        <form id="myForm"  method="POST">
                          <div class="row">
                            <div class="col-md-4">    
                              <div class="form-group">                          
                                    <label class="bmd-label-floating" ><i class="far fa-user"></i> First name </label>
                                    <input type="text" name="fname" id="fname" value="<?php echo $fname;?>" class="form-control"required>
                                    <input type="hidden" name="user_id" value="<?php echo $User_Id;?>" required>
                                    <input type="hidden" name="login_id" value="<?php echo $Login_Id;?>" required>
                              </div>
                            </div>
                            <div class="col-md-4">    
                              <div class="form-group">                          
                                    <label class="bmd-label-floating" ><i class="far fa-user"></i> Middle name </label>
                                    <input type="text" name="mname" id="mname" value="<?php echo $mname;?>" class="form-control"required>
                              </div>
                            </div>
                            <div class="col-md-4">    
                              <div class="form-group">                          
                                    <label class="bmd-label-floating" ><i class="far fa-user"></i> Last name </label>
                                    <input type="text" name="lname" id="lname" value="<?php echo $lname;?>" class="form-control" required>
                              </div>
                            </div>
                          </div>
                          <div class="row">   
                            <div class="col-md-4">                        
                              <div class="form-group">                          
                                    <label for="username"  class="bmd-label-floating" >@ Username <span id="txtHint"></span></label>
                                    <input type="text" name="uname" id='uname' value="<?php echo $user_name;?>" onchange="checkUsername(this.value)"  class="form-control"/>
                              </div>
                            </div>
                            <div class="col-md-4">                        
                                <div class="form-group">
                                    <label for="DOB" class="label-control">DOB</label>
                                    <input type="date" id='DOB' name="DOB" value="<?php echo $DOB;?>"  class="form-control"/>
                                </div>
                            </div>
                            <div class="col-md-4"> 
                                <div class="form-group mt-3"> 
                                    <label class="pr-1"> Gender: </label>
                                    <div class="form-check form-check-radio form-check-inline">
                                      <label class="form-check-label">
                                          <input class="form-check-input" type="radio" name="gender"  value="Male" <?php if($Gender==1){echo 'Checked';}?> required> Male <i class="fas fa-male"></i>
                                        <span class="circle">
                                            <span class="check"></span>
                                        </span>
                                      </label>
                                    </div>
                                    <div class="form-check form-check-radio form-check-inline">
                                      <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="gender"  value="Female"  <?php if($Gender==0){echo 'Checked';}?> required> Female <i class="fas fa-female"></i>
                                        <span class="circle">
                                            <span class="check"></span>
                                        </span>
                                      </label>
                                    </div>
                              </div>
                            </div>
                          </div>
                          <div class="row">   
                            <div class="col-md-4">                        
                              <div class="form-group">                          
                                    <label class="bmd-label-floating" ><i class="fas fa-mobile"></i> Contact number  </label>
                                    <input type="text" name="contact" id="contact" value="<?php echo $Contact_No;?>" class="form-control" id="contact" required>
                              </div>
                            </div>
                            <div class="col-md-4">                        
                              <div class="form-group">                          
                                    <label class="bmd-label-floating" ><i class="fas fa-envelope"></i> Email </label>
                                    <input type="email" name="email" id="email" value="<?php echo $Email;?>" class="form-control" required>
                              </div>
                            </div>
                          </div>
                          <div class="form-row">
                            <div class="col-md-8 form-group">        
                                <label class="bmd-label-floating"  for="address"><i class="fas fa-map-marker-alt"></i> Address</label>
                                <input type="text" name="address" id="address" value="<?php echo $Address;?>" class="form-control" required>
                            </div>
                            <div class="col-md-4 form-group">
                                <label class="bmd-label-floating"  for="zip">Zip</label>
                                <input type="text"  name="pincode" id="zip" value="<?php echo $PIN_Code;?>" class="form-control"  required>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-4">                                        
                                <div class="form-group ">
                                    <label class="bmd-label-floating"><i class="fas fa-flag"></i> Country</label>
                                    <select  name="country" id="country-list" onChange="getState(this.value);"  class="custom-select">
                                        <option value disabled selected>Select Country</option>
                                        <?php
                                        $results=  mysqli_query($con, "SELECT * FROM `tbl_country`;");
                                        foreach($results as $country) {
                                        ?>
                                        <option value="<?php echo $country["Country_Id"]; ?>" <?php if($Country_Id==$country["Country_Id"]){echo 'selected';} ?>><?php echo $country["Name"]; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">                     
                              <div class="form-group">
                                  <label class="bmd-label-floating"><i class="fas fa-star"></i> State</label>
                                  <select name="state" id="state-list"  onChange="getCity(this.value);" class="custom-select" required>
                                      <option value="" disabled selected>Select State</option>                                    
                                        <?php
                                        $results=  mysqli_query($con, "SELECT * FROM `tbl_state` WHERE `Country_Id`=$Country_Id;");
                                        foreach($results as $state) {
                                        ?>
                                        <option value="<?php echo $state["State_Id"]; ?>" <?php if($State_Id==$state["State_Id"]){echo 'selected';} ?>><?php echo $state["Name"]; ?></option>
                                        <?php
                                        }
                                        ?>
                                  </select>
                              </div>
                            </div>
                            <div class="col-md-4">            
                              <div class="form-group">                                
                                  <label class="bmd-label-floating"><i class="fas fa-city"></i> City</label>
                                  <select  name="city" class="custom-select" id="city-list"  required>
                                      <option value="" disabled selected>Select City</option>
                                        <?php
                                        $results=  mysqli_query($con, "SELECT * FROM `tbl_city` WHERE `State_Id`=$State_Id;");
                                        foreach($results as $city) {
                                        ?>
                                        <option value="<?php echo $city["City_Id"]; ?>" <?php if($City_Id==$city["City_Id"]){echo 'selected';} ?>><?php echo $city["Name"]; ?></option>
                                        <?php
                                        }
                                        ?>
                                  </select>
                              </div>
                            </div>          
                          </div>     
                            <div class="togglebutton float-left pt-3">
                                <label>
                                    <span>Account Status:</span><input type="checkbox" <?php if($Status==1){echo 'checked';} ?> id="Status"  name="Status" ><span class="toggle"></span>
                                </label>
                            </div>                   
                            <button type='submit' name="btn_Update_User" id="btn_Update_User" class="btn btn-primary  pull-right" >Update</button>
                            <div class="clearfix"></div>
                        </form>
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
        <nav class="mt-5">
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
</div>
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
  <!--globe animation-->
  <script src="assets/animation/globe_anim.js" type="text/javascript"></script>
  <!--Google Translate-->
  <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
  <script src="assets/js/loader.js" type="text/javascript"></script>
  <script src="js/jquery.validate.js" type="text/javascript"></script>

    <script type="text/javascript">
    function googleTranslateElementInit() {
      new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
    }
    </script>
    <script>
      var loadFile = function(event) {
        var reader = new FileReader();
        reader.onload = function(){
          var output = document.getElementById('preview');
          output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
      };
    </script>

    <!--Profile Picture Upload-->
    <script>
        $(document).ready(function (e) {
            $("#dpUploadForm").on('submit',(function(e) {
             e.preventDefault();
                $.ajax({
                    url: "profile_picture_upload.php",
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
                        if(data=='ok')
                        {
                            $("#dpUploadForm")[0].reset();
                            setTimeout(function() {                       
                                $("#btn_upload").html("Uploaded  <i class='fas fa-check faa-burst animated'></i>");
                            }, 2000);
                            success();
                            setTimeout('window.location.href="profile.php";',9000);
                        }
                        else if(data=='invalid')
                        {
                            $("#err").html("Invalid File !").fadeIn();
                            $("#btn_upload").html("Upload");
                            fail()
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
        });
    </script>
    <script> 
        function success(){
        var notify = $.notify('<strong>Uploading.. <i class="fas fa-long-arrow-alt-up faa-bounce animated"></i></strong> Do not close this page...', {
            allow_dismiss: false,
            showProgressbar: true
        });

        setTimeout(function() {
            notify.update({'type': 'success', 'message': '<strong>Success <i class="fas fa-check faa-burst animated"></i></strong> Your profile picture has been uploaded!', 'progress': 25});
        }, 1500);
        setTimeout(function() {
            notify.update({'type': 'success', 'message': '<strong>Saving <i class="fas fa-check faa-burst animated"></i></strong> Your profile picture has been uploaded!', 'progress': 25});
        }, 2000);
        setTimeout(function() {
            $.notify("Profile picture upload successful <i class='fas fa-check faa-burst animated faa-fast'></i>");
        }, 2000);

        }
        function fail(){
        var notify = $.notify('<strong>Saving</strong> Do not close this page...', {
            allow_dismiss: false,
            showProgressbar: true
        });

        setTimeout(function() {
            notify.update({'type': 'danger', 'message': '<strong>Failed</strong> Your profile picture could not be uploaded!', 'progress': 25});
        }, 2000);
        }

    //    Custom notify
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
    </script>
    <!--Profile Picture Upload ends-->


        <!--check username-->
        <script>
            function checkUsername(str) {
              var xhttp;  
              if (str == "") {
                document.getElementById("txtHint").innerHTML = "";
                $("#btn_Update_User").attr('disabled',true);
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
                    $("#btn_Update_User").attr('disabled',false);
                    $("#username").parent().removeClass("has-danger");
                    $("#feedback").remove();
                    $("#username").parent().addClass("has-success");
                    $("#username").parent().append('<span id="feedback" class="form-control-feedback"><i class="material-icons">done</i></span>');
                  }
                  else if(this.responseText=='no')
                  {
                    document.getElementById("txtHint").innerHTML = "<span  class='badge badge-pill badge-danger'>unavailable <i class='fas fa-close'></i></span>";
                    $("#btn_Update_User").attr('disabled',true);
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

        <script>
            
            $(document).ready(function (){
                $("#myForm").validate({
                rules:{
                    fname: {
                            required: true,
                            minlength: 3
                    },
                    mname: {
                            required: true,
                            minlength: 3
                    },
                    lname: {
                            required: true,
                            minlength: 3
                    },
                    uname: {
                            required: true,
                            minlength: 3
                    },
                    DOB: {
                            required: true
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
                    },
                    address: {
                            required: true,
                            minlength:3,
                            maxlength:255
                    },
                    pincode: {
                            required: true,
                            minlength:6,
                            maxlength:6,
                            number:true
                    },
                    country: {
                            required: true
                    },
                    state: {
                            required: true
                    },
                    city: {
                            required: true
                    }
                },
                messages:{
                    fname: {
                            required: "<small class='text-danger'>Please enter a firstname<small>",
                            minlength: "<small class='text-danger'>Your firstname must consist of at least 3 characters <small>"
                    },
                    mname: {
                            required: "<small class='text-danger'>Please enter a middlename<small>",
                            minlength: "<small class='text-danger'>Your middlename must consist of at least 3 characters <small>"
                    },
                    lname: {
                            required: "<small class='text-danger'>Please enter a lastname<small>",
                            minlength: "<small class='text-danger'>Your lastname must consist of at least 3 characters <small>"
                    },
                    uname: {
                            required: "<small class='text-danger'>Please enter a username<small>",
                            minlength: "<small class='text-danger'>Your username must consist of at least 3 characters <small>"
                    },
                    DOB: {
                            required: "<small class='text-danger'>Please enter DOB<small>"
                    },
                    email: {
                            required: "<small class='text-danger'>Please enter a email<small>",
                            email: "<small class='text-danger'>Your email must be vaild<small>"
                    },
                    contact: {
                            required: "<small class='text-danger'>Please enter contact<small>",
                            minlength:"<small class='text-danger'>Your contact must be only 10 numbers long<small>",
                            maxlength:"<small class='text-danger'>Your contact must be only 10 numbers long<small>",
                            number:"<small class='text-danger'>Please enter numbers only<small>"

                    },
                    address: {
                            required: "<small class='text-danger'>Please enter address<small>",
                            minlength:"<small class='text-danger'>Your address must be at lest 3 Charactor long<small>",
                            maxlength:"<small class='text-danger'>Your address must be less then 255 Charactors<small>"                    
                    },
                    pincode: {
                            required: "<small class='text-danger'>Please enter a pincode<small>",
                            minlength:"<small class='text-danger'>Your contact must be only 6 numbers long<small>",
                            maxlength:"<small class='text-danger'>Your contact must be only 6 numbers long<small>",
                            number:"<small class='text-danger'>Please enter numbers only<small>"
                    },
                    country: {
                            required: "<small class='text-danger'>Please select Country<small>"
                    },
                    state: {
                            required: "<small class='text-danger'>Please select state<small>"
                    },
                    city: {
                            required: "<small class='text-danger'>Please select city<small>"
                    },
                },
                submitHandler:subform

            })
                function subform(){
                    var data =$("#myForm").serialize();
                    $.ajax({
                        type: 'POST',
                        url: "operations/adminOperation.php",
                        data: data,
                        beforeSend: function () {
                            $("#info").fadeOut();
                            $("#btn_Update_User").html("Please Wait <i class='fas fa-spinner fa-spin'></i>");
                        },
                        success: function (resp) {
                            if(resp=='Updated'){
                                $("#btn_Update_User").html("Updated");
//                                notify('Customer Updated <i class="fas fa-check faa-burst animated faa-fast></i>','success','top','center');
                                notify('<i class="fas fa-user-astronaut text-white"></i> &nbsp; <b>Customer Data Deleted</b>','success','top','center')

                            }
                            else
                            {
                                $("#info").fadeIn(1000,function (){
//                                    $("#info").html("<div class='alert alert-danger'>"+resp+"</div>");
                                    $("#btn_Update_User").html('Update');
                                }) 
//                                notify(resp,'info','top','center');
                                notify('<i class="fas fa-user-astronaut text-white"></i> &nbsp; <b>'+resp+'</b>','success','top','center')

                            }
                        }
                    })
                }
            })
        </script>
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
</body>
</html>