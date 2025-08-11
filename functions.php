<?php
// Basic theme setup
function wptf_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array('search-form','gallery','caption'));
    load_theme_textdomain('wptf-starter', get_template_directory() . '/languages');
}
add_action('after_setup_theme', 'wptf_setup');

// Enqueue styles & scripts
function wptf_scripts() {
    wp_enqueue_style('wptf-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'wptf_scripts');

// Include CPT (portfolio)
if ( file_exists( get_template_directory() . '/inc/cpt-portfolio.php' ) ) {
    require get_template_directory() . '/inc/cpt-portfolio.php';
}
