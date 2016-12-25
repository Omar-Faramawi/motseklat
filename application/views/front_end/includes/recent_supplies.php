<h4 class="block-head">
    أحدث الإعلانات
    <a href="<?=base_url('home/supplies')?>">مشاهدة المزيد<span class="fa fa-plus"></span></a>&nbsp;&nbsp;&nbsp;
</h4>
<div class="project-section-padding">
    <div class="homeGallery portfolio">
        <!-- staff item start -->
        <?php
        foreach ($bikes as $bike) {
            echo '<div>
            <div class="portfolio-item">
                <div class="img-holder">
                    <div class="img-over">
                        <a href="' . base_url('home/bike/' . $bike->id.'/'.str_replace(" ", "-", trim($bike->title))) . '" class="fx link"><b class="fa fa-link"></b></a>
                        <a href="' . base_url('uploads/bikes/small/' . $bike->bike_picture_1) . '" class="fx zoom" data-gal="prettyPhoto[pp_gal]" title="' . $bike->title . '"><b class="fa fa-search-plus"></b></a>
                    </div>
                    <img alt="' . $bike->title . '" src="' . base_url('uploads/bikes/small/' . $bike->bike_picture_1) . '">
                </div>
                <div class="name-holder">
                    <a href="' . base_url('home/bike/' . $bike->id.'/'.str_replace(" ", "-", trim($bike->title))) . '" class="project-name">' . character_limiter(strip_tags($bike->title),20) . '</a>
                    <p>' . character_limiter(strip_tags(preg_replace('/(<[^>]+) style=".*?"/i', '$1', $bike->description)), 100) . '</p>
                    <span class="project-options" style="border-bottom: 1px #dfdfdf solid;"></span>
                    <span class="project-options pull-right"><i class="fa fa-user"></i>' . $bike->username . '</span>
                    <span class="project-options pull-left"><i class="fa fa-clock-o"></i>' . $bike->added_date . '</span>
                    <span class="project-options pull-left"><div class="item-price">' . $bike->price . ' ' . $bike->currency_name . '</div></span>
                    <span class="project-options pull-right"><img src="' . base_url('uploads/flags/'.$bike->country_id.'.jpg') . '"></span>
                </div>
            </div>
        </div>';
        }
        ?>
        <!-- staff item end -->
        <br>
    </div><!-- .portfolioGallery end -->
</div>