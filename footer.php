<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Pet_Love_This
 */

?>

<footer id="colophon" class="site-footer bg-white flex flex-col gap-6 border-t border-gray-300">
	<div class=" petContainer flex md:flex-row flex-col md:justify-between gap-8  pt-16 p-6">
		<div class="md:w-1/3 flex flex-col gap-20 !text-gray-700">

			<?php if (is_active_sidebar('footer-1')) : ?>
				<?php dynamic_sidebar('footer-1'); ?>
			<?php endif; ?>


			<div class="footer-social flex flex-col gap-6">
				<p class=" font-semibold text-lg">Let's be friends!</p>
				<div class="flex gap-6 text-xl">
					<?php
					$shortcode_output = do_shortcode('[petlovethis_social_links]');
					echo $shortcode_output;
					?>
				</div>
			</div>

		</div>
		<div class="md:w-1/2  gap-20">
			<nav role="navigation" class="w-8/12 md:ml-auto flex flex-col gap-6 text-white">
				<p class="text-2xl  font-semibold">Discover</p>
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-4',
						'menu_id'        => 'discover-menu',
						'container'      => false, // Removes the container <div>
						'menu_class'     => 'justify-between gap-4  grid-cols-3 grid text-white',
					)
				);
				?>
			</nav>
		</div>


	</div>
	<div class="w-full border-t border-gray-300 text-gray-700">
		<div class=" petContainer  md:py-16 p-2">
			<div class="site-info font-light text-xs tracking-wider flex flex-col gap-6">
				<p class=" md:w-2/3 "><span class="font-semibold">Petlovethis.com</span> does not intend to provide veterinary advice. While we provide information resources and canine education, the content here is not a substitute for veterinary guidance.</p>
				<div>
					<a href="<?php echo esc_url(__('https://wordpress.org/', 'petlovethis')); ?>" class=" ">
						<?php
						/* translators: %s: CMS name, i.e. WordPress. */
						printf(esc_html__('Proudly powered by %s', 'petlovethis'), 'WordPress');
						?>
					</a>
					<span class="sep"> | </span>
					<?php
					/* translators: 1: Theme name, 2: Theme author. */
					printf(esc_html__('Theme: %1$s by %2$s.', 'petlovethis'), 'petlovethis', '<a href="https://github.com/techiesakar" class="font-semibold">Sakar Aryal</a>');
					?>
				</div>
			</div><!-- .site-info -->
		</div>
	</div>




	<button class="fixed bottom-[4%] right-[4%] p-2 bg-light-green rounded-2xl transition-colors hover:bg-light-purple text-underline hidden" type="button" id="toTop">
		<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
			<path stroke-linecap="round" stroke-linejoin="round" d="M12 19.5v-15m0 0l-6.75 6.75M12 4.5l6.75 6.75" />
		</svg>
	</button>
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>