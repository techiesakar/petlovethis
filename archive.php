<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Pet_Love_This
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
?>

<main id="primary" class="site-main pt-24">
	<section id="archive">
		<?php
		// Include recent posts card template part.
		get_template_part('template-parts/content', 'archive');
		?>
	</section>

</main><!-- #main -->
<?php get_footer();
