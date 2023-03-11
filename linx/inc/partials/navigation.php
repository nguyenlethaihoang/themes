<?php
  $prev_post = get_previous_post();
  $next_post = get_next_post();
  $sidebar = linx_sidebar();

  if ( $sidebar != 'none' && linx_get_option( 'linx_disable_related_posts', false ) == false && linx_related_posts() ) {
    $sizes = '(min-width: 1200px) 275px, (min-width: 992px) 225px, (min-width: 768px) 345px, 400px';
  } elseif ( $sidebar != 'none' || ( linx_get_option( 'linx_disable_related_posts', false ) == false && linx_related_posts() ) ) {
    $sizes = '(min-width: 1200px) 840px, (min-width: 768px) 690px, 400px';
  } else {
    $sizes = '(min-width: 1200px) 1130px, (min-width: 992px) 930px, (min-width: 768px) 690px, 400px';
  }
?>

<?php if ( ! empty( $prev_post ) || ! empty( $next_post ) ) : ?>
  <div class="entry-navigation">
    <?php if ( ! empty( $prev_post ) ) : ?>
      <div class="nav previous">
        <?php if ( has_post_thumbnail( $prev_post->ID ) ) : ?>
          <img class="lazyload" data-srcset="<?php echo esc_attr( wp_get_attachment_image_srcset( get_post_thumbnail_id( $prev_post->ID ), 'linx_full_420' ) ); ?>" sizes="<?php echo esc_attr( $sizes ); ?>">
        <?php endif; ?>
        <span><?php echo apply_filters( 'linx_previous_post_title', esc_html__( 'Previous Post', 'linx' ) ); ?></span>
        <h4 class="entry-title"><?php echo get_the_title( $prev_post->ID ); ?></h4>
        <a class="u-permalink" href="<?php echo esc_url( get_the_permalink( $prev_post->ID ) ); ?>"></a>
      </div>
    <?php else : ?>
      <div class="nav none">
        <span><?php echo apply_filters( 'linx_no_previous_post_title', esc_html__( 'No Older Post', 'linx' ) ); ?></span>
      </div>
    <?php endif; ?>
    <?php if ( ! empty( $next_post ) ) : ?>
      <div class="nav next">
        <?php if ( has_post_thumbnail( $next_post->ID ) ) : ?>
          <img class="lazyload" data-srcset="<?php echo esc_attr( wp_get_attachment_image_srcset( get_post_thumbnail_id( $next_post->ID ), 'linx_full_420' ) ); ?>" sizes="<?php echo esc_attr( $sizes ); ?>">
        <?php endif; ?>
        <span><?php echo apply_filters( 'linx_next_post_title', esc_html__( 'Next Post', 'linx' ) ); ?></span>
        <h4 class="entry-title"><?php echo get_the_title( $next_post->ID ); ?></h4>
        <a class="u-permalink" href="<?php echo esc_url( get_the_permalink( $next_post->ID ) ); ?>"></a>
      </div>
    <?php else : ?>
      <div class="nav none">
        <span><?php echo apply_filters( 'linx_no_next_post_title', esc_html__( 'No Newer Post', 'linx' ) ); ?></span>
      </div>
    <?php endif; ?>
  </div>
<?php endif; ?>
