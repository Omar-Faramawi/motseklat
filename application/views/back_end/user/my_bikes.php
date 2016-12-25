<!DOCTYPE html>
<!--[if IE 8]><html class="ie8 no-js" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9 no-js" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html lang="ar" class="no-js">
    <!--<![endif]-->
    <!-- start: HEAD -->
    <head>
        <title>Motseklat.com - إعلاناتي</title>
        <!-- start: META -->
        <meta charset="utf-8" />
        <!--[if IE]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="description" content="تصفح أحدث المقالات في عالم المتسيكلات، أو اعرض دراجتك النارية للبيع على موتسيكلات ، كما تستطيع الضغط على الدراجة النارية التى تود شرائها للاطلاع على كافة التفاصيل والمواصفات والسعر الخاص بها، وكذلك مشاهدة صورها المعروضة .. أو اجراء بحث متقدم لعرض المزيد والمزيد من النتائج. ">
        <meta name="keywords" content="قطع غيار,أمن وسلامه,معدات, أحداث, سباق, ترفية, شراء متسيكل, العربي, الوطن العربي, تجار, وكلاء, عروضات, دراجات, دراجات نارية, متسيكلات">
        <meta name="author" content="<?=$this->config->item('auther')?>">
        <meta name="coder" content="<?=$this->config->item('coder')?>">
        <meta name="copyright" content="<?=$this->config->item('copyright')?>">
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
        <link rel="stylesheet" href="<?= base_url('assets/back_end/plugins/datepicker/css/datepicker.css') ?>">
        <link rel="stylesheet" href="<?= base_url('assets/back_end/plugins/DataTables/media/css/DT_bootstrap.css') ?>">
        <!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
        <link rel="shortcut icon" href="<?php echo base_url('assets/front_end/images/favicon.ico'); ?>">
    </head>
    <!-- end: HEAD -->
    <!-- start: BODY -->
    <body class="rtl">
        <!-- top bar start -->
        <?php $this->load->view('front_end/includes/top-bar'); ?>
        <!-- top bar end -->
        <!-- Header Start -->
        <div id="headWrapper" class="clearfix">
            <!-- Logo, global navigation menu start -->
            <header class="top-head top-head-4">
                <div class="container">
                    <div class="row">
                        <!-- log start -->
                        <?php $this->load->view('back_end/user/includes/logo'); ?>
                        <!-- logo end --> 

                        <!-- top-ads start -->
                        <?php $this->load->view('back_end/user/ads/banner_728x90'); ?>
                        <!-- top-ads end --> 
                    </div>
                </div>
                <!-- top-nav start -->
                <?php $this->load->view('front_end/includes/top-nav'); ?>
                <!-- top-nav end -->
            </header>
            <!-- Logo, Global navigation menu end -->
        </div>
        <!-- Header End -->

        <!-- start: MAIN CONTAINER -->
        <div class="main-container">
            <div class="navbar-content">
                <!-- start: SIDEBAR -->
                <?php $this->load->view('back_end/user/includes/right_sidebar'); ?>
                <!-- end: SIDEBAR -->
            </div>
            <!-- start: PAGE -->
            <div class="main-content">
                <div class="container">
                    <!-- start: PAGE HEADER -->
                    <div class="row">
                        <div class="col-sm-12">
                            <!-- start: STYLE SELECTOR BOX -->
                            <?php // $this->load->view('back_end/user/includes/style_selector'); ?>

                            <!-- end: STYLE SELECTOR BOX -->
                            <!-- start: PAGE TITLE & BREADCRUMB -->
                            <ol class="breadcrumb">
                                <li>
                                    <i class="clip-pencil"></i>
                                    <a href="<?= base_url('home') ?>">
                                        الرئيسية
                                    </a>
                                </li>
                                <li class="active">
                                    إعلاناتي
                                </li>
                            </ol>
                            <div>
                                <?php $this->load->view('back_end/user/ads/wide_responsive'); ?>
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
                                    جدول يحتوي على جميع الإعلانات الخاصة بي
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
                                            <thead>
                                                <tr>
                                                    <th style="width:10%;">صورة الإعلان</th>
                                                    <th style="width: 30%;">العنوان</th>
                                                    <th>تاريخ النشر</th>
                                                    <th style="width: 10%;">المشاهدين</th>
                                                    <th style="width: 10%;">المهتمين</th>
                                                    <th style="width: 10%;">الحالة</th>
                                                    <th>قائمة المهام</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- end: DYNAMIC TABLE PANEL -->

                            <!-- start: REMOVE ARTICLE MODAL FORM -->
                            <div class="modal fade" id="remove_bike" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                                &times;
                                            </button>
                                            <h4 class="modal-title">حذف الإعلان</h4>
                                            <span class="modal-logo"></span>
                                        </div>
                                        <div class="modal-body">
                                            هل تريد بالتأكيد حذف هذاالإعلان  ؟
                                            <p class="text-danger padd-top-15">ملاحظة: سوف يتم حذف جميع العروض والبيانات المتعلقة بهذا الإعلان</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">
                                                إغلاق
                                            </button>
                                            <button type="button" onclick="remove_bike()" class="btn btn-primary">
                                                موافق
                                            </button>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->
                            <!-- start: Add Offer MODAL FORM -->
                            <div class="modal fade" id="add_offer" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                                &times;
                                            </button>
                                            <h4 class="modal-title">إضافة عرض</h4>
                                            <span class="modal-logo"></span>
                                        </div>
                                        <div class="modal-body">
                                            <h5>يمكنك إضافة عرض على الإعلان الحالي</h5>
                                            <form role="form" class="form-horizontal">
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label" for="form-field-1">
                                                        السعر الجديد
                                                    </label>
                                                    <div class="col-sm-5">
                                                        <span class="input-icon">
                                                            <input type="text" placeholder="السعر الجديد" id="offer_price" class="form-control">
                                                            <i class="fa fa-money"></i> 
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label" for="form-field-2">
                                                        تاريخ إنتهاء العرض
                                                    </label>
                                                    <div class="col-sm-5">
                                                        <div class="input-group" style="z-index: 1151 !important;">
                                                            <input type="text" data-date-format="yyyy-mm-dd" data-date-viewmode="years" id="expire_date" class="form-control date-picker">
                                                            <span class="input-group-addon"> <i class="fa fa-calendar"></i> </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">
                                                إغلاق
                                            </button>
                                            <button type="button" onclick="add_offer()" class="btn btn-primary add-btn">
                                                موافق
                                            </button>
                                            <span class="loader-img"><img src="<?php echo base_url('assets/back_end/images/loader-large.gif'); ?>" /></span>
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
        <?php $this->load->view('back_end/user/includes/footer'); ?>
        <!-- end: FOOTER -->
        <!-- start: LEFT SIDEBAR -->
        <?php $this->load->view('back_end/user/includes/left_sidebar'); ?>
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
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <!-- end: MAIN JAVASCRIPTS -->
        <!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
        <script src="<?= base_url('assets/back_end/plugins/bootbox/bootbox.min.js') ?>"></script>
        <script src="<?= base_url('assets/back_end/plugins/select2/select2.min.js') ?>"></script>
        <script src="<?= base_url('assets/back_end/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') ?>"></script>
        <script src="<?= base_url('assets/back_end/plugins/jquery-mockjax/jquery.mockjax.js') ?>"></script>
        <script src="<?= base_url('assets/back_end/plugins/DataTables/media/js/jquery.dataTables.min.js') ?>"></script>
        <script src="<?= base_url('assets/back_end/plugins/DataTables/media/js/DT_bootstrap.js') ?>"></script>
        <script src="<?= base_url('assets/back_end/js/table-data.js') ?>"></script>
        <!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
        <script>
                                                jQuery(document).ready(function () {
                                                    Main.init();
                                                    //TableData.init();
                                                    runDataTable();
                                                    //function to initiate bootstrap-datepicker
                                                    runDatePicker();
                                                });

                                                var runDatePicker = function () {
                                                    $('.date-picker').datepicker({
                                                        autoclose: true
                                                    });
                                                };

                                                var curr_id = null;
                                                function setTarget(bike_id) {
                                                    curr_id = bike_id;
                                                }

                                                function add_offer() {
                                                    $('.loader-img').show();
                                                    $('.add-btn').hide();
                                                    $.ajax({
                                                        type: "POST",
                                                        url: '<?php echo base_url() . "user/profile/do_add_offer/"; ?>',
                                                        data: {
                                                            bike_id: curr_id,
                                                            offer_price: $('#offer_price').val(),
                                                            expire_date: $('#expire_date').val()
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
                                                            $('#add_offer').modal('toggle');
                                                        }, complete: function () {
                                                            //                                                    App.scrollTo();
                                                            $('.loader-img').hide();
                                                            $('.add-btn').show();
                                                        }, error: function () {
                                                            $('#status').removeClass().addClass('alert alert-danger');
                                                            $('#message').text("هناك خطأ في تخزين البيانات");
                                                        }
                                                    });
                                                }

                                                function remove_bike() {
                                                    $.ajax({
                                                        type: "POST",
                                                        url: '<?php echo base_url() . "user/profile/remove_bike/"; ?>',
                                                        data: {
                                                            bike_id: curr_id
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
                                                            $('#remove_bike').modal('toggle');
                                                        }, complete: function () {
                                                            jQuery('html,body').animate({
                                                                scrollTop: 0
                                                            }, 'slow');
                                                        }, error: function () {
                                                            $('#status').removeClass().addClass('alert alert-danger');
                                                            $('#message').text("هناك خطأ في تخزين البيانات");
                                                        }
                                                    });
                                                }


                                                var runDataTable = function () {
                                                    var oTable = $('#sample_1').dataTable({
                                                        "sPaginationType": "bootstrap",
                                                        "bProcessing": true, "bServerSide": true,
                                                        "sAjaxSource": '<?php echo base_url(); ?>user/profile/get_my_bikes/',
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