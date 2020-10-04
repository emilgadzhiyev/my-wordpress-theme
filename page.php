<?php
# The template for displaying page.
?>
<?php get_header(); ?>
<main class="layout__main">
    <article class="post">
        <div class="post__meta">
            <h1 class="post__title"><?php the_title(); ?></h1>
        </div>
        <div class="row">
            <div class="col-12 col-lg-9">
                <div class="post__body">
                    <?php if (have_posts()) : ?>
                        <?php while (have_posts()) : the_post(); ?>
                            <?php echo the_content() ?>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </article>
</main>
<?php get_footer(); ?>