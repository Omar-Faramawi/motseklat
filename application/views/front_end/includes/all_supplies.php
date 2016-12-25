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
    foreach ($all_supplies as $bike) {
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
        $has_offer = ($bike->offer_id) ? '<span class="sale"><i class="golden fa fa-bell"></i> يوجد عرض</span>': '';
        $link = ($bike->offer_id) ? base_url('home/offer/' . $bike->offer_id) : base_url('home/bike/' . $bike->id.'/'.str_replace(" ", "-", trim($bike->title))) ;

        echo '<div class="cell-4 fx shop-item" data-animate="fadeInUp">
                <div class="item-box">
                    <h3 class="item-title"><a title="'.$bike->title.'" href="' . $link . '">' . character_limiter(strip_tags($bike->title), 31) . '</a></h3>
                    <div class="item-img">'.
                        $has_offer
                        .'<a href="' . $link . '"><img alt="' . $bike->title . '" src="' . base_url('uploads/bikes/small/' . $bike->bike_picture_1) . '"></a>
                    </div>
                    <div class="item-details">
                        <p>' . character_limiter(strip_tags(preg_replace('/(<[^>]+) style=".*?"/i', '$1', $bike->description)), 400) . '</p>
                        <span class="project-options" style="border-bottom: 1px #dfdfdf solid;"></span>
                        <span class="project-options pull-right" style="width:50%;text-align: right;"><i class="fa fa-user"></i>' . $bike->username . '</span>
                        <span class="project-options pull-left" style="width: 50%;text-align: left;"><i class="fa fa-clock-o"></i>' . $bike->added_date . '</span>
                        <span class="project-options pull-left"><div class="item-price">' . $bike->price . ' ' . $bike->currency_name . '</div></span>
                        <span class="project-options pull-right" style="text-align: right;"><img src="' . base_url('uploads/flags/' . $bike->country_id . '.jpg') . '"></span>
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
