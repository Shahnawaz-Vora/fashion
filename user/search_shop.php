
<?php
include_once("../db/connection.php");
if(isset($_POST["limit"], $_POST["start"]) && isset($_POST["search"]))
{
	$search = $_POST['search'];
	$query = "SELECT * FROM product WHERE LOWER(product_name) LIKE '%$search%'  ORDER BY product_id DESC LIMIT ".$_POST["start"].", ".$_POST["limit"]."";
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

?>