<script>
    var type = "email";
</script>
<?php
if (isset($_COOKIE['user_id'])) {
    ?><script type="text/javascript">location.replace("index.php");</script><?php
}
?>
<!doctype html>
<html lang="en-US">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <title>Password Recovery | Fashion</title>
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
    </head>

    <body class="page-template-default page page-id-10 wp-embed-responsive theme-goya woocommerce-account woocommerce-page woocommerce-lost-password woocommerce-no-js woo-variation-swatches wvs-theme-goya-child wvs-theme-child-goya wvs-style-squared wvs-attr-behavior-blur wvs-tooltip wvs-css wvs-show-label blog-id-3 wp-gallery-popup has-top-bar header-sticky header-full-width floating-labels login-single-column et-woocommerce-account-login header-border-1 page-header-regular sticky-header-dark header-transparent-mobiles dark-title wpb-js-composer js-comp-ver-6.6.0 vc_responsive">
        <div id="wrapper" class="open">
            <div class="click-capture"></div>
            <div class="page-wrapper-inner">
                <!-- header start -->
				<?php include("index_header.php"); ?>
				<!-- header end  -->
                <div role="main" class="site-content">
                    <div class="header-spacer"></div>
                    <div class="hero-header page-padding post-10 page type-page status-publish hentry">
                        <div class="regular-title">
                            <div class="container hero-header-container">
                                <div class="row">
                                    <header class="col-lg-8 woocommerce-products-header">
                                        <h1 class="page-title" itemprop="name headline">Lost password</h1>
                                    </header>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="post-content no-vc">
                            <div class="woocommerce">
                                <div class="woocommerce-notices-wrapper"></div>
                                <style>
                                    #mobile-verify,#mobile-button{
                                        display:none;
                                    }
                                </style>
                                <form method="post" class="woocommerce-ResetPassword lost_reset_password"   action="password_recovery.php">
                                    <p>Lost your password? Please select mobile number or email address for verification. You will receive a link to create a new password via email.</p>
                                    <div class="row">
                                        <div class="col-xl-5 col-lg-12">
                                        <div class="n-chk d-inline-block ml-xl-2 ml-lg-1">
                                            <label class="new-control new-radio radio-primary">
                                            <input type="radio" class="new-control-input" name="verify" value="email" id="email-radio" checked>
                                            <span class="new-control-indicator"></span>Email Address
                                            </label>
                                        </div>
                                        </div>
                                        <div class="col-xl-7 col-lg-12">
                                        <div class="n-chk d-inline-block ml-xl-4 ml-lg-1">
                                            <label class="new-control new-radio radio-primary ">
                                            <input type="radio" class="new-control-input" name="verify" id="mobile-radio" value="mobile">
                                            <span class="new-control-indicator"></span>Mobile number
                                            </label>
                                        </div>
                                </div>
                                    </div>
                                    <p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first" id="email-verify"> 
                                        <label for="user_login">Enter Your Email Address</label>
                                        <input class="woocommerce-Input woocommerce-Input--text input-text" type="email" name="email" id="email" autocomplete="username" required />
                                    </p>
                                    <p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first" id="mobile-verify">
                                        <label for="user_login">Enter Your Mobile Number</label>
                                        <input class="woocommerce-Input woocommerce-Input--text input-text" type="text" name="mobile_no" id="mobile_no" autocomplete="" required pattern="[0-9]{10}" maxlength="10" title="Only Numbers 0-9 with 10 digits" />
                                    </p>
                                    <p class="woocommerce-form-row form-row" id="email-button">
                                        <button type="submit" class="woocommerce-Button button" value="Reset password" name="submit-email" id="submit-email">Reset password</button>
                                    </p>
                                    <p class="woocommerce-form-row form-row" id="mobile-button">
                                        <button type="submit" class="woocommerce-Button button" value="Reset password" name="submit-mobile" id="submit-mobile">Reset password</button>
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div><!-- End role["main"] -->
            </div><!-- End .page-wrapper-inner -->
            <!-- footer start  -->
			<?php include("index_footer.php"); ?>
			<!-- footer end -->
        </div> <!-- End #wrapper -->
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
		<script src="../js/main.js"></script>
		<script src="../plugins/notification/snackbar/snackbar.min.js"></script>
		<script src="../assets/js/components/notification/custom-snackbar.js"></script>
   	</body>
</html>
<script>
    $('input[type="radio"]').click(function(){
        if ($(this).is(':checked'))
        {
            type = $(this).val();
            if(type == "email")
            {
                $("#email-verify").css("display","block");
                $("#email-button").css("display","block");
                $("#mobile-verify").css("display","none");    
                $("#mobile-button").css("display","none");
            }
            else
            {
                $("#email-verify").css("display","none");
                $("#email-button").css("display","none");
                $("#mobile-verify").css("display","block");
                $("#mobile-button").css("display","block");
            }
        }
  });
</script>
<?php
include_once '../db/connection.php';

