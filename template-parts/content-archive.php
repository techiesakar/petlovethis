<?php

/**
 * Template for displaying a card component in the Archive Page
 *
 * @link https://www.petlovethis.com
 *
 * @package Pet_Love_This

 */
// Exit if accessed directly.
defined('ABSPATH') || exit;
?>

<div class="relative py-8">
    <div class="max-w-screen-xl mx-auto relative text-white">

        <div class="content flex flex-col gap-6 mb-8 ">
            <div class="flex items-center gap-2">
                <a class="text-gray-600" href="<?php echo esc_url(get_home_url()); ?>">Home</a>

                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-3 text-gray-900">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                </svg>

                <span class="text-gray-900 font-semibold">
                    <?php $category = get_queried_object();
                    $category_title = $category->name;

                    echo $category_title ?>
                </span>


            </div>


            <?php
            if (has_nav_menu('archive-categories')) {
            ?>
                <div class="font-semibold text-lg text-gray-900">
                    Filtered By Category:
                </div>
            <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'archive-categories',
                        'menu_id'        => 'archive-categories',
                        'container'      => false, // Removes the container <div>
                        'menu_class'     => 'flex gap-6 font-semibold',
                    )
                );
            }
            ?>



        </div>
    </div>
    </section>
    <section class="max-w-screen-xl mx-auto relative ">
        <div class="grid grid-cols-12">
            <div class="flex flex-col col-span-8 relative gap-8 mb-4">



                <?php
                if (is_category()) {
                    $category = get_queried_object();
                    $category_title = $category->name;
                ?>

                    <div class="font-semibold text-lg text-gray-900">
                        Articles all about <?php echo $category_title ?>
                    </div>
                    <?php

                    $paged = get_query_var('paged') ? get_query_var('paged') : 1;

                    // Display posts within the category using WP_Query
                    $query_args = array(
                        'category_name' => $category->slug,
                        'posts_per_page' => 3, // Display all posts in the category
                        'paged' => $paged,
                    );

                    $query = new WP_Query($query_args);

                    if ($query->have_posts()) {
                        global $image_size;
                        while ($query->have_posts()) {
                            $query->the_post();
                            // Display post content or any desired information

                    ?>
                            <article class="card relative rounded-md overflow-hidden group bg-white flex gap-6">
                                <?php
                                $image_size = 'md_card_image';
                                get_template_part('template-parts/components/post-lists-with-image', $image_size);
                                ?>
                            </article>
                <?php
                        }
                        wp_reset_postdata();
                    } else {
                        echo 'No posts found.';
                    }
                }
                ?>

                <?php
                // Display pagination links.
                petlovethis_pagination($paged, $query->max_num_pages);
                wp_reset_postdata(); ?>
            </div>
            <aside class="col-span-4"></aside>
        </div>

    </section>
</div>