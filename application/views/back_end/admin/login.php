<!DOCTYPE html>
<!--[if IE 8]><html class="ie8 no-js" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9 no-js" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html lang="ar" class="no-js">
    <!--<![endif]-->
    <!-- start: HEAD -->
    <head>
        <title>Motseklat.com - تسجيل الدخول</title>
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

        <!--[if IE 7]>
        <link rel="stylesheet" href="assets/plugins/font-awesome/css/font-awesome-ie7.min.css">
        <![endif]-->
        <!-- end: MAIN CSS -->
        <!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
        <!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
    </head>
    <!-- end: HEAD -->
    <!-- start: BODY -->
    <body class="login example2 rtl">
        <div class="main-login col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
            <div class="logo">
            </div>
            <!-- start: LOGIN BOX -->
            <div class="box-login" style="display: block;">
                <h3>تسجيل الدخول</h3>
                <form class="form-login" action="#" id="loginform">
                    <!-- Start Alert Message -->
                    <div id="status" class="no-display">
                        <span id="message"></span>
                    </div>
                    <!-- End Alert Message -->
                    <fieldset>
                        <div class="form-group">
                            <span class="input-icon input-icon-right">
                                <input type="text" class="form-control" name="username" id="username" placeholder="إسم المستخدم">
                                <i class="fa fa-user"></i> </span>
                            <!-- To mark the incorrectly filled input, you must add the class "error" to the input -->
                            <!-- example: <input type="text" class="login error" name="login" value="Username" /> -->
                        </div>
                        <div class="form-group form-actions">
                            <span class="input-icon input-icon-right">
                                <input type="password" class="form-control password" name="password" id="password" placeholder="كلمة المرور">
                                <i class="fa fa-lock"></i>
                                <a class="forgot" href="?box=forgot">
                                    نسيت كلمة المرور
                                </a> </span>
                        </div>
                        <div class="form-actions">
                            <label for="remember" class="checkbox-inline">
                                <input type="checkbox" class="grey remember" id="remember" name="remember">
                                تذكرني
                            </label>
                            <button type="submit" class="btn btn-bricky pull-left">
                                دخول <i class="fa fa-edit"></i>
                            </button>
                        </div>
                    </fieldset>
                </form>
            </div>
            <!-- end: LOGIN BOX -->
            <!-- start: FORGOT BOX -->
            <div class="box-forgot">
                <h3>هل نسيت كلمة المرور</h3>
                <p>
                    أدخل بريدك الإلكتروني لمساعدتك في إسترجاع الباسورد
                </p>
                <form class="form-forgot">
                    <div class="errorHandler alert alert-danger no-display">
                        <i class="fa fa-remove-sign"></i> الرجاء التأكد من البريد الإلكتروني
                    </div>
                    <fieldset>
                        <div class="form-group">
                            <span class="input-icon">
                                <input type="email" class="form-control" name="email" placeholder="البريد الإلكتروني">
                                <i class="fa fa-envelope"></i> </span>
                        </div>
                        <div class="form-actions">
                            <a class="btn btn-light-grey go-back">
                                <i class="fa fa-circle-arrow-left"></i> رجوع
                            </a>
                            <button type="submit" class="btn btn-bricky pull-left">
                                إرسال <i class="fa fa-edit"></i>
                            </button>
                        </div>
                    </fieldset>
                </form>
            </div>
            <!-- end: FORGOT BOX -->
            <!-- start: COPYRIGHT -->
            <div class="copyright">
                جميع الحقوق محفوظة © 2015
            </div>
            <!-- end: COPYRIGHT -->
        </div>
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
        <script src="<?= base_url('assets/front_end/js/twitterfeed.js');?>" type="text/javascript"></script>
        <script src="<?= base_url('assets/front_end/js/moment.min.js'); ?>" type="text/javascript"></script>
        <script src="<?= base_url('assets/front_end/js/jquery.simpleWeather.min.js'); ?>" type="text/javascript"></script>
        <script src="<?= base_url('assets/back_end/js/main.js') ?>"></script>
        <!-- end: MAIN JAVASCRIPTS -->
        <!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
        <script src="<?= base_url('assets/back_end/plugins/jquery-validation/dist/jquery.validate.min.js') ?>"></script>
        <script src="<?= base_url('assets/back_end/js/login.js') ?>"></script>
        <!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
        <script>
            jQuery(document).ready(function () {
                Main.init();
                Login.init();
            });

            $("#loginform").submit(function (event) {
                event.preventDefault();
                $.ajax({
                    type: "POST",
                    url: '<?php echo base_url("admin/users/do_login/"); ?>',
                    data: {
                        username: $('#username').val(),
                        password: $('#password').val()
                    },
                    dataType: "json",
                    success: function (json) {
                        if (json['status'] == true) {
                            $('#status').removeClass().addClass('alert alert-success');
                            $('#message').html(json['msg']);
                            window.location = '<?php echo base_url("admin/bikes/supplies") ?>';
                        } else if (json['status'] == false) {
                            $('#status').removeClass().addClass('alert alert-danger');
                            $('#message').html(json['msg']);
                        }
                    }, complete: function () {
//                        App.scrollTo();
                    }, error: function () {
                        $('#status').removeClass().addClass('alert alert-danger');
                        $('#message').text("هناك خطأ في تخزين البيانات");
                    }
                });
                return false;
            });
        </script>
    </body>
    <!-- end: BODY -->
</html>