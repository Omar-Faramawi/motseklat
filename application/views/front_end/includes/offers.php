<h4 class="block-head" style="padding-top: 20px;">
    عروض البائعين
    <a href="<?= base_url('home/offers') ?>">مشاهدة المزيد <span class="fa fa-plus"></span></a>
</h4>

<div class="cell-12 fx" data-animate="fadeInLeft">
    <div id="tabs2" class="tabs tabs-ads-4-sales">
        <ul>
            <li class="skew-25"><a href="#" class="skew25">المعروض حالياً</a></li>
            <li class="skew-25 active"><a href="#" class="skew25">تعريف بالخدمة </a></li>
            <li class="skew-25"><a href="#" class="skew25">كيف أقوم بتقديم عرض على اعلاني ؟!</a></li>
        </ul>
        <div class="tabs-pane">
            <div class="tab-panel">
                <div class="project-section-padding">
                    <div class="homeGallery portfolio">
                        <!-- offers item start -->
                        <?php
                        if ($offers == null) {
                            echo 'لايوجد عروض! كن أول من يقدم عرض';
                        } else {
                            foreach ($offers as $offer) {
                                echo '<div>
                                    <div class="portfolio-item">
                                        <div class="img-holder">
                                            <div class="img-over">
                                                <a href="' . base_url('home/offer/' . $offer->id.'/'.str_replace(" ", "-", trim($offer->title))) . '" class="fx link"><b class="fa fa-link"></b></a>
                                                <a href="' . base_url('uploads/bikes/small/' . $offer->bike_picture_1) . '" class="fx zoom" data-gal="prettyPhoto[pp_gal]" title="' . character_limiter(strip_tags($offer->title), 20) . '"><b class="fa fa-search-plus"></b></a>
                                            </div>
                                            <img alt="' . $offer->title . '" src="' . base_url('uploads/bikes/small/' . $offer->bike_picture_1) . '" />
                                        </div>
                                        <div class="name-holder">
                                            <a href="' . base_url('home/offer/' . $offer->id.'/'.str_replace(" ", "-", trim($offer->title))) . '" class="project-name">' . character_limiter(strip_tags($offer->title), 31) . '</a>
                                            <p>' . character_limiter(strip_tags(preg_replace('/(<[^>]+) style=".*?"/i', '$1', $offer->description)), 100) . '</p>
                                            <span class="project-options" style="border-bottom: 1px #dfdfdf solid;"></span>
                                            <span class="project-options pull-right"><i class="fa fa-user"></i>' . $offer->username . '</span>
                                            <span class="project-options pull-left"><i class="fa fa-clock-o"></i>' . $offer->added_date . '</span>
                                            <br>
                                            <span class="project-options pull-right"><i class="fa fa-bell"></i>تاريخ الإنتهاء</span>                                    
                                            <span class="project-options pull-left">' . date('Y-m-d', strtotime($offer->expire_date)) . '</span>
                                            <span class="project-options" style="border-bottom: 1px #dfdfdf solid;"></span>
                                            <span class="project-options pull-left"><h4 class="discount-price">' . $offer->price . ' <del>' . $offer->currency_name . ' ' . $offer->offer_price . '</del></h4></span>
                                            <span class="project-options pull-right"><img src="' . base_url('uploads/flags/' . $offer->country_id . '.jpg') . '"></span>
                                        </div>
                                    </div>
                                </div>';
                            }
                        }
                        ?>
                        <!-- offers item end -->
                        <br>
                    </div><!-- .portfolioGallery end -->
                </div>
            </div>
            <div class="tab-panel active">
                <img alt="" src="<?php echo base_url('assets/front_end/images/basic/img7.jpg'); ?>"/>
                <div class="description">
                    <span>
                        خدمة عروض البائعين الخاصة المقدمة من موقع موتسيكلات، تساعد البائعين لتقديم تخفيضات مناسبة على دراجاتهم النارية لفترة محددة من الزمن في محاولة لجذب أكبر عدد من راغبين الشراء، ومساعدتهم لاتخاذ قرار الشراء في أسرع وقت.
                    </span>
                </div>
            </div>
            <div class="tab-panel">
                <img alt="" src="<?php echo base_url('assets/front_end/images/basic/img10.jpg'); ?>" />
                <div class="description">
                    <span>
                        لتقوم بتقديم عرض خاص على دراجتك النارية، لابد من مرور 15 يوما على وضع الاعلان في موقع موتسيكلات، وكذلك لابد من أن يشاهد اعلانك أكثر من 15 زائر، بعد تحقق الشرطين، تستطيع الدخول على اعلانك وتقديم عروض التخفيض التى ترى انها مناسبة، وتحدد الفترة الزمنية التي تريد أن يستمر العرض خلالها.
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>