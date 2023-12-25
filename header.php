<style>
   .menuu-items:hover,/* OPTIONAL*/
   .menuu-items:visited,
   .menuu-items:focus
   {
   text-decoration: none !important;
   color:#444444;
   }
   .menuu-items:hover
   {
   border-bottom: 2px solid;
   padding-bottom: 3px;
   }
   .menuu-items .active{
   border-bottom:2px solid;
   }


   #search {
      outline: none;
   }
   #search[type=search] {
      -webkit-appearance: textfield;
      -webkit-box-sizing: content-box;
      font-family: inherit;
      font-size: 100%;
      height: 30%;
      background-color: inherit;
      border-color: transparent;
      cursor: pointer;
   }
   #search::-webkit-search-decoration,
   #search::-webkit-search-cancel-button {
      display: none; 
   }


   #search {
      background: #ededed url('assets/vc/search.svg') no-repeat 9px center;
      width: 55px;
      
      -webkit-border-radius: 10em;
      -moz-border-radius: 10em;
      border-radius: 10em;
      
      -webkit-transition: all .5s;
      -moz-transition: all .5s;
      transition: all .5s;
   }
   #search:focus {
   width: 130px;
   background-color: #fff;
   border-color: #66CC75;
   
   -webkit-box-shadow: 0 0 5px rgba(109,207,246,.5);
   -moz-box-shadow: 0 0 5px rgba(109,207,246,.5);
   box-shadow: 0 0 5px rgba(109,207,246,.5);
}


#search:-moz-placeholder {
   color: #999;
}
#search::-webkit-input-placeholder {
   color: #999;
}

/* Demo 2 */
#demo-2 #search {
   width: 15px;
   margin-bottom: 0;
   padding-left: 10px;
   color: transparent;
   cursor: pointer;
}
#demo-2 #search:hover {
}
#demo-2 #search:focus {
   width: 130px;
   padding-left: 38px;
   color: #000;
   background-color: #fff;
   cursor: auto;
}
#demo-2 #search:-moz-placeholder {
   color: transparent;
}
#demo-2 #search::-webkit-input-placeholder {
   color: transparent;
}

#search-form 
{
  position: relative;
  width: 30rem;
  background: var(--color-brand);
  border-radius: var(--rad);
}
.mobile-search, .search-button {
  height: var(--height);
  font-family: var(--font-fam);
  border: 0;
  color: var(--color-dark);
  font-size: 1.8rem;
}
.mobile-search[type="search"] {
  outline: 0; // 
  width: 100%;
  background: var(--color-light);
  
  border-radius: var(--rad);
  appearance: none; //for iOS input[type="search"] roundedness issue. border-radius alone doesn't work
  transition: all var(--dur) var(--bez);
  transition-property: width, border-radius;
  z-index: 1;
  position: relative;
  background: #embedded url('../assets/vc/search.svg') no-repeat 9px center;
  background-position: right 10px center;
}
.search-button {
  display: none; // prevent being able to tab to it
  position: absolute;
  top: 0;
  right: 0;
  width: var(--btn-width);
  font-weight: bold;
  background: var(--color-brand);
  border-radius: 0 var(--rad) var(--rad) 0;
}
.mobile-search:not(:placeholder-shown) {
  border-radius: var(--rad) 0 0 var(--rad);
  width: calc(100% - var(--btn-width));
  + button {
    display: block;
  }
}
.search-label {
  position: absolute;
  clip: rect(1px, 1px, 1px, 1px);
  padding: 0;
  border: 0;
  height: 1px;
  width: 1px;
  overflow: hidden;
}
</style>
<header id="header" class="header site-header header-v1 sticky-display-top megamenu-fullwidth megamenu-column-animation">
   <div class="header-main header-section logo-center ">
      <div class="header-contents container ">
         <!--menu-->
         <div class="header-left-items header-items">
            <div class="hamburger-menu">
               <button class="menu-toggle fullscreen-toggle" data-target="fullscreen-menu">
                  <span class="bars">
                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu">
                        <line x1="3" y1="12" x2="21" y2="12"></line>
                        <line x1="3" y1="6" x2="21" y2="6"></line>
                        <line x1="3" y1="18" x2="21" y2="18"></line>
                     </svg>
                  </span>
                  <span class="name">Menu</span>
               </button>
            </div>
         </div>
         <!--logo-->
         <div class="header-center-items header-items">
            <div class="logo-holder">
               <?php
               if(isset($_COOKIE['user_id']))
               {
                  ?><a href="user/index.php" rel="home" class="logolink ">
                  <img src="assets/img/logo.png" width="201" height="48" class="skip-lazy logoimg bg--light" alt="Fashion" />
                  <img src="assets/img/logo.png" width="201" height="48" class="skip-lazy logoimg bg--dark" alt="Fashion" /> </a><?php
               }
               else
               {
                  ?><a href="index.php" rel="home" class="logolink ">
                  <img src="assets/img/logo.png" width="201" height="48" class="skip-lazy logoimg bg--light" alt="Fashion" />
                  <img src="assets/img/logo.png" width="201" height="48" class="skip-lazy logoimg bg--dark" alt="Fashion" /> </a><?php
               }
               ?>
            </div>
         </div>
         <div class="header-right-items header-items">
            <!-- login btn -->
            <a href="user/login.php" class="account-text menuu-items">
            <span class="icon-text">Login</span> 
            </a>
            <!-- search btn -->
            <div id="demo-2" >
               <input type="search" class="" id="search" placeholder="Search">
            </div>

            <a href="user/wishlist.php" class="quick_wishlist icon">
               <span class="text">Wishlist</span>
               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart">
                  <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
               </svg>
               <span class="item-counter et-wishlist-counter"></span>
            </a>
            <a href="user/cart.php" title="Cart" class="icon">
               <span class="text d-none">Cart</span>
               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag">
                  <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                  <line x1="3" y1="6" x2="21" y2="6"></line>
                  <path d="M16 10a4 4 0 0 1-8 0"></path>
               </svg>
               <!-- <span class="item-counter minicart-counter">5</span> -->
            </a>
         </div>
      </div>
   </div>
   <!--mobile header-->
   <div class="header-mobile logo-center">
      <div class="header-contents container">
         <div class="hamburger-menu">
            <button class="menu-toggle mobile-toggle" data-target="mobile-menu">
               <span class="bars">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu">
                     <line x1="3" y1="12" x2="21" y2="12"></line>
                     <line x1="3" y1="6" x2="21" y2="6"></line>
                     <line x1="3" y1="18" x2="21" y2="18"></line>
                  </svg>
               </span>
               <span class="name">Menu</span>
            </button>
         </div>
         <div class="logo-holder">
            <a href="index.php" rel="home" class="logolink ">
            <img src="assets/img/logo.png" width="201" height="48" class="skip-lazy logoimg bg--light" alt="Goya Fashion" />
            <img src="assets/img/logo.png" width="201" height="48" class="skip-lazy logoimg bg--dark" alt="Goya Fashion" /> </a>
         </div>
         <div class="mobile-header-icons">
            <a href="user/cart.php" title="Cart">
               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag">
                  <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                  <line x1="3" y1="6" x2="21" y2="6"></line>
                  <path d="M16 10a4 4 0 0 1-8 0"></path>
               </svg>
               <span class="item-counter minicart-counter et-count-zero">0</span>
            </a>
         </div>
      </div>
   </div>
