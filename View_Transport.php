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
  <title>View Place</title>
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

  <script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
  <script>
    function showUser(str) {
      if (str=="") {
        document.getElementById("result").innerHTML="<b>Search</b> Tansport using name <br><i class='material-icons faa-tada animated'>search</i> ";
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
      xmlhttp.open("GET","operations/getTransport.php?<?php if (isset($_GET['t'])){ echo 't=1'; } ?>&q="+str,true);
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
          <li class="nav-item active">
              <a class="nav-link" data-toggle="collapse" href="#collapseTransportation" aria-expanded="false" aria-controls="collapseTransportation">
             <i class="fas fa-car"></i>
                <p>Transportation manager &triangledown;</p>
              </a>
              <div class="collapse" id="collapseTransportation">
                <div class="card card-body">
                    <ul class="nav">
                        <li class="nav-item"><a class="nav-link" href="Add_Transport.php"><i class="fas fa-plus"></i> Add Transport</a></li>
                        <li class="nav-item"><a class="nav-link" href="Update_Transport.php"><i class="fas fa-pencil-alt"></i> Update Transport</a></li>
                        <li class="nav-item active"><a class="nav-link" href="View_Transport.php"><i class="fas fa-eye"></i> View Transport</a></li>
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
                  <a class="navbar-brand text-gray" href="Transport_Manager.php">Transport Management</a>/
                  <a class="navbar-brand text-gray-dark" href="View_Transport.php">View Transport</a>
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
                                              <p class="card-category">Transport</p>
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
                                    $sql="SELECT * FROM `tbl_vehicle` limit $page,5;";
                                    $result = mysqli_query($con,$sql);

                                    $count=1;

                                  ?>
                                      <div class="table-responsive">
                                      <table class="table table-hover">
                                         <thead>
                                             <tr>
                                                 <th class="text-center">#</th>
                                                 <th>Name</th>
                                                 <th>Company</th>
                                                 <th>Model</th>
                                                 <th>Type</th>
                                                 <th>Cost</th>
                                                 <th class="hid">Last Update</th>
                                                 <th class="text-center" colspan="4">Actions</th>
                                             </tr>
                                         </thead>
                                         <tbody>
                                 <?php 
                                    while($row = mysqli_fetch_array($result)) 
                                   {
                                                    $Vehicle_Id=$row['Vehicle_Id'];
                                                    $Company=$row['Company'];
                                                    $Name=$row['Name'];
                                                    $Model=$row['Model'];
                                                    $Trans_Type_Id=$row['Trans_Type_Id'];
                                                    $Cost_Per_KM=$row['Cost_Per_KM'];
                                                    $Last_Update_Time=$row['Last_Update_Time'];
                                  ?>       
                                             <tr>
                                                <td><?php echo $Vehicle_Id;?></td>
                                                <td><?php echo $row['Company'];?></td>
                                                <td><?php echo $row['Name'];?></td>
                                                <td><?php echo $row['Model'];?></td>
                                                <td><?php echo $row['Trans_Type_Id'];?></td>
                                                <td><?php echo $row['Cost_Per_KM'];?></td>
                                                <td class="hid"><?php echo $row['Last_Update_Time']; ?></td>
                                                 <td class="td-actions text-center" style="display: table-cell">
                                                     <button type="button"  data-toggle="modal"  data-target="#previewModel<?php echo $Vehicle_Id; ?>" class="btn btn-info btn-round">
                                                         <i class="material-icons">subject</i>
                                                     </button>
                                                 </td>
                                                 <?php
                                                    echo '<div class="modal fade" id="previewModel'.$Vehicle_Id.'" tabindex="-1" role="dialog">
                                                        <div class="modal-dialog" role="document">
                                                          <div class="modal-content">
                                                            <div class="card card-plain">
                                                              <div class="modal-body">
                                                                  <div class="card card-blog" style="margin-bottom: -30px;margin-top: -30px;">
                                                                      <div class="card-header card-header-image" >
                                                                          <a href="#pablo">
                                                                              <img class="img" src="img/car-511316.jpg">
                                                                              <div class="card-title">
                                                                                  <i class="fas fa-map-marker-alt"></i> ' .$Company.' ('. $Name .')
                                                                              </div>
                                                                          </a>
                                                                      </div>
                                                                      <div class="card-body text-center">
                                                                          <h6 class="card-category text-info"><i class="fas fa-location-arrow"></i> '. $Model.'</h6>
                                                                          <h3 class="card-category text-info"> &#x20B9; '. $Cost_Per_KM.' per km</h3>
                                                                          <p class="card-description">
                                                                          '. $Trans_Type_Id.'
                                                                          </p>
                                                                      </div>
                                                                      <div class="card-footer border-top">
                                                                           <i class="fas fa-history m-auto ">'.$Last_Update_Time.'</i>
                                                                      </div>
                                                                  </div>
                                                              </div>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </div>';
                                                ?>
                                                 <td class="td-actions text-center" style="display: table-cell">
                                                     <a href="Update_Transport.php?fetch=<?php echo $Vehicle_Id;?>" rel="tooltip"  data-toglace.phpgle='tooltip' data-placement='left' title='Update' class="btn btn-success btn-round text-white"  target='_blank'>
                                                         <i class="material-icons">edit</i>
                                                     </a>
                                                 </td>
                                                 <td class="td-actions text-center" style="display: table-cell">
                                                     <button rel="tooltip" data-toggle="tooltip" title="delete" name="btn_del_place" id="<?php echo $Vehicle_Id;?>" class="btn btn-danger btn-round trash">
                                                              <i class="material-icons">close</i>
                                                     </button>
                                                 </td>
                                             </tr>
                                  <?php   $count=$count+1;      
                                  }
                                  ?>
                                         </tbody>
                                     </table>    
                                     </div>
                                  </div>
                                  <div class="card-footer">
                                <?php $sql_Fetch_table="SELECT * FROM `tbl_vehicle` ;";
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
                                                    <a href="?<?php if (!isset($_GET['t'])){ echo 't'; } ?> " class="btn <?php if (isset($_GET['t'])){ echo 'btn-info'; } ?> btn-just-icon btn-fill btn-round ml-5" rel="tooltip" title="<?php if (isset($_GET['t'])){ echo 'Table view'; }else{ echo 'Card view'; } ?>">
                                                        <?php if (!isset($_GET['t'])){ echo '<i class="material-icons">account_box</i>'; }  else { echo '<i class="material-icons">format_align_justify</i>'; } ?> 
                                                    </a>
                                            </div>
                                      </div>
                                      <div class="card-body text-center">
                                            <div id="result"><b>Search</b>  transport using name <br><i class="material-icons faa-tada animated">search</i> </div>
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