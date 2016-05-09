<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package level5
 */

?>

<?php


?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
			if ( is_single() ) {
				the_title( '<h3 class="section-heading">', '</h3>' );
			} else {
				the_title( '<h3 class="section-heading"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
			}

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<span class="meta"><?= get_the_date('F j, Y') ?> | <?php the_author(); ?></span>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			$featured_img = wp_get_attachment_image( get_post_thumbnail_id(), 'featured-image');

			if (is_single()) {
				echo $featured_img;
				the_content( sprintf(
					/* translators: %s: Name of current post. */
					wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'level5' ), array( 'span' => array( 'class' => array() ) ) ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );
			} else { ?>
				<a href="<?= get_permalink() ?>"><?= $featured_img ?></a>
				<?php the_excerpt(); ?>
				<a class="button" href="<?= get_permalink() ?>">Read More</a>
			<?php }
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<hr>
		<span>Posted in <?= get_the_category_list( ', '); ?><?php if(has_tag()): ?> and tagged in <?php the_tags( '', ', ', '' ); endif; ?>

		<div class="related-posts">
			<?php if (is_single()): ?>
			<?php foreach($posts as $post) :?>

			<div class="related-post">
				<a href="<?= get_permalink() ?>">

				<?php
					$thumb_id = get_post_thumbnail_id();
					if(has_post_thumbnail($post->ID)):
						$thumb_url = wp_get_attachment_image_src($thumb_id,'related-thumbnail', true); ?>
						<img src="<?php echo $thumb_url[0] ?>"/>
					<?php else :?>
					<?php endif;
				?>

					<span class="title"><?php the_title(); ?></span>
					<span class="date"><?php the_time('F j, Y'); ?></span>
				</a>
			</div>

			<?php endforeach; ?>
			<?php endif; ?>
		</div>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
