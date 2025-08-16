<?php
/**
 * Basic index for WPTF Starter
 */
// echo '<div style="background:#e6ffea;padding:8px;border:2px solid #38a169;margin:8px 0;">DEBUG: archive-wptf_portfolio.php LOADED</div>';
// exit; // <- لا تفعّل exit الآن إلا للاختبار المؤقت فقط
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
