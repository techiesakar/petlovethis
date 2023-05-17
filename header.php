<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Pet_Love_This
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500&family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet"><?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site bg-gray-200">
		<a class="sr-only" href="#primary"><?php esc_html_e('Skip to content', 'petlovethis'); ?></a>

		<header id="masthead" class="site-header bg-white h-24 flex items-center relative w-full">

			<nav id="primary_nav" class="w-full  " role="navigation" aria-label="Primary Navigation">
				<div id="nav_wrapper" class="w-10/12 p-6 mx-auto bg-white flex items-center justify-between">
					<div class="site-branding">
						<?php
						the_custom_logo();
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
								'menu_class'     => 'flex gap-6',
							)
						);
						?>
						<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
								<path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25H12" />
							</svg>
						</button>
					</nav>

				</div>
			</nav>


		</header><!-- #masthead -->