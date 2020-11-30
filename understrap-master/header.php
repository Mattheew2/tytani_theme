<?php

/**
 * The header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

$container = get_theme_mod('understrap_container_type');
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-176777168-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'UA-176777168-1');
  </script>
  <?php wp_head(); ?>
  <meta charset="utf-8">
  <link href="https://fonts.googleapis.com/css2?family=Exo:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>/wp-content/themes/understrap-master/css/custom.css">
  <link href="https://fonts.googleapis.com/css2?family=Exo:wght@200&display=swap" rel="stylesheet">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <style>
    <?php require('page-templates/menu.php');
    ?>
  </style>
</head>

<body <?php body_class(); ?> <?php understrap_body_attributes(); ?>>
  <?php
  do_action('wp_body_open'); ?>
  <div class="site" id="page">

    <!-- ******************* The Navbar Area ******************* -->
    <div id="wrapper-navbar">

      <a class="skip-link sr-only sr-only-focusable" href="#content"><?php esc_html_e('Skip to content', 'understrap'); ?></a>

      <nav id="main-nav" class="navbar navbar-expand-md navbar-dark bg-primary" aria-labelledby="main-nav-label">

        <h2 id="main-nav-label" class="sr-only">
          <?php esc_html_e('Main Navigation', 'understrap'); ?>
        </h2>

        <?php if ('container' === $container) : ?>
          <div class="container menu_bar no_padding">
          <?php endif; ?>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle navigation', 'understrap'); ?>">
            <span class="navbar-toggler-icon"></span>
          </button>

          <!-- The WordPress Menu goes here -->
          <?php wp_nav_menu(
            array(
              'theme_location'  => 'primary',
              'container_class' => 'collapse navbar-collapse',
              'container_id'    => 'navbarNavDropdown',
              'menu_class'      => 'navbar-nav',
              'fallback_cb'     => '',
              'menu_id'         => 'main-menu',
              'depth'           => 2,
              'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
            )
          ); ?>
          <?php if ('container' === $container) : ?>
          </div><!-- .container -->
        <?php endif;

        ?>

      </nav><!-- .site-navigation -->
      <div id="top_menu">
        <div id="top_menu_container">
          <?php echo do_shortcode('[widget id="nav_menu-7"]'); ?>
        </div>
      </div>
      <div class="container-fluid second_menu" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
        <div class="row">
          <div class="col"></div>
          <div class="col-12">
            <div class="top_menu_container">
              <?php echo do_shortcode($menu_type); ?></div>
          </div>
        </div>
      </div>
      <div class="under_second_menu"></div>
      <div class="container">
        <div class="row">
          <div class="col"></div>
          <div class="col-12 social_icons_line" data-aos="fade-up" data-aos-anchor-placement="bottom-center">
            <div class="top_menu_container">
              <?php
              echo do_shortcode('[widget id="nav_menu-3"]');
              ?>
            </div>
          </div>

        </div>

      </div><!-- #wrapper-navbar end -->