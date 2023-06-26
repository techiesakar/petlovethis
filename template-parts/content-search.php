<?php

/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Pet_Love_This
 */

?>

<div class="relative py-8 ">


	<section class="max-w-screen-2xl mx-auto relative flex flex-col gap-8">

		<div class="flex items-center gap-2">
			<a class="text-gray-600" href="<?php echo esc_url(get_home_url()); ?>">Home</a>

			<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-3 text-gray-900">
				<path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
			</svg>

			<span class="text-gray-900 font-semibold">
				<?php
				/* translators: %s: search query. */
				printf(esc_html__('Search Results for: %s', 'petlovethis'), '<span>' . get_search_query() . '</span>');
				?>
			</span>


		</div>
		<div class="grid grid-cols-12">
			<div class="flex flex-col col-span-8 relative gap-8 mb-4">
				<div class="text-3xl font-semibold">
					<?php
					/* translators: %s: search query. */
					printf(esc_html__('Search Results for: %s', 'petlovethis'), '<span>' . get_search_query() . '</span>');
					?>
				</div>
				<?php

				while (have_posts()) :
					the_post();
				?>
					<article class="card relative rounded-md overflow-hidden group bg-white flex gap-6">
						<?php
						$image_size = 'md_card_image';
						get_template_part('template-parts/components/post-lists-with-image', $image_size);
						?>
					</article>

				<?php endwhile; ?>



			</div>
			<aside class="col-span-4"></aside>
		</div>

	</section>
</div>