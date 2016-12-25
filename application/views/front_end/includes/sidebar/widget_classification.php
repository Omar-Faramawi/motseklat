<li class="widget r-posts-w fx" data-animate="fadeInRight">
    <h3 class="widget-head">
        <span class="chain-t-left"></span>
        .: أكثر المتسيكلات :.</h3>
    <div class="widget-content" style="padding:5px;">
        <div id="tabs" class="tabs2 padd-top-5">
            <ul style="display: inline-flex;">
                <li class="active"><a href="#">مشاهدة</a></li>
                <li><a href="#">ثمناً</a></li>
                <li><a href="#">الأحدث</a></li>
            </ul>
            <div class="tabs-pane">
                <div class="tab-panel active">
                    <ul>
                        <?php
                        foreach ($bikes_most_viewed as $bike)
                            echo '<li>
                                <div class="post-img">
                                    <img src="' . base_url('uploads/bikes/thumbs/' . $bike->bike_picture_1) . '" alt="' . $bike->title . '">
                                </div>
                                <div class="widget-post-info">
                                    <h4>
                                        <a href="' . base_url('home/bike/' . $bike->id) . '">
                                            ' . character_limiter(strip_tags($bike->title), 31) . '
                                        </a>
                                    </h4>
                                    <div class="meta">
                                        <span><i class="fa fa-clock-o"></i>' . date("Y-m-d", strtotime($bike->added_date)) . '</span><a href="' . base_url('home/bike/' . $bike->id) . '"><i class="fa fa-eye"></i>' . $bike->views . '</a>
                                    </div>
                                </div>
                            </li>';
                        ?>
                    </ul>
                </div>
                <div class="tab-panel">
                    <ul>
                        <?php
                        foreach ($bikes_most_price as $bike)
                            echo '<li>
                                <div class="post-img">
                                    <img src="' . base_url('uploads/bikes/thumbs/' . $bike->bike_picture_1) . '" alt="' . $bike->title . '">
                                </div>
                                <div class="widget-post-info">
                                    <h4>
                                        <a href="' . base_url('home/bike/' . $bike->id) . '">
                                            ' . character_limiter(strip_tags($bike->title), 31) . '
                                        </a>
                                    </h4>
                                    <div class="meta">
                                        <span><i class="fa fa-clock-o"></i>' . date("Y-m-d", strtotime($bike->added_date)) . '</span><a href="' . base_url('home/bike/' . $bike->id) . '">' . $bike->price.' '.$bike->currency_name. '</a>
                                    </div>
                                </div>
                            </li>';
                        ?>
                    </ul>
                </div>
                <div class="tab-panel">
                    <ul>
                        <?php
                        foreach ($bikes_most_interested as $bike)
                            echo '<li>
                                <div class="post-img">
                                    <img src="' . base_url('uploads/bikes/thumbs/' . $bike->bike_picture_1) . '" alt="' . $bike->title . '">
                                </div>
                                <div class="widget-post-info">
                                    <h4>
                                        <a href="' . base_url('home/bike/' . $bike->id) . '">
                                            ' . character_limiter(strip_tags($bike->title), 31) . '
                                        </a>
                                    </h4>
                                    <div class="meta">
                                        <span><i class="fa fa-clock-o"></i>' . date("Y-m-d", strtotime($bike->added_date)) . '</span><a href="' . base_url('home/bike/' . $bike->id) . '"><i class="fa fa-star"></i>' . $bike->interested. '</a>
                                    </div>
                                </div>
                            </li>';
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <span class="chain-b-right"></span>
    <span class="chain-b-left"></span>
</li>