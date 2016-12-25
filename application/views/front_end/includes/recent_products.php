<h4 class="block-head">
    قطع غيار وملحقات
    <a href="<?=base_url('home/products')?>">مشاهدة المزيد<span class="fa fa-plus"></span></a>&nbsp;&nbsp;&nbsp;
</h4>
<div class="project-section-padding">
    <div class="homeGallery portfolio">
        <!-- staff item start -->
        <?php
        foreach ($products as $product) {
            echo '<div>
            <div class="portfolio-item">
                <div class="img-holder">
                    <div class="img-over">
                        <a href="' . base_url('home/product/' . $product->id.'/'.str_replace(" ", "-", trim($product->title))) . '" class="fx link"><b class="fa fa-link"></b></a>
                        <a href="' . base_url('uploads/products/small/' . $product->product_picture_1) . '" class="fx zoom" data-gal="prettyPhoto[pp_gal]" title="' . $product->title . '"><b class="fa fa-search-plus"></b></a>
                    </div>
                    <img alt="' . $product->title . '" src="' . base_url('uploads/products/small/' . $product->product_picture_1) . '">
                </div>
                <div class="name-holder">
                    <a href="' . base_url('home/product/' . $product->id.'/'.str_replace(" ", "-", trim($product->title))) . '" class="project-name">' . character_limiter(strip_tags($product->title),23) . '</a>
                    <p>' . character_limiter(strip_tags(preg_replace('/(<[^>]+) style=".*?"/i', '$1', $product->description)), 100) . '</p>
                    <span class="project-options" style="border-bottom: 1px #dfdfdf solid;"></span>
                    <span class="project-options pull-right"><i class="fa fa-user"></i>' . $product->username . '</span>
                    <span class="project-options pull-left"><i class="fa fa-clock-o"></i>' . $product->added_date . '</span>
                    <span class="project-options pull-left"><div class="item-price">' . $product->price . ' ' . $product->currency_name . '</div></span>
                    <span class="project-options pull-right"><img src="' . base_url('uploads/flags/'.$product->country_id.'.jpg') . '"></span>
                </div>
            </div>
        </div>';
        }
        ?>
        <!-- staff item end -->
        <br>
    </div><!-- .portfolioGallery end -->
</div>