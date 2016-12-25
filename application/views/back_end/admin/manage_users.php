<!DOCTYPE html>
<!--[if IE 8]><html class="ie8 no-js" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9 no-js" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html lang="ar" class="no-js">
    <!--<![endif]-->
    <!-- start: HEAD -->
    <head>
        <title>Motseklat.com - إدارة المستخدمين</title>
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
        <!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
        <link rel="stylesheet" href="<?= base_url('assets/back_end/plugins/select2/select2.css') ?>">
        <link rel="stylesheet" href="<?= base_url('assets/back_end/plugins/DataTables/media/css/DT_bootstrap.css') ?>">
        <!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
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
                    <!-- start: RESPONSIVE MENU TOGGLER -->
                    <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
                        <span class="clip-list-2"></span>
                    </button>
                    <!-- end: RESPONSIVE MENU TOGGLER -->
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
                            <!-- start: STYLE SELECTOR BOX -->
                            <?php // $this->load->view('back_end/admin/includes/style_selector'); ?>

                            <!-- end: STYLE SELECTOR BOX -->
                            <!-- start: PAGE TITLE & BREADCRUMB -->
                            <ol class="breadcrumb">
                                <li>
                                    <i class="clip-pencil"></i>
                                    <a href="<?=base_url('home')?>">
                                        الرئيسية
                                    </a>
                                </li>
                                <li class="active">
                                    إدارة المستخدمين
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
                            <!-- Start Alert Message -->
                            <div id="status" class="no-display">
                                <span id="message"></span>
                            </div>
                            <!-- End Alert Message -->
                            <!-- start: DYNAMIC TABLE PANEL -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <i class="fa fa-external-link-square"></i>
                                    جدول يحتوي على جميع المستخدمين
                                </div>
                                <div class="panel-body">
                                    <table class="table table-striped table-bordered table-hover table-full-width" id="users">
                                        <thead>
                                            <tr>
                                                <th class="hidden-xs">إسم المستخدم</th>
                                                <th class="hidden-xs">الإسم بالكامل</th>
                                                <th class="hidden-xs">البريد الإلكتروني</th>
                                                <th class="hidden-xs">الموبايل</th>
                                                <th class="hidden-xs">نوع الحساب</th>
                                                <th>قائمة المهام</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- end: DYNAMIC TABLE PANEL -->

                            <!-- start: REMOVE ARTICLE MODAL FORM -->
                            <div class="modal fade" id="block_user" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                                &times;
                                            </button>
                                            <h4 class="modal-title">تعطيل حساب المستخدم</h4>
                                            <span class="modal-logo"></span>
                                        </div>
                                        <div class="modal-body">
                                            <p>هل تريد بالتأكيد تعطيل حساب المستخدم ؟</p>
                                            <p class="required">لن يستطيع المستخدم الوصول لحسابة في حال تم تعطيلة</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">
                                                إغلاق
                                            </button>
                                            <button type="button" onclick="block_account()" class="btn btn-primary">
                                                موافق
                                            </button>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->
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
        <script src="<?= base_url('assets/back_end/plugins/bootbox/bootbox.min.js') ?>"></script>
        <script src="<?= base_url('assets/back_end/plugins/select2/select2.min.js') ?>"></script>
        <script src="<?= base_url('assets/back_end/plugins/jquery-mockjax/jquery.mockjax.js') ?>"></script>
        <script src="<?= base_url('assets/back_end/plugins/DataTables/media/js/jquery.dataTables.min.js') ?>"></script>
        <script src="<?= base_url('assets/back_end/plugins/DataTables/media/js/DT_bootstrap.js') ?>"></script>
        <script src="<?= base_url('assets/back_end/js/table-data.js') ?>"></script>
        <!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
        <script>
                                                jQuery(document).ready(function () {
                                                    runDataTable();
                                                    Main.init();
//                TableData.init();
//                FormValidator.init();
                                                    //function to initiate bootstrap-datepicker
                                                });

                                                function block_account(user_id, status) {
                                                    $.ajax({
                                                        type: "POST",
                                                        url: '<?php echo base_url() . "admin/users/block_account/"; ?>',
                                                        data: {
                                                            user_id: user_id,
                                                            status: status
                                                        },
                                                        dataType: "json",
                                                        success: function (json) {
                                                            if (json['status'] == true) {
                                                                $('#status').removeClass().addClass('alert alert-success');
                                                                $('#message').html(json['msg']);
                                                                runDataTable();
                                                            } else if (json['status'] == false) {
                                                                $('#status').removeClass().addClass('alert alert-danger');
                                                                $('#message').html(json['msg']);
                                                            }
                                                        }, complete: function () {
//                                                    App.scrollTo();
                                                        }, error: function () {
                                                            $('#status').removeClass().addClass('alert alert-danger');
                                                            $('#message').text("هناك خطأ في تخزين البيانات");
                                                        }
                                                    });
                                                }

                                                var runDataTable = function () {
                                                    var oTable = $('#users').dataTable({
                                                        "sPaginationType": "bootstrap",
                                                        "bProcessing": true,
                                                        "bServerSide": true,
                                                        "sAjaxSource": '<?php echo base_url(); ?>admin/users/get_all_users/',
                                                        "iDisplayStart ": 10,
                                                        "oLanguage": {
                                                            "sProcessing": "<img src='<?php echo base_url('assets/back_end/images/loading.gif'); ?>'>"
                                                        },
                                                        'fnServerData': function (sSource, aoData, fnCallback)
                                                        {
                                                            $.ajax
                                                                    ({
                                                                        'dataType': 'json',
                                                                        'type': 'POST',
                                                                        'url': sSource,
                                                                        'data': aoData,
                                                                        'success': fnCallback
                                                                    });
                                                        }, "bSort": false,
                                                        "bDestroy": true
                                                    });
                                                };
        </script>
    </body>
    <!-- end: BODY -->
</html>