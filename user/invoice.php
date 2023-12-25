<?php
if(!isset($_COOKIE['user_id']))
{
    ?><script type="text/javascript">location.replace("login.php?login_first=1");</script><?php
}
include_once('../db/connection.php');
if(!isset($_POST['payment_id']))
{
    ?><script type="text/javascript">location.replace("index.php")</script><?php
}
$payment_id = $_POST['payment_id'];
$user_id = $_COOKIE['user_id'];
$order_sql = mysqli_query($con,"select * from orders where payment_id='$payment_id' and user_id='$user_id'");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Invoice | Fashion</title>
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon.ico"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <link href="../plugins/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="../assets/css/apps/invoice.css" rel="stylesheet" type="text/css" />
    <!--  END CUSTOM STYLE FILE  -->
    
</head>
<body>
        <!--  BEGIN CONTENT AREA  -->
        <div class="doc-container">

            <div class="invoice-container">

                    <div class="invoice-header-section">
                        <h4 class="inv-number"></h4>
                        <div class="invoice-action mr-3 mt-5 action-print" style="cursor: pointer;" align="right">
                            <span class="border border-dark p-2">Print
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-printer ml-2" data-toggle="tooltip" data-placement="top" data-original-title="Reply"><polyline points="6 9 6 2 18 2 18 9"></polyline><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path><rect x="6" y="14" width="12" height="8"></rect></svg></span>
                        </div>
                    </div>
                    
                    <div id="ct" class="">
                        
                        <div class="invoice-00001">
                            <div class="content-section  animated animatedFadeInUp fadeInUp">

                                <div class="row inv--head-section">

                                    <div class="col-sm-6 col-12">
                                        <h3 class="in-heading">INVOICE</h3>
                                    </div>
                                    <div class="col-sm-6 col-12 align-self-center text-sm-right mb-2">
                                        <div class="company-info">
                                            <img src="../img/logo-light.png" width="120" height="30" class="skip-lazy logoimg bg--light" alt="Goya Fashion" />
                                        </div>
                                    </div>
                                    
                                </div>

                                <div class="row inv--detail-section">

                                    <div class="col-sm-7 align-self-center">
                                        <p class="inv-to">Invoice To</p>
                                    </div>
                                    <div class="col-sm-5 align-self-center  text-sm-right order-sm-0 order-1">
                                        <p class="inv-detail-title">From : Fashion Company</p>
                                    </div>
                                    <?php 
                                        $user_sql = mysqli_fetch_assoc(mysqli_query($con,"select * from user where user_id='$user_id'"));
                                    ?>
                                    <div class="col-sm-7 align-self-center">
                                        <p class="inv-customer-name"><?php echo $user_sql['name']; ?></p>
                                        <p class="inv-street-addr"><?php echo $user_sql['address']; ?></p>
                                        <p class="inv-email-address"><?php echo $user_sql['email']; ?></p>
                                    </div>
                                    <div class="col-sm-5 align-self-center  text-sm-right order-2">
                                        <p class="inv-list-number"><span class="inv-title">Invoice Number : </span> <span class="inv-number"><?php echo $payment_id; ?></span></p>
                                        <?php 
                                            $payment_sql = mysqli_fetch_assoc(mysqli_query($con,"select * from payment where payment_id='$payment_id'"));
                                        ?>
                                        <p class="inv-created-date"><span class="inv-title">Invoice Date : </span> <span class="inv-date"><?php echo date("d M Y", strtotime($payment_sql['payment_time'])); ?></span></p>
                                    </div>
                                </div>

                                <div class="row inv--product-table-section">
                                    <div class="col-12">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="">
                                                    <tr>
                                                        <th scope="col">S.No</th>
                                                        <th scope="col">Items</th>
                                                        <th class="text-right" scope="col">Qty</th>
                                                        <th class="text-right" scope="col">Unit Price</th>
                                                        <th class="text-right" scope="col">Amount</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $i=0;
                                                    $subtotal = 0;
                                                    $tax = 0;
                                                    $discount=0;
                                                    $final=0;
                                                    while($fetch_order=mysqli_fetch_assoc($order_sql))
                                                    {
                                                        $i++;
                                                        $subtotal += $fetch_order['amount'];
                                                        $tax += $fetch_order['tax_amount'];
                                                        $discount += $fetch_order['discounted_amount'];
                                                        $final += $fetch_order['final_amount'];
                                                        $product_id = $fetch_order['product_id'];
                                                        $fetch_product = mysqli_fetch_assoc(mysqli_query($con,"select * from product where product_id='$product_id'"));
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $i; ?></td>
                                                            <td><?php echo $fetch_product['product_name']; ?></td>
                                                            <td class="text-right"><?php echo $fetch_order['total_item']; ?></td>
                                                            <td class="text-right"><?php echo $fetch_order['amount']/$fetch_order['total_item']; ?></td>
                                                            <td class="text-right"><?php echo $fetch_order['amount']; ?></td>
                                                        </tr>
                                                    <?php
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-sm-5 col-12 order-sm-0 order-1">
                                        <div class="inv--payment-info">
                                            <div class="row">
                                                <?php 
                                                    $payment_sql = mysqli_fetch_assoc(mysqli_query($con,"select * from payment where payment_id='$payment_id' and user_id='$user_id'"));
                                                ?>
                                                <div class="col-sm-12 col-12">
                                                    <h6 class=" inv-title">Payment Info:</h6>
                                                </div>
                                                <div class="col-sm-4 col-12">
                                                    <p class=" inv-subtitle">Transaction ID: </p>
                                                </div>
                                                <div class="col-sm-8 col-12">
                                                    <p class=""><?php echo $payment_sql['reference_id']; ?></p>
                                                </div>
                                                <div class="col-sm-4 col-12">
                                                    <p class=" inv-subtitle">Payment Mode : </p>
                                                </div>
                                                <div class="col-sm-8 col-12">
                                                    <p class=""><?php echo $payment_sql['payment_mode']; ?></p>
                                                </div>
                                                <div class="col-sm-4 col-12">
                                                    <p class=" inv-subtitle">Payment Time : </p>
                                                </div>
                                                <div class="col-sm-8 col-12">
                                                    <p class=""><?php echo date("d-M-Y h:m:s", strtotime($payment_sql['payment_time'])); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-7 col-12 order-sm-1 order-0">
                                        <div class="inv--total-amounts text-sm-right">
                                            <div class="row">
                                                <div class="col-sm-8 col-7">
                                                    <p class="">Sub Total: </p>
                                                </div>
                                                <div class="col-sm-4 col-5">
                                                    <p class=""><?php echo $subtotal; ?></p>
                                                </div>
                                                <div class="col-sm-8 col-7">
                                                    <p class="">Tax Amount: </p>
                                                </div>
                                                <div class="col-sm-4 col-5">
                                                    <p class=""><?php echo $tax; ?></p>
                                                </div>
                                                <div class="col-sm-8 col-7">
                                                    <p class=" discount-rate">Discount : </span> </p>
                                                </div>
                                                <div class="col-sm-4 col-5">
                                                    <p class=""><?php echo $discount; ?></p>
                                                </div>
                                                <div class="col-sm-8 col-7 grand-total-title">
                                                    <h4 class="">Grand Total : </h4>
                                                </div>
                                                <div class="col-sm-4 col-5 grand-total-amount">
                                                    <h4 class="">Rs.<?php echo $final; ?></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>


                </div>

                <div class="inv--thankYou">
                    <div class="row">
                        <div class="col-sm-12 col-12">
                            <p class="">Thank you for shopping..</p>
                        </div>
                    </div>
                </div>

            </div>
            
        </div>

        <!--  END CONTENT AREA  -->
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
    <script src="../assets/js/apps/invoice.js"></script>
</body>
</html>