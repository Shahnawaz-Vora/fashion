<?php
   include_once("../db/connection.php");
   if(isset($_GET['category']) && isset($_GET['subcategory']))
   {
        ?>
        <script type="text/javascript">
        var category = "<?php echo $_GET['category']; ?>";
        var sub_category = "<?php echo $_GET['subcategory']; ?>";
        </script>
        <?php
   }
   if(isset($_GET['category']) && isset($_GET['single']))
   {
        ?>
        <script type="text/javascript">
        var category = "<?php echo $_GET['category']; ?>";
        </script>
        <?php
   }
   ?>
<!doctype html>
<html lang="en-US">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Shop | Fashion</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.png"/>
    <link rel="stylesheet" href="../css/index.css" media="all" data-minify="1" />
    <link rel="stylesheet" href="../css/index1.css" media="all" data-minify="1" />
    <link rel="stylesheet" href="../css/shop.css" media="all" data-minify="1" />
    <link rel="stylesheet" href="../css/shop_inline.css" media="all" data-minify="1" />
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
</head>

<body class="home page-template-default page page-id-861 wp-embed-responsive theme-goya woocommerce-no-js woo-variation-swatches wvs-theme-goya-child wvs-theme-child-goya wvs-style-squared wvs-attr-behavior-blur wvs-tooltip wvs-css wvs-show-label blog-id-3 wp-gallery-popup has-top-bar header-sticky header-full-width floating-labels login-single-column et-login-popup page-header-transparent sticky-header-dark header-transparent-mobiles dark-title wpb-js-composer js-comp-ver-6.6.0 vc_responsive">
    <div id="wrapper" class="open">
        <div class="click-capture"></div>
        <div class="page-wrapper-inner">
            <!-- header start -->
            <?php include("index_header.php"); ?>
            <!-- header end  -->
            <!-- Body Start -->
            <div role="main" class="site-content">
                <div class="header-spacer"></div>
                <div class="hero-header">
                    <div class="parallax_image vh-height hero-title" style="background-image : url('https://goyacdn.everthemes.com/demo-fashion/wp-content/uploads/sites/3/2020/02/banner-bag.jpg');">
                        <div class="container hero-header-container">
                            <header class="row woocommerce-products-header">
                                <div class="col-lg-8">
                                    <h1 class="et-shop-title woocommerce-products-header__title page-title">Shop</h1>
                                    <ul class="shop_categories_list">
                                        <li><a href="shop.php?category=Mens&single=1">Men</a></li>
                                        <li><a href="shop.php?category=Womens&single=1">Womens</a></li>
                                        <li><a href="shop.php?category=Kids&single=1">Kids</a></li>
                                    </ul>
                                </div>
                            </header>
                        </div>
                    </div>
                </div>
                <div class="shop-container shop-full-width shop-sidebar-popup">
                    <div id="shop-products" class="shop-products container">
                        <div class="row">
                            <div class="shop-products-col col">
                                <div class="shop_bar">
                                    <div class="row">
                                        <div class="col-md-6 category_bar">
                                            <nav class="woocommerce-breadcrumb"><a href="https://goya.everthemes.com/demo-fashion">Home</a> <i>/</i> Shop</nav>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="shop-filters sticky-filters">
                                                
                                                <div class="shop-views list-1 small-1">
                                                    <button id="shop-display-grid" class="shop-display grid-icon active" data-display="grid">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid">
                                                            <rect x="3" y="3" width="7" height="7"></rect>
                                                            <rect x="14" y="3" width="7" height="7"></rect>
                                                            <rect x="14" y="14" width="7" height="7"></rect>
                                                            <rect x="3" y="14" width="7" height="7"></rect>
                                                        </svg>
                                                    </button>
                                                    <button id="shop-display-small" class="shop-display small-icon" data-display="small">
                                                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                                            <path d="M20.016 8.016v-4.031h-4.031v4.031h4.031zM20.016 14.016v-4.031h-4.031v4.031h4.031zM20.016 20.016v-4.031h-4.031v4.031h4.031zM14.016 8.016v-4.031h-4.031v4.031h4.031zM14.016 14.016v-4.031h-4.031v4.031h4.031zM14.016 20.016v-4.031h-4.031v4.031h4.031zM8.016 8.016v-4.031h-4.031v4.031h4.031zM8.016 14.016v-4.031h-4.031v4.031h4.031zM8.016 20.016v-4.031h-4.031v4.031h4.031zM20.016 2.016q0.797 0 1.383 0.586t0.586 1.383v16.031q0 0.797-0.586 1.383t-1.383 0.586h-16.031q-0.797 0-1.383-0.586t-0.586-1.383v-16.031q0-0.797 0.586-1.383t1.383-0.586h16.031z"></path>
                                                        </svg>
                                                    </button>
                                                    <button id="shop-display-list" class="shop-display list-icon" data-display="list">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu">
                                                            <line x1="3" y1="12" x2="21" y2="12"></line>
                                                            <line x1="3" y1="6" x2="21" y2="6"></line>
                                                            <line x1="3" y1="18" x2="21" y2="18"></line>
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- product items -->
                                
                                        
                                
                                <!-- product items end -->
                                <div id="load_data"></div>
                                <div id="load_data_message"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--body end-->
            <!-- footer start  -->
            <?php include("index_footer.php"); ?>
            <!-- footer end -->
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
                var goya_theme_vars = {
                    "ajaxUrl": "",
                    "l10n": {
                        "back": "Back",
                        "view_cart": "View cart"
                    },
                    "icons": {
                        "prev_arrow": "<svg xmlns=\"http:\/\/www.w3.org\/2000\/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\" class=\"feather feather-chevron-left\"><polyline points=\"15 18 9 12 15 6\"><\/polyline><\/svg>",
                        "next_arrow": "<svg xmlns=\"http:\/\/www.w3.org\/2000\/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\" class=\"feather feather-chevron-right\"><polyline points=\"9 18 15 12 9 6\"><\/polyline><\/svg>"
                    },
                    "settings": {
                        "current_url": "https:\/\/goya.everthemes.com\/demo-fashion\/",
                        "site_url": "https:\/\/goya.everthemes.com\/demo-fashion",
                        "pageLoadTransition": false,
                        "ajaxSearchActive": true,
                        "ajaxAddToCartSingle": true,
                        "cart_icon": "mini-cart",
                        "minicart_auto": true,
                        "shop_infinite_load": "button",
                        "shop_update_url": false,
                        "ajaxWishlistCounter": false,
                        "posts_per_page": "10",
                        "related_slider": true,
                        "popup_length": "1",
                        "is_front_page": true,
                        "is_blog": false,
                        "is_cart": false,
                        "is_checkout": false,
                        "checkoutTermsPopup": true
                    }
                };
            </script>
            <script src='../js/goya-animations.min.js?ver=1.0.6.2'></script>
            <script src='../js/js_composer_front.min.js?ver=6.6.0'></script>
            <script src='../js/forms.js?ver=1626583894'></script>
            <script>
                window.lazyLoadOptions = {
                    elements_selector: "img[data-lazy-src],.rocket-lazyload,iframe[data-lazy-src]",
                    data_src: "lazy-src",
                    data_srcset: "lazy-srcset",
                    data_sizes: "lazy-sizes",
                    class_loading: "lazyloading",
                    class_loaded: "lazyloaded",
                    threshold: 300,
                    callback_loaded: function(element) {
                        if (element.tagName === "IFRAME" && element.dataset.rocketLazyload == "fitvidscompatible") {
                            if (element.classList.contains("lazyloaded")) {
                                if (typeof window.jQuery != "undefined") {
                                    if (jQuery.fn.fitVids) {
                                        jQuery(element).parent().fitVids()
                                    }
                                }
                            }
                        }
                    }
                };
                window.addEventListener('LazyLoad::Initialized', function(e) {
                    var lazyLoadInstance = e.detail.instance;
                    if (window.MutationObserver) {
                        var observer = new MutationObserver(function(mutations) {
                            var image_count = 0;
                            var iframe_count = 0;
                            var rocketlazy_count = 0;
                            mutations.forEach(function(mutation) {
                                for (i = 0; i < mutation.addedNodes.length; i++) {
                                    if (typeof mutation.addedNodes[i].getElementsByTagName !== 'function') {
                                        continue
                                    }
                                    if (typeof mutation.addedNodes[i].getElementsByClassName !== 'function') {
                                        continue
                                    }
                                    images = mutation.addedNodes[i].getElementsByTagName('img');
                                    is_image = mutation.addedNodes[i].tagName == "IMG";
                                    iframes = mutation.addedNodes[i].getElementsByTagName('iframe');
                                    is_iframe = mutation.addedNodes[i].tagName == "IFRAME";
                                    rocket_lazy = mutation.addedNodes[i].getElementsByClassName('rocket-lazyload');
                                    image_count += images.length;
                                    iframe_count += iframes.length;
                                    rocketlazy_count += rocket_lazy.length;
                                    if (is_image) {
                                        image_count += 1
                                    }
                                    if (is_iframe) {
                                        iframe_count += 1
                                    }
                                }
                            });
                            if (image_count > 0 || iframe_count > 0 || rocketlazy_count > 0) {
                                lazyLoadInstance.update()
                            }
                        });
                        var b = document.getElementsByTagName("body")[0];
                        var config = {
                            childList: !0,
                            subtree: !0
                        };
                        observer.observe(b, config)
                    }
                }, !1)
            </script>
            <script src="../js/lazyload.min.js"></script>
            <script src="../js/jquery.js"></script>
            <script type="text/javascript" src="../plugins/jquery-ui/jquery-ui.min.js"></script>
            <script src="../bootstrap/js/popper.min.js"></script>
            <script src="../bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
