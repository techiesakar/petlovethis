<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Pet_Love_This
 */

get_header();
?>

<main id="primary" class="site-main">
	<section id="recent-cats">
		<?php
		// Include recent posts card template part.
		get_template_part('template-parts/sections/archive-section');
		?>
	</section>

</main><!-- #main -->