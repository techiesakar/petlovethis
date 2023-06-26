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
    <div class="max-w-screen-2xl mx-auto relative text-white">

        <div class="content flex flex-col gap-6 mb-8 ">
            <?php
            if (is_category()) {
                $category = get_queried_object();
                $category_title = $category->name;
                $category_description = term_description($category);
            }
            ?>
            <h1 class="text-6xl text-gray-900 text-left relative w-fit ">
                <?php echo esc_html($category_title) ?>
                <span class="w-1/2 rounded h-1 bg-underline absolute -bottom-4 left-0"></span>
            </h1>
            <p class=" text-gray-600"><?php echo wp_strip_all_tags($category_description); ?></p>

        </div>



    </div>
    </section>
    <section class="max-w-screen-2xl mx-auto relative ">
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