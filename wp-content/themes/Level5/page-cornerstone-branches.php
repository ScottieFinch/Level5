<?php
/**
 * @package level5
 */

get_header(); ?>

<script src="/wordpress/wp-content/themes/Level5/js/vex.combined.min.js"></script>
<script src="/wordpress/wp-content/themes/Level5/js/slick.min.js"></script>
<script>vex.defaultOptions.className = 'vex-theme-os';</script>
<link rel="stylesheet" href="/wordpress/wp-content/themes/Level5/css/vex.css" />
<link rel="stylesheet" href="/wordpress/wp-content/themes/Level5/css/vex-theme-os.css" />
<link rel="stylesheet" href="/wordpress/wp-content/themes/Level5/css/slick-theme.css" />

<div class="container">
	<nav id="secondary-navigation">
		<?php wp_nav_menu( array( 'theme_location' => 'secondary', 'menu_id' => 'secondary-menu' ) ); ?>
	</nav>
</div>

<section id="portfolio-images">
<?php if( have_rows('photos') ): ?>

<ul>
	<div class="imgContain">
	<?php while( have_rows('photos') ): the_row();
		$image = get_sub_field('image');
		$label = get_sub_field('label');
	?>

		<li>
			<img class="modal-image" src="<?= $image['sizes']['portfolio'] ?>">
			<div class="hidden image-set">
				<img class="image-set-image" src="/wordpress/wp-content/themes/level5/img/<?= $label ?>/<?= $label ?>-1.jpg">
				<img class="image-set-image" src="/wordpress/wp-content/themes/level5/img/<?= $label ?>/<?= $label ?>-2.jpg">
				<img class="image-set-image" src="/wordpress/wp-content/themes/level5/img/<?= $label ?>/<?= $label ?>-3.jpg">
				<img class="image-set-image" src="/wordpress/wp-content/themes/level5/img/<?= $label ?>/<?= $label ?>-4.jpg">
				<img class="image-set-image" src="/wordpress/wp-content/themes/level5/img/<?= $label ?>/<?= $label ?>-5.jpg">
				<img class="image-set-image" src="/wordpress/wp-content/themes/level5/img/<?= $label ?>/<?= $label ?>-6.jpg">
				<img class="image-set-image" src="/wordpress/wp-content/themes/level5/img/<?= $label ?>/<?= $label ?>-7.jpg">
			</div>
		</li>


	<?php endwhile; ?>
	</div>
</ul>

<?php endif; ?>
</section>

<script>
jQuery('.image-set .image-set-image').slick({
  dots: true,
  infinite: true,
  speed: 500,
  fade: true,
  cssEase: 'linear'
});

	jQuery('.imgContain').on("click","li", function (e) {
		var content = jQuery(this).find(".image-set").clone();
		content.removeClass('hidden');
			vex.open({content:  content});
	});
</script>

<?php get_footer(); ?>
