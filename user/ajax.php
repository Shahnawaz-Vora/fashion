<?php
include_once("../db/connection.php");

//shop.php start

//single subcategory
if(isset($_POST["limit"], $_POST["start"]) && isset($_POST["category"],$_POST["sub_category"]))
{
	$category = $_POST['category'];
	$sub_category = $_POST['sub_category'];
	$query = "SELECT * FROM product where category='$category' and sub_category='$sub_category' ORDER BY product_id DESC LIMIT ".$_POST["start"].", ".$_POST["limit"]."";
	$result = mysqli_query($con, $query);
	$total_rows = mysqli_num_rows($result);
	if($total_rows != 0)
	{
	 	?><div class="wcapf-before-products">
		    <div class="woocommerce-notices-wrapper"></div>
		    <ul class="products row et-main-products hover-animation-zoom-jump et-shop-show-variations et-shop-hover-images show-rating main-shop-archive" data-columns="4" data-mobile-columns="2" data-navigation="true" data-pagination="true" data-layoutmode="packery">
		    	<?php
		    	$i=0;
			 	while($row = mysqli_fetch_array($result))
			 	{
			 		$i++;
			 	?>
			    	<li class="item et-listing-style1 col-6 col-sm-6 col-md-4 col-lg-3 small_grid_5 hover-image-load product type-product post-11 status-publish first instock product_cat-women has-post-thumbnail sale featured shipping-taxable purchasable product-type-variable has-default-attributes">
			        <div class="product-inner animation fade animated" et-animated="true">
			            <figure class="product_thumbnail et-image-hover">
			                <a href="product.php?product_no=<?php echo $row['product_id']; ?>" title="<?php echo $row['product_name']; ?>">
			                    <img width="450" height="450" src="../db/images/<?php echo $row['image1']; ?>" class="main-image wp-post-image lazyloaded" alt="" data-ll-status="loaded" srcset="" />
			                    <noscript>
			                        <img width="450" height="450" src="../db/images/<?php echo $row['image1']; ?>" class="main-image wp-post-image" alt="" />
			                    </noscript>
			                    <img width="450" height="450" src="../db/images/<?php echo $row['image2']; ?>" class="product_thumbnail_hover lazyloaded" alt="" data-ll-status="loaded" />
			                    <noscript>
			                        <img width="450" height="450" src="../db/images/<?php echo $row['image2']; ?>" class="product_thumbnail_hover" alt="" />
			                    </noscript>
			                </a>
			                <?php if($row['discount'])
			                {
			                    ?>
			                    <span class="badge onsale perc"><span class="onsale-before">-</span><?php echo $row['discount']; ?><span class="onsale-after">%</span> <span class="onsale-off">Off</span></span>
			                    <?php    
			                }

			                ?>
			                <div class="actions-wrapper">
			                    <div class="actions-inner">
			                        <a href="" onclick="location.href='product.php?product_no=<?php echo $row['product_id']; ?>'" title="Quick View" class="et-quickview-btn et-tooltip product_type_variable">
			                            <span class="text">View Product</span><span class="icon"><span class="et-icon et-maximize-2"></span></span>
			                        </a>
			                    </div>
			                </div>
			            </figure>
			            <div class="caption">
			                <div class="product-title">
			                    <h3><a class="product-link" href="product.php?product_no=<?php echo $row['product_id']; ?>" title="<?php echo $row['product_name']; ?>"><?php echo $row['product_name']; ?></a></h3>
			                    	<?php 
			                    		if(isset($_COOKIE['user_id']))
			                    		{
			                    		?>
				                    	<div class="yith-wcwl-add-button et-tooltip" id="wish-container<?php echo $i; ?>">
					                        <span id="wishlist<?php echo $i; ?>" class="icon" > 
					                        	<?php
													$pid = $row['product_id'];
													$user = $_COOKIE['user_id'];

													$wishlist=mysqli_query($con,"select * from wishlist where product_id='$pid' and user_id='$user'");
													$wish = mysqli_num_rows($wishlist);
													?>
													<?php
													if($wish == 0)
													{
													?>
														
															<span id="full-heart<?php echo $i; ?>" class="et-icon et-heart" onclick="check_wishlist(<?php echo $pid; ?>,<?php echo $_COOKIE['user_id']; ?>,<?php echo $i; ?>);"></span>
														</span> 
													<?php
													}
													else
													{
														?>
														<span id="empty-heart<?php echo $i; ?>" class="et-icon et-heart-fill" onclick="check_wishlist(<?php echo $pid; ?>,<?php echo $_COOKIE['user_id']; ?>,<?php echo $i; ?>);"></span>
														<?php
													}
												?>
											</span>
										</div>
										<?php
										}
			                    	?>
			                </div>
			                <div class="product_after_title">
			                    <div class="product_after_shop_loop_price">
			                        <span class="price">
			                            <?php 
			                            if($row['total_items'] == 0)
			                            {
			                            	?>
			                            	<ins>
			                                    <span class="woocommerce-Price-amount amount">
			                                        <bdi>
			                                            <span class="woocommerce-Price-currencySymbol">Out of Stock</span>
			                                        </bdi>
			                                    </span>
			                                </ins>
			                                <?php
			                            }
			                        	else
			                        	{
				                            if($row['discount'] > 0)
				                            {
				                                $d_price = ($row['price']*$row['discount'])/100;
				                                $discount_price = $row['price']-$d_price;
				                            ?>
				                                <del aria-hidden="true">
				                                    <span class="woocommerce-Price-amount amount">
				                                        <bdi>
				                                            <span class="woocommerce-Price-currencySymbol">Rs.</span><?php echo $row['price']; ?>
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
				                                            <span class="woocommerce-Price-currencySymbol">Rs.</span><?php echo $row['price']; ?>
				                                        </bdi>
				                                    </span>
				                                </ins>
				                            <?php
				                            }
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
	    <?php
	}
	else
	{
		echo '<input type="hidden" id="check" value="0">';
	}
}

//single subcategory with filter

//only single category
else if(isset($_POST["limit"], $_POST["start"]) && isset($_POST["category"]))
{
	$category = $_POST['category'];
	$query = "SELECT * FROM product where category='$category' ORDER BY product_id DESC LIMIT ".$_POST["start"].", ".$_POST["limit"]."";
	$result = mysqli_query($con, $query);
	$total_rows = mysqli_num_rows($result);
	if($total_rows != 0)
	{
	 	?><div class="wcapf-before-products">
		    <div class="woocommerce-notices-wrapper"></div>
		    <ul class="products row et-main-products hover-animation-zoom-jump et-shop-show-variations et-shop-hover-images show-rating main-shop-archive" data-columns="4" data-mobile-columns="2" data-navigation="true" data-pagination="true" data-layoutmode="packery">
		    	<?php
		    	$i=0;
			 	while($row = mysqli_fetch_array($result))
			 	{
			 		$i++;
			 	?>
			    	<li class="item et-listing-style1 col-6 col-sm-6 col-md-4 col-lg-3 small_grid_5 hover-image-load product type-product post-11 status-publish first instock product_cat-women has-post-thumbnail sale featured shipping-taxable purchasable product-type-variable has-default-attributes">
			        <div class="product-inner animation fade animated" et-animated="true">
			            <figure class="product_thumbnail et-image-hover">
			                <a href="product.php?product_no=<?php echo $row['product_id']; ?>" title="<?php echo $row['product_name']; ?>">
			                    <img width="450" height="450" src="../db/images/<?php echo $row['image1']; ?>" class="main-image wp-post-image lazyloaded" alt="" data-ll-status="loaded" srcset="" />
			                    <noscript>
			                        <img width="450" height="450" src="../db/images/<?php echo $row['image1']; ?>" class="main-image wp-post-image" alt="" />
			                    </noscript>
			                    <img width="450" height="450" src="../db/images/<?php echo $row['image2']; ?>" class="product_thumbnail_hover lazyloaded" alt="" data-ll-status="loaded" />
			                    <noscript>
			                        <img width="450" height="450" src="../db/images/<?php echo $row['image2']; ?>" class="product_thumbnail_hover" alt="" />
			                    </noscript>
			                </a>
			                <?php if($row['discount'])
			                {
			                    ?>
			                    <span class="badge onsale perc"><span class="onsale-before">-</span><?php echo $row['discount']; ?><span class="onsale-after">%</span> <span class="onsale-off">Off</span></span>
			                    <?php    
			                }

			                ?>
			                <div class="actions-wrapper">
			                    <div class="actions-inner">
			                        <a href="" onclick="location.href='product.php?product_no=<?php echo $row['product_id']; ?>'" title="Quick View" class="et-quickview-btn et-tooltip product_type_variable">
			                            <span class="text">View Product</span><span class="icon"><span class="et-icon et-maximize-2"></span></span>
			                        </a>
			                    </div>
			                </div>
			            </figure>
			            <div class="caption">
			                <div class="product-title">
			                    <h3><a class="product-link" href="product.php?product_no=<?php echo $row['product_id']; ?>" title="product.php?product_no=<?php echo $row['product_name']; ?>"><?php echo $row['product_name']; ?></a></h3>
			                    <div class="yith-wcwl-add-to-wishlist wishlist-fragment on-first-load add-to-wishlist-2438">
			                        <!-- ADD TO WISHLIST -->
			                        <?php 
			                        if(isset($_COOKIE['user_id']))
			                        {
			                        	?>
			                        	<div class="yith-wcwl-add-button et-tooltip" id="wish-container<?php echo $i; ?>">
				                        <span id="wishlist<?php echo $i; ?>" class="icon" > 
				                        	<?php
												$pid = $row['product_id'];
												$user = $_COOKIE['user_id'];

												$wishlist=mysqli_query($con,"select * from wishlist where product_id='$pid' and user_id='$user'");
												$wish = mysqli_num_rows($wishlist);
												?>
												<?php
												if($wish == 0)
												{
												?>
													
														<span id="full-heart<?php echo $i; ?>" class="et-icon et-heart" onclick="check_wishlist(<?php echo $pid; ?>,<?php echo $_COOKIE['user_id']; ?>,<?php echo $i; ?>);"></span>
													</span> 
												<?php
												}
												else
												{
													?>
													<span id="empty-heart<?php echo $i; ?>" class="et-icon et-heart-fill" onclick="check_wishlist(<?php echo $pid; ?>,<?php echo $_COOKIE['user_id']; ?>,<?php echo $i; ?>);"></span>
													<?php
												}
											?>
										</span>
									</div>
			                        <?php
			                        }
			                        ?>
			                        
			                        <!-- COUNT TEXT -->
			                    </div>
			                </div>
			                <div class="product_after_title">
			                    <div class="product_after_shop_loop_price">
			                        <span class="price">
			                        	<?php
			                        	if($row['total_items'] == 0)
			                            {
			                            	?>
			                            	<ins>
			                                    <span class="woocommerce-Price-amount amount">
			                                        <bdi>
			                                            <span class="woocommerce-Price-currencySymbol">Out of Stock</span>
			                                        </bdi>
			                                    </span>
			                                </ins>
			                                <?php
			                            }
			                        	else
			                        	{
			                            	if($row['discount'] > 0)
				                            {
				                                $d_price = ($row['price']*$row['discount'])/100;
				                                $discount_price = $row['price']-$d_price;
				                            ?>
				                                <del aria-hidden="true">
				                                    <span class="woocommerce-Price-amount amount">
				                                        <bdi>
				                                            <span class="woocommerce-Price-currencySymbol">Rs.</span><?php echo $row['price']; ?>
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
				                                            <span class="woocommerce-Price-currencySymbol">Rs.</span><?php echo $row['price']; ?>
				                                        </bdi>
				                                    </span>
				                                </ins>
				                            <?php
				                            }
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
	    <?php
	}
	else
	{
		echo '<input type="hidden" id="check" value="0">';
	}
}
//all
else if(isset($_POST["limit"], $_POST["start"]) && isset($_POST['all']))
{
	$query = "SELECT * FROM product ORDER BY product_id DESC LIMIT ".$_POST["start"].", ".$_POST["limit"]."";
	$result = mysqli_query($con, $query);
	$total_rows = mysqli_num_rows($result);
	if($total_rows != 0)
	{
	 	?><div class="wcapf-before-products">
		    <div class="woocommerce-notices-wrapper"></div>
		    <ul class="products row et-main-products hover-animation-zoom-jump et-shop-show-variations et-shop-hover-images show-rating main-shop-archive" data-columns="4" data-mobile-columns="2" data-navigation="true" data-pagination="true" data-layoutmode="packery">
		    	<?php
		    	$i=0;
			 	while($row = mysqli_fetch_array($result))
			 	{
			 		$i++;
			 	?>
			    	<li class="item et-listing-style1 col-6 col-sm-6 col-md-4 col-lg-3 small_grid_5 hover-image-load product type-product post-11 status-publish first instock product_cat-women has-post-thumbnail sale featured shipping-taxable purchasable product-type-variable has-default-attributes">
			        <div class="product-inner animation fade animated" et-animated="true">
			            <figure class="product_thumbnail et-image-hover">
			                <a href="product.php?product_no=<?php echo $row['product_id']; ?>" title="<?php echo $row['product_name']; ?>">
			                    <img width="450" height="450" src="../db/images/<?php echo $row['image1']; ?>" class="main-image wp-post-image lazyloaded" alt="" data-ll-status="loaded" srcset="" />
			                    <noscript>
			                        <img width="450" height="450" src="../db/images/<?php echo $row['image1']; ?>" class="main-image wp-post-image" alt="" />
			                    </noscript>
			                    <img width="450" height="450" src="../db/images/<?php echo $row['image2']; ?>" class="product_thumbnail_hover lazyloaded" alt="" data-ll-status="loaded" />
			                    <noscript>
			                        <img width="450" height="450" src="../db/images/<?php echo $row['image2']; ?>" class="product_thumbnail_hover" alt="" />
			                    </noscript>
			                </a>
			                <?php if($row['discount'])
			                {
			                    ?>
			                    <span class="badge onsale perc"><span class="onsale-before">-</span><?php echo $row['discount']; ?><span class="onsale-after">%</span> <span class="onsale-off">Off</span></span>
			                    <?php    
			                }

			                ?>
			                <div class="actions-wrapper">
			                    <div class="actions-inner">
			                        <a href="" onclick="location.href='product.php?product_no=<?php echo $row['product_id']; ?>'" title="Quick View" class="et-quickview-btn et-tooltip product_type_variable">
			                            <span class="text">View Product</span><span class="icon"><span class="et-icon et-maximize-2"></span></span>
			                        </a>
			                    </div>
			                </div>
			            </figure>
			            <div class="caption">
			                <div class="product-title">
			                    <h3><a class="product-link" href="#" title="<?php echo $row['product_name']; ?>"><?php echo $row['product_name']; ?></a></h3>
			                    <div class="yith-wcwl-add-to-wishlist wishlist-fragment on-first-load add-to-wishlist-2438">
			                        <!-- ADD TO WISHLIST -->
			                        <?php 
			                        if(isset($_COOKIE['user_id']))
			                        {
			                        	?>
			                        	<div class="yith-wcwl-add-button et-tooltip" id="wish-container<?php echo $i; ?>">
					                        <span id="wishlist<?php echo $i; ?>" class="icon" > 
					                        	<?php
													$pid = $row['product_id'];
													$user = $_COOKIE['user_id'];

													$wishlist=mysqli_query($con,"select * from wishlist where product_id='$pid' and user_id='$user'");
													$wish = mysqli_num_rows($wishlist);
													?>
													<?php
													if($wish == 0)
													{
													?>
														
															<span id="full-heart<?php echo $i; ?>" class="et-icon et-heart" onclick="check_wishlist(<?php echo $pid; ?>,<?php echo $_COOKIE['user_id']; ?>,<?php echo $i; ?>);"></span>
														</span> 
													<?php
													}
													else
													{
														?>
														<span id="empty-heart<?php echo $i; ?>" class="et-icon et-heart-fill" onclick="check_wishlist(<?php echo $pid; ?>,<?php echo $_COOKIE['user_id']; ?>,<?php echo $i; ?>);"></span>
														<?php
													}
												?>
											</span>
										</div>
										<?php
			                        }
			                        ?>
			                        <!-- COUNT TEXT -->
			                    </div>
			                </div>
			                <div class="product_after_title">
			                    <div class="product_after_shop_loop_price">
			                        <span class="price">
			                            <?php 
			                            if($row['total_items'] == 0)
			                            {
			                            	?>
			                            	<ins>
			                                    <span class="woocommerce-Price-amount amount">
			                                        <bdi>
			                                            <span class="woocommerce-Price-currencySymbol">Out of Stock</span>
			                                        </bdi>
			                                    </span>
			                                </ins>
			                                <?php
			                            }
			                        	else
			                        	{
				                            if($row['discount'] > 0)
				                            {
				                                $d_price = ($row['price']*$row['discount'])/100;
				                                $discount_price = $row['price']-$d_price;
				                            ?>
				                                <del aria-hidden="true">
				                                    <span class="woocommerce-Price-amount amount">
				                                        <bdi>
				                                            <span class="woocommerce-Price-currencySymbol">Rs.</span><?php echo $row['price']; ?>
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
				                                            <span class="woocommerce-Price-currencySymbol">Rs.</span><?php echo $row['price']; ?>
				                                        </bdi>
				                                    </span>
				                                </ins>
				                            <?php
				                            }
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
	    <?php
	}
	else
	{
		echo '<input type="hidden" id="check" value="0">';
	}
}

else if(isset($_POST["limit"], $_POST["start"]) && isset($_POST['price']))
{
	$query = "SELECT * FROM product where discount like('0') ORDER BY price ASC LIMIT ".$_POST["start"].", ".$_POST["limit"]."";
	$result = mysqli_query($con, $query);
	$total_rows = mysqli_num_rows($result);
	if($total_rows != 0)
	{
	 	?><div class="wcapf-before-products">
		    <div class="woocommerce-notices-wrapper"></div>
		    <ul class="products row et-main-products hover-animation-zoom-jump et-shop-show-variations et-shop-hover-images show-rating main-shop-archive" data-columns="4" data-mobile-columns="2" data-navigation="true" data-pagination="true" data-layoutmode="packery">
		    	<?php
		    	$i=0;
			 	while($row = mysqli_fetch_array($result))
			 	{
			 		$i++;
			 	?>
			    	<li class="item et-listing-style1 col-6 col-sm-6 col-md-4 col-lg-3 small_grid_5 hover-image-load product type-product post-11 status-publish first instock product_cat-women has-post-thumbnail sale featured shipping-taxable purchasable product-type-variable has-default-attributes">
			        <div class="product-inner animation fade animated" et-animated="true">
			            <figure class="product_thumbnail et-image-hover">
			                <a href="product.php?product_no=<?php echo $row['product_id']; ?>" title="<?php echo $row['product_name']; ?>">
			                    <img width="450" height="450" src="../db/images/<?php echo $row['image1']; ?>" class="main-image wp-post-image lazyloaded" alt="" data-ll-status="loaded" srcset="" />
			                    <noscript>
			                        <img width="450" height="450" src="../db/images/<?php echo $row['image1']; ?>" class="main-image wp-post-image" alt="" />
			                    </noscript>
			                    <img width="450" height="450" src="../db/images/<?php echo $row['image2']; ?>" class="product_thumbnail_hover lazyloaded" alt="" data-ll-status="loaded" />
			                    <noscript>
			                        <img width="450" height="450" src="../db/images/<?php echo $row['image2']; ?>" class="product_thumbnail_hover" alt="" />
			                    </noscript>
			                </a>
			                <?php if($row['discount'])
			                {
			                    ?>
			                    <span class="badge onsale perc"><span class="onsale-before">-</span><?php echo $row['discount']; ?><span class="onsale-after">%</span> <span class="onsale-off">Off</span></span>
			                    <?php    
			                }

			                ?>
			                <div class="actions-wrapper">
			                    <div class="actions-inner">
			                        <a href="" onclick="location.href='product.php?product_no=<?php echo $row['product_id']; ?>'" title="Quick View" class="et-quickview-btn et-tooltip product_type_variable">
			                            <span class="text">View Product</span><span class="icon"><span class="et-icon et-maximize-2"></span></span>
			                        </a>
			                    </div>
			                </div>
			            </figure>
			            <div class="caption">
			                <div class="product-title">
			                    <h3><a class="product-link" href="#" title="<?php echo $row['product_name']; ?>"><?php echo $row['product_name']; ?></a></h3>
			                    <div class="yith-wcwl-add-to-wishlist wishlist-fragment on-first-load add-to-wishlist-2438">
			                        <!-- ADD TO WISHLIST -->
			                        <?php 
			                        if(isset($_COOKIE['user_id']))
			                        {
			                        	?>
			                        	<div class="yith-wcwl-add-button et-tooltip" id="wish-container<?php echo $i; ?>">
					                        <span id="wishlist<?php echo $i; ?>" class="icon" > 
					                        	<?php
													$pid = $row['product_id'];
													$user = $_COOKIE['user_id'];

													$wishlist=mysqli_query($con,"select * from wishlist where product_id='$pid' and user_id='$user'");
													$wish = mysqli_num_rows($wishlist);
													?>
													<?php
													if($wish == 0)
													{
													?>
														
															<span id="full-heart<?php echo $i; ?>" class="et-icon et-heart" onclick="check_wishlist(<?php echo $pid; ?>,<?php echo $_COOKIE['user_id']; ?>,<?php echo $i; ?>);"></span>
														</span> 
													<?php
													}
													else
													{
														?>
														<span id="empty-heart<?php echo $i; ?>" class="et-icon et-heart-fill" onclick="check_wishlist(<?php echo $pid; ?>,<?php echo $_COOKIE['user_id']; ?>,<?php echo $i; ?>);"></span>
														<?php
													}
												?>
											</span>
										</div>
										<?php
			                        }
			                        ?>
			                        <!-- COUNT TEXT -->
			                    </div>
			                </div>
			                <div class="product_after_title">
			                    <div class="product_after_shop_loop_price">
			                        <span class="price">
			                            <?php 
			                            if($row['total_items'] == 0)
			                            {
			                            	?>
			                            	<ins>
			                                    <span class="woocommerce-Price-amount amount">
			                                        <bdi>
			                                            <span class="woocommerce-Price-currencySymbol">Out of Stock</span>
			                                        </bdi>
			                                    </span>
			                                </ins>
			                                <?php
			                            }
			                        	else
			                        	{
				                            if($row['discount'] > 0)
				                            {
				                                $d_price = ($row['price']*$row['discount'])/100;
				                                $discount_price = $row['price']-$d_price;
				                            ?>
				                                <del aria-hidden="true">
				                                    <span class="woocommerce-Price-amount amount">
				                                        <bdi>
				                                            <span class="woocommerce-Price-currencySymbol">Rs.</span><?php echo $row['price']; ?>
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
				                                            <span class="woocommerce-Price-currencySymbol">Rs.</span><?php echo $row['price']; ?>
				                                        </bdi>
				                                    </span>
				                                </ins>
				                            <?php
				                            }
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
	    <?php
	}
	else
	{
		echo '<input type="hidden" id="check" value="0">';
	}
}

else if(isset($_POST["limit"], $_POST["start"]) && isset($_POST['discount']))
{
	$query = "SELECT * FROM product where discount>=20 ORDER BY discount desc LIMIT ".$_POST["start"].", ".$_POST["limit"]."";
	$result = mysqli_query($con, $query);
	$total_rows = mysqli_num_rows($result);
	if($total_rows != 0)
	{
	 	?><div class="wcapf-before-products">
		    <div class="woocommerce-notices-wrapper"></div>
		    <ul class="products row et-main-products hover-animation-zoom-jump et-shop-show-variations et-shop-hover-images show-rating main-shop-archive" data-columns="4" data-mobile-columns="2" data-navigation="true" data-pagination="true" data-layoutmode="packery">
		    	<?php
		    	$i=0;
			 	while($row = mysqli_fetch_array($result))
			 	{
			 		$i++;
			 	?>
			    	<li class="item et-listing-style1 col-6 col-sm-6 col-md-4 col-lg-3 small_grid_5 hover-image-load product type-product post-11 status-publish first instock product_cat-women has-post-thumbnail sale featured shipping-taxable purchasable product-type-variable has-default-attributes">
			        <div class="product-inner animation fade animated" et-animated="true">
			            <figure class="product_thumbnail et-image-hover">
			                <a href="product.php?product_no=<?php echo $row['product_id']; ?>" title="<?php echo $row['product_name']; ?>">
			                    <img width="450" height="450" src="../db/images/<?php echo $row['image1']; ?>" class="main-image wp-post-image lazyloaded" alt="" data-ll-status="loaded" srcset="" />
			                    <noscript>
			                        <img width="450" height="450" src="../db/images/<?php echo $row['image1']; ?>" class="main-image wp-post-image" alt="" />
			                    </noscript>
			                    <img width="450" height="450" src="../db/images/<?php echo $row['image2']; ?>" class="product_thumbnail_hover lazyloaded" alt="" data-ll-status="loaded" />
			                    <noscript>
			                        <img width="450" height="450" src="../db/images/<?php echo $row['image2']; ?>" class="product_thumbnail_hover" alt="" />
			                    </noscript>
			                </a>
			                <?php if($row['discount'])
			                {
			                    ?>
			                    <span class="badge onsale perc"><span class="onsale-before">-</span><?php echo $row['discount']; ?><span class="onsale-after">%</span> <span class="onsale-off">Off</span></span>
			                    <?php    
			                }

			                ?>
			                <div class="actions-wrapper">
			                    <div class="actions-inner">
			                        <a href="" onclick="location.href='product.php?product_no=<?php echo $row['product_id']; ?>'" title="Quick View" class="et-quickview-btn et-tooltip product_type_variable">
			                            <span class="text">View Product</span><span class="icon"><span class="et-icon et-maximize-2"></span></span>
			                        </a>
			                    </div>
			                </div>
			            </figure>
			            <div class="caption">
			                <div class="product-title">
			                    <h3><a class="product-link" href="#" title="<?php echo $row['product_name']; ?>"><?php echo $row['product_name']; ?></a></h3>
			                    <div class="yith-wcwl-add-to-wishlist wishlist-fragment on-first-load add-to-wishlist-2438">
			                        <!-- ADD TO WISHLIST -->
			                        <?php 
			                        if(isset($_COOKIE['user_id']))
			                        {
			                        	?>
			                        	<div class="yith-wcwl-add-button et-tooltip" id="wish-container<?php echo $i; ?>">
					                        <span id="wishlist<?php echo $i; ?>" class="icon" > 
					                        	<?php
													$pid = $row['product_id'];
													$user = $_COOKIE['user_id'];

													$wishlist=mysqli_query($con,"select * from wishlist where product_id='$pid' and user_id='$user'");
													$wish = mysqli_num_rows($wishlist);
													?>
													<?php
													if($wish == 0)
													{
													?>
														
															<span id="full-heart<?php echo $i; ?>" class="et-icon et-heart" onclick="check_wishlist(<?php echo $pid; ?>,<?php echo $_COOKIE['user_id']; ?>,<?php echo $i; ?>);"></span>
														</span> 
													<?php
													}
													else
													{
														?>
														<span id="empty-heart<?php echo $i; ?>" class="et-icon et-heart-fill" onclick="check_wishlist(<?php echo $pid; ?>,<?php echo $_COOKIE['user_id']; ?>,<?php echo $i; ?>);"></span>
														<?php
													}
												?>
											</span>
										</div>
										<?php
			                        }
			                        ?>
			                        <!-- COUNT TEXT -->
			                    </div>
			                </div>
			                <div class="product_after_title">
			                    <div class="product_after_shop_loop_price">
			                        <span class="price">
			                            <?php 
			                            if($row['total_items'] == 0)
			                            {
			                            	?>
			                            	<ins>
			                                    <span class="woocommerce-Price-amount amount">
			                                        <bdi>
			                                            <span class="woocommerce-Price-currencySymbol">Out of Stock</span>
			                                        </bdi>
			                                    </span>
			                                </ins>
			                                <?php
			                            }
			                        	else
			                        	{
				                            if($row['discount'] > 0)
				                            {
				                                $d_price = ($row['price']*$row['discount'])/100;
				                                $discount_price = $row['price']-$d_price;
				                            ?>
				                                <del aria-hidden="true">
				                                    <span class="woocommerce-Price-amount amount">
				                                        <bdi>
				                                            <span class="woocommerce-Price-currencySymbol">Rs.</span><?php echo $row['price']; ?>
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
				                                            <span class="woocommerce-Price-currencySymbol">Rs.</span><?php echo $row['price']; ?>
				                                        </bdi>
				                                    </span>
				                                </ins>
				                            <?php
				                            }
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
	    <?php
	}
	else
	{
		echo '<input type="hidden" id="check" value="0">';
	}
}
//shop.php end






//cart.php
else if(isset($_POST['user_id'] , $_POST['product_id'] , $_POST['total_items']))
{
	$user_id = $_POST['user_id'];
	$product_id = $_POST['product_id'];
	$items = $_POST['total_items'];
	$modify_date = date("Y-m-d");
	$cart_check = mysqli_query($con,"select total_items from cart where product_id='$product_id' and user_id='$user_id'");
	$tot_cart_check = mysqli_num_rows($cart_check);
	if($tot_cart_check > 0)
	{
		echo 0;
	}
	else
	{
		$sql = "insert into cart(user_id,product_id,total_items,modify_date) values('$user_id','$product_id','$items','$modify_date')";
		$run = mysqli_query($con,$sql);
		if($run == 0)
		{
			echo 2;
		}
		else
		{
			echo 1;
		}
	}
}

else if(isset($_POST['user'] , $_POST['pid']) )
{
	$user_id = $_POST['user'];
	$product_id = $_POST['pid'];
	$modify_date = date("Y-m-d");
	$run = mysqli_query($con,"select * from wishlist where user_id='$user_id' and product_id='$product_id'");
	$tot_wishlist = mysqli_num_rows($run);
	if($tot_wishlist > 0)
	{
		$wishlist_insert = mysqli_query($con,"delete from wishlist where user_id='$user_id' and product_id='$product_id'");
		if($wishlist_insert == true)
		{
			echo 0;
		}
		else
		{
			echo 2;
		}	
	}
	else
	{
		$wishlist_insert = mysqli_query($con,"insert into wishlist(user_id,product_id,modify_date) values('$user_id','$product_id','$modify_date')");
		if($wishlist_insert == true)
		{
			echo 1;
		}
		else
		{
			echo 2;
		}
	}
}

//cart.php
else if(isset($_POST['quantity'] , $_POST['pid']) )
{
	$quantity = $_POST['quantity'];	
	$pid = $_POST['pid'];
	$user_id = $_COOKIE['user_id'];
	$sql = "update cart set total_items='$quantity' where product_id='$pid' and user_id='$user_id'"; 
	$run = mysqli_query($con,$sql);
	if($run == true)
	{
		echo 1;
	}
	else
	{
		echo 0;
	}
	echo $sql;
}


//search.php
else if (isset($_POST['search'])) {
	$arry = [];
	$search = strtolower($_POST['search']);
	$string = preg_split("/\W+/", $search, -1, PREG_SPLIT_NO_EMPTY);
	$n = sizeof($string);

	for ($i=0; $i < $n; $i++) { 
	  $q = $string[$i];
	  $sql = mysqli_query($con, "SELECT product_name FROM product WHERE LOWER(product_name) LIKE '%$q%' ");
	  array_push($arry,mysqli_fetch_all($sql, MYSQLI_ASSOC));
	}
	if(isset($arry[0]))
	{
		echo json_encode($arry[0]);
	}
	else
	{
		echo '';
	}
}
else if(isset($_POST['pincode']))
{
	$pincode = $_POST['pincode'];
	$response = json_encode(file_get_contents("http://postalpincode.in/api/pincode/".$pincode));
	echo json_decode($response);
}

else if(isset($_POST['order_id'],$_POST['product_id'], $_POST['total_items']))
{
	$order_id=$_POST['order_id'];
	$product_id = $_POST['product_id'];
	$sql_delete = mysqli_query($con,"update orders set status=3 where order_id='$order_id'");
	if($sql_delete == true)
	{
		$sql_p = mysqli_fetch_assoc(mysqli_query($con,"select total_items from product where product_id= '$product_id'"));
		$total_order_item = $_POST['total_items'];
		$total_product_item = $sql_p['total_items'];
		$total_items = $total_order_item + $total_product_item;
		$sql_update = mysqli_query($con,"update product set total_items='$total_items' where product_id='$product_id'");
		if($sql_update == true)
		{
			echo 0;
		}
	}
}

// email check
elseif (isset($_POST['email'])) 
{
	$email = trim($_POST['email']);
	$sql = mysqli_query($con , "select * from user where email='$email'");
	echo mysqli_num_rows($sql);
}

//mobile check
else if(isset($_POST['mobileno']))
{
	$mobileno = trim($_POST['mobileno']);
	$sql = mysqli_query($con , "select * from user where mobile_no='$mobileno'");
	echo mysqli_num_rows($sql);
}

//update check
else if(isset($_POST['email_update']) && isset($_POST['userid']))
	{
		$email = trim($_POST['email_update']);
		$userid = trim($_POST['userid']);
		$sql = mysqli_query($con , "select * from user where user_id not like '$userid' and email='$email'");
		echo mysqli_num_rows($sql);
	}
else if(isset($_POST['mobileno_update']) && isset($_POST['userid']))
{
	$mobileno = trim($_POST['mobileno_update']);
	$userid = trim($_POST['userid']);
	$sql = mysqli_query($con , "select * from user where user_id not like '$userid' and mobile_no='$mobileno'");
	echo mysqli_num_rows($sql);
}

else
{
	if(isset($_COOKIE['user_id']))
	{
		?><script type="text/javascript">location.replace("index.php");</script><?php
	}
	else
	{
		?><script type="text/javascript">location.replace("login.php");</script><?php	
	}
}
?>

