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


<div class="max-w-screen-xl mx-auto py-8 px-6">
    <?php
    if (is_category()) {
        $category_title = single_cat_title('', false);
        $category_id = get_queried_object_id();
        echo '<h2 class="section-title text-3xl font-bold mb-4 text-center max-w-lg mx-auto text-primary-dark">' . $category_title . '</h2>
        ';
    }
    ?>
    <p class="text-lg font-normal text-gray-600 mb-4 text-center max-w-2xl mx-auto leading-8">Our website covers a variety of feline-related topics, including hypoallergenic cat breeds, DIY cat bed plans, cat food reviews, and recommendations to keep your cat happy and content.</p>

    <div class="grid grid-cols-3 relative gap-6 mb-4">
        <?php
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => 6,
            'cat' => $category_id,
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

</div>