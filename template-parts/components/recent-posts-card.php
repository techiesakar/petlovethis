<?php

/**
 * Template for displaying a card component in the Pet Love This theme.
 *
 * @link https://www.petlovethis.com
 *
 * @package Pet_Love_This
 * @subpackage Components
 * @since 1.0.0
 */
?>


<?php
if (has_post_thumbnail()) {
    $thumb_id = get_post_thumbnail_id();
    $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'medium_card_image', true);
    $thumb_url = $thumb_url_array[0];
?>
    <div class="img-box flex">
        <figure class="overflow-hidden bg-primary-light block w-full">
            <a href="<?php the_permalink(); ?>" class="text-blue-500 block w-full">
                <img class="w-full object-cover max-w-full hover:opacity-20 hover:scale-105 transition-all duration-500 delay-0" src="<?php echo get_the_post_thumbnail_url(null, 'card_image') . '?v=2'; ?>" alt="<?php the_title(); ?>" alt="<?php the_title_attribute(); ?>">
            </a>
        </figure>
    </div>
<?php } ?>
<div class="pattern-layer duration-500 -right-5 -bottom-5  w-16 h-14 group-hover:opacity-100 transition-all opacity-0 bg-no-repeat group-hover:right-0 group-hover:bottom-0 absolute" style="background-image: url('<?php echo esc_url(get_template_directory_uri() . '/assets/images/shapes/shape-dots.png'); ?>');">

</div>

<div class="lower-content relative p-4 pb-5 ">
    <div class="post-meta flex">
        <?php $author_name = get_the_author(); ?>
        <span class="author">
            <?php printf(__('%s', 'petlovethis'), '<a href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '" class="uppercase text-sm">' . esc_html($author_name) . '</a>'); ?>
        </span>
    </div>
    <h4 class="post-title text-lg font-medium hover:text-primary transition mb-4  text-gray-900"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
    <p class="font-normal text-gray-600 mb-5"><?php echo wp_trim_words(get_the_excerpt(), 10, '...'); ?></p>
    <a href="<?php the_permalink(); ?>" class="btn-primary"><?php esc_html_e('Read More', 'petlovethis'); ?>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
        </svg>
    </a>
</div>