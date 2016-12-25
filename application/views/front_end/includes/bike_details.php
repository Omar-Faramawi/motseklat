<?php if ($bike != NULL) { ?>
    <div class="cell-8">
        <h4 class="block-head">                                    
            <?= $bike->title ?>
        </h4>
        <div class="product-specs product-block list-item left cell-12">
            <label class="control-label cell-3"><i class="fa fa-money"></i>السعر:</label>
            <span class="price"><?= $bike->price . ' ' . $bike->currency_name ?></span>
        </div>
        <div class="product-specs product-block list-item left cell-6">
            <label class="control-label cell-9"><i class="fa fa-eye"></i>عدد المشاهدات:</label>
            <span><?= $bike->views ?></span>
        </div>
        <div class="product-specs product-block list-item left cell-6">
            <label class="control-label cell-9"><i class="fa fa-star"></i>عدد المهتمين:</label>
            <span><?= $bike->interested ?></span>
        </div>
        <div class="product-specs product-block list-item cell-12">
            <label class="control-label cell-7"><i class="fa fa-paper-plane-o"></i>للتواصل مع المعلن:</label>
            <input type="button" id="show_advertiser_mobile" value="رقم الموبايل" class="btn btn-medium main-bg">
            <input type="hidden" id="bike_id" value="<?= $bike->id ?>" class="hidden">
        </div>
        <div class="product-specs product-block list-item cell-12 hidden" id="advertiser_mobile">
            <label class="control-label cell-7"><i class="fa fa-paper-plane-o"></i> رقم الموبايل الخاص بالمعلن:</label>
            <span class="main-color bold"><?= $bike->mobile ?></span>
        </div>
        <div class="product-specs  product-block list-item cell-12">
            <label class="control-label cell-12"><i class="fa fa-align-justify"></i>بيانات المعلن:</label>
            <div class="cell-12">
                <label class="control-label cell-2">الإسم:</label>
                <span><?= $bike->full_name ?></span>
            </div>
            <div class="cell-6">
                <label class="control-label cell-4">الدولة:</label>
                <span><?= $bike->country_name ?></span>
            </div>
            <div class="cell-6">
                <label class="control-label cell-4">المدينة:</label>
                <span><?= $bike->city_name ?></span>
            </div>
            <div class="cell-6">
                <label class="control-label cell-7">طبيعة المعلن:</label>
                <span><?= $bike->user_type ?></span>
            </div>
            <div class="cell-6">
                <label class="control-label cell-7">عدد الإعلانات:</label>
                <span><?= $bike->supplies_count ?></span>
            </div>
        </div>
        <div class="product-block cell-12">
            <label class="control-label cell-5">شارك هذا الإعلان على :</label>
            <a style="background-color:#2d609b;" target="_blank" href="https://facebook.com/sharer/sharer.php?u=<?php echo base_url('home/bike/' . $bike->id); ?>" class="btn btn-small">Facebook</a>
            <a style="background-color:#00c3f3;" target="_blank" href="https://twitter.com/home?status=<?php echo base_url('home/bike/' . $bike->id); ?>" class="btn btn-small">Twitter</a>
            <a style="background-color:#d34836;" target="_blank" href="https://plus.google.com/share?url=<?php echo base_url('home/bike/' . $bike->id); ?>" class="btn btn-small">Google Plus</a>
        </div>
    </div>
    <div class="cell-4">
        <div class="product-img">
            <img alt="" id="img_01" src="<?= base_url('uploads/bikes/medium/' . $bike->bike_picture_1) ?>" />
            <div class="thumbs">
                <ul id="gal1">
                    <?php if ($bike->bike_picture_1 != NULL) { ?>
                        <li><a data-image="<?= base_url('uploads/bikes/medium/' . $bike->bike_picture_1) ?>" href="#"><img alt="" src="<?= base_url('uploads/bikes/thumbs/' . $bike->bike_picture_1) ?>" /></a></li>
                    <?php } ?>
                    <?php if ($bike->bike_picture_2 != NULL) { ?>
                        <li><a data-image="<?= base_url('uploads/bikes/medium/' . $bike->bike_picture_2) ?>" href="#"><img alt="" src="<?= base_url('uploads/bikes/thumbs/' . $bike->bike_picture_2) ?>" /></a></li>
                    <?php } ?>
                    <?php if ($bike->bike_picture_3 != NULL) { ?>
                        <li><a data-image="<?= base_url('uploads/bikes/medium/' . $bike->bike_picture_3) ?>" href="#"><img alt="" src="<?= base_url('uploads/bikes/thumbs/' . $bike->bike_picture_3) ?>" /></a></li>
                    <?php } ?>
                    <?php if ($bike->bike_picture_4 != NULL) { ?>
                        <li><a data-image="<?= base_url('uploads/bikes/medium/' . $bike->bike_picture_4) ?>" href="#"><img alt="" src="<?= base_url('uploads/bikes/thumbs/' . $bike->bike_picture_4) ?>" /></a></li>
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
                        <?= $bike->description ?>
                    </div>
                    <div class="tab-panel">
                        <table>
                            <tr>
                                <th colspan="2" class="left-text">تفاصيل المعروض</th>
                            </tr>
                            <tr>
                                <td class="width150">الشركة المصنعه:</td>
                                <td><?= $bike->manufacturer_name ?></td>
                            </tr>
                            <tr>
                                <td class="width150">الموديل:</td>
                                <td><?= $bike->model_name ?></td>
                            </tr>
                            <tr>
                                <td class="width150">الكيلومترات:</td>
                                <td><?= $bike->mileage . ' كيلومتر' ?></td>
                            </tr>
                            <tr>
                                <td class="width150">تاريخ الصنع:</td>
                                <td><?= $bike->production_date ?></td>
                            </tr>
                            <tr>
                                <td class="width150">سعة المحرك:</td>
                                <td><?= $bike->engine_capacity ?></td>
                            </tr>
                            <tr>
                                <?php $colors = array(0 => 'غير محدد', 1 => 'أزرق', 2 => 'أحمر', 3 => 'أسود', 4 => 'رمادي', 5 => 'أبيض', 6 => 'برتقالي', 7 => 'ذهبي', 8 => 'فضي', 9 => 'أخضر'); ?>
                                <td class="width150">اللون:</td>
                                <td><?= $colors[$bike->color] ?></td>
                            </tr>
                            <tr>
                                <td class="width150">الحالة:</td>
                                <td><?= ($bike->bike_status == 1) ? 'جديد' : 'مستعمل' ?></td>
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
        <!-- related bikes start -->			
        <?php $this->load->view('front_end/includes/related_bikes'); ?>
        <!-- related bikes end -->
    </div>
<?php } ?>