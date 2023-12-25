<?php
include_once("../db/connection.php");
if(isset($_GET['product_no']))
{
	$product_id = $_GET['product_no'];
	$query = "select * from product where product_id='$product_id'";
	$run = mysqli_query($con,$query);
	$result = mysqli_fetch_assoc($run);
}
else
{
	if($_COOKIE['user_id'])
	{
		?><script type="text/javascript">location.replace("index.php");</script><?php
	}
	else
	{
		?><script type="text/javascript">location.replace("../index.php");</script><?php	
	}
}
?>
	<!doctype html>
	<html lang="en-US">

	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<title>Product | Fashion</title>
		<link rel="icon" type="image/x-icon" href="assets/img/favicon.png"/>
		<link rel="stylesheet" href="../css/index.css" />
		<link rel="stylesheet" href="../css/product.css" />
		<link rel="stylesheet" href="../css/product_inline.css" />
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
		<meta name="generator" content="Powered by WPBakery Page Builder - drag and drop page builder for WordPress." />
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
		<link href="../plugins/notification/snackbar/snackbar.min.css" rel="stylesheet" type="text/css" />
	</head>

	<body class="product-template-default single single-product postid-11 wp-embed-responsive theme-goya woocommerce woocommerce-page woocommerce-no-js woo-variation-swatches woo-variation-swatches-on-mobile wvs-theme-goya-child wvs-theme-child-goya wvs-style-squared wvs-attr-behavior-blur wvs-tooltip wvs-css wvs-show-label blog-id-3 wp-gallery-popup has-top-bar header-sticky header-full-width floating-labels login-single-column et-login-popup page-header-transparent product-showcase-dark-text fixed-product-bar fixed-product-bar-bottom fixed-product-bar-mobile-1 sticky-header-dark header-transparent-mobiles dark-title wpb-js-composer js-comp-ver-6.6.0 vc_responsive">
		<div id="wrapper" class="open">
			<div class="click-capture"></div>
			<div class="page-wrapper-inner">
				<!-- header start -->
				<?php include("index_header.php"); ?>
					<!-- header end  -->
					<!-- Body Start -->
					<div role="main" class="site-content">
						<div class="header-spacer"></div>
						<div id="product-11" class="et-product-detail et-product-layout-showcase et-product-layout-no-padding product-header-transparent et-cart-horizontal product-details-vertical et-variation-style-table et-product-gallery-carousel thumbnails-vertical thumbnails-mobile-dots sticky-section sticky-summary has-breadcrumbs product type-product post-11 status-publish first instock product_cat-women has-post-thumbnail sale featured shipping-taxable purchasable product-type-variable has-default-attributes">
							<div class="product-showcase showcase-regular showcase-active  ">
								<div class="product-header-spacer"></div>
								<div class="container showcase-inner">
									<div class="row showcase-row">
										<div class="col-12 col-lg-7 product-gallery woocommerce-product-gallery-parent zoom-disabled lightbox-enabled has-additional-thumbnails video-link-gallery">
											<div class="product-gallery-inner">
												<div class="woocommerce-product-gallery woocommerce-product-gallery--with-images woocommerce-product-gallery--columns-4 images" data-columns="4" style="opacity: 0; transition: opacity .25s ease-in-out;">
													<figure class="woocommerce-product-gallery__wrapper">
														
														<?php
															for($j=1;$j<=3;$j++)
															{
																$img = "image".$j; 
																?>
																<div data-thumb="../db/images/<?php echo $result[$img]; ?>" data-thumb-alt="" class="woocommerce-product-gallery__image">
																	<a href="#">
																		<img width="900" height="900" src="../db/images/<?php echo $result[$img]; ?>" class="wp-post-image" alt="" title="woman-abstract-a1" data-src="../db/images/<?php echo $result[$img]; ?>" data-large_image="../db/images/<?php echo $result[$img]; ?>" data-large_image_width="1400" data-large_image_height="1400" sizes="(max-width: 900px) 100vw, 900px"/>
																	</a>
																</div>
																<?php
															}
														?>
													</figure>
												</div>
											</div>
										</div>
										<div class="col-12 col-lg-5 product-information">
											<div class="summary entry-summary">
												<div id="woo-notices-wrapper"></div>
												<div class="et-pro-summary-top">
													<h1 class="product_title entry-title"><?php echo $result['product_name']; ?> </h1>
													<p class="price">
														<?php if($result['discount'] > 0)
							                            {
							                                $d_price = ($result['price']*$result['discount'])/100;
							                                $discount_price = $result['price']-$d_price;
							                            ?>
							                                <del aria-hidden="true">
							                                    <span class="woocommerce-Price-amount amount">
							                                        <bdi>
							                                            <span class="woocommerce-Price-currencySymbol">Rs.</span><?php echo $result['price']; ?>
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
							                                            <span class="woocommerce-Price-currencySymbol">Rs.</span><?php echo $result['price']; ?>
							                                        </bdi>
							                                    </span>
							                                </ins>
							                            <?php
							                            }
							                            ?>
													</p> 

													<span class="badge onsale perc">
														<span class="onsale-before">-</span><?php echo $result['discount']; ?><span class="onsale-after">%</span> <span class="onsale-off">Off</span>
													</span>

													<div class="woocommerce-product-rating">
														<?php
														$sql = mysqli_fetch_assoc(mysqli_query($con,"select AVG(rating) as rating_average from review where product_id='$product_id'"));
														$sql_row = mysqli_num_rows(mysqli_query($con,"select count(*) as total_user from review where product_id='$product_id'"));
														$rating = $sql['rating_average'] * 20;
														?>
														<div class="star-rating" role="img"><span style="width:<?php echo $rating; ?>%">Rated <strong class="rating"><?php echo $sql['rating_average']; ?></strong> out of 5 based on <span class="rating"><?php echo $sql_rows['total_user']; ?></span> customer ratings</span>
														</div> <a href="#reviews" class="woocommerce-review-link" rel="nofollow">(<span class="count"><?php echo $rows['total_user']; ?></span> customer reviews)</a> </div>

													<div class="clearfix price-separator"></div>
												</div>
												<div class="et-pro-summary-content">
														<table class="variations" cellspacing="0">
															<tbody>
																<tr>
																	<td class="label">
																		<label for="pa_size">Size</label>
																	</td>
																	<td class="value">
																		<ul role="radiogroup" aria-label="Size" class="variable-items-wrapper button-variable-wrapper" data-attribute_name="attribute_pa_size" data-attribute_values="[&quot;large&quot;,&quot;medium&quot;,&quot;small&quot;]">

																				<li aria-checked="true" data-wvstooltip="<?php echo $result["size"];?>" tabindex="2" class="variable-item button-variable-item button-variable-item-small selected" data-title="<?php echo $result["size"];?>" data-value="small" role="radio" tabindex="0">
																					<div class="variable-item-contents"><span class="variable-item-span variable-item-span-button"><?php echo $result["size"];?></span></div>
																				</li>
																			
																		</ul>
																	</td>
																</tr>
															</tbody>
														</table>
														<div class="single_variation_wrap">
															<div class="woocommerce-variation single_variation"></div>
															<div class="woocommerce-variation-add-to-cart variations_button">
																<div class="et-wishlist-div-open">
																	<?php 
																	if($result['total_items'] == 0)
																	{
																		?>
																		<button type="button" class="button alt"><span>Out of Stock</span><span></span></button>
																		<?php
																	}
																	else
																	{
																		if(isset($_COOKIE['user_id']))
																		{
																		?>

																		<button type="button" onclick=cart(user_id,product_id,1); class="button alt"><span>Add to Cart</span><span></span></button>
																		<?php
																		}	
																	}
																	if(isset($_COOKIE['user_id']))
																	{
																		?>
																		<div class="yith-wcwl-add-to-wishlist add-to-wishlist-11  wishlist-fragment on-first-load">

																			<!-- ADD TO WISHLIST -->
																			<div class="yith-wcwl-add-button et-tooltip"> 
																				<a rel="nofollow" class="add_to_wishlist single_add_to_wishlist" data-title="Add to Wishlist">
																					<span class="text">Add to Wishlist</span>
																					<span id="wishlist" class="icon" >
																						<?php
																						$pid = $result['product_id'];
																						$user = $_COOKIE['user_id'];

																						$wishlist=mysqli_query($con,"select * from wishlist where product_id='$pid' and user_id='$user'");
																						$wish = mysqli_num_rows($wishlist);
																						?>
																						<script type="text/javascript">
																							var pid = "<?php echo $pid; ?>";
																							var user = "<?php echo $user; ?>";
																						</script>
																						<?php
																						if($wish == 0)
																						{
																						?>
																							
																							<span id="full-heart" class="et-icon et-heart" onclick="check_wishlist(pid,user);"></span>
																						<?php
																						}
																						else
																						{
																							?>
																							<span id="empty-heart" class="et-icon et-heart-fill" onclick="check_wishlist(pid,user);"></span>
																							<?php
																						}
																						?>
																					</span>
																				</a> 
																			</div>
																			<!-- COUNT TEXT -->
																		</div>
																		<?php
																	}
																	?>
																</div>
															</div>
														</div>
													</form>

													<div class="clearfix sticky-bar-trigger"></div>

													<div class="post-share">
														<ul class="social-icons share-article">
															<li class="share-label">Share</li>
															<li>
																<a href="http://www.facebook.com" target="_blank" class="et-icon et-facebook social"></a>
															</li>
															<li>
																<a href="https://twitter.com" target="_blank" class="et-icon et-twitter social"></a>
															</li>
															<li>
																<a href="http://pinterest.com" target="_blank" class="et-icon et-instagram social"></a>
															</li>
														</ul>
													</div>
												</div>
											</div>
										</div>
										<!-- .product-information -->
									</div>
									<!-- .showcase-row -->
								</div>
								<!-- .showcase-inner -->
							</div>
							<!-- .product-showcase -->
							<div class="woocommerce-tabs wc-tabs-wrapper product-details-vertical">
								
								<div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--description panel entry-content wc-tab" id="tab-description" role="tabpanel" aria-labelledby="tab-title-description">
									<div class="container">
										<div class="row justify-content-md-center">
											<div class="col-12">
												<h2>Description</h2>
												<div class="desc-layout-boxed">
													<div class="post-content-area" id="content">
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--additional_information panel entry-content wc-tab" id="tab-additional_information" role="tabpanel" aria-labelledby="tab-title-additional_information">
									<div class="container">
										<div class="row justify-content-md-center">
											<div class="col-12">
												<h2>Additional information</h2>
												<table class="woocommerce-product-attributes shop_attributes">
													
													<tr class="woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_size">
														<th class="woocommerce-product-attributes-item__label">Size</th>
														<td class="woocommerce-product-attributes-item__value"><p><?php echo rtrim($result['size'],","); ?></p>
														</td>
													</tr>
												</table>
											</div>
										</div>
									</div>
								</div>
								<div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--reviews panel entry-content wc-tab" id="tab-reviews" role="tabpanel" aria-labelledby="tab-title-reviews">
									<div class="container">
										<div class="row justify-content-md-center">
											<div class="col-12">
												<div id="reviews" class="woocommerce-Reviews">
													<div class="container">
														<h2 class="woocommerce-Reviews-title"> 
															<?php 
																$product_id = $result['product_id'];
																$product_count = mysqli_fetch_assoc(mysqli_query($con,"select count(review_id) as total_review from review where product_id='$product_id'"));
																$review_run = mysqli_query($con,"select * from review where product_id='$product_id'");
															?>
															<?php echo $product_count['total_review']; ?> reviews for <span><?php echo $result['product_name']; ?></span> 
														</h2>

														<?php 
														while($review = mysqli_fetch_assoc($review_run))
														{
														?>
														<div class="reviews-inner">
															<div id="comments">
																<ol class="commentlist">
																	<li class="review even thread-even depth-1" id="li-comment-3">
																		<div id="comment-3" class="comment_container"> 
																			<div class="comment-text">
																				<div class="star-rating" role="img" aria-label="Rated 5 out of <?php echo $review['rating']; ?>"><span style="width:<?php echo (20*$review['rating']); ?>%">Rated <strong class="rating"><?php echo $review['rating']; ?></strong> out of 5</span></div>
																				<p class="meta"> <strong class="woocommerce-review__author"> </strong> <span class="woocommerce-review__dash">&ndash;</span>
																					<time class="woocommerce-review__published-date" datetime="2019-03-17T06:02:07+00:00"><?php 
																					$date=date_create("2013-03-15");
																					echo date_format($date,"M d,Y");
																					?>
																					</time>
																				</p>
																				<div class="description">
																					<p><?php echo $review['review']; ?></p>
																				</div>
																			</div>
																		</div>
																	</li>
																	<!-- #comment-## -->
																</ol>
															</div>
															<?php
														}
														if(isset($_COOKIE['user_id']))
														{
															?>
															<div id="review_form_wrapper">
																<div id="review_form">
																	<div id="respond" class="comment-respond">
																		<div class="comment-reply-title product-review"><span id="reply-title" class="comment-reply-button button outlined">Add a review <small><a rel="nofollow" id="cancel-comment-reply-link" href="" style="display:none;">Cancel reply</a></small></span></div>
																		<form action="review.php" method="post" id="commentform" class="comment-form" novalidate>
																			<div class="comment-form-rating">
																				<label for="rating">Your rating&nbsp;<span class="required">*</span></label>
																				<select name="rating" id="rating" required>
																					<option value="">Rate&hellip;</option>
																					<option value="5">Perfect</option>
																					<option value="4">Good</option>
																					<option value="3">Average</option>
																					<option value="2">Not that bad</option>
																					<option value="1">Very poor</option>
																				</select>
																			</div>
																			<input type="hidden" name="pid" value="<?php echo $result['product_id']; ?>">
																			<p class="comment-form-comment">
																				<label for="comment">Your review&nbsp;<span class="required">*</span></label>
																				<textarea id="comment" name="comment" cols="45" rows="8" required></textarea>
																			</p>

																			<p class="form-submit">
																				<input name="submit" type="submit" id="submit" class="submit" value="Submit" />
																		</form>
																	</div>
																	<!-- #respond -->
																</div>
															</div>
															<div class="clear"></div>
															<?php	
														}
														?>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<section class="related products">
								<div class="container">
									<?php 
										$category = $result['category'];
										$subcategory = $result['sub_category'];
										$q = "select * from product where category='$category' and sub_category='$subcategory' and product_id not in('$product_id') order by product_id desc limit 4";
										$recent_product = mysqli_query($con,$q);
									?>
									<h2>Related products</h2>
									<ul class="products row et-main-products hover-animation-zoom-jump et-shop-show-variations et-shop-hover-images show-rating" data-columns="4" data-mobile-columns="2" data-navigation="true" data-pagination="true" data-layoutmode="packery">
										<?php 
										while($recent = mysqli_fetch_assoc($recent_product))
										{
											?>
											<li class="item et-listing-style1 col-6 col-sm-6 col-md-4 col-lg-3 small_grid_5 hover-image-load product type-product post-3709 status-publish first instock product_cat-women has-post-thumbnail sale shipping-taxable purchasable product-type-variable has-default-attributes">
												<div class="product-inner animation fade">
													<figure class="product_thumbnail et-image-hover">
														<a href="#" title="Light Day Loafer">
															<img width="450" height="450" src="../db/images/<?php echo $recent['image1']; ?>" class="main-image wp-post-image" alt="" data-lazy-src="../db/images/<?php echo $recent['image1']; ?>" />
															<noscript>
																<img width="450" height="450" src="../db/images/<?php echo $recent['image1']; ?>" class="main-image wp-post-image" alt="" />
															</noscript>
															<img width="450" height="450" src="../db/images/<?php echo $recent['image2']; ?>" class="product_thumbnail_hover" alt="" data-lazy-src="../db/images/<?php echo $recent['image2']; ?>" />
															<noscript>
																<img width="450" height="450" src="../db/images/<?php echo $recent['image2']; ?>" alt="" />
															</noscript>
														</a> 
														<span class="badge onsale perc"><span class="onsale-before">-</span><?php echo $recent['discount']; ?><span class="onsale-after">%</span> <span class="onsale-off">Off</span></span>
														<div class="actions-wrapper">
															<div class="actions-inner"> <a href=https://goya.everthemes.com/demo-fashion/product/light-day-loafer/ title="Quick View" data-product_id="3709" class="et-quickview-btn et-tooltip product_type_variable"><span class="text">Quick View</span><span class="icon"><span class="et-icon et-maximize-2"></span></span></span></a> </div>
														</div>
													</figure>
													<div class="caption">
														<div class="product-title">
															<h3><a class="product-link" href="https://goya.everthemes.com/demo-fashion/product/light-day-loafer/" title="Light Day Loafer"><?php echo $recent['product_name']; ?></a></h3>
															<div class="yith-wcwl-add-to-wishlist add-to-wishlist-3709  wishlist-fragment on-first-load" data-fragment-ref="3709" data-fragment-options="{&quot;base_url&quot;:&quot;&quot;,&quot;in_default_wishlist&quot;:false,&quot;is_single&quot;:false,&quot;show_exists&quot;:false,&quot;product_id&quot;:3709,&quot;parent_product_id&quot;:3709,&quot;product_type&quot;:&quot;variable&quot;,&quot;show_view&quot;:false,&quot;browse_wishlist_text&quot;:&quot;Browse Wishlist&quot;,&quot;already_in_wishslist_text&quot;:&quot;The product is already in the wishlist!&quot;,&quot;product_added_text&quot;:&quot;Product added!&quot;,&quot;heading_icon&quot;:&quot;&quot;,&quot;available_multi_wishlist&quot;:false,&quot;disable_wishlist&quot;:false,&quot;show_count&quot;:false,&quot;ajax_loading&quot;:false,&quot;loop_position&quot;:&quot;shortcode&quot;,&quot;item&quot;:&quot;add_to_wishlist&quot;}">
																<!-- ADD TO WISHLIST -->
																<div class="yith-wcwl-add-button et-tooltip"> <a href="?add_to_wishlist=3709" rel="nofollow" data-product-id="3709" data-product-type="variable" data-original-product-id="3709" class="add_to_wishlist single_add_to_wishlist" data-title="Add to Wishlist"><span class="text">Add to Wishlist</span><span class="icon"><span class="et-icon et-heart"></span></span>
															</a> </div>
																<!-- COUNT TEXT -->
															</div>
														</div>
														<div class="product_after_title">
															<div class="product_after_shop_loop_price"> <span class="price"><del aria-hidden="true"><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">&#36;</span>145.00</bdi>
																</span>
																</del> <ins><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">&#36;</span>129.00</bdi></span></ins></span>
															</div>
															<div class="product-excerpt">
																<p>A cushioned insole and elasticized back for extra comfort.</p>
															</div>
															<div class="after_shop_loop_actions"> <a href="https://goya.everthemes.com/demo-fashion/product/light-day-loafer/" data-quantity="1" class="button product_type_variable add_to_cart_button" data-product_id="3709" data-product_sku="SHOX308" aria-label="Select options for &ldquo;Light Day Loafer&rdquo;" rel="nofollow"><span class="text">Select options</span><span class="icon"><span class="et-icon et-shopping-bag"></span></span></a> </div>
														</div>
													</div>
												</div>
											</li>
											<?php
										}
										?>
									</ul>
								</div>
							</section>
						</div>
					</div>
			</div>
