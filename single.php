<?php
# The template for displaying single post.
?>
<?php get_header(); ?>
<main class="layout__main">
    <article class="post">
        <div class="post__meta">
            <h1 class="post__title"><?php the_title(); ?></h1>
            <div class="post-meta">
                <span class="post-meta__date"><?php echo get_the_date('j F Y'); ?></span>
                <span class="post-meta__category">in
                    <?php
                    $links = array_map(function ($category) {
                        return sprintf(
                            '<a href="%s" class="link link_text">%s</a>',
                            esc_url(get_category_link($category)),
                            esc_html($category->name)
                        );
                    }, get_the_category());
                    echo implode(',&nbsp;', $links);
                    ?>
                </span>
            </div>
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
<section class="layout__section">
    <div class="row">
        <div class="col-12 col-lg-6">
            <div class="another-post another-post_prev">
                <?php
                $prev_post = get_previous_post();
                $prevThumbnailUrl = wp_get_attachment_image_url(get_post_thumbnail_id($prev_post->ID), 'full');
                echo '<a class="link link_text another-post__link" href="' . get_permalink($prev_post) . '">Previous</a>';
                ?>
                <h2 class="another-post__title"><?php echo esc_html($prev_post->post_title) ?></h2>
                <img class="another-post__thumb" src="<?php echo $prevThumbnailUrl; ?>">
            </div>
        </div>
        <div class="col-12 col-lg-6">
            <div class="another-post another-post_next">
                <?php
                $next_post = get_next_post();
                $nextThumbnailUrl = wp_get_attachment_image_url(get_post_thumbnail_id($next_post->ID), 'full');
                echo '<a class="link link_text another-post__link" href="' . get_permalink($next_post) . '">Next</a>';
                ?>
                <h2 class="another-post__title"><?php echo esc_html($next_post->post_title) ?></h2>
                <img class="another-post__thumb" src="<?php echo $nextThumbnailUrl; ?>">
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>