<?php
require_once 'customizer.php';
require_once 'settings.php';

$GLOBALS['back-to-the-90s-free-theme-url'] = 'https://mokimoki.net/90s-retro-wordpress-theme/';

if (!isset($content_width)) {
    $content_width = 900;
}

function back_to_the_90s_nav() {
    $icon = has_site_icon() ? '<img src="' . esc_url(get_site_icon_url()) . '" alt="' . esc_attr(get_bloginfo('name')) . '"/>' : '';
    echo '<h2><a href="' . esc_url(site_url()) . '">' . ($icon ? $icon : esc_html(get_bloginfo('name'))) . '</a></h2>';
    $menu = wp_nav_menu(array(
        'theme_location' => 'nav-menu',
        'menu' => 'main-menu',
        'container' => 'div',
        'container_class' => 'menu-{menu slug}-container',
        'container_id' => '',
        'menu_class' => 'menu',
        'menu_id' => 777,
        'echo' => FALSE,
        'fallback_cb' => 'wp_page_menu',
        'before' => '',
        'after' => '',
        'link_before' => '',
        'link_after' => '',
        'items_wrap' => '<ul>%3$s</ul>',
        'depth' => 0,
        'walker' => ''
    ));
    $menu_name   = 'nav-menu';
    $locations   = get_nav_menu_locations();
    $menu_id     = -1;
	if (isset($locations[$menu_name])) {
		$menu_id     = $locations[$menu_name];
	}
	
    $menu_object = wp_get_nav_menu_object($menu_id);
    if ($menu_object !== FALSE) {
        echo '<h3>' . esc_html($menu_object->name) . '</h3>';
    } else {
        echo '<h3>' . esc_html__('Menu', 'back-to-the-90s-free') . '</h3>';
    }
    
    echo $menu;
    echo '<div class="sidebar-widget">';
    if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('widget-area-1'));
    echo '</div>';
}

function back_to_the_90s_free_header_scripts() {
    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {
        wp_register_script('back-to-the-90s-free-mpopup', get_template_directory_uri() . '/js/jquery-magnific-popup.min.js', array('jquery'));
        wp_register_script('back-to-the-90s-free-scripts', get_template_directory_uri() . '/js/back-to-the-90s-free-scripts.js', array('jquery'));
        wp_enqueue_script('jquery');
        wp_enqueue_script('back-to-the-90s-free-mpopup');
        wp_enqueue_script('back-to-the-90s-free-scripts');
    }
}

function back_to_the_90s_free_styles() {
    wp_register_style('back_to_the_90s_free-css', get_template_directory_uri() . '/style.css', array(), '1.2');
    wp_register_style('back_to_the_90s_free-magnific-popup', get_template_directory_uri() . '/css/magnific-popup.css', array(), '1.0');
    wp_enqueue_style('back_to_the_90s_free-css');
    wp_enqueue_style('back_to_the_90s_free-magnific-popup');
}

function back_to_the_90s_free_register_menu() {
    register_nav_menus(array(
        'nav-menu' => esc_html('Main Menu', 'back-to-the-90s-free')
    ));
}

function back_to_the_90s_free_nav_menu_args($args = '') {
    $args['container'] = FALSE;
    return $args;
}

function back_to_the_90s_free_css_attributes_filter($var) {
    return is_array($var) ? array() : '';
}

function back_to_the_90s_free_remove_category_rel_from_category_list($thelist) {
    return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}

function back_to_the_90s_free_remove_width_attribute($html) {
    $html = preg_replace('/(width|height)="\d*"\s/', "", $html);
    return $html;
}

