<?php
include_once("../../db/connection.php");
if(!isset($_COOKIE['admin_id']))
{
    ?><script type="text/javascript">location.replace("login.php?login_first=1");</script><?php
}
if(isset($_GET['category']) && isset($_GET['subcategory']) )
{
    $category = $_GET['category'];
    $subcategory = $_GET['subcategory'];
    $query = "select * from product where category = '$category' and sub_category = '$subcategory'"; 
    $run_product = mysqli_query($con,$query);
    $total_rows = mysqli_num_rows($run_product);
    if($total_rows == 0)
    {
        ?><script type="text/javascript">
            location.href = "select_product_slider.php?category=<?php echo $category; ?>&subcategory=<?php echo $subcategory; ?>&error=1";
        </script><?php
    }
    $query = "select * from slider";
    $run = mysqli_query($con,$query);
    $slider_tot_rows = mysqli_num_rows($run);
    if($slider_tot_rows == 6)
    {
        ?><script>location.replace("select_product_slider.php?full=1");</script><?php
    }
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
    <title> Create Slider | Fashion</title>
    <link rel="icon" type="image/x-icon" href="../../assets/img/favicon.png"/>
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
                                <li class="breadcrumb-item" aria-current="page"><span>Add Slider</span></li>
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
                                                                    <select class="form-control" id="category" name="product_id" required>
                                                                        <option selected disabled>---Product Name---</option>
                                                                        <?php 

                                                                        while($fetch=mysqli_fetch_assoc($run_product))
                                                                        {
                                                                            
                                                                            echo "<option value=".$fetch['product_id'].">".$fetch['product_name']."</option>";
                                                                        }

                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- category end  -->
 
                                            <div class="info" style="margin-top:-35px;">
                                                <div class="row">
                                                        <div class="col-md-11 mx-auto" >
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <input type="text" name="tag_name" class="form-control mb-4 " required="" id="test_name" placeholder="Enter Tag" minlength="3" maxlength="15">
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
                                            
                                            <div class="info" style="margin-top:-35px;">
                                                <div class="row">
                                                        <div class="col-md-11 mx-auto" >
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <input type="text" name="description" class="form-control mb-4 " required="" id="test_name"  placeholder="Product Discription" minlength="3" maxlength="40">
                                                                    </div>
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
        $('#category').on('change', function (e) {
            var valueSelected = this.value;
            if(valueSelected == "Mens")
            {
                $("#mens").css("display","block");
                $("#womens").css("display","none");
            }
            else if(valueSelected == "Womens")
            {
                $("#mens").css("display","none");
                $("#womens").css("display","block");
            }
        });

        var d;
        $("#product-image").change(function(){
            var a = this.value;

            if(a == "1")
            {
                var c = a+1;
                $("#show-image").html('<div class="upload mt-4 pr-md-4" style="border:none" id="i0">'+
                        '<input type="file" id="profileImg" class="dropify" data-default-file="" data-max-file-size="5M" name="profileImg" accept="image/* "/ required="">'+
                        '<p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i><b style="color: red"> Upload Product Image '+c+'</b></p>'+
                    '</div>'+
                '</div>');
            }
            else
            {
                for(i = 1 ;i<=d ; i++)
                {
                    $("#i"+i).remove();
                }
                $("#i0").remove();
                for(i = 1 ; i<=a ; i++)
                {
                    $("#show-image").append('<div class="upload mt-4 pr-md-4" style="border:none" id="i'+i+'">'+
                        '<input type="file" id="profileImg" class="dropify" data-default-file="" data-max-file-size="5M" name="profileImg" accept="image/* "/ required="">'+
                        '<p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i><b style="color: red"> Upload Product Image'+i+'</b></p>'+
                    '</div>'+
                '</div>');
                }
                d = $(".upload input").length;
            }
        });
        $('input[type="radio"]').click(function(){
            if ($(this).is(':checked'))
            {
                type = $(this).val();
                if(type == "no")
                {    
                    $("#discount-block").css("display","none");
                }
                else
                {
                    $("#discount-block").css("display","block");
                }
            }
        });

        $("#general-info").on("submit",function(){
            if($("#category").val() == null)
            {
                Snackbar.show({text: 'Please Select Product Name' , duration : 2000})
                return false;
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
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

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
            
           allowFileEncode: true,
           maxFiles:1,
           allowImageResize: true,
           imageResizeTargetWidth: 1600,
           imageResizeTargetHeight: 800,

           allowReorder:true,
           required:true,
           instantUpload:true,
           acceptedFileTypes: ['image/jpeg','image/png','image/webp','image/jpg'],
           imageResizeMode: 'contain',
           imageCropAspectRatio: '2:1',
           imageTransformVariants: {
           '': transforms => 
            {
             width = 1600;
             height = 800;
             return transforms;
            },
            },
           imageValidateSizeMinWidth: 1600,
            imageValidateSizeMaxWidth: 1600,
            imageValidateSizeMinHeight: 800,
            imageValidateSizeMaxHeight: 800,
            imageValidateSizeLabelExpectedMinSize: 'Minimum resolution is {minWidth} × {minHeight}',
            imageValidateSizeLabelExpectedMaxSize: 'Maximum resolution is {maxWidth} × {maxHeight}',

          });
    </script>
    
</body>
</html>

<?php


if(isset($_POST['submit']))
{  
    $product_id = mysqli_real_escape_string($con,$_POST['product_id']);
    $query = "select * from slider where product_id='$product_id'";
    $run = mysqli_query($con,$query);
    if(mysqli_num_rows($run) > 0)
    {
        ?><script type="text/javascript">
            alert("Product Already Added In Slider");
            location.href="add_slider.php?category=<?php echo $category; ?>&subcategory=<?php echo $subcategory; ?>"</script><?php
    }
    else
    {
        $tag = mysqli_real_escape_string($con,$_POST['tag_name']);
        $description = mysqli_real_escape_string($con,$_POST['description']);
        $modify_date = date("Y/m/d");

            // RECEIVE UPLOADS:
        $isFileUploadRequest = $_POST['sentPhotos'];
        if ($isFileUploadRequest) {
        
            $filePondArray = $_POST['filepond'];
        
            $baseFileLocation = '../../db/images/';
            $numFilePondObjects = sizeof($filePondArray);
            if ( !$numFilePondObjects ) { die('No photos sent!'); }
            for ($xx=0; $xx<$numFilePondObjects; $xx++) {
                $thisFilePondJSON_object = $filePondArray[$xx];
            
                $thisFilePondArray = json_decode($thisFilePondJSON_object, true);
                // isolate the encoded pics...
                $thisFilePondArray_picData = $thisFilePondArray['data'];
                $thisFilePondArray_numPics = sizeof($thisFilePondArray_picData);
                $uniq = uniqid();
                // iterate through pics in this object...
                for ($yy=0; $yy<$thisFilePondArray_numPics; $yy++){
                    $thisPic_name_temp = $uniq  .'.jpg';
                    $thisPic_encodedData = $thisFilePondArray_picData[$yy]['data'];
                    $thisPic_decodedData = base64_decode($thisPic_encodedData);
                $thisPic_fullPathAndName = $baseFileLocation . $thisPic_name_temp;   
                }
            }
            $image1 = $thisPic_name_temp;

            $query = "insert into slider(product_id,image,tag,description,modify_date) values ('$product_id','$image1','$tag','$description','$modify_date')";
            $run = mysqli_query($con,$query);

            if($run == true)
            {
                file_put_contents($thisPic_fullPathAndName, $thisPic_decodedData);
                ?><script type="text/javascript">location.replace("manage_slider_table.php?success=1");</script><?php   
            }
            else
            {
                ?><script type="text/javascript">location.replace("manage_slider_table.php?error=1");</script><?php
            }
        }

    }



}


?>

<?php
if(isset($_GET['success']))
{   
    ?><script type="text/javascript">
    Snackbar.show({ text: 'slider added Successfully', duration: 2000, });
    var queryParams = new URLSearchParams(window.location.search);
    queryParams.delete("success");
    history.pushState(null, null, "?"+queryParams.toString());
    </script><?php
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

?>
