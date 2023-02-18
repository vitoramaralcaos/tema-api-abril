<!DOCTYPE html>
<html <?php language_attributes(); ?>
 <head>
   <title><?php bloginfo('name'); ?> &raquo; <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
   <meta charset="<?php bloginfo( 'charset' ); ?>">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
   <?php wp_head(); ?>
 </head>
 <body <?php body_class(); ?>>
    <div class="header-wrapper">
      <header>
          <div class="logo" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/veja-logo-branco.png');"></div>
          <div class="menu-toggler-wrapper"><span class="menu-toggler"></span></div>
          <nav class="header-nav">
            <div class="header-nav-wrapper">
              <div class="bg-mobile-nav"></div>
                  <?php wp_nav_menu( array( 'header-menu' => 'header-menu' ) ); ?>
              </div>
            </nav>
      </header>
    </div>