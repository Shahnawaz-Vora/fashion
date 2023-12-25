<?php
if(!isset($_COOKIE['admin_id']))
{
    ?><script type="text/javascript">location.replace("../login.php?login_first=1");</script><?php
}
include_once("../../db/connection.php");
$sql_order = mysqli_query($con,"select * from orders group by payment_id");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Manage Order | Fashion</title>
    <link rel="icon" type="image/x-icon" href="../../assets/img/favicon.png"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="../../css/font.css" rel="stylesheet">
    <link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../../assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->    
       <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="../../plugins/animate/animate.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN PAGE LEVEL CUSTOM STYLES -->
    <link rel="stylesheet" type="text/css" href="../../plugins/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="../../plugins/table/datatable/dt-global_style.css">
     <link href="../../assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="../../assets/css/components/custom-modal.css" rel="stylesheet" type="text/css" />
    <link href="../../plugins/notification/snackbar/snackbar.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="../../assets/css/forms/switches.css">
    <!-- END PAGE LEVEL CUSTOM STYLES -->
    <style type="text/css">
        .table > tbody > tr > td{
            color: black;
            font-family: sans-serif;
            text-overflow: ellipsis;
            overflow: hidden;
            max-height: 50px;
        }
        .bs-tooltip-top {
          margin-left: 5px;
        }
        select{
            background-color: transparent; 
            color: black;
            padding: 2px 5px 2px 5px;
            width: 150px;
            border: none;
            border-radius: 5px;
            font-size: 15px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            -webkit-appearance: button;
            appearance: button;
            outline: none;
        }
    </style>
