<?php 
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
  <title>
    Admin
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="assets/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="assets/demo/demo.css" rel="stylesheet" />
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

  
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
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
          <li class="nav-item active">
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
                  <a class="navbar-brand text-gray-dark" href="Admin.php">Dashboard</a>
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
                    <a class="dropdown-item " href="Enquiry_Manager.php">  <span class="notification"> <?php echo $Nofi_count; ?> </span> New enquiry request </a><?php } ?>
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
                    <a class="dropdown-item" href="profile.php">Profile</a>
                    <a class="dropdown-item" href="settings.php">Settings</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="?logout=yes">Log out</a>
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
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">person</i>
                  </div>
                  <p class="card-category">Total Users</p>
                  <h3 class="card-title">100
                    <small>K</small>
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons text-danger">link</i>
                    <a href="#">View Users</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">search</i>
                  </div>
                  <p class="card-category">Visits</p>
                  <h3 class="card-title">10.2
                      <small>K</small>
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">date_range</i> Last 1 Month
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">info_outline</i>
                  </div>
                  <p class="card-category">Bookings</p>
                  <h3 class="card-title">53</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">date_range</i> Last 1 Day
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="fa fa-user-plus"></i>
                  </div>
                  <p class="card-category">New Users</p>
                  <h3 class="card-title">+245</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">update</i> Just Updated
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="card card-chart">
                <div class="card-header card-header-success">
                  <div class="ct-chart" id="dailySignUpChart"></div>
                </div>
                <div class="card-body">
                  <h4 class="card-title">Weekly registrations</h4>
                  <p class="card-category">
                  <p class="card-category">Last 7 days Performance</p>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">access_time</i> updated 4 minutes ago
                  </div>
                </div>
              </div>
            </div>            
            <div class="col-md-4">
              <div class="card card-chart">
                <div class="card-header card-header-primary">
                  <div class="ct-chart" id="DailyCollectionChart"></div>
                </div>
                <div class="card-body">
                  <h4 class="card-title">Daily Collection</h4>
                  <p class="card-category">
                  <p class="card-category">Last 7 days Performance</p>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">access_time</i> updated 4 minutes ago
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-chart">
                <div class="card-header card-header-warning">
                  <div class="ct-chart" id="websiteViewsChart"></div>
                </div>
                <div class="card-body">
                  <h4 class="card-title">User Subscriptions</h4>
                  <p class="card-category">Last Campaign Performance</p>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">access_time</i> updated 4 minutes ago
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <script type="text/javascript">
              google.charts.load('current', {
                'packages':['geochart'],
                // Note: you will need to get a mapsApiKey for your project.
                // See: https://developers.google.com/chart/interactive/docs/basic_load_libs#load-settings
                'mapsApiKey': 'AIzaSyD-9tSrke72PouQMnMX-a7eZSW0jkFMBWY'
              });
              google.charts.setOnLoadCallback(drawRegionsMap);

              function drawRegionsMap() {
                var data = google.visualization.arrayToDataTable([
                  ['Country', 'Users']
          <?php
            $sql="SELECT tbl_country.Name as Name, COUNT(*) AS Number FROM tbl_user INNER JOIN tbl_country ON tbl_user.Country_Id= tbl_country.Country_Id GROUP BY tbl_country.Name ORDER BY tbl_country.Name";
            $result=  mysqli_query($con, $sql);
            while ($row=$result->fetch_assoc())
            {                           
                $CountryName=$row['Name'];
                $UserCount=$row['Number'];
                echo ",[' $CountryName',  $UserCount]";
            }
            ?>
                ]);

                var options = {
                      colorAxis: {colors: ['#9c27b0', 'black', '#e91e63']},
                  backgroundColor: '#fffff',
                  datalessRegionColor: '#fafafa',
                  defaultColor: '#f5f5f5'
                };

                var chart = new google.visualization.GeoChart(document.getElementById('regions_div'));

                chart.draw(data, options);
              }
            </script>
            <div class="col-md-6">
              <div class="card card-chart">
                <div class="card-header card-header-success">
                    <div id="regions_div" style="width: 100%; height: 100%;"></div>
                </div>
                <div class="card-body">
                  <h4 class="card-title">Users from country</h4>
                  <p class="card-category">Last Campaign Performance</p>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">access_time</i> updated 4 minutes ago
                  </div>
                </div>
              </div>
            </div>
            <script type="text/javascript">
              google.charts.load('current', {
                'packages':['geochart'],
                // Note: you will need to get a mapsApiKey for your project.
                // See: https://developers.google.com/chart/interactive/docs/basic_load_libs#load-settings
                'mapsApiKey': 'AIzaSyD-9tSrke72PouQMnMX-a7eZSW0jkFMBWY'
              });
              google.charts.setOnLoadCallback(drawRegionsMap);

              function drawRegionsMap() {
                var data = google.visualization.arrayToDataTable([
                  ['Country',   'Tourist places']
            <?php
              $sql="SELECT COUNT(*) as Count, (SELECT tbl_country.Name FROM tbl_country WHERE tbl_country.Country_Id=(SELECT tbl_state.Country_Id FROM tbl_state WHERE tbl_state.State_Id=(SELECT tbl_city.State_Id FROM tbl_city WHERE tbl_place.City_Id=tbl_city.City_Id))) as Country FROM `tbl_place` GROUP by  (SELECT tbl_country.Name FROM tbl_country WHERE tbl_country.Country_Id=(SELECT tbl_state.Country_Id FROM tbl_state WHERE tbl_state.State_Id=(SELECT tbl_city.State_Id FROM tbl_city WHERE tbl_place.City_Id=tbl_city.City_Id)))";
              $result=  mysqli_query($con, $sql);
              while ($row=$result->fetch_assoc())
              {                           
                  $CountryName=$row['Country'];
                  $PlaceCount=$row['Count'];
                  echo ",[' $CountryName',  $PlaceCount]";
              }
              ?>
                ]);

                var options = {
                  region: '142', // Asia
                  colorAxis: {colors: ['#9c27b0', 'black', '#e91e63']},
                  backgroundColor: '#00acc1',
                  datalessRegionColor: '#fafafa',
                  defaultColor: '#f5f5f5'
                };

                var chart = new google.visualization.GeoChart(document.getElementById('geochart-colors'));
                chart.draw(data, options);
              };
            </script>
            <div class="col-md-6">
              <div class="card card-chart">
                <div class="card-header card-header-info">
                    <div id="geochart-colors" style="width: 100%; height: 100%;"></div>
                </div>
                <div class="card-body">
                  <h4 class="card-title">Tourist places</h4>
                  <p class="card-category">Last Campaign Performance</p>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">access_time</i> updated 4 minutes ago
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <?php
              $sql="SELECT Max((SELECT COUNT(`Gender`) FROM `tbl_user` WHERE `Gender`=1)) AS Male,MAX((SELECT COUNT(`Gender`) FROM `tbl_user` WHERE `Gender`=0)) AS Female FROM `tbl_user`";
              $result=  mysqli_query($con, $sql);
              while ($row=$result->fetch_assoc())
              {                           
                  $male=$row['Male'];
                  $Female=$row['Female'];
              }
              ?>
            <script type="text/javascript">
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);

            // Draw the chart and set the chart values
            function drawChart() {
              var data = google.visualization.arrayToDataTable([
              ['registered', 'Till Now'],
              ['Male', <?php echo $male;?>],
              ['Female',<?php echo $Female;?>]
            ]);

              // Optional; add a title and set the width and height of the chart
              var options = {'title':'registered audiences', 'width':325, 'height':200};

              // Display the chart inside the <div> element with id="piechart"
              var chart = new google.visualization.PieChart(document.getElementById('piechart'));
              chart.draw(data, options);
            }
            </script>
            <div class="col-md-4">
              <div class="card card-chart">
                <div class="card-header card-header-warning">
                    <div id="piechart"></div>
                </div>
                <div class="card-body">
                  <h4 class="card-title">User count with gender</h4>
                  <p class="card-category">Last Campaign Performance</p>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">access_time</i> updated 4 minutes ago
                  </div>
                </div>
              </div>
            </div>
            <!-- markup -->
            <div class="col-md-4">
              <div class="card card-chart">
                <div class="card-header card-header-danger">
                  <div class="ct-chart" id="completedTasksChart"></div>
                </div>
                <div class="card-body">
                  <h4 class="card-title">Completed Trips</h4>
                  <p class="card-category"><span class="text-danger"><i class="fa fa-arrow-down"></i> 5% </span> decrease in today's Bookings.</p>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">access_time</i> updated 4 minutes ago
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-chart">
                <div class="card-header card-header-danger">
                  <div class="ct-chart" id="completedTasksChart"></div>
                </div>
                <div class="card-body">
                  <h4 class="card-title">Completed Trips</h4>
                  <p class="card-category"><span class="text-danger"><i class="fa fa-arrow-down"></i> 5% </span> decrease in today's Bookings.</p>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">access_time</i> updated 4 minutes ago
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6 col-md-12">
              <div class="card">
                <div class="card-header card-header-tabs card-header-primary">
                  <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper">
                      <span class="nav-tabs-title">Joining Requests:</span>
                      <ul class="nav nav-tabs" data-tabs="tabs">
                        <li class="nav-item">
                          <a class="nav-link active" href="#employee" data-toggle="tab">
                            <i class="material-icons">person+</i> Employee
                            <div class="ripple-container"></div>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#guide" data-toggle="tab">
                            <i class="material-icons">person+</i> Guide
                            <div class="ripple-container"></div>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="tab-content">
                    <div class="tab-pane active" id="employee">
                      <table class="table">
                        <tbody>
                          <tr>
                            <td>
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input class="form-check-input" type="checkbox" value="">
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </td>
                            <td>Sagarkuamr Bharatbhai Chauhan</td>
                            <td class="td-actions text-right">
                              <button type="button" rel="tooltip" title="View Details" class="btn btn-link btn-link btn-sm">
                                <i class="material-icons">library_books</i>
                              </button>
                              <button type="button" rel="tooltip" title="Accept" class="btn btn-success btn-link btn-sm">
                                <i class="material-icons">check</i>
                              </button>
                              <button type="button" rel="tooltip" title="Reject" class="btn btn-danger btn-link btn-sm">
                                <i class="material-icons">close</i>
                              </button>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <div class="tab-pane" id="guide">
                      <table class="table">
                        <tbody>
                          <tr>
                            <td>
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input class="form-check-input" type="checkbox" value="">
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </td>
                            <td>Rinam Rajendra Panchal</td>
                            <td class="td-actions text-right">
                              <button type="button" rel="tooltip" title="View Details" class="btn btn-link btn-link btn-sm">
                                <i class="material-icons">library_books</i>
                              </button>
                              <button type="button" rel="tooltip" title="Accept" class="btn btn-success btn-link btn-sm">
                                <i class="material-icons fa-spin">check</i>
                              </button>
                              <button type="button" rel="tooltip" title="Reject" class="btn btn-danger btn-link btn-sm">
                                <i class="material-icons">close</i>
                              </button>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-12">
              <div class="card">
                <div class="card-header card-header-warning">
                  <h4 class="card-title">Employees Stats</h4>
                  <p class="card-category">New employees </p>
                </div>
                <div class="card-body table-responsive">
                  <table class="table table-hover">
                    <thead class="text-warning">
                      <th>ID</th>
                      <th>Name</th>
                      <th>Salary</th>
                      <th>Country</th>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td>Sagar Chauhan</td>
                        <td>20,000 Rs</td>
                        <td>India</td>
                      </tr>
                    </tbody>
                  </table>
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
              <li>
                <a href="index.php">
                  Trip and Turn
                </a>
              </li>
              <li>
                  <a href="index.php">
                  About Us
                </a>
              </li>
            </ul>
          </nav>
          <div class="copyright float-right">
            &copy;
            <script>
              document.write(new Date().getFullYear())
            </script>, Planning Journey with <i class="material-icons">favorite</i> by
            <a href="index.php" target="_blank">Trip and Turn</a> Tours and Travelers.
          </div>
        </div>
      </footer>
    </div>
  </div>
  <?php require_once './Script_links.php';?> <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <?php 
    $sql_Fetch_table="SELECT *,(SELECT tbl_enquirycategory.Name FROM tbl_enquirycategory WHERE tbl_enquirycategory.EC_Id=tbl_enquiry.EC_Id) as Category FROM `tbl_enquiry` WHERE Status=2;";
    $result=  mysqli_query($con, $sql_Fetch_table);
    $Nofi_count=0;
    while ($row=$result->fetch_assoc())
    {                           
        echo"<script>en('notifications','".$row['Category']."','".$row['Message']."','localhost','_blank','success','light')</script>"; 
    }
    ?>
    <?php 
    $sql="SELECT COUNT(*) as count,DAYOFWEEK(`Registration_Date`) Day FROM `tbl_user` WHERE  (`Registration_Date` BETWEEN SUBDATE(`Registration_Date`, INTERVAL 7 DAY) AND NOW() ) GROUP by DAYOFWEEK(`Registration_Date`)";
    $result=  mysqli_query($con, $sql);
    $d1=0;
    $d2=0;
    $d3=0;
    $d4=0;
    $d5=0;
    $d6=0;
    $d7=0;
    
    while ($row=$result->fetch_assoc())
    {                           
        if($row['Day']==1)
        {
            $d1= $row['count'];
        }
        if($row['Day']==2)
        {
            $d2= $row['count'];
        }
                         
        if($row['Day']==3)
        {
            $d3= $row['count'];
        }

        if($row['Day']==4)
        {
            $d4= $row['count'];
        }
        if($row['Day']==5)
        {
            $d5= $row['count'];
        }
        if($row['Day']==6)
        {
            $d6= $row['count'];
        }

        if($row['Day']==7)
        {
            $d7= $row['count'];
        }
    }
    ?>
  <script>
      dataDailySalesChart = {
        labels: ['M', 'T', 'W', 'T', 'F', 'S', 'S'],
        series: [ [
        <?php
        echo"$d1,$d2,$d3,$d4,$d5,$d6,$d7";
        ?>
         ]
        ]
      };

      optionsDailySalesChart = {
        lineSmooth: Chartist.Interpolation.cardinal({
          tension: 0
        }),
        low: 0,
        high: 50, 
        chartPadding: {
          top: 0,
          right: 0,
          bottom: 0,
          left: 0
        },
      }

      var dailySignUpChart = new Chartist.Line('#dailySignUpChart', dataDailySalesChart, optionsDailySalesChart);

      var animationHeaderChart = new Chartist.Line('#websiteViewsChart', dataDailySalesChart, optionsDailySalesChart);

  </script>
  
     <?php 
    $sql_Fetch_table="SELECT *,(SELECT tbl_enquirycategory.Name FROM tbl_enquirycategory WHERE tbl_enquirycategory.EC_Id=tbl_enquiry.EC_Id) as Category FROM `tbl_enquiry` WHERE Status=2;";
    $result=  mysqli_query($con, $sql_Fetch_table);
    $Nofi_count=0;
    while ($row=$result->fetch_assoc())
    {                           
        echo"<script>en('notifications','".$row['Category']."','".$row['Message']."','localhost','_blank','success','light')</script>"; 
    }
    ?>
    <?php 
    $sql="SELECT COUNT(*) as count,SUM(`Amount`)as Collection,DAYOFWEEK(`Last_Update_Time`) Day FROM tbl_payment  WHERE  (`Last_Update_Time` BETWEEN SUBDATE(`Last_Update_Time`, INTERVAL 7 DAY) AND NOW() ) GROUP by DAYOFWEEK(`Last_Update_Time`)";
    $result=  mysqli_query($con, $sql);
    $d1=0;
    $d2=0;
    $d3=0;
    $d4=0;
    $d5=0;
    $d6=0;
    $d7=0;
    
    while ($row=$result->fetch_assoc())
    {                           
        if($row['Day']==1)
        {
            $d1= $row['Collection'];
        }
        if($row['Day']==2)
        {
            $d2= $row['Collection'];
        }
                         
        if($row['Day']==3)
        {
            $d3= $row['Collection'];
        }

        if($row['Day']==4)
        {
            $d4= $row['Collection'];
        }
        if($row['Day']==5)
        {
            $d5= $row['Collection'];
        }
        if($row['Day']==6)
        {
            $d6= $row['Collection'];
        }

        if($row['Day']==7)
        {
            $d7= $row['Collection'];
        }
    }
    ?>
  <script>
      dataDailyCollectionChart = {
        labels: ['M', 'T', 'W', 'T', 'F', 'S', 'S'],
        series: [ [
        <?php
        echo"$d1,$d2,$d3,$d4,$d5,$d6,$d7";
        ?>
         ]
        ]
      };

      optionsDailyCollectionChart = {
        lineSmooth: Chartist.Interpolation.cardinal({
          tension: 0
        }),
        low: 0,
        high: 200000, 
        chartPadding: {
          top: 0,
          right: 0,
          bottom: 0,
          left: 20
        },
      }

      var dailySignUpChart = new Chartist.Line('#DailyCollectionChart', dataDailyCollectionChart, optionsDailyCollectionChart);

      var animationHeaderChart = new Chartist.Line('#DailyCollectionChart', dataDailyCollectionChart, optionsDailyCollectionChart);

  </script>
</body>
</html>
