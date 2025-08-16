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
      while ($q->have_posts()) : $q->the_post(); ?>

        <!-- <?php
        // مؤقت: لعرض حالة الثمبنايل
        echo '<div style="background:#fff4c2;padding:8px;border:1px solid #ffd24d;margin-bottom:10px;">DEBUG: has_post_thumbnail() = ' . (has_post_thumbnail() ? 'true' : 'false') . ' | thumb ID = ' . get_post_thumbnail_id() . '</div>';
        ?> -->

        <article id="post-<?php the_ID(); ?>" <?php post_class('portfolio-item'); ?>>
          <a class="portfolio-link" href="<?php the_permalink(); ?>">
            <div class="thumb">
              <?php
              if (has_post_thumbnail()) {
                the_post_thumbnail('medium', array('loading' => 'lazy', 'alt' => get_the_title()));
              } else {
                echo '<div class="no-thumb">No image</div>';
              }
              ?>
            </div>
            <h2 class="portfolio-title"><?php the_title(); ?></h2>
          </a>
        </article>
    <?php endwhile;
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
