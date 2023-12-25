<?php
include_once("../db/connection.php");

if(isset($_COOKIE['user_id']) )
{
    $user_id = $_COOKIE['user_id'];
    $query = "select * from user where user_id='$user_id'";
    $run = mysqli_query($con,$query);
    $fetch=mysqli_fetch_assoc($run);
}
else
{
    ?><script type="text/javascript">location.replace("index.php");</script><?php   
}
?>
<!doctype html>
<html lang="en-US">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<title>Registration | Fashion</title>
		<link rel="icon" type="image/x-icon" href="assets/img/favicon.png"/>
		<link rel="stylesheet" href="../css/index.css" media="all" data-minify="1" />
		<link rel="stylesheet" href="../css/index1.css" media="all" data-minify="1" />
		<script src='../js/jquery.min.js?ver=3.5.1'></script>
		<script src='../js/jquery-migrate.min.js?ver=3.3.2'></script>
		<script src='../js/jquery.blockUI.min.js?ver=2.70'></script>
		<script src='../js/add-to-cart.min.js?ver=5.5.1'></script>
		<script data-minify="1" src='../js/woocommerce-add-to-cart.js?ver=1626583894'></script>
		<script src='../js/underscore.min.js?ver=1.8.3'></script>
		<script src='../js/jquery.cookie.min.js?ver=1.4.1'></script>
		<script src='../js/wp-util.min.js?ver=5.7.2'></script>
		<script src='../js/add-to-cart-variation.min.js?ver=5.5.1'></script>
		<script src='../js/frontend.min.js?ver=1.1.17'></script>
		<script stc="../js/cities.js"></script>

		<noscript>
			<style>
				.woocommerce-product-gallery {
				opacity: 1 !important;
				}
			</style>
		</noscript>
		<style type="text/css">
			body.custom-background #wrapper {
			background-color: #ffffff;
			}
		</style>
        <link rel="icon" href="../assets/img/logo-alt.png.webp" sizes="32x32" />
        <link rel="icon" href="../assets/img/logo-alt.png" sizes="192x192" />
        <link rel="apple-touch-icon" href="../assets/img/logo-alt.png" />
		<link rel="stylesheet" href="../css/index2.css">
		<noscript>
			<style>
				.wpb_animate_when_almost_visible {
				opacity: 1;
				}
			</style>
		</noscript>
		<noscript>
			<style id="rocket-lazyload-nojs-css">
				.rll-youtube-player,
				[data-lazy-src] {
				display: none !important;
				}
			</style>
		</noscript>
		<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
		<link href="../plugins/notification/snackbar/snackbar.min.css" rel="stylesheet" type="text/css" />
		<style type="text/css">
			@media all and (max-width:974px) {
				#reg-form{
					margin-top: 50px;
				}
			}

		</style>
	</head>
	<body class="page-template-default page page-id-10 wp-embed-responsive theme-goya woocommerce-account woocommerce-page woocommerce-no-js woo-variation-swatches wvs-theme-goya-child wvs-theme-child-goya wvs-style-squared wvs-attr-behavior-blur wvs-tooltip wvs-css wvs-show-label blog-id-3 wp-gallery-popup has-top-bar header-sticky header-full-width floating-labels login-single-column et-woocommerce-account-login header-border-1 page-header-regular sticky-header-dark header-transparent-mobiles dark-title wpb-js-composer js-comp-ver-6.6.0 vc_responsive">
		<div id="wrapper" class="open">
			<div class="click-capture"></div> 
			<div class="page-wrapper-inner">
				<!-- header start -->
				<?php include("index_header.php"); ?>
				<!-- header end  -->
				<div role="main" class="site-content">
					<div class="header-spacer"></div>
					<div class="container">
						<div class="post-content no-vc">
							<div class="woocommerce">
								<div class="container">
									<div class="woocommerce-notices-wrapper"></div>
									<div class="et-overflow-container et-login-wrapper no_popup" align="center">
										
										<div class="col-xl-6 col-lg-6 col-md-8 col-sm-10 col-sm-6 border pr-5 pl-5" id="reg-form" >
											<div id="et-login-form">
												<style type="text/css">
													#reg-title{
														margin-bottom: 20px;
														padding: 2vh 0;
														text-align: center;
														font-size: 2.1rem
													}
												</style>
												<h2 class="page-title" id="reg-title">User Profile</h2>
												<!--link style -->
												<style>
													.links:hover,/* OPTIONAL*/
													.links:visited,
													.links:focus
													{
														text-decoration: none !important;
														color:#444444;
													}
													.links:hover
													{
														border-bottom: 1px solid;
														padding-bottom: 3px;
													}
													.links .active{
														border-bottom:2px solid;
													}
												
												</style>
												<!--end -->
												<form class="woocommerce-form woocommerce-form-login login" method="post" id="registrationForm">
                                                <div align="center">
                                                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide d-inline-block w-50 pl-2">
													<label for="firstname" class="ml-2">First Name&nbsp;<span class="required">*</span></label>
                                                    <?php 
                                                    $name = explode(" ",$fetch['name']);
                                                    ?>
													<input type="text" class="woocommerce-Input woocommerce-Input--text input-text " name="firstname" id="firstname" pattern="[a-zA-Z]+" minlength="3" maxlength="20" required title="Only Characters" autocomplete="firstname" value="<?php echo $name[0]; ?>" />					
												</p>

                                                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide d-inline-block w-50 pl-2">
													<label for="lastname" class="ml-2">Last Name&nbsp;<span class="required">*</span></label>
													<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="lastname" id="lastname" pattern="[a-zA-Z]+" minlength="3" maxlength="20" required title="Only Characters" autocomplete="lastname" value="<?php echo $name[1]; ?>" />					
												</p>
												</div>
                                                <div align="center" style="margin-top: -25px;">
													<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide d-inline-block w-50 pl-1 pr-1">
														<label for="email" class="ml-2">Email address&nbsp;<span class="required">*</span></label>
														<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="email" id="email" autocomplete="email" value="<?php echo $fetch['email']; ?>" maxlength="40" required />					
													</p>

	                                                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide d-inline-block w-50 pl-2">
														<label for="mobileno" class="ml-2">Mobile number&nbsp;<span class="required">*</span></label>
														<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="mobileno" id="mobileno" autocomplete="mobileno" value="<?php echo $fetch['mobile_no']; ?>" pattern="[0-9]{10}" maxlength="10" title="Only Numbers 0-9 with 10 digits" required />					
													</p>
													<span id="email_error" class="text-left ml-2" style="display: none;margin-top: -20px;margin-bottom: 20px;"> * Email Already Registered</span>
													<span id="phone_error" class="text-left ml-2" style="display: none;margin-top: -20px;margin-bottom: 20px;"> * Mobile Number Already Registered</span>
												</div>
												

												<div align="center">
	                                                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide d-inline-block w-100 pl-1 pr-1">
														<label for="address" class="ml-2">Address&nbsp;<span class="required">*</span></label>
														<textarea class="woocommerce-Input woocommerce-Input--text input-textarea" name="addr" id="address" style="width:100%;" required maxlength="500"><?php echo $fetch['address']; ?></textarea>
													</p>
												</div>
												<div align="center" style="margin-top: 15px;">
													<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide d-inline-block w-100 pl-1 pr-1">
														<label for="pincode" class="ml-2">pincode&nbsp;<span class="required">*</span></label>
														<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="pincode" id="pincode" autocomplete="pincode" value="<?php echo $fetch['pincode']; ?>" pattern="[0-9]{6}" maxlength="6" title="Only Numbers 0-9 with 6 digits" required />				
													</p>
												</div>
												<div align="center">
														<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide d-inline-block w-50 pl-2">
															<label for="state" class="ml-2">State&nbsp;<span class="required">*</span></label>
															<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="state" id="state" autocomplete="state" value="<?php echo $fetch['state']; ?>" readonly="" onclick="handleStateClick();" />
																
														</p>
														<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide d-inline-block w-50 pl-2">
															<label for="city" class="ml-2">City&nbsp;<span class="required">*</span></label>
															<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="city" id="city" autocomplete="city" value="<?php echo $fetch['city']; ?>" readonly="" onclick="handleStateClick();" />
		                                                </p>
	                                                </div>
	                                                
												</div>
												
												<div align="center" class="row">
													<div class="col-xl-4">
													</div>
													<div class="col-xl-4">
													<p class="">
														<button type="submit" class="woocommerce-button button woocommerce-form-login__submit w-100 text-center" name="submit" value="Log in">Update</button>
													</p>
													</div>
													<div class="col-xl-4">
													</div>
												</div>
												</form><br>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- End role["main"] -->
			</div>
			<!-- End .page-wrapper-inner -->
			<!-- footer start  -->
			<?php include("index_footer.php"); ?>
			<!-- footer end -->
		</div>
		<!-- End #wrapper -->
		<div id="et-quickview" class="clearfix"></div>
		<script src='../js/jquery.selectBox.min.js?ver=1.2.0'></script>
		<script src='../js/jquery.prettyPhoto.min.js?ver=3.1.6'></script>
		<script src='../js/cart-fragments.min.js?ver=5.5.1'></script>
		<script data-minify="1" src='../js/demo.js?ver=1626583894'></script>
		<script src='../js/imagesloaded.min.js?ver=4.1.4'></script>
		<script src='../js/modernizr.min.js?ver=2.8.3'></script>
		<script src='../js/mobile-detect.min.js?ver=1.3.2'></script>
		<script src='../js/isInViewport.min.js?ver=3.0.4'></script>
		<script src='../js/jquery.autocomplete.min.js?ver=1.4.1'></script>
		<script src='../js/jquery.magnific-popup.min.js?ver=3.0.1'></script>
		<script src='../js/perfect-scrollbar.jquery.min.js?ver=0.8.0'></script>
		<script src='../js/sticky-kit.min.js?ver=1.1.3'></script>
		<script src='../js/slick.min.js?ver=1.8.1'></script>
		<script src='../js/isotope.pkgd.min.js?ver=3.0.6'></script>
		<script src='../js/packery-mode.pkgd.min.js?ver=2.0.1'></script>
		<script src='../js/arrive.min.js?ver=2.4.1'></script>
		<script src='../js/sliding-menu.min.js?ver=0.2.1'></script>
		<script src='../js/select2.full.min.js?ver=4.0.3'></script>
		<script src='../js/goya-app.min.js?ver=1.0.6.2'></script>
		<script id='goya-app-js-extra'>
			var goya_theme_vars = {"ajaxUrl":"","l10n":{"back":"Back","view_cart":"View cart"},"icons":{"prev_arrow":"<svg xmlns=\"http:\/\/www.w3.org\/2000\/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\" class=\"feather feather-chevron-left\"><polyline points=\"15 18 9 12 15 6\"><\/polyline><\/svg>","next_arrow":"<svg xmlns=\"http:\/\/www.w3.org\/2000\/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\" class=\"feather feather-chevron-right\"><polyline points=\"9 18 15 12 9 6\"><\/polyline><\/svg>"},"settings":{"current_url":"https:\/\/goya.everthemes.com\/demo-fashion\/","site_url":"https:\/\/goya.everthemes.com\/demo-fashion","pageLoadTransition":false,"ajaxSearchActive":true,"ajaxAddToCartSingle":true,"cart_icon":"mini-cart","minicart_auto":true,"shop_infinite_load":"button","shop_update_url":false,"ajaxWishlistCounter":false,"posts_per_page":"10","related_slider":true,"popup_length":"1","is_front_page":true,"is_blog":false,"is_cart":false,"is_checkout":false,"checkoutTermsPopup":true}};
		</script>
		<script src='../js/goya-animations.min.js?ver=1.0.6.2'></script>
		<script src='../js/js_composer_front.min.js?ver=6.6.0'></script>
		<script src='../js/forms.js?ver=1626583894'></script>
		<script>window.lazyLoadOptions={elements_selector:"img[data-lazy-src],.rocket-lazyload,iframe[data-lazy-src]",data_src:"lazy-src",data_srcset:"lazy-srcset",data_sizes:"lazy-sizes",class_loading:"lazyloading",class_loaded:"lazyloaded",threshold:300,callback_loaded:function(element){if(element.tagName==="IFRAME"&&element.dataset.rocketLazyload=="fitvidscompatible"){if(element.classList.contains("lazyloaded")){if(typeof window.jQuery!="undefined"){if(jQuery.fn.fitVids){jQuery(element).parent().fitVids()}}}}}};window.addEventListener('LazyLoad::Initialized',function(e){var lazyLoadInstance=e.detail.instance;if(window.MutationObserver){var observer=new MutationObserver(function(mutations){var image_count=0;var iframe_count=0;var rocketlazy_count=0;mutations.forEach(function(mutation){for(i=0;i<mutation.addedNodes.length;i++){if(typeof mutation.addedNodes[i].getElementsByTagName!=='function'){continue}
			if(typeof mutation.addedNodes[i].getElementsByClassName!=='function'){continue}
			images=mutation.addedNodes[i].getElementsByTagName('img');is_image=mutation.addedNodes[i].tagName=="IMG";iframes=mutation.addedNodes[i].getElementsByTagName('iframe');is_iframe=mutation.addedNodes[i].tagName=="IFRAME";rocket_lazy=mutation.addedNodes[i].getElementsByClassName('rocket-lazyload');image_count+=images.length;iframe_count+=iframes.length;rocketlazy_count+=rocket_lazy.length;if(is_image){image_count+=1}
			if(is_iframe){iframe_count+=1}}});if(image_count>0||iframe_count>0||rocketlazy_count>0){lazyLoadInstance.update()}});var b=document.getElementsByTagName("body")[0];var config={childList:!0,subtree:!0};observer.observe(b,config)}},!1)
		</script>
		<script src="../js/lazyload.min.js"></script>
		<script src="../js/jquery.js"></script>
        <script type="text/javascript" src="../plugins/jquery-ui/jquery-ui.min.js"></script>
		<script src="../bootstrap/js/popper.min.js"></script>
		<script src="../bootstrap/js/bootstrap.min.js"></script>
		<script src="../plugins/notification/snackbar/snackbar.min.js"></script>
		<script src="../assets/js/components/notification/custom-snackbar.js"></script>
		
   	</body>
