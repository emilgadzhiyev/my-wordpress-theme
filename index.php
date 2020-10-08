<?php
# The template for displaying main page.
?>
<?php get_header(); ?>
<main class="layout__main">
    <div class="post-matrix">
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
                                            '<a href="%s" class="link link_text">%s</a>',
                                            esc_url(get_category_link($category)),
                                            esc_html($category->name)
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
    </div>
</main>
<section class="layout__section">
    <div class="paginator">
        <?php
        echo str_replace(["page-numbers", " current"], ["paginator__link", " paginator__link_active"], get_the_posts_pagination(['prev_next' => false, 'next_text' => false]));
        ?>
    </div>
</section>
<section class="layout__section">
    <div class="row">
        <div class="col-12 col-lg-9">
            <div class="block__home">
                <h1>Emil Gadzhiyev&nbsp;&mdash; Web &amp;&nbsp;Entrepreneurship</h1>
                <p>This is&nbsp;my&nbsp;website. Here I&nbsp;write about the things, that interest&nbsp;me.<br>
                    Mainly they are: <a href="https://www.emilgadzhiyev.me/c/technologies/">technologies</a>, <a href="https://www.emilgadzhiyev.me/c/notes/">notes</a>, <a href="https://www.emilgadzhiyev.me/c/projects/">projects</a>.<br>
                    You can read more about me&nbsp;<a href="https://www.emilgadzhiyev.me/about/">here</a>. About professional growth <a href="https://www.emilgadzhiyev.me/about/me/certificates/">here</a>.<br>
                    For everything else, you can search below.</p>
            </div>
        </div>
    </div>
</section>
<section class="layout__section">
    <div class="row">
        <div class="col-12 col-lg-9">
            <div class="block__home">
                <?php get_search_form(); ?>
                <p class="homeSearchResults">Popular queries:
                    <a href="https://www.emilgadzhiyev.me/?s=python">python</a>,
                    <a href="https://www.emilgadzhiyev.me/?s=bookmarks">bookmarks</a>&nbsp;and
                    <a href="https://www.emilgadzhiyev.me/?s=bug">bug</a>.
                </p>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>
