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
<div>
	<main id="primary" class="site-main font-body leading-8 text-gray-900">
		<div class="container mx-auto grid grid-cols-10 gap-14">
			<div class="col-span-7">
				<?php
				while (have_posts()) :
					the_post();

					get_template_part('template-parts/content', get_post_type());

					the_post_navigation(
						array(
							'prev_text' => '<span class="nav-subtitle">' . esc_html__('Previous:', 'petlovethis') . '</span> <span class="nav-title">%title</span>',
							'next_text' => '<span class="nav-subtitle">' . esc_html__('Next:', 'petlovethis') . '</span> <span class="nav-title">%title</span>',
						)
					);

					// If comments are open or we have at least one comment, load up the comment template.
					if (comments_open() || get_comments_number()) :
						comments_template();
					endif;

				endwhile; // End of the loop.
				?>
			</div>

			<aside class="col-span-3">
				<?php
				get_sidebar(); ?>
			</aside>
		</div>
	</main><!-- #primary -->


</div>
<?php
get_footer();
