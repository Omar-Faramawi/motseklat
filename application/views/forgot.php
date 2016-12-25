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
                                        <i class="material-icons md-48">&#xE898;</i>
                                        <h3>Fill the form below and reset your password</h3>
                                    </div>
                                   <form action="<?= base_url('forgot')?>" method="post" id="do_forgot" enctype="multipart/form-data">
                                    <div id="login_message" class='uk-alert' style="display: none;"></div>
                                        <div class="uk-form-row">
                                            <div class="parsley-row">
                                                <label for="email">Email<span class="req">*</span>
                                                </label>
                                                <input type="email" name="email" data-parsley-trigger="change" required class="md-input" />
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
    </div>
</div>