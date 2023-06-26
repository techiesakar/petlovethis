<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Pet_Love_This
 */

get_header();
?>

<main id="primary" class="site-main pt-24">
	<section class="error-404 not-found w-10/12 mx-auto">
		<div class="relative">
			<div class=" mx-auto py-8 relative">
				<header class="page-header">
					<div class="page-title text-4xl text-gray-700 font-semibold mb-3"><?php esc_html_e('Error 404', 'petlovethis'); ?></div>
					<div class="page-desc text-gray-500/90 mb-3"><?php esc_html_e('Looks like there’s no article here but you’ve found Kayla, our lost puppy!', 'petlovethis'); ?></div>
				</header><!-- .page-header -->

				<div class="grid w-full lg:grid-cols-12 lg:gap-20 gap-8 items-center">
					<div class="page-content lg:col-span-8 flex flex-col gap-8">
						<div class="text-gray-600">Recommended Reads</div>

						<?php
						// Get the latest post from any category
						$latest_post = get_posts(array(
							'posts_per_page' => 2,
							'orderby' => 'date',
							'order' => 'DESC'
						));

						// Check if there is a latest post available
						if ($latest_post) {
							global $image_size;
							// Display the latest post
							foreach ($latest_post as $post) {
								setup_postdata($post);
						?>

								<article class="card relative rounded-lg overflow-hidden group bg-white flex gap-6">
									<?php
									$image_size = 'md_card_image';
									get_template_part('template-parts/components/post-lists-with-image', $image_size);
									?>
								</article>

								<!-- Add Latest List Post Article Component -->
							<?php
							}
							wp_reset_postdata();
						} else {
							// Fallback content if no posts are found
							?>
							<h2>No post found</h2>
							<p>Oops! It seems we're currently experiencing a shortage of posts. Please check back later for more exciting content!</p>
						<?php
						}
						?>
					</div><!-- .page-content -->
					<aside class="lg:col-span-4 flex items-center justify-center w-full">
						<img class="w-60 lg:w-80" src="<?php echo get_template_directory_uri() . "/assets/images/404.png" ?>" alt="404 image" />
					</aside>
				</div>

			</div>
		</div>
	</section><!-- .error-404 -->

</main><!-- #main -->

<?php
get_footer();
