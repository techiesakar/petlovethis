<?php

/**
 * Template for displaying a card component in the Pet Love This theme.
 *
 * @link https://www.petlovethis.com
 *
 * @package Pet_Love_This
 * @subpackage Sections
 * @since 1.0.0
 */
// Exit if accessed directly.
defined('ABSPATH') || exit;
?>


<div class="max-w-screen-2xl mx-auto py-8 px-6">
    <h2 class="section-title text-3xl font-bold mb-4 text-center max-w-lg mx-auto text-primary-dark">Purr-use Our Cat Articles</h2>
    <p class="text-lg font-normal text-gray-600 mb-4 text-center max-w-2xl mx-auto leading-8">Our website covers a variety of feline-related topics, including hypoallergenic cat breeds, DIY cat bed plans, cat food reviews, and recommendations to keep your cat happy and content.</p>

    <div class="grid grid-cols-3 relative gap-6 mb-4">
        <?php
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => 3,
        );
        $query = new WP_Query($args);

        if ($query->have_posts()) :
            while ($query->have_posts()) :
                $query->the_post(); ?>
                <!-- Card Start -->
                <div class="card row-span-1 relative shadow-md rounded-md overflow-hidden group ">
                    <?php
                    get_template_part('template-parts/components/recent-posts-card'); ?>
                </div>
                <!-- Card Ends -->
        <?php
            endwhile;
            wp_reset_postdata();
        endif;
        ?>
    </div>
    <p class="font-normal text-lg text-gray-600 mb-4 text-center  max-w-2xl  mx-auto">Find the perfect cat breed for you, discover the latest scientific breakthroughs in cat nutrition and behavior, and get invaluable advice from our team of experts and veterinarians. </p>
    <div class="text-center">
        <a href="#" class="inline-flex gap-2 transition hover:text-primary p-2 group"> <span><?php esc_html_e('More Cat Articles', 'petlovethis'); ?></span>
            <svg class="w-6 h-6 group-hover:translate-x-2 translate-x-[3px] transition-all duration-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
            </svg>
        </a>
    </div>
</div>