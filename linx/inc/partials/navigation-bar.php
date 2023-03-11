<?php $container = linx_get_option( 'linx_navbar_full', false );

if ( $container == false ) : ?>
  <div class="container">
<?php endif; ?>

<div class="navbar">
  <div class="branding-within">
    <?php linx_logo(); ?>
  </div>

  <nav class="main-menu hidden-xs hidden-sm hidden-md">
    <?php wp_nav_menu( array(
      'theme_location' => 'menu-1',
      'container' => false,
      'menu_class' => 'nav-list u-plain-list',
      'walker' => new LINX_Walker_Nav_Menu( true ),
      'fallback_cb' => 'LINX_Walker_Nav_Menu::fallback'
    ) ); ?>
  </nav>

  <div class="main-search">
    <?php get_search_form(); ?>
    <div class="search-close navbar-button"><i class="mdi mdi-close"></i></div>
  </div>

  <div class="col-hamburger hidden-lg hidden-xl">
    <div class="hamburger"></div>
    <div class="search-open navbar-button">
      <i class="mdi mdi-magnify"></i>
    </div>
  </div>

  <div class="col-social hidden-xs hidden-sm hidden-md">
    <div>
      <?php get_template_part( 'inc/partials/social' ); ?>
      <div class="navbar-buttons">
        <div class="search-open navbar-button">
          <i class="mdi mdi-magnify"></i>
        </div>
      </div>
    </div>
  </div>
</div>

<?php if ( $container == false ) : ?>
  </div>
<?php endif; ?>
