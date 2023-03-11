<?php

if ( ! function_exists( 'linx_logo' ) ) :
function linx_logo( $options = array() ) {
  $options = array_merge( array( 'contrary' => true ), $options );
  $logo_regular = class_exists( 'Kirki_Helper' ) ? Kirki_Helper::get_image_from_url( linx_get_option( 'linx_logo_regular', '' ) ) : '';
  $logo_contrary = class_exists( 'Kirki_Helper' ) ? Kirki_Helper::get_image_from_url( linx_get_option( 'linx_logo_contrary', '' ) ) : ''; ?>

  <?php if ( is_array( $logo_regular ) && $logo_regular['url'] ) : ?>
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
      <img class="logo regular" src="<?php echo esc_url( $logo_regular['url'] ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" width="<?php echo esc_attr( $logo_regular['width'] ); ?>" height="<?php echo esc_attr( $logo_regular['height'] ); ?>">
    </a>
  <?php else : ?>
    <a class="logo text" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a>
  <?php endif; ?>

  <?php if ( $options['contrary'] && is_array( $logo_contrary ) && $logo_contrary['url'] ) : ?>
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
      <img class="logo contrary" src="<?php echo esc_url( $logo_contrary['url'] ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" width="<?php echo esc_attr( $logo_contrary['width'] ); ?>" height="<?php echo esc_attr( $logo_contrary['height'] ); ?>">
    </a>
  <?php endif;
}
endif;

if ( ! function_exists( 'linx_entry_media' ) ) :
function linx_entry_media( $options = array() ) {
  $options = array_merge( array( 'gallery' => false, 'cover' => false ), $options );
  $sidebar = linx_sidebar();
  $class = 'entry-media with-placeholder';

  switch ( $options['layout'] ) {
    case 'one' :
      $image_size = linx_get_option( 'linx_enable_cropped_image', false ) == true ? 'linx_420' : 'linx_full_420';
      $sizes = $sidebar != 'none' ? '(min-width: 1200px) 840px, (min-width: 768px) 690px, 400px' : '(min-width: 1200px) 1130px, (min-width: 992px) 930px, (min-width: 768px) 690px, 400px';
      break;
    case 'two' :
      $image_size = linx_get_option( 'linx_enable_cropped_image', false ) == true ? 'linx_420' : 'linx_full_420';
      $sizes = $sidebar != 'none' ? '(min-width: 1200px) 405px, (min-width: 768px) 330px, 400px' : '(min-width: 1200px) 550px, (min-width: 992px) 450px, (min-width: 768px) 330px, 400px';
      break;
    case 'three' :
      $image_size = linx_get_option( 'linx_enable_cropped_image', false ) == true ? 'linx_420' : 'linx_full_420';
      $sizes = $sidebar != 'none' ? '(min-width: 1200px) 260px, (min-width: 768px) 330px, 400px' : '(min-width: 1200px) 360px, (min-width: 992px) 290px, (min-width: 768px) 330px, 400px';
      break;
    case 'four' :
      $image_size = linx_get_option( 'linx_enable_cropped_image', false ) == true ? 'linx_420' : 'linx_full_420';
      $sizes = $sidebar != 'none' ? '(min-width: 1200px) 260px, (min-width: 768px) 330px, 400px' : '(min-width: 1200px) 260px, (min-width: 992px) 290px, (min-width: 768px) 330px, 400px';
      break;
    case 'related' :
      $image_size = linx_get_option( 'linx_enable_cropped_image', false ) == true ? 'linx_420' : 'linx_full_420';
      $sizes = '(min-width: 1200px) 260px, (min-width: 992px) 210px, 400px';
      break;
    case 'post' :
      $image_size = 'linx_full_420';
      if ( $sidebar != 'none' && linx_get_option( 'linx_disable_related_posts', false ) == false && linx_related_posts() ) {
        $sizes = '(min-width: 1200px) 550px, (min-width: 992px) 450px, (min-width: 768px) 690px, 400px';
      } elseif ( $sidebar != 'none' || ( linx_get_option( 'linx_disable_related_posts', false ) == false && linx_related_posts() ) ) {
        $sizes = '(min-width: 1200px) 840px, (min-width: 768px) 690px, 400px';
      } else {
        $sizes = '(min-width: 1200px) 1130px, (min-width: 992px) 930px, (min-width: 768px) 690px, 400px';
      }
      break;
    case 'rect' :
      $image_size = 'linx_420';
      $sizes = '400px';
      break;
  } ?>

  <?php if ( ! $options['gallery'] ) :
    if ( ! linx_is_gif() ) :
      $ratio = linx_thumbnail_ratio( $image_size ); ?>
      <div class="<?php echo esc_attr( $class ); ?>" style="padding-bottom: <?php echo esc_attr( $ratio ); ?>;">
        <?php if ( ! $options['cover'] ) : ?>
          <a href="<?php echo esc_url( get_permalink() ); ?>">
            <img class="lazyload" data-srcset="<?php echo esc_attr( wp_get_attachment_image_srcset( get_post_thumbnail_id(), $image_size ) ); ?>" sizes="<?php echo esc_attr( $sizes ); ?>">
          </a>
        <?php endif; ?>
        <?php get_template_part( 'inc/partials/format' ); ?>
      </div>
    <?php else :
      $ratio = linx_thumbnail_ratio( 'full' );
      $image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' ); ?>
      <div class="<?php echo esc_attr( $class ); ?>" style="padding-bottom: <?php echo esc_attr( $ratio ); ?>;">
        <?php if ( ! $options['cover'] ) : ?>
          <a href="<?php echo esc_url( get_permalink() ); ?>">
            <img class="lazyload" data-src="<?php echo esc_url( $image[0] ); ?>">
          </a>
        <?php endif; ?>
        <?php get_template_part( 'inc/partials/format' ); ?>
      </div>
    <?php endif;
  else :
    $gallery = rwmb_meta( 'linx_pf_gallery_data' );
    if ( ! empty( $gallery ) ) : ?>
      <div class="entry-media">
        <div class="entry-gallery owl-carousel">
          <?php foreach ( $gallery as $image ) : ?>
            <img class="lazyload" data-srcset="<?php echo esc_attr( wp_get_attachment_image_srcset( $image['ID'], $image_size ) ); ?>" sizes="<?php echo esc_attr( $sizes ); ?>">
          <?php endforeach; ?>
        </div>
      </div>
    <?php endif;
  endif;
}
endif;

