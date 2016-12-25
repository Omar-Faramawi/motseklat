<!doctype html>
<!--[if lte IE 9]> <html class="lte-ie9" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html lang="en"> <!--<![endif]-->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Remove Tap Highlight on Windows Phone IE -->
    <meta name="msapplication-tap-highlight" content="no"/>

    <link rel="icon" type="image/png" href="<?php echo  base_url('public/img/favicon-16x16.png'); ?>" sizes="16x16">
    <link rel="icon" type="image/png" href="<?php echo  base_url('public/img/favicon-32x32.png'); ?>" sizes="32x32">

    <title>Altair Admin Landing Page</title>

    <!-- uikit -->
    <link rel="stylesheet" href="<?php echo  base_url('public/bower_components/uikit/css/uikit.almost-flat.min.css'); ?>" media="all">

    <!-- altair landing page -->
    <link rel="stylesheet" href="<?php echo  base_url('public/css/main.css'); ?>" media="all">
    
    <!-- custom css -->
    <link rel="stylesheet" href="<?php echo  base_url('public/css/custom.css'); ?>" media="all">
    
    <!-- flags css -->
    <link rel="stylesheet" href="<?php echo  base_url('public/icons/flags/flags.min.css'); ?>" media="all">
    
    <!-- matchMedia polyfill for testing media queries in JS -->
    <!--[if lte IE 9]>
        <script type="text/javascript" src="<?php //echo base_url('public/bower_components/matchMedia/matchMedia.js'); ?>"></script>
        <script type="text/javascript" src="<?php //echo base_url('public/bower_components/matchMedia/matchMedia.addListener.js'); ?>"></script>
    <![endif]-->
    
    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
    <!-- navigation -->
    <header id="header_main">
        <nav class="uk-navbar">
            <div class="uk-container uk-container-center">
                <a href="#" class="uk-float-left" id="mobile_navigation_toggle" data-uk-offcanvas="{target:'#mobile_navigation'}"><i class="material-icons">&#xE5D2;</i></a>
                <a href="<?php echo base_url(); ?>" class="uk-navbar-brand">
                    <img src="<?php echo  base_url('public/img/logo.png'); ?>" alt="Logo">
                </a>
                <a href="http://themeforest.net/item/altair-material-design-premium-template/12190654?ref=tzd" class="md-btn md-btn-primary uk-navbar-flip header_cta uk-margin-left" data-uk-modal="{target:'#login-modal'}">Login</a>
                <div class="uk-navbar-flip">
                    <ul class="uk-navbar-nav" id="main_navigation">
                        <li class="current_active">
                            <a href="#sect-home">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="#sect-features">
                                Features
                            </a>
                        </li>
                        <li>
                            <a href="#sect-subscribe">
                                Subscriptions
                            </a>
                        </li>
                        <li>
                            <a href="#sect-ads">
                                Latest Ads
                            </a>
                        </li>
                        <li>
                            <a href="#sect-latest-news">
                                Latest News
                            </a>
                        </li>
                        <li>
                            <a href="#sect-contact">
                                Contact
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    
    <div id="mobile_navigation" class="uk-offcanvas">
        <div class="uk-offcanvas-bar">
            <ul>
                <li>
                    <a href="#sect-overview" data-uk-smooth-scroll="{offset: 48}">
                        <span class="menu_icon"><i class="material-icons">&#xE417;</i></span>
                        <span class="menu_title">Home</span>
                    </a>
                </li>
                <li>
                    <a href="#sect-features" data-uk-smooth-scroll="{offset: 48}">
                        <span class="menu_icon"><i class="material-icons">&#xE896;</i></span>
                        <span class="menu_title">Features</span>
                    </a>
                </li>
                <li>
                    <a href="#sect-gallery" data-uk-smooth-scroll="{offset: 48}">
                        <span class="menu_icon"><i class="material-icons">&#xE410;</i></span>
                        <span class="menu_title">Subscriptions</span>
                    </a>
                </li>
                <li>
                    <a href="#sect-pricing" class="uk-navbar-nav-subtitle" data-uk-smooth-scroll="{offset: 48}">
                        <span class="menu_icon"><i class="material-icons">&#xE227;</i></span>
                        <span class="menu_title">Latest Ads</span>
                    </a>
                </li>
                <li>
                    <a href="#sect-team" data-uk-smooth-scroll="{offset: 48}">
                        <span class="menu_icon"><i class="material-icons">&#xE7FB;</i></span>
                        <span class="menu_title">Latest News</span>
                    </a>
                </li>
                <li>
                    <a href="#sect-contact" data-uk-smooth-scroll="{offset: 48}">
                        <span class="menu_icon"><i class="material-icons">&#xE0E1;</i></span>
                        <span class="menu_title">Contact</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    
    <div id="login-register">
            <div class="md-card">
                <div class="md-card-content">
                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-medium-1-3">

                            <!-- logIn form -->
                            <div class="uk-modal" id="login-modal">
                                <div class="uk-modal-dialog">
                                    <button type="button" class="uk-modal-close uk-close"></button>
                                    <div class="uk-modal-header">
                                        <img class="logo_regular" src="<?php echo  base_url('public/img/logo.png'); ?>" alt="" height="25" width="100">
                                        <hr class="uk-grid-divider">
                                        <div class="login_heading uk-text-center">
                                            <div class="user_avatar"></div>
                                        </div>
                                    </div>
                                    <form action="<?= base_url('login')?>" method="post" id="do_login" enctype="multipart/form-data">
                                        <div id="login_message" class='uk-alert' style="display: none;"></div>
                                        <div class="uk-form-row">
                                            <div class="parsley-row">
                                                <label for="email">Enter Your Email Address<span class="req">*</span></label>
                                                <input type="email" name="username" data-parsley-trigger="change" required  class="md-input" />
                                            </div>
                                        </div>
                                        <div class="uk-form-row">
                                            <div class="parsley-row">
                                                <label for="login_password">Enter Your Password<span class="req">*</span></label>
                                                <input type="password" name='password' class="md-input"required />
                                            </div>
                                        </div>
                                        
                                        <!--<div class="uk-form-row">
                                            <div class="parsley-row">
                                                <div class="g-recaptcha" data-sitekey="6LcVawgUAAAAAEljX7BVoH2CM-cfkf5XtbyJphBf"></div>
                                            </div>
                                        </div>-->
                                        <div class="uk-margin-medium-top">
                                            <button type="submit" class="md-btn md-btn-block md-btn-large md-btn-primary">LOGIN</button>
                                        </div>
                                    </form>
                                    <div class="uk-modal-footer">
                                        <div class="uk-margin-top">
                                            <a href="#"  data-uk-modal="{target:'#login_password_reset'}">Forgot Your Password?</a>
                                        </div>
                                        <div class="uk-margin-top">
                                            <a href="<?php echo base_url('auth/register'); ?>">Not a member? Sign up now!</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- reset password form -->
                            <div class="uk-modal" id="login_password_reset">
                                <div class="uk-modal-dialog">
                                    <button type="button" class="uk-modal-close uk-close" data-uk-modal="{target:'#login-modal'}"></button>
                                    <h2 class="heading_d uk-text-center uk-margin-large-bottom">Reset Your Password</h2>
                                    <form action="<?= base_url('forgot')?>" method="post" id="do_forgot" enctype="multipart/form-data">
                                     <div id="login_message" class='uk-alert' style="display: none;"></div>
                                        <div class="uk-form-row">
                                            <div class="parsley-row">
                                                <label for="email">Enter Your Email Address<span class="req">*</span></label>
                                                <input type="email" name="email" data-parsley-trigger="change" required  class="md-input" />
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
        </div>

    <section class="banner-main" id="sect-home">
        <div class="uk-container uk-container-center">
            <div class="banner-content">
                <div class="search-content">
                    <div class="heading">FIND OUT YOUR <span>MOTORCYCLE</span></div>
                    <div class="search-box">
                        <form class="uk-form-stacked">
                            <div class="uk-grid" data-uk-grid-margin>
                                <div class="uk-width-medium-1-1">
                                    <select id="select_seller_cat" class="md-input" data-md-selectize>
                                        <option value="">Seller Cat.</option>
                                        <option value="a">Individual</option>
                                        <option value="b">Dealer</option>
                                        <option value="c">Store</option>
                                        <option value="d">Agency</option>
                                    </select>
                                </div>

                                <div class="uk-width-medium-1-1">
                                    <select id="select_country" class="md-input" data-md-selectize>
                                        <option value="">Country</option>
                                        <option value="AF">Afghanistan</option>
                                        <option value="AX">Åland Islands</option>
                                        <option value="AL">Albania</option>
                                        <option value="DZ">Algeria</option>
                                        <option value="AS">American Samoa</option>
                                        <option value="AD">Andorra</option>
                                        <option value="AO">Angola</option>
                                        <option value="AI">Anguilla</option>
                                        <option value="AQ">Antarctica</option>
                                        <option value="AG">Antigua and Barbuda</option>
                                        <option value="AR">Argentina</option>
                                        <option value="AM">Armenia</option>
                                        <option value="AW">Aruba</option>
                                        <option value="AU">Australia</option>
                                        <option value="AT">Austria</option>
                                        <option value="AZ">Azerbaijan</option>
                                        <option value="BS">Bahamas</option>
                                        <option value="BH">Bahrain</option>
                                        <option value="BD">Bangladesh</option>
                                        <option value="BB">Barbados</option>
                                        <option value="BY">Belarus</option>
                                        <option value="BE">Belgium</option>
                                        <option value="BZ">Belize</option>
                                        <option value="BJ">Benin</option>
                                        <option value="BM">Bermuda</option>
                                        <option value="BT">Bhutan</option>
                                        <option value="BO">Bolivia, Plurinational State of</option>
                                        <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
                                        <option value="BA">Bosnia and Herzegovina</option>
                                        <option value="BW">Botswana</option>
                                        <option value="BV">Bouvet Island</option>
                                        <option value="BR">Brazil</option>
                                        <option value="IO">British Indian Ocean Territory</option>
                                        <option value="BN">Brunei Darussalam</option>
                                        <option value="BG">Bulgaria</option>
                                        <option value="BF">Burkina Faso</option>
                                        <option value="BI">Burundi</option>
                                        <option value="KH">Cambodia</option>
                                        <option value="CM">Cameroon</option>
                                        <option value="CA">Canada</option>
                                        <option value="CV">Cape Verde</option>
                                        <option value="KY">Cayman Islands</option>
                                        <option value="CF">Central African Republic</option>
                                        <option value="TD">Chad</option>
                                        <option value="CL">Chile</option>
                                        <option value="CN">China</option>
                                        <option value="CX">Christmas Island</option>
                                        <option value="CC">Cocos (Keeling) Islands</option>
                                        <option value="CO">Colombia</option>
                                        <option value="KM">Comoros</option>
                                        <option value="CG">Congo</option>
                                        <option value="CD">Congo, the Democratic Republic of the</option>
                                        <option value="CK">Cook Islands</option>
                                        <option value="CR">Costa Rica</option>
                                        <option value="CI">Côte d'Ivoire</option>
                                        <option value="HR">Croatia</option>
                                        <option value="CU">Cuba</option>
                                        <option value="CW">Curaçao</option>
                                        <option value="CY">Cyprus</option>
                                        <option value="CZ">Czech Republic</option>
                                        <option value="DK">Denmark</option>
                                        <option value="DJ">Djibouti</option>
                                        <option value="DM">Dominica</option>
                                        <option value="DO">Dominican Republic</option>
                                        <option value="EC">Ecuador</option>
                                        <option value="EG">Egypt</option>
                                        <option value="SV">El Salvador</option>
                                        <option value="GQ">Equatorial Guinea</option>
                                        <option value="ER">Eritrea</option>
                                        <option value="EE">Estonia</option>
                                        <option value="ET">Ethiopia</option>
                                        <option value="FK">Falkland Islands (Malvinas)</option>
                                        <option value="FO">Faroe Islands</option>
                                        <option value="FJ">Fiji</option>
                                        <option value="FI">Finland</option>
                                        <option value="FR">France</option>
                                        <option value="GF">French Guiana</option>
                                        <option value="PF">French Polynesia</option>
                                        <option value="TF">French Southern Territories</option>
                                        <option value="GA">Gabon</option>
                                        <option value="GM">Gambia</option>
                                        <option value="GE">Georgia</option>
                                        <option value="DE">Germany</option>
                                        <option value="GH">Ghana</option>
                                        <option value="GI">Gibraltar</option>
                                        <option value="GR">Greece</option>
                                        <option value="GL">Greenland</option>
                                        <option value="GD">Grenada</option>
                                        <option value="GP">Guadeloupe</option>
                                        <option value="GU">Guam</option>
                                        <option value="GT">Guatemala</option>
                                        <option value="GG">Guernsey</option>
                                        <option value="GN">Guinea</option>
                                        <option value="GW">Guinea-Bissau</option>
                                        <option value="GY">Guyana</option>
                                        <option value="HT">Haiti</option>
                                        <option value="HM">Heard Island and McDonald Islands</option>
                                        <option value="VA">Holy See (Vatican City State)</option>
                                        <option value="HN">Honduras</option>
                                        <option value="HK">Hong Kong</option>
                                        <option value="HU">Hungary</option>
                                        <option value="IS">Iceland</option>
                                        <option value="IN">India</option>
                                        <option value="ID">Indonesia</option>
                                        <option value="IR">Iran, Islamic Republic of</option>
                                        <option value="IQ">Iraq</option>
                                        <option value="IE">Ireland</option>
                                        <option value="IM">Isle of Man</option>
                                        <option value="IL">Israel</option>
                                        <option value="IT">Italy</option>
                                        <option value="JM">Jamaica</option>
                                        <option value="JP">Japan</option>
                                        <option value="JE">Jersey</option>
                                        <option value="JO">Jordan</option>
                                        <option value="KZ">Kazakhstan</option>
                                        <option value="KE">Kenya</option>
                                        <option value="KI">Kiribati</option>
                                        <option value="KP">Korea, Democratic People's Republic of</option>
                                        <option value="KR">Korea, Republic of</option>
                                        <option value="KW">Kuwait</option>
                                        <option value="KG">Kyrgyzstan</option>
                                        <option value="LA">Lao People's Democratic Republic</option>
                                        <option value="LV">Latvia</option>
                                        <option value="LB">Lebanon</option>
                                        <option value="LS">Lesotho</option>
                                        <option value="LR">Liberia</option>
                                        <option value="LY">Libya</option>
                                        <option value="LI">Liechtenstein</option>
                                        <option value="LT">Lithuania</option>
                                        <option value="LU">Luxembourg</option>
                                        <option value="MO">Macao</option>
                                        <option value="MK">Macedonia, the former Yugoslav Republic of</option>
                                        <option value="MG">Madagascar</option>
                                        <option value="MW">Malawi</option>
                                        <option value="MY">Malaysia</option>
                                        <option value="MV">Maldives</option>
                                        <option value="ML">Mali</option>
                                        <option value="MT">Malta</option>
                                        <option value="MH">Marshall Islands</option>
                                        <option value="MQ">Martinique</option>
                                        <option value="MR">Mauritania</option>
                                        <option value="MU">Mauritius</option>
                                        <option value="YT">Mayotte</option>
                                        <option value="MX">Mexico</option>
                                        <option value="FM">Micronesia, Federated States of</option>
                                        <option value="MD">Moldova, Republic of</option>
                                        <option value="MC">Monaco</option>
                                        <option value="MN">Mongolia</option>
                                        <option value="ME">Montenegro</option>
                                        <option value="MS">Montserrat</option>
                                        <option value="MA">Morocco</option>
                                        <option value="MZ">Mozambique</option>
                                        <option value="MM">Myanmar</option>
                                        <option value="NA">Namibia</option>
                                        <option value="NR">Nauru</option>
                                        <option value="NP">Nepal</option>
                                        <option value="NL">Netherlands</option>
                                        <option value="NC">New Caledonia</option>
                                        <option value="NZ">New Zealand</option>
                                        <option value="NI">Nicaragua</option>
                                        <option value="NE">Niger</option>
                                        <option value="NG">Nigeria</option>
                                        <option value="NU">Niue</option>
                                        <option value="NF">Norfolk Island</option>
                                        <option value="MP">Northern Mariana Islands</option>
                                        <option value="NO">Norway</option>
                                        <option value="OM">Oman</option>
                                        <option value="PK">Pakistan</option>
                                        <option value="PW">Palau</option>
                                        <option value="PS">Palestinian Territory, Occupied</option>
                                        <option value="PA">Panama</option>
                                        <option value="PG">Papua New Guinea</option>
                                        <option value="PY">Paraguay</option>
                                        <option value="PE">Peru</option>
                                        <option value="PH">Philippines</option>
                                        <option value="PN">Pitcairn</option>
                                        <option value="PL">Poland</option>
                                        <option value="PT">Portugal</option>
                                        <option value="PR">Puerto Rico</option>
                                        <option value="QA">Qatar</option>
                                        <option value="RE">Réunion</option>
                                        <option value="RO">Romania</option>
                                        <option value="RU">Russian Federation</option>
                                        <option value="RW">Rwanda</option>
                                        <option value="BL">Saint Barthélemy</option>
                                        <option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
                                        <option value="KN">Saint Kitts and Nevis</option>
                                        <option value="LC">Saint Lucia</option>
                                        <option value="MF">Saint Martin (French part)</option>
                                        <option value="PM">Saint Pierre and Miquelon</option>
                                        <option value="VC">Saint Vincent and the Grenadines</option>
                                        <option value="WS">Samoa</option>
                                        <option value="SM">San Marino</option>
                                        <option value="ST">Sao Tome and Principe</option>
                                        <option value="SA">Saudi Arabia</option>
                                        <option value="SN">Senegal</option>
                                        <option value="RS">Serbia</option>
                                        <option value="SC">Seychelles</option>
                                        <option value="SL">Sierra Leone</option>
                                        <option value="SG">Singapore</option>
                                        <option value="SX">Sint Maarten (Dutch part)</option>
                                        <option value="SK">Slovakia</option>
                                        <option value="SI">Slovenia</option>
                                        <option value="SB">Solomon Islands</option>
                                        <option value="SO">Somalia</option>
                                        <option value="ZA">South Africa</option>
                                        <option value="GS">South Georgia and the South Sandwich Islands</option>
                                        <option value="SS">South Sudan</option>
                                        <option value="ES">Spain</option>
                                        <option value="LK">Sri Lanka</option>
                                        <option value="SD">Sudan</option>
                                        <option value="SR">Suriname</option>
                                        <option value="SJ">Svalbard and Jan Mayen</option>
                                        <option value="SZ">Swaziland</option>
                                        <option value="SE">Sweden</option>
                                        <option value="CH">Switzerland</option>
                                        <option value="SY">Syrian Arab Republic</option>
                                        <option value="TW">Taiwan, Province of China</option>
                                        <option value="TJ">Tajikistan</option>
                                        <option value="TZ">Tanzania, United Republic of</option>
                                        <option value="TH">Thailand</option>
                                        <option value="TL">Timor-Leste</option>
                                        <option value="TG">Togo</option>
                                        <option value="TK">Tokelau</option>
                                        <option value="TO">Tonga</option>
                                        <option value="TT">Trinidad and Tobago</option>
                                        <option value="TN">Tunisia</option>
                                        <option value="TR">Turkey</option>
                                        <option value="TM">Turkmenistan</option>
                                        <option value="TC">Turks and Caicos Islands</option>
                                        <option value="TV">Tuvalu</option>
                                        <option value="UG">Uganda</option>
                                        <option value="UA">Ukraine</option>
                                        <option value="AE">United Arab Emirates</option>
                                        <option value="GB">United Kingdom</option>
                                        <option value="US">United States</option>
                                        <option value="UM">United States Minor Outlying Islands</option>
                                        <option value="UY">Uruguay</option>
                                        <option value="UZ">Uzbekistan</option>
                                        <option value="VU">Vanuatu</option>
                                        <option value="VE">Venezuela, Bolivarian Republic of</option>
                                        <option value="VN">Viet Nam</option>
                                        <option value="VG">Virgin Islands, British</option>
                                        <option value="VI">Virgin Islands, U.S.</option>
                                        <option value="WF">Wallis and Futuna</option>
                                        <option value="EH">Western Sahara</option>
                                        <option value="YE">Yemen</option>
                                        <option value="ZM">Zambia</option>
                                        <option value="ZW">Zimbabwe</option>
                                    </select>
                                </div>

                                <div class="uk-width-medium-1-1">
                                    <select id="select_style" class="md-input" data-md-selectize>
                                        <option value="">Style</option>
                                        <option value="a">Individual</option>
                                        <option value="b">Dealer</option>
                                        <option value="c">Store</option>
                                        <option value="d">Agency</option>
                                    </select>
                                </div>

                                <div class="uk-width-medium-1-1">
                                    <select id="select_manufacture" class="md-input" data-md-selectize>
                                        <option value="">Manufacture</option>
                                        <option value="a">Individual</option>
                                        <option value="b">Dealer</option>
                                        <option value="c">Store</option>
                                        <option value="d">Agency</option>
                                    </select>
                                </div>

                                <div class="uk-width-medium-1-1">
                                    <a href="#" class="md-btn md-btn-primary md-btn-block md-btn-wave-light md-btn-icon waves-effect waves-button waves-light">Find Now</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section section_large" id="sect-features">
        <div class="uk-container uk-container-center">
            <div class="uk-grid">
                <div class="uk-width-large-3-5 uk-container-center uk-text-center">
                    <h2 class="heading_b">
                        Features
                    </h2>
                    <span class="sub-heading"><span>MOTSEKLAT</span> offers you the best way to sell, buy, interact and communicate with all bikers all over the Middle East. Not only this. We are the only one who provides you the best tools to build your online store for all motorcycle’s products and services. The more you participate, the more you can earn. 
