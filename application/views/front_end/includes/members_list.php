<div class="cell-9">
    <div class="team-boxes-2">
        <h3 class="block-head">فئة <span><?= isset($user_type_name) ? $user_type_name : '' ?></span></h3>
        <div class="row">
            <?php
            foreach ($members as $member) {
                $user_picture = null;
                if (file_exists('./uploads/users/thumbs/' . $member->picture) && !is_dir('./uploads/users/small/' . $member->picture)) {
                    $user_picture = '<img width="35px" src=' . base_url("uploads/users/small/" . $member->picture) . '>';
                } else {
                    $user_picture = '<img src="' . base_url("assets/front_end/images/photo.jpg") . '" />';
                }
                echo '<div class="cell-3 fx" data-animate="fadeInDown">
                        <div class="team-box-2">
                            <div class="team-img">' . $user_picture . '</div>
                            <div class="team-details">
                                <h4>' . $member->full_name . '</h4>
                                <div class="t-position">' . $member->username . '</div>
                                <p><span>' . $member->country_name . ' - ' . $member->city_name . '</span></p>
                                <p><span>عدد الإعلانات: </span><span>' . $member->supplies_count . '</span></p>
                                <div class="team-socials">
                                    <ul>
                                        <li><a href="' . $member->facebook . '" data-title="صفحة الفيس بوك" data-tooltip="true"><span class="fa fa-facebook"></span></a></li>
                                        <li><a href="' . $member->website . '" data-title="الموقع الإلكتروني" data-tooltip="true"><span class="fa fa-link"></span></a></li>
                                        <li><a href="' . base_url('home/member_products/' . $member->id.'/'.str_replace(" ", "-", trim($member->username))) . '" data-title="القطع والملحقات والمعدات" data-tooltip="true"><span class="fa fa-cogs"></span></a></li>
                                        <li><a href="' . base_url('home/member_supplies/' . $member->id.'/'.str_replace(" ", "-", trim($member->username))) . '" data-title="المتسيكلات" data-tooltip="true"><span class="fa fa-tachometer"></span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>';
            }
            ?>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="pager skew-25">
        <ul>
            <?= $pageNumber ?>
        </ul>
    </div>
</div>