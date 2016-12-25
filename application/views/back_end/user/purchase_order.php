<!DOCTYPE html>
<!--[if IE 8]><html class="ie8 no-js" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9 no-js" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html lang="ar" class="no-js">
    <!--<![endif]-->
    <!-- start: HEAD -->
    <head>
        <title>Motseklat.com - طلب شراء</title>
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
        <link rel="stylesheet" href="<?= base_url('assets/back_end/plugins/select2/select2.css') ?>">
        <link rel="stylesheet" href="<?= base_url('assets/back_end/plugins/bootstrap-fileupload/bootstrap-fileupload.min.css') ?>">
        <link rel="stylesheet" href="<?= base_url('assets/back_end/plugins/jQRangeSlider/css/classic-min.css') ?>">
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
                                    تقديم طلب شراء
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
                            <!-- start: FORM VALIDATION 1 PANEL -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <i class="fa fa-external-link-square"></i>
                                    يمكنك تقديم طلب شراء
                                </div>
                                <div class="panel-body">
                                    <h2><i class="fa fa-pencil-square teal"></i> تقديم طلب شراء</h2>
                                    <hr>
                                    <form action="#" enctype="multipart/form-data" role="form" id="purchase_order">
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
                                                        عنوان الإعلان<span class="symbol required"></span>
                                                    </label>
                                                    <input type="text" class="form-control" name="title">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="control-label">
                                                        الشركة المصنعة - الماركة <span class="symbol required"></span>
                                                    </label>
                                                    <select id="manufacturer_id" name="manufacturer_id" class="form-control search-select">
                                                        <option>-- الشركة المصنعة --</option>
                                                        <?php
                                                        foreach ($manufacturers as $manufacturer) {
                                                            echo '<option value="' . $manufacturer->id . '">' . $manufacturer->name . '</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="control-label">
                                                        الموديل<span class="symbol required"></span>
                                                    </label>
                                                    <select id="model_id" name="model_id" class="form-control search-select">
                                                        <option>-- الموديل  --</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="control-label">
                                                        الحالة
                                                    </label>
                                                    <select name="status" class="form-control search-select">
                                                        <option value="">الكل</option>
                                                        <option value="1">جديد</option>
                                                        <option value="2" selected="selected">مستعمل</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="control-label">
                                                        العملة<span class="symbol required"></span>
                                                    </label>
                                                    <select id="currency_id" name="currency_id" class="form-control search-select">
                                                        <option>-- العملة  --</option>
                                                        <?php
                                                        foreach ($currencies as $currency) {
                                                            echo '<option value="' . $currency->id . '">' . $currency->currency_name . '</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="control-label">
                                                    السعر متراوح مابين <span class="symbol required"></span>
                                                </label>
                                                <div class="example">
                                                    <div id="purchase_order_price" name="price" class="slider-teal"></div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="control-label">
                                                    تاريخ الصنع<span class="symbol required"></span>
                                                </label>
                                                <div class="example">
                                                    <div id="production_date" name="production_date" class="slider-teal"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">
                                                        تفاصيل الطلب <span class="symbol required"></span>
                                                    </label>
                                                    <textarea name="description" class="autosize form-control" id="form-field-24" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 69px;"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-8">
                                            </div>
                                            <div class="col-md-4">
                                                <span class="loader-img"><img src="<?php echo base_url('assets/back_end/images/loader-large.gif'); ?>" /><span>جاري تحميل الصور الرجاء الإنتظار قليلاً...</span></span>
                                                <button id="submit-btn" class="btn btn-info btn-block" type="submit">
                                                    تقديم الطلب  <i class="fa fa-edit"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- start 728X90 ad -->
                                    <?php $this->load->view('back_end/user/ads/wide_728x90'); ?>
                                    <!-- end 728X90 ad -->
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
        <script src="<?= base_url('assets/back_end/js/custom.js') ?>"></script>
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <!-- end: MAIN JAVASCRIPTS -->
        <!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
        <script src="<?= base_url('assets/back_end/plugins/select2/select2.min.js') ?>"></script>
        <script src="<?= base_url('assets/back_end/plugins/autosize/jquery.autosize.min.js') ?>"></script>
        <script src="<?= base_url('assets/back_end/plugins/bootstrap-fileupload/bootstrap-fileupload.min.js') ?>"></script>
        <script src="<?= base_url('assets/back_end/plugins/summernote/build/summernote.min.js') ?>"></script>
        <script src="<?= base_url('assets/back_end/plugins/jQRangeSlider/jQAllRangeSliders-min.js') ?>"></script>
        <script src="<?= base_url('assets/back_end/js/ui-sliders.js') ?>"></script>
        <!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
        <script>
            jQuery(document).ready(function () {
                Main.init();
                runSelect2();
                UISliders.init();
//                FormValidator.init();
                //function to initiate bootstrap-datepicker
            });

            //function to initiate Select2
            var runSelect2 = function () {
                $(".search-select").select2({
                    placeholder: "إختر السنة",
                    allowClear: true
                });
            };

            $("#purchase_order").submit(function () {
                $('.loader-img').show();
                $('#submit-btn').hide();
                var formData = new FormData($(this)[0]);
                var production_date = $('#production_date .ui-rangeSlider-leftLabel .ui-rangeSlider-label-value').text()+'-'+$('#production_date .ui-rangeSlider-rightLabel .ui-rangeSlider-label-value').text()
                var price = $('#purchase_order_price .ui-rangeSlider-leftLabel .ui-rangeSlider-label-value').text()+'-'+$('#purchase_order_price .ui-rangeSlider-rightLabel .ui-rangeSlider-label-value').text()
                formData.append('price' , price);
                formData.append('production_date' , production_date);
                $.ajax({
                    url: '<?php echo base_url() . "user/profile/do_purchase_order/"; ?>',
                    type: 'POST',
                    data: formData,
                    dataType: "JSON",
                    success: function (json) {
                        if (json['status'] == true) {
                            $('#status').removeClass().addClass('alert alert-success');
                            $('#message').html(json['msg']);
                            $('#purchase_order')[0].reset();
                        } else if (json['status'] == false) {
                            $('#status').removeClass().addClass('alert alert-danger');
                            $('#message').html(json['msg']);
                        }
                    }, complete: function () {
                        jQuery('html,body').animate({
                            scrollTop: 0
                        }, 'slow');
                        $('.loader-img').hide();
                        $('#submit-btn').show();
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

            $('#purchase_order #manufacturer_id').change(function () {
                $('#purchase_order #model_id').empty();
                $.post('<?php echo base_url('user/profile/get_models_by_manufacturer/') ?>', {"manufacturer_id": $('#purchase_order #manufacturer_id').val()}, function (data) {
                    $.each(data.models, function (index, element) {
                        $('#purchase_order #model_id').append('<option value="' + element.id + '">' + element.name + '</option>');
                    });
                }, "json");
            });
        </script>
    </body>
    <!-- end: BODY -->
</html>