<?php 
include_once '../db/connection.php';
if(isset($_COOKIE['user_id']))
{
    $user_id = $_COOKIE['user_id'];
    $sql = mysqli_query($con,"select * from wishlist where user_id='$user_id'");
}
?>
<!doctype html>
<html lang="en-US">
    <head>
        <script>
            if(navigator.userAgent.match(/MSIE|Internet Explorer/i) || navigator.userAgent.match(/Trident\/7\..*?rv:11/i)) {
                var href = document.location.href;
                if(!href.match(/[?&]nowprocket/)) {
                    if(href.indexOf("?") == -1) {
                        if(href.indexOf("#") == -1) {
                            document.location.href = href + "?nowprocket=1"
                        } else {
                            document.location.href = href.replace("#", "?nowprocket=1#")
                        }
                    } else {
                        if(href.indexOf("#") == -1) {
                            document.location.href = href + "&nowprocket=1"
                        } else {
                            document.location.href = href.replace("#", "&nowprocket=1#")
                        }
                    }
                }
            }
        </script>
        <script>
            class RocketLazyLoadScripts {
                constructor(e) {
                    this.triggerEvents = e, this.eventOptions = {
                        passive: !0
                    }, this.userEventListener = this.triggerListener.bind(this), this.delayedScripts = {
                        normal: [],
                        async: [],
                        defer: []
                    }, this.allJQueries = []
                }
                _addUserInteractionListener(e) {
                    this.triggerEvents.forEach((t => window.addEventListener(t, e.userEventListener, e.eventOptions)))
                }
                _removeUserInteractionListener(e) {
                    this.triggerEvents.forEach((t => window.removeEventListener(t, e.userEventListener, e.eventOptions)))
                }
                triggerListener() {
                    this._removeUserInteractionListener(this), "loading" === document.readyState ? document.addEventListener("DOMContentLoaded", this._loadEverythingNow.bind(this)) : this._loadEverythingNow()
                }
                async _loadEverythingNow() {
                    this._delayEventListeners(), this._delayJQueryReady(this), this._handleDocumentWrite(), this._registerAllDelayedScripts(), this._preloadAllScripts(), await this._loadScriptsFromList(this.delayedScripts.normal), await this._loadScriptsFromList(this.delayedScripts.defer), await this._loadScriptsFromList(this.delayedScripts.async), await this._triggerDOMContentLoaded(), await this._triggerWindowLoad(), window.dispatchEvent(new Event("rocket-allScriptsLoaded"))
                }
                _registerAllDelayedScripts() {
                    document.querySelectorAll("script[type=rocketlazyloadscript]").forEach((e => {
                        e.hasAttribute("src") ? e.hasAttribute("async") && !1 !== e.async ? this.delayedScripts.async.push(e) : e.hasAttribute("defer") && !1 !== e.defer || "module" === e.getAttribute("data-rocket-type") ? this.delayedScripts.defer.push(e) : this.delayedScripts.normal.push(e) : this.delayedScripts.normal.push(e)
                    }))
                }
                async _transformScript(e) {
                    return await this._requestAnimFrame(), new Promise((t => {
                        const n = document.createElement("script");
                        let i;
                        [...e.attributes].forEach((e => {
                            let t = e.nodeName;
                            "type" !== t && ("data-rocket-type" === t && (t = "type", i = e.nodeValue), n.setAttribute(t, e.nodeValue))
                        })), e.hasAttribute("src") && this._isValidScriptType(i) ? (n.addEventListener("load", t), n.addEventListener("error", t)) : (n.text = e.text, t()), e.parentNode.replaceChild(n, e)
                    }))
                }
                _isValidScriptType(e) {
                    return !e || "" === e || "string" == typeof e && ["text/javascript", "text/x-javascript", "text/ecmascript", "text/jscript", "application/javascript", "application/x-javascript", "application/ecmascript", "application/jscript", "module"].includes(e.toLowerCase())
                }
                async _loadScriptsFromList(e) {
                    const t = e.shift();
                    return t ? (await this._transformScript(t), this._loadScriptsFromList(e)) : Promise.resolve()
                }
                _preloadAllScripts() {
                    var e = document.createDocumentFragment();
                    [...this.delayedScripts.normal, ...this.delayedScripts.defer, ...this.delayedScripts.async].forEach((t => {
                        const n = t.getAttribute("src");
                        if(n) {
                            const t = document.createElement("link");
                            t.href = n, t.rel = "preload", t.as = "script", e.appendChild(t)
                        }
                    })), document.head.appendChild(e)
                }
                _delayEventListeners() {
                    let e = {};
            
                    function t(t, n) {
                        ! function(t) {
                            function n(n) {
                                return e[t].eventsToRewrite.indexOf(n) >= 0 ? "rocket-" + n : n
                            }
                            e[t] || (e[t] = {
                                originalFunctions: {
                                    add: t.addEventListener,
                                    remove: t.removeEventListener
                                },
                                eventsToRewrite: []
                            }, t.addEventListener = function() {
                                arguments[0] = n(arguments[0]), e[t].originalFunctions.add.apply(t, arguments)
                            }, t.removeEventListener = function() {
                                arguments[0] = n(arguments[0]), e[t].originalFunctions.remove.apply(t, arguments)
                            })
                        }(t), e[t].eventsToRewrite.push(n)
                    }
            
                    function n(e, t) {
                        let n = e[t];
                        Object.defineProperty(e, t, {
                            get: () => n || function() {},
                            set(i) {
                                e["rocket" + t] = n = i
                            }
                        })
                    }
                    t(document, "DOMContentLoaded"), t(window, "DOMContentLoaded"), t(window, "load"), t(window, "pageshow"), t(document, "readystatechange"), n(document, "onreadystatechange"), n(window, "onload"), n(window, "onpageshow")
                }
                _delayJQueryReady(e) {
                    let t = window.jQuery;
                    Object.defineProperty(window, "jQuery", {
                        get: () => t,
                        set(n) {
                            if(n && n.fn && !e.allJQueries.includes(n)) {
                                n.fn.ready = n.fn.init.prototype.ready = function(t) {
                                    e.domReadyFired ? t.bind(document)(n) : document.addEventListener("rocket-DOMContentLoaded", (() => t.bind(document)(n)))
                                };
                                const t = n.fn.on;
                                n.fn.on = n.fn.init.prototype.on = function() {
                                    if(this[0] === window) {
                                        function e(e) {
                                            return e.split(" ").map((e => "load" === e || 0 === e.indexOf("load.") ? "rocket-jquery-load" : e)).join(" ")
                                        }
                                        "string" == typeof arguments[0] || arguments[0] instanceof String ? arguments[0] = e(arguments[0]) : "object" == typeof arguments[0] && Object.keys(arguments[0]).forEach((t => {
                                            delete Object.assign(arguments[0], {
                                                [e(t)]: arguments[0][t]
                                            })[t]
                                        }))
                                    }
                                    return t.apply(this, arguments), this
                                }, e.allJQueries.push(n)
                            }
                            t = n
                        }
                    })
                }
                async _triggerDOMContentLoaded() {
                    this.domReadyFired = !0, await this._requestAnimFrame(), document.dispatchEvent(new Event("rocket-DOMContentLoaded")), await this._requestAnimFrame(), window.dispatchEvent(new Event("rocket-DOMContentLoaded")), await this._requestAnimFrame(), document.dispatchEvent(new Event("rocket-readystatechange")), await this._requestAnimFrame(), document.rocketonreadystatechange && document.rocketonreadystatechange()
                }
                async _triggerWindowLoad() {
                    await this._requestAnimFrame(), window.dispatchEvent(new Event("rocket-load")), await this._requestAnimFrame(), window.rocketonload && window.rocketonload(), await this._requestAnimFrame(), this.allJQueries.forEach((e => e(window).trigger("rocket-jquery-load"))), window.dispatchEvent(new Event("rocket-pageshow")), await this._requestAnimFrame(), window.rocketonpageshow && window.rocketonpageshow()
                }
                _handleDocumentWrite() {
                    const e = new Map;
                    document.write = document.writeln = function(t) {
                        const n = document.currentScript;
                        n || console.error("WPRocket unable to document.write this: " + t);
                        const i = document.createRange(),
                            r = n.parentElement;
                        let a = e.get(n);
                        void 0 === a && (a = n.nextSibling, e.set(n, a));
                        const o = document.createDocumentFragment();
                        i.setStart(o, 0), o.appendChild(i.createContextualFragment(t)), r.insertBefore(o, a)
                    }
                }
                async _requestAnimFrame() {
                    return new Promise((e => requestAnimationFrame(e)))
                }
                static run() {
                    const e = new RocketLazyLoadScripts(["keydown", "mousemove", "touchmove", "touchstart", "touchend", "wheel"]);
                    e._addUserInteractionListener(e)
                }
            }
            RocketLazyLoadScripts.run();
        </script>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <title>Wishlist | Fashion</title>
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
        <link rel="icon" type="image/x-icon" href="../assets/img/favicon.png"/>
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
        <link href="../plugins/notification/snackbar/snackbar.min.css" rel="stylesheet" type="text/css" />
        <noscript>
            <style>
                .woocommerce-product-gallery {
                opacity: 1 !important;
                }
            </style>
        </noscript>
        
        


        <noscript>
            <style> 
                .wpb_animate_when_almost_visible { opacity: 1; }
            </style>
        </noscript>

        <noscript>
            <style id="rocket-lazyload-nojs-css">
                .rll-youtube-player, [data-lazy-src]{display:none !important;}
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

    <body class="page-template-default page page-id-10 wp-embed-responsive theme-goya woocommerce-account woocommerce-page woocommerce-lost-password woocommerce-no-js woo-variation-swatches wvs-theme-goya-child wvs-theme-child-goya wvs-style-squared wvs-attr-behavior-blur wvs-tooltip wvs-css wvs-show-label blog-id-3 wp-gallery-popup has-top-bar header-sticky header-full-width floating-labels login-single-column et-woocommerce-account-login header-border-1 page-header-regular sticky-header-dark header-transparent-mobiles dark-title wpb-js-composer js-comp-ver-6.6.0 vc_responsive">
		<div id="wrapper" class="open">
			<div class="click-capture"></div>
			<div class="page-wrapper-inner">
				<!-- header start -->
				<?php include("index_header.php"); ?>
				<!-- header end  -->
		
                <!-- Body Start --> 
                <div role="main" class="site-content">
                    <div class="header-spacer"></div>
                    <div class="hero-header page-padding post-8 page type-page status-publish hentry">
                        <div class="regular-title">
                            <div class="container hero-header-container">
                                <div class="row">
                                <header class="col-lg-8 woocommerce-products-header">
                                    <h1 class="page-title" itemprop="name headline">Wishlist</h1>
                                </header>
                                </div>
                            </div>
                        </div>
                    </div>
                        <?php
                        if(!isset($_COOKIE['user_id']))
                        {
                            ?>
                            <div class="hero-header page-padding post-8 page type-page status-publish hentry">
                                <div class="regular-title">
                                    <div class="container hero-header-container">
                                        <div class="row">
                                        <header class="col-lg-8 woocommerce-products-header">
                                            <h1 class="page-title" itemprop="name headline">You Need To Login First</h1>
                                        </header>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        else if(isset($_COOKIE['user_id']) && mysqli_num_rows($sql) <= 0)
                        {
                            ?>
                            <div class="hero-header page-padding post-8 page type-page status-publish hentry">
                                <div class="regular-title">
                                    <div class="container hero-header-container">
                                        <div class="row">
                                        <header class="col-lg-8 woocommerce-products-header">
                                            <h1 class="page-title" itemprop="name headline">Your Wishlist is Empty</h1>
                                        </header>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php

                        }
                        else
                        {
                            ?>
                            <div class="container">
                                <div class="row justify-content-md-center">
                                    <div class="col-lg-8 main-content">
                                        <div class="post-content entry-content no-vc">
                                        <form id="yith-wcwl-form" action="" method="post" class="woocommerce yith-wcwl-form wishlist-fragment">
                                            <!-- WISHLIST TABLE -->
                                            <?php 
                                            while($fetch = mysqli_fetch_assoc($sql))
                                            {
                                                $product_id = $fetch['product_id'];

                                                $product_sql = mysqli_fetch_assoc(mysqli_query($con,"select * from product where product_id = '$product_id'"));
                                                ?>
                                                <table class="shop_table cart wishlist_table wishlist_view traditional responsive   " data-pagination="no" data-per-page="5" data-page="1" data-id="8313" data-token="UP4TNIPG21DL" style="margin-top: 0px;">
                                                    <thead>
                                                        <tr>
                                                        <th class="product-remove">
                                                            <span class="nobr">
                                                            </span>
                                                        </th>
                                                        <th class="product-thumbnail"></th>
                                                        <th class="product-name">
                                                            <span class="nobr">
                                                            Product name            </span>
                                                        </th>
                                                        <th class="product-price">
                                                            <span class="nobr">
                                                            Unit price              </span>
                                                        </th>
                                                        <th class="product-stock-status">
                                                            <span class="nobr">
                                                            Stock status                </span>
                                                        </th>
                                                        <th class="product-add-to-cart">
                                                            <span class="nobr">
                                                            </span>
                                                        </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="wishlist-items-wrapper">
                                                        <tr id="yith-wcwl-row-3891" class="row">
                                                        <td class="product-remove col-sm-1">
                                                            <div>
                                                                <a href="wishlist.php?remove=<?php echo $product_id; ?>" class="remove remove_from_wishlist" title="Remove this product">×</a>
                                                            </div>
                                                        </td>
                                                        <td class="product-thumbnail col-sm-2">
                                                            <a href="https://goya.everthemes.com/demo-fashion/product/micro-form-bag/">
                                                            <img width="450" height="450" src="../db/images/<?php echo $product_sql['image1']; ?>" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" srcset="../db/images/<?php echo $product_sql['image1']; ?>" sizes="(max-width: 450px) 100vw, 450px">                        
                                                            </a>
                                                        </td>
                                                        <td class="product-name col-sm-3">
                                                            <a href="https://goya.everthemes.com/demo-fashion/product/micro-form-bag/">
                                                            <?php echo $product_sql['product_name']; ?>
                                                            </a>
                                                        </td>
                                                        <td class="product-price col-sm-1">
                                                            <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">Rs.</span><?php echo $product_sql['price']; ?></bdi></span>
                                                        </td>
                                                        <td class="product-stock-status col-sm-2">
                                                            <span class="wishlist-in-stock"><?php if($product_sql['total_items'] <= 0) { echo "Out of Stock"; } else {echo "In Stock" ; }?></span>
                                                        </td>
                                                        <td class="product-add-to-cart col-sm-3">
                                                            <!-- Date added -->
                                                            <span class="dateadded">Added on: <?php echo date("d-m-Y", strtotime($fetch['modify_date'])); ?></span>
                                                            <!-- Add to cart button -->
                                                            <script type="text/javascript">
                                                                var user_id = <?php echo $user_id; ?>;
                                                                var product_id = <?php echo $product_id; ?>;
                                                            </script>
                                                            <?php
                                                            if($product_sql['total_items'] != 0)
                                                            {
                                                                $crt = mysqli_num_rows(mysqli_query($con,"select * from cart where user_id='$user_id' and product_id='$product_id'"));
                                                                ?>
                                                                <button type= "button" onclick="cart(user_id,<?php echo $product_id; ?>,1);" class="product_type_simple add_to_cart_button ajax_add_to_cart add_to_cart alt w-100" aria-label="Add “Micro Form Bag” to your cart" rel="nofollow"><span class="text" id="cart-btn<?php echo $product_id; ?>"><?php if($crt>0){echo "Added to Cart"; } else { echo "Add to Cart"; }?></span><span class="icon"><span class="et-icon et-shopping-bag"></span></span></button>
                                                                <?php
                                                            }
                                                            else
                                                            {
                                                                  
                                                            }
                                                            ?>     
                                                            <!-- Change wishlist -->
                                                            <!-- Remove from wishlist -->
                                                        </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <?php
                                            }
                                            ?>
                                            
                                            <div class="yith_wcwl_wishlist_footer" <?php if(mysqli_num_rows($sql) <= 0) { echo 'style=margin-top:200px;margin-bottom:200px;'; } ?> >
                                                <!-- Sharing section -->
                                                <div class="yith-wcwl-share">
                                                    <h4 class="yith-wcwl-share-title">Share on:</h4>
                                                    <ul>
                                                    <li class="share-button">
                                                        <a target="_blank" rel="noopener" class="facebook" href="#" title="Facebook">
                                                        <i class="fa fa-facebook"></i>              </a>
                                                    </li>
                                                    <li class="share-button">
                                                        <a target="_blank" rel="noopener" class="twitter" href="https://twitter.com/share?url=https%3A%2F%2Fgoya.everthemes.com%2Fdemo-fashion%2Fwishlist%2Fview%2FUP4TNIPG21DL%2F&amp;text=" title="Twitter">
                                                        <i class="fa fa-twitter"></i>               </a>
                                                    </li>
                                                    <li class="share-button">
                                                        <a target="_blank" rel="noopener" class="pinterest" href="http://pinterest.com/pin/create/button/?url=https%3A%2F%2Fgoya.everthemes.com%2Fdemo-fashion%2Fwishlist%2Fview%2FUP4TNIPG21DL%2F&amp;description=&amp;media=" title="Pinterest" onclick="window.open(this.href); return false;">
                                                        <i class="fa fa-pinterest"></i>             </a>
                                                    </li>
                                                    <li class="share-button">
                                                        <a class="email" href="mailto:?subject=My+wishlist+on+Goya+Fashion&amp;body=https%3A%2F%2Fgoya.everthemes.com%2Fdemo-fashion%2Fwishlist%2Fview%2FUP4TNIPG21DL%2F&amp;title=My+wishlist+on+Goya+Fashion" title="Email">
                                                        <i class="fa fa-envelope-o"></i>                </a>
                                                    </li>
                                                    <li class="share-button">
                                                        <a class="whatsapp" href="https://web.whatsapp.com/send?text=My+wishlist+on+Goya+Fashion - https%3A%2F%2Fgoya.everthemes.com%2Fdemo-fashion%2Fwishlist%2Fview%2FUP4TNIPG21DL%2F" data-action="share/whatsapp/share" target="_blank" rel="noopener" title="WhatsApp">
                                                        <i class="fa fa-whatsapp"></i>              </a>
                                                    </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <input type="hidden" id="yith_wcwl_edit_wishlist" name="yith_wcwl_edit_wishlist" value="c909e5a3d7"><input type="hidden" name="_wp_http_referer" value="/demo-fashion/wishlist/">   <input type="hidden" value="UP4TNIPG21DL" name="wishlist_id" id="wishlist_id">
                                        </form>
                                        <p></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div> 
            </div>
        </div>
        
        <!--body end-->

        <!-- footer start  -->
			<?php include("index_footer.php"); ?>
			<!-- footer end -->
        <!-- scroll up btn start -->
		<!-- search panel desktop  -->
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
        <link href="../plugins/notification/snackbar/snackbar.min.css" rel="stylesheet" type="text/css" />
    </body>
</html>
<script type="text/javascript">
    function cart(user_id,product_id,items){
        $.ajax({
            url:"ajax.php",
            method:"POST",
            data:{user_id:user_id, product_id:product_id,total_items:items},
            cache:false,
            success:function(data)
            {
                if(data == '0')
                {
                    Snackbar.show({ text: 'Product Already Added in Cart', duration: 4000, pos: 'bottom-left' });
                }
                else if(data == '1')
                {
                    Snackbar.show({ text: 'Product Added in Cart', duration: 4000, pos: 'bottom-left' });
                    $("#cart-counter").html(parseInt($("#cart-counter").html())+1);
                    $("#cart-btn"+product_id).html("Added to Cart");
                }
                else if(data == '2')
                {
                    Snackbar.show({ text: 'Something Went Wrong..', duration: 4000, pos: 'bottom-right' });
                }
            }
        });
    }
</script>
<?php
    if(isset($_GET['remove']))
    {
        $product_id = $_GET['remove'];
        $delete_wishlist = mysqli_query($con,"delete from wishlist where user_id='$user_id' and product_id='$product_id'");
        if($delete_wishlist == true)
        {
            ?><script type="text/javascript">
                Snackbar.show({ text: 'Item Removed', duration: 2000, });
                location.replace("wishlist.php");
            </script><?php
        }
    }
?>
<?php include_once("search.php"); ?>