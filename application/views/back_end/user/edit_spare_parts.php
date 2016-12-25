<!DOCTYPE html>
<!--[if IE 8]><html class="ie8 no-js" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9 no-js" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html lang="ar" class="no-js">
    <!--<![endif]-->
    <!-- start: HEAD -->
    <head>
        <title>Motseklat.com - تعديل بيانات قطع الغيار</title>
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
                                    <a href="<?=base_url('home')?>">
                                        قطع الغيار
                                    </a>
                                </li>
                                <li class="active">
                                    تعديل بيانات قطع الغيار
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
                                    يمكنك تعديل بيانات قطع الغيار
                                </div>
                                <div class="panel-body">
                                    <h2><i class="fa fa-pencil-square teal"></i> تعديل قطع الغيار</h2>
                                    <hr>
                                    <form action="#" enctype="multipart/form-data" role="form" id="edit_spare_part">
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
                                                    <input type="text" class="form-control" name="title" value="<?= $product->title ?>" />
                                                    <input type="hidden" name="id" value="<?= $product->id ?>" />
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="control-label">
                                                        الشركة المصنعة - الماركة <span class="symbol required"></span>
                                                    </label>
                                                    <select id="manufacturer_id" name="manufacturer_id" class="form-control search-select">
                                                        <option>-- الشركة المصنعة --</option>
                                                        <?php foreach ($manufacturers as $manufacturer) { ?>
                                                            <option <?php
                                                            if (!(strcmp($manufacturer->id, $product->manufacturer_id))) {
                                                                echo "selected=\"selected\"";
                                                            }
                                                            ?> value="<?= $manufacturer->id ?>"><?= $manufacturer->name ?></option>
                                                            <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="control-label">
                                                        الموديل<span class="symbol required"></span>
                                                    </label>
                                                    <select id="model_id" name="model_id" class="form-control search-select">
                                                        <option>-- الموديل  --</option>
                                                        <?php foreach ($models as $model) { ?>
                                                            <option <?php
                                                            if (!(strcmp($product->model_id, $model->id))) {
                                                                echo "selected=\"selected\"";
                                                            }
                                                            ?> value="<?= $model->id ?>"><?= $model->name ?></option>
                                                            <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="control-label">
                                                        الحالة<span class="symbol required"></span>
                                                    </label>
                                                    <select name="product_status" class="form-control search-select">
                                                        <option <?php
                                                        if (!(strcmp($product->product_status, 1))) {
                                                            echo "selected=\"selected\"";
                                                        }
                                                        ?> value="1">جديد</option>
                                                        <option <?php
                                                        if (!(strcmp($product->product_status, 2))) {
                                                            echo "selected=\"selected\"";
                                                        }
                                                        ?> value="2">مستعمل</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="control-label">
                                                        السعر المطلوب<span class="symbol required"></span>
                                                    </label>
                                                    <input type="text" class="form-control" name="price" value="<?= $product->price ?>">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="control-label">
                                                        العملة<span class="symbol required"></span>
                                                    </label>
                                                    <select id="currency_id" name="currency_id" class="form-control search-select">
                                                        <option>--  العملة --</option>
                                                        <?php foreach ($currencies as $currency) { ?>
                                                            <option <?php
                                                            if (!(strcmp($currency->id, $product->currency_id))) {
                                                                echo "selected=\"selected\"";
                                                            }
                                                            ?> value="<?= $currency->id ?>"><?= $currency->currency_name ?></option>
                                                            <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="control-label">
                                                        المدينة  <span class="symbol required"></span>
                                                    </label>
                                                    <select name="city_id" id="city_id" class="form-control search-select">
                                                        <?php foreach ($cities as $city) { ?>
                                                            <option <?php
                                                            if (!(strcmp($product->city_id, $city->id))) {
                                                                echo "selected=\"selected\"";
                                                            }
                                                            ?> value="<?= $city->id ?>"><?= $city->name ?></option>
                                                            <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="control-label">
                                                        نوع القطعة <span class="symbol required"></span>
                                                    </label>
                                                    <select id="type_id" name="type_id" class="form-control search-select">
                                                        <option>-- نوع القطعة--</option>
                                                        <?php foreach ($products_types as $type) { ?>
                                                            <option <?php
                                                            if (!(strcmp($product->type_id, $type->id))) {
                                                                echo "selected=\"selected\"";
                                                            }
                                                            ?> value="<?= $type->id ?>"><?= $type->name ?></option>
                                                            <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="col-md-12">
                                                    قم بإختيار صور الإعلان
                                                </label>
                                                <div  class="fileupload fileupload-new col-md-6 alert-info" data-provides="fileupload">
                                                    <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="<?= ($product->product_picture_1) ? base_url('uploads/products/thumbs/' . $product->product_picture_1) : base_url('assets/back_end/images/upload-pic-1.png') ?>" alt="<?= $product->title ?>"/>
                                                    </div>
                                                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                                    <div>
                                                        <span class="btn btn-light-grey btn-file"><span class="fileupload-new"><i class="fa fa-picture-o"></i> إختيار صورة</span><span class="fileupload-exists"><i class="fa fa-picture-o"></i> تغيير</span>
                                                            <input name="product_picture_1" type="file">
                                                        </span>
                                                        <a href="#" class="btn fileupload-exists btn-light-grey" data-dismiss="fileupload">
                                                            <i class="fa fa-times"></i> حذف
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="fileupload fileupload-new col-md-6" data-provides="fileupload">
                                                    <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="<?= ($product->product_picture_2) ? base_url('uploads/products/thumbs/' . $product->product_picture_2) : base_url('assets/back_end/images/upload-pic-2.png') ?>" alt="<?= $product->title ?>"/>
                                                    </div>
                                                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                                    <div>
                                                        <span class="btn btn-light-grey btn-file"><span class="fileupload-new"><i class="fa fa-picture-o"></i> إختيار صورة</span><span class="fileupload-exists"><i class="fa fa-picture-o"></i> تغيير</span>
                                                            <input name="product_picture_2" type="file">
                                                        </span>
                                                        <a href="#" class="btn fileupload-exists btn-light-grey" data-dismiss="fileupload">
                                                            <i class="fa fa-times"></i> حذف
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="fileupload fileupload-new col-md-6" data-provides="fileupload">
                                                    <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="<?= ($product->product_picture_3) ? base_url('uploads/products/thumbs/' . $product->product_picture_3) : base_url('assets/back_end/images/upload-pic-2.png') ?>" alt="<?= $product->title ?>"/>
                                                    </div>
                                                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                                    <div>
                                                        <span class="btn btn-light-grey btn-file"><span class="fileupload-new"><i class="fa fa-picture-o"></i> إختيار صورة</span><span class="fileupload-exists"><i class="fa fa-picture-o"></i> تغيير</span>
                                                            <input name="product_picture_3" type="file">
                                                        </span>
                                                        <a href="#" class="btn fileupload-exists btn-light-grey" data-dismiss="fileupload">
                                                            <i class="fa fa-times"></i> حذف
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="fileupload fileupload-new col-md-6" data-provides="fileupload">
                                                    <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="<?= ($product->product_picture_4) ? base_url('uploads/products/thumbs/' . $product->product_picture_4) : base_url('assets/back_end/images/upload-pic-2.png') ?>" alt="<?= $product->title ?>"/>
                                                    </div>
                                                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                                    <div>
                                                        <span class="btn btn-light-grey btn-file"><span class="fileupload-new"><i class="fa fa-picture-o"></i> إختيار صورة</span><span class="fileupload-exists"><i class="fa fa-picture-o"></i> تغيير</span>
                                                            <input name="product_picture_4" type="file">
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
                                                    <textarea class="autosize form-control" id="description" name="description" cols="10" rows="4"><?= $product->description ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-8">
                                            </div>
                                            <div class="col-md-4">
                                                <span class="loader-img"><img src="<?php echo base_url('assets/back_end/images/loader-large.gif'); ?>" /><span>جاري تحميل الصور الرجاء الإنتظار قليلاً...</span></span>
                                                <button id="submit-btn" class="btn btn-info btn-block" type="submit">
                                                    حفظ التعديلات <i class="fa fa-edit"></i>
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
        <script src="<?= base_url('assets/back_end/plugins/bootstrap-fileupload/bootstrap-fileupload.min.js') ?>"></script>
        <script src="<?= base_url('assets/back_end/plugins/summernote/build/summernote.min.js') ?>"></script>
        <script src="<?= base_url('assets/back_end/plugins/ckeditor/ckeditor.js') ?>"></script>
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

            $("#edit_spare_part").submit(function () {
                $('.loader-img').show();
                $('#submit-btn').hide();
                var formData = new FormData($(this)[0]);
                $.ajax({
                    url: '<?php echo base_url() . "user/profile/do_edit_spare_part/"; ?>',
                    type: 'POST',
                    data: formData,
                    dataType: "JSON",
                    success: function (json) {
                        if (json['status'] == true) {
                            $('#status').removeClass().addClass('alert alert-success');
                            $('#message').html(json['msg']);
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

            $('#edit_spare_part #manufacturer_id').change(function () {
                $('#add_bike #model_id').empty();
                $.post('<?php echo base_url('user/profile/get_models_by_manufacturer/') ?>', {"manufacturer_id": $('#edit_spare_part #manufacturer_id').val()}, function (data) {
                    $.each(data.models, function (index, element) {
                        $('#edit_spare_part #model_id').append('<option value="' + element.id + '">' + element.name + '</option>');
                    });
                }, "json");
            });
        </script>
    </body>
    <!-- end: BODY -->
</html>