<div class="cell-7 contact-form fx" data-animate="fadeInLeft">
    <h3 class="block-head">بيانات الحساب</h3>
    <form method="post" enctype="multipart/form-data" action="<?= base_url('home/do_register') ?>" id="register_form">
        <div id="alert_message" class="box fx" data-animate="fadeInLeft">
            <a class="close-box" href="#"><i class="fa fa-times"></i></a>
            <p></p>
        </div>
        <div class="form-input cell-6">
            <label>نوع الحساب<span class="red">*</span></label>
            <span>
                <select name="user_type" class="form-control">
                    <option selected="" value="">الرجاء إختيار نوع الحساب</option>  
                    <option value="1">شخصي</option>  
                    <option value="2">مستورد مستقل</option>
                    <option value="3">معرض</option>
                    <option value="4">توكيل</option>
                </select>
            </span>
        </div>
        <div class="form-input cell-6">
            <label>الإسم بالكامل<span class="red">*</span></label>
            <span class="input-icon input-icon-left">
                <input type="text" name="full_name" class="form-control">
                <i class="fa fa-user"></i> 
            </span>
        </div>
        <div class="form-input cell-6">
            <label>إسم المستخدم<span class="red">*</span></label>
            <span class="input-icon input-icon-left">
                <input type="text" name="username" class="form-control">
                <i class="fa fa-user"></i> 
            </span>
        </div>
        <div class="form-input cell-6">
            <label>رقم الموبايل<span class="red">*</span></label>
            <span class="input-icon input-icon-left">
                <input type="text" name="mobile" class="form-control">
                <i class="fa fa-mobile"></i> 
            </span>
        </div>
        <div class="form-input cell-6">
            <label>كلمة المرور<span class="red">*</span></label>
            <span class="input-icon input-icon-left">
                <input type="password" name="password" class="form-control">
                <i class="fa fa-key"></i> 
            </span>
        </div>
        <div class="form-input cell-6">
            <label>تأكيد كلمة المرور<span class="red">*</span></label>
            <span class="input-icon input-icon-left">
                <input type="password" name="confirm_password" class="form-control">
                <i class="fa fa-key"></i> 
            </span>
        </div>
        <div class="form-input cell-6">
            <label>البريد الإلكتروني<span class="red">*</span></label>
            <span class="input-icon input-icon-left">
                <input type="email" name="email" class="form-control">
                <i class="fa fa-envelope"></i> 
            </span>
        </div>
        <div class="form-input cell-6">
            <label>تأكيد البريد الإلكتروني<span class="red">*</span></label>
            <span class="input-icon input-icon-left">
                <input type="email" name="confirm_email" class="form-control">
                <i class="fa fa-envelope"></i> 
            </span>
        </div>
        <div class="form-input cell-6">
            <label>الدولة<span class="red">*</span></label>
            <select name="country_id" id="country_id" class="form-control">
                <option selected="" value="">الرجاء إختيار الدولة</option>  
                <?php
                foreach ($countries as $country) {
                    echo '<option value="' . $country->id . '">' . $country->name . '</option>';
                }
                ?>
            </select>
        </div>
        <div class="form-input cell-6">
            <label>المدينة<span class="red">*</span></label>
            <select name="city_id" id="city_id" class="form-control">
                <option selected="" value="">الرجاء إختيار المدينة</option>  
            </select>
        </div>
        <div class="form-input cell-12">
            <input type="checkbox" name="agreement" value="true"><a target="_blank" href="<?= base_url('home/terms') ?>">أوافق على بنود خدمة وسياسة إستخدام موقع متسيكلات</a>
        </div>
        <div class="cell-1">
            <span><img src="<?php echo base_url('assets/front_end/images/ajax-loader.gif'); ?>" class="loader hidden" alt="جاري التحميل..." /></span>
        </div>
        <div class="form-input cell-11">
            <input type="submit" id="do_register" class="btn btn-large main-bg" value="إرسال">&nbsp;&nbsp;<input type="reset" class="btn btn-large" value="إلغاء">
        </div>
    </form>

    <!-- wide-ads-728x90 start -->			
    <?php $this->load->view('front_end/ads/wide_responsive'); ?>
    <!-- wide-ads-728x90 end -->

</div>