if (function_exists('register_sidebar')) {
    register_sidebar(array(
        'name' => esc_html('Under the Menu Widget Area', 'back-to-the-90s-free'),
        'description' => esc_html('Put widgets you want to see under the navigation here.', 'back-to-the-90s-free'),
        'id' => 'widget-area-1',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
    
    register_sidebar(array(
        'name' => esc_html('Right Side Widget Area', 'back-to-the-90s-free'),
        'description' => esc_html('These widgets will be shown on the right side of the page.', 'back-to-the-90s-free'),
        'id' => 'widget-area-2',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
}

function back_to_the_90s_free_remove_recent_comments_style() {
    global $wp_widget_factory;
    if (isset($wp_widget_factory->widgets['WP_Widget_Recent_Comments'])) {
        remove_action('wp_head', array(
            $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
            'recent_comments_style'
        ));
    }
}

function back_to_the_90s_free_index($length) {
    return 50;
}

function back_to_the_90s_free_custom_post($length) {
    return 40;
}

function back_to_the_90s_free_excerpt() {
    global $post;
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>' . $output . '</p>';
    echo $output;
}

function back_to_the_90s_free_blank_view_article($more) {
    global $post;
    return '... <a class="view-article" href="' . get_permalink($post->ID) . '">' . esc_html__('Read More', 'back-to-the-90s-free') . '</a>';
}

function back_to_the_90s_free_style_remove($tag) {
    return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
}

function back_to_the_90s_free_remove_thumbnail_dimensions($html) {
    $html = preg_replace('/(width|height)=\"\d*\"\s/', '', $html);
    return $html;
}

function back_to_the_90s_free_gravatar($avatar_defaults) {
    $myavatar                   = get_template_directory_uri() . '/img/gravatar.jpg';
    $avatar_defaults[$myavatar] = 'Custom Gravatar';
    return $avatar_defaults;
}

function back_to_the_90s_free_enable_threaded_comments() {
    if (!is_admin()) {
        if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
            wp_enqueue_script('comment-reply');
        }
    }
}

function back_to_the_90s_free_load_admin_style() {
    wp_register_style('back-to-the-90s-free-admin-css', get_template_directory_uri() . '/css/back-to-the-90s-free-admin-style.css', FALSE, '1.0.0');
    wp_enqueue_style('back-to-the-90s-free-admin-css');
    wp_enqueue_script('back-to-the-90s-free-admin-scripts', get_template_directory_uri() . '/js/back-to-the-90s-free-admin.js', array('jquery', 'customize-preview'));
}

function back_to_the_90s_free_get_gif1_url() {
    $gif_url = get_option('back_to_the_90s_gif1_alt_location');
    if (empty($gif_url)) {
        $gif_url = get_template_directory_uri() . '/img/gifs/globe.gif';
    }
    
    return esc_url($gif_url);
}

function back_to_the_90s_free_print_gif1_if_enabled() {
    if (get_option('back_to_the_90s_display_gifs') == 1) {
        echo '<img class="gif-icon" src="' . esc_url(back_to_the_90s_free_get_gif1_url()) . '" alt="' . esc_html__('Content Starts', 'back-to-the-90s-free') . '"/>';
    }
}

function back_to_the_90s_free_print_gif2_if_enabled() {
    if (get_option('back_to_the_90s_display_gifs') == 1) {
        echo '<img class="gif-icon" src="' . esc_url(get_template_directory_uri()) . '/img/gifs/under-construction.gif" alt="' . esc_html__('Site under construction', 'back-to-the-90s-free') . '"/>';
    }
}

function back_to_the_90s_free_print_gif3_if_enabled() {
    if (get_option('back_to_the_90s_display_gifs') == 1) {
        echo '<img class="gif-icon" src="' . esc_url(get_template_directory_uri()) . '/img/gifs/404.gif" alt="' . esc_html__('Page not found', 'back-to-the-90s-free') . '"/>';
    }
}

function back_to_the_90s_free_return_gif1_if_enabled() {
    if (get_option('back_to_the_90s_display_gifs') == 1) {
        return '<img class="gif-icon" src="' . esc_url(back_to_the_90s-free_get_gif1_url()) . '" alt="' . esc_html__('Content Starts', 'back-to-the-90s-free') . '"/>';
    }
    
    return NULL;
}

function back_to_the_90s_free_return_gif2_if_enabled() {
    if (get_option('back_to_the_90s_display_gifs') == 1) {
        return '<img class="gif-icon" src="' . esc_url(get_template_directory_uri()) . '/img/gifs/under-construction.gif" alt="' . esc_html__('Site under construction', 'back-to-the-90s-free') . '"/>';
    }
    
    return NULL;
}

function back_to_the_90s_free_prefix_remove_css_section($wp_customize) {
    $wp_customize->remove_section('custom_css');
}

function back_to_the_90s_free_get_the_title($title) {
    if (is_front_page()) {
        return esc_attr(get_bloginfo('name'));
    }
    
    global $post;
    return $post->post_title;
}

function back_to_the_90s_free_premium_dismiss() {
	set_transient('back-to-the-90s-free-premium-dismiss', TRUE, 60*60*24);
	wp_die();
}

add_theme_support('post-thumbnails');
add_image_size('back-to-the-90s-free_large', 700, '', TRUE);
add_image_size('back-to-the-90s-free_medium', 250, '', TRUE);
add_image_size('back-to-the-90s-free_small', 120, '', TRUE);
add_image_size('back-to-the-90s-free_custom-size', 700, 200, TRUE);

add_theme_support('automatic-feed-links');
add_theme_support('title-tag');
add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption'));

load_theme_textdomain('back-to-the-90s-free', get_template_directory() . '/languages');

add_action('wp_enqueue_scripts', 'back_to_the_90s_free_header_scripts');
add_action('get_header', 'back_to_the_90s_free_enable_threaded_comments');
add_action('wp_enqueue_scripts', 'back_to_the_90s_free_styles');
add_action('init', 'back_to_the_90s_free_register_menu');
add_action('widgets_init', 'back_to_the_90s_free_remove_recent_comments_style');
add_action('admin_enqueue_scripts', 'back_to_the_90s_free_load_admin_style');
add_action('customize_register', 'back_to_the_90s_free_prefix_remove_css_section', 15);
add_action('wp_ajax_back_to_the_90s_free_premium_dismiss', 'back_to_the_90s_free_premium_dismiss');

remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

add_filter('avatar_defaults', 'back_to_the_90s_free_gravatar');
add_filter('widget_text', 'do_shortcode');
add_filter('widget_text', 'shortcode_unautop');
add_filter('wp_nav_menu_args', 'back_to_the_90s_free_nav_menu_args');
add_filter('the_category', 'back_to_the_90s_free_remove_category_rel_from_category_list');
add_filter('the_excerpt', 'shortcode_unautop');
add_filter('the_excerpt', 'do_shortcode');
add_filter('excerpt_more', 'back_to_the_90s_free_blank_view_article');
add_filter('style_loader_tag', 'back_to_the_90s_free_style_remove');
add_filter('post_thumbnail_html', 'back_to_the_90s_free_remove_thumbnail_dimensions', 10);
add_filter('post_thumbnail_html', 'back_to_the_90s_free_remove_width_attribute', 10);
add_filter('image_send_to_editor', 'back_to_the_90s_free_remove_width_attribute', 10);
add_filter('wp_title', 'back_to_the_90s_free_get_the_title');

remove_filter('the_excerpt', 'wpautop');
