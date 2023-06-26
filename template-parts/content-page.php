<?php

/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Pet_Love_This
 */

?>
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


					<!-- Single Post Title -->
					<h1 class="entry-title md:text-3xl text-2xl lg:text-5xl font-semibold text-gray-800 lg:leading-[56px]		">
						<?php the_title(); ?>
					</h1>
					<!-- .entry_title -->


				</header><!-- .entry-header -->

				<div class="entry-content flex flex-col gap-6">

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


				</div><!-- .entry-content -->




			</article><!-- #post-<?php the_ID(); ?> -->


		</div>
	</div>





</section>