<script type="text/javascript">


<?php
if(isset($_GET['category']) && isset($_GET['subcategory']))
{
    ?>
    var limit = 20;
    var start = 0;
    var action = 'inactive';
    function load_country_data(limit, start,category,sub_category)
    {
    $.ajax({
        url:"ajax.php",
        method:"POST",
        data:{limit:limit, start:start,category:category,sub_category:sub_category},
        cache:false,
        success:function(data)
        {

            $('#load_data').append(data);
            if($("#check").val() == 0)
            {
             $('#load_data_message').html("<div class='mb-3' align=right style='margin-top=-30px;'><button type='button' class='btn btn-outline-dark' id='no-data'>No More Data Found</button></div>");
             action = 'active';
            }
            else
            {
             $('#load_data_message').html("<div class='mb-3' align=right style='margin-top=-30px;'><button type='button' class='btn btn-outline-dark'>Please Wait....</button></div>");
             action = "inactive";
            }
        }
    });
    }

    if(action == 'inactive')
    {
    action = 'active';
    load_country_data(limit, start,category,sub_category);
    }
    $(window).scroll(function(){
    if($(window).scrollTop() + $(window).height() > $("#load_data").height() && action == 'inactive')
    {
    action = 'active';
    start = start + limit;
    setTimeout(function(){
    load_country_data(limit, start,category,sub_category);
    }, 1000);
    }
    });
    <?php
}
else if(isset($_GET['category']) && isset($_GET['single']))
{
    ?>
    var limit = 20;
    var start = 0;
    var action = 'inactive';
    function load_country_data(limit, start,category)
    {
    $.ajax({
        url:"ajax.php",
        method:"POST",
        data:{limit:limit, start:start,category:category},
        cache:false,
        success:function(data)
        {

            $('#load_data').append(data);
            if($("#check").val() == 0)
            {
             $('#load_data_message').html("<div class='mb-3' align=right style='margin-top=-30px;'><button type='button' class='btn btn-outline-dark' id='no-data'>No More Data Found</button></div>");
             action = 'active';
            }
            else
            {
             $('#load_data_message').html("<div class='mb-3' align=right style='margin-top=-30px;'><button type='button' class='btn btn-outline-dark'>Please Wait....</button></div>");
             action = "inactive";
            }
        }
    });
    }

    if(action == 'inactive')
    {
    action = 'active';
    load_country_data(limit, start,category);
    }
    $(window).scroll(function(){
    if($(window).scrollTop() + $(window).height() > $("#load_data").height() && action == 'inactive')
    {
    action = 'active';
    start = start + limit;
    setTimeout(function(){
    load_country_data(limit, start,category);
    }, 1000);
    }
    });
    <?php
}
else if(isset($_GET['all']))
{
    ?>
    var limit = 20;
    var start = 0;
    var action = 'inactive';
    function load_country_data(limit, start)
    {
    $.ajax({
        url:"ajax.php",
        method:"POST",
        data:{limit:limit, start:start,all:1},
        cache:false,
        success:function(data)
        {

            $('#load_data').append(data);
            if($("#check").val() == 0)
            {
             $('#load_data_message').html("<div class='mb-3' align=right style='margin-top=-30px;'><button type='button' class='btn btn-outline-dark' id='no-data'>No More Data Found</button></div>");
             action = 'active';
            }
            else
            {
             $('#load_data_message').html("<div class='mb-3' align=right style='margin-top=-30px;'><button type='button' class='btn btn-outline-dark'>Please Wait....</button></div>");
             action = "inactive";
            }
        }
    });
    }

    if(action == 'inactive')
    {
    action = 'active';
    load_country_data(limit, start);
    }
    $(window).scroll(function(){
    if($(window).scrollTop() + $(window).height() > $("#load_data").height() && action == 'inactive')
    {
    action = 'active';
    start = start + limit;
    setTimeout(function(){
    load_country_data(limit, start);
    }, 1000);
    }
    });
    <?php
}


