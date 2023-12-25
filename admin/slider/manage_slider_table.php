<?php
if(!isset($_COOKIE['admin_id']))
{
    ?><script type="text/javascript">location.replace("login.php?login_first=1");</script><?php
}
include_once("../../db/connection.php");
$query = "select * from slider";
$run = mysqli_query($con,$query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Manage Slider | Fashion </title>
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
                                <li class="breadcrumb-item"><a href="#"> Manage Slider Table </a></li>
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
                                                    <th class="text-center">Product Name</th>
                                                    <th class="text-center">Category </th>
                                                    <th class="text-center">Sub_Category </th>
                                                    <th class="text-center">Tag</th>
                                                    <th class="text-center">Description</th>
                                                    <th class="text-center">Modify_date </th>
                                                    <th class="text-center">Edit </th>
                                                    <th class="text-center">Delete </th>

                                                </tr>
                                            </thead>
                                        
                                            <tfoot>
                                                <tr>
                                                    <th class="text-center">No.</th>
                                                    <th class="text-center">Product Name</th>
                                                    <th class="text-center">Category </th>
                                                    <th class="text-center">Sub_Category </th>
                                                    <th class="text-center">Tag</th>
                                                    <th class="text-center">Description</th>
                                                    <th class="text-center">Modify_date </th>
                                                    <th class="text-center">Edit </th>
                                                    <th class="text-center">Delete </th>

                                                </tr>
                                            </tfoot>

                                            <tbody>
                                                <?php 

                                                        $i=0;
                                                        while($row = mysqli_fetch_assoc($run)) {
                                                        $i+=1;
                                                        $slider_id = $row['slider_id'];
                                                        $query_slider = "select * from slider where slider_id='$slider_id'";
                                                        $run_slider = mysqli_query($con,$query_slider);
                                                        $fetch_slider = mysqli_fetch_assoc($run_slider);

                                                        $product_id = $row['product_id'];
                                                        $query_product = "select * from product where product_id='$product_id'";
                                                        $run_product = mysqli_query($con,$query_product);
                                                        $fetch_product = mysqli_fetch_assoc($run_product);                                                        
                                                        echo '
                                                        
                                                            <td class="text-center">'.$i.'</td>
                                                            <td class="text-center">'.$fetch_product['product_name'].'</td>
                                                            <td class="text-center">'.$fetch_product['category'].'</td>
                                                            <td class="text-center">'.$fetch_product['sub_category'].'</td>    
                                                            <td class="text-center">'.$row['tag'].'</td>
                                                            <td class="text-center">'.$row['description'].'</td>
                                                            <td class="text-center">'.$row['modify_date'].'</td>
                                                            <td class="text-center">
                                                            <button type="button" onclick=edit('.$slider_id.')  style="border:none;background:none;" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title=" Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg></button>

                                                            </td>';
                                                            echo '<td class="text-center">
                                                            <button type="button" onclick=delet('.$slider_id.') data-toggle="modal" data-target="#faderightModal" style="border:none;background:none;" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title=" Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 table-cancel"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></button>
                                                            </td></tr>';
                                                    }
                                                ?>
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
        function message(id)
        {
            $("#fadeRightModal"+id).modal('show');
        }
    </script>

    <script type="text/javascript">
        function edit(slider_id){
            location.href = "update_slider.php?slider_id="+slider_id;
        }
        function delet(slider_id){
            document.getElementById('del').value = slider_id;
        }
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
<?php
if(isset($_POST['delete']))
{
    $id = mysqli_real_escape_string($con,$_POST['delete']);
    $sql_check = mysqli_fetch_assoc(mysqli_query($con,"select count(*) 'cn' from slider"));
    if($sql_check['cn'] > 2)
    {
        $query = "delete from slider where slider_id='$id'";
        $run = mysqli_query($con,$query);
        if($run == true)
        {
            ?><script type="text/javascript">location.replace("manage_slider_table.php?success=1");</script><?php
        }
        else
        {
            ?><script type="text/javascript">location.replace("manage_slider_table.php?error=1");</script><?php
        }    
    }
    else
    {
        ?><script type="text/javascript">location.replace("manage_slider_table.php?size=1");</script><?php
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
    Snackbar.show({ text: 'Slider Updated', duration: 2000, });
    var queryParams = new URLSearchParams(window.location.search);
    queryParams.delete("success");
    history.pushState(null, null, "?"+queryParams.toString());
    </script><?php
}
if(isset($_GET['size']))
{
    ?><script type="text/javascript">
    Snackbar.show({ text: 'Slider minimum range must be 2', duration: 3000, });
    var queryParams = new URLSearchParams(window.location.search);
    queryParams.delete("size");
    history.pushState(null, null, "?"+queryParams.toString());
    </script><?php
}
?>