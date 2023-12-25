<?php
if(!isset($_COOKIE['admin_id']))
{
    ?><script type="text/javascript">location.replace("login.php?login_first=1");</script><?php
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Create User | Fashion </title>
    <link rel="icon" type="image/x-icon" href="../../assets/img/favicon.png"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="../../css/font.css" rel="stylesheet">
    <link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../../assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <link href="../../assets/css/loader.css" rel="stylesheet" type="text/css" />
    <script src="../../assets/js/loader.js"></script>
    <!-- END GLOBAL MANDATORY STYLES -->

    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link rel="stylesheet" type="text/css" href="../../plugins/dropify/dropify.min.css">
    <link href="../../assets/css/users/account-setting.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="../../assets/css/forms/switches.css">
    <link href="../../plugins/notification/snackbar/snackbar.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="../../assets/css/forms/theme-checkbox-radio.css">
    <!--  END CUSTOM STYLE FILE  -->
</head>
<body>
    <div id="load_screen"> <div class="loader"> <div class="loaer-contdent">
        <div class="spinner-grow align-self-center"></div>
    </div></div></div>
    <?php
        include_once 'header.php';
    ?>
    <!--  BEGIN NAVBAR  -->
    <div class="sub-header-container">
        <header class="header navbar navbar-expand-sm">
            <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></a>

            <ul class="navbar-nav flex-row">
                <li>
                    <div class="page-header">

                        <nav class="breadcrumb-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">Add User</li>
                            </ol>
                        </nav>

                    </div>
                </li>
            </ul>
        </header>
    </div>
    <!--  END NAVBAR  -->
    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <?php
            include_once 'sidebar.php';
        ?>

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="col-xl-12">
                <div class="container">
                    <div class="row layout-spacing">
                        <div class="col-lg-12 col-12 layout-spacing">              
                            <form id="general-info" class="section general-info" method="POST"  enctype="multipart/form-data">
                                <div class="account-settings-container layout-top-spacing">

                                    <div class="account-content">
                                        <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
                                            <div class="row">
                                                <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                                                    <div class="info">
                                                        <div class="row">
                                                            <div class="col-xl-9">
                                                                <h6 class="">Add User</h6>
                                                            </div>
                                                        </div> 
                                                        <div class="row">
                                                            <div class="col-lg-11 mx-auto">
                                                                <div class="row">
	                                                                <div class="col-md-6">
	                                                                    <div class="form-group">
	                                                                        <label for="fullName">First Name</label>
	                                                                        <input type="text" name="firstName" class="form-control mb-4" required="" id="fullName" placeholder="First Name" value="" pattern="[a-zA-Z]+" minlength="3" maxlength="20" required title="Only Characters">
	                                                                    </div>
	                                                                </div>
	                                                                <div class="col-md-6">
	                                                                    <div class="form-group">
	                                                                        <label for="fullName">Last Name</label>
	                                                                        <input type="text" name="lastName" class="form-control mb-4" id="lastName" placeholder="Last Name" value="" pattern="[a-zA-Z]+" minlength="3" maxlength="20" required title="Only Characters">
	                                                                    </div>
	                                                                </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                               
                                               
                                                <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing" style="margin-top: -50px;">
                                                    <div class="info">
                                                        <h6>Additional Information</h6>
                                                        <div class="row">
                                                            <div class="col-md-11 mx-auto">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="phone">Phone</label>
                                                                            <input type="text" name="mobileNo" class="form-control mb-4" id="mobileno" placeholder="Write your phone number here" value="" pattern="[0-9]{10}" maxlength="10" title="Only Numbers 0-9 with 10 digits" required >
                                                                            <span id="phone_error" style="display: none;">Mobile No. already registered</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="email">Email</label>
                                                                            <input type="email" name="email" class="form-control mb-4" id="email" placeholder="Write your email here" value="" autocomplete=username maxlength="40" required>
                                                                            <span id="email_error" style="display: none;">Email already registered</span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="fullName">Password</label>
                                                                            <input type="password" name="password" class="form-control mb-4" required="" id="password" placeholder="Password" value="" pattern="(?=[A-Za-z0-9@#$%^&+!=]+$)^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[@#$%^&+!=])(?=.{6,}).*$" title="Atleast 1 uppercase , 1 lowercase , 1 special character and 1 number with length 6" maxlength="6" required autocomplete=new-password>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="fullName">Confirm Password</label>
                                                                            <input type="password" name="cpassword" class="form-control mb-4" required="" id="conpassword" placeholder="Confirm Password" value=""  autocomplete=new-password>
                                                                            <span id="match_error" style="display: none;">Password Not Match</span>
                                                                        </div>
                                                                    </div>
                                                                
                                                                    
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="address">Address</label>
                                                                            <input type="text" name="address" placeholder="Address" class="form-control mb-4" id="address" maxlength="500" required="">
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="pincode">Pincode</label>
                                                                            <input type="pincode" name="pincode" class="form-control mb-4" id="pincode" placeholder="Pincode" value="" autocomplete=pincode pattern="[0-9]{6}" maxlength="6" title="Only Numbers 0-9 with 6 digits" required>
                                                                            <span id="pincode_error" style="display: none;">Pincode already registered</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="city">City</label>
                                                                            <input type="text" name="city" class="form-control mb-4" id="city" placeholder="City" value="" required="" readonly="" onclick="handleStateClick();">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                        	<label for="state">State</label>
                                                                            <input type="state" name="state" class="form-control mb-4" id="state" placeholder="State" value="" required="" readonly="" onclick="handleStateClick();">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-11 mx-auto">
                                                <div class="form-group" align="center">
                                                    <button class="btn btn-primary btn-rounded" name="submit" type="submit" style="width: 110px;margin-top: -30px;font-family: sans-serif;letter-spacing: 1.7px;margin-bottom: 15px" id="submit">SUBMIT</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>              
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--  END CONTENT AREA  -->
    </div>
    <!-- END MAIN CONTAINER -->

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="../../assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="../../bootstrap/js/popper.min.js"></script>
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <script src="../../plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="../../assets/js/app.js"></script>
    
    <script>
        $(document).ready(function() {
            App.init();
        });
    var email_error = true;
    var phone_error =true;
    var pass_error = true;
    $("#password, #conpassword").on("keyup focusin focusout", function () {
        password();
        checkError();
    });
    function password(){
        var password=$("#password").val();
        var cpassword=$("#conpassword").val();
        if(password != cpassword)
        {
            $("#match_error").css('display','block');
            $("#match_error").css('color','red');
            $("#submit").attr("disabled",true);
            pass_error = false;
        }
        else
        {
            $("#match_error").css('display','none');
            pass_error = true;
        }
    }

    $("#email").on("keyup focusin focusout", function () {
        if($("#email").val() != "" && $("#email").val() != " ")
        {
            email();    
            checkError();
        }
        
    });
    function email(){
        var email = $("#email").val();
        $.ajax({
            url: 'ajax.php',
            type: 'post',
            data: {email: email},
            success: function (response) {
                if(response == 1)
                {
                    $("#email_error").css("display","block");
                    $("#email_error").css("color","red");
                    $("#submit").attr("disabled",true);
                    email_error = false;
                    return false;
                }
                else
                {
                    email_error = true;
                    $("#email_error").css("display","none");
                    // $("#submit").attr("disabled",false);
                }
            }
        });
        
    }
    $("#mobileno").on("keyup focusin focusout", function () {
        if($("#mobileno").val() != "" && $("#mobileno").val() != " ")
        {
            phone();
            checkError();
        }
    });
    function phone(){
        var phone = $("#mobileno").val();
        $.ajax({
            url: 'ajax.php',
            type: 'post',
            data: {mobileno: phone},
            success: function (response) {
                if(response == 1)
                {
                    $("#phone_error").css("display","block");
                    $("#phone_error").css("color","red");
                    $("#submit").attr("disabled",true);
                    phone_error = false;
                    return false;
                }
                else
                {
                    phone_error = true;
                    $("#phone_error").css("display","none");
                    // $("#submit").attr("disabled",false);
                }
            }
        });
    }

        function checkError(){
            if(email_error == true && phone_error == true && pass_error == true)
            {
                $("#submit").attr("disabled",false);
            }
        }
        
      	var check_pincode = 1;
	
		function handleStateClick(){
			if(check_pincode != 6)
			{
				Snackbar.show({text:'Please Enter Pincode',duration:2000});
			}
		}
	
		$(document).ready(function(){
		  $("#pincode").keyup(function(){
		    pincode = $("#pincode").val();
		    check_pincode = $("#pincode").val().length;
		    if(check_pincode == '6')
		    {
		    	$.ajax({
			        url:"ajax.php",
			        method:"POST",
			        data:{pincode:pincode},
			        cache:false,
			        success:function(data)
			        {
			        	var obj = JSON.parse(data);
		    			var city = obj.PostOffice[0].Circle;
		    			var state = obj.PostOffice[0].State;
		    			$("#city").val(city);
		    			$("#city").focus();
		    			$("#state").val(state);
		    			$("#state").focus();
		    		}
			  	});
		    }
		    else
		    {
		    	$("#city").val('');
		    	$("#state").val('');
		    }
		  });
		});

        $("#general-info").submit(function(e) { 
        if(($("#city").val() == "" || $("#city").val() == " " || $("#city").val() == null) && ($("#state").val() == "" || $("#state").val() == " " || $("#state").val() == null))
        {
            return false;
        }
        else
        {
            return true;
        }
        });
    </script>
    <script src="../../assets/js/custom.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <!--  BEGIN CUSTOM SCRIPTS FILE  -->
    <script src="../../plugins/dropify/dropify.min.js"></script>
    <script src="../../plugins/blockui/jquery.blockUI.min.js"></script>
    <!-- <script src="../plugins/tagInput/tags-input.js"></script> -->
    <script src="../../assets/js/users/account-settings.js"></script>
    <script src="../../plugins/notification/snackbar/snackbar.min.js"></script>
    <script src="../../assets/js/components/notification/custom-snackbar.js"></script>
    <!--  END CUSTOM SCRIPTS FILE  -->
</body>
</html>
<?php
include("../../db/connection.php");

    if (isset($_POST['submit'])) {
        $firstName = mysqli_real_escape_string($con, $_POST['firstName']);
        $lastName = mysqli_real_escape_string($con, $_POST['lastName']);
        $name = $firstName.' '.$lastName;
        $state = mysqli_real_escape_string($con, $_POST['state']);
        $city = mysqli_real_escape_string($con, $_POST['city']);
        $pincode = mysqli_real_escape_string($con, $_POST['pincode']);
        $address = mysqli_real_escape_string($con, $_POST['address']);
        $password = mysqli_real_escape_string($con,$_POST['password']);
        $mobile_no = mysqli_real_escape_string($con, $_POST['mobileNo']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $modify_date = date("Y/m/d");
        
        
        $query = "INSERT INTO user(name,email,mobile_no,password,address,state,city,pincode,modify_date) VALUES ('$name','$email','$mobile_no','$password','$address','$state','$city','$pincode','$modify_date')";

        $run = mysqli_query($con,$query);
        if($run == true)
        {
            ?><script type="text/javascript">location.replace("add_user.php?success=1");</script><?php   

        }
        else
        {
            ?><script type="text/javascript">location.replace("add_user.php?error=1");</script><?php   
        }
    }
?><?php
if(isset($_GET['success']))
{   
    ?><script type="text/javascript">
    Snackbar.show({ text: 'User Added Successfully', duration: 2000, });
    var queryParams = new URLSearchParams(window.location.search);
    queryParams.delete("success");
    history.pushState(null, null, "?"+queryParams.toString());
    </script><?php
}
if(isset($_GET['error']))
{   
    ?><script type="text/javascript">
    Snackbar.show({ text: 'There is Some Error, Please Try Again', duration: 2000, });
    var queryParams = new URLSearchParams(window.location.search);
    queryParams.delete("error");
    history.pushState(null, null, "?"+queryParams.toString());
    </script><?php
}
if(isset($_GET['high']))
{
    ?><script type="text/javascript">
    Snackbar.show({ text: 'File size is too high !', duration: 2000, });
    var queryParams = new URLSearchParams(window.location.search);
    queryParams.delete("high");
    history.pushState(null, null, "?"+queryParams.toString());
    </script><?php
}
if(isset($_GET['file_error']))
{
    ?><script type="text/javascript">
    Snackbar.show({ text: 'There is Error in Your File', duration: 2000, });
    var queryParams = new URLSearchParams(window.location.search);
    queryParams.delete("file_error");
    history.pushState(null, null, "?"+queryParams.toString());
    </script><?php
}
if(isset($_GET['type']))
{
    ?><script type="text/javascript">
    Snackbar.show({ text: 'You Can Not Upload this type of Image', duration: 2000, });
    var queryParams = new URLSearchParams(window.location.search);
    queryParams.delete("type");
    history.pushState(null, null, "?"+queryParams.toString());
    </script><?php
}
if(isset($_GET['valid']))
{   
    ?><script type="text/javascript">
    Snackbar.show({ text: 'Please Upload Image(ex : 200x200)', duration: 4000, });
    var queryParams = new URLSearchParams(window.location.search);
    queryParams.delete("valid");
    history.pushState(null, null, "?"+queryParams.toString());
    </script><?php
}
?>