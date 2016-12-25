<div class="container">

    <div class="nav-4">

        <div class="gray-nav">

            <!-- top navigation menu start -->

            <nav class="top-nav">

                <ul class="news mega-menu">

                    <li class="selected"><a href="<?= base_url('home') ?>"><i class="fa fa-home"></i><span>الرئيسية</span></a></li>

                    <li><a href="#"><span>معروض للبيع</span></a>

                        <div class="div-mega main-bg" style="max-width: 500px">

                            <div class="div-mega-section">

                                <h4>أكثر الشركات إعلاناً</h4>

                                <ul>

                                    <?php

                                    $icons = array(1 => 'ajs', 2 => 'aprilia', 3 => 'bmw', 4 => 'ducati', 5 => 'harley', 6 => 'honda', 7 => 'kawasaki', 8 => 'ktm'

                                        , 9 => 'kymco', 10 => 'moto', 11 => 'mv', 12 => 'piaggio', 13 => 'suzuki', 14 => 'triumph', 15 => 'victory', 16 => 'tamaha');

                                    foreach ($top_manufacturers as $manufacturer) {

                                        echo '<li><a href="' . base_url("home/manufacturer_supplies/" . $manufacturer->id) . '"><span class="' . $icons[$manufacturer->id] . '"></span>' . $manufacturer->name . '<span class="badge badge-info">' . $manufacturer->count . '</span></a></li>';

                                    }

                                    ?>

                                </ul>

                            </div>



                            <div class="div-mega-section">

                                <h4>قطع غيار وملحقات</h4>

                                <ul>

                                    <li><a href="<?= base_url('home/category/3/قطع غيار') ?>"><i class="fa fa-recycle"></i>قطع غيار</a></li>

                                    <li><a href="<?= base_url('home/category/1/معدات أمان وسلامة') ?>"><i class="fa fa-life-bouy"></i>معدات أمان وسلامة</a></li>

                                    <li><a href="<?= base_url('home/category/2/ملحقات') ?>"><i class="fa fa-cubes"></i> ملحقات</a></li>

                                    <li><a href="<?= base_url('home/category/4/اطارات') ?>"><i class="fa fa-align-center"></i>اطارات</a></li>

                                </ul>

                            </div>

                        </div>

                    </li>

                    <li><a href="#"><span>أقسام العارضين</span></a>

                        <ul>

                            <li><a  href="<?= base_url('home/members/1/أفراد') ?>"><i class="fa fa-user"></i>أفراد</a></li>

                            <li><a  href="<?= base_url('home/members/2/تجار مستقلون') ?>"><i class="fa fa-group"></i>تجار مستقلون</a></li>

                            <li><a  href="<?= base_url('home/members/3/معارض') ?>"><i class="fa fa-cog"></i>معارض</a></li>

                            <li><a  href="<?= base_url('home/members/4/وكلاء') ?>"><i class="fa fa-globe"></i>وكلاء</a></li>

                        </ul>

                    </li>

                    <li><a href="#"><span>خدمات</span></a>

                        <ul>

                            <li style="width: 200px !important;"><a href="<?=base_url('home/orders/طلبات الشراء')?>"><i class="fa fa-bullhorn"></i> طلبات الشراء</a></li>

                            <li style="width: 200px !important;"><a href="#"><i class="fa fa-recycle"></i>الفحص الفني <span style="margin-right: 15%;color: red;font-weight: bold;font-size: 14px;">قريباً</span></a></li>

                            <li style="width: 200px !important;"><a href="#"><i class="fa fa-life-bouy"></i>تعليم القيادة <span style="margin-right: 15%;color: red;font-weight: bold;font-size: 14px;" class="bold">قريباً</span></a></li>

                        </ul>

                    </li>

                    <li><a href="<?= base_url('home/articles') ?>"><span>المقالات</span></a></li>

                    <li><a href="<?=base_url('home/supplies')?>"><span>بحث متقدم</span></a></li>

                    <?php $session_user_id = $this->session->userdata('user_id'); ?>

                    <?php if (empty($session_user_id)) { ?>

                    <li><a class="btn-ad login-btn2" href="#"><span style="color: #eee;">أضف إعلانك</span></a></li>

                    <?php } else { ?>

                        <li><a class="btn-ad" href="<?= base_url('user/profile/add_bike') ?>"><span style="color: #eee;">أضف إعلانك</span></a></li>

                        <?php } ?>

                </ul>

            </nav>

            <!-- top navigation menu end -->							   							   



        </div>

    </div>

</div>