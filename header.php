<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header">
  <div class="wrap">
    <div class="site-branding">
      <?php
      // عرض اللوجو المخصص (WP custom logo) أو اللوجو من Customizer (wptf_logo) أو fallback للنص
      if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
          the_custom_logo();
      } elseif ( get_theme_mod( 'wptf_logo' ) ) {
          echo '<a href="' . esc_url( home_url( '/' ) ) . '" class="custom-logo-link"><img src="' . esc_url( get_theme_mod( 'wptf_logo' ) ) . '" alt="' . esc_attr( get_bloginfo( 'name' ) ) . '"></a>';
      } else {
          echo '<a class="site-title" href="' . esc_url( home_url( '/' ) ) . '">' . esc_html( get_bloginfo( 'name' ) ) . '</a>';
          echo '<p class="site-description">' . esc_html( get_bloginfo( 'description' ) ) . '</p>';
      }
      ?>
    </div>

    <nav class="site-nav" aria-label="Primary Menu">
      <?php
      if ( has_nav_menu( 'primary' ) ) {
        wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'primary-menu' ) );
      }
      ?>
    </nav>
  </div>
</header>
