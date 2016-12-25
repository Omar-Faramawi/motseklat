<h4 class="block-head">
    عــــروض مشـابهـة
</h4>
<div class="project-section-padding">
    <div class="homeGallery portfolio">
        <!-- related items start -->
        <?php
        foreach ($related_offers as $offer) {
            echo '<div >
                    <div class="portfolio-item">
                        <div class="img-holder">
                            <div class="img-over">
                                <a href="' . base_url('home/offer/' . $offer->offer_id.'/'.str_replace(" ", "-", trim($offer->title))) . '" class="fx link"><b class="fa fa-link"></b></a>
                                <a href="' . base_url('uploads/bikes/small/' . $offer->bike_picture_1) . '" class="fx zoom" data-gal="prettyPhoto[pp_gal]" title="' . $offer->title . '"><b class="fa fa-search-plus"></b></a>
                            </div>
                            <img alt="' . $offer->title . '" src="' . base_url('uploads/bikes/small/' . $offer->bike_picture_1) . '" />
                        </div>
                        <div class="name-holder">
                            <a href="'.base_url('home/offer/' . $offer->offer_id.'/'.str_replace(" ", "-", trim($offer->title))).'" class="project-name">' . character_limiter(strip_tags($offer->title), 31) . '</a>
                            <p>' . character_limiter(strip_tags(preg_replace('/(<[^>]+) style=".*?"/i', '$1', $offer->description)), 100) . '</p>
                            <span class="project-options" style="border-bottom: 1px #dfdfdf solid;"></span>
                            <span class="project-options pull-right"><i class="fa fa-user"></i>' . $offer->username . '</span>
                            <span class="project-options pull-left"><i class="fa fa-clock-o"></i>' . $offer->added_date . '</span>
                            <br>
                            <span class="project-options pull-right"><i class="fa fa-bell"></i>تاريخ الإنتهاء</span>                                    
                            <span class="project-options pull-left">' . date('Y-m-d', strtotime($offer->expire_date)) . '</span>
                            <span class="project-options" style="border-bottom: 1px #dfdfdf solid;"></span>
                            <span class="project-options pull-left"><h2 class="discount-price">' . $offer->price . ' <del>' . $offer->currency_name . ' ' . $offer->offer_price . '</del></h2></span>
                            <span class="project-options pull-right"><img src="' . base_url('uploads/flags/'.$offer->country_id.'.jpg') . '"></span>
                        </div>
                    </div>
                </div>';
        }
        ?>
        <!-- related items end -->
        <br>
    </div><!-- .portfolioGallery end -->
</div>