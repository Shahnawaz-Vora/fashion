<?php
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
    <title> Select Categories | Fashion</title>
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
    <!-- END GLOBAL MANDATORY STYLES -->
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
                                <li class="breadcrumb-item" aria-current="page"><span>Select Manage Product</span></li>
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
                            <form id="general-info" class="section general-info" action="" method="post">
                                <div class="account-settings-container layout-top-spacing">
                                    <div class="account-content">
                                        <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
                                            <div class="row">
                                                <div class="col-xl-12 col-lg-12 col-md-12 layout-top-spacing">
                                                    <h4><center><b>Select Categories</b></center></h4>
                                                </div>
                                            </div>
                                    

                                            <!-- category -->
                                            <div class="info mt-4">
                                                <div class="row">
                                                    <div class="col-md-11 mx-auto">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <select class="form-control" id="category">
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
                                            <div class="info" style="margin-top:-30px">
                                                <div class="row">
                                                    <div class="col-md-11 mx-auto">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <select class="form-control" id="mens" style="display:none" name="subcategory">
                                                                        <option selected disabled>---Select Category---</option>

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
                                                                        <option selected disabled>---Select Category---</option>
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
                                                                        <option selected disabled>---Select Category---</option>
                                                                        
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
                                            
                                            <div class="row mt-4">
                                                <div class="col-md-11 mx-auto">
                                                    <div class="form-group" align="center">
                                                        <button type="button" onclick="manage_product();" class="btn btn-primary btn-rounded" style="width: 110px;margin-top: -30px;font-family: sans-serif;letter-spacing: 1.7px;margin-bottom: 15px">Next</button>
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
        var valueSelected;
        var subcategory;
        var category;
        $('#category').on('change', function (e) {
            var valueSelected = this.value;
            if(valueSelected == "Mens")
            {
                $("#mens").css("display","block");
                $("#womens").css("display","none");
                $("#kids").css("display","none");
                category = "Mens";
            }
            else if(valueSelected == "Womens")
            {
                $("#mens").css("display","none");
                $("#womens").css("display","block");
                $("#kids").css("display","none");
                category = "Womens";
            }
            else if(valueSelected == "Kids")
            {
                $("#mens").css("display","none");
                $("#womens").css("display","none");
                $("#kids").css("display","block");
                category = "Kids";
            }
        });
        $('#mens').on('change', function (e) {
            subcategory = this.value;
        });
        $('#womens').on('change', function (e) {
            subcategory = this.value;
        });
        $('#kids').on('change', function (e) {
            subcategory = this.value;
        });
        function manage_product(){
            if($("#category").val() == null)
            {
                Snackbar.show({ text: 'Please Select Any Category', duration: 2000, });
            }
            else
            {
                if($("#mens").val() != null || $("#womens").val() != null || $("#kids").val() != null)
                {
                    location.replace("manage_product.php?category="+category+"&subcategory="+subcategory);
                }
                else
                {
                    Snackbar.show({ text: 'Please Select Any Sub Category', duration: 2000, });       
                }
            }
        }
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
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
</body>
</html>
        
