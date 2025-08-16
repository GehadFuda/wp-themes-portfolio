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
if ( ! function_exists( 'wptf_enqueue_assets' ) ) {
    function wptf_enqueue_assets() {
        // main stylesheet
        wp_enqueue_style( 'wptf-style', get_stylesheet_uri(), array(), filemtime( get_template_directory() . '/style.css' ) );

        // portfolio filter script (defer to footer)
        wp_enqueue_script( 'wptf-portfolio-filter', get_template_directory_uri() . '/assets/js/portfolio-filter.js', array(), '1.0', true );

        // أي سكربتات أو ستايلات إضافية تضيفها هنا
    }
}
add_action( 'wp_enqueue_scripts', 'wptf_enqueue_assets' );

// Include CPT (portfolio)
if ( file_exists( get_template_directory() . '/inc/cpt-portfolio.php' ) ) {
    require get_template_directory() . '/inc/cpt-portfolio.php';
}

// Customizer: logo + primary color
function wptf_customizer_register( $wp_customize ) {
  $wp_customize->add_section('wptf_branding', array(
    'title' => __('Branding', 'wptf-starter'),
    'priority' => 30,
  ));

  $wp_customize->add_setting('wptf_logo', array('capability' => 'edit_theme_options'));
  $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'wptf_logo', array(
    'label' => __('Site Logo', 'wptf-starter'),
    'section' => 'wptf_branding',
    'settings' => 'wptf_logo',
  )));

  $wp_customize->add_setting('wptf_primary_color', array(
    'default' => '#111827',
    'transport' => 'postMessage',
    'sanitize_callback' => 'sanitize_hex_color',
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'wptf_primary_color', array(
    'label' => __('Primary color', 'wptf-starter'),
    'section' => 'wptf_branding',
    'settings' => 'wptf_primary_color',
  )));
}
add_action( 'customize_register', 'wptf_customizer_register' );

// Output custom CSS
function wptf_customizer_css() {
  $color = get_theme_mod('wptf_primary_color', '#111827');
  echo "<style>:root{ --wptf-primary: ". esc_html( $color ) ."; }</style>";
}
add_action( 'wp_head', 'wptf_customizer_css' );