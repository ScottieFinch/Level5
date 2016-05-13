<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package level5
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_enqueue_script("jquery"); ?>

<?php wp_head(); ?>




</head>

<?php

    $hero_image = get_field('top_background_image');
    $headline = get_field('top_section_text');

?>

<body <?php body_class(); ?>>
<div id="page" class="site">

	<header id="site-header"<?= (is_admin_bar_showing()) ? ' class="offset-by-admin-bar"' : '' ?>>
  	<div class="container">
      <div class="site-logo">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?= get_template_directory_uri().'/img/l5_logo_white.png' ?>" alt=""></a>
  		</div>

      <a id="mobile-menu-toggle">
        <i class="icon-menu"></i>
      </a>
  		<nav id="site-navigation" role="navigation">
  			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
  		</nav>

    </div>
  </header><!-- #site-header -->

	<div id="content" class="site-content">
