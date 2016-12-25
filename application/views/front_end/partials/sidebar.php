<!-- main sidebar -->
    <aside id="sidebar_main">
        <div class="sidebar_main_header">
            <div class="sidebar_logo">
                <a href="<?php echo base_url();?>" class="sSidebar_hide sidebar_logo_large">
                    <img class="logo_regular" src="<?php echo base_url('public/img/logo.png'); ?>" />
                </a>
            </div>
        </div>

        <div class="menu_section">
            <ul>
                <li title="Login">
                    <a href="<?php echo base_url('auth/login'); ?>">
                        <span class="menu_icon"><i class="material-icons">&#xE898;</i></span>
                        <span class="menu_title">Login</span>
                    </a>
                </li>
                <li title="Register">
                    <a href="<?php echo base_url('auth/register'); ?>">
                        <span class="menu_icon"><i class="material-icons">&#xE7FE;</i></span>
                        <span class="menu_title">Register</span>
                    </a>
                </li>
                <li title="Our News">
                    <a href="#">
                        <span class="menu_icon"><i class="material-icons">&#xE236;</i></span>
                        <span class="menu_title">Our News</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>
    <!-- main sidebar end -->