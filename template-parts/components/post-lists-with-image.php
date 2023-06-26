<?php
global $image_size;
global $hide_excerpt;

if (has_post_thumbnail()) {
    $thumb_id = get_post_thumbnail_id();
    $thumb_url_array = wp_get_attachment_image_src($thumb_id, $image_size, true);
    $thumb_url = $thumb_url_array[0];
?>
    <div class="img-box w-4/12 flex items-center justify-center">
        <figure class="overflow-hidden block w-full">
            <a href="<?php the_permalink(); ?>">
                <img class="rounded-2xl" src="<?php echo get_the_post_thumbnail_url(null, $image_size) . '?v=2'; ?>" alt="<?php the_title(); ?>" alt="<?php the_title_attribute(); ?>">
            </a>
        </figure>
    </div>

    <div class="flex flex-col gap-2 w-8/12">
        <ul class="text-base font-semibold text-gray-900 flex gap-2">
            <?php
            // Display the post categories
            $categories = get_the_category();
            foreach ($categories as $category) {
            ?>
                <li><a class="lg:px-3 py-1 px-2 rounded-lg bg-yellow-200 font-light text-xs lg:text-sm" href="<?php echo get_category_link($category->term_id); ?>"><?php echo $category->name; ?></a></li>
            <?php } ?>
        </ul>
        <div class="post-title lg:text-lg md:text-base text-sm font-semibold text-gray-900"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>

        <?php if ($hide_excerpt == false) : ?>
            <div class="hidden md:block post-excerpt text-gray-700 text-excerpt"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></div>
            <div class="date-posted text-xs md:text-sm">
                <?php echo get_the_date(); ?>
            </div>
        <?php endif; ?>


    </div>
<?php }  ?>