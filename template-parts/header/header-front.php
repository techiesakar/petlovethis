<header id="masthead" class="site-header  flex items-center relative w-full bg-[#197667] z-50">
    <nav id="primary_nav" class="max-w-screen-xl w-full mx-auto  h-24 " role="navigation" aria-label="Primary Navigation">
        <div id="nav_wrapper" class=" py-6 w-full flex items-center justify-between">
            <div class="site-branding">
                <a class="custom-logo-link h-14 flex items-center" href="<?php echo home_url(); ?>"><?php petlovethis_custom_logo('custom-logo h-full w-auto'); ?></a>
                <?php

                if (is_front_page() && is_home()) :
                ?>
                    <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
                <?php
                else :
                ?>
                    <p class="site-title">
                        <a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a>
                    </p>
                <?php
                endif;
                $petlovethis_description = get_bloginfo('description', 'display');
                if ($petlovethis_description || is_customize_preview()) :
                ?>
                    <p class="site-description"><?php echo $petlovethis_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
                                                ?></p>
                <?php endif; ?>
            </div>
            <!-- Site Branding Ends -->


            <nav id="site-navigation" class="main-navigation flex items-center gap-6">

                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'menu-1',
                        'menu_id'        => 'primary-menu',
                        'container'      => false, // Removes the container <div>
                        'menu_class'     => 'flex gap-6 text-white font-mont font-semibold',
                    )
                );
                ?>
                <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25H12" />
                    </svg>
                </button>

                <button class="search_btn search_close" aria-label="Search Button">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6  text-white">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                    </svg>
                </button>

            </nav>

        </div>
    </nav>


</header>