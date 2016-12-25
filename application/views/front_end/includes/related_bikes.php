<h4 class="block-head">
    إعــلانــــات مشابهـة
</h4>
<div class="project-section-padding">
    <div class="homeGallery portfolio">
        <!-- related items start -->
        <?php
        foreach ($related_bikes as $bike) {
            $has_offer = ($bike->offer_id) ? '<span class="sale2"><i class="golden fa fa-bell"></i> يوجد عرض</span>': '';
            $link = ($bike->offer_id) ? base_url('home/offer/' . $bike->offer_id) : base_url('home/bike/' . $bike->id.'/'.str_replace(" ", "-", trim($bike->title))) ;
            echo '<div>
            <div class="portfolio-item">
                <div class="img-holder">
                    '.$has_offer.'
                    <div class="img-over">
                        <a href="' . $link . '" class="fx link"><b class="fa fa-link"></b></a>
                        <a href="' . base_url('uploads/bikes/small/' . $bike->bike_picture_1) . '" class="fx zoom" data-gal="prettyPhoto[pp_gal]" title="' . $bike->title . '"><b class="fa fa-search-plus"></b></a>
                    </div>
                    <img alt="' . $bike->title . '" src="' . base_url('uploads/bikes/small/' . $bike->bike_picture_1) . '">
                </div>
                <div class="name-holder">
                    <a href="'.$link.'" class="project-name">' . $bike->title . '</a>
                    <p>' . character_limiter(strip_tags(preg_replace('/(<[^>]+) style=".*?"/i', '$1', $bike->description)), 100) . '</p>
                    <span class="project-options" style="border-bottom: 1px #dfdfdf solid;"></span>
                    <span class="project-options pull-right">' . $bike->username . '<i class="fa fa-user"></i></span>
                    <span class="project-options pull-left">' . $bike->added_date . '<i class="fa fa-clock-o"></i></span>
                    <span class="project-options pull-left"><div class="item-price">' . $bike->price . ' ' . $bike->currency_name . '</div></span>
                    <span class="project-options pull-right"><img src="' . base_url('uploads/flags/'.$bike->country_id.'.jpg') . '"></span>

                </div>
            </div>
        </div>';
        }
        ?>
        <!-- related items end -->
        <br>
    </div><!-- .portfolioGallery end -->
</div>