<?php
# The template for displaying search page.
?>
<?php get_header(); ?>
<main class="layout__main">
    <article class="post">
        <div class="post__meta">
            <h1 class="post__title">Search results for: <?php printf(get_search_query()); ?></h1>
        </div>
    </article>
    <div class="row">
        <?php
        while (have_posts()) : the_post();
        ?>
            <div class="col-12 col-lg-6 post-matrix__item">
                <article class="post-preview<?php echo has_post_thumbnail() ? '' : ' post-preview_text-only' ?>">
                    <?php if (has_post_thumbnail()) : ?>
                        <a href="<?php the_permalink() ?>">
                            <img alt="" class="post-preview__thumb" src="<?php echo wp_get_attachment_image_url(get_post_thumbnail_id(), 'full') ?>" />
                        </a>
                    <?php endif; ?>
                    <div class="post-preview__meta">
                        <h2 class="post-preview__title">
                            <a href="<?php the_permalink(); ?>" class="link link_text"><?php the_title(); ?></a>
                        </h2>
                        <div class="post-meta">
                            <span class="post-meta__date">
                                <?php echo get_the_date('j F Y'); ?>
                            </span>
                            <span class="post-meta__category">in
                                <?php
                                $links = array_map(function ($category) {
                                    return sprintf(
                                        '<a href="%s" class="link link_text">%s</a>', // Шаблон вывода ссылки
                                        esc_url(get_category_link($category)), // Ссылка на рубрику
                                        esc_html($category->name) // Название рубрики
                                    );
                                }, get_the_category());
                                echo implode('&nbsp;and&nbsp;', $links);
                                ?>
                            </span>
                        </div>
                    </div>
                </article>
            </div>
        <?php
        endwhile;
        ?>
    </div>
</main>
<?php get_footer(); ?>