</head>
<body>
    
    <!--  BEGIN NAVBAR  -->
    <?php
        include_once 'header.php';
    ?>
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
                                <li class="breadcrumb-item"> Manage Order</li>
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
            <div class="col-xl-12">
                <div class="container">
                    <div class="row layout-top-spacing">
                        <div class="col-lg-12 col-12 layout-spacing">
                            <div class="widget-content widget-content-area br-6">
                                <form method="POST" action="invoice.php">
                                    <div class="table-responsive mb-4 mt-4">
                                        <table id="alter_pagination" class="table table-hover with-ellipsis" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">No.</th>
                                                    <th class="text-center">Name</th>
                                                    <th class="text-center">Payment ID</th>
                                                    <th class="text-center">Payment Date</th>
                                                    <th class="text-center">Action </th>
                                                    <th class="text-center">Status </th>
                                                    <th class="text-center">invoice </th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th class="text-center">No.</th>
                                                    <th class="text-center">Name</th>
                                                    <th class="text-center">Payment ID</th>
                                                    <th class="text-center">Payment Date</th>
                                                    <th class="text-center">Action </th>
                                                    <th class="text-center">Status </th>
                                                    <th class="text-center">invoice </th>
                                                </tr>
                                            </tfoot>

                                            <tbody>
                                                <?php $i=0;
                                                    while($fetch_orders = mysqli_fetch_assoc($sql_order)) 
                                                    {
                                                        $i+=1;
                                                        $user_id = $fetch_orders['user_id'];
                                                        $product_id = $fetch_orders['product_id']; 
                                                        $payment_id = $fetch_orders['payment_id'];
                                                        $fetch_user = mysqli_fetch_assoc(mysqli_query($con,"select * from user where user_id='$user_id'"));
                                                        $fetch_product = mysqli_fetch_assoc(mysqli_query($con,"select * from product where product_id='$product_id'"));
                                                        $fetch_payment = mysqli_fetch_assoc(mysqli_query($con,"select * from payment where payment_id='$payment_id'"));
                                                        echo '
                                                        <tr>
                                                            <td class="text-center">'.$i.'</td>
                                                            <td class="text-center">'.$fetch_user['name'].'</td>
                                                            <td class="text-center">'.$fetch_payment['payment_id'].'</td>
                                                            <td class="text-center">'.date("d-M-Y", strtotime($fetch_payment['payment_time'])).'</td>
                                                            
                                                            ';
                                                            if($fetch_orders['status'] == 0)
                                                            {
                                                                $status = "Booked";
                                                            }
                                                            else if($fetch_orders['status'] == 1)
                                                            {
                                                                $status = "Shipped";
                                                            }
                                                            else if($fetch_orders['status'] == 2)
                                                            {
                                                                $status = "Delivered";
                                                            }
                                                            else if($fetch_orders['status'] == 3)
                                                            {
                                                                $status = "Cancelled";
                                                            }

                                                            $order_id = $fetch_orders['order_id'];
                                                                ?><td class="text-center">

                                                                    <select id="<?php echo $fetch_orders['payment_id']; ?>" <?php if($fetch_orders['status'] == 2) {echo "disabled"; } else {echo "";} ?>>
                                                                    <option value=0 selected="" disabled>Booked</option>
                                                                    <option value="1" id="order2" <?php if($fetch_orders['status'] == 1) {echo "selected disabled";} else {echo "";} ?> >Shipped</option>
                                                                    <option value="2" id="order3" <?php if($fetch_orders['status'] == 2) {echo "selected disabled";} else {echo "";}?>>Delivered</option>

                                                                    </select>
                                                                </td>
                                                                <td class="text-center" id="status<?php echo $payment_id; ?>"><?php echo $status; ?></td>
                                                                <?php

                                                            echo '<td class="text-center"><input type="hidden" name="payment_id" value="'.$payment_id.'">

                                                             <button type="submit" style="border:none;background:none;" class="bs-tooltip text-center" data-toggle="tooltip" data-placement="top" ><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg></button>';
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--  END CONTENT AREA  -->
    </div>
    <!-- END MAIN CONTAINER -->   

<script type="text/javascript">
    function editQuestion(id){
        window.location = "update_student.php?studId="+id;
    }
</script>

        
    
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="../../assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="../../bootstrap/js/popper.min.js"></script>
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <script src="../../plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="../../assets/js/app.js"></script>
    
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="../../assets/js/custom.js"></script>
     <script src="../../plugins/highlight/highlight.pack.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL CUSTOM SCRIPTS -->
    <script src="../../assets/js/scrollspyNav.js"></script>
    <script src="../../plugins/table/datatable/datatables.js"></script>
    <script src="../../plugins/notification/snackbar/snackbar.min.js"></script>
    <script src="../../assets/js/components/notification/custom-snackbar.js"></script>
    <script>
        $(document).ready(function() {
            $('#alter_pagination').DataTable( {
                "pagingType": "full_numbers",
                "oLanguage": {
                    "oPaginate": { 
                        "sFirst": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left"><polyline points="15 18 9 12 15 6"></polyline></svg>',
                        "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                        "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>',
                        "sLast": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>'
                    },
                    "sInfo": "Showing page _PAGE_ of _PAGES_",
                    "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                    "sSearchPlaceholder": "Search...",
                   "sLengthMenu": "Results :  _MENU_",
                },
                "stripeClasses": [],
                "lengthMenu": [7, 10, 20, 50],
                "pageLength": 7 
            });
        } );
    </script>
    <!-- END PAGE LEVEL CUSTOM SCRIPTS -->

</body>
</html>
<script type="text/javascript">
    var data = [];   
    $('select').each(function(index) {
        $(this).change(function(){
        var pid = this.id;
            if(this.value == 1)
            {
                this.options[1].disabled = true;
                $("#status"+pid).html("Shipped");
            }
            else if(this.value == 2)
            {
                this.disabled=true;
                $("#status"+pid).html("Delivered");
            }
        var status = this.value;
        $.ajax({
            url:"ajax.php",
            method:"POST",
            data:{status:status,payment_id:pid},
            cache:false,
            success:function(data)
            {
                console.log(data);
            }
        });
        });
    }); 
</script>
