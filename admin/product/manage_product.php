<?php
include_once("../../db/connection.php");
if(!isset($_COOKIE['admin_id']))
{
    ?><script type="text/javascript">location.replace("../login.php?login_first=1");</script><?php
}
if(isset($_GET['category']) && isset($_GET['subcategory']))
{
    $cat = $_GET['category'];
    $sub_cat = $_GET['subcategory'];
    $query = "select * from product where category='$cat' and sub_category='$sub_cat'";
    $run = mysqli_query($con,$query);    
}
else
{
    ?><script type="text/javascript">location.replace("../index.php");</script><?php
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Manage Products | Fashion </title>
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
                                <li class="breadcrumb-item">Manage Product</li>

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
                                <form method="POST" action="">
                                    <div class="table-responsive mb-4 mt-4">
                                        <table id="alter_pagination" class="table table-hover with-ellipsis" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">No.</th>
                                                    <th class="text-center">Date</th>
                                                    <th class="text-center">Name</th>
                                                    <th class="text-center">Image</th>
                                                    <th class="text-center">Discount</th>
                                                    <th class="text-center">Price</th>
                                                    <th class="text-center">Size</th>
                                                    <th class="text-center">Stock</th>
                                                    <th class="text-center">Edit</th>
                                                    <th class="text-center">Delete</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th class="text-center">No.</th>
                                                    <th class="text-center">Date</th>
                                                    <th class="text-center">Name</th>
                                                    <th class="text-center">Image</th>
                                                    <th class="text-center">Discount</th>
                                                    <th class="text-center">Total Price</th>

                                                    <th class="text-center">Size</th>
                                                    <th class="text-center">Stock</th>
                                                    <th class="text-center">Edit</th>
                                                    <th class="text-center">Delete</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                        <?php
                                        $i=0;
                                        while($result = mysqli_fetch_assoc($run)) {
                                            $i+=1; 
                                            $product_id = $result['product_id'];
                                            $size = str_replace("k","",$result['size']);
                                            echo '
                                                    <tr>
                                                        <td class="text-center">'.$i.'</td>
                                                        <td>'.$result['modify_date'].'</td>
                                                        <td class="text-center"><div style="overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-box-orient: vertical;-webkit-line-clamp: 5;line-height: 1.5;max-height: 5.25;">'.$result['product_name'].'</div></td>
                                                        
                                                        <td><img src="../../db/images/'.$result['image1'].'" class="img-fluid" style="max-height:80px;width:auto"><input type="hidden" name="image" value="../../db/images/'.$result['image1'].'">

                                                        <td class="text-center"><div style="overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-box-orient: vertical;-webkit-line-clamp: 5;line-height: 1.5;max-height: 5.25;">'.$result['discount'].'</div></td>

                                                        <td class="text-center"><div style="overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-box-orient: vertical;-webkit-line-clamp: 5;line-height: 1.5;max-height: 5.25;">'.$result['price'].'</div></td>

                                                        <td class="text-center"><div style="overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-box-orient: vertical;-webkit-line-clamp: 5;line-height: 1.5;max-height: 5.25;">'.$size.'</div></td>
                                                        
                                                        <td class="text-center"><div style="overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-box-orient: vertical;-webkit-line-clamp: 5;line-height: 1.5;max-height: 5.25;">'.$result['total_items'].'</div></td>




                                                        <td class="text-center">
                                                            <button type="button" onclick=edit('.$product_id.')  style="border:none;background:none;" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title=" Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg></button>
                                                        </td>
                                                        <td class="text-center">
                                                        <button type="button" onclick=delet('.$product_id.') data-toggle="modal" data-target="#faderightModal" style="border:none;background:none;" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title=" Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 table-cancel"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></button>
                                                            </td>
                                                    </tr>'
                                            ;
                                        }
                                        ?>
                                                
                                            </tbody>
                                            <!--modal -->
                                                <div id="faderightModal" class="modal fade" role="dialog">
                                                    <div class="modal-dialog">
                                                        <!-- Modal content-->
                                                        <div class="modal-content">
                                                            <div class="modal-header" style="padding: 10px;padding-left: 20px">
                                                                <h5 class="modal-title" >Delete Confirmation</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                  <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                  <p class="modal-text text-dark" >Are you sure to Delete this?</p>
                                                            </div>
                                                            <div class="modal-footer md-button" style="padding: 5px">
                                                                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                                                                <button type="submit" class="btn btn-danger"  id="del" name="delete" value="" >Delete</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> 
                                                <!--end modal-->
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
    <script type="text/javascript">
        function edit(product_id){
            location.href = "update_product.php?product_id="+product_id;
        }
        function delet(product_id){
            document.getElementById('del').value = product_id;
        }
    </script>
    <!-- END PAGE LEVEL CUSTOM SCRIPTS -->

</body>
</html>
<?php
if(isset($_POST['delete']))
{
    $id = mysqli_real_escape_string($con,$_POST['delete']);
    $query = "delete from product where product_id='$id'";
    $run = mysqli_query($con,$query);
    if($run == true)
    {
        ?><script type="text/javascript">location.replace("manage_product.php?category=<?php echo $cat; ?>&subcategory=<?php echo $sub_cat; ?>&success=1");</script><?php
    }
    else
    {
        ?><script type="text/javascript">location.replace("manage_product.php?category=<?php echo $cat; ?>&subcategory=<?php echo $sub_cat; ?>&error=1");</script><?php
    }
}
if(isset($_GET['error']))
{   
    ?><script type="text/javascript">
    Snackbar.show({ text: 'There is Some Error, Please Try Again', duration: 2000, });
    var queryParams = new URLSearchParams(window.location.search);
    queryParams.delete("error");
    history.pushState(null, null, "?"+queryParams.toString());
    </script><?php
}
if(isset($_GET['success']))
{   
    ?><script type="text/javascript">
    Snackbar.show({ text: 'Product Deleted', duration: 2000, });
    var queryParams = new URLSearchParams(window.location.search);
    queryParams.delete("success");
    history.pushState(null, null, "?"+queryParams.toString());
    </script><?php
}
?>

