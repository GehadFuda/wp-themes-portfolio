<?php
get_header();
?>

<main class="site-content wrap" role="main">
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class('portfolio-single'); ?>>
      <header class="entry-header">
        <h1 class="entry-title"><?php the_title(); ?></h1>
      </header>

      <div class="entry-media">
        <?php
        if ( has_post_thumbnail() ) {
          the_post_thumbnail('large', array('loading' => 'lazy', 'alt' => get_the_title()));
        }
        ?>
      </div>

      <div class="entry-content">
        <?php the_content(); ?>
      </div>

      <?php
      // مثال على حقول مخصّصة (client, skills, project_url)
      $client = get_post_meta(get_the_ID(), 'client', true);
      $skills = get_post_meta(get_the_ID(), 'skills', true);
      $project_url = get_post_meta(get_the_ID(), 'project_url', true);

      if ( $client || $skills || $project_url ) : ?>
        <aside class="project-meta">
          <?php if ( $client ) : ?><p><strong>Client:</strong> <?php echo esc_html( $client ); ?></p><?php endif; ?>
          <?php if ( $skills ) : ?><p><strong>Skills:</strong> <?php echo esc_html( $skills ); ?></p><?php endif; ?>
          <?php if ( $project_url ) : ?><p><strong>Live:</strong> <a href="<?php echo esc_url( $project_url ); ?>" target="_blank" rel="noopener"><?php echo esc_html( $project_url ); ?></a></p><?php endif; ?>
        </aside>
      <?php endif; ?>

      <footer class="entry-footer">
        <a class="back-link" href="<?php echo esc_url( get_post_type_archive_link( 'wptf_portfolio' ) ); ?>">&larr; العودة إلى المشاريع</a>
      </footer>
    </article>
  <?php endwhile; endif; ?>
</main>

<?php
get_footer();
