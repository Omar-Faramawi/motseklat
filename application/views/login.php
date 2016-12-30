<div id="page_content">
    <div id="page_content_inner">

        <h2 class="heading_b uk-margin-bottom">Login</h2>

        <div class="uk-grid">
            <div class="uk-width-large-4-5 uk-container-center">
                <div>
                    <div class="md-card">
                        <div class="md-card-content">
                            <div class="uk-grid" data-uk-grid-margin>
                                <div class="uk-width-medium-2-3 uk-container-center login-wrap">
                                    <div class="login_heading uk-text-center">
                                        <i class="material-icons md-48">&#xE87C;</i>
                                        <h3>Fill the form below and access to your account</h3>
                                    </div>
                                    <?php if($this->session->flashdata('error')){ ?>
                                    <div class="uk-alert uk-alert-danger">
                                        <?php echo $this->session->flashdata('error'); ?></div>
                                    <?php }elseif($this->session->flashdata('success')){ ?>
                                    <div class="uk-alert uk-alert-success">
                                        <?php echo $this->session->flashdata('success'); ?></div>
                                    <?php } ?>
                                    <form action="<?= base_url('login')?>" method="post" id="do_login" enctype="multipart/form-data" >
                                        <div id="login_message" class='uk-alert' style="display: none;"></div>
                                        <div class="uk-form-row">
                                            <div class="parsley-row">
                                                <label for="email">Email<span class="req">*</span>
                                                </label>
                                                <input type="email" name="username" data-parsley-trigger="change" required class="md-input" />
                                            </div>
                                        </div>
                                        <div class="uk-form-row">
                                            <div class="parsley-row">
                                                <label for="login_password">Password<span class="req">*</span>
                                                </label>
                                                <input type="password" name="password" class="md-input" required />
                                            </div>
                                        </div>

                                        <!--<div class="uk-form-row">
                                                <div class="parsley-row">
                                                    <div class="g-recaptcha" data-sitekey="6LcVawgUAAAAAEljX7BVoH2CM-cfkf5XtbyJphBf"></div>
                                                </div>
                                            </div>-->
                                        <div class="uk-margin-medium-top">
                                            <button type="submit" class="md-btn md-btn-block md-btn-large md-btn-primary">Login</button>
                                        </div>
                                    </form>

                                    <div class="uk-margin-top">
                                        <a href="<?php echo base_url('auth/forgot');?>">Forgot Your Password?</a>
                                    </div>
                                    <div class="uk-margin-top">
                                        <a href="<?php echo base_url('auth/register'); ?>">Not a member? Sign up now!</a>
                                    </div>
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

    </div>
</div>