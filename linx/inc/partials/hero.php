<?php

if ( is_front_page() ) {
  $style = linx_get_option( 'linx_hero_home_style', 'none' );
  $content = linx_get_option( 'linx_hero_home_content', 'image' );
  $heading = linx_get_option( 'linx_hero_home_heading', '' );
  $subheading = linx_get_option( 'linx_hero_home_subheading', '' );
  $button_secondary_text = linx_get_option( 'linx_hero_home_button_secondary_text', '' );
  $button_secondary_link = linx_get_option( 'linx_hero_home_button_secondary_link', '' );
  $button_primary_text = linx_get_option( 'linx_hero_home_button_primary_text', '' );
  $button_primary_link = linx_get_option( 'linx_hero_home_button_primary_link', '' );
  $bg_image = linx_get_option( 'linx_hero_home_bg_image', '' );
  $bg_slider = array();
  $slides = linx_get_option( 'linx_hero_home_bg_slider', false );
  if ( $slides ) {
    foreach ( $slides as $slide ) {
      $image = wp_get_attachment_image_src( $slide['slider_image'], 'full' );
      $bg_slider[] = array(
        'image' => $image[0],
        'heading' => $slide['slider_heading'],
        'subheading' => $slide['slider_subheading'],
        'button_secondary_text' => $slide['slider_button_secondary_text'],
        'button_secondary_link' => $slide['slider_button_secondary_link'],
        'button_primary_text' => $slide['slider_button_primary_text'],
        'button_primary_link' => $slide['slider_button_primary_link'],
      );
    }
  }
} elseif ( is_singular( 'post' ) || is_page() ) {
  $style = linx_compare_options( linx_get_option( 'linx_hero_single_style', 'none' ), rwmb_meta( 'linx_hero_single_style' ) );
  $content = get_post_format() ? get_post_format() : 'image';
  $heading = rwmb_meta( 'linx_hero_single_heading' ) == '' ? get_the_title() : rwmb_meta( 'linx_hero_single_heading' );
  $subheading = rwmb_meta( 'linx_hero_single_subheading' );
  $bg_image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
  $bg_image = $bg_image[0];
  $bg_slider = array();
  $slides = rwmb_meta( 'linx_pf_gallery_data' );
  if ( ! empty( $slides ) ) {
    foreach ( $slides as $slide ) {
      $image = wp_get_attachment_image_src( $slide['ID'], 'full' );
      $bg_slider[] = array(
        'image' => $image[0],
        'heading' => get_the_title(),
        'subheading' => '',
      );
    }
  }
}

$hero_class = 'hero lazyload visible';

if ( $content == 'gallery' ) {
  $hero_class = 'hero';
  $bg_image = '';
} ?>

<div class="<?php echo esc_attr( $hero_class ); ?>" data-bg="<?php echo esc_url( $bg_image ); ?>">
  <?php if ( $content == 'image' && $heading != '' && ! is_singular( 'post' ) ) : ?>
    <div class="hero-content">
      <header class="entry-header">
        <?php if ( $heading != '' ) : ?>
          <h1 class="hero-heading"><?php echo esc_html( $heading ); ?></h1>
        <?php endif; ?>
        <?php if ( $subheading != '' ) : ?>
          <div class="hero-subheading"><?php echo esc_html( $subheading ); ?></div>
        <?php endif; ?>
        <?php if ( $button_secondary_text != '' ) : ?>
          <a class="button transparent" href="<?php echo esc_url( $button_secondary_link ); ?>"><?php echo esc_html( $button_secondary_text ); ?></a>
        <?php endif; ?>
        <?php if ( $button_primary_text != '' ) : ?>
          <a class="button" href="<?php echo esc_url( $button_primary_link ); ?>"><?php echo esc_html( $button_primary_text ); ?></a>
        <?php endif; ?>
      </header>
    </div>
  <?php endif; ?>

  <?php if ( $content == 'gallery' && $bg_slider ) : ?>
    <div class="hero-slider owl-carousel">
      <?php foreach ( $bg_slider as $slide ) : ?>
        <div class="slider-item lazyload visible" data-bg="<?php echo esc_url( $slide['image'] ); ?>">
          <?php if ( $slide['heading'] != '' && ! is_singular( 'post' ) ) : ?>
            <div class="hero-content">
              <header class="entry-header">
                <h2 class="hero-heading"><?php echo esc_html( $slide['heading'] ); ?></h2>
                <div class="hero-subheading"><?php echo esc_html( $slide['subheading'] ); ?></div>
                <?php if ( $slide['button_secondary_text'] != '' ) : ?>
                  <a class="button transparent" href="<?php echo esc_url( $slide['button_secondary_link'] ); ?>"><?php echo esc_html( $slide['button_secondary_text'] ); ?></a>
                <?php endif; ?>
                <?php if ( $slide['button_primary_text'] != '' ) : ?>
                  <a class="button" href="<?php echo esc_url( $slide['button_primary_link'] ); ?>"><?php echo esc_html( $slide['button_primary_text'] ); ?></a>
                <?php endif; ?>
              </header>
            </div>
          <?php endif; ?>
        </div>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>

  <?php
    if ( ( is_singular( 'post' ) || is_page() ) && ( $content == 'video' || $content == 'audio' ) ) :
      echo '<div class="hero-media"><div class="container">' . rwmb_meta( 'linx_pf_' . get_post_format() . '_data' ) . '</div></div>';
    endif;
  ?>
</div>
