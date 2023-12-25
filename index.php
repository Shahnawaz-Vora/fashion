<?php
	if (isset($_COOKIE['user_id'])) {
        ?><script type="text/javascript">location.replace("user/index.php");</script><?php
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
      <title>Fashion</title>
      <link rel="stylesheet" href="css/index.css" media="all" data-minify="1" />
      <link rel="stylesheet" href="css/index1.css" media="all" data-minify="1" />
      <link rel="icon" type="image/x-icon" href="assets/img/favicon.png"/>
      <script src='js/jquery.min.js?ver=3.5.1'></script>
      <script src='js/jquery-migrate.min.js?ver=3.3.2'></script>
      <script src='js/jquery.blockUI.min.js?ver=2.70'></script>
      <script src='js/add-to-cart.min.js?ver=5.5.1'></script>
      <script data-minify="1" src='js/woocommerce-add-to-cart.js?ver=1626583894'></script>
      <script src='js/underscore.min.js?ver=1.8.3'></script>
      <script src='js/jquery.cookie.min.js?ver=1.4.1'></script>
      <script src='js/wp-util.min.js?ver=5.7.2'></script>
      <script src='js/add-to-cart-variation.min.js?ver=5.5.1'></script>
      <script src='js/frontend.min.js?ver=1.1.17'></script>
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
      <link rel="stylesheet" href="css/index2.css">
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
				<?php include("header.php"); ?>
				<!-- header end  -->
				<div role="main" class="site-content">
				<div class="header-spacer"></div>
				<div class="page-padding post-861 page type-page status-publish hentry">
					

					<!-- slider start  -->
					<?php 
					include_once("db/connection.php");
					$slider_sql = mysqli_query($con,"select * from slider");
					?>
					<div id="main-slider-row" class="sec_row container-fluid">
					    <div class="vc_row wpb_row vc_row-fluid no-padding align-center">
					        <div class="wpb_column vc_column_container vc_col-sm-12 et-dark-column">
					            <div class="vc_column-inner">
					                <div class="wpb_wrapper">
					                    <div id="et-banner-slider-6100de4899e3b" class="et-banner-slider slick slick-slider slick-controls-gray slick-dots-inside" data-navigation="true" data-pagination="true" data-autoplay="true" data-autoplay-speed="4000" data-infinite="true" data-pause="true" data-columns="1">
					                        <?php
					                        while($slider_fetch = mysqli_fetch_assoc($slider_sql))
					                        {
					                            ?>
					                            <div class="et-banner-6100de4899e8c et-banner content-full  height_90 image-type-css text-color-dark hover-effect hover-zoom ">
					                                <div data-bg="db/images/<?php echo $slider_fetch['image']; ?>" class="et-banner-image vh-height rocket-lazyload" role="img" data-image="db/images/<?php echo $slider_fetch['image']; ?>"></div>
					                                <div class="et-banner-content">
					                                    <div class="et-banner-content-inner container">
					                                        <div class="et-banner-text h_right v_center align_right">
					                                            <div class="et-banner-text-inner">
					                                                <div class="et-banner-subtitle  color- tag_style"><?php echo $slider_fetch['tag']; ?></div>
					                                                <h2 class="et-banner-title color- xxlarge"><?php echo $slider_fetch['description']; ?></h2>
					                                                <a href="user/product.php?product_no=<?php echo $slider_fetch['product_id']; ?>" class="et-banner-link button et_btn link color- menuu-items">Shop Now</a>
					                                            </div>
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
					    </div>
					</div>
					<!-- slider end  -->
					

					<!-- buy container start -->
					<div class="sec_row container">
					    <div class="vc_row wpb_row vc_row-fluid vc_custom_1579142078604">
					        <div class="wpb_column vc_column_container vc_col-sm-12 et-dark-column">
					            <div class="vc_column-inner">
					                <div class="wpb_wrapper">
					                    <div class="vc_row wpb_row vc_inner vc_row-fluid max_width vc_row-o-equal-height vc_row-o-content-middle vc_row-flex">
					                        <div class="wpb_column vc_column_container animation bottom-to-top vc_col-sm-12 vc_col-md-4 et-dark-column">
					                            <div class="vc_column-inner  vc_custom_1579111806249">
					                                <div class="wpb_wrapper">
					                                    <div class="et-banner-6100de489bca7 et-banner content-full  image-type-fluid text-color-dark hover-effect hover-zoom ">
					                                        <img width="768" height="976" src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%20768%20976'%3E%3C/svg%3E" class="attachment-medium_large size-medium_large" alt="" data-lazy-srcset="img/banner-shirt2-768x976.jpg.webp" data-lazy-src="img/banner-shirt2-768x976.jpg.webp" />
					                                        <div class="et-banner-content">
					                                            <div class="et-banner-content-inner container">
					                                                <div class="et-banner-text h_center v_center align_center">
					                                                    <div class="et-banner-text-inner">
					                                                        <h2 class="et-banner-title color-light medium">Button Up Shirts</h2>
					                                                        <a href="user/shop.php?search=shirt" class="et-banner-link button et_btn solid color-light " style="text-decoration: none;">Buy Now</a>
					                                                    </div>
					                                                </div>
					                                            </div>
					                                        </div>
					                                    </div>
					                                </div>
					                            </div>
					                        </div>
					                        <div class="wpb_column vc_column_container animation bottom-to-top vc_col-sm-12 vc_col-md-4 et-dark-column">
					                            <div class="vc_column-inner  vc_custom_1579111815424">
					                                <div class="wpb_wrapper">
					                                    <div class="et-banner-6100de489c14c et-banner content-full  image-type-fluid text-color-dark hover-effect hover-zoom ">
					                                        <img width="768" height="976" src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%20768%20976'%3E%3C/svg%3E" class="attachment-medium_large size-medium_large" alt="" data-lazy-srcset="img/banner-shirt1-768x976.jpg.webp" data-lazy-sizes="(max-width: 768px) 100vw, 768px" data-lazy-src="img/banner-shirt1-768x976.jpg.webp" />
					                                        <div class="et-banner-content">
					                                            <div class="et-banner-content-inner container">
					                                                <div class="et-banner-text h_center v_center align_center">
					                                                    <div class="et-banner-text-inner">
					                                                        <h2 class="et-banner-title color-light medium">Choose your product</h2><a href="user/shop.php?price=1" class="et-banner-link button et_btn solid color-light" style="text-decoration: none;">Lowest Price</a>
					                                                    </div>
					                                                </div>
					                                            </div>
					                                        </div>
					                                    </div>
					                                </div>
					                            </div>
					                        </div>
					                        <div class="wpb_column vc_column_container animation bottom-to-top vc_col-sm-12 vc_col-md-4 et-light-column vc_col-has-fill">
					                            <div class="vc_column-inner  vc_custom_1579129543433">
					                                <div class="wpb_wrapper">
					                                    <div class="wpb_text_column wpb_content_element  ">
					                                        <div class="wpb_wrapper">
					                                            <h2 class="wpb_wrapper" style="text-align: center;">Clearance Sales</h2>
					                                            <p class="wpb_wrapper" style="text-align: center;">Up to 20% Off &amp;</p>
					                                        </div>
					                                    </div>
					                                    <div class="vc_empty_space" style="height: 20px">
					                                        <span class="vc_empty_space_inner"></span>
					                                    </div>
					                                    <div id="et-button-6100de489c8a4" class="et_btn_align_center ">
					                                        <a href="user/shop.php?discount=1" class=" et_btn button et_btn_md solid color-light   " role="button" title="Shop">
					                                            <span>Browse sales</span>
					                                        </a>
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
					<!-- buy container end  -->
					

					<!-- seperator line start  -->
					<div class="sec_row container-fluid">
						<div class="vc_row wpb_row vc_row-fluid no-padding">
							<div class="wpb_column vc_column_container vc_col-sm-12 et-dark-column">
							<div class="vc_column-inner">
								<div class="wpb_wrapper">
									<div class="vc_separator wpb_content_element vc_separator_align_center vc_sep_width_100 vc_sep_pos_align_center vc_separator_no_text vc_sep_color_grey vc_custom_1556305572662  vc_custom_1556305572662">
										<span class="vc_sep_holder vc_sep_holder_l">
										<span class="vc_sep_line"></span>
										</span>
										<span class="vc_sep_holder vc_sep_holder_r">
										<span class="vc_sep_line"></span>
										</span>
									</div>
								</div>
							</div>
							</div>
						</div>
					</div>
					<!-- seperator line end  -->


					<!-- best selling container start -->
					<div class="sec_row container">
					   <div class="vc_row wpb_row vc_row-fluid vc_custom_1579142113600">
					      <div class="wpb_column vc_column_container animation bottom-to-top vc_col-sm-12 et-dark-column">
					         <div class="vc_column-inner">
					            <div class="wpb_wrapper">
					               <div class="vc_row wpb_row vc_inner vc_row-fluid max_width align-center">
					                  <div class="text-center wpb_column vc_column_container vc_col-sm-12 vc_col-lg-6 vc_col-md-9 et-dark-column">
					                     <div class="vc_column-inner">
					                        <div class="wpb_wrapper">
					                           <div class="wpb_text_column wpb_content_element  ">
					                              <div class="wpb_wrapper">
					                                 <h2>Best Selling</h2>
					                                 <p>Take a look this product are best selling products in last few days . We assure the qualtiy of the product in lowest price</p>
					                              </div>
					                           </div>
					                        </div>
					                     </div>
					                  </div>
					               </div>
					               <div class="vc_row wpb_row vc_inner vc_row-fluid max_width">
					                  <div class="wpb_column vc_column_container vc_col-sm-12 et-dark-column">
					                     <div class="vc_column-inner">
					                        <div class="wpb_wrapper">
					                           <ul class="et-product et-main-products products row et-product-style3 hover-animation-zoom-jump products-latest-products et-no-variations">
					                              <?php 
					                                 $sql_best_selling = mysqli_query($con,"select product_id,sum(total_item) as most_sold from orders group by product_id order by most_sold desc");
					                                 $most_sold = [];
					                                 $i = 0;
					                                 while($best_selling_fetch = mysqli_fetch_assoc($sql_best_selling))
					                                 {
					                                    $product_id = $best_selling_fetch['product_id'];
					                                    $product_check = mysqli_num_rows(mysqli_query($con,"select * from product where product_id='$product_id' and total_items like('0')"));
					                                    if($product_check > 0)
					                                    {
					                                       continue;
					                                    }
					                                    else
					                                    {
					                                       $i++;
					                                       array_push($most_sold,$product_id);
					                                       if($i== 3)
					                                       {
					                                          break;
					                                       }
					                                    }
					                                 }
					                                 for($j=0;$j<=2;$j++)
					                                 {
					                                    $product_id=$most_sold[$j];
					                                    $best_selling_product = mysqli_query($con,"select * from product where product_id='$product_id'");
					                                    $best_fetch = mysqli_fetch_assoc($best_selling_product);
					                                    ?>
					                                    <li class="item et-listing-style3 col-6 col-sm-6 col-md-4 col-lg-4 small_grid_4 hover-image-load product type-product post-3894 status-publish first instock product_cat-women has-post-thumbnail shipping-taxable product-type-grouped">
					                                       <div class="product-inner animation fade">
					                                          <figure class="product_thumbnail et-image-hover">
					                                             <a href="#" title="<?php echo $best_fetch['product_name']; ?>">
					                                             <img width="450" height="450" src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%20450%20450'%3E%3C/svg%3E" class="main-image wp-post-image" alt="" data-lazy-src="db/images/<?php echo $best_fetch['image1']; ?>" />
					                                             <img width="450" height="450" src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%20450%20450'%3E%3C/svg%3E" class="product_thumbnail_hover" alt="" data-lazy-src="db/images/<?php echo $best_fetch['image2']; ?>" /></a>
					                                          </figure>
					                                          <div class="caption">
					                                             <div class="product-title">
					                                                <h3><a class="product-link" href="user/product.php?product_no=<?php echo $best_fetch['product_id']; ?>" title="<?php echo $best_fetch['product_name']; ?>"><?php echo $best_fetch['product_name']; ?></a></h3>
					                                             </div>
					                                             <div class="product_after_title">
					                                                <div class="product_after_shop_loop_price">
					                                                   <span class="price">
					                                                      <?php 
					                                                if($best_fetch['discount'] > 0)
					                                                {
					                                                  $d_price = ($best_fetch['price']*$best_fetch['discount'])/100;
					                                                  $discount_price = $best_fetch['price']-$d_price;
					                                                ?>
					                                                <del aria-hidden="true">
					                                                   <span class="woocommerce-Price-amount amount">
					                                                       <bdi>
					                                                           <span class="woocommerce-Price-currencySymbol">Rs.</span><?php echo $best_fetch['price']; ?>
					                                                       </bdi>
					                                                   </span>
					                                                </del>
					                                                <ins>
					                                                   <span class="woocommerce-Price-amount amount">
					                                                       <bdi>
					                                                           <span class="woocommerce-Price-currencySymbol">Rs.</span><?php echo $discount_price; ?>
					                                                       </bdi>
					                                                   </span>
					                                                </ins>
					                                                <?php 
					                                                }
					                                                else
					                                                {
					                                                ?>
					                                                <ins>
					                                                   <span class="woocommerce-Price-amount amount">
					                                                       <bdi>
					                                                           <span class="woocommerce-Price-currencySymbol">Rs.</span><?php echo $best_fetch['price']; ?>
					                                                       </bdi>
					                                                   </span>
					                                                </ins>
					                                                <?php
					                                                }
					                                              ?>
					                                                   </span>
					                                                </div>
					                                             </div>
					                                          </div>                                    
					                                       </div>
					                                    </li>
					                                    <?php
					                                 }
					                                 ?>
					                           </ul>
					                        </div>
					                     </div>
					                  </div>
					               </div>
					            </div>
					         </div>
					      </div>
					   </div>
					</div>
					<!-- best selling container end  -->
					

					<!-- trending outfits start-->
					<div class="sec_row container">
					   <div class="vc_row wpb_row vc_row-fluid vc_custom_1579142142505">
					      <div class="wpb_column vc_column_container animation bottom-to-top vc_col-sm-12 et-dark-column">
					         <div class="vc_column-inner">
					            <div class="wpb_wrapper">
					               <div class="vc_row wpb_row vc_inner vc_row-fluid max_width align-center">
					                  <div class="text-center wpb_column vc_column_container vc_col-sm-12 vc_col-lg-6 vc_col-md-9 et-dark-column">
					                     <div class="vc_column-inner">
					                        <div class="wpb_wrapper">
					                           <div class="wpb_text_column wpb_content_element  ">
					                              <div class="wpb_wrapper">
					                                 <h2>Trending Outfits
					                                 </h2>
					                                 <p>Amazing collection of newest products which are trending in market now a days Try it Once.
					                                 </p>
					                              </div>
					                           </div>
					                        </div>
					                     </div>
					                  </div>
					               </div>
					               <div class="vc_row wpb_row vc_inner vc_row-fluid max_width">
					                  <div class="wpb_column vc_column_container vc_col-sm-12 et-dark-column">
					                     <div class="vc_column-inner">
					                        <div class="wpb_wrapper">
					                           <ul class="et-product et-main-products products row et-product-style2 hover-animation-zoom-jump products-by-category et-no-variations">
					                              <?php 
					                              $latest_product_sql = mysqli_query($con,"select * from product where total_items not like('0') order by product_id desc limit 4");
					                              while($latest_product_fetch = mysqli_fetch_assoc($latest_product_sql))
					                              {
					                                 ?>
					                                 <li class="item et-listing-style2 col-6 col-sm-6 col-md-4 col-lg-3 small_grid_5 hover-image-load product type-product post-3894 status-publish last instock product_cat-women has-post-thumbnail shipping-taxable product-type-grouped">
					                                    <div class="product-inner animation fade">
					                                       <figure class="product_thumbnail et-image-hover">
					                                          <a href="user/product.php?product_no=<?php echo $latest_product_fetch['product_id']; ?>" title="<?php echo $latest_product_fetch['product_name']; ?>">
					                                          <img width="450" height="450" src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%20450%20450'%3E%3C/svg%3E" class="main-image wp-post-image" alt="" data-lazy-src="db/images/<?php echo $latest_product_fetch['image1']; ?>" />
					                                          <img width="450" height="450" src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%20450%20450'%3E%3C/svg%3E" class="product_thumbnail_hover" alt="" data-lazy-src="db/images/<?php echo $latest_product_fetch['image2']; ?>" />
					                                          </a>
					                                          
					                                       </figure>
					                                       <div class="caption">
					                                          <div class="product-title">
					                                             <h3>
					                                                <a class="product-link" href="product.php?product_no=<?php echo $latest_product_fetch['product_id']; ?>" title="<?php echo $latest_product_fetch['product_name']; ?>"><?php echo $latest_product_fetch['product_name']; ?>
					                                                </a>
					                                             </h3>
					                                          </div>
					                                          <div class="product_after_title">
					                                             <div class="product_after_shop_loop_price">
					                                                <span class="price">
					                                                    <?php 
					                                                       if($latest_product_fetch['discount'] > 0)
					                                                       {
					                                                           $d_price = ($latest_product_fetch['price']*$latest_product_fetch['discount'])/100;
					                                                           $discount_price = $latest_product_fetch['price']-$d_price;
					                                                       ?>
					                                                           <del aria-hidden="true">
					                                                               <span class="woocommerce-Price-amount amount">
					                                                                   <bdi>
					                                                                       <span class="woocommerce-Price-currencySymbol">Rs.</span><?php echo $latest_product_fetch['price']; ?>
					                                                                   </bdi>
					                                                               </span>
					                                                           </del>
					                                                           <ins>
					                                                               <span class="woocommerce-Price-amount amount">
					                                                                   <bdi>
					                                                                       <span class="woocommerce-Price-currencySymbol">Rs.</span><?php echo $discount_price; ?>
					                                                                   </bdi>
					                                                               </span>
					                                                           </ins>
					                                                       <?php 
					                                                       }
					                                                       else
					                                                       {
					                                                       ?>
					                                                           <ins>
					                                                               <span class="woocommerce-Price-amount amount">
					                                                                   <bdi>
					                                                                       <span class="woocommerce-Price-currencySymbol">Rs.</span><?php echo $latest_product_fetch['price']; ?>
					                                                                   </bdi>
					                                                               </span>
					                                                           </ins>
					                                                       <?php
					                                                       }
					                                                    ?>
					                                                </span>
					                                             </div>
					                                          </div>
					                                       </div>
					                                    </div>
					                                 </li>
					                                 <?php
					                              }
					                              ?>
					                           </ul>
					                        </div>
					                     </div>
					                  </div>
					               </div>
					            </div>
					         </div>
					      </div>
					   </div>
					</div>
					<!-- trending outfits end-->
				

				</div>
				</div>
				<!-- End role["main"] -->
			</div>
			<!-- End .page-wrapper-inner -->
			<?php include("footer.php"); ?>
		</div>
		
		<!-- scroll up button end  -->

		<!-- search panel desktop  -->
		
		<div id="et-quickview" class="clearfix"></div>
		<script src='js/jquery.selectBox.min.js?ver=1.2.0'></script>
		<script src='js/jquery.prettyPhoto.min.js?ver=3.1.6'></script>
		<script src='js/cart-fragments.min.js?ver=5.5.1'></script>
		<script data-minify="1" src='js/demo.js?ver=1626583894'></script>
		<script src='js/imagesloaded.min.js?ver=4.1.4'></script>
		<script src='js/modernizr.min.js?ver=2.8.3'></script>
		<script src='js/mobile-detect.min.js?ver=1.3.2'></script>
		<script src='js/isInViewport.min.js?ver=3.0.4'></script>
		<script src='js/jquery.autocomplete.min.js?ver=1.4.1'></script>
		<script src='js/jquery.magnific-popup.min.js?ver=3.0.1'></script>
		<script src='js/perfect-scrollbar.jquery.min.js?ver=0.8.0'></script>
		<script src='js/sticky-kit.min.js?ver=1.1.3'></script>
		<script src='js/slick.min.js?ver=1.8.1'></script>
		<script src='js/isotope.pkgd.min.js?ver=3.0.6'></script>
		<script src='js/packery-mode.pkgd.min.js?ver=2.0.1'></script>
		<script src='js/arrive.min.js?ver=2.4.1'></script>
		<script src='js/sliding-menu.min.js?ver=0.2.1'></script>
		<script src='js/select2.full.min.js?ver=4.0.3'></script>
		<script src='js/goya-app.min.js?ver=1.0.6.2'></script>
		<script id='goya-app-js-extra'>
			var goya_theme_vars = {"ajaxUrl":"","l10n":{"back":"Back","view_cart":"View cart"},"icons":{"prev_arrow":"<svg xmlns=\"http:\/\/www.w3.org\/2000\/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\" class=\"feather feather-chevron-left\"><polyline points=\"15 18 9 12 15 6\"><\/polyline><\/svg>","next_arrow":"<svg xmlns=\"http:\/\/www.w3.org\/2000\/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\" class=\"feather feather-chevron-right\"><polyline points=\"9 18 15 12 9 6\"><\/polyline><\/svg>"},"settings":{"current_url":"https:\/\/goya.everthemes.com\/demo-fashion\/","site_url":"https:\/\/goya.everthemes.com\/demo-fashion","pageLoadTransition":false,"ajaxSearchActive":true,"ajaxAddToCartSingle":true,"cart_icon":"mini-cart","minicart_auto":true,"shop_infinite_load":"button","shop_update_url":false,"ajaxWishlistCounter":false,"posts_per_page":"10","related_slider":true,"popup_length":"1","is_front_page":true,"is_blog":false,"is_cart":false,"is_checkout":false,"checkoutTermsPopup":true}};
		</script>
		<script src='js/goya-animations.min.js?ver=1.0.6.2'></script>
		<script src='js/js_composer_front.min.js?ver=6.6.0'></script>
		<script src='js/forms.js?ver=1626583894'></script>
		<script>window.lazyLoadOptions={elements_selector:"img[data-lazy-src],.rocket-lazyload,iframe[data-lazy-src]",data_src:"lazy-src",data_srcset:"lazy-srcset",data_sizes:"lazy-sizes",class_loading:"lazyloading",class_loaded:"lazyloaded",threshold:300,callback_loaded:function(element){if(element.tagName==="IFRAME"&&element.dataset.rocketLazyload=="fitvidscompatible"){if(element.classList.contains("lazyloaded")){if(typeof window.jQuery!="undefined"){if(jQuery.fn.fitVids){jQuery(element).parent().fitVids()}}}}}};window.addEventListener('LazyLoad::Initialized',function(e){var lazyLoadInstance=e.detail.instance;if(window.MutationObserver){var observer=new MutationObserver(function(mutations){var image_count=0;var iframe_count=0;var rocketlazy_count=0;mutations.forEach(function(mutation){for(i=0;i<mutation.addedNodes.length;i++){if(typeof mutation.addedNodes[i].getElementsByTagName!=='function'){continue}
			if(typeof mutation.addedNodes[i].getElementsByClassName!=='function'){continue}
			images=mutation.addedNodes[i].getElementsByTagName('img');is_image=mutation.addedNodes[i].tagName=="IMG";iframes=mutation.addedNodes[i].getElementsByTagName('iframe');is_iframe=mutation.addedNodes[i].tagName=="IFRAME";rocket_lazy=mutation.addedNodes[i].getElementsByClassName('rocket-lazyload');image_count+=images.length;iframe_count+=iframes.length;rocketlazy_count+=rocket_lazy.length;if(is_image){image_count+=1}
			if(is_iframe){iframe_count+=1}}});if(image_count>0||iframe_count>0||rocketlazy_count>0){lazyLoadInstance.update()}});var b=document.getElementsByTagName("body")[0];var config={childList:!0,subtree:!0};observer.observe(b,config)}},!1)
		</script>
		<script src="js/lazyload.min.js"></script>
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="plugins/jquery-ui/jquery-ui.min.js"></script>
		<style>
            .ui-helper-hidden-accessible
			    {
			        display: none;
			    }
			    .ui-autocomplete { 
			       height:200px; 
			       width: 100px; 
			       /*margin-right: 1000px;*/
			       cursor: pointer;
			       overflow-y: scroll; 
			       overflow-x: hidden; 
			       z-index: 99999;
			       list-style-type: none;
			       background-color: white;
			    }
			    .ui-menu-item-wrapper{
			        padding-top: 15px;
			        padding-top: 15px;
			        line-height: 1;
			        height: 60px;
			        padding-left: 7px;
			        cursor: pointer;
			        overflow: hidden;
			        text-overflow: ellipsis;
			        display: -webkit-box;
			        -webkit-box-orient: vertical;
			        -webkit-line-clamp: 1;
			    }
			    .ui-menu-item-wrapper:hover{
			        background-color: #f3f1ef;
			        cursor: pointer;
			        overflow: hidden;
			        text-overflow: ellipsis;
			        display: -webkit-box;
			        -webkit-box-orient: vertical;
			        -webkit-line-clamp: 1;
			    }
        </style>
		<script type="text/javascript">
			 var search = "";
			 var availableTags = [];
			 $("#search").keyup(function(e){
            search = $("#search").val();
            if($("#search").val() != "")
            {
		          $.ajax({
		              url: 'ajax.php',
		              method: 'post',
		              data:{search:search},
		              success: function (data) {
		              	 	var obj = JSON.parse(data);
		              	 	for(var i=0;i<obj.length;i++){

	                         if(availableTags.indexOf(obj[i].product_name) === -1){
	                             availableTags.push(obj[i].product_name);
	                         }       
	                     }       
		              }
		      	});
	            if(e.key == "Enter")
	            {
	            	location.href = "user/shop.php?search="+search;
	            }
		      }
          });
           $("#search").autocomplete({
             source: availableTags,
             minLength:3,
             scroll:true,
             select: function(event, ui) {   
						location.href="user/shop.php?search="+ui.item.value;
					}
				});

         var availableTags1 = [];
			$("#search1").keyup(function(e){
            search = $("#search1").val();
            if($("#search1").val() != "")
            {
		          $.ajax({
		              url: 'ajax.php',
		              method: 'post',
		              data:{search:search},
		              success: function (data) {
		              	 	var obj = JSON.parse(data);
		              	 	for(var i=0;i<obj.length;i++){

	                         if(availableTags1.indexOf(obj[i].product_name) === -1){
	                             availableTags1.push(obj[i].product_name);
	                         }   
	                     }       
		              }
		      	});
	            if(e.key == "Enter")
	            {
	            	location.href = "user/shop.php?search="+search;
	            }
		      }
          });
           $("#search1").autocomplete({
             source: availableTags1,
             minLength:3,
             scroll:true,
             select: function(event, ui) {   
						location.href="user/shop.php?search="+ui.item.value;
					}
				})
		</script>
   </body>
</html>