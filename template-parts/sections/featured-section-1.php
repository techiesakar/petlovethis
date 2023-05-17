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

    <div class="grid grid-cols-2 grid-rows-3 relative gap-8 mb-4">
        <?php
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => 4,
        );
        $query = new WP_Query($args);
        $count = 1;
        if ($query->have_posts()) :
            while ($query->have_posts()) :
                $query->the_post();
        ?>
                <?php if ($count == 1) : ?>
                    <!-- Card Start -->
                    <div class="card row-span-3 col-span-1 relative rounded-lg overflow-hidden shadow-md hover:-translate-y-1 transition duration-300">
                        <a href="<?php the_permalink(); ?>" class="flex w-full h-full relative">
                            <div class="card_bg">
                                <img src="<?php echo get_the_post_thumbnail_url() ?>" class="object-cover w-full h-full">
                            </div>
                            <div class="card_body w-full p-6 absolute bottom-0 left-0 right-0">
                                <div class="post-content rounded-lg bg-white p-5">
                                    <h2 class="mb-4 transition text-gray-900 hover:text-primary font-semibold text-lg"><?php the_title(); ?></h2>
                                    <div class="flex justify-between items-center">
                                        <div class="flex items-center justify-between gap-2">
                                            <?php
                                            // Get the author's ID
                                            $author_id = get_the_author_meta('ID');
                                            echo get_avatar($author_id, 24, '', '', array('class' => 'author-avatar rounded-full'));
                                            ?>
                                            <h2 class="text-xs text-gray-900 hover:text-primary  ">By <?php echo get_the_author(); ?></h2>
                                        </div>
                                        <a class="flex items-center gap-2" href="<?php the_permalink(); ?>"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-primary">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 5.25h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5" />
                                            </svg>
                                            <span class="text-xs text-gray-900 hover:text-primary font-semibold">Read</span></a>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div> <!-- Card Ends -->
                <?php else : ?>
                    <!-- Card Start -->
                    <div class="card row-span-1 col-span-1 relative rounded-lg overflow-hidden shadow-md hover:-translate-y-1 transition duration-300">
                        <div class="flex w-full h-full relative  justify-between">
                            <div class="w-60">
                                <a href="<?php the_permalink(); ?>"><img src="<?php echo get_the_post_thumbnail_url() ?>" class="object-cover w-full h-full"></a>
                            </div>
                            <div class="w-[calc(100%-240px)]">
                                <div class="post-content  bg-white p-4">
                                    <h2 class="mb-4 text-gray-900 transition hover:text-primary font-semibold text-lg"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                    <div class="flex justify-between items-center">
                                        <div class="flex items-center justify-between gap-2">
                                            <?php
                                            // Get the author's ID
                                            $author_id = get_the_author_meta('ID');
                                            echo get_avatar($author_id, 24, '', '', array('class' => 'author-avatar rounded-full'));
                                            ?>
                                            <h2 class="text-xs text-gray-900 transition hover:text-primary up ">By <?php echo get_the_author(); ?></h2>
                                        </div>
                                        <a class="flex items-center gap-2" href="<?php the_permalink(); ?>"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-primary">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 5.25h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5" />
                                            </svg>
                                            <span class="text-xs text-gray-900 transition hover:text-primary font-semibold">Read</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- Card Ends -->
                <?php endif; ?>
        <?php $count++;
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