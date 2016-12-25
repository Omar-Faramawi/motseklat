<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title><?= $this->config->item('website_name') . ' | ' . $article_info['title'] ?></title>
        <meta name="keywords" content="<?= $article_info['title'] ?>">
        <meta name="description" content="<?= character_limiter(strip_tags(preg_replace('/(<[^>]+) style=".*?"/i', '$1', $article_info['description'])), 300) ?>">
        <meta name="author" content="<?= $this->config->item('auther') ?>">
        <meta name="coder" content="<?= $this->config->item('coder') ?>">
        <meta name="copyright" content="<?= $this->config->item('copyright') ?>">
        <meta property="og:title" content="<?php echo $this->config->item('website_name') . ' | ' . $article_info['title']; ?>" />
        <meta property="og:image" content="<?php echo base_url('uploads/articles/small/' . $article_info['picture']) ?>" />
        <meta property="og:site_name" content="<?php echo $this->config->item('website_name'); ?>">

        <!-- Mobile Meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <!-- Put favicon.ico and apple-touch-icon(s).png in the images folder -->
        <link rel="shortcut icon" href="images/favicon.ico">

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
                <div class="page-title title-1">
                    <div class="container">
                        <div class="row">
                            <div class="cell-12">
                                <h1 class="fx" data-animate="fadeInLeft">تفاصيل<span> المقالة</span></h1>
                                <div class="breadcrumbs main-bg fx" data-animate="fadeInUp">
                                    <span class="bold">أنت الأن داخل:</span><a href="#">الرئيسية</a><span class="line-separate">/</span><span>تفاصيل المقالة</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="sectionWrapper">
                    <div class="container">
                        <div class="row">
                            <div class="cell-9">
                                <!-- Post Details Start -->
                                <?php $this->load->view('front_end/includes/article_details'); ?>
                                <!-- Post Details End --> 
                            </div>
                            <aside class="cell-3 right-sidebar">
                                <ul class="sidebar_widgets">
                                    <!-- widget-categories start -->			
                                    <?php $this->load->view('front_end/includes/sidebar/widget_categories'); ?>
                                    <!-- widget-categories end -->

                                    <!-- widget-sidebar-ads start -->			
                                    <?php $this->load->view('front_end/ads/sidebar_250x400'); ?>
                                    <br/>
                                    <!-- widget-sidebar-ads end -->

                                    <!-- widget-facebook start -->			
                                    <?php $this->load->view('front_end/includes/sidebar/widget_facebook'); ?>
                                    <!-- widget-facebook end -->

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