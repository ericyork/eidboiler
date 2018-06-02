<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width" />
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <div id="wrapper" class="hfeed">
      <header id="header" role="banner">
        <section id="branding">
          <div id="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_html( get_bloginfo( 'name' ) ); ?>" rel="home"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a>
          </div>
          <div id="site-description"><?php bloginfo( 'description' ); ?>
          </div>
        </section>
        <nav id="menu" role="navigation">
          <?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
        </nav>
        <div id="search">
          <?php get_search_form(); ?>
        </div>
      </header>
    <div id="container">
