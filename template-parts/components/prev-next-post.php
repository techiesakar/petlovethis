<div class="flex justify-between">
    <?php
    // Get the previous post link
    $previous_post = get_previous_post();
    if (!empty($previous_post)) {
        $previous_post_id = $previous_post->ID;
        $previous_post_title = get_the_title($previous_post_id);
        $previous_post_permalink = get_permalink($previous_post_id);
        $previous_post_image = get_the_post_thumbnail_url($previous_post_id, 'thumbnail'); // Change 'thumbnail' to the desired image size
        $previous_post_categories = get_the_category($previous_post_id);


        if (!empty($previous_post_image)) {
    ?>
            <article class="card  relative  rounded-md overflow-hidden group bg-white flex flex-col gap-3">
                <span>Previous Post</span>

                <div class="flex gap-6">
                    <div class="img-box">
                        <figure class="overflow-hidden block w-full">
                            <a href="<?php echo esc_url($previous_post_permalink); ?>" class="previous-post-link">
                                <img class="w-32 h-24 object-cover mb-2 rounded-2xl" src="<?php echo esc_url($previous_post_image); ?>" alt="<?php echo esc_attr($previous_post_title); ?>">
                            </a>
                        </figure>
                    </div>
                    <div class="flex flex-col gap-2">

                        <?php if (!empty($previous_post_categories)) { ?>
                            <div class="post-categories">
                                <?php foreach ($previous_post_categories as $category) { ?>
                                    <a class="px-3 py-1 rounded-lg bg-yellow-200 font-light text-sm" href="<?php echo esc_url(get_category_link($category->term_id)); ?>" class="category-link"><?php echo esc_html($category->name); ?></a>
                                <?php } ?>
                            </div>
                        <?php } ?>
                        <div class="post-title text-base font-semibold text-gray-900 ">
                            <a href="<?php echo esc_url($previous_post_permalink); ?>">
                                <?php echo esc_html($previous_post_title); ?>
                            </a>
                        </div>
                    </div>
                </div>



            </article>
        <?php
        }
    }

    // Get the next post link
    $next_post = get_next_post();
    if (!empty($next_post)) {
        $next_post_id = $next_post->ID;
        $next_post_title = get_the_title($next_post_id);
        $next_post_permalink = get_permalink($next_post_id);
        $next_post_image = get_the_post_thumbnail_url($next_post_id, 'thumbnail'); // Change 'thumbnail' to the desired image size
        $next_post_categories = get_the_category($next_post_id);



        if (!empty($next_post_image)) {
        ?>
            <article class="card  relative  rounded-md overflow-hidden group bg-white flex flex-col gap-3">
                <span>Next Post</span>
                <div class="flex gap-6">
                    <div class="img-box ">
                        <figure class="overflow-hidden block w-full">
                            <a href="<?php echo esc_url($next_post_permalink); ?>" class="next-post-link">
                                <img class="w-32 h-24 object-cover mb-2 rounded-2xl" src="<?php echo esc_url($next_post_image); ?>" alt="<?php echo esc_attr($next_post_title); ?>">
                            </a>
                        </figure>
                    </div>
                    <div class="flex flex-col gap-2">
                        <?php if (!empty($next_post_categories)) { ?>
                            <div class="post-categories">
                                <?php foreach ($next_post_categories as $category) { ?>
                                    <a class="px-3 py-1 rounded-lg bg-yellow-200 font-light text-sm" href="<?php echo esc_url(get_category_link($category->term_id)); ?>" class="category-link"><?php echo esc_html($category->name); ?></a>
                                <?php } ?>
                            </div>
                        <?php } ?>
                        <div class="post-title text-base font-semibold text-gray-900 ">
                            <a href="<?php echo esc_url($next_post_permalink); ?>">
                                <?php echo esc_html($next_post_title); ?>
                            </a>
                        </div>
                    </div>
                </div>



            </article>
    <?php
        }
    }
    ?>
</div>