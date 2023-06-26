<header id="masthead" class="site-header flex items-center font-poppins bg-light-white  fixed top-0 left-0 r-0 h-24   w-full z-50 shadow ">
    <nav id="primary_nav" class="max-w-screen-2xl w-full mx-auto" role="navigation" aria-label="Primary Navigation">
        <div id="nav_wrapper" class="w-full flex justify-between items-center gap-12">
            <div class="site-branding ">
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

            <nav id="site-navigation" class="w-full main-navigation hidden md:flex items-center gap-6 mx-auto justify-end">

                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'menu-1',
                        'menu_id'        => 'primary-menu',
                        'container'      => false, // Removes the container <div>
                        'menu_class'     => 'flex gap-6   font-semibold',
                    )
                );
                ?>


                <button class="search_btn search_close" aria-label="Search Button">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6  text-gray-900">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                    </svg>
                </button>

            </nav>

        </div>
    </nav>
    <?php if (is_single()) : ?>
        <div class="scroll-wrapper h-1 absolute bottom-0 left-0 right-0">
            <div id="scrollIndicator" class="h-1 w-0 bg-light-green"></div>
        </div>
    <?php endif; ?>

</header>