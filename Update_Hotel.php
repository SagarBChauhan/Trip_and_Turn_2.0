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
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="img/T&T- Blue-Sky Blue.png">
  <link rel="icon" type="image/png" href="img/T&T- Blue-Sky Blue.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>Update Hotel</title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="assets/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="assets/demo/demo.css" rel="stylesheet" />
  <link href="assets/font-awesome-animation/font-awesome-animation.min.css" rel="stylesheet" type="text/css"/>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
    <style>
    .profile-pic {
        height:100%;
        width: fit-content;
        object-fit: cover;
    }
    .file-upload {
        display: none;
    }
    .circle {
        margin: auto;
        border-radius: 1000px !important;
        overflow: hidden;
        width: 200px;
        height: 200px;
        border: 3px solid #9c27b0;
        top: 72px;
        box-shadow: 0 4px 20px 0px rgba(0, 0, 0, 0.14), 0 7px 10px -5px rgba(156, 39, 176, 0.4);
        transition: width 0.5s ease-in-out;

    }
    img {
        max-width: 100%;
        height: auto;
    }
    .circle:hover
    {
        border-radius: 0px !important;
        width: 100%;
        transition: width 0.5s ease-in-out;
        border: none;
        border-bottom: 3px solid #9c27b0;
  &:before {
    content: "";
    position: absolute;
    z-index: -1;
    left: 50%;
    right: 50%;
    bottom: 0;
    background: #2980b9;
    height: 4px;
    -webkit-transition-property: left right;
    transition-property: left right;
    -webkit-transition-duration: 0.3s;
    transition-duration: 0.3s;
    -webkit-transition-timing-function: ease-out;
    transition-timing-function: ease-out;
  }
  &:hover:before {
    left: 0;
    right: 0;
  }
    }
  </style>
    <script>
    function showUser(str) {
      if (str=="") {
        document.getElementById("result").innerHTML="<b>Search</b>  Hotel using name <br><i class='material-icons faa-tada animated'>search</i> ";
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
      xmlhttp.open("GET","operations/getHotel.php?<?php if (isset($_GET['t'])){ echo 't=1'; } ?>&q="+str,true);
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
          <li class="nav-item">
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
                        <li class="nav-item">              
                            <a class="nav-link" data-toggle="collapse" href="#collapseUser2" aria-expanded="false" aria-controls="collapseUser2">
                                <i class="fas fa-user-tie"></i>
                                <p>Employee  &triangledown;</p>
                              </a>
                              <div class="collapse" id="collapseUser2">
                                    <ul class="nav">
                                        <li class="nav-item"><a class="nav-link" href="Add_User_Employee.php"><i class="fas fa-plus"></i> Add Employee</a></li>
                                        <li class="nav-item"><a class="nav-link" href="Update_User_Employee.php"><i class="fas fa-pencil-alt"></i> Update Employee</a></li>
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
          <li class="nav-item active">
              <a class="nav-link" data-toggle="collapse" href="#collapseHotel" aria-expanded="false" aria-controls="collapseHotel">
                <i class="fas fa-hotel"></i>
                <p>Hotel manager &triangledown;</p>
              </a>
              <div class="collapse" id="collapseHotel">
                <div class="card card-body">
                    <ul class="nav">
                        <li class="nav-item"><a class="nav-link" href="Add_Hotel.php"><i class="fas fa-plus"></i> Add Hotel</a></li>
                        <li class="nav-item active"><a class="nav-link" href="Update_Hotel.php"><i class="fas fa-pencil-alt"></i> Update Hotel</a></li>
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
                  <a class="navbar-brand text-gray" href="Hotel_Manager.php">Hotel Management</a>/
                  <a class="navbar-brand text-gray-dark" href="Update_Hotel.php">Update Hotel</a>
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
                  <i class="material-icons">dashboard</i>
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
                  <a class="dropdown-item" href="Logout.php">Log out</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
        <?php 
        if(isset($_GET['fetch']))
        {
                $sql="SELECT `Hotel_Id`, `Name`, `Type`, `Address`,Picture, (SELECT tbl_city.State_Id FROM tbl_city WHERE  tbl_hotel.City_Id=tbl_city.City_Id) AS State,(SELECT tbl_state.Country_Id FROM tbl_state WHERE  tbl_state.State_Id =(SELECT tbl_city.State_Id FROM tbl_city WHERE  tbl_hotel.City_Id=tbl_city.City_Id)) AS Country ,(SELECT tbl_city.Name FROM tbl_city WHERE tbl_city.City_Id=tbl_hotel.City_Id) AS City, `Contact_No`, `Email`, `Website`, `Description`, `Picture`, `Last_Update_Time` FROM `tbl_hotel` WHERE Hotel_Id=".$_GET['fetch'].";";
                $result = mysqli_query($con,$sql);
                    while($row = mysqli_fetch_array($result)) {
                       $Name= $row['Name'] ;
                        $Type=$row['Type'] ;
                       $Address=$row['Address'];
                       $State_Id=$row['State'] ;
                       $Country_Id=$row['Country'] ;
                       $City_Id=$row['City'] ;
                       $Contact_No=$row['Contact_No'];
                       $Picture=$row['Picture'];
                        $Email= $row['Email'];
                       $Website= $row['Website'] ;
                       $Description=$row['Description'];
                       $Hotel_Id=$row['Hotel_Id']
        ?>
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                    <div class="row">
                        <div class="col-md-6">                  
                            <h4 class="card-title">Update</h4>
                            <p class="card-category">Place</p>
                        </div>
                        <div class="col-md-6">                  
                            <span class="float-right p-2">
                                <a href="?" class="nav-link text-white"><i class="fas fa-times fa-2x"></i></a>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form id="addHotelForm" method="POST">
                      <div class="row">
                        <div class="col-md-4 m-auto justify-content-center">
                            <center>
                            <div class="circle">
                                <img class="profile-pic" title="click to upload picture" src="Trip_and_Turn_2.0/<?php echo $Picture;?>"/>                     
                            </div>
                        <input type="hidden" name="DefultPic" value="<?php echo$Picture;?>">
                                <input  name="InputFile" required="" class="file-upload" type="file" accept="image/*"/>
                            </center>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">                        
                          <div class="form-group">                          
                                <label class="bmd-label-floating" ><i class="fas fa-place-of-worship"></i> Hotel Name </label>
                                <input type="text" name="Hotel_Name" value="<?php echo $row['Name']; ?>" class="form-control" required>
                                <input type="hidden" name="HId" value="<?php echo $row['Hotel_Id']; ?>" class="form-control" required>
                          </div>
                        </div>
                        <div class="col-md-6">                        
                          <div class="form-group">                          
                                <label class="bmd-label-floating" ><i class="fas fa-filter"></i> Type </label>
                                <input type="text" name="Type" value="<?php echo $Type; ?>"  class="form-control" required>
                          </div>
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="col-md-6 form-group">        
                            <label class="bmd-label-floating"  for="address"><i class="fas fa-map-marker-alt"></i> Address</label>
                            <input type="text" name="address"value="<?php echo $Address; ?>"  class="form-control" id="address" required>
                        </div>
                        <div class="col-md-6">                        
                          <div class="form-group">                          
                                <label class="bmd-label-floating" ><i class="fas fa-info"></i> Description </label>
                                <input type="text" name="Description"value="<?php echo $Description; ?>"   class="form-control" required>
                          </div>
                        </div>
                      </div>
                        <div class="row">
                             <div class="col-md-4">                        
                          <div class="form-group">                          
                                <label class="bmd-label-floating" ><i class="fas fa-mobile"></i> Contact number  </label>
                                <input type="tel" name="contact" value="<?php echo $Contact_No; ?>"  class="form-control"  id="contact" required>
                          </div>
                        </div>
                            <div class="col-md-4">                        
                          <div class="form-group">                          
                                <label class="bmd-label-floating" ><i class="fas fa-globe-americas"></i>  Website</label>
                                <input type="text" name="Website" value="<?php echo $Website; ?>"  class="form-control"  id="Website" required>
                          </div>
                        </div>
                             <div class="col-md-4">                        
                          <div class="form-group">                          
                                <label class="bmd-label-floating" ><i class="fas fa-envelope"></i> Email </label>
                                <input type="email" name="email" value="<?php echo $Email; ?>" class="form-control" id="email" required>
                          </div>
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
                              <select name="state" class="custom-select" id="state-list"  onChange="getCity(this.value);" required>
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
                              <select  name="city" class="custom-select" id="city-list" onChange="getPlace(this.value);" required>
                                  <?php
                                 $sql_city="SELECT `City_Id`, `Name`, `State_Id` FROM `tbl_city`  where State_Id=$State_Id ORDER BY Name;";
                                 $result_city= mysqli_query($con, $sql_city);

                                 if($result_city->num_rows>0){
                                     while ($row = $result_city->fetch_assoc())
                                     {      
                                         echo"<option value='".$row["City_Id"]."'";
                                         if($row["City_Id"]==$City_Id)
                                         {
                                             echo "selected";
                                         }    
                                         echo">".$row["Name"]."</option>";
                                     }
                                 } 
                                   ?>
                              </select>
                          </div>
                        </div>          
                      </div>          

                        <button type='submit' class="btn  pull-right <?php if(isset($sql_flag)){if($sql_flag==0){echo"btn-success";}elseif ($sql_flag==1) {echo"btn-danger";}  else {echo"btn-primary";}}else {echo"btn-primary";}?> " type="submit" name="btn_Hotel" id="btn_Hotel">Update Hotel <i class="fas fa-plus"></i></button>
                        <div class="clearfix"></div>
                    </form>
                </div>
              </div>
            </div>
          </div>
    <?php  
                    }
            
        }
        else
        {
    ?>
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
                                <a href="?<?php if (!isset($_GET['t'])){ echo 't'; } ?> " class="btn <?php if (isset($_GET['t'])){ echo 'btn-info'; } ?> btn-just-icon btn-fill btn-round ml-5" rel="tooltip" title="<?php if (isset($_GET['t'])){ echo 'Table view'; }else{ echo 'Card view'; } ?>">
                                    <?php if (!isset($_GET['t'])){ echo '<i class="material-icons pl-2 pt-1">account_box</i>'; }  else { echo '<i class="material-icons pl-2 pt-1">format_align_justify</i>'; } ?> 
                                </a>
                          </div>
                      </div>
                    </div>
                    <div class="card-body">
                          <div id="result"><b>Search</b> Hotel using name <br><i class="material-icons faa-tada animated">search</i> </div>
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
    <script>
        $(document).ready(function() {
            var readURL = function(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('.profile-pic').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }
            $(".file-upload").on('change', function(){
                readURL(this);
            });
            $(".circle").on('click', function() {
               $(".file-upload").click();
            });
        });
    </script>
    <script>
        $(function(){
            $(document).on('click','.trash',function(){
                swal({
                  title: "Are you sure?",
                  text: "Once deleted, you will not be able to recover hotel data!",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
                })
                .then((willDelete) => {
                  if (willDelete) {
                    var del_id= $(this).attr('id');
                    var $ele = $(this).parent().parent().parent();
                    $.ajax({
                        type:'POST',
                        url:'operations/deleteHotel.php',
                        data:{'del_id':del_id},
                        success: function(data){
                             if(data=="Deleted"){
                                $ele.fadeOut().remove();
                                notify('<i class="fas  fa-hotel text-white"></i> &nbsp; <b>Hotel Data Deleted</b>','success','top','center')
                             }else{
                                notify('<i class="fas  fa-hotel text-white"></i> &nbsp; <b>Hotel Data Not Deleted</b> <br>'+data,'warning','top','center')
                             }
                         }
                    });
                  }
                });
            });
        }); 
    </script>
    <script>
    $(document).ready(function (){
        $("#addHotelForm").validate({
            rules:{
                InputFile:{
                    required:true
                },
                Hotel_Name:{
                    required:true,
                    minlength:3,
                    maxlength:50
                },
                Type:{
                    required:true,
                    minlength:3,
                    maxlength:50
                },
                Description:{
                    required:true,
                    minlength:3,
                    maxlength:500
                },
                city:{
                    required:true
                }
            },
            submitHandler:subform

        });
        function subform(){
        }
        $("#addHotelForm").on('submit',(function(e) {
            e.preventDefault();
            // Get form
            var form = $('#addHotelForm')[0];

            // Create an FormData object 
            var data = new FormData(form);

            $.ajax({
                type: "POST",
                enctype: 'multipart/form-data',
                url: "operations/updateHotel.php",
                data:  data,
                processData:false,
                contentType: false,
                cache: false,
                timeout: 600000,
                beforeSend : function()
                {
                    $("#btn_Hotel").html("Uploading &nbsp; <i class='fas fa-spinner fa-spin'>");
                },
                success: function (resp) {
                    if(resp=="ok"){
                        $("#btn_Hotel").fadeIn(1000,function (){
                            $("#btn_Hotel").html("Update Hotel");
                        })
                        notify('Uploaded','success','top','center');  
                    }                        
                    else if(resp=="no"){
                        $("#btn_Hotel").fadeIn(1000,function (){
                            $("#btn_Hotel").html("Update Hotel");
                        })
                        notify('Failed:'+resp,'danger','top','center');
                    }                          
                    else if(resp=="Invalid"){
                        $("#btn_Hotel").fadeIn(1000,function (){
                            $("#btn_Hotel").html("Update Hotel");
                        })
                        notify('Invalid Image file:','warning','top','center');
                    }                          
                    else if(resp=="empty"){
                        $("#btn_Hotel").fadeIn(1000,function (){
                            $("#btn_Hotel").html("Update Hotel");
                        })
                        notify('Please fill all required fields','warning','top','center');
                    }                                                 
                    else 
                    {
                        $("#btn_Hotel").fadeIn(1000,function (){
                            $("#btn_Hotel").html("Update Hotel");
                        })
                        notify('Unknown error:'+resp,'danger','top','center');
                    }
                },
                error: function(e) 
                {
                    notify('Failed:'+e,'danger','top','center');
                }   
            });
        }));
    }); 
    </script>
</body>

</html>
<?php ob_end_flush();?>