</html>
<script type="text/javascript">
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

	var email_error = true;
    var phone_error =true;
    $("#email").on("keyup focusin focusout", function () {
        if($("#email").val() != "" && $("#email").val() != " ")
        {
            email();    
            checkError();
        }
        
    });
    function email(){
        var email = $("#email").val();
        var userid = "<?php echo $user_id; ?>";
        $.ajax({
            url: 'ajax.php',
            type: 'post',
            data: {email_update: email,userid:userid},
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
        var userid = "<?php echo $user_id; ?>";
        $.ajax({
            url: 'ajax.php',
            type: 'post',
            data: {mobileno_update: phone,userid:userid},
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
        if(email_error == true && phone_error == true)
        {
            $("#submit").attr("disabled",false);
        }
    }             

    $("#registrationForm").submit(function(e) { 
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
<?php 
include("../db/connection.php");
if (isset($_POST['submit']))
{
	$email = mysqli_real_escape_string($con,$_POST['email']);
	$mobile_no = mysqli_real_escape_string($con,$_POST['mobileno']);
	$pass = mysqli_real_escape_string($con, $_POST['pass']);
	$add = mysqli_real_escape_string($con,$_POST['addr']);
	$fname = mysqli_real_escape_string($con,$_POST['firstname']);
	$lname = mysqli_real_escape_string($con,$_POST['lastname']);
	$name = $fname . " " . $lname;
	$modify_date = date("Y/m/d");
	$state = mysqli_real_escape_string($con,$_POST['state']);
	$city = mysqli_real_escape_string($con,$_POST['city']);
	$pincode = mysqli_real_escape_string($con,$_POST['pincode']);

	$query = "update user set name='$name',email='$email',mobile_no='$mobile_no',address='$add',modify_date='$modify_date',state='$state',city='$city' where user_id='$user_id'";
    $run = mysqli_query($con,$query);
	if($run == true)
	{
		?><script type="text/javascript">location.replace("user_profile.php?success=1");</script><?php   

	}
	else
	{
		?><script type="text/javascript">location.replace("user_profile.php?error=1");</script><?php   
	}
}
?>
<?php
if(isset($_GET['success']))
{   
    ?><script type="text/javascript">
    Snackbar.show({ text: 'Profile Updated', duration: 2000, });
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

?>
<?php include_once("search.php"); ?>