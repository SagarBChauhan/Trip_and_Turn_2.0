<?php 
ob_start();
session_start();
include_once './operations/Connection.php';
$au=0;
if(isset($_SESSION['user']))
{
    $au=1;
    $lid=$_SESSION['lid'];
    $un=$_SESSION['user'];
    $uty=$_SESSION['ac_ty'];
    if($uty!="Admin")
    {
        header("location:index.php?Login_status=Y&uname=".$_SESSION['user']."&uty=".$_SESSION['ac_ty']."&err=invalid_user");
    }
}
else 
{
    header("location:index.php?Login_status=N&err=Login_First");
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
  <link rel="apple-touch-icon" sizes="76x76" href="img/T&T- Blue-Sky Blue.png">
  <link rel="icon" type="image/png" href="img/T&T- Blue-Sky Blue.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>Update Employee</title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="assets/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="assets/demo/demo.css" rel="stylesheet" />
  <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
    <link href="assets/font-awesome-animation/font-awesome-animation.min.css" rel="stylesheet" type="text/css"/>
    <style>

    .zoom:hover {
      margin-left: 50px;
      transform: scale(4.5);
      border-radius: 50%;
      transition: 0.3s;
      box-shadow: 0 0 10px 1px #b08cb8;
    }
    </style>
    <script>
    function showUser(str) {
      if (str=="") {
        document.getElementById("result").innerHTML="<b>Search</b> Employee using firstname, middlename or lastname <br><i class='material-icons faa-tada animated'>search</i> ";
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
      xmlhttp.open("GET","operations/getuser.php?t=Employee&q="+str,true);
      xmlhttp.send();
    }
    </script>
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="assets/img/sidebar-1.jpg">
      <div class="logo">
        <a href="" class="simple-text logo-normal">
          Admin
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item">
              <a class="nav-link" href='Admin.php'>
              <i class="material-icons">dashboard</i>
              <p>Home</p>
            </a>
          </li>
          <li class="nav-item active">
              <a class="nav-link" data-toggle="collapse" href="#collapseUser" aria-expanded="false" aria-controls="collapseUser">
                    <i class="fas fa-user-cog"></i>
                    <p>User manager &triangledown;</p>
              </a>
              <div class="collapse" id="collapseUser">
                <div class="card card-body">
                    <ul class="nav">
                        <li class="nav-item">              
                            <a class="nav-link" data-toggle="collapse" href="#collapseUser1" aria-expanded="false" aria-controls="collapseUser1">
                                <i class="fas fa-user-astronaut"></i>
                                <p>Customer  &triangledown;</p>
                              </a>
                              <div class="collapse" id="collapseUser1">
                                    <ul class="nav">
                                        <li class="nav-item"><a class="nav-link" href="Add_User_Customer.php"><i class="fas fa-plus"></i> Add Customer</a></li>
                                        <li class="nav-item"><a class="nav-link" href="Update_User_Customer.php"><i class="fas fa-pencil-alt"></i> Update Customer</a></li>
                                        <li class="nav-item"><a class="nav-link" href="View_User_Customer.php"><i class="fas fa-eye"></i> View Customer</a></li>
                                    </ul>
                              </div>
                        </li>
                        <li class="nav-item active">              
                            <a class="nav-link" data-toggle="collapse" href="#collapseUser2" aria-expanded="false" aria-controls="collapseUser2">
                                <i class="fas fa-user-tie"></i>
                                <p>Employee  &triangledown;</p>
                              </a>
                              <div class="collapse" id="collapseUser2">
                                    <ul class="nav">
                                        <li class="nav-item"><a class="nav-link" href="Add_User_Employee.php"><i class="fas fa-plus"></i> Add Employee</a></li>
                                        <li class="nav-item active"><a class="nav-link" href="Update_User_Employee.php"><i class="fas fa-pencil-alt"></i> Update Employee</a></li>
                                        <li class="nav-item"><a class="nav-link" href="View_User_Employee.php"><i class="fas fa-eye"></i> View Employee</a></li>
                                    </ul>
                              </div>
                        </li>
                        <li class="nav-item">              
                            <a class="nav-link" data-toggle="collapse" href="#collapseUser3" aria-expanded="false" aria-controls="collapseUser3">
                                <i class="fas fa-chalkboard-teacher"></i>
                                <p>Guide  &triangledown;</p>
                              </a>
                              <div class="collapse" id="collapseUser3">
                                    <ul class="nav">
                                        <li class="nav-item"><a class="nav-link" href="Add_User_Guide.php"><i class="fas fa-plus"></i> Add Guide</a></li>
                                        <li class="nav-item"><a class="nav-link" href="Update_User_Guide.php"><i class="fas fa-pencil-alt"></i> Update Guide</a></li>
                                        <li class="nav-item"><a class="nav-link" href="View_User_Guide.php"><i class="fas fa-eye"></i> View Guide</a></li>
                                    </ul>
                              </div>
                        </li>
                    </ul>
                </div>
              </div>
          </li>
          <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#collapsePlace" aria-expanded="false" aria-controls="collapsePlace">
                <i class="fas fa-place-of-worship"></i>
                <p>place manager &triangledown;</p>
              </a>
              <div class="collapse" id="collapsePlace">
                <div class="card card-body">
                    <ul class="nav">
                        <li class="nav-item"><a class="nav-link" href="Add_Place.php"><i class="fas fa-plus"></i> Add Place</a></li>
                        <li class="nav-item"><a class="nav-link" href="Update_Place.php"><i class="fas fa-pencil-alt"></i> Update Place</a></li>
                        <li class="nav-item"><a class="nav-link" href="View_Place.php"><i class="fas fa-eye"></i> View Place</a></li>
                    </ul>
                </div>
              </div>
          </li>
          <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#collapsePackage" aria-expanded="false" aria-controls="collapsePackage">
                <i class="fas fa-cubes"></i>
                <p>Package manager &triangledown;</p>
              </a>
              <div class="collapse" id="collapsePackage">
                <div class="card card-body">
                    <ul class="nav">
                        <li class="nav-item"><a class="nav-link" href="Add_Package.php"><i class="fas fa-plus"></i> Add Package</a></li>
                        <li class="nav-item"><a class="nav-link" href="Update_Package.php"><i class="fas fa-pencil-alt"></i> Update Package</a></li>
                        <li class="nav-item"><a class="nav-link" href="View_Package.php"><i class="fas fa-eye"></i> View Package</a></li>
                    </ul>
                </div>
              </div>
          </li>
          <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#collapseHotel" aria-expanded="false" aria-controls="collapseHotel">
                <i class="fas fa-hotel"></i>
                <p>Hotel manager &triangledown;</p>
              </a>
              <div class="collapse" id="collapseHotel">
                <div class="card card-body">
                    <ul class="nav">
                        <li class="nav-item"><a class="nav-link" href="Add_Hotel.php"><i class="fas fa-plus"></i> Add Hotel</a></li>
                        <li class="nav-item"><a class="nav-link" href="Update_Hotel.php"><i class="fas fa-pencil-alt"></i> Update Hotel</a></li>
                        <li class="nav-item"><a class="nav-link" href="View_Hotel.php"><i class="fas fa-eye"></i> View Hotel</a></li>
                    </ul>
                </div>
              </div>
          </li>
          <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#collapseTransportation" aria-expanded="false" aria-controls="collapseTransportation">
             <i class="fas fa-car"></i>
                <p>Transportation manager &triangledown;</p>
              </a>
              <div class="collapse" id="collapseTransportation">
                <div class="card card-body">
                    <ul class="nav">
                        <li class="nav-item"><a class="nav-link" href="Add_Transport.php"><i class="fas fa-plus"></i> Add Transport</a></li>
                        <li class="nav-item"><a class="nav-link" href="Update_Transport.php"><i class="fas fa-pencil-alt"></i> Update Transport</a></li>
                        <li class="nav-item"><a class="nav-link" href="View_Transport.php"><i class="fas fa-eye"></i> View Transport</a></li>
                    </ul>
                </div>
              </div>
          </li>
          <li class="nav-item ">
              <a class="nav-link" href="Joining_Request.php">
             <i class="fas fa-mouse-pointer"></i>
              <p>joining request</p>
            </a>
          </li>
          <li class="nav-item ">
              <a class="nav-link" href="Enquiry_Manager.php">
             <i class="fas fa-concierge-bell"></i>
              <p>Enquiry manager</p>
            </a>
          </li>
          <li class="nav-item ">
              <a class="nav-link" href="Review_and_Feedback_Manager.php">
             <i class="fas fa-comments"></i>
              <p>Review & feedback</p>
            </a>
          </li>
          <li class="nav-item ">
              <a class="nav-link" href="Report.php">
             <i class="fas fa-chart-line"></i>
              <p>Report</p>
            </a>
          </li>
          <li class="nav-item ">
              <a class="nav-link" href="Gift_Manager.php">
             <i class="fas fa-gifts"></i>
              <p>Gift voucher manager</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
              <span>
                  <a class="navbar-brand text-gray" href="Admin.php">Dashboard</a>/
                  <a class="navbar-brand text-gray" href="User_Manager.php">User Management: Employee <i class="fas fa-filter"></i> Update</a>/
                  <a class="navbar-brand text-gray-dark" href="Update_User_Employee.php">Update Employee</a>
              </span>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <form class="navbar-form">
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <button type="submit" class="btn btn-white btn-round btn-just-icon">
                  <i class="material-icons">search</i>
                  <div class="ripple-container"></div>
                </button>
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <i class="material-icons view-change">dashboard</i>
                  <p class="d-lg-none d-md-block">
                    Stats
                  </p>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">notifications</i>
                  <span class="notification">5</span>
                  <p class="d-lg-none d-md-block">
                    Some Actions
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">1 New Corporate Enquiry</a>
                  <a class="dropdown-item" href="#">1 New Employee Joining Request</a>
                  <a class="dropdown-item" href="#">1 New Guide Joining Request</a>

                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="#" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  <a class="dropdown-item" href="#">Profile</a>
                  <a class="dropdown-item" href="#">Settings</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="?logout">Log out</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-text card-header-primary">
                      <div class="card-text">
                          <div class="input-group no-border Thumbnail">
                                <input type="text" class="form-control text-white" onkeyup="showUser(this.value)"  placeholder="Search...">
                                <button type="submit" class="btn btn-white btn-round btn-just-icon">
                                  <i class="material-icons pl-1 pt-1 faa-float animated">search</i>
                                  <div class="ripple-container"></div>
                                </button>
                          </div>
                      </div>
                    </div>
                    <div class="card-body">
                          <div id="result"><b>Search</b> Employee using firstname, middlename or lastname <br><i class="material-icons faa-tada animated">search</i> </div>
                    </div>
                </div>
            </div>
          </div>
            <?php 
           if(isset($_GET['fetch']))
           {

                   $query_select_customer="SELECT *,(SELECT tbl_login.User_Name FROM tbl_login WHERE tbl_login.Login_id=tbl_user.Login_id) as user_name,"
                           . "(SELECT tbl_login.Status FROM tbl_login WHERE tbl_login.Login_id=tbl_user.Login_id) as Status FROM tbl_user WHERE `User_Id`=".$_GET['fetch'].";";
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
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Update</h4>
                  <p class="card-category">Employee</p>
                </div>
                <div class="card-body">                    
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
                      </div>
                      <div class="row">   
                        <div class="col-md-4"> 
                            <div class="form-group mt-3"> 
                                <label class="pr-3"> Gender </label>
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
                        <input name="Status" id="toggle-one" <?php if($Status==1){echo 'checked';} ?> data-on="Active" data-off="Deactive" type="checkbox"  data-onstyle="success" data-offstyle="danger">
                        <script>
                          $(function() {
                            $('#toggle-one').bootstrapToggle();
                          })
                        </script>                      
                        <button type='submit' name="btn_Update_User" id="btn_Update_User" class="btn btn-primary  pull-right" >Update</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
              </div>
            </div>
          </div>
            <?php
           }
            ?>
        </div>
      </div>
      <footer class="footer">
        <div class="container-fluid">
          <nav class="float-left">
            <ul>
              <li><a href="index.php">Trip and Turn</a></li>
              <li><a href="index.php">About Us</a></li>
            </ul>
          </nav>
          <div class="copyright float-right">
              &copy;<script>document.write(new Date().getFullYear())</script>, Planning Journey with <i class="material-icons">favorite</i> by <a href="index.php" target="_blank">Trip and Turn</a> Tours and Travelers.
          </div>
        </div>
      </footer>
    </div>
  </div>
  <?php require_once './Script_links.php';?>

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
                                notify('Customer Updated <i class="fas fa-check faa-burst animated faa-fast></i>','success','top','center');
                            }
                            else
                            {
                                $("#info").fadeIn(1000,function (){
//                                    $("#info").html("<div class='alert alert-danger'>"+resp+"</div>");
                                    $("#btn_Update_User").html('Update');
                                }) 
                                notify(resp,'info','top','center');
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
<?php ob_end_flush();?>