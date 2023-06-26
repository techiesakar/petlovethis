<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Pet_Love_This
 */

get_header();
?>

<main id="primary" class="site-main  font-poppins pt-16 md:pt-20 lg:pt-24">

	<section id="single__post">
		<?php
		while (have_posts()) :
			the_post();

			get_template_part('template-parts/content', get_post_type());

		endwhile; // End of the loop.
		?>
	</section>


	</div>
</main><!-- #primary -->



<?php
get_footer();
