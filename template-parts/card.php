<?php
/**
 * Template part: portfolio card
 * expects the loop context (inside WP_Query / loop)
 */

$terms = get_the_terms( get_the_ID(), 'portfolio_category' );
$term_slugs = array();
if ( $terms && ! is_wp_error( $terms ) ) {
    foreach( $terms as $t ) {
        $term_slugs[] = $t->slug;
    }
}
$terms_attr = implode( ' ', $term_slugs );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('portfolio-item'); ?> data-terms="<?php echo esc_attr( $terms_attr ); ?>">
  <a class="portfolio-link" href="<?php the_permalink(); ?>">
    <div class="thumb">
      <?php
      if ( has_post_thumbnail() ) {
        // Use responsive size; WordPress will output srcset
        echo get_the_post_thumbnail( get_the_ID(), 'medium', array(
          'loading' => 'lazy',
          'alt' => esc_attr( get_the_title() ),
        ) );
      } else {
        // placeholder (تضع ملف placeholder.png داخل assets/images/)
        $placeholder = get_template_directory_uri() . '/assets/images/placeholder.png';
        echo '<img src="'. esc_url( $placeholder ) .'" alt="'. esc_attr( get_the_title() ) .'" loading="lazy" />';
      }
      ?>
    </div>

    <h2 class="portfolio-title"><?php the_title(); ?></h2>
  </a>
</article>
