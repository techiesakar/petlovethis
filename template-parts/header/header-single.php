<header id="masthead" class="site-header flex items-center font-poppins bg-light-white  w-full   py-10">
    <nav id="primary_nav" class=" petContainer mx-auto" role="navigation" aria-label="Primary Navigation">
        <div id="nav_wrapper" class="w-full flex flex-col justify-between items-center relative gap-6">
            <div class="site-branding ">
                <a class="custom-logo-link h-10 flex items-center" href="<?php echo home_url(); ?>"><?php petlovethis_custom_logo('custom-logo h-full w-auto'); ?></a>
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

            <nav id="site-navigation" class="w-full main-navigation  hidden md:flex items-center justify-center gap-6  ">

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


                <button class="search_btn search_close relative " aria-label="Search Button">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6  text-gray-900">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                    </svg>


                </button>



            </nav>

            <div id="search_overlay" class="transition bg-light-white duration-300 ease-in-out  absolute -z-50 top-full right-0 w-96  flex justify-center items-center">
                <form role="search" method="get" class="search-form w-full flex flex-col gap-4 p-2 border border-gray-300 rounded" action="https://petlovesthis.com/">
                    <span class="sr-only">Search for:</span>
                    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only ">Search</label>
                    <div class="relative w-full">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>

                        <input type="search" id="default-search" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg outline-none " placeholder="Search …" value="" name="s">
                        <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-underline  font-medium rounded-lg text-sm px-4 py-2 d">
                            <svg aria-hidden="true" class="w-5 h-5 text-white " fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </button>
                    </div>

                </form>
            </div>

        </div>
    </nav>
    <?php if (is_single()) : ?>
        <div class="scroll-wrapper h-1 absolute bottom-0 left-0 right-0">
            <div id="scrollIndicator" class="h-1 w-0 bg-light-green"></div>
        </div>
    <?php endif; ?>

</header>