<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title><?= $this->config->item('website_name') . '| المعروض للبيع' ?></title>
        <meta name="description" content="تصفح أحدث المعروض من الدراجات النارية، أو اعرض دراجتك النارية للبيع على موتسيكلات ، كما تستطيع الضغط على الدراجة النارية التى تود شرائها للاطلاع على كافة التفاصيل والمواصفات والسعر الخاص بها، وكذلك مشاهدة صورها المعروضة .. أو اجراء بحث متقدم لعرض المزيد والمزيد من النتائج. ">
        <meta name="keywords" content="ترفية, شراء متسيكل, العربي, الوطن العربي, تجار, وكلاء, عروضات, دراجات, دراجات نارية, متسيكلات">
        <meta name="author" content="<?= $this->config->item('auther') ?>">
        <meta name="coder" content="<?= $this->config->item('coder') ?>">
        <meta name="copyright" content="<?= $this->config->item('copyright') ?>">

        <!-- Mobile Meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <!-- Put favicon.ico and apple-touch-icon(s).png in the images folder -->
        <link rel="shortcut icon" href="<?php echo base_url('assets/front_end/images/favicon.ico'); ?>">

        <!-- CSS StyleSheets -->
        <link rel="stylesheet" href="<?php echo base_url('assets/front_end/css/font-awesome.min.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/front_end/css/animate.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/front_end/css/prettyPhoto.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/front_end/css/slick.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/front_end/css/flexslider.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/front_end/css/style.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/front_end/css/responsive.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/front_end/css/news.css'); ?>">
        <!--[if lt IE 9]>
        <link rel="stylesheet" href="css/ie.css">
        <script type="text/javascript" src="js/html5.js"></script>
    <![endif]-->

        <!-- Skin style (** you can change the link below with the one you need from skins folder in the css folder **) -->
        <link rel="stylesheet" href="<?php echo base_url('assets/front_end/css/skins/skin2.css'); ?>">

        <!-- RTL Support -->
        <link rel="stylesheet" href="<?php echo base_url('assets/front_end/css/rtl.css'); ?>">

    </head>
    <body>
        <div class="pageWrapper">

            <!-- login box start -->
            <?php $this->load->view('front_end/includes/login'); ?>
            <!-- login box End -->

            <!-- feedback start -->
            <?php $this->load->view('front_end/includes/feedback'); ?>
            <!-- feedback End -->

            <!-- Header Start -->
            <div id="headWrapper" class="clearfix">
                <!-- top bar start -->
                <?php $this->load->view('front_end/includes/top-bar'); ?>
                <!-- top bar end -->

                <!-- Logo, global navigation menu and search start -->
                <header class="top-head top-head-4">
                    <div class="container">
                        <div class="row">
                            <!-- log start -->
                            <?php $this->load->view('front_end/includes/logo'); ?>
                            <!-- logo end --> 

                            <!-- top-ads start -->
                            <?php $this->load->view('front_end/ads/banner_728x90'); ?>
                            <!-- top-ads end --> 

                        </div>
                    </div>
                    <!-- top-nav start -->
                    <?php $this->load->view('front_end/includes/top-nav'); ?>
                    <!-- top-nav end -->
                </header>
                <!-- Logo, Global navigation menu and search end -->

            </div>
            <!-- Header End -->

            <!-- Content Start -->
            <div id="contentWrapper">
                <div class="page-title title-4">
                    <div class="container">
                        <div class="row">
                            <div class="cell-12">
                                <h1 class="fx" data-animate="fadeInLeft">جميع<span> العروض</span></h1>
                                <div class="breadcrumbs main-bg fx" data-animate="fadeInUp">
                                    <span class="bold">أنت الأن داخل:</span><a href="#">الرئيسية</a><span class="line-separate">/</span><span>جميع العروض</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="sectionWrapper">
                    <div class="container">
                        <div class="row">
                            <div class="cell-9">
                                <?php $this->load->view('front_end/includes/all_offers'); ?>

                                <!-- wide-ads-728x90 start -->			
                                <?php $this->load->view('front_end/ads/wide_728x90_blue_color'); ?>
                                <!-- wide-ads-728x90 end -->
                            </div>

                            <aside class="cell-3 left-shop">
                                <div class="widget fx" data-animate="fadeInRight">
                                    <h3 class="widget-head">بحث متقدم</h3>
                                    <div class="widget-content">
                                        <form action="<?= base_url('home/offers/') ?>" method="get" name="search_supplies" id="search_supplies">
                                            <ul id="accordion" class="accordion">
                                                <li>
                                                    <h3><a href="#">معايير أساسية</a></h3>
                                                    <div class="accordion-panel active">
                                                        <div class="control-group">
                                                            <label class="control-label">العنوان</label>
                                                            <div class="controls">
                                                                <input type="text" name="title" class="cell-12" />
                                                            </div>
                                                        </div>
                                                        <div class="control-group">
                                                            <label class="control-label">الدولة</label>
                                                            <div class="controls">
                                                                <select name="country_id" class="dropdown">
                                                                    <option value="">-- الدولة --</option>
                                                                    <?php
                                                                    foreach ($countries as $country) {
                                                                        echo '<option value="' . $country->id . '">' . $country->name . '</option>';
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="control-group">
                                                            <label class="control-label">الشركة المصنعة</label>
                                                            <div class="controls">
                                                                <select id="manufacturer_id" name="manufacturer_id" class="dropdown">
                                                                    <option value="">-- الشركة المصنعة --</option>
                                                                    <?php
                                                                    foreach ($manufacturers as $manufacturer) {
                                                                        echo '<option value="' . $manufacturer->id . '">' . $manufacturer->name . '</option>';
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="control-group">
                                                            <label class="control-label">الموديل</label>
                                                            <div class="controls">
                                                                <select id="model_id" name="model_id" class="dropdown">
                                                                    <option value="">إختيار</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <h3><a href="#">معايير أخرى:</a></h3>
                                                    <div class="accordion-panel active">
                                                        <div class="control-group">
                                                            <label class="control-label">الحالة:</label>
                                                            <div class="controls">
                                                                <select name="bike_status" class="dropdown">
                                                                    <option value="">إختيار</option>
                                                                    <option value="1">جديد</option>
                                                                    <option value="2">مستعمل</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="control-group">
                                                            <label class="control-label">نوع المعلن:</label>
                                                            <div class="controls">
                                                                <select name="type" class="dropdown">
                                                                    <option value="">إختيار</option>
                                                                    <option value="1">شخصي</option>  
                                                                    <option value="2">مستورد مستقل</option>
                                                                    <option value="3">معرض</option>
                                                                    <option value="4">توكيل</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="control-group">
                                                            <label class="control-label">اللون:</label>
                                                            <div class="controls">
                                                                <select name="color" class="dropdown">
                                                                    <option value="">إختيار</option>
                                                                    <option value="0">غير ذلك</option>
                                                                    <option value="1">أزرق</option>
                                                                    <option value="2">أحمر</option>
                                                                    <option value="3">أسود</option>
                                                                    <option value="4">رمادي</option>
                                                                    <option value="5">أبيض</option>
                                                                    <option value="6">برتقالي</option>
                                                                    <option value="7">ذهبي</option>
                                                                    <option value="8">فضي</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="control-group">
                                                            <div class="cell-6">
                                                                <label class="control-label">من سعر:</label>
                                                                <div class="controls">
                                                                    <select name="price1" class="dropdown">
                                                                        <option value="">إختر السعر</option>
                                                                        <option value="1000">1,000</option>
                                                                        <option value="10000">10,000</option>
                                                                        <option value="20000">20,000</option>
                                                                        <option value="30000">30,000</option>
                                                                        <option value="40000">40,000</option>
                                                                        <option value="50000">50,000</option>
                                                                        <option value="60000">60,000</option>
                                                                        <option value="70000">70,000</option>
                                                                        <option value="80000">80,000</option>
                                                                    </select> 
                                                                </div>
                                                            </div>
                                                            <div class="cell-6">
                                                                <label class="control-label">إلى سعر:</label>
                                                                <div class="controls">
                                                                    <select name="price2" class="dropdown">
                                                                        <option value="">إختر السعر</option>
                                                                        <option value="10000">10,000</option>
                                                                        <option value="20000">20,000</option>
                                                                        <option value="30000">30,000</option>
                                                                        <option value="40000">40,000</option>
                                                                        <option value="50000">50,000</option>
                                                                        <option value="60000">60,000</option>
                                                                        <option value="70000">70,000</option>
                                                                        <option value="800000">80,000</option>
                                                                        <option value="900000">90,000</option>
                                                                    </select> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                            <input type="submit" class="btn btn-medium main-bg" value="بحث"/>
                                        </form>
                                    </div>
                                </div>
                                <ul class="sidebar_widgets">

                                    <!-- widget-sidebar-ads start -->			
                                    <?php $this->load->view('front_end/ads/sidebar_250x250'); ?>
                                    <!-- widget-sidebar-ads end -->

                                    <!-- widget-classification start -->			
                                    <?php $this->load->view('front_end/includes/sidebar/widget_classification'); ?>
                                    <!-- widget-classification end -->

                                    <!-- widget-sidebar-ads start -->			
                                    <?php $this->load->view('front_end/ads/sidebar_250x250'); ?>
                                    <!-- widget-sidebar-ads end -->
                                </ul>


                            </aside>

                        </div>
                    </div>
                </div>

            </div>
            <!-- Content End -->

            <!-- footer start -->			
            <?php $this->load->view('front_end/includes/footer'); ?>
            <!-- footer end -->

            <!-- Back to top Link -->
            <div id="to-top" class="main-bg"><span class="fa fa-chevron-up"></span></div>

        </div>

        <!-- Load JS siles -->
        <script type="text/javascript" src="<?php echo base_url('assets/front_end/js/jquery.min.js'); ?>"></script>

        <!-- Waypoints script -->
        <script type="text/javascript" src="<?php echo base_url('assets/front_end/js/waypoints.min.js'); ?>"></script>

        <!-- Flex Slider Plugin  -->
        <script type="text/javascript" src="<?php echo base_url('assets/front_end/js/jquery.flexslider-min.js'); ?>"></script>

        <!-- slick slider carousel -->
        <script type="text/javascript" src="<?php echo base_url('assets/front_end/js/slick.min.js'); ?>"></script>

        <!-- Animate numbers increment -->
        <script type="text/javascript" src="<?php echo base_url('assets/front_end/js/jquery.easypiechart.min.js'); ?>"></script>

        <!-- PrettyPhoto script -->
        <script type="text/javascript" src="<?php echo base_url('assets/front_end/js/jquery.prettyPhoto.js'); ?>"></script>

        <!-- Product images zoom plugin -->
        <script type="text/javascript" src="<?php echo base_url('assets/front_end/js/jquery.elevateZoom-3.0.8.min.js'); ?>"></script>

        <!-- Input placeholder plugin -->
        <script type="text/javascript" src="<?php echo base_url('assets/front_end/js/jquery.placeholder.js'); ?>"></script>

        <!-- Tweeter API plugin -->
        <script type="text/javascript" src="<?php echo base_url('assets/front_end/js/twitterfeed.js'); ?>"></script>

        <!-- NiceScroll plugin -->
        <script type="text/javascript" src="<?php echo base_url('assets/front_end/js/jquery.nicescroll.min.js'); ?>"></script>

        <!-- general script file -->
        <script type="text/javascript" src="<?php echo base_url('assets/front_end/js/script.js'); ?>"></script>
        <!-- Moment script file -->
        <script type="text/javascript" src="<?php echo base_url('assets/front_end/js/moment.min.js'); ?>"></script>
        <!-- Weather script file -->
        <script type="text/javascript" src="<?php echo base_url('assets/front_end/js/jquery.simpleWeather.min.js'); ?>"></script>
        <!-- Custom script file -->
        <script type="text/javascript" src="<?php echo base_url('assets/front_end/js/custom.js'); ?>"></script>
        <!-- Google Analytics file -->
        <script type="text/javascript" src="<?php echo base_url('assets/front_end/js/google_analytics.js'); ?>"></script>
        <!-- Google Adsense -->
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    </body>
</html>