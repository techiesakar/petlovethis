<?php
$author_id = get_the_author_meta('ID');
$author_avatar = get_avatar($author_id, 32); // Change '32' to the desired image size
$author_url = get_author_posts_url($author_id);
?>
<div class="flex items-center  gap-2 ">
    <div class="flex items-center gap-2">
        <a href="<?php echo esc_url($author_url); ?>" class="author-avatar rounded-full overflow-hidden"><?php echo $author_avatar; ?></a>
        <span><?php the_author(); ?>
    </div>

    <span class="text-xs text-gray-600"> <?php echo get_the_date(); ?></span>
</div>