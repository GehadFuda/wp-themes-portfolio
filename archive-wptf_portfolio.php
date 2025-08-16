<?php
// echo '<div style="background:#e6ffea;padding:8px;border:2px solid #38a169;margin:8px 0;">DEBUG: archive-wptf_portfolio.php LOADED</div>';
// exit; // <- لا تفعّل exit الآن إلا للاختبار المؤقت فقط
get_header();
?>

<header class="archive-header wrap">
  <h1 class="archive-title"><?php post_type_archive_title(); ?></h1>
  <p class="archive-desc">أعمالي المختارة — تصفّح المشاريع أدناه.</p>
</header>

<main class="site-content wrap" role="main">
  <div class="portfolio-filter" aria-hidden="false">
    <button data-term="all" class="active">الكل</button>
    <?php
    $terms = get_terms(array('taxonomy' => 'portfolio_category', 'hide_empty' => true));
    if ($terms && ! is_wp_error($terms)) {
      foreach ($terms as $t) {
        echo '<button data-term="' . esc_attr($t->slug) . '">' . esc_html($t->name) . '</button>';
      }
    }
    ?>
  </div>
  <section class="portfolio-grid">
    <?php
    $paged = get_query_var('paged') ? get_query_var('paged') : 1;
    $args = array(
      'post_type' => 'wptf_portfolio',
      'posts_per_page' => 9,
      'paged' => $paged,
    );
    $q = new WP_Query($args);

    if ($q->have_posts()) :
      while ($q->have_posts()) : $q->the_post();
        get_template_part('template-parts/card');
      endwhile;
      wp_reset_postdata();
    else :
      echo '<p class="no-results">لا توجد مشاريع بعد.</p>';
    endif;
    ?>
  </section>

  <nav class="pagination">
    <?php
    echo paginate_links(array(
      'total' => $q->max_num_pages,
      'prev_text' => '&laquo; السابق',
      'next_text' => 'التالي &raquo;',
    ));
    ?>
  </nav>
</main>

<?php
get_footer();
