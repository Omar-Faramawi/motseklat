<div class="sectionWrapper gry-bg" style="padding:20px;">
    <div class="container">
        <h3 class="block-head">طـلب شـــــــراء</h3>
        <div class="cell-12 fx" data-animate="fadeInLeft">
            <div id="tabs5" class="tabs tabs-ads-4-sales">
                <ul>
                    <li class="skew-25 active"><a href="#" class="skew25">أطلب الأن</a></li>
                    <li class="skew-25"><a href="#" class="skew25">تعريف بالخدمة </a></li>
                </ul>
                <div class="tabs-pane">
                    <div class="tab-panel">
                        <div class="clients">
                            <div>
                                <a class="white-bg order_dialog" data-id="15" data-toggle="modal" href="#purchase_order"><img alt="" src="<?php echo base_url('assets/front_end/images/companies/client_16.jpg'); ?>"></a>
                            </div>
                            <div>
                                <a class="white-bg order_dialog" data-id="3" data-toggle="modal" href="#purchase_order"><img alt="" src="<?php echo base_url('assets/front_end/images/companies/client_7.jpg'); ?>"></a>
                            </div>
                            <div>
                                <a class="white-bg order_dialog" data-id="4" data-toggle="modal" href="#purchase_order"><img alt="" src="<?php echo base_url('assets/front_end/images/companies/client_8.jpg'); ?>"></a>
                            </div>
                            <div>
                                <a class="white-bg order_dialog" data-id="9" data-toggle="modal" href="#purchase_order"><img alt="" src="<?php echo base_url('assets/front_end/images/companies/client_9.jpg'); ?>"></a>
                            </div>
                            <div>
                                <a class="white-bg order_dialog" data-id="1" data-toggle="modal" href="#purchase_order"><img alt="" src="<?php echo base_url('assets/front_end/images/companies/client_10.jpg'); ?>"></a>
                            </div>
                            <div>
                                <a class="white-bg order_dialog" data-id="2" data-toggle="modal" href="#purchase_order"><img alt="" src="<?php echo base_url(); ?>assets/front_end/images/companies/client_11.jpg"></a>
                            </div>
                            <div>
                                <a class="white-bg order_dialog" data-id="10" data-toggle="modal" href="#purchase_order"><img alt="" src="<?php echo base_url(); ?>assets/front_end/images/companies/client_12.jpg"></a>
                            </div>
                            <div>
                                <a class="white-bg order_dialog" data-id="11" data-toggle="modal" href="#purchase_order"><img alt="" src="<?php echo base_url(); ?>assets/front_end/images/companies/client_13.jpg"></a>
                            </div>
                            <div>
                                <a class="white-bg order_dialog" data-id="12" data-toggle="modal" href="#purchase_order"><img alt="" src="<?php echo base_url('assets/front_end/images/companies/client_14.jpg'); ?>"></a>
                            </div>
                            <div>
                                <a class="white-bg order_dialog" data-id="14" data-toggle="modal" href="#purchase_order"><img alt="" src="<?php echo base_url('assets/front_end/images/companies/client_15.jpg'); ?>"></a>
                            </div>
                            <div>
                                <a class="white-bg order_dialog" data-id="8" data-toggle="modal" href="#purchase_order"><img alt="" src="<?php echo base_url(); ?>assets/front_end/images/companies/client_6.jpg"></a>
                            </div>
                            <div>
                                <a class="white-bg order_dialog" data-id="6" data-toggle="modal" href="#purchase_order"><img alt="" src="<?php echo base_url(); ?>assets/front_end/images/companies/client_1.jpg"></a>
                            </div>
                            <div>
                                <a class="white-bg order_dialog" data-id="13" data-toggle="modal" href="#purchase_order"><img alt="" src="<?php echo base_url(); ?>assets/front_end/images/companies/client_2.jpg"></a>
                            </div>
                            <div>
                                <a class="white-bg order_dialog" data-id="7" data-toggle="modal" href="#purchase_order"><img alt="" src="<?php echo base_url(); ?>assets/front_end/images/companies/client_3.jpg"></a>
                            </div>
                            <div>
                                <a class="white-bg order_dialog" data-id="5" data-toggle="modal" href="#purchase_order"><img alt="" src="<?php echo base_url(); ?>assets/front_end/images/companies/client_4.jpg"></a>
                            </div>
                            <div>
                                <a class="white-bg order_dialog" data-id="16" data-toggle="modal" href="#purchase_order"><img alt="" src="<?php echo base_url(); ?>assets/front_end/images/companies/client_5.jpg"></a>
                            </div>
                        </div>
                    </div>
                    <div class="tab-panel">
                        <img alt="" src="<?php echo base_url('assets/front_end/images/basic/img7.jpg'); ?>" >
                        <div class="description">
                            <span>

                                خدمة طلب الشراء الخاصة المقدمة من موقع موتسيكلات، تساعد البائعين لتقديم تخفيضات مناسبة على دراجاتهم النارية لفترة محددة من الزمن في محاولة لجذب أكبر عدد من راغبين الشراء، ومساعدتهم لاتخاذ قرار الشراء في أسرع وقت.
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Purchase Form -->
<div class="modal fade" id="purchase_order" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title">تقديم طلب</h4>
            </div>
            <form class="form-signin cform" method="post" enctype="multipart/form-data" action="<?= base_url('home/do_purchase_order') ?>" id="do_purchase_order">
                <div id="alert_message" class="box fx" data-animate="fadeInLeft">
                    <a class="close-box" href="#"><i class="fa fa-times"></i></a>
                    <p></p>
                </div>
                <?php
                $session_user_id = $this->session->userdata('user_id');
                if (!empty($session_user_id)) {//this variable defined in top_bar.php file -header-
                    ?>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label">البريد الإلكتروني:</label>
                            <input class="form-control" type="text" name="email"/>
                        </div>
                        <div class="form-group">
                            <label class="control-label">تفاصيل الطلب:</label>
                            <textarea class="form-control" name="details"></textarea>
                        </div>
                        <div><img src="<?php echo base_url('assets/front_end/images/basic/loader.gif'); ?>" class="loader hidden" alt="جاري التحميل..." /></div>
                    </div>
                    <div class="modal-footer">
                        <button aria-hidden="true" data-dismiss="modal" class="btn btn-primary">
                            إغلاق
                        </button>
                        <button type="submit" class="btn btn-primary" id="send_order">
                            إرسال
                        </button>
                    </div>
<?php } else { ?>
                    <div class="modal-body">
                        <div style="" class="box info-box fx animated fadeInLeft" data-animate="fadeInLeft">
                            <p>يجب تسجيل الدخول لتتمكن من تقديم طلب</p>
                        </div>
                    </div>
<?php } ?>
            </form>
        </div>
    </div>
</div>
<!-- Purchase Form -->