<?php
<!doctype html>
?><html <?php language_attributes(); ?>>
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
      if ( function_exists('the_custom_logo') && has_custom_logo() ) {
        the_custom_logo();
      } else { ?>
        <a class="site-title" href="<?php echo esc_url( home_url('/') ); ?>"><?php bloginfo('name'); ?></a>
        <p class="site-description"><?php bloginfo('description'); ?></p>
      <?php } ?>
    </div>

    <nav class="site-nav" aria-label="Primary Menu">
      <?php
      if ( has_nav_menu('primary') ) {
        wp_nav_menu(array('theme_location' => 'primary', 'menu_class' => 'primary-menu'));
      }
      ?>
    </nav>
  </div>
</header>
