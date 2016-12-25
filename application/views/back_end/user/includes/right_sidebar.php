<div class="main-navigation navbar-collapse collapse">
    <!-- start: MAIN MENU TOGGLER BUTTON -->
    <div class="navigation-toggler">
        <i class="clip-chevron-left"></i>
        <i class="clip-chevron-right"></i>
    </div>
    <!-- end: MAIN MENU TOGGLER BUTTON -->
    <!-- start: MAIN NAVIGATION MENU -->
    <ul class="main-navigation-menu">
        <li>
            <a href="<?= base_url('home/') ?>"><i class="clip-home-3"></i>
                <span class="title"> الرئيسية </span><span class="selected"></span>
            </a>
        </li>
        <li>
            <a href="<?= base_url('user/profile') ?>"><i class="clip-stats"></i>
                <span class="title"> إحصائياتي </span><span class="selected"></span>
            </a>
        </li>
        <li>
            <a href="javascript:void(0)"><i class="clip-screen"></i>
                <span class="title"> الملف الشخصي </span><i class="icon-arrow"></i>
                <span class="selected"></span>
            </a>
            <ul class="sub-menu">
                <li>
                    <a href="<?= base_url('user/profile/my_info') ?>">
                        <span class="title"> البيانات الشخصية </span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('user/profile/my_picture') ?>">
                        <span class="title"> الصورة الشخصية </span>
                    </a>
                </li>
                <?php if (USER_TYPE == 3 or USER_TYPE == 4) { ?>
                    <li>
                        <a href="<?= base_url('user/profile/my_centers') ?>">
                            <span class="title"> بيانات المعرض</span>
                        </a>
                    </li>
                <?php } ?>
                <li>
                    <a href="<?= base_url('user/profile/change_password') ?>">
                        <span class="title"> تغيير كلمة المرور</span>
                    </a>
                </li>
                <!--<li>-->
                <!--<a href="user/profile/privacy_config">-->
                    <!--<span class="title"> إعدادات الخصوصية </span>-->
                <!--</a>-->
                <!--</li>-->
            </ul>
        </li>
        <li>
            <a href="javascript:void(0)"><i class="clip-list"></i>
                <span class="title">  إعلاناتي </span><i class="icon-arrow"></i>
                <span class="selected"></span>
            </a>
            <ul class="sub-menu">
                <li>
                    <a href="<?= base_url('user/profile/my_bikes') ?>">
                        <span class="title">دراجات نارية</span>
                    </a>
                </li>								
                <li>
                    <a href="<?= base_url('user/profile/my_spare_parts') ?>">
                        <span class="title">قطع غيار</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('user/profile/my_accessories') ?>">
                        <span class="title">ملحقات</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('user/profile/my_safty_equipments') ?>">
                        <span class="title">معدات أمن وسلامة</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('user/profile/my_tires') ?>">
                        <span class="title">الإطارات</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('user/profile/my_offers') ?>">
                        <span class="title">العروضات</span>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:void(0)"><i class="clip-paperclip"></i>
                <span class="title">إضافة إعلان</span><i class="icon-arrow"></i>
                <span class="selected"></span>
            </a>
            <ul class="sub-menu">
                <li>
                    <a href="<?= base_url('user/profile/add_bike') ?>">
                        <span class="title">دراجة نارية</span>
                    </a>
                </li>								
                <li>
                    <a href="<?= base_url('user/profile/add_spare_parts') ?>">
                        <span class="title">قطع غيار</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('user/profile/add_safty_equipment') ?>">
                        <span class="title">معدات أمن وسلامة</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('user/profile/add_accessory') ?>">
                        <span class="title">ملحقات</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('user/profile/add_tires') ?>">
                        <span class="title">إطارات</span>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="<?= base_url('user/profile/purchase_order') ?>"><i class="clip-paperclip"></i>
                <span class="title">طلب شراء</span>
            </a>
        </li>
        <li>
            <a href="<?= base_url('user/profile/my_purchase_orders') ?>"><i class="fa fa-bullhorn"></i>
                <span class="title">طلبات الشراء</span>
            </a>
        </li>
        <li>
            <a href="<?= base_url('user/profile/logout') ?>"><i class="clip-exit"></i>
                <span class="title"> تسجيل الخروج </span>
            </a>
        </li>
        <li class="padd-top-5 hidden-sm" style="height: 600px;">
            <?php $this->load->view('back_end/user/ads/wide_responsive'); ?>
        </li>
        <!--        <li>
                    <a href="maps.html"><i class="clip-location"></i>
                        <span class="title">صندوق المراسلات</span>
                        <span class="selected"></span>
                    </a>
                </li>
                <li>
                    <a href="maps.html"><i class="clip-location"></i>
                        <span class="title">التنبيهات</span>
                        <span class="selected"></span>
                    </a>
                </li>-->
    </ul>
    <!-- end: MAIN NAVIGATION MENU -->
</div>