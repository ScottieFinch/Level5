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


<?php wp_head(); ?>
</head>

<?php
  $id = get_the_ID();
  $pagename = get_query_var('pagename');

  if ($pagename == "blog" || is_archive() || is_single() || is_search()){
	  $hero_image = get_field('hero_image', get_option('page_for_posts'));
    $headline = get_field('hero_title', get_option('page_for_posts'));
	  $subheadline = get_field('hero_subtitle', get_option('page_for_posts'));
    $button_text = get_field('button_text', get_option('page_for_posts'));
    $button_link = get_field('button_link', get_option('page_for_posts'));
  }
  else{
    $hero_image = get_field('hero_image');
    $headline = get_field('hero_title');
    $subheadline = get_field('hero_subtitle');
    $button_text = get_field('button_text');
    $button_link = get_field('button_link');
  }

  if (is_search()){
	$headline = '<small>Search Results for:</small><br>'.get_search_query() ;
  }
  if (is_archive()){
	 $headline = get_the_archive_title();
   $headline = str_ireplace('category: ', '<small>Category:</small><br>', $headline);
  }
?>

<body <?php body_class(); ?>>
<div id="page" class="site">

	<header id="site-header"<?= (is_admin_bar_showing()) ? ' class="offset-by-admin-bar"' : '' ?>>
  	<div class="container">
      <div class="site-logo">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?= get_template_directory_uri().'/img/' ?>" alt=""></a>
  		</div>

      <a id="mobile-menu-toggle">
        <i class="icon-menu"></i>
      </a>
  		<nav id="site-navigation" role="navigation">
  			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
  		</nav>

    </div>
  </header><!-- #site-header -->

  <header id="page-header" <?= $hero_image ? 'style="background-image: url('.$hero_image['url'].');"' : 'class="no-hero-img"' ?>>

    <?php if(!is_single()): ?>
		<div class="container">
			<div class="page-header-content">
					<?php if ( $headline ): ?>
					<h1><?= $headline ?></h1>
					<?php else: ?>
					<h1><?= get_the_title(); ?></h1>
					<?php endif; if ( $subheadline ): ?>
					  <h2><?= $subheadline ?></h2>
					<?php endif; if ( $button_link && $button_text ): ?>
					  <a class="button round" href="<?= $button_link ?>"><?= $button_text ?></a>
					<?php endif; ?>
			</div>
    <?php endif; ?>
		</div>
	</header><!-- #page-header -->

	<div id="content" class="site-content">
