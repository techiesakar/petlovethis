<div class="flex gap-2 items-center">
    <span class="">Posted In:</span>
    <?php
    // Get the categories assigned to the post
    $categories = get_the_category();

    if (!empty($categories)) {
        echo '<ul class="flex gap-3">';
        foreach ($categories as $category) {
            echo '<li class="border border-gray-700 rounded-xl px-6 py-2"><a href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a></li>';
        }
        echo '</ul>';
    } else {
        echo 'No categories found.';
    }
    ?>
</div>