</p></form></div></div></div></div></div></div></div></div></div></div></div></div></div></div></div></body>
			<!--body end-->
			<!-- footer start  -->
			<?php include("index_footer.php"); ?>

				<!-- footer end -->
				<script src='../js/jquery.selectBox.min.js?ver=1.2.0'></script>
				<script src='../js/jquery.prettyPhoto.min.js?ver=3.1.6'></script>
				<script src='../js/jquery.flexslider.min.js?ver=6.6.0'></script>
				<script src='../js/photoswipe.min.js?ver=4.1.1'></script>
				<script src='../js/photoswipe-ui-default.min.js?ver=4.1.1'></script>
				<script id='wc-single-product-js-extra'>
				var wc_single_product_params = {
					"i18n_required_rating_text": "Please select a rating",
					"review_rating_required": "yes",
					"flexslider": {
						"rtl": false,
						"animation": "slide",
						"smoothHeight": true,
						"directionNav": true,
						"controlNav": "thumbnails",
						"slideshow": false,
						"animationSpeed": 300,
						"animationLoop": false,
						"allowOneSlide": false,
						"prevText": "<svg xmlns=\"http:\/\/www.w3.org\/2000\/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\" class=\"feather feather-chevron-left\"><polyline points=\"15 18 9 12 15 6\"><\/polyline><\/svg>",
						"nextText": "<svg xmlns=\"http:\/\/www.w3.org\/2000\/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\" class=\"feather feather-chevron-right\"><polyline points=\"9 18 15 12 9 6\"><\/polyline><\/svg>"
					},
					"zoom_enabled": "",
					"zoom_options": [],
					"photoswipe_enabled": "1",
					"photoswipe_options": {
						"shareEl": false,
						"closeOnScroll": false,
						"history": false,
						"hideAnimationDuration": 0,
						"showAnimationDuration": 0,
						"showHideOpacity": true,
						"bgOpacity": 1,
						"loop": false,
						"closeOnVerticalDrag": false,
						"barsSize": {
							"top": 0,
							"bottom": 0
						},
						"tapToClose": true,
						"tapToToggleControls": false
					},
					"flexslider_enabled": "1"
				};
				</script>
				<script src='../js/single-product.min.js?ver=5.5.2'></script>
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
				<script src='../js/comment-reply.min.js?ver=5.7.2'></script>
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
						"current_url": "",
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
						"is_front_page": false,
						"is_blog": false,
						"is_cart": false,
						"is_checkout": false,
						"checkoutTermsPopup": true
					}
				};
				</script>
				<script src='../js/goya-app.min.js?ver=1.0.6.2'></script>
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
						if(element.tagName === "IFRAME" && element.dataset.rocketLazyload == "fitvidscompatible") {
							if(element.classList.contains("lazyloaded")) {
								if(typeof window.jQuery != "undefined") {
									if(jQuery.fn.fitVids) {
										jQuery(element).parent().fitVids()
									}
								}
							}
						}
					}
				};
				window.addEventListener('LazyLoad::Initialized', function(e) {
					var lazyLoadInstance = e.detail.instance;
					if(window.MutationObserver) {
						var observer = new MutationObserver(function(mutations) {
							var image_count = 0;
							var iframe_count = 0;
							var rocketlazy_count = 0;
							mutations.forEach(function(mutation) {
								for(i = 0; i < mutation.addedNodes.length; i++) {
									if(typeof mutation.addedNodes[i].getElementsByTagName !== 'function') {
										continue
									}
									if(typeof mutation.addedNodes[i].getElementsByClassName !== 'function') {
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
									if(is_image) {
										image_count += 1
									}
									if(is_iframe) {
										iframe_count += 1
									}
								}
							});
							if(image_count > 0 || iframe_count > 0 || rocketlazy_count > 0) {
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
				<script type="text/javascript" class="../js/markdown.min.js"></script>
				<script src="../plugins/notification/snackbar/snackbar.min.js"></script>
				<script src="../assets/js/components/notification/custom-snackbar.js"></script>
				<script src= "../js/marked.min.js"></script>
	</body>

	</html>

	<script type="text/javascript">
		var user_id = "<?php echo $_COOKIE['user_id']; ?>";
		var product_id = "<?php echo $result['product_id']; ?>";
		
		function cart(user_id,product_id,items){
			$.ajax({
		        url:"ajax.php",
		        method:"POST",
		        data:{user_id:user_id, product_id:product_id,total_items:items},
		        cache:false,
		        success:function(data)
		        {
		        	if(data == 0)
		        	{
		        		Snackbar.show({ text: 'Product Already Added in Cart', duration: 4000, pos: 'bottom-left' });
		        	}
		        	else if(data == 1)
		        	{
		        		Snackbar.show({ text: 'Product Added in Cart', duration: 4000, pos: 'bottom-left' });
		        		$("#cart-counter").html(parseInt($("#cart-counter").html())+1);
		        	}
		        	else if(data == 2)
		        	{
		        		Snackbar.show({ text: 'Something Went Wrong..', duration: 4000, pos: 'bottom-right' });
		        	}
		        }
	    	});
		}
		function check_wishlist(pid,user){
			$.ajax({
		        url:"ajax.php",
		        method:"POST",
		        data:{user:user,pid:pid},
		        cache:false,
		        success:function(data)
		        {
			        	if(data == 0)
			        	{
			        		$("#empty-heart").remove();
			        		$("#wishlist").append('<span id="full-heart" class="et-icon et-heart" onclick="check_wishlist(pid,user);"></span>');
			        		$("#wishlist-counter").html(parseInt($("#wishlist-counter").html())-1);
			        	}
			        	else if(data == 1)
			        	{
			        		$("#full-heart").remove();
			        		$("#wishlist").append('<span id="empty-heart" class="et-icon et-heart-fill" onclick="check_wishlist(pid,user);"></span>');
			        		$("#wishlist-counter").html(parseInt($("#wishlist-counter").html())+1);
			        	}
		        }
	    	});
		}
	</script>
 	<script>document.getElementById('content').innerHTML = marked('<?php echo $result['description']; ?>');</script>
<?php 
if(isset($_GET['success']))
{
    ?><script type="text/javascript">
    Snackbar.show({ text: 'Thanks For Your Feedback', duration: 3000, });
    var queryParams = new URLSearchParams(window.location.search);
    queryParams.delete("success");
    history.pushState(null, null, "?"+queryParams.toString());
    </script><?php
}
?>
<?php include_once("search.php"); ?>