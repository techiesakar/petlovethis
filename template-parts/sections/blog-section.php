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

<header class="page-header w-full relative flex items-center justify-start flex-col bg-cover bg-no-repeat bg-center py-40 px-0 before:absolute before:content-[''] before:w-full before:h-full before:top-0 before:left-0 before:opacity-70 before:z-10 before:bg-black">
    <h2 class="relative z-50 page-title text-6xl font-bold mb-4 max-w-lg mx-auto text-gray-100"><?php the_title(); ?></h2>
    <?php

    get_template_part('template-parts/components/breadcrumb');
    ?>

    <div class="absolute top-0 h-100 -z-10 left-0 bottom-0 right-0" style="background-image:url(<?php echo get_template_directory_uri(); ?>/assets/images/background/breadcrumb-1.jpg)"></div>
</header>
<div class="max-w-screen-xl mx-auto py-8 px-6">

    <div class="grid grid-cols-3 relative gap-6 mb-4">
        <?php
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => get_option('posts_per_page'),
            'paged' => $paged
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


        endif;
        ?>
    </div>
    <!-- Grid Ends -->
    <?php
    // Display pagination links.
    petlovethis_pagination($paged, $query->max_num_pages);
    wp_reset_postdata(); ?>
</div>