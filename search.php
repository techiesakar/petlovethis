<?php

/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Pet_Love_This
 */

get_header();
?>

<main id="primary" class="site-main pt-24">
	<section id="search-page">
		<?php
		// Include recent posts card template part.
		get_template_part('template-parts/content', 'search');
		?>
	</section>

</main><!-- #main -->
<?php get_footer();
