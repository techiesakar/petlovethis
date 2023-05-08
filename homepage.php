<?php

/**
 * Template Name: Homepage
 *
 * @link https://www.petlovethis.com
 *
 * @package Pet_Love_This
 * @since 1.0.0
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
?>

<main id="primary" class="site-main font-poppins">
    <section id="recent-cats">
        <?php
        // Include recent posts card template part.
        get_template_part('template-parts/sections/recent-posts-card-section');
        ?>
    </section>

</main><!-- #primary -->