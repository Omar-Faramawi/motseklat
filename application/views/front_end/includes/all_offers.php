<div class="toolsBar">
    <div class="cell-10 left products-filter-top">

    </div>
    <div class="right cell-2 list-grid">
        <a class="list-btn selected" href="#" data-title="عرض قوائم" data-tooltip="true"><i class="fa fa-list"></i></a>
        <a class="grid-btn" href="#" data-title="عرض أحادي" data-tooltip="true"><i class="fa fa-th"></i></a>
    </div>

</div>
<div class="clearfix"></div>
<div class="grid-list list">
    <?php
    $count = 0;
    $is_open = false;
    foreach ($all_offers as $offer) {
        if ($count > 2 or $count == 0) {
            if ($is_open and $count % 3 == 0) {
                $is_open = false;
                echo '</div>';
            }
            if (!$is_open) {
                $is_open = true;
                echo '<div class="row">';
            }
        }

        echo '<div class="cell-4 fx shop-item" data-animate="fadeInUp">
                <div class="item-box">
                    <h3 class="item-title"><a title="' . $offer->title . '" href="' . base_url('home/offer/' . $offer->offer_id.'/'.str_replace(" ", "-", trim($offer->title))) . '">' . character_limiter(strip_tags($offer->title), 31) . '</a></h3>
                    <div class="item-img">
                        <a href="' . base_url('home/offer/' . $offer->offer_id.'/'.str_replace(" ", "-", trim($offer->title))) . '"><img alt="' . $offer->title . '" src="' . base_url('uploads/bikes/small/' . $offer->bike_picture_1) . '"></a>
                    </div>
                    <div class="item-details">
                        <p>' . character_limiter(strip_tags(preg_replace('/(<[^>]+) style=".*?"/i', '$1', $offer->description)), 400) . '</p>
                        <span class="project-options" style="border-bottom: 1px #dfdfdf solid;"></span>
                        <span class="project-options pull-right"><i class="fa fa-user"></i>' . $offer->username . '</span>
                        <span class="project-options pull-left"><i class="fa fa-clock-o"></i>' . $offer->added_date . '</span>
                        <br/>
                        <span class="project-options" style="border-bottom: 1px #dfdfdf solid;"></span>
                        <span class="project-options pull-right"><i class="fa fa-bell"></i>تاريخ الإنتهاء</span>                                    
                        <span class="project-options pull-left">' . date('Y-m-d', strtotime($offer->expire_date)) . '</span>
                        <br/>
                        <span class="project-options" style="border-bottom: 1px #dfdfdf solid;"></span>
                        <span class="project-options pull-left"><h2 class="discount-price">' . $offer->price . ' <del>' . $offer->currency_name . ' ' . $offer->offer_price . '</del></h2></span>
                        <span class="project-options pull-right"><img src="' . base_url('uploads/flags/' . $offer->country_id . '.jpg') . '"></span>
                    </div>
                </div>
            </div>';
        $count++;
    }
    if ($is_open) {
        echo '</div>';
    }
    ?>
    <div class="clearfix"></div>
    <div class="pager skew-25">
        <ul>
            <?= $pageNumber ?>
        </ul>
    </div>
</div>
<div class="clearfix"></div>
