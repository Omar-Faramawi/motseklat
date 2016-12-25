<div class="login-box">

    <a class="close-login" href="#"><i class="fa fa-times"></i></a>

    <form action="<?= base_url('home/login')?>" method="post" id="do_login" enctype="multipart/form-data">

        <div class="container">

            <h5 id="login_message"></h5>

            <div class="login-controls">

                <div class="skew-25 input-box left">

                    <input type="text" name="username" class="txt-box skew25" style="width: 195px;" placeholder="اسم المستخدم أو البريد الإلكتروني" />

                </div>

                <div class="skew-25 input-box left">

                    <input type="password" name="password" class="txt-box skew25" placeholder="كلمة المرور" />

                </div>

                <div class="left skew-25 main-bg">

                    <input type="submit" class="btn skew25" value="دخول" />

                </div>

                <div class="check-box-box">

                    <input type="checkbox" class="check-box" /><label style="padding-left: 160px;">تذكرني !</label>

                    <a href="#">نسيت كلمة المرور ؟</a>

                </div>

            </div>

        </div>

    </form>

</div>