</span>
                </div>
            </div>
            
            <div class="uk-grid uk-grid-width-1-2 uk-grid-width-medium-1-3 uk-grid-width-large-1-4 animate" data-uk-scrollspy="{cls:'uk-animation-slide-bottom animated',target:'> *',delay:300,topoffset:-100}">
                <div class="uk-margin-top feature-ft">
                    <div class="uk-text-center uk-margin-bottom">
                        <i class="material-icons icon_large">&#xE91B;</i>
                    </div>
                    <h3 class="heading_c uk-text-center">Direct Ads.</h3>
                    <p>
                        The most effective system to put up motorcycles, accessories and spare parts ads, we provide the best searching tools to facilitate access to the required specifications for the buyers. We help the seller by publishing his ads on our website and our social media channels (Facebook, twitter  ... etc.). All for FREE
                    </p>
                </div>
                
                <div class="uk-margin-top feature-ft">
                    <div class="uk-text-center uk-margin-bottom">
                        <i class="material-icons icon_large">&#xE90E;</i>
                    </div>
                    <h3 class="heading_c uk-text-center">Auctions</h3>
                    <p>
                        The first website in the Middle East that provides a private motorcycles auctions system to help the seller to get the best price for his motorcycle. As long as you own a mint conditions motorcycle, let the market decide the best selling price for you. Our auction system is smart enough to ensure that the buyer and seller will get the most benefits
                    </p>
                </div>
                <div class="uk-margin-top feature-ft">
                    <div class="uk-text-center uk-margin-bottom">
                        <i class="material-icons icon_large">&#xE896;</i>
                    </div>
                    <h3 class="heading_c uk-text-center">Buying Request</h3>
                    <p>
                        Got stuck with all ads and feel lost!! Don’t worry, we still can help. If you're looking for special specifications, submit a request with your required ones and we will send emails to all exhibitors in addition to your contact info in a help to find what you are looking for
                    </p>
                </div>
                <div class="uk-margin-top feature-ft">
                    <div class="uk-text-center uk-margin-bottom">
                        <i class="material-icons icon_large">&#xE54E;</i>
                    </div>
                    <h3 class="heading_c uk-text-center">Sale offers</h3>
                    <p>
                        After fifteen days of placing your ads and checked by fifteen visitors or more, our system will allow you to put a sale in order to attract the largest number of interested buyers in your ads and help them to make a purchasing decision , Hurry up and start placing your ads immediately
                    </p>
                </div>
            </div>
        </div>
    </section>
    
     <section id="sect-subscribe" class="section section-large">
        <div class="uk-container uk-container-center uk-invisible" data-uk-scrollspy="{cls:'uk-animation-scale-up uk-invisible',delay:300,topoffset:-100}">
            <div class="uk-grid uk-margin-large-bottom">
                <div class="uk-width-large-3-5 uk-container-center uk-text-center">
                    <h2 class="heading_b">Subscriptions</h2>
                    <span class="sub-heading"><span>MOTSEKLAT</span> offers four types of stores (Accounts), if you want to join our community, you should identify the best store type that fit your status. Choosing the correct store (Account) to create, will help the buyers to find your products faster way, and will help us to promote your products to the best buyer.  
