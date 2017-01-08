<!doctype html>
<!--[if lte IE 9]> <html class="lte-ie9" lang="en"> <![endif]-->
<!--[if gt IE 9]><!-->
<html lang="en">
<!--<![endif]-->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Remove Tap Highlight on Windows Phone IE -->
    <meta name="msapplication-tap-highlight" content="no" />

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
        <script type="text/javascript" src="<?php //echo base_url('public/dashboard/bower_components/.js'); ?>matchMedia/matchMedia.js"></script>
        <script type="text/javascript" src="<?php //echo base_url('public/dashboard/bower_components/.js'); ?>matchMedia/matchMedia.addListener.js"></script>
        <link rel="stylesheet" href="<?php //echo base_url('public/dashboard/css/ie.css'); ?>" media="all">
    <![endif]-->

    <script src='https://www.google.com/recaptcha/api.js'></script>
     <?php
    echo "
     <script type='text/javascript'>
        var base_path = '".base_url()."';
    </script>
        ";
    ?>
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
                <button class="header_main_search_btn uk-button-link"><i class="md-icon material-icons">&#xE8B6;</i>
                </button>
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
    </header>
    <!-- main header end -->