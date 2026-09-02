<?php 

// Feature tiles for the menu, from the "Four Squares" nav menu.
// Resolved by slug not term ID so it survives a database import.
$box_links = wp_get_nav_menu_items( 'four-squares' ) ?: array();
$box_links = array_slice($box_links, 0, 4);

?>

<nav class="main-menu" id="main-menu-panel">
  <div class="container-fluid">
    <div class="row justify-content-around">
      <button class="main-menu__close" data-toggle-main-menu
        aria-expanded="false" aria-controls="main-menu-panel">
        <span class="main-menu__close-label">Close</span>
        <img src="<?= get_template_directory_uri() . '/static/icon-close-colour.svg'; ?>" alt="">
      </button>

      <div class="col-12 text-center">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="main-menu__logo">
          <img src="<?= get_stylesheet_directory_uri(); ?>/static/logos/Canyon_Logo_Colour.svg" alt="Canyon Logo" loading="lazy">
        </a>
      </div>
      
      <div class="col-xl-3 col-4 d-flex flex-column justify-content-between">
        <?php
                wp_nav_menu( array(
                    'menu'              => 'main-menu',
                    'fallback_cb'       => false,
                    'depth'             => 2,
                    'container'         => '',
                    'menu_id' 			    => 'main-menu',
                    'menu_class'        => 'main-menu__links'
                ) );
                ?>
        <div class="menu-footer">
          <?php the_field('menu_contact', 'options'); ?>
        </div>
      </div>

      <div class="col-xl-6 col-8">
        <ul class="main-menu__box-links">
          <?php foreach ($box_links as $box): $id = $box->ID; ?>
          <li>
            <a href="<?= $box->url; ?>" class="box-links__content">
                <?= wp_get_attachment_image(get_field('image', $id), 'full'); ?>
                <h3><?= $box->title; ?></h3>
                <p><?php the_field('description', $id); ?></p>
            </a>
          </li>
          <?php endforeach; ?>
        </ul>
      </div>      

    </div>
  </div>
</nav>

