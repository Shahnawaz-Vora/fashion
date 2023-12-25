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
                              $latest_product_sql = mysqli_query($con,"select * from product order by product_id desc limit 4");
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
                                          <div class="actions-wrapper">
                                             <div class="actions-inner">
                                                <div class="yith-wcwl-add-to-wishlist add-to-wishlist-3894  wishlist-fragment on-first-load" data-fragment-ref="3894" data-fragment-options="{&quot;base_url&quot;:&quot;&quot;,&quot;in_default_wishlist&quot;:false,&quot;is_single&quot;:false,&quot;show_exists&quot;:false,&quot;product_id&quot;:3894,&quot;parent_product_id&quot;:3894,&quot;product_type&quot;:&quot;grouped&quot;,&quot;show_view&quot;:false,&quot;browse_wishlist_text&quot;:&quot;Browse Wishlist&quot;,&quot;already_in_wishslist_text&quot;:&quot;The product is already in the wishlist!&quot;,&quot;product_added_text&quot;:&quot;Product added!&quot;,&quot;heading_icon&quot;:&quot;&quot;,&quot;available_multi_wishlist&quot;:false,&quot;disable_wishlist&quot;:false,&quot;show_count&quot;:false,&quot;ajax_loading&quot;:false,&quot;loop_position&quot;:&quot;shortcode&quot;,&quot;item&quot;:&quot;add_to_wishlist&quot;}">
                                                   <!-- ADD TO WISHLIST -->
                                                   <div class="yith-wcwl-add-button et-tooltip">
                                                      <a href="?add_to_wishlist=3894" rel="nofollow" data-product-id="3894" data-product-type="grouped" data-original-product-id="3894" class="add_to_wishlist single_add_to_wishlist" data-title="Add to Wishlist" style="text-decoration: none;">
                                                      <span class="text">Add to Wishlist</span>
                                                      <span class="icon">
                                                      <span class="et-icon et-heart" onclick="check_wishlist(<?php echo $latest_product_fetch['product_id']; ?>,<?php e);">
                                                       </span>
                                                      </span>
                                                      </a>
                                                   </div>
                                                   <!-- COUNT TEXT -->
                                                </div>
                                                <a href="user/product.php?product_no=<?php echo $latest_product_fetch['product_id']; ?>" data-quantity="1" class="button product_type_grouped" data-product_id="3894" data-product_sku="HTDO833" aria-label="View products in the &ldquo;Cashmere Tank + Bag&rdquo; group" rel="nofollow" style="text-decoration: none;">
                                                <span class="text">View products
                                                </span>
                                                <span class="icon">
                                                   <span class="et-icon et-shopping-bag">
                                                  </span>
                                                </span>
                                                </a> 
                                                <a href=https://goya.everthemes.com/demo-fashion/product/cashmere-tank-bag/ title="Quick View" data-product_id="3894" class="et-quickview-btn et-tooltip product_type_grouped">
                                                <span class="text">Add To Cart
                                                </span>
                                                <span class="icon">
                                                <span class="et-icon">
                                                       <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart">
                                                            <circle cx="9" cy="21" r="1"></circle>
                                                            <circle cx="20" cy="21" r="1"></circle>
                                                            <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                                                         </svg>
                                                </span>
                                                </span>
                                                </span>
                                                </a>
                                             </div>
                                          </div>
                                       </figure>
                                       <div class="caption">
                                          <div class="product-title">
                                             <h3>
                                                <a class="product-link" href="https://goya.everthemes.com/demo-fashion/product/cashmere-tank-bag/" title="Cashmere Tank + Bag">Cashmere Tank + Bag
                                                </a>
                                             </h3>
                                          </div>
                                          <div class="product_after_title">
                                             <div class="product_after_shop_loop_price">
                                                <span class="price">
                                                <span class="woocommerce-Price-amount amount">
                                                <bdi>
                                                <span class="woocommerce-Price-currencySymbol">&#36;
                                                </span>39.00
                                                </bdi>
                                                </span> &ndash; 
                                                <span class="woocommerce-Price-amount amount">
                                                <bdi>
                                                <span class="woocommerce-Price-currencySymbol">&#36;
                                                </span>98.00
                                                </bdi>
                                                </span>
                                                </span>
                                             </div>
                                             <div class="product-excerpt">
                                                <p>As timeless as a tank gets. A sleek, cropped fit for a modern look.
                                                </p>
                                             </div>
                                             <div class="after_shop_loop_actions">
                                                <a href="https://goya.everthemes.com/demo-fashion/product/cashmere-tank-bag/" data-quantity="1" class="button product_type_grouped" data-product_id="3894" data-product_sku="HTDO833" aria-label="View products in the &ldquo;Cashmere Tank + Bag&rdquo; group" rel="nofollow">
                                                <span class="text">View products
                                                </span>
                                                <span class="icon">
                                                <span class="et-icon et-shopping-bag">
                                                </span>
                                                </span>
                                                </a> 
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