//email
if(isset($_POST['submit-email']))
{
    
    $email=trim($_POST["email"]);
    $query=mysqli_query($con,"select * from user where email='$email'");
    $row=mysqli_fetch_assoc($query);
    if(mysqli_num_rows($query) > 0)
    {
        include('../smtp/PHPMailerAutoload.php');
        $basename = basename($_SERVER['HTTP_REFERER']);
        $basename_replace = str_replace($basename, "reset_password.php", $_SERVER['HTTP_REFERER']);
        $str_code = rand(100000,10000000);
        $reset_code = str_shuffle("abcdefghijklmnopqrstuvwxyz".$str_code);
        $url = $basename_replace."?resetLink=".$reset_code;
        $html='For reset password, click on the given link:<b>'.$url.'</b>';
        function smtp_mailer($to,$subject, $msg){
            global $reset_code,$email,$con;
            $mail = new PHPMailer(); 
            $mail->SMTPDebug  = 3;
            $mail->IsSMTP(); 
            $mail->SMTPAuth = true; 
            $mail->SMTPSecure = 'tls'; 
            $mail->Host = "smtp.gmail.com";
            $mail->Port = 587; 
            $mail->IsHTML(true);
            $mail->CharSet = 'UTF-8';
            $mail->Username = "uzack72@gmail.com";
            $mail->Password = "Mshanu00";
            $mail->SetFrom("uzack72@gmail.com");
            $mail->Subject = $subject;
            $mail->Body =$msg;
            $mail->AddAddress($to);
            $mail->SMTPOptions=array('ssl'=>array(
                'verify_peer'=>false,
                'verify_peer_name'=>false,
                'allow_self_signed'=>false
            ));
            if(!$mail->send())
            {
            $message = $mail->ErrorInfo;
            echo '<script>alert("'.$message.'");</script>';
            }
            else
            {
                $sqlUpdate = "update user set reset_code='$reset_code' where email='$email'";
                $resultUpdate = mysqli_query($con,$sqlUpdate);
                if($resultUpdate)
                {
                    echo "<script type='text/javascript'>location.href = 'password_recovery.php?success-email=1'</script>";
                }
                else
                {
                    echo "<script>alert('oops something went wrong....');";
                }
            }
        }
        echo smtp_mailer($email,'Reset Password Link',$html);
    }
    else    
    {
        
        ?><script type="text/javascript">location.href = 'password_recovery.php?email-error=0'</script><?php
    }
}

//otp
if(isset($_POST['submit-mobile']))
{
    $mobile_no=trim($_POST["mobile_no"]);
    $query=mysqli_query($con,"select * from user where mobile_no='$mobile_no'");
    $mo = "+91".$mobile_no;
    $row=mysqli_fetch_assoc($query);
    if(mysqli_num_rows($query) > 0)
    {
        require_once '../vendor/autoload.php';
        $basename = basename($_SERVER['HTTP_REFERER']);
        $basename_replace = str_replace($basename, "reset_password.php", $_SERVER['HTTP_REFERER']);
        $str_code = rand(100000,10000000);
        $reset_code = str_shuffle("abcdefghijklmnopqrstuvwxyz".$str_code);
        $url = $basename_replace."?resetLink=".$reset_code;
        $html='For reset password, click on the given link:'.$url;

        $MessageBird = new \MessageBird\Client('NYOb1MKm49yNhKd6KkR4HRDCy');
        $Message = new \MessageBird\Objects\Message();
        $Message->originator = '+917415140684';
        $Message->recipients = [ $mo ];
        $Message->body = $html;
        $MessageBird->messages->create($Message);
        $sqlUpdate = "update user set reset_code='$reset_code' where mobile_no='$mobile_no'";
        $resultUpdate = mysqli_query($con,$sqlUpdate);
        if($resultUpdate)
        {
            echo "<script type='text/javascript'>location.href = 'password_recovery.php?success-mobile=1'</script>";
        }
        else
        {
            echo "<script>alert('oops something went wrong....');";
        }
    }
    else    
    {
        
        ?><script type="text/javascript">location.href = 'password_recovery.php?mobile-error=0'</script><?php
    }    
}


if(isset($_GET['success-email']))
{   
    ?><script type="text/javascript">
    Snackbar.show({ text: 'Reset link sent to your email', duration: 2000, });
    var queryParams = new URLSearchParams(window.location.search);
    queryParams.delete("success-email");
    history.pushState(null, null, "?"+queryParams.toString());
    </script><?php
}
if(isset($_GET['success-mobile']))
{   
    ?><script type="text/javascript">
    Snackbar.show({ text: 'Reset link sent to your mobile', duration: 2000, });
    var queryParams = new URLSearchParams(window.location.search);
    queryParams.delete("success-mobile");
    history.pushState(null, null, "?"+queryParams.toString());
    </script><?php
}
if(isset($_GET['email-error']))
{   
    ?><script type="text/javascript">
    Snackbar.show({ text: 'Account Not Found', duration: 2000, });
    var queryParams = new URLSearchParams(window.location.search);
    queryParams.delete("email-error");
    history.pushState(null, null, "?"+queryParams.toString());
    </script><?php
}
if(isset($_GET['mobile-error']))
{   
    ?><script type="text/javascript">
    Snackbar.show({ text: 'Mobile Number Not Found', duration: 2000, });
    var queryParams = new URLSearchParams(window.location.search);
    queryParams.delete("mobile-error");
    history.pushState(null, null, "?"+queryParams.toString());
    </script><?php
}
?>
<?php include_once("search.php"); ?>