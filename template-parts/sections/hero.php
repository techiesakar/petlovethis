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

<div class="relative">
    <div class="max-w-screen-xl mx-auto px-6 flex flex-col gap-8">
        <div class="relative flex overflow-hidden">
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


                    <!-- Card Start -->
                    <div class="heroCard grid grid-cols-12 gap-20  items-center  w-full ">

                        <div class="img-box col-span-5 flex items-center justify-center">
                            <figure class="overflow-hidden block w-full">
                                <a href="<?php the_permalink(); ?>">
                                    <img class="rounded-2xl w-[470px] h-[310px]" src="<?php echo get_the_post_thumbnail_url(null, "hero_image") . '?v=2'; ?>" alt="<?php the_title(); ?>" alt="<?php the_title_attribute(); ?>">
                                </a>
                            </figure>
                        </div>
                        <div class="flex flex-col gap-6 col-span-7">
                            <ul class="text-base font-semibold text-gray-900 flex gap-2">
                                <?php
                                // Display the post categories
                                $categories = get_the_category();
                                foreach ($categories as $category) {
                                ?>
                                    <li><a class="lg:px-3 py-1 px-2 rounded-lg bg-yellow-200 font-light text-xs lg:text-sm" href="<?php echo get_category_link($category->term_id); ?>"><?php echo $category->name; ?></a></li>
                                <?php } ?>
                            </ul>
                            <div class="post-title lg:text-3xl text-xl font-semibold text-gray-900"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>


                            <div class=" post-excerpt text-gray-700 text-excerpt"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></div>
                            <div class="date-posted text-xs md:text-sm">
                                <?php echo get_the_date(); ?>
                            </div>
                        </div>
                    </div> <!-- Card Ends -->


            <?php $count++;
                endwhile;


            endif;
            wp_reset_postdata();
            ?>



            <!-- Grid Ends -->


        </div>
        <!-- Add the following code for the buttons -->
        <div class="button-group mx-auto flex gap-3">
            <button id="button1" class="card-button active-button outline-none border-0" onclick="showCard(1)"></button>
            <button id="button2" class="card-button outline-none border-0" onclick="showCard(2)"></button>
            <button id="button3" class="card-button outline-none border-0" onclick="showCard(3)"></button>
            <button id="button4" class="card-button outline-none border-0" onclick="showCard(4)"></button>
        </div>
    </div>
</div>