</header>
<!-- fullscreen menu -->
<nav id="fullscreen-menu" class="side-panel side-menu side-fullscreen-menu light no-bar">
   <header>
      <div class="container">
         <div class="panel-header-inner">
            <a href="#" class="et-close" title="Close"></a>
         </div>
      </div>
   </header>
   <div class="side-panel-content side-panel-mobile custom_scroll">
      <div class="container">
         <ul id="menu-main-2" class="mobile-menu big-menu">
            
         	<!-- Main Section Menu -->
            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-861 current_page_item current-menu-ancestor current_page_ancestor menu-item-has-children menu-item-2742 menu-item-mega-parent menu-item-mega-column-5">
               <a href="user/shop.php?all=1" aria-current="page">Main</a><span class="et-menu-toggle"></span>
               <ul class="sub-menu">
	                <li class="menu-item menu-item-type-custom menu-item-object-custom current-menu-ancestor current-menu-parent menu-item-has-children menu-item-1708 ">
	                     <a href="#">Mens</a><span class="et-menu-toggle"></span>
	                     <ul class="sub-menu">
	                        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home page_item page-item-861 current_page_item menu-item-2726 " ><a href="user/shop.php?category=Mens&subcategory=T-Shirts" style="cursor: pointer;" aria-current="page">T-shirt</a><span class="et-menu-toggle"></span></li>
	                        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2699 "><a href="user/shop.php?category=Mens&subcategory=Jackets">Jackets</a><span class="et-menu-toggle"></span></li>
	                        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2700 "><a href="user/shop.php?category=Mens&subcategory=Casual-Shirts">Casual Shirts</a><span class="et-menu-toggle"></span></li>
	                        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2702 "><a href="user/shop.php?category=Mens&subcategory=Jeans">Jeans</a><span class="et-menu-toggle"></span></li>
	                        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2697 "><a href="user/shop.php?category=Mens&subcategory=Casual-Trouser">Casual Trousers</a><span class="et-menu-toggle"></span></li>
	                     </ul>
	                </li>
	                <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-2561 ">
	                     <a href="#">Womens</a><span class="et-menu-toggle"></span>
	                     <ul class="sub-menu">
	                        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2563 "><a href="user/shop.php?category=Womens&subcategory=Kurtas-Kurtis-Suits">Kurtas-Kurtis & Suits</a><span class="et-menu-toggle"></span></li>
	                        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2564 "><a href="user/shop.php?category=Womens&subcategory=Skirts-Palazzos">Skirts & Palazzos</a><span class="et-menu-toggle"></span></li>
	                        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-191 "><a href="user/shop.php?category=Womens&subcategory=Sarees">Sarees</a><span class="et-menu-toggle"></span></li>
	                        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-584 "><a href="user/shop.php?category=Womens&subcategory=Dress">Dress</a><span class="et-menu-toggle"></span></li>
	                        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-3191 "><a href="user/shop.php?category=Womens&subcategory=Jeans">Jeans</a><span class="et-menu-toggle"></span></li>
	                     </ul>
	                </li>
	                <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-571 ">
	                     <a href="#">Boys Section</a><span class="et-menu-toggle"></span>
	                     <ul class="sub-menu">
	                        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2119 "><a href="user/shop.php?category=Kids&subcategory=T-Shirts">T-Shirt</a><span class="et-menu-toggle"></span></li>
	                        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-569 "><a href="user/shop.php?category=Kids&subcategory=Shirts">Shirt</a><span class="et-menu-toggle"></span></li>
	                        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2122 "><a href="user/shop.php?category=Kids&subcategory=Shorts">Shorts</a><span class="et-menu-toggle"></span></li>
	                        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2118 "><a href="user/shop.php?category=Kids&subcategory=Jeans">Jeans</a><span class="et-menu-toggle"></span></li>
	                        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2556 "><a href="user/shop.php?category=Kids&subcategory=Trouser">Trouser</a><span class="et-menu-toggle"></span></li>
	                     </ul>
	                </li>
	                <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-571 " style="margin-top: 40px;">
	                     <a href="#">Girls Section</a><span class="et-menu-toggle"></span>
	                     <ul class="sub-menu">
	                        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2119 "><a href="user/shop.php?category=Kids&subcategory=G-Dresses">Dresses</a><span class="et-menu-toggle"></span></li>
	                        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-569 "><a href="user/shop.php?category=Kids&subcategory=G-Tops">Top</a><span class="et-menu-toggle"></span></li>
	                        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2122 "><a href="user/shop.php?category=Kids&subcategory=G-T-Shirts">T-Shirt</a><span class="et-menu-toggle"></span></li>
	                        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2118 "><a href="user/shop.php?category=Kids&subcategory=G-Jeans">Jeans</a><span class="et-menu-toggle"></span></li>
	                        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2556 "><a href="user/shop.php?category=Kids&subcategory=G-Trouser">Trouser</a><span class="et-menu-toggle"></span></li>
	                     </ul>
	                </li>
	                <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-571 " style="margin-top: 40px;">
	                 <a href="#">Men Accessories</a><span class="et-menu-toggle"></span>
	                     <ul class="sub-menu">
	                        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2119 "><a href="user/shop.php?category=Mens&subcategory=Watches">Watches</a><span class="et-menu-toggle"></span></li>
	                        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-569 "><a href="user/shop.php?category=Mens&subcategory=Wallets">Wallets</a><span class="et-menu-toggle"></span></li>
	                        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2122 "><a href="user/shop.php?category=Mens&subcategory=Belt">Belts</a><span class="et-menu-toggle"></span></li>
	                        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2118 "><a href="user/shop.php?category=Mens&subcategory=Sunglasses-Frames">Sunglasses</a><span class="et-menu-toggle"></span></li>
	                        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2556 "><a href="user/shop.php?category=Mens&subcategory=Caps">Caps</a><span class="et-menu-toggle"></span></li>
	                     </ul>
	              	</li>
                    <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-571 " style="margin-top: 40px;">
                     <a href="#">Kids Accessories</a><span class="et-menu-toggle"></span>
                     <ul class="sub-menu">
                        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2119 "><a href="user/shop.php?category=Kids&subcategory=Bags-Backpacks">Bags & Backpack</a><span class="et-menu-toggle"></span></li>
                        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-569 "><a href="user/shop.php?category=Kids&subcategory=Watches">Watches</a><span class="et-menu-toggle"></span></li>
                        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2118 "><a href="user/shop.php?category=Kids&subcategory=Sunglasses">Sunglasses</a><span class="et-menu-toggle"></span></li>
                     </ul>
                    </li>
               </ul>
            </li>
            <!-- Main Section Menu End-->

            <!-- men section -->
            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-36 menu-item-mega-parent menu-item-mega-column-5">
               <a href="user/shop.php?category=Mens&single=1">Mens</a><span class="et-menu-toggle"></span>
               <ul class="sub-menu">
                  <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-3524 ">
                     <a href="#">TopWear</a><span class="et-menu-toggle"></span>
                     <ul class="sub-menu">

                     	<!-- topwear -->
                        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-189 "><a href="user/shop.php?category=Mens&subcategory=T-Shirts">T-Shirts</a><span class="et-menu-toggle"></span></li>
                        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-186 "><a href="user/shop.php?category=Mens&subcategory=Casual-Shirts">Casual Shirts</a><span class="et-menu-toggle"></span></li>
                        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-186 "><a href="user/shop.php?category=Mens&subcategory=Formal-Shirts">Formal Shirts</a><span class="et-menu-toggle"></span></li>
                        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-187 "><a href="user/shop.php?category=Mens&subcategory=Jackets">Jacket</a><span class="et-menu-toggle"></span></li>
                        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-188 "><a href="user/shop.php?category=Mens&subcategory=Blazzers">Blazzers</a><span class="et-menu-toggle"></span></li>
                        
                        <!-- Accessories -->
                        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-144  title-item"><a href="#">Accessories</a><span class="et-menu-toggle"></span></li>
                        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-139 "><a href="user/shop.php?category=Mens&subcategory=Sunglasses-Frames">Sunglasses & Frames</a><span class="et-menu-toggle"></span></li>
                        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-138 "><a href="user/shop.php?category=Mens&subcategory=Watches">Watches</a><span class="et-menu-toggle"></span></li>
                        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-137 "><a href="user/shop.php?category=Mens&subcategory=Wallets">Wallets</a><span class="et-menu-toggle"></span></li>
                        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-137 "><a href="user/shop.php?category=Mens&subcategory=Belt">Belt</a><span class="et-menu-toggle"></span></li>
                        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-137 "><a href="user/shop.php?category=Mens&subcategory=Socks">Socks</a><span class="et-menu-toggle"></span></li>                        
                        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-137 "><a href="user/shop.php?category=Mens&subcategory=Caps">Caps</a><span class="et-menu-toggle"></span></li>
                        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-137 "><a href="user/shop.php?category=Mens&subcategory=Deodrant-Perfumes">Deodrants & Perfumes</a><span class="et-menu-toggle"></span></li>
                     </ul>
                  </li>
                  <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-2077 ">
                     <a href="#">Bottom Wear</a><span class="et-menu-toggle"></span>
                     <ul class="sub-menu">

                     	<!-- bottomwear -->
                        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-546 "><a href="user/shop.php?category=Mens&subcategory=Jeans">Jeans</a><span class="et-menu-toggle"></span></li>
                        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-272 "><a href="user/shop.php?category=Mens&subcategory=Casual-Trouser">Casual Trouser</a><span class="et-menu-toggle"></span></li>
                        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2076 "><a href="user/shop.php?category=Mens&subcategory=Formal-Trouser">Formal Trouser</a><span class="et-menu-toggle"></span></li>
                        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2079 "><a href="user/shop.php?category=Mens&subcategory=Track-Shorts">Track & Shorts</a><span class="et-menu-toggle"></span></li>
                     </ul>
                  </li>
                  <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-2067 ">
                     <a href="#">Footwear</a><span class="et-menu-toggle"></span>
                     <!-- footwear -->
                     <ul class="sub-menu">
                        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-147 "><a href="user/shop.php?category=Mens&subcategory=Casual-Shoes">Casual Shoes</a><span class="et-menu-toggle"></span></li>
                        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-147 "><a href="user/shop.php?category=Mens&subcategory=Formal-Shoes">Formal Shoes</a><span class="et-menu-toggle"></span></li>
                        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-147 "><a href="user/shop.php?category=Mens&subcategory=Sport-Shoes">Sport Shoes</a><span class="et-menu-toggle"></span></li>
                        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-147 "><a href="user/shop.php?category=Mens&subcategory=Sandals">Sandals</a><span class="et-menu-toggle"></span></li>

                     </ul>
                  </li>
               </ul>
            </li>
            <!-- men section ends -->

            <!-- women section -->
            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-133 menu-item-mega-parent menu-item-mega-column-5">
               <a href="user/shop.php?category=Womens&single=1">Womens</a><span class="et-menu-toggle"></span>
               <ul class="sub-menu">
                  <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-257 ">
                     <a href="#">Indian fusion Wear</a><span class="et-menu-toggle"></span>
                     <ul class="sub-menu">
                        <li class="menu-item menu-item-type-post_type menu-item-object-product menu-item-3885 "><a href="user/shop.php?category=Womens&subcategory=Kurtas-Kurtis-Suits">Kurtas-Kurtis & Suits</a><span class="et-menu-toggle"></span></li>
                        <li class="menu-item menu-item-type-post_type menu-item-object-product menu-item-3886 "><a href="user/shop.php?category=Womens&subcategory=Skirts-Palazzos">Skirts & Palazzos</a><span class="et-menu-toggle"></span></li>
                        <li class="menu-item menu-item-type-post_type menu-item-object-product menu-item-3887 "><a href="user/shop.php?category=Womens&subcategory=Sarees">Sarees</a><span class="et-menu-toggle"></span></li>
                        <li class="menu-item menu-item-type-post_type menu-item-object-product menu-item-3899 "><a href="user/shop.php?category=Womens&subcategory=Dress">Dress</a><span class="et-menu-toggle"></span></li>
                        <li class="menu-item menu-item-type-post_type menu-item-object-product menu-item-3899 "><a href="user/shop.php?category=Womens&subcategory=Jackets">Jackets</a><span class="et-menu-toggle"></span></li>
                     </ul>
                  </li>

                  <!-- western wear -->
                  <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-2055 ">
                     <a href="#">Western Wear</a><span class="et-menu-toggle"></span>
                     <ul class="sub-menu">
                        <li class="menu-item menu-item-type-post_type menu-item-object-product menu-item-150 "><a href="user/shop.php?category=Womens&subcategory=Tops">Tops</a><span class="et-menu-toggle"></span></li>
                        <li class="menu-item menu-item-type-post_type menu-item-object-product menu-item-3897 "><a href="user/shop.php?category=Womens&subcategory=Jeans">Jeans</a><span class="et-menu-toggle"></span></li>
                        <li class="menu-item menu-item-type-post_type menu-item-object-product menu-item-367 "><a href="user/shop.php?category=Womens&subcategory=Trouser-Capris">Trousers & Capris</a><span class="et-menu-toggle"></span></li>
                        <li class="menu-item menu-item-type-post_type menu-item-object-product menu-item-2159 "><a href="user/shop.php?category=Womens&subcategory=Sweaters-Sweatshirts">Sweaters & Sweatshirts</a><span class="et-menu-toggle"></span></li>
                        <li class="menu-item menu-item-type-post_type menu-item-object-product menu-item-2159 "><a href="user/shop.php?category=Womens&subcategory=Jackets-Coats">Jackets & Coats</a><span class="et-menu-toggle"></span></li>
                     </ul>
                  </li>

                  <!-- footwear -->
                  <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-281 ">
                     <a href="#">Footwear</a><span class="et-menu-toggle"></span>
                     <ul class="sub-menu">
                        <li class="menu-item menu-item-type-post_type menu-item-object-product menu-item-2056 "><a href="user/shop.php?category=Womens&subcategory=Flats">Flats</a><span class="et-menu-toggle"></span></li>
                        <li class="menu-item menu-item-type-post_type menu-item-object-product menu-item-3900 "><a href="user/shop.php?category=Womens&subcategory=Casual-Shoes">Casual Shoes</a><span class="et-menu-toggle"></span></li>
                        <li class="menu-item menu-item-type-post_type menu-item-object-product menu-item-3808 "><a href="user/shop.php?category=Womens&subcategory=Heels">Heels</a><span class="et-menu-toggle"></span></li>
                        <li class="menu-item menu-item-type-post_type menu-item-object-product menu-item-3809 "><a href="user/shop.php?category=Womens&subcategory=Sports-Floaters">Sports Shoes & Floaters</a><span class="et-menu-toggle"></span></li>
                     </ul>
                  </li>
               </ul>
            </li>
            <!-- women section ends -->

            <!-- kids section  -->
            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-522 menu-item-mega-parent menu-item-mega-column-5">
               <a href="user/shop.php?category=Kids&single=1">Kids</a><span class="et-menu-toggle"></span>
               <ul class="sub-menu">
                  <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-570 ">

                  	<!-- boys wear -->
                     <a href="#">Boys Wear</a><span class="et-menu-toggle"></span>
                     <ul class="sub-menu">
                        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-523 "><a href="user/shop.php?category=Kids&subcategory=T-Shirts">T-shirt</a><span class="et-menu-toggle"></span></li>
                        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2392 "><a href="user/shop.php?category=Kids&subcategory=Shirts">Shirt</a><span class="et-menu-toggle"></span></li>
                        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2393 "><a href="user/shop.php?category=Kids&subcategory=Shorts">Shorts</a><span class="et-menu-toggle"></span></li>
                        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-524 "><a href="user/shop.php?category=Kids&subcategory=Jeans">Jeans</a><span class="et-menu-toggle"></span></li>
                        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-777 "><a href="user/shop.php?category=Kids&subcategory=Trouser">Trouser</a><span class="et-menu-toggle"></span></li>
                        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-777 "><a href="user/shop.php?category=Kids&subcategory=B-Track-Pyjamas">Track Pant And Pyjamas</a><span class="et-menu-toggle"></span></li>                        
                     </ul>
                  </li>
                  <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-3522 ">
                     <a href="#">Girls Wear</a><span class="et-menu-toggle"></span>
                     <ul class="sub-menu">
                        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1453 "><a href="user/shop.php?category=Kids&subcategory=G-Dresses">Dresses</a><span class="et-menu-toggle"></span></li>
                        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1374 "><a href="user/shop.php?category=Kids&subcategory=G-Tops">Tops</a><span class="et-menu-toggle"></span></li>
                        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1376 "><a href="user/shop.php?category=Kids&subcategory=G-T-Shirts">T-Shirt</a><span class="et-menu-toggle"></span></li>
                       	<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1376 "><a href="user/shop.php?category=Kids&subcategory=G-Jeans">Jeans</a><span class="et-menu-toggle"></span></li>
                       	<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1376 "><a href="user/shop.php?category=Kids&subcategory=G-Trouser">Trouser</a><span class="et-menu-toggle"></span></li>
                       	<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1376 "><a href="user/shop.php?category=Kids&subcategory=G-Jacket-Sweaters">Jacket & sweater</a><span class="et-menu-toggle"></span></li>
                     </ul>
                  </li>

                  <!-- Accessories -->
                  <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-2426 ">
                     <a href="#">Accessories</a><span class="et-menu-toggle"></span>
                     <ul class="sub-menu">
                        <li class="menu-item menu-item-type-post_type menu-item-object-portfolio menu-item-2821 "><a href="user/shop.php?category=Kids&subcategory=Bags-Backpacks">Bags & Backpacks</a><span class="et-menu-toggle"></span></li>
                        <li class="menu-item menu-item-type-post_type menu-item-object-portfolio menu-item-2425 "><a href="user/shop.php?category=Kids&subcategory=Watches">Watches</a><span class="et-menu-toggle"></span></li>
                        <li class="menu-item menu-item-type-post_type menu-item-object-portfolio menu-item-2820 "><a href="user/shop.php?category=Kids&subcategory=Sunglasses">Sunglasses</a><span class="et-menu-toggle"></span></li>
                     </ul>
                  </li>

                  <!-- Boys Footwear -->
                  	<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-2426 ">
	                    <a href="#">Boys Footwear</a><span class="et-menu-toggle"></span>
	                     <ul class="sub-menu">
	                        <li class="menu-item menu-item-type-post_type menu-item-object-portfolio menu-item-2821 "><a href="user/shop.php?category=Kids&subcategory=B-Casual-Shoes">Casual Shoes</a><span class="et-menu-toggle"></span></li>
	                        <li class="menu-item menu-item-type-post_type menu-item-object-portfolio menu-item-2425 "><a href="user/shop.php?category=Kids&subcategory=B-Sport-Shoes">Sport Shoes</a><span class="et-menu-toggle"></span></li>
	                        <li class="menu-item menu-item-type-post_type menu-item-object-portfolio menu-item-2820 "><a href="user/shop.php?category=Kids&subcategory=B-Sandals">Sandal</a><span class="et-menu-toggle"></span></li>
	                        <li class="menu-item menu-item-type-post_type menu-item-object-portfolio menu-item-2820 "><a href="user/shop.php?category=Kids&subcategory=B-School-Shoes">School Shoes</a><span class="et-menu-toggle"></span></li>
	                     </ul>
                  	</li>

                  	<!-- Girls footwear -->
                    <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-2426 ">
                     <a href="#">Girls Footwear</a><span class="et-menu-toggle"></span>
                     <ul class="sub-menu">
                        <li class="menu-item menu-item-type-post_type menu-item-object-portfolio menu-item-2821 "><a href="user/shop.php?category=Kids&subcategory=Flats">Flats</a><span class="et-menu-toggle"></span></li>
                        <li class="menu-item menu-item-type-post_type menu-item-object-portfolio menu-item-2425 "><a href="user/shop.php?category=Kids&subcategory=Heels">Heels</a><span class="et-menu-toggle"></span></li>
                        <li class="menu-item menu-item-type-post_type menu-item-object-portfolio menu-item-2820 "><a href="user/shop.php?category=Kids&subcategory=G-Casual-Shoes">Casual Shoes</a><span class="et-menu-toggle"></span></li>
                        <li class="menu-item menu-item-type-post_type menu-item-object-portfolio menu-item-2820 "><a href="user/shop.php?category=Kids&subcategory=G-Sport-Shoes">Sport Shoes</a><span class="et-menu-toggle"></span></li>
                        <li class="menu-item menu-item-type-post_type menu-item-object-portfolio menu-item-2820 "><a href="user/shop.php?category=Kids&subcategory=G-School-Shoes">School Shoes</a><span class=""></span></li>
                     </ul>
                  </li>
               </ul>
            </li>
            <!-- kids end -->
            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-522 menu-item-mega-parent menu-item-mega-column-5">
               <a href="contact_us.php">Contact Us</a><span class="et-menu-toggle"></span>
            </li>
         </ul>

         <div class="bottom-extras">
            <div class="divider"></div>
            <div class="fullscreen-menu__divider divider"></div>
            <ul class="social-icons mobile-social-icons">
               <li><a href="#" target="_blank" data-toggle="tooltip" data-placement="left" title="facebook" style="text-decoration:none;color:#444444"><span class="et-icon et-facebook"></span></a></li>
               <li><a href="#" target="_blank" data-toggle="tooltip" data-placement="left" title="twitter" style="text-decoration:none;color:#444444"><span class="et-icon et-twitter"></span></a></li>
               <li><a href="#" target="_blank" data-toggle="tooltip" data-placement="left" title="instagram" style="text-decoration:none;color:#444444"><span class="et-icon et-instagram"></span></a></li>
            </ul>
         </div>
      </div>
   </div>
