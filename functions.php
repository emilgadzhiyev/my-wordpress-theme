<?php

# Enable standard WordPress <title></title> tag
add_theme_support('title-tag');
# /Enable standard WordPress <title></title> tag

# Remove site name and tagline from <title></title> from all the pages, except the main (index) page
add_filter('document_title_parts', function ($title) {
    if (!is_front_page()) {
        unset($title['site']);
        unset($title['tagline']);
    }
    return $title;
});
# /Remove site name and tagline from <title></title> from all the pages, except the main (index) page

# Enable attaching image to blog post
add_theme_support('post-thumbnails');
# /Enable attaching image to blog post

# Registering menu
register_nav_menus(array(
    'top'    => 'Top menu',
    'bottom' => 'Bottom menu'
));
# /Registering menu

# Walker for Top menu
class Eg_Top_Menu_Walker extends Walker_Nav_Menu
{
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
    {
        $classes0 = empty($item->classes) ? array() : (array) $item->classes;
        $classes1 = array('', '', 'main-menu__link');
        if (array_search('current-menu-item', $classes0)) {
            $classes1[] = 'main-menu__link_active';
        }
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes1), $item));
        empty($class_names) and $class_names = "main-menu__link";
        $output .= "";
        $attributes  = '';
        !empty($item->url) and $attributes .= 'href="' . esc_attr($item->url) . '" class="' . $class_names . '"';
        $title = apply_filters('the_title', $item->title, $item->ID);
        $item_output = $args->before
            . "<a $attributes >"
            . $args->link_before
            . $title
            . '</a>'
            . $args->link_after
            . $args->after;
        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
}
# /Walker for Top menu

# Walker for Bottom menu
class Eg_Bottom_Menu_Walker extends Walker_Nav_Menu
{
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
    {
        $classes0 = empty($item->classes) ? array() : (array) $item->classes;
        $classes1 = array('link', 'link_text', 'social-links__link');
        if (array_search('current-menu-item', $classes0)) {
            $classes1[] = 'main-menu__link_active';
        }
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes1), $item));
        empty($class_names) and $class_names = "link link_text main-menu__link";
        $output .= "";
        $attributes  = '';
        !empty($item->url) and $attributes .= 'href="' . esc_attr($item->url) . '" class="' . $class_names . '"';
        $title = apply_filters('the_title', $item->title, $item->ID);
        $item_output = $args->before
            . "<a $attributes >"
            . $args->link_before
            . $title
            . '</a>'
            . $args->link_after
            . $args->after;
        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
}
# /Walker for Bottom menu

# Remove WP Generator Meta Tag
remove_action('wp_head', 'wp_generator');
# /# Remove WP Generator Meta Tag

# Remove WLW Manifest link
remove_action('wp_head', 'wlwmanifest_link');
# /Remove WLW Manifest link

# Disable XML-RPC RSD link
remove_action('wp_head', 'rsd_link');
# /Disable XML-RPC RSD link

# Remove api.w.org relation link
remove_action('wp_head', 'rest_output_link_wp_head', 10);
remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);
remove_action('template_redirect', 'rest_output_link_header', 11, 0);
# /Remove api.w.org relation link

# Disabling emoji library from Wordpress
function disable_emojis()
{
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
    add_filter('tiny_mce_plugins', 'disable_emojis_tinymce');
    add_filter('wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2);
}
add_action('init', 'disable_emojis');
# /Disabling emoji library from Wordpress

# Filter funcion to remove the emoji plugin from TinyMCE
function disable_emojis_tinymce($plugins)
{
    if (is_array($plugins)) {
        return array_diff($plugins, array('wpemoji'));
    } else return array();
}
# /Filter funcion to remove the emoji plugin from TinyMCE

# Removing emoji CDN hostname from DNS prefetching hints
function disable_emojis_remove_dns_prefetch($urls, $relation_type)
{
    if ('dns-prefetch' == $relation_type) {
        /** This filter is documented in wp-includes/formatting.php */
        $emoji_svg_url = apply_filters('emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/');
        $urls = array_diff($urls, array($emoji_svg_url));
    }
    return $urls;
}
# /Removing emoji CDN hostname from DNS prefetching hints

# Disable RSS Feeds
function wpb_disable_feed()
{
    wp_die(__('No feed available,please visit our <a href="' . get_bloginfo('url') . '">homepage</a>!'));
}
add_action('do_feed', 'wpb_disable_feed', 1);
add_action('do_feed_rdf', 'wpb_disable_feed', 1);
add_action('do_feed_rss', 'wpb_disable_feed', 1);
add_action('do_feed_rss2', 'wpb_disable_feed', 1);
add_action('do_feed_atom', 'wpb_disable_feed', 1);
add_action('do_feed_rss2_comments', 'wpb_disable_feed', 1);
add_action('do_feed_atom_comments', 'wpb_disable_feed', 1);
# /Disable RSS Feeds

# Disable author page
function disable_author_page()
{
    global $wp_query;
    if (is_author()) {
        # Redirect to homepage, set status to 301 permenant redirect
        # Function defaults to 302 temporary redirect
        wp_redirect(get_option('home'), 301);
        exit;
    }
}
add_action('template_redirect', 'disable_author_page');
# /Disable author page

# OpenGraph
function doctype_opengraph($output)
{
    return $output . '
    xmlns:og="http://opengraphprotocol.org/schema/"
    xmlns:fb="http://www.facebook.com/2008/fbml"';
}
add_filter('language_attributes', 'doctype_opengraph');

function fb_opengraph()
{
    global $post;
    if (is_single() || is_page() || is_archive()) {
        if (has_post_thumbnail($post->ID)) {
            $img_src = wp_get_attachment_image_url(get_post_thumbnail_id(), 'full');
        } else {
            $img_src = 'https://www.emilgadzhiyev.me/wp-content/uploads/2020/05/opengraph_image.png';
        }
        if ($excerpt = $post->post_excerpt) {
            $excerpt = strip_tags($post->post_excerpt);
            $excerpt = str_replace("", "'", $excerpt);
        } else {
            $excerpt = get_bloginfo('description');
        }
?>
        <meta property="og:title" content="<?php echo the_title();
                                            echo single_term_title(); ?>" />
        <meta property="og:description" content="<?php echo $excerpt; ?>" />
        <meta property="og:type" content="article" />
        <meta property="og:url" content="<?php echo the_permalink(); ?>" />
        <meta property="og:site_name" content="<?php echo get_bloginfo(); ?>" />
        <meta property="og:image" content="<?php echo $img_src; ?>" />
<?php
    } else {
        return;
    }
}
add_action('wp_head', 'fb_opengraph', 5);
# /OpenGraph

# Removing wp-block-library
add_action('wp_print_styles', 'wps_deregister_styles', 100);
function wps_deregister_styles()
{
    wp_dequeue_style('wp-block-library');
}
# /Removing wp-block-library
add_filter('img_caption_shortcode_width', '__return_false');

# Removing <h2> tag from pagination
add_filter('navigation_markup_template', 'my_navigation_template', 10, 2);
function my_navigation_template($template, $class)
{
    return '%3$s';
}
# /Removing <h2> tag from pagination

# Removing pages from search results
function wph_exclude_pages($query)
{
    if ($query->is_search) {
        $query->set('post_type', 'post');
    }
    return $query;
}
add_filter('pre_get_posts', 'wph_exclude_pages');
# /Removing pages from search results