//search
else if(isset($_GET['search']))
{
    ?>
    var search = "<?php echo $_GET['search']; ?>";
    var limit = 20;
    var start = 0;
    var action = 'inactive';
    function load_country_data(limit, start,search)
    {
    $.ajax({
        url:"search_shop.php",
        method:"POST",
        data:{limit:limit, start:start,search:search},
        cache:false,
        success:function(data)
        {
            
            $('#load_data').append(data);
            if($("#check").val() == 0)
            {
             $('#load_data_message').html("<div class='mb-3' align=right style='margin-top=-30px;'><button type='button' class='btn btn-outline-dark' id='no-data'>No More Data Found</button></div>");
             action = 'active';
            }
            else
            {
             $('#load_data_message').html("<div class='mb-3' align=right style='margin-top=-30px;'><button type='button' class='btn btn-outline-dark'>Please Wait....</button></div>");
             action = "inactive";
            }
        }
    });
    }

    if(action == 'inactive')
    {
    action = 'active';
    load_country_data(limit, start,search);
    }
    $(window).scroll(function(){
    if($(window).scrollTop() + $(window).height() > $("#load_data").height() && action == 'inactive')
    {
    action = 'active';
    start = start + limit;
    setTimeout(function(){
    load_country_data(limit, start,search);
    }, 1000);
    }
    });
    <?php
}


