<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/Logos/Tt-paper-plane.png">
    <link rel="icon" type="image/png" href="assets/img/Logos/Tt-paper-plane.png">
    <title>Register - Trip and Turn</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- CSS Files -->
    <link href="paper-kit/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="paper-kit/assets/css/paper-bootstrap-wizard.css" rel="stylesheet" />
    <link href="paper-kit/assets/css/demo.css" rel="stylesheet" type="text/css"/>
    <!-- Fonts and Icons -->
    <link href="https://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="paper-kit/assets/css/themify-icons.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Aclonica' rel='stylesheet'>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="assets/font-awesome-animation/font-awesome-animation.min.css" rel="stylesheet" type="text/css"/>
    <style>
        .font-family-Aclonica{
            font-family: 'Aclonica';font-size: 22px;
        }
    </style>
    <!-- End Google Tag Manager -->
    </head>
    <body>
            <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <div class="image-container set-full-height" style="background-image: url('paper-kit/assets/img/paper-1.jpeg')">
	    <a href="https://creative-tim.com">
	         <div class="logo-container">
                    <div class="logo">
                        <img src="assets/img/TT-LOGO-ICON.png" style="margin-left:-10px;">
                    </div>
                    <div class="brand font-family-Aclonica">
                        Trip & Turn
                    </div>
	        </div>
	    </a>
        <a href="index.php" class="made-with-pk">
            <div class="brand">TT</div>
            <div class="made-with">Trip & Turn <strong>Tours and Travels</strong></div>
        </a>

        <!--   Big container   -->
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
                    <!--      Wizard container        -->
                    <div class="wizard-container">
                        <div class="card wizard-card" data-color="blue" id="wizardProfile">
                                <div class="wizard-header text-center">
                                    <h3 class="wizard-title">Register</h3>
                                    <p class="category">Your profile with trip and turn</p>
                                    <div id="info"></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-10 col-sm-offset-1">
                                        <br>
                                        <div class="card-header card-header-info text-center">
                                          <div class="social-line">
                                            <a href="" class="btn btn-just-icon btn-link">
                                              <i class="fab fa-facebook-square"></i>
                                            </a>
                                            <a href="" class="btn btn-just-icon btn-link">
                                              <i class="fab fa-twitter"></i>
                                            </a>
                                            <a href="" class="btn btn-just-icon btn-link">
                                              <i class="fab fa-google-plus"></i>
                                            </a>
                                          </div>
                                        </div> 
                                        <br>
                                    </div>
                                    <form id="FormReg_1" method="Post">
                                    <div class="col-sm-3 col-sm-offset-1">
                                        <div class="form-group">
                                            <label>First Name <small>(required)</small></label>
                                            <input name="firstname" type="text" class="form-control" placeholder="your firstname..." >
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Middle Name <small>(required)</small></label>
                                            <input name="middlename" type="text" class="form-control" placeholder="your middlename...">
                                        </div>
                                    </div>
                                    <div class="col-sm-4" style="padding-right: 15px;">
                                        <div class="form-group">
                                            <label>Last Name <small>(required)</small></label>
                                            <input name="lastname" type="text" class="form-control" placeholder="your lastname...">
                                        </div>
                                    </div>
                                    <div class="col-sm-10 col-sm-offset-1">
                                        <div class="form-group">
                                            <label>Email <small>(required)</small></label>
                                            <input name="email" type="email" class="form-control" placeholder="example@abc.com">
                                        </div>
                                    </div>
                                    <div class="col-sm-10 col-sm-offset-1">
                                        <div class="form-group">
                                            <label>Contact number <small>(required)</small></label>
                                            <input name="contact" type="text" class="form-control" placeholder="Contact number">
                                        </div>
                                    </div>
                                    <div class="col-sm-10 col-sm-offset-1">
                                        <div class="form-group">
                                            <button type="submit" name="btn_send" id='btn_send' class='btn btn-success btn-wd'>send OTP</button>    
                                        </div>
                                    </div>
                                    </form>
                                </div>
                                    </div>
                                </div>
                        </div>
                    </div> <!-- wizard container -->
                </div>
            </div><!-- end row -->

        <div class="footer">
            <div class="container text-center">
                &copy; 
                <script>
                  document.write(new Date().getFullYear())
                </script>
                <a href="index.php" target="_blank">Trip and Turn</a>	        
            </div>
        </div>
    </div>

