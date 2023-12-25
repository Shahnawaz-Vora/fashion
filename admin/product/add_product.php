<?php
session_start();
if(!isset($_COOKIE['admin_id']))
{
    ?><script type="text/javascript">location.replace("../login.php?login_first=1");</script><?php
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title> Add Product | Fashion</title>
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon.png"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="../../css/font.css" rel="stylesheet">
    <link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../../assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <link href="../../plugins/notification/snackbar/snackbar.min.css" rel="stylesheet" type="text/css" />
    <link href="../../plugins/sweetalerts/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    <link href="../../plugins/sweetalerts/sweetalert.css" rel="stylesheet" type="text/css" />
    <link href="../../assets/css/components/custom-sweetalert.css" rel="stylesheet" type="text/css" />
    <link href="../../assets/css/loader.css" rel="stylesheet" type="text/css" />
    <script src="../../assets/js/loader.js"></script>
    <link rel="stylesheet" type="text/css" href="../../plugins/dropify/dropify.min.css">
    <link href="../../assets/css/users/account-setting.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="../../plugins/animate/animate.css">
    <link href="../../assets/css/elements/miscellaneous.css" rel="stylesheet" type="text/css" />
    <link href="../../assets/css/elements/breadcrumb.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="../../assets/css/forms/theme-checkbox-radio.css">
    <link href="../../assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="../../plugins/editors/markdown/simplemde.min.css">
    <link href="../../css/filepond-plugin-image-preview.min.css" rel="stylesheet" />
    <link href="../../css/filepond.min.css" rel="stylesheet" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <style type="text/css">
        /**
         * FilePond Custom Styles
         */
        .filepond--drop-label {
            color: #4c4e53;
        }

        .filepond--label-action {
            text-decoration-color: #babdc0;
        }

        .filepond--panel-root {
            border-radius: 2em;
            background-color: #edf0f4;
            height: 1em;
        }

        .filepond--item-panel {
            background-color: #595e68;
        }

        .filepond--drip-blob {
            background-color: #7f8a9a;
        }
    </style>
</head>
<body>
    <!-- BEGIN LOADER -->
    <div id="load_screen"> 
        <div class="loader"> 
            <div class="loader-content">
                <div class="spinner-grow align-self-center"></div>
            </div>
        </div>
    </div>
    <!--  END LOADER -->
    
    <!--  BEGIN NAVBAR  -->
    <?php include_once('header.php'); ?>
    <!--  END NAVBAR  -->

    <!--  BEGIN NAVBAR  -->
    <div class="sub-header-container">
        <header class="header navbar navbar-expand-sm">
            <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></a>

            <ul class="navbar-nav flex-row">
                <li>
                    <div class="page-header">

                        <nav class="breadcrumb-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item" aria-current="page"><span>Add Product</span></li>
                            </ol>
                        </nav>

                    </div>
                </li>
            </ul>
        </header>
    </div>
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN SIDEBAR  -->
        <?php
            include_once 'sidebar.php';
        ?>
        <!--  END SIDEBAR  -->
        
        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">
            <div class="container">
                    <div class="row layout-spacing">
                        <div class="col-lg-12 col-12 layout-spacing">                
                            <form id="general-info" class="section general-info" action="" method="post" enctype="multipart/form-data">
                                <div class="account-settings-container layout-top-spacing">
                                    <div class="account-content">
                                        <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
                                            <div class="row">
                                                <div class="col-xl-12 col-lg-12 col-md-12 layout-top-spacing">

                                                    <h4><center><b>Add Product</b></center></h4>
                                                </div>
                                            </div>
                                    

                                            <!-- category -->
                                            <div class="info mt-4">
                                                <div class="row">
                                                    <div class="col-md-11 mx-auto">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <select class="form-control" id="category" name="category">
                                                                        <option selected disabled>---Select Category---</option>
                                                                        <option value="Mens">Mens</option>
                                                                        <option value="Womens">Womens</option>
                                                                        <option value="Kids">Kids</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- category end  -->
                                            <!-- sub category start-->
                                            <div class="info" style="margin-top:-30px" id="subcategory">
                                                <div class="row">
                                                    <div class="col-md-11 mx-auto">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <select class="form-control" id="mens" style="display:none" name="subcategory">
                                                                        <option id="mens-disabled" selected disabled>---Select Category---</option>

                                                                        <option disabled class="font-weight-bold">Top Wear</option>
                                                                        <option value="T-Shirts">T-Shirts</option>
                                                                        <option value="Casual-Shirts">Casual Shirts</option>
                                                                        <option value="Formal-Shirts">Formal Shirts</option>
                                                                        <option value="Jackets">Jackets</option>
                                                                        <option value="Blazzers">Blazzers</option>

                                                                        <option disabled class="font-weight-bold">Bottom Wear</option>
                                                                        <option value="Jeans">Jeans</option>
                                                                        <option value="Casual-Trouser">Casual Trouser</option>
                                                                        <option value="Formal-Trouser">Formal Trouser</option>
                                                                        <option value="Track-Shorts">Track & Shorts</option>

                                                                        <option disabled class="font-weight-bold">Foot Wear</option>
                                                                        <option value="Casual-Shoes">Casual Shoes</option>
                                                                        <option value="Formal-Shoes">Formal Shoes</option>
                                                                        <option value="Sport-Shoes">Sport Shoes</option>
                                                                        <option value="Sandals">Sandals</option>

                                                                        <option disabled class="font-weight-bold">Accessories</option>
                                                                        <option value="Sunglasses-Frames">Sunglasses & Frames</option>
                                                                        <option value="Watches">Watches</option>
                                                                        <option value="Wallets">Wallets</option>
                                                                        <option value="Belt">Belt</option>
                                                                        <option value="Socks">Socks</option>
                                                                        <option value="Caps">Caps</option>
                                                                        <option value="Deodrant-Perfumes">Deodrant & Perfumes</option>
                                                                    </select>

                                                                    <select class="form-control" id="womens" name="subcategory" style="display:none">
                                                                        <option selected id="womens-disabled" disabled>---Select Category---</option>
                                                                        <option disabled class="font-weight-bold">Indian Fusion Wear</option>
                                                                        <option value="Kurtas-Kurtis-Suits">Kurtas-Kurtis & Suits</option>
                                                                        <option value="Skirts-Palazzos">Skirts & Palazzos</option>
                                                                        <option value="Sarees">Sarees</option>
                                                                        <option value="Dress">Dress</option>
                                                                        <option value="Jackets">Jackets</option>

                                                                        <option disabled class="font-weight-bold">Western Wear</option>
                                                                        <option value="Tops">Tops</option>
                                                                        <option value="Jeans">Jeans</option>
                                                                        <option value="Trouser-Capris">Trousers & Capris</option>
                                                                        <option value="Sweaters-Sweatshirts">Sweaters & Sweatshirts</option>
                                                                        <option value="Jackets-Coats">Jackets & Coats</option>

                                                                        <option disabled class="font-weight-bold">Foot Wear</option>
                                                                        <option value="Flats">Flats</option>
                                                                        <option value="Casual-Shoes">Casual Shoes</option>
                                                                        <option value="Heels">Heels</option>
                                                                        <option value="Sports-Floaters">Sports Shoes & Floaters</option>
                                                                    </select>

                                                                    <select class="form-control" id="kids" name="subcategory" style="display:none">
                                                                        <option id="kids-disabled" selected disabled>---Select Category---</option>
                                                                        
                                                                        <option disabled class="font-weight-bold">Boys Wear</option>
                                                                        <option value="T-Shirts">T-Shirts</option>
                                                                        <option value="Shirts">B-Shirts</option>
                                                                        <option value="Shorts">B-Shorts</option>
                                                                        <option value="Jeans">B-Jeans</option>
                                                                        <option value="Trouser">B-Trouser</option>
                                                                        <option value="B-Track-Pyjamas">Track Pant And Pyjamas</option>

                                                                        <option disabled class="font-weight-bold">Boys Footwear</option>
                                                                        <option value="B-Casual-Shoes">Casual Shoes</option>
                                                                        <option value="B-Sport-Shoes">Sport Shoes</option>
                                                                        <option value="B-Sandals">Sandals</option>
                                                                        <option value="B-School-Shoes">School Shoes</option>

                                                                        <option disabled class="font-weight-bold">Girls Wear</option>
                                                                        <option value="G-Dresses">Dresses</option>
                                                                        <option value="G-Tops">Tops</option>
                                                                        <option value="G-T-Shirts">T-Shirts</option>
                                                                        <option value="G-Jeans">Jeans</option>
                                                                        <option value="G-Trouser">Trouser</option>
                                                                        <option value="G-Jacket-Sweaters">Jacket & Sweaters</option>

                                                                        <option disabled class="font-weight-bold">Girls Footwear</option>
                                                                        <option value="Flats">Flats</option>
                                                                        <option value="Heels">Heels</option>
                                                                        <option value="G-Casual-Shoes">Casual Shoes</option>
                                                                        <option value="G-Sport-Shoes">Sport Shoes</option>
                                                                        <option value="G-School-Shoes">School Shoes</option>

                                                                        <option disabled class="font-weight-bold">Accessories</option>
                                                                        <option value="Bags-Backpacks">Bags & Backpacks</option>
                                                                        <option value="Watches">Watches</option>
                                                                        <option value="Sunglasses">Sunglasses & Frames</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- sub category end -->
                                            
                                            <div class="info" style="margin-top:-35px;" >
                                                <div class="row">
                                                        <div class="col-md-11 mx-auto" >
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <input type="text" name="product_name" class="form-control mb-4 " id="test_name" required minlength="3" maxlength="40" placeholder="Product Name">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>                           
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="info" style="margin-top:-35px;">
                                                <div class="row">
                                                        <div class="col-md-11 mx-auto" >
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                    <input type="file" id="filepond" class="filepond" name="filepond[]" />
                                                                    <input type="hidden" name="sentPhotos" value="1" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>                           
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="info mt-2" style="margin-top:-35px;">
                                                <div class="row">
                                                        <div class="col-md-11 mx-auto" >
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <input type="text" name="product_price" class="form-control mb-4 " id="price" pattern="^\d*(\.\d{0,2})?$" title="upto 2 decimal points only" placeholder="Product Price(100 or 100.00)" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>                           
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="info" style="margin-top:-35px;">
                                                <div class="row">
                                                    <div class="col-md-11 mx-auto" >
                                                    Discount :    
                                                    <div class="row d-inline-block ml-2">
                                                            <div class="n-chk d-inline-block ml-xl-2 ml-lg-1">
                                                                <label class="new-control new-radio radio-dark">
                                                                <input type="radio" class="new-control-input" name="discount_check" value="no" id="discount-no" checked>
                                                                <span class="new-control-indicator"></span>No
                                                                </label>
                                                            </div>
                                                            <div class="n-chk d-inline-block ml-xl-2 ml-lg-1">
                                                                <label class="new-control new-radio radio-dark">
                                                                <input type="radio" class="new-control-input" name="discount_check" value="yes" id="discount-yes">
                                                                <span class="new-control-indicator"></span>Yes
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="info" style="margin-top:-35px;display:none;" id="discount-block" >
                                                <div class="row">
                                                    <div class="col-md-11 mx-auto" >
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control mb-4 " id="discount-percent" title="Only numbers" placeholder="Discount %" name="discount" pattern="^[0-9]*$" maxlength="2" minlength="1">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control mb-4 " id="discount-price" readonly="" placeholder="After Discount Price">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="info" style="margin-top:-35px">
                                                <div class="row">
                                                    <div class="col-md-11 mx-auto" >
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control mb-4 " id="test_name" title="Only numbers" pattern="^[0-9]*$" placeholder="Total Items" name="total_items" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="info" style="margin-top:-35px;">
                                                <div class="row">
                                                    <div class="col-md-11 mx-auto" >
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <!-- Size -->
                                                                    <select id="cloth-size" name="cloth_size" class="form-control" style="display:none;">
                                                                    <option selected disabled>---Select Size---</option>
                                                                        <option value="S">S</option>
                                                                        <option value="M">M</option>
                                                                        <option value="L">L</option>
                                                                        <option value="XL">XL</option>
                                                                    </select>
                                                                    
                                                                    <select id="foot-mens" name="foot_mens" class="form-control" style="display:none;">
                                                                    <option selected disabled>---Select Size---</option>
                                                                        <option value="6">6</option>
                                                                        <option value="7">7</option>
                                                                        <option value="8">8</option>
                                                                        <option value="9">9</option>
                                                                        <option value="10">10</option>
                                                                        <option value="11">11</option>
                                                                        <option value="12">12</option>
                                                                    </select>
                                                                    
                                                                    <select id="foot-kids" name="foot_kids" class="form-control" style="display:none;">
                                                                    <option selected disabled>---Select Size---</option>
                                                                        <option value="k8">8</option>
                                                                        <option value="k9">9</option>
                                                                        <option value="k10">10</option>
                                                                        <option value="k11">11</option>
                                                                        <option value="k12">12</option>
                                                                        <option value="k13">13</option>
                                                                        <option value="k1">1</option>
                                                                        <option value="k2">2</option>
                                                                        <option value="k3">3</option>

                                                                    </select>


                                                                
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                                    
                                            <div class="info" style="margin-top:-35px;">
                                                <div class="row">
                                                    <div class="col-md-11 mx-auto" >
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="widget-header">
                                                                    <div class="row">
                                                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                                            <h4> Description </h4>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="widget-content widget-content-area">
                                                                    <textarea name="description" id="demo1"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                                    
                                               
                                            <div class="row mt-4">
                                                <div class="col-md-11 mx-auto">
                                                    <div class="form-group" align="center">
                                                        <button class="btn btn-primary btn-rounded" name="submit" type="submit" style="width: 110px;margin-top: -30px;font-family: sans-serif;letter-spacing: 1.7px;margin-bottom: 15px">Add</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>                   
                    </div>
                </div>
            </div>
        </div>
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="../../assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="../../bootstrap/js/popper.min.js"></script>
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <script src="../../plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="../../assets/js/app.js"></script>
    <script>

        var subcategory="";
        $('#mens').on('change', function (e) {
            subcategory = this.value;

            if(subcategory == "Casual-Shoes" || subcategory == "Formal-Shoes" || subcategory == "Sport-Shoes" || subcategory == "Sandals" )
                {
                    $("#cloth-size").css("display","none");
                    $("#foot-mens").css("display","block");
                    $("#foot-kids").css("display","none");
                }
            else{
                    $("#cloth-size").css("display","block");
                    $("#foot-mens").css("display","none");
                    $("#foot-kids").css("display","none");
                }
            if(subcategory == "Sunglasses-Frames" || subcategory == "Watches" || subcategory == "Wallets" || subcategory == "Belt" || subcategory == "Socks" || subcategory == "Caps" || subcategory == "Deodrant-Perfumes")
            {
                $("#cloth-size").css("display","none");
                $("#foot-mens").css("display","none");
                $("#foot-kids").css("display","none");
            }
      
        });

        $('#womens').on('change', function (e) {
            subcategory = this.value;        


            if(subcategory == "Casual-Shoes"|| subcategory == "Flats" || subcategory == "Heels" || subcategory == "Sports-Floaters" )
                {
                    $("#cloth-size").css("display","none");
                    $("#foot-mens").css("display","block");
                    $("#foot-kids").css("display","none");
                } 
            else{
                    $("#cloth-size").css("display","block");
                    $("#foot-mens").css("display","none");
                    $("#foot-kids").css("display","none");
                }      
        });

        $('#kids').on('change', function (e) {
            subcategory = this.value;
            
            if(subcategory == "B-Casual-Shoes" || subcategory == "B-Sport-Shoes" || subcategory == "B-Sandals"  || subcategory == "B-School-Shoes" || subcategory == "Flats" || subcategory == "Heels" || subcategory == "G-Casual-Shoes" || subcategory == "G-Sport-Shoes" || subcategory == "G-School-Shoes")
                {
                    $("#cloth-size").css("display","none");
                    $("#foot-mens").css("display","none");
                    $("#foot-kids").css("display","block");
                }            
                else{
                    $("#cloth-size").css("display","block");
                    $("#foot-mens").css("display","none");
                    $("#foot-kids").css("display","none");
                }
            if(subcategory == "Sunglasses" || subcategory == "Watches" || subcategory == "Bags-Backpacks")
            {
                $("#cloth-size").css("display","none");
                $("#foot-mens").css("display","none");
                $("#foot-kids").css("display","none");
            }       
        });




        $('#category').on('change', function (e) {
            var valueSelected = this.value;

            if(valueSelected == "Mens")
            {
                $("#mens").css("display","block");
                $("#womens").css("display","none");
                $("#kids").css("display","none");
                subcategory="";
                $("#cloth-size").css("display","none");
                $("#foot-mens").css("display","none");
                $("#foot-kids").css("display","none");
                $("#mens-disabled").prop("selected", true);
            }
            else if(valueSelected == "Womens")
            {
                $("#mens").css("display","none");
                $("#womens").css("display","block");
                $("#kids").css("display","none");
                subcategory="";
                $("#cloth-size").css("display","none");
                $("#foot-mens").css("display","none");
                $("#foot-kids").css("display","none");

                $("#womens-disabled").prop("selected", true);
            }
            else if(valueSelected == "Kids")
            {
                $("#mens").css("display","none");
                $("#womens").css("display","none");
                $("#kids").css("display","block");
                $("#cloth-size").css("display","none");
                $("#foot-mens").css("display","none");
                $("#foot-kids").css("display","none");
                subcategory="";
                $("#kids-disabled").prop("selected", true);
            }

        });

        var d;
        $('input[type="radio"]').click(function(){
            if ($(this).is(':checked'))
            {
                type = $(this).val();
                if(type == "no")
                {    
                    $("#discount-block").css("display","none");
                    $("#discount-percent").attr("required",false);
                }
                else
                {
                    $("#discount-block").css("display","block");
                    $("#discount-percent").attr("required",true);
                }
            }
        });
        $("#discount-percent , #price").on("keyup focusin focusout", function () {
            var discount_percent= $("#discount-percent").val();
            var price= $("#price").val();
            var discount_price = price -((parseInt(price) * parseInt(discount_percent)) / 100);
            if(isNaN(discount_price))
            {
                $("#discount-price").val(0);
            }
            else
            {
                $("#discount-price").val(discount_price);    
            }
            
        });
    </script>
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="../../assets/js/custom.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script src="../../plugins/dropify/dropify.min.js"></script>
    <script src="../../assets/js/users/account-settings.js"></script>
    <script src="../../plugins/notification/snackbar/snackbar.min.js"></script>
    <script src="../../assets/js/components/notification/custom-snackbar.js"></script>
    <script src="../../plugins/sweetalerts/sweetalert2.min.js"></script>
    <script src="../../plugins/sweetalerts/custom-sweetalert.js"></script>
    <script src="../../plugins/editors/markdown/simplemde.min.js"></script>
    <script src="../../plugins/editors/markdown/custom-markdown.js"></script>
    <script src="../../js/filepond-plugin-image-preview.min.js"></script>
    <script src='../../js/filepond-plugin-file-encode.min.js'></script>
    <script src='../../js/filepond-plugin-file-validate-size.min.js'></script>
    <script src="../../js/filepond-plugin-file-validate-type.js"></script>
    <script src='../../js/filepond-plugin-image-exif-orientation.min.js'></script>
    <script src="../../js/filepond-plugin-image-crop.js"></script>
    <script src="../../js/filepond-plugin-image-resize.js"></script>
    <script src="../../js/filepond-plugin-image-transform.js"></script>
    <script src='../../js/filepond-plugin-image-preview.min.js'></script>
    <script src="../../js/filepond-plugin-image-validate-size.js"></script>
    <script src='../../js/filepond.min.js'></script>

    <script type="text/javascript">
        // register desired plugins...
          FilePond.registerPlugin(
        // encodes the file as base64 data...
           FilePondPluginFileEncode,
        // validates the size of the file...
           FilePondPluginFileValidateSize,
           
           // validates the file type...
           FilePondPluginFileValidateType,
        // corrects mobile image orientation...
           FilePondPluginImageExifOrientation,
           
           // calculates & dds cropping info based on the input image dimensions and the set crop ratio
           FilePondPluginImageCrop,
           
           //  calculates & adds resize information
           FilePondPluginImageResize,
           
           // applies the image modifications supplied by the Image crop and Image resize plugins before the image is uploaded
           FilePondPluginImageTransform,
        // previews dropped images...
           FilePondPluginImagePreview
        );

        FilePond.registerPlugin(FilePondPluginImageValidateSize);
        // Select the file input and use create() to turn it into a pond
        var count =0;
          FilePond.create( document.querySelector('.filepond'), { 
            
           allowMultiple: true,
           allowFileEncode: true,
           maxFiles:3,
           allowReorder:true,
           required:true,
           instantUpload:true,
           acceptedFileTypes: ['image/jpeg','image/png','image/webp','image/jpg'],
           imageResizeMode: 'contain',
           imageCropAspectRatio: '1',
           imageTransformVariants: {
           '': transforms => 
            {
             width = 1000;
             height = 1000;
             return transforms;
            },
            },
            onaddfilestart(file){
                count +=1;
            },
            onremovefile(error, file){
                count-=1;
            },
           imageValidateSizeMinWidth: 1000,
            imageValidateSizeMaxWidth: 1000,
            imageValidateSizeMinHeight: 1000,
            imageValidateSizeMaxHeight: 1000,
            imageValidateSizeLabelExpectedMinSize: 'Minimum resolution is {minWidth} × {minHeight}',
            imageValidateSizeLabelExpectedMaxSize: 'Maximum resolution is {maxWidth} × {maxHeight}',

          });
          $("#general-info").submit(function(){
            var sb = false;
            var sizes = false;
            if(count != 3)
            {
                Snackbar.show({text : 'Upload All Images',duration: 2000});
                return false;
            }
            if($("#category").val() == null)
            {
                Snackbar.show({ text: 'Please Select Any Category', duration: 2000, });
                return false;
            }
            else
            {
                if($("#mens").val() != null || $("#womens").val() != null || $("#kids").val() != null)
                {
                    sb = true;
                }
                else
                {
                    Snackbar.show({ text: 'Please Select Any Sub Category', duration: 2000, });       
                    sb = false;
                }
            }

            // if($("#cloth-size").val() != null || $("#foot-mens").val() != null || $("#foot-kids").val() != null)
            // {
            //     sizes = true;
            // }
            // else
            // {
            //     Snackbar.show({ text: 'Please Select Size', duration: 2000, });       
            //     sizes = false;
            // }

            if(sb == true)
            {
                return true;
            }
            else
            {
                return false;
            }
          });
    </script>
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
</body>
</html>
        
<?php
include("../../db/connection.php");
if(isset($_POST['submit'])) {
    $category = mysqli_real_escape_string($con,$_POST['category']);
    $subcategory = mysqli_real_escape_string($con,$_POST['subcategory']);
    $modify_date = date("Y/m/d");
    $name = mysqli_real_escape_string($con,$_POST['product_name']);
    $price = mysqli_real_escape_string($con,$_POST['product_price']);
    $description = addslashes(mysqli_real_escape_string($con,$_POST['description']));
    $discount_check = mysqli_real_escape_string($con,$_POST['discount_check']);
    if($discount_check == "yes")
    {
        $discount = mysqli_real_escape_string($con,$_POST['discount']); 
    }
    if($discount_check == "no")
    {
        $discount = 0; 
    }
    $total_items = mysqli_real_escape_string($con,$_POST['total_items']);

    if($category == "Mens")
    {
        if($subcategory == "Casual-Shoes" || $subcategory == "Formal-Shoes" || $subcategory == "Sport-Shoes" || $subcategory == "Sandals" )    
        {
            $size = mysqli_real_escape_string($con,$_POST['foot_mens']);
        }
        else if($subcategory == "Sunglasses-Frames" || $subcategory == "Watches" || $subcategory == "Wallets" || $subcategory == "Belt" || $subcategory == "Socks" || $subcategory == "Caps" || $subcategory == "Deodrant-Perfumes")
        {
            $size = "";
        }
        else
        {
            $size = mysqli_real_escape_string($con,$_POST['cloth_size']);
        }
        
    
    }
    else if($category == "Womens")
    {
        if($subcategory == "Casual-Shoes"|| $subcategory == "Flats" || $subcategory == "Heels" || $subcategory == "Sports-Floaters")    
        {
            $size = mysqli_real_escape_string($con,$_POST['foot_mens']);
        }
        else
        {
            $size = mysqli_real_escape_string($con,$_POST['cloth_size']);
        }
        
    
    }
    else if($category == "Kids")
    {
        if($subcategory == "B-Casual-Shoes" || $subcategory == "B-Sport-Shoes" || $subcategory == "B-Sandals"  || $subcategory == "B-School-Shoes" || $subcategory == "Flats" || $subcategory == "Heels" || $subcategory == "G-Casual-Shoes" || $subcategory == "G-Sport-Shoes" || $subcategory == "G-School-Shoes")    
        {
            $size = mysqli_real_escape_string($con,$_POST['foot_kids']);
        }
        else if($subcategory == "Sunglasses" || $subcategory == "Watches" || $subcategory == "Bags-Backpacks")
        {
            $size = "";
        }
        else
        {
            $size = mysqli_real_escape_string($con,$_POST['cloth_size']);
        }
        
    
    }
    




    // RECEIVE UPLOADS:
    $isFileUploadRequest = $_POST['sentPhotos'];
    if ($isFileUploadRequest) {
     
        $filePondArray = $_POST['filepond'];
     
        $baseFileLocation = '../../db/images/';
        $numFilePondObjects = sizeof($filePondArray);
        if ( !$numFilePondObjects ) { die('No photos sent!'); }
        $thisPic_decodedData= [];
        $thisPic_name_temp = [];
        for ($xx=0; $xx<$numFilePondObjects; $xx++) {
             $thisFilePondJSON_object = $filePondArray[$xx];
        
             $thisFilePondArray = json_decode($thisFilePondJSON_object, true);
             // isolate the encoded pics...
            $thisFilePondArray_picData = $thisFilePondArray['data'];
            $thisFilePondArray_numPics = sizeof($thisFilePondArray_picData);
            $uniq = uniqid();
            // iterate through pics in this object...
            for ($yy=0; $yy<$thisFilePondArray_numPics; $yy++){
                $thisPic_name_temp[$xx] = $uniq  .'.jpg';
                $thisPic_encodedData = $thisFilePondArray_picData[$yy]['data'];
                $thisPic_decodedData[$xx] = base64_decode($thisPic_encodedData);
               $thisPic_fullPathAndName[$xx] = $baseFileLocation . $thisPic_name_temp[$xx];   
            }
        }
        $image1 = $thisPic_name_temp[0];
        $image2 = $thisPic_name_temp[1];
        $image3 = $thisPic_name_temp[2];
        $query = "INSERT INTO `product`(category,sub_category,image1,image2,image3,product_name,price,size,discount,total_items,description,modify_date) VALUES ('$category','$subcategory','$image1','$image2','$image3','$name','$price','$size','$discount','$total_items','$description','$modify_date')";
        $sql = mysqli_query($con, $query);
        if($sql == true)
        {
            file_put_contents($thisPic_fullPathAndName[0], $thisPic_decodedData[0]);
            file_put_contents($thisPic_fullPathAndName[1], $thisPic_decodedData[1]);
            file_put_contents($thisPic_fullPathAndName[2], $thisPic_decodedData[2]);
            ?><script type="text/javascript">location.replace("add_product.php?success=1");</script><?php   
        }
        else
        {
            ?><script type="text/javascript">location.replace("add_product.php?error=1");</script><?php
        }
    }
}
?>
<?php
if(isset($_GET['error']))
{   
    ?><script type="text/javascript">
    Snackbar.show({ text: 'There is Some Error, Please Try Again', duration: 2000, });
    var queryParams = new URLSearchParams(window.location.search);
    queryParams.delete("error");
    history.pushState(null, null, "?"+queryParams.toString());
    </script><?php
}
if(isset($_GET['high']))
{
    ?><script type="text/javascript">
    Snackbar.show({ text: 'Image size is too high !', duration: 2000, });
    var queryParams = new URLSearchParams(window.location.search);
    queryParams.delete("high");
    history.pushState(null, null, "?"+queryParams.toString());
    </script><?php
}
if(isset($_GET['file_error']))
{
    ?><script type="text/javascript">
    Snackbar.show({ text: 'There is Error in Your Image', duration: 2000, });
    var queryParams = new URLSearchParams(window.location.search);
    queryParams.delete("file_error");
    history.pushState(null, null, "?"+queryParams.toString());
    </script><?php
}
if(isset($_GET['type']))
{
    ?><script type="text/javascript">
    Snackbar.show({ text: 'You Can Not Upload this type of Image', duration: 2000, });
    var queryParams = new URLSearchParams(window.location.search);
    queryParams.delete("type");
    history.pushState(null, null, "?"+queryParams.toString());
    </script><?php
}
if(isset($_GET['size']))
{
    ?><script type="text/javascript">
    Snackbar.show({ text: 'File Size must be 1000*1000 or 1400*1400', duration: 3000, });
    var queryParams = new URLSearchParams(window.location.search);
    queryParams.delete("type");
    history.pushState(null, null, "?"+queryParams.toString());
    </script><?php
}
if(isset($_GET['invalid_images']))
{
    ?><script type="text/javascript">
    Snackbar.show({ text: 'File Size must be 1000*1000 or 1400*1400', duration: 3000, });
    var queryParams = new URLSearchParams(window.location.search);
    queryParams.delete("type");
    history.pushState(null, null, "?"+queryParams.toString());
    </script><?php
}
if(isset($_GET['success']))
{
    ?><script type="text/javascript">
    Snackbar.show({ text: 'Product Added', duration: 3000, });
    var queryParams = new URLSearchParams(window.location.search);
    queryParams.delete("success");
    history.pushState(null, null, "?"+queryParams.toString());
    </script><?php
}
?>