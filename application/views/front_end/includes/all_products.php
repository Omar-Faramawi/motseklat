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
    foreach ($all_products as $product) {
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
                    <h3 class="item-title"><a title="'.$product->title.'" href="' . base_url('home/product/' . $product->id.'/'.str_replace(" ", "-", trim($product->title))) . '">' . character_limiter(strip_tags($product->title),31) . '</a></h3>
                    <div class="item-img">
                        <a href="' . base_url('home/product/' . $product->id.'/'.str_replace(" ", "-", trim($product->title))) . '"><img alt="' . $product->title . '" src="' . base_url('uploads/products/small/' . $product->product_picture_1) . '"></a>
                    </div>
                    <div class="item-details">
                        <p>' . character_limiter(strip_tags(preg_replace('/(<[^>]+) style=".*?"/i', '$1', $product->description)), 400) . '</p>
                        <span class="project-options" style="border-bottom: 1px #dfdfdf solid;"></span>
                        <span class="project-options pull-right" style="width:50%;text-align: right;"><i class="fa fa-user"></i>' . $product->username . '</span>
                        <span class="project-options pull-left" style="width: 50%;text-align: left;"><i class="fa fa-clock-o"></i>' . $product->added_date . '</span>
                        <span class="project-options pull-left"><div class="item-price">' . $product->price . ' ' . $product->currency_name . '</div></span>
                        <span class="project-options pull-right" style="text-align: right;"><img src="' . base_url('uploads/flags/'.$product->country_id.'.jpg') . '"></span>
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
