<?php
/**
 * Basic index for WPTF Starter
 */
get_header();
?>

<main id="site-content" role="main">
  <section class="hero">
    <div class="wrap">
      <h1><?php bloginfo('name'); ?></h1>
      <p><?php bloginfo('description'); ?></p>
    </div>
  </section>

  <section class="portfolio-grid">
    <div class="wrap">
      <?php
      if ( have_posts() ) :
        while ( have_posts() ) : the_post();
          the_title('<h2>','</h2>');
          the_excerpt();
        endwhile;
      else :
        echo '<p>No content yet.</p>';
      endif;
      ?>
    </div>
  </section>
</main>

<?php
get_footer();