</body>
    <!--   Core JS Files   -->
    <script src="paper-kit/assets/js/jquery-2.2.4.min.js" type="text/javascript"></script>
    <script src="paper-kit/assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="paper-kit/assets/js/jquery.bootstrap.wizard.js" type="text/javascript"></script>

    <!--  Plugin for the Wizard -->
    <script src="paper-kit/assets/js/demo.js" type="text/javascript"></script>
    <script src="paper-kit/assets/js/paper-bootstrap-wizard.js" type="text/javascript"></script>

    <!--  More information about jquery.validate here: https://jqueryvalidation.org/	 -->
    <!--<script src="paper-kit/assets/js/jquery.validate.min.js" type="text/javascript"></script>-->

<!--    Content required to use jquery validation in system 
    Note: you must have to include jQuary file or CDN before this-->
    <style>
        .notification-error {
            position: absolute;
            top: 40px;
            font-weight: normal;
            font-style: italic;
            right: -18px;
            background: linear-gradient(0deg, rgba(244,67,54,1) 0%, rgba(250,82,70,1) 40%, rgba(255,134,123,1) 80%, rgba(244,67,54,1) 100%);
            min-width: 20px;
            padding: 0px 7px;
            height: 20px;
            border-radius: 10px;
            text-align: center;
            line-height: 19px;
            vertical-align: middle;
            display: block;
            box-shadow:  0.2px 0.5px 3px black;
        }
    </style>
    <script src="jquery-validation-1.19.0/dist/jquery.validate.js" type="text/javascript"></script>
    <!--Ajax Login ends-->
        <script>
            $(document).ready(function (){
                $("#FormReg_1").validate({
                    rules:{
                        firstname: {
                                required: true,
                                minlength: 3
                        },
                        middlename: {
                                required: true,
                                minlength: 3
                        },
                        lastname: {
                                required: true,
                                minlength: 3
                        },
                        email: {
                                required: true,
                                email: true
                        },
                        contact: {
                                required: true
                        }
                    },
                    messages:{
                        firstname: {
                                required: "<p class='text-danger mr-2 mt-3'>&larr; &#9888;<p><span class='notification-error'>&#9888; Please enter a firstname</span>",
                                minlength: "<p class='text-danger mr-2 mt-3'>&larr; &#9888;<p><span class='notification-error'>&#9888; Your username must consist of at least 3 characters </span>"
                        }
,
                        middlename: {
                                required: "<p class='text-danger mr-2 mt-3'>&larr; &#9888;<p><span class='notification-error'>&#9888; Please enter a firstname</span>",
                                minlength: "ss"
                        },
                        lastname: {
                                required: "<p class='text-danger mr-2 mt-3'>&larr; &#9888;<p><span class='notification-error'>&#9888; Please enter a firstname</span>",
                                minlength: "ds"
                        },
                        email: {
                                required: "<p class='text-danger mr-2 mt-3'>&larr; &#9888;<p><span class='notification-error'>&#9888; Please enter a firstname</span>",
                                email: "dsdd"
                        },
                        contact: {
                                required: "<p class='text-danger mr-2 mt-3'>&larr; &#9888;<p><span class='notification-error'>&#9888; Please enter a firstname</span>",
                        }
                    },
                    submitHandler:subform
                    
                })
                function subform(){
                    var data =$("#FormReg_1").serialize();
                    $.ajax({
                        type: 'POST',
                        url: "sendEmail.php",
                        data: data,
                        beforeSend: function () {
                            $("#info").fadeOut();
                            $("#btn_send").html("Sending...");
                        },
                        success: function (resp) {
                            if(resp=="ok"){
                                $("#btn_send").html("<i class='fas fa-spinner fa-spin'></i> &nbsp; Login");
                                setTimeout('window.location.href="deshbord.php";',4000);
                            }
                            else
                            {
                                $("#info").fadeIn(1000,function (){
                                    $("#info").html("<div class='alert alert-danger'>"+resp+"</div>");
                                    $("#btn_send").html('login');
                                })
                            }
                        }
                    })
                }
            })
        </script>
</html>
