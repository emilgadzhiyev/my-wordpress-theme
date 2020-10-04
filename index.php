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
                <p>Lorem Ipsum is&nbsp;simply dummy text of&nbsp;the printing and typesetting industry. Lorem
                    Ipsum
                    has
                    been
                    the industry&rsquo;s standard dummy text ever since the 1500s, when an&nbsp;unknown printer
                    took
                    a&nbsp;galley of&nbsp;type and scrambled it&nbsp;to&nbsp;make a&nbsp;type specimen book.
                    It&nbsp;has
                    survived not only five centuries, but also the leap into electronic typesetting, remaining
                    essentially
                    unchanged. It&nbsp;was popularised in&nbsp;the 1960s with the release of&nbsp;Letraset
                    sheets
                    containing
                    Lorem Ipsum passages, and more recently with desktop publishing software like Aldus
                    PageMaker
                    including
                    versions of&nbsp;Lorem Ipsum.</p>
            </div>
        </div>
    </div>
</section>
<section class="layout__section">
    <div class="block-matrix">
        <div class="row">
            <div class="col-12 col-lg-6 block-matrix__item">
                <div class="block-preview block-preview_text-only">
                    <div class="block-preview__meta">
                        <div class="row">
                            <div class="col-auto">
                                <img src="assets/gear.svg">
                            </div>
                            <div class="col block__meta">
                                <h2 class="block-preview__title">
                                    <a href="" class="link link_text">Tools</a>
                                </h2>
                                <p>Services and software that&nbsp;I use at&nbsp;work.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6 block-matrix__item">
                <div class="block-preview block-preview_text-only">
                    <div class="block-preview__meta">
                        <div class="row">
                            <div class="col-auto">
                                <img src="assets/browser.svg">
                            </div>
                            <div class="col block__meta">
                                <h2 class="block-preview__title">
                                    <a href="" class="link link_text">Programming</a>
                                </h2>
                                <p>Services and software that&nbsp;I use at&nbsp;work.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6 block-matrix__item">
                <div class="block-preview block-preview_text-only">
                    <div class="block-preview__meta">
                        <div class="row">
                            <div class="col-auto">
                                <img src="assets/money.svg">
                            </div>
                            <div class="col block__meta">
                                <h2 class="block-preview__title">
                                    <a href="" class="link link_text">Marketing &amp;&nbsp;finance</a>
                                </h2>
                                <p>Services and software that&nbsp;I use at&nbsp;work.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="layout__section">
    <div class="row">
        <div class="col-12 col-lg-9">
            <div class="block__home">
                <h2>Воспользуйтесь поиском по&nbsp;сайту</h2>
                <form action="" class="homeSearchForm">
                    <input type="text" class="homeSearchField" placeholder="Search..">
                    <button type="submit" class="homeSearchButton"></button>
                </form>
                <p>Популярные результаты:
                    <a href="">результат</a>,
                    <a href="">результат</a>,
                    <a href="">результат</a>
                </p>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>