<?php get_header(); ?>

<div id="primary" class="content-area pt-24">
    <main id="main" class="site-main" role="main">

        <?php
        if (have_posts()) :
            while (have_posts()) : the_post();
        ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
                        <h1 class="entry-title"><?php the_author(); ?></h1>
                    </header><!-- .entry-header -->

                    <div class="author-bio">
                        <div class="author-avatar">
                            <?php echo get_avatar(get_the_author_meta('ID'), 150); ?>
                        </div>
                        <div class="author-description">
                            <p><?php the_author_meta('description'); ?></p>
                        </div>
                    </div><!-- .author-bio -->

                    <div class="entry-content">
                        <?php the_content(); ?>
                    </div><!-- .entry-content -->
                </article><!-- #post-<?php the_ID(); ?> -->

        <?php
            endwhile;
        else :
            get_template_part('template-parts/content', 'none');
        endif;
        ?>

    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>