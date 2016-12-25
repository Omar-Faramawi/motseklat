<!DOCTYPE html>
<!--[if IE 8]><html class="ie8 no-js" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9 no-js" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html lang="ar" class="no-js">
    <!--<![endif]-->
    <!-- start: HEAD -->
    <head>
        <title>Motseklat.com - إضافة إعلان جديد</title>
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
        <link rel="stylesheet" href="<?= base_url('assets/back_end/plugins/bootstrap-fileupload/bootstrap-fileupload.min.css') ?>">
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
                        <!-- logo start -->
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
                                    <a href="<?=base_url('home')?>">
                                        الرئيسية
                                    </a>
                                </li>
                                <li class="active">
                                    إضافة إعلان جديد
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
                                    يمكنك إضافة إعلان جديد
                                </div>
                                <div class="panel-body">
                                    <h2><i class="fa fa-pencil-square teal"></i> إضافة إعلان على دراجة نارية</h2>
                                    <hr>
                                    <form action="#" enctype="multipart/form-data" role="form" id="add_bike">
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
                                                        الحالة<span class="symbol required"></span>
                                                    </label>
                                                    <select name="bike_status" class="form-control search-select">
                                                        <option value="1">جديد</option>
                                                        <option value="2" selected="selected">مستعمل</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="control-label">
                                                        اللون (تقريبي)<span class="symbol required"></span>
                                                    </label>
                                                    <select name="color" class="form-control search-select">
                                                        <option value="">&nbsp;</option>
                                                        <option value="0">غير ذلك</option>
                                                        <option value="1">أزرق</option>
                                                        <option value="2">أحمر</option>
                                                        <option value="3">أسود</option>
                                                        <option value="4">رمادي</option>
                                                        <option value="5">أبيض</option>
                                                        <option value="6">برتقالي</option>
                                                        <option value="7">ذهبي</option>
                                                        <option value="8">فضي</option>
														<option value="9">أخضر</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="control-label">
                                                        عدد الكيلومترات<span class="symbol required"></span>
                                                    </label>
                                                    <input type="text" class="form-control" name="mileage">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="control-label">
                                                        تاريخ الصنع<span class="symbol required"></span>
                                                    </label>
                                                    <select name="production_date" class="form-control search-select">
                                                        <option value="">&nbsp;</option>
                                                        <option value="2015">2015</option>
                                                        <option value="2014">2014</option>
                                                        <option value="2013">2013</option>
                                                        <option value="2012">2012</option>
                                                        <option value="2011">2011</option>
                                                        <option value="2010">2010</option>
                                                        <option value="2009">2009</option>
                                                        <option value="2008">2008</option>
                                                        <option value="2007">2007</option>
                                                        <option value="2006">2006</option>
                                                        <option value="2005">2005</option>
                                                        <option value="2004">2004</option>
                                                        <option value="2003">2003</option>
                                                        <option value="2002">2002</option>
                                                        <option value="2001">2001</option>
                                                        <option value="2000">2000</option>
                                                        <option value="1999">1999</option>
                                                        <option value="1998">1998</option>
                                                        <option value="1997">1997</option>
                                                        <option value="1996">1996</option>
                                                        <option value="1995">1995</option>
                                                        <option value="1994">1994</option>
                                                        <option value="1993">1993</option>
                                                        <option value="1992">1992</option>
                                                        <option value="1991">1991</option>
                                                        <option value="1990">1990</option>
                                                        <option value="1989">1989</option>
                                                        <option value="1988">1988</option>
                                                        <option value="1987">1987</option>
                                                        <option value="1986">1986</option>
                                                        <option value="1985">1985</option>
                                                        <option value="1984">1984</option>
                                                        <option value="1983">1983</option>
                                                        <option value="1982">1982</option>
                                                        <option value="1981">1981</option>
                                                        <option value="1980">1980</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="control-label">
                                                        السعر المطلوب<span class="symbol required"></span>
                                                    </label>
                                                    <input type="text" class="form-control" name="price">
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
                                                <div class="form-group col-md-6">
                                                    <label class="control-label">
                                                        سعة المحرك<span class="symbol required"></span>
                                                    </label>
                                                    <select class="form-control search-select" name="engine">
                                                        <option value="">-- سعة المحرك --</option>
                                                        <?php foreach ($engines as $engine) { ?>
                                                            <option value="<?= $engine->id ?>"><?= $engine->capacity ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="control-label">
                                                        المدينة  <span class="symbol required"></span>
                                                    </label>
                                                    <select name="city_id" id="city_id" class="form-control search-select">
                                                        <option value="">-- المدينة --</option>
                                                        <?php foreach ($cities as $city) { ?>
                                                            <option value="<?= $city->id ?>"><?= $city->name ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="col-md-12">
                                                    قم بإختيار صور الإعلان <span class="text-danger">(حجم الصورة الواحدة يجب أن لايتجاوز ال 1ميغا)</span>
                                                </label>
                                                <div  class="fileupload fileupload-new col-md-6" data-provides="fileupload">
                                                    <div class="fileupload-new thumbnail"><img class="upload-pic-1" /></div>
                                                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                                    <div>
                                                        <span class="btn btn-light-grey btn-file"><span class="fileupload-new"><i class="fa fa-picture-o"></i> إختيار صورة</span><span class="fileupload-exists"><i class="fa fa-picture-o"></i> تغيير</span>
                                                            <input name="bike_picture_1" type="file">
                                                        </span>
                                                        <a href="#" class="btn fileupload-exists btn-light-grey" data-dismiss="fileupload">
                                                            <i class="fa fa-times"></i> حذف
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="fileupload fileupload-new col-md-6" data-provides="fileupload">
                                                    <div class="fileupload-new thumbnail"><img class="upload-pic-2" />
                                                    </div>
                                                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                                    <div>
                                                        <span class="btn btn-light-grey btn-file"><span class="fileupload-new"><i class="fa fa-picture-o"></i> إختيار صورة</span><span class="fileupload-exists"><i class="fa fa-picture-o"></i> تغيير</span>
                                                            <input name="bike_picture_2" type="file">
                                                        </span>
                                                        <a href="#" class="btn fileupload-exists btn-light-grey" data-dismiss="fileupload">
                                                            <i class="fa fa-times"></i> حذف
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="fileupload fileupload-new col-md-6" data-provides="fileupload">
                                                    <div class="fileupload-new thumbnail"><img class="upload-pic-2" />
                                                    </div>
                                                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                                    <div>
                                                        <span class="btn btn-light-grey btn-file"><span class="fileupload-new"><i class="fa fa-picture-o"></i> إختيار صورة</span><span class="fileupload-exists"><i class="fa fa-picture-o"></i> تغيير</span>
                                                            <input name="bike_picture_3" type="file">
                                                        </span>
                                                        <a href="#" class="btn fileupload-exists btn-light-grey" data-dismiss="fileupload">
                                                            <i class="fa fa-times"></i> حذف
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="fileupload fileupload-new col-md-6" data-provides="fileupload">
                                                    <div class="fileupload-new thumbnail"><img class="upload-pic-2" />
                                                    </div>
                                                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                                    <div>
                                                        <span class="btn btn-light-grey btn-file"><span class="fileupload-new"><i class="fa fa-picture-o"></i> إختيار صورة</span><span class="fileupload-exists"><i class="fa fa-picture-o"></i> تغيير</span>
                                                            <input name="bike_picture_4" type="file">
                                                        </span>
                                                        <a href="#" class="btn fileupload-exists btn-light-grey" data-dismiss="fileupload">
                                                            <i class="fa fa-times"></i> حذف
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">
                                                        تفاصيل الإعلان <span class="symbol required"></span>
                                                    </label>
                                                    <textarea name="description" class="autosize form-control" id="form-field-24" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 69px;"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-8">
                                            </div>
                                            <div class="col-md-4">
                                                <span class="loader-img"><img src="<?php echo base_url('assets/back_end/images/loader-large.gif');?>" /><span>جاري تحميل الصور الرجاء الإنتظار قليلاً...</span></span>
                                                <button id="submit-btn" class="btn btn-info btn-block" type="submit">
                                                    حفظ الإعلان <i class="fa fa-edit"></i>
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
        <!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
        <script>
            jQuery(document).ready(function () {
                Main.init();
                runSelect2();
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

            $("#add_bike").submit(function () {
                $('.loader-img').show();
                $('#submit-btn').hide();
                var formData = new FormData($(this)[0]);
                $.ajax({
                    url: '<?php echo base_url() . "user/profile/do_add_bike/"; ?>',
                    type: 'POST',
                    data: formData,
                    dataType: "JSON",
                    success: function (json) {
                        if (json['status'] == true) {
                            $('#status').removeClass().addClass('alert alert-success');
                            $('#message').html(json['msg']);
                            $('#add_bike')[0].reset();
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

            $('#add_bike #manufacturer_id').change(function () {
                $('#add_bike #model_id').empty();
                $.post('<?php echo base_url('user/profile/get_models_by_manufacturer/') ?>', {"manufacturer_id": $('#add_bike #manufacturer_id').val()}, function (data) {
                    $.each(data.models, function (index, element) {
                        $('#add_bike #model_id').append('<option value="' + element.id + '">' + element.name + '</option>');
                    });
                }, "json");
            });
        </script>
    </body>
    <!-- end: BODY -->
</html>