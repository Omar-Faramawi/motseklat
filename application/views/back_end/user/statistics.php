<!DOCTYPE html>
<!--[if IE 8]><html class="ie8 no-js" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9 no-js" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html lang="ar" class="no-js">
    <!--<![endif]-->
    <!-- start: HEAD -->
    <head>
        <title>Motseklat.com - إحصائيات</title>
        <!-- start: META -->
        <meta charset="utf-8" />
        <!--[if IE]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="description" content="تصفح أحدث المقالات في عالم المتسيكلات، أو اعرض دراجتك النارية للبيع على موتسيكلات ، كما تستطيع الضغط على الدراجة النارية التى تود شرائها للاطلاع على كافة التفاصيل والمواصفات والسعر الخاص بها، وكذلك مشاهدة صورها المعروضة .. أو اجراء بحث متقدم لعرض المزيد والمزيد من النتائج. ">
        <meta name="keywords" content="قطع غيار,أمن وسلامه,معدات, أحداث, سباق, ترفية, شراء متسيكل, العربي, الوطن العربي, تجار, وكلاء, عروضات, دراجات, دراجات نارية, متسيكلات">
        <meta name="author" content="<?= $this->config->item('auther') ?>">
        <meta name="coder" content="<?= $this->config->item('coder') ?>">
        <meta name="copyright" content="<?= $this->config->item('copyright') ?>">
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
                            <!-- start: PAGE TITLE & BREADCRUMB -->
                            <ol class="breadcrumb">
                                <li>
                                    <i class="clip-home-3"></i>
                                    <a href="<?= base_url('home') ?>">
                                        الرئيسية
                                    </a>
                                </li>
                                <li class="active">
                                    إحصائيات
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
                        <div class="col-sm-4">
                            <div class="core-box">
                                <div class="heading">
                                    <i class="clip-database circle-icon circle-green"></i>
                                    <h2>إدارة الإعلانات</h2>
                                </div>
                                <div class="content">
                                    تحتوي على جميع الإعلانات التي قمت بإضافتها وتفاصيل كل إعلان على حدا وإمكانية التعديل عليها
                                </div>
                                <a class="view-more" href="<?= base_url('user/profile/my_bikes') ?>">
                                    مشاهدة الإعلانات <i class="clip-arrow-right-2"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="core-box">
                                <div class="heading">
                                    <i class="clip-grid circle-icon circle-teal"></i>
                                    <h2>إدارة العروض</h2>
                                </div>
                                <div class="content">
                                    تحتوي على جميع الإعلانات التي قمت بعمل عروض عليها كما وتحتوي على تفاصيل كل عرض على حدا
                                </div>
                                <a class="view-more" href="<?= base_url('user/profile/my_offers') ?>">
                                    مشاهدة العروضات <i class="clip-arrow-right-2"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="core-box">
                                <div class="heading">
                                    <i class="clip-paperclip circle-icon circle-bricky"></i>
                                    <h2>إضافة دراجة نارية</h2>
                                </div>
                                <div class="content">
                                    يمكنك إضافة بيانات لإعلان دراجة نارية وإضافة كافة التفاصيل الخاصة بالإعلان 
                                </div>
                                <a class="view-more" href="<?= base_url('user/profile/add_bike') ?>">
                                    الذهاب للصفحة <i class="clip-arrow-right-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <i class="clip-pie"></i>
                                            عدد الدراجات النارية بالنسبة للشركات
                                        </div>
                                        <div class="panel-body">
                                            <div class="flot-mini-container">
                                                <div id="placeholder-h2" class="flot-placeholder"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <i class="clip-pie"></i>
                                            عدد المشاهدين والمهتمين لإعلانات الداراجات النارية
                                        </div>
                                        <div class="panel-body">
                                            <table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
                                                <thead>
                                                    <tr>
                                                        <th class="hidden-xs">عنوان الإعلان</th>
                                                        <th class="hidden-xs">المشاهدين</th>
                                                        <th class="hidden-xs">المهتمين</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <i class="clip-pie"></i>
                                            عدد المشاهدين والمهتمين للإعلانات الأخرى
                                        </div>
                                        <div class="panel-body">
                                            <table class="table table-striped table-bordered table-hover table-full-width" id="sample_2">
                                                <thead>
                                                    <tr>
                                                        <th class="hidden-xs">عنوان الإعلان</th>
                                                        <th class="hidden-xs">المشاهدين</th>
                                                        <th class="hidden-xs">المهتمين</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
        <script src="<?= base_url('assets/back_end/js/custom.js') ?>"></script>
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <!-- end: MAIN JAVASCRIPTS -->
        <!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
        <script src="<?= base_url('assets/back_end/plugins/flot/jquery.flot.js') ?>"></script>
        <script src="<?= base_url('assets/back_end/plugins/flot/jquery.flot.pie.js') ?>"></script>
        <script src="<?= base_url('assets/back_end/plugins/flot/jquery.flot.resize.min.js') ?>"></script>
        <script src="<?= base_url('assets/back_end/plugins/jquery.sparkline/jquery.sparkline.js') ?>"></script>
        <script src="<?= base_url('assets/back_end/plugins/jquery-easy-pie-chart/jquery.easy-pie-chart.js') ?>"></script>
        <script src="<?= base_url('assets/back_end/plugins/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js') ?>"></script>
        <script src="<?= base_url('assets/back_end/plugins/DataTables/media/js/jquery.dataTables.min.js') ?>"></script>
        <script src="<?= base_url('assets/back_end/plugins/DataTables/media/js/DT_bootstrap.js') ?>"></script>
        <script src="<?= base_url('assets/back_end/js/index.js') ?>"></script>
        <!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
        <script>
            jQuery(document).ready(function () {
                Main.init();
                runDataTable();
                runDataTable2();
                Index.init();
            });

            var runDataTable = function () {
                var oTable = $('#sample_1').dataTable({
                    "sPaginationType": "bootstrap",
                    "bProcessing": true, "bServerSide": true,
                    "sAjaxSource": '<?php echo base_url("user/profile/get_bikes_views_interested/"); ?>',
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
            var runDataTable2 = function () {
                var oTable = $('#sample_2').dataTable({
                    "sPaginationType": "bootstrap",
                    "bProcessing": true, "bServerSide": true,
                    "sAjaxSource": '<?php echo base_url("user/profile/get_products_views_interested/"); ?>',
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

            $.post('<?= base_url('user/profile/get_bikes_statistics') ?>', null, function (data) {
                var data_pie = [];
                $.each(data.manufacturers, function (index, element) {
                    data_pie[index] = {
                        label: element.name + (element.manufacturer_bikes),
                        data: element.manufacturer_bikes
                    }
                });
                runChart2(data_pie);
            }, "json");

            function runChart2(data_pie) {
                $.plot('#placeholder-h2', data_pie, {
                    series: {
                        pie: {
                            show: true,
                            radius: 1,
                            tilt: 0.5,
                            label: {
                                show: true,
                                radius: 1,
                                formatter: labelFormatter,
                                background: {
                                    opacity: 0.8
                                }
                            },
                            combine: {
                                color: '#999',
                                threshold: 0.1
                            }
                        }
                    },
                    legend: {
                        show: false
                    }
                });

                function labelFormatter(label, series) {
                    return "<div style='font-size:8pt; text-align:center; padding:2px; color:white;'>" + label + "<br/>" + Math.round(series.percent) + "%</div>";
                }
            }
        </script>
    </body>
    <!-- end: BODY -->
</html>