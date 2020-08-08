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
  <title>Enquiry Manager</title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

  <link href="assets/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />

  <link href="assets/demo/demo.css" rel="stylesheet" />
  <link href="assets/font-awesome-animation/font-awesome-animation.min.css" rel="stylesheet" type="text/css"/>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
    <link href="assets/font-awesome-animation/font-awesome-animation.min.css" rel="stylesheet" type="text/css"/>
    <style>
     
    .zoom:hover {
      margin-left: 20px;
      transform: scale(4.5);
      width: 30px;
      height: 30px;
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
  <style>
        .r-360:hover{
              transition: 0.9s;
              transform: rotateZ(360deg);
              text-shadow: 10px 11px 10px gray;
              }
        .r-360{
              transition: 0.9s;
              transform: rotateZ(0deg);
              }
    </style>
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
          <li class="nav-item active">
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
                  <a class="navbar-brand text-gray-dark" href="Enquiry_Manager.php">Enquiry Management</a>
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
                <?php 
                $sql_Fetch_table="SELECT *,(SELECT tbl_enquirycategory.Name FROM tbl_enquirycategory WHERE tbl_enquirycategory.EC_Id=tbl_enquiry.EC_Id) as Category FROM `tbl_enquiry` WHERE Status!=1;";
                $result=  mysqli_query($con, $sql_Fetch_table);
                $Nofi_count=0;
                while ($row=$result->fetch_assoc())
                {          
                   $Nofi_count=$Nofi_count+1;      
                }
                
                ?>
              <li class="nav-item dropdown">
                <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">notifications</i>
                  <?php if(isset($Nofi_count)){ ?>
                  <span class="notification"> <?php echo $Nofi_count; ?></span><?php } ?>
                  <p class="d-lg-none d-md-block">
                    Some Actions
                  </p>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <?php if(isset($Nofi_count)){ ?>
                    <a class="dropdown-item " href="Enquiry_Manager.php">  <span class="notification"> <?php echo $Nofi_count; ?> </span> New enquiry request</a><?php } ?>
<!--                  <a class="dropdown-item" href="#">1 New Employee Joining Request</a>
                  <a class="dropdown-item" href="#">1 New Guide Joining Request</a>-->

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
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card card-nav-tabs card-plain">
                    <div class="card-header card-header-primary">
                        <div class="nav-tabs-navigation">
                            <div class="nav-tabs-wrapper">
                                <ul class="nav nav-tabs" data-tabs="tabs">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#All" data-toggle="tab"><i class="material-icons">list_alt</i>All</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#Package" data-toggle="tab"><i class="fas fa-cubes fa-lg"></i>  Package</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#Transportation" data-toggle="tab"><i class="material-icons">commute</i>Transport</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#Hotel" data-toggle="tab"><i class="material-icons">hotel</i>Hotel</a>
                                    </li>                                                                                              
                                    <li class="nav-item">
                                        <a class="nav-link" href="#Air" data-toggle="tab"><i class="material-icons">flight</i>Air</a>
                                    </li>                                
                                    <li class="nav-item">
                                        <a class="nav-link" href="#Train" data-toggle="tab"><i class="material-icons">train</i>Train</a>
                                    </li>                                
                                    <li class="nav-item">
                                        <a class="nav-link" href="#Cruises" data-toggle="tab"><i class="material-icons">directions_boat</i>Cruises</a>
                                    </li>                                
                                    <li class="nav-item">
                                        <a class="nav-link" href="#Passport" data-toggle="tab"><i class="fas fa-passport fa-lg"></i>  Passport</a>
                                    </li>                                
                                    <li class="nav-item">
                                        <a class="nav-link" href="#Careers" data-toggle="tab"><i class="material-icons">work</i>Careers</a>
                                    </li>                                                              
<!--                                    <li class="nav-item">
                                        <a class="nav-link" href="#Gift" data-toggle="tab"><i class="material-icons">card_giftcard</i>Gift</a>
                                    </li>                                -->
                                    <li class="nav-item">
                                        <a class="nav-link" href="#Other" data-toggle="tab"><i class="material-icons">help_outline</i>Other </a>
                                    </li>                                
                                    <li class="nav-item">
                                        <a class="nav-link" href="#Done" data-toggle="tab"><i class="material-icons text-success">done_all</i>Done </a>
                                    </li>                                
                                    <li class="nav-item">
            <a href="?<?php if (!isset($_GET['cv'])){ echo 'cv=1'; } ?> " class="btn <?php if (isset($_GET['cv'])){ echo 'btn-info'; } ?> btn-just-icon btn-fill btn-round ml-5" rel="tooltip" title="<?php if (isset($_GET['cv'])){ echo 'Compressed mode ON'; }else{ echo 'Compressed mode OFF'; } ?>">
              <?php if (!isset($_GET['cv'])){ echo '<i class="material-icons">format_align_justify</i>'; }  else { echo '<i class="material-icons">format_align_justify</i>'; } ?> 
            </a>                                    </li>                                
                                </ul>
                            </div>
                        </div>
                    </div>
                    <?php 
                    if(isset($_GET['doneId']))
                    {
                        $sql_done="UPDATE `tbl_enquiry` SET `Status`=1 WHERE `Enquiry_Id`=".$_GET['doneId'].";";
                        $query_done=  mysqli_query($con, $sql_done);
                    }
                    ?>
                    <div class="card-body">
                        <div class="tab-content text-center">
                            <div class="tab-pane active" id="All">
                                <?php
                                if(isset($_GET['page']))
                                {
                                    $n=$_GET['page'];
                                    $page=($n*6)-6;                
                                }
                                else {
                                    $page=0;
                                }   
                                $sql_Fetch_table="SELECT *,(SELECT tbl_enquirycategory.Name FROM tbl_enquirycategory WHERE tbl_enquirycategory.EC_Id=tbl_enquiry.EC_Id) as Category FROM `tbl_enquiry` WHERE Status!=1  limit $page,6;";
                                $result=  mysqli_query($con, $sql_Fetch_table);
                                $count=1;
                                ?>
                                <!--`Enquiry_Id`, `EC_Id`, `Name`, `Contact_No`, `Email`, `Massage`, `Last_Update_Time`-->
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                       <thead>
                                           <tr>
                                               <th class="text-center">#</th>
                                               <th>Name</th>
                                               <th>Category</th>
                                            <?php
                                            if(!empty($_GET['cv'])){
                                            ?>
                                               <th>Contact number</th>
                                               <th>Email</th><?php
                                            }
                                            ?>
                                               <th>Message</th>
                                               <th>Date/Time</th>
                                            
                                               <th class="m-auto">Actions</th>
                                           </tr>
                                       </thead>
                                       <tbody>
                               <?php while ($row=$result->fetch_assoc())
                                {          
                                ?>       
                                        <tr>
                                            <td class="text-center"><?php echo $row['Enquiry_Id'];?></td>
                                            <td><?php echo $row['Name'];?></td>
                                            <td><?php echo $row['Category'];?></td>
                                            <?php
                                            if(!empty($_GET['cv'])){
                                            ?>
                                            <td><?php echo $row['Contact_No']; ?></td>
                                            <td><?php echo $row['Email']; ?></td>                                            <?php
                                            }
                                            ?>
                                            <td class="text-center">
                                                <a data-toggle="modal" data-target="#ModelMessageAll<?php echo $count?>" rel="tooltip">
                                                  <?php  if(strlen($row['Message'])>50){echo substr($row['Message'], 0,50).'..';?><i class="fas fa-external-link-alt text-primary"></i><?php }else{echo $row['Message'];} ?>
                                                </a>
                                                <div class="modal fade" id="ModelMessageAll<?php echo $count;?>" tabindex="-1" role="dialog" aria-labelledby="ModelMessageAll" aria-hidden="true">
                                                  <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                      <div class="modal-header">
                                                        <h5 class="modal-title" id="MessageModalLongTitle">Full Message</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                          <span aria-hidden="true">&times;</span>
                                                        </button>
                                                      </div>
                                                      <div class="modal-body">
                                                        <?php echo $row['Message']; ?>
                                                      </div>
                                                      <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>                                                                                         
                                            </td>
                                            <td><?php echo $row['Last_Update_Time']; ?></td>

                                            <td class="td-actions">
                                                <center>
                                                <button type="button" data-toggle="modal" data-target="#ModelDetailsAll<?php echo $row['Enquiry_Id'];?>" rel="tooltip" class="btn btn-info btn-round">
                                                    <i class="material-icons">person</i>
                                                </button>
                                                <button type="button" data-toggle="modal" data-target="#ModelDoneAll<?php echo $row['Enquiry_Id'];?>" class="btn btn-danger btn-round">
                                                    <i class="material-icons">close</i>
                                                </button>
                                                </center>
                                            </td>                                            
                                            <div class="modal fade" id="ModelDetailsAll<?php echo $row['Enquiry_Id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                              <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <h5 class="modal-title" id="ModelDetailsLable<?php echo $row['Enquiry_Id'];?>">Confirm your input</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                  </div>
                                                  <div class="modal-body">
                                                      <b>Email:</b> <?php echo $row['Email']; ?><a href = "mailto:<?php echo $row['Email']; ?>"> <i class="fas fa-envelope fa-2x r-360"></i></a><hr>
                                                      <b>Phone No:</b> <?php echo $row['Contact_No']; ?><a href = "tel:<?php echo $row['Contact_No']; ?>"> <i class="fas fa-phone fa-2x r-360"></i></a><hr>
                                                      <b>WhatsApp:</b> <?php echo $row['Contact_No']; ?><a href = "https://wa.me/<?php echo $row['Contact_No']; ?>"> <i class="fab fa-whatsapp fa-2x r-360"></i></a>
                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                       
                                            <div class="modal fade" id="ModelDoneAll<?php echo $row['Enquiry_Id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                              <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <h5 class="modal-title" id="ModelDoneLabel<?php echo $row['Enquiry_Id'];?>">Contact</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                  </div>
                                                  <div class="modal-body">
                                                      Done with this..?
                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <a role="button" class="btn btn-primary text-white" href="Enquiry_Manager.php?doneId=<?php echo $row['Enquiry_Id'];?>">Done</a>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                        </tr>
                                <?php   $count=$count+1;      
                                }
                                ?>
                                       </tbody>
                                   </table>    
                                </div>
                            </div>
                            <div class="tab-pane" id="Package">
                                <?php        
                                $sql_Fetch_table="SELECT * FROM `tbl_enquiry` WHERE `EC_Id`=8 AND Status!=1;";
                                $result=  mysqli_query($con, $sql_Fetch_table);
                                $count=1;
                                ?>
                                <!--`Enquiry_Id`, `EC_Id`, `Name`, `Contact_No`, `Email`, `Massage`, `Last_Update_Time`-->
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                       <thead>
                                           <tr>
                                               <th class="text-center">#</th>
                                               <th>Name</th>
                                               <th>Contact number</th>
                                               <th>Email</th>
                                               <th>Message</th>
                                               <th>Date/Time</th>
                                               <th class="text-center">Actions</th>
                                           </tr>
                                       </thead>
                                       <tbody>
                               <?php while ($row=$result->fetch_assoc())
                                {          
                                ?>       
                                        <tr>
                                            <td class="text-center"><?php echo $count;?></td>
                                            <td><?php echo $row['Name'];?></td>
                                            <td><?php echo $row['Contact_No']; ?></td>
                                            <td><?php echo $row['Email']; ?></td>
                                            <td>
                                                <a data-toggle="modal" data-target="#ModelMessagePackage<?php echo $count;?>" rel="tooltip">
                                                  <?php  if(strlen($row['Message'])>50){echo substr($row['Message'], 0,50).'..';?><i class="fas fa-external-link-alt text-primary"></i><?php }else{echo $row['Message'];} ?>
                                                </a>
                                                <div class="modal fade" id="ModelMessagePackage<?php echo $count;?>" tabindex="-1" role="dialog" aria-labelledby="ModelMessagePackage" aria-hidden="true">
                                                  <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                      <div class="modal-header">
                                                        <h5 class="modal-title" id="MessageModalLongTitle">Full Message</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                          <span aria-hidden="true">&times;</span>
                                                        </button>
                                                      </div>
                                                      <div class="modal-body">
                                                        <?php echo $row['Message']; ?>
                                                      </div>
                                                      <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>                                                                                         
                                            </td>
                                            <td><?php echo $row['Last_Update_Time']; ?></td>
                                            <td class="td-actions text-center">
                                                <button type="button" data-toggle="modal" data-target="#ModelDetails<?php echo $row['EC_Id'].$row['Enquiry_Id'];?>" rel="tooltip" class="btn btn-info btn-round">
                                                    <i class="material-icons">person</i>
                                                </button>
                                                <button type="button" data-toggle="modal" data-target="#ModelDone<?php echo $row['EC_Id'].$row['Enquiry_Id'];?>" class="btn btn-danger btn-round">
                                                    <i class="material-icons">close</i>
                                                </button>
                                            </td>                                            
                                            <div class="modal fade" id="ModelDetails<?php echo $row['EC_Id'].$row['Enquiry_Id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                              <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <h5 class="modal-title" id="ModelDetailsLable<?php echo $row['EC_Id'].$row['Enquiry_Id'];?>">Confirm your input</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                  </div>
                                                  <div class="modal-body">
                                                      <b>Email:</b> <?php echo $row['Email']; ?><a href = "mailto:<?php echo $row['Email']; ?>"> <i class="fas fa-envelope fa-2x r-360"></i></a><hr>
                                                      <b>Phone No:</b> <?php echo $row['Contact_No']; ?><a href = "tel:<?php echo $row['Contact_No']; ?>"> <i class="fas fa-phone fa-2x r-360"></i></a><hr>
                                                      <b>WhatsApp:</b> <?php echo $row['Contact_No']; ?><a href = "https://wa.me/<?php echo $row['Contact_No']; ?>"> <i class="fab fa-whatsapp fa-2x r-360"></i></a>
                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                       
                                            <div class="modal fade" id="ModelDone<?php echo $row['EC_Id'].$row['Enquiry_Id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                              <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <h5 class="modal-title" id="ModelDoneLabel<?php echo $row['EC_Id'].$row['Enquiry_Id'];?>">Contact</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                  </div>
                                                  <div class="modal-body">
                                                      Done with this..?
                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <a role="button" class="btn btn-primary text-white" href="Enquiry_Manager.php?doneId=<?php echo $row['Enquiry_Id'];?>">Done</a>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                        </tr>
                                <?php   $count=$count+1;      
                                }
                                ?>
                                       </tbody>
                                   </table>    
                                </div>
                            </div>
                            <div class="tab-pane" id="Transportation">
                                <?php        
                                $sql_Fetch_table="SELECT * FROM `tbl_enquiry` WHERE `EC_Id`=12 AND Status!=1;";
                                $result=  mysqli_query($con, $sql_Fetch_table);
                                $count=1;
                                ?>
                                <!--`Enquiry_Id`, `EC_Id`, `Name`, `Contact_No`, `Email`, `Massage`, `Last_Update_Time`-->
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                       <thead>
                                           <tr>
                                               <th class="text-center">#</th>
                                               <th>Name</th>
                                               <th>Contact number</th>
                                               <th>Email</th>
                                               <th>Message</th>
                                               <th>Date/Time</th>
                                               <th class="text-center">Actions</th>
                                           </tr>
                                       </thead>
                                       <tbody>
                               <?php while ($row=$result->fetch_assoc())
                                {          
                                ?>       
                                        <tr>
                                            <td class="text-center"><?php echo $count;?></td>
                                            <td><?php echo $row['Name'];?></td>
                                            <td><?php echo $row['Contact_No']; ?></td>
                                            <td><?php echo $row['Email']; ?></td>
                                            <td>
                                                <a data-toggle="modal" data-target="#ModelMessageTransportation<?php echo $count;?>" rel="tooltip">
                                                  <?php  if(strlen($row['Message'])>50){echo substr($row['Message'], 0,50).'..';?><i class="fas fa-external-link-alt text-primary"></i><?php }else{echo $row['Message'];} ?>
                                                </a>
                                                <div class="modal fade" id="ModelMessageTransportation<?php echo $count;?>" tabindex="-1" role="dialog" aria-labelledby="ModelMessageTransportation" aria-hidden="true">
                                                  <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                      <div class="modal-header">
                                                        <h5 class="modal-title" id="MessageModalLongTitle">Full Message</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                          <span aria-hidden="true">&times;</span>
                                                        </button>
                                                      </div>
                                                      <div class="modal-body">
                                                        <?php echo $row['Message']; ?>
                                                      </div>
                                                      <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>                                                                                         
                                            </td>
                                            <td><?php echo $row['Last_Update_Time']; ?></td>
                                            <td class="td-actions text-center">
                                                <button type="button" data-toggle="modal" data-target="#ModelDetails<?php echo $row['EC_Id'].$row['Enquiry_Id'];?>" rel="tooltip" class="btn btn-info btn-round">
                                                    <i class="material-icons">person</i>
                                                </button>
                                                <button type="button" data-toggle="modal" data-target="#ModelDone<?php echo $row['EC_Id'].$row['Enquiry_Id'];?>" class="btn btn-danger btn-round">
                                                    <i class="material-icons">close</i>
                                                </button>
                                            </td>                                            
                                            <div class="modal fade" id="ModelDetails<?php echo $row['EC_Id'].$row['Enquiry_Id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                              <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <h5 class="modal-title" id="ModelDetailsLable<?php echo $row['EC_Id'].$row['Enquiry_Id'];?>">Confirm your input</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                  </div>
                                                  <div class="modal-body">
                                                      <b>Email:</b> <?php echo $row['Email']; ?><a href = "mailto:<?php echo $row['Email']; ?>"> <i class="fas fa-envelope fa-2x r-360"></i></a><hr>
                                                      <b>Phone No:</b> <?php echo $row['Contact_No']; ?><a href = "tel:<?php echo $row['Contact_No']; ?>"> <i class="fas fa-phone fa-2x r-360"></i></a><hr>
                                                      <b>WhatsApp:</b> <?php echo $row['Contact_No']; ?><a href = "https://wa.me/<?php echo $row['Contact_No']; ?>"> <i class="fab fa-whatsapp fa-2x r-360"></i></a>
                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                       
                                            <div class="modal fade" id="ModelDone<?php echo $row['EC_Id'].$row['Enquiry_Id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                              <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <h5 class="modal-title" id="ModelDoneLabel<?php echo $row['EC_Id'].$row['Enquiry_Id'];?>">Contact</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                  </div>
                                                  <div class="modal-body">
                                                      Done with this..?
                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <a role="button" class="btn btn-primary text-white" href="Enquiry_Manager.php?doneId=<?php echo $row['Enquiry_Id'];?>">Done</a>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                        </tr>
                                <?php   $count=$count+1;      
                                }
                                ?>
                                       </tbody>
                                   </table>    
                                </div>
                            </div>
                            <div class="tab-pane" id="Hotel">
                                <?php        
                                $sql_Fetch_table="SELECT * FROM `tbl_enquiry` WHERE `EC_Id`=6 AND Status!=1;";
                                $result=  mysqli_query($con, $sql_Fetch_table);
                                $count=1;
                                ?>
                                <!--`Enquiry_Id`, `EC_Id`, `Name`, `Contact_No`, `Email`, `Massage`, `Last_Update_Time`-->
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                       <thead>
                                           <tr>
                                               <th class="text-center">#</th>
                                               <th>Name</th>
                                               <th>Contact number</th>
                                               <th>Email</th>
                                               <th>Message</th>
                                               <th>Date/Time</th>
                                               <th class="text-center">Actions</th>
                                           </tr>
                                       </thead>
                                       <tbody>
                               <?php while ($row=$result->fetch_assoc())
                                {          
                                ?>       
                                        <tr>
                                            <td class="text-center"><?php echo $count;?></td>
                                            <td><?php echo $row['Name'];?></td>
                                            <td><?php echo $row['Contact_No']; ?></td>
                                            <td><?php echo $row['Email']; ?></td>
                                            <td>
                                                <a data-toggle="modal" data-target="#ModelMessageHotel<?php echo $count;?>" rel="tooltip">
                                                  <?php  if(strlen($row['Message'])>50){echo substr($row['Message'], 0,50).'..';?><i class="fas fa-external-link-alt text-primary"></i><?php }else{echo $row['Message'];} ?>
                                                </a>
                                                <div class="modal fade" id="ModelMessageHotel<?php echo $count;?>" tabindex="-1" role="dialog" aria-labelledby="ModelMessageHotel" aria-hidden="true">
                                                  <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                      <div class="modal-header">
                                                        <h5 class="modal-title" id="MessageModalLongTitle">Full Message</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                          <span aria-hidden="true">&times;</span>
                                                        </button>
                                                      </div>
                                                      <div class="modal-body">
                                                        <?php echo $row['Message']; ?>
                                                      </div>
                                                      <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>                                                                                         
                                            </td>
                                            <td><?php echo $row['Last_Update_Time']; ?></td>
                                            <td class="td-actions text-center">
                                                <button type="button" data-toggle="modal" data-target="#ModelDetails<?php echo $row['EC_Id'].$row['Enquiry_Id'];?>" rel="tooltip" class="btn btn-info btn-round">
                                                    <i class="material-icons">person</i>
                                                </button>
                                                <button type="button" data-toggle="modal" data-target="#ModelDone<?php echo $row['EC_Id'].$row['Enquiry_Id'];?>" class="btn btn-danger btn-round">
                                                    <i class="material-icons">close</i>
                                                </button>
                                            </td>                                            
                                            <div class="modal fade" id="ModelDetails<?php echo $row['EC_Id'].$row['Enquiry_Id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                              <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <h5 class="modal-title" id="ModelDetailsLable<?php echo $row['EC_Id'].$row['Enquiry_Id'];?>">Confirm your input</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                  </div>
                                                  <div class="modal-body">
                                                      <b>Email:</b> <?php echo $row['Email']; ?><a href = "mailto:<?php echo $row['Email']; ?>"> <i class="fas fa-envelope fa-2x r-360"></i></a><hr>
                                                      <b>Phone No:</b> <?php echo $row['Contact_No']; ?><a href = "tel:<?php echo $row['Contact_No']; ?>"> <i class="fas fa-phone fa-2x r-360"></i></a><hr>
                                                      <b>WhatsApp:</b> <?php echo $row['Contact_No']; ?><a href = "https://wa.me/<?php echo $row['Contact_No']; ?>"> <i class="fab fa-whatsapp fa-2x r-360"></i></a>
                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                       
                                            <div class="modal fade" id="ModelDone<?php echo $row['EC_Id'].$row['Enquiry_Id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                              <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <h5 class="modal-title" id="ModelDoneLabel<?php echo $row['EC_Id'].$row['Enquiry_Id'];?>">Contact</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                  </div>
                                                  <div class="modal-body">
                                                      Done with this..?
                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <a role="button" class="btn btn-primary text-white" href="Enquiry_Manager.php?doneId=<?php echo $row['Enquiry_Id'];?>">Done</a>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                        </tr>
                                <?php   $count=$count+1;      
                                }
                                ?>
                                       </tbody>
                                   </table>    
                                </div>
                            </div>
                            <div class="tab-pane " id="Air">
                                <?php        
                                $sql_Fetch_table="SELECT * FROM `tbl_enquiry` WHERE `EC_Id`=1 AND Status!=1;";
                                $result=  mysqli_query($con, $sql_Fetch_table);
                                $count=1;
                                ?>
                                <!--`Enquiry_Id`, `EC_Id`, `Name`, `Contact_No`, `Email`, `Massage`, `Last_Update_Time`-->
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                       <thead>
                                           <tr>
                                               <th class="text-center">#</th>
                                               <th>Name</th>
                                               <th>Contact number</th>
                                               <th>Email</th>
                                               <th>Message</th>
                                               <th>Date/Time</th>
                                               <th class="text-center">Actions</th>
                                           </tr>
                                       </thead>
                                       <tbody>
                               <?php while ($row=$result->fetch_assoc())
                                {          
                                ?>       
                                        <tr>
                                            <td class="text-center"><?php echo $count;?></td>
                                            <td><?php echo $row['Name'];?></td>
                                            <td><?php echo $row['Contact_No']; ?></td>
                                            <td><?php echo $row['Email']; ?></td>
                                            <td>
                                                <a data-toggle="modal" data-target="#ModelMessageAir<?php echo $count;?>" rel="tooltip">
                                                  <?php  if(strlen($row['Message'])>50){echo substr($row['Message'], 0,50).'..';?><i class="fas fa-external-link-alt text-primary"></i><?php }else{echo $row['Message'];} ?>
                                                </a>
                                                <div class="modal fade" id="ModelMessageAir<?php echo $count;?>" tabindex="-1" role="dialog" aria-labelledby="ModelMessageAir" aria-hidden="true">
                                                  <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                      <div class="modal-header">
                                                        <h5 class="modal-title" id="MessageModalLongTitle">Full Message</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                          <span aria-hidden="true">&times;</span>
                                                        </button>
                                                      </div>
                                                      <div class="modal-body">
                                                        <?php echo $row['Message']; ?>
                                                      </div>
                                                      <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>                                                                                         
                                            </td>
                                            <td><?php echo $row['Last_Update_Time']; ?></td>
                                            <td class="td-actions text-center">
                                                <button type="button" data-toggle="modal" data-target="#ModelDetails<?php echo $row['EC_Id'].$row['Enquiry_Id'];?>" rel="tooltip" class="btn btn-info btn-round">
                                                    <i class="material-icons">person</i>
                                                </button>
                                                <button type="button" data-toggle="modal" data-target="#ModelDone<?php echo $row['EC_Id'].$row['Enquiry_Id'];?>" class="btn btn-danger btn-round">
                                                    <i class="material-icons">close</i>
                                                </button>
                                            </td>                                            
                                            <div class="modal fade" id="ModelDetails<?php echo $row['EC_Id'].$row['Enquiry_Id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                              <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <h5 class="modal-title" id="ModelDetailsLable<?php echo $row['EC_Id'].$row['Enquiry_Id'];?>">Confirm your input</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                  </div>
                                                  <div class="modal-body">
                                                      <b>Email:</b> <?php echo $row['Email']; ?><a href = "mailto:<?php echo $row['Email']; ?>"> <i class="fas fa-envelope fa-2x r-360"></i></a><hr>
                                                      <b>Phone No:</b> <?php echo $row['Contact_No']; ?><a href = "tel:<?php echo $row['Contact_No']; ?>"> <i class="fas fa-phone fa-2x r-360"></i></a><hr>
                                                      <b>WhatsApp:</b> <?php echo $row['Contact_No']; ?><a href = "https://wa.me/<?php echo $row['Contact_No']; ?>"> <i class="fab fa-whatsapp fa-2x r-360"></i></a>
                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                       
                                            <div class="modal fade" id="ModelDone<?php echo $row['EC_Id'].$row['Enquiry_Id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                              <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <h5 class="modal-title" id="ModelDoneLabel<?php echo $row['EC_Id'].$row['Enquiry_Id'];?>">Contact</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                  </div>
                                                  <div class="modal-body">
                                                      Done with this..?
                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <a role="button" class="btn btn-primary text-white" href="Enquiry_Manager.php?doneId=<?php echo $row['Enquiry_Id'];?>">Done</a>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                        </tr>
                                <?php   $count=$count+1;      
                                }
                                ?>
                                       </tbody>
                                   </table>    
                                </div>
                            </div>
                            <div class="tab-pane" id="Train">
                                <?php        
                                $sql_Fetch_table="SELECT * FROM `tbl_enquiry` WHERE `EC_Id`=11 AND Status!=1;";
                                $result=  mysqli_query($con, $sql_Fetch_table);
                                $count=1;
                                ?>
                                <!--`Enquiry_Id`, `EC_Id`, `Name`, `Contact_No`, `Email`, `Massage`, `Last_Update_Time`-->
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                       <thead>
                                           <tr>
                                               <th class="text-center">#</th>
                                               <th>Name</th>
                                               <th>Contact number</th>
                                               <th>Email</th>
                                               <th>Message</th>
                                               <th>Date/Time</th>
                                               <th class="text-center">Actions</th>
                                           </tr>
                                       </thead>
                                       <tbody>
                               <?php while ($row=$result->fetch_assoc())
                                {          
                                ?>       
                                        <tr>
                                            <td class="text-center"><?php echo $count;?></td>
                                            <td><?php echo $row['Name'];?></td>
                                            <td><?php echo $row['Contact_No']; ?></td>
                                            <td><?php echo $row['Email']; ?></td>
                                            <td>
                                                <a data-toggle="modal" data-target="#ModelMessageTrain<?php echo $count;?>" rel="tooltip">
                                                  <?php  if(strlen($row['Message'])>50){echo substr($row['Message'], 0,50).'..';?><i class="fas fa-external-link-alt text-primary"></i><?php }else{echo $row['Message'];} ?>
                                                </a>
                                                <div class="modal fade" id="ModelMessageTrain<?php echo $count;?>" tabindex="-1" role="dialog" aria-labelledby="ModelMessageTrain" aria-hidden="true">
                                                  <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                      <div class="modal-header">
                                                        <h5 class="modal-title" id="MessageModalLongTitle">Full Message</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                          <span aria-hidden="true">&times;</span>
                                                        </button>
                                                      </div>
                                                      <div class="modal-body">
                                                        <?php echo $row['Message']; ?>
                                                      </div>
                                                      <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>                                                                                         
                                            </td>
                                            <td><?php echo $row['Last_Update_Time']; ?></td>
                                            <td class="td-actions text-center">
                                                <button type="button" data-toggle="modal" data-target="#ModelDetails<?php echo $row['EC_Id'].$row['Enquiry_Id'];?>" rel="tooltip" class="btn btn-info btn-round">
                                                    <i class="material-icons">person</i>
                                                </button>
                                                <button type="button" data-toggle="modal" data-target="#ModelDone<?php echo $row['EC_Id'].$row['Enquiry_Id'];?>" class="btn btn-danger btn-round">
                                                    <i class="material-icons">close</i>
                                                </button>
                                            </td>                                            
                                            <div class="modal fade" id="ModelDetails<?php echo $row['EC_Id'].$row['Enquiry_Id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                              <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <h5 class="modal-title" id="ModelDetailsLable<?php echo $row['EC_Id'].$row['Enquiry_Id'];?>">Confirm your input</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                  </div>
                                                  <div class="modal-body">
                                                      <b>Email:</b> <?php echo $row['Email']; ?><a href = "mailto:<?php echo $row['Email']; ?>"> <i class="fas fa-envelope fa-2x r-360"></i></a><hr>
                                                      <b>Phone No:</b> <?php echo $row['Contact_No']; ?><a href = "tel:<?php echo $row['Contact_No']; ?>"> <i class="fas fa-phone fa-2x r-360"></i></a><hr>
                                                      <b>WhatsApp:</b> <?php echo $row['Contact_No']; ?><a href = "https://wa.me/<?php echo $row['Contact_No']; ?>"> <i class="fab fa-whatsapp fa-2x r-360"></i></a>
                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                       
                                            <div class="modal fade" id="ModelDone<?php echo $row['EC_Id'].$row['Enquiry_Id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                              <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <h5 class="modal-title" id="ModelDoneLabel<?php echo $row['EC_Id'].$row['Enquiry_Id'];?>">Contact</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                  </div>
                                                  <div class="modal-body">
                                                      Done with this..?
                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <a role="button" class="btn btn-primary text-white" href="Enquiry_Manager.php?doneId=<?php echo $row['Enquiry_Id'];?>">Done</a>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                        </tr>
                                <?php   $count=$count+1;      
                                }
                                ?>
                                       </tbody>
                                   </table>    
                                </div>
                            </div>
                            <div class="tab-pane" id="Cruises">
                                <?php        
                                $sql_Fetch_table="SELECT * FROM `tbl_enquiry` WHERE `EC_Id`=4 AND Status!=1;";
                                $result=  mysqli_query($con, $sql_Fetch_table);
                                $count=1;
                                ?>
                                <!--`Enquiry_Id`, `EC_Id`, `Name`, `Contact_No`, `Email`, `Massage`, `Last_Update_Time`-->
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                       <thead>
                                           <tr>
                                               <th class="text-center">#</th>
                                               <th>Name</th>
                                               <th>Contact number</th>
                                               <th>Email</th>
                                               <th>Message</th>
                                               <th>Date/Time</th>
                                               <th class="text-center">Actions</th>
                                           </tr>
                                       </thead>
                                       <tbody>
                               <?php while ($row=$result->fetch_assoc())
                                {          
                                ?>       
                                        <tr>
                                            <td class="text-center"><?php echo $count;?></td>
                                            <td><?php echo $row['Name'];?></td>
                                            <td><?php echo $row['Contact_No']; ?></td>
                                            <td><?php echo $row['Email']; ?></td>
                                            <td>
                                                <a data-toggle="modal" data-target="#ModelMessageCruises<?php echo $count;?>" rel="tooltip">
                                                  <?php  if(strlen($row['Message'])>50){echo substr($row['Message'], 0,50).'..';?><i class="fas fa-external-link-alt text-primary"></i><?php }else{echo $row['Message'];} ?>
                                                </a>
                                                <div class="modal fade" id="ModelMessageCruises<?php echo $count;?>" tabindex="-1" role="dialog" aria-labelledby="ModelMessageCruises" aria-hidden="true">
                                                  <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                      <div class="modal-header">
                                                        <h5 class="modal-title" id="MessageModalLongTitle">Full Message</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                          <span aria-hidden="true">&times;</span>
                                                        </button>
                                                      </div>
                                                      <div class="modal-body">
                                                        <?php echo $row['Message']; ?>
                                                      </div>
                                                      <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>                                                                                         
                                            </td>
                                            <td><?php echo $row['Last_Update_Time']; ?></td>
                                            <td class="td-actions text-center">
                                                <button type="button" data-toggle="modal" data-target="#ModelDetails<?php echo $row['EC_Id'].$row['Enquiry_Id'];?>" rel="tooltip" class="btn btn-info btn-round">
                                                    <i class="material-icons">person</i>
                                                </button>
                                                <button type="button" data-toggle="modal" data-target="#ModelDone<?php echo $row['EC_Id'].$row['Enquiry_Id'];?>" class="btn btn-danger btn-round">
                                                    <i class="material-icons">close</i>
                                                </button>
                                            </td>                                            
                                            <div class="modal fade" id="ModelDetails<?php echo $row['EC_Id'].$row['Enquiry_Id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                              <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <h5 class="modal-title" id="ModelDetailsLable<?php echo $row['EC_Id'].$row['Enquiry_Id'];?>">Confirm your input</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                  </div>
                                                  <div class="modal-body">
                                                      <b>Email:</b> <?php echo $row['Email']; ?><a href = "mailto:<?php echo $row['Email']; ?>"> <i class="fas fa-envelope fa-2x r-360"></i></a><hr>
                                                      <b>Phone No:</b> <?php echo $row['Contact_No']; ?><a href = "tel:<?php echo $row['Contact_No']; ?>"> <i class="fas fa-phone fa-2x r-360"></i></a><hr>
                                                      <b>WhatsApp:</b> <?php echo $row['Contact_No']; ?><a href = "https://wa.me/<?php echo $row['Contact_No']; ?>"> <i class="fab fa-whatsapp fa-2x r-360"></i></a>
                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                       
                                            <div class="modal fade" id="ModelDone<?php echo $row['EC_Id'].$row['Enquiry_Id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                              <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <h5 class="modal-title" id="ModelDoneLabel<?php echo $row['EC_Id'].$row['Enquiry_Id'];?>">Contact</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                  </div>
                                                  <div class="modal-body">
                                                      Done with this..?
                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <a role="button" class="btn btn-primary text-white" href="Enquiry_Manager.php?doneId=<?php echo $row['Enquiry_Id'];?>">Done</a>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                        </tr>
                                <?php   $count=$count+1;      
                                }
                                ?>
                                       </tbody>
                                   </table>    
                                </div>
                            </div>
                            <div class="tab-pane" id="Passport">
                                <?php        
                                $sql_Fetch_table="SELECT * FROM `tbl_enquiry` WHERE `EC_Id`=9 AND Status!=1;";
                                $result=  mysqli_query($con, $sql_Fetch_table);
                                $count=1;
                                ?>
                                <!--`Enquiry_Id`, `EC_Id`, `Name`, `Contact_No`, `Email`, `Massage`, `Last_Update_Time`-->
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                       <thead>
                                           <tr>
                                               <th class="text-center">#</th>
                                               <th>Name</th>
                                               <th>Contact number</th>
                                               <th>Email</th>
                                               <th>Message</th>
                                               <th>Date/Time</th>
                                               <th class="text-center">Actions</th>
                                           </tr>
                                       </thead>
                                       <tbody>
                               <?php while ($row=$result->fetch_assoc())
                                {          
                                ?>       
                                        <tr>
                                            <td class="text-center"><?php echo $count;?></td>
                                            <td><?php echo $row['Name'];?></td>
                                            <td><?php echo $row['Contact_No']; ?></td>
                                            <td><?php echo $row['Email']; ?></td>
                                            <td>
                                                <a data-toggle="modal" data-target="#ModelMessagePassport<?php echo $count;?>" rel="tooltip">
                                                  <?php  if(strlen($row['Message'])>50){echo substr($row['Message'], 0,50).'..';?><i class="fas fa-external-link-alt text-primary"></i><?php }else{echo $row['Message'];} ?>
                                                </a>
                                                <div class="modal fade" id="ModelMessagePassport<?php echo $count;?>" tabindex="-1" role="dialog" aria-labelledby="ModelMessagePassport" aria-hidden="true">
                                                  <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                      <div class="modal-header">
                                                        <h5 class="modal-title" id="MessageModalLongTitle">Full Message</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                          <span aria-hidden="true">&times;</span>
                                                        </button>
                                                      </div>
                                                      <div class="modal-body">
                                                        <?php echo $row['Message']; ?>
                                                      </div>
                                                      <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>                                                                                         
                                            </td>
                                            <td><?php echo $row['Last_Update_Time']; ?></td>
                                            <td class="td-actions text-center">
                                                <button type="button" data-toggle="modal" data-target="#ModelDetails<?php echo $row['EC_Id'].$row['Enquiry_Id'];?>" rel="tooltip" class="btn btn-info btn-round">
                                                    <i class="material-icons">person</i>
                                                </button>
                                                <button type="button" data-toggle="modal" data-target="#ModelDone<?php echo $row['EC_Id'].$row['Enquiry_Id'];?>" class="btn btn-danger btn-round">
                                                    <i class="material-icons">close</i>
                                                </button>
                                            </td>                                            
                                            <div class="modal fade" id="ModelDetails<?php echo $row['EC_Id'].$row['Enquiry_Id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                              <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <h5 class="modal-title" id="ModelDetailsLable<?php echo $row['EC_Id'].$row['Enquiry_Id'];?>">Confirm your input</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                  </div>
                                                  <div class="modal-body">
                                                      <b>Email:</b> <?php echo $row['Email']; ?><a href = "mailto:<?php echo $row['Email']; ?>"> <i class="fas fa-envelope fa-2x r-360"></i></a><hr>
                                                      <b>Phone No:</b> <?php echo $row['Contact_No']; ?><a href = "tel:<?php echo $row['Contact_No']; ?>"> <i class="fas fa-phone fa-2x r-360"></i></a><hr>
                                                      <b>WhatsApp:</b> <?php echo $row['Contact_No']; ?><a href = "https://wa.me/<?php echo $row['Contact_No']; ?>"> <i class="fab fa-whatsapp fa-2x r-360"></i></a>
                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                       
                                            <div class="modal fade" id="ModelDone<?php echo $row['EC_Id'].$row['Enquiry_Id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                              <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <h5 class="modal-title" id="ModelDoneLabel<?php echo $row['EC_Id'].$row['Enquiry_Id'];?>">Contact</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                  </div>
                                                  <div class="modal-body">
                                                      Done with this..?
                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <a role="button" class="btn btn-primary text-white" href="Enquiry_Manager.php?doneId=<?php echo $row['Enquiry_Id'];?>">Done</a>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                        </tr>
                                <?php   $count=$count+1;      
                                }
                                ?>
                                       </tbody>
                                   </table>    
                                </div>
                            </div>
                            <div class="tab-pane" id="Careers">
                                <?php        
                                $sql_Fetch_table="SELECT * FROM `tbl_enquiry` WHERE `EC_Id`=2 AND Status!=1;";
                                $result=  mysqli_query($con, $sql_Fetch_table);
                                $count=1;
                                ?>
                                <!--`Enquiry_Id`, `EC_Id`, `Name`, `Contact_No`, `Email`, `Massage`, `Last_Update_Time`-->
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                       <thead>
                                           <tr>
                                               <th class="text-center">#</th>
                                               <th>Name</th>
                                               <th>Contact number</th>
                                               <th>Email</th>
                                               <th>Message</th>
                                               <th>Date/Time</th>
                                               <th class="text-center">Actions</th>
                                           </tr>
                                       </thead>
                                       <tbody>
                               <?php while ($row=$result->fetch_assoc())
                                {          
                                ?>       
                                        <tr>
                                            <td class="text-center"><?php echo $count;?></td>
                                            <td><?php echo $row['Name'];?></td>
                                            <td><?php echo $row['Contact_No']; ?></td>
                                            <td><?php echo $row['Email']; ?></td>
                                            <td>
                                                <a data-toggle="modal" data-target="#ModelMessageCareers<?php echo $count;?>" rel="tooltip">
                                                  <?php  if(strlen($row['Message'])>50){echo substr($row['Message'], 0,50).'..';?><i class="fas fa-external-link-alt text-primary"></i><?php }else{echo $row['Message'];} ?>
                                                </a>
                                                <div class="modal fade" id="ModelMessageCareers<?php echo $count;?>" tabindex="-1" role="dialog" aria-labelledby="ModelMessageCareers" aria-hidden="true">
                                                  <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                      <div class="modal-header">
                                                        <h5 class="modal-title" id="MessageModalLongTitle">Full Message</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                          <span aria-hidden="true">&times;</span>
                                                        </button>
                                                      </div>
                                                      <div class="modal-body">
                                                        <?php echo $row['Message']; ?>
                                                      </div>
                                                      <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>                                                                                         
                                            </td>
                                            <td><?php echo $row['Last_Update_Time']; ?></td>
                                            <td class="td-actions text-center">
                                                <button type="button" data-toggle="modal" data-target="#ModelDetails<?php echo $row['EC_Id'].$row['Enquiry_Id'];?>" rel="tooltip" class="btn btn-info btn-round">
                                                    <i class="material-icons">person</i>
                                                </button>
                                                <button type="button" data-toggle="modal" data-target="#ModelDone<?php echo $row['EC_Id'].$row['Enquiry_Id'];?>" class="btn btn-danger btn-round">
                                                    <i class="material-icons">close</i>
                                                </button>
                                            </td>                                            
                                            <div class="modal fade" id="ModelDetails<?php echo $row['EC_Id'].$row['Enquiry_Id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                              <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <h5 class="modal-title" id="ModelDetailsLable<?php echo $row['EC_Id'].$row['Enquiry_Id'];?>">Confirm your input</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                  </div>
                                                  <div class="modal-body">
                                                      <b>Email:</b> <?php echo $row['Email']; ?><a href = "mailto:<?php echo $row['Email']; ?>"> <i class="fas fa-envelope fa-2x r-360"></i></a><hr>
                                                      <b>Phone No:</b> <?php echo $row['Contact_No']; ?><a href = "tel:<?php echo $row['Contact_No']; ?>"> <i class="fas fa-phone fa-2x r-360"></i></a><hr>
                                                      <b>WhatsApp:</b> <?php echo $row['Contact_No']; ?><a href = "https://wa.me/<?php echo $row['Contact_No']; ?>"> <i class="fab fa-whatsapp fa-2x r-360"></i></a>
                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                       
                                            <div class="modal fade" id="ModelDone<?php echo $row['EC_Id'].$row['Enquiry_Id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                              <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <h5 class="modal-title" id="ModelDoneLabel<?php echo $row['EC_Id'].$row['Enquiry_Id'];?>">Contact</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                  </div>
                                                  <div class="modal-body">
                                                      Done with this..?
                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <a role="button" class="btn btn-primary text-white" href="Enquiry_Manager.php?doneId=<?php echo $row['Enquiry_Id'];?>">Done</a>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                        </tr>
                                <?php   $count=$count+1;      
                                }
                                ?>
                                       </tbody>
                                   </table>    
                                </div>
                            </div>
                            <div class="tab-pane" id="Gift">
                                <?php        
                                $sql_Fetch_table="SELECT * FROM `tbl_enquiry` WHERE `EC_Id`=5 AND Status!=1;";
                                $result=  mysqli_query($con, $sql_Fetch_table);
                                $count=1;
                                ?>
                                <!--`Enquiry_Id`, `EC_Id`, `Name`, `Contact_No`, `Email`, `Massage`, `Last_Update_Time`-->
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                       <thead>
                                           <tr>
                                               <th class="text-center">#</th>
                                               <th>Name</th>
                                               <th>Contact number</th>
                                               <th>Email</th>
                                               <th>Message</th>
                                               <th>Date/Time</th>
                                               <th class="text-center">Actions</th>
                                           </tr>
                                       </thead>
                                       <tbody>
                               <?php while ($row=$result->fetch_assoc())
                                {          
                                ?>       
                                        <tr>
                                            <td class="text-center"><?php echo $count;?></td>
                                            <td><?php echo $row['Name'];?></td>
                                            <td><?php echo $row['Contact_No']; ?></td>
                                            <td><?php echo $row['Email']; ?></td>
                                            <td>
                                                <a data-toggle="modal" data-target="#ModelMessageGift<?php echo $count;?>" rel="tooltip">
                                                  <?php  if(strlen($row['Message'])>50){echo substr($row['Message'], 0,50).'..';?><i class="fas fa-external-link-alt text-primary"></i><?php }else{echo $row['Message'];} ?>
                                                </a>
                                                <div class="modal fade" id="ModelMessageGift<?php echo $count;?>" tabindex="-1" role="dialog" aria-labelledby="ModelMessageGift" aria-hidden="true">
                                                  <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                      <div class="modal-header">
                                                        <h5 class="modal-title" id="MessageModalLongTitle">Full Message</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                          <span aria-hidden="true">&times;</span>
                                                        </button>
                                                      </div>
                                                      <div class="modal-body">
                                                        <?php echo $row['Message']; ?>
                                                      </div>
                                                      <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>                                                                                         
                                            </td>
                                            <td><?php echo $row['Last_Update_Time']; ?></td>
                                            <td class="td-actions text-center">
                                                <button type="button" data-toggle="modal" data-target="#ModelDetails<?php echo $row['EC_Id'].$row['Enquiry_Id'];?>" rel="tooltip" class="btn btn-info btn-round">
                                                    <i class="material-icons">person</i>
                                                </button>
                                                <button type="button" data-toggle="modal" data-target="#ModelDone<?php echo $row['EC_Id'].$row['Enquiry_Id'];?>" class="btn btn-danger btn-round">
                                                    <i class="material-icons">close</i>
                                                </button>
                                            </td>                                            
                                            <div class="modal fade" id="ModelDetails<?php echo $row['EC_Id'].$row['Enquiry_Id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                              <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <h5 class="modal-title" id="ModelDetailsLable<?php echo $row['EC_Id'].$row['Enquiry_Id'];?>">Confirm your input</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                  </div>
                                                  <div class="modal-body">
                                                      <b>Email:</b> <?php echo $row['Email']; ?><a href = "mailto:<?php echo $row['Email']; ?>"> <i class="fas fa-envelope fa-2x r-360"></i></a><hr>
                                                      <b>Phone No:</b> <?php echo $row['Contact_No']; ?><a href = "tel:<?php echo $row['Contact_No']; ?>"> <i class="fas fa-phone fa-2x r-360"></i></a><hr>
                                                      <b>WhatsApp:</b> <?php echo $row['Contact_No']; ?><a href = "https://wa.me/<?php echo $row['Contact_No']; ?>"> <i class="fab fa-whatsapp fa-2x r-360"></i></a>
                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                       
                                            <div class="modal fade" id="ModelDone<?php echo $row['EC_Id'].$row['Enquiry_Id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                              <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <h5 class="modal-title" id="ModelDoneLabel<?php echo $row['EC_Id'].$row['Enquiry_Id'];?>">Contact</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                  </div>
                                                  <div class="modal-body">
                                                      Done with this..?
                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <a role="button" class="btn btn-primary text-white" href="Enquiry_Manager.php?doneId=<?php echo $row['Enquiry_Id'];?>">Done</a>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                        </tr>
                                <?php   $count=$count+1;      
                                }
                                ?>
                                       </tbody>
                                   </table>    
                                </div>
                            </div>
                            <div class="tab-pane" id="Other">
                               <?php        
                                $sql_Fetch_table="SELECT * FROM `tbl_enquiry` WHERE `EC_Id`=0 AND Status!=1;";
                                $result=  mysqli_query($con, $sql_Fetch_table);
                                $count=1;
                                ?>
                                <!--`Enquiry_Id`, `EC_Id`, `Name`, `Contact_No`, `Email`, `Massage`, `Last_Update_Time`-->
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                       <thead>
                                           <tr>
                                               <th class="text-center">#</th>
                                               <th>Name</th>
                                               <th>Contact number</th>
                                               <th>Email</th>
                                               <th>Message</th>
                                               <th>Date/Time</th>
                                               <th class="text-center">Actions</th>
                                           </tr>
                                       </thead>
                                       <tbody>
                               <?php while ($row=$result->fetch_assoc())
                                {          
                                ?>       
                                        <tr>
                                            <td class="text-center"><?php echo $count;?></td>
                                            <td><?php echo $row['Name'];?></td>
                                            <td><?php echo $row['Contact_No']; ?></td>
                                            <td><?php echo $row['Email']; ?></td>
                                            <td>
                                                <a data-toggle="modal" data-target="#ModelMessageOther<?php echo $count;?>" rel="tooltip">
                                                  <?php  if(strlen($row['Message'])>50){echo substr($row['Message'], 0,50).'..';?><i class="fas fa-external-link-alt text-primary"></i><?php }else{echo $row['Message'];} ?>
                                                </a>
                                                <div class="modal fade" id="ModelMessageOther<?php echo $count;?>" tabindex="-1" role="dialog" aria-labelledby="ModelMessageOther" aria-hidden="true">
                                                  <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                      <div class="modal-header">
                                                        <h5 class="modal-title" id="MessageModalLongTitle">Full Message</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                          <span aria-hidden="true">&times;</span>
                                                        </button>
                                                      </div>
                                                      <div class="modal-body">
                                                        <?php echo $row['Message']; ?>
                                                      </div>
                                                      <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>                                                                                         
                                            </td>
                                            <td><?php echo $row['Last_Update_Time']; ?></td>
                                            <td class="td-actions text-center">
                                                <button type="button" data-toggle="modal" data-target="#ModelDetails<?php echo $row['EC_Id'].$row['Enquiry_Id'];?>" rel="tooltip" class="btn btn-info btn-round">
                                                    <i class="material-icons">person</i>
                                                </button>
                                                <button type="button" data-toggle="modal" data-target="#ModelDone<?php echo $row['EC_Id'].$row['Enquiry_Id'];?>" class="btn btn-danger btn-round">
                                                    <i class="material-icons">close</i>
                                                </button>
                                            </td>                                            
                                            <div class="modal fade" id="ModelDetails<?php echo $row['EC_Id'].$row['Enquiry_Id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                              <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <h5 class="modal-title" id="ModelDetailsLable<?php echo $row['EC_Id'].$row['Enquiry_Id'];?>">Confirm your input</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                  </div>
                                                  <div class="modal-body">
                                                      <b>Email:</b> <?php echo $row['Email']; ?><a href = "mailto:<?php echo $row['Email']; ?>"> <i class="fas fa-envelope fa-2x r-360"></i></a><hr>
                                                      <b>Phone No:</b> <?php echo $row['Contact_No']; ?><a href = "tel:<?php echo $row['Contact_No']; ?>"> <i class="fas fa-phone fa-2x r-360"></i></a><hr>
                                                      <b>WhatsApp:</b> <?php echo $row['Contact_No']; ?><a href = "https://wa.me/<?php echo $row['Contact_No']; ?>"> <i class="fab fa-whatsapp fa-2x r-360"></i></a>
                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                       
                                            <div class="modal fade" id="ModelDone<?php echo $row['EC_Id'].$row['Enquiry_Id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                              <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <h5 class="modal-title" id="ModelDoneLabel<?php echo $row['EC_Id'].$row['Enquiry_Id'];?>">Contact</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                  </div>
                                                  <div class="modal-body">
                                                      Done with this..?
                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <a role="button" class="btn btn-primary text-white" href="Enquiry_Manager.php?doneId=<?php echo $row['Enquiry_Id'];?>">Done</a>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                        </tr>
                                <?php   $count=$count+1;      
                                }
                                ?>
                                       </tbody>
                                   </table>    
                                </div>
                            </div>
                            <div class="tab-pane" id="Done">
                                <?php 
                                        if(isset($query_done))
                                        {
                                        ?>
                                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                <strong>Done!</strong> Recent enquiry marked as done.
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                <?php
                                        }
                                ?>
                                <?php        
                                $sql_Fetch_table="SELECT *,(SELECT tbl_enquirycategory.Name FROM tbl_enquirycategory WHERE tbl_enquirycategory.EC_Id=tbl_enquiry.EC_Id) as Category  FROM `tbl_enquiry` WHERE  Status=1;";
                                $result=  mysqli_query($con, $sql_Fetch_table);
                                $count=1;
                                ?>
                                <!--`Enquiry_Id`, `EC_Id`, `Name`, `Contact_No`, `Email`, `Massage`, `Last_Update_Time`-->
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                       <thead>
                                           <tr>
                                               <th class="text-center">#</th>
                                               <th>Name</th>
                                               <th>Category</th>
                                               <th>Contact number</th>
                                               <th>Email</th>
                                               <th>Message</th>
                                               <th>Date/Time</th>
                                               <th class="text-center">Actions</th>
                                           </tr>
                                       </thead>
                                       <tbody>
                               <?php while ($row=$result->fetch_assoc())
                                {          
                                ?>       
                                        <tr>
                                            <td class="text-center"><?php echo $count;?></td>
                                            <td><?php echo $row['Name'];?></td>
                                            <td><?php echo $row['Category'];?></td>
                                            <td><?php echo $row['Contact_No']; ?></td>
                                            <td><?php echo $row['Email']; ?></td>
                                            <td>
                                                <a data-toggle="modal" data-target="#ModelMessageDone<?php echo $row['Enquiry_Id']."11";?>" >
                                                  <?php  if(strlen($row['Message'])>50){echo substr($row['Message'], 0,50).'..';?><i class="fas fa-external-link-alt text-primary"></i><?php }else{echo $row['Message'];} ?>
                                                </a>
                                                <div class="modal fade" id="ModelMessageDone<?php echo $row['Enquiry_Id']."11";?>" tabindex="-1" role="dialog" aria-labelledby="ModelMessageDone<?php echo $row['Enquiry_Id']."11";?>" aria-hidden="true">
                                                  <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                      <div class="modal-header">
                                                        <h5 class="modal-title" id="MessageModalLongTitle">Full Message</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                          <span aria-hidden="true">&times;</span>
                                                        </button>
                                                      </div>
                                                      <div class="modal-body">
                                                        <?php echo $row['Message']; ?>
                                                      </div>
                                                      <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>                                                                                         
                                            </td>
                                            <td><?php echo $row['Last_Update_Time']; ?></td>
                                            <td class="td-actions text-center">
                                                <button type="button" data-toggle="modal" data-target="#ModelDetailsDone<?php echo $row['Enquiry_Id'];?>" rel="tooltip"  class="btn btn-info btn-round">
                                                    <i class="material-icons">person</i>
                                                </button>
                                            </td>
                                            <div class="modal fade" id="ModelDetailsDone<?php echo $row['Enquiry_Id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                              <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <h5 class="modal-title" id="ModelDetailsLable<?php echo $row['Enquiry_Id'];?>">Confirm your input</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                  </div>
                                                  <div class="modal-body">
                                                      <b>Email:</b> <?php echo $row['Email']; ?><a href = "mailto:<?php echo $row['Email']; ?>"> <i class="fas fa-envelope fa-2x r-360"></i></a><hr>
                                                      <b>Phone No:</b> <?php echo $row['Contact_No']; ?><a href = "tel:<?php echo $row['Contact_No']; ?>"> <i class="fas fa-phone fa-2x r-360"></i></a><hr>
                                                      <b>WhatsApp:</b> <?php echo $row['Contact_No']; ?><a href = "https://wa.me/<?php echo $row['Contact_No']; ?>"> <i class="fab fa-whatsapp fa-2x r-360"></i></a>
                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                        </tr>
                                <?php   $count=$count+1;      
                                }
                                ?>
                                       </tbody>
                                   </table>    
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                                <?php $sql_Fetch_table="SELECT *,(SELECT tbl_enquirycategory.Name FROM tbl_enquirycategory WHERE tbl_enquirycategory.EC_Id=tbl_enquiry.EC_Id) as Category FROM `tbl_enquiry` WHERE Status!=1;;";
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
      <!--files required to work notification functionalities-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="js/bootstrap-notify.js" type="text/javascript"></script>
    <script src="js/Notify.js" type="text/javascript"></script>
    <!--files required to work notification functionalities ends-->
    <?php 
    $sql_Fetch_table="SELECT *,(SELECT tbl_enquirycategory.Name FROM tbl_enquirycategory WHERE tbl_enquirycategory.EC_Id=tbl_enquiry.EC_Id) as Category FROM `tbl_enquiry` WHERE Status=2;";
    $result=  mysqli_query($con, $sql_Fetch_table);
    $Nofi_count=0;
    while ($row=$result->fetch_assoc())
    {       

        echo"<script>en('notifications','".$row['Category']."','".$row['Message']."','localhost','_blank','success','light')</script>"; 
        $a=1;
    }
    if(isset($a))
    {
        $sql_done="UPDATE `tbl_enquiry` SET `Status`=0 WHERE`Status`=2";
        $query_done=  mysqli_query($con, $sql_done);
        if ($query_done)
        {
        }
    }

    ?>
    <script>
        $(document).on('click','#Status',function(){
                var status_id= $(this).attr('name');
                $.ajax({
                    type:'GET',
                    url:'Enquiry_Manager.php?cv=1',
                    data:{'status_id':status_id},
                    success: function(data){
                        notify('<i class="fas fa-user-astronaut text-white"></i> &nbsp; <b>Customer Deactivated</b>','warning','top','center')
                     }
                });
            });
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
                    var elementType = this.nodeName;
                    if(elementType=="A")
                    {                        
                        var $ele = $(this).parent().parent().parent();
                    }
                    else
                    {                        
                        var $ele = $(this).parent().parent();
                    }
                    
                    $.ajax({
                        type:'POST',
                        url:'operations/deleteTransport.php',
                        data:{'del_id':del_id},
                        success: function(data){
                             if(data=="Deleted"){
                                $ele.fadeOut().remove();
                                notify('<i class="fas fa-map-marker-alt text-white"></i> &nbsp; <b>Place Data Deleted</b>','success','top','center')
                             }else{
                                notify('<i class="fas fa-map-marker-alt  text-white"></i> &nbsp; <b>Place Data Not Deleted</b> <br>'+data,'warning','top','center')
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