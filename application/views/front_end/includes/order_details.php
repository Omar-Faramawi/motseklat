<?php if ($order != NULL) { ?>
    <div class="cell-9">
        <h4 class="block-head">                                    
            <?= $order->title ?>
        </h4>
        <div class="product-specs product-block list-item left cell-6">
            <label class="control-label cell-5"><i class="fa fa-money"></i>السعر:</label>
            <span class="price"><?= $order->price . ' ' . $order->currency_name ?></span>
        </div>
        <div class="product-specs product-block list-item left cell-6">
            <label class="control-label cell-6"><i class="fa fa-eye"></i>تاريخ الصنع:</label>
            <span><?= $order->production_date ?></span>
        </div>
        <div class="product-specs product-block list-item cell-12 hidden" id="advertiser_mobile">
            <label class="control-label cell-7"><i class="fa fa-paper-plane-o"></i> رقم الموبايل الخاص بالمعلن:</label>
            <span class="main-color bold"><?= $order->mobile ?></span>
        </div>
    </div>
    <div class="cell-3 center">
        <img width="100%" height="100%" alt="<?=$order->title?>" src="<?=base_url('uploads/companies/' . $order->manufacturer_image)?>" />
    </div>
    <div class="product-specs  product-block list-item cell-12">
        <label class="control-label cell-12"><i class="fa fa-align-justify"></i>بيانات المعلن:</label>
        <div class="cell-6">
            <label class="control-label cell-3">الإسم:</label>
            <span><?= $order->full_name ?></span>
        </div>
        <div class="cell-6">
            <label class="control-label cell-5">طبيعة المعلن:</label>
            <span><?= $order->user_type ?></span>
        </div>
        <div class="cell-6">
            <label class="control-label cell-3">الدولة:</label>
            <span><?= $order->country_name ?></span>
        </div>
        <div class="cell-6">
            <label class="control-label cell-4">المدينة:</label>
            <span><?= $order->city_name ?></span>
        </div>
    </div>
    <div class="product-specs  product-block list-item cell-12">
        <label class="control-label cell-12"><i class="fa fa-align-justify"></i> المواصفات:</label>
        <div class="cell-4">
            <label class="control-label cell-8">الشركة المصنعه:</label>
            <span><?= $order->manufacturer_name ?></span>
        </div>
        <div class="cell-4">
            <label class="control-label cell-5">الموديل:</label>
            <span><?= $order->model_name ?></span>
        </div>
        <div class="cell-4">
            <label class="control-label cell-4">الحالة:</label>
            <span><?php
                if ($order->status == 1) {
                    echo 'جديد';
                } else if ($order->status == 2) {
                    echo 'مستعمل';
                }else{
                    echo 'جديد/مستعمل';
                }
                ?>
            </span>
        </div>
    </div>
    <div class="product-specs  product-block list-item cell-12">
        <label class="control-label cell-12"><i class="fa fa-align-justify"></i> تفاصيل الطلب:</label>
        <span><?= $order->description ?></span>
    </div>
    <div class="product-block cell-12">
        <label class="control-label cell-5">شارك هذا الإعلان على :</label>
        <a style="background-color:#2d609b;" target="_blank" href="https://facebook.com/sharer/sharer.php?u=<?php echo base_url('home/order/' . $order->id); ?>" class="btn btn-small">Facebook</a>
        <a style="background-color:#00c3f3;" target="_blank" href="https://twitter.com/home?status=<?php echo base_url('home/order/' . $order->id); ?>" class="btn btn-small">Twitter</a>
        <a style="background-color:#d34836;" target="_blank" href="https://plus.google.com/share?url=<?php echo base_url('home/order/' . $order->id); ?>" class="btn btn-small">Google Plus</a>
    </div>
    <!-- wide-default-728x90-ads start -->
    <?php $this->load->view('front_end/ads/wide_728x90_default_color'); ?>
    <!-- wide-default-728x90-ads end -->
    <div class="clearfix"></div>
    <div class="padd-top-20"></div>
    <hr class="hr-style5">
    <div class="clearfix padd-bottom-20"></div>

    <div class="cell-12">
        <div class="row">
            <div class="comments">
                <h3 class="block-head">التعليقات</h3>
            </div>
            <?php $this->load->view('front_end/includes/comments_form'); ?>
        </div>
    </div>
<?php } ?>