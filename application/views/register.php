<div id="page_content">
    <div id="page_content_inner">

        <h2 class="heading_b uk-margin-bottom">Create New Account</h2>

        <div class="uk-grid">
            <div class="uk-width-large-4-5 uk-container-center">
                <div>
                    <div class="md-card">
                        <div class="md-card-content">
                             <form class="uk-form-stacked" name="register_form" method="post" enctype="multipart/form-data" action="<?= base_url('register') ?>" id="wizard_advanced_form">
                                <div id="wizard_advanced" class="wizard" role="application">

                                    <!-- first section -->
                                    <h3>Subscrubtuions</h3>
                                    <section>
                                        <div class="uk-accordion" data-uk-accordion>
                                            <h3 class="uk-accordion-title">Individual</h3>
                                            <div class="uk-accordion-content">
                                                <p>
                                                    Intended for individuals who wish to sell their motorcycles in particular, or sell a product they own on a personal level
                                                </p>
                                                <ul class="pricing_table_features">
                                                    <li><i class="material-icons">&#xE876;</i>The maximum number of permitted ads is <span>5</span>
                                                    </li>
                                                    <li><i class="material-icons">&#xE876;</i>Allowed to promote motorcycles, accessories and spare parts</li>
                                                    <li><i class="material-icons">&#xE876;</i>Account is <span>FREE</span>
                                                    </li>
                                                    <li><i class="material-icons">&#xE876;</i>Changing the account type is allowed after completing the requirements for the new account type</li>
                                                    <li><i class="material-icons">&#xE876;</i>Allowed to place motorcycles in auctions</li>
                                                </ul>
                                            </div>
                                            <h3 class="uk-accordion-title">Dealer</h3>
                                            <div class="uk-accordion-content">
                                                <p>
                                                    Intended for traders who sell motorcycles, accessories and spare parts on a commercial level and don’t have a physical store to sell their products
                                                </p>
                                                <ul class="pricing_table_features">
                                                    <li><i class="material-icons">&#xE876;</i>The maximum number of permitted ads is <span>15</span>
                                                    </li>
                                                    <li><i class="material-icons">&#xE876;</i>Allowed to promote motorcycles, accessories and spare parts</li>
                                                    <li><i class="material-icons">&#xE876;</i>Account is <span>FREE</span>
                                                    </li>
                                                    <li><i class="material-icons">&#xE876;</i>Changing the account type is allowed after completing the requirements for the new account type</li>
                                                    <li><i class="material-icons">&#xE876;</i>Allowed to place motorcycles in auctions</li>
                                                </ul>
                                            </div>
                                            <h3 class="uk-accordion-title">Merchant</h3>
                                            <div class="uk-accordion-content">
                                                <p>
                                                    Intended for traders who sell motorcycles, accessories and spare parts on a commercial level and have a physical store to sell their products
                                                </p>
                                                <ul class="pricing_table_features">
                                                    <li><i class="material-icons">&#xE876;</i>The maximum number of permitted ads is <span>35</span>
                                                    </li>
                                                    <li><i class="material-icons">&#xE876;</i>Allowed to promote motorcycles, accessories and spare parts</li>
                                                    <li><i class="material-icons">&#xE876;</i>Account is <span>FREE</span>
                                                    </li>
                                                    <li><i class="material-icons">&#xE876;</i>Changing the account type is allowed after completing the requirements for the new account type</li>
                                                    <li><i class="material-icons">&#xE876;</i>Allowed to place motorcycles in auctions</li>
                                                    <li><i class="material-icons">&#xE876;</i>Physical address and phone numbers must be verified from MOTSEKLAT in order to activate your account</li>
                                                </ul>
                                            </div>
                                            <h3 class="uk-accordion-title">Agency</h3>
                                            <div class="uk-accordion-content">
                                                <p>
                                                    Intended for motorcycles agencies in all over the Middle East
                                                </p>
                                                <ul class="pricing_table_features">
                                                    <li><i class="material-icons">&#xE876;</i>The maximum number of permitted ads is <span>50</span>
                                                    </li>
                                                    <li><i class="material-icons">&#xE876;</i>Allowed to promote motorcycles, accessories and spare parts</li>
                                                    <li><i class="material-icons">&#xE876;</i>Account is <span>FREE</span>
                                                    </li>
                                                    <li><i class="material-icons">&#xE876;</i>Not allowed to changing the account type</li>
                                                    <li><i class="material-icons">&#xE876;</i>Not allowed to place motorcycles in auctions</li>
                                                    <li><i class="material-icons">&#xE876;</i>Physical address and phone numbers must be verified from MOTSEKLAT in order to activate your account</li>
                                                    <li><i class="material-icons">&#xE876;</i>Marketing campaigns is allowed for new products</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </section>

                                    <!-- second section -->
                                    <h3>Account Informaitions</h3>
                                    <section id='register-form'>
                                        <div id="alert_message" class="uk-alert" style="display: none;"></div>
                                        <div class="uk-grid" data-uk-grid-margin>
                                            <div class="uk-width-medium-1-2 parsley-row">
                                                <select id="select_demo_4" required name="user_type" parsley-row data-md-selectize-bottom>
                                                    <option value="">Subscribtion Type</option>
                                                    <option value="1">Personal</option>
                                                    <option value="2">Dealer</option>
                                                    <option value="3">Merchant</option>
                                                    <option value="4">Agency</option>
                                                </select>
                                            </div>

                                            <div class="uk-width-medium-1-2 parsley-row">
                                                <label>Full Name <span class="req">*</span>
                                                </label>
                                                <input type="text" name="full_name" class="md-input" required />
                                            </div>

                                            <div class="uk-width-medium-1-2 parsley-row">
                                                <label>Username <span class="req">*</span>
                                                </label>
                                                <input type="text" name="username" class="md-input" required >
                                            </div>

                                            <div class="uk-width-medium-1-2 parsley-row">
                                                <label>Mobile Number <span class="req">*</span>
                                                </label>
                                                <input type="text" name="mobile" class="md-input" required />
                                            </div>

                                            <div class="uk-width-medium-1-2 parsley-row">
                                                <label>Password<span class="req">*</span>
                                                </label>
                                                <input type="password" name="password" class="md-input" required />
                                            </div>

                                            <div class="uk-width-medium-1-2 parsley-row">
                                                <label>Confirm Password<span class="req">*</span>
                                                </label>
                                                <input type="password" name="confirm_password" class="md-input" required />
                                            </div>

                                            <div class="uk-width-medium-1-2 parsley-row">
                                                <label>Email <span class="req">*</span>
                                                </label>
                                                <input type="email" name="email" class="md-input" required />
                                            </div>

                                            <div class="uk-width-medium-1-2 parsley-row">
                                                <label>Confirm Email <span class="req">*</span>
                                                </label>
                                                <input type="email" name="confirm_email" class="md-input" required />
                                            </div>

                                            <div class="uk-width-medium-1-2 parsley-row">
                                                <select name="country_id" required id="select-state"  parsley-row data-md-selectize-bottom>
                                                    <option value="">Country</option>
                                                    <?php
                                                        foreach ($countries as $country) {
                                                            echo '<option value="' . $country->id . '">' . $country->name . '</option>';
                                                        }
                                                    ?>
                                                </select>
                                            </div>

                                            <div class="uk-width-medium-1-2 parsley-row " >
                                                <select name="city_id" id="select-city" class="city-selection" required parsley-row data-md-selectize-bottom>
                                                    <option value="">City</option>
                                                </select>
                                            </div>
                                            
                                            <div class="uk-form-row">
                                                <div class="parsley-row" required>
                                                    <div class="g-recaptcha" data-sitekey="6Lfuzw8UAAAAAJFYJBAenzGLHTnlDVE2Y-0W8lvF"></div>
                                                </div>
                                            </div>

                                            <div class="uk-width-medium-1-1 parsley-row">
                                                <span class="icheck-inline uk-margin-top uk-margin-left">
                                                    <input type="checkbox" name="agreement" id="wizard_agree" class="wizard-icheck" required value="1" />
                                                    <label for="wizard_agree" class="inline-label">I agree to the terms and conditions</label>
                                                </span>
                                            </div>
                                        </div>
                                    </section>

                                    <!-- third section -->
                                    <h3>Congratulations</h3>
                                    <section>
                                        <i class="material-icons">&#xE876;</i>
                                        <h2 class="heading_b">Congratulations</h2>
                                        <p>We sent an email with activation link go to email and activate your account</p>
                                    </section>
                                </div>
                            
                            </form>
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
    </div>
</div>