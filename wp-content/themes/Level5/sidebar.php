<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package level5
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<?php

//Vars

	$sidebar_title = get_field('sidebar_title', get_option('page_for_posts'));
	$sidebar_description = get_field('sidebar_description', get_option('page_for_posts'));
	$sidebar_placeholder = get_field('input_placeholder', get_option('page_for_posts'));
	$sidebar_button_link = get_field('button_link', get_option('page_for_posts'));
	$sidebar_button_text = get_field('button_text', get_option('page_for_posts'));
	
?>

<aside id="sidebar" role="complementary">
	<?php 
		ob_start();
		dynamic_sidebar( 'sidebar-1' ); 
		$sidebar = ob_get_contents();
		ob_end_clean();

		$sidebar = str_replace('</form>', '<i class="icon-search"></i></form>', $sidebar);

		echo $sidebar;
		//brings in search bar and category list as <section>s
	?>
	<section id="newsletter">
		<h3><?= $sidebar_title ?></h3>
		<span class="big-text"><?= $sidebar_description ?></span>
        
        <?php gravity_form(3, false, false, false, '', true); ?>

	</section>	
</aside><!-- #secondary -->
