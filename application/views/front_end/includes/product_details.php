<?php if ($product != NULL) { ?>
    <div class="cell-8">
        <h4 class="block-head">                                    
            <?= $product->title ?>
        </h4>
        <div class="product-specs product-block list-item left cell-12">
            <label class="control-label cell-3"><i class="fa fa-money"></i>السعر:</label>
            <span class="price"><?= $product->price . ' ' . $product->currency_name ?></span>
        </div>
        <div class="product-specs product-block list-item left cell-6">
            <label class="control-label cell-9"><i class="fa fa-eye"></i>عدد المشاهدات:</label>
            <span><?= $product->views ?></span>
        </div>
        <div class="product-specs product-block list-item left cell-6">
            <label class="control-label cell-9"><i class="fa fa-star"></i>عدد المهتمين:</label>
            <span><?= $product->interested ?></span>
        </div>
        <div class="product-specs product-block list-item cell-12">
            <label class="control-label cell-7"><i class="fa fa-paper-plane-o"></i>للتواصل مع المعلن:</label>
            <input type="button" id="show_product_advertiser_mobile" value="رقم الموبايل" class="btn btn-medium main-bg">
            <input type="hidden" id="product_id" value="<?= $product->id ?>" class="hidden">
        </div>
        <div class="product-specs product-block list-item cell-12 hidden" id="advertiser_mobile">
            <label class="control-label cell-7"><i class="fa fa-paper-plane-o"></i> رقم الموبايل الخاص بالمعلن:</label>
            <span class="main-color bold"><?= $product->mobile ?></span>
        </div>
        <div class="product-specs  product-block list-item cell-12">
            <label class="control-label cell-12"><i class="fa fa-align-justify"></i>بيانات المعلن:</label>
            <div class="cell-12">
                <label class="control-label cell-2">الإسم:</label>
                <span><?= $product->full_name ?></span>
            </div>
            <div class="cell-6">
                <label class="control-label cell-4">الدولة:</label>
                <span><?= $product->country_name ?></span>
            </div>
            <div class="cell-6">
                <label class="control-label cell-4">المدينة:</label>
                <span><?= $product->city_name ?></span>
            </div>
            <div class="cell-6">
                <label class="control-label cell-7">طبيعة المعلن:</label>
                <span><?= $product->user_type ?></span>
            </div>
            <div class="cell-6">
                <label class="control-label cell-7">عدد الإعلانات:</label>
                <span><?= $product->supplies_count ?></span>
            </div>
        </div>
        <div class="product-block cell-12">
            <label class="control-label cell-5">شارك هذا الإعلان على :</label>
            <a style="background-color:#2d609b;" target="_blank" href="https://facebook.com/sharer/sharer.php?u=<?php echo base_url('home/product/' . $product->id); ?>" class="btn btn-small">Facebook</a>
            <a style="background-color:#00c3f3;" target="_blank" href="https://twitter.com/home?status=<?php echo base_url('home/product/' . $product->id); ?>" class="btn btn-small">Twitter</a>
            <a style="background-color:#d34836;" target="_blank" href="https://plus.google.com/share?url=<?php echo base_url('home/product/' . $product->id); ?>" class="btn btn-small">Google Plus</a>
        </div>
    </div>
    <div class="cell-4">
        <div class="product-img">
            <img alt="" id="img_01" src="<?= base_url('uploads/products/medium/' . $product->product_picture_1) ?>" />
            <div class="thumbs">
                <ul id="gal1">
                    <?php if ($product->product_picture_1 != NULL) { ?>
                        <li><a data-image="<?= base_url('uploads/products/medium/' . $product->product_picture_1) ?>" href="#"><img alt="" src="<?= base_url('uploads/products/thumbs/' . $product->product_picture_1) ?>" /></a></li>
                    <?php } ?>
                    <?php if ($product->product_picture_2 != NULL) { ?>
                        <li><a data-image="<?= base_url('uploads/products/medium/' . $product->product_picture_2) ?>" href="#"><img alt="" src="<?= base_url('uploads/products/thumbs/' . $product->product_picture_2) ?>" /></a></li>
                    <?php } ?>
                    <?php if ($product->product_picture_3 != NULL) { ?>
                        <li><a data-image="<?= base_url('uploads/products/medium/' . $product->product_picture_3) ?>" href="#"><img alt="" src="<?= base_url('uploads/products/thumbs/' . $product->product_picture_3) ?>" /></a></li>
                    <?php } ?>
                    <?php if ($product->product_picture_4 != NULL) { ?>
                        <li><a data-image="<?= base_url('uploads/products/medium/' . $product->product_picture_4) ?>" href="#"><img alt="" src="<?= base_url('uploads/products/thumbs/' . $product->product_picture_4) ?>" /></a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
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
            <div id="tabs5" class="tabs">
                <ul>
                    <li class="skew-25"><a href="#" class="skew25">وصف  عام</a></li>
                    <li class="skew-25 active"><a href="#" class="skew25">المواصفات والمميزات</a></li>
                    <li class="skew-25"><a href="#" class="skew25">تعليقات</a></li>
                </ul>
                <div class="tabs-pane">
                    <div class="tab-panel active">
                        <?= $product->description ?>
                    </div>
                    <div class="tab-panel">
                        <table>
                            <tr>
                                <th colspan="2" class="left-text">تفاصيل الملحق</th>
                            </tr>
                            <tr>
                                <td class="width150">الشركة المصنعه:</td>
                                <td><?= $product->manufacturer_name ?></td>
                            </tr>
                            <tr>
                                <td class="width150">الموديل:</td>
                                <td><?= $product->model_name ?></td>
                            </tr>
                            <tr>
                                <td class="width150">المقاس:</td>
                                <td><?= $product->size ?></td>
                            </tr>
                            <tr>
                                <td class="width150">الحالة:</td>
                                <td><?= ($product->product_status == 1) ? 'جديد' : 'مستعمل' ?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="tab-panel">
                        <div class="comments">
                            <h3 class="block-head">التعليقات</h3>
                        </div>
                        <?php $this->load->view('front_end/includes/comments_form'); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="cell-12 blog-thumbs">
        <!-- related products start -->			
        <?php $this->load->view('front_end/includes/related_products'); ?>
        <!-- related products end -->
    </div>
<?php } ?>