if ( ! function_exists( 'linx_entry_header' ) ) :
function linx_entry_header( $options = array() ) {
  $options = array_merge( array( 'tag' => 'h2', 'link' => true, 'category' => true, 'date' => false, 'author' => false, 'comment' => false, 'like' => false ), $options );

  $post_id = is_singular( 'post' ) ? get_queried_object_id() : get_the_ID();
  $author_id = get_post_field( 'post_author', $post_id );
  $categories = get_the_category(); ?>

  <header class="entry-header">
    <?php if ( $categories && $options['category'] ) : ?>
      <div class="entry-category">
        <?php foreach ( $categories as $category ) :
          $color = get_term_meta( $category->term_id, 'category_color', true ); ?>
          <a style="background-color: <?php echo esc_attr( $color ); ?>;" href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>" rel="category"><?php echo esc_html( $category->name ); ?></a>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>

    <?php
      if ( $options['link'] ) {
        the_title( '<' . $options['tag'] . ' class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></' . $options['tag'] . '>' );
      } else {
        the_title( '<' . $options['tag'] . ' class="entry-title">', '</' . $options['tag'] . '>' );
      }
    ?>

    <div class="entry-meta">
      <?php if ( $options['date'] ) :
        echo sprintf( '<time datetime="%1$s">%2$s</time>', esc_attr( get_the_date( 'c' ) ), esc_html( get_the_date() ) );
      endif;
      
      if ( $options['comment'] && ! post_password_required() && ( comments_open() || get_comments_number() ) ) :
        printf( _n( '%s comment', '%s comments', esc_html( get_comments_number() ), 'linx' ), esc_html( number_format_i18n( get_comments_number() ) ) );
      endif;

      if ( $options['like'] ) :
        $like_count = get_post_meta( get_the_ID(), 'linx_like', true );
        $like_count = $like_count != '' ? $like_count : '0';
        printf( _n( '%s like', '%s likes', esc_html( $like_count ), 'linx' ), esc_html( number_format_i18n( $like_count ) ) );
      endif; ?>
    </div>
  </header>
<?php
}
endif;

if ( ! function_exists( 'linx_comment' ) ) :
function linx_comment( $comment, $args, $depth ) {
  $GLOBALS['comment'] = $comment;

  if ( 'pingback' == $comment->comment_type || 'trackback' == $comment->comment_type ) : ?>

  <li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
    <div class="comment-body">
      <?php esc_html_e( 'Pingback:', 'linx' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( esc_html__( 'Edit', 'linx' ), '<span class="edit-link">', '</span>' ); ?>
    </div>

  <?php else : ?>

  <li id="comment-<?php comment_ID(); ?>" <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?>>
    <article id="div-comment-<?php comment_ID(); ?>" class="comment-wrapper u-clearfix" itemscope itemtype="https://schema.org/Comment">
      <div class="comment-author-avatar vcard">
        <?php if ( 0 != $args['avatar_size'] ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
      </div>

      <div class="comment-content">
        <div class="comment-author-name vcard" itemprop="author">
          <?php printf( '<cite class="fn">%s</cite>', get_comment_author_link() ); ?>
        </div>

        <div class="comment-metadata">
          <time datetime="<?php comment_time( 'c' ); ?>" itemprop="datePublished">
            <?php printf( _x( '%1$s at %2$s', '1: date, 2: time', 'linx' ), get_comment_date(), get_comment_time() ); ?>
          </time>

          <?php
            edit_comment_link( esc_html__( 'Edit', 'linx' ), ' <span class="edit-link">', '</span>' );
            comment_reply_link( array_merge( $args, array(
              'add_below' => 'div-comment',
              'depth'     => $depth,
              'max_depth' => $args['max_depth'],
              'before'    => '<span class="reply-link">',
              'after'     => '</span>',
            ) ) );
          ?>
        </div>

        <div class="comment-body" itemprop="comment">
          <?php comment_text(); ?>
        </div>

        <?php if ( '0' == $comment->comment_approved ) : ?>
					<p class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'linx' ); ?></p>
        <?php endif; ?>
      </div>
    </article> <?php

  endif;
}
endif;
