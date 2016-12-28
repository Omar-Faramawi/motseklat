<footer id="footer">
        <div class="copyrights"><a href="">Motseklat</a> © 2017. All Rights Reserved.</div>
        <nav class="menu-h">
            <ul>
                <li><a href="index.html">Home</a>
                </li>
                <li><a href="terms-of-services.html">Terms & Conditions</a>
                </li>
                <li><a href="faq.html">FAQ</a>
                </li>
                <li><a href="privacy-statement.html">Privacy Statment</a>
                </li>
                <li><a href="contact-us.html">Contact Us</a>
                </li>
                <li><a href="about.html">About</a>
                </li>
                <li><a href="advertise-with-us.html">Advertise With Us</a>
                </li>
            </ul>
        </nav>
    </footer>

    <!-- google web fonts -->
    <script>
        WebFontConfig = {
            google: {
                families: [
                    'Source+Code+Pro:400,700:latin',
                    'Roboto:400,300,500,700,400italic:latin'
                ]
            }
        };
        (function() {
            var wf = document.createElement('script');
            wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
                '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
            wf.type = 'text/javascript';
            wf.async = 'true';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(wf, s);
        })();
    </script>

    <!-- common functions -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="<?php echo base_url('public/dashboard/js/common.min.js'); ?>"></script>
    <!-- uikit functions -->
    <script src="<?php echo base_url('public/dashboard/js/uikit_custom.min.js'); ?>"></script>
    <!-- altair common functions/helpers -->
    <script src="<?php echo base_url('public/dashboard/js/altair_admin_common.min.js'); ?>"></script>

    <!-- page specific plugins -->
    <!-- parsley (validation) -->
    <script>
        // load parsley config (altair_admin_common.js)
        altair_forms.parsley_validation_config();
        // load extra validators
        altair_forms.parsley_extra_validators();
    </script>
    <script src="<?php echo base_url('public/dashboard/bower_components/parsleyjs/dist/parsley.min.js'); ?>"></script>
    <!-- jquery steps -->
    <script src="<?php echo base_url('public/dashboard/js/custom/wizard_steps.min.js'); ?>"></script>

    <!--  forms wizard functions -->
    <script src="<?php echo base_url('public/dashboard/js/pages/forms_wizard.min.js'); ?>"></script>forms_validation.js
    <script src="<?php echo base_url('public/dashboard/js/pages/forms_validation.js'); ?>"></script>

    <script src="<?php echo  base_url('public/js/custom/custom.js'); ?>"></script>
    <script>
        $(function() {
            if (isHighDensity()) {
                $.getScript("public/bower_components/dense/src/dense.js", function() {
                    // enable hires images
                    altair_helpers.retina_images();
                });
            }
            if (Modernizr.touch) {
                // fastClick (touch devices)
                FastClick.attach(document.body);
            }
        });
        $window.load(function() {
            // ie fixes
            altair_helpers.ie_fix();
        });
    </script>



</body>

</html>