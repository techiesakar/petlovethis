<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Pet_Love_This
 */
?>


<section class="petContainer relative lg:pt-8">
	<div class="lg:w-9/12 mx-auto">
		<div class=" relative gap-8 mb-4 bg-white rounded-lg">

			<article id=" post-<?php the_ID(); ?>" <?php post_class("flex md:col-span-8 flex-col gap-8 single-article"); ?>>
				<header class="entry-header w-full flex flex-col gap-3 ">
					<!--Top Single Category-->
					<div class="entry_category flex gap-2 entry-category">
						<?php get_template_part('template-parts/components/entry-category'); ?>
					</div>
					<!-- .entry_category -->
					<div class="breadcrumbs flex gap-2 text-xs ld:text-sm items-center">
						<?php echo get_breadcrumb(); ?>
					</div>
					<!-- .breadcrumbs -->

					<!-- Single Post Title -->
					<h1 class="entry-title md:text-3xl text-2xl lg:text-5xl font-semibold text-gray-800 lg:leading-[56px]		">
						<?php the_title(); ?>
					</h1>
					<!-- .entry_title -->

					<!-- Post Meta  -->
					<div class="post__meta  w-full sm:bg-highlight-bg rounded-3xl flex sm:flex-row flex-col justify-between gap-3 sm:items-center p-3 lg:p-5">
						<div class="entry-meta text-sm">
							<!-- Display author's image with clickable URL -->
							<?php get_template_part('template-parts/components/entry-meta'); ?>

						</div><!-- .entry-meta -->
						<!-- Post Meta - Share Icon -->
						<div class="flex gap-6 items-center">
							<?php get_template_part('template-parts/components/share');
							?>
						</div>
					</div>
					<!-- .post__meta -->
				</header><!-- .entry-header -->

				<div class="entry-content flex flex-col gap-6">
					<div class="rounded-lg overflow-hidden">
						<?php petlovethis_post_thumbnail(); ?>
					</div>
					<?php
					the_content(
						sprintf(
							wp_kses(
								/* translators: %s: Name of current post. Only visible to screen readers */
								__('Continue reading<span class="screen-reader-text"> "%s"</span>', 'petlovethis'),
								array(
									'span' => array(
										'class' => array(),
									),
								)
							),
							wp_kses_post(get_the_title())
						)
					);
					?>
					<!-- For Categories -->
					<?php get_template_part('template-parts/components/posted-in'); ?>
					<!-- Share Buttons -->
					<hr class="mb-8">
					<?php
					get_template_part('template-parts/components/share');
					get_template_part('template-parts/components/prev-next-post');
					?>
				</div><!-- .entry-content -->



				<footer class="entry-footer">
					<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if (comments_open() || get_comments_number()) :
						comments_template();
					endif;
					?>



				</footer><!-- .entry-footer -->
			</article><!-- #post-<?php the_ID(); ?> -->


		</div>
	</div>

	<div class="related-posts flex flex-col w-full gap-6 my-20">
		<?php
		$categories = get_the_category(); // Retrieve the categories for the current post

		if ($categories) {
			$category_ids = array(); // Array to store category IDs
			foreach ($categories as $category) {
				$category_ids[] = $category->term_id; // Add category ID to the array
			}

			$args = array(
				'post_type' => 'post',
				'posts_per_page' => 6,
				'post__not_in' => array(get_the_ID()),
				'category__in' => $category_ids, // Use the category IDs for filtering
			);
			$related_posts = new WP_Query($args);

			// Display related articles if there are any
			if ($related_posts->have_posts()) :
		?>
				<h3 class="text-xl md:text-3xl lg:text-4xl mb-4 font-bold">Related Articles</h3>
				<div class="grid lg:grid-cols-3 relative gap-8 mb-4 w-full">
					<?php
					global $hide_excerpt;
					global $image_size;
					while ($related_posts->have_posts()) :
						$related_posts->the_post();
					?>
						<!-- Place Latest Post List Image - Component -->

						<article class="card  relative  rounded-md overflow-hidden group bg-white flex gap-6">
							<?php
							$image_size = 'sm_card_image';
							$hide_excerpt = true;
							get_template_part('template-parts/components/post-lists-with-image', $image_size, $hide_excerpt);
							?>
						</article>
					<?php
					endwhile;
					?>
				</div>
		<?php
			endif;
			wp_reset_postdata();
		}
		?>
	</div>



</section>