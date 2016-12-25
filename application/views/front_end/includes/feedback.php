<div id="feedback" class="feedback">
    <div class="cell-11 contact-form fx padd-top-20" data-animate="fadeInLeft" id="contact">
        <h3 class="block-head">رأيـــك يهمنــــا</h3>
        <div id="alert_message" class="box fx" data-animate="fadeInLeft">
            <a class="close-box" href="#"><i class="fa fa-times"></i></a>
            <p></p>
        </div>
        <form class="form-signin cform" method="post" enctype="multipart/form-data" action="<?=base_url('home/do_feedback')?>" id="add_feedback" autocomplete="on">
            <div class="form-input">
                <label>الإسم بالكامل<span class="red">*</span></label>
                <input type="text" required="required" name="full_name">
            </div>
            <div class="form-input">
                <label>البريد الإلكتروني<span class="red">*</span></label>
                <input name="email" type="email" required="required">
            </div>
            <div class="form-input">
                <label>الملاحظات<span class="red">*</span></label>
                <textarea required="required" name="notes" cols="40" rows="2" spellcheck="true"></textarea>
            </div>
            <div class="form-input">
                <input type="submit" class="btn btn-large main-bg" value="أرسل الأن">
                <span><img src="<?php echo base_url('assets/front_end/images/ajax-loader.gif'); ?>" class="loader hidden" alt="جاري التحميل..." /></span>
            </div>
        </form>
    </div>
</div>

<div id="feedback-btn" class= "feedback-btn">
    <img alt="" src="<?php echo base_url(); ?>assets/front_end/images/basic/feedback.png">
</div>