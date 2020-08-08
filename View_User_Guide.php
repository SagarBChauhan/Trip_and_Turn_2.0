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
  <title>View Guide </title>
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
      margin-left: 20px;
      transform: scale(4.5);
      width: 30px;
      height: 30px;
      border-radius: 50%;
      transition: 0.3s;
      border: 1px solid #9c27b0;
      border-color: #9c27b0;
      box-shadow: 0 4px 5px 0 rgba(156,39,176,.14),0 1px 10px 0 rgba(156,39,176,.12),0 2px 4px -1px rgba(156,39,176,.2);
    }
    </style>
    <style>
      .toggle.ios, .toggle-on.ios, .toggle-off.ios { border-radius: 20px; }
      .toggle.ios .toggle-handle { border-radius: 20px; }
    </style>
    <style>
    .page-link {
        position: relative;
        display: block;
        padding: 0.5rem 0.75rem;
        margin-left: 0;
        line-height: 1.25;
        color: #9c27b0;
        background-color: transparent;
        border: 0 solid #dee2e6;
    }
    .pagination > .page-item.active > a, .pagination > .page-item.active > a:focus, .pagination > .page-item.active > a:hover, .pagination > .page-item.active > span, .pagination > .page-item.active > span:focus, .pagination > .page-item.active > span:hover {
        background-color: #9c27b0;
        border-color: #9c27b0;
        color: #fff;
        box-shadow: 0 4px 5px 0 rgba(156,39,176,.14),0 1px 10px 0 rgba(156,39,176,.12),0 2px 4px -1px rgba(156,39,176,.2);
    }
    .pagination > .page-item > .page-link, .pagination > .page-item > span {
        border: 0;
        border-radius: 30px !important;
        transition: all .3s;
        padding: 0 11px;
        margin: 0 3px;
        min-width: 30px;
        height: 30px;
        line-height: 30px;
    }
    </style>

    <script>
    function showUser(str) {
      if (str=="") {
        document.getElementById("result").innerHTML="<b>Search</b> Guide using firstname, middlename or lastname <br><i class='material-icons faa-tada animated'>search</i> ";
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
      xmlhttp.open("GET","operations/getuser.php?t=Guide&q="+str,true);
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
                        <li class="nav-item active">              
                            <a class="nav-link" data-toggle="collapse" href="#collapseUser3" aria-expanded="false" aria-controls="collapseUser3">
                                <i class="fas fa-chalkboard-teacher"></i>
                                <p>Guide  &triangledown;</p>
                              </a>
                              <div class="collapse" id="collapseUser3">
                                    <ul class="nav">
                                        <li class="nav-item"><a class="nav-link" href="Add_User_Guide.php"><i class="fas fa-plus"></i> Add Guide</a></li>
                                        <li class="nav-item"><a class="nav-link" href="Update_User_Guide.php"><i class="fas fa-pencil-alt"></i> Update Guide</a></li>
                                        <li class="nav-item"><a class="nav-link active" href="View_User_Guide.php"><i class="fas fa-eye"></i> View Guide</a></li>
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
                  <a class="navbar-brand text-gray" href="User_Manager.php">User Management: Guide <i class="fas fa-filter"></i> View</a>/
                  <a class="navbar-brand text-gray-dark" href="View_User_Guide.php">View Guide</a>
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
            <div class="card card-nav-tabs card-plain">
                <div class="card-header card-header-rose">
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
                            <div class="row">
                              <div class="col-md-12">
                                <div class="card">
                                  <div class="card-header card-header-primary">
                                      <div class="row">
                                          <div class="col-md-6">                  
                                              <h4 class="card-title">View</h4>
                                              <p class="card-category">Guide</p>
                                          </div>
                                          <div class="col-md-6">                  
                                              <span class="float-right p-2"><input name="Status" onchange="hid()" id="toggle-one" data-on="Compressed view" data-off="Detail View" type="checkbox"  data-onstyle="info" data-offstyle="white" data-size="small"></span>
                                              <script>
                                                $(function() {
                                                  $('#toggle-one').bootstrapToggle();
                                                })
                                              </script>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="card-body">
                                  <?php
                                  if(isset($_GET['page']))
                                  {
                                      $n=$_GET['page'];
                                      $page=($n*5)-5;                
                                  }
                                  else {
                                      $page=0;
                                  }
                                  $sql_Fetch_table="SELECT `User_Id`,`First_Name`,`Middle_Name`,`Last_Name`, `Gender`,`DOB`,`Address`, "
                                          . " (SELECT tbl_country.Name FROM tbl_country WHERE tbl_country.Country_Id=tbl_user.Country_Id) as 'Country', "
                                          . "(SELECT tbl_state.Name FROM tbl_state where tbl_state.State_Id=tbl_user.State_Id) as State, "
                                          . "(SELECT tbl_city.Name from tbl_city where tbl_city.City_Id=tbl_user.`City_Id`) as City,`PIN_Code`,"
                                          . " `Contact_No`, `Email`, (SELECT tbl_login.User_Name FROM tbl_login WHERE tbl_login.Login_id=tbl_user.Login_id) as UserName,"
                                          . "`Profile_Picture`, `Social`, `Registration_Date`, `Last_Update_Time`,Login_id,"
                                          . "(SELECT tbl_login.Status FROM tbl_login WHERE tbl_login.Login_id=tbl_user.Login_id) as Status,"
                                          . "(SELECT tbl_login.Type FROM tbl_login WHERE tbl_login.Login_id=tbl_user.Login_id) as Type FROM tbl_user "
                                          . "where (SELECT tbl_login.Type FROM tbl_login WHERE tbl_login.Login_id=tbl_user.Login_id)='Guide' limit $page,5";
                                  $result=  mysqli_query($con, $sql_Fetch_table);                
                                  ?>
                                      <div class="table-responsive">
                                          <table class="table table-hover">
                                         <thead>
                                             <tr>
                                                 <th class="text-center">#</th>
                                                 <th>Picture</th>
                                                 <th>Firstname</th>
                                                 <th>Middlename</th>
                                                 <th>Lastname</th>
                                                 <th class="hid">Gender</th>
                                                 <th class="hid">Birth_date</th>
                                                 <th class="hid">Address</th>
                                                 <th class="hid">Country</th>
                                                 <th class="hid">State</th>
                                                 <th class="hid">City</th>
                                                 <th class="hid">Pin</th>
                                                 <th>Contact</th>
                                                 <th>Email</th>
                                                 <th>UserName</th>
                                                 <th class="hid">Social</th>
                                                 <th class="hid">Registration_Date</th>
                                                 <th>Last_Update_Time</th>
                                                 <th>Status</th>
                                                 <th class="text-center" colspan="4">Actions</th>
                                             </tr>
                                         </thead>
                                         <tbody>
                                 <?php while ($row=$result->fetch_assoc())
                                  {    
                                  ?>       
                                             <tr>
                                                 <td class="text-center"><?php echo $row['User_Id'];?></td>
                                                 <td><a href='<?php echo $row['Profile_Picture']; ?>' target='_blank'/><img class='zoom rounded-circle' src='<?php echo $row['Profile_Picture']; ?>' width='30px'></a></i></td>
                                                 <td><?php echo $row['First_Name'];?></td>
                                                 <td><?php echo $row['Middle_Name'];?></td>
                                                 <td><?php echo $row['Last_Name'];?></td>
                                                 <td class="hid"><?php if ($row['Gender']==1){echo "Male";}elseif($row['Gender']==0){echo "Female";} ?></td>
                                                 <td class="hid"><?php echo $row['DOB'];?></td>
                                                 <td class="hid"><?php echo $row['Address'];?></td>
                                                 <td class="hid"><?php echo $row['Country'];?></td>
                                                 <td class="hid"><?php echo $row['State'];?></td>
                                                 <td class="hid"><?php echo $row['City'];?></td>
                                                 <td class="hid"><?php echo $row['PIN_Code'];?></td>
                                                 <td><?php echo $row['Contact_No']; ?></td>
                                                 <td><?php echo $row['Email']; ?></td>
                                                 <td><?php echo $row['UserName']; ?></td>
                                                 <td class="hid"><?php echo $row['Social']; ?></td>
                                                 <td class="hid"><?php echo $row['Registration_Date']; ?></td>
                                                 <td><?php echo $row['Last_Update_Time']; ?></td>
                                                 <td><?php if ( $row['Status']==1){echo'<div class="togglebutton"><label><input type="checkbox" checked="" id="Status" name='.$row['Login_id'].'><span class="toggle"></span></label></div>';}else{echo'<div class="togglebutton"><label><input type="checkbox" id="Status" name='.$row['Login_id'].'><span class="toggle"></span></label></div>';} ?></td>
                                                 <td class="td-actions text-center" style="display: table-cell">
                                                     <button type="button"  data-toggle="modal" data-target=".bd-example-modal-lg-<?php echo $row['User_Id']; ?>" class="btn btn-info btn-round">
                                                         <i class="material-icons">person</i>
                                                     </button>
                                                 </td>
                                                <!-- Large modal -->
                                                <div class="modal fade bd-example-modal-lg-<?php echo $row['User_Id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                  <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Profile</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                              <span aria-hidden="true">&times;</span>
                                                            </button>
                                                       </div>
                                                       <div class="modal-body">
                                                        <div class="col-md-12">
                                                          <div class="card card-profile">
                                                            <div class="card-avatar">
                                                                <a href="<?php echo $row['Profile_Picture']; ?>" target="_blank">
                                                                <img class="img" src="<?php echo $row['Profile_Picture']; ?>" />
                                                              </a>
                                                            </div>
                                                            <div class="card-body">
                                                              <h6 class="card-category text-gray"><?php echo $row['Type'];?></h6>
                                                              <h4 class="card-title"><?php if ($row['Gender']==1){    echo 'Mr. ';}else{echo"Mrs/Ms. ";} echo $row['First_Name']." ".$row['Middle_Name']." ".$row['Last_Name'];?> <b class="text-info">(<?php echo $row['UserName']; ?>)</b> <b class="text-info"><?php if ( $row['Status']==1){echo '<i class="fas fa-certificate"></i>';}  else {echo 'Deactive';} ?></b></h4>
                                                              <p class="card-description">
                                                                    <b>Born day <i class="fas fa-birthday-cake"></i> :</b> <?php echo $row['DOB'];?>,<br>
                                                                    <b>from <i class="fas fa-map-marker-alt"></i> :</b> <?php echo $row['Address'];?>,
                                                                    <?php echo $row['City'];?>, <?php echo $row['State'];?> - <?php echo $row['PIN_Code'];?>,
                                                                    <?php echo $row['Country'];?>.<br>
                                                                    <b>Contact number <i class="fas fa-mobile-alt"></i> :</b> <a href="tel:<?php echo $row['Contact_No']; ?>"  target="_blank"   data-toggle='tooltip' data-placement='top' title='call now'><?php echo $row['Contact_No']; ?> <span class="badge badge-pill badge-primary ">call now <i class="fas fa-phone "></i></span></a><a href="https://wa.me/91<?php echo $row['Contact_No']; ?>?text=Hi%20<?php echo $row['First_Name'];?>,%20%20I%20am%20from%20Trip%20and%20Turn%20Tours%20and%20Travels" target="_blank"  data-to<?php echo $row['Contact_No']; ?> data-toggle='tooltip' data-placement='top' title='chat on whatsapp'> <span class="badge badge-pill badge-success ">WhatsApp <i class="fab fa-whatsapp"></i></span></a><br>
                                                                    <b>Email Address <i class="fas fa-envelope"></i> :</b> <a href="mailto:<?php echo $row['Email']; ?>"  target="_blank"   data-toggle='tooltip' data-placement='top' title='Mail now'><?php echo $row['Email']; ?> <span class="badge badge-pill badge-danger ">mail now <i class="fas fa-paper-plane"></i></span></a><br>
                                                                    <b>User Name <i class="fas fa-user-check"></i> :</b> <?php echo $row['UserName']; ?>,<br>
                                                                    <b>Social Media Account <i class="fab fa-twitter"></i> :</b> <?php echo $row['Social']; ?>,<br>
                                                                    <b>Registration date <i class="fas fa-file-signature"></i> :</b> <?php echo $row['Registration_Date']; ?>,<br>
                                                                    <b>Last modification <i class="fas fa-history"></i> :</b> <?php echo $row['Last_Update_Time']; ?>,<br>
                                                              </p>
                                                            </div>
                                                          </div>
                                                        </div>
                                                       </div>
                                                       <div class="modal-footer">
                                                         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                       </div>
                                                    </div>
                                                  </div>
                                                </div>
                                                 <td class="td-actions text-center" style="display: table-cell">
                                                     <a href="Update_User_Guide.php?fetch=<?php echo $row['User_Id'];?>" rel="tooltip"  data-toggle='tooltip' data-placement='left' title='Update' class="btn btn-success btn-round text-white"  target='_blank'>
                                                         <i class="material-icons">edit</i>
                                                     </a>
                                                 </td>
                                                 <td class="td-actions text-center" style="display: table-cell">
                                                     <button rel="tooltip" name="btn_del_user" id="<?php echo $row['User_Id'];?>" class="btn btn-danger btn-round trash">
                                                              <i class="material-icons">close</i>
                                                     </button>
                                                 </td>
                                             </tr>
                                  <?php        
                                  }
                                  ?>
                                         </tbody>
                                     </table>    
                                      </div>
                                  </div>
                                    <div class="card-footer">
                                  <?php $sql_Fetch_table="SELECT `User_Id`,`First_Name`,`Middle_Name`,`Last_Name`, `Gender`,`DOB`,`Address`, (SELECT tbl_country.Name FROM tbl_country WHERE tbl_country.Country_Id=tbl_user.Country_Id) as 'Country', (SELECT tbl_state.Name FROM tbl_state where tbl_state.State_Id=tbl_user.State_Id) as State, (SELECT tbl_city.Name from tbl_city where tbl_city.City_Id=tbl_user.`City_Id`) as City,`PIN_Code`, `Contact_No`, `Email`, (SELECT tbl_login.User_Name FROM tbl_login WHERE tbl_login.Login_id=tbl_user.Login_id) as UserName,`Profile_Picture`, `Social`, `Registration_Date`, `Last_Update_Time`,Login_id,(SELECT tbl_login.Status FROM tbl_login WHERE tbl_login.Login_id=tbl_user.Login_id) as Status,(SELECT tbl_login.Type FROM tbl_login WHERE tbl_login.Login_id=tbl_user.Login_id) as Type FROM tbl_user"
                                          . " where (SELECT tbl_login.Type FROM tbl_login WHERE tbl_login.Login_id=tbl_user.Login_id)='Guide'";
                                  $result=  mysqli_query($con, $sql_Fetch_table);
                                  $COUNT=  mysqli_num_rows($result);
                                  $a=ceil($COUNT/5); 
                                  ?>
                                        <nav aria-label="..." style="overflow-x: auto;">
                                        <ul class="pagination">
                                          <li class="page-item <?php if(isset($_GET['page'])){if($_GET['page']==1){echo 'disabled';}} ?>">
                                            <a class="page-link" href="?page=<?php if(isset($_GET['page'])){$temp=$_GET['page'];  echo $temp-1;}else{echo'1';} ?>" tabindex="-1">Previous</a>
                                          </li>
                                          <?php
                                          for($i=1;$i<=$a;$i++)
                                          {
                                              ?>
                                          <li class='page-item <?php if(isset($_GET['page'])){if($_GET['page']==$i){echo 'active';}}  else{if($i==1){    echo 'active';} } ?>'>
                                              <?php
                                              echo"<a class='page-link' href='?page=$i'>$i</a></li>";
                                          }
                                          ?>
                                          <li class="page-item <?php if(isset($_GET['page'])){if($_GET['page']==$a){echo 'disabled';}} ?>">
                                              <a class="page-link "  href="?page=<?php if(isset($_GET['page'])){$temp=$_GET['page'];  echo $temp+1;}else{echo'2';} ?>" >Next</a>
                                          </li>
                                        </ul>
                                      </nav>
                                    </div>
                                </div>
                              </div>
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
                                            </div>
                                      </div>
                                      <div class="card-body text-center">
                                            <div id="result"><b>Search</b> Guide using firstname, middlename or lastname <br><i class="material-icons faa-tada animated">search</i> </div>
                                      </div>
                                  </div>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
        $(function(){
            $(document).on('click','#Status',function(){
                var status_id= $(this).attr('name');
                $.ajax({
                    type:'POST',
                    url:'operations/deleteUser.php',
                    data:{'status_id':status_id},
                    success: function(data){
                         if(data=="Deactivated"){
                            notify('<i class="fas fa-chalkboard-teacher text-white"></i> &nbsp; <b>Guide Deactivated</b>','warning','top','center')
                         }
                         else if(data=="Activated"){
                            notify('<i class="fas fa-chalkboard-teacher text-white"></i> &nbsp; <b>Guide Activated</b>','success','top','center')
                         }
                         else{
                            notify('Failed: '+data,'danger','top','center')
                         }
                     }
                });
            });
        });  
        </script>
        <script>
        $(function(){
            $(document).on('click','.trash',function(){
                swal({
                  title: "Are you sure?",
                  text: "Once deleted, you will not be able to recover user data!",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
                })
                .then((willDelete) => {
                  if (willDelete) {
                    var del_id= $(this).attr('id');
                    var $ele = $(this).parent().parent();
                    $.ajax({
                        type:'POST',
                        url:'operations/deleteUser.php',
                        data:{'del_id':del_id},
                        success: function(data){
                             if(data=="Deleted"){
                                $ele.fadeOut().remove();
                                notify('<i class="fas fa-chalkboard-teacher text-white"></i> &nbsp; <b>Guide Data Deleted</b>','success','top','center')
                             }else{
                                notify('<i class="fas fa-chalkboard-teacher text-white"></i> &nbsp; <b>Guide Data Not Deleted</b> <br>'+data,'warning','top','center')
                             }
                         }
                    });
                  }
                });
            });
        }); 
    </script>
        
    <script>
    function hid(){
        $(".hid").toggle();
    }
    <!-- javascript init -->
    $('.bootstrap-switch').each(function(){
        $this = $(this);
        data_on_label = $this.data('on-label') || '';
        data_off_label = $this.data('off-label') || '';

        $this.bootstrapSwitch({
            onText: data_on_label,
            offText: data_off_label
        });
    });        

    $("a.page-link").click(
         function (){
             $(this).parent().addClass("active");
         });
    </script>
</body>

</html>
<?php ob_end_flush();?>