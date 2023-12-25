<?php
if(!isset($_COOKIE['admin_id']))
{
    ?><script type="text/javascript">location.replace("login.php?login_first=1");</script><?php
}
include_once("../db/connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Sales Admin | CORK - Multipurpose Bootstrap Dashboard Template </title>
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon.ico"/>
    <link href="../assets/css/loader.css" rel="stylesheet" type="text/css" />
    <script src="../assets/js/loader.js"></script>

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="../css/font.css" rel="stylesheet">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="../plugins/animate/animate.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/dashboard/dash_1.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
    


    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="../plugins/apex/apexcharts.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/dashboard/dash_1.css" rel="stylesheet" type="text/css" />
    <link href="../plugins/notification/snackbar/snackbar.min.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->


    

</head>
<body>
    <!-- BEGIN LOADER -->
    <div id="load_screen"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
    </div></div></div>
    <!--  END LOADER -->

    <!--  BEGIN NAVBAR  -->
    <?php include("header.php"); ?>
    <!--  END NAVBAR  -->

    <!--  BEGIN NAVBAR  -->
    <div class="sub-header-container">
        <header class="header navbar navbar-expand-sm">
            <a href="../javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></a>
            <ul class="navbar-nav flex-row">
                <li>
                    <div class="page-header">
                        <nav class="breadcrumb-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
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
        <?php include("sidebar.php"); ?>
        <!--  END SIDEBAR  -->
        
        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">

                <div class="row layout-top-spacing">

                    <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                        <div class="widget widget-chart-one">
                            <div class="widget-heading">
                                <h5 class="">Sales</h5>
                                <ul class="tabs tab-pills">
                                    <li><a href="#" id="tb_1" class="tabmenu">Monthly</a></li>
                                </ul>
                            </div>

                            <div class="widget-content">
                                <div class="tabs tab-content">
                                    <div id="content_1" class="tabcontent"> 
                                        <div id="revenueMonthly"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                        <div class="widget widget-chart-two">
                            <div class="widget-heading">
                                <h5 class="">Total Sales by Category</h5>
                            </div>
                            <div class="widget-content">
                                <div id="chart-2" class=""></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
                        <div class="widget-two">
                            <div class="widget-content">
                                <div class="w-numeric-value">
                                    <div class="w-content">
                                        <span class="w-value">Daily sales</span>
                                        <span class="w-numeric-title">Go to columns for details.</span>
                                    </div>
                                    <div class="w-icon">
                                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                             viewBox="0 0 488.8 488.8" style="enable-background:new 0 0 488.8 488.8;" xml:space="preserve">
                                            <path style="opacity:0.2;fill:#B2B2B2;enable-background:new    ;" d="M396.8,119.2h-25.6c0-3.2-0.8-7.2-0.8-10.4
                                                c0-2.4-0.8-5.6-1.6-8c0-0.8,0-0.8,0-1.6c-4-21.6-13.6-40.8-27.2-56h55.2c4,0,7.2-0.8,10.4-2.4c0,0,0,0,0.8,0c3.2-1.6,5.6-4.8,8-8
                                                c0,0,0,0,0-0.8c0.8-1.6,1.6-3.2,2.4-4.8l0,0l0,0c0.8-1.6,0.8-3.2,0.8-5.6c0-12-9.6-21.6-21.6-21.6H247.2h-84.8h-47.2
                                                c-12,0-21.6,9.6-21.6,21.6s9.6,21.6,21.6,21.6h47.2H248c42.4,0,76.8,32.8,80,73.6l0,0c0,0.8,0,1.6,0,2.4h-3.2H115.2
                                                c-12,0-21.6,9.6-21.6,21.6s9.6,21.6,21.6,21.6h166.4h45.6c-6.4,38.4-39.2,68-80,68h-33.6h-52c-8,0-15.2,4-19.2,11.2
                                                s-3.2,15.2,0.8,22.4l14.4,21.6l0,0l128,193.6c4,6.4,11.2,9.6,18.4,9.6c4,0,8-0.8,12-4c9.6-6.4,12.8-20,6.4-29.6l-120-182.4h44.8
                                                c64,0,116.8-48.8,123.2-111.2h26.4c12,0,21.6-9.6,21.6-21.6S408.8,119.2,396.8,119.2z"/>
                                            <path style="fill:#12DB55;" d="M372.8,119.2h-25.6c-0.8-28.8-12-56-29.6-76h55.2c12,0,21.6-9.6,21.6-21.6S384.8,0,372.8,0H223.2
                                                h-84.8H91.2c-12,0-21.6,9.6-21.6,21.6s9.6,21.6,21.6,21.6h47.2H224c43.2,0,78.4,33.6,80.8,76H91.2c-12,0-21.6,9.6-21.6,21.6
                                                s9.6,21.6,21.6,21.6h212c-6.4,38.4-39.2,68-80,68h-84.8c-8,0-15.2,4-19.2,11.2c-4,7.2-3.2,15.2,0.8,22.4l143.2,215.2
                                                c4,6.4,11.2,9.6,18.4,9.6c4,0,8-0.8,12-4c9.6-6.4,12.8-20,6.4-29.6L178.4,272.8h44.8c64,0,116.8-48.8,123.2-111.2h26.4
                                                c12,0,21.6-9.6,21.6-21.6S384.8,119.2,372.8,119.2z"/>
                                            <g>
                                                <path style="fill:#19BF55;" d="M372.8,119.2h-25.6c-0.8-13.6-3.2-26.4-8-38.4L304,116c0,0.8,0,1.6,0,2.4h-3.2l-43.2,43.2h45.6
                                                    c-6.4,38.4-39.2,68-80,68h-33.6l-55.2,55.2l128,193.6c4,6.4,11.2,9.6,18.4,9.6c4,0,8-0.8,12-4c9.6-6.4,12.8-20,6.4-29.6
                                                    L178.4,272.8h44.8c64,0,116.8-48.8,123.2-111.2h26.4c12,0,21.6-9.6,21.6-21.6S384.8,119.2,372.8,119.2z"/>
                                                <path style="fill:#19BF55;" d="M393.6,26.4l-16,16C385.6,40,392,34.4,393.6,26.4z"/>
                                            </g>
                                        </svg>
                                    </div>
                                </div>
                                <div class="w-chart">
                                    <div id="daily-sales"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-12 col-md-6 col-sm-12 col-12 layout-spacing">
                        <div class="widget-one">
                            <div class="widget-content">
                                <div class="w-numeric-value">
                                    <div class="w-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                                    </div>
                                    <div class="w-content">
                                        <?php 
                                        $mon = mysqli_fetch_assoc(mysqli_query($con,"select sum(total_item) as total_month_sale from orders where month(modify_date) = month(now()) group by month(modify_date)")); ?>
                                        <span class="w-value"><?php echo $mon['total_month_sale']; ?></span>
                                        <span class="w-numeric-title"><?php echo date("M")." Sales"; ?></span>
                                    </div>
                                </div>
                                <div class="w-chart">
                                    <div id="total-orders"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
                        <div class="widget-three">
                            <div class="widget-heading">
                                <?php
                                    $tot_product = mysqli_fetch_assoc(mysqli_query($con,"select count(product_id) as tot_product from product"));
                                ?>
                                <h5 class="">Total Products : <?php echo $tot_product['tot_product']; ?></h5>
                            </div>
                            <div class="widget-content">

                                <div class="order-summary">

                                    <div class="summary-list">
                                        <div class="w-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
                                        </div>
                                        <div class="w-summary-details">
                                            
                                            <div class="w-summary-info">
                                                <h6>Mens</h6>
                                                <?php 
                                                $mens_count = mysqli_fetch_assoc(mysqli_query($con,"select count(product_id) as men_product from product where category='Mens'"));
                                                $men_avg = ($mens_count['men_product'] * 100)/$tot_product['tot_product'];
                                                $womens_count = mysqli_fetch_assoc(mysqli_query($con,"select count(product_id) as womens_product from product where category='Womens'"));
                                                $womens_avg = ($womens_count['womens_product'] * 100)/$tot_product['tot_product'];
                                                $kids_count = mysqli_fetch_assoc(mysqli_query($con,"select count(product_id) as kids_product from product where category='Kids'"));
                                                $kids_avg = ($kids_count['kids_product'] * 100)/$tot_product['tot_product'];
                                               
                                                ?>
                                                <p class="summary-count"><?php echo $mens_count['men_product']; ?></p>
                                            </div>

                                            <div class="w-summary-stats">
                                                <div class="progress">

                                                    <div class="progress-bar bg-gradient-secondary" role="progressbar" style="width: <?php echo round($men_avg,2); ?>%" aria-valuenow="" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                    <div class="summary-list">
                                        <div class="w-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-tag"><path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path><line x1="7" y1="7" x2="7" y2="7"></line></svg>
                                        </div>
                                        <div class="w-summary-details">
                                            
                                            <div class="w-summary-info">
                                                <h6>Womens</h6>
                                                <p class="summary-count"><?php echo round($womens_count['womens_product'],2); ?></p>
                                            </div>

                                            <div class="w-summary-stats">
                                                <div class="progress">
                                                    <div class="progress-bar bg-gradient-success" role="progressbar" style="width: <?php echo $womens_avg; ?>%" aria-valuenow="" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                    <div class="summary-list">
                                        <div class="w-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg>
                                        </div>
                                        <div class="w-summary-details">
                                            
                                            <div class="w-summary-info">
                                                <h6>Kids</h6>
                                                <p class="summary-count"><?php echo $kids_count['kids_product']; ?></p>
                                            </div>

                                            <div class="w-summary-stats">
                                                <div class="progress">
                                                    <div class="progress-bar bg-gradient-warning" role="progressbar" style="width: <?php echo round($kids_avg,2); ?>%" aria-valuenow="" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                    
                                </div>

                            </div>
                        </div>
                    </div>

                    

                    <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                        <div class="widget widget-table-two">

                            <div class="widget-heading">
                                <h5 class="">Recent Orders</h5>
                            </div>

                            <div class="widget-content">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th><div class="th-content">Customer</div></th>
                                                <th><div class="th-content">Invoice</div></th>
                                                <th><div class="th-content th-heading">Price</div></th>
                                                <th><div class="th-content">Status</div></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $sql_product = mysqli_query($con,"select user.name,orders.payment_id,orders.status,orders.final_amount from orders,user where user.user_id=orders.user_id group by payment_id  order by order_id desc limit 10");
                                            while($orders = mysqli_fetch_assoc($sql_product))
                                            {
                                                ?>
                                                <tr>
                                                    <td><div class="td-content product-brand"><?php echo $orders['name']; ?></div></td>
                                                    <td><div class="td-content"><?php echo $orders['payment_id']; ?></div></td>
                                                    <td><div class="td-content pricing"><span class="">Rs.<?php echo $orders['final_amount']; ?></span></div></td>
                                                    <?php
                                                        $status = $orders['status'];
                                                        if($status == 0)
                                                        {
                                                            $res = "Booked";
                                                        }
                                                        else if($status == 1)
                                                        {
                                                            $res = "Shipped";
                                                        }
                                                        else if($status == 2)
                                                        {
                                                            $res = "Delivered";
                                                        }
                                                        else if($status == 3)
                                                        {
                                                            $res = "Cancelled";
                                                        }
                                                        else
                                                        {
                                                            $res ="";
                                                        }
                                                    ?>
                                                    <td><div class="td-content"><span class="badge outline-badge-primary"><?php echo $res; ?></span></div></td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                        <div class="widget widget-table-three">

                            <div class="widget-heading">
                                <h5 class="">Top Selling Product</h5>
                            </div>

                            <div class="widget-content">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th><div class="th-content">Product</div></th>
                                                <th><div class="th-content">Category</div></th>
                                                <th><div class="th-content th-heading">Price</div></th>
                                                <th><div class="th-content th-heading">Discount</div></th>
                                                <th><div class="th-content">Sold</div></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <style type="text/css">
                                            </style>
                                            <?php 
                                                $best_sql = mysqli_query($con,"select sum(o.total_item) as top_sold,p.price,p.discount,p.product_name,p.category from orders o,product p where p.product_id=o.product_id group by o.payment_id order by top_sold desc limit 10");

                                                while($best_selling = mysqli_fetch_assoc($best_sql))
                                                {
                                            ?>
                                            <tr>
                                                <td><div class="td-content"><?php echo trim($best_selling['product_name']); ?></div></td>
                                                <td><div class="td-content"><span class="discount-pricing"><?php echo trim($best_selling['category']); ?></span></div></td>
                                                <td><div class="td-content"><?php echo trim($best_selling['price']); ?></div></td>
                                                <td><div class="td-content"><?php echo trim($best_selling['discount']); ?></div></td>
                                                <td><div class="td-content"><?php echo trim($best_selling['top_sold']); ?></div></td>
                                            </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                        <div class="widget widget-chart-one">
                            <div class="widget-heading">
                                <h5 class="">Users</h5>
                                <ul class="tabs tab-pills">
                                    <li><a href="../javascript:void(0);" id="tb_1" class="tabmenu">Monthly</a></li>
                                </ul>
                            </div>

                            <div class="widget-content">
                                <div class="tabs tab-content">
                                    <div id="content_1" class="tabcontent"> 
                                        <div id="profit"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--  END CONTENT AREA  -->

    </div>
    <!-- END MAIN CONTAINER -->

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="../assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="../bootstrap/js/popper.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/app.js"></script>
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="../assets/js/custom.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script src="../plugins/apex/apexcharts.min.js"></script>
    <script src="../plugins/notification/snackbar/snackbar.min.js"></script>
    <script src="../assets/js/components/notification/custom-snackbar.js"></script>
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

</body>
</html>

<?php 
    //category sales
    $men = "select count(orders.product_id) 'idp' from orders,product where orders.product_id=product.product_id AND product.category='Mens'";
    $run_men = mysqli_query($con,$men);
    $row_men = mysqli_fetch_array($run_men);
    
    $womens = "select count(orders.product_id) 'idp' from orders,product where orders.product_id=product.product_id AND product.category='Womens'";
    $run_womens = mysqli_query($con,$womens);
    $row_womens = mysqli_fetch_array($run_womens);

    $kids = "select count(orders.product_id) 'idp' from orders,product where orders.product_id=product.product_id AND product.category='Kids'";
    $run_kids = mysqli_query($con,$kids);
    $row_kids = mysqli_fetch_array($run_kids);

    //yearly sale
    $total_sales = ["","","","","","","","","","","",""];
    $order_sql = mysqli_query($con,"select sum(total_item) as 'total_item',month(modify_date) 'month'  from orders group by modify_date");
    while($result = mysqli_fetch_assoc($order_sql))
    {
        $total_sales[$result['month']] = $result['total_item'];
    }     
    for($i=0;$i<=11;$i++)
    {
        if($total_sales[$i] == "" || $total_sales[$i] == null || $total_sales[$i] == " ")
        {
            $total_sales[$i] = 0;
        }
    }

    //weekly sale
    $week_day = date("w");
    if($week_day >= 1)
    {
        $firstDayOfLastWeek = mktime(0,0,0,date("m"),date("d")-date("w")-7);
        $lastDayOfLastWeek = mktime(0,0,0,date("m"),date("d")-date("w")-1);
        $first = date("Y-m-d",$firstDayOfLastWeek);
        $last = date("Y-m-d",$lastDayOfLastWeek);
    }
    else
    {
        $firstDayOfLastWeek = mktime(0,0,0,date("m"),date("d")-date("w")-7);
        $lastDayOfLastWeek = mktime(0,0,0,date("m"),date("d")-date("w")-1);
        $first = date("Y-m-d",$firstDayOfLastWeek);
        $last = date("Y-m-d",$lastDayOfLastWeek);
    }
    $last_week =[];
    $day_sale=0;
    $sun_sale = 0;
    $n=6;
    for($i=0;$i<=$n;$i++)
    {
        $sql_week=mysqli_query($con,"select modify_date,total_item from orders where date(modify_date) >= '$first' and date(modify_date) <= '$last' and weekday(modify_date)='$i'");
        $sql_week_rows = mysqli_num_rows($sql_week);
        
        while($sql_day_fetch = mysqli_fetch_assoc($sql_week))
        {
            $day_sale += $sql_day_fetch['total_item'];
        }
        
        if($i == 6)
        {
            array_unshift($last_week, $day_sale);
        }
        else
        {
            array_push($last_week, $day_sale);
        }
        $day_sale =0;
    }
    $firstDayOfThisWeek = mktime(0,0,0,date("m"),date("d")-date("w"));
    $lastDayOfThisWeek = mktime(0,0,0,date("m"),date("d")-date("w")+6);
    $first = date("Y-m-d",$firstDayOfThisWeek);
    $last = date("Y-m-d",$lastDayOfThisWeek);
    $current_week=[];
    $current_week_sale = 0;
    
    for($i=0;$i<=$n;$i++)
    {
        $sql_week=mysqli_query($con,"select modify_date,total_item from orders where date(modify_date) >= '$first' and date(modify_date) <= '$last' and weekday(modify_date)='$i' ");
        $sql_week_rows = mysqli_num_rows($sql_week);
        
        while($sql_day_fetch = mysqli_fetch_assoc($sql_week))
        {
            $day_sale += $sql_day_fetch['total_item'];
        }
        if($i == 6)
        {
            array_unshift($current_week, $day_sale);
        }
        else
        {
            array_push($current_week, $day_sale);
        }
            
        $day_sale =0;
    }


    //this month sale
    $sql_month = mysqli_query($con,"SELECT day(modify_date) as 'day',sum(total_item) as 'total_item' FROM orders WHERE MONTH(modify_date) = MONTH(CURRENT_DATE()) AND YEAR(modify_date) = YEAR(CURRENT_DATE()) group by day(modify_date) order by day(modify_date) asc ");
    $days = date("t");
    $month_item_arr = array_fill(0, $days, 0);
    $da = [];
    while($month_day = mysqli_fetch_assoc($sql_month))
    {
        for($i=1;$i<=$days;$i++)
        {
            array_push($da,$i);
            if($i == $month_day['day'])
            {
                $month_item_arr[$i-1] = $month_day['total_item'];
            }
        }
    }

    //user
    $total_user = ["","","","","","","","","","","",""];
    $user_sql = mysqli_query($con,"select sum(user_id) as 'total_user',month(modify_date) 'month'  from user group by modify_date");
    while($result = mysqli_fetch_assoc($user_sql))
    {
        $total_user[$result['month']] = $result['total_user'];
    }     
    for($i=0;$i<=11;$i++)
    {
        if($total_user[$i] == "" || $total_user[$i] == null || $total_user[$i] == " ")
        {
            $total_user[$i] = 0;
        }
    }
?>
<script type="text/javascript">

/*
    =================================
        Revenue Monthly | Options
    =================================
*/
var options1 = {
  chart: {
    fontFamily: 'Nunito, sans-serif',
    height: 365,
    type: 'area',
    zoom: {
        enabled: false
    },
    dropShadow: {
      enabled: true,
      opacity: 0.3,
      blur: 5,
      left: -7,
      top: 22
    },
    toolbar: {
      show: false
    },
    events: {
      mounted: function(ctx, config) {
        const highest1 = ctx.getHighestValueInSeries(0);
        const highest2 = ctx.getHighestValueInSeries(1);

        ctx.addPointAnnotation({
          x: new Date(ctx.w.globals.seriesX[0][ctx.w.globals.series[0].indexOf(highest1)]).getTime(),
          y: highest1,
          label: {
            style: {
              cssClass: 'd-none'
            }
          },
          customSVG: {
              SVG: '<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="#1b55e2" stroke="#fff" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg>',
              cssClass: undefined,
              offsetX: -8,
              offsetY: 5
          }
        })

        ctx.addPointAnnotation({
          x: new Date(ctx.w.globals.seriesX[1][ctx.w.globals.series[1].indexOf(highest2)]).getTime(),
          y: highest2,
          label: {
            style: {
              cssClass: 'd-none'
            }
          },
          customSVG: {
              SVG: '<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="#e7515a" stroke="#fff" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg>',
              cssClass: undefined,
              offsetX: -8,
              offsetY: 5
          }
        })
      },
    }
  },
  colors: ['#1b55e2', '#e7515a'],
  dataLabels: {
      enabled: false
  },
  markers: {
    discrete: [{
    seriesIndex: 0,
    dataPointIndex: 7,
    fillColor: '#000',
    strokeColor: '#000',
    size: 5
  }, {
    seriesIndex: 2,
    dataPointIndex: 11,
    fillColor: '#000',
    strokeColor: '#000',
    size: 4
  }]
  },
  subtitle: {
    text: 'Monthly Sales',
    align: 'left',
    margin: 0,
    offsetX: -10,
    offsetY: 35,
    floating: false,
    style: {
      fontSize: '14px',
      color:  '#888ea8'
    }
  },
  title: {
    text: '<?php echo array_sum($total_sales); ?>',
    align: 'left',
    margin: 0,
    offsetX: -10,
    offsetY: 0,
    floating: false,
    style: {
      fontSize: '25px',
      color:  '#0e1726'
    },
  },
  stroke: {
      show: true,
      curve: 'smooth',
      width: 2,
      lineCap: 'square'
  },
  series: [{
      name: 'Sales',
      data: [<?php echo implode(",", $total_sales); ?>]
  }],
  labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
  xaxis: {
    axisBorder: {
      show: false
    },
    axisTicks: {
      show: false
    },
    crosshairs: {
      show: true
    },
    labels: {
      offsetX: 0,
      offsetY: 5,
      style: {
          fontSize: '12px',
          fontFamily: 'Nunito, sans-serif',
          cssClass: 'apexcharts-xaxis-title',
      },
    }
  },
  yaxis: {
    labels: {
      formatter: function(value, index) {
        return (value / 1000) + 'K'
      },
      offsetX: -22,
      offsetY: 0,
      style: {
          fontSize: '12px',
          fontFamily: 'Nunito, sans-serif',
          cssClass: 'apexcharts-yaxis-title',
      },
    }
  },
  grid: {
    borderColor: '#e0e6ed',
    strokeDashArray: 5,
    xaxis: {
        lines: {
            show: true
        }
    },   
    yaxis: {
        lines: {
            show: false,
        }
    },
    padding: {
      top: 0,
      right: 0,
      bottom: 0,
      left: -10
    }, 
  }, 
  legend: {
    position: 'top',
    horizontalAlign: 'right',
    offsetY: -50,
    fontSize: '16px',
    fontFamily: 'Nunito, sans-serif',
    markers: {
      width: 10,
      height: 10,
      strokeWidth: 0,
      strokeColor: '#fff',
      fillColors: undefined,
      radius: 12,
      onClick: undefined,
      offsetX: 0,
      offsetY: 0
    },    
    itemMargin: {
      horizontal: 0,
      vertical: 20
    }
  },
  tooltip: {
    theme: 'dark',
    marker: {
      show: true,
    },
    x: {
      show: false,
    }
  },
  fill: {
      type:"gradient",
      gradient: {
          type: "vertical",
          shadeIntensity: 1,
          inverseColors: !1,
          opacityFrom: .28,
          opacityTo: .05,
          stops: [45, 100]
      }
  },
  responsive: [{
    breakpoint: 575,
    options: {
      legend: {
          offsetY: -30,
      },
    },
  }]
}

/*
    ================================
        Revenue Monthly | Render
    ================================
*/
var chart1 = new ApexCharts(
    document.querySelector("#revenueMonthly"),
    options1
);
chart1.render();

/*
    ==================================
        Sales By Category | Options
    ==================================
*/
var options = {
    chart: {
        type: 'donut',
        width: 380
    },
    colors: ['#5c1ac3', '#e2a03f', '#e7515a', '#e2a03f'],
    dataLabels: {
      enabled: false
    },
    legend: {
        position: 'bottom',
        horizontalAlign: 'center',
        fontSize: '14px',
        markers: {
          width: 10,
          height: 10,
        },
        itemMargin: {
          horizontal: 0,
          vertical: 8
        }
    },
    plotOptions: {
      pie: {
        donut: {
          size: '65%',
          background: 'transparent',
          labels: {
            show: true,
            name: {
              show: true,
              fontSize: '29px',
              fontFamily: 'Nunito, sans-serif',
              color: undefined,
              offsetY: -10
            },
            value: {
              show: true,
              fontSize: '26px',
              fontFamily: 'Nunito, sans-serif',
              color: '20',
              offsetY: 16,
              formatter: function (val) {
                return val
              }
            },
            total: {
              show: true,
              showAlways: true,
              label: 'Total',
              color: '#888ea8',
              formatter: function (w) {
                return w.globals.seriesTotals.reduce( function(a, b) {
                  return a + b
                }, 0)
              }
            }
          }
        }
      }
    },
    stroke: {
      show: true,
      width: 25,
    },
    series: [<?php print_r($row_men['idp']); ?>,<?php print_r($row_womens['idp']); ?>, <?php print_r($row_kids['idp']); ?>],
    labels: ['Men', 'Women', 'Kids'],
    responsive: [{
        breakpoint: 1599,
        options: {
            chart: {
                width: '350px',
                height: '400px'
            },
            legend: {
                position: 'bottom'
            }
        },

        breakpoint: 1439,
        options: {
            chart: {
                width: '250px',
                height: '390px'
            },
            legend: {
                position: 'bottom'
            },
            plotOptions: {
              pie: {
                donut: {
                  size: '65%',
                }
              }
            }
        },
    }]
}


/*
    =================================
        Sales By Category | Render
    =================================
*/
var chart = new ApexCharts(
    document.querySelector("#chart-2"),
    options
);

chart.render();


/*
    =============================
        Daily Sales | Options
    =============================
*/
var d_2options1 = {
  chart: {
        height: 160,
        type: 'bar',
        stacked: true,
        stackType: '100%',
        toolbar: {
          show: false,
        }
    },
    dataLabels: {
        enabled: false,
    },
    stroke: {
        show: true,
        width: 1,
    },
    colors: ['#e2a03f', '#e0e6ed'],
    responsive: [{
        breakpoint: 480,
        options: {
            legend: {
                position: 'bottom',
                offsetX: -10,
                offsetY: 0
            }
        }
    }],
    series: [{
        name: 'Sales',
        data: [<?php echo implode(",", $current_week); ?>]
    },{
        name: 'Last Week',
        data: [<?php echo implode(",", $last_week); ?>]
    }],
    xaxis: {
        labels: {
            show: false,
        },
        categories: ['Sun','Mon','Tue', 'Wed', 'Thur', 'Fri', 'Sat','Sun'],
    },
    yaxis: {
        show: false
    },
    fill: {
        opacity: 1
    },
    plotOptions: {
        bar: {
            horizontal: false,
            endingShape: 'rounded',
            columnWidth: '25%',
        }
    },
    legend: {
        show: false,
    },
    grid: {
        show: false,
        xaxis: {
            lines: {
                show: false
            }
        },
        padding: {
          top: 10,
          right: 0,
          bottom: -40,
          left: 0
        }, 
    },
}
/*
    ============================
        Daily Sales | Render
    ============================
*/
var d_2C_1 = new ApexCharts(document.querySelector("#daily-sales"), d_2options1);
d_2C_1.render();

/*
    =============================
        Total Orders | Options
    =============================
*/
var d_2options2 = {
  chart: {
    id: 'sparkline1',
    group: 'sparklines',
    type: 'area',
    height: 280,
    sparkline: {
      enabled: true
    },
  },
  stroke: {
      curve: 'smooth',
      width: 2
  },
  fill: {
    opacity: 1,
  },
  series: [{
    name: 'Sales',
    data: [<?php echo implode(",", $month_item_arr); ?>]
  }],
  labels: [<?php echo implode(",",$da); ?>],
  yaxis: {
    min: 0
  },
  grid: {
    padding: {
      top: 125,
      right: 0,
      bottom: 36,
      left: 0
    }, 
  },
  fill: {
      type:"gradient",
      gradient: {
          type: "vertical",
          shadeIntensity: 1,
          inverseColors: !1,
          opacityFrom: .40,
          opacityTo: .05,
          stops: [45, 100]
      }
  },
  tooltip: {
    x: {
      show: false,
    },
    theme: 'dark'
  },
  colors: ['#fff']
}

/*
    ============================
        Total Orders | Render
    ============================
*/
var d_2C_2 = new ApexCharts(document.querySelector("#total-orders"), d_2options2);
d_2C_2.render();


// USers
var options2 = {
  chart: {
    fontFamily: 'Nunito, sans-serif',
    height: 365,
    type: 'area',
    zoom: {
        enabled: false
    },
    dropShadow: {
      enabled: true,
      opacity: 0.3,
      blur: 5,
      left: -7,
      top: 22
    },
    toolbar: {
      show: false
    },
  },
  colors: ['#1b55e2'],
  dataLabels: {
      enabled: false
  },
  markers: {
    discrete: [{
    seriesIndex: 0,
    dataPointIndex: 7,
    fillColor: '#000',
    strokeColor: '#000',
    size: 5
  }, {
    seriesIndex: 2,
    dataPointIndex: 11,
    fillColor: '#000',
    strokeColor: '#000',
    size: 4
  }]
  },
  subtitle: {
    text: 'Total Users',
    align: 'left',
    margin: 0,
    offsetX: -10,
    offsetY: 35,
    floating: false,
    style: {
      fontSize: '14px',
      color:  '#888ea8'
    }
  },
  title: {
    text: '<?php
          $user_count = mysqli_fetch_assoc(mysqli_query($con,"select count(user_id) as usercount from user"));
         echo($user_count['usercount'] );?>',
    align: 'left',
    margin: 0,
    offsetX: -10,
    offsetY: 0,
    floating: false,
    style: {
      fontSize: '25px',
      color:  '#0e1726'
    },
  },
  stroke: {
      show: true,
      curve: 'smooth',
      width: 2,
      lineCap: 'square'
  },
  series: [{
      name: 'User',
      data: [<?php echo implode(",",$total_user); ?>]
  }],
  labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
  xaxis: {
    axisBorder: {
      show: false
    },
    axisTicks: {
      show: false
    },
    crosshairs: {
      show: true
    },
    labels: {
      offsetX: 0,
      offsetY: 5,
      style: {
          fontSize: '12px',
          fontFamily: 'Nunito, sans-serif',
          cssClass: 'apexcharts-xaxis-title',
      },
    }
  },
  yaxis: {
    labels: {
      formatter: function(value, index) {
        return <?php echo $user_count['usercount']/1000; ?> + 'K'
      },
      offsetX: -12,
      offsetY: 0,
      style: {
          fontSize: '12px',
          fontFamily: 'Nunito, sans-serif',
          cssClass: 'apexcharts-yaxis-title',
      },
    }
  },
  grid: {
    borderColor: '#e0e6ed',
    strokeDashArray: 5,
    xaxis: {
        lines: {
            show: true
        }
    },   
    yaxis: {
        lines: {
            show: false,
        }
    },
    padding: {
      top: 0,
      right: 0,
      bottom: 0,
      left: -10
    }, 
  }, 
  legend: {
    position: 'top',
    horizontalAlign: 'right',
    offsetY: -50,
    fontSize: '16px',
    fontFamily: 'Nunito, sans-serif',
    markers: {
      width: 10,
      height: 10,
      strokeWidth: 0,
      strokeColor: '#fff',
      fillColors: undefined,
      radius: 12,
      onClick: undefined,
      offsetX: 0,
      offsetY: 0
    },    
    itemMargin: {
      horizontal: 0,
      vertical: 20
    }
  },
  tooltip: {
    theme: 'dark',
    marker: {
      show: true,
    },
    x: {
      show: false,
    }
  },
  fill: {
      type:"gradient",
      gradient: {
          type: "vertical",
          shadeIntensity: 1,
          inverseColors: !1,
          opacityFrom: .28,
          opacityTo: .05,
          stops: [45, 100]
      }
  },
  responsive: [{
    breakpoint: 575,
    options: {
      legend: {
          offsetY: -30,
      },
    },
  }]
}
var chart2 = new ApexCharts(
    document.querySelector("#profit"),
    options2
);

chart2.render();
</script>

<?php
if(isset($_GET['login']))
{
?>
    <script type="text/javascript"> 
        const toast = swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 5000,
            padding: '2em'
        });
        toast({
            type: 'success',
            title: 'Signed in successfully',
            padding: '2em',
        })
        var queryParams = new URLSearchParams(window.location.search);
        queryParams.delete("login");
        history.pushState(null, null, "?"+queryParams.toString());
    </script>
<?php
}
if(isset($_GET['change']))
{   
    ?><script type="text/javascript">
    Snackbar.show({ text: 'Password Changed Successfully', duration: 4000, });
    var queryParams = new URLSearchParams(window.location.search);
    queryParams.delete("change");
    history.pushState(null, null, "?"+queryParams.toString());
    </script><?php
}
?>
