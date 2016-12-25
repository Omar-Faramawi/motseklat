<!DOCTYPE html>
<!--[if IE 8]><html class="ie8 no-js" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9 no-js" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html lang="ar" class="no-js">
    <!--<![endif]-->
    <!-- start: HEAD -->
    <head>
        <title>Motseklat.com - إضافة سعة محرك</title>
        <!-- start: META -->
        <meta charset="utf-8" />
        <!--[if IE]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- end: META -->
        <!-- start: MAIN CSS -->
        <link rel="stylesheet" href="<?= base_url('assets/back_end/plugins/bootstrap/css/bootstrap.min.css') ?>">
        <link rel="stylesheet" href="<?= base_url('assets/back_end/plugins/font-awesome/css/font-awesome.min.css') ?>">
        <link rel="stylesheet" href="<?= base_url('assets/back_end/fonts/style.css') ?>">
        <link rel="stylesheet" href="<?= base_url('assets/back_end/css/main.css') ?>">
        <link rel="stylesheet" href="<?= base_url('assets/back_end/css/main-responsive.css') ?>">
        <link rel="stylesheet" href="<?= base_url('assets/back_end/plugins/iCheck/skins/all.css') ?>">
        <link rel="stylesheet" href="<?= base_url('assets/back_end/plugins/bootstrap-colorpalette/css/bootstrap-colorpalette.css') ?>">
        <link rel="stylesheet" href="<?= base_url('assets/back_end/plugins/perfect-scrollbar/src/perfect-scrollbar-rtl.css') ?>">
        <link rel="stylesheet" href="<?= base_url('assets/back_end/css/theme_light.css') ?>" type="text/css" id="skin_color">
        <link rel="stylesheet" href="<?= base_url('assets/back_end/css/print.css') ?>" type="text/css" media="print"/>
        <link rel="stylesheet" href="<?= base_url('assets/back_end/css/rtl-version.css') ?>">
        <!-- end: MAIN CSS -->
        <link rel="shortcut icon" href="<?php echo base_url('assets/front_end/images/favicon.ico'); ?>">
    </head>
    <!-- end: HEAD -->
    <!-- start: BODY -->
    <body class="rtl">
        <!-- start: HEADER -->
        <div class="navbar navbar-inverse">
            <!-- start: TOP NAVIGATION CONTAINER -->
            <div class="container">
                <div class="navbar-header">
                    <!-- start: LOGO -->
                    <?php $this->load->view('back_end/admin/includes/logo'); ?>
                    <!-- end: LOGO -->
                </div>
                <div class="navbar-tools">
                    <!-- start: TOP NAVIGATION MENU -->
                    <?php $this->load->view('back_end/admin/includes/nav_menu'); ?>
                    <!-- end: TOP NAVIGATION MENU -->
                </div>
            </div>
            <!-- end: TOP NAVIGATION CONTAINER -->
        </div>
        <!-- end: HEADER -->
        <!-- start: MAIN CONTAINER -->
        <div class="main-container">
            <div class="navbar-content">
                <!-- start: SIDEBAR -->
                <?php $this->load->view('back_end/admin/includes/right_sidebar'); ?>
                <!-- end: SIDEBAR -->
            </div>
            <!-- start: PAGE -->
            <div class="main-content">
                <div class="container">
                    <!-- start: PAGE HEADER -->
                    <div class="row">
                        <div class="col-sm-12">
                            <!-- start: PAGE TITLE & BREADCRUMB -->
                            <ol class="breadcrumb">
                                <li>
                                    <i class="clip-pencil"></i>
                                    <a href="<?=base_url('home')?>">
                                        الرئيسية
                                    </a>
                                </li>
                                <li class="active">
                                    إضافة سعة محرك
                                </li>
                            </ol>
                            <div class="page-header">
                            </div>
                            <!-- end: PAGE TITLE & BREADCRUMB -->
                        </div>
                    </div>
                    <!-- end: PAGE HEADER -->
                    <!-- start: PAGE CONTENT -->
                    <div class="row">
                        <div class="col-md-12">
                            <!-- start: FORM VALIDATION 1 PANEL -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <i class="fa fa-external-link-square"></i>
                                    يمكنك إضافة سعة محرك جديدة جديد
                                </div>
                                <div class="panel-body">
                                    <h2><i class="fa fa-pencil-square teal"></i> إضافة سعة محرك</h2>
                                    <hr>
                                    <form action="#" enctype="multipart/form-data" role="form" id="add_capacity">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <!-- Start Alert Message -->
                                                <div id="status" class="no-display">
                                                    <span id="message"></span>
                                                </div>
                                                <!-- End Alert Message -->
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group col-md-12">
                                                    <label class="control-label">
                                                        سعة المحرك <span class="symbol required"></span>
                                                    </label>
                                                    <input type="text" class="form-control" name="capacity">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-8">
                                            </div>
                                            <div class="col-md-4">
                                                <button class="btn btn-info btn-block" type="submit">
                                                    إضافة <i class="fa fa-edit"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- end: FORM VALIDATION 1 PANEL -->
                        </div>
                    </div>
                    <!-- end: PAGE CONTENT-->
                </div>
            </div>
            <!-- end: PAGE -->
        </div>
        <!-- end: MAIN CONTAINER -->
        <!-- start: FOOTER -->
        <?php $this->load->view('back_end/admin/includes/footer'); ?>
        <!-- end: FOOTER -->
        <!-- start: LEFT SIDEBAR -->
        <?php $this->load->view('back_end/admin/includes/left_sidebar'); ?>
        <!-- end: LEFT SIDEBAR -->
        <!-- start: MAIN JAVASCRIPTS -->
        <!--[if lt IE 9]>
        <script src="assets/plugins/respond.min.js"></script>
        <script src="assets/plugins/excanvas.min.js"></script>
        <script type="text/javascript" src="assets/plugins/jQuery-lib/1.10.2/jquery.min.js"></script>
        <![endif]-->
        <!--[if gte IE 9]><!-->
        <script src="<?= base_url('assets/back_end/plugins/jQuery-lib/2.0.3/jquery.min.js') ?>"></script>
        <!--<![endif]-->
        <script src="<?= base_url('assets/back_end/plugins/jquery-ui/jquery-ui-1.10.2.custom.min.js') ?>"></script>
        <script src="<?= base_url('assets/back_end/plugins/bootstrap/js/bootstrap.min.js') ?>"></script>
        <script src="<?= base_url('assets/back_end/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js') ?>"></script>
        <script src="<?= base_url('assets/back_end/plugins/blockUI/jquery.blockUI.js') ?>"></script>
        <script src="<?= base_url('assets/back_end/plugins/iCheck/jquery.icheck.min.js') ?>"></script>
        <script src="<?= base_url('assets/back_end/plugins/perfect-scrollbar/src/jquery.mousewheel.js') ?>"></script>
        <script src="<?= base_url('assets/back_end/plugins/perfect-scrollbar/src/perfect-scrollbar-rtl.js') ?>"></script>
        <script src="<?= base_url('assets/back_end/plugins/less/less-1.5.0.min.js') ?>"></script>
        <script src="<?= base_url('assets/back_end/plugins/jquery-cookie/jquery.cookie.js') ?>"></script>
        <script src="<?= base_url('assets/back_end/plugins/bootstrap-colorpalette/js/bootstrap-colorpalette.js') ?>"></script>
        <script src="<?= base_url('assets/front_end/js/twitterfeed.js'); ?>" type="text/javascript"></script>
        <script src="<?= base_url('assets/front_end/js/moment.min.js'); ?>" type="text/javascript"></script>
        <script src="<?= base_url('assets/front_end/js/jquery.simpleWeather.min.js'); ?>" type="text/javascript"></script>
        <script src="<?= base_url('assets/back_end/js/main.js') ?>"></script>
        <!-- end: MAIN JAVASCRIPTS -->
        <!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
        <script src="<?= base_url('assets/back_end/plugins/summernote/build/summernote.min.js') ?>"></script>
        <!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
        <script>
            jQuery(document).ready(function () {
                Main.init();
//                FormValidator.init();
                //function to initiate bootstrap-datepicker
            });

            $("#add_capacity").submit(function () {
                var formData = new FormData($(this)[0]);
                $.ajax({
                    url: '<?php echo base_url("admin/engines/do_add_engine/"); ?>',
                    type: 'POST',
                    data: formData,
                    dataType: "JSON",
                    success: function (json) {
                        if (json['status'] == true) {
                            $('#status').removeClass().addClass('alert alert-success');
                            $('#message').html(json['msg']);
                            $('#add_slide')[0].reset();
                        } else if (json['status'] == false) {
                            $('#status').removeClass().addClass('alert alert-danger');
                            $('#message').html(json['msg']);
                        }
                    }, complete: function () {
                        jQuery('html,body').animate({
                            scrollTop: 0
                        }, 'slow');
                    }, error: function () {
                        $('#status').removeClass().addClass('alert alert-danger');
                        $('#message').text("هناك خطأ في تخزين البيانات");
                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });
                return false;
            });
        </script>
    </body>
    <!-- end: BODY -->
</html>