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
  <title>Add Package </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="assets/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="assets/demo/demo.css" rel="stylesheet" />
  
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
          <li class="nav-item active">
              <a class="nav-link" data-toggle="collapse" href="#collapsePackage" aria-expanded="false" aria-controls="collapsePackage">
                <i class="fas fa-cubes"></i>
                <p>Package manager &triangledown;</p>
              </a>
              <div class="collapse" id="collapsePackage">
                <div class="card card-body">
                    <ul class="nav">
                        <li class="nav-item active"><a class="nav-link" href="Add_Package.php"><i class="fas fa-plus"></i> Add Package</a></li>
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
                  <a class="navbar-brand text-gray" href="Package_Manager.php">Package Management</a>/
                  <a class="navbar-brand text-gray-dark" href="Add_Package.php">Add Package</a>
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
                  <a class="dropdown-item" href="logout.php">Log out</a>
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
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Add</h4>
                  <p class="card-category">Package</p>
                </div>
                <div class="card-body">                    
                    <form id="addPackageForm" method="Post">
                      <div class="row">
                          <div class="col-md-4 ml-auto mr-auto">
                            <div class="card">
                                <div class="card-header card-header-image" data-header-animation="true">
                                  <center>
                                      <img id="Preview"  class="img img-fluid rounded" src="img/DEMO.png"  style="max-height: 500px; object-fit:cover;"alt="your image"/>
                                  </center>
                                </div>
                                <div class="card-body">
                                    <div class="card-actions">
                                        <input type="file" required class="btn btn-raised btn-round  faa-vertical animated-hover" name="InputFile" id="InputFile" rel="tooltip" data-placement="bottom" title="upload picture" style="display: inline-block;width: 40px;padding: 40px 0 0 0; height: 40px;overflow: hidden; -webkit-box-sizing: border-box;  -moz-box-sizing: border-box;  box-sizing: border-box;  background: url('img/baseline_add_photo_alternate_white_18dp.png') center center no-repeat #00bcd4;  border-radius: 20px;  background-size: 30px 30px;"/>
                                        <button type="button" class="btn btn-raised btn-round faa-parent animated-hover" id="InputFileReset" rel="tooltip" data-placement="bottom" title="Reset"> 
                                          <i class="material-icons faa-tada">refresh</i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                          </div>
                      </div>
                      <div class="row">
                        <div class="col-md-3">                        
                          <div class="form-group">                          
                                <label class="bmd-label-floating" ><i class="fas fa-signature"></i> Package Name </label>
                                <input type="text" name="package_Name" class="form-control" required>
                          </div>
                        </div>
                        <div class="col-md-3">                        
                          <div class="form-group">                          
                                <label class="bmd-label-floating" ><i class="fas fa-filter"></i> Type </label>
                                <input type="text" name="Type"  class="form-control" required>
                          </div>
                        </div>
                        <div class="col-md-6">                        
                          <div class="form-group">                          
                                <label class="bmd-label-floating" ><i class="fas fa-info"></i> Description </label>
                                <input type="text" name="description"  class="form-control" required>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-3">                                        
                            <div class="form-group ">
                                <label class="bmd-label-floating"><i class="fas fa-flag"></i> Country</label>
                                <select name="country" class="custom-select" id="country-list" onChange="getState(this.value);">
                                    <option value disabled selected>Select Country</option>
                                    <?php
                                    $results=  mysqli_query($con, "SELECT * FROM `tbl_country`;");
                                    foreach($results as $country) {
                                    ?>
                                    <option value="<?php echo $country["Country_Id"]; ?>"><?php echo $country["Name"]; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">                     
                          <div class="form-group">
                              <label class="bmd-label-floating"><i class="fas fa-star"></i> State</label>
                              <select name="state" class="custom-select" id="state-list"  onChange="getCity(this.value);" >
                                  <option value="" disabled selected>Select State</option>
                              </select>
                          </div>
                        </div>
                        <div class="col-md-3">            
                          <div class="form-group">                                
                              <label class="bmd-label-floating"><i class="fas fa-city"></i> City</label>
                              <select  name="city" class="custom-select" id="city-list" onChange="getPlace(this.value);" >
                                  <option value="" disabled selected>Select City</option>
                              </select>
                          </div>
                        </div>          
                        <div class="col-md-3">            
                          <div class="form-group">                                
                              <label class="bmd-label-floating"><i class="fas fa-place-of-worship"></i> Place</label>
                              <select  name="place" class="custom-select" id="place-list"  required>
                                  <option value="" disabled selected>Select Place</option>
                              </select>
                          </div>
                        </div>          
                      </div>                      
                        <div class="row">
                        <div class="col-md-3">                        
                          <div class="form-group">                          
                                <label class="bmd-label-floating" ><i class="fas fa-dollar-sign"></i> Cost </label>
                                <input type="number" name="cost" min="1" class="form-control" required>
                          </div>
                        </div>
                        <div class="col-md-3">                        
                          <div class="form-group">                          
                                <label class="bmd-label-floating" ><i class="fas fa-users"></i> persons </label>
                                <input type="number" name="persons" min="1" class="form-control" required>
                          </div>
                        </div>
                        <div class="col-md-3">                        
                          <div class="form-group">                          
                                <label class="bmd-label-floating" ><i class="fas fa-sun"></i> Days </label>
                                <input type="number" name="days" min="1" class="form-control" required>
                          </div>
                        </div>
                        <div class="col-md-3">                        
                          <div class="form-group">                          
                                <label class="bmd-label-floating" ><i class="fas fa-moon"></i> Nights </label>
                                <input type="number" name="nights" min="0" class="form-control" required>
                          </div>
                        </div>
                      </div>   
                        <button type='submit' class="btn  pull-right btn-primary" type="submit" name="btn_Add">Add <i class="fas fa-plus"></i></button>
                    </form>
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
    function readURL(input) {

      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
          $('#Preview').attr('src', e.target.result);
          $('#InputFile').css('background-color','#2196f3');
          $('#InputFileReset').css('background-color','#e91e63');
        }
        reader.readAsDataURL(input.files[0]);
      }
    }

    $("#InputFile").change(function() {
      readURL(this);
    });
    $("#InputFileReset").click(function() {
        $('#Preview').attr('src', 'img/DEMO.png');
        $("html, body").animate({scrollTop: 0}, 1000);
        $('#InputFile').css('background-color','#00bcd4');
        $('#InputFileReset').css('background-color','#999999');
    });
    
    </script>
   
    <script>
    $(document).ready(function (){
        $("#addPackageForm").validate({
            rules:{
                InputFile:{
                    required:true
                },
                package_Name:{
                    required:true,
                    minlength:3,
                    maxlength:50
                },
                Type:{
                    required:true,
                    minlength:3,
                    maxlength:50
                },
                description:{
                    required:true,
                    minlength:3,
                    maxlength:500
                },
                place:{
                    required:true
                },
                cost:{
                    required:true,
                    number:true
                },
                persons:{
                    required:true,
                    number:true
                },
                days:{
                    required:true,
                    number:true
                },
                nights:{
                    required:true,
                    number:true
                }
            },
            messages:{
                InputFile:{
                    required:"<small class='badge badge-danger badge-pill'>required<small>"
                },
                package_Name:{
                    required:"<small class='text-danger'>place name required<small>",
                    minlength:"<small class='text-danger'>palce name must be minimum 6 charector long<small>",
                    maxlength:"<small class='text-danger'>palce name can be maximum 50 charector long<small>"
                },
                Type:{
                    required:"<small class='text-danger'>type required<small>",
                    minlength:"<small class='text-danger'>type must be minimum 6 charector long<small>",
                    maxlength:"<small class='text-danger'>type can be maximum 50 charector long<small>"
                },
                description:{
                    required:"<small class='text-danger'>Description required<small>",
                    minlength:"<small class='text-danger'>Description must be minimum 6 charector long<small>",
                    maxlength:"<small class='text-danger'>Description can be maximum 50 charector long<small>"
                },
                place:{
                    required:"<small class='text-danger'>place required<small>"
                },
                cost:{
                    required:"<small class='text-danger'>cost required<small>",
                    number:"<small class='text-danger'>must be number<small>"
                },
                persons:{
                    required:"<small class='text-danger'>persons required<small>",
                    number:"<small class='text-danger'>must be number<small>"
                },
                days:{
                    required:"<small class='text-danger'>days required<small>",
                    number:"<small class='text-danger'>must be number<small>"
                },
                nights:{
                    required:"<small class='text-danger'>nights required<small>",
                    number:"<small class='text-danger'>must be number<small>"
                }
            },
            submitHandler:subform

        });
        function subform(){
            
        }
        $("#addPackageForm").on('submit',(function(e) {
            e.preventDefault();
            // Get form
            var form = $('#addPackageForm')[0];

            // Create an FormData object 
            var data = new FormData(form);

            $.ajax({
                type: "POST",
                enctype: 'multipart/form-data',
                url: "operations/addPackage.php",
                data:  data,
                processData:false,
                contentType: false,
                cache: false,
                timeout: 600000,
                beforeSend : function()
                {
                    $("#btn_Add").html("Uploading &nbsp; <i class='fas fa-spinner fa-spin'>");
                },
                success: function (resp) {
                    if(resp=="ok"){
                        $("#btn_Add").fadeIn(1000,function (){
                            $("#btn_Add").html("Add Package");
                        })
                        notify('Uploaded','success','top','center');  
                    }                        
                    else if(resp=="no"){
                        $("#btn_Add").fadeIn(1000,function (){
                            $("#btn_Add").html("Add Package");
                        })
                        notify('Failed: make sure description conatain valid charactors','danger','top','center');
                    }                          
                    else if(resp=="Invalid"){
                        $("#btn_Add").fadeIn(1000,function (){
                            $("#btn_Add").html("Add Package");
                        })
                        notify('Invalid Image file:','warning','top','center');
                    }                          
                    else if(resp=="empty"){
                        $("#btn_Add").fadeIn(1000,function (){
                            $("#btn_Add").html("Add Package");
                        })
                        notify('Please fill all required fields','warning','top','center');
                    }                          
                    else if(resp=="exist"){
                        $("#btn_Add").fadeIn(1000,function (){
                            $("#btn_Add").html("Add Package");
                        })
                        notify('This Package is already exist','warning','top','center');
                    }                          
                    else 
                    {
                        $("#btn_Add").fadeIn(1000,function (){
                            $("#btn_Add").html("Add Package");
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