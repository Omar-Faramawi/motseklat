<?php $session_user_id = $this->session->userdata('user_id'); ?>

<?php $session_user_role = $this->session->userdata('role'); ?>

<div class="top-bar main-bg">

    <div class="container">

        <div class="row">

            <div class="cell-7">

                <ul>

                    <li><a href="<?= base_url('home/terms') ?>"><i class="fa fa-certificate"></i>سياسة الإستخدام</a></li>

                    <li><a href="<?= base_url('home/about_us') ?>"><i class="fa fa-file-o"></i>من نحن</a></li>

                    <?php if (empty($session_user_id)) { ?>

                        <li><a href="<?= base_url('home/register') ?>"><i class="fa fa-user"></i>تسجيل جديد</a></li>

                        <li><a href="#" class="login-btn"><i class="fa fa-unlock-alt"></i>تسجيل الدخول</a></li>

                    <?php } else { ?>

                        <?php if ($session_user_role == 'admin') { ?>

                            <li><a href="<?= base_url('admin/bikes/supplies/') ?>"><img src="<?= base_url('uploads/users/thumbs/' . $this->session->userdata("picture")) ?>" class="circle-img"/> لوحة التحكم</a></li>

                        <?php } else { ?>

                            <li><a href="<?= base_url('user/profile') ?>"><i class="fa fa-user"></i>الصفحة الشخصية</a></li>

                            <li><a href="<?= base_url('user/profile/my_info') ?>"><img src="<?= base_url('uploads/users/thumbs/' . $this->session->userdata("picture")) ?>" class="circle-img"/> <?= $this->session->userdata('username'); ?></a></li>

                            <li><a href="<?= base_url('user/profile/logout') ?>"><i class="fa fa-lock"></i>تسجيل الخروج</a></li>

                        <?php } ?>

                    <?php } ?>

                </ul>

            </div>

            <div class="cell-5 right-bar">

                <ul class="right">

                    <li><a href="#"><i class="fa fa-envelope"></i>info@motseklat.com</a></li>

                    <li><span id="weather"></span></li>

                    <li><span id="time-date" style="padding-right: 5px;"></span></li>

                </ul>

            </div>

        </div>

    </div>

</div>