</nav>


<!-- Mobile Menu -->

<nav id="mobile-menu" class="side-panel side-menu side-mobile-menu light no-bar">
	<header>
		<div class="container">
			<div class="panel-header-inner">
				<a href="#" class="et-close" title="Close"></a>
			</div>
		</div>
	</header>
	<div class="side-panel-content side-panel-mobile custom_scroll">
		<div class="container">
			<div class="mobile-top-extras">
			</div>
			<form onsubmit="event.preventDefault();" role="search" id="search-form">
           <label for="search" class="search-label">Search for stuff</label>
           <input type="search" id="search1" class="mobile-search" placeholder="Search..." autofocus required />
         </form>
			<div id="mobile-menu-container" class="menu-main-container">
				<ul id="menu-main-1" class="mobile-menu small-menu menu-sliding">

					<!-- Mobile Menu Main Section  -->
					<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-861 current_page_item current-menu-ancestor current_page_ancestor menu-item-has-children menu-item-2742 menu-item-mega-parent menu-item-mega-column-5"><a href="#" aria-current="page">Main</a><span class="et-menu-toggle"></span>
						<ul class="sub-menu">
							<li class="menu-item menu-item-type-custom menu-item-object-custom current-menu-ancestor current-menu-parent menu-item-has-children menu-item-1708 "><a href="#">Mens</a><span class="et-menu-toggle"></span>
								<ul class="sub-menu">
									<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-861 current_page_item menu-item-2726 "><a href="user/shop.php?category=Mens&subcategory=T-Shirts" aria-current="page">T-Shirts</a><span class="et-menu-toggle"></span></li>
									<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2699 "><a href="user/shop.php?category=Mens&subcategory=Jackets">Jackets</a><span class="et-menu-toggle"></span></li>
									<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2700 "><a href="user/shop.php?category=Mens&subcategory=Casual-Shirts">Casual Shirt</a><span class="et-menu-toggle"></span></li>
									<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2702 "><a href="user/shop.php?category=Mens&subcategory=Jeans">Jeans</a><span class="et-menu-toggle"></span></li>
									<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2697 "><a href="user/shop.php?category=Mens&subcategory=Casual-Trouser">Casual Trousers</a><span class="et-menu-toggle"></span></li>
								</ul>
							</li>
							<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-2561 "><a href="#">Womens</a><span class="et-menu-toggle"></span>
								<ul class="sub-menu">
									<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2563 "><a href="user/shop.php?category=Womens&subcategory=Kurtas-Kurtis-Suits">Kurtas-Kurtis & Suits</a><span class="et-menu-toggle"></span></li>
									<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2564 "><a href="user/shop.php?category=Womens&subcategory=Skirts-Palazzos">Skirts & Palazzos</a><span class="et-menu-toggle"></span></li>
									<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-191 "><a href="user/shop.php?category=Womens&subcategory=Sarees">Sarees</a><span class="et-menu-toggle"></span></li>
									<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-584 "><a href="user/shop.php?category=Womens&subcategory=Dress">Dress</a><span class="et-menu-toggle"></span></li>
									<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-3191 "><a href="user/shop.php?category=Womens&subcategory=Jeans">Jeans</a><span class="et-menu-toggle"></span></li>
								</ul>
							</li>
							<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-571 "><a href="#">Boys Section</a><span class="et-menu-toggle"></span>
								<ul class="sub-menu">
									<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2119 "><a href="user/shop.php?category=Kids&subcategory=T-Shirts">T-Shirt</a><span class="et-menu-toggle"></span></li>
									<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-569 "><a href="user/shop.php?category=Kids&subcategory=Shirts">Shirt</a><span class="et-menu-toggle"></span></li>
									<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2122 "><a href="user/shop.php?category=Kids&subcategory=Shorts">Shorts</a><span class="et-menu-toggle"></span></li>
									<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2118 "><a href="user/shop.php?category=Kids&subcategory=Jeans">Jeans</a><span class="et-menu-toggle"></span></li>
									<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2556 "><a href="user/shop.php?category=Kids&subcategory=Trouser">Trouser</a><span class="et-menu-toggle"></span></li>
								</ul>
							</li>
							<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-571 "><a href="#">Girls Section</a><span class="et-menu-toggle"></span>
								<ul class="sub-menu">
									<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2119 "><a href="user/shop.php?category=Kids&subcategory=G-Dresses">Dresses</a><span class="et-menu-toggle"></span></li>
									<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-569 "><a href="user/shop.php?category=Kids&subcategory=G-Tops">Top</a><span class="et-menu-toggle"></span></li>
									<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2122 "><a href="user/shop.php?category=Kids&subcategory=G-T-Tops">T-Shirt</a><span class="et-menu-toggle"></span></li>
									<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2118 "><a href="user/shop.php?category=Kids&subcategory=G-Jeans">Jeans</a><span class="et-menu-toggle"></span></li>
									<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2556 "><a href="user/shop.php?category=Kids&subcategory=G-Trouser">Trouser</a><span class="et-menu-toggle"></span></li>
								</ul>
							</li>
							<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-571 "><a href="#">Men Accessories</a><span class="et-menu-toggle"></span>
								<ul class="sub-menu">
									<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2119 "><a href="user/shop.php?category=Mens&subcategory=Watches">Watches</a><span class="et-menu-toggle"></span></li>
									<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-569 "><a href="user/shop.php?category=Mens&subcategory=Wallets">Wallets</a><span class="et-menu-toggle"></span></li>
									<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2122 "><a href="user/shop.php?category=Mens&subcategory=Belt">Belts</a><span class="et-menu-toggle"></span></li>
									<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2118 "><a href="user/shop.php?category=Mens&subcategory=Sunglasses-Frames">Sunglasses</a><span class="et-menu-toggle"></span></li>
									<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2556 "><a href="user/shop.php?category=Mens&subcategory=Caps">Caps</a><span class="et-menu-toggle"></span></li>
								</ul>
							</li>
							<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-571 "><a href="#">Kids Accessories</a><span class="et-menu-toggle"></span>
								<ul class="sub-menu">
									<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2119 "><a href="user/shop.php?category=Kids&subcategory=Bags-Backpacks">Bags & Backpack</a><span class="et-menu-toggle"></span></li>
									<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-569 "><a href="user/shop.php?category=Kids&subcategory=Watches">Watches</a><span class="et-menu-toggle"></span></li>
									<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2122 "><a href="user/shop.php?category=Kids&subcategory=Sunglasses">Sunglasses</a><span class="et-menu-toggle"></span></li>
								</ul>
							</li>
						</ul>
					</li>
					<!-- Mobile Menu Main Section End  -->

					<!-- Mobile Menu Men Section -->					
					<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-36 menu-item-mega-parent menu-item-mega-column-5"><a href="#">Mens</a><span class="et-menu-toggle"></span>
						<ul class="sub-menu">
							<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-3524 "><a href="#">TopWear</a><span class="et-menu-toggle"></span>
								<ul class="sub-menu">
									<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-189 "><a href="user/shop.php?category=Mens&subcategory=T-Shirts">T-Shirts</a><span class="et-menu-toggle"></span></li>
									<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-189 "><a href="user/shop.php?category=Mens&subcategory=Casual-Shirts">Casual Shirts</a><span class="et-menu-toggle"></span></li>
									<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-186 "><a href="user/shop.php?category=Mens&subcategory=Formal-Shirts">Formal Shirts</a><span class="et-menu-toggle"></span></li>
									<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-187 "><a href="user/shop.php?category=Mens&subcategory=Jackets">Jacket</a><span class="et-menu-toggle"></span></li>
									<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-188 "><a href="user/shop.php?category=Mens&subcategory=Blazzers">Blazzers</a><span class="et-menu-toggle"></span></li>
								</ul>
							</li>
							<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-2077 "><a href="#">Bottom Wear</a><span class="et-menu-toggle"></span>
								<ul class="sub-menu">
									<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-546 "><a href="user/shop.php?category=Mens&subcategory=Jeans">Jeans</a><span class="et-menu-toggle"></span></li>
									<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-272 "><a href="user/shop.php?category=Mens&subcategory=Casual-Trouser">Casual Trouser</a><span class="et-menu-toggle"></span></li>
									<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2076 "><a href="user/shop.php?category=Mens&subcategory=Formal-Trouser">Formal Trouser</a><span class="et-menu-toggle"></span></li>
									<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2079 "><a href="user/shop.php?category=Mens&subcategory=Track-Shorts">Track & Shorts</a><span class="et-menu-toggle"></span></li>
								</ul>
							</li>
							<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-2067 "><a href="#">Footwear</a><span class="et-menu-toggle"></span>
								<ul class="sub-menu">
									<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2825  title-item"><a href="user/shop.php?category=Mens&subcategory=Casual-Shoes">Casual Shoes</a><span class="et-menu-toggle"></span></li>
									<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2063 "><a href="user/shop.php?category=Mens&subcategory=Formal-Shoes">Formal Shoes</a><span class="et-menu-toggle"></span></li>
									<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2065 "><a href="user/shop.php?category=Mens&subcategory=Sport-Shoes">Sport Shoes</a><span class="et-menu-toggle"></span></li>
									<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2064 "><a href="user/shop.php?category=Mens&subcategory=Sandals">Sandals</a><span class="et-menu-toggle"></span></li>
								</ul>
							</li>
							<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-2066 "><a href="#">Accessories</a><span class="et-menu-toggle"></span>
								<ul class="sub-menu">
									<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-145 "><a href="user/shop.php?category=Mens&subcategory=Sunglasses-Frames">Sunglasses & Frames</a><span class="et-menu-toggle"></span></li>
									<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-558 "><a href="user/shop.php?category=Mens&subcategory=Watches">Watches</a><span class="et-menu-toggle"></span></li>
									<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-149 "><a href="user/shop.php?category=Mens&subcategory=Wallets">Wallets</a><span class="et-menu-toggle"></span></li>
									<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-149 "><a href="user/shop.php?category=Mens&subcategory=Belt">Belt</a><span class="et-menu-toggle"></span></li>
									<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-149 "><a href="user/shop.php?category=Mens&subcategory=Socks">Socks</a><span class="et-menu-toggle"></span></li>
									<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-149 "><a href="user/shop.php?category=Mens&subcategory=Caps">Caps</a><span class="et-menu-toggle"></span></li>
									<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-149 "><a href="user/shop.php?category=Mens&subcategory=Deodrant-Perfumes">Deodrants & Perfumes</a><span class="et-menu-toggle"></span></li>
								</ul>
							</li>
						</ul>
					</li>
					<!-- Mobile Menu Men Section End  -->

					<!-- Mobile Menu WoMen Section -->
					<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-133 menu-item-mega-parent menu-item-mega-column-5"><a href="#">Womens</a><span class="et-menu-toggle"></span>
						<ul class="sub-menu">
							<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-257 "><a href="#">Indian Fusion Wear</a><span class="et-menu-toggle"></span>
								<ul class="sub-menu">
									<li class="menu-item menu-item-type-post_type menu-item-object-product menu-item-3885 "><a href="user/shop.php?category=Womens&subcategory=Kurtas-Kurtis-Suits">Kurtas-Kurtis & Suits<span class="et-menu-toggle"></span></li>
									<li class="menu-item menu-item-type-post_type menu-item-object-product menu-item-3886 "><a href="user/shop.php?category=Womens&subcategory=Skirts-Palazzos">Skirts & Palazzos</a><span class="et-menu-toggle"></span></li>
									<li class="menu-item menu-item-type-post_type menu-item-object-product menu-item-3887 "><a href="user/shop.php?category=Womens&subcategory=Sarees">Sarees</a><span class="et-menu-toggle"></span></li>
									<li class="menu-item menu-item-type-post_type menu-item-object-product menu-item-3899 "><a href="user/shop.php?category=Womens&subcategory=Dress">Dress</a><span class="et-menu-toggle"></span></li>
									<li class="menu-item menu-item-type-post_type menu-item-object-product menu-item-3899 "><a href="user/shop.php?category=Womens&subcategory=Jackets">Jackets</a><span class="et-menu-toggle"></span></li>
								</ul>
							</li>
							<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-2055 "><a href="#">Western Wear</a><span class="et-menu-toggle"></span>
								<ul class="sub-menu">
									<li class="menu-item menu-item-type-post_type menu-item-object-product menu-item-150 "><a href="user/shop.php?category=Womens&subcategory=Tops">Tops</a><span class="et-menu-toggle"></span></li>
									<li class="menu-item menu-item-type-post_type menu-item-object-product menu-item-3897 "><a href="user/shop.php?category=Womens&subcategory=Jeans">Jeans</a><span class="et-menu-toggle"></span></li>
									<li class="menu-item menu-item-type-post_type menu-item-object-product menu-item-367 "><a href="user/shop.php?category=Womens&subcategory=Trouser-Capris">Trousers & Capris</a><span class="et-menu-toggle"></span></li>
									<li class="menu-item menu-item-type-post_type menu-item-object-product menu-item-2159 "><a href="user/shop.php?category=Womens&subcategory=Sweaters-Sweatshirts">Sweaters & Sweatshirts</a><span class="et-menu-toggle"></span></li>
									<li class="menu-item menu-item-type-post_type menu-item-object-product menu-item-2159 "><a href="user/shop.php?category=Womens&subcategory=Jackets-Coats">Jackets & Coats</a><span class="et-menu-toggle"></span></li>
								</ul>
							</li>
							<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-281 "><a href="#">Footwear</a><span class="et-menu-toggle"></span>
								<ul class="sub-menu">
									<li class="menu-item menu-item-type-post_type menu-item-object-product menu-item-2056 "><a href="user/shop.php?category=Womens&subcategory=Flats">Flats</a><span class="et-menu-toggle"></span></li>
									<li class="menu-item menu-item-type-post_type menu-item-object-product menu-item-3900 "><a href="user/shop.php?category=Womens&subcategory=Casual-Shoes">Casual Shoes</a><span class="et-menu-toggle"></span></li>
									<li class="menu-item menu-item-type-post_type menu-item-object-product menu-item-3808 "><a href="user/shop.php?category=Womens&subcategory=Heels">Heels</a><span class="et-menu-toggle"></span></li>
									<li class="menu-item menu-item-type-post_type menu-item-object-product menu-item-3809 "><a href="user/shop.php?category=Womens&subcategory=Sports-Floaters">Sports Shoes & Floaters</a><span class="et-menu-toggle"></span></li>
								</ul>
							</li>
						</ul>
					</li>
					<!-- Mobile Menu WoMen Section End  -->

					<!-- Mobile Menu Kids Section -->
					<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-522 menu-item-mega-parent menu-item-mega-column-5"><a href="#">Kids</a><span class="et-menu-toggle"></span>
						<ul class="sub-menu">
							<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-570 "><a href="#">Boys Wear</a><span class="et-menu-toggle"></span>
								<ul class="sub-menu">
									<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-523 "><a href="user/shop.php?category=Kids&subcategory=T-Shirts">T-Shirt</a><span class="et-menu-toggle"></span></li>
									<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2392 "><a href="user/shop.php?category=Kids&subcategory=Shirts">Shirt</span></a><span class="et-menu-toggle"></span></li>
									<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2393 "><a href="user/shop.php?category=Kids&subcategory=Shorts">Shorts</a><span class="et-menu-toggle"></span></li>
									<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-524 "><a href="user/shop.php?category=Kids&subcategory=Jeans">Jeans</a><span class="et-menu-toggle"></span></li>
									<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-777 "><a href="user/shop.php?category=Kids&subcategory=Trouser">Trouser</a><span class="et-menu-toggle"></span></li>
									<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-777 "><a href="user/shop.php?category=Kids&subcategory=B-Track-Pyjamas">Track Pant And Pyjamas</a><span class="et-menu-toggle"></span></li>
								</ul>
							</li>
							<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-3522 "><a href="#">Girls Wear</a><span class="et-menu-toggle"></span>
								<ul class="sub-menu">
									<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1453 "><a href="user/shop.php?category=Kids&subcategory=G-Dresses">Dresses</a><span class="et-menu-toggle"></span></li>
									<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1374 "><a href="user/shop.php?category=Kids&subcategory=G-Tops">Tops</a><span class="et-menu-toggle"></span></li>
									<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1376 "><a href="user/shop.php?category=Kids&subcategory=G-T-Shirts">T-Shirt</a><span class="et-menu-toggle"></span></li>
									<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1376 "><a href="user/shop.php?category=Kids&subcategory=G-Jeans">Jeans</a><span class="et-menu-toggle"></span></li>
									<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1376 "><a href="user/shop.php?category=Kids&subcategory=G-Trouser">Trouser</a><span class="et-menu-toggle"></span></li>
									<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1376 "><a href="user/shop.php?category=Kids&subcategory=G-Jacket-Sweaters">Jacket & Sweater</a><span class="et-menu-toggle"></span></li>
								</ul>
							</li>

							<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-2426 "><a href="#">Boys Footwear</a><span class="et-menu-toggle"></span>
								<ul class="sub-menu">
									<li class="menu-item menu-item-type-post_type menu-item-object-portfolio menu-item-2821 "><a href="user/shop.php?category=Kids&subcategory=B-Casual-Shoes">Casual Shoes</a><span class="et-menu-toggle"></span></li>
									<li class="menu-item menu-item-type-post_type menu-item-object-portfolio menu-item-2425 "><a href="user/shop.php?category=Kids&subcategory=B-Sport-Shoes">Sport Shoes</a><span class="et-menu-toggle"></span></li>
									<li class="menu-item menu-item-type-post_type menu-item-object-portfolio menu-item-2820 "><a href="user/shop.php?category=Kids&subcategory=B-Sandals">Sandal</a><span class="et-menu-toggle"></span></li>
									<li class="menu-item menu-item-type-post_type menu-item-object-portfolio menu-item-2820 "><a href="user/shop.php?category=Kids&subcategory=B-School-Shoes">School Shoes</a><span class="et-menu-toggle"></span></li>
								</ul>
							</li>


							<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-2426 "><a href="#">Girls Footwear</a><span class="et-menu-toggle"></span>
								<ul class="sub-menu">
									<li class="menu-item menu-item-type-post_type menu-item-object-portfolio menu-item-2821 "><a href="user/shop.php?category=Kids&subcategory=Flats">Flats</a><span class="et-menu-toggle"></span></li>
									<li class="menu-item menu-item-type-post_type menu-item-object-portfolio menu-item-2425 "><a href="user/shop.php?category=Kids&subcategory=Heels">Heels</a><span class="et-menu-toggle"></span></li>
									<li class="menu-item menu-item-type-post_type menu-item-object-portfolio menu-item-2820 "><a href="user/shop.php?category=Kids&subcategory=G-Casual-Shoes">Casual Shoes</a><span class="et-menu-toggle"></span></li>
									<li class="menu-item menu-item-type-post_type menu-item-object-portfolio menu-item-2820 "><a href="user/shop.php?category=Kids&subcategory=G-Sport-Shoes">Sport Shoes</a><span class="et-menu-toggle"></span></li>
									<li class="menu-item menu-item-type-post_type menu-item-object-portfolio menu-item-2820 "><a href="user/shop.php?category=Kids&subcategory=G-School-Shoes">School Shoes</a><span class="et-menu-toggle"></span></li>									
								</ul>
							</li>

							<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-2426 "><a href="#">Accessories</a><span class="et-menu-toggle"></span>
								<ul class="sub-menu">
									<li class="menu-item menu-item-type-post_type menu-item-object-portfolio menu-item-2821 "><a href="user/shop.php?category=Kids&subcategory=Bags-Backpacks">Bags & Backpacks</a><span class="et-menu-toggle"></span></li>
									<li class="menu-item menu-item-type-post_type menu-item-object-portfolio menu-item-2425 "><a href="user/shop.php?category=Kids&subcategory=Watches">Watches</a><span class="et-menu-toggle"></span></li>
									<li class="menu-item menu-item-type-post_type menu-item-object-portfolio menu-item-2820 "><a href="user/shop.php?category=Kids&subcategory=Sunglasses">Sunglasses</a><span class="et-menu-toggle"></span></li>
								</ul>
							</li>
						</ul>
					</li>
				</ul>
			</div>
			<div class="bottom-extras">
				<ul class="account-menu">
					<li class=""><a href="user/login.php" class=""><span class="text">Login</span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg></a></li>
				</ul>
				<div class="menu-divider"></div>
            <ul class="account-menu">
					<li class=""><a href="user/cart.php" class=""><span class="text">Cart</span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag">
						<path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
						<line x1="3" y1="6" x2="21" y2="6"></line>
						<path d="M16 10a4 4 0 0 1-8 0"></path>
					</svg></a></li>
				</ul> 
				<a href="user/wishlist.php" class="quick_wishlist icon">
					<span class="text">Wishlist</span>
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart">
						<path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
					</svg> <span class="item-counter et-wishlist-counter"></span>
				</a>
            <ul class="account-menu">
					<li class=""><a href="contact_us.php" class=""><span class="text">Contact Us</span>
               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
               </a></li>
				</ul>
				<div class="menu-divider"></div>
				<ul class="social-icons mobile-social-icons">
					<li><a href="#" target="_blank" data-toggle="tooltip" data-placement="left" title="facebook" style="text-decoration:none;color:#444444"><span class="et-icon et-facebook"></span></a></li>
					<li><a href="#" target="_blank" data-toggle="tooltip" data-placement="left" title="twitter" style="text-decoration:none;color:#444444"><span class="et-icon et-twitter"></span></a></li>
					<li><a href="#" target="_blank" data-toggle="tooltip" data-placement="left" title="instagram" style="text-decoration:none;color:#444444"><span class="et-icon et-instagram"></span></a></li>
				</ul>
			</div>
		</div>
	</div>
</nav>
