<?php
if (isset($_COOKIE['user_id'])) {
  ?><script type="text/javascript">location.replace("index.php");</script><?php
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
      <title>Contact Us | Fashion</title>
      <link rel="icon" type="image/x-icon" href="assets/img/favicon.png"/>
      <link rel="stylesheet" href="css/index.css" media="all" data-minify="1" />
      <link rel="stylesheet" href="css/index1.css" media="all" data-minify="1" />
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
	  
	  <link rel="icon" href="assets/img/logo-alt.png.webp" sizes="32x32" />
	  <link rel="icon" href="assets/img/logo-alt.png" sizes="192x192" />
	  <link rel="apple-touch-icon" href="assets/img/logo-alt.png" />
      <link rel="stylesheet" href="css/index2.css">
	  <link rel="stylesheet" href="css/contactus.css">
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
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	  <link href="plugins/notification/snackbar/snackbar.min.css" rel="stylesheet" type="text/css" />
   </head>
   <body class="home page-template-default page page-id-861 wp-embed-responsive theme-goya woocommerce-no-js woo-variation-swatches wvs-theme-goya-child wvs-theme-child-goya wvs-style-squared wvs-attr-behavior-blur wvs-tooltip wvs-css wvs-show-label blog-id-3 wp-gallery-popup has-top-bar header-sticky header-full-width floating-labels login-single-column et-login-popup page-header-transparent sticky-header-dark header-transparent-mobiles dark-title wpb-js-composer js-comp-ver-6.6.0 vc_responsive">
		<div id="wrapper" class="open">
			<div class="click-capture"></div>
			<div class="page-wrapper-inner">
				<!-- header start -->
				<?php include("header.php"); ?>
				<!-- header end  -->
		<!-- Body Start --> 
			<hr style="margin-top:89px;">
			<div role="main" class="site-content">
				<div class="page-padding post-2221 page type-page status-publish hentry">
					<div class="sec_row container-fluid">
						<div class="vc_row wpb_row vc_row-fluid no-padding vc_row-o-full-height vc_row-o-columns-top vc_row-o-equal-height vc_row-o-content-top vc_row-flex" style="min-height: 100vh;">
							<div class="wpb_column vc_column_container vc_col-sm-12 vc_col-lg-6 et-dark-column" style="margin-top:50px;">
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
							<div class="vc_column-inner">
								<div class="wpb_wrapper">
									<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d58956.892166555815!2d72.90962854830885!3d22.54894786208323!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e4e7efd0c8885%3A0xa9a0b93c0c4b5215!2sAnand%2C%20Gujarat!5e0!3m2!1sen!2sin!4v1629369749556!5m2!1sen!2sin" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy">
									</iframe>
								</div>
							</div>
							</div>
							<div class="wpb_column vc_column_container animation bottom-to-top vc_col-sm-12 vc_col-lg-6 et-dark-column animated" et-animated="true">
							<div class="vc_column-inner  vc_custom_1570855549259" style="margin-top:-80px;margin-bottom:50px;">
								<div class="wpb_wrapper">
									<div class="vc_row wpb_row vc_inner vc_row-fluid vc_row-o-content-middle vc_row-flex">
										<div class="wpb_column vc_column_container vc_col-sm-6 et-dark-column">
										<div class="vc_column-inner">
											<div class="wpb_wrapper">
												<div class="wpb_text_column wpb_content_element   vc_custom_1570659822574">
													<div class="wpb_wrapper">
													<h3>Visit Us</h3>
													<p>17 Near Ram Arcade , Gopal Chokdi,
														Anand-388001 <br> Gujarat<br>
														+91-7415140684
													</p>
													</div>
												</div>
											</div>
										</div>
										</div>
										<div class="wpb_column vc_column_container vc_col-sm-6 et-dark-column">
										<div class="vc_column-inner">
											<div class="wpb_wrapper">
												<div class="wpb_text_column wpb_content_element  ">
													<div class="wpb_wrapper">
													<h3>Get in Touch</h3>
													<p>For Good Products in a market with good quality and better price.<br>
														<a href="#" style="text-decoration:none;color:#444444">shanuvora0@gmail.com</a>
													</p>
													</div>
												</div>
											</div>
										</div>
										</div>
									</div>
									<div class="vc_row wpb_row vc_inner vc_row-fluid vc_row-o-content-middle vc_row-flex">
										<div class="wpb_column vc_column_container vc_col-sm-12 et-dark-column">
										<div class="vc_column-inner">
											<div class="wpb_wrapper">
												<noscript class="ninja-forms-noscript-message">
													Notice: JavaScript is required for this content.
												</noscript>
												<div id="nf-form-1-cont" class="nf-form-cont" aria-live="polite" aria-labelledby="nf-form-title-1" aria-describedby="nf-form-errors-1" role="form">
													<span id="nf-form-title-1" class="nf-form-title">
													</span>
													<div class="nf-form-wrap ninja-forms-form-wrap">
													<div class="nf-response-msg"></div>
													<div class="nf-debug-msg"></div>
													<div class="nf-before-form">
														<nf-section>
														</nf-section>
													</div>
													<div class="nf-form-layout">
														<form method="post" action="contact_us.php">
															<div>
																<div class="nf-before-form-content">
																<nf-section>
																	<div class="nf-form-fields-required">Fields marked with an <span class="ninja-forms-req-symbol">*</span> are required</div>
																</nf-section>
																</div>
																<div class="nf-form-content ">
																<nf-fields-wrap>
																	<nf-field>
																		<div id="nf-field-1-container" class="nf-field-container textbox-container  label-above ">
																			<div class="nf-before-field">
																			<nf-section>
																			</nf-section>
																			</div>
																			<div class="nf-field">
																			<div id="nf-field-1-wrap" class="field-wrap textbox-wrap float-label" data-field-id="1">
																				<div class="nf-field-label"><label for="nf-field-1" id="nf-label-field-1" class="">Name <span class="ninja-forms-req-symbol">*</span> </label></div>
																				<div class="nf-field-element">
																					<input type="text" value="" class="ninja-forms-field nf-element" id="nf-field-1" name="name" aria-invalid="false" aria-describedby="nf-error-1" aria-labelledby="nf-label-field-1" required="">
																				</div>
																			</div>
																			</div>
																			<div class="nf-after-field">
																			<nf-section>
																				<div class="nf-input-limit"></div>
																				<div id="nf-error-1" class="nf-error-wrap nf-error" role="alert"></div>
																			</nf-section>
																			</div>
																		</div>
																	</nf-field>
																	<nf-field>
																		<div id="nf-field-2-container" class="nf-field-container email-container  label-above ">
																			<div class="nf-before-field">
																			<nf-section>
																			</nf-section>
																			</div>
																			<div class="nf-field">
																			<div id="nf-field-2-wrap" class="field-wrap email-wrap float-label" data-field-id="2">
																				<div class="nf-field-label"><label for="nf-field-2" id="nf-label-field-2" class="">Email <span class="ninja-forms-req-symbol">*</span> </label></div>
																				<div class="nf-field-element">
																					<input type="email" value="" class="ninja-forms-field nf-element" id="nf-field-2" name="email" autocomplete="email" aria-invalid="false" aria-describedby="nf-error-2" aria-labelledby="nf-label-field-2" required="">
																				</div>
																			</div>
																			</div>
																			<div class="nf-after-field">
																			<nf-section>
																				<div class="nf-input-limit"></div>
																				<div id="nf-error-2" class="nf-error-wrap nf-error" role="alert"></div>
																			</nf-section>
																			</div>
																		</div>
																	</nf-field>
																	<nf-field>
																		<div id="nf-field-3-container" class="nf-field-container textarea-container  label-above ">
																			<div class="nf-before-field">
																			<nf-section>
																			</nf-section>
																			</div>
																			<div class="nf-field">
																			<div id="nf-field-3-wrap" class="field-wrap textarea-wrap float-label" data-field-id="3">
																				<div class="nf-field-label"><label for="nf-field-3" id="nf-label-field-3" class="">Message <span class="ninja-forms-req-symbol">*</span> </label></div>
																				<div class="nf-field-element">
																					<textarea id="nf-field-3" name="message" aria-invalid="false" aria-describedby="nf-error-3" class="ninja-forms-field nf-element" aria-labelledby="nf-label-field-3" required=""></textarea>
																				</div>
																			</div>
																			</div>
																			<div class="nf-after-field">
																			<nf-section>
																				<div class="nf-input-limit"></div>
																				<div id="nf-error-3" class="nf-error-wrap nf-error" role="alert"></div>
																			</nf-section>
																			</div>
																		</div>
																	</nf-field>
																	<nf-field>
																		<div id="nf-field-4-container" class="nf-field-container submit-container  label-above  textbox-container">
																			<div class="nf-before-field">
																			<nf-section>
																			</nf-section>
																			</div>
																			<div class="nf-field">
																			<div id="nf-field-4-wrap" class="field-wrap submit-wrap textbox-wrap" data-field-id="4">
																				<div class="nf-field-label"></div>
																				<div class="nf-field-element">
																					<input id="submit" class="ninja-forms-field nf-element " type="submit" value="Submit" name="submit">
																				</div>
																				<div class="nf-error-wrap"></div>
																			</div>
																			</div>
																			<div class="nf-after-field">
																			<nf-section>
																				<div class="nf-input-limit"></div>
																				<div id="nf-error-4" class="nf-error-wrap nf-error" role="alert"></div>
																			</nf-section>
																			</div>
																		</div>
																	</nf-field>
																</nf-fields-wrap>
																</div>
																<div class="nf-after-form-content">
																<nf-section>
																	<div id="nf-form-errors-1" class="nf-form-errors" role="alert">
																		<nf-errors></nf-errors>
																	</div>
																	<div class="nf-form-hp">
																		<nf-section>
																			<label for="nf-field-hp-1" aria-hidden="true">
																			If you are a human seeing this field, please leave it empty.
																			<input id="nf-field-hp-1" name="nf-field-hp" class="nf-element nf-field-hp" type="text" value="">
																			</label>
																		</nf-section>
																	</div>
																</nf-section>
																</div>
															</div>
														</form>
													</div>
													<div class="nf-after-form">
														<nf-section>
														</nf-section>
													</div>
													</div>
												</div>
												<!-- TODO: Move to Template File. -->
												<script>var formDisplay=1;var nfForms=nfForms||[];var form=[];form.id='1';form.settings={"objectType":"Form Setting","editActive":true,"title":"Contact Me","key":"","created_at":"2019-07-19 20:22:56","default_label_pos":"above","conditions":[],"show_title":0,"clear_complete":"1","hide_complete":"1","wrapper_class":"","element_class":"","add_submit":"1","logged_in":"","not_logged_in_msg":"","sub_limit_number":"","sub_limit_msg":"","calculations":[],"formContentData":["name","email","message","submit"],"container_styles_background-color":"","container_styles_border":"","container_styles_border-style":"","container_styles_border-color":"","container_styles_color":"","container_styles_height":"","container_styles_width":"","container_styles_font-size":"","container_styles_margin":"","container_styles_padding":"","container_styles_display":"","container_styles_float":"","container_styles_show_advanced_css":"0","container_styles_advanced":"","title_styles_background-color":"","title_styles_border":"","title_styles_border-style":"","title_styles_border-color":"","title_styles_color":"","title_styles_height":"","title_styles_width":"","title_styles_font-size":"","title_styles_margin":"","title_styles_padding":"","title_styles_display":"","title_styles_float":"","title_styles_show_advanced_css":"0","title_styles_advanced":"","row_styles_background-color":"","row_styles_border":"","row_styles_border-style":"","row_styles_border-color":"","row_styles_color":"","row_styles_height":"","row_styles_width":"","row_styles_font-size":"","row_styles_margin":"","row_styles_padding":"","row_styles_display":"","row_styles_show_advanced_css":"0","row_styles_advanced":"","row-odd_styles_background-color":"","row-odd_styles_border":"","row-odd_styles_border-style":"","row-odd_styles_border-color":"","row-odd_styles_color":"","row-odd_styles_height":"","row-odd_styles_width":"","row-odd_styles_font-size":"","row-odd_styles_margin":"","row-odd_styles_padding":"","row-odd_styles_display":"","row-odd_styles_show_advanced_css":"0","row-odd_styles_advanced":"","success-msg_styles_background-color":"","success-msg_styles_border":"","success-msg_styles_border-style":"","success-msg_styles_border-color":"","success-msg_styles_color":"","success-msg_styles_height":"","success-msg_styles_width":"","success-msg_styles_font-size":"","success-msg_styles_margin":"","success-msg_styles_padding":"","success-msg_styles_display":"","success-msg_styles_show_advanced_css":"0","success-msg_styles_advanced":"","error_msg_styles_background-color":"","error_msg_styles_border":"","error_msg_styles_border-style":"","error_msg_styles_border-color":"","error_msg_styles_color":"","error_msg_styles_height":"","error_msg_styles_width":"","error_msg_styles_font-size":"","error_msg_styles_margin":"","error_msg_styles_padding":"","error_msg_styles_display":"","error_msg_styles_show_advanced_css":"0","error_msg_styles_advanced":"","allow_public_link":0,"embed_form":"","changeEmailErrorMsg":"Please enter a valid email address!","changeDateErrorMsg":"Please enter a valid date!","confirmFieldErrorMsg":"These fields must match!","fieldNumberNumMinError":"Number Min Error","fieldNumberNumMaxError":"Number Max Error","fieldNumberIncrementBy":"Please increment by ","formErrorsCorrectErrors":"Please correct errors before submitting this form.","validateRequiredField":"This is a required field.","honeypotHoneypotError":"Honeypot Error","fieldsMarkedRequired":"Fields marked with an <span class=\"ninja-forms-req-symbol\">*<\/span> are required","currency":"","unique_field_error":"A form with this value has already been submitted.","drawerDisabled":false,"ninjaForms":"Ninja Forms","fieldTextareaRTEInsertLink":"Insert Link","fieldTextareaRTEInsertMedia":"Insert Media","fieldTextareaRTESelectAFile":"Select a file","formHoneypot":"If you are a human seeing this field, please leave it empty.","fileUploadOldCodeFileUploadInProgress":"File Upload in Progress.","fileUploadOldCodeFileUpload":"FILE UPLOAD","currencySymbol":"&#36;","thousands_sep":",","decimal_point":".","siteLocale":"en_US","dateFormat":"m\/d\/Y","startOfWeek":"1","of":"of","previousMonth":"Previous Month","nextMonth":"Next Month","months":["January","February","March","April","May","June","July","August","September","October","November","December"],"monthsShort":["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],"weekdays":["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"],"weekdaysShort":["Sun","Mon","Tue","Wed","Thu","Fri","Sat"],"weekdaysMin":["Su","Mo","Tu","We","Th","Fr","Sa"],"currency_symbol":"","beforeForm":"","beforeFields":"","afterFields":"","afterForm":""};form.fields=[{"objectType":"Field","objectDomain":"fields","editActive":false,"order":1,"label":"Name","key":"name","type":"textbox","created_at":"2019-07-19 20:22:56","label_pos":"above","required":1,"placeholder":"","default":"","wrapper_class":"","element_class":"","container_class":"","input_limit":"","input_limit_type":"characters","input_limit_msg":"Character(s) left","manual_key":"","disable_input":"","admin_label":"","help_text":"","desc_text":"","disable_browser_autocomplete":"","mask":"","custom_mask":"","wrap_styles_background-color":"","wrap_styles_border":"","wrap_styles_border-style":"","wrap_styles_border-color":"","wrap_styles_color":"","wrap_styles_height":"","wrap_styles_width":"","wrap_styles_font-size":"","wrap_styles_margin":"","wrap_styles_padding":"","wrap_styles_display":"","wrap_styles_float":"","wrap_styles_show_advanced_css":0,"wrap_styles_advanced":"","label_styles_background-color":"","label_styles_border":"","label_styles_border-style":"","label_styles_border-color":"","label_styles_color":"","label_styles_height":"","label_styles_width":"","label_styles_font-size":"","label_styles_margin":"","label_styles_padding":"","label_styles_display":"","label_styles_float":"","label_styles_show_advanced_css":0,"label_styles_advanced":"","element_styles_background-color":"","element_styles_border":"","element_styles_border-style":"","element_styles_border-color":"","element_styles_color":"","element_styles_height":"","element_styles_width":"","element_styles_font-size":"","element_styles_margin":"","element_styles_padding":"","element_styles_display":"","element_styles_float":"","element_styles_show_advanced_css":0,"element_styles_advanced":"","cellcid":"c3277","custom_name_attribute":"","personally_identifiable":"","value":"","id":1,"beforeField":"","afterField":"","parentType":"textbox","element_templates":["textbox","input"],"old_classname":"","wrap_template":"wrap"},{"objectType":"Field","objectDomain":"fields","editActive":false,"order":2,"label":"Email","key":"email","type":"email","created_at":"2019-07-19 20:22:56","label_pos":"above","required":1,"placeholder":"","default":"","wrapper_class":"","element_class":"","container_class":"","admin_label":"","help_text":"","desc_text":"","wrap_styles_background-color":"","wrap_styles_border":"","wrap_styles_border-style":"","wrap_styles_border-color":"","wrap_styles_color":"","wrap_styles_height":"","wrap_styles_width":"","wrap_styles_font-size":"","wrap_styles_margin":"","wrap_styles_padding":"","wrap_styles_display":"","wrap_styles_float":"","wrap_styles_show_advanced_css":0,"wrap_styles_advanced":"","label_styles_background-color":"","label_styles_border":"","label_styles_border-style":"","label_styles_border-color":"","label_styles_color":"","label_styles_height":"","label_styles_width":"","label_styles_font-size":"","label_styles_margin":"","label_styles_padding":"","label_styles_display":"","label_styles_float":"","label_styles_show_advanced_css":0,"label_styles_advanced":"","element_styles_background-color":"","element_styles_border":"","element_styles_border-style":"","element_styles_border-color":"","element_styles_color":"","element_styles_height":"","element_styles_width":"","element_styles_font-size":"","element_styles_margin":"","element_styles_padding":"","element_styles_display":"","element_styles_float":"","element_styles_show_advanced_css":0,"element_styles_advanced":"","cellcid":"c3281","custom_name_attribute":"email","personally_identifiable":1,"value":"","id":2,"beforeField":"","afterField":"","parentType":"email","element_templates":["email","input"],"old_classname":"","wrap_template":"wrap"},{"objectType":"Field","objectDomain":"fields","editActive":false,"order":3,"label":"Message","key":"message","type":"textarea","created_at":"2019-07-19 20:22:56","label_pos":"above","required":1,"placeholder":"","default":"","wrapper_class":"","element_class":"","container_class":"","input_limit":"","input_limit_type":"characters","input_limit_msg":"Character(s) left","manual_key":"","disable_input":"","admin_label":"","help_text":"","desc_text":"","disable_browser_autocomplete":"","textarea_rte":"","disable_rte_mobile":"","textarea_media":"","wrap_styles_background-color":"","wrap_styles_border":"","wrap_styles_border-style":"","wrap_styles_border-color":"","wrap_styles_color":"","wrap_styles_height":"","wrap_styles_width":"","wrap_styles_font-size":"","wrap_styles_margin":"","wrap_styles_padding":"","wrap_styles_display":"","wrap_styles_float":"","wrap_styles_show_advanced_css":0,"wrap_styles_advanced":"","label_styles_background-color":"","label_styles_border":"","label_styles_border-style":"","label_styles_border-color":"","label_styles_color":"","label_styles_height":"","label_styles_width":"","label_styles_font-size":"","label_styles_margin":"","label_styles_padding":"","label_styles_display":"","label_styles_float":"","label_styles_show_advanced_css":0,"label_styles_advanced":"","element_styles_background-color":"","element_styles_border":"","element_styles_border-style":"","element_styles_border-color":"","element_styles_color":"","element_styles_height":"","element_styles_width":"","element_styles_font-size":"","element_styles_margin":"","element_styles_padding":"","element_styles_display":"","element_styles_float":"","element_styles_show_advanced_css":0,"element_styles_advanced":"","cellcid":"c3284","value":"","id":3,"beforeField":"","afterField":"","parentType":"textarea","element_templates":["textarea","input"],"old_classname":"","wrap_template":"wrap"},{"objectType":"Field","objectDomain":"fields","editActive":false,"order":5,"label":"Submit","key":"submit","type":"submit","created_at":"2019-07-19 20:22:56","processing_label":"Processing","container_class":"","element_class":"","wrap_styles_background-color":"","wrap_styles_border":"","wrap_styles_border-style":"","wrap_styles_border-color":"","wrap_styles_color":"","wrap_styles_height":"","wrap_styles_width":"","wrap_styles_font-size":"","wrap_styles_margin":"","wrap_styles_padding":"","wrap_styles_display":"","wrap_styles_float":"","wrap_styles_show_advanced_css":0,"wrap_styles_advanced":"","label_styles_background-color":"","label_styles_border":"","label_styles_border-style":"","label_styles_border-color":"","label_styles_color":"","label_styles_height":"","label_styles_width":"","label_styles_font-size":"","label_styles_margin":"","label_styles_padding":"","label_styles_display":"","label_styles_float":"","label_styles_show_advanced_css":0,"label_styles_advanced":"","element_styles_background-color":"","element_styles_border":"","element_styles_border-style":"","element_styles_border-color":"","element_styles_color":"","element_styles_height":"","element_styles_width":"","element_styles_font-size":"","element_styles_margin":"","element_styles_padding":"","element_styles_display":"","element_styles_float":"","element_styles_show_advanced_css":0,"element_styles_advanced":"","submit_element_hover_styles_background-color":"","submit_element_hover_styles_border":"","submit_element_hover_styles_border-style":"","submit_element_hover_styles_border-color":"","submit_element_hover_styles_color":"","submit_element_hover_styles_height":"","submit_element_hover_styles_width":"","submit_element_hover_styles_font-size":"","submit_element_hover_styles_margin":"","submit_element_hover_styles_padding":"","submit_element_hover_styles_display":"","submit_element_hover_styles_float":"","submit_element_hover_styles_show_advanced_css":0,"submit_element_hover_styles_advanced":"","cellcid":"c3287","id":4,"beforeField":"","afterField":"","value":"","label_pos":"above","parentType":"textbox","element_templates":["submit","button","input"],"old_classname":"","wrap_template":"wrap-no-label"}];nfForms.push(form);</script>
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
				</div>


				<!-- footer start  -->
				
				<?php include("footer.php"); ?>
				<!-- footer end -->
			</div>
		<!-- search panel desktop  -->
		<nav class="search-panel side-panel">
			<header>
				<div class="container">
				<div class="panel-header-inner">
					<h6>Search</h6>
					<a href="#" class="et-close" title="Close"></a>
				</div>
				</div>
			</header>
			<div class="side-panel-content container">
				<div class="row justify-content-md-center">
				<div class="col-lg-10">
					<div class="goya-search">
						<form role="search" method="get" class="woocommerce-product-search searchform" action="https://goya.everthemes.com/demo-fashion/">
							<label class="screen-reader-text" for="woocommerce-product-search-field-1">Search for:</label>
							<fieldset>
								<div class="search-button-group">
									<a href="#" class="search-clear remove" title="Clear"></a>
									<span class="search-icon">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search">
											<circle cx="11" cy="11" r="8"></circle>
											<line x1="21" y1="21" x2="16.65" y2="16.65"></line>
										</svg>
									</span>
									<input type="search" id="woocommerce-product-search-field-1" class="search-field" placeholder="Search products&hellip;" value="" name="s" />
								</div>
							</fieldset>
						</form>
					</div>
				</div>
				</div>
			</div>
		</nav>
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
		<script src="js/jquery.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<script src="js/main.js"></script>
		<script src="plugins/notification/snackbar/snackbar.min.js"></script>
		<script src="assets/js/components/notification/custom-snackbar.js"></script>
   	</body>
</html>

<?php

include("db/connection.php");
if (isset($_POST['submit']))
{
	$name = mysqli_real_escape_string($con,$_POST['name']);
	$email = mysqli_real_escape_string($con,$_POST['email']);
	$message = mysqli_real_escape_string($con,$_POST['message']);
	$query =" insert into contact_us (name,email,message)values('$name','$email','$message')";
	$run = mysqli_query($con,$query);
	if($run == true)
	{
		?>
		<script>
			location.href="contact_us.php?success=1";
		</script><?php
	}
	else
	{
		?>
		<script>
			location.href="contact_us.php?unsuccess=1";
		</script><?php
	}
}
if(isset($_GET['success'])){
	?><script>
		Snackbar.show({ text: 'Feedback Submitted', duration: 2000, });
			var queryParams = new URLSearchParams(window.location.search);
			queryParams.delete("success");
			history.pushState(null, null, "?"+queryParams.toString());
	</script>
	<?php
}

if(isset($_GET['unsuccess'])){
	?><script>
		Snackbar.show({ text: 'There is Some Error ! Please Try Again..', duration: 2000, });
			var queryParams = new URLSearchParams(window.location.search);
			queryParams.delete("unsuccess");
			history.pushState(null, null, "?"+queryParams.toString());
	</script>
	<?php	
}
?>