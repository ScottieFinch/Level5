<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package level5
 */

?>

<?php $featured_img = wp_get_attachment_image( get_post_thumbnail_id(), 'featured-image'); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h3 class="section-heading"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>

		<div class="entry-meta">
			<span class="meta"><?= get_the_date('F j, Y') ?> | <?php the_author(); ?></span>
		</div><!-- .entry-meta -->
		
	</header><!-- .entry-header -->

	<div class="entry-content">
		<a href="<?= get_permalink() ?>"><?= $featured_img ?></a>
		<?php the_excerpt(); ?>
		<a class="button" href="<?= get_permalink() ?>">Read More</a>
	</div><!-- .entry-summary -->

	<footer class="entry-footer">
		<hr>
		<span>Posted in <?= get_the_category_list( ', '); ?><?php if(has_tag()): ?> and tagged in <?php the_tags( '', ', ', '' ); endif; ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
