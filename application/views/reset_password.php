<!doctype html>
<!--[if lte IE 9]> <html class="lte-ie9" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html lang="en"> <!--<![endif]-->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Remove Tap Highlight on Windows Phone IE -->
    <meta name="msapplication-tap-highlight" content="no"/>

    <link rel="icon" type="image/png" href="<?php echo base_url('public/dashboard/img/favicon-16x16.png'); ?>" sizes="16x16">
    <link rel="icon" type="image/png" href="<?php echo base_url('public/dashboard/img/favicon-32x32.png'); ?>" sizes="32x32">

    <title>Motseklat</title>


    <!-- uikit -->
    <link rel="stylesheet" href="<?php echo base_url('public/dashboard/bower_components/uikit/css/uikit.almost-flat.min.css'); ?>" media="all">

    <!-- flag icons -->
    <link rel="stylesheet" href="<?php echo base_url('public/dashboard/icons/flags/flags.min.css'); ?>" media="all">

    <!-- style switcher -->
    <link rel="stylesheet" href="<?php echo base_url('public/dashboard/css/style_switcher.min.css'); ?>" media="all">
    
    <!-- altair admin -->
    <link rel="stylesheet" href="<?php echo base_url('public/dashboard/css/main.min.css'); ?>" media="all">

    <!-- themes -->
    <link rel="stylesheet" href="<?php echo base_url('public/dashboard/css/themes/themes_combined.min.css'); ?>" media="all">
    
    <!-- custom css -->
    <link rel="stylesheet" href="<?php echo base_url('public/dashboard/css/custom.css'); ?>" media="all">

    <!-- matchMedia polyfill for testing media queries in JS -->
    <!--[if lte IE 9]>
        <script type="text/javascript" src="bower_components/matchMedia/matchMedia.js"></script>
        <script type="text/javascript" src="bower_components/matchMedia/matchMedia.addListener.js"></script>
        <link rel="stylesheet" href="<?php //echo base_url('public/dashboard/css/ie.css'); ?>" media="all">
    <![endif]-->