</span>
                </div>
            </div>
            
            <div class="pricing_table pricing_table_c uk-grid uk-grid-small uk-grid-width-medium-1-2 uk-grid-width-large-1-4 uk-margin-large-bottom" data-uk-grid-margin data-uk-grid-match="{target:'.md-card-content'}">
                <div>
                    <div class="md-card sub-1">
                        <div class="md-card-content">
                            <div class="pricing_table_plan"><i class="material-icons md-48">&#xE87C;</i></div>
                            <div class="pricing_table_price">
                                <span class="currency">Individual</span>
                            </div>
                            <p>Intended for individuals who wish to sell their motorcycles in particular, or sell a product they own on a personal level.</p>
                            <ul class="pricing_table_features">
                                <li><i class="material-icons">&#xE876;</i>The maximum number of permitted ads is <span>5</span></li>
                                <li><i class="material-icons">&#xE876;</i>Allowed to promote motorcycles, accessories and spare parts</li>
                                <li><i class="material-icons">&#xE876;</i>Account is <span>FREE</span></li>
                                <li><i class="material-icons">&#xE876;</i>Changing the account type is allowed after completing the requirements for the new account type</li>
                                <li><i class="material-icons">&#xE876;</i>Allowed to place motorcycles in auctions</li>
                            </ul>
                        </div>
                        <div class="md-card-footer">
                            <div class="pricing_table_select">
                                <a href="#" class="md-btn md-btn-primary md-btn-wave-light md-btn-icon waves-effect waves-button waves-light">Subscribe now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="md-card sub-2">
                        <div class="md-card-content">
                            <div class="pricing_table_plan"><i class="material-icons md-48">&#xE8F9;</i></div>
                            <div class="pricing_table_price">
                                <span class="currency">Dealer</span>
                            </div>
                            <p>Intended for traders who sell motorcycles, accessories and spare parts on a commercial level and don’t have a physical store to sell their products</p>
                            <ul class="pricing_table_features">
                                <li><i class="material-icons">&#xE876;</i>The maximum number of permitted ads is <span>15</span></li>
                                <li><i class="material-icons">&#xE876;</i>Allowed to promote motorcycles, accessories and spare parts</li>
                                <li><i class="material-icons">&#xE876;</i>Account is <span>FREE</span></li>
                                <li><i class="material-icons">&#xE876;</i>Changing the account type is allowed after completing the requirements for the new account type</li>
                                <li><i class="material-icons">&#xE876;</i>Allowed to place motorcycles in auctions</li>
                            </ul>
                        </div>
                        <div class="md-card-footer">
                            <div class="pricing_table_select">
                                <a href="#" class="md-btn md-btn-success md-btn-wave-light md-btn-icon waves-effect waves-button waves-light">Subscribe now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="md-card sub-3">
                        <div class="md-card-content">
                            <div class="pricing_table_plan"><i class="material-icons md-48">&#xE8D1;</i></div>
                            <div class="pricing_table_price">
                                <span class="currency">Merchant</span>
                            </div>
                            <p>Intended for traders who sell motorcycles, accessories and spare parts on a commercial level and have a physical store to sell their products</p>
                            <ul class="pricing_table_features">
                                <li><i class="material-icons">&#xE876;</i>The maximum number of permitted ads is <span>35</span></li>
                                <li><i class="material-icons">&#xE876;</i>Allowed to promote motorcycles, accessories and spare parts</li>
                                <li><i class="material-icons">&#xE876;</i>Account is <span>FREE</span></li>
                                <li><i class="material-icons">&#xE876;</i>Changing the account type is allowed after completing the requirements for the new account type</li>
                                <li><i class="material-icons">&#xE876;</i>Allowed to place motorcycles in auctions</li>
                                <li><i class="material-icons">&#xE876;</i>Physical address and phone numbers must be verified from MOTSEKLAT in order to activate your account</li>
                            </ul>
                        </div>
                        <div class="md-card-footer">
                            <div class="pricing_table_select">
                                <a href="#" class="md-btn md-btn-warning md-btn-wave-light md-btn-icon waves-effect waves-button waves-light">Subscribe now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="md-card sub-4">
                        <div class="md-card-content">
                            <div class="pricing_table_plan"><i class="material-icons md-48">&#xE7EE;</i></div>
                            <div class="pricing_table_price">
                                <span class="currency">Agency</span>
                            </div>
                            <p>Intended for motorcycles agencies in all over the Middle East</p>
                            <ul class="pricing_table_features">
                                <li><i class="material-icons">&#xE876;</i>The maximum number of permitted ads is <span>50</span></li>
                                <li><i class="material-icons">&#xE876;</i>Allowed to promote motorcycles, accessories and spare parts</li>
                                <li><i class="material-icons">&#xE876;</i>Account is <span>FREE</span></li>
                                <li><i class="material-icons">&#xE876;</i>Not allowed to changing the account type</li>
                                <li><i class="material-icons">&#xE876;</i>Not allowed to place motorcycles in auctions</li>
                                <li><i class="material-icons">&#xE876;</i>Physical address and phone numbers must be verified from MOTSEKLAT in order to activate your account</li>
                                <li><i class="material-icons">&#xE876;</i>Marketing campaigns is allowed for new products</li>
                            </ul>
                        </div>
                        <div class="md-card-footer">
                            <div class="pricing_table_select">
                                <a href="#" class="md-btn md-btn-danger md-btn-wave-light md-btn-icon waves-effect waves-button waves-light">Subscribe now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         </div>
    </section>
    
    
    <section id="sect-ads" class="section section-large">
        <div class="uk-container uk-container-center uk-invisible" data-uk-scrollspy="{cls:'uk-animation-scale-up uk-invisible',delay:300,topoffset:-100}">
            <div class="uk-grid uk-margin-large-bottom">
                <div class="uk-width-large-3-5 uk-container-center uk-text-center">
                    <h2 class="heading_b">Latest Ads</h2>
                    <span class="sub-heading">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</span>
                </div>
            </div>
            <div class="uk-tab-center">
                <ul class="uk-tab uk-tab-center uk-margin-medium-bottom" data-uk-tab="{connect:'#ads_tabs_content'}" id="ads_tabs">
                    <li class="uk-active"><a href="#">Bikes <span class="num-ads">2568</span></a></li>
                    <li><a href="#" class="named_tab">Parts <span class="num-ads">2568</span></a></li>
                    <li><a href="#" class="named_tab">Sale Offers <span class="num-ads">2568</span></a></li>
                    <li><a href="#" class="named_tab">Buying Requests <span class="num-ads">2568</span></a></li>
                    <li><a href="#" class="named_tab">Auction <span class="num-ads">2568</span></a></li>
                </ul>
            </div>
            <ul id="ads_tabs_content" class="uk-switcher uk-margin">
                <li>
                    <div class="uk-grid uk-grid-medium uk-grid-width-small-1-2 uk-grid-width-medium-1-2 uk-grid-width-large-1-4" data-uk-grid-margin>
                        <div>
                            <div class="md-card">
                                <div class="md-card-head">
                                    <img src="<?php echo  base_url('public/img/honda-cbr-150r.jpg'); ?>">
                                    <div class="price">1500$</div>
                                </div>

                                <div class="md-card-content">
                                    <div class="title">
                                        <img src="<?php echo  base_url('public/img/honda_logo.png'); ?>">
                                        <a class=" ">Honda CBR 150R</a>
                                    </div>
                                    <div class="details">
                                        <i class="material-icons">&#xE8AE;</i>
                                        <span>15 Days ago</span>
                                    </div>
                                    <div class="desc">
                                        <p class="md-color-grey-600">
                                            Bringing back the Honda Unicorn 150 certainly seems to be a ..
                                        </p>
                                    </div>
                                    
                                    <a href="#" class="user-details-name">Maged Baraka</a>
                                    
                                    <div class="user-details">
                                        <img class="md-card-head-avatar" src="<?php echo  base_url('public/img/avatars/avatar_07.png'); ?>" alt=""/>
                                        <img class="md-card-head-avatar" src="<?php echo  base_url('public/img/united-states-of-america.svg'); ?>" alt=""/>
                                        <i class="material-icons md-24 indv-type">&#xE87C;</i>
                                    </div>
                                </div>

                                <div class="md-card-footer">
                                    <div class="actions-btn">
                                        <a class="md-btn md-btn-primary md-btn-wave-light md-btn-icon waves-effect waves-button waves-light">Show More</a>
                                        <a class="md-btn md-btn-default md-btn-wave-light waves-effect waves-button waves-light">Add Ads</a>
                                    </div>
                                </div>
                            </div>     
                        </div>

                        <div>
                            <div class="md-card">
                                <div class="md-card-head">
                                    <img src="<?php echo base_url('public/img/honda-cbr-150r.jpg'); ?>">
                                    <div class="price  ">1500$</div>
                                </div>

                                <div class="md-card-content">
                                    <div class="title">
                                        <img src="<?php echo  base_url('public/img/honda_logo.png'); ?>">
                                        <a class=" ">Honda CBR 150R</a>
                                    </div>
                                    <div class="details">
                                        <i class="material-icons">&#xE8AE;</i>
                                        <span>15 Days ago</span>
                                    </div>
                                    <div class="desc">
                                        <p class="md-color-grey-600">
                                            Bringing back the Honda Unicorn 150 certainly seems to be a ..
                                        </p>
                                    </div>
                                    
                                    <a href="#" class="user-details-name">Maged Baraka</a>
                                    
                                    <div class="user-details">
                                        <img class="md-card-head-avatar" src="<?php echo  base_url('public/img/avatars/avatar_07.png'); ?>" alt=""/>
                                        <img class="md-card-head-avatar" src="<?php echo  base_url('public/img/united-states-of-america.svg'); ?>" alt=""/>
                                        <i class="material-icons md-48 dealer-type">&#xE8F9;</i>
                                    </div>
                                </div>

                                <div class="md-card-footer">
                                    <div class="actions-btn">
                                        <a class="md-btn md-btn-primary md-btn-wave-light md-btn-icon waves-effect waves-button waves-light">Show More</a>
                                        <a class="md-btn md-btn-default md-btn-wave-light waves-effect waves-button waves-light">Add Ads</a>
                                    </div>
                                </div>
                            </div>     
                        </div>

                        <div>
                            <div class="md-card">
                                <div class="md-card-head">
                                    <img src="<?php echo base_url('public/img/honda-cbr-150r.jpg'); ?>">
                                    <div class="price  ">1500$</div>
                                </div>

                                <div class="md-card-content">
                                    <div class="title">
                                        <img src="<?php echo  base_url('public/img/honda_logo.png'); ?>">
                                        <a class=" ">Honda CBR 150R</a>
                                    </div>
                                    <div class="details">
                                        <i class="material-icons">&#xE8AE;</i>
                                        <span>15 Days ago</span>
                                    </div>
                                    <div class="desc">
                                        <p class="md-color-grey-600">
                                            Bringing back the Honda Unicorn 150 certainly seems to be a ..
                                        </p>
                                    </div>
                                    
                                    <a href="#" class="user-details-name">Maged Baraka</a>
                                    
                                    <div class="user-details">
                                        <img class="md-card-head-avatar" src="<?php echo  base_url('public/img/avatars/avatar_07.png'); ?>" alt=""/>
                                        <img class="md-card-head-avatar" src="<?php echo  base_url('public/img/united-states-of-america.svg'); ?>" alt=""/>
                                        <i class="material-icons md-48 merch-type">&#xE8D1;</i>
                                    </div>
                                </div>

                                <div class="md-card-footer">
                                    <div class="actions-btn">
                                        <a class="md-btn md-btn-primary md-btn-wave-light md-btn-icon waves-effect waves-button waves-light">Show More</a>
                                        <a class="md-btn md-btn-default md-btn-wave-light waves-effect waves-button waves-light">Add Ads</a>
                                    </div>
                                </div>
                            </div>     
                        </div>

                        <div>
                            <div class="md-card">
                                <div class="md-card-head">
                                    <img src="<?php echo base_url('public/img/honda-cbr-150r.jpg'); ?>">
                                    <div class="price  ">1500$</div>
                                </div>

                                <div class="md-card-content">
                                    <div class="title">
                                        <img src="<?php echo  base_url('public/img/honda_logo.png'); ?>">
                                        <a class=" ">Honda CBR 150R</a>
                                    </div>
                                    <div class="details">
                                        <i class="material-icons">&#xE8AE;</i>
                                        <span>15 Days ago</span>
                                    </div>
                                    <div class="desc">
                                        <p class="md-color-grey-600">
                                            Bringing back the Honda Unicorn 150 certainly seems to be a ..                                       
                                        </p>
                                    </div>
                                    
                                    <a href="#" class="user-details-name">Maged Baraka</a>
                                    
                                    <div class="user-details">
                                        <img class="md-card-head-avatar" src="<?php echo  base_url('public/img/avatars/avatar_07.png'); ?>" alt=""/>
                                        <img class="md-card-head-avatar" src="<?php echo  base_url('public/img/united-states-of-america.svg'); ?>" alt=""/>
                                        <i class="material-icons md-24 agent-type">&#xEB3F;</i>
                                    </div>
                                </div>

                                <div class="md-card-footer">
                                    <div class="actions-btn">
                                        <a class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light">Show More</a>
                                        <a class="md-btn md-btn-default md-btn-wave-light waves-effect waves-button waves-light">Add Ads</a>
                                    </div>
                                </div>
                            </div>     
                        </div>
                    </div>
                </li>
                <li>
                    <div class="uk-grid uk-grid-medium uk-grid-width-small-1-2 uk-grid-width-medium-1-2 uk-grid-width-large-1-4" data-uk-grid-margin>
                        <div>
                            <div class="md-card">
                                <div class="md-card-head">
                                    <img src="<?php echo  base_url('public/img/auto-parts-01.jpg'); ?>">
                                    <div class="price  ">1500$</div>
                                </div>

                                <div class="md-card-content">
                                    <div class="title">
                                        <img src="<?php echo  base_url('public/img/honda_logo.png'); ?>">
                                        <a class=" ">Honda CBR 150R</a>
                                    </div>
                                    <div class="details">
                                        <i class="material-icons">&#xE8AE;</i>
                                        <span>15 Days ago</span>
                                    </div>
                                    <div class="desc">
                                        <p class="md-color-grey-600">
                                            Bringing back the Honda Unicorn 150 certainly seems to be a ..
                                        </p>
                                    </div>
                                    
                                    <a href="#" class="user-details-name">Maged Baraka</a>
                                    
                                    <div class="user-details">
                                        <img class="md-card-head-avatar" src="<?php echo  base_url('public/img/avatars/avatar_07.png'); ?>" alt=""/>
                                        <img class="md-card-head-avatar" src="<?php echo  base_url('public/img/united-states-of-america.svg'); ?>" alt=""/>
                                        <i class="material-icons md-24">&#xE87C;</i>
                                    </div>
                                </div>

                                <div class="md-card-footer">
                                    <div class="actions-btn">
                                        <a class="md-btn md-btn-primary md-btn-wave-light md-btn-icon waves-effect waves-button waves-light">Show More</a>
                                        <a class="md-btn md-btn-default md-btn-wave-light waves-effect waves-button waves-light">Add Ads</a>
                                    </div>
                                </div>
                            </div>     
                        </div>
                        
                        <div>
                            <div class="md-card">
                                <div class="md-card-head">
                                    <img src="<?php echo  base_url('public/img/auto-parts-02.jpg'); ?>">
                                    <div class="price  ">1500$</div>
                                </div>

                                <div class="md-card-content">
                                    <div class="title">
                                        <img src="<?php echo  base_url('public/img/honda_logo.png'); ?>">
                                        <a class=" ">Honda CBR 150R</a>
                                    </div>
                                    <div class="details">
                                        <i class="material-icons">&#xE8AE;</i>
                                        <span>15 Days ago</span>
                                    </div>
                                    <div class="desc">
                                        <p class="md-color-grey-600">
                                            Bringing back the Honda Unicorn 150 certainly seems to be a ..
                                        </p>
                                    </div>
                                    
                                    <a href="#" class="user-details-name">Maged Baraka</a>
                                    
                                    <div class="user-details">
                                        <img class="md-card-head-avatar" src="<?php echo  base_url('public/img/avatars/avatar_07.png'); ?>" alt=""/>
                                        <img class="md-card-head-avatar" src="<?php echo  base_url('public/img/united-states-of-america.svg'); ?>" alt=""/>
                                        <i class="material-icons md-24">&#xE87C;</i>
                                    </div>
                                </div>

                                <div class="md-card-footer">
                                    <div class="actions-btn">
                                        <a class="md-btn md-btn-primary md-btn-wave-light md-btn-icon waves-effect waves-button waves-light">Show More</a>
                                        <a class="md-btn md-btn-default md-btn-wave-light waves-effect waves-button waves-light">Add Ads</a>
                                    </div>
                                </div>
                            </div>     
                        </div>
                    </div>
                </li>
                <li>
                    <div class="uk-grid uk-grid-medium uk-grid-width-small-1-2 uk-grid-width-medium-1-2 uk-grid-width-large-1-4" data-uk-grid-margin>
                        <div>
                            <div class="md-card">
                                <div class="md-card-head">
                                    <img src="<?php echo base_url('public/img/honda-cbr-150r.jpg'); ?>">
                                    <div class="price"><del>1500$</del> 1000$</div>
                                </div>

                                <div class="md-card-content">
                                    <div class="title">
                                        <img src="<?php echo  base_url('public/img/honda_logo.png'); ?>">
                                        <a class=" ">Honda CBR 150R</a>
                                    </div>
                                    
                                    <div class="price  ">02 Days , 02:50 Hours Left</div>
                                    
                                    <a href="#" class="user-details-name">Maged Baraka</a>
                                    
                                    <div class="user-details">
                                        <img class="md-card-head-avatar" src="<?php echo  base_url('public/img/avatars/avatar_07.png'); ?>" alt=""/>
                                        <img class="md-card-head-avatar" src="<?php echo  base_url('public/img/united-states-of-america.svg'); ?>" alt=""/>
                                        <i class="material-icons md-24">&#xE87C;</i>
                                    </div>
                                </div>

                                <div class="md-card-footer">
                                    <div class="actions-btn">
                                        <a class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light">Bid Now</a>
                                        <a class="md-btn md-btn-default md-btn-wave-light waves-effect waves-button waves-light">Show More</a>
                                    </div>
                                </div>
                            </div>     
                        </div>
                    </div>
                </li>
                <li>
                    <div class="uk-grid uk-grid-medium uk-grid-width-small-1-2 uk-grid-width-medium-1-2 uk-grid-width-large-1-4" data-uk-grid-margin>
                        <div>
                            <div class="md-card">
                                <div class="md-card-head">
                                    <img src="<?php echo  base_url('public/img/honda-logo.jpg'); ?>">
                                </div>

                                <div class="md-card-content">
                                    <div class="title">
                                        <img src="<?php echo  base_url('public/img/honda_logo.png'); ?>">
                                        <a class=" ">Honda CBR 150R</a>
                                    </div>
                                    <div class="details">
                                        <i class="material-icons">&#xE8AE;</i>
                                        <span>15 Days ago</span>
                                    </div>
                                    <div class="desc">
                                        <p class="md-color-grey-600">
                                            Bringing back the Honda Unicorn 150 certainly seems to be a ..
                                        </p>
                                    </div>
                                    
                                    <a href="#" class="user-details-name">Maged Baraka</a>
                                    
                                    <div class="user-details">
                                        <img class="md-card-head-avatar" src="<?php echo  base_url('public/img/avatars/avatar_07.png'); ?>" alt=""/>
                                        <img class="md-card-head-avatar" src="<?php echo  base_url('public/img/united-states-of-america.svg'); ?>" alt=""/>
                                        <i class="material-icons md-24">&#xE87C;</i>
                                    </div>
                                </div>

                                <div class="md-card-footer">
                                    <div class="actions-btn">
                                        <a class="md-btn md-btn-primary md-btn-wave-light md-btn-icon waves-effect waves-button waves-light">More</a>
                                        <a class="md-btn md-btn-default md-btn-wave-light waves-effect waves-button waves-light">Add Request</a>
                                    </div>
                                </div>
                            </div>     
                        </div>
                        
                        <div>
                            <div class="md-card">
                                <div class="md-card-head">
                                    <img src="<?php echo  base_url('public/img/logo-ferrari.jpg'); ?>">
                                </div>

                                <div class="md-card-content">
                                    <div class="title">
                                        <img src="<?php echo  base_url('public/img/honda_logo.png'); ?>">
                                        <a class=" ">Honda CBR 150R</a>
                                    </div>
                                    <div class="details">
                                        <i class="material-icons">&#xE8AE;</i>
                                        <span>15 Days ago</span>
                                    </div>
                                    <div class="desc">
                                        <p class="md-color-grey-600">
                                            Bringing back the Honda Unicorn 150 certainly seems to be a ..
                                        </p>
                                    </div>
                                    
                                    <a href="#" class="user-details-name">Maged Baraka</a>
                                    
                                    <div class="user-details">
                                        <img class="md-card-head-avatar" src="<?php echo  base_url('public/img/avatars/avatar_07.png'); ?>" alt=""/>
                                        <img class="md-card-head-avatar" src="<?php echo  base_url('public/img/united-states-of-america.svg'); ?>" alt=""/>
                                        <i class="material-icons md-24">&#xE87C;</i>
                                    </div>
                                </div>

                                <div class="md-card-footer">
                                    <div class="actions-btn">
                                        <a class="md-btn md-btn-primary md-btn-wave-light md-btn-icon waves-effect waves-button waves-light">More</a>
                                        <a class="md-btn md-btn-default md-btn-wave-light waves-effect waves-button waves-light">Add Request</a>
                                    </div>
                                </div>
                            </div>     
                        </div>
                    </div>
                </li>
                <li>
                    <div class="uk-grid uk-grid-medium uk-grid-width-small-1-2 uk-grid-width-medium-1-2 uk-grid-width-large-1-4" data-uk-grid-margin>
                        <div>
                            <div class="md-card">
                                <div class="md-card-head">
                                    <img src="<?php echo base_url('public/img/honda-cbr-150r.jpg'); ?>">
                                    <div class="price  ">02 Days , 02:50 Hours Left</div>
                                </div>

                                <div class="md-card-content">
                                    <div class="title">
                                        <img src="<?php echo  base_url('public/img/honda_logo.png'); ?>">
                                        <a class=" ">Honda CBR 150R</a>
                                    </div>
                                    <div class="details">
                                        <i class="material-icons">&#xE227;</i>
                                        <span>Starting Bid : 500$ </span>
                                    </div>
                                    <div class="details">
                                        <i class="material-icons">&#xE6E1;</i>
                                        <span>Highest Bid : 2000$</span>
                                    </div>
                                    <div class="details">
                                        <i class="material-icons">&#xE7EF;</i>
                                        <span>Bid Count : 36</span>
                                    </div>
                                    
                                    <a href="#" class="user-details-name">Maged Baraka</a>
                                    
                                    <div class="user-details">
                                        <img class="md-card-head-avatar" src="<?php echo  base_url('public/img/avatars/avatar_07.png'); ?>" alt=""/>
                                        <img class="md-card-head-avatar" src="<?php echo  base_url('public/img/united-states-of-america.svg'); ?>" alt=""/>
                                        <i class="material-icons md-24">&#xE87C;</i>
                                    </div>
                                </div>

                                <div class="md-card-footer">
                                    <div class="actions-btn">
                                        <a class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light">Bid Now</a>
                                        <a class="md-btn md-btn-default md-btn-wave-light waves-effect waves-button waves-light">Show More</a>
                                    </div>
                                </div>
                            </div>     
                        </div>
                        
                        <div>
                            <div class="md-card">
                                <div class="md-card-head">
                                    <img src="<?php echo base_url('public/img/honda-cbr-150r.jpg'); ?>">
                                    <div class="price  ">02 Days , 02:50 Hours Left</div>
                                </div>

                                <div class="md-card-content">
                                    <div class="title">
                                        <img src="<?php echo  base_url('public/img/honda_logo.png'); ?>">
                                        <a class=" ">Honda CBR 150R</a>
                                    </div>
                                    <div class="details">
                                        <i class="material-icons">&#xE227;</i>
                                        <span>Starting Bid : 500$ </span>
                                    </div>
                                    <div class="details">
                                        <i class="material-icons">&#xE6E1;</i>
                                        <span>Highest Bid : 2000$</span>
                                    </div>
                                    <div class="details">
                                        <i class="material-icons">&#xE7EF;</i>
                                        <span>Bid Count : 36</span>
                                    </div>
                                    
                                    <a href="#" class="user-details-name">Maged Baraka</a>
                                    
                                    <div class="user-details">
                                        <img class="md-card-head-avatar" src="<?php echo  base_url('public/img/avatars/avatar_07.png'); ?>" alt=""/>
                                        <img class="md-card-head-avatar" src="<?php echo  base_url('public/img/united-states-of-america.svg'); ?>" alt=""/>
                                        <i class="material-icons md-24">&#xE87C;</i>
                                    </div>
                                </div>

                                <div class="md-card-footer">
                                    <div class="actions-btn">
                                        <a class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light">Bid Now</a>
                                        <a class="md-btn md-btn-default md-btn-wave-light waves-effect waves-button waves-light">Show More</a>
                                    </div>
                                </div>
                            </div>     
                        </div>
                        
                        <div>
                            <div class="md-card">
                                <div class="md-card-head">
                                    <img src="<?php echo base_url('public/img/honda-cbr-150r.jpg'); ?>">
                                    <div class="price  ">02 Days , 02:50 Hours Left</div>
                                </div>

                                <div class="md-card-content">
                                    <div class="title">
                                        <img src="<?php echo  base_url('public/img/honda_logo.png'); ?>">
                                        <a class=" ">Honda CBR 150R</a>
                                    </div>
                                    <div class="details">
                                        <i class="material-icons">&#xE227;</i>
                                        <span>Starting Bid : 500$ </span>
                                    </div>
                                    <div class="details">
                                        <i class="material-icons">&#xE6E1;</i>
                                        <span>Highest Bid : 2000$</span>
                                    </div>
                                    <div class="details">
                                        <i class="material-icons">&#xE7EF;</i>
                                        <span>Bid Count : 36</span>
                                    </div>
                                    
                                    <a href="#" class="user-details-name">Maged Baraka</a>
                                    
                                    <div class="user-details">
                                        <img class="md-card-head-avatar" src="<?php echo  base_url('public/img/avatars/avatar_07.png'); ?>" alt=""/>
                                        <img class="md-card-head-avatar" src="<?php echo  base_url('public/img/united-states-of-america.svg'); ?>" alt=""/>
                                        <i class="material-icons md-24">&#xE87C;</i>
                                    </div>
                                </div>

                                <div class="md-card-footer">
                                    <div class="actions-btn">
                                        <a class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light">Bid Now</a>
                                        <a class="md-btn md-btn-default md-btn-wave-light waves-effect waves-button waves-light">Show More</a>
                                    </div>
                                </div>
                            </div>     
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </section>
    
    <section class="section section_large" id="sect-latest-news">
        <div class="uk-container uk-container-center">            
            <div class="uk-grid">
                <div class="uk-width-large-3-5 uk-container-center uk-text-center">
                    <h2 class="heading_b">
                        Latest News
                    </h2>
                    <span class="sub-heading">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto autem consectetur cupiditate, distinctio impedit quisquam rerum voluptas. Fugiat, repudiandae, sit.</span>
                </div>
            </div>
            <div class="uk-grid">
                <div class="uk-width-large-2-5 uk-container-center uk-text-center">
                    <div>
                        <div class="md-card">
                            <div class="md-card-head">
                                <img src="<?php echo  base_url('public/img/gallery/Image01.jpg'); ?>" alt="" class="blog_list_teaser_image">
                            </div>
                            <div class="md-card-content">
                                <div class="blog_list_teaser">
                                    <h2 class="blog_list_teaser_title uk-text-truncate">Porro doloribus.</h2>
                                    <span class="uk-text-muted uk-text-small"><i class="material-icons">&#xE616;</i> 18.06.2016</span>
                                    <span><i class="material-icons">&#xE0B9;</i> <small>225</small></span>
                                    <p>Eos et officiis ut commodi pariatur iure aut tempora nulla nobis ipsum ut dolore et Eos et officiis ut commodi pariatur iure aut tempora nulla nobis ipsum ut dolore et.</p>
                                </div>
                            </div>
                            <div class="md-card-footer uk-text-left"> 
                                <a href="page_blog_article.html" class="md-btn md-btn-default md-btn-wave-light md-btn-icon waves-effect waves-button waves-light">
                                    Read more
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="uk-width-large-3-5 uk-container-center uk-text-center">
                    <div class="md-card news-list">
                        <div class="md-card-content">
                            <ul class="news-list">
                                <li>
                                    <img src="<?php echo  base_url('public/img/gallery/Image01.jpg'); ?>" alt="" class="news_list_thumb">
                                    <div class="news_list_content">
                                        <h3 class="news_list_heading"><a href="dashboard/pages-visitor/single-post.html">Voluptatum itaque sed.</a></h3>
                                        <div class="news_list_info">
                                            <span class="uk-text-muted uk-text-small"><i class="material-icons">&#xE616;</i> 18.06.2016</span>
                                        <span><i class="material-icons">&#xE0B9;</i> <small>225</small></span>
                                        </div>
                                        <p>Quaerat qui ut sunt quod laboriosam est quia incidunt excepturi sint a repudiandae doloremque voluptatem eius reiciendis autem perspiciatis quia rerum vero...</p>
                                    </div>
                                </li>
                                
                                <li>
                                    <img src="<?php echo  base_url('public/img/gallery/Image01.jpg'); ?>" alt="" class="news_list_thumb">
                                    <div class="news_list_content">
                                        <h3 class="news_list_heading"><a href="dashboard/pages-visitor/single-post.html">Voluptatum itaque sed.</a></h3>
                                        <div class="news_list_info">
                                            <span class="uk-text-muted uk-text-small"><i class="material-icons">&#xE616;</i> 18.06.2016</span>
                                        <span><i class="material-icons">&#xE0B9;</i> <small>225</small></span>
                                        </div>
                                        <p>Quaerat qui ut sunt quod laboriosam est quia incidunt excepturi sint a repudiandae doloremque voluptatem eius reiciendis autem perspiciatis quia rerum vero...</p>
                                    </div>
                                </li>
                                
                                <li>
                                    <img src="<?php echo  base_url('public/img/gallery/Image01.jpg'); ?>" alt="" class="news_list_thumb">
                                    <div class="news_list_content">
                                        <h3 class="news_list_heading"><a href="dashboard/pages-visitor/single-post.html">Voluptatum itaque sed.</a></h3>
                                        <div class="news_list_info">
                                            <span class="uk-text-muted uk-text-small"><i class="material-icons">&#xE616;</i> 18.06.2016</span>
                                        <span><i class="material-icons">&#xE0B9;</i> <small>225</small></span>
                                        </div>
                                        <p>Quaerat qui ut sunt quod laboriosam est quia incidunt excepturi sint a repudiandae doloremque voluptatem eius reiciendis autem perspiciatis quia rerum vero...</p>
                                    </div>
                                </li>
                                
                                <div class="actions-btn uk-text-left">
                                    <a href="page_blog_article.html" class="md-btn md-btn-default md-btn-wave-light md-btn-icon waves-effect waves-button waves-light">
                                        Show All
                                    </a>
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- footer -->
    <footer id="sect-contact">
        <section class="section upper-footer">
            <div class="uk-container uk-container-center">
                <div class="uk-grid uk-grid-width-small-1-2 uk-grid-width-medium-1-2 uk-grid-width-large-1-4" data-uk-grid-margin>
                <div>
                    <span class="uk-text-truncate">Motseklat Tweets</span>
                    <ul class="md-list md-list-addon">
                        <li>
                            <div class="md-list-addon-element">
                                <i class="uk-icon-twitter uk-icon-small"></i>
                            </div>
                            <div class="md-list-content">
                                <p><a href="#"><strong>@motseklat</strong></a><span>Eos et officiis ut commodi pariatur iure aut tempora nulla nobis ipsum ut dolore et Eos et officiis ut</span></p>
                                <span class="uk-text-small uk-text-muted">5 days ago</span>
                            </div>
                        </li>
                        <li>
                            <div class="md-list-addon-element">
                                <i class="uk-icon-twitter uk-icon-small"></i>
                            </div>
                            <div class="md-list-content">
                                <p><a href="#"><strong>@motseklat</strong></a><span>Eos et officiis ut commodi pariatur iure aut tempora nulla nobis ipsum ut dolore et Eos et officiis ut</span></p>
                                <span class="uk-text-small uk-text-muted">5 days ago</span>
                            </div>
                        </li>
                        
                   </ul>
                </div>
                <div>
                    <span class="uk-text-truncate">Help</span>
                    <ul class="md-list footer-links">
                        <li class="md-list-content">
                            <div class="md-list-heading">
                                <i class="material-icons">&#xE837;</i><a href="dashboard/terms-of-services.html">Terms & Conditions</a>
                            </div>
                        </li>
                        <li class="md-list-content">
                            <div class="md-list-heading">
                                <i class="material-icons">&#xE837;</i><a href="dashboard/faq.html">FAQ</a>
                            </div>
                        </li>
                        <li class="md-list-content">
                            <div class="md-list-heading">
                                <i class="material-icons">&#xE837;</i><a href="dashboard/privacy-statement.html">Privacy Statment</a>
                            </div>
                        </li>
                        <li class="md-list-content">
                            <div class="md-list-heading">
                                <i class="material-icons">&#xE837;</i><a href="dashboard/contact-us.html">Contact us</a>
                            </div>
                        </li>
                        <li class="md-list-content">
                            <div class="md-list-heading">
                                <i class="material-icons">&#xE837;</i><a href="dashboard/about.html">About</a>
                            </div>
                        </li>
                        <li class="md-list-content">
                            <div class="md-list-heading">
                                <i class="material-icons">&#xE837;</i><a href="dashboard/advertise-with-us.html">Advertise with us</a>
                            </div>
                        </li>
                   </ul>
                </div>
                <div>
                    <span class="uk-text-truncate">Top Links</span>
                    <ul class="md-list footer-links">
                        <li class="md-list-content">
                            <div class="md-list-heading">
                                <i class="material-icons">&#xE837;</i><a href="">Home</a>
                            </div>
                        </li>
                        <li class="md-list-content">
                            <div class="md-list-heading">
                                <i class="material-icons">&#xE837;</i><a href="">Our Services</a>
                            </div>
                        </li>
                        <li class="md-list-content">
                            <div class="md-list-heading">
                                <i class="material-icons">&#xE837;</i><a href="">New Account</a>
                            </div>
                        </li>
                        <li class="md-list-content">
                            <div class="md-list-heading">
                                <i class="material-icons">&#xE837;</i><a href="">Latest Ads</a>
                            </div>
                        </li>
                   </ul>
                </div>
                <div>
                    <div class="footer-logo">
                        <a href="">
                            <img src="<?php echo  base_url('public/img/logo-w.png'); ?>" alt="" width="180" height="20">
                        </a>
                        <span>By RIDERS ... For RIDERS</span>
                    </div>
                    <div class="news-letter">
                        <span class="uk-text-truncate">Newsletters Subscribtion</span>
                        <form id="form_validation" class="uk-form-stacked" novalidate="">
                            <div class="parsley-row">
                                <div class="md-input-wrapper">
                                    <label for="email">Email<span class="req"> *</span></label>
                                    <input type="email" name="email" data-parsley-trigger="change" required="" class="md-input">
                                    <span class="md-input-bar"></span>
                                </div>        
                            </div>
                            <button type="submit" class="md-btn md-btn-primary md-btn-block">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <section class="section lower-footer">
            <div class="uk-container uk-container-center">            
                <div class="uk-grid">
                    <div class="uk-width-large-1-2 uk-container-center uk-text-left">
                        <div class="social-icons">
                            <div class="uk-align-medium-left uk-text-center-medium">
                                <a href="#" class="uk-margin-medium-right" title="Facebook">
                                    <i class="uk-icon-facebook uk-icon-small"></i>
                                </a>
                                <a href="#" class="uk-margin-medium-right" title="Twitter">
                                    <i class="uk-icon-twitter uk-icon-small"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="uk-width-large-1-2 uk-container-center uk-text-left">
                        <div class="copyrights">© 2015 <a href="#">Motseklat.</a> All rights reserved</div>
                    </div>
                </div>
            </div>
        </section>
    </footer>
        
  <!-- google web fonts -->
    <script>
        WebFontConfig = {
            google: {
                families: [
                    'Source+Code+Pro:400,700:latin',
                    'Roboto:100,200,400,300,500,900,700,400italic:latin'
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="<?php echo  base_url('public/js/custom/custom.js'); ?>"></script>
    <script src="<?php echo  base_url('public/js/common.min.js'); ?>"></script>
    
    <!-- uikit functions -->
    <script src="<?php echo  base_url('public/js/uikit_custom.min.js'); ?>"></script>
    
    <!-- altair common functions/helpers -->
    <script src="<?php echo  base_url('public/js/altair_admin_common.min.js'); ?>"></script>

    <!-- altair common functions/helpers -->
    <script src="<?php echo  base_url('public/js/altair_lp_common.js'); ?>"></script>

    <!-- page specific plugins -->
    <!-- parsley (validation) -->
    <script>
    // load parsley config (altair_admin_common.js)
    altair_forms.parsley_validation_config();
    // load extra validators
    altair_forms.parsley_extra_validators();
    </script>
    <script src="<?php echo  base_url('public/bower_components/parsleyjs/dist/parsley.min.js'); ?>"></script>
    
    <script>
        $(function() {
            if(isHighDensity()) {
                $.getScript( "public/bower_components/dense/src/dense.js", function() {
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

    </script>

</body>
</html>