//price
else if(isset($_GET['price']))
{
    ?>
    var search = "<?php echo $_GET['price']; ?>";
    var limit = 20;
    var start = 0;
    var action = 'inactive';
    function load_country_data(limit, start)
    {
    $.ajax({
        url:"ajax.php",
        method:"POST",
        data:{limit:limit, start:start,price:1},
        cache:false,
        success:function(data)
        {
            $('#load_data').append(data);
            if($("#check").val() == 0)
            {
             $('#load_data_message').html("<div class='mb-3' align=right style='margin-top=-30px;'><button type='button' class='btn btn-outline-dark' id='no-data'>No More Data Found</button></div>");
             action = 'active';
            }
            else
            {
             $('#load_data_message').html("<div class='mb-3' align=right style='margin-top=-30px;'><button type='button' class='btn btn-outline-dark'>Please Wait....</button></div>");
             action = "inactive";
            }
        }
    });
    }

    if(action == 'inactive')
    {
    action = 'active';
    load_country_data(limit, start);
    }
    $(window).scroll(function(){
    if($(window).scrollTop() + $(window).height() > $("#load_data").height() && action == 'inactive')
    {
    action = 'active';
    start = start + limit;
    setTimeout(function(){
    load_country_data(limit, start);
    }, 1000);
    }
    });
    <?php
}

else if(isset($_GET['discount']))
{
    ?>
    var search = "<?php echo $_GET['discount']; ?>";
    var limit = 20;
    var start = 0;
    var action = 'inactive';
    function load_country_data(limit, start)
    {
    $.ajax({
        url:"ajax.php",
        method:"POST",
        data:{limit:limit, start:start,discount:1},
        cache:false,
        success:function(data)
        {
            $('#load_data').append(data);
            if($("#check").val() == 0)
            {
             $('#load_data_message').html("<div class='mb-3' align=right style='margin-top=-30px;'><button type='button' class='btn btn-outline-dark' id='no-data'>No More Data Found</button></div>");
             action = 'active';
            }
            else
            {
             $('#load_data_message').html("<div class='mb-3' align=right style='margin-top=-30px;'><button type='button' class='btn btn-outline-dark'>Please Wait....</button></div>");
             action = "inactive";
            }
        }
    });
    }

    if(action == 'inactive')
    {
    action = 'active';
    load_country_data(limit, start);
    }
    $(window).scroll(function(){
    if($(window).scrollTop() + $(window).height() > $("#load_data").height() && action == 'inactive')
    {
    action = 'active';
    start = start + limit;
    setTimeout(function(){
    load_country_data(limit, start);
    }, 1000);
    }
    });
    <?php
}
else
{
    if (isset($_COOKIE['user_id'])) {
        ?>location.replace("index.php");<?php
    }
    else
    {
        ?>location.replace("../index.php");<?php
    }
}
?>
function check_wishlist(pid,user,i){
    $.ajax({
        url:"ajax.php",
        method:"POST",
        data:{user:user,pid:pid},
        cache:false,
        success:function(data)
        {
                if(data == 0)
                {
                    
                    $("#empty-heart"+i).remove();
                    $("#wishlist"+i).append('<span id="full-heart'+i+'" class="et-icon et-heart" onclick="check_wishlist('+pid+','+user+','+i+');"></span>');
                    $("#wishlist-counter").html(parseInt($("#wishlist-counter").html())-1);
                }
                else if(data == 1)
                {
                    
                    $("#full-heart"+i).remove();
                    $("#wishlist"+i).append('<span id="empty-heart'+i+'" class="et-icon et-heart-fill" onclick="check_wishlist('+pid+','+user+','+i+');"></span>');
                    $("#wishlist-counter").html(parseInt($("#wishlist-counter").html())+1);
                }
        }
    });
}
</script>
<?php include_once("search.php"); ?>