<?php

/**
 * Template for displaying a Block 2 in the Pet Love This theme.
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
<div class="relative ">

    <div class="max-w-screen-xl mx-auto py-8 px-6  relative ">

        <div class="w-full lg:grid grid-cols-12 grid-rows-3 gap-4">
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
                    $date_posted = get_the_date();


            ?>
                    <?php if ($count == 2) : ?>
                        <div class="row-span-3 col-span-7 flex-col lg:flex-row flex gap-6 shadow p-4 rounded-lg bg-white">
                            <div class="lg:w-6/12 w-full">
                                <a href="<?php the_permalink(); ?>"> <img src="<?php echo get_the_post_thumbnail_url() ?>" class="object-cover w-full h-full hover:-translate-y-1 duration-300 ease-in-out">
                                </a>
                            </div>
                            <div class="lg:w-6/12 w-full flex gap-3 flex-col justify-center">

                                <h1 class="lg:text-3xl text-xl font-bold"><a href="<?php the_permalink(); ?>"> <?php the_title() ?></a></h1>

                                <p><?php echo wp_trim_words(get_the_excerpt(), 20, '...') ?></p>

                                <span class="text-sm"> <?php echo $date_posted;
                                                        ?></span>
                            </div>
                        </div>
                        <?php
                        $count++;
                        ?>
                    <?php else : ?>
                        <div class="row-span-1 col-span-5 flex gap-6 shadow p-4 rounded-lg bg-white">
                            <div class="w-4/12">
                                <a href="<?php the_permalink(); ?>">
                                    <img src="<?php echo get_the_post_thumbnail_url() ?>" class="object-cover h-32 hover:-translate-y-1 duration-300 ease-in-out">
                                </a>
                            </div>
                            <div class="w-8/12">
                                <h1 class="lg:text-xl text-lg font-semibold"><a href="<?php the_permalink(); ?>"> <?php the_title() ?></a></h1>

                                <span class="text-sm"> <?php echo $date_posted;
                                                        ?></span>
                            </div>
                        </div>
                        <?php
                        $count++;
                        ?>
                    <?php endif; ?>

            <?php endwhile;
            endif ?>
        </div>
    </div>
</div>