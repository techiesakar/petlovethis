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

<main id="primary" class="site-main pt-24">

    <section>
        <?php get_template_part('template-parts/sections/hero'); ?>
    </section>

    <section>
        <?php

        get_template_part('template-parts/sections/block-2');


        ?>
    </section>

    <section>
        <?php
        get_template_part('template-parts/sections/recent-posts-card-section');

        ?>
    </section>

    <section>
        <?php
        get_template_part('template-parts/sections/featured-section-1');

        ?>
    </section>

</main><!-- #primary -->

<?php get_footer();
