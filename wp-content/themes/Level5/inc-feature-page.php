<?php
  $posts = get_posts(array(
  	'posts_per_page'	=> -1,
  	'post_type'			=> 'feature'
  ));

if( $posts ): ?>

  <ul>

	<?php foreach( $posts as $post ):

		setup_postdata( $post );

    // vars
    $id = $post->ID;
    $photo = get_field('feature_image', $id);
    $name = get_the_title($id);
    $description = get_field('feature_description', $id);
    ?>

		<li>
			<div>
        <img src="<?= $photo['sizes']['grid-employee'] ?>">
      </div>
			<span><?= $name ?></span>
			<span><?= $title ?></span>
      <span><?= $description ?></span>
		</li>

  <?php endforeach; ?>

  </ul>

  <?php wp_reset_postdata(); ?>

<?php endif; ?>