</head>
<body class=" sidebar_main_open sidebar_main_swipe">
    <!-- main header -->
    <header id="header_main">
        <div class="header_main_content">
            <nav class="uk-navbar">
                                
                <!-- main sidebar switch -->
                <a href="#" id="sidebar_main_toggle" class="sSwitch sSwitch_left">
                    <span class="sSwitchIcon"></span>
                </a>
                
            </nav>
        </div>
        <div class="header_main_search_form">
            <i class="md-icon header_main_search_close material-icons">&#xE5CD;</i>
            <form class="uk-form uk-autocomplete" data-uk-autocomplete="{source:'data/search_data.json'}">
                <input type="text" class="header_main_search_input" />
                <button class="header_main_search_btn uk-button-link"><i class="md-icon material-icons">&#xE8B6;</i></button>
                <script type="text/autocomplete">
                    <ul class="uk-nav uk-nav-autocomplete uk-autocomplete-results">
                        {{~items}}
                        <li data-value="{{ $item.value }}">
                            <a href="{{ $item.url }}">
                                {{ $item.value }}<br>
                                <span class="uk-text-muted uk-text-small">{{{ $item.text }}}</span>
                            </a>
                        </li>
                        {{/items}}
                    </ul>
                </script>
            </form>
        </div>
    </header><!-- main header end -->
    <!-- main sidebar -->
    <aside id="sidebar_main">
        <div class="sidebar_main_header">
            <div class="sidebar_logo">
                <a href="<?php echo base_url(); ?>" class="sSidebar_hide sidebar_logo_large">
                    <img class="logo_regular" src="<?php echo base_url('public/img/logo.png'); ?>" />
                </a>
            </div>
        </div>
        
        <div class="menu_section">
            <ul>
                <li title="Login">
                    <a href="login.html">
                        <span class="menu_icon"><i class="material-icons">&#xE898;</i></span>
                        <span class="menu_title">Login</span>
                    </a>
                </li>
                <li title="Register">
                    <a href="index.html">
                        <span class="menu_icon"><i class="material-icons">&#xE7FE;</i></span>
                        <span class="menu_title">Register</span>
                    </a>
                </li>
                <li title="Our News">
                    <a href="our-news.html">
                        <span class="menu_icon"><i class="material-icons">&#xE236;</i></span>
                        <span class="menu_title">Our News</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside><!-- main sidebar end -->

    <div id="page_content">
        <div id="page_content_inner">

        <h2 class="heading_b uk-margin-bottom">Reset Your Password</h2>
    
            <div class="uk-grid">    
                <div class="uk-width-large-4-5 uk-container-center">
                    <div>
                        <div class="md-card">
                            <div class="md-card-content">
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-2-3 uk-container-center login-wrap">
                                        <div class="login_heading uk-text-center">
                                                <h2>Reset your password</h2>
                                                <h3>Hello <?= $firstName ?>, Fill the form below and reset your password</h3>
                                        </div>
                                        <?php 
                                        if($errors){
                                            ?>
                                            <div class="uk-alert uk-alert-warning"><?php echo $errors; ?></div>
                                            <?php
                                        }
                                        ?>
                                        <form method="POST" action ="<?php echo base_url('reset_password/token/'.$token);?>">
                                            <div class="uk-form-row">
                                                <div class="parsley-row">
                                                    <label for="password">Password<span class="req">*</span></label>
                                                    <input type="password" name="password" id='password' data-parsley-trigger="change" required  class="md-input" />
                                                </div>
                                            </div>
                                            <div class="uk-form-row">
                                                <div class="parsley-row">
                                                    <label for="password">Confirm password<span class="req">*</span></label>
                                                    <input type="password" name="passconf" id='passconf' data-parsley-trigger="change" required  class="md-input" />
                                                </div>
                                            </div>
                                            <div class="uk-margin-medium-top">
                                                <button type="submit" class="md-btn md-btn-large md-btn-block md-btn-primary">Reset</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="uk-width-large-1-5 uk-container-center uk-text-center">
                    <div class="ads">
                        <div class="md-card">
                            <div class="md-card-head">
                                <h3>Ads</h3>
                            </div>
                            <div class="md-card-content">
                                <img src="http://placehold.it/350x350">
                            </div>
                        </div>
                    </div>
                    
                    <div class="ads">
                        <div class="md-card">
                            <div class="md-card-head">
                                <h3>Ads</h3>
                            </div>
                            <div class="md-card-content">
                                <img src="http://placehold.it/350x700">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <footer id="footer">
                <div class="copyrights"><a href="">Motseklat</a> © 2017. All Rights Reserved.</div>
                <nav class="menu-h">
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li><a href="terms-of-services.html">Terms & Conditions</a></li>
                        <li><a href="faq.html">FAQ</a></li>
                        <li><a href="privacy-statement.html">Privacy Statment</a></li>
                        <li><a href="contact-us.html">Contact Us</a></li>
                        <li><a href="about.html">About</a></li>
                        <li><a href="advertise-with-us.html">Advertise With Us</a></li>
                    </ul>
                </nav>
            </footer>
        </div>
    </div>

    <!-- google web fonts -->
    <script>
        WebFontConfig = {
            google: {
                families: [
                    'Source+Code+Pro:400,700:latin',
                    'Roboto:400,300,500,700,400italic:latin'
                ]
            }
        };
        (function() {
            var wf = document.createElement('script');
            wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
            '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
            wf.type = 'text/javascript';
            wf.async = 'true';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(wf, s);
        })();
    </script>

    <!-- common functions -->
    <script src="<?php echo base_url('public/dashboard/js/common.min.js'); ?>"></script>
    <!-- uikit functions -->
    <script src="<?php echo base_url('public/dashboard/js/uikit_custom.min.js'); ?>"></script>
    <!-- altair common functions/helpers -->
    <script src="<?php echo base_url('public/dashboard/js/altair_admin_common.min.js'); ?>"></script>

    <!-- page specific plugins -->
    <!-- parsley (validation) -->
    <script>
    // load parsley config (altair_admin_common.js)
    altair_forms.parsley_validation_config();
    // load extra validators
    altair_forms.parsley_extra_validators();
    </script>
    <script src="<?php echo base_url('public/bower_components/parsleyjs/dist/parsley.min.js'); ?>"></script>
    <!-- jquery steps -->
    <script src="<?php echo base_url('public/dashboard/js/custom/wizard_steps.min.js'); ?>"></script>

    <!--  forms wizard functions -->
    <script src="<?php echo base_url('public/dashboard/js/pages/forms_wizard.min.js'); ?>"></script>
    
    <script>
        $(function() {
            if(isHighDensity()) {
                $.getScript("public/bower_components/dense/src/dense.js", function() {
                    // enable hires images
                    altair_helpers.retina_images();
                });
            }
            if(Modernizr.touch) {
                // fastClick (touch devices)
                FastClick.attach(document.body);
            }
        });
        $window.load(function() {
            // ie fixes
            altair_helpers.ie_fix();
        });
    </